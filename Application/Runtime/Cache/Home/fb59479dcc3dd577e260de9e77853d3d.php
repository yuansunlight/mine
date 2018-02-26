<?php if (!defined('THINK_PATH')) exit();?><html>
<head> 
<title></title>
<link href="/sss/Public/home/css/style.css" type=text/css rel=stylesheet>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
.STYLE2 {
	color: #FFFFFF;
	font-weight: bold;
}
.STYLE3 {color: #6D2E18; font-weight: bold; }
.btn{

    color:white;
    width: 60px;
    height: 30px;
    border-radius: 5px;
    background-color:#1F7FD2;
    border: 0;
    margin-left: 15px;

}
.aa{
  margin-left: 100px;
}
.main{
position:relative;
  margin-top: 70px;
}
td{height:45px;}
.tdd{height:90px;}
input{height:30px;}
select{height:30px;
line-height:30px;}
</style>
</head>
<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<div class="main">
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
                          <td width="17%" align="center" class="title" style="font-size:25px;text-align: center;font-family:'宋体';">在线申请</td>
                        </tr>

                      <tr><td><br><br></td></tr>
                        
                    </table></td>
                  </tr>
                  <tr>
                    <td><table id="__01" width="725" height="208" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                          <td width="10" background="qtimages/1_02_02_01_02_01.gif">&nbsp;</td>
                          <td width="703" height="208" valign="top">
                            <form name="form1" method="post" action="<?php echo U('apply');?>" id="form1" onsubmit="check()"; >
                            <table width="96%" border="1" align="left" cellpadding="3" cellspacing="1" bordercolor="#B8D8E8" style="border-collapse:collapse">
                              <tr>
                                <td height="40">账号：</td>
                                <td><input readonly="readonly"   name='username' type='text' id='username' value='<?php echo ($data["username"]); ?>' />
                                  &nbsp;*</td>
                              </tr>
                              <tr>
                                <td height="40">班级：</td>
                                <td><input readonly="readonly" name='classes' type='text' id='classes' value='<?php echo ($data["classes"]); ?>' >&nbsp;*</td>
                              </tr>
                              <tr>
                                <td height="40">姓名：</td>
                                <td><input readonly="readonly" name='name' type='text' id='name' value='<?php echo ($data["name"]); ?>'>
                                  &nbsp;*</td>
                              </tr>
                         <!--       <tr>
                                <td height="40">各项排名</td><td>专业排名：<input readonly="readonly" style="width:60px;" name='rank' type='text' id='together' value='<?php echo ($data["rank"]); ?>' >&nbsp;*公益排名：<input readonly="readonly" style="width:60px;" name='rank1' type='text' id='together' value='' >&nbsp;*竞赛排名：<input readonly="readonly" style="width:60px;" name='rank2' type='text' id='together' value='' >&nbsp;*</td>
                              </tr> -->
                              <tr><td height="40">各项数据：</td><td>GPA:<input readonly="readonly" type="text"  style="width:60px;" name="gpa" id="gpa" value="<?php echo ($data["gpa"]); ?>"> &nbsp;体侧:<input readonly="readonly"  type="text" name="sports" style="width:60px;" id="sports" value="<?php echo ($data["sports"]); ?>"> &nbsp;竞赛:<input readonly="readonly" type="text" id="honor" style="width:60px;" name="honor" value="<?php echo ($data["honor"]); ?>"> &nbsp;旷课:<input readonly="readonly" type="text" id="outtime" style="width:60px;" name="outtime" value="<?php echo ($data["outtime"]); ?>"> &nbsp;挂科:<input readonly="readonly" type="text"  style="width:60px;" id="fail" name="fail" value="<?php echo ($data["fail"]); ?>">&nbsp;公益:<input readonly="readonly" type="text" id="practice" style="width:60px;" name="practice" value="<?php echo ($data["practice"]); ?>"></td></tr>
                               
                              <tr>

                                <td class="tdd" >详情:</td>
                                <td style="height:60px;">
                                   
                                  <select name="year">
                                    <option>---请选择学年---</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                    <?php if($year == 2016): ?><option value="2016" selected>2016</option><?php endif; ?>
                                    <?php if($year == 2017): ?><option value="2017" selected>2017</option><?php endif; ?>
                                  </select>
                                  <select id="leibie" name='leibie' onChange="autoSubmit();"> 
                                      <option>---请选择申报类别---</option> 
                                       <option value="奖学金">奖学金</option> 
                                       <option value="个人荣誉">个人荣誉</option> 
                                    <?php if($leibie == 奖学金): ?><option value="奖学金" selected>奖学金</option><?php endif; ?>
                                    <?php if($leibie == 个人荣誉): ?><option value="个人荣誉" selected>个人荣誉</option><?php endif; ?>
                                   </select>

                                   <select class="mingcheng" name='mingcheng1' id="mingcheng" onChange="autoSubmit();"> 
                                    <option>---请选择申报名称---</option>
                                    <?php if(is_array($honor)): foreach($honor as $key=>$value): ?><option><?php echo ($value["mingcheng"]); ?></option><?php endforeach; endif; ?>
                                   </select> 
                                      <div style="position:absolute;">
                                        <input readonly="readonly" type="text" name="mingcheng" value="<?php echo ($mingcheng); ?>" style="width:122px;">
                                      </div>                                     
                                  &nbsp;
                                  &nbsp;</td>
                              </tr>
                              <tr><td height="40">申报条件：</td><td>GPA:<input readonly="readonly" type="text" id="gpa1" style="width:60px;" value="<?php echo ($tiaojian["gpa"]); ?>"> &nbsp;体侧:<input readonly="readonly" type="text" id="sports1" style="width:60px;"  value="<?php echo ($tiaojian["sports"]); ?>"> &nbsp;竞赛:<input readonly="readonly" type="text" id="honor1" style="width:60px;" value="<?php echo ($tiaojian["honor"]); ?>"> &nbsp;旷课:<input readonly="readonly" type="text" id="outtime1" style="width:60px;"  value="<?php echo ($tiaojian["outtime"]); ?>"> &nbsp;挂科:<input readonly="readonly" type="text" id="fail1" style="width:60px;"  value="<?php echo ($tiaojian["fail"]); ?>">&nbsp;公益:<input readonly="readonly" type="text" id="practice1" style="width:60px;" value="<?php echo ($tiaojian["practice"]); ?>"></td></tr>
                              <tr>
                                <td>申请理由：</td>
                                <td><textarea name='instruction' cols='50' rows='8' id='instruction'></textarea>
                                  &nbsp;</td>
                              </tr>
                              <tr>
                                <td>&nbsp;</td>
                                <td><input type="hidden" name="addnew" value="1" />
                                    <input class="aa btn" type="submit" name="Submit" value="添加" onClick="return check();" />
                                    <input class="btn" type="reset" name="Submit2" value="重置" /></td>
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
  <tr>
  </tr>
</table>
</div>

</body>

<script type="text/javascript">
 function autoSubmit(){
 var form1=document.getElementById("form1");
  form1.submit();
} 
</script>
<script language="javascript">
    function check()
  {
    if(document.form1.gpa.value<document.form1.gpa1.value)
      {alert("gpa未达到条件");return false;}
    if(document.form1.sports.value<document.form1.sports1.value)
       {alert("体侧成绩未达到条件");return false;}
    if(document.form1.practice.value<document.form1.practice1.value)
       {alert("公益时长未达到条件");return false;}
    if(document.form1.honor.value<document.form1.honor1.value)
      {alert("竞赛获奖未达到条件");return false;}
    if(document.form1.outtime.value>document.form1.outtime1.value)
      {alert("旷课情况未达到条件");return false;}
    if(document.form1.fail.value>document.form1.fail1.value)
      {alert("挂科情况未达到条件");return false;}
    if(document.form1.instruction.value=='')
      {alert("申请理由不能为空!");return false;}
  }
</script>
</html>