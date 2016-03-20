<?php
use yii\helpers\Html;
$this->title = 'เลือกผ้าที่คุณต้องการ';
?>
<h2>4. SELECT FABRIC</h2>
<div class="row">
    <?php foreach($fabric as $f){?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                   
                    <?=Html::img(Yii::getAlias('@uploadphoto').'/fabric/'.$f->photo)?>
                    <h2><?=$f->title?></h2>
                    <p><?=$f->description?></p>
                    <?=Html::a('<i class="fa fa-shopping-cart"></i>Pickup', ['/order/fabric', 'id' => $f->id], ['class' => 'btn btn-default add-to-cart'])?>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2><?=$f->title?></h2>
                        <p><?=$f->description?></p>
                        <?=Html::a('<i class="fa fa-shopping-cart"></i>Pickup', ['/order/fabric', 'id' => $f->id], ['class' => 'btn btn-default add-to-cart'])?>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <?php }?>
</div>

