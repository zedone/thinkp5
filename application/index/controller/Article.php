<?php 
namespace app\index\controller;
use app\index\controller\Base;
class Article extends Base
{
    public function index()
    {
    	$arid=input('arid');
    	$articleres = db('article')->find($arid);
        $relateres=$this->relat($articleres['keywords'],$articleres['id']);
        //dump($relateres);die;
        db('article')->where('id','=',$arid)->setInc('click');
    	$cates=db('cate')->find($articleres['cateid']);
        //推荐
        $recres = db('article')->where(array('cateid'=>$cates['id'],'state'=>1))->limit(8)->select(); 

    	//assign是分配模板可以用数组方式分配 第一个是变量第二个是自定义名
    	$this->assign(array(
    		'articleres'=>$articleres,
    		'cates'=>$cates,
            'recres'=>$recres,
            'relateres'=>$relateres
    		));

   		return $this->fetch('article');
    }
    public function relat($keywords,$id){
        $arr = explode(',',$keywords);
        //创造静态数组
        static $relateres=array();
        foreach ($arr as $k => $v) {
            $map['keywords']=['like','%'.$v.'%'];
            $map['id']=['neq',$id];
            $artres = db('article')->where($map)->order('id desc')->limit(8)->select();
            $relateres=array_merge($relateres,$artres);
        }
        if($relateres){
            $relateres=arr_unique($relateres);

        return $relateres;
        }
        
    }
}
