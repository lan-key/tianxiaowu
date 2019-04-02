<?php
namespace app\backstage\controller;

use think\Controller;
use think\Db;

class Goods extends Model{
	
	public function index()
	{
		$select = Db::name('goods')->select();
		foreach($select as $v=>$val) {
			// $select[$v]['file'] = unset(explode('|',$val['files']))[0];
			$arr = array_filter(explode('|',$val['files']));
			dump($arr);
			// unset($arr['0']);
		}
		echo "<pre>";
		var_dump($select);
		exit;
		$this->assign('data',$select);
		return $this->fetch();
	}

	public function add()
	{
		return $this->fetch();
	}

	public function insert()
	{
		$post = input('post.');
		$post['addtime'] = time();

		$insert = Db::name('goods')->insert($post);
		if ($insert) {
			echo json_encode(1);
			exit;
		} else {
			echo json_encode(0);
			exit; 
		}
	}

	public function file()
	{
		$file = request()->file('file');
	    // 移动到框架应用根目录/public/uploads/ 目录下 
	    if($file){
	        $info = $file->move(ROOT_PATH . 'public/static/goods/' . DS . 'uploads');
	        if($info){
	            // 成功上传后 获取上传信息
	            // 输出 20160820/42a79759f284b767dfcb2a0197904287.jpg
	            $url = $info->getSaveName();
	            echo json_encode($url);
	            exit;
	        }else{
	            // 上传失败获取错误信息
	            echo $file->getError();
	        }
	    }
	}
}