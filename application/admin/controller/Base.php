<?php
	namespace app\admin\controller;
	use think\Controller;
	class Base extends Controller
	{
			//初始化函数
		public function _initialize(){
			if(!session('username')){
				$this->error('请登录系统');
			}
		}

	}