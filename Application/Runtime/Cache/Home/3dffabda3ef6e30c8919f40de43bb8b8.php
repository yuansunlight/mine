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
    height:27px;
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
    <div class="select">
  <form id="form1" name="form1" method="post" action="<?php echo U('check');?>">
  <input style="float:right;" type="submit" name="submit"  value="提交名单" />
  
</form>
</div>
<br>
<div class="table">
  <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="90" bgcolor="#EBE2FE">序号</td>
    <td width="90" bgcolor='#EBE2FE'>学年</td>
    <td width="90" bgcolor='#EBE2FE'>姓名</td>
    <td width="90" bgcolor='#EBE2FE'>申请类别</td>
    <td width="90" bgcolor='#EBE2FE'>申请名称</td>
    <td width="90" bgcolor='#EBE2FE'>总分</td>
    <td width="90" bgcolor='#EBE2FE'>排名</td>
    <td width="90" bgcolor='#EBE2FE'>测评详情</td>
    <td width="90" align="center" bgcolor="#EBE2FE">审核结果</td>
    <td width="90" align="center" bgcolor="#EBE2FE">申请时间</td>
    <td width="90" align="center" bgcolor="#EBE2FE">操作</td>
  </tr>
</table>
<br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse"> 
<?php if($count3 > 0): ?><p style="text-align: center;">优秀学生干部申报名单(名额为:<?php echo ($san); ?>)</p><?php endif; ?>
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
      <td width="90"> 
       <!--  <a href="<?php echo U('Home/Jiangjin/', array('id'=>$value['id']));?>"><input type="radio" name=""></a> -->
        <?php if($value["status"] == 0): ?><a href="<?php echo U('Home/Rongyu/pass', array('id'=>$value['id']));?>" title="点击通过"><span class="glyphicon glyphicon-star-empty"></span></a><?php endif; ?>
        <?php if($value["status"] == 1): ?><a href="<?php echo U('Home/Rongyu/pass', array('id'=>$value['id']));?>" title="点击不通过"><span class="glyphicon glyphicon-star"></span></a><?php endif; ?>
    </td>
    </tr><?php endforeach; endif; ?>
</table>
<br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse"> 
<?php if($count1 > 0): ?><p style="text-align: center;">优秀学生申报名单(名额为:<?php echo ($yi); ?>)</p><?php endif; ?>
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
      <td width="90"> 
       <!--  <a href="<?php echo U('Home/Jiangjin/', array('id'=>$value['id']));?>"><input type="radio" name=""></a> -->
        <?php if($value["status"] == 0): ?><a href="<?php echo U('Home/Rongyu/pass', array('id'=>$value['id']));?>" title="点击通过"><span class="glyphicon glyphicon-star-empty"></span></a><?php endif; ?>
        <?php if($value["status"] == 1): ?><a href="<?php echo U('Home/Rongyu/pass', array('id'=>$value['id']));?>" title="点击不通过"><span class="glyphicon glyphicon-star"></span></a><?php endif; ?>
    </td>
    </tr><?php endforeach; endif; ?>
</table>
<br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse"> 
  <?php if($count2 > 0): ?><p style="text-align: center;">先进个人申报名单(名额为:<?php echo ($er); ?>)</p><?php endif; ?>
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
      <td width="90">
       <?php if($value["status"] == 0): ?><a href="<?php echo U('Home/Rongyu/pass', array('id'=>$value['id']));?>" title="点击通过"><span class="glyphicon glyphicon-star-empty"></span></a><?php endif; ?>
        <?php if($value["status"] == 1): ?><a href="<?php echo U('Home/Rongyu/pass', array('id'=>$value['id']));?>" title="点击不通过"><span class="glyphicon glyphicon-star"></span></a><?php endif; ?></td>
    </tr><?php endforeach; endif; ?>
</table>

</div>
  </div>


</body>
<script type="text/javascript">
 function autoSubmit(){
 var form1=document.getElementById("form1");
  form1.submit();
 var year=document.getElementById("year");
 var index=year.selectedIndex;
 year.children[0].value= year.children[index].value;
 console.log(year.children[0].value);

} 
</script>
</html>