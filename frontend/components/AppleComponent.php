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
    private $initPrice = 10;

    /**
     * @param \frontend\models\Apple $model
     * @return int
     */
    public function calculatePrice($model)
    {
        
        $quality = $model->getQuality();
        $price = $this->initPrice;
        if ($model->isJuicy())
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
        $price *= $model->getWeight();

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