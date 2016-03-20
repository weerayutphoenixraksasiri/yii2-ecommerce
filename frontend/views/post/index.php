<?php
use yii\grid\GridView;
use yii\helpers\Html;
?>
<?=Html::a('เพิ่มข้อมูล', ['create'], ['class' => 'btn btn-success'])?>

<?=GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => yii\grid\SerialColumn::className()],
        'title',
        'created_at:datetime',
        'updated_at:datetime',
        ['class' => \yii\grid\ActionColumn::className()]
    ]
])?>
