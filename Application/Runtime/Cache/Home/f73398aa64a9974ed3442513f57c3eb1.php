<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>修改用户注册</title>
<style type="text/css">
  input{
    border:0px;
  }
  h3{
    margin-top: 30px;
    text-align: center;
  }
  td{
    text-align: center;
  }
    .main{
    margin-top: 150px;
  }
</style>
<link rel="stylesheet" href="/sss/Public/home/css/css.css" type="text/css">
<script language="javascript" src="/sss/Public/home/js/Calendar.js"></script>
</head>
<body>
  <div class="main">
    <h3>查看个人资料 当前日期：<?php echo ($data["time"]); ?></h3>
<br>
<table width="50%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse"> 
      <tr><td>学号：</td><td><input name='username' type='text' id='username' value='<?php echo ($data["username"]); ?>' readonly="readonly" />
      </td>
      </tr><tr><td>密码：</td><td><input name='pwd' type='text' id='pwd' value='<?php echo ($data["pwd"]); ?>' readonly="readonly" /></td></tr>
      <tr><td>班级：</td><td><input name='classes' type='text' id='classes' value='<?php echo ($data["classes"]); ?>' readonly="readonly" />
       </td>
      </tr>
      <tr><td>姓名：</td><td><input name='name' type='text' id='name' value='<?php echo ($data["name"]); ?>' readonly="readonly" /></td></tr>
      <tr><td>性别：</td>
        <td><input name='sex' type='text' id='sex' value='<?php echo ($data["sex"]); ?>' readonly="readonly" /></td>
      </tr>
    <tr><td>地区：</td><td><input name='home' type='text' id='home' value='<?php echo ($data["home"]); ?>' readonly="readonly" /></td></tr>
    
    <tr><td>电话：</td><td><input name='phone' type='text' id='phone' value='<?php echo ($data["phone"]); ?>' readonly="readonly" /></td></tr>
    
    <tr><td>专业：</td><td><input name='major' type='text' id='major' value='<?php echo ($data["major"]); ?>' readonly="readonly" /></td></tr>
    
    
    <tr><td>银行卡号：</td><td><input name='bankcard' type='text' id='bankcard' value='<?php echo ($data["bankcard"]); ?>' readonly="readonly" /></td></tr>
  </table>

<p>&nbsp;</p>
  </div>

</body>
</html>