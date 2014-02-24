<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
?>
<script language="javascript">
    var roll_height_s = 145;
    var total_area_s = 0;
    var wait_flag_s = true;

    var bMouseOver_s = 1;
    var roll_speed_s = 1;
    var waitingtime_s = 2000; //스피드
    var s_tmp_s = 0;
    var s_amount_s = 145;
    var roll_text_s = new Array();
    var startPanel_s = 0;
    var n_panel_s = 0;
    var i_s = 0;

    function start_roll_s()
    { 
        i_s = 0;
        for (i_s in roll_text_s)
            n_panel_s++;

        n_panel_s = n_panel_s -1 ;
        startPanel_s = Math.round(Math.random()*n_panel_s);
        if(startPanel_s == 0)
        {
            i_s = 0;
            for (i_s in roll_text_s) 
                insert_area_s(total_area_s, total_area_s++); // area 삽입
        }
        else if(startPanel_s == n_panel_s)
        {
            insert_area_s(startPanel_s, total_area_s);
            total_area_s++;
            for (i_s=0; i_s<startPanel_s; i_s++) 
            {
                insert_area_s(i_s, total_area_s); // area 삽입
                total_area_s++;
            }
        }
        else if((startPanel_s > 0) || (startPanel_s < n_panel_s))
        {
            insert_area_s(startPanel_s, total_area_s);
            total_area_s++;
            for (i_s=startPanel_s+1; i_s<=n_panel_s; i_s++) 
            {
                insert_area_s(i_s, total_area_s); // area 삽입
                total_area_s++;
            }
            for (i_s=0; i_s<startPanel_s; i_s++) 
            {
                insert_area_s(i_s, total_area_s); // area 삽입
                total_area_s++;
            }
        }
        if ( navigator.appName == "Microsoft Internet Explorer" )
        {
            if ( navigator.appVersion.indexOf ( "MSIE 4" ) > -1 )
            return ;
        }
        window.setTimeout("rolling_s()",waitingtime_s);
    }

    function rolling_s()
    { 
        if (bMouseOver_s && wait_flag_s)
        {
            for (i_s=0;i_s<total_area_s;i_s++){
                tmp_s = document.getElementById('scroll_area_s'+i_s).style;
                tmp_s.top = parseInt(tmp_s.top)-roll_speed_s;
                if (parseInt(tmp_s.top) <= -roll_height_s){
                    tmp_s.top = roll_height_s*(total_area_s-1);
                }
                if (s_tmp_s++ > (s_amount_s-1)*roll_text_s.length){
                    wait_flag_s=false;
                    window.setTimeout("wait_flag_s=true;s_tmp_s=0;",waitingtime_s);
                }
            }
        }
        window.setTimeout("rolling_s()", 1);
    }

    function insert_area_s(idx_s, n_s)
    { 
        document.write('<div style="left: 0px; width: 100%; position: absolute; top: '+(roll_height_s*n_s)+'px" id="scroll_area_s'+n_s+'">\n'+roll_text_s[idx_s]+'\n</div>\n');
    }

<?
$java_script = ""; 
for ($i=0; $i<count($list); $i++) { 
$image = urlencode($list[$i][file][0][file]); // 첫번째 파일이 이미지
//$image2 = urlencode($list[$i][file][1][file]); // 두번째 파일이 이미지

$ooo='<table width=100% cellpadding=0 cellspacing=0 border=0><tr><td width=100%><table width=100%  cellpadding=0 cellspacing=0 border=0><tr><td width=50%  align=left><a href='.$list[$i][href].'><img src=\"'."$g4[path]/data/file/$bo_table/$image".'\" width=\"160\" height=\"100\" border=0 align=left></a></td></tr></table></td></tr><tr><td><table border=0 width=100% cellpadding=0 cellspacing=0><tr><td width=100% height=5></td>	</tr><tr ><td width=100% align=left><img src='.$latest_skin_path.'/img/notice_icon2.gif'.' align=absmiddle><font color=#1A50B8>'.$list[$i][subject].'</font></td></tr><tr><td width=100% height=5></td></tr></table></td></tr></table>';

$java_script .= "roll_text_s[$i]='$ooo'\n"; 
} 
echo $java_script;
?>
</script>
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="100%">
	<div style="center: 0px;  position: relative; top: 0px; height: 120px; overflow:hidden;" onMouseover="bMouseOver_s=0" onMouseout="bMouseOver_s=1" id="scroll_image_s">
      <script>
        var no_script_flag_s = false ;
        if ( navigator.appName == "Microsoft Internet Explorer" )
        {
            if ( navigator.appVersion.indexOf ( "MSIE 4" ) > -1 )
            {
                document.write ( roll_text_s[0] ) ;
                no_script_flag_s = true ;
            }
        }
        if ( no_script_flag_s == false )
            start_roll_s();
    </script>
    </div>
	</td>
	</tr>
</table>
