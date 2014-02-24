<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

?>


<table width="" border="0" cellspacing="0" cellpadding="0">
<tr height="">
		<td style='padding:0 5 0 5' style='color:#a5a5a5;'><? if ($is_admin == "super" || $is_auth) { ?><a href="<?=$g4[admin_path]?>/"><?=$nick?></a>님<?} else { ?><span class='member'><strong><?=$nick?></strong></span>님<? } ?> 반갑습니다</td>
		<td style='padding:0 5 0 5' style='color:#a5a5a5;'>|</td>
		<td style='padding:0 5 0 5'><a href="<?=$g4[bbs_path]?>/logout.php" style='color:#a5a5a5;'>로그아웃</a></td>
		<td style='padding:0 5 0 5' style='color:#a5a5a5;'>|</td>
		<td style='padding:0 5 0 5' style='color:#a5a5a5;'><a href="<?=$g4[bbs_path]?>/member_confirm.php?url=register_form.php" style='color:#a5a5a5;'>정보수정</a></td>
</tr>
</table>

<script language="JavaScript">
// 탈퇴의 경우 아래 코드를 연동하시면 됩니다.
function member_leave() 
{
    if (confirm("정말 회원에서 탈퇴 하시겠습니까?")) 
            location.href = "<?=$g4[bbs_path]?>/member_confirm.php?url=member_leave.php";
}
</script>

