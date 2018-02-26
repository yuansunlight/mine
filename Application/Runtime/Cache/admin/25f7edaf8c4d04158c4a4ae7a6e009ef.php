<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title><script language="javascript" src="/sss/Public/admin/js/Calendar.js"></script>
<link rel="stylesheet" href="/sss/Public/admin/css/css.css" type="text/css">
<link rel="stylesheet" type="text/css" href="/sss/Public/admin/css/bootstrap.css">
<style type="text/css">
	
	.body{
		position: relative;
	}
		.block{	
		width: 300px;
		height:300px;
	}
	.main{
		width: 300px;
		position:absolute;
		left:40px;
		top:70px;
	}
	h2{
		text-align: center;
	}
	.table{
		width:1000px;
		position:absolute;
		left:440px;
		top:150px;
	}
	td{
		height:27px;
		text-align: center;
	}
	.input{
		margin-top:20px;
		margin-left:70px;
		
	}
	.btn{
		height:27px;
	}
</style>
</head>

<body>	
	<br>
	
<div class="body">
	<div class="main">

	<form id="form1" name="form1" method="post" action="<?php echo U('addhonor');?>">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">    
	<h4 style="text-align:center;font-size:24px; ">添加奖项</h4>
		<tr>
		<td>奖项类别:
			<label><input type="radio" name="leibie" value="奖学金">奖学金</label>
			<label><input type="radio" name="leibie" value="个人荣誉">个人荣誉</label>
		</td>
	</tr>
	<tr>
		<td>奖项名称：<input type="text" name="mingcheng"></td>
	</tr>
	
	<tr>
		<td>奖项说明：<input type="text" name="shuoming"></td>
	</tr>
	<tr>
		<td>奖项名额：<input type="text" name="num"></td>
	</tr>

			<tr><td>&nbsp;GPA绩点:<input type="text" name="gpa"></td></tr>
			<tr><td>体侧成绩: <input type="text" name="sports"></td></tr>
			<tr><td>公益时长: <input type="text" name="practice"></td></tr>
			<tr><td>竞赛获奖: <input type="text" name="honor"></td></tr>
			<tr><td>学生旷课: <input type="text" name="outtime"></td></tr>
			<tr><td>挂科情况: <input type="text" name="fail"></td></tr>
			<!-- <tr><td>综合算法: <input type="text" name="together"></td></tr> -->
			<tr><td style="text-align:left;">&nbsp;&nbsp;&nbsp;GPA绩点占比:
				<select name="gpadata">
					<?php if(is_array($select)): foreach($select as $key=>$value): ?><option><?php echo ($value["select"]); ?>%</option><?php endforeach; endif; ?>
				</select>
			</td></tr>
			<!-- <tr><td style="text-align:left;">&nbsp;&nbsp;&nbsp;体侧成绩占比: 
				<select name="sportsdata">
					<?php if(is_array($select)): foreach($select as $key=>$value): ?><option><?php echo ($value["select"]); ?>%</option><?php endforeach; endif; ?>
				</select>
			</td></tr> -->
			<tr><td style="text-align:left;">&nbsp;&nbsp;&nbsp;公益时长占比: 
				<select name="practicedata">
					<?php if(is_array($select)): foreach($select as $key=>$value): ?><option><?php echo ($value["select"]); ?>%</option><?php endforeach; endif; ?>
				</select>
			</td></tr>
			<tr><td style="text-align:left;">&nbsp;&nbsp;&nbsp;竞赛获奖占比: 
				<select name="honordata">
					<?php if(is_array($select)): foreach($select as $key=>$value): ?><option><?php echo ($value["select"]); ?>%</option><?php endforeach; endif; ?>
				</select>
			</td></tr>
    <tr>
      
      	<div class="input">
      		<td><input type="hidden" name="addnew" value="1" />
      		<input class="btn btn-success"  type="submit" name="Submit" value="添加" onclick="return check();" />
            <input class="btn btn-success"  type="reset" name="Submit2" value="重置" /></td>
      	</div>
        
    </tr> 
     </table>
</form>

</div>

<div class="table">
	<h2>管理奖项</h2>
	<br>
	 <table border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
	<tr>
    <td width="120" bgcolor="#EBE2FE">序号</td>
    <td width="120" bgcolor='#EBE2FE'>奖项类别</td>
    <td width="120" bgcolor='#EBE2FE'>奖项名称</td>
    <td width="200" bgcolor='#EBE2FE'>奖项说明</td>
    <td width="120" bgcolor='#EBE2FE'>奖项名额</td>
    <td width="120" bgcolor='#EBE2FE'>GPA绩点</td>
    <td width="120" bgcolor='#EBE2FE'>体侧成绩</td>
    <td width="120" bgcolor='#EBE2FE'>公益时长</td>
    <td width="120" bgcolor='#EBE2FE'>竞赛获奖</td>  
    <td width="120" bgcolor="#EBE2FE">学生旷课</td>
     <td width="120" bgcolor="#EBE2FE">挂科情况</td>
     <td width="200" bgcolor="#EBE2FE">综合算法</td>
    <td width="120" align="center" bgcolor="#EBE2FE">操作</td>
  </tr>
	<?php if(is_array($data)): foreach($data as $k=>$value): ?><tr>
      <td><?php echo ($k+1); ?></td>
      <td><?php echo ($value["leibie"]); ?></td>
      <td><?php echo ($value["mingcheng"]); ?></td>
      <td><?php echo ($value["shuoming"]); ?></td>
      <td><?php echo ($value["num"]); ?></td>
      <td>>= <?php echo ($value["gpa"]); ?></td>
      <td>>= <?php echo ($value["sports"]); ?></td>
      <td>>= <?php echo ($value["practice"]); ?></td>
      <td>>= <?php echo ($value["honor"]); ?></td>
      <td>= <?php echo ($value["outtime"]); ?></td>
      <td><= <?php echo ($value["fail"]); ?></td>
      <td>GPA绩点占比:<?php echo ($value["gpadata"]); ?>%<br>公益时长占比:<?php echo ($value["practicedata"]); ?>%<br>竞赛获奖占比:<?php echo ($value["honordata"]); ?>%</td>
      <td><a href="<?php echo U('Admin/Manage/edit', array('id'=>$value['id']));?>" title="编辑"><span class="glyphicon glyphicon-pencil"></span></a>&nbsp;
         <a href="<?php echo U('Admin/Manage/del', array('id'=>$value['id']));?>" title="删除"><span class="glyphicon glyphicon-trash"></span></a>
        </td> 
    </tr><?php endforeach; endif; ?>
</table>
</div>
</div>

<p>&nbsp;</p>
</body>
</html>