<?php if (!defined('THINK_PATH')) exit();?><html>
<head> 
<title></title><LINK href="/sss/Public/home/css/style.css" type=text/css rel=stylesheet>
<LINK href="/sss/Public/home/css/bootstrap.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
<!--
  td  
{  
    text-align:center;  
}
.STYLE2 {
	color: #FFFFFF;
	font-weight: bold;


}
.STYLE3 {color: #6D2E18; font-weight: bold; }
-->
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<table width="969" height="1043" border="0" align="center" cellpadding="0" cellspacing="0" id="__01">
	 
	<tr>
		<td><table id="__01" width="969" height="740" border="0" cellpadding="0" cellspacing="0">
          <tr>
          
            <td valign="top"><table id="__01" width="725" height="740" border="0" cellpadding="0" cellspacing="0">
              
              <tr>
                <td valign="top"><table id="__01" width="725" height="258" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="725" height="42" background="qtimages/1_02_02_01_01.gif"><table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="17%" align="center" class="title"><h3>回复留言</h3></td>
                          <td width="83%"><div align="right"></div></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table id="__01" width="725" height="208" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="10" background="qtimages/1_02_02_01_02_01.gif">&nbsp;</td>
                          <td width="703" height="208" valign="top">
                            <form name="form1" method="post" action="<?php echo U('reply1',array('id'=>$data['id']));?>">
                            <table width="96%" border="1" align="left" cellpadding="3" cellspacing="1" bordercolor="#B8D8E8" style="border-collapse:collapse">
                              <tr>
                                <td  style='height:30px'>账号：</td>
                                <td><input style='border:0px' name='zhanghao' type='text' id='zhanghao' value='<?php echo ($data["zhanghao"]); ?>' />
                                  &nbsp;</td>
                              </tr>
                           
                              <tr>
                                <td style='height:30px'>姓名：</td>
                                <td><input style='border:0px' name='xingming' type='text' id='xingming' value='<?php echo ($data["xingming"]); ?>' />
                                  &nbsp;</td>
                              </tr>
                               
                              <tr>
                                <td>留言问题：</td>
                                <td><textarea  style='border:0px' name='liuyan' cols='50' rows='8' bordercolor="#B8D8E8" id='liuyan'><?php echo ($data["liuyan"]); ?></textarea>
                                  &nbsp;</td>
                              </tr>
                              <tr>
                                <td>回复：</td>
                                <td>
                                  <textarea  style='border:0px' name='huifu' cols='50' rows='8' bordercolor="#B8D8E8" id='huifu'><?php echo ($data["huifu"]); ?></textarea>
                                  &nbsp;</td>
                              </tr>
                              <tr>
                                <td >&nbsp;</td>
                                   <td ><input type="hidden" name="addnew" value="1" />
                                    <input class="btn btn-info" type="submit" name="Submit" value="添加" onClick="return check();" />
                                    <input class="btn btn-info" type="reset" name="Submit2" value="重置" /></td>
  
                               
                              </tr>
                            </table>
                            </form>
                          <p align="center">&nbsp;</p>                            
                            </td>
                          <td width="12" background="qtimages/1_02_02_01_02_04.gif">&nbsp;</td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><img src="qtimages/1_02_02_01_03.gif" width="725" height="8" alt=""></td>
                  </tr>
                </table></td>
              </tr>
              
            </table></td>
          </tr>
        </table></td>
	</tr>
</table>
</body>
</html>