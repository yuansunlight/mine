<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style type="text/css">
  .main{
    margin:50px 80px;
  }
  td{
    text-align: center;
    height:27px;
  }
</style>
<link rel="stylesheet" href="/sss/Public/home/css/css.css" type="text/css">
<link rel="stylesheet" href="/sss/Public/home/css/bootstrap.css" type="text/css">
</head>

<body>
<div class="main">
  <p>等待回复留言列表：</p>
<form id="form1" name="form1" method="get" action="<?php echo U('Message/message_check');?>">
  搜索:学号:
  <input name="username" type="text" id="username" />
  姓名:
  <input name="name" type="text" id="name" />
  <input class="btn btn-success " style="height:28px;" type="submit" name="Submit" value="查找" />
</form>
<br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#EBE2FE">序号</td>
    <td width="92" bgcolor='#EBE2FE'>姓名</td>
    <td width="250" bgcolor='#EBE2FE'>留言问题</td>
    <td width="250" align="center" bgcolor="#EBE2FE">回复</td>
    <td width="123" align="center" bgcolor="#EBE2FE">回复人</td>
    <td width="123" align="center" bgcolor="#EBE2FE">留言时间</td>
    <td width="106" align="center" bgcolor="#EBE2FE">操作</td>
  </tr>
  <?php if(is_array($data)): foreach($data as $k=>$value): ?><tr>
      <td><?php echo ($k+1); ?></td>
      <td><?php echo ($value["xingming"]); ?></td>
      <td><?php echo ($value["liuyan"]); ?></td>
      <td><?php echo ($value["huifu"]); ?></td>
      <td><?php echo ($value["huifuren"]); ?></td>
      <td><?php echo ($value["addtime"]); ?></td>
      <td><a href="<?php echo U('Home/Message/reply', array('id'=>$value['id']));?>" title="回复"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp; <a href="<?php echo U('Home/Message/del', array('id'=>$value['id']));?>" title="删除"><span class="glyphicon glyphicon-trash"></span></a></td>
    </tr><?php endforeach; endif; ?>
 </table>
<p>&nbsp; </p>
</div>


</body>
</html>