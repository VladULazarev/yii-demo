<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap',
        'css/bootstrap.min.css',
        'css/fontawesome.css',
        'css/templatemo-stand-blog.css',
        'css/owl.css',
        'css/flex-slider.css'
    ];
    public $js = [
        'js/bootstrap.bundle.min.js',
        'js/custom.js',
        'js/owl.js',
        'js/slick.js',
        'js/isotope.js',
        'js/accordions.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset'
    ];
}
