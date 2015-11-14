<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 14/11/15
 * Time: 01:46
 */

namespace frontend\controllers;


use frontend\components\AppleComponent;
use frontend\models\Apple;
use yii\filters\AccessControl;
use yii\web\Controller;

class AppleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                    ],
                ]
            ]
        ];
    }

    public function actionIndex() {
        $weight = $_GET['weight'];
        $apple = new Apple($_GET['kind'], $_GET['quality'], $_GET['juicy'], $_GET['weight']);
        $appleComp = new AppleComponent($apple);

        return $this->render('index', [
            'apple' => $apple,
            'weight' => $weight,
            'initPrice' => $appleComp->getInitPrice(),
            'totalPrice' => $appleComp->calculatePrice($apple)
        ]);
    }
}