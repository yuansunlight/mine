<?php
namespace Home\Controller;
use Think\Controller;
header("Content-Type: text/html; charset=utf-8");
class JiangjinController extends Controller {
	public function check(){	
		$where=array();
		$array=array('一等奖','二等奖','三等奖');
		$where['mingcheng']=array('in', $array);
		$where['result']='-1';
		$where['classes']=$_SESSION['login']['classes'];
		$data=M('award')->where($where)->select();
		if(IS_POST&&$_POST['submit']=='提交名单'){
			// dump($_POST['submit']);
				foreach ($data as $key => $value) {
		$value['result']=$value['status'];
		M('award')->where(array('id'=>$value['id']))->save($value);
		}
		echo "<script>alert('奖学金已提交');location.href='".U('checked')."'</script>";
	}
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
		$k=1;
		foreach ($data3 as $key => $value) {
		$value['rank']=$k++;
		M('award')->where(array('id'=>$value['id']))->save($value);

		}
		$count1=count($data1);
		$count2=count($data2);
		$count3=count($data3);
		$this->assign('count1', $count1);
		$this->assign('count2', $count2);
		$this->assign('count3', $count3);
		$this->assign('data3', $data3);
		$this->display();
	}
	public function pass(){
		$a=array('一等奖','二等奖','三等奖');
		$data=M('award')->where(array('id'=>$_GET['id']))->find();
		$where['status']=array('eq','1');
		$where['mingcheng']=array('in',$a);
		$where['username']=$data['username'];
		$data1=M('award')->where($where)->select();
		// dump($data1);exit;
		if(!empty($data1)&&$data['status']==0)
			echo "<script>alert('专业奖学金只能得其一');location.href='".U('check')."'</script>";
		else{
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
		
			
	}
	public function pass1(){
		$data=M('award')->where(array('id'=>$_GET['id']))->find();
		if($data['status']==0)
		{
			$data['status']=1;
			M('award')->where(array('id'=>$_GET['id']))->save($data);
			echo "<script>location.href='".U('jiang')."'</script>";
		}
		else if($data['status']==1){
			$data['status']=0;
			M('award')->where(array('id'=>$_GET['id']))->save($data);
			echo "<script>location.href='".U('jiang')."'</script>";
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
		$array=array('一等奖','二等奖','三等奖');
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
		$array=array('院长奖学金','竞赛单项奖','公益单项奖','一等奖','二等奖','三等奖');
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
		$san=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('san',$san);
		$data3=M('award')->where($where)->select();
	
		}
		else if($value['mingcheng']==$array['3'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$si=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('si',$si);
		$data4=M('award')->where($where)->select();
		
		}
		else if($value['mingcheng']==$array['4'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$wu=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('wu',$wu);
		$data5=M('award')->where($where)->select();
	
		}
		else if($value['mingcheng']==$array['5'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$liu=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('liu',$liu);
		$data6=M('award')->where($where)->select();
		
		}
		
		}
		$count1=count($data1);
		$count2=count($data2);
		$count3=count($data3);
		$count4=count($data4);
		$count5=count($data5);
		$count6=count($data6);
		$this->assign('year', $year);
		$this->assign('count1', $count1);
		$this->assign('count2', $count2);
		$this->assign('count3', $count3);
		$this->assign('count4', $count4);
		$this->assign('count5', $count5);
		$this->assign('count6', $count6);		
		$this->assign('data1', $data1);		
		$this->assign('data2', $data2);
		$this->assign('data3', $data3);
		$this->assign('data4', $data4);		
		$this->assign('data5', $data5);
		$this->assign('data6', $data6);
		$this->display();
	}

	public function teachersee(){	
		if(IS_POST){
			$classes=$_POST['classes'];
			$year=$_POST['year'];
			$_SESSION['fe']['year'] =array('like','%'.$_POST['year'].'%');
			$_SESSION['fe']['classes'] =array('like','%'.$_POST['classes'].'%');
			$_SESSION['fe']['mingcheng'] =array('like','%'.$_POST['mingcheng'].'%');
			$_SESSION['fe']['username'] = array('like','%'.$_POST['username'].'%');		
			$_SESSION['fe']['name'] = array('like','%'.$_POST['name'].'%');
			
		}
		if($where['year']['1']=='%%'&&$where['classes']['1']=='%%'&&$where['username']['1']=='%%'&&$where['name']['1']=='%%'&&$where['mingcheng']['1']=='%%')
		{
			unset($_SESSION['fe']);
		}
		$classes=trim($_SESSION['fe']['classes']['1'],'%');
		$year=trim($_SESSION['fe']['year']['1'],'%');
		$mingcheng=trim($_SESSION['fe']['mingcheng']['1'],'%');
		$where['year']=$_SESSION['fe']['year'];
		$where['classes']=$_SESSION['fe']['classes'];
		$where['mingcheng']=$_SESSION['fe']['mingcheng'];
		$where['username']=$_SESSION['fe']['username'];
		$where['name']=$_SESSION['fe']['name'];
		// dump($_SESSION['fe']);
		// dump($where);
		$where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		foreach ($where1 as $key => $value) {
			foreach ($value as $k => $val) {				
				$q[]=$val;
			}	
		}
		$ming=array('一等奖','二等奖','三等奖');
		$this->assign('classes',$classes);
		$this->assign('year',$year);
		$this->assign('class',$q);
		$this->assign('mingcheng',$mingcheng);
		$this->assign('ming',$ming);
		
		if($q){
		$array=array('一等奖','二等奖','三等奖');
		$where['mingcheng']=array('in', $array);
		$where['result']='1';
		$c=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		if($_SESSION['fe']){
			$where['mingcheng']=$_SESSION['fe']['mingcheng'];
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
		$k=1;
		foreach ($data3 as $key => $value) {
		$value['rank']=$k++;
		M('award')->where(array('id'=>$value['id']))->save($value);

		}
		$count1=count($data1);
		$count2=count($data2);
		$count3=count($data3);
		$this->assign('data',$c);
		$this->assign('count1', $count1);
		$this->assign('count2', $count2);
		$this->assign('count3', $count3);
		$this->assign('data3', $data3);
		
	}$this->display();
}

	public function jiang(){	

		$where=array();
		$array=array('院长奖学金','竞赛单项奖','公益单项奖');
		$where['mingcheng']=array('in', $array);
		$where['result']='-1';
		$c=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		foreach ($c as $key => $value) {
			$a[]=$value['classes'];
		}
		if($a){
		$where['cid']=array('in',$a);
		$data=M('award')->where($where)->select();
		if(IS_POST&&$_POST['submit']=='提交名单'){
				foreach ($data as $key => $value) {
		$value['result']=$value['status'];
		M('award')->where(array('id'=>$value['id']))->save($value);
		}
		echo "<script>alert('奖学金已提交');location.href='".U('jianged')."'</script>";
	}
	$data=M('award')->where($where)->select();
		foreach ($data as $key => $value) {
		if($value['mingcheng']==$array['0'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$yi=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('yi',$yi);
		$qq=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->find();
		$value['together']=$value['gpa']*30*$qq['gpadata']/100+$value['honor']*50*$qq['honordata']/100;
		M('award')->where(array('id'=>$value['id']))->save($value);
		$data1=M('award')->where($where)->select();
		
		}
		else if($value['mingcheng']==$array['1'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$er=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('er',$er);
		$value['together']=$value['honor']*50;
		M('award')->where(array('id'=>$value['id']))->save($value);
		$data2=M('award')->where($where)->select();
		
		}
		else if($value['mingcheng']==$array['2'])
		{
		$where['mingcheng']=$value['mingcheng'];
		$san=M('honor')->where(array('mingcheng'=>$value['mingcheng']))->getField('num');
		$this->assign('san',$san);
		$value['together']=$value['practice']*2;
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
		$k=1;
		foreach ($data3 as $key => $value) {
		$value['rank']=$k++;
		M('award')->where(array('id'=>$value['id']))->save($value);

		}
		$count1=count($data1);
		$count2=count($data2);
		$count3=count($data3);
		$this->assign('count1', $count1);
		$this->assign('count2', $count2);
		$this->assign('count3', $count3);
		$this->assign('data3', $data3);
		}
		
		$this->display();
	}
	public function jianged(){	
		if(IS_POST){
			$classes=$_POST['classes'];
			$year=$_POST['year'];
			$_SESSION['fe']['year'] =array('like','%'.$_POST['year'].'%');
			$_SESSION['fe']['classes'] =array('like','%'.$_POST['classes'].'%');
			
			$_SESSION['fe']['username'] = array('like','%'.$_POST['username'].'%');
			
			$_SESSION['fe']['name'] = array('like','%'.$_POST['name'].'%');
			
		}
		if($where['year']['1']=='%%'&&$where['classes']['1']=='%%'&&$where['username']['1']=='%%'&&$where['name']['1']=='%%')
		{
			unset($_SESSION['fe']);
		}
		$classes=trim($_SESSION['fe']['classes']['1'],'%');
		$year=trim($_SESSION['fe']['year']['1'],'%');
		$where['year']=$_SESSION['fe']['year'];
		$where['classes']=$_SESSION['fe']['classes'];
		$where['username']=$_SESSION['fe']['username'];
		$where['name']=$_SESSION['fe']['name'];
		// dump($_SESSION['fe']);
		// dump($where);
		$where1=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
		foreach ($where1 as $key => $value) {
			foreach ($value as $k => $val) {				
				$q[]=$val;
			}	
		}
		$this->assign('classes',$classes);
		$this->assign('year',$year);
		$this->assign('class',$q);
		
		if($q){
		$array=array('院长奖学金','竞赛单项奖','公益单项奖');
		$where['mingcheng']=array('in', $array);
		$where['result']='1';
		$c=M('banzhuren')->where(array('tid'=>$_SESSION['login']['id']))->field('classes')->select();
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
		$k=1;
		foreach ($data3 as $key => $value) {
		$value['rank']=$k++;
		M('award')->where(array('id'=>$value['id']))->save($value);

		}
		$count1=count($data1);
		$count2=count($data2);
		$count3=count($data3);
		$this->assign('data',$c);
		$this->assign('count1', $count1);
		$this->assign('count2', $count2);
		$this->assign('count3', $count3);
		$this->assign('data3', $data3);
		
	}$this->display();
}

	public function goods_export()
    {
        //print_r($goods_list);exit;
        $goods_list = M('award')->order('id desc')->select();
        $goods_list = $goods_list;
        $data = array();
        foreach ($goods_list as $k=>$goods_info){
            $data[$k][id] = $goods_info['id'];
            $data[$k][title] = $goods_info['title'];
            $data[$k][PNO] = $goods_info['PNO'];
            $data[$k][old_PNO] = $goods_info['old_PNO'];
            $data[$k][price]  = $goods_info['price'];
            $data[$k][brand_id]  = get_title('brand',$goods_info['brand_id']);
            $data[$k][category_id]  = get_title('category',$goods_info['category_id']);
            $data[$k][type_ids] = get_type_title($goods_info['id']);
            $data[$k][add_time] = $goods_info['add_time'];
        }

        //print_r($goods_list);
        //print_r($data);exit;

        foreach ($data as $field=>$v){
            if($field == 'id'){
                $headArr[]='产品ID';
            }

            if($field == 'title'){
                $headArr[]='产品名称';
            }

            if($field == 'PNO'){
                $headArr[]='零件号';
            }

            if($field == 'old_PNO'){
                $headArr[]='原厂参考零件号';
            }

            if($field == 'price'){
                $headArr[]='原厂参考面价';
            }

            if($field == 'type_ids'){
                $headArr[]='品牌';
            }

            if($field == 'brand_id'){
                $headArr[]='类别';
            }
            if($field == 'category_id'){
                $headArr[]='适用机型';
            }

            if($field == 'add_time'){
                $headArr[]='添加时间';
            }
        }

        $filename="goods_list";

        $this->getExcel($filename,$headArr,$data);
    }


   public  function getExcel($fileName,$headArr,$data){
        //导入PHPExcel类库，因为PHPExcel没有用命名空间，只能inport导入
        import("Org.Util.PHPExcel");
        import("Org.Util.PHPExcel.Writer.Excel5");
        import("Org.Util.PHPExcel.IOFactory.php");

        $date = date("Y_m_d",time());
        $fileName .= "_{$date}.xls";

        //创建PHPExcel对象，注意，不能少了\
        $objPHPExcel = new \PHPExcel();
        $objProps = $objPHPExcel->getProperties();

        //设置表头
        $key = ord("A");
        //print_r($headArr);exit;
        foreach($headArr as $v){
            $colum = chr($key);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $objPHPExcel->setActiveSheetIndex(0) ->setCellValue($colum.'1', $v);
            $key += 1;
        }

        $column = 2;
        $objActSheet = $objPHPExcel->getActiveSheet();

        //print_r($data);exit;
        foreach($data as $key => $rows){ //行写入
            $span = ord("A");
            foreach($rows as $keyName=>$value){// 列写入
                $j = chr($span);
                $objActSheet->setCellValue($j.$column, $value);
                $span++;
            }
            $column++;
        }

        $fileName = iconv("utf-8", "gb2312", $fileName);

        //重命名表
        //$objPHPExcel->getActiveSheet()->setTitle('test');
        //设置活动单指数到第一个表,所以Excel打开这是第一个表
        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean();//清除缓冲区,避免乱码
        header('Content-Type: application/vnd.ms-excel');
        header("Content-Disposition: attachment;filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $objWriter = \PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output'); //文件通过浏览器下载
        exit;
    }
		
}