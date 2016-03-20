<?php

use common\models\FabricType;
use yii\helpers\Html;
$this->title = 'เลือกแบบตามต้องการ';

?>
<h2>2. SELECT MODEL</h2>
<div class="row text-center">
<?php foreach (FabricType::find()->all() as $f) { ?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <?=Html::img(Yii::getAlias('@uploadphoto').'/fabrictype/'.$f->photo)?>
                    <h2><?=$f->fabric_type?></h2>
                    <p><?=$f->description?></p>
                    <?=Html::a('<i class="fa fa-shopping-cart"></i>Pickup', ['/order/model', 'id' => $f->id], ['class' => 'btn btn-default add-to-cart'])?>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2><?=$f->fabric_type?></h2>
                        <p><?=$f->description?></p>
                        <?=Html::a('<i class="fa fa-shopping-cart"></i>Pickup', ['/order/model', 'id' => $f->id], ['class' => 'btn btn-default add-to-cart'])?>
                    </div>
                </div>

            </div>

        </div>
    </div>
<?php } ?>
</div>
<h3>3. SELECT YOUR MODEL</h3>
<div class="row">
    <?php foreach($model as $m){?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <?=Html::img(Yii::getAlias('@uploadphoto').'/model/'.$m->photo)?>
                    <h2><?=$m->title?></h2>
                    <p><?=$m->price?></p>
                    <?=Html::a('<i class="fa fa-shopping-cart"></i>Pickup', ['/order/select-model', 'id' => $m->id], ['class' => 'btn btn-default add-to-cart'])?>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2><?=$m->title?></h2>
                        <p><?=$m->price?></p>
                        <?=Html::a('<i class="fa fa-shopping-cart"></i>Pickup', ['/order/select-model', 'id' => $m->id], ['class' => 'btn btn-default add-to-cart'])?>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <?php }?>
</div>
