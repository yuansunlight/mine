<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>

<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
		<title>teacher</title>
		<script type="text/javascript" src="/sss/Public/home/js/jquery-1.6.2.min.js"></script>
		<link href="/sss/Public/home/css/index.css" type="text/css" rel="stylesheet" />
		<style type="text/css">
		</style>
	</head>
	<body>
		<div id="top">
			<h2>湖州师范学院评奖评优系统</h2>
			<div class="t_right">
				<span>欢迎<?php echo ($_SESSION['login']['xy']); ?>学院负责人,<?php echo ($_SESSION['login']['cx']); ?></span>
				<span><a href="<?php echo U('Index/logout');?>" target="_parent">退出</a></span>
				
			</div>
		</div>
		<div id="left">
			<ul id="click">
				<li class="leftmenu"><a href="#">班主任信息管理</a>
					<ul>
						<li><a href="<?php echo U('User/banzhuren_list');?>" target="link">班主任信息</a></li>
						
						<li><a href="<?php echo U('User/add_banzhuren');?>" target="link">班主任添加</a></li>
					</ul>
				</li>
				<li class="leftmenu"><a href="#">学生信息管理</a>
					<ul>
						<li><a href="<?php echo U('User/manage');?>" target="link">学生管理</a></li>
						
						<li><a href="<?php echo U('User/add');?>" target="link">学生添加</a></li>
					</ul>
				</li>
				<li class="leftmenu"><a href="#">奖优通知管理</a>
					<ul>
						<li><a href="<?php echo U('Notice/edit_notice');?>" target="link">查看奖优通知</a></li>
						<li><a href="<?php echo U('Notice/add_notice');?>" target="link">发布奖优通知</a></li>
						
					</ul>
				</li>
				<li class="leftmenu"><a href="#">学生综合测评</a>
					<ul>
						<li><a href="<?php echo U('Ceping/add_ceping');?>" target="link">填写综合测评</a></li>
						<li><a href="<?php echo U('Ceping/list_ceping');?>" target="link">查看综合评测</a></li>
					</ul>
				</li>

				<li class="leftmenu"><a href="#">班级奖优管理</a>
					<ul> 
						<li><a href="<?php echo U('Jiangjin/teachersee');?>" target="link">班级奖学金</a></li>
						<li><a href="<?php echo U('Rongyu/teachersee');?>" target="link">班级个人荣誉</a></li>
					</ul>
				</li>

				<li class="leftmenu"><a href="#">学院奖学金管理</a>
					<ul> 
						<li><a href="<?php echo U('Jiangjin/jiang');?>" target="link">审核奖学金</a></li>
						<li><a href="<?php echo U('Jiangjin/jianged');?>" target="link">管理奖学金</a></li>
					</ul>
				</li>
				<!-- <li class="leftmenu"><a href="#">留言管理</a>
					<ul>
						<li><a href="<?php echo U('Message/message_check');?>" target="link">等待回复</a></li>
						<li><a href="<?php echo U('Message/message_checked');?>" target="link">已回复</a></li>
						
					</ul>
				</li> -->
				<li class="leftmenu"><a href="#">学院获奖汇总</a>
					<ul>
						<li><a href="<?php echo U('Together/together');?>" target="link">学院获奖一览</a></li>
						
					</ul>
				</li>
			</ul>
		</div>
		<div id="right">
			<iframe name="link" width="100%" height="90%" frameborder="0" src="main.html"></iframe>
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
		var click=document.getElementById('click');
		var li=click.children;
		// li.children.style.display='block';
			for(var i = 0;i < li.length;i++){
			li[i].onclick=function(){
				// alert(this);
				this.children[0].style.display="block";
			}
		}
	</script>
</html>