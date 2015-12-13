<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 13/12/15
 * Time: 20:23
 */

namespace frontend\assets;


use yii\web\AssetBundle;

class NotesAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/notes.css',
    ];

    public $depends = [
        'frontend\assets\LostParadiseAsset',
    ];
}