<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 13/12/15
 * Time: 14:41
 */
use common\models\Order;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

?>

<?= Html::csrfMetaTags() ?>

    <h1>Orders</h1>
<?= GridView::widget([
    'dataProvider' => new ActiveDataProvider([
        'query' => Order::find()
    ]),
    'columns' => [
        'firstname',
        'lastname',
        'email',
        'phone',
        'delivery_address',
        'good_id',
        'goods_count',
        'total_price',
    ],
]) ?>