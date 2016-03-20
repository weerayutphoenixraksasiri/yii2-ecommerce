<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Measurement */

$this->title = 'Create Measurement';
$this->params['breadcrumbs'][] = ['label' => 'Measurements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="measurement-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
