<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 3;

$is_name = true;
$is_date = true;

if ($bo_table=='g4_pds' || $bo_table=='faq' || $bo_table=='yc_faq' || $bo_table=='co_notice') $is_name = false;
if ($bo_table=='faq') $is_date = false;

//if ($is_category) $colspan++;
if ($is_checkbox) $colspan++;
if ($is_name) $colspan++;
if ($is_date) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// 제목이 두줄로 표시되는 경우 이 코드를 사용해 보세요.
// <nobr style='display:block; overflow:hidden; width:000px;'>제목</nobr>
?>

<!-- 게시판 목록 시작 -->
<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
<!--
<table width="100%" cellspacing="0" cellpadding="0">
<tr height="25">
    <? if ($is_category) { ?>
	<form name="fcategory" method="get"><td width="50%"><select name=sca onchange="location='<?=$category_location?>'+this.value;"><option value=''>전체</option><?=$category_option?></select></td></form>
	<? } ?>
    <td align="right" style="font:normal 11px tahoma; color:#BABABA;">
        Total <?=number_format($total_count)?> 
        <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border=0 align=absmiddle></a><?}?>
        <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/btn_admin.gif" title="관리자" width="63" height="22" border="0" align="absmiddle"></a><?}?></td>

</tr>
<tr><td height=5></td></tr>
</table>
-->

<!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
   <? if ($is_category) { ?>
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr align="center">
	   <td colspan=3 height=10></td>
	</tr>
    <tr align="center">
		<?php
			$arr = explode("|", $board[bo_category_list]);
			$arr1   = explode("|", $board[bo_10]);
			$str = "";
				if(!$sca)
				$str = "<td width='2'><img src='$board_skin_path/img/tab_on_notice_left.gif' height='29' border=0></td>
						<td background='$board_skin_path/img/tab_on_bg.gif' style='padding:4 15 0 15' nowrap>
						<a href='board.php?bo_table=$bo_table'><b>전체</b></a></td>
						<td width='2'><img src='$board_skin_path/img/tab_on_right.gif' height='29' border=0></td>";
				else
				$str = "<td width='2'><img src='$board_skin_path/img/tab_off_notice_left.gif' height='29' border=0></td>
						<td background='$board_skin_path/img/tab_off_bg.gif' style='padding:4 15 0 15' nowrap>
						<a href='board.php?bo_table=$bo_table'>전체</a></td>
						<td width='2'><img src='$board_skin_path/img/tab_off_right.gif' height='29' border=0></td>";
			for ($i=0; $i<count($arr); $i++)
				if (trim($arr[$i])){
					if($arr[$i]==$sca ){ 
						$key    = array_search($sca, $arr);
						$cate   = explode("^", $arr1[$key]);
						$subca1 = $cate[0];

						$str .= "<td width='2'><img src='$board_skin_path/img/tab_on_left.gif' border=0></td>
								 <td background='$board_skin_path/img/tab_on_bg.gif' style='padding:4 15 0 15' nowrap>
								 <a href='$category_location$arr[$i]&sfl=wr_10&stx=$subca1&nca=$subca1'><b>$arr[$i]</b></a></td>
								 <td width='2'><img src='$board_skin_path/img/tab_on_right.gif' border='0'></td>";

						}else{ 
						$key    = array_search($arr[$i], $arr);
						$cate   = explode("^", $arr1[$key]);
						$subca1=$cate[0];


						$str .= "<td width='2'><img src='$board_skin_path/img/tab_off_left.gif' border='0'></td>
								 <td background='$board_skin_path/img/tab_off_bg.gif' style='padding:4 15 0 15' nowrap>
								 <a href='$category_location$arr[$i]&sfl=wr_10&stx=$subca1&nca=$subca1'>$arr[$i]</a></td>
								 <td width='2'><img src='$board_skin_path/img/tab_off_right.gif' border='0' ></td>";
						}
					}
			echo $str;
			echo "<td width='100%' background='$board_skin_path/img/tab_bg.gif' style='padding:4 0 0 15' nowrap valign='top'>";
		?>
<?
if ($member['mb_id'] == "admin")
{
?>

        <div style="float:right;">
            <img src="<?=$board_skin_path?>/img/icon_total.gif" align="absmiddle" border='0'>
            <span style="color:#888888; font-weight:bold;">Total <?=number_format($total_count)?></span>
            <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border="0" align="absmiddle"></a><?}?>
            <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/btn_admin.gif" title="관리자" align="absmiddle" border="0"></a><?}?>
        </div>
<? } ?>
	  </td>
	</tr>
   </table>
   <? } else { ?>
<!--
        <div style="float:right;">
            <img src="<?=$board_skin_path?>/img/icon_total.gif" align="absmiddle">
            <span style="color:#888888; font-weight:bold;">Total <?=number_format($total_count)?></span>
            <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border="0" align="absmiddle"></a><?}?>
            <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/btn_admin.gif" title="관리자" align="absmiddle"  border="0"></a><?}?>
        </div>
