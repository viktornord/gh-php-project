<?php
/**
 * Created by PhpStorm.
 * User: victor
 * Date: 13/12/15
 * Time: 13:46
 */

namespace common\components;


class HelperComponent
{
    /**
     * @param $toPluck
     * @param $arr
     * @return array
     */
    public static function array_pluck($toPluck, $arr)
    {
        return array_map(function ($item) use ($toPluck) {
            return $item[$toPluck];
        }, $arr);
    }
}