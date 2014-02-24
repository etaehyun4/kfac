<? 
if (!defined("_GNUBOARD_")) exit; 

// 상단 타이틀
if($gr_id){
$group_name = $group_name;
}else{
$group_name = '최신게시물';
}
?>
<table align="center" cellpadding="0" cellspacing="0" width="100%">
<!-- tr>
	<td>
		<!--타이틀 시작: 실선 색상을 바꾸려면 215, 215, 215를 고치세요.			
		<table align="center" cellpadding="0" cellspacing="0" width="100%" height="28">
		<tr>
			<td style="border-bottom-width:1px; border-bottom-color:rgb(215,215,215); border-bottom-style:solid;">
				<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<!--타이틀 내의 왼쪽 여백을 늘리시려면 아래의 9를 바꾸세요
					<td width="5" height="100%"></td>
					<!--타이틀 아이콘 : #0E6EB6, #56A0D5, #7ABAE4 를 진한 색 순서대로 수정하세요. 
					<td height="100%" valign="middle" width="3">
						<table cellpadding=0 cellspacing=0 width=3 height=12>
						<tr><td height=5 bgcolor=#86cc35></td></tr>
						<tr><td height=3 bgcolor=#69ae00></td></tr>
						<tr><td height=4 bgcolor=#697957></td></tr>
						</table>
					</td>
					<td height="100%" valign="middle">
						&nbsp;&nbsp;<font color="#57697c">그룹 :<b><?=$group_name?></b></font>
					</td>
					<td width="38" valign="middle"><img src="<?=$latest_skin_path?>/img/more.gif" border="0"></td>
					<!--타이틀 내의 오른쪽 여백을 늘리시려면 아래의 12를 바꾸세요
					<td width="9" height="100%"></td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
		<!--타이틀 끝-
	</td>
</tr -->
<tr>
	<td>
		<table align="center" cellpadding="0" cellspacing="0" width="100%">
		<? for ($k=0; $k<count($list); $k++) {?>
        <tr>
			<!--게시물 아래 점선 색상을 바꾸고 싶으시면 211,211,211부분을, 게시물 추출부분 세로 길이를 늘리시려면 25을 수정하세요style="border-bottom-width:1px; border-bottom-color:rgb(211,211,211); border-bottom-style:dotted;"-->
			<td width="100%" height="20" valign=middle>
				<!--게시물 추출 글자 설정 시작 : 첫번째 줄은 '-' 색, 세번째 줄은 코멘트 색, 네번째 줄은 날짜색입니다-->
				&nbsp;<img src='<?=$latest_skin_path?>/img/box02_bullet.gif' align=absmiddle>&nbsp;
				<!--<span style="font-size:9pt;color:#999999;">[<?=$list[$k][bo_subject]?>]</font> -->
                <a href='<?=$list[$k][href]?>'><span class="th8">
				<?if ($list[$k][is_notice])
					echo "<strong>{$list[$k][subject]}</strong>";
				else
					echo "{$list[$k][subject]}";
				?></span></a>
				<span style="font-size:7pt;font-family:tahoma;color:#7ABAE4;"><?=$list[$k][comment_cnt]?><?=$list[$k][icon_new]?></span>
				<!--게시물 추출 글자 설정 끝-->
			</td>
         </tr>
         <? } ?>
         </table>
	</td>
</tr>
</table>