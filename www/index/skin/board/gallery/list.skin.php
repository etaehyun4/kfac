<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 제목길이 잘 맞추세요.
$thumb_width = '100';  //썸네일 폭
$thumb_height = '80'; //썸네일 높이
$thumb_quality = '100'; //썸네일 퀄리티_100 이하

if (!function_exists("imagecopyresampled")) alert("GD 2.0.1 이상 버전이 설치되어 있어야 사용할 수 있는 갤러리 게시판 입니다."); 

$data_path = $g4[path]."/data/file/$bo_table";
$thumb_path = $data_path.'/thumb';

@mkdir($thumb_path, 0707);
@chmod($thumb_path, 0707);

$mod = $board[bo_gallery_cols];
$td_width = (int)(100 / $mod);

// 선택옵션으로 인해 셀합치기가 가변적으로 변함
$colspan = 5;
if ($is_category) $colspan++;
if ($is_checkbox) $colspan++;
if ($is_good) $colspan++;
if ($is_nogood) $colspan++;

// 제목이 두줄로 표시되는 경우 이 코드를 사용해 보세요.
// <nobr style='display:block; overflow:hidden; width:000px;'>제목</nobr>

/*
$tmp_bo_table = "cm_gallery_request";
$tmp_write_table = $g4[write_prefix] . $tmp_bo_table;
$sql = " select wr_id, wr_subject from $tmp_write_table where wr_is_comment = 0 and wr_comment = 0 order by wr_id desc ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++)
{
    echo "<div align=center><a href='$g4[bbs_path]/board.php?bo_table=$tmp_bo_table&wr_id=$row[wr_id]'><span style='height:18px; color:crimson; cursor:pointer;'>★ 이미지 요청 : $row[wr_subject] ★</span></a></div><br>";
}
*/
?>

<style type="text/css">
<!--
.data  { font-family:돋움; font-size:8pt; color:#999999; }
-->
</style>
<!-- 
    1 ) Reference to the file containing the javascript. 
    This file must be located on your server. 
-->

<script type="text/javascript" src="<?=$board_skin_path?>/highslide/highslide.js"></script>


<!-- 
    2) Initialize the hs object and optionally override the settings defined at the top
    of the highslide.js file. The parameter hs.graphicsDir is important!
-->

<script type="text/javascript">    
    hs.graphicsDir = '<?=$board_skin_path?>/highslide/graphics/';
    
    // Identify a caption for all images. This can also be set inline for each image.
    hs.captionId = 'the-caption';
    
    hs.outlineType = 'rounded-white';
    window.onload = function() {
        hs.preloadImages(5);
    }
</script>


<!-- 
    3) These CSS-styles are necessary for the script to work. You may also put
    them in an external CSS-file. See the webpage for documentation.
-->

<style type="text/css">
.highslide {
	cursor: url(<?=$board_skin_path?>/highslide/graphics/zoomin.cur), pointer;
    outline: none;
}
.highslide img {
	border: 0px solid gray;
}
.highslide:hover img {
	border: 2px solid white;
}

.highslide-image {
    border: 2px solid white;
}
.highslide-image-blur {
}
.highslide-caption {
    display: none;
    
    border: 2px solid white;
    border-top: none;
    font-family: Verdana, Helvetica;
    font-size: 10pt;
    padding: 5px;
    background-color: white;
}
.highslide-loading {
    display: block;
	color: white;
	font-size: 9px;
	font-weight: bold;
	text-transform: uppercase;
    text-decoration: none;
	padding: 3px;
	border-top: 1px solid white;
	border-bottom: 1px solid white;
    background-color: black;
    /*
    padding-left: 22px;
    background-image: url(highslide/graphics/loader.gif);
    background-repeat: no-repeat;
    background-position: 3px 1px;
    */
}
a.highslide-credits,
a.highslide-credits i {
    padding: 2px;
    color: silver;
    text-decoration: none;
	font-size: 10px;
}
a.highslide-credits:hover,
a.highslide-credits:hover i {
    color: white;
    background-color: gray;
}

.highslide-move {
    cursor: move;
}
.highslide-display-block {
    display: block;
}
.highslide-display-none {
    display: none;
}
.control {
	float: right;
    display: block;
    position: relative;
	margin: 0 5px;
	font-size: 9pt;
    font-weight: none;
	text-decoration: none;
	text-transform: uppercase;
    margin-top: 1px;
    margin-bottom: 1px;
}
.control:hover {
    border-top: 0px solid #333;
    border-bottom: 1px solid #333;
    margin-top: 0;
    margin-bottom: 0;
}
.control, .control * {
	color: #666;
}
</style>

