<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户注册</title>
<script language="javascript" src="/sss/Public/admin/js/Calendar.js"></script>
<link rel="stylesheet" href="/sss/Public/admin/css/css.css" type="text/css">
<link rel="stylesheet" href="/sss/Public/admin/css/bootstrap.css" type="text/css">
</head>
<style type="text/css">
    .main{
    margin: 50px 60px;
  }
  .btn1{
    background-color:rgb(51, 122, 183);
    color: white;
    height:30px;
    border-radius: 5px;
    border:0;
    width:75px;
  }
  .btn{
    height:29px;
    margin-left: 10px;
  }
  .td{
    text-align: center;
    height:27px;
  }
</style>

<body>
<script language="javascript">
	function check()
{
	if(document.form1.zhanghao.value==""){alert("请输入账号");document.form1.zhanghao.focus();return false;}if(document.form1.mima.value==""){alert("请输入密码");document.form1.mima.focus();return false;}if(document.form1.xingming.value==""){alert("请输入姓名");document.form1.xingming.focus();return false;}
}
</script>
<div class="main">
  <br>
<tr><td ><font style="font-size: 30px;  font-family: 华文彩云;" >手动添加</font></td></tr>
<br><br>
<form id="form1" name="form1" method="post" action="<?php echo U('Teacher/teacher_add');?>">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">    
    <tr><td class="td">账号：</td><td><input name='username' type='text' id='username' value='' />&nbsp;</td></tr>
    <tr><td class="td">密码：</td><td><input name='pwd' type='text' id='pwd' value='' />&nbsp;</td></tr>
    <tr><td class="td">姓名：</td><td><input name='cx' type='text' id='cx' value='' />&nbsp;</td></tr>
    <tr><td class="td">学院：</td><td><input name='xy' type='text' id='xy' value='' />&nbsp;</td><tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input type="submit" class="btn btn-success" name="Submit" value="添加" onclick="return check();" />
      <input type="reset" class="btn btn-success" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form><br><br><br>
<form enctype="multipart/form-data" action="<?php echo U('teacherupload');?>" method="post">
  <tr><td ><font style="font-size: 30px;  font-family: 华文彩云;" >批量添加</font></td></tr>
    <br>
  <table>
   
    <tr><td>请先<a href="/sss/Public/admin/excel/teacher.xls" rel="external nofollow" ><font style="color: blue;" >下载添加教师excel模板</font></a>编辑后上传文件</td></tr>
　　　　　<tr>
    <td>请选择你要上传的文件<input type="file" name="myfile"></td>
    </tr>
    <tr><td><input class="btn1" type="submit" value="上传文件" /></td></tr>
  </table>
</form>
<p>&nbsp;</p>
</div>

</body>
</html>