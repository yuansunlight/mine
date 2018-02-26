<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户注册</title>
<script language="javascript" src="/sss/Public/admin/js/Calendar.js"></script>
<link rel="stylesheet" href="/sss/Public/admin/css/css.css" type="text/css">
</head>

<body>
<script language="javascript">
	function check()
{
	if(document.form1.zhanghao.value==""){alert("请输入账号");document.form1.zhanghao.focus();return false;}if(document.form1.mima.value==""){alert("请输入密码");document.form1.mima.focus();return false;}if(document.form1.xingming.value==""){alert("请输入姓名");document.form1.xingming.focus();return false;}
}
</script>
<br>
<tr><td ><font style="font-size: 30px;  font-family: 华文彩云;" >手动添加</font></td></tr>
<br><br>                                                               
<form id="form1" name="form1" method="post" action="<?php echo U('Teacher/edit',array('id'=>$data['id']));?>">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">    
		<tr><td>账号：</td><td><input name='username' type='text' id='username' value='<?php echo ($data["username"]); ?>' />&nbsp;*</td></tr>
    <tr><td>密码：</td><td><input name='pwd' type='text' id='pwd' value='<?php echo ($data["pwd"]); ?>' />&nbsp;*</td></tr>
    <tr><td>姓名：</td><td><input name='cx' type='text' id='cx' value='<?php echo ($data["cx"]); ?>' />&nbsp;*</td></tr>
    <tr><td>学院：</td><td><input name='xy' type='text' id='xy' value='<?php echo ($data["xy"]); ?>' />&nbsp;*</td><tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input type="submit" name="Submit" value="添加" onclick="return check();" />
      <input type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>
</body>
</html>