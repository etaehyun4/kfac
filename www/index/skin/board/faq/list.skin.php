<? // ver 4.09.02
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

// ���ÿɼ����� ���� ����ġ�Ⱑ ���������� ����
$colspan = 9;
if ($board[bo_1]) $colspan-=2; // ����������� �۾��� ����
if ($is_category) $colspan+=2;
if ($is_checkbox) $colspan+=2;
if ($is_good) $colspan+=2;
if ($is_nogood) $colspan+=2;

$mod = $board[bo_gallery_cols]; // ���� ī�װ� ����

if (!$board[bo_gallery_cols])
	$mod = 3;	// ���� ī�װ� ����

// ������ ���ٷ� ǥ�õǴ� ��� �� �ڵ带 ����� ������.
// <nobr style='display:block; overflow:hidden; width:000px;'>����</nobr>
?>

<!-- �Խ��� ��� ���� -->
<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>
<!--
<form name=fsearch method=get style='margin:0px;'>    
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=sca      value="<?=$sca?>">
<input type=hidden name=sfl value="wr_subject||wr_content">
<table width="100%" cellpadding="0" cellspacing="1" border="0" style="border:3px #E6E6E6 solid;">
	<tr>
		<td height=34 align=center bgcolor=#F5F5F5><img src='<?=$board_skin_path?>/img/icon_search.gif' align=absmiddle>&nbsp;&nbsp;<input name=stx maxlength=15 itemname="�˻���" required class='ed' value='<?=$stx?>' style='width:300;height:19;'>&nbsp;&nbsp;<input type='image' src='<?=$board_skin_path?>/img/btn_search.gif' align=absmiddle onfocus='this.blur();'></td>
	</tr>
</table>
</form>

<table width="100%" cellpadding="0" cellspacing="0" border="0">
	<tr><td height="10"></td></tr>
	<tr>
		<td align=center bgcolor="#FFFFFF">
			<table width="80%" cellspacing="0" cellpadding="0" border="0">
				<tr>
				<?
			
				$arr = explode("|", $board[bo_category_list]); // �����ڰ� , �� �Ǿ� ����
				
				$td_width = (int)(100 / $mod);

				for ($i=0; $i<count($arr); $i++)
				{
					if ($i && $i%$mod==0)
						echo "</tr><tr>";
	
					if (trim($arr[$i])) {
						echo "<td width='{$td_width}%' style='padding-bottom:5px;'>";
						echo "<img src='$board_skin_path/img/dot_icon01.gif' width=12 height=9><a href='$category_location{$arr[$i]}'>".$arr[$i]."</a>";
						echo "</td>";
					}
				}
				
				$cnt = $i%$mod;
					if ($cnt)
						for ($i=$cnt; $i<$mod; $i++)
						echo "<td width='{$td_width}%'>&nbsp;</td>";
						echo "</tr>";
						
				if (!$board[bo_category_list]) { echo "<tr><td colspan='$mod' height=40 align=center>ī�װ��� �����ϴ�.</td></tr>"; }
			?>

			</table>
		</td>
	</tr>
	<tr><td height="5"></td></tr>
	<tr><td height="1" bgcolor="#E6E6E6"></td></tr>
	<tr><td height="10"></td></tr>
	<? if($sca) { ?>
	<tr><td><img src='<?=$board_skin_path?>/img/t_icon01.gif' width=8 height=19 align=absmiddle> FAQ - <?=$sca?></td></tr>
	<tr><td height="10"></td></tr>
	<? } ?>
