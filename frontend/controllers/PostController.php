<?php

namespace frontend\controllers;
use yii\web\Controller;
use frontend\models\Post;
use yii\data\ActiveDataProvider;
use Yii;

class PostController extends Controller{
    
    public function actionIndex()
    {   
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider
        ]);
    }
    
    public function actionCreate()
    {
        $model = new Post();
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);
        if($model->load(Yii::$app->request->post()) && $model->save())
        {
            return $this->redirect(['index']);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    public function actionDelete($id)
    {
        if($this->loadModel($id)->delete())
        {
            return $this->redirect(['index']);
        }
    }
    public function actionView($id)
    {
        $model = $this->loadModel($id);
        return $this->render('view', [
            'model' => $model,
        ]);
    }
    
    protected function loadModel($id)
    {
        $model = Post::findOne($id);
        return $model;
    }
}
