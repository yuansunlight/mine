<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title></title>
		<script language="javascript" src="/sss/Public/home/js/Calendar.js"></script>
		<link rel="stylesheet" href="/sss/Public/home/css/css.css" type="text/css">
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
	</head>
	<body>
		<div class="main">
		<form id="form1" name="form1" method="post" action="<?php echo U('add_ceping');?>">
			<tr>
				<td >
					<font style="font-size: 30px;  font-family: 华文彩云;" >手动添加</font>
				</td>
			</tr>
		    <br> <br>
			<table class="tea_complex">
						<tr>
							<td>学年</td>
							<td>
								<select name="year">
									<option value="2016">2016</option>
									<option value="2017">2017</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>班级</td>
							<td>
								<select name="classes">
									  <?php if(is_array($class)): foreach($class as $key=>$value): ?><option value="<?php echo ($value); ?>"><?php echo ($value); ?></option><?php endforeach; endif; ?>
								</select>
							</td>
						</tr>
						<tr>
							<td>学生学号</td>
							<td><input type="text" id="username" name="username" /></td>
						</tr>
						<tr>
							<td>学生姓名</td>
							<td><input type="text" id="name" name="name" /></td>
						</tr>
						<tr>
							<td>GPA</td>
							<td><input type="text" id="gpa" name="gpa" /></td>
						</tr>
						<tr>
							<td>体侧成绩</td>
							<td><input type="text" id="sports" name="sports" /></td>
						</tr>
						<tr>
							<td>公益时长</td>
							<td><input type="text" id="practice" name="practice" /></td>
						</tr>
						<tr>
							<td>竞赛获奖</td>
							<td><input type="text" id="honor" name="honor" /></td>
						</tr>
						<tr>
							<td>旷课</td>
							<td><input type="text" id="outtime" name="outtime" /></td>
						</tr>
						<tr>
							<td>挂科</td>
							<td><input type="text" id="fail" name="fail" /></td>
						</tr>

							<td><input type="hidden" name="addnew" value="1" />
	       						 <input class="btn" type="submit" name="Submit" value="添加" onclick="return check();" />
	       					</td>
							<td> <input class="btn" type="reset" name="res" value="重置" /></td>
						</tr>
					</table>			 
		</form>
		<br><br>
		<form enctype="multipart/form-data" action="<?php echo U('Ceping/cepingupload');?>" method="post">
		  <tr>
		  	<td >
		  		<font style="font-size: 30px;  font-family: 华文彩云;" >批量添加</font>
		  	</td>
		  </tr>
		   <br>
		  <table>
		    <tr>
		    	<td>
		    		请先<a href="/sss/Public/home/excel/grade.xls" rel="external nofollow" ><font style="color: blue;" >下载添加评测数据excel模板</font></a>,编辑后上传文件
		    	</td>
		    </tr>
		　　<tr>
			    <td>
			    	请选择你要上传的文件<input type="file" name="myfile">
			    </td>
		    </tr>
		    <tr>
		    	<td>
		    		<input class="btn2" type="submit" value="上传文件" />
		    	</td>
		    </tr>
		  </table>
		</form>
		<p>&nbsp;</p>
		</div>
		</body>
</html>