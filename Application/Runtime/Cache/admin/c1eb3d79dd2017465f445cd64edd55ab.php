<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>申请书审核</title>
<link rel="stylesheet" href="/sss/Public/admin/css/css.css" type="text/css">
<link rel="stylesheet" href="/sss/Public/admin/css/bootstrap.css" type="text/css">
</head>
<style type="text/css">
  td{
    text-align: center;
    height:30px;
  }
  .aa{
    margin:70px 0;
  }
  .select{
    margin-bottom: 20px;
  }
  .btn-info{
    height:25px;
    font-size:16px;
    /*line-height:25px;*/
  }
  .table{
    float:left;
    width:380px;
    height:250px;
  }
</style>

<body>
 <h2 style="text-align: center;">2017奖学金以及个人荣誉汇总表</h2>
  <form id="form1" action="<?php echo U('Together/together');?>" method="post">
   <select name="year" onChange="autoSubmit();">
     <option value="2016">2016</option>
     <option value="2017">2017</option>
     <?php if( $yy == 2016): ?><option value="2016" selected>2016</option><?php endif; ?>
     <?php if( $yy == 2017): ?><option value="2017" selected>2017</option><?php endif; ?>
   </select>
 </form>
<div class="aa">
<div class="table">
  <table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="90" bgcolor="#EBE2FE">院长奖获得者汇总</td>
  </tr>
</table>
<br>
<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <?php if(is_array($award1)): foreach($award1 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($k+1); ?></td>
      <td width="90"><?php echo ($value["classes"]); ?></td>
      <td width="90"><a  href="<?php echo U('Home/Ceping/ceping1', array('username'=>$value['username']));?>" title="点击通过"><span ><?php echo ($value["name"]); ?></span></a></td>
    </tr><?php endforeach; endif; ?>
</table>

</div>
<div class="table">
  <table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="90" bgcolor="#EBE2FE">公益单项奖获得者汇总</td>
  </tr>
</table>
<br>
<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <?php if(is_array($award2)): foreach($award2 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($k+1); ?></td>
      <td width="90"><?php echo ($value["classes"]); ?></td>
      <td width="90"><a  href="<?php echo U('Home/Ceping/ceping1', array('username'=>$value['username']));?>" title="点击通过"><span ><?php echo ($value["name"]); ?></span></a></td>
    </tr><?php endforeach; endif; ?>
</table>

</div>


<div class="table">
  <table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="90" bgcolor="#EBE2FE">竞赛单项奖获得者汇总</td>
  </tr>
</table>
<br>
<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <?php if(is_array($award3)): foreach($award3 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($k+1); ?></td>
      <td width="90"><?php echo ($value["classes"]); ?></td>
      <td width="90"><a  href="<?php echo U('Home/Ceping/ceping1', array('username'=>$value['username']));?>" title="点击通过"><span ><?php echo ($value["name"]); ?></span></a></td>
    </tr><?php endforeach; endif; ?>
</table>

</div>
<div class="table">
  <table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="90" bgcolor="#EBE2FE">一等奖学金获得者汇总</td>
  </tr>
</table>
<br>
<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
<!--   <?php if($count1 > 0): ?><p style="text-align: center;">一等奖申报名单(<?php echo ($count1); ?>人)</p><?php endif; ?> -->
  <?php if(is_array($award4)): foreach($award4 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($k+1); ?></td>
      <td width="90"><?php echo ($value["classes"]); ?></td>
      <td width="90"><a  href="<?php echo U('Home/Ceping/ceping1', array('username'=>$value['username']));?>" title="点击通过"><span ><?php echo ($value["name"]); ?></span></a></td>
    </tr><?php endforeach; endif; ?>
</table>

</div>
<div class="table">
  <table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="90" bgcolor="#EBE2FE">二等奖学金获得者汇总</td>
  </tr>
</table>
<br>
<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <?php if(is_array($award5)): foreach($award5 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($k+1); ?></td>
      <td width="90"><?php echo ($value["classes"]); ?></td>
      <td width="90"><a  href="<?php echo U('Home/Ceping/ceping1', array('username'=>$value['username']));?>" title="点击通过"><span ><?php echo ($value["name"]); ?></span></a></td>
    </tr><?php endforeach; endif; ?>
</table>

</div>


<div class="table">
  <table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="90" bgcolor="#EBE2FE">三等奖学金获得者汇总</td>
  </tr>
</table>
<br>
<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <?php if(is_array($award6)): foreach($award6 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($k+1); ?></td>
      <td width="90"><?php echo ($value["classes"]); ?></td>
      <td width="90"><a  href="<?php echo U('Home/Ceping/ceping1', array('username'=>$value['username']));?>" title="点击通过"><span ><?php echo ($value["name"]); ?></span></a></td>
    </tr><?php endforeach; endif; ?>
</table>

</div>
<div class="table">
  <table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="90" bgcolor="#EBE2FE">优秀学生干部获得者汇总</td>
  </tr>
</table>
<br>
<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <?php if(is_array($award7)): foreach($award7 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($k+1); ?></td>
      <td width="90"><?php echo ($value["classes"]); ?></td>
      <td width="90"><a  href="<?php echo U('Home/Ceping/ceping1', array('username'=>$value['username']));?>" title="点击通过"><span ><?php echo ($value["name"]); ?></span></a></td>
    </tr><?php endforeach; endif; ?>
</table>

</div>
<div class="table">
  <table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="90" bgcolor="#EBE2FE">优秀学生获得者汇总</td>
  </tr>
</table>
<br>
<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <?php if(is_array($award8)): foreach($award8 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($k+1); ?></td>
      <td width="90"><?php echo ($value["classes"]); ?></td>
      <td width="90"><a  href="<?php echo U('Home/Ceping/ceping1', array('username'=>$value['username']));?>" title="点击通过"><span ><?php echo ($value["name"]); ?></span></a></td>
    </tr><?php endforeach; endif; ?>
</table>

</div>
<div class="table">
  <table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="90" bgcolor="#EBE2FE">先进个人获得者汇总</td>
  </tr>
</table>
<br>
<table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <?php if(is_array($award9)): foreach($award9 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($k+1); ?></td>
      <td width="90"><?php echo ($value["classes"]); ?></td>
      <td width="90"><a  href="<?php echo U('Home/Ceping/ceping1', array('username'=>$value['username']));?>" title="点击通过"><span ><?php echo ($value["name"]); ?></span></a></td>
    </tr><?php endforeach; endif; ?>
</table>

</div>

  
</div>
</body>
<script type="text/javascript">
 function autoSubmit(){
 var form1=document.getElementById("form1");
  form1.submit();
} 
</script>
</html>