-->
   <? } ?>

<!-- 제목 -->
<form name="fboardlist" method="post" style="margin:0px;">
<input type='hidden' name='bo_table' value='<?=$bo_table?>'>
<input type='hidden' name='sfl'  value='<?=$sfl?>'>
<input type='hidden' name='stx'  value='<?=$stx?>'>
<input type='hidden' name='spt'  value='<?=$spt?>'>
<input type='hidden' name='page' value='<?=$page?>'>
<input type='hidden' name='sw'   value=''>

<table width=100% border="0" cellpadding=0 cellspacing="2">
<!--
<tr>
    <td height=2 bgcolor="#1586be"></td>
    <? if ($is_checkbox) { ?><td bgcolor="#1586be"></td><?}?>
    <td bgcolor="#1586be"></td>
    <? if ($is_name) { ?><td bgcolor="#48a900"></td><?}?>
    <? if ($is_date) { ?><td bgcolor="#48a900"></td><?}?>
    <td bgcolor="#48a900"></td>
    <? if ($is_good) { ?><td bgcolor="#1586be"></td><?}?>
    <? if ($is_good) { ?><td bgcolor="#1586be"></td><?}?>
</tr>

<tr height=28 align=center>
    <td width=50>번호</td>
    <?/* if ($is_category) { ?><td width=70>분류</td><?}*/?>
    <? if ($is_checkbox) { ?><td width=40><INPUT onclick="if (this.checked) all_checked(true); else all_checked(false);" type=checkbox></td><?}?>
    <td>제목</td>
    <? if ($is_name) { ?><td width=110>글쓴이</td><?}?>
    <? if ($is_date) { ?><td width=40><?=subject_sort_link('wr_datetime', $qstr2, 1)?>날짜</a></td><?}?>
    <td width=50><?=subject_sort_link('wr_hit', $qstr2, 1)?>조회</a></td>
    <?/*?><td width=40 title='마지막 코멘트 쓴 시간'><?=subject_sort_link('wr_last', $qstr2, 1)?>최근</a></td><?*/?>
    <? if ($is_good) { ?><td width=40><?=subject_sort_link('wr_good', $qstr2, 1)?>추천</a></td><?}?>
    <? if ($is_nogood) { ?><td width=40><?=subject_sort_link('wr_nogood', $qstr2, 1)?>비추천</a></td><?}?>
</tr>
<tr><td colspan=<?=$colspan?> height=3 style="background:url(<?=$board_skin_path?>/img/title_bg.gif) repeat-x;"></td></tr>
-->

			<tr> 
<?	$titlenum =  substr($bo_table, 10,2); ?>
				<td align=left colspan=<?=$colspan?>><img src="<?=$board_skin_path?>/img/title<?=$titlenum?>.gif" border="0"></td>
			</tr>
