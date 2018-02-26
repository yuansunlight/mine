<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="<?php echo U('Manage/upload');?>" enctype="multipart/form-data" method="post" >
		<input type="text" name="name" />
		<input type="file" name="photo" />
		<input type="submit" value="提交" >
	</form>
</body>
</html>