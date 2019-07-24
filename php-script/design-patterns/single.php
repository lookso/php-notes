<?php
/**
 * Created by PhpStorm.
 * User: lukun
 * Date: 2019/7/24
 * Time: 6:06 PM
 */

class Single
{
    private static $single = null;

    //私有的构造方法
    private function __construct()
    {
    }

    static public function getSingle()
    {
        if (self::$single == null) {
           // new对象都会消耗内存
            self::$single == new Single();
        }
        return self::$single;
    }

    private function __clone()
    {
    }

}