</head>
<!-- 게시판 목록 시작 -->
<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
<!--
<table width="100%" cellspacing="0" cellpadding="0">
<tr height="25">
    <? if ($is_category) { ?><form name="fcategory" method="get"><td width="50%"><select name=sca onchange="location='<?=$category_location?>'+this.value;"><option value=''>전체</option><?=$category_option?></select></td></form><? } ?>
    <td align="right">
        <span style='font:normal 11px tahoma; color:#BABABA;'>게시물 <?=number_format($total_count)?>건</span>
        <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border=0 align=absmiddle></a><?}?>
        <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/admin_button.gif" title="관리자" width="63" height="22" border="0" align="absmiddle"></a><?}?></td>
</tr>
<tr><td height=5></td></tr>
</table>
-->
<!-- 분류 셀렉트 박스, 게시물 몇건, 관리자화면 링크 -->
   <? if ($is_category) { ?>
   <table width="100%" border="0" cellspacing="0" cellpadding="0">
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
	  </td>
	</tr>
   </table>
<? } ?>
<form name="fboardlist" method="post" style="margin:0px;">
<input type="hidden" name="bo_table" value="<?=$bo_table?>">
<input type="hidden" name="sfl"  value="<?=$sfl?>">
<input type="hidden" name="stx"  value="<?=$stx?>">
<input type="hidden" name="spt"  value="<?=$spt?>">
<input type="hidden" name="page" value="<?=$page?>">
<input type="hidden" name="sw"   value="">
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td colspan='<?=$mod?>' height=2 bgcolor=#0A7299></td></tr>
<tr><td colspan='<?=$mod?>' height=25></td></tr>
<tr> 
<? 
for ($i=0; $i<count($list); $i++) 
{ 
    if ($i && $i%$mod==0) 
    echo "</tr><tr><td colspan='{$mod}' height=20></td></tr><tr>"; 
    $img = "<img src='$board_skin_path/img/noimage.gif' border=0 title='이미지 없음'>";
	$image = $list[$i][file][0][file];
    //$thumb = $thumb_path.'/'.$list[$i][wr_id]; 
    $thumb = $thumb_path.'/'.$list[$i][file][0][file]; 
    if (!file_exists($thumb)) 
    { 
        $file = $list[$i][file][0][path] .'/'. $list[$i][file][0][file]; 
        if (preg_match("/\.(jp[e]?g|gif|png)$/i", $file) && file_exists($file)) 
        { 
            $size = @getimagesize($file); 
            if ($size[2] == 1) 
                $src = imagecreatefromgif($file); 
            else if ($size[2] == 2) 
                $src = imagecreatefromjpeg($file); 
            else if ($size[2] == 3) 
                $src = imagecreatefrompng($file); 
            else 
                continue; 

            $rate = $thumb_width / $size[0]; 
            $height = (int)($size[1] * $rate); 

            if ($height < $thumb_height) 
                $dst = imagecreatetruecolor($thumb_width, $height); 
            else 
                $dst = imagecreatetruecolor($thumb_width, $thumb_height); 
            /*imagecopyresampled($dst, $src, 0, 0, 0, 0, $thumb_width, $height, $size[0], $size[1]); 
            imagejpeg($dst, $thumb_path.'/'.$list[$i][file][0][file], $thumb_quality); 
            chmod($thumb_path.'/'.$list[$i][file][0][file], 0606);*/

			imagecopyresampled($dst, $src, 0, 0, 0, 0, $thumb_width, $height, $size[0], $size[1]);
			imagejpeg($dst, $thumb_path.'/'.$list[$i][file][0][file], $thumb_quality);
			chmod($thumb_path.'/'.$list[$i][file][0][file], 0606);
			imagejpeg($dst, $thumb_path.'/'.$list[$i][wr_id], $thumb_quality);
			chmod($thumb_path.'/'.$list[$i][wr_id], 0606);
		}
	}

   if (file_exists($thumb) && $list[$i][file][0][file]) {
			 $img = "<a href='$g4[path]/data/file/$bo_table/$image') class='highslide' onclick='return hs.expand(this)' ><img src='{$thumb}' width='{$thumb_width}' height='{$thumb_height}' border=0 style='border:0px solid #999999;'></a>";
		} else {
			preg_match("`<\s*img\s+src\s*=\s*['|\"]?([^'|\"\s]+://[^'|\"\s]+\.(gif|jpe?g|png))['|\"]?\s*[^>]+`i", $list[$i]['wr_content'], $images);

			if (!empty($images[1])) {
				$img_size = GetImageSize("$images[1]");
				if($img_size[0] >= $img_size[1]) {
					$imgper = $thumb_width/$img_size[0];
					$thumb_height = $img_size[1]*$imgper;
				}else{
					$imgper = $thumb_height/$img_size[1];
					$thumb_width = $img_size[0]*$imgper;
				}

				$img = "<a href='$g4[path]/data/file/$bo_table/$image') class='highslide' onclick='return hs.expand(this)' ><img src='{$images[1]}' width='{$thumb_width}' height='{$thumb_height}' align='absmiddle' border='0'></a>";
			} else {
				echo "";
			}
		}

    $style = "";
    if ($list[$i][icon_new])
        $style = " style='font-weight:bold;' ";
    $subject = "<a href='{$list[$i][href]}' onfocus='this.blur()'><span $style>".cut_str($list[$i][subject],18)."</span></a>";

    $comment_cnt = "";
    if ($list[$i][comment_cnt]) 
        $comment_cnt = " <a href=\"{$list[$i][comment_href]}\"><span style='font-size:7pt;'>{$list[$i][comment_cnt]}</span></a>";

    $bg = "";  //새글? 
     if ($list[$i][icon_new])
         $bg="thumb_1_2.gif";
      else
         $bg="thumb_1.gif";


    echo "<td width='{$td_width}%' valign=top style='word-break:break-all;'>\n";
    echo "<table width='150' cellpadding='0' cellspacing='0' border='0'>\n";  
    echo "<tr><td height='75' align='center' valign='top' style='padding:2 0 2 0;'><table  border='0' align='center' cellpadding='0' cellspacing='0'><tr><td width='20'><img src='$board_skin_path/img/box_01.gif' width='20' height='16'></td><td  background='$board_skin_path/img/box_03.gif'><img src='$board_skin_path/img/box_02.gif' width='17' height='16'></td><td width='21'><img src='$board_skin_path/img/box_06.gif' width='21' height='16'></td></tr><tr><td valign='top' background='$board_skin_path/img/box_12.gif'><img src='$board_skin_path/img/box_07.gif' width='20' height='20'></td><td>$img</td><td valign='bottom' background='$board_skin_path/img/box_10.gif'><img src='$board_skin_path/img/box_14.gif' width='21' height='15'></td></tr><tr><td><img src='$board_skin_path/img/box_15.gif' width='20' height='16'></td><td background='$board_skin_path/img/box_16.gif'><div align='right'><img src='$board_skin_path/img/box_18.gif' width='20' height='16'></div></td><td><img src='$board_skin_path/img/box_19.gif' width='21' height='16'></td></tr></table></td></tr>\n";
	echo "<tr><td align='center'>$subject</td></tr>\n";
	echo "<tr><td class='small' align='center'><span style='color:#aaaaaa;'>{$list[$i][datetime2]}</span>";
	if ($is_checkbox) echo "<input type=checkbox name=chk_wr_id[] value='{$list[$i][wr_id]}'>";
    
    echo "</td></tr>\n";
    echo "</table></td>\n";

}

