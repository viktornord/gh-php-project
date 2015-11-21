<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 14/11/15
 * Time: 14:32
 */

namespace frontend\models;

use yii\base\Model;

class Good extends Model
{
    private $id = 25;
    public $name;

    /**
     * Good constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


}