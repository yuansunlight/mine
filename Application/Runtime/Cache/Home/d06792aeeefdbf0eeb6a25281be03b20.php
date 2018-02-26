<?php if (!defined('THINK_PATH')) exit();?><html>
<head> 
<title></title>
<LINK href="/sss/Public/home/css/style.css" type=text/css rel=stylesheet>
<LINK href="/sss/Public/home/css/bootstrap.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
<!--
td  
{  
    text-align:center;  
}  

.STYLE2 {
	color: #FFFFFF;
	font-weight: bold;
}
.STYLE3 {color: #6D2E18; font-weight: bold; }
-->
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <div style="margin: 100px 100px;">
    <h3><p style=" text-align: center;">我的留言</p></h3>
    <br>
    <table class="table table-bordered">

  <tr>
    <td class="info">学号</td>
    <td class="info">姓名</td>
    <td class="info">留言</td>
    <td class="info">回复</td> 
    <td class="info">留言时间</td>
    <td class="info">回复人</td>
  </tr>
  <?php if(is_array($data)): foreach($data as $k=>$value): ?><tr>
    <td><?php echo ($value["zhanghao"]); ?></td>
    <td><?php echo ($value["xingming"]); ?></td>
    <td><?php echo ($value["liuyan"]); ?></td>
    <td><?php echo ($value["huifu"]); ?></td>
    <td><?php echo ($value["addtime"]); ?></td>
    <td><?php echo ($value["huifuren"]); ?></td>
  </tr><?php endforeach; endif; ?>
  </table>
  </div>

</body>
</html>