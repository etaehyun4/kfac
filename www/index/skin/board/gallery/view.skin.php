<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

if ($write[wr_id]) { 
              $mb = get_member($write[mb_id]); 
}
$level = get_member_level($mb['mb_id'],$mb['mb_point']);
?>

<!-- �Խñ� ���� ���� -->
<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0"><tr><td>

<!-- ��ũ ��ư -->
<? 
ob_start(); 
?>
<table width="100%" cellpadding=0 cellspacing="0" border="0">
<tr height="35">
    <td width="75%">
        <? if ($search_href) { echo "<a href=\"$search_href\"><img src='$board_skin_path/img/btn_search_list.gif' border='0' align='absmiddle'></a> "; } ?>
        <? echo "<a href=\"$list_href\"><img src='$board_skin_path/img/btn_list.gif' border='0' align='absmiddle'></a> "; ?>

        <? if ($write_href) { echo "<a href=\"$write_href\"><img src='$board_skin_path/img/btn_write.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($reply_href) { echo "<a href=\"$reply_href\"><img src='$board_skin_path/img/btn_reply.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_path/img/btn_update.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_path/img/btn_delete.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($good_href) { echo "<a href=\"$good_href\" target='hiddenframe'><img src='$board_skin_path/img/btn_good.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($nogood_href) { echo "<a href=\"$nogood_href\" target='hiddenframe'><img src='$board_skin_path/img/btn_nogood.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($scrap_href) { echo "<a href=\"javascript:;\" onclick=\"win_scrap('./scrap_popin.php?bo_table=$bo_table&wr_id=$wr_id');\"><img src='$board_skin_path/img/btn_scrap.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($copy_href) { echo "<a href=\"$copy_href\"><img src='$board_skin_path/img/btn_copy.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($move_href) { echo "<a href=\"$move_href\"><img src='$board_skin_path/img/btn_move.gif' border='0' align='absmiddle'></a> "; } ?>
    </td>
    <td width=25% align=right>
        <? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/btn_prev.gif' border='0' align='absmiddle'></a>"; } ?>
        <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/btn_next.gif' border='0' align='absmiddle'></a>"; } ?>
    </td>
</tr>
</table>
<?
$link_buttons = ob_get_contents();
ob_end_flush();
?>

<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tr><td height="2" bgcolor="#0A7299"></td></tr>
<tr><td height="35">

	<table width="100%" cellpadding="0" cellspacing="0">
		<tr>
			<td style='word-break:break-all; height:30px;'>&nbsp;&nbsp;<strong><span style="font-size:15px;"><? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?><?=cut_hangul_last(get_text($view[wr_subject]))?></span></strong></td>
			<td width=70><a href="javascript:scaleFont(+1);"><img src='<?=$board_skin_path?>/img/icon_zoomin.gif' border=0 title='���� Ȯ��'></a>&nbsp;<a href="javascript:scaleFont(-1);"><img src='<?=$board_skin_path?>/img/icon_zoomout.gif' border=0 title='���� ���'></a></td>
		</tr>
		</table>
	
	</td></tr>
