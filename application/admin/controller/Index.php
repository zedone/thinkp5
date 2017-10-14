<?php
	namespace app\admin\controller;
	use app\admin\controller\Base;
	use think\Db;
	class Index extends Base
	{

		//执行函数之前必须执行_intialize方法
		
		public function index(){
			$cateres = Db::name('cate')->order('id desc')->select();
			//分配到模板中
			$this->assign('cateres',$cateres);
			return $this->fetch();
		}
	}