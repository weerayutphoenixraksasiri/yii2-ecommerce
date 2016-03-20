<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\FabricType;
use common\models\Gender;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Models */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="models-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'fabric_type_id')->dropDownList(ArrayHelper::map(FabricType::find()->all(), 'id', 'fabric_type')) ?>

    <?= $form->field($model, 'gender_id')->dropDownList(ArrayHelper::map(Gender::find()->all(), 'id', 'gender')) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'ship_cost_in')->textInput() ?>

    <?= $form->field($model, 'ship_cost_out')->textInput() ?>
    
    <?= $form->field($model, 'photo')->fileInput()?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
