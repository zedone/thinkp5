<?php
namespace app\index\controller;
use app\index\controller\Base;
class Cate extends Base
{
    public function index()
    {
    	$cateid=input('cateid');
    	//查询当前栏目的名称
    	$cates = db('cate')->find($cateid);
    	//assign分配模板,第一个是上述变量名,第二个是自定义名
    	$this->assign('cates',$cates);
    	//查询当前栏目下的文章
    	$articles=db('article')->where(array('cateid'=>$cateid))->paginate(3);
    	$this->assign('articles',$articles);  
        return $this->fetch('cate');
    }
  
}