</table>
-->
<!-- ���� -->
<form name="fboardlist" method="post" style="margin:0px;">
<input type='hidden' name='bo_table' value='<?=$bo_table?>'>
<input type='hidden' name='sfl'  value='<?=$sfl?>'>
<input type='hidden' name='stx'  value='<?=$stx?>'>
<input type='hidden' name='spt'  value='<?=$spt?>'>
<input type='hidden' name='page' value='<?=$page?>'>
<input type='hidden' name='sw'   value=''>
<table width=100% cellpadding=0 cellspacing=0>
<tr><td colspan=<?=$colspan?> height=2 bgcolor='#D9D9D9'></td></tr>
<tr bgcolor=#F8F8F9 height=30 align=center>
    <td width=50>��ȣ</td>
	<td width="1" align="center" valign="bottom" background="<?=$board_skin_path?>/img/bg_title.gif"><img src="<?=$board_skin_path?>/img/bg_titleline.gif" width="1" height="16"></td>

    <? if ($is_category) { ?>
	<td width=70>�з�</td>
	<td width="1" align="center" valign="bottom" background="<?=$board_skin_path?>/img/bg_title.gif"><img src="<?=$board_skin_path?>/img/bg_titleline.gif" width="1" height="16"></td>
	<?}?>

	<? if ($is_checkbox) { ?>
	<td width=40><INPUT onclick="if (this.checked) all_checked(true); else all_checked(false);" type=checkbox></td>
	<td width="1" align="center" valign="bottom" background="<?=$board_skin_path?>/img/bg_title.gif"><img src="<?=$board_skin_path?>/img/bg_titleline.gif" width="1" height="16"></td>
	<?}?>
    
	<td>����</td>
	<td width="1" align="center" valign="bottom" background="<?=$board_skin_path?>/img/bg_title.gif"><img src="<?=$board_skin_path?>/img/bg_titleline.gif" width="1" height="16"></td>
    <? if (!$board[bo_1]) { ?>
	<td width=100>�۾���</td>
	<td width="1" align="center" valign="bottom" background="<?=$board_skin_path?>/img/bg_title.gif"><img src="<?=$board_skin_path?>/img/bg_titleline.gif" width="1" height="16"></td>
    <?}?>
	<td width=60><?=subject_sort_link('wr_datetime', $qstr2, 1)?>�����</a></td>
	<td width="1" align="center" valign="bottom" background="<?=$board_skin_path?>/img/bg_title.gif"><img src="<?=$board_skin_path?>/img/bg_titleline.gif" width="1" height="16"></td>
    
	<td width=50><?=subject_sort_link('wr_hit', $qstr2, 1)?>��ȸ</a></td>

	<?/*
    <td width=40 title='������ �ڸ�Ʈ �� �ð�'><?=subject_sort_link('wr_last', $qstr2, 1)?>�ֱ�</a></td>
	*/?>

	<? if ($is_good) { ?>
	<td width="1" align="center" valign="bottom" background="<?=$board_skin_path?>/img/bg_title.gif"><img src="<?=$board_skin_path?>/img/bg_titleline.gif" width="1" height="16"></td>
	<td width=40><?=subject_sort_link('wr_good', $qstr2, 1)?>��õ</a></td>
	<?}?>
    
	<? if ($is_nogood) { ?>
	<td width="1" align="center" valign="bottom" background="<?=$board_skin_path?>/img/bg_title.gif"><img src="<?=$board_skin_path?>/img/bg_titleline.gif" width="1" height="16"></td>
	<td width=50><?=subject_sort_link('wr_nogood', $qstr2, 1)?>����õ</a></td>
	<?}?>
</tr>
<tr><td colspan=<?=$colspan?> height=1 bgcolor='#D9D9D9'></td></tr>

