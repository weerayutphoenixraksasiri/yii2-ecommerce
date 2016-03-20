<?php
namespace frontend\themes\shopper;
use yii\web\AssetBundle;

class ShopperAsset extends AssetBundle{
    public $sourcePath = '@frontend/themes/shopper/assets/';  
    
    public $css = [
        'css/animate.css',
        'css/font-awesome.min.css',
        'css/main.css',
        'css/prettyPhoto.css',
        'css/price-range.css',
        'css/responsive.css'
    ];
    
    public $js = [
        'js/contact.js',
        'js/gmaps.js',
        'js/html5shiv.js',
        'js/jquery.prettyPhoto.js',
        'js/jquery.scrollUp.min.js',
        'js/main.js',
        'js/price-range.js',
    ];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
