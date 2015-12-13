<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 14/11/15
 * Time: 01:46
 */

namespace frontend\controllers;


use common\components\HelperComponent;
use Yii;
use yii\base\Exception;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\OrderForm;
use common\models\Order;
use common\models\Good;

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
            // create a new order
            $order = new Order();
            // set total price
            $model->total_price = Good::findAll($model->good_id)[0]->price * $model->goods_count;
            // fill order props
            foreach($model as $key => $value) {
                $order->setAttribute($key, $value);
            }
            // save the order
            $order->save();

            return $this->render('success');
        }

        return $this->render('index', [
            'model' => $model,
            'good_names' => HelperComponent::array_pluck('name', Good::find()->select('name')->all())
        ]);
    }
}