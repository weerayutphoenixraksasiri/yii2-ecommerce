<?php
namespace frontend\controllers;
use yii\web\Controller;
use common\models\Gender;
use common\models\Models;
use common\models\Fabric;
use common\models\Measurement;
use common\models\PaymentMethod;
use common\models\Shipping;
use common\models\Order;
use common\models\Product;
use Yii;
use yii\helpers\Url;
use common\models\Payment as MyPayment;
use common\models\ProductMeasurement;
use yii\base\Exception;

use PayPal\Api\Payer;
use PayPal\Api\Details;
use PayPal\Api\Amount;
use PayPal\Api\Transaction;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Exception\PayPalConnectionException;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use yii\filters\AccessControl;


class OrderController extends Controller {
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['gender', 'model', 'select-model', 'fabric', 'measurement', 'shipping', 'payment', 'paypal'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }
    
   public function actionGender($id = null)
   {
       if(!empty($id))
       {
           if(!in_array($id, ['1','2'])){
               return $this->redirect(['/order/gender']);
           }
           Yii::$app->session->set('gender', $id);
           return $this->redirect(['/order/model']);
       }
       return $this->render('gender');
   }
   
   public function actionModel($id = null)
   {
       $model = [];
       if(!empty($id))
       {
            $model = Models::find()->where([
               'fabric_type_id' => $id,
               'gender_id' => Yii::$app->session->get('gender'),
            ])->all();
       }
       return $this->render('model', [
           'model' => $model,
       ]);
   }
   public function actionSelectModel($id = null)
   {
       if(!empty($id))
       {
           Yii::$app->session->set('model', $id);
           return $this->redirect(['/order/fabric']);
       }
   }
   
   public function actionFabric($id = null)
   {
       if(!empty($id))
       {
           Yii::$app->session->set('fabric', $id);
           return $this->redirect(['/order/measurement']);
       }
       $fabric = Fabric::find()->all();
       return $this->render('fabric', [
           'fabric' => $fabric,
       ]);
   }
   
   public function actionMeasurement()
   {
       $mea = Measurement::find()->where([
           'gender_id' => Yii::$app->session->get('gender'),
       ])->all();
       
       if(Yii::$app->request->post())
       {
           $mid = $_POST['mid'];
           $mea = $_POST['mea'];
           
           $session = Yii::$app->session;
           //for($i=0;$i<count($mid);$i++)
           //{
                $session['measure'] = [
                    'mid' => $mid,
                    'mea' => $mea
                ];
           //}
           
           return $this->redirect(['/order/shipping']);
       }
       
       return $this->render('measurement', [
           'mea' => $mea
       ]);
   }
   
   public function actionShipping()
   {
       if(Yii::$app->request->post())
       {
           $shipid = $_POST['shipid'];
           $shipaddress = $_POST['shipaddress'];
           
           $session = Yii::$app->session;
           
           $session['shipping'] = [
               'shipid' => $shipid,
               'shipaddress' => $shipaddress,
           ];
           
           return $this->redirect(['/order/payment']);
       }
       
       return $this->render('shipping');
   }
   
