<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�
?>

<script language="JavaScript">
// ���ڼ� ����
var char_min = parseInt(<?=$comment_min?>); // �ּ�
var char_max = parseInt(<?=$comment_max?>); // �ִ�
</script>
<table width="100%" cellpadding="0" cellspacing="0" border="0"><tr height="10"><td></td></tr></table>
<? if ($cwin==1) { ?><table width=100% cellpadding=10 align=center><tr><td><?}?>

<!-- �ڸ�Ʈ ����Ʈ -->
<div id="commentContents">
<? 
for ($i=0; $i<count($list); $i++) { 
    $comment_id = $list[$i][wr_id]; 

$mb = get_member($list[$i][mb_id]); 
$level = get_member_level($mb['mb_id'],$mb['mb_point']);
?>

<a name="c_<?=$comment_id?>"></a>
<table width="100%" cellpadding="0" cellspacing="0" border="0>
<tr height="8"><td></td></tr>
<tr>
    <td><? for ($k=0; $k<strlen($list[$i][wr_comment_reply]); $k++) echo "&nbsp;&nbsp;"; ?></td>
    <td width='100%'>
    <table width="100%" cellpadding="0" cellspacing="0" border="0">
		<tr height="1" bgcolor="#e7e7e7"><td></td><td></td></tr>
        <tr height="30" bgcolor="#fafafa">
			<td><?=$level?>&nbsp;&nbsp;<?=$list[$i][name]?><? if ($is_admin == "super" || $is_auth) echo "&nbsp;(<font style='font-size:8pt;'>{$list[$i][ip]}</font>)";?>&nbsp;&nbsp;<span style='font:normal 11px tahoma; color:#777777;'><?=$list[$i][datetime]?></font></td>
            <td align="right">
			<table width="260" cellpadding="0" cellspacing="0" border="0">
				<tr>
					<td width="170" align="right">
					<? if ($list[$i][is_reply]) { echo "<a href=\"javascript:comment_box('{$comment_id}', 'c');\"><img src='$board_skin_path/img/btn_comment_reply.gif' border=0 align=absmiddle></a> "; } ?>
					<? if ($list[$i][is_edit]) { echo "<a href=\"javascript:comment_box('{$comment_id}', 'cu');\"><img src='$board_skin_path/img/btn_comment_modify.gif' border=0 align=absmiddle></a> "; } ?>
					<? if ($list[$i][is_del])  { echo "<a href=\"javascript:comment_delete('{$list[$i][del_link]}');\"><img src='$board_skin_path/img/btn_comment_delete.gif' border=0 align=absmiddle></a> "; } ?></td>
					<td width="10"></td>
					<td width="80" align="right"><?=exp_bar($mb[mb_id],$mb[mb_point],0);?></td>
				</tr>
			</table>
        </tr>
		<tr><td colspan="2" height="1" bgcolor="#e7e7e7"></td></tr>
		<tr><td colspan="2" height="2" bgcolor="#F6F6F6"></td></tr>
		<tr><td colspan="2" height="5"></td></tr>
        <!-- <tr><td bgcolor="#F8F8F9" colspan="3"><img src='<?=$board_skin_path?>/img/co_point.gif'></td></tr> -->
        <tr> 
			<td colspan=2>
				<table width="100%" cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td style='line-height:130%; padding:5px 0px 10px 5px; word-break:break-all;' class='comment'>
						<!-- �ڸ�Ʈ ��� -->
						<div>
						<? 
						$str = $list[$i][content];
						if ($str == '��б� �Դϴ�.')
						$str = "<span class='secret small'>* $str</span>";

						$str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp|mms)\:\/\/([^[:space:]]+)\.(mp3|wma|wmv|asf|asx|mpg|mpeg)\".*\<\/a\>\]/i", "<script>doc_write(obj_movie('$1://$2.$3'));</script>", $str); 
						$str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(swf)\".*\<\/a\>\]/i", "<script>doc_write(flash_movie('$1://$2.$3'));</script>", $str); 
						$str = preg_replace("/\[\<a\s.*href\=\"(http|https|ftp)\:\/\/([^[:space:]]+)\.(gif|png|jpg|jpeg|bmp)\".*\<\/a\>\]/i", "<img src='$1://$2.$3' id='target_resize_image[]' onclick='image_window(this);'>", $str); 
						echo $str; 
						?>
						</div>
						<? if ($list[$i][trackback]) { echo "<br><br>".$list[$i][trackback]; } ?>

						<textarea id='save_comment_<?=$comment_id?>' style='display:none; width:100%'><?=get_text($list[$i][wr_content], 0)?></textarea>
						
						<span id='edit_<?=$comment_id?>' style='display:none;'></span><!-- ���� -->
						<span id='reply_<?=$comment_id?>' style='display:none;'></span><!-- �亯 -->
						</td>
						
					</tr>
				</table>
			</td>
		</tr>
        </table></td>
