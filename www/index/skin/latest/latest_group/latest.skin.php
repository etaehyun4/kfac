<? 
if (!defined("_GNUBOARD_")) exit; 

// ��� Ÿ��Ʋ
if($gr_id){
$group_name = $group_name;
}else{
$group_name = '�ֽŰԽù�';
}
?>
<table align="center" cellpadding="0" cellspacing="0" width="100%">
<!-- tr>
	<td>
		<!--Ÿ��Ʋ ����: �Ǽ� ������ �ٲٷ��� 215, 215, 215�� ��ġ����.			
		<table align="center" cellpadding="0" cellspacing="0" width="100%" height="28">
		<tr>
			<td style="border-bottom-width:1px; border-bottom-color:rgb(215,215,215); border-bottom-style:solid;">
				<table cellpadding="0" cellspacing="0" width="100%">
				<tr>
					<!--Ÿ��Ʋ ���� ���� ������ �ø��÷��� �Ʒ��� 9�� �ٲټ���
					<td width="5" height="100%"></td>
					<!--Ÿ��Ʋ ������ : #0E6EB6, #56A0D5, #7ABAE4 �� ���� �� ������� �����ϼ���. 
					<td height="100%" valign="middle" width="3">
						<table cellpadding=0 cellspacing=0 width=3 height=12>
						<tr><td height=5 bgcolor=#86cc35></td></tr>
						<tr><td height=3 bgcolor=#69ae00></td></tr>
						<tr><td height=4 bgcolor=#697957></td></tr>
						</table>
					</td>
					<td height="100%" valign="middle">
						&nbsp;&nbsp;<font color="#57697c">�׷� :<b><?=$group_name?></b></font>
					</td>
					<td width="38" valign="middle"><img src="<?=$latest_skin_path?>/img/more.gif" border="0"></td>
					<!--Ÿ��Ʋ ���� ������ ������ �ø��÷��� �Ʒ��� 12�� �ٲټ���
					<td width="9" height="100%"></td>
				</tr>
				</table>
			</td>
		</tr>
		</table>
		<!--Ÿ��Ʋ ��-
	</td>
</tr -->
<tr>
	<td>
		<table align="center" cellpadding="0" cellspacing="0" width="100%">
		<? for ($k=0; $k<count($list); $k++) {?>
        <tr>
			<!--�Խù� �Ʒ� ���� ������ �ٲٰ� �����ø� 211,211,211�κ���, �Խù� ����κ� ���� ���̸� �ø��÷��� 25�� �����ϼ���style="border-bottom-width:1px; border-bottom-color:rgb(211,211,211); border-bottom-style:dotted;"-->
			<td width="100%" height="20" valign=middle>
				<!--�Խù� ���� ���� ���� ���� : ù��° ���� '-' ��, ����° ���� �ڸ�Ʈ ��, �׹�° ���� ��¥���Դϴ�-->
				&nbsp;<img src='<?=$latest_skin_path?>/img/box02_bullet.gif' align=absmiddle>&nbsp;
				<!--<span style="font-size:9pt;color:#999999;">[<?=$list[$k][bo_subject]?>]</font> -->
                <a href='<?=$list[$k][href]?>'><span class="th8">
				<?if ($list[$k][is_notice])
					echo "<strong>{$list[$k][subject]}</strong>";
				else
					echo "{$list[$k][subject]}";
				?></span></a>
				<span style="font-size:7pt;font-family:tahoma;color:#7ABAE4;"><?=$list[$k][comment_cnt]?><?=$list[$k][icon_new]?></span>
				<!--�Խù� ���� ���� ���� ��-->
			</td>
         </tr>
         <? } ?>
         </table>
	</td>
</tr>
</table>