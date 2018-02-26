<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html; charset=utf-8");
class CepingController extends Controller {
	public function ceping1(){
			$data = M('ceping')->where(array('username'=>$_GET['username']))->select();
			$this->assign('data',$data);
			$this->display();
	}
	public function ceping(){	

			$data = M('ceping')->where(array('username'=>$_SESSION['login']['username']))->select();
			$count=count($data);
			$this->assign('count',$count);
			$this->assign('data',$data);
		
		$this->display();
	}
	public function add_ceping(){	
		if(IS_POST){
			$data=$_POST;
			$data['bid']=$data['classes'];
			$aa=M('ceping')->add($data);
			if($aa)
			echo "<script>alert('测评成绩添加成功');location.href='".U('list_ceping')."'</script>";
		}
		$where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		foreach ($where1 as $key => $value) {
			foreach ($value as $k => $val) {				
				$q[]=$val;
			}	
		}
		// dump($q);
		$this->assign('class',$q);
		$this->assign('data',$data);
		$this->display();
	}
	public function list_ceping(){	
		if(IS_POST){
			$classes=$_POST['classes'];
			$year=$_POST['year'];
			$_SESSION['pp']['year'] =array('like','%'.$_POST['year'].'%');
			$_SESSION['pp']['classes'] =array('like','%'.$_POST['classes'].'%');
			
			$_SESSION['pp']['username'] = array('like','%'.$_POST['username'].'%');
			
			$_SESSION['pp']['name'] = array('like','%'.$_POST['name'].'%');
			
		}
		$classes=trim($_SESSION['pp']['classes']['1'],'%');
		$year=trim($_SESSION['pp']['year']['1'],'%');
		$where['year']=$_SESSION['pp']['year'];
		$where['classes']=$_SESSION['pp']['classes'];
		$where['username']=$_SESSION['pp']['username'];
		$where['name']=$_SESSION['pp']['name'];
		$where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		foreach ($where1 as $key => $value) {
			foreach ($value as $k => $val) {				
				$q[]=$val;
			}	
		}
	
		$this->assign('class',$q);
		if($where['year']==NULL&&$where['classes']==NULL&&$where['username']==NULL&&$where['name']==NULL)
		{
			$where=null;
		}

		if($where['year']['1']=='%%'&&$where['classes']['1']=='%%'&&$where['username']['1']=='%%'&&$where['name']['1']=='%%')
		{
			unset($_SESSION['pp']);
		}
		if($q){
		$where['bid']=array('in',$q);
		$count=count( M('ceping')->where($where)->select());
		if($count>0){
			// 2每页显示多少记录
			$per_page_num =10;
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
		$data = M('ceping')->where($where)->limit($limit)->select();
		// dump($data);
		$this->assign('data', $data);
		$this->assign('page', $page);
		$this->assign('pages', $pages);
		$this->assign('name',trim($where['name'][1],'%'));
		$this->assign('next', $next);
		$this->assign('count',$count);
		$this->assign('classes',$classes);
		$this->assign('year',$year);
		}
		
		$this->display();
	}
	public function list_ceping1(){	
		if(IS_POST){
			$year=$_POST['year'];
			$_SESSION['qq']['year'] =array('like','%'.$_POST['year'].'%');
			
			$_SESSION['qq']['name'] = array('like','%'.$_POST['name'].'%');
			
		}
		$year=trim($_SESSION['qq']['year']['1'],'%');
		// dump($classes);
		$where['year']=$_SESSION['qq']['year'];
		$where['name']=$_SESSION['qq']['name'];
		// $where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		// dump($where);
		if($where['year']==NULL&&$where['name']==NULL)
		{
			$where=null;
		}
		if($where['year']['1']=='%%'&&$where['name']['1']=='%%')
		{
			unset($_SESSION['qq']);
		}
		$where['classes']=array('eq',$_SESSION['login']['classes']);
		$count=count( M('ceping')->where($where)->select());
		if($count>0){
			// 2每页显示多少记录
			$per_page_num =10;
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
		$data = M('ceping')->where($where)->limit($limit)->select();
		$this->assign('data', $data);
		$this->assign('page', $page);
		$this->assign('pages', $pages);
		$this->assign('pre', $pre);
		$this->assign('next', $next);
		$this->assign('count',$count);
		$this->assign('year',$year);
		$this->display();
	}
	public function edit(){
		if(IS_POST){
			$edit=$_POST;
			$edit=M('ceping')->where(array('id'=>$_GET['id']))->save($edit);
			echo "<script>alert('测评成绩修改成功');location.href='".U('list_ceping')."'</script>";
		}
		else{
			$id=$_GET['id'];
			$edit=M('ceping')->where(array('id'=>$id))->find();
			$this->assign('edit',$edit);
			$this->display();
		}
			
	}
	public function del(){
		$id=$_GET['id'];
		M('ceping')->where(array('id'=>$id))->delete();
		echo "<script>alert('删除成功');location.href='".U('list_ceping')."'</script>";
		$this->display();
	}
	public function cepingupload(){
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
            // dump( $filename)  ;exit;
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
                   $data_p['year']=$PHPExcel->getActiveSheet()->getCell("A".$i)->getValue();  
                     $data_p['classes']=$PHPExcel->getActiveSheet()->getCell("B".$i)->getValue();  
                     $data_p['username']=$PHPExcel->getActiveSheet()->getCell("C".$i)->getValue();  
                     $data_p['name']= $PHPExcel->getActiveSheet()->getCell("D".$i)->getValue();  
                     $data_p['gpa']=$PHPExcel->getActiveSheet()->getCell("E".$i)->getValue();  
                     $data_p['sports']=$PHPExcel->getActiveSheet()->getCell("F".$i)->getValue();  
                     $data_p['practice']=$PHPExcel->getActiveSheet()->getCell("G".$i)->getValue();  
                     $data_p['outtime']=$PHPExcel->getActiveSheet()->getCell("H".$i)->getValue();  
                     $data_p['fail']=$PHPExcel->getActiveSheet()->getCell("I".$i)->getValue();  
                     $data_p['honor']=$PHPExcel->getActiveSheet()->getCell("J".$i)->getValue();
                     $data_p['leader']=$PHPExcel->getActiveSheet()->getCell("J".$i)->getValue();
                     $data_p['bid']= $data_p['classes'];  
                     $ex=M('ceping')->add($data_p);   
              }  
            if($ex){                                         
               $this->success('测评信息导入成功','list_ceping');  
            }else{  
                $this->error("导入失败，原因可能是excel表中格式错误","5");// 提示错误  
               }  
            }  
        }else {  
          $this->display();   
        }      
	}
}
