<?php
/**
 * Created by PhpStorm.
 * User: lushaohui
 * Date: 2017/6/28
 * Time: 15:39
 */

namespace monitor\view;


class View
{
    public static function __callStatic($name, $arguments)
    {
        //1.实例化base类，调用$name方法；2。调用一个未定义的静态方法的时候会自动触发此方法；并将实例化之后的结果返回
        return call_user_func_array([new Base,$name],$arguments);
    }
    public function __call($name, $arguments)
    {
        //1.实例化base类，调用$name方法；2。实例化调用一个未定义的方法的时候会自动触发此方法；并将实例化之后的结果返回
        return call_user_func_array([new Base,$name],$arguments);
    }
}