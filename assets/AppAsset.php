<?php
/**
 * @link https://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license https://www.yiiframework.com/license/
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
        'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css',
        'https://use.fontawesome.com/releases/v5.3.1/css/all.css',
        'https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/css/dataTables.bootstrap4.css',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css',
        '/css/style.css'
               
    ];
    public $js = [
        
        //"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js",
        "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.5/umd/popper.js",
        "https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js",
        "https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js",
        "https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js",
        "https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.16/js/dataTables.bootstrap4.js",
        '/js/main.js'
        
    ];
    public $depends = [
        //'yii\web\YiiAsset',
        //'yii\bootstrap5\BootstrapAsset'
    ];
}
