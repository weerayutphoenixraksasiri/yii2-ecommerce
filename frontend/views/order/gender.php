<?php
use yii\helpers\Html;
$this->title = 'เลือกชุดสำหรับคุณ';
?>
<h2>1.SELECT GENDER</h2>

<div class="text-center">
    <?=Html::a('<i class="fa fa-male fa-5x"></i>', [
        '/order/gender', 'id' => '1'
    ])?>
    
    <?=Html::a('<i class="fa fa-female fa-5x"></i>', [
        '/order/gender', 'id' => '2'
    ])?>
</div>
