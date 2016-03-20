<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FabricSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ผ้า';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fabric-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มผ้า', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            'description:ntext',
            'price',
            'photo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
