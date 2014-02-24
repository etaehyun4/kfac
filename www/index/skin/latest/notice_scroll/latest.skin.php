<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
?>
<style type="text/css"> 
DIV,blockquote {line-height:160%;}
</style>  
<script language="javascript"> 
<!-- 
//Math.random() 

    var scrollerheight=20; // 스크롤러의 세로 
    var html,total_area=0,wait_flag=true; 
     
    var bMouseOver = 1; 
    var scrollspeed = 1; // Scrolling 속도 
    var waitingtime = 4000; // 멈추는 시간 
    var s_tmp = 0, s_amount = 20; 
    var scroll_content=new Array(); 
    var startPanel=0, n_panel=0, i=0; 
     
    function startscroll() 
    { // 스크롤 시작 
        i=0; 
        for (i in scroll_content) 
            n_panel++; 
             
        n_panel = n_panel -1 ; 
        startPanel = Math.round(Math.random()*n_panel); 
        if(startPanel == 0) 
        { 
            i=0; 
            for (i in scroll_content) 
                insert_area(total_area, total_area++); 
        } 
        else if(startPanel == n_panel) 
        { 
            insert_area(startPanel, total_area); 
            total_area++; 
            for (i=0; i<startPanel; i++) 
            { 
                insert_area(i, total_area); 
                total_area++; 
            } 
        } 
        else if((startPanel > 0) || (startPanel < n_panel)) 
        { 
            insert_area(startPanel, total_area); 
            total_area++; 
            for (i=startPanel+1; i<=n_panel; i++) 
            { 
                insert_area(i, total_area); 
                total_area++; 
            } 
            for (i=0; i<startPanel; i++) 
            { 
                insert_area(i, total_area);
                total_area++; 
            } 
        } 
        window.setTimeout("scrolling()",waitingtime); 
    } 
    function scrolling(){ // 실제로 스크롤 하는 부분 
        if (bMouseOver && wait_flag) 
        { 
            for (i=0;i<total_area;i++){ 
                tmp = document.getElementById('scroll_area'+i).style; 
                tmp.top = parseInt(tmp.top)-scrollspeed; 
                if (parseInt(tmp.top) <= -scrollerheight){ 
                    tmp.top = scrollerheight*(total_area-1); 
                } 
                if (s_tmp++ > (s_amount-1)*scroll_content.length){ 
                    wait_flag=false; 
                    window.setTimeout("wait_flag=true;s_tmp=0;",waitingtime); 
                } 
            } 
        } 
        window.setTimeout("scrolling()",1); 
    } 
    function insert_area(idx, n){  
        html='<div style="left: 0px; width: 100%; position: absolute; top: '+(scrollerheight*n)+'px" id="scroll_area'+n+'">\n'; 
        html+=scroll_content[idx]+'\n'; 
        html+='</div>\n'; 
        document.write(html); 
    } 

    // 스크롤러에 들어갈 내용들을 태그와 함께 넣어 줍니다 
<?
        
    //$rows = "10"; // 자료가 숫자보다 작으면 안됩니다. - 숫자변경은 10이상 5의 배수로 하세요
    
    $sql = " select *
              from {$g4[write_prefix]}{$bo_table}
              where wr_comment >= 0
              order by wr_id desc limit 0, $rows ";
	$result = sql_query($sql);

	$i = 0;$j = 0; 

	while($row = mysql_fetch_array($result)) {

	        $list[i] = $row;
	    
	        $list[i][subject]=stripslashes(cut_str($row[wr_subject], 150)); //제목 글자수자르기
	        
	        if($row[wr_datetime] >= date("Y-m-d H:i:s", time() - 24 * 3600)) {//새글표시---제목색상변경
            
                 $subject = "<b>{$list[i][subject]}</b>";
            
                 } else {
            
                 $subject = $list[i][subject]; //새글이 아닐경우 그냥 나타남
            }
            
	        $date1 = substr($list[$i][datetime],0,10); //날짜표시형식변경

	        $date = explode("-", $date1); 

            $year = $date[0];

            $month = $date[1]; 

            $day = $date[2]; 

            $latest_date = $month."월".$day."일";
	        
             if($i==0) { 
            echo "scroll_content[".$j."]=\""; 
        } 
            echo "<a href='$g4[bbs_path]/board.php?bo_table=$board[bo_table]&wr_id=$row[wr_id]' target='main'>&nbsp;{$subject}</a><br>"; 
        $i++; 
        if($i==1) { 
            echo "\";\n\t"; 
            $i = 0; $j++; 
        } 
    } 
    ?> 

//--> <font color=#aaaaaa>[$latest_date]</font>
</script>	

			<table cellpadding="0" cellspacing="0" width="500" border="0" align="center">
				<!--tr height="7">
					<td width="7" background="<?=$latest_skin_path?>/img/line_mid_p1.gif"></td>
					<td width="486" background="<?=$latest_skin_path?>/img/line_mid_p5.gif"></td>
					<td width="7" background="<?=$latest_skin_path?>/img/line_mid_p2.gif"></td>
				</tr-->
				<tr height="7">
					<!-- td width="7" background="<?=$latest_skin_path?>/img/line_mid_p8.gif"></td-->
					<td width="486">
					
					<table width="486" height="19" border="0" cellpadding="0" cellspacing="0">
						<tr>
							<td width="66" style='padding-top:4px;padding-left:5px;'><b><font color="#cc7777">공지사항</font></b>&nbsp;&nbsp;:</td>                   
							<td width="420" valign='top' style='padding-top:1px;'><div style="position: absolute; width: 420px; height: 18px; overflow:hidden;" onMouseover="bMouseOver=0" onMouseout="bMouseOver=1" id="scroll_image">
							<script>startscroll();</script>
							</div>
							</td>
						</tr>
					</table>
			
					</td>
					<!--td width="7" background="<?=$latest_skin_path?>/img/line_mid_p6.gif"></td-->
				</tr>
				<!--tr height="7">
					<td width="7" background="<?=$latest_skin_path?>/img/line_mid_p4.gif"></td>
					<td width="486" background="<?=$latest_skin_path?>/img/line_mid_p7.gif"></td>
					<td width="7" background="<?=$latest_skin_path?>/img/line_mid_p3.gif"></td>
				</tr-->
				<tr height="10">
					<td colspan="3"></td>
				</tr>
			</table>
            
