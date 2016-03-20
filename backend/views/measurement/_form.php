<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Gender;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Measurement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="measurement-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'gender_id')->dropDownList(ArrayHelper::map(Gender::find()->all(), 'id', 'gender')) ?>

    <?= $form->field($model, 'measurement')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo')->fileInput()?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
