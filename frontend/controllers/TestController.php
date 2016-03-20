<?php

namespace frontend\controllers;

class TestController extends \yii\web\Controller {

    public function actionIndex() {
        return $this->render('index');
    }

    public function actionTest1() {
        $a = 3;
        $b = 7;
        $c = 10;
        $sum = $a + $b;
        $sum1 = $c + $a;

        return $this->render('test1', ['sum' => $sum, 'sum1' => $sum1
        ]);
        }
        public function actionTest2($name=NULL,$lname = NULL) {
        $info = "Your name is $$name $lname";

        return $this->render('test2', ['info' =>$info]);
    }

}
