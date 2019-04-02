<?php
namespace app\backstage\controller;

use think\Controller;

class Index extends Model{
	
	public function index()
	{
		return $this->fetch();
	}
}