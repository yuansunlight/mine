<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="/sss/Public/admin/css/bootstrap.css">
	<script type="text/javascript" src="/sss/Public/admin/js/bootstrap.js"></script>
	<style type="text/css">
		#div1{
        width: 70px;
        height: 35px;
        border-radius: 30px;
        position: relative;
    }
    #div2{
        width: 30px;
        height: 30px;
        border-radius: 30px;
        position: absolute;
        background: white;
        box-shadow: 0px 2px 4px rgba(0,0,0,0.4);
    }
    .open1{
        background: rgba(0,184,0,0.8);
    }
    .open2{
        top: 2px;
        right: 1px;
    }
    .close1{
        background: rgba(255,255,255,0.4);
        border:3px solid rgba(0,0,0,0.15);
        border-left: transparent;
    }
    .close2{
        left: 0px;
        top: 0px;
        border:2px solid rgba(0,0,0,0.1);
    }
    .button{
       background-color:#6699CC;
       color: white;
       border-radius: 5px;
       border:0;
    }
	</style>
</head>
<body>
    <div style="margin:100px">
       <form action="<?php echo U('Rukou/rukou');?>" method="post" id="form1">
        <h3>学生在线申报入口:</h3>
        <select name="select">
            <option value="1">开</option>
            <option value="0">关</option>
        </select>
        <input type="submit" name="submit" class="button">
    </form>
 
    </div>
	
</body>

</html>