<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

$colspan = 6;
if ($is_checkbox) $colspan++;

if($member[mb_level] <= 7) { 
alert("접근권한이 없습니다.", $g4[path]); 
}

?>


<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<table width="100%" cellspacing="0" cellpadding="0">
<tr height="25">
    <td width="50%"><font color=red><b>폼메일 접수</b></font></td>
    <td align="right">
        게시물 <?=number_format($total_count)?>건 
        <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border=0 align=absmiddle></a><?}?>
        <!--<? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/admin_button.gif" title="관리자" width="63" height="22" border="0" align="absmiddle"></a><?}?> --></td>
</tr>
<tr><td height=5 colspan=2></td></tr>
</table>

<form name="fboardlist" method="post" style="margin:0px;">
<input type="hidden" name="bo_table" value="<?=$bo_table?>">
<input type="hidden" name="sfl"  value="<?=$sfl?>">
<input type="hidden" name="stx"  value="<?=$stx?>">
<input type="hidden" name="spt"  value="<?=$spt?>">
<input type="hidden" name="page" value="<?=$page?>">
<input type="hidden" name="sw"   value="">
<table width=100% cellpadding=5 cellspacing=0 border=0>
<tr><td colspan=<?=$colspan?> height=2 bgcolor=#B0ADF5></td></tr>
<tr bgcolor=#F8F8F9 height=30 align=center>
    <td width=50>번호</td>
    <? if ($is_checkbox) { ?><td width=40><INPUT onclick="if (this.checked) all_checked(true); else all_checked(false);" type=checkbox></td><?}?>
    <td>회사명</td>
    <td width=150>담당부서/이름</td>
    <td width=120>연락처</td>
    <td width=50>날짜</td>
    <td width=50>상태</td>
</tr>
<tr><td colspan=<?=$colspan?> height=1 bgcolor=#B0ADF5></td></tr>

<? for ($i=0; $i<count($list); $i++) { ?>
<tr height=28 align=center> 
    <td>
        <? 
        if ($list[$i][is_notice]) // 공지사항 
            echo "<img src=\"$board_skin_path/img/notice_icon.gif\" width=30 height=16>";
        else if ($wr_id == $list[$i][wr_id]) // 현재위치
            echo "<font color='#2C8CB9'><strong>{$list[$i][num]}</strong>";
        else
            echo "{$list[$i][num]}";
        ?></td>
    <? if ($is_checkbox) { ?><td><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><? } ?>
    <td align=left style='word-break:break-all;'>
        <? 
        echo $nobr_begin;
        echo $list[$i][reply];
        echo $list[$i][icon_reply];
        echo "<a href='{$list[$i][href]}'>";
        if ($list[$i][is_notice])
            echo "<font color='#AF6BE3'><strong>{$list[$i][subject]}</strong></font>";
        else
        {
            $style1 = $style2 = "";
            if ($list[$i][icon_new]) // 최신글은 검정
                $style1 = "color:#112222;";
            if (!$list[$i][comment_cnt]) // 코멘트 없는것만 굵게
                $style2 = "font-weight:bold;";
            echo "<span style='$style1 $style2'>{$list[$i][subject]}</span>";
        }
        echo "</a>";

        if ($list[$i][comment_cnt]) 
            echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-family:Tahoma;font-size:7pt;color:#ff6600;'>{$list[$i][comment_cnt]}</span></a>";

        echo $nobr_end;
		?></td>
<?
$ex9_filed = explode("|",$list[$i][wr_9]); //전화 및 답변방법
$tel = $ex9_filed[0] ."-". $ex9_filed[1] ."-".$ex9_filed[2];
$h_tel = $ex9_filed[3] ."-". $ex9_filed[4] ."-".$ex9_filed[5];

$my_mail = cut_str(get_text($ex9_filed[6]), 17);

?>
	<td><?=$list[$i][wr_1]?><br>(<?=$list[$i][wr_name]?>)</td>

	
	<td align=left>
	<?
		if($ex9_filed[2]) echo "전화:{$tel}";
		if($ex9_filed[5]) echo "<br>휴대:{$h_tel}";
		if($my_mail) echo "<br>메일:<a href='mailto:{$my_mail}' title='{$ex9_filed[6]}'>{$my_mail}</a>";
		?></td>
    <td><?=$list[$i][datetime2]?></td>
    <td>
	<? if($list[$i][wr_8] == "답변전" || $list[$i][wr_8]=="")  echo "<font color=#FF8000>답변전</font>";
    	if($list[$i][wr_8] == "답변중")  echo "<font color=#8080FF>답변중</font>";
	    if($list[$i][wr_8] == "완료")   echo "<font color=#C0C0C0>완료</font>";
	?>
</td>
</tr>
<tr><td colspan=<?=$colspan?> height=1 bgcolor=#E7E7E7></td></tr>
<?}?>

<? if (count($list) == 0) { echo "<tr><td colspan='$colspan' height=100 align=center>게시물이 없습니다.</td></tr>"; } ?>
<tr><td colspan=<?=$colspan?> bgcolor=#5C86AD height=1>
</table>
</form>

<table width="100%" cellspacing="0" cellpadding="0">
<tr> 
    <td width="100%" align="center" height=30 valign=bottom>
        <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/btn_search_prev.gif' border=0 align=absmiddle title='이전검색'></a>"; } ?>
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
        <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/btn_search_next.gif' border=0 align=absmiddle title='다음검색'></a>"; } ?>
    </td>
</tr>
</table>

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
            <option value='wr_1'>회사명</option>
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