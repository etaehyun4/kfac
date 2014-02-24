<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<style>
#mainboard td { font-size:8pt; color:#333333;}
#mainboard a { font-size:8pt; color:#333333; text-decoration:none;}
#mainboard a:hover { font-size:8pt; color:#333333; text-decoration:underline;}
.mboard_topbg { border-top:1px solid #DDDDDD; border-bottom:1px solid #DDDDDD; height:28px; background:url('<?=$latest_skin_path?>/img/board_topbg.gif') repeat-x;}
</style>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <? for ($i=0; $i<count($list); $i++) {
    if($list[$i]['ca_name']) $list[$i]['href'].= "&sca=".$list[$i][ca_name]; ?>
  <tr>
    <td height="22" style="border-bottom:1px dashed #DDDDDD"><?
      if($wr_link1) $move_file = "movie1.php";
	  if($wr_link2) $move_file = "movie2.php";
	  if($wr_3) $move_file = "movie3.php";
	  if(!$move_file) $move_file = "movie1.php";
	  echo $list[$i]['icon_reply'] . " ";
	  $list[$i][href] = "./{$move_file}?bo_table=$bo_table&wr_id={$list[$i][wr_id]}";
      echo "<a href='{$list[$i]['href']}'>";
      if ($list[$i]['is_notice'])
        echo "<font style='font-family:돋움; font-size:9pt; color:#2C88B9;'><strong>{$list[$i]['subject']}</strong></font>";
      else
        echo "<font style='font-family:돋움; font-size:9pt; color:#6A6A6A;'>{$list[$i]['subject']}</font>";
      echo "</a>";

      if ($list[$i]['comment_cnt']) 
        echo " <a href=\"{$list[$i]['comment_href']}\"><span style='font-family:돋움; font-size:8pt; color:#9A9A9A;'>{$list[$i]['comment_cnt']}</span></a>";

        echo " " . $list[$i]['icon_new'];
        ?></td>
  </tr>
  <? }?>
  <? if (count($list) == 0) { ?><tr><td align=center height=100><font color=#6A6A6A>게시물이 없습니다.</font></td></tr><? } ?>
</table>