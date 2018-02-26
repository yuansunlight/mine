<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html; charset=utf-8");
class MessageController extends Controller {
	public function publish(){
		if(IS_POST){
			$data=$_POST;
			$data['classes']=$_SESSION['login']['classes'];
			M('message')->add($data);
			echo "<script>alert('留言发布成功');location.href='".U('messagelist')."'</script>";
		}
		$name=M('student')->where(array('id'=>$_SESSION['login']['id']))->getField('name');
		$this->assign('name',$name);
		$this->assign('username',$_SESSION['login']['username']);
		$this->display();
	}
	public function reply(){
		if(IS_POST){
			$data1=$_POST;
			$data1['huifuren']=$_SESSION['login']['cx'];
			$data1=M('message')->where(array('id'=>$_GET['id']))->save($data1);
			echo "<script>alert('留言回复成功');location.href='".U('message_checked')."'</script>";
		}
		else{
			$id=$_GET['id'];
			$data=M('message')->where(array('id'=>$id))->find();
			$this->assign('data',$data);
			$this->display();
		}
			
	}
	public function reply1(){
		if(IS_POST){
			$data1=$_POST;
			$data1['huifuren']=$_SESSION['login']['cx'];
			$data1=M('message')->where(array('id'=>$_GET['id']))->save($data1);
			echo "<script>alert('留言回复成功');location.href='".U('message_checked1')."'</script>";
		}
		else{
			$id=$_GET['id'];
			$data=M('message')->where(array('id'=>$id))->find();
			$this->assign('data',$data);
			$this->display();
		}
			
	}
	public function messagelist(){	
		$data=M('message')->where(array('zhanghao'=>$_SESSION['login']['username']))->select();
		$this->assign('data',$data);
		$this->display();
	}
	// public function notice(){	
	// 	if(IS_GET)
	// 	{   
	// 		$where['biaoti']=array('like','%'.$_GET['biaoti'].'%');
	// 	}
	// 	$data = M('xinwentongzhi')->where($where)->select();
	// 	$count=count($data);
	// 	if($count>0){
	// 		// 2每页显示多少记录
	// 		$per_page_num =3;
	// 		// 3总页数
	// 		$pages = ceil($count/$per_page_num);
	// 		// 当前页  到哪一页
	// 		$page = empty($_GET['page'])?1:$_GET['page'];
	// 		// 防止用户乱输入值
	// 		if($page < 0) 
	// 			$page = 1;
	// 		if($page > $pages)
	// 			$page = $pages; 
	// 		// 从第几个记录开始
	// 		$page_num = ($page-1)*$per_page_num;
	// 		$limit = "{$page_num}, {$per_page_num}";  //limit 0,2 2,2 4,2
	// 		// 上一页
	// 		$pre = ($page-1)<=0?1:($page-1);
	// 		// 下一页
	// 		$next = $page>=$pages?$page:$page+1;
	// 	}
	// 	$data = M('xinwentongzhi')->where($where)->limit($limit)->select();
	// 	$this->assign('data', $data);
	// 	$this->assign('page', $page);
	// 	$this->assign('pages', $pages);
	// 	$this->assign('pre', $pre);
	// 	$this->assign('next', $next);
	// 	$this->assign('count',$count);
		
	// 	$this->display();
	
	// }
	public function message_check(){
		if(IS_GET){
			$where=array();
			$where['zhanghao']=array('like','%'.$_GET['username'].'%');
			$where['xingming']=array('like','%'.$_GET['name'].'%');
			$username=$_GET['username'];
		}
		$where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		foreach ($where1 as $key => $value) {
		foreach ($value as $k => $val) {				
				$q[]=$val;
			}	
		}
		if($q){
			$where['classes']=array('in',$q);
			$where['huifu']=array('EQ','等待回复');
		$data = M('message')->where($where)->select();
		$this->assign('data', $data);
		$this->assign('username', $username);
		}
		// $where['bid']=array('in',$q);
		// $where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		// $this->assign('class',$q);
		
		$this->display();
	
	}
	public function message_checked(){
		if(IS_GET){
			$where=array();
			$where['zhanghao']=array('like','%'.$_GET['username'].'%');
			$where['xingming']=array('like','%'.$_GET['name'].'%');
			$username=$_GET['username'];
		}

		$where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		foreach ($where1 as $key => $value) {
		foreach ($value as $k => $val) {				
				$q[]=$val;
			}	
		}
		if($q){
			$where['classes']=array('in',$q);
			$where['huifu']=array('NEQ','等待回复');
		$data = M('message')->where($where)->select();
		$this->assign('data', $data);
		$this->assign('username', $username);
		}
		$this->display();
	}
	public function message_check1(){
		if(IS_GET){
			$where=array();
			
			$where['zhanghao']=array('like','%'.$_GET['username'].'%');
			$where['xingming']=array('like','%'.$_GET['name'].'%');
			$username=$_GET['username'];
		}
$where['classes']=array('eq',$_SESSION['login']['classes']);
		$where['huifu']=array('EQ','等待回复');
		$data = M('message')->where($where)->select();
		$this->assign('data', $data);
		$this->assign('username', $username);
		$this->display();
	
	}
	public function message_checked1(){
		if(IS_GET){
			$where=array();
			$where['zhanghao']=array('like','%'.$_GET['username'].'%');
			$where['xingming']=array('like','%'.$_GET['name'].'%');
			$username=$_GET['username'];
		}
		$where['classes']=array('eq',$_SESSION['login']['classes']);
		$where['huifu']=array('NEQ','等待回复');
		$data = M('message')->where($where)->select();
		$this->assign('data', $data);
		$this->assign('username', $username);
		$this->display();
	}
	public function del(){
		$data=M('message')->where(array('id'=>$_GET['id']))->delete();
		if($data)
			echo "<script>alert('成功删除留言');location.href='".U('message_checked')."'</script>";
	}
	public function del1(){
		$data=M('message')->where(array('id'=>$_GET['id']))->delete();
		if($data)
			echo "<script>alert('成功删除留言');location.href='".U('message_checked1')."'</script>";
	}
}
