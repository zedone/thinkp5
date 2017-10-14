<?php
namespace app\admin\model;
use think\Model;
class Article extends Model{
	//关联
	public function cate(){
		return $this->belongsTo('cate','cateid');
	} 
	
}