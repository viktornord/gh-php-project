<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 14/11/15
 * Time: 01:46
 */

namespace frontend\controllers;


use frontend\components\AppleComponent;
use frontend\models\Good;
use common\models\OrderForm;
use yii\filters\AccessControl;
use yii\web\Controller;

class OrderController extends Controller
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
                        'actions' => ['index', 'order'],
                        'allow' => true,
                    ],
                ]
            ]
        ];
    }

    public function actionIndex() {
        $model = new OrderForm();
        return $this->render('index', [
            'model' => $model,

        ]);
    }

    public function actionOrder() {

        $model = new OrderForm();
        return $this->render('index', [
            'model' => $model,

        ]);
    }
}