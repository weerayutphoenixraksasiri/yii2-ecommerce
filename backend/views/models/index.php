<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ModelsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'แบบ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="models-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มแบบ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'fabricType.fabric_type',
            'gender.gender',
            'title',
            'description:ntext',
            'price',
            // 'photo',
            'ship_cost_in',
            'ship_cost_out',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
