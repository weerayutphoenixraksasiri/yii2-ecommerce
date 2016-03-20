<?php
namespace frontend\controllers;

use yii\web\Controller;
use frontend\models\Bmi;
use Yii;

class BmiController extends Controller {
    public function actionCal()
    {
        $model = new Bmi();
        
        $bmi = null;
        if($model->load(Yii::$app->request->post()))
        {
            $bmi = $model->weight / ($model->hight * $model->hight);
        }
        
        return $this->render('cal', [
            'model' => $model,
            'bmi' => $bmi,
        ]);
    }
}
