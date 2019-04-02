<?php
namespace app\backstage\controller;

use think\Controller;
use think\Db;
use think\Session;

class Login extends controller{
	
	public function index()
	{
		return $this->fetch();
	}

	public function dologo()
	{
		$post = input('post.');
		$post['password'] = md5(md5('t_'.$post['password']));
		$find = DB::name('username')->where('user="'.$post['user'].'" and password="'.$post['password'].'"')->find();
		if ($find) {
			Session::set('id',$find['id']);
			$info = array('message'=>'success');
			return json_encode($info);
			exit;
		} else {
			$info = array('message'=>'error');
			return json_encode($info);
			exit; 
			// 
		}
	}
}