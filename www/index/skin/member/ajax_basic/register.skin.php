<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td align=center>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td>
<form name="fregister" method="POST" onsubmit="return fregister_submit(this);" autocomplete="off">

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<colgroup><col width="15px" /><col width="140px" /><col width="140px" /><col width="150px" /><col /><col width="20px" /></colgroup>
<tr>
    <td align="left" colspan="6"><img src="<?=$member_skin_path?>/img/text_signup.gif" width="155" height="44"></td>
</tr>
<tr>
	<td></td>
    <td><img src="<?=$member_skin_path?>/img/text_signup1_on.gif" width="140" height="20"></td>
    <td><img src="<?=$member_skin_path?>/img/text_signup2_off.gif" width="140" height="20"></td>
    <td><img src="<?=$member_skin_path?>/img/text_signup3_off.gif" width="150" height="20"></td>
    <td background="<?=$member_skin_path?>/img/text_signup_bg.gif">&nbsp;</td>
    <td><img src="<?=$member_skin_path?>/img/text_signup_arrow.gif" width="20" height="20"></td>
</tr>
</table>
<div style="height:15px;"></div>
    <? if ($config[cf_use_jumin]) { // �ֹε�Ϲ�ȣ�� ����Ѵٸ� ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td height=25></td>
        </tr>
        <tr>
            <td bgcolor="#cccccc">
                <table cellspacing=1 cellpadding=0 width=100% border=0>
                <tr bgcolor="#ffffff"> 
                    <td width="140" height=30>&nbsp;&nbsp;&nbsp;<b>�̸�</b></td>
                    <td width="">&nbsp;&nbsp;&nbsp;<input name=mb_name itemname="�̸�" required minlength="2" nospace hangul class=ed></td>
                </tr>
                <tr bgcolor="#ffffff"> 
                    <td height=30>&nbsp;&nbsp;&nbsp;<b>�ֹε�Ϲ�ȣ</b></td>
                    <td>&nbsp;&nbsp;&nbsp;<input name=mb_jumin itemname="�ֹε�Ϲ�ȣ" required jumin minlength="13" maxlength=13 class=ed><font style="font-family:����; font-size:9pt; color:#66a2c8">&nbsp;&nbsp;�� ���� 13�ڸ� �߰��� - ���� �Է��ϼ���.</font></td>
                </tr>
                </table>
			</td>
        </tr>
    </table>
    <? } ?>

<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
<colgroup><col width="20px" /><col /><col width="20px" /></colgroup>
<tr>
	<td><img src="<?=$member_skin_path?>/img/join_box_ltop.gif" width="20" height="30"></td>
    <td background="<?=$member_skin_path?>/img/join_box_topbg.gif"><img src="<?=$member_skin_path?>/img/join_box_title01.gif" width="188" height="30"></td>
	<td><img src="<?=$member_skin_path?>/img/join_box_rtop.gif" width="20" height="30"></td>
</tr>
<tr>
    <td background="<?=$member_skin_path?>/img/join_box_lbg.gif"></td>
    <td bgcolor="#FFFFFF"><textarea style="width: 100%" rows=7 readonly class=ed><?=get_text($config[cf_stipulation])?></textarea></td>
    <td background="<?=$member_skin_path?>/img/join_box_rbg.gif"></td>
</tr>
<tr>
	<td><img src="<?=$member_skin_path?>/img/join_box_lbtm.gif" width="20" height="58"></td>
    <td valign="top" style="padding-top:5px;" background="<?=$member_skin_path?>/img/join_box_btmbg.gif"><input type=checkbox value=1 name=agree id=agree>&nbsp;<label for=agree>ȸ�����Ծ���� �о����� ���뿡 �����մϴ�.</label></td>
	<td><img src="<?=$member_skin_path?>/img/join_box_rbtm.gif" width="20" height="58"></td>
</tr>
</table>

<div style="height:20px;"></div>

<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
<colgroup><col width="20px" /><col /><col width="20px" /></colgroup>
<tr>
	<td><img src="<?=$member_skin_path?>/img/join_box_ltop.gif" width="20" height="30"></td>
    <td background="<?=$member_skin_path?>/img/join_box_topbg.gif"><img src="<?=$member_skin_path?>/img/join_box_title02.gif" width="188" height="30"></td>
	<td><img src="<?=$member_skin_path?>/img/join_box_rtop.gif" width="20" height="30"></td>
</tr>
<tr>
    <td background="<?=$member_skin_path?>/img/join_box_lbg.gif"></td>
    <td bgcolor="#FFFFFF"><textarea style="width: 100%" rows=7 readonly class=ed><?=get_text($config[cf_privacy])?></textarea></td>
    <td background="<?=$member_skin_path?>/img/join_box_rbg.gif"></td>
</tr>
<tr>
	<td><img src="<?=$member_skin_path?>/img/join_box_lbtm.gif" width="20" height="58"></td>
    <td valign="top" style="padding-top:5px;" background="<?=$member_skin_path?>/img/join_box_btmbg.gif"><input type=checkbox value=1 name=agree2 id=agree2>&nbsp;<label for=agree2>����������޹�ħ�� �о����� ���뿡 �����մϴ�.</label></td>
	<td><img src="<?=$member_skin_path?>/img/join_box_rbtm.gif" width="20" height="58"></td>
</tr>
</table>

<br />
<div align=center>
<input type=image width="110" height="27" src="<?=$member_skin_path?>/img/btn_reg_ok.gif" border=0>
</div>

</form>

</td></tr>
</table>

</td></tr>
</table>

<script language="javascript">
function fregister_submit(f) {
    if (!f.agree.checked) {
        alert("ȸ�����Ծ���� ���뿡 �����ؾ� ȸ������ �Ͻ� �� �ֽ��ϴ�.");
        f.agree.focus();
        return false;
    }

    if (!f.agree2.checked) {
        alert("����������޹�ħ�� ���뿡 �����ؾ� ȸ������ �Ͻ� �� �ֽ��ϴ�.");
        f.agree2.focus();
        return false;
    }

    f.action = "./register_form.php";
    return true;
}

if (typeof(document.fregister.mb_name) != "undefined")
    document.fregister.mb_name.focus();
</script>
