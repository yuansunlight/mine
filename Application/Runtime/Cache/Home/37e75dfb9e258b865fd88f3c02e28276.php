<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>新闻新闻公告</title><script language="javascript" src="/sss/Public/home/js/Calendar.js"></script>
<link rel="stylesheet" href="/sss/Public/home/css/css.css" type="text/css">

<style type="text/css">
	.main{
		margin-top:60px;
		
	}
	.btn{
		background-color: #6699CC;
		border-radius: 6px;
		width:60px;
		height: 30px;
		color:white;
		border:0;
	}
</style>
</head>
<body>
<script language="javascript">
	function check()
{
	if(document.form1.biaoti.value==""){alert("请输入标题");document.form1.biaoti.focus();return false;}if(document.form1.leibie.value==""){alert("请输入类别");document.form1.leibie.focus();return false;}if(document.form1.tianjiaren.value==""){alert("请输入添加人");document.form1.tianjiaren.focus();return false;}
}
	function gow()
	{
		location.href='peixunccccailiao_add.php?jihuabifffanhao='+document.form1.jihuabifffanhao.value;
	}
</script>
<div class="main">
	<form id="form1" name="form1" method="post" action="<?php echo U('Notice/edit', array('id'=>$data['id']));?>">
<table width="50%" border="1" align="center" cellpadding="3" bordercolor="#6699CC" cellspacing="1" bordercolor="white" style="border-collapse:collapse">    
	<tr><td>标题：</td><td><input name='biaoti' type='text' id='biaoti' value='<?php echo ($data["biaoti"]); ?>' size='49'  />&nbsp;</td></tr><tr><td>类别：</td><td><input name='leibie' type='text' id='leibie' value="<?php echo ($data["leibie"]); ?>" />&nbsp;</td></tr>
	</tr>
	<tr><td>内容：</td>
	<td><textarea name="neirong" cols="50" rows="10" value=""><?php echo ($data["neirong"]); ?></textarea>
	  </td>
	</tr>
	<tr><td>附件：</td><td><input name='shouyetupian' type='text' id='shouyetupian' value='<?php echo ($data["shouyetupian"]); ?>' size='49'  />&nbsp;<a href="javaScript:OpenScript('upfile.php?Result=shouyetupian',460,180)"><img src="Images/Upload.gif" width="30" height="16" border="0" align="absmiddle" /></a></td></tr><tr><td>点击率：</td><td><input name='dianjilv' type='text' id='dianjilv' value='<?php echo ($data["dianjilv"]); ?>' /></td></tr><tr><td>添加人：</td><td><input name='tianjiaren' type='text' id='tianjiaren' value="<?php echo ($data["tianjiaren"]); ?>" />&nbsp;</td></tr>

    <tr>
      <td>&nbsp;</td>
      <td><input type="hidden" name="addnew" value="1" />
        <input   class="btn" type="submit" name="Submit" value="添加" onclick="return check();" />
      <input  class="btn" type="reset" name="Submit2" value="重置" /></td>
    </tr>
  </table>
</form>
</div>

<p>&nbsp;</p>
</body>
</html>