</tr>
</table>
</div>
<? } ?>
<!-- �ڸ�Ʈ ����Ʈ -->


<? if ($is_comment_write) { ?>
<!-- �ڸ�Ʈ �Է� -->


<span id=comment_write style='display:none;'>
<form name="fviewcomment" method="post" action="./write_comment_update.php" onsubmit="return fviewcomment_submit(this);" autocomplete="off" style="margin:0px;">
<input type=hidden name=w           id=w value='c'>
<input type=hidden name=bo_table    value='<?=$bo_table?>'>
<input type=hidden name=wr_id       value='<?=$wr_id?>'>
<input type=hidden name=comment_id  id='comment_id' value=''>
<input type=hidden name=sfl         value='<?=$sfl?>' >
<input type=hidden name=stx         value='<?=$stx?>'>
<input type=hidden name=spt         value='<?=$spt?>'>
<input type=hidden name=page        value='<?=$page?>'>
<input type=hidden name=cwin        value='<?=$cwin?>'>

<table width="100%" cellpadding="3" cellspacing="0" border="0">
<tr height="8"><td colspan="2"></td></tr>
<tr height="1"><td colspan="2" bgcolor="#e7e7e7"></td></tr>
<tr bgcolor="#F8F8F9"><td colspan=2>

    <? if ($is_guest) { ?>
        �̸� <INPUT type=text maxLength=20 size=15 name="wr_name" itemname="�̸�" required class=ed>
        �н����� <INPUT type=password maxLength=20 size=15 name="wr_password" itemname="�н�����" required class=ed>
            <? if ($is_norobot) { ?>
                <?=$norobot_str?>
                <INPUT title="������ ������ �������ڸ� ������� �Է��ϼ���." type="input" name="wr_key" itemname="�ڵ���Ϲ���" required class=ed>
            <?}?>
			
    <?}?>
    <span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 5);"><img src="<?=$board_skin_path?>/img/up.gif"></span>
    <span style="cursor: pointer;" onclick="textarea_original('wr_content', 5);"><img src="<?=$board_skin_path?>/img/start.gif"></span>
    <span style="cursor: pointer;" onclick="textarea_increase('wr_content', 5);"><img src="<?=$board_skin_path?>/img/down.gif"></span>&nbsp;<input type=checkbox id="wr_secret" name="wr_secret" value="secret">��б�

    <? if ($comment_min || $comment_max) { ?><span id=char_count></span>����<?}?></td></tr>
