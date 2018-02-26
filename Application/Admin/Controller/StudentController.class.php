<?php
namespace Admin\Controller;
use Think\Controller;
use PHPExcel_IOFactory;
use PHPExcel;
use Behavior;
header("Content-Type: text/html; charset=utf-8");
class StudentController extends Controller {
	public function manage(){	
		if(IS_GET){
		$where1['xy']=$_GET['xy'];
		$where['classes']=$_GET['classes'];
		$where['username']=$_GET['username'];
		$where['name']=$_GET['name'];
		dump($where);
		}
		
		$xy=M('teacher')->field('xy')->select();
		$this->assign('xy',$xy);
		$tid=M('teacher')->where($data)->field('id')->find();
		$class=M('banzhuren')->where(array('tid'=>$tid['id']))->select();
		$this->assign('class',$class);
		$classes=trim($where['classes']['0']['1'],'%');
		$aa=trim($where1['xy']['0']['1'],'%');
		dump($classes);
		dump($aa);
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
		$this->assign('classes',$where['classes']);
		dump($where['classes']);
		$this->assign('aa',$aa);

		
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
                    $data_p['id'] =$PHPExcel->getActiveSheet()->getCell("A".$i)->getValue();  
                    $data_p['username'] =$PHPExcel->getActiveSheet()->getCell("B".$i)->getValue();  
                    $data_p['pwd'] =$PHPExcel->getActiveSheet()->getCell("C".$i)->getValue();  
                    $data_p['name'] = $PHPExcel->getActiveSheet()->getCell("D".$i)->getValue();  
                    $data_p['sex'] =$PHPExcel->getActiveSheet()->getCell("E".$i)->getValue();  
                    $data_p['home'] =$PHPExcel->getActiveSheet()->getCell("F".$i)->getValue();  
                    $data_p['bankcard'] =$PHPExcel->getActiveSheet()->getCell("G".$i)->getValue();  
                    $data_p['classes'] =$PHPExcel->getActiveSheet()->getCell("H".$i)->getValue();  
                    $data_p['major'] =$PHPExcel->getActiveSheet()->getCell("I".$i)->getValue();  
                    $data_p['phone'] =$PHPExcel->getActiveSheet()->getCell("J".$i)->getValue();  
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
}
