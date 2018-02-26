<?php
session_start();
include_once 'conn.php';
include_once 'sinaEditor.class.php';
extract($_POST);
extract($_GET);
$editor=new sinaEditor('neirong');
$editor->Value='';
$editor->BasePath='.';
$editor->Height=460;
$editor->Width=650;
$editor->AutoSave=false;
$ndate =date("Y-m-d");
$addnew=$_POST["addnew"];
$zhanghao=$_GET["zhanghao"];
if ($addnew=="1" )
{
	 

	mysql_query($sql);
	echo "<script>location.href='CepingAddd.php?zhanghao=$zhanghao';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>
<script language="javascript">
	
	
	function OpenScript(url,width,height)
{
  var win = window.open(url,"SelectToSort",'width=' + width + ',height=' + height + ',resizable=1,scrollbars=yes,menubar=no,status=yes' );
}
	function OpenDialog(sURL, iWidth, iHeight)
{
   var oDialog = window.open(sURL, "_EditorDialog", "width=" + iWidth.toString() + ",height=" + iHeight.toString() + ",resizable=no,left=0,top=0,scrollbars=no,status=no,titlebar=no,toolbar=no,menubar=no,location=no");
   oDialog.focus();
}
</script>
<body>
<p>添加<?php echo $lb;?>： 当前日期： <?php echo $ndate; ?></p>
<form id="form1" name="form1" method="post" action="">


<table class="tea_complex">
					<caption><h3>综合测评录入</h3></caption>
					<tr>
						<td>学期</td>
						
						<td>班级</td>
						
	
						<td>学生学号</td>
						
						<td>学生姓名</td>
						
						<td>是否录入</td>
						
						<!-- <td>体侧表现测评分</td>
						
						<td>实践表现测评分</td>
						
						<td>获奖表现测评分</td>
						
						<td>综合测评总分</td> -->
					
						<!-- <td><input type="hidden" name="addnew" value="1" />
       						 <input type="submit" name="Submit" value="添加" onclick="return check();" />
       					</td>
						<td> <input type="reset" name="res" value="重置" /></td> -->
					</tr>
	<?php 
    $sql="select * from yonghuzhuce where 1=1 ";
  if ($_POST["bh"]!="")
{
    $nreqbh=$_POST["bh"];
    $sql=$sql." and banji like '%$nreqbh%'";
}
     if ($_POST["mc"]!="")
{
    $nreqmc=$_POST["mc"];
    $sql=$sql." and s3 like '%$nreqmc%'";
}
// if ($_POST["biaoti"]!=""){$nreqbiaoti=$_POST["biaoti"];$sql=$sql." and biaoti like '%$nreqbiaoti%'";}
 
  $sql=$sql." order by id desc";
 
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

							<td>
								<select name="s1">
								<option value="2016">2016</option>
								<option value="2017">2017</option>
								</select>
							</td>
							<td  ><input style="width:65px;" type="text" id="banji" name="banji" value='<?php echo mysql_result($query,$i,zhaopian);?>' /></td>
							</td>
							<td><input type="text" id="s2" name="s2" value='<?php echo mysql_result($query,$i,zhanghao);?>' /></td>
							<td><input type="text" id="s3" name="s3" value='<?php echo mysql_result($query,$i,xingming);?>'/></td>
							<td> <input type="text" name="panduan" value="<?php echo mysql_result($query,$i,xingming);?>" /></td>

						<td><input type="hidden" name="addnew" value="1" />
       						 <input type="submit" name="Submit" value="添加" onclick="return check();" />
       					</td>
						
						</tr>

  	 <?php
	}
}
?>	<!-- <tr>
					
					</tr> -->
						</table>			 
</form>			
<p>以上数据共 <?php
		echo $rowscount;
	?>条,
  <input type="button" name="Submit2" onclick="javascript:window.print();" value="打印本页" />
</p>
<p align="center"><a href="ceping_list.php?pagecurrent=1&lb= <?php echo $lb?>">首页</a>, <a href="ceping_list.php?pagecurrent= <?php echo $pagecurrent-1;?>&lb= <?php echo $lb?>">前一页</a> ,<a href="ceping_list.php?pagecurrent= <?php echo $pagecurrent+1;?>&lb= <?php echo $lb?>">后一页</a>, <a href="ceping_list.php?pagecurrent= <?php echo $pagecount;?>&lb= <?php echo $lb?>">末页</a>, 当前第 <?php echo $pagecurrent;?>页,共 <?php echo $pagecount;?>页 </p>

						
					

<p>&nbsp;</p>
</body>
<script type="text/javascript">
	// var input=document.getElementsByTagName('input');
	// var button=document.getElementsByTagName('button');
	// for(var i=0;i<button.length;i++){
	// button[i].onclick=function(){
	// var sum=0;
	// var h=11;
	// sum=0.4*parseInt(input[3+h*i].value)+0.2*parseInt(input[4+h*i].value)+0.2*parseInt(input[5+h*i].value)+0.2*parseInt(input[6+h*i].value);
	// input[7+h*i].value=parseInt(sum);
	// return false;
	// }
	// }
	
	// button[0].onclick=function(){
	// input[2].value='<?php 
	// echo $_SESSION["s4"];?>';
	// return false;
	// }
</script>
</html>