<tr bgcolor="#F8F8F9">
    <td width="95%">
        <textarea id="wr_content" name="wr_content" style="width:100%;" rows=5 itemname="����" required 
            <? if ($comment_min || $comment_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?> style='width:100%; word-break:break-all;' class=tx></textarea>
            <? if ($comment_min || $comment_max) { ?><script language="javascript"> check_byte('wr_content', 'char_count'); </script><?}?></td>
    <td width=80 align=center><input type="image" src="<?=$board_skin_path?>/img/ok_btn.gif" border=0 accesskey='s'></td></tr>
</table>
</form>
</span>

<script language='JavaScript'>
var save_before = '';
var save_html = document.getElementById('comment_write').innerHTML;
function fviewcomment_submit(f)
{
    var pattern = /(^\s*)|(\s*$)/g; // \s ���� ����

    var s;
    if (s = word_filter_check(document.getElementById('wr_content').value))
    {
        alert("���뿡 �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        document.getElementById('wr_content').focus();
        return false;
    }

    // ���� ���� ���ֱ�
    var pattern = /(^\s*)|(\s*$)/g; // \s ���� ����
    document.getElementById('wr_content').value = document.getElementById('wr_content').value.replace(pattern, "");
    if (char_min > 0 || char_max > 0)
    {
        check_byte('wr_content', 'char_count');
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt)
        {
            alert("�ڸ�Ʈ�� "+char_min+"���� �̻� ���ž� �մϴ�.");
            return false;
        } else if (char_max > 0 && char_max < cnt)
        {
            alert("�ڸ�Ʈ�� "+char_max+"���� ���Ϸ� ���ž� �մϴ�.");
            return false;
        }
    }
    else if (!document.getElementById('wr_content').value)
    {
        alert("�ڸ�Ʈ�� �Է��Ͽ� �ֽʽÿ�.");
        return false;
    }

    if (typeof(f.wr_name) != 'undefined')
    {
        f.wr_name.value = f.wr_name.value.replace(pattern, "");
        if (f.wr_name.value == '')
        {
            alert('�̸��� �Էµ��� �ʾҽ��ϴ�.');
            f.wr_name.focus();
            return false;
        }
    }

    if (typeof(f.wr_password) != 'undefined')
    {
        f.wr_password.value = f.wr_password.value.replace(pattern, "");
        if (f.wr_password.value == '')
        {
            alert('�н����尡 �Էµ��� �ʾҽ��ϴ�.');
            f.wr_password.focus();
            return false;
        }
    }

    if (typeof(f.wr_key) != 'undefined')
    {
        if (hex_md5(f.wr_key.value) != md5_norobot_key)
        {
            alert('�ڵ���Ϲ����� �������ڰ� ������� �Էµ��� �ʾҽ��ϴ�.');
            f.wr_key.focus();
            return false;
        }
    }

    return true;
}

function comment_box(comment_id, work)
{
    var el_id;
    // �ڸ�Ʈ ���̵� �Ѿ���� �亯, ����
    if (comment_id)
    {
        if (work == 'c')
            el_id = 'reply_' + comment_id;
        else
            el_id = 'edit_' + comment_id;
    }
    else
        el_id = 'comment_write';

    if (save_before != el_id)
    {
        if (save_before)
        {
            document.getElementById(save_before).style.display = 'none';
            document.getElementById(save_before).innerHTML = '';
        }

        document.getElementById(el_id).style.display = '';
        document.getElementById(el_id).innerHTML = save_html;
        // �ڸ�Ʈ ����
        if (work == 'cu')
        {
            document.getElementById('wr_content').value = document.getElementById('save_comment_' + comment_id).value;
            if (typeof char_count != 'undefined')
                check_byte('wr_content', 'char_count');
        }

        document.getElementById('comment_id').value = comment_id;
        document.getElementById('w').value = work;

        save_before = el_id;
    }
}

function comment_delete(url)
{
    if (confirm("�� �ڸ�Ʈ�� �����Ͻðڽ��ϱ�?")) location.href = url;
}

comment_box('', 'c'); // �ڸ�Ʈ �Է����� ���̵��� ó���ϱ����ؼ� �߰� (root��)
</script>
<? } ?>

<? if($cwin==1) { ?></td><tr></table><p align=center><a href="javascript:window.close();"><img src="<?=$board_skin_path?>/img/btn_close.gif" border="0"></a><br><br><?}?>