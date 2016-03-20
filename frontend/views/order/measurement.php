<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'การวัดตัว';
?>
<h3>5. MEASUREMENT</h3>
<?php $form = ActiveForm::begin()?>
<div class="row">
    <?php foreach($mea as $m){?>
    <div class="col-sm-12">
        <?=Html::img(Yii::getAlias('@uploadphoto').'/measurement/'.$m->photo, ['width' => 250])?><br>
        <?=Html::input('hidden', 'mid[]', $m->id)?>
        <br />
        <?=$m->description?>
        <br />
        <?=Html::input('text', 'mea[]')?>
    </div>
    
    <?php }?>
    <div class="col-sm-12">
        <?=Html::submitButton('บันทึกการวัดตัว', ['class' => 'btn btn-success'])?>
    </div>
    <hr />
</div>


<?php ActiveForm::end()?>
