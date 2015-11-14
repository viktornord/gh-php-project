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

    /**
     * Apple constructor.
     * @param $kind
     * @param $quality
     * @param $isJuicy
     */
    public function __construct($kind, $quality, $isJuicy)
    {
        parent::__construct([]);
        $this->kind = $kind;
        $this->quality = $quality;
        $this->juicy = $isJuicy;
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




}