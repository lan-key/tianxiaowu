<?php
namespace app\index\controller;
use think\Controller;
use \think\Hook;
class Index extends Controller
{
      //访问url  http://app.tp5.com/index.php/api/index/index?id=5
    public function index()
    {
      session_start();
      session('UID',123);
      $id = input('id');
      $params1  = '参数1';
      $res = Hook::listen('api_init',$params1,'app\\index\\behavior\\AopTest');
      echo var_export($res, true);
      echo 'api index';
      
      $params2 = '参数2';
      Hook::listen('apiEnd',$params2);
    }
}

