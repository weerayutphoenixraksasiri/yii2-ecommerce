<?php

namespace frontend\controllers;
use common\models\Blog;
class BlogController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $blog = Blog::find()->orderBy(['id' => SORT_DESC])->all();
        return $this->render('index', [
            'blog' => $blog
        ]);
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
