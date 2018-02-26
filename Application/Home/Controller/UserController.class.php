<?php
namespace Home\Controller;
use Think\Controller;
use PHPExcel_IOFactory;
use PHPExcel;
use Behavior;
header("Content-Type: text/html; charset=utf-8");
class UserController extends Controller {
	public function index(){	
		$data = M('student')->where(array('id'=>$_SESSION['login']['id']))->find();
		$data['time']=date('Y-m-d',time());
		return $data;	
	}
	public function message(){	
		$this->assign('data', $this->index());
		$this->display();
	}
	public function update(){
		
		if(IS_POST){
			$update=$_POST;
			M('student')->where(array('id'=>$_SESSION['login']['id']))->save($update);
			echo "<script>alert('信息修改成功');location.href='".U('message')."'</script>";
		}
		else{
			$this->assign('update', $this->index());
			$this->display();
		}	
	}	
		public function manage(){	
		if(IS_POST){
			
			$_SESSION['POST']['classes'] =array('like','%'.$_POST['classes'].'%');
			
			$_SESSION['POST']['username'] = array('like','%'.$_POST['username'].'%');
			
			$_SESSION['POST']['name'] = array('like','%'.$_POST['name'].'%');
			
		}

		$where['classes'][]=$_SESSION['POST']['classes'];
		$where['username']=$_SESSION['POST']['username'];
		$where['name']=$_SESSION['POST']['name'];
		$where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		foreach ($where1 as $key => $value) {
			foreach ($value as $k => $val) {				
				$q[]=$val;
			}	
		}
		if($q){
		$where['classes'][]=array('in',$q);
		$this->assign('class',$q);
		$classes=trim($where['classes']['0']['1'],'%');
		// dump($where);
		// dump($classes);
		if($where['classes']['0']==NULL&&$where['username']==NULL&&$where['name']==NULL)
		{
			$where=0;
		}
		if($where['classes']['0']['1']=='%%'&&$where['username']['1']=='%%'&&$where['name']['1']=='%%')
		{
			unset($_SESSION['POST']);
		}
		$data = M('student')->where($where)->select();
		$count=count($data);
		if($count>0){
			// 2每页显示多少记录
			$per_page_num =15;
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
		$data =M('student')->where($where)->limit($limit)->select();
		$this->assign('data', $data);
		$this->assign('page', $page);
		$this->assign('pages', $pages);
		$this->assign('pre', $pre);
		$this->assign('next', $next);
		$this->assign('count',$count);
		$this->assign('classes',$classes);
		}
		$this->display();
	}
	public function manage1(){	
		if($_SESSION['POST']['username'] !=$_SESSION['login']['username']){
			unset($_SESSION['POST']);
		}		
		if(IS_POST){
			
			$_SESSION['POST']['username'] = array('like','%'.$_POST['username'].'%');
			
			$_SESSION['POST']['name'] = array('like','%'.$_POST['name'].'%');
			
		}
		
		$where['username']=$_SESSION['POST']['username'];
		$where['name']=$_SESSION['POST']['name'];
		
		if($where['username']==NULL&&$where['name']==NULL)
		{
			$where=null;
		}
		if($where['username']['1']=='%%'&&$where['name']['1']=='%%')
		{
			unset($_SESSION['POST']);
		}
		
		$where['classes']=array('eq',$_SESSION['login']['classes']);
		// dump($where);
		$data = M('student')->where($where)->select();
		$count=count($data);
		if($count>0){
			// 2每页显示多少记录
			$per_page_num =15;
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
		$data = M('student')->where($where)->limit($limit)->select();
		$this->assign('data', $data);
		$this->assign('page', $page);
		$this->assign('pages', $pages);
		$this->assign('pre', $pre);
		$this->assign('next', $next);
		$this->assign('count',$count);
		$this->display();
	}

	public function edit(){
		if(IS_POST){
			$data=$_POST;
			$data['username'] = $_POST['username'];
			M('student')->where(array('username'=>$data['username']))->save($data);
			echo "<script>alert('信息修改成功');location.href='".U('manage')."'</script>";
		}
		else{
			$edit=M('student')->where(array('id'=>$_GET['id']))->find();
			$this->assign('edit', $edit);
			$this->display();
		}	
	}
	public function del(){
		$id = $_GET['id'];
		M('student')->delete($id);
		echo "<script>alert('删除成功');location.href='".U('manage')."'</script>";
	}
 	public function add(){
 		if(IS_POST0){
 			$data=$_POST;
 			$row=M('student')->add($data);
 			if($row)
 			$this->success('学生信息添加成功','manage'); 
 		}
 		$where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		foreach ($where1 as $key => $value) {
			foreach ($value as $k => $val) {				
				$q[]=$val;
			}	
		}
		// dump($q);
		$this->assign('class',$q);
 		$this->display();
 	}
 	  
 	  Public  function upload(){  
            if (!empty($_FILES)){  
            $upload = new \Think\Upload();                      // 实例化上传类  
            $upload->maxSize   =     10485760 ;                 // 设置附件上传大小  
            $upload->exts      =     array('xls','xlsx');       // 设置附件上传类型  
            $upload->rootPath  = './Public/home/uploads/';             // 设置附件上传根目录  
            $upload->autoSub   = false;                         // 将自动生成以photo后面加时间的形式文件夹，关闭  
            // 上传文件  
            $info   =   $upload->upload();                                  // 上传文件  
            $exts   = $info['myfile']['ext'];                                 // 获取文件后缀  
            $filename = $upload->rootPath.$info['myfile']['savename']; 
            // dump( $exts)  ;exit;
                   // 生成文件路径名  
            if(!$info) {                                                    // 上传错误提示错误信息  
                $this->error($upload->getError());   
            }else{                                                          // 上传成功  
                import("Org.Util.PHPExcel");                      
                 // 导入PHPExcel类库，因为PHPExcel没有用命名空间，只能import导入  
         
                $PHPExcel = new \PHPExcel();                                // 创建PHPExcel对象，注意，不能少了\  
                if ($exts == 'xls') {                                       // 如果excel文件后缀名为.xls，导入这个类  
                    import("Org.Util.PHPExcel.Reader.Excel5");  
                    $PHPReader = new \PHPExcel_Reader_Excel5();  
                }
                 else if ($exts == 'xlsx') {  
                        import("Org.Util.PHPExcel.Reader.Excel2007");  
                        $PHPReader = new \PHPExcel_Reader_Excel2007();  
  
                    }  

                $PHPExcel=$PHPReader->load($filename); 
                $currentSheet = $PHPExcel->getSheet(0);                      // 获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推  
                $allColumn = $currentSheet->getHighestColumn();              // 获取总列数  
                $allRow = $currentSheet->getHighestRow();                    // 获取总行数  
               for ($i = 2; $i <= $allRow; $i++) {  
                    $data_p['username'] =$PHPExcel->getActiveSheet()->getCell("A".$i)->getValue();  
                    $data_p['pwd'] =$PHPExcel->getActiveSheet()->getCell("B".$i)->getValue();  
                    $data_p['name']=$PHPExcel->getActiveSheet()->getCell("C".$i)->getValue();  
                    $data_p['sex']= $PHPExcel->getActiveSheet()->getCell("D".$i)->getValue();  
                    $data_p['home']=$PHPExcel->getActiveSheet()->getCell("E".$i)->getValue();  
                    $data_p['bankcard']=$PHPExcel->getActiveSheet()->getCell("F".$i)->getValue();  
                    $data_p['classes'] =$PHPExcel->getActiveSheet()->getCell("G".$i)->getValue();  
                    $data_p['major'] =$PHPExcel->getActiveSheet()->getCell("H".$i)->getValue();  
                    $data_p['phone'] =$PHPExcel->getActiveSheet()->getCell("I".$i)->getValue();   
                    $ex=M('student')->add($data_p);
              }     
            if($ex){                                           
               $this->success('学生信息导入成功','manage');  
            }else{  
                $this->error("导入失败，原因可能是excel表中格式错误","5");// 提示错误  
               }  
            }  
        }else {  
          $this->display();   
        }      
    } 
    public function add_banzhuren(){
		if(IS_POST){
			$_POST['tid']=$_SESSION['login']['id'];
			$data=M('banzhuren')->add($_POST);
			if($data)
			echo '<script>alert("添加成功！");location.href="'.U('User/banzhuren_list').'"</script>';
		}
		$this->display();
	}  
	public function banzhuren_list(){
		if(IS_GET){
			$where['username']=array('like','%'.$_GET['username'].'%');
			$where['cx']=array('like','%'.$_GET['name'].'%');
		}
		$where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		foreach ($where1 as $key => $value) {
			foreach ($value as $k => $val) {				
				$q[]=$val;
			}	
		}
		if($q){
		$where['classes']=array('in',$q);
		$data=M('banzhuren')->where($where)->select();
		}
		
		// dump($where);
		
		
		$this->assign('data',$data);
		$this->display();
	}
	public function banzhuren_del(){
		$id=$_GET['id'];
		$data=M('banzhuren')->delete($id);
		if($data)
		echo '<script>alert("删除成功！");location.href="'.U('User/banzhuren_list').'"</script>';
	}
public function banzhuren_edit(){
		if(IS_POST){
			$edit=M('banzhuren')->where(array('id'=>$_GET['id']))->save($_POST);
			if($edit)
			echo '<script>alert("修改成功！");location.href="'.U('User/banzhuren_list').'"</script>';
		}
		$data=M('banzhuren')->where(array('id'=>$_GET['id']))->find();
		$this->assign('data',$data);
		$this->display();
	}
	Public  function banzhurenupload(){  
            if (!empty($_FILES)){  
            $upload = new \Think\Upload();                      // 实例化上传类  
            $upload->maxSize   =     10485760 ;                 // 设置附件上传大小  
            $upload->exts      =     array('xls','xlsx');       // 设置附件上传类型  
            $upload->rootPath  = './Public/home/uploads/';             // 设置附件上传根目录  
            $upload->autoSub   = false;                         // 将自动生成以photo后面加时间的形式文件夹，关闭  
            // 上传文件  
            $info   =   $upload->upload();                                  // 上传文件  
            $exts   = $info['myfile']['ext'];                                 // 获取文件后缀  
            $filename = $upload->rootPath.$info['myfile']['savename']; 
            // dump( $exts)  ;exit;
                   // 生成文件路径名  
            if(!$info) {                                                    // 上传错误提示错误信息  
                $this->error($upload->getError());   
            }else{                                                          // 上传成功  
                import("Org.Util.PHPExcel");                      
                 // 导入PHPExcel类库，因为PHPExcel没有用命名空间，只能import导入  
         
                $PHPExcel = new \PHPExcel();                                // 创建PHPExcel对象，注意，不能少了\  
                if ($exts == 'xls') {                                       // 如果excel文件后缀名为.xls，导入这个类  
                    import("Org.Util.PHPExcel.Reader.Excel5");  
                    $PHPReader = new \PHPExcel_Reader_Excel5();  
                }
                 else if ($exts == 'xlsx') {  
                        import("Org.Util.PHPExcel.Reader.Excel2007");  
                        $PHPReader = new \PHPExcel_Reader_Excel2007();  
  
                    }  

                $PHPExcel=$PHPReader->load($filename); 
                $currentSheet = $PHPExcel->getSheet(0);                      // 获取表中的第一个工作表，如果要获取第二个，把0改为1，依次类推  
                $allColumn = $currentSheet->getHighestColumn();              // 获取总列数  
                $allRow = $currentSheet->getHighestRow();                    // 获取总行数  
               for ($i = 2; $i <= $allRow; $i++) {  
                    $data_p['username'] =$PHPExcel->getActiveSheet()->getCell("A".$i)->getValue();  
                    $data_p['pwd'] =$PHPExcel->getActiveSheet()->getCell("B".$i)->getValue();  
                    $data_p['cx'] =$PHPExcel->getActiveSheet()->getCell("C".$i)->getValue();  
                    $data_p['classes'] = $PHPExcel->getActiveSheet()->getCell("D".$i)->getValue();  
                    $data_p['tid'] =$_SESSION['login']['id'];
                    $ex=M('banzhuren')->add($data_p);
              }     
            if($ex){                                           
               $this->success('班主任信息导入成功','banzhuren_list');  
            }else{  
                $this->error("导入失败，原因可能是excel表中格式错误","5");// 提示错误  
               }  
            }  
        }else {  
          $this->display();   
        }      
    }   
}
