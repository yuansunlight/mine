<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<style type="text/css">
		#testButton { color:rgb(255, 255, 255);font-size:16px;padding-top:7px;padding-bottom:7px;padding-left:47px;padding-right:47px;border-width:2px;border-color:rgb(145, 215, 227);border-style:solid;border-radius:56px;background-color:#0096E6;}
	</style>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge"> 
<meta name="viewport" content="width=device-width, initial-scale=1"> 
<title>login</title>
<link rel="stylesheet" type="text/css" href="/sss/Public/admin/css/normalize.css" />
<link rel="stylesheet" type="text/css" href="/sss/Public/admin/css/demo.css" />
<!--必要样式-->
<link rel="stylesheet" type="text/css" href="/sss/Public/admin/css/component.css" />
</head>
<body>
		<div class="container demo-1">
			<div class="content">
				<div id="large-header" class="large-header">
					<canvas id="demo-canvas"></canvas>
					<div class="logo_box">
						<h2 style="font-size: 30px; ">湖州师范学院评奖评优系统</h2>
						 <form name="form1" method="post" action="<?php echo U('Index/login');?>">
							<div class="input_outer">
								<span class="u_user"></span>
								<input name="username" class="text" style="color: #FFFFFF !important" type="text" placeholder="请输入账户">
							</div>
							<div class="input_outer">
								<span class="us_uer"></span>
								<input name="pwd" class="text" style="color: #FFFFFF !important; position:absolute; z-index:100;"value="" type="password" placeholder="请输入密码">
							</div>
							<div class="center" style="margin-bottom:10px; font-size:16px;">
							</div>
							<div class="center" >
							<input id="testButton" style="margin-right:25px;" type="submit" name="sub" value="确定" />
						    <input id="testButton" type="reset" name="res" value="取消" />
							</div>
						</form>
					</div>
				</div>
			</div>
		</div><!-- /container -->
		<script src="/sss/Public/admin/js/TweenLite.min.js"></script>
		<script src="/sss/Public/admin/js/EasePack.min.js"></script>
		<script src="/sss/Public/admin/js/rAF.js"></script>
		<script src="/sss/Public/admin/js/demo-1.js"></script>
	</body>
</html>