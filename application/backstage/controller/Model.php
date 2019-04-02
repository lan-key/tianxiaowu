<?php
namespace app\backstage\controller;

use think\Controller;
use think\Session;
use think\Request;
class Model extends Controller{

	public function _initialize()
	{
		$user_id = Session::get('id');
		$request= Request::instance();
		$controller_name = $request->controller();
		$module = $request->module();
		$action = $request->action();

		$this->assign('controller',$controller_name);
		$this->assign('module',$module);
		$this->assign('action',$action);
		if ($controller_name == "Form") {
			$this->assign('title','商品添加');
		} else{
			$this->assign('title','未知');
		}
		if ($user_id == "") {
			$this->redirect('Login/index');
		}
	}
}