<?php
	//这是验证文件
	namespace app\admin\Validate;
	use think\Validate;

	class Cate extends Validate
	{
	//验证规则
	
		protected $rule = [
			'catename' => 'require|max:25|unique:cate',
		];	
		protected $message = [
			'catename.require' => '栏目名称必须填写',
			'catename.max' => '栏目名称不能大于25位',
			'catename.unique' => '栏目名称不能重复',

		];
		protected $scene = [
			'add' => ['catename'=>'require|unique:cate'],
			'edit' => ['catename'=>'require|unique:cate'],
		];
	}