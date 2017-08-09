<?php

//Model 模型  Entry 入口
//from表单 载入函数
//$className 类名
include "./functions.php";
//载入类
function __autoload($className)
{
    $dir = (substr($className, -10) == 'Controller') ? 'controller' : 'tool';
    include "./{$dir}/{$className}.php";
}


//控制器默认访问Entry
$c = isset($_GET['c']) ? $_GET['c'] : 'Entry';
//控制器
define('CONTROLLER',strtolower($c));
//方法
$a = isset($_GET['a']) ? $_GET['a'] : 'index';
//方法
define('ACTION',strtolower($a));

$className = $c . 'Controller';
call_user_func_array([new $className, $a], []);




//action 功能