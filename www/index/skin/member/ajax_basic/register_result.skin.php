<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td align=center>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr><td>

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<colgroup><col width="15px" /><col width="140px" /><col width="140px" /><col width="150px" /><col /><col width="20px" /></colgroup>
<tr>
    <td align="left" colspan="6"><img src="<?=$member_skin_path?>/img/text_signup.gif" width="155" height="44"></td>
</tr>
<tr>
	<td></td>
    <td><img src="<?=$member_skin_path?>/img/text_signup1_off.gif" width="140" height="20"></td>
    <td><img src="<?=$member_skin_path?>/img/text_signup2_off.gif" width="140" height="20"></td>
    <td><img src="<?=$member_skin_path?>/img/text_signup3_on.gif" width="150" height="20"></td>
    <td background="<?=$member_skin_path?>/img/text_signup_bg.gif">&nbsp;</td>
    <td><img src="<?=$member_skin_path?>/img/text_signup_arrow.gif" width="20" height="20"></td>
</tr>
</table>
<div style="height:15px;"></div>

<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
<colgroup><col width="20px" /><col /><col width="20px" /></colgroup>
<tr>
	<td><img src="<?=$member_skin_path?>/img/join_box_ltop.gif" width="20" height="30"></td>
    <td background="<?=$member_skin_path?>/img/join_box_topbg.gif"><img src="<?=$member_skin_path?>/img/join_box_title04.gif" width="188" height="30"></td>
	<td><img src="<?=$member_skin_path?>/img/join_box_rtop.gif" width="20" height="30"></td>
</tr>
<tr>
    <td background="<?=$member_skin_path?>/img/join_box_lbg.gif"></td>
    <td bgcolor="#FFFFFF"><br /><b><?=$mb[mb_name]?></b>���� ȸ�������� �������� �����մϴ�.
    <p>ȸ������ ���̵�� <b><?=$mb[mb_id]?></b> �Դϴ�.
	<p>ȸ������ �н������ �ƹ��� �� �� ���� ��ȣȭ �ڵ�� ����ǹǷ� �Ƚ��ϼŵ� �����ϴ�.
    <p>���̵�, �н����� �нǽÿ��� ȸ�����Խ� �Է��Ͻ� �н����� �нǽ� ����, �亯�� �̿��Ͽ� ã�� �� �ֽ��ϴ�.
                        
    <? if ($config[cf_use_email_certify]) { ?>
    <p>E-mail(<?=$mb[mb_email]?>)�� �߼۵� ������ Ȯ���� �� �����ϼž� ȸ�������� �Ϸ�˴ϴ�.
    <? } ?>

    <p>ȸ���� Ż��� �������� �����ϸ� Ż�� �� �����Ⱓ�� ���� ��, ȸ������ ��� ������ ������ �����ϰ� �ֽ��ϴ�.<p>�����մϴ�.</td>
    <td background="<?=$member_skin_path?>/img/join_box_rbg.gif"></td>
</tr>
<tr>
	<td><img src="<?=$member_skin_path?>/img/join_box_lbtm.gif" width="20" height="58"></td>
    <td background="<?=$member_skin_path?>/img/join_box_btmbg.gif">&nbsp;</td>
	<td><img src="<?=$member_skin_path?>/img/join_box_rbtm.gif" width="20" height="58"></td>
</tr>
</table>

<br />
<div align=center>
<a href="#" onclick="window.close();"><img src="/index/kfac_main/images/btn_link_home.gif" width="110" height="27" border=0></a>
</div>

</td></tr>
</table>

</td></tr>
</table>