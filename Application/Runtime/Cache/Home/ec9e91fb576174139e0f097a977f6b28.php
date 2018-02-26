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
  .select{
    margin-bottom: 20px;
  }
  .btn-info{
    height:25px;
    font-size:16px;
    /*line-height:25px;*/
  }
</style>

<body>
  <div class="main">
    <div class="select">
  <form id="form1" name="form1" method="post" action="<?php echo U('jianged');?>">
  搜索:<select name="year" id="year" onChange="autoSubmit();">
    <option  value="">学年</option>
     <option  value="2016">2016</option>
    <option  value="2017">2017</option>
    <?php if($year == 2016): ?><option value="2016" selected>2016</option><?php endif; ?>
    <?php if($year == 2017): ?><option value="2017" selected>2017</option><?php endif; ?>
      </select>
      <select name="classes" id="classes" onChange="autoSubmit();">
    <option  value="">班级</option>
    <?php if(is_array($class)): foreach($class as $key=>$value): ?><option value="<?php echo ($value); ?>"><?php echo ($value); ?></option>
    <?php if($classes == $value): ?><option value="<?php echo ($value); ?>" selected><?php echo ($value); ?></option><?php endif; endforeach; endif; ?>

  </select>
  学号:
  <input name="username" type="text" id="username" />
  姓名:
  <input name="name" type="text" id="name" />
  <input type="submit" name="Submit" value="查找" />
  
</form>
</div>
<div class="table">
  <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="90" bgcolor="#EBE2FE">序号</td>
    <td width="90" bgcolor='#EBE2FE'>学年</td>
    <td width="90" bgcolor='#EBE2FE'>姓名</td>
    <td width="90" bgcolor='#EBE2FE'>申请类别</td>
    <td width="90" bgcolor='#EBE2FE'>申请名称</td>
    <td width="90" bgcolor='#EBE2FE'>奖学金总分</td>
    <td width="90" bgcolor='#EBE2FE'>奖学金排名</td>
    <td width="90" bgcolor='#EBE2FE'>测评详情</td>
    <td width="90" align="center" bgcolor="#EBE2FE">审核结果</td>
    <td width="90" align="center" bgcolor="#EBE2FE">申请时间</td>
  </tr>
</table>
<br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <?php if($count1 > 0): ?><p style="text-align: center;">院长奖学金名单(<?php echo ($count1); ?>人)</p><?php endif; ?>
  <?php if(is_array($data1)): foreach($data1 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($k+1); ?></td>
      <td width="90"><?php echo ($value["year"]); ?></td>
      <td width="90"><?php echo ($value["name"]); ?></td>
      <td width="90"><?php echo ($value["leibie"]); ?></td>
      <td width="90"><?php echo ($value["mingcheng"]); ?></td>
      <td width="90"><?php echo ($value["together"]); ?></td>
      <td width="90"><?php echo ($value["rank"]); ?></td>
      <td width="90"><?php echo ($value["instruction"]); ?></td>
      <td width="90"><a  href="<?php echo U('Home/Ceping/ceping1', array('username'=>$value['username']));?>" title="点击通过"><span class="btn btn-info">查看详情</span></a></td>
      <td width="90"><?php echo ($value["addtime"]); ?></td>
    </tr><?php endforeach; endif; ?>
</table>
<br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse"><?php if($count2 > 0): ?><p style="text-align: center;">竞赛单项奖名单(<?php echo ($count2); ?>人)</p><?php endif; ?>
   <?php if(is_array($data2)): foreach($data2 as $k=>$value): ?><tr> 
      <td width="90"><?php echo ($k+1); ?></td>
      <td width="90"><?php echo ($value["year"]); ?></td>
      <td width="90"><?php echo ($value["name"]); ?></td>
      <td width="90"><?php echo ($value["leibie"]); ?></td>
      <td width="90"><?php echo ($value["mingcheng"]); ?></td>
      <td width="90"><?php echo ($value["together"]); ?></td>
      <td width="90"><?php echo ($value["rank"]); ?></td>
      <td width="90"><?php echo ($value["instruction"]); ?></td>
      <td width="90"><a  href="<?php echo U('Home/Ceping/ceping1', array('username'=>$value['username']));?>" title="点击通过"><span class="btn btn-info">查看详情</span></a></td>
      <td width="90"><?php echo ($value["addtime"]); ?></td>
    </tr><?php endforeach; endif; ?>
</table>
<br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
<?php if($count3 > 0): ?><p style="text-align: center;">公益单项奖名单(<?php echo ($count3); ?>人)</p><?php endif; ?>
   <?php if(is_array($data3)): foreach($data3 as $k=>$value): ?><tr>
      <td width="90"><?php echo ($k+1); ?></td>
      <td width="90"><?php echo ($value["year"]); ?></td>
      <td width="90"><?php echo ($value["name"]); ?></td>
      <td width="90"><?php echo ($value["leibie"]); ?></td>
      <td width="90"><?php echo ($value["mingcheng"]); ?></td>
      <td width="90"><?php echo ($value["together"]); ?></td>
      <td width="90"><?php echo ($value["rank"]); ?></td>
      <td width="90"><?php echo ($value["instruction"]); ?></td>
      <td width="90"><a  href="<?php echo U('Home/Ceping/ceping1', array('username'=>$value['username']));?>" title="点击通过"><span class="btn btn-info">查看详情</span></a></td>
      <td width="90"><?php echo ($value["addtime"]); ?></td>
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