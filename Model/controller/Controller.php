<?php


class Controller{
//$data  获得数据，而且是关联数组
 protected function display($data){
     // 通过常量把 显示页面载入
     include "./view/" . CONTROLLER . '/' . ACTION . '.php';
//     p($data);
 }




}