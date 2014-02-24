<?php 
if ( !isset($_GET['idx'] )) {
	echo "<script> self.close(); </script>";
}
include_once("./_common.php");
$nNow       = time();
$szSql      = " 
            SELECT * 
            FROM ZOTTA_POPUP 
            WHERE 1 and nIdx=".$_GET['idx']." and szView='Y' AND ($nNow BETWEEN nStartDate AND nEndDate) 
            ORDER BY nIdx DESC LIMIT 1
            ";
$arrPOP     = sql_fetch($szSql);

$szSubject  = stripslashes($arrPOP[szSubject]);
$szContent  = stripslashes($arrPOP[szMemo]);
?>

<html>
<head>
<title><?php echo $szSubject;?></title>
<meta http-equiv="Content-Type" content="text/html; charset=euc-kr">
<style type="text/css"> 
td { 
    font-family: "돋움"; 
    font-size: 12px; 
    line-height: 18px; 
    color: #666666; 
    text-decoration: none; 
}
.input_button
{
    font-family      : verdana, 돋움;
    font-size        : 9pt;
    height           : 19px;
    border           : 1 solid black;
    border-color     : #D0D0D0;
    background-color : #efefef;
}
.style1 {color: #FFFFFF}
</style>

<script language=JavaScript>
function setCookie( name, value, expiredays )
{
    var expire_date = new Date() ;  //오늘날짜를  대입값으로 설정한다.
    expire_date.setDate(expire_date.getDate() + expiredays) ;
    document.cookie = name + "=" + escape( value ) + "; path=/" + "; expires=" + expire_date.toGMTString();		
}
function check_close()
{
    if(document.popupform.szCheck.checked==true)
    {
        setCookie("zotta_popup_idx<?php echo $_GET['idx']?>", "done",1);
        self.close();
    }
    else {
        self.close();
    }
}
</script>
</head>

<body style="margin:0;">

<form name='popupform' style="margin:0;">

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td><?php echo $szContent;?></td>
</tr>

<tr height="27">
    <td align="right" bgcolor="#000000">

    <table border="0" cellpadding="2" cellspacing="0">
    <tr>
        <td><label for="close" style="cursor:hand"><input type="checkbox" name="szCheck" onClick="check_close();">
            <span class="style1">하루동안 이 창 열기 않기</span></label></td>
        <td><input type="button" value=" 닫 기 " class="input_button" onClick="self.close();"></td>
    </tr>
    </table>

    </td>
</tr>
</table>

</form>

</body>
</html>