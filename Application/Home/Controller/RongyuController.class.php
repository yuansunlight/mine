<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html; charset=utf-8");
class RongyuController extends Controller {
	public function check(){	
		$where=array();
		$array=array('优秀学生','先进个人','优秀学生干部');
		$where['mingcheng']=array('in', $array);
		$where['classes']=$_SESSION['login']['classes'];
		$where['result']='-1';
		$data=M('award')->where($where)->select();

		if(IS_POST&&$_POST['submit']=='提交名单'){
			// dump($_POST['submit']);
				foreach ($data as $key => $value) {
		$value['result']=$value['status'];
		M('award')->where(array('id'=>$value['id']))->save($value);
		// dump(M('award')->where(array('id'=>$value['id']))->save($value));

		}
		echo "<script>alert('个人荣誉已提交');location.href='".U('checked')."'</script>";
	}
	$data=M('award')->where($where)->select();

		foreach ($data as $key => $value) {
		if($value['mingcheng']==$array['0']){
		$where['mingcheng']=$value['mingcheng'];	
		$yi=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('yi',$yi);
		$qq=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->find();
		$value['together']=$value['gpa']*20*$qq['gpadata']/100+$value['practice']*2*$qq['practicedata']/100+$value['honor']*10*$qq['honordata']/100;
		M('award')->where(array('id'=>$value['id']))->save($value);
		$data1=M('award')->where($where)->select();
			}
		else if($value['mingcheng']==$array['1']){
		$where['mingcheng']=$value['mingcheng'];	
		$er=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('er',$er);
		$qq=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->find();
		$value['together']=$value['gpa']*20*$qq['gpadata']/100+$value['practice']*2*$qq['practicedata']/100+$value['honor']*10*$qq['honordata']/100;
		M('award')->where(array('id'=>$value['id']))->save($value);
		$data2=M('award')->where($where)->select();
		}
		else if($value['mingcheng']==$array['2']){
		$where['mingcheng']=$value['mingcheng'];	
		$san=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('san',$san);
		$qq=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->find();
		$value['together']=$value['gpa']*20*$qq['gpadata']/100+$value['practice']*2*$qq['practicedata']/100+$value['honor']*10*$qq['honordata']/100;
		M('award')->where(array('id'=>$value['id']))->save($value);
		$data3=M('award')->where($where)->select();
		}
		
		}
		foreach ($data1 as $key => $value) {
		$rating1[$key]=M('award')->where(array('id'=>$value['id']))->getField('together');
		}
		array_multisort($rating1, SORT_DESC, $data1);
		$i=1;
		foreach ($data1 as $key => $value) {
		$value['rank']=$i++;
		M('award')->where(array('id'=>$value['id']))->save($value);
		}
		$this->assign('data1', $data1);
		foreach ($data2 as $key => $value) {
		$rating2[$key]=M('award')->where(array('id'=>$value['id']))->getField('together');
		}
		array_multisort($rating2, SORT_DESC, $data2);
		$j=1;
		foreach ($data2 as $key => $value) {
		$value['rank']=$j++;
		M('award')->where(array('id'=>$value['id']))->save($value);
		}
		$this->assign('data2', $data2);
		foreach ($data3 as $key => $value) {
		$rating3[$key]=M('award')->where(array('id'=>$value['id']))->getField('together');
		}
		array_multisort($rating3, SORT_DESC, $data3);
		$j=1;
		foreach ($data3 as $key => $value) {
		$value['rank']=$j++;
		M('award')->where(array('id'=>$value['id']))->save($value);
		}
		$this->assign('data3', $data3);
		$count1=count($data1);
		$count2=count($data2);
		$count3=count($data3);
		$this->assign('count1', $count1);
		$this->assign('count2', $count2);
		$this->assign('count3', $count3);
		$this->display();
	}
	public function pass(){
		$data=M('award')->where(array('id'=>$_GET['id']))->find();
		if($data['status']==0)
		{
			$data['status']=1;
			M('award')->where(array('id'=>$_GET['id']))->save($data);
			echo "<script>location.href='".U('check')."'</script>";
		}
		else if($data['status']==1){
			$data['status']=0;
			M('award')->where(array('id'=>$_GET['id']))->save($data);
			echo "<script>location.href='".U('check')."'</script>";
		}
			
	}
	public function checked(){	
		if(IS_POST){
			$year=$_POST['year'];
			$_SESSION['ww']['year'] =array('like','%'.$_POST['year'].'%');
			$_SESSION['ww']['username'] = array('like','%'.$_POST['username'].'%');
			$_SESSION['ww']['name'] = array('like','%'.$_POST['name'].'%');
			
		}
		$year=trim($_SESSION['ww']['year']['1'],'%');
		// dump($classes);
		$where['year']=$_SESSION['ww']['year'];
		$where['name']=$_SESSION['ww']['name'];
		$where['username']=$_SESSION['ww']['username'];
		// $where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		// dump($where);
		if($where['year']==NULL&&$where['name']==NULL&&$where['username']==NULL)
		{
			$where=null;
		}
		if($where['year']['1']=='%%'&&$where['name']['1']=='%%'&&$where['username']['1']=='%%')
		{
			unset($_SESSION['ww']);
		}
		$array=array('优秀学生','先进个人','优秀学生干部');
		$where['mingcheng']=array('in', $array);
		$where['result']=array('eq','1');
		$where['classes']=$_SESSION['login']['classes'];
		$data=M('award')->where($where)->select();
		foreach ($data as $key => $value) {
		if($value['mingcheng']==$array['0'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$yi=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('yi',$yi);
		$data1=M('award')->where($where)->select();
		
		}
		else if($value['mingcheng']==$array['1'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$er=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('er',$er);
		$data2=M('award')->where($where)->select();
		
		}
		
		else if($value['mingcheng']==$array['2'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$san=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('san',$san);
		$data3=M('award')->where($where)->select();
		
		}
		
		}
		$count1=count($data1);
		$count2=count($data2);
		$count3=count($data3);
		$this->assign('year', $year);
		$this->assign('count1', $count1);
		$this->assign('count2', $count2);	
		$this->assign('count3', $count3);
		$this->assign('data1', $data1);		
		$this->assign('data2', $data2);
		$this->assign('data3', $data3);
		$this->display();
	}
	public function see(){	
		$array=array('优秀学生','先进个人','优秀学生干部');
		$where['mingcheng']=array('in', $array);
		$where['result']=array('eq','1');
		$where['username']=$_SESSION['login']['username'];
		$data=M('award')->where($where)->select();
		foreach ($data as $key => $value) {
		if($value['mingcheng']==$array['0'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$yi=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('yi',$yi);
		$data1=M('award')->where($where)->select();
		
		}
		else if($value['mingcheng']==$array['1'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$er=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('er',$er);
		$data2=M('award')->where($where)->select();
		
		}
		
		else if($value['mingcheng']==$array['2'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$er=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('san',$san);
		$data3=M('award')->where($where)->select();
		
		}

		}
		$count1=count($data1);
		$count2=count($data2);
		$count3=count($data3);
		$this->assign('year', $year);
		$this->assign('count1', $count1);
		$this->assign('count2', $count2);
		$this->assign('count3', $count3);	
		$this->assign('data1', $data1);		
		$this->assign('data2', $data2);
		$this->assign('data3', $data3);
		$this->display();
	}
	public function teachersee(){	
		if(IS_POST){
			$classes=$_POST['classes'];
			$year=$_POST['year'];
			$_SESSION['ggh']['year'] =array('like','%'.$_POST['year'].'%');
			$_SESSION['ggh']['classes'] =array('like','%'.$_POST['classes'].'%');
			$_SESSION['ggh']['username'] = array('like','%'.$_POST['username'].'%');
			$_SESSION['ggh']['mingcheng'] = array('like','%'.$_POST['mingcheng'].'%');
			$_SESSION['ggh']['name'] = array('like','%'.$_POST['name'].'%');
			
		}
		if($where['year']['1']=='%%'&&$where['classes']['1']=='%%'&&$where['username']['1']=='%%'&&$where['name']['1']=='%%'&&$where['mingcheng']['1']=='%%')
		{
			unset($_SESSION['ggh']);
		}
		$classes=trim($_SESSION['ggh']['classes']['1'],'%');
		$year=trim($_SESSION['ggh']['year']['1'],'%');
		$mingcheng=trim($_SESSION['ggh']['mingcheng']['1'],'%');
		$where['year']=$_SESSION['ggh']['year'];
		$where['classes']=$_SESSION['ggh']['classes'];
		$where['username']=$_SESSION['ggh']['username'];
		$where['mingcheng']=$_SESSION['ggh']['mingcheng'];
		$where['name']=$_SESSION['ggh']['name'];
		// dump($mingcheng);
		$where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		foreach ($where1 as $key => $value) {
			foreach ($value as $k => $val) {				
				$q[]=$val;
			}	
		}
		$ming=array('优秀学生','先进个人','优秀学生干部');
		$this->assign('classes',$classes);
		$this->assign('mingcheng',$mingcheng);
		$this->assign('ming',$ming);
		$this->assign('year',$year);
		$this->assign('class',$q);
		
		if($q){

		$array=array('优秀学生','先进个人','优秀学生干部');
		$where['mingcheng']=array('in', $array);
		$where['result']='1';
		$c=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		if($_SESSION['ggh']){
			$where['mingcheng']=$_SESSION['ggh']['mingcheng'];
		}
		foreach ($c as $key => $value) {
			$a[]=$value['classes'];
		}
		$where['cid']=array('in',$a);
		$data=M('award')->where($where)->select();
		foreach ($data as $key => $value) {
		if($value['mingcheng']==$array['0'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$yi=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('yi',$yi);
		$value['together']=$value['gpa']*20;
		M('award')->where(array('id'=>$value['id']))->save($value);
		$data1=M('award')->where($where)->select();
		
		}
		else if($value['mingcheng']==$array['1'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$er=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('er',$er);
		$value['together']=$value['gpa']*20;
		M('award')->where(array('id'=>$value['id']))->save($value);
		$data2=M('award')->where($where)->select();
		
		}

		else if($value['mingcheng']==$array['2'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$san=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('san',$san);
		$value['together']=$value['gpa']*20;
		M('award')->where(array('id'=>$value['id']))->save($value);
		$data3=M('award')->where($where)->select();
		
		}
		
		}
		
		foreach ($data1 as $key => $value) {
		$rating1[$key]=M('award')->where(array('id'=>$value['id']))->getField('together');
		}
		array_multisort($rating1, SORT_DESC, $data1);
		$i=1;
		foreach ($data1 as $key => $value) {
		$value['rank']=$i++;
		M('award')->where(array('id'=>$value['id']))->save($value);
		}
		$this->assign('data1', $data1);
		
		foreach ($data2 as $key => $value) {
		$rating2[$key]=M('award')->where(array('id'=>$value['id']))->getField('together');
		}
		array_multisort($rating2, SORT_DESC, $data2);
		$j=1;
		foreach ($data2 as $key => $value) {
		$value['rank']=$j++;
		M('award')->where(array('id'=>$value['id']))->save($value);
		}
		$this->assign('data2', $data2);

		foreach ($data3 as $key => $value) {
		$rating3[$key]=M('award')->where(array('id'=>$value['id']))->getField('together');
		}
		array_multisort($rating3, SORT_DESC, $data3);
		$j=1;
		foreach ($data3 as $key => $value) {
		$value['rank']=$j++;
		M('award')->where(array('id'=>$value['id']))->save($value);
		}
		$this->assign('data3', $data3);
		$count1=count($data1);
		$count2=count($data2);
		$count3=count($data3);
		$this->assign('count1', $count1);
		$this->assign('count2', $count2);
		$this->assign('count3', $count3);
	}$this->display();
}

}