<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Fabric */

$this->title = 'ผ้า';
$this->params['breadcrumbs'][] = ['label' => 'ผ้า', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fabric-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
