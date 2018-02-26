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
$lb=$_GET["lb"];
if ($addnew=="1" )
{
	 
$banji=$_POST["banji"]; 	
$s1=$_POST["s1"]; 
$s2=$_POST["s2"]; 
$s3=$_POST["s3"]; 
$s4=$_POST["s4"]; 

$s5=$_POST["s5"]; 
$s6=$_POST["s6"]; 
$s7=$_POST["s7"]; 
$s8=$_POST["s8"]; 


	$sql="insert into ceping(banji,s1,s2,s3,s4,s5,s6,s7,s8) values('$banji','$s1','$s2','$s3','$s4','$s5','$s6','$s7','$s8') ";	
	mysql_query($sql);
	echo "<script>javascript:alert('添加成功!');location.href='CepingList.php?lb=$lb';</script>";
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
					<caption>综合测评录入</caption>
					<tr>
						<td>学期</td>
						<td>
							<select name="s1">
								<option value="2016">2016</option>
								<option value="2017">2017</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>班级</td>
						<td>
							<select name="banji">
								<option value="20142831">20142831</option>
								<option value="20142832">20142832</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>学生学号</td>
						<td><input type="text" id="s2" name="s2" /></td>
					</tr>
					<tr>
						<td>学生姓名</td>
						<td><input type="text" id="s3" name="s3" /></td>
					</tr>
					<tr>
						<td>成绩表现测评分</td>
						<td><input type="text" id="s4" name="s4" /></td>
					</tr>
					<tr>
						<td>体侧表现测评分</td>
						<td><input type="text" id="s5" name="s5" /></td>
					</tr>
					<tr>
						<td>实践表现测评分</td>
						<td><input type="text" id="s6" name="s6" /></td>
					</tr>
					<tr>
						<td>获奖表现测评分</td>
						<td><input type="text" id="s7" name="s7" /></td>
					</tr>
					<tr>
						<td>综合测评总分</td>
						<td>
							<input type="text" name="s8"  /></td> <td><button>计算</button></td>
					</tr>

						<td><input type="hidden" name="addnew" value="1" />
       						 <input type="submit" name="Submit" value="添加" onclick="return check();" />
       					</td>
						<td> <input type="reset" name="res" value="重置" /></td>
					</tr>
				</table>			 
</form>
<p>&nbsp;</p>
</body>
<script type="text/javascript">
	var input=document.getElementsByTagName('input');
	var button=document.getElementsByTagName('button');
	button[0].onclick=function(){
	var sum=0;
	sum=0.4*parseInt(input[2].value)+0.2*parseInt(input[3].value)+0.2*parseInt(input[4].value)+0.2*parseInt(input[5].value);
	input[6].value=parseInt(sum);
	return false;
	}
	// button[0].onclick=function(){
	// input[2].value='<?php 
	// echo $_SESSION["s4"];?>';
	// return false;
	// }
</script>
</html>

