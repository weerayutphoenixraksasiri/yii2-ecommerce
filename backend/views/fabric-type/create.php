<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\FabricType */

$this->title = 'Create Fabric Type';
$this->params['breadcrumbs'][] = ['label' => 'Fabric Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fabric-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
