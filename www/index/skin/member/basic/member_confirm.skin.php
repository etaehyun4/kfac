<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 
?>

<br>
<br>
<table width="668" border="0" cellspacing="0" cellpadding="0">
<form name=fmemberconfirm method=post action="javascript:fmemberconfirm_submit(document.fmemberconfirm);">
<input type=hidden name=mb_id value='<?=$member[mb_id]?>'>
<input type=hidden name=w     value='u'>
<tr> 
    <td width="20" height="26"></td>
    <td width="628"></td>
    <td width="20"></td>
</tr>
<tr> 
    <td width="20" height="2"></td>
    <td width="628" bgcolor="#8F8F8F"></td>
    <td width="20"></td>
</tr>
<tr> 
    <td width="20" height="48"></td>
    <td width="628" align="right" background="<?=$member_skin_path?>/img/modify_table_bg_top.gif"><img src="<?=$member_skin_path?>/img/modify_img.gif" width="344" height="48"></td>
    <td width="20"></td>
</tr>
<tr> 
    <td width="20" height="223"></td>
    <td width="628" align="center" background="<?=$member_skin_path?>/img/modify_table_bg.gif">
        <table width="460" border="0" cellspacing="0" cellpadding="0">
        <tr> 
            <td width="460" height="223" align="center" bgcolor="#FFFFFF">
                <table width="350" border="0" cellpadding="0" cellspacing="0">
                <tr> 
                    <td width="250">
                        <table width="250" border="0" cellpadding="0" cellspacing="0">
                        <tr> 
                            <td width="10"><img src="<?=$member_skin_path?>/img/icon.gif" width="3" height="3"></td>
                            <td width="90" height="26"><b>ȸ�����̵�</b></td>
                            <td width="150"><b><?=$member[mb_id]?></b></td>
                        </tr>
                        <tr> 
                            <td><img src="<?=$member_skin_path?>/img/icon.gif" width="3" height="3"></td>
                            <td height="26"><b>�н�����</b></td>
                            <td><INPUT type=password maxLength=20 size=15 name=mb_password itemname="�н�����" required></td>
                        </tr>
                        </table>
                    </td>
                    <td width="100" valign="top"><INPUT name="image" type=image src="<?=$member_skin_path?>/img/ok_button.gif" width="65" height="52" border=0 id="btn_submit"></td>
                </tr>
                <tr> 
                    <td height="20" colspan="2"></td>
                </tr>
                <tr> 
                    <td height="1" background="<?=$member_skin_path?>/img/dot_line.gif" colspan="2"></td>
                </tr>
                </table>

                <table>
                <tr align="center"> 
                    <td height="80" colspan="2">�ܺηκ��� ȸ������ ������ �����ϰ� ��ȣ�ϱ� ����<br>�н����带 Ȯ���ϼž� �մϴ�.</td>
                </tr>
                </table></td>
        </tr>
        </table></td>
    <td width="20"></td>
</tr>
<tr> 
    <td width="20" height="1"></td>
    <td width="628" bgcolor="#F0F0F0"></td>
    <td width="20"></td>
</tr>
<tr> 
    <td height="20" colspan="3"></td>
</tr>
</form>
</table>

<script language='Javascript'>
document.onload = document.fmemberconfirm.mb_password.focus();

function fmemberconfirm_submit(f)
{
    document.getElementById("btn_submit").disabled = true;

    f.action = "<?=$url?>";
    f.submit();
}
</script>