   public function actionPayment()
   {
        if(Yii::$app->request->post())
        {
            $paymethod = $_POST['paymethod'];
            if(!in_array($paymethod, [1, 2]))
            {
                throw new Exception;
            }
            
                
            if($paymethod == 1) //บัญชีธนาคาร
            {
                if($this->saveOrder('false'))
                {  
                    Yii::$app->getSession()->setFlash('success', 'บันทึกการสั่งซื้อเรียบร้อยแล้ว กรุณาชำระค่าสินค้า และแจ้งการชำระมาที่ admin@admin.com');
                    return $this->redirect(['/site/index']);
                }
            }
            else if ($paymethod == 2)//paypal
            {
                $session = Yii::$app->session;

                $session['pay_method'] = $paymethod;
                //start paypal
                $payer = new Payer();
                $details = new Details();
                $amount = new Amount();
                $transaction = new Transaction;
                $payment = new Payment();
                $redirectUrls = new RedirectUrls();

                $payer->setPaymentMethod('paypal');

                //ดูว่า sending cost มีค่าส่งเท่าไร
                $models = Models::findOne($session['model']);
                //หาราคาสินค้า
                $fabric = Fabric::findOne($session['fabric']);

                
                $product_price = $fabric->price + $this->shipCost();

                //รายละเอียด
                $description = $models->fabricType->fabric_type.' '.$models->title.' '.$fabric->title;


                $amount->setCurrency('THB');
                $amount->setTotal($this->shipCost() + $product_price);

                $transaction->setAmount($amount);
                $transaction->setDescription($description);

                $return_url = Url::to(['/order/paypal', 'success' => 'true'], true);//"http://localhost/yii2-ecommerce/frontend/web/index.php?r=order%2Fpaypal?success=true";
                $cancel_url = Url::to(['/order/paypal', 'success' => 'false'], true);//"http://localhost/yii2-ecommerce/frontend/web/index.php?r=order%2Fpaypal?success=false";
                $redirectUrls->setReturnUrl($return_url);
                $redirectUrls->setCancelUrl($cancel_url);

                $payment->setRedirectUrls($redirectUrls);
                $payment->setIntent("sale");
                $payment->setPayer($payer);
                $payment->setTransactions([$transaction]);

                $paypal = new ApiContext(
                        new OAuthTokenCredential(
                            'AW3x2LR7lFU3l9bfuHEK58KKnoF76PQogLQYA14YQ9fB2HEc6deBUSSoO-CaWYWpKw-g5z7eN2siEbHN',
                            'EObT0FZ6reZ7vMI5n2e5lxEwqFppWIfKf2XHvHHrztzV9w53iZQhAoGti6Z6GJDP7SCJ3WZ2lZMoommd'
                        )
                    );
                $payment->create($paypal);

                foreach ($payment->getLinks() as $link) {
                    if ($link->getRel() == 'approval_url') {
                        $redirectUrl = $link->getHref();
                    }
                }
                $this->redirect($redirectUrl);
                //end paypal
            }
       }
       $pm = PaymentMethod::find()->all();
       return $this->render('payment', [
           'pm' => $pm,
       ]);
   }
   
   public function actionPaypal($success = null, $paymentId = null, $token = null, $PayerID = null)
   {
       if(!empty($success) && $success == 'true')
       {
           if($this->saveOrder($success))
           {
               Yii::$app->getSession()->setFlash('success', 'ขอบคุณสำหรับการสั่งซื้อ กรุณารอรับสินค้าของคุณ');
               return $this->redirect(['/site/index']);
           }
       }
       return $this->redirect(['/site/index']);
   }
   
   public function saveOrder($status)
   {
       $session = Yii::$app->session;
       
       $fabric = Fabric::findOne($session['fabric']);
       $models = Models::findOne($session['model']);
       
       $order = new Order;
       $order->user_id = Yii::$app->user->getId();
       $order->status = $status;
       $order->order_date = date('Y-m-d H:i:s', time());
       $order->total_price = $fabric->price + $models->price;
       $order->ship_cost = $this->shipCost();
       $order->save();
       //var_dump($order);
       
       
               
       $product = new Product();
       $product->models_id = $session['model'];
       $product->fabric_id = $session['fabric'];
       $product->order_id = $order->id;
       $product->total_price = $fabric->price + $models->price;
       $product->ship_cost = $this->shipCost();
       $product->save();
       //var_dump($product);
       
       $shipping = new Shipping();
       $shipping->order_id = $order->id;
       $shipping->address = $session['shipping']['shipaddress'];
       $shipping->ship_method = $session['shipping']['shipid'];
       $shipping->save();
       //var_dump($shipping);
       
       $payment = new MyPayment();
       $payment->order_id = $order->id;
       $payment->payment_method_id = $session['pay_method'];
       $payment->save();
       //var_dump($payment);
       
       for($i=0;$i<count($session['measure']['mid']);$i++){
            $productmea = new ProductMeasurement();
            $productmea->product_id = $product->id;
            $productmea->measurement_id = $session['measure']['mid'][$i];
            $productmea->val = $session['measure']['mea'][$i];
            $productmea->save();
            //var_dump($productmea);
       }
       //var_dump($session['measure']['mid']);
       $description = $models->fabricType->fabric_type.' '.$models->title.' '.$fabric->title.' ราคา '. $fabric->price + $this->shipCost().' บาท';
        Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo(Yii::$app->user->identity->email)
            ->setSubject('การสั่งซื้อสินค้าจาก ....')
            ->setTextBody($description)
            ->setHtmlBody('<p>'.$description.'</p>')
            ->send();
                    
                    
       return true;
       
       
   }
   
   public function shipCost()
   {
       $session = Yii::$app->session;
       $models = Models::findOne($session['model']);
        if($session['shipping']['shipid']=='in')
        {
            $sendingcost = $models->ship_cost_in;
        }else{
            $sendingcost = $models->ship_cost_out;
        }
        return $sendingcost; 
   }
}
