<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�

// $image_width  = 250; // �̹��� ��
// $image_height = 200; // �̹��� ����

if (!$skin_no) $skin_no = "01";
?>

<!-- �Խ��� ��� ���� -->
<table width="<?=$width?>" align=center cellpadding=0 cellspacing=0><tr><td>

<!-- �з� ����Ʈ �ڽ�, �Խù� ���, ������ȭ�� ��ũ -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr height="25">
    <? if ($is_category) { ?><form name="fcategory" method="get"><td width="50%"><select name=sca onchange="location='<?=$category_location?>'+this.value;"><option value=''>��ü</option><?=$category_option?></select></td></form><? } ?>
    <td align="right">
        �Խù� <?=number_format($total_count)?>�� 
        <? if ($rss_href) { ?><a href='<?=$rss_href?>'><img src='<?=$board_skin_path?>/img/btn_rss.gif' border=0 align=absmiddle></a><?}?>
        <? if ($admin_href) { ?><a href="<?=$admin_href?>"><img src="<?=$board_skin_path?>/img/admin_button.gif" title="������" width="63" height="22" border="0" align="absmiddle"></a><?}?></td>
</tr>
<tr><td height=5></td></tr>
</table>
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr><td height=6></td></tr><tr><td bgcolor=#EBEBEB height=1></td></tr><tr><td height=6></td></tr></table>
<!-- ���� -->
<?
// ��ȣ�� �̹����� ����� ���� �Ʒ��� �ּ��� �����ϰ� $list[$i][num]�� ������ ������ ����ϼ���.
// if (!is_int($list[$i][num])) { $list[$i][num] = "<img src='$board_skin/img/arrow.gif'>"; } 
?>
<? for ($i=0; $i<count($list); $i++) { ?>
<table width=99% border=0 cellpadding=0 cellspacing=0 align="center" onMouseOver="this.style.backgroundColor='#FAF8FA'" onMouseOut="this.style.backgroundColor=''">
<tr align=center>
         <? if ($is_category) { ?><td width=60 align="center"><span class=tt><?=$list[$i][ca_name]?></span></td>
         <? } ?>
    <td align=center> 
         <? 
		    $image = urlencode($list[$i][file][0][file]); // ù��° ������ �̹������
            if (preg_match("/\.(gif|jpg|png)$/i", $image) && file_exists("$g4[path]/data/file/$bo_table/$image")) {
                echo "<img src='$g4[path]/data/file/$bo_table/$image' width='90' height='90' border='0'>&nbsp;&nbsp;";
}
		    else if (file_exists($list[$i][file_image1])) { $gznews_img = "width=90 height=90 border=0)'> <br>"; } 
		 ?>
				<a href='<?="./board.php?&bo_table=$bo_table&wr_id={$list[$i][wr_id]}"?>'></a>
    </td>
    <td align=left> 
        <table width="100%"  border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="25"><? if ($is_checkdelete) { ?>
              <input type=checkbox name=chk_wr_id[] value='<?=$list[$i][wr_id]?>'>
              <? } ?>
              <?//=$list[$i][reply]?>
              <?//=$list[$i][icon_reply]?>
              <a href='<?=$list[$i][href]?>'>
              <? if ($list[$i][is_notice]) echo "<b>"; ?>
              <font color=#475B8F size=3><b>
              <?=$list[$i][subject]?>
              </b></font>
              <? if ($list[$i][is_notice]) echo "</b>"; ?></a>
<? if ($list[$i][comment_cnt]) 
        echo " <a href=\"{$list[$i][comment_href]}\"><span style='font-size:7pt;'>{$list[$i][comment_cnt]}</span></a>";?>
              <?echo " " . $list[$i][icon_file];?> <?echo " " . $list[$i][icon_link];?>
              <?=$list[$i][icon_new]?>
              <?=$list[$i][icon_hot]?>
              <?=$list[$i][icon_battle]?>
              <?=$list[$i][icon_secret]?>
              <br>
              <font color=gray></td>
          </tr>
          <tr>
            <td>
              <?=cut_str(strip_tags($list[$i][wr_content]),300,"��")?>
              </font> </td>
          </tr>
        </table></td>

<!--
    <td align=left> 
<img src=<?=$list[$i][file_image2]?> align="absmiddle" onError="this.style.visibility='hidden'" border=0 width=50 height=50>
</td>
-->
    <td width=80 align="center"><?=$list[$i][datetime]?></td> 
      
   
	</tr>
</table><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr><td height=6></td></tr><tr><td bgcolor=#EBEBEB height=1></td></tr><tr><td height=6></td></tr></table>

<? } ?>

<? if (count($list) == 0) { echo "<tr><td colspan=6 align=center height=100 class='content contentbg'>�ڷᰡ �����ϴ�.</td></tr>"; } ?>

</form>


<!-- ������ -->
<table width="100%" cellspacing="0" cellpadding="0">
<tr> 
    <td width="100%" align="center" height=30 valign=bottom>
        <? if ($prev_part_href) { echo "<a href='$prev_part_href'><img src='$board_skin_path/img/btn_search_prev.gif' width=50 height=20 border=0 align=absmiddle title='�����˻�'></a>"; } ?>
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
        <? if ($next_part_href) { echo "<a href='$next_part_href'><img src='$board_skin_path/img/btn_search_next.gif' width=50 height=20 border=0 align=absmiddle title='�����˻�'></a>"; } ?>
    </td>
</tr>
</table>

<!-- ��ư ��ũ -->
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
<!-- �Խ��� ��� �� -->