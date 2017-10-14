<?php
	namespace app\admin\Validate;
	use think\Validate;

	class Article extends Validate
	{
	//验证规则
		protected $rule = [
			'title' => 'require|max:25',
			'cateid' => 'require',
		];

		protected $message = [
			'title.require' => '文章标题必须填写',
			'title.max' => '文章标题长度不得大于25',
			'cateid.require' => '请选择栏目',


		];
		//验证场景
		protected $scene = [
			'add' => ['title','cateid'],
			'edit' => ['title','cateid'],
		];

	}