<tr><td colspan=<?=$colspan?> height=30 ></td></tr>
<!-- 목록 -->
<? for ($i=0; $i<count($list); $i++) { ?>
<tr height=28 align=center> 

<!--    <td>
        <? 
        if ($list[$i][is_notice]) // 공지사항 
            echo "<img src=\"$board_skin_path/img/icon_notice.gif\">";
        else if ($wr_id == $list[$i][wr_id]) // 현재위치
            echo "<span style='font:bold 11px tahoma; color:#E15916;'>{$list[$i][num]}</span>";
        else
            echo "<span style='font:normal 11px tahoma; color:#BABABA;'>{$list[$i][num]}</span>";
        ?></td>
-->

	<td width=30>&nbsp;<td>


<? if ($bo_table == "re_webjin_09" || $bo_table == "re_webjin_10") { ?>

<td align="left"  valign="top" style="padding:23 0 0 0 ;"> <img src="<?=$board_skin_path?>/img/jum01.gif"   border="0"></td>
    <?/* if ($is_category) { ?><td><a href="<?=$list[$i][ca_name_href]?>"><span class=small style='color:#BABABA;'><?=$list[$i][ca_name]?></span></a></td><? } */?>
    <? if ($is_checkbox) { ?><td valign="top" style="padding:15 5 0 0 ;"><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
    <td align=left style='font-size:9pt;font-family:굴림;color:#000000; word-break:break-all; padding:20 110 0 0'> <!--color:#000000; font-weight:bold;-->
        <? 
        echo $nobr_begin;
/*
        echo $list[$i][reply];
        echo $list[$i][icon_reply];
        if ($is_category && $list[$i][ca_name]) { 
            echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> ";
        }
        $style = "";
        if ($list[$i][is_notice]) $style = " style='font-weight:bold;'";
*/
        echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; word-break:break-all;'>";//font-family:굴림;-->
        echo $list[$i][subject];
		echo "<br><br>";
//		echo $wr_content = cut_str(strip_tags($list[$i][wr_content]),300);
		echo "</a>";

		
			
		

/*
        if ($list[$i][comment_cnt]) 
            echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-family:Tahoma;font-size:10px;color:#EE5A00;'>{$list[$i][comment_cnt]}</span></a>";
*/
        // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
        // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }
/*
        echo " " . $list[$i][icon_new];
        echo " " . $list[$i][icon_file];
        echo " " . $list[$i][icon_link];
        echo " " . $list[$i][icon_hot];
        echo " " . $list[$i][icon_secret];
*/
        echo $nobr_end;

        ?> </td>

<? } else if ($bo_table == "re_webjin_11") { ?>
	

	<td align="left"  valign="top" style="padding:12 0 0 0 ;"> <img src="<?=$board_skin_path?>/img/jum01.gif"   border="0"></td>
    <?/* if ($is_category) { ?><td><a href="<?=$list[$i][ca_name_href]?>"><span class=small style='color:#BABABA;'><?=$list[$i][ca_name]?></span></a></td><? } */?>
    <? if ($is_checkbox) { ?><td valign="top" style="padding:4 5 0 0 ;"><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
    <td align=left style='font-size:9pt;font-family:굴림;color:#000000; word-break:break-all; padding:5 110 0 0'> <!--color:#000000; font-weight:bold;-->
        <? 
        echo $nobr_begin;
/*
        echo $list[$i][reply];
        echo $list[$i][icon_reply];
        if ($is_category && $list[$i][ca_name]) { 
            echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> ";
        }
        $style = "";
        if ($list[$i][is_notice]) $style = " style='font-weight:bold;'";
*/
        echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; word-break:break-all;'>";//font-family:굴림;-->
        echo $list[$i][subject];
//		echo "<br><br><br>";
//		echo $wr_content = cut_str(strip_tags($list[$i][wr_content]),300);
		echo "</a>";

		
			
		

/*
        if ($list[$i][comment_cnt]) 
            echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-family:Tahoma;font-size:10px;color:#EE5A00;'>{$list[$i][comment_cnt]}</span></a>";
*/
        // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
        // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }
/*
        echo " " . $list[$i][icon_new];
        echo " " . $list[$i][icon_file];
        echo " " . $list[$i][icon_link];
        echo " " . $list[$i][icon_hot];
        echo " " . $list[$i][icon_secret];
*/
        echo $nobr_end;

        ?> </td>


<? } else if ($bo_table == "re_webjin_01") { ?>

	<td align="left"  valign="top" style="padding:17 5 0 0 ;"> <img src="<?=$board_skin_path?>/img/jum01.gif"   border="0"></td>
    <?/* if ($is_category) { ?><td><a href="<?=$list[$i][ca_name_href]?>"><span class=small style='color:#BABABA;'><?=$list[$i][ca_name]?></span></a></td><? } */?>
    <? if ($is_checkbox) { ?><td valign="top" style="padding:8 5 0 0 ;"><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
    <td align=left style='font-size:9pt;font-family:굴림;color:#000000; word-break:break-all; padding-top:13;'> <!--color:#000000; font-weight:bold;-->
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="left" valign="top">
				<? 
				echo $nobr_begin;
		/*
				echo $list[$i][reply];
				echo $list[$i][icon_reply];
				if ($is_category && $list[$i][ca_name]) { 
					echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> ";
				}
				$style = "";
				if ($list[$i][is_notice]) $style = " style='font-weight:bold;'";
		*/
				
	//<-----------------------  제목 ----------------------->				
				
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; word-break:break-all; ;'>";//font-family:굴림; 제목-->
				echo $list[$i][subject];
				echo "<br>";
				echo "</a>";
				

		/*
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; font-weight:bold; word-break:break-all;'>";//font-family:굴림;-->
				echo $list[$i][subject];
				echo "<br><br><br>";
				
				echo "</a>";
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; word-break:break-all;'>";//font-family:굴림;-->
				echo $wr_content = cut_str(strip_tags($list[$i][wr_content]),300);
				echo "</a>";
		*/		

		/*
				if ($list[$i][comment_cnt]) 
					echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-family:Tahoma;font-size:10px;color:#EE5A00;'>{$list[$i][comment_cnt]}</span></a>";
		*/
				// if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
				// if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }
		/*
				echo " " . $list[$i][icon_new];
				echo " " . $list[$i][icon_file];
				echo " " . $list[$i][icon_link];
				echo " " . $list[$i][icon_hot];
				echo " " . $list[$i][icon_secret];
		*/
				echo $nobr_end;

				?> </td>
				</tr>
				<tr>
				<td align="left" valign="top" style='font-size:9pt;font-family:굴림;color:#000000; word-break:break-all; padding:5 0 0 0;'>
				<? 
				echo $nobr_begin;

	//<-----------------------  부제목 ----------------------->
	
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#a5bd2b; word-break:break-all;'>"; 
				echo $list[$i][wr_5];
				echo "<br><br>";
				echo "</a>";
				

				echo $nobr_end;

				?> </td>
				</tr>
				<tr>
				<td align="left" valign="top" align="left" valign="top" style='font-size:8pt;font-family:굴림;color:#000000; word-break:break-all; padding:5 0 0 0;'>
				<? 
				echo $nobr_begin;

	//<-----------------------  내용 ----------------------->
	
				echo "<a href='{$list[$i][href]}' style='font-size:8pt;color:#000000; word-break:break-all;'>";
				echo $wr_content = cut_str(strip_tags($list[$i][wr_content]),320);
				echo "</br></br>";
				echo "</a>";

				echo $nobr_end;

				?> </td>
			</tr>
		</table>
		</td>




<? } else if ($bo_table == "re_webjin_02") { ?>

	<td align="left"  valign="top" style="padding:17 5 0 0 ;"> <img src="<?=$board_skin_path?>/img/jum01.gif"   border="0"></td>
    <?/* if ($is_category) { ?><td><a href="<?=$list[$i][ca_name_href]?>"><span class=small style='color:#BABABA;'><?=$list[$i][ca_name]?></span></a></td><? } */?>
    <? if ($is_checkbox) { ?><td valign="top" style="padding:8 5 0 0 ;"><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
    <td align=left style='font-size:9pt;font-family:굴림;color:#000000; word-break:break-all; padding-top:13;'> <!--color:#000000; font-weight:bold;-->
        <table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="left" valign="top">
				<? 
				echo $nobr_begin;
		/*
				echo $list[$i][reply];
				echo $list[$i][icon_reply];
				if ($is_category && $list[$i][ca_name]) { 
					echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> ";
				}
				$style = "";
				if ($list[$i][is_notice]) $style = " style='font-weight:bold;'";
		*/
				
	//<-----------------------  제목 ----------------------->				
				
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; word-break:break-all; ;'>";//font-family:굴림; 제목-->
				echo $list[$i][subject];
				echo "<br>";
				echo "</a>";
				

		/*
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; font-weight:bold; word-break:break-all;'>";//font-family:굴림;-->
				echo $list[$i][subject];
				echo "<br><br><br>";
				
				echo "</a>";
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; word-break:break-all;'>";//font-family:굴림;-->
				echo $wr_content = cut_str(strip_tags($list[$i][wr_content]),300);
				echo "</a>";
		*/		

		/*
				if ($list[$i][comment_cnt]) 
					echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-family:Tahoma;font-size:10px;color:#EE5A00;'>{$list[$i][comment_cnt]}</span></a>";
		*/
				// if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
				// if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }
		/*
				echo " " . $list[$i][icon_new];
				echo " " . $list[$i][icon_file];
				echo " " . $list[$i][icon_link];
				echo " " . $list[$i][icon_hot];
				echo " " . $list[$i][icon_secret];
		*/
				echo $nobr_end;

				?> </td>
				</tr>
				<tr>
				<td align="left" valign="top" style='font-size:9pt;font-family:굴림;color:#000000; word-break:break-all; padding:5 0 0 0;'>
				<? 
				echo $nobr_begin;

	//<-----------------------  부제목 ----------------------->
	
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#f08700; word-break:break-all;'>"; 
				echo $list[$i][wr_5];
				echo "<br><br>";
				echo "</a>";
				

				echo $nobr_end;

				?> </td>
				</tr>
				<tr>
				<td align="left" valign="top" align="left" valign="top" style='font-size:8pt;font-family:굴림;color:#000000; word-break:break-all; padding:5 0 0 0;'>
				<? 
				echo $nobr_begin;

	//<-----------------------  내용 ----------------------->
	
				echo "<a href='{$list[$i][href]}' style='font-size:8pt;color:#000000; word-break:break-all;'>";
				echo $wr_content = cut_str(strip_tags($list[$i][wr_content]),320);
				echo "</br></br>";
				echo "</a>";

				echo $nobr_end;

				?> </td>
			</tr>
		</table>
	</td>



<? } else if ($bo_table == "re_webjin_03" || $bo_table == "re_webjin_04" || $bo_table == "re_webjin_05") { ?>

	<td align="left"  valign="top" style="padding:17 5 0 0 ;"> <img src="<?=$board_skin_path?>/img/jum01.gif"   border="0"></td>
    <?/* if ($is_category) { ?><td><a href="<?=$list[$i][ca_name_href]?>"><span class=small style='color:#BABABA;'><?=$list[$i][ca_name]?></span></a></td><? } */?>
    <? if ($is_checkbox) { ?><td valign="top" style="padding:8 5 0 0 ;"><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
    <td align=left style='font-size:9pt;font-family:굴림;color:#000000; word-break:break-all; padding-top:13;'> <!--color:#000000; font-weight:bold;-->
        <table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="left" valign="top">
				<? 
				echo $nobr_begin;
		/*
				echo $list[$i][reply];
				echo $list[$i][icon_reply];
				if ($is_category && $list[$i][ca_name]) { 
					echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> ";
				}
				$style = "";
				if ($list[$i][is_notice]) $style = " style='font-weight:bold;'";
		*/
				
	//<-----------------------  제목 ----------------------->				
				
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; word-break:break-all; ;'>";//font-family:굴림; 제목-->
				echo $list[$i][subject];
				echo "<br>";
				echo "</a>";
				

		/*
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; font-weight:bold; word-break:break-all;'>";//font-family:굴림;-->
				echo $list[$i][subject];
				echo "<br><br><br>";
				
				echo "</a>";
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; word-break:break-all;'>";//font-family:굴림;-->
				echo $wr_content = cut_str(strip_tags($list[$i][wr_content]),300);
				echo "</a>";
		*/		

		/*
				if ($list[$i][comment_cnt]) 
					echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-family:Tahoma;font-size:10px;color:#EE5A00;'>{$list[$i][comment_cnt]}</span></a>";
		*/
				// if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
				// if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }
		/*
				echo " " . $list[$i][icon_new];
				echo " " . $list[$i][icon_file];
				echo " " . $list[$i][icon_link];
				echo " " . $list[$i][icon_hot];
				echo " " . $list[$i][icon_secret];
		*/
				echo $nobr_end;

				?> </td>
				</tr>
				<tr>
				<td align="left" valign="top" style='font-size:9pt;font-family:굴림;color:#000000; word-break:break-all; padding:5 0 0 0;'>
				<? 
				echo $nobr_begin;

	//<-----------------------  부제목 ----------------------->
	
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#42b2a2; word-break:break-all;'>"; 
				echo $list[$i][wr_5];
				echo "<br><br>";
				echo "</a>";
				

				echo $nobr_end;

				?> </td>
				</tr>
				<tr>
				<td align="left" valign="top" align="left" valign="top" style='font-size:8pt;font-family:굴림;color:#000000; word-break:break-all; padding:5 0 0 0;'>
				<? 
				echo $nobr_begin;

	//<-----------------------  내용 ----------------------->
	
				echo "<a href='{$list[$i][href]}' style='font-size:8pt;color:#000000; word-break:break-all;'>";
				echo $wr_content = cut_str(strip_tags($list[$i][wr_content]),320);
				echo "</br></br>";
				echo "</a>";

				echo $nobr_end;

				?> </td>
			</tr>
		</table>
	</td>


<? } else if ($bo_table == "re_webjin_07" || $bo_table == "re_webjin_08" || $bo_table == "re_webjin_12") { ?>

	<td align="left"  valign="top" style="padding:17 5 0 0 ;"> <img src="<?=$board_skin_path?>/img/jum01.gif"   border="0"></td>
    <?/* if ($is_category) { ?><td><a href="<?=$list[$i][ca_name_href]?>"><span class=small style='color:#BABABA;'><?=$list[$i][ca_name]?></span></a></td><? } */?>
    <? if ($is_checkbox) { ?><td valign="top" style="padding:8 5 0 0 ;"><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
    <td align=left style='font-size:9pt;font-family:굴림;color:#000000; word-break:break-all; padding-top:13;'> <!--color:#000000; font-weight:bold;-->
        <table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td align="left" valign="top">
				<? 
				echo $nobr_begin;
		/*
				echo $list[$i][reply];
				echo $list[$i][icon_reply];
				if ($is_category && $list[$i][ca_name]) { 
					echo "<span class=small><font color=gray>[<a href='{$list[$i][ca_name_href]}'>{$list[$i][ca_name]}</a>]</font></span> ";
				}
				$style = "";
				if ($list[$i][is_notice]) $style = " style='font-weight:bold;'";
		*/
				
	//<-----------------------  제목 ----------------------->				
				
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; word-break:break-all; ;'>";//font-family:굴림; 제목-->
				echo $list[$i][subject];
				echo "<br>";
				echo "</a>";
				

		/*
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; font-weight:bold; word-break:break-all;'>";//font-family:굴림;-->
				echo $list[$i][subject];
				echo "<br><br><br>";
				
				echo "</a>";
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#000000; word-break:break-all;'>";//font-family:굴림;-->
				echo $wr_content = cut_str(strip_tags($list[$i][wr_content]),300);
				echo "</a>";
		*/		

		/*
				if ($list[$i][comment_cnt]) 
					echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-family:Tahoma;font-size:10px;color:#EE5A00;'>{$list[$i][comment_cnt]}</span></a>";
		*/
				// if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
				// if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }
		/*
				echo " " . $list[$i][icon_new];
				echo " " . $list[$i][icon_file];
				echo " " . $list[$i][icon_link];
				echo " " . $list[$i][icon_hot];
				echo " " . $list[$i][icon_secret];
		*/
				echo $nobr_end;

				?> </td>
				</tr>
				<tr>
				<td align="left" valign="top" style='font-size:9pt;font-family:굴림;color:#000000; word-break:break-all; padding:5 0 0 0;'>
				<? 
				echo $nobr_begin;

	//<-----------------------  부제목 ----------------------->
	
				echo "<a href='{$list[$i][href]}' style='font-size:9pt;color:#b66592; word-break:break-all;'>"; 
				echo $list[$i][wr_5];
				echo "<br><br>";
				echo "</a>";
				

				echo $nobr_end;

				?> </td>
				</tr>
				<tr>
				<td align="left" valign="top" align="left" valign="top" style='font-size:8pt;font-family:굴림;color:#000000; word-break:break-all; padding:5 0 0 0;'>
				<? 
				echo $nobr_begin;

	//<-----------------------  내용 ----------------------->
	
				echo "<a href='{$list[$i][href]}' style='font-size:8pt;color:#000000; word-break:break-all;'>";
				echo $wr_content = cut_str(strip_tags($list[$i][wr_content]),320);
				echo "</br></br>";
				echo "</a>";

				echo $nobr_end;

				?> </td>
			</tr>
		</table>
	</td>

<? } ?>
		
		
		


<!--
    <? if ($is_name) { ?><td><nobr style='display:block; overflow:hidden; width:105px;'><?=$list[$i][name]?></nobr></td><?}?>
    <? if ($is_date) { ?><td><span style='font:normal 11px tahoma; color:#BABABA;'><?=$list[$i][datetime2]?></span></td><?}?>
    <td><span style='font:normal 11px tahoma; color:#BABABA;'><?=$list[$i][wr_hit]?></span></td>
    <?/*?><td><span style='font:normal 11px tahoma; color:#BABABA;'><?=$list[$i][last2]?></span></td><?*/?>
    <? if ($is_good) { ?><td align="center"><span style='font:normal 11px tahoma; color:#BABABA;'><?=$list[$i][wr_good]?></span></td><? } ?>
    <? if ($is_nogood) { ?><td align="center"><span style='font:normal 11px tahoma; color:#BABABA;'><?=$list[$i][wr_nogood]?></span></td><? } ?>
-->
</tr>

<tr>
	
	
<? if ($bo_table == "re_webjin_09") { ?>	
	
	<td colspan=<?=$colspan-1?> align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left" valign="top" style='padding-left:48px; font-size:8pt; font-family:굴림; color:#8d8d8d; word-break:break-all;'>
			
					<?
						echo "회사명 : ";
						echo $list[$i][wr_3]; 
						echo "<br>";
						echo "마감일 : ";
						echo $list[$i][wr_4];
					?>

				</td>
				<td align="right" valign="top" style='font-size:8pt; font-family:굴림; color:#8d8d8d; word-break:break-all;'>
			
					<?
						
						echo $list[$i][datetime]; 
						 echo "&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "No. ".$list[$i][wr_2];
					?>

				</td>
			</tr>
		</table>
	</td>


<?  } else if ($bo_table == "re_webjin_02" || $bo_table == "re_webjin_03" || $bo_table == "re_webjin_04" || $bo_table == "re_webjin_05" || $bo_table == "re_webjin_07" || $bo_table == "re_webjin_08" || $bo_table == "re_webjin_10" || $bo_table == "re_webjin_12") { ?>	
	
	<td colspan=<?=$colspan-1?> align="left" valign="top">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="left" valign="top" style='padding-left:48px; font-size:8pt; font-family:굴림; color:#8d8d8d; word-break:break-all;'>
			
					<?
						
						echo $list[$i][wr_3]; 
						echo "<br>";
						echo $list[$i][wr_4];
					?>

				</td>
				<td align="right" valign="top" style='font-size:8pt; font-family:굴림; color:#8d8d8d; word-break:break-all;'>
			
					<?
						
						echo $list[$i][datetime]; 
						 echo "&nbsp;&nbsp;&nbsp;&nbsp;";
						echo "No. ".$list[$i][wr_2];
					?>

				</td>
			</tr>
		</table>
	</td>

<? } else { ?>


	<td colspan=<?=$colspan-1?>  align="right" valign="bottom" style='font-size:8pt; font-family:굴림; color:#8d8d8d; word-break:break-all;'>
			
			<?
				
				echo $list[$i][datetime]; 
				 echo "&nbsp;&nbsp;&nbsp;&nbsp;";
				echo "No. ".$list[$i][wr_2];
			?>

	</td>

<? } ?>


</tr>
<tr>
	<td colspan=<?=$colspan-1?> height="5"> </td>
</tr>	
<tr>	<td width=10><td><td colspan=<?=$colspan-1?> height=1 ><hr color="#CCCCCC" size="1" style="border-width:1; border-color:rgb(204,204,204); border-style:dashed;"></td></tr>
<?}?>

<? if (count($list) == 0) { echo "<tr><td colspan='$colspan' height=45 align=center>게시물이 없습니다.</td></tr>"; } ?>
<!--<tr><td colspan=<?=$colspan?> bgcolor="#1586be" height="2"></td></tr>-->

<? 
	$line = 3 - count($list);
	if (count($list) == 0) $line -=1;
	for ($i=0; $i<=$line; $i++) { ?>
<tr><td align=left height=20 >&nbsp;<td></tr>
<? } ?>

</table>
</form>	



<!-- 페이지 -->
	
<table width="100%" cellspacing="0" cellpadding="0">
<tr> 
    <td width="100%" align="center" height=30 valign=bottom>
        <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/btn_search_prev.gif' border=0 align=absmiddle title='이전검색'></a>"; } ?>
        <?
        // 기본으로 넘어오는 페이지를 아래와 같이 변환하여 이미지로도 출력할 수 있습니다.
        //echo $write_pages;

/*
        $write_pages = str_replace("처음", "<img src='$board_skin_path/img/begin.gif' border='0' align='absmiddle' title='처음'>", $write_pages);
        $write_pages = str_replace("이전", "<img src='$board_skin_path/img/prev.gif' border='0' align='absmiddle' title='이전'>", $write_pages);
        $write_pages = str_replace("다음", "<img src='$board_skin_path/img/next.gif' border='0' align='absmiddle' title='다음'>", $write_pages);
        $write_pages = str_replace("맨끝", "<img src='$board_skin_path/img/end.gif' border='0' align='absmiddle' title='맨끝'>", $write_pages);
        $write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "<b><font style=\"font-family:tahoma; font-size:11px; color:#000000\">$1</font></b>", $write_pages);
        $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<b><font style=\"font-family:tahoma; font-size:11px; color:#E15916;\">$1</font></b>", $write_pages);
*/
        ?>

        <?=$write_pages?>

        <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/btn_search_next.gif' border=0 align=absmiddle title='다음검색'></a>"; } ?>
    </td>
</tr>
</table>



<? if($is_admin) { ?>
<!-- 링크 버튼, 검색 -->
<form name=fsearch method=get style="margin:0px;">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=sca      value="<?=$sca?>">
<table width=100% cellpadding=0 cellspacing=0>
<tr> 
    <td width="50%" height="40">
        <? if ($list_href) { ?><a href="<?=$list_href?>"><img src="<?=$board_skin_path?>/img/btn_list.gif" border="0"></a><? } ?>
        <? if ($write_href) { ?><a href="<?=$write_href?>"><img src="<?=$board_skin_path?>/img/btn_write.gif" border="0"></a><? } ?>
        <? if ($is_checkbox) { ?>
            <a href="javascript:select_delete();"><img src="<?=$board_skin_path?>/img/btn_select_delete.gif" border="0"></a>
            <a href="javascript:select_copy('copy');"><img src="<?=$board_skin_path?>/img/btn_select_copy.gif" border="0"></a>
            <a href="javascript:select_copy('move');"><img src="<?=$board_skin_path?>/img/btn_select_move.gif" border="0"></a>
        <? } ?>
    </td>
    <td width="50%" align="right">
        <select name=sfl>
            <option value='wr_subject'>제목</option>
            <option value='wr_content'>내용</option>
            <option value='wr_subject||wr_content'>제목+내용</option>
            <option value='mb_id,1'>회원아이디</option>
            <option value='mb_id,0'>회원아이디(코)</option>
            <option value='wr_name,1'>이름</option>
            <option value='wr_name,0'>이름(코)</option>
        </select><input name=stx maxlength=15 size=10 itemname="검색어" required value='<?=$stx?>'><select name=sop>
            <option value=and>and</option>
            <option value=or>or</option>
        </select>
        <input type=image src="<?=$board_skin_path?>/img/search_btn.gif" border=0 align=absmiddle></td>
</tr>
</table>
</form>
<? } ?>
</td></tr></table>


<!------------------------------------------- 지난호 보기 Start ------------------------------------------------------------------------------------
<? if(!$is_admin) { ?>

<?
$write_table = "g4_write_".$bo_table;

$year = get_cookie("ck_year");
$ho = get_cookie("ck_ho");

$sql_search = " wr_1 != '$year' and wr_2 != '$ho'";

$sql_order  = " wr_1 desc, wr_2 desc";

// 총 갯 수, 한페이지 갰수
$sql = " select distinct wr_id  
           from $write_table 
		  where $sql_search ";
 
    $result = sql_query($sql);
    $total_count = mysql_num_rows($result);

$page_count = 5;
$total_page  = ceil($total_count / $page_count);	// 전체 페이지 계산
if (!$sub_page || $total_page < $sub_page) { $sub_page = 1; }	// 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($sub_page - 1) * $page_count;			// 시작 열을 구함


$sql = " select wr_id, wr_subject, wr_2  
           from $write_table 
		  where $sql_search 
  	   order by $sql_order 
		  limit $from_record, $page_count ";

$result = sql_query($sql);

?>
<table width="100%" cellspacing="0" cellpadding="0">
<tr> <td width="100%" align="center" >
	<table width="633" cellspacing="0" cellpadding="0">
	<tr> <td width="633" colspan=3 valign=bottom><img src='<?=$board_skin_path?>/img/box_top.gif'></td></tr>
	<tr> 
		<td align="left" width=5 background='<?=$board_skin_path?>/img/box_left.gif' ></td>
		<td align="left" width="625" align="center" >

			<table width="95%" cellspacing="0" cellpadding="0" border="0" >
			
			<tr> 
<?	$titlenum =  substr($bo_table, 7,2); ?>
				<td align="left" height=30 >&nbsp;&nbsp;<img src="<?=$board_skin_path?>/img/sub_title<?=$titlenum?>.gif" border="0"></td>
			</tr>
<?
for ($i=0; $row=sql_fetch_array($result); $i++) 
{
?>
			<tr> <td align="left" align=left height=20 >
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<img src="<?=$board_skin_path?>/img/jum01.gif" align="absmiddle"  border="0">&nbsp;&nbsp;
        <? 
        echo $nobr_begin;
        echo "<a href='/index/bbs/board.php?bo_table=$bo_table&wr_id=$row[wr_id]' style='font-size:9pt;color:#000000; word-break:break-all;'>";//font-family:굴림;
        echo "춤웹진 제".$row[wr_2]."호 > ".cut_hangul_last(get_text($row[wr_subject]));
        echo "</a>";
        echo $nobr_end;
		?>

			</td></tr>
<? }?>
<? if ($i == 0) { echo "<tr><td colspan='$colspan' height=100 align=center>게시물이 없습니다.</td></tr>"; } ?>

		<tr> <td align="center" height=30 >
<?

$write_pages = get_paging(10, $sub_page, $total_page, $_SERVER["PHP_SELF"]."?bo_table=$bo_table".$qstr."&sub_page=");

echo $write_pages;

?>
		</td></tr>
		</table>

		</td>
		<td align="left" width=3 background='<?=$board_skin_path?>/img/box_left.gif' ></td>
	</tr>
	<tr><td colspan=3 valign=top><img src='<?=$board_skin_path?>/img/box_bottom.gif'></td></tr>
	</table>
</td></tr>
</table>
<? } ?>
-->

<!------------------------------------------- 지난호 보기 End -------------------------------------------------------------------------------------->


<table width="100%" cellspacing="0" cellpadding="0">
<tr> <td width="100%" align="center" height=30>
</td></tr>
</table>

<script language="JavaScript">
if ('<?=$sca?>') document.fcategory.sca.value = '<?=$sca?>';
if ('<?=$stx?>') {
    document.fsearch.sfl.value = '<?=$sfl?>';
    document.fsearch.sop.value = '<?=$sop?>';
}
</script>

<? if ($is_checkbox) { ?>
<script language="JavaScript">
function all_checked(sw) {
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str) {
    var f = document.fboardlist;
    var chk_count = 0;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]" && f.elements[i].checked)
            chk_count++;
    }

    if (!chk_count) {
        alert(str + "할 게시물을 하나 이상 선택하세요.");
        return false;
    }
    return true;
}

// 선택한 게시물 삭제
function select_delete() {
    var f = document.fboardlist;

    str = "삭제";
    if (!check_confirm(str))
        return;

    if (!confirm("선택한 게시물을 정말 "+str+" 하시겠습니까?\n\n한번 "+str+"한 자료는 복구할 수 없습니다"))
        return;

    f.action = "./delete_all.php";
    f.submit();
}

// 선택한 게시물 복사 및 이동
function select_copy(sw) {
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=500, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<? } ?>
<!-- 게시판 목록 끝 -->
