<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html; charset=utf-8");
class IndexController extends Controller {
	public function index(){
    	$this->display();
    }
    public function student(){
        $where['zhanghao']=$_SESSION['login']['username'];
        $where['check']='0'; 
        $count=M('message')->where($where)->count();
        $this->assign('count',$count);
        $this->assign('demo',$demo);
        $this->display();
    }
    public function news(){
        $where['zhanghao']=$_SESSION['login']['username'];
        $where['check']='0';
        $where['huifu']!='等待回复';
        $count=M('message')->where($where)->count();
        $data['check']='1';
        if($count!=0){
          echo '<script>confirm("你有'.$count.'条未读回复,请查看");
        location.href="'.U('Message/messagelist').'";</script>';
        M('message')->where(array('zhanghao'=>$_SESSION['login']['username']))->save($data);   
        }
       
        else
           echo '<script>alert("你没有未读回复");
        location.href="'.U('Index/student').'";</script>'; 
        
        $this->display();
    }
    public function banzhuren(){
        $where['classes']=$_SESSION['login']['classes'];
        $where['huifu']='等待回复';
        $count=M('message')->where($where)->count();
        $this->assign('count',$count);
        $this->display();
    }
    public function news1(){
        $where['classes']=$_SESSION['login']['classes'];
        $where['huifu']='等待回复';
        $count=M('message')->where($where)->count();
        if($count!=0){
          echo '<script>confirm("你有'.$count.'条未读留言,请查看");
        location.href="'.U('Message/message_check1').'";</script>';   
        }
       
        else
           echo '<script>alert("没有等待回复的留言");
        location.href="'.U('Index/banzhuren').'";</script>'; 
        
        $this->display();
    }
    public function login(){
     	$username = $_POST['username'];
     	$login = $_POST["login"];
     	$where = array();    		
		    $where['username'] = $_POST['username'];
		    $where['pwd'] = $_POST['pwd'];
		// $session=session('username','$username');
		
    	if($login==0){
    		$data = M('student')->where($where)->find();
			$_SESSION['login']['id'] = $data['id'];
			$_SESSION['login']['username'] = $username;
            $_SESSION['login']['classes'] = $data['classes'];
    	if(!empty($data))
    	{	

    		echo '<script>alert("登录成功！");location.href="'.U('Index/student').'"</script>';
    	}
    	else{
    		echo '<script>alert("登录失败！");location.href="'.U('Index/index').'"</script>';
    	}
    	}
        if($login==1){
            $data = M('banzhuren')->where($where)->find();
            $_SESSION['login']['id'] = $data['id'];
             $_SESSION['login']['classes'] = $data['classes'];
             $_SESSION['login']['cx'] = $data['cx'];
            $_SESSION['login']['username'] = $username;
        if(!empty($data))
        {   
            echo '<script>alert("登录成功！");location.href="'.U('Index/banzhuren').'"</script>';
        }
        else{
            echo '<script>alert("登录失败！");location.href="'.U('Index/index').'"</script>';
        }   
    }
    	if($login==2){
    		$data = M('teacher')->where($where)->find();
    		$_SESSION['login']['id'] = $data['id'];
			$_SESSION['login']['username'] = $username;
            $_SESSION['login']['cx'] = $data['cx'];
            $_SESSION['login']['xy'] = $data['xy'];
    	if(!empty($data))
    	{	
    		echo '<script>alert("登录成功！");location.href="'.U('Index/teacher').'"</script>';
    	}
    	else{
    		echo '<script>alert("登录失败！");location.href="'.U('Index/index').'"</script>';
    	}	
    }	
    }
    public function logout(){
		unset($_SESSION['login']);
		echo '<script>alert("注销成功！");location.href="'.U('Index/index').'"</script>';
	}
 }