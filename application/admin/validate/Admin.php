<?php
	namespace app\admin\Validate;
	use think\Validate;

	class Admin extends Validate
	{
	//验证规则
		protected $rule = [
			'username' => 'require|max:40|unique:admin',
			'password' => 'require',
		];

		protected $message = [
			'username.require' => '管理员名称必须填写',
			'username.max' => '管理员名称不能大于25位',
			'password.max' => '管理员密码必须填写',

		];

		protected $scene = [
			'add' => ['username'=>'require|unique:admin','password'],
			'edit' => ['username'=>'require|unique:admin'],
		];

	}