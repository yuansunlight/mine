<?php if (!defined('THINK_PATH')) exit();?><html>
<head> 
<title></title><LINK href="/sss/Public/home/css/style.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
<!--
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
                          <td width="30%" align="center" class="title">我的留言</td>
                          <td width="70%"><div align="right"><a href="messages.php" class="title"></a></div></td>
                        </tr>
                    </table></td>
                  </tr>
                  <tr>
                    <td><table id="__01" width="725" height="208" border="0" cellpadding="0" cellspacing="0">
                      <?php if(is_array($data)): foreach($data as $key=>$value): ?><tr>
                          <td width="10" background="qtimages/1_02_02_01_02_01.gif">&nbsp;</td>
                          <td width="703" height="208" valign="top"><table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#B8D8E8" style="border-collapse:collapse">  
                   
                            <tr>
                              <td width="11" rowspan="3" valign="top"><!--DWLayoutEmptyCell-->&nbsp;</td>
                              <td width="85" rowspan="3" align="center" valign="middle"> 在线留言 </td>
                              <td height="20" colspan="2" align="left" valign="middle">&nbsp; &nbsp; 留言时间: <?php echo mysql_result($query,$i,"addtime");?> &nbsp;</td>
                              <td width="12" rowspan="3" valign="top" style="width: 10px"><!--DWLayoutEmptyCell-->&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="78" align="left" valign="top">&nbsp; <?php echo mysql_result($query,$i,"liuyan");?></td>
                              <td align="left" valign="top"><p>回复：</p>
                                  <p> <?php echo mysql_result($query,$i,"huifu");?></p></td>
                            </tr>
                            <tr>
                              <td colspan="2" align="left" valign="middle" style="height: 25px">&nbsp; &nbsp;账号： <?php echo mysql_result($query,$i,"zhanghao");?> &nbsp; &nbsp;姓名： <?php echo mysql_result($query,$i,"xingming");?>&nbsp;&nbsp;</td>
                            </tr><?php endforeach; endif; ?>
                          </table>
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
	<tr>

	</tr>
</table>
</body>
</html>