<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

if($member[mb_level] <= 7) { 
alert("접근권한이 없습니다.", $g4[path]); 
}


$ex9_filed = explode("|",$view[wr_9]); //전화 및 답변방법
$tel = $ex9_filed[0] ."-". $ex9_filed[1] ."-".$ex9_filed[2];
$h_tel = $ex9_filed[3] ."-". $ex9_filed[4] ."-".$ex9_filed[5];

$my_mail = cut_str(get_text($ex9_filed[6]), 70);

$ext9_07   =   $ex9_filed[7];
$ext9_08   =   $ex9_filed[8];
$ext9_09   =   $ex9_filed[9];

$ex10_filed =   explode("|",$view[wr_10]); //주소부분
$add_no = $ex10_filed[0] ."-". $ex10_filed[1];
$add = $ex10_filed[2] ." ". $ex10_filed[3];


$home_v = cut_str(get_text($view[wr_7]), 30);

?>

<table width="<?=$width?>" align="center" cellpadding="0" cellspacing="0"><tr><td>

<? 
ob_start(); 
?>
<table width='100%' cellpadding=0 cellspacing=0>
<tr height=35>
    <td width=75%>
        <? if ($search_href) { echo "<a href=\"$search_href\"><img src='$board_skin_path/img/btn_search_list.gif' border='0' align='absmiddle'></a> "; } ?>
        <? echo "<a href=\"$list_href\"><img src='$board_skin_path/img/btn_list.gif' border='0' align='absmiddle'></a> "; ?>

        <? if ($update_href) { echo "<a href=\"$update_href\"><img src='$board_skin_path/img/btn_update.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($delete_href) { echo "<a href=\"$delete_href\"><img src='$board_skin_path/img/btn_delete.gif' border='0' align='absmiddle'></a> "; } ?>

        <? if ($copy_href) { echo "<a href=\"$copy_href\"><img src='$board_skin_path/img/btn_copy.gif' border='0' align='absmiddle'></a> "; } ?>
        <? if ($move_href) { echo "<a href=\"$move_href\"><img src='$board_skin_path/img/btn_move.gif' border='0' align='absmiddle'></a> "; } ?>
    </td>
    <td width=25% align=right>
        <? if ($prev_href) { echo "<a href=\"$prev_href\" title=\"$prev_wr_subject\"><img src='$board_skin_path/img/btn_prev.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
        <? if ($next_href) { echo "<a href=\"$next_href\" title=\"$next_wr_subject\"><img src='$board_skin_path/img/btn_next.gif' border='0' align='absmiddle'></a>&nbsp;"; } ?>
    </td>
</tr>
</table>
<?
$link_buttons = ob_get_contents();
ob_end_flush();
?>

<table width="100%" cellspacing="0" cellpadding="0">
<tr><td height=2 colspan=3 bgcolor=#B0ADF5></td></tr> 
<tr><td width="120" height=30 bgcolor=#F8F8F9 style="padding:5 0 5 15;">제목 (상태)</td>
    <td>&nbsp;&nbsp;<strong><? if ($is_category) { echo ($category_name ? "[$view[ca_name]] " : ""); } ?><?=$view[subject]?></strong>
	( <?
	if($view[wr_8] == "답변전" || $view[wr_8]=="")  echo "<font color=#FF8000>답변전</font>";
	if($view[wr_8] == "답변중")  echo "<font color=#8080FF>답변중</font>";
	if($view[wr_8] == "완료")  echo "<font color=#C0C0C0>완료</font>";
	?>)
	</td>
	<td><? if($view[wr_7])  echo "Homepage : <a href='http://{$view[wr_7]}' target='_blank' title='{$view[wr_7]}'>{$home_v}</a>"; ?></td>
</tr>
<!--<tr><td colspan=3 height=1 bgcolor=#E7E7E7></td></tr>
<tr><td height=30 bgcolor=#f8f8f9 style='padding-left:15px;'>회사명/이름</td>
    <td>&nbsp;&nbsp; <?=$view[wr_1]?> / <?=$view[wr_name]?></td>
	<td><font color=#7A8FDB>날짜</font> : <?=substr($view[wr_datetime],2,14)?></td>
</tr>-->
<tr><td colspan=3 height=1 bgcolor=#E7E7E7></td></tr>
<tr><td height=30 bgcolor=#f8f8f9 style='padding-left:15px;'>답변방법</td>
    <td colspan=2>&nbsp;&nbsp; <?=$ext9_07?> &nbsp;<?=$ext9_08?> &nbsp;<?=$ext9_09?></td>
</tr>
<tr><td colspan=3 height=1 bgcolor=#E7E7E7></td></tr>
<tr><td height=30 bgcolor=#f8f8f9 style='padding-left:15px;'>연락처</td>
    <td colspan=2 style="padding:3;">
	<?
		if($ex9_filed[2]) echo "&nbsp; 전화 : {$tel}";
		if($ex9_filed[5]) echo "<br>&nbsp; 휴대 : {$h_tel}";
		if($my_mail) echo "<br>&nbsp; 메일 : <a href='mailto:{$my_mail}' title='{$ex9_filed[6]}'>{$my_mail}</a>";
		?>
	</td>
</tr>
<tr><td colspan=3 height=1 bgcolor=#E7E7E7></td></tr>
<!--
<tr><td height=30 bgcolor=#f8f8f9 style='padding-left:15px;'>주소</td>
    <td colspan=2 style="padding:3;">&nbsp; 
	<?
	if($ex10_filed[0]) echo "{$add_no}"; 
    if($ex10_filed[2]) echo "<br>&nbsp; {$add}"; 
	?></td>
</tr>

<tr><td colspan=3 height=1 bgcolor=#E7E7E7></td></tr>-->
</table>
<div style="height:20px;"></div>
<table width=100% cellspacing=0 cellpadding=0>
<tr> 
    <td height="150" style='word-break:break-all; padding:10px; border:1px solid #BBBBBB;' bgcolor=#F8F8F9>
       <div style="overflow-x:hidden; width:'100%'; height:; padding:0px; ">
        <? 
        // 파일 출력
        for ($i=0; $i<=count($view[file]); $i++) {
            if ($view[file][$i][view]) 
                echo $view[file][$i][view] . "<p>";
        }
        ?>

        <span class="ct lh"><?=$view[content];?></span>
        
        <?//echo $view[rich_content]; // {이미지:0} 과 같은 코드를 사용할 경우?>
        <!-- 테러 태그 방지용 --></xml></xmp><a href=""></a><a href=''></a></div></td>
</tr>
</table><br>

<?
include_once("./view_comment.php");
?>

<?=$link_buttons?>

</td></tr></table><br>

<script language="JavaScript">
// HTML 로 넘어온 <img ... > 태그의 폭이 테이블폭보다 크다면 테이블폭을 적용한다.
function resize_image()
{
    var target = document.getElementsByName('target_resize_image[]');
    var image_width = parseInt('<?=$width-20?>');
    var image_height = 0;

    for(i=0; i<target.length; i++) { 
        // 원래 사이즈를 저장해 놓는다
        target[i].tmp_width  = target[i].width;
        target[i].tmp_height = target[i].height;
        // 이미지 폭이 테이블 폭보다 크다면 테이블폭에 맞춘다
        if(target[i].width > image_width) {
            image_height = parseFloat(target[i].width / target[i].height)
            target[i].width = image_width;
            target[i].height = parseInt(image_width / image_height);
        }
    }
}

window.onload = resize_image;

</script>