<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
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
    <td bgcolor="#FFFFFF"><br /><b><?=$mb[mb_name]?></b>님의 회원가입을 진심으로 축하합니다.
    <p>회원님의 아이디는 <b><?=$mb[mb_id]?></b> 입니다.
	<p>회원님의 패스워드는 아무도 알 수 없는 암호화 코드로 저장되므로 안심하셔도 좋습니다.
    <p>아이디, 패스워드 분실시에는 회원가입시 입력하신 패스워드 분실시 질문, 답변을 이용하여 찾을 수 있습니다.
                        
    <? if ($config[cf_use_email_certify]) { ?>
    <p>E-mail(<?=$mb[mb_email]?>)로 발송된 내용을 확인한 후 인증하셔야 회원가입이 완료됩니다.
    <? } ?>

    <p>회원의 탈퇴는 언제든지 가능하며 탈퇴 후 일정기간이 지난 후, 회원님의 모든 소중한 정보는 삭제하고 있습니다.<p>감사합니다.</td>
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