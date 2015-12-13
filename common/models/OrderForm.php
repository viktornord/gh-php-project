<?php

namespace common\models;

use Yii;
use yii\base\Model;

class OrderForm extends Model
{
    public $good_id;
    public $goods_count;
    public $total_price;

    public $firstname;
    public $lastname;
    public $email;
    public $site;
    public $phone;
    public $with_delivery;
    public $delivery_address;

    private $phonePattern  = '/^[0-9]{10}$/';

    public function rules()
    {
        return [
            [['good_id', 'firstname', 'lastname', 'email', 'phone'], 'required', 'message' => 'Please fill this filed, it is required'],
            [['goods_count', 'with_delivery'], 'integer'],
            [['goods_count'], 'default', 'value' => 1],
            [['phone'], 'match', 'pattern' => $this->phonePattern, 'message' => 'Doesn\'t look like phone number'],
            [['email', 'site'], 'validateLength', 'params' => ['max' => 15]],
            [['site'], 'url', 'message' => 'Please set a real url'],
            [['delivery_address'], 'validateLength', 'params' => ['max' => 150]],
            [['with_delivery', 'delivery_address'], 'validateDelivery']
        ];
    }

    public function attributeLabels()
    {
        return [
            'good_id' => 'Good',
        ];
    }

    public function validateDelivery($attribute, $params)
    {
        if ($this->with_delivery && $this->delivery_address == '') {
            $this->addError('delivery_address', 'Please, set address for delivery');
        }

    }

    public function validateLength($attribute, $params)
    {
        if (strlen($this->$attribute) > $params['max']) {
            $this->addError($attribute, 'Please, type less then '.$params['max'].' chars');
        }

    }

    public function makeOrder()
    {
        return $this->validate();
    }
}