<tr><td height="1" bgcolor="#DDDDDD"></td></tr>
<tr><td height="3" bgcolor="#F6F6F6"></td></tr>
<tr><td height=30>&nbsp;&nbsp;<?=$level?>&nbsp;&nbsp;<font color=#7A8FDB>�۾���</font> : <?=$view[name]?><? if ($is_admin == "super" || $is_auth) {  if ($is_ip_view) {  echo "&nbsp;(<font style='font-size:8pt;'>$ip</font>)"; }} ?>&nbsp;&nbsp;
       <font color=#7A8FDB>��¥</font> : <span style='font:normal 11px tahoma; color:#BABABA;'><?=substr($view[wr_datetime],2,14)?></font>&nbsp;&nbsp;
       <font color=#7A8FDB>��ȸ</font> : <span style='font:normal 11px tahoma; color:#BABABA;'><?=$view[wr_hit]?></font>&nbsp;&nbsp;&nbsp;&nbsp;<? if ($trackback_url) { ?><a href="javascript:trackback_send_server('<?=$trackback_url?>');" style="letter-spacing:0;" title='�ּ� ����'><img src="<?=$board_skin_path?>/img/icon_trackback.gif" alt="" align="absmiddle" border="0"></a>&nbsp;&nbsp;&nbsp;&nbsp;<?}?>
       <? if ($is_good) { ?><font color=#7A8FDB>��õ</font> : <?=$view[wr_good]?>&nbsp;&nbsp;<?}?>
       <? if ($is_nogood) { ?><font color=#7A8FDB>����õ</font> : <?=$view[wr_nogood]?>&nbsp;&nbsp;<?}?></td></tr>
	   <tr><td height='1' bgcolor='#e7e7e7'></td></tr>

<?if ($view[wr_email]) { ?>
<!-- <tr><td height=25>&nbsp;&nbsp;<font color=#7A8FDB>�̸���</font> : <?=$view[wr_email]?></td></tr>
<tr><td height=1 bgcolor=#E7E7E7></td></tr> -->
<?}?>

<?
// ���� ����

$cnt = 0;
$table_line = 0;
for ($i=0; $i<count($view[file]); $i++) 
{
    if ($view[file][$i][source] && !$view[file][$i][view]) 
    {
		
        $cnt++;
		$table_line = 1;
        echo "<tr><td height=25>&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_file.gif' align=absmiddle> <a href=\"javascript:file_download('{$view[file][$i][href]}', '{$view[file][$i][source]}');\" title='{$view[file][$i][content]}'><strong>{$view[file][$i][source]}</strong></a> (<font style='font-size:8pt;'>{$view[file][$i][size]}</font>),&nbsp;&nbsp;&nbsp;�ٿ�ε� : (<font style='font-size:8pt;'>{$view[file][$i][download]}</font>)<!--,  {$view[file][$i][datetime]} --></td></tr>";
    }
}

// ��ũ
$cnt = 0;
for ($i=1; $i<=$g4[link_count]; $i++) 
{
   if ($view[link][$i]) 
    {
        $cnt++;
		$table_line = 1;
        $link = cut_str($view[link][$i], 70);
        echo "<tr><td height=25>&nbsp;&nbsp;<img src='{$board_skin_path}/img/icon_link.gif' align=absmiddle> <a href='{$view[link_href][$i]}' target=_blank>{$link}</a>&nbsp;(<font style='font-size:8pt;'>{$view[link_hit][$i]}</font>)</td></tr>";
    }

}
if($table_line == 1)echo "<tr><td height='1' bgcolor='#e7e7e7'></td></tr>";
?>

<tr> 
    <td>
	<table border="0" width="100%" cellpadding="0" cellspacing="0" style="table-layout:fixed;">
	 
		<tr>
			<td style='word-break:break-all; padding:10px;'>	
			<? 
			// ���� ���
			/*for ($i=0; $i<=count($view[file]); $i++) {
				if ($view[file][$i][view]) 
					echo $view[file][$i][view]."<br><br>";
			}*/
			?>
			<? 
			// ���� ��� 
			for ($i=0; $i<=count($view[file]); $i++) { 
				if ($view[file][$i][view]) 
					echo $view[file][$i][view] . "<br><br>" . $view[file][$i][content] . "<p>"; 
			} 
			?> 
			<font style="line-height:120%;">
			<span id="writeContents"><?=$view[content];?></span>
			</font>
			<?//echo $view[rich_content]; // {�̹���:0} �� ���� �ڵ带 ����� ���?>
			<!-- �׷� �±� ������ --></xml></xmp><a href=""></a><a href=''></a></td>
		</tr>
	</table>
</td></tr>
<tr><td>
	<!--
	</td></tr>
		<tr><td align="right"><?=exp_bar($mb[mb_id],$mb[mb_point],0);?></td></tr>
		<tr height="5">	<td></td></tr>
		<tr><td height="1" bgcolor="#DDDDDD"></td></tr>
		<tr height="5">	<td></td></tr>
		<tr height="25"><td align="center"> <? if ($is_signature) {?><? echo "$signature"; ?><?} // ���� ��� ?></td></tr>
		<tr height="5">	<td></td></tr>
		<tr><td height="1" bgcolor="#DDDDDD"></td></tr>
		<tr><td height="3" bgcolor="#F6F6F6"></td></tr>
	</table>
	-->
</td>
</tr>
</table>

<?
include_once("./view_comment.php");
?>

<?=$link_buttons?>

</td></tr></table>

<script language="JavaScript">
function file_download(link, file) {
    <? if ($board[bo_download_point] < 0) { ?>if (confirm("'"+file+"' ������ �ٿ�ε� �Ͻø� ����Ʈ�� ����(<?=number_format($board[bo_download_point])?>��)�˴ϴ�.\n\n����Ʈ�� �Խù��� �ѹ��� �����Ǹ� ������ �ٽ� �ٿ�ε� �ϼŵ� �ߺ��Ͽ� �������� �ʽ��ϴ�.\n\n�׷��� �ٿ�ε� �Ͻðڽ��ϱ�?"))<?}?>
    document.location.href=link;
}
</script>

<script language="JavaScript" src="<?="$g4[path]/js/board.js"?>"></script>
<script language="JavaScript">
window.onload=function() {
    resizeBoardImage(<?=(int)$board[bo_image_width]?>);
    drawFont();
}
</script>

<!-- �Խñ� ���� �� -->
