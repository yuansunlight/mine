<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html; charset=utf-8");
class IndexController extends Controller {
    public function index(){
        $this->display();
    }
    public function login(){
     	$where = array();    		
		    $where['username'] = $_POST['username'];
		    $where['pwd'] = $_POST['pwd'];
    		$data = M('admin')->where($where)->find();
			$_SESSION['login']['id'] =$data['id'];
			$_SESSION['login']['username'] = $data['username'];
    	if(!empty($data))
    	{	
    		echo '<script>alert("登录成功！");location.href="'.U('Index/admin').'"</script>';
    	}
    	else{
    		echo '<script>alert("登录失败！");location.href="'.U('Index/index').'"</script>';
    	}
    	$this->assign('data',$data);
        $this->display();
    }
    public function logout(){
    	unset($_SESSION['login']);
		echo '<script>alert("注销成功！");location.href="'.U('Index/index').'"</script>';
    }
}