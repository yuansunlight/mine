<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title>teacher</title>
		<script type="text/javascript" src="/sss/Public/home/js/jquery-1.6.2.min.js"></script>
		<link href="/sss/Public/home/css/index.css" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<div id="top">
			<h2>湖州师范学院评奖评优系统</h2>
			<div class="t_right">
				<a>欢迎<?php echo ($_SESSION['login']['classes']); ?>班主任，<?php echo ($_SESSION['login']['cx']); ?></a>
				<?php if($count > 0): ?><a href="<?php echo U('Index/news1');?>" target="link" style="color:red;"><img src="/sss/Public/home/img/a.png" style="width:30px;height:30px;margin-top: 10px;" alt=""><?php echo ($count); ?></a><?php endif; ?>
				<?php if($count == 0): ?><a href="<?php echo U('Index/news1');?>"  style="color:white;"><img src="/sss/Public/home/img/a.png" style="width:30px;height:30px;margin-top: 10px;" alt=""><?php echo ($count); ?></a><?php endif; ?>			
				<span><a href="<?php echo U('Index/logout');?>" target="_parent">退出</a></span>
			</div>
		</div>
		<div id="left">
			<ul id="click">
				<li class="leftmenu"><a href="#">学生信息管理</a>
					<ul>
						<li><a href="<?php echo U('User/manage1');?>" target="link">学生管理</a></li>
						<li><a href="<?php echo U('User/add');?>" target="link">学生添加</a></li>
					</ul>
				</li>
				<li class="leftmenu"><a href="#">奖优通知管理</a>
					<ul>
						<li><a href="<?php echo U('Notice/notice1');?>" target="link">查看奖优通知</a></li>
						
					</ul>
				</li>
				<li class="leftmenu"><a href="#">学生综合测评</a>
					<ul>
						<li><a href="<?php echo U('Ceping/list_ceping1');?>" target="link">查看综合测评</a></li>
					</ul>
				</li>
				<li class="leftmenu"><a href="#">奖学金审核</a>
					<ul> 
						<li><a href="<?php echo U('Jiangjin/check');?>" target="link">等待审核</a></li>
						<li><a href="<?php echo U('Jiangjin/checked');?>" target="link">已审核</a></li>
					</ul>
				</li>
				<li class="leftmenu"><a href="#">个人荣誉审核</a>
					<ul> 
						<li><a href="<?php echo U('Rongyu/check');?>" target="link">等待审核</a></li>
						<li><a href="<?php echo U('Rongyu/checked');?>" target="link">已审核</a></li>
					</ul>
				</li>
				<li class="leftmenu"><a href="#">留言管理</a>
					<ul>
						<li><a href="<?php echo U('Message/message_check1');?>" target="link">等待回复</a></li>
						<li><a href="<?php echo U('Message/message_checked1');?>" target="link">已回复</a></li>
						
					</ul>
				</li>
					<li class="leftmenu"><a href="#">班级获奖汇总</a>
					<ul>
						<li><a href="<?php echo U('Together/together1');?>" target="link">班级获奖一览</a></li>
						
					</ul>
				</li>
			</ul>
		</div>
		<div id="right">
			<iframe name="link" width="100%" height="800px" frameborder="0" src="main.html"></iframe>
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