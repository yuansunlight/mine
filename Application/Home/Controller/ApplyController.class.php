<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html; charset=utf-8");
class ApplyController extends Controller {
	public function apply(){	
		if($_POST['leibie']){
			$honor = M('honor')->where(array('leibie'=>$_POST['leibie']))->select();
			// $this->assign('tiaojian',$tiaojian);
		}
		if($_POST['mingcheng1']){
			$tiaojian = M('honor')->where(array('mingcheng'=>$_POST['mingcheng1']))->find();
			$this->assign('tiaojian',$tiaojian);
		}	$data = M('ceping')->where(array('username'=>$_SESSION['login']['username']))->find();
		if(IS_POST&&$_POST['instruction']){
			if($_POST['mingcheng']=='优秀学生干部')
			{
				if(M('ceping')->where(array('username'=>$_SESSION['login']['username']))->getField('leader')!=1)
				echo "<script>alert('学生干部才能申报');location.href='".U('apply')."'</script>";
				else{
					$_POST['cid']=$_POST['classes'];
					$a=M('award')->add($_POST);
					if($a)
					echo "<script>alert('申请提交成功');location.href='".U('applylist')."'</script>";
				}
			}
			else{
			$_POST['cid']=$_POST['classes'];
			$a=M('award')->add($_POST);
			if($a)
			echo "<script>alert('申请提交成功');location.href='".U('applylist')."'</script>";
			}
			
			
		}
		// $honor = M('honor')->order('id asc')->select();
		$this->assign('data',$data);
		$this->assign('year',$_POST['year']);
		$this->assign('leibie',$_POST['leibie']);
		$this->assign('mingcheng',$_POST['mingcheng1']);
		$this->assign('honor',$honor);
		$key=M('rukou')->where(array('id'=>'1'))->getField('rukou');
		if($key==1)
			$this->display();
		else
			echo "<script>alert('申报入口未开启!');location.href='".U('applylist')."'</script>";
		
	}
	public function applylist(){
		$data = M('award')->where(array('username'=>$_SESSION['login']['username']))->order('id asc')->select();
		// $this->assign('data',$data);
		$count=count($data);
		if($count>0){
			// 2每页显示多少记录
			$per_page_num =1;
			// 3总页数
			$pages = ceil($count/$per_page_num);
			// 当前页  到哪一页
			$page = empty($_GET['page'])?1:$_GET['page'];
			// 防止用户乱输入值
			if($page < 0) 
				$page = 1;
			if($page > $pages)
				$page = $pages; 
			// 从第几个记录开始
			$page_num = ($page-1)*$per_page_num;
			$limit = "{$page_num}, {$per_page_num}";  //limit 0,2 2,2 4,2
			// 上一页
			$pre = ($page-1)<=0?1:($page-1);
			// 下一页
			$next = $page>=$pages?$page:$page+1;
		}
		$data = M('award')->where(array('username'=>$_SESSION['login']['username']))->order('id asc')->limit($limit)->select();
		$this->assign('data', $data);
		$this->assign('page', $page);
		$this->assign('pages', $pages);
		$this->assign('pre', $pre);
		$this->assign('next', $next);
		$this->assign('count',$count);
		$this->display();
	}
}
