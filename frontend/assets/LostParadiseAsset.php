<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 13/12/15
 * Time: 18:57
 */

namespace frontend\assets;

use yii\web\AssetBundle;

class LostParadiseAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'lostparadise/css/main.css',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
