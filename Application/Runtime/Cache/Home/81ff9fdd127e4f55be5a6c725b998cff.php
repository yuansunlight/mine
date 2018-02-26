<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title>student</title>
		<script type="text/javascript" src="/sss/Public/home/js/jquery-1.6.2.min.js"></script>
		<link href="/sss/Public/home/css/index.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="top">
			<h2>湖州师范学院评奖评优系统</h2>
			<div class="t_right">
				<a style="width:50px;">欢迎学生,<?php echo ($_SESSION['login']['username']); ?></a>
				<?php if($count > 0): ?><a href="<?php echo U('Index/news');?>" target="link" style="color:red;"><img src="/sss/Public/home/img/a.png" style="width:30px;height:30px;margin-top: 10px;" alt=""><?php echo ($count); ?></a><?php endif; ?>
				<?php if($count == 0): ?><a href="<?php echo U('Index/news');?>"   style="color:white;"><img src="/sss/Public/home/img/a.png" style="width:30px;height:30px;margin-top: 10px;" alt=""><?php echo ($count); ?></a><?php endif; ?>
				
				<span><a href="<?php echo U('Index/logout');?>" target="_parent">退出</a></span>
			</div>
			<h1><?php echo ($demo); ?></h1>
		</div>
		<div id="left">
			<ul id="click">
				<li class="leftmenu"><a href="#">个人信息管理</a>
					<ul id="ul">
						<li><a href="<?php echo U('User/message');?>" target="link">查看信息</a></li>
						<li><a href="<?php echo U('User/update');?>" target="link">修改信息</a></li>
					</ul>
				</li>
				<li class="leftmenu"><a href="#">重要奖优通知</a>
					<ul id="ul">
						<li><a href="<?php echo U('Notice/notice');?>" target="link">查看奖优通知</a></li>
					</ul>
				</li>
				<li class="leftmenu"><a href="#">学生综合测评</a>
					<ul id="ul">
						<li><a href="<?php echo U('Ceping/ceping');?>" target="link">查看综合测评</a></li>
					</ul>
				</li>
				<li class="leftmenu"><a href="#">学生奖优申请</a>
					<ul id="ul">
						<li><a href="<?php echo U('Apply/apply');?>" target="link">填写奖优申请</a></li>
					</ul>
					<ul id="ul">
						<li><a href="<?php echo U('Apply/applylist');?>" target="link">我的奖优申请</a></li>
					</ul>
				</li>
				<li class="leftmenu"><a href="#">查看评奖评优</a>
					<ul id="ul">
						<li><a href="<?php echo U('Jiangjin/see');?>" target="link">奖学金查询</a></li>
						<li><a href="<?php echo U('Rongyu/see');?>" target="link">个人荣誉查询</a></li>
					</ul>
				</li>
				<li class="leftmenu"><a href="#">在线留言</a>
					<ul id="ul">
						<li><a href="<?php echo U('Message/publish');?>" target="link">发布留言</a></li>
						<li><a href="<?php echo U('Message/messagelist');?>" target="link">我的留言</a></li>
					</ul>
				</li>
					<li class="leftmenu"><a href="#">班级获奖汇总</a>
					<ul>
						<li><a href="<?php echo U('Together/together2');?>" target="link">班级获奖一览</a></li>
						
					</ul>
				</li>
				
			</ul>
		</div>
		<div id="right">
			<iframe name="link" width="100%" height="800px" frameborder="0" src="<?php echo U('main');?>"></iframe>
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
	<script type="text/javascript" src="/sss/Public/home/js/index.js"></script>
</html>