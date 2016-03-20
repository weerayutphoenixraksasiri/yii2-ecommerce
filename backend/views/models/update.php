<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Models */

$this->title = 'แก้ไข: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'แบบ', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="models-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
