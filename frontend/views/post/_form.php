<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin()?>

<?=$form->field($model, 'title')?>

<?=$form->field($model, 'description')->textarea()?>

<?=Html::submitButton('บันทึกข้อมูล', ['class' => 'btn btn-success'])?>

<?php ActiveForm::end()?>

