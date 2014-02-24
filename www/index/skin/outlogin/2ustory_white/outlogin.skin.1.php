<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

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

<script type="text/javascript" src="<?=$g4[path]?>/js/capslock.js"></script>
<script language=javascript src="<?=$outlogin_skin_path?>/init.js"></script>

<table width="" border="0" cellpadding="0" cellspacing="0">
	<tr height="">
		<td style='padding:0 5 0 5'><a href="javascript:view_cover('LayLoginForm','','');" style="font-family:돋움; font-size:11px;color:#afafaf;">로그인</a></td>
		<td style='padding:0 5 0 5' style='color:#a5a5a5;'>|</td>
		<td style='padding:0 5 0 5'><a href="<?=$g4[bbs_path]?>/register.php" style='color:#a5a5a5;'>회원가입</a></td>
		<td style='padding:0 5 0 5' style='color:#a5a5a5;'>|</td>
		<td style='padding:0 5 0 5'><a href="javascript:win_password_forget();" style='color:#a5a5a5;'>비번찾기</a></td>
</tr>
</table>



<div id=LayLoginForm style="display: none; z-index: 2; left: 0px; width: 364px; position: absolute; top: 0px; height: 370px">

<table style="border: #e65101 3px solid;" cellspacing=0 cellpadding=2 width=364 align=center border=0>
<form method=post name=lay_login_form onsubmit="return flogin_submit(this);" autocomplete="off">
<input type="hidden" name="url" value='<?=$url?>'>
	<tr>
	<td bgcolor="#ededed">
		<table cellspacing=0 cellpadding=0 width="100%" bgcolor=#ffffff border=0>
		<tr>
			<td align='left' style="padding:15px 5px 5px 25px;"> <?=$config['cf_title']?> 회원 로그인</td>
			<td align='right' style="padding:5px;" valign=top> <a onclick="cover_off('LayLoginForm')" href="javascript:;"><img src="<?=$outlogin_skin_path?>/img/close.gif" width="11" height="11" border=0 align="absmiddle"></a></td>
		</tr>
		<tr>
			<td colspan='2'>

        <table width="400" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td width="400" height="130" align="center" bgcolor="#ffffff"><iframe src="about:blank" mce_src="about:blank" scrolling="no" frameborder="0" style="position:absolute;width:364px;height:130px;top:3px;left:3px;z-index:-1;border:none;display:block"></iframe>
                <table width="350" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="250">
                        <table width="250" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="10"><img src="<?=$outlogin_skin_path?>/img/icon.gif" width="3" height="3"></td>
                            <td width="90" height="26"><b>아이디</b></td>
                            <td width="150"><INPUT class="ed" maxLength=20 size=15 name=mb_id itemname="아이디" required minlength="2"></td>
                        </tr>
                        <tr>
                            <td><img src="<?=$outlogin_skin_path?>/img/icon.gif" width="3" height="3"></td>
                            <td height="26"><b>패스워드</b></td>
                            <td><INPUT type=password class="ed" maxLength=20 size=15 name=mb_password itemname="패스워드" required></td>
                        </tr>
                        </table>
                    </td>
                    <td width="100" valign="top"><INPUT type="submit" width="65" height="52" value="로그인" style="background-color:#efefef;width:65px;height:52px;border:1px solid #9A9A9A; border-right:1px solid #D8D8D8; border-bottom:1px solid #D8D8D8;"></td>
                </tr>
                <tr>
                    <td height="5" colspan="2"></td>
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


<script language='Javascript'>
function flogin_submit(f)
{
    <?
    if ($g4[https_url])
        echo "f.action = '$g4[https_url]/$g4[bbs]/login_check.php';";
    else
        echo "f.action = '$g4[bbs_path]/login_check.php';";
    ?>

    return true;
}
</script>


</div>
