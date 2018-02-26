<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link rel="stylesheet" href="/sss/Public/home/css/css.css" type="text/css">
<link href="/sss/Public/home/css/bootstrap.css" rel="stylesheet">

</head>

<body>
  <div>
    <!-- <p>已有<?php echo ($count); ?>条通知：</p> -->
    <div style="margin-top: 35px;margin-left:50px;">
      <form id="form1" name="form1" method="get" action="<?php echo U('Notice/notice1');?>">
标题：<input name="biaoti" type="text" id="biaoti" />
  <input class="btn btn-success " type="submit" name="Submit" value="查找" style="height:28px;"/>
</form> 
    </div>

 <div style="margin-top: 15px;margin-left:50px;margin-right: 50px;">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse;text-align: center;">  
<tr>
    <td width="25" bgcolor="#EBE2FE">序号</td>
    <td width="108" bgcolor='#EBE2FE'>标题</td>
    <td width="108" bgcolor='#EBE2FE'>类别</td>
    <td bgcolor='#EBE2FE'>内容</td>
    <td width="45" bgcolor='#EBE2FE'>添加人</td>
    <td width="108" width="120" align="center" bgcolor="#EBE2FE">添加时间</td>
  </tr>
  <?php if(is_array($data)): foreach($data as $k=>$value): ?><tr height="200" class="text-c">
          <td><?php echo ($value["id"]); ?></td>
          <td><?php echo ($value["biaoti"]); ?></td>
          <td><?php echo ($value["leibie"]); ?></td>
          <td><?php echo ($value["neirong"]); ?></td>
          <td><?php echo ($value["tianjiaren"]); ?></td>
          <td><?php echo ($value["addtime"]); ?></td>
        </tr><?php endforeach; endif; ?> 
  </div>
<div>
    <ul style="list-style: none;position:absolute; left:640px;top:730px;font-size:23px;color:white;">
    <?php if($page > 1): ?><li  style="float:left;margin-right:30px;"><a class="btn btn-primary glyphicon glyphicon-chevron-left" href="<?php echo U('notice1', array('page'=>$pre));?>"></a></li><?php endif; ?>
    
    <?php $__FOR_START_6927__=1;$__FOR_END_6927__=$pages+1;for($i=$__FOR_START_6927__;$i < $__FOR_END_6927__;$i+=1){ ?><li  style="float:left;margin-right:30px; "><a class="btn btn-primary" style="font-size:16px;" href="<?php echo U('notice1', array('page'=>$i));?>"><?php echo ($i); ?></a></li><?php } ?>

    <?php if($page < $pages): ?><li style="float:left;margin-right:30px;"><a  class="btn btn-primary glyphicon glyphicon-chevron-right" href="<?php echo U('notice1', array('page'=>$next));?>"></a></li><?php endif; ?>
    </ul>
  </div>
  </div>

</body>
</html>