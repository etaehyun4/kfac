<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

$colspan = 6;
if ($is_checkbox) $colspan++;

if($member[mb_level] <= 7) { 
alert("���ٱ����� �����ϴ�.", $g4[path]); 
}

?>


<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<table width="100%" cellspacing="0" cellpadding="0">
<tr height="25">
    <td width="50%"><font color=red><b>������ ����</b></font></td>
    <td align="right">
        �Խù� <?=number_format($total_count)?>�� 
        <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border=0 align=absmiddle></a><?}?>
        <!--<? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/admin_button.gif" title="������" width="63" height="22" border="0" align="absmiddle"></a><?}?> --></td>
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
    <td width=50>��ȣ</td>
    <? if ($is_checkbox) { ?><td width=40><INPUT onclick="if (this.checked) all_checked(true); else all_checked(false);" type=checkbox></td><?}?>
    <td>ȸ���</td>
    <td width=150>���μ�/�̸�</td>
    <td width=120>����ó</td>
    <td width=50>��¥</td>
    <td width=50>����</td>
</tr>
<tr><td colspan=<?=$colspan?> height=1 bgcolor=#B0ADF5></td></tr>

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
            if ($list[$i][icon_new]) // �ֽű��� ����
                $style1 = "color:#112222;";
            if (!$list[$i][comment_cnt]) // �ڸ�Ʈ ���°͸� ����
                $style2 = "font-weight:bold;";
            echo "<span style='$style1 $style2'>{$list[$i][subject]}</span>";
        }
        echo "</a>";

        if ($list[$i][comment_cnt]) 
            echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-family:Tahoma;font-size:7pt;color:#ff6600;'>{$list[$i][comment_cnt]}</span></a>";

        echo $nobr_end;
		?></td>
<?
$ex9_filed = explode("|",$list[$i][wr_9]); //��ȭ �� �亯���
$tel = $ex9_filed[0] ."-". $ex9_filed[1] ."-".$ex9_filed[2];
$h_tel = $ex9_filed[3] ."-". $ex9_filed[4] ."-".$ex9_filed[5];

$my_mail = cut_str(get_text($ex9_filed[6]), 17);

?>
	<td><?=$list[$i][wr_1]?><br>(<?=$list[$i][wr_name]?>)</td>

	
	<td align=left>
	<?
		if($ex9_filed[2]) echo "��ȭ:{$tel}";
		if($ex9_filed[5]) echo "<br>�޴�:{$h_tel}";
		if($my_mail) echo "<br>����:<a href='mailto:{$my_mail}' title='{$ex9_filed[6]}'>{$my_mail}</a>";
		?></td>
    <td><?=$list[$i][datetime2]?></td>
    <td>
	<? if($list[$i][wr_8] == "�亯��" || $list[$i][wr_8]=="")  echo "<font color=#FF8000>�亯��</font>";
    	if($list[$i][wr_8] == "�亯��")  echo "<font color=#8080FF>�亯��</font>";
	    if($list[$i][wr_8] == "�Ϸ�")   echo "<font color=#C0C0C0>�Ϸ�</font>";
	?>
</td>
</tr>
<tr><td colspan=<?=$colspan?> height=1 bgcolor=#E7E7E7></td></tr>
<?}?>

<? if (count($list) == 0) { echo "<tr><td colspan='$colspan' height=100 align=center>�Խù��� �����ϴ�.</td></tr>"; } ?>
<tr><td colspan=<?=$colspan?> bgcolor=#5C86AD height=1>
</table>
</form>

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
            <option value='wr_subject||wr_content'>����+����</option>
            <option value='wr_subject'>����</option>
            <option value='wr_content'>����</option>
            <option value='wr_1'>ȸ���</option>
            <option value='mb_id'>ȸ�����̵�</option>
            <option value='wr_name'>�̸�</option>
        </select><input name=stx maxlength=15 size=10 itemname="�˻���" required value="<?=$stx?>"><select name=sop>
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