 <?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>用户注册</title><link rel="stylesheet" href="css.css" type="text/css">
</head>

<body>

<p>已有用户注册列表：</p>
<form id="form1" name="form1" method="post" action="">
  搜索:账号:
  <input name="bh" type="text" id="bh" />
  姓名:
  <input name="mc" type="text" id="mc" />
  <input type="submit" name="Submit" value="查找" />
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
  <tr>
    <td width="25" bgcolor="#EBE2FE">序号</td>
    <td width="94" bgcolor='#EBE2FE'>账号</td>
    <td width="94" bgcolor='#EBE2FE'>姓名</td>
    <td width="86" bgcolor='#EBE2FE'>班级</td>
    <td width="94" bgcolor='#EBE2FE'>成绩表现测评分</td>
    <td width="94" bgcolor='#EBE2FE'>体侧表现测评分</td>
    <td width="86" bgcolor='#EBE2FE'>实践表现测评分</td>
    <td width="94" bgcolor='#EBE2FE'>获奖表现测评分</td>
    <td width="94" bgcolor='#EBE2FE'>综合测评总分</td>
    <td width="120" align="center" bgcolor="#EBE2FE">添加时间</td>
    <td width="70" align="center" bgcolor="#EBE2FE">操作</td>
  </tr>
   <?php 
    $sql="select * from yonghuzhuce,ceping";
  if ($_POST["bh"]!=""&&$_POST["mc"]!="")
{
  	$nreqbh=$_POST["bh"];
  	$sql=$sql." where zhanghao like '%$nreqbh%' and";
}else 
{
  $nreqbh=$_POST["bh"];
    $sql=$sql." where zhanghao like '%$nreqbh%' ";
}
     if ($_POST["mc"]!="" &&$_POST["bh"]!="")
{
  	$nreqmc=$_POST["mc"];
    echo 123;
  	$sql=$sql." xingming like '%$nreqmc%'";
}
else if($_POST["mc"]!=""){
  $nreqmc=$_POST["mc"];
  $sql=$sql." where xingming like '%$nreqmc%'";
}
  $sql=$sql." order by id desc";
  echo $sql;
  exit;
$query=mysql_query($sql);
  $rowscount=mysql_num_rows($query);
  if($rowscount==0)
  {}
  else
  {
  $pagelarge=10;//每页行数；
  $pagecurrent=$_GET["pagecurrent"];
  if($rowscount%$pagelarge==0)
  {
		$pagecount=$rowscount/$pagelarge;
  }
  else
  {
   		$pagecount=intval($rowscount/$pagelarge)+1;
  }
  if($pagecurrent=="" || $pagecurrent<=0)
{
	$pagecurrent=1;
}
 
if($pagecurrent>$pagecount)
{
	$pagecurrent=$pagecount;
}
		$ddddd=$pagecurrent*$pagelarge;
	if($pagecurrent==$pagecount)
	{
		if($rowscount%$pagelarge==0)
		{
		$ddddd=$pagecurrent*$pagelarge;
		}
		else
		{
		$ddddd=$pagecurrent*$pagelarge-$pagelarge+$rowscount%$pagelarge;
		}
	}

	for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$ddddd;$i++)
{
  ?>
  <tr>
    <td width="25"> <?php
	echo $i+1;
?></td>
    <td> <?php echo mysql_result($query,$i,zhanghao);?></td>
    <td> <?php echo mysql_result($query,$i,mima);?></td>
    <td> <?php echo mysql_result($query,$i,xingming);?></td>
    <td> <?php echo mysql_result($query,$i,xingbie);?></td>
    <td> <?php echo mysql_result($query,$i,diqu);?></td>
    <td> <?php echo mysql_result($query,$i,Email);?></td>
    <td align="center"> <?php echo mysql_result($query,$i,zhaopian);?></td>
    <td width="120" align="center"> <?php echo mysql_result($query,$i,"addtime");?></td>
    <td width="70" align="center">
      <a href="del.php?id= <?php echo mysql_result($query,$i,"id");?>&tablename=yonghuzhuce" onclick="return confirm('真的要删除？')">删除</a> 
      <a href="StudentUpdt.php?id= <?php echo mysql_result($query,$i,"id");?>">修改</a>
      <a href="CepingAdd.php?zhanghao= <?php echo mysql_result($query,$i,"zhanghao");?>">添加</a>
    </td>
  </tr>
  	 <?php
	}
}
?>
</table>
<p>以上数据共 <?php
		echo $rowscount;
	?>条,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" />
</p>
<p align="center"><a href="yonghuzhuce_list.php?pagecurrent=1">首页</a>, <a href="yonghuzhuce_list.php?pagecurrent= <?php echo $pagecurrent-1;?>">前一页</a> ,<a href="yonghuzhuce_list.php?pagecurrent= <?php echo $pagecurrent+1;?>">后一页</a>, <a href="yonghuzhuce_list.php?pagecurrent= <?php echo $pagecount;?>">末页</a>, 当前第 <?php echo $pagecurrent;?>页,共 <?php echo $pagecount;?>页 </p>

<p>&nbsp; </p>

</body>
</html>

