<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title><script language="javascript" src="/sss/Public/admin/js/Calendar.js"></script>
<link rel="stylesheet" href="/sss/Public/admin/css/css.css" type="text/css">
<link rel="stylesheet" type="text/css" href="/sss/Public/admin/css/bootstrap.css">
<style type="text/css">
	.main{
		width: 300px;
		margin:50px auto;
	}
	h2{
		text-align: center;
	}
	.table{
		
	}
	td{
		height:27px;
		text-align: center;
	}
	.input{
		margin-top:10px;
		margin-left:70px;
		
	}
	.btn{
		height:27px;
	}
</style>
</head>

<body>	
	<br>
	<h2>修改奖项</h2>
<div class="main">

	<form id="form1" name="form1" method="post" action="<?php echo U('edit',array('id'=>$_GET['id']));?>">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="white" style="border-collapse:collapse">    
	
	<tr>
		<td>奖项类别:
			<input type="text" name="leibie" value="<?php echo ($data["leibie"]); ?>">
		</td>
	</tr>
	<tr>
		<td>奖项名称：<input type="text" name="mingcheng" value="<?php echo ($data["mingcheng"]); ?>"></td>
	</tr>
	
	<tr>
		<td>奖项说明：<input type="text" name="shuoming" value="<?php echo ($data["shuoming"]); ?>"></td>
	</tr>
	<tr>
		<td>奖项名额：<input type="text" name="num" value="<?php echo ($data["num"]); ?>"></td>
	</tr>
	<tr>
		<td>
			<tr><td>&nbsp;GPA绩点:<input type="text" name="gpa" value="<?php echo ($data["gpa"]); ?>"></td></tr>
			<tr><td>体侧成绩: <input type="text" name="sports" value="<?php echo ($data["sports"]); ?>"></td></tr>
			<tr><td>公益时长: <input type="text" name="practice" value="<?php echo ($data["practice"]); ?>"></td></tr>
			<tr><td>竞赛获奖: <input type="text" name="honor" value="<?php echo ($data["honor"]); ?>"></td></tr>
			<tr><td>学生旷课: <input type="text" name="outtime" value="<?php echo ($data["outtime"]); ?>"></td></tr>
			<tr><td>挂科情况: <input type="text" name="fail" value="<?php echo ($data["fail"]); ?>"></td></tr>
		</td>
	</tr>
	<tr><td>GPA绩点占比: <input style="width:130px" type="text" name="gpadata" value="<?php echo ($data["gpadata"]); ?>"></td></tr>
	<tr><td>公益时长占比: <input style="width:128px" type="text" name="practicedata" value="<?php echo ($data["practicedata"]); ?>"></td></tr>
	<tr><td>竞赛获奖占比: <input style="width:128px" type="text" name="honordata" value="<?php echo ($data["honordata"]); ?>"></td></tr>
    <tr>
      
      	<div class="input"><td><input type="hidden" name="addnew" value="1" />
      		<input class="btn btn-success"  type="submit" name="Submit" value="添加" onclick="return check();" />
            <input class="btn btn-success"  type="reset" name="Submit2" value="重置" /></td>

              	</div>
    </tr> 
     </table>
</form>
</div>
<p>&nbsp;</p>
</body>
</html>