// 나머지 td
$cnt = $i%$mod;
if ($cnt)
    for ($i=$cnt; $i<$mod; $i++)
        echo "<td width='{$td_width}%'>&nbsp;</td>";
?><div class='highslide-caption' id='the-caption'>
    <a href="#" onclick="return hs.previous(this)" class="control" style="float:left; display: block">이전</a>
	<a href="#" onclick="return hs.next(this)" class="control" style="float:left; display: block; text-align: right; margin-left: 4px">다음</a>
    <a href="#" onclick="return hs.close(this)" class="control">닫기</a>
    <a href="#" class="highslide-move control">화면이동</a>
    <div style="clear:both"></div>
</div>
</tr>
<tr><td colspan='<?=$mod?>' height=20></td></tr>
<tr><td colspan=<?=$mod?> height=1 bgcolor=#E7E7E7></td></tr>

<? if (count($list) == 0) { echo "<tr><td colspan='$mod' height=100 align=center>게시물이 없습니다.</td></tr>"; } ?>
<tr><td colspan=<?=$mod?> bgcolor=#5C86AD height=1>
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
       </select><input name=stx maxlength=15 itemname="검색어" required value='<?=$stx?>' class="ed3" style="width:90px; height:21px;"><select name=sop>
            <option value=and>and</option>
            <option value=or>or</option>
        </select>
        <input type=image src="<?=$board_skin_path?>/img/search_btn.gif" border=0 align=absmiddle></td>
            
        
</tr>
</table>
</form>

</td></tr></table>
<script language="javascript">
function popupImage(imageURL){
imageHandle=open("","popupForImage","toolbar=no,location=no,status=no,manubar=no,scrollbars=no,resizable=no,width=100,height=100,top=0,left=0");
  imageHandle.document.write("<title></title>");
  imageHandle.document.write("<style>");
  imageHandle.document.write("*{margin:0;padding:0;border:0;}");
  imageHandle.document.write("</style>");
  imageHandle.document.write("<img src=\""+imageURL+"\" onload=\"window.resizeTo(this.width+6,this.height+52);\" onclick=\"self.close();\" style=\"cursor:hand;\" title=\"클릭하면 닫힙니다.\">");
}
</script>
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
