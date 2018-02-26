<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html; charset=utf-8");
class NoticeController extends Controller {
	public function notice(){	
		if(IS_GET)
		{   
			$where['biaoti']=array('like','%'.$_GET['biaoti'].'%');
		}
		// $where['tianjiaren']=$_SESSION['login']['username'];
		$a=M('banzhuren')->where(array('classes'=>$_SESSION['login']['classes']))->getField('tid');
		$b=M('teacher')->where(array('id'=>$a))->getField('username');
		$where['tianjiaren']=$b;
		$data = M('xinwentongzhi')->where($where)->select();
		$count=count($data);
		if($count>0){
			// 2每页显示多少记录
			$per_page_num =3;
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
		$data = M('xinwentongzhi')->where($where)->limit($limit)->select();
		$this->assign('data', $data);
		$this->assign('page', $page);
		$this->assign('pages', $pages);
		$this->assign('pre', $pre);
		$this->assign('next', $next);
		$this->assign('count',$count);
		
		$this->display();
	
	}
	public function notice1(){	
		if(IS_GET)
		{   
			$where['biaoti']=array('like','%'.$_GET['biaoti'].'%');
		}
		$a=M('banzhuren')->where(array('username'=>$_SESSION['login']['username']))->getField('tid');
		$b=M('teacher')->where(array('id'=>$a))->getField('username');
		$where['tianjiaren']=$b;
		$data = M('xinwentongzhi')->where($where)->select();
		$count=count($data);
		if($count>0){
			// 2每页显示多少记录
			$per_page_num =3;
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
		$data = M('xinwentongzhi')->where($where)->limit($limit)->select();
		$this->assign('data', $data);
		$this->assign('page', $page);
		$this->assign('pages', $pages);
		$this->assign('pre', $pre);
		$this->assign('next', $next);
		$this->assign('count',$count);
		
		$this->display();
	
	}
	public function add_notice(){
		if(IS_POST){
			$data=$_POST;
			M('xinwentongzhi')->add($data);
			$data['rukou']=$_POST['rukou'];
			M('rukou')->where(array('id'=>'1'))->save($data);
			echo "<script>alert('通知发布成功');location.href='".U('edit_notice')."'</script>";
			
		}

		$username=$_SESSION['login']['username'];
		$this->assign('username',$username);
		$this->display();
	}
	public function edit_notice(){	
		if(IS_GET)
		{   
			$where['biaoti']=array('like','%'.$_GET['biaoti'].'%');
		}
		$where['tianjiaren']=$_SESSION['login']['username'];
		$data = M('xinwentongzhi')->where($where)->select();
		$count=count($data);
		if($count>0){
			// 2每页显示多少记录
			$per_page_num =3;
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
		$data = M('xinwentongzhi')->where($where)->limit($limit)->select();

		$this->assign('data', $data);
		$this->assign('page', $page);
		$this->assign('pages', $pages);
		$this->assign('pre', $pre);
		$this->assign('next', $next);
		$this->assign('count',$count);
		$this->display();
	
	}
	public function del_notice(){
		$id=$_GET['id'];
		M('xinwentongzhi')->where(array('id'=>$id))->delete();
		echo "<script>alert('删除成功');location.href='".U('edit_notice')."'</script>";
		$this->display();
	}
	public function edit(){
		if(IS_POST){
			$data=$_POST;
			M('xinwentongzhi')->where(array('id'=>$_GET['id']))->save($data);
			echo "<script>alert('修改成功');location.href='".U('edit_notice')."'</script>";
		}
		else{
			$id=$_GET['id'];
			$data=M('xinwentongzhi')->where(array('id'=>$id))->find();
			$this->assign('data',$data);
			$this->display();
		}
		
	}
}
