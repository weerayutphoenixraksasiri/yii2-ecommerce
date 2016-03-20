<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Fabric */

$this->title = 'แก้ไขผ้า: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'ผ้า', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="fabric-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
