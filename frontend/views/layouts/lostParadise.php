<?php

/* @var $content string */

use frontend\assets\LostParadiseAsset;
use frontend\assets\NotesAsset;
use frontend\widgets\NotesWidget;
use yii\helpers\Html;
use yii\widgets\Menu;

LostParadiseAsset::register($this);
NotesAsset::register($this);
?>
<?php $this->beginPage(); ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title); ?></title>
        <meta property='og:site_name' content='<?= Html::encode($this->title); ?>'/>
        <meta property='og:title' content='<?= Html::encode($this->title); ?>'/>
        <meta property='og:description' content='<?= Html::encode($this->title); ?>'/>
        <?php $this->head(); ?>
    </head>
    <body class='wsite-theme-light tall-header-page wsite-page-index weeblypage-index'>
    <?php $this->beginBody(); ?>
    <div class="header-wrapper">
        <div class="container">
            <div id="header">
                <div>
                    <div id="logo">
                        <span class='wsite-logo'>
                            <a href='<?= Yii::$app->homeUrl ?>'>
                                <span id="wsite-title"><?= Html::encode(\Yii::$app->name) ?></span>
                            </a>
                        </span>
                    </div>
                    <div id="header-right">
                        <ul>
                            <li class="phone-number"></li>
                            <li class="social"></li>
                        </ul>
                        <div class="search"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="main-wrapper">
        <div class="container">
            <div id="banner">
                <div class="wsite-header"></div>
            </div>
            <div id="main">
                <div id="navigation">
                    <?php
                    $menuItems = [
                        ['label' => 'Home', 'url' => ['/site/index']],
                        ['label' => 'About', 'url' => ['/site/about']],
                        ['label' => 'Contact', 'url' => ['/site/contact']],
                        ['label' => 'Make order', 'url' => ['/order/index']],
                        ['label' => 'View orders', 'url' => ['/order/orders']],
                    ];
                    if (Yii::$app->user->isGuest) {
                        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
                        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
                    } else {
                        $menuItems[] = [
                            'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']
                        ];
                    }
                    echo Menu::widget([
                            'options' => [
                                'class' => 'nav'
                            ],
                            'items' => $menuItems
                        ]);

                    ?>
                    <?= NotesWidget::widget([
                        'notes' => [
                            'Hello',
                            'World',
                            'Again',
                            'Smth',
                        ]
                    ]); ?>
                    <div class="clear"></div>
                </div>
                <div id="content">
                    <div id='wsite-content' class='wsite-not-footer'>
                    </div>
                    <?= $content; ?>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div id="footer-wrap">
                <div id="footer">
                    <?= Html::encode(\Yii::$app->name); ?>

                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div>

    <?php $this->endBody(); ?>
    </body>
    </html>
<?php $this->endPage(); ?>

