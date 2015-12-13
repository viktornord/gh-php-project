<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use common\models\Order;

/**
 * This is the model class for table "goods".
 *
 * @property integer $id
 * @property string $name
 * @property integer $price
 *
 * @property Order[] $orders
 */
class Good extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'goods';
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['good_id' => 'id']);
    }
}