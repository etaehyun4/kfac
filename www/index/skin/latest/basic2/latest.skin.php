<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>

<table width="100%" cellpadding="0" cellspacing="0" border="0">

    
<tr>
	<td height="10"></td>
</tr>
			<!-- 최신글 목록 -->
			<? for ($i=0; $i<count($list); $i++) { ?>
			<tr>
				<td>
					<table width=100% border="0">
					<tr>
						<td width="10"></td>
						<td  align="left" width="9" height=15>
						<img src='<?=$latest_skin_path?>/img/box02_bullet.gif' align=absmiddle>
						</td>
						<td width="2">
						</td>
						<td align="left">
						<?

						//날짜표시
						$date1 = substr($list[$i][datetime],0,10); //날짜표시형식변경
						$date = explode("-", $date1); 
						$year = $date[0];
						$month = $date[1]; 
						$day = $date[2]; 
						$latest_date = $year."/".$month."/".$day."";

						echo $list[$i]['icon_reply'] . " ";
						echo "<a href='{$list[$i]['href']}'>";
						if ($list[$i]['is_notice'])
							echo "<font style='font-family:돋움; font-size:9pt; color=#6A6A6A;'>{$list[$i]['subject']}</font>";
						else
							echo "<font style='font-family:돋움; font-size:9pt; color:#6A6A6A;'>{$list[$i]['subject']}</font>";
						echo "</a>";

						if ($list[$i]['comment_cnt']) 
							echo " <a href=\"{$list[$i]['comment_href']}\"><span style='font-family:돋움; font-size:8pt; color=#6A6A6A;'>{$list[$i]['comment_cnt']}</span></a>";

						// if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
						// if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

						echo " " . $list[$i]['icon_new'];
					
						echo " " . $list[$i]['icon_link'];
						echo " " . $list[$i]['icon_hot'];
						echo " " . $list[$i]['icon_secret'];
						?></td>
<!--						<td width="5">
						</td>
						<td align="right">
						<?
							
						//날짜표시
						$date1 = substr($list[$i][datetime],0,10); //날짜표시형식변경
						$date = explode("-", $date1); 
						$year = $date[0];
						$month = $date[1]; 
						$day = $date[2]; 
						$latest_date = $year."/".$month."/".$day."";

						
							echo "<font style='font-family:돋움; font-size:9pt; color:#6A6A6A;'>{$latest_date}</font>";
						

						?>
						</td>-->
						</tr>
						<!-- <tr><td height="1" background="<?=$latest_skin_path?>/img/box01_dot.gif"></td></tr> -->
						<!--<tr><td bgcolor=#EBEBEB height=1></td></tr> echo " " . $list[$i]['icon_file'];-->
					</table></td>
			</tr>
			<? } ?>

			<? if (count($list) == 0) { ?><tr><td colspan=4 align=center height=66><font color=#6A6A6A>게시물이 없습니다.</a></td></tr><? } ?>

</table>
