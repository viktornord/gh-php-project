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

class OrderForm extends Model
{
    private $phonePattern  = '/^[0-9]{10}$/';

    public $good;
    public $firstName;
    public $lastName;
    public $email;

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
            [['phone'], 'match', 'pattern' => $this->phonePattern, 'message' => 'Doesn\'t look like phone number'],
            [['email'], 'email', 'message' => 'Doesn\'t look like email'],
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
//        if (Yii::$app->request->isAjax) {
//            Yii::$app->response->format = Response::FORMAT_JSON;
//            return ActiveForm::validate($this);
//        }
        return $this->validate();
    }

}