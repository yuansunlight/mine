<?php
namespace Admin\Controller;
use Think\Controller;
class TeacherController extends Controller {
	public function teacher_list(){
		if(IS_GET){
			$where['username']=array('like','%'.$_GET['username'].'%');
			$where['cx']=array('like','%'.$_GET['name'].'%');
		}
		$data=M('teacher')->where($where)->select();
		$this->assign('data',$data);
		$this->display();
	}
	public function del(){
		$id=$_GET['id'];
		$data=M('teacher')->delete($id);
		if($data)
		echo '<script>alert("删除成功！");location.href="'.U('Teacher/teacher_list').'"</script>';
	}
	public function teacher_add(){
		if(IS_POST){
			$data=M('teacher')->add($_POST);
			if($data)
			echo '<script>alert("添加成功！");location.href="'.U('Teacher/teacher_list').'"</script>';
		}
		$this->display();
	}
	public function edit(){
		if(IS_POST){
			$edit=M('teacher')->where(array('id'=>$_GET['id']))->save($_POST);
			if($edit)
			echo '<script>alert("修改成功！");location.href="'.U('Teacher/teacher_list').'"</script>';
		}
		$data=M('teacher')->where(array('id'=>$_GET['id']))->find();
		$this->assign('data',$data);
		$this->display();
	}
	Public  function teacherupload(){  
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
                    $data_p['xy'] = $PHPExcel->getActiveSheet()->getCell("D".$i)->getValue();  
                    $ex=M('teacher')->add($data_p);
              }     
            if($ex){                                           
               $this->success('教师信息导入成功','teacher_list');  
            }else{  
                $this->error("导入失败，原因可能是excel表中格式错误","5");// 提示错误  
               }  
            }  
        }else {  
          $this->display();   
        }      
    }   
}