<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 14/11/15
 * Time: 14:39
 */

namespace frontend\components;


use yii\base\Component;

class AppleComponent extends Component
{
    private $model;
    private $initPrice = 10;

    /**
     * AppleComponent constructor.
     * @param \frontend\models\Apple $model
     */
    public function __construct($model)
    {
        parent::__construct();
        $this->model = $model;
    }

    /**
     * @param int $weight
     * @return int
     */
    public function calculatePrice($weight)
    {
        $quality = $this->model->getQuality();
        $price = $this->initPrice;
        if ($this->model->isJuicy())
        {
            $price += 1;
        }
        if($quality > 70)
        {
            $price += 2;
        } else if ($quality < 30)
        {
            $price -= 1;
        }
        $price *= $weight;

        return $price;
    }

    /**
     * @return int
     */
    public function getInitPrice()
    {
        return $this->initPrice;
    }


}