<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 21/11/15
 * Time: 13:37
 */

namespace common\models;


use yii\base\Model;

class OrderForm extends Model
{
    public $good;
    public $firstName;
    public $lastName;
    public $email;
    public $phone;

    public $withDelivery = true;
    public $deliveryAddress;
    public $count;



}