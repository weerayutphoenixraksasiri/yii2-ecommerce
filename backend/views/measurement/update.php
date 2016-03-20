<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Measurement */

$this->title = 'แก้ไขการวัดตัว: ' . ' ' . $model->measurement;
$this->params['breadcrumbs'][] = ['label' => 'การวัดตัว', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->measurement, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไข';
?>
<div class="measurement-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
