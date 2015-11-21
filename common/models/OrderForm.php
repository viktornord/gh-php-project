<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 21/11/15
 * Time: 13:37
 */

namespace common\models;


use frontend\components\OrderComponent;
use Yii;
use yii\base\Model;
use yii\bootstrap\ActiveForm;
use yii\web\Response;

class OrderForm extends Model
{
    private $phonePattern  = '/^[0-9]{10}$/';

    public $good;
    public $firstName;
    public $lastName;
    public $nickname;
    public $email;
    public $site;

    public $phone;
    public $withDelivery = true;
    public $deliveryAddress;




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['good', 'firstName', 'lastName', 'email'], 'required', 'message' => 'Please fill this filed, it is required'],
            [['good'], 'in', 'range' => array_keys(OrderComponent::$goods), 'message' => 'We don\'t have good you want to order'],
            [['nickname'], 'default', 'value' => $this->firstName],
            [['phone'], 'match', 'pattern' => $this->phonePattern, 'message' => 'Doesn\'t look like phone number'],
            [['email'], 'email', 'message' => 'Doesn\'t look like email'],
            [['site'], 'url', 'message' => 'Please set a real url'],
            [['withDelivery', 'deliveryAddress'], 'validateDelivery']
        ];
    }

    public function validateDelivery($attribute, $params) {
        if ($this->withDelivery && $this->deliveryAddress == '') {
            $this->addError('deliveryAddress', 'Please, set address for delivery');
        }

    }

    public function makeOrder()
    {
        return $this->validate();
    }

}