<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head> 
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
    <title></title>
    <style type="text/css">
        h3{
          text-align: center;
        }
        div{
          margin:30px 50px;
        }
        td{  
        text-align:center;  
        }
        .main{
        margin-top: 100px;
        }
    </style>
    <link rel="stylesheet" href="/sss/Public/home/css/css.css" type="text/css">
    <link rel="stylesheet" href="/sss/Public/home/css/bootstrap.css" type="text/css">
  </head>
  <body>
    <div class="main">
      <h3>综合成绩</h3>
          <div>
            <form id="form1" name="form1" method="post" action="">
          </form>
          <table class="table table-bordered info" width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#6699CC" style="border-collapse:collapse">  
            <tr>
              <td width="45" bgcolor="#EBE2FE">序号</td>
              <td bgcolor='#EBE2FE'>学年</td>
              <td bgcolor='#EBE2FE'>班级</td>
              <td bgcolor='#EBE2FE'>姓名</td>
              <td bgcolor='#EBE2FE'>GPA</td>
              <td bgcolor='#EBE2FE'>体侧成绩</td>
              <td bgcolor='#EBE2FE'>公益时长</td>
              <td bgcolor='#EBE2FE'>竞赛获奖</td>
              <td bgcolor='#EBE2FE'>旷课</td>
              <td bgcolor='#EBE2FE'>挂科</td>
            </tr>
            <?php if(is_array($data)): foreach($data as $k=>$value): ?><tr class="text-c">
                    <td><?php echo ($k+1); ?></td>
                    <td><?php echo ($value["year"]); ?></td>
                    <td><?php echo ($value["classes"]); ?></td>
                    <td><?php echo ($value["name"]); ?></td>
                    <td><?php echo ($value["gpa"]); ?></td>
                    <td><?php echo ($value["sports"]); ?></td>
                    <td><?php echo ($value["practice"]); ?></td>
                    <td><?php echo ($value["honor"]); ?></td>
                    <td><?php echo ($value["outtime"]); ?></td>
                    <td><?php echo ($value["fail"]); ?></td>
              </tr><?php endforeach; endif; ?>
          </div>
    </div>
  </body>
</html>