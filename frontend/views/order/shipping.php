<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
?>
<h2>6. SHIPPING</h2>

<?php $form = ActiveForm::begin()?>

<div class="row">
    
    <div class="col-md-4 text-center">
        <?=Html::label('การจัดส่ง', 'shipid')?>
        <?=Html::dropDownList('shipid', null, ['in'=>'ในประเทศ', 'out'=>'ต่างประเทศ'])?>
    </div>
    
</div>

<div class="row">
    <div class="col-md-12">
        <?=Html::label('ที่อยู่ในการจัดส่ง', 'shipaddress')?>
        <?=Html::textarea('shipaddress', Yii::$app->user->identity->profile->address)?>
    </div>
</div>
<div class="form-group">
<?=Html::submitButton('บันทึกและชำระค่าสินค้า', ['class' => 'btn btn-success'])?>
</div>
<?php ActiveForm::end()?>

