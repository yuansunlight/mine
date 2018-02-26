<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>申请书审核</title>
<link rel="stylesheet" href="/sss/Public/home/css/css.css" type="text/css">
<link rel="stylesheet" href="/sss/Public/home/css/bootstrap.css" type="text/css">
</head>
<style type="text/css">
  td{
    text-align: center;
    height:30px;
  }
  .main{
    margin:70px 80px;
  }
  .table{
    margin-top: 20px;
  }
  .btn-info{
    height:25px;
    font-size:16px;
    /*line-height:25px;*/
  }
</style>

<body>
  <div class="main">
<div class="table">
  <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="90" bgcolor='#EBE2FE'>学年</td>
    <td width="90" bgcolor='#EBE2FE'>姓名</td>
    <td width="90" bgcolor='#EBE2FE'>申请类别</td>
    <td width="90" bgcolor='#EBE2FE'>申请名称</td>
    <td width="90" bgcolor='#EBE2FE'>奖学金总分</td>
    <td width="90" bgcolor='#EBE2FE'>奖学金排名</td>
    <td width="90" align="center" bgcolor="#EBE2FE">申请时间</td>
  </tr>
</table>
<br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse"> 
<?php if($count1 > 0): ?><p style="text-align: center;">院长奖</p><?php endif; ?>
  <?php if(is_array($data1)): foreach($data1 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($value["year"]); ?></td>
      <td width="90"><?php echo ($value["name"]); ?></td>
      <td width="90"><?php echo ($value["leibie"]); ?></td>
      <td width="90"><?php echo ($value["mingcheng"]); ?></td>
      <td width="90"><?php echo ($value["together"]); ?></td>
      <td width="90"><?php echo ($value["rank"]); ?></td>
      <td width="90"><?php echo ($value["addtime"]); ?></td>
    </tr><?php endforeach; endif; ?>
</table>
<br>

<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse"> 
<?php if($count2 > 0): ?><p style="text-align: center;">竞赛单项奖</p><?php endif; ?>
  <?php if(is_array($data2)): foreach($data2 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($value["year"]); ?></td>
      <td width="90"><?php echo ($value["name"]); ?></td>
      <td width="90"><?php echo ($value["leibie"]); ?></td>
      <td width="90"><?php echo ($value["mingcheng"]); ?></td>
      <td width="90"><?php echo ($value["together"]); ?></td>
      <td width="90"><?php echo ($value["rank"]); ?></td>
      <td width="90"><?php echo ($value["addtime"]); ?></td>
    </tr><?php endforeach; endif; ?>
</table>
<br>

<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse"> 
<?php if($count3 > 0): ?><p style="text-align: center;">公益单项奖</p><?php endif; ?>
  <?php if(is_array($data3)): foreach($data3 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($value["year"]); ?></td>
      <td width="90"><?php echo ($value["name"]); ?></td>
      <td width="90"><?php echo ($value["leibie"]); ?></td>
      <td width="90"><?php echo ($value["mingcheng"]); ?></td>
      <td width="90"><?php echo ($value["together"]); ?></td>
      <td width="90"><?php echo ($value["rank"]); ?></td>
      <td width="90"><?php echo ($value["addtime"]); ?></td>
    </tr><?php endforeach; endif; ?>
</table>
<br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse"> 
<?php if($count4 > 0): ?><p style="text-align: center;">一等奖</p><?php endif; ?>
  <?php if(is_array($data4)): foreach($data4 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($value["year"]); ?></td>
      <td width="90"><?php echo ($value["name"]); ?></td>
      <td width="90"><?php echo ($value["leibie"]); ?></td>
      <td width="90"><?php echo ($value["mingcheng"]); ?></td>
      <td width="90"><?php echo ($value["together"]); ?></td>
      <td width="90"><?php echo ($value["rank"]); ?></td>
      <td width="90"><?php echo ($value["addtime"]); ?></td>
    </tr><?php endforeach; endif; ?>
</table>
<br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse"> 
  <?php if($count5 > 0): ?><p style="text-align: center;">二等奖</p><?php endif; ?>
   <?php if(is_array($data5)): foreach($data5 as $k=>$value): ?><tr> 
      <td width="90"><?php echo ($value["year"]); ?></td>
      <td width="90"><?php echo ($value["name"]); ?></td>
      <td width="90"><?php echo ($value["leibie"]); ?></td>
      <td width="90"><?php echo ($value["mingcheng"]); ?></td>
      <td width="90"><?php echo ($value["together"]); ?></td>
      <td width="90"><?php echo ($value["rank"]); ?></td>
      <td width="90"><?php echo ($value["addtime"]); ?></td>
    </tr><?php endforeach; endif; ?>
</table>
<br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse"><?php if($count6 > 0): ?><p style="text-align: center;">三等奖</p><?php endif; ?>
   <?php if(is_array($data6)): foreach($data6 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($value["year"]); ?></td>
      <td width="90"><?php echo ($value["name"]); ?></td>
      <td width="90"><?php echo ($value["leibie"]); ?></td>
      <td width="90"><?php echo ($value["mingcheng"]); ?></td>
      <td width="90"><?php echo ($value["together"]); ?></td>
      <td width="90"><?php echo ($value["rank"]); ?></td>
      <td width="90"><?php echo ($value["addtime"]); ?></td>
    </tr><?php endforeach; endif; ?>
</table>
</div>
  </div>


</body>
</html>