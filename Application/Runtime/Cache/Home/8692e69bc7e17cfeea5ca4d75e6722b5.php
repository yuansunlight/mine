<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<script language="javascript" src="/sss/Public/home/js/Calendar.js"></script>
<link rel="stylesheet" href="/sss/Public/home/css/css.css" type="text/css">
</head>
<style type="text/css">
	.main{
		margin:50px 100px;
	}
	.btn1{
		background-color: green;
		border-radius: 6px;
		width:60px;
		height: 25px;
		color:white;
		border:0;
	}
	.btn{
		background-color: #6699CC;
		border-radius: 6px;
		width:60px;
		height: 30px;
		color:white;
		border:0;
	}
	.btn2{
		background-color: #6699CC;
		border-radius: 6px;
		width:74px;
		height: 25px;
		color:white;
		border:0;
	}
</style>
<body>
	<div class="main">
		<form id="form1" name="form1" method="post" action="<?php echo U('edit',array('id'=>$edit['id']));?>">

<tr><td ><font style="font-size: 30px;  font-family: 华文彩云;" >手动添加</font></td></tr>
    <br> <br>
<table class="tea_complex">
					
					<tr>
						<td>学年</td>
						<td>
							<input type="text" name="year" value="<?php echo ($edit["year"]); ?>" />
						</td>
					</tr>
					<tr>
						<td>班级</td>
						<td>
							<input type="text" name="classes" value="<?php echo ($edit["classes"]); ?>" />
						</td>
					</tr>
					<tr>
						<td>学生学号</td>
						<td><input type="text" id="username" name="username" value="<?php echo ($edit["username"]); ?>" /></td>
					</tr>
					<tr>
						<td>学生姓名</td>
						<td><input type="text" id="name" name="name" value="<?php echo ($edit["name"]); ?>" /></td>
					</tr>
					<tr>
						<td>GPA</td>
						<td><input type="text" id="gpa" name="gpa" value="<?php echo ($edit["gpa"]); ?>" /></td>
					</tr>
					<tr>
						<td>体侧成绩</td>
						<td><input type="text" id="sports" name="sports" value="<?php echo ($edit["sports"]); ?>" /></td>
					</tr>
					<tr>
						<td>公益时长</td>
						<td><input type="text" id="practice" name="practice" value="<?php echo ($edit["practice"]); ?>" /></td>
					</tr>
					<tr>
						<td>竞赛获奖</td>
						<td><input type="text" id="honor" name="honor" value="<?php echo ($edit["honor"]); ?>" /></td>
					</tr>
					<tr>
						<td>旷课</td>
						<td><input type="text" id="outtime" name="outtime" value="<?php echo ($edit["outtime"]); ?>" /></td>
					</tr>
					<tr>
						<td>挂科</td>
						<td><input type="text" id="fail" name="fail" value="<?php echo ($edit["fail"]); ?>" /></td>
					</tr>
					<tr>
						<td>排名</td>
						<td><input type="text" id="rank" name="rank" value="<?php echo ($edit["rank"]); ?>" /></td>
					</tr>
					<tr>
						<td>总分</td>
						<td>
							<input type="text" name="together"  /></td> <td><button class="btn1">计算</button></td>
					</tr>

						<td><input type="hidden" name="addnew" value="1" />
       						 <input class="btn" type="submit" name="Submit" value="添加" onclick="return check();" />
       					</td>
						<td> <input class="btn" type="reset" name="res" value="重置" /></td>
					</tr>
				</table>			 
</form>
<br><br>
	</div>
</body>
<script type="text/javascript">
	var input=document.getElementsByTagName('input');
	var button=document.getElementsByTagName('button');
	button[0].onclick=function(){
	var sum=0;
	sum=0.4*parseInt(input[2].value)+0.2*parseInt(input[3].value)+0.2*parseInt(input[4].value)+0.2*parseInt(input[5].value);
	input[6].value=parseInt(sum);
	return false;
	}
</script>
</html>