<?php
use yii\helpers\Html;
$this->title = 'Blog';
?>

<div class="blog-post-area">
    <h2 class="title text-center">Latest From our Blog</h2>
    <?php foreach($blog as $b){?>
    <div class="single-blog-post">
        <h3><?=$b->title?></h3>
        <div class="post-meta">
            <ul>
                <li><i class="fa fa-user"></i> <?=$b->user->username?></li>
                <li><i class="fa fa-calendar"></i> <?=$b->updated_at?></li>
            </ul>
            
        </div>
        
        <p><?=$b->desctiption?></p>
        <?=Html::a('Read More', ['view', 'id' => $b->id], ['class' => 'btn btn-primary'])?>
    </div>
    <?php }?>
      
</div>