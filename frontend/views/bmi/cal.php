<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin()?>

<?=$form->field($model, 'hight')?>

<?=$form->field($model, 'weight')?>

<?=Html::submitButton('คำนวณ', ['class' => 'btn btn-success'])?>
<?php ActiveForm::end()?>

ค่า BMI มีค่าเท่ากับ <?=$bmi?><br/>

40 หรือมากกว่านี้ : โรคอ้วนขั้นสูงสุด<br/>
35.0 - 39.9: โรคอ้วนขั้นที่ 2<br/>
28.5 - 34.9: โรคอ้วนขั้นที่ 1<br/>
23.5 - 28.4: น้ำหนักเกินแล้ว<br/>
18.5 - 23.4: น้ำหนักอยู่ในเกณฑ์ปกติ<br/>
น้อยกว่า 18.5: น้ำหนักต่ำกว่าเกณฑ์

