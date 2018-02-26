<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html; charset=utf-8");
class TogetherController extends Controller {
	public function together(){
		$where['status']='1';
		$where['year']='2016';
		if(IS_POST){
			$where['year']=$_POST['year'];
		}
		$a=M('award')->where($where)->select();
		foreach ($a as $k => $val) {
			$w['mingcheng']=$val['mingcheng'];
			$w['status']='1';
			$awards=M('award')->where($w)->select();
			if($val['mingcheng']=='院长奖学金')
				$this->assign('award1',$awards);
			if($val['mingcheng']=='公益单项奖')
				$this->assign('award2',$awards);
			if($val['mingcheng']=='竞赛单项奖')
				$this->assign('award3',$awards);
			if($val['mingcheng']=='一等奖')
				$this->assign('award4',$awards);
			if($val['mingcheng']=='二等奖')
				$this->assign('award5',$awards);
			if($val['mingcheng']=='三等奖')
				$this->assign('award6',$awards);
			if($val['mingcheng']=='优秀学生干部')
				$this->assign('award7',$awards);
			if($val['mingcheng']=='优秀学生')
				$this->assign('award8',$awards);
			if($val['mingcheng']=='先进个人')
				$this->assign('award9',$awards);
			// dump($awards);
		}
		$this->assign('yy',$where['year']);
		$this->display();
		}
}