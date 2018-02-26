<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户注册</title>
<style type="text/css">
  td{
    height:30px;
    text-align: center;
  }
  .book{
    margin:50px 50px 0 50px;
  }
  .table{
    margin-top:30px;
  }
  .btn{
    color:white;
    width: 60px;
    height: 30px;
    border-radius: 5px;
    background-color:#1F7FD2;
  }
  .ull ul{
    margin:0 auto;

  }
  .ull ul li{
    float:left;
    margin-right:20px; 

  }
</style>
<link rel="stylesheet" href="/sss/Public/admin/css/css.css" type="text/css">

</head>

<body>
  <div class="main">
    <div class="book">
  <p>已有学生列表：</p>
<form id="form1" name="form1" method="get" action="<?php echo U('manage');?>">
  搜索:
  <select style="height:25px;" name="xy" id="xy" onChange="autoSubmit();">
     <option  value="">学院</option>
    <?php if(is_array($xy)): foreach($xy as $key=>$value): ?><option value="<?php echo ($value["xy"]); ?>"><?php echo ($value["xy"]); ?></option>
    <?php if($aa == $value.xy): ?><option value="<?php echo ($value["xy"]); ?>" selected><?php echo ($value["xy"]); ?></option><?php endif; endforeach; endif; ?>
  </select>
  <select style="height:25px;" name="classes" id="classes" onChange="autoSubmit();">
     <option  value="">班级</option>
    <?php if(is_array($class)): foreach($class as $key=>$value): ?><option value="<?php echo ($value["classes"]); ?>"><?php echo ($value["classes"]); ?></option>
    <?php if($classes == $value.classes): ?><option value="<?php echo ($value["classes"]); ?>" selected><?php echo ($value["classes"]); ?></option><?php endif; endforeach; endif; ?>
  </select>
  账号:
  <input name="username" type="text" id="username" value="<?php echo ($_POST['username']); ?>" />
  姓名:
  <input name="name" type="text" id="name" value="<?php echo ($_POST['name']); ?>"  />
  <input class="btn btn-success" type="submit" name="Submit" value="查找" />
</form>
<div class="table">
  <table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#EBE2FE">序号</td>
    <td width="94" bgcolor='#EBE2FE'>学号</td>
    <td width="86" bgcolor='#EBE2FE'>班级</td>
    <td width="94" bgcolor='#EBE2FE'>姓名</td>
    <td width="94" bgcolor='#EBE2FE'>性别</td>
    <td width="167" bgcolor='#EBE2FE'>地区</td>
    <td width="204" bgcolor='#EBE2FE'>银行卡号</td>  
    <td width="120" align="center" bgcolor="#EBE2FE">添加时间</td>
    <td width="70" align="center" bgcolor="#EBE2FE">操作</td>
  </tr>
  <?php if(is_array($data)): foreach($data as $k=>$value): ?><tr>
      <td><?php echo ($k+1); ?></td>
      <td><?php echo ($value["username"]); ?></td>
      <td><?php echo ($value["classes"]); ?></td>
      <td><?php echo ($value["name"]); ?></td>
      <td><?php echo ($value["sex"]); ?></td>
      <td><?php echo ($value["home"]); ?></td>
      <td><?php echo ($value["bankcard"]); ?></td>
      <td><?php echo ($value["addtime"]); ?></td>
      <td><a href="<?php echo U('Home/User/edit', array('id'=>$value['id']));?>" title="编辑"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
         <a href="<?php echo U('Home/User/del', array('id'=>$value['id']));?>" title="删除"><span class="glyphicon glyphicon-trash"></span></a>
        </td> 
    </tr><?php endforeach; endif; ?>
</div>

</div>
<div class="ull">
    <ul style="list-style: none;position:absolute;top:660px;font-size:23px;color:white;">
    <?php if($page > 1): ?><li><a class="btn btn-primary glyphicon glyphicon-chevron-left" href="<?php echo U('manage', array('page'=>$pre));?>"></a></li><?php endif; ?>
    
    <?php $__FOR_START_29335__=1;$__FOR_END_29335__=$pages+1;for($i=$__FOR_START_29335__;$i < $__FOR_END_29335__;$i+=1){ ?><li><a class="btn btn-primary" style="font-size:16px;" href="<?php echo U('manage', array('page'=>$i));?>"><?php echo ($i); ?></a></li><?php } ?>

    <?php if($page < $pages): ?><li><a  class="btn btn-primary glyphicon glyphicon-chevron-right" href="<?php echo U('manage', array('page'=>$next));?>"></a></li><?php endif; ?>
    </ul>
  </div>
  </div>

</body>
<link rel="stylesheet" href="/sss/Public/admin/css/bootstrap.css" type="text/css">
<script type="text/javascript">
 function autoSubmit(){
 var form1=document.getElementById("form1");
  form1.submit();
} 
</script>
</html>