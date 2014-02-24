<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
$sliderwidth=330;// 스크롤러의 가로크기 
$img_width=120 ;// 이미지의 폭
$img_height=100 ;// 이미지의 높이
$sliderheight=120 ;// 스크롤러의 높이 ; 이미지높이보다 조금 길게
$slidespeed=1 ;// 스크롤 속도 (클수록 빠릅니다 1-10) 
$slidebgcolor="#FFFFDD" ;// 배경색상 
?>
<table width="<?=$sliderwidth?>" cellpadding=0 cellspacing=0 border=0>
<!--<tr>
    <td >&nbsp;&nbsp;<strong><a href='<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>'>[<?=$board[bo_subject]?>]</a></strong></td>
    <td align="right"><a href='<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>'><img src='<?=$latest_skin_path?>/img/more.gif' border=0></a></td>
</tr>-->
</table>


<table cellpadding=0 cellspacing=0>
<tr><td bgcolor=yellow>
<script language="JavaScript1.2"> 
var sliderwidth=<?=$sliderwidth?>;
var sliderheight=<?=$sliderheight?> ;
var slidespeed=<?=$slidespeed?>;
slidebgcolor="<?=$slidebgcolor?>";
var leftrightslide=new Array() 
var finalslide='' 
<?
echo "leftrightslide[0]=\"<table border=0 cellpadding=0 cellspacing=0><tr>\";"."\r";
$c_cnt=0;
 for ($i=0; $i<count($list); $i++) {  //@@@@@@@@@@@@@@@@@@@@@@@
$c_cnt=$c_cnt+1;

$data_temp ="";
    $title = get_text($list[$i][wr_subject]);
    $content = cut_str(get_text($list[$i][wr_content]), 80);
    $img = "$g4[path]/data/file/$bo_table/thumb/".urlencode($list[$i][file][0][file]);
    if (!file_exists($img) || !$list[$i][file][0][file])
       $img = "$latest_skin_path/img/no_image.gif";
    $href = "$g4[bbs_path]/board.php?bo_table=$bo_table";
$img="<img src='".$img."' width='".$img_width."' height='".$img_height."' border='0' align='absmiddle' title='".$title."'>";

$data_temp ="";
$data_temp .="leftrightslide[".$c_cnt."]=\"";
$data_temp .="<td style='padding-left:5pt;padding-right:5pt;'>";
$data_temp .="<TABLE cellSpacing=1 cellPadding=0  bgColor=#e0e0e0 border=0><TR><TD> <TABLE cellSpacing=3 cellPadding=0  bgColor=#f0f0f0 border=0><TR><TD align=middle bgColor=#ffffff >";  //테두리선

//실제내용시작
$data_temp .="<table border=0 cellpadding=0 cellspacing=0><tr><td  align=center ><a href='$g4[bbs_path]/board.php?bo_table=$bo_table&wr_id={$list[$i][wr_id]}'>{$img}</a></td></tr><tr><td align=center><a href='$g4[bbs_path]/board.php?bo_table=$bo_table&wr_id={$list[$i][wr_id]}'>{$list[$i][subject]}</a> {$list[$i][icon_new]}</td></tr></table>";
//실제내용끝

$data_temp .="</td></tr></table></td></tr></table>"; //테두리선
$data_temp .="</td>";
$data_temp .="\";"."\r";
echo $data_temp ;
}//@@@@@@@@@@@@@@@@@@@
echo "leftrightslide[".($c_cnt+1)."]=\"</tr></table>\";";
?>

var copyspeed=slidespeed 
leftrightslide='<nobr>'+leftrightslide.join(" ")+'</nobr>' 
var iedom=document.all||document.getElementById 
if (iedom) 
document.write('<span id="temp" style="visibility:hidden;position:absolute;top:-100;left:-1000">'+leftrightslide+'</span>') 
var actualwidth='0' ;
var cross_slide, ns_slide 
function fillup(){ 
if (iedom){ 
cross_slide=document.getElementById? document.getElementById("test2") : document.all.test2 
cross_slide2=document.getElementById? document.getElementById("test3") : document.all.test3 
cross_slide.innerHTML=cross_slide2.innerHTML=leftrightslide 
actualwidth=document.all? cross_slide.offsetWidth : document.getElementById("temp").offsetWidth 
cross_slide2.style.left=actualwidth+0 
} 
else if (document.layers){ 
ns_slide=document.ns_slidemenu.document.ns_slidemenu2 
ns_slide2=document.ns_slidemenu.document.ns_slidemenu3 
ns_slide.document.write(leftrightslide) 
ns_slide.document.close() 
actualwidth=ns_slide.document.width 
ns_slide2.left=actualwidth+0 
ns_slide2.document.write(leftrightslide) 
ns_slide2.document.close() 
} 
lefttime=setInterval("slideleft()",40) 
} 
window.onload=fillup 
function slideleft(){ 
if (iedom){ 
if (parseInt(cross_slide.style.left)>(actualwidth*(-1)+8)) 
cross_slide.style.left=parseInt(cross_slide.style.left)-copyspeed 
else 
cross_slide.style.left=parseInt(cross_slide2.style.left)+actualwidth+0 
if (parseInt(cross_slide2.style.left)>(actualwidth*(-1)+8)) 
cross_slide2.style.left=parseInt(cross_slide2.style.left)-copyspeed 
else 
cross_slide2.style.left=parseInt(cross_slide.style.left)+actualwidth+0 
} 
else if (document.layers){ 
if (ns_slide.left>(actualwidth*(-1)+8)) 
ns_slide.left-=copyspeed 
else 
ns_slide.left=ns_slide2.left+actualwidth+0 
if (ns_slide2.left>(actualwidth*(-1)+8)) 
ns_slide2.left-=copyspeed 
else 
ns_slide2.left=ns_slide.left+actualwidth+0 
} 
} 

if (iedom||document.layers){ 
with (document){ 
document.write('<table border="0" cellspacing="0" cellpadding="0"><td>') 
if (iedom){ 
write('<div style="position:relative;width:'+sliderwidth+';height:'+sliderheight+';overflow:hidden">') 
write('<div style="position:absolute;width:'+sliderwidth+';height:'+sliderheight+';background-color:'+slidebgcolor+'" onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed">') 
write('<div id="test2" style="position:absolute;left:0;top:0;width:'+sliderwidth+';height:'+sliderheight+';"></div>') 
write('<div id="test3" style="position:absolute;left:-1000;top:0;width:'+sliderwidth+';height:'+sliderheight+';"></div>') 
write('</div></div>') 
} 
else if (document.layers){ 
write('<ilayer width='+sliderwidth+' height='+sliderheight+' name="ns_slidemenu" bgColor='+slidebgcolor+'>') 
write('<layer name="ns_slidemenu2" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>') 
write('<layer name="ns_slidemenu3" left=0 top=0 onMouseover="copyspeed=0" onMouseout="copyspeed=slidespeed"></layer>') 
write('</ilayer>') 
} 

document.write('</td></table>') 
} 
} 
</script> 
</td></tr>
        </table>