<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 14/11/15
 * Time: 14:32
 */

namespace frontend\models;


use yii\base\Model;

class Apple extends Model
{
    private $kind;
    private $quality;
    private $juicy;
    private $weight;

    /**
     * Apple constructor.
     * @param string $kind
     * @param int $quality
     * @param boolean|int $isJuicy
     * @param int $weight
     */
    public function __construct($kind, $quality, $isJuicy, $weight)
    {
        parent::__construct([]);
        $this->kind = $kind;
        $this->quality = $quality;
        $this->juicy = $isJuicy;
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * @return mixed
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * @return mixed
     */
    public function isJuicy()
    {
        return $this->juicy;
    }

    /**
     * @return mixed
     */
    public function getWeight()
    {
        return $this->weight;
    }


}