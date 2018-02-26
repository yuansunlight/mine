<?php 
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html; charset=utf-8");
class ManageController extends Controller {
	public function upload(){    
		$upload = new \Think\Upload();// 实例化上传类    
		$upload->maxSize   =     3145728 ;// 设置附件上传大小    
		$upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
		$upload->rootPath  = './Public/Uploads/';
		// $upload->savePath  =      './Public/Uploads/'; // 设置附件上传目录    // 上传文件    
		// $upload->savePath  =  './Public/Uploads/';
		 
		$info   =   $upload->upload();    
		if(!$info) {// 上传错误提示错误信息        
		$this->error($upload->getError());    
	}
		else{// 上传成功        
			$this->success('上传成功！');    
		}
		}
    public function addhonor(){
    	if(IS_POST){
    		$data=M('honor')->add($_POST);
    		if($data)
    		echo '<script>alert("奖项添加成功！");location.href="'.U('Manage/addhonor').'"</script>';
    		else
    		echo '<script>alert("奖项添加失败！");location.href="'.U('Manage/addhonor').'"</script>';

    	}

    	$data=M('honor')->order('id asc')->select();
    	$select=M('select')->order('id asc')->select();
    	$this->assign('data',$data);
    	$this->assign('select',$select);
        $this->display();
    }

   	public function del(){
		$id=$_GET['id'];
		$data=M('honor')->delete($id);
		if($data)
		echo '<script>alert("删除成功！");location.href="'.U('Manage/addhonor').'"</script>';
	}

	public function edit(){
			if(IS_POST){
				$edit=M('honor')->where(array('id'=>$_GET['id']))->save($_POST);
				if($edit)
				echo '<script>alert("修改成功！");location.href="'.U('Manage/addhonor').'"</script>';
			}
			$data=M('honor')->where(array('id'=>$_GET['id']))->find();
			$this->assign('data',$data);
	
			$this->display();
		}
	}