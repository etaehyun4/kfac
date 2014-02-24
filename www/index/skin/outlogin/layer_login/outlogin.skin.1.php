<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<? if(!$member[mb_id]){?>
<a href="javascript:view_cover('LayLoginForm','','');">로그인</a>
<?}?>

<?		
$url = '';
if ($g4['https_url']) {
    if (preg_match("/^\./", $urlencode))
        $url = $g4[url];
    else
        $url = $g4[url].$urlencode;
} else {
    $url = $urlencode;
}
?>
<script language=javascript src="<?=$g4[path]?>/js/init.js"></script>
<script type="text/javascript" src="<?=$g4[path]?>/js/capslock.js"></script>
<script type="text/javascript">
// 엠파스 로긴 참고
var bReset = true;
function chkReset(f) 
{
    if (bReset) { if ( f.mb_id.value == '아이디' ) f.mb_id.value = ''; bReset = false; }
    document.getElementById("pw1").style.display = "none";
    document.getElementById("pw2").style.display = "";
}
</script>


<!-- 로그인 전 외부로그인 시작 -->
<div id=LayLoginForm style="display: none; z-index: 2; left: 0px; width: 364px; position: absolute; top: 0px; height: 370px">

<table style="border-right: #e65101 1px solid; border-top: #e65101 1px solid; border-left: #e65101 1px solid; border-bottom: #e65101 1px solid" cellspacing=0 cellpadding=2 width=364 align=center border=0>
<form name=lay_login_form onsubmit="return logCheck1(this)" action="<?=$g4[bbs_path]?>/login_check.php" method=post>
<input type="hidden" name="url" value='<?=$url?>'>
	<tr>
	<td bgcolor=#eee1d7>
		<table cellspacing=0 cellpadding=0 width="100%" bgcolor=#ffffff border=0>
		<tr>
			<td align='left' style="padding:15px 5px 5px 25px;"> 2ustory.com 회원 로그인</td>
			<td align='right' style="padding:5px;" valign=top> <a onclick="cover_off('LayLoginForm')" href="javascript:;"><img src="<?=$outlogin_skin_path?>/img/close.gif" width="11" height="11"></a></td>
		</tr>
		<tr>
			<td colspan='2'>

        <table width="400" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="400" height="130" align="center" bgcolor="#FFFFFF">
                <table width="350" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="250">
                        <table width="250" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="10"><img src="<?=$outlogin_skin_path?>/img/icon.gif" width="3" height="3"></td>
                            <td width="90" height="26"><b>아이디</b></td>
                            <td width="150"><INPUT style='border:1px solid #cacaca;' maxLength=20 size=15 name=mb_id itemname="아이디" required minlength="2"></td>
                        </tr>
                        <tr>
                            <td><img src="<?=$outlogin_skin_path?>/img/icon.gif" width="3" height="3"></td>
                            <td height="26"><b>패스워드</b></td>
                            <td><INPUT type=password style='border:1px solid #cacaca;' maxLength=20 size=15 name=mb_password itemname="패스워드" required></td>
                        </tr>
                        </table>
                    </td>
                    <td width="100" valign="top"><INPUT type="submit" width="65" height="52" value="로그인" style="background-color:#efefef;width:65px;height:52px;border:1px solid #9A9A9A; border-right:1px solid #D8D8D8; border-bottom:1px solid #D8D8D8;"></td>
                </tr>
                <tr>
                    <td height="5" colspan="2"></td>
                </tr>
                <tr>
                    <td height="1" background="<?=$outlogin_skin_path?>/img/dot_line.gif" colspan="2"></td>
                </tr>
                <tr>
                    <td height="5" colspan="2"></td>
                </tr>
                <tr>
                    <td height="26" colspan="2"><img src="<?=$outlogin_skin_path?>/img/icon.gif" width="3" height="3"> 아직 회원이 아니십니까?&nbsp;&nbsp;&nbsp;&nbsp;<a href="<?=$g4[bbs_path]?>/register.php"><img width="72" height="20" src="<?=$outlogin_skin_path?>/img/btn_register.gif" border=0 align="absmiddle"></a></td>
                </tr>
                <tr>
                    <td height="26" colspan="2"><img src="<?=$outlogin_skin_path?>/img/icon.gif" width="3" height="3"> 아이디/패스워드를 잊으셨습니까?&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="win_password_forget('<?=$g4[bbs_path]?>/password_forget.php');"><img src="<?=$outlogin_skin_path?>/img/btn_password_forget.gif" width="108" height="20" border=0 align="absmiddle"></td>
                </tr>
                </table></td>
        </tr>
        </table>

			</td>
		</tr>
		</table>
	</td>
	</tr>
</form>
</table>
</div>
<!-- 로그인 전 외부로그인 끝 -->