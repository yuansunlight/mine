<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style type="text/css">
  .main{
    margin:50px 80px;
  }
  input{
    height:27px;
    border:0 1px 0 0;
  }
  .tdd{
    text-align: center;
  }
  td{
    height:27px;
    
  }
  select{
    height:27px;
  }
  .btn{
    background-color:rgb(51, 122, 183);
    color: white;
    height:30px;

  }
</style>
<script language="javascript" src="/sss/Public/admin/js/Calendar.js"></script>
<link rel="stylesheet" href="/sss/Public/admin/css/css.css" type="text/css">
<link rel="stylesheet" href="/sss/Public/admin/css/bootstrap.css" type="text/css">
</head>

<body>
<div class="main">
<script language="javascript">
    function check()
  {
    if(document.form1.username.value==""){alert("请输入账号");document.form1.username.focus();return false;}if(document.form1.pwd.value==""){alert("请输入密码");document.form1.pwd.focus();return false;}if(document.form1.name.value==""){alert("请输入姓名");document.form1.name.focus();return false;}if(document.form1.class.value==""){alert("请输入班级");document.form1.class.focus();return false;}
  }
</script>
<form id="form1" name="form1" method="post" action="<?php echo U('User/add');?>">
  
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">    <font style="font-size: 30px; font-family: 华文彩云;" >手动添加</font>
  <br><br>
  <tr><td class="tdd">学号：</td><td><input name='username' type='text' id='username' value='' />&nbsp;</td></tr><tr><td class="tdd">密码：</td><td><input name='pwd' type='text' id='pwd' value='' />&nbsp;</td></tr><tr><td class="tdd">班级：</td><td><select name='classes' id='leibie'><option value="20142831">20142831</option><option value="20142832">20142832</option></select>&nbsp;</td></tr><tr><td class="tdd">姓名：</td><td><input name='name' type='text' id='name' value='' />&nbsp;</td></tr><tr><td class="tdd">性别：</td><td><select name='sex' id='sex'><option value="男">男</option><option value="女">女</option></select></td></tr><tr><td class="tdd">地区：</td><td><input name='home' type='text' id='home' value='' />&nbsp;</td></tr><tr><td class="tdd">银行卡：</td><td><input name='bankcard' type='text' id='bankcard' value='' />&nbsp;</td></tr>
 <tr><td class="tdd">电话：</td><td><input name='major' type='text' id='diqu' value='' /></td></tr>
    
    <tr><td class="tdd">专业：</td><td><input name='phone' type='text' id='diqu' value='' /></td></tr>
  
    <tr>
      <td>&nbsp;</td>
      <td style="height:30px;"><input type="hidden" name="addnew" value="1" />
        <input style="height:30px;margin-left: 16px;" class="btn btn-success" type="submit" name="Submit" value="添加" onclick="return check();" />
      <input style="height:30px" class="btn btn-success" type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form><br><br>
<form enctype="multipart/form-data" action="<?php echo U('upload');?>" method="post">
  <tr><td ><font style="font-size: 30px;  font-family: 华文彩云;" >批量添加</font></td></tr>
  <table>
   
    <tr><td>请先<a href="/sss/Public/admin/excel/student.xls" rel="external nofollow" ><font style="color: blue;" >下载添加学生excel模板</font></a>编辑后上传文件</td></tr>
　　　　　<tr>
    <td>请选择你要上传的文件<input  type="file" name="myfile"></td>
    </tr>
    <br><br>
    <tr><td><input class="btn" type="submit" value="上传文件" /></td></tr>
  </table>
</form>
<p>&nbsp;</p>
  </div>

</body>
</html>