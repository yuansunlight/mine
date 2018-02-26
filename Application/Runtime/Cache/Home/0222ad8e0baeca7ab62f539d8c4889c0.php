<?php if (!defined('THINK_PATH')) exit();?><html>
<head> 
<title></title>
<LINK href="/sss/Public/home/css/bootstrap.css" type=text/css rel=stylesheet>
<LINK href="/sss/Public/home/css/style.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
<!--
.STYLE2 {
	color: #FFFFFF;
	font-weight: bold;
}
.STYLE3 {color: #6D2E18; font-weight: bold; }
-->
.ull ul{
    margin:0 auto;

  }
  .ull ul li{
    float:left;
    margin-right:20px; 

  }
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<?php if(is_array($data)): foreach($data as $key=>$value): ?><div class="main">
  <table width="969" height="" border="0" align="center" cellpadding="0" cellspacing="0" id="__01">
   
  <tr>
    <td><table id="__01" width="969" height="740" border="0" cellpadding="0" cellspacing="0">
          <tr>
          
            <td valign="top"><table id="__01" width="725" height="740" border="0" cellpadding="0" cellspacing="0">
              
              <tr>
                <td valign="top"><table id="__01" width="725" height="258" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="725" height="42" background="qtimages/1_02_02_01_01.gif"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <br><br><br>
                          <td width="83%"><div align="center" class="title" style="font-size: 25px;font-family:'宋体'; ">我的申请</div></td><br>
                        </tr>
                  <tr><td><br><br></td></tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table id="__01" width="725" height="508" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="10" background="qtimages/1_02_02_01_02_01.gif">&nbsp;</td>
                          <td width="703" height="508" valign="top"><table width="90%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#B8D8E8" style="border-collapse:collapse">  
                            <tr >
                              <!-- <td class="cc" width="11" rowspan="4" valign="top">&nbsp;</td> -->
                              <td class="cc" width="85" rowspan="4" align="center" valign="middle"> 申请审核 </td>
                              <td class="cc" align="center" valign="middle" style="height: 100px">姓名： <?php echo ($value["name"]); ?>&nbsp;&nbsp;</td> 
                           
                           <td class="cc" align="center" valign="middle" style="height: 100px">学号：  <?php echo ($value["username"]); ?>&nbsp; &nbsp;</td>
                           
                           <td class="cc" align="center" valign="middle" style="height: 100px">&nbsp; &nbsp;班级： <?php echo ($value["classes"]); ?>&nbsp;&nbsp;</td>
                              <!-- <td class="cc" width="12" rowspan="4" valign="top" style="width: 10px">&nbsp;</td> -->
                            </tr>
                            <tr>  <td class="cc" align="center" valign="middle" style="height: 100px">&nbsp; &nbsp;学年： <?php echo ($value["year"]); ?></td>
                              <td class="cc" height="50" colspan="2" align="center" valign="middle">&nbsp; &nbsp; 申请时间: <?php echo ($value["addtime"]); ?></td>
                            </tr>
                            <tr>
                              <td class="cc"  align="left" valign="middle" style="height: 100px">&nbsp; &nbsp;排名：  <?php echo ($value["rank"]); ?></td>
                              <td class="cc"  align="left" valign="middle" style="height: 100px">&nbsp; &nbsp;&nbsp;申报类别： <?php echo ($value["leibie"]); ?></td>
                              <td class="cc"  align="left" valign="middle" style="height: 100px">&nbsp; &nbsp;申报名称： <?php echo ($value["mingcheng"]); ?></td>
                            </tr>
                            <tr>
                              <td  height="238" align="center" colspan="2" valign="middle"><p>申请理由：<?php echo ($value["instruction"]); ?></p> <p class="cc"></p></td>
                              <td  height="238" align="center" valign="middle"><p>审核结果：
                                <?php if($value["result"] == -1 ): ?>等待审核<?php endif; ?>
                                <?php if($value["result"] == 1 ): ?>审核通过<?php endif; ?>
                                <?php if($value["result"] == 0 ): ?>审核失败<?php endif; ?></p>
                                <p id="red" class="cc"> </p></td>
                            </tr>
                    </table>
  </tr>
  <tr>
  </tr>
</table><?php endforeach; endif; ?>
<br>
<div class="ull">
    <ul id="ul" style="list-style: none;font-size:23px;color:white;">
    <?php if($page > 1): ?><li><a class="btn btn-primary glyphicon glyphicon-chevron-left" href="<?php echo U('applylist', array('page'=>$pre));?>"></a></li><?php endif; ?>
    
    <?php $__FOR_START_19834__=1;$__FOR_END_19834__=$pages+1;for($i=$__FOR_START_19834__;$i < $__FOR_END_19834__;$i+=1){ ?><li><a class="btn btn-primary" style="font-size:16px;" href="<?php echo U('applylist', array('page'=>$i));?>"><?php echo ($i); ?></a></li><?php } ?>

    <?php if($page < $pages): ?><li><a  class="btn btn-primary glyphicon glyphicon-chevron-right" href="<?php echo U('applylist', array('page'=>$next));?>"></a></li><?php endif; ?>
    </ul>
  </div>
</div>
</body>
</html>