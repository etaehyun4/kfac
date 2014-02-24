<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

// $image_width  = 250; // 이미지 폭
// $image_height = 200; // 이미지 높이

if (!$skin_no) $skin_no = "01";
?>

<!-- 게시판 목록 시작 -->
<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr height="25">
    <? if ($is_category) { ?><form name="fcategory" method="get"><td width="50%"><select name=sca onchange="location='<?=$category_location?>'+this.value;"><option value=''>전체</option><?=$category_option?></select></td></form><? } ?>
    <td align="right">
        게시물 <?=number_format($total_count)?>건 
        <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border=0 align=absmiddle></a><?}?>
        <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/admin_button.gif" title="관리자" width="63" height="22" border="0" align="absmiddle"></a><?}?></td>
</tr>
<tr><td height=5></td></tr>
</table>
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr><td height=6></td></tr><tr><td bgcolor=#EBEBEB height=1></td></tr><tr><td height=6></td></tr></table>
<!-- 제목 -->
<?
// 번호에 이미지를 사용할 경우는 아래의 주석을 제거하고 $list[$i][num]의 내용을 수정후 사용하세요.
// if (!is_int($list[$i][num])) { $list[$i][num] = "<img src='$board_skin/img/arrow.gif'>"; } 
?>
<? for ($i=0; $i<count($list); $i++) { ?>
<table width=99% border=0 cellpadding=0 cellspacing=0 align="center" onMouseOver="this.style.backgroundColor='#FAF8FA'" onMouseOut="this.style.backgroundColor=''">
<tr align=center>
         <? if ($is_category) { ?><td width=60 align="center"><span class=tt><?=$list[$i][ca_name]?></span></td>
         <? } ?>
    <td align=center> 
         <? 
		    $image = urlencode($list[$i][file][0][file]); // 첫번째 파일이 이미지라면
            if (preg_match("/\.(gif|jpg|png)$/i", $image) && file_exists("$g4[path]/data/file/$bo_table/$image")) {
                echo "<img src='$g4[path]/data/file/$bo_table/$image' width='90' height='90' border='0'>&nbsp;&nbsp;";
}
		    else if (file_exists($list[$i][file_image1])) { $gznews_img = "width=90 height=90 border=0)'> <br>"; } 
		 ?>
				<a href='<?="./board.php?&bo_table=$bo_table&wr_id={$list[$i][wr_id]}"?>'></a>
    </td>
    <td align=left> 
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="25"><? if ($is_checkdelete) { ?>
              <input type=checkbox name=chk_wr_id[] value='<?=$list[$i][wr_id]?>'>
              <? } ?>
              <?//=$list[$i][reply]?>
              <?//=$list[$i][icon_reply]?>
              <a href='<?=$list[$i][href]?>'>
              <? if ($list[$i][is_notice]) echo "<b>"; ?>
              <font color=#475B8F size=3><b>
              <?=$list[$i][subject]?>
              </b></font>
              <? if ($list[$i][is_notice]) echo "</b>"; ?></a>
<? if ($list[$i][comment_cnt]) 
        echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-size:7pt;'>{$list[$i][comment_cnt]}</span></a>";?>
              <?echo " " . $list[$i][icon_file];?> <?echo " " . $list[$i][icon_link];?>
              <?=$list[$i][icon_new]?>
              <?=$list[$i][icon_hot]?>
              <?=$list[$i][icon_battle]?>
              <?=$list[$i][icon_secret]?>
              <br>
              <font color=gray></td>
          </tr>
          <tr>
            <td>
              <?=cut_str(strip_tags($list[$i][wr_content]),300,"…")?>
              </font> </td>
          </tr>
        </table></td>

<!--
    <td align=left> 
<img src=<?=$list[$i][file_image2]?> align="absmiddle" onError="this.style.visibility='hidden'" border=0 width=50 height=50>
</td>
-->
    <td width=80 align="center"><?=$list[$i][datetime]?></td> 
      
   
	</tr>
</table><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr><td height=6></td></tr><tr><td bgcolor=#EBEBEB height=1></td></tr><tr><td height=6></td></tr></table>

<? } ?>

<? if (count($list) == 0) { echo "<tr><td colspan=6 align=center height=100 class='content contentbg'>자료가 없습니다.</td></tr>"; } ?>

</form>


<!-- 페이지 -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr> 
    <td width="100%" align="center" height=30 valign=bottom>
        <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/btn_search_prev.gif' width=50 height=20 border=0 align=absmiddle title='이전검색'></a>"; } ?>
        <?
        // 기본으로 넘어오는 페이지를 아래와 같이 변환하여 이미지로도 출력할 수 있습니다.
        //echo $write_pages;
        $write_pages = str_replace("처음", "<img src='$board_skin_path/img/begin.gif' border='0' align='absmiddle' title='처음'>", $write_pages);
        $write_pages = str_replace("이전", "<img src='$board_skin_path/img/prev.gif' border='0' align='absmiddle' title='이전'>", $write_pages);
        $write_pages = str_replace("다음", "<img src='$board_skin_path/img/next.gif' border='0' align='absmiddle' title='다음'>", $write_pages);
        $write_pages = str_replace("맨끝", "<img src='$board_skin_path/img/end.gif' border='0' align='absmiddle' title='맨끝'>", $write_pages);
        $write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "<b><font style=\"font-family:돋움; font-size:9pt; color:#797979\">$1</font></b>", $write_pages);
        $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<b><font style=\"font-family:돋움; font-size:9pt; color:orange;\">$1</font></b>", $write_pages);
        ?>
        <?=$write_pages?>
        <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/btn_search_next.gif' width=50 height=20 border=0 align=absmiddle title='다음검색'></a>"; } ?>
    </td>
</tr>
</table>

<!-- 버튼 링크 -->
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
            <option value='wr_subject||wr_content'>제목+내용</option>
            <option value='wr_subject'>제목</option>
            <option value='wr_content'>내용</option>
            <option value='mb_id'>회원아이디</option>
            <option value='wr_name'>이름</option>
        </select><input name=stx maxlength=15 size=10 itemname="검색어" required value="<?=$stx?>"><select name=sop>
            <option value=and>and</option>
            <option value=or>or</option>
        </select>
        <input type=image src="<?=$board_skin_path?>/img/search_btn.gif" border=0 align=absmiddle></td>
</tr>
</table>
</form>

</td></tr></table>

<script language="JavaScript">
if ("<?=$sca?>") document.fcategory.sca.value = "<?=$sca?>";
if ("<?=$stx?>") {
    document.fsearch.sfl.value = "<?=$sfl?>";
    document.fsearch.sop.value = "<?=$sop?>";
}
</script>

<? if ($is_checkbox) { ?>
<script language="JavaScript">
function all_checked(sw)
{
    var f = document.fboardlist;

    for (var i=0; i<f.length; i++) {
        if (f.elements[i].name == "chk_wr_id[]")
            f.elements[i].checked = sw;
    }
}

function check_confirm(str)
{
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
function select_delete()
{
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
function select_copy(sw)
{
    var f = document.fboardlist;

    if (sw == "copy")
        str = "복사";
    else
        str = "이동";
                       
    if (!check_confirm(str))
        return;

    var sub_win = window.open("", "move", "left=50, top=50, width=396, height=550, scrollbars=1");

    f.sw.value = sw;
    f.target = "move";
    f.action = "./move.php";
    f.submit();
}
</script>
<? } ?>
<!-- 게시판 목록 끝 -->