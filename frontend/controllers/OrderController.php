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
    public $layout = 'lostParadise';

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
                        'actions' => ['index', 'orders'],
                        'allow' => true,
                    ],
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $model = new OrderForm();

        if ($model->load(Yii::$app->request->post()) && $model->makeOrder()) {
            $model->good_id++;
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

            return $this->redirect('/index.php?r=order%2Forders');
        }

        return $this->render('index', [
            'model' => $model,
            'good_names' => HelperComponent::array_pluck('name', Good::find()->select('name')->all())
        ]);
    }

    public function actionOrders()
    {
        return $this->render('orders', [
            'orders' => Order::find()->limit(100)->all()
        ]);
    }
}