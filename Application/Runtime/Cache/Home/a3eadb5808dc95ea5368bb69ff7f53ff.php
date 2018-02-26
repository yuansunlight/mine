<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<style type="text/css">
  .main{
    margin:50px 60px;
  }
  td{
    text-align: center;
    height:30px;
  }
  .ull ul{
    margin:0 auto;

  }
  .ull ul li{
    float:left;
    margin-right:20px; 

  }
</style>
<link rel="stylesheet" href="/sss/Public/home/css/css.css" type="text/css">
<link rel="stylesheet" href="/sss/Public/home/css/bootstrap.css" type="text/css">
</head>
<body>
<div class="main">
<p>已有成绩列表：</p>
   <form id="form1" name="form1" method="post" action="<?php echo U('list_ceping');?>">
     搜索: 
    <select name="year" id="year" onChange="autoSubmit();">
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
  姓名:
  <input name="name" type="text" id="name" value="<?php echo ($name); ?>" />
  <input type="submit" name="Submit" value="查找" />
  </form>
<br>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse"> 
  <tr>
    <td bgcolor='#EBE2FE'>学年</td>
    <td bgcolor='#EBE2FE'>班级</td>
    <td bgcolor='#EBE2FE'>姓名</td>
    <td bgcolor='#EBE2FE'>GPA</td>
    <td bgcolor='#EBE2FE'>体侧成绩</td>
    <td bgcolor='#EBE2FE'>公益时长</td>
    <td bgcolor='#EBE2FE'>竞赛获奖</td>
    <td bgcolor='#EBE2FE'>旷课</td>
    <td bgcolor='#EBE2FE'>挂科</td>
    <td width="70" align="center" bgcolor="#EBE2FE">操作</td>
  </tr>
  <?php if(is_array($data)): foreach($data as $k=>$value): ?><tr>
      <td><?php echo ($value["year"]); ?></td>
      <td><?php echo ($value["classes"]); ?></td>
      <td><?php echo ($value["name"]); ?></td>
      <td><?php echo ($value["gpa"]); ?></td>
      <td><?php echo ($value["sports"]); ?></td>
      <td><?php echo ($value["practice"]); ?></td>
      <td><?php echo ($value["honor"]); ?></td>
      <td><?php echo ($value["outtime"]); ?></td>
      <td><?php echo ($value["fail"]); ?></td>
      <td>
          <a href="<?php echo U('Home/Ceping/edit', array('id'=>$value['id']));?>" title="编辑">
            <span class="glyphicon glyphicon-pencil"></span>
          </a>&nbsp; 
          <a href="<?php echo U('Home/Ceping/del', array('id'=>$value['id']));?>" title="删除">
            <span class="glyphicon glyphicon-trash"></span>
          </a>
      </td>
    </tr><?php endforeach; endif; ?> 
</table>
<p>&nbsp; </p>
<div class="ull">
    <ul style="list-style: none;position:absolute;top:660px;font-size:23px;color:white;">
      <?php if($page > 1): ?><li><a class="btn btn-primary glyphicon glyphicon-chevron-left" href="<?php echo U('list_ceping', array('page'=>$pre));?>"></a></li><?php endif; ?>

      <?php $__FOR_START_30988__=1;$__FOR_END_30988__=$pages+1;for($i=$__FOR_START_30988__;$i < $__FOR_END_30988__;$i+=1){ ?><li><a class="btn btn-primary" style="font-size:16px;" href="<?php echo U('list_ceping', array('page'=>$i));?>"><?php echo ($i); ?></a></li><?php } ?>

      <?php if($page < $pages): ?><li><a  class="btn btn-primary glyphicon glyphicon-chevron-right" href="<?php echo U('list_ceping', array('page'=>$next));?>"></a></li><?php endif; ?>
    </ul>
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