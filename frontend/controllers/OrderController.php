<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 14/11/15
 * Time: 01:46
 */

namespace frontend\controllers;


use frontend\components\OrderComponent;
use common\models\OrderForm;
use Yii;
use yii\bootstrap\ActiveForm;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

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

        if ($model->load(Yii::$app->request->post()) && $model->makeOrder()) {
            return $this->render('success');
        }

        return $this->render('index', [
            'model' => $model,
            'goods' => OrderComponent::$goods
        ]);
    }
}