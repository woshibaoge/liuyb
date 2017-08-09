<?php


//arguments  参数

/*
class Model
{
    public static function __callStatic($name, $arguments)
    {

        return call_user_func_array([new Base(), $name], $arguments);

    }

}


*/


class Model
{
    // 执行未定义的静态方法 会自动触发此方法  默认是get('arc')  $name参数名称（get)      $arguments（arc)
    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([new Base(), $name], $arguments);
    }
}