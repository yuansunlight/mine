<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title>teacher</title>
		<script type="text/javascript" src="/sss/Public/admin/js/jquery-1.6.2.min.js"></script>
		<!-- <script type="text/javascript" src="js/index.js"></script> -->
		<link href="/sss/Public/admin/css/index.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="top">
			<h2>湖州师范学院评奖评优系统</h2>
			<div class="t_right">
				<span>欢迎管理员,<?php echo ($_SESSION['login']['username']); ?></span>
				<span><a href="<?php echo U('Index/logout');?>" target="_parent">退出</a></span>
				
			</div>
		</div>
		<div id="left">
			<ul>

				<li class="leftmenu"><a href="#">学院负责人</a>
					<ul>
						<li><a href="<?php echo U('Teacher/teacher_list');?>" target=link>学院负责人管理</a></li>
						
						<li><a href="<?php echo U('Teacher/teacher_add');?>" target=link>添加学院负责人</a></li>
					</ul>
				</li>
				<!-- <li class="leftmenu"><a href="#">班级信息</a>
					<ul>
						<li><a href=banjixinxi_list.php target=link>班级管理</a></li>
						
						<li><a href=banjixinxi_add.php target=link>班级添加</a></li>
					</ul>
				</li> -->
<!-- 				<li class="leftmenu"><a href="#">学生</a>
					<ul>
						<li><a href=<?php echo U('Student/manage');?> target=link>学生管理</a></li>
					</ul>
				</li> -->
				<li class="leftmenu"><a href="#">综合管理</a>
					<ul>
				
						<li><a href="<?php echo U('Manage/addhonor');?>" target="link">奖项管理</a></li>
						<li><a href="<?php echo U('Manage/index');?>" target="link">上传</a></li>
						<li><a href="<?php echo U('Rukou/rukou');?>" target="link">申报入口管理</a></li>
					</ul>
				</li>
					<li class="leftmenu"><a href="#">获奖汇总</a>
					<ul>
						<li><a href="<?php echo U('Together/together');?>" target="link">获奖一览</a></li>
						
					</ul>
				</li>
			</ul>
		</div>
		<div id="right">
			<iframe name="link" width="100%" height="800px" frameborder="0" src="<?php echo U('Index/main');?>"></iframe>
		</div>
		<div id="footer">
			<span class="left">湖州师范学院</span>
			<span class="right" id="clock"></span>
		</div>
	</body>
	<script type="text/javascript">
		function Clock() {
			var date = new Date();
			this.year = date.getFullYear();
			this.month = date.getMonth() + 1;
			this.date = date.getDate();
			this.day = new Array("星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六")[date.getDay()];
			this.hour = date.getHours() < 10 ? "0" + date.getHours() : date.getHours();
			this.minute = date.getMinutes() < 10 ? "0" + date.getMinutes() : date.getMinutes();
			this.second = date.getSeconds() < 10 ? "0" + date.getSeconds() : date.getSeconds();
			this.toString = function() {
			return this.year + "年" + this.month + "月" + this.date + "日 " + this.hour + ":" + this.minute + ":" + this.second + " " + this.day;
			};
			this.toSimpleDate = function() {
			return this.year + "-" + this.month + "-" + this.date;
			};
			this.toDetailDate = function() {
			return this.year + "-" + this.month + "-" + this.date + " " + this.hour + ":" + this.minute + ":" + this.second;
			};
			this.display = function(ele) {
			var clock = new Clock();
			ele.innerHTML = clock.toString();
			window.setTimeout(function() {clock.display(ele);}, 1000);
};
}
		var clock = new Clock();
		clock.display(document.getElementById("clock"));
	</script>
</html>