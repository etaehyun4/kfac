<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

?>


<table width="" border="0" cellspacing="0" cellpadding="0">
<tr height="">
		<td style='padding:0 5 0 5' style='color:#a5a5a5;'><? if ($is_admin == "super" || $is_auth) { ?><a href="<?=$g4[admin_path]?>/"><?=$nick?></a>��<?} else { ?><span class='member'><strong><?=$nick?></strong></span>��<? } ?> �ݰ����ϴ�</td>
		<td style='padding:0 5 0 5' style='color:#a5a5a5;'>|</td>
		<td style='padding:0 5 0 5'><a href="<?=$g4[bbs_path]?>/logout.php" style='color:#a5a5a5;'>�α׾ƿ�</a></td>
		<td style='padding:0 5 0 5' style='color:#a5a5a5;'>|</td>
		<td style='padding:0 5 0 5' style='color:#a5a5a5;'><a href="<?=$g4[bbs_path]?>/member_confirm.php?url=register_form.php" style='color:#a5a5a5;'>��������</a></td>
</tr>
</table>

<script language="JavaScript">
// Ż���� ��� �Ʒ� �ڵ带 �����Ͻø� �˴ϴ�.
function member_leave() 
{
    if (confirm("���� ȸ������ Ż�� �Ͻðڽ��ϱ�?")) 
            location.href = "<?=$g4[bbs_path]?>/member_confirm.php?url=member_leave.php";
}
</script>

