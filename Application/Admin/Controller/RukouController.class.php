<?php
namespace Admin\Controller;
use Think\Controller;
header("Content-Type: text/html; charset=utf-8");
class RukouController extends Controller {
    public function rukou(){
        if(IS_POST)
        {
           $data['rukou']=$_POST['select'];
            M('rukou')->where(array('id'=>'1'))->save($data);
           if($data['rukou']==0)
              echo '<script>alert("在线申报入口已关闭！");</script>';
           else
              echo '<script>alert("在线申报入口已开启！");</script>';
        }
        $this->display();
    }
}