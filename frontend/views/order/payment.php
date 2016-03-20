<?php
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
$this->title = 'เลือกการชำระเงินที่คุณต้องการ';
?>
<h2>7. MAKE PAYMENT</h2>

<?php $form = ActiveForm::begin()?>
<div class="row">
    <?php foreach($pm as $p){?>
    <div class="col-md-4 text-center">
        <?=$p->payment_method?><br />
        <?=Html::input('radio', 'paymethod', $p->id, ['required' => true])?>
    </div>
    <?php }?>
</div>

<div class="form-group text-center">
    <?=Html::submitButton('ชำระและบันทึกการสั่งซื้อ', ['class' => 'btn btn-success'])?>
</div>
<?php ActiveForm::end()?>