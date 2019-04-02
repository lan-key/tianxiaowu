<?php
namespace app\index\behavior;

class AopTest{

	public function apilnit(&$params) {
		$id = input('id');
		$uid = session('UID');

		echo PHP_EOL;
		echo 'ip检查'.$params.'GET'.$id;
		echo 'uid='.$uid;
		echo PHP_EOL;

		$request = \think\Request::instract();
		$controller_name = $request->controller();
		$model_name = $request->module();
		$action_name = $request->action();

		echo 'controller_name='.$controller_name.'model_name'.$model_name.'action_name'.$model_name;
	}

	public function apiEnd(&$params){
		echo PHP_EOL;
		echo '日志记录'.$params;
		echo PHP_EOL;
	}
}