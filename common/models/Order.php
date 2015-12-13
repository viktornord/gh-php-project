<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $good_id
 * @property integer $goods_count
 * @property integer $total_price
 * @property string $firstname
 * @property string $lastname
 * @property string $email
 * @property string $site
 * @property string $phone
 * @property integer $with_delivery
 * @property string $delivery_address
 *
 * @property Good $good
 */
class Order extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGood()
    {
        return $this->hasOne(Good::className(), ['id' => 'good_id']);
    }
}