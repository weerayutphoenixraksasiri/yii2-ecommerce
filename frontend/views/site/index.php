<?php
use yii\helpers\Html;

$this->title = 'Monte Carol Tailor';
//Yii::$app->db->open();
?>

<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Model Items</h2>
    <?php foreach($models as $m){?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <?=Html::img(Yii::getAlias('@uploadphoto').'/model/'.$m->photo)?>
                    <h2><?=$m->fabricType->fabric_type?> <?=$m->title?></h2>
                    <p><?=$m->description?></p>
                    <?=Html::a('<i class="fa fa-shopping-cart"></i>Detail', ['/site/model', 'id' => $m->id], ['class' => 'btn btn-default add-to-cart'])?>
                </div>
                
            </div>
            
        </div>
    </div>
    <?php }?>
    

</div><!--features_items-->

<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Fabric Items</h2>
    <?php foreach($fabric as $f){?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <?=Html::img(Yii::getAlias('@uploadphoto').'/fabric/'.$f->photo)?>
                    <h2><?=$f->title?></h2>
                    <p><?=$f->description?></p>
                    <?=Html::a('<i class="fa fa-shopping-cart"></i>Detail', ['/site/fabric', 'id' => $f->id], ['class' => 'btn btn-default add-to-cart'])?>
                </div>
                
            </div>
            
        </div>
    </div>
    <?php }?>
    

</div><!--features_items-->