<!-- ��� -->
<? for ($i=0; $i<count($list); $i++) { ?>
<tr height=28 align=center> 
    <td>
        <? 
        if ($list[$i][is_notice]) // �������� 
            echo "<img src=\"$board_skin_path/img/notice_icon.gif\" width=30 height=16>";
        else if ($wr_id == $list[$i][wr_id]) // ������ġ
            echo "<font color='#2C8CB9'><strong>{$list[$i][num]}</strong>";
        else
            echo "{$list[$i][num]}";
        ?></td><td width=1></td>
    <? if ($is_category) { ?><td><a href="<?=$list[$i][ca_name_href]?>"><font color=gray><span class=small><?=$list[$i][ca_name]?></span></font></a></td><td width=1></td><? } ?>
    <? if ($is_checkbox) { ?><td><input type=checkbox name=chk_wr_id[] value="<?=$list[$i][wr_id]?>"></td><td width=1></td><? } ?>
    <td align=left style='word-break:break-all;padding-left:10px;'>
        <? 
        echo $nobr_begin;
        echo $list[$i][reply];
        echo $list[$i][icon_reply];
		
		if ($admin_href)
			echo "<a href='{$list[$i][href]}'>";
		else
			echo "<a href='javascript:;' onclick=\"faq_menu('faq$i')\">";

		if ($list[$i][is_notice])
            //echo "<font color='#AF6BE3'><strong>{$list[$i][subject]}</strong></font>";
            echo "<font color='#333333'><strong>{$list[$i][subject]}</strong></font>";
        else
        {
            $style1 = $style2 = "";
            // �ֽű��� ����
            //if ($list[$i][icon_new]) $style1 = "color:#222222;";
            // �ڸ�Ʈ ���°͸� ����
            //if (!$list[$i][comment_cnt]) $style2 = "color:#268800;";
            echo "<span style='$style1 $style2'>{$list[$i][subject]}</span>";
        }
        echo "</a>";

        if ($list[$i][comment_cnt]) 
            echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-size:8pt;color:#ff6600;'>{$list[$i][comment_cnt]}</span></a>";

        // if ($list[$i]['link']['count']) { echo "[{$list[$i]['link']['count']}]"; }
        // if ($list[$i]['file']['count']) { echo "<{$list[$i]['file']['count']}>"; }

        //echo " " . $list[$i][icon_new];
        echo " " . $list[$i][icon_file];
        echo " " . $list[$i][icon_link];
        echo " " . $list[$i][icon_hot];
        echo " " . $list[$i][icon_secret];
        echo $nobr_end;
        ?></td><td width=1></td>
	<? if (!$board[bo_1]) { ?><td><?=$list[$i][name]?></td><td width=1></td><? } ?>
    <td><?=$list[$i][datetime2]?></td><td width=1></td>
    <td><?=$list[$i][wr_hit]?></td>
    <?/*<td><?=$list[$i][last2]?></td><td width=1></td>*/?>
    <? if ($is_good) { ?><td width=1></td><td align="center"><?=$list[$i][wr_good]?></td><? } ?>
    <? if ($is_nogood) { ?><td width=1></td><td align="center"><?=$list[$i][wr_nogood]?></td><? } ?>
</tr>
<tr>
	<td colspan=<?=$colspan?>>
		<div id='faq<?=$i?>' style='display:none;'>
			<table width=100% cellpadding=0 cellspacing=0 border=0 style='border-top:1px dotted #E6E6E6;'>
				<tr>
					<td width=50>&nbsp;</td>
<!--					<td width=70 height=26 align=center><img src='<?=$board_skin_path?>/img/icon_ans.gif'></td>-->
					<td align=left style='padding-left:12px;padding-top:5px;padding-bottom:5px;' class=lh><?=$list[$i]['wr_content']?></td>
				</tr>
			</table>
		</div>
	</td>
</tr>
<tr><td colspan=<?=$colspan?> height=1 bgcolor='#E6E6E6'></td></tr>
<?}?>

<? if (count($list) == 0) { echo "<tr><td colspan='$colspan' height=100 align=center>�Խù��� �����ϴ�.</td></tr>"; } ?>
<tr><td colspan=<?=$colspan?> height=1 bgcolor='#D9D9D9'></td></tr>
</table>
</form>

<!-- ������ -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr> 
    <td width="100%" align="center" height=30 valign=bottom>
        <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/btn_search_prev.gif' border=0 align=absmiddle title='�����˻�'></a>"; } ?>
        <?
        // �⺻���� �Ѿ���� �������� �Ʒ��� ���� ��ȯ�Ͽ� �̹����ε� ����� �� �ֽ��ϴ�.
        //echo $write_pages;
        $write_pages = str_replace("ó��", "<img src='$board_skin_path/img/begin.gif' border='0' align='absmiddle' title='ó��'>", $write_pages);
        $write_pages = str_replace("����", "<img src='$board_skin_path/img/prev.gif' border='0' align='absmiddle' title='����'>", $write_pages);
        $write_pages = str_replace("����", "<img src='$board_skin_path/img/next.gif' border='0' align='absmiddle' title='����'>", $write_pages);
        $write_pages = str_replace("�ǳ�", "<img src='$board_skin_path/img/end.gif' border='0' align='absmiddle' title='�ǳ�'>", $write_pages);
        $write_pages = preg_replace("/<span>([0-9]*)<\/span>/", "<b><font style=\"font-family:����; font-size:9pt; color:#797979\">$1</font></b>", $write_pages);
        $write_pages = preg_replace("/<b>([0-9]*)<\/b>/", "<b><font style=\"font-family:����; font-size:9pt; color:orange;\">$1</font></b>", $write_pages);
        ?>
        <?=$write_pages?>
        <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/btn_search_next.gif' border=0 align=absmiddle title='�����˻�'></a>"; } ?>
    </td>
</tr>
</table>

<!-- ��ũ ��ư, �˻� -->
<table width=100% cellpadding=0 cellspacing=0>
<tr> 
    <td width="50%" height="40">
	       <? if ($write_href) { ?><a href="<?=$write_href?>"><img src="<?=$board_skin_path?>/img/btn_write.gif" border="0" align=absmiddle></a><? } ?>
		<? if ($is_checkbox) { ?>
            <a href="javascript:select_delete();"><img src="<?=$board_skin_path?>/img/btn_select_delete.gif" border="0" align=absmiddle></a>
            <a href="javascript:select_copy('copy');"><img src="<?=$board_skin_path?>/img/btn_select_copy.gif" border="0" align=absmiddle></a>
            <a href="javascript:select_copy('move');"><img src="<?=$board_skin_path?>/img/btn_select_move.gif" border="0" align=absmiddle></a>
        <? } ?>
    </td>
	<td align=right>
		<? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/admin_button.gif" title="������" border="0" align=absmiddle></a><?}?>
	</td>
</tr>
</table><br>

</td></tr></table>

<script language="JavaScript">
//if ('<?=$sca?>') document.fcategory.sca.value = '<?=$sca?>';
if ('<?=$stx?>') {
    document.fsearch.sfl.value = '<?=$sfl?>';
    document.fsearch.sop.value = '<?=$sop?>';
}

var save_faq_id = null;
function faq_menu(id)
{
    if (save_faq_id != null)
        document.getElementById(save_faq_id).style.display = "none";
    menu(id);
    save_faq_id = id;
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
        alert(str + "�� �Խù��� �ϳ� �̻� �����ϼ���.");
        return false;
    }
    return true;
}

// ������ �Խù� ����
function select_delete()
{
    var f = document.fboardlist;

    str = "����";
    if (!check_confirm(str))
        return;

    if (!confirm("������ �Խù��� ���� "+str+" �Ͻðڽ��ϱ�?\n\n�ѹ� "+str+"�� �ڷ�� ������ �� �����ϴ�"))
        return;

    f.action = "./delete_all.php";
    f.submit();
}

// ������ �Խù� ���� �� �̵�
function select_copy(sw)
{
    var f = document.fboardlist;

    if (sw == "copy")
        str = "����";
    else
        str = "�̵�";
                       
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
<!-- �Խ��� ��� �� -->
