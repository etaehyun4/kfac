<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�

if ($is_dhtml_editor) {
    include_once("$g4[path]/lib/cheditor4.lib.php");
    echo "<script src='$g4[cheditor4_path]/cheditor.js'></script>";
    echo cheditor1('wr_content', '100%', '250');
}

$ex9_filed =   explode("|",$write[wr_9]);
$ext9_00   =   $ex9_filed[0];  //��ȭ
$ext9_01   =   $ex9_filed[1];
$ext9_02   =   $ex9_filed[2];
$ext9_03   =   $ex9_filed[3];
$ext9_04   =   $ex9_filed[4];
$ext9_05   =   $ex9_filed[5];
$ext9_06   =   $ex9_filed[6]; //����
$ext9_07   =   $ex9_filed[7]; //�亯���
$ext9_08   =   $ex9_filed[8];
$ext9_09   =   $ex9_filed[9];

$ex10_filed =   explode("|",$write[wr_10]); //�ּҺκ�
$ext10_00   =   $ex10_filed[0];
$ext10_01   =   $ex10_filed[1];
$ext10_02   =   $ex10_filed[2];
$ext10_03   =   $ex10_filed[3];

/*
wr_1 ȸ���
wr_2 
wr_3 
wr_4 
wr_5 
wr_6 
wr_7 Ȩ������
wr_8 ����
*/

?>
<style type="text/css">
<!--
.my_input { border:1px solid #CBD7E9; }
-->
</style>
<script language="javascript">
// ���ڼ� ����
var char_min = parseInt(<?=$write_min?>); // �ּ�
var char_max = parseInt(<?=$write_max?>); // �ִ�
</script>

<form name="fwrite" method="post" action="javascript:fwrite_check(document.fwrite);" enctype="multipart/form-data" style="margin:0px;">
<input type=hidden name=null>
<input type=hidden name=w        value="<?=$w?>">
<input type=hidden name=bo_table value="<?=$bo_table?>">
<input type=hidden name=wr_id    value="<?=$wr_id?>">
<input type=hidden name=sca      value="<?=$sca?>">
<input type=hidden name=sfl      value="<?=$sfl?>">
<input type=hidden name=stx      value="<?=$stx?>">
<input type=hidden name=spt      value="<?=$spt?>">
<input type=hidden name=sst      value="<?=$sst?>">
<input type=hidden name=sod      value="<?=$sod?>">
<input type=hidden name=page     value="<?=$page?>">

<table cellpadding=0 cellspacing=0 border=0><tr><td height=5></td></tr></table>

<table width="<?=$width?>" align=center cellpadding=0 cellspacing=1 bgcolor=#D0D0D0>
<tr><td bgcolor=#FFFFFF>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
<? if($is_admin){ ?>
<tr><td colspan=2 height=1 bgcolor=#F6F6F6></td></tr>
<tr>
    <td bgcolor=#F6F6F6 style='padding-left:20px; height:30px;'><font color=blue><b>���������</b></font></td>
    <td style='padding-left:5px;'>
<input type=radio name=wr_8 <?if($write[wr_8]=='�亯��' || $write[wr_8]=='') echo "checked";?> value="�亯��">�亯��
<input type=radio name=wr_8 <?if($write[wr_8]=='�亯��') echo "checked";?> value="�亯��">�亯��
<input type=radio name=wr_8 <?if($write[wr_8]=='�Ϸ�') echo "checked";?> value="�Ϸ�">�Ϸ�
</td></tr>
<tr><td colspan=2 height=1 bgcolor=#EEEEEE></td></tr>
<?}?>


<tr><td colspan=2 height=1 bgcolor=#F9F9F9></td></tr>
<!--<tr>
    <td bgcolor=#F9F9F9 style='padding-left:20px; height:30px;'>��ȸ���</td>
    <td style='padding-left:5px;'><input class=my_input maxlength=60 size=35 name=wr_1 itemname="ȸ���"  value="<?=$write[wr_1]?>"></td></tr>

<tr><td colspan=2 height=1 bgcolor=#EEEEEE></td></tr>
-->
<? if ($member[mb_name]) { ?>
<tr>
    <td bgcolor=#F9F9F9 style='padding-left:20px; height:30px;'>����  ��</td>
    <td style='padding-left:5px;'><font color=#0606FF><b><?=$member[mb_name]?></b></font> ��</td></tr>
<tr><td colspan=2 height=1 bgcolor=#EEEEEE></td></tr>
<? } else { ?>
<tr>
    <td bgcolor=#F9F9F9 style='padding-left:20px; height:30px;'>����  ��</td>
    <td style='padding-left:5px;'><input class=my_input maxlength=20 size=15 name=wr_name itemname="�̸�" required value="<?=$write[wr_name]?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#EEEEEE></td></tr>
<? } ?>

<tr>
    <td bgcolor=#F9F9F9 style='padding-left:20px;'>������ó</td>
    <td style="padding:3 0 3 5;">
<table width='100%' cellpadding=0 cellspacing=0 border=0>
<tr>
<td>
��TEL : 
<select name='ext9_00' class='my_input' itemname='������'>
<option selected value=''>������</option>
<option value='02' <? if($ext9_00 == "02") echo "selected"; ?>>&nbsp;02</option>
<option value='031' <? if($ext9_00 == "031") echo "selected"; ?>>031</option>
<option value='032' <? if($ext9_00 == "032") echo "selected"; ?>>032</option>
<option value='033' <? if($ext9_00 == "033") echo "selected"; ?>>033</option>
<option value='041' <? if($ext9_00 == "041") echo "selected"; ?>>041</option>
<option value='042' <? if($ext9_00 == "042") echo "selected"; ?>>042</option>
<option value='043' <? if($ext9_00 == "043") echo "selected"; ?>>043</option>
<option value='051' <? if($ext9_00 == "051") echo "selected"; ?>>051</option>
<option value='052' <? if($ext9_00 == "052") echo "selected"; ?>>052</option>
<option value='053' <? if($ext9_00 == "053") echo "selected"; ?>>053</option>
<option value='054' <? if($ext9_00 == "054") echo "selected"; ?>>054</option>
<option value='055' <? if($ext9_00 == "055") echo "selected"; ?>>055</option>
<option value='061' <? if($ext9_00 == "061") echo "selected"; ?>>061</option>
<option value='062' <? if($ext9_00 == "062") echo "selected"; ?>>062</option>
<option value='063' <? if($ext9_00 == "063") echo "selected"; ?>>063</option>
<option value='064' <? if($ext9_00 == "064") echo "selected"; ?>>064</option>
</select> - 
<input name='ext9_01' value='<?=$ext9_01?>' type='text' size='5' maxlength='4' itemname='��ȭ �ι�°�ڸ�' class='my_input' onkeydown='onlyNumber(this);'>  - 
<input name='ext9_02' value='<?=$ext9_02?>' type='text' size='5' maxlength='4' itemname='��ȭ ����°�ڸ�' class='my_input' onkeydown='onlyNumber(this);'> &nbsp; &nbsp;

��HP :
<select name='ext9_03' class='my_input' itemname='��Ż�'>
<option selected value=''>��Ż�</option>
<option value='010' <? if($ext9_03 == "010") echo "selected"; ?>>010</option>
<option value='011' <? if($ext9_03 == "011") echo "selected"; ?>>011</option>
<option value='016' <? if($ext9_03 == "016") echo "selected"; ?>>016</option>
<option value='017' <? if($ext9_03 == "017") echo "selected"; ?>>017</option>
<option value='018' <? if($ext9_03 == "018") echo "selected"; ?>>018</option>
<option value='019' <? if($ext9_03 == "019") echo "selected"; ?>>019</option>
</select> - 
<input name='ext9_04' value='<?=$ext9_04?>' type='text' size='5' maxlength='4' itemname='�޴���ȭ �ι�°�ڸ�' class='my_input' onkeydown='onlyNumber(this);'>  - 
<input name='ext9_05' value='<?=$ext9_05?>' type='text' size='5' maxlength='4' itemname='�޴���ȭ ����°�ڸ�' class='my_input' onkeydown='onlyNumber(this);'>
</td>
</tr>
<tr><td height=3></td></tr>
<tr>
<td>��E-mail : <input class=my_input maxlength=50 size=30 name=ext9_06 email value="<?=$ext9_06?>"></td>
<input type=hidden value='mail' name='mail' >
</tr>
</table></td>
</tr>

<tr><td colspan=2 height=1 bgcolor=#EEEEEE></td></tr>


<tr>
    <td bgcolor=#F9F9F9 style='padding-left:20px; height:30px;'>���亯���</td>
    <td style='padding-left:5px;'>
<input type=checkbox name="ext9_07" value="��ȭ" <? if($ext9_07 == "��ȭ" || $ext9_07=='')	 echo "checked"; ?>>��ȭ &nbsp;
<input type=checkbox name="ext9_08" value="�޴���ȭ" <? if($ext9_08 == "�޴���ȭ")	 echo "checked"; ?>>�޴���ȭ &nbsp;
<input type=checkbox name="ext9_09" value="�̸���" <? if($ext9_09 == "�̸���")	 echo "checked"; ?>>�̸���
</td></tr>
<tr><td colspan=2 height=1 bgcolor=#EEEEEE></td></tr>

<!--
<? if ($is_html || $is_secret || $is_mail) { ?>
<tr>
    <td bgcolor=#F9F9F9 style='padding-left:20px; height:30px;'>�ɼ�</td>
    <td style='padding-left:5px;'>
        <? if ($is_html) { ?>
            <? if ($is_dhtml_editor) { ?>
            <input type=hidden value="html1" name="html">
            <? } else { ?>
            <input onclick="html_auto_br(this);" type=checkbox value="<?=$html_value?>" name="html" <?=$html_checked?>><span class=my_input>html</span>&nbsp;
            <? } ?>
        <? } ?>
        <? if ($is_secret) { ?>
            <? if ($is_admin || $is_secret==1) { ?>
            <input type=checkbox value="secret" name="secret" <?=$secret_checked?>><span class=w_title>��б�</span>&nbsp;
            <? } else { ?>
            <input type=hidden value="secret" name="secret">
            <? } ?>
        <? } ?>
        <? if ($is_mail) { ?><input type=checkbox value="mail" name="mail" <?=$recv_email_checked?>>�亯���Ϲޱ�&nbsp;<? } ?></td></tr>
<tr><td colspan=2 height=1 bgcolor=#EEEEEE></td></tr>
<? } ?>
-->

        <? if ($is_html) { ?>
            <? if ($is_dhtml_editor) { ?>
            <input type=hidden value="html1" name="html">
            <? } ?>
        <? } ?>
<tr>
    <td bgcolor=#F9F9F9 style='padding-left:20px; height:30px;'>����  ��</td>
    <td style='padding-left:5px;'><input class=my_input style="width:98%;" name=wr_subject itemname="����" required value="<?=$subject?>"></td></tr>
<tr><td colspan=2 height=1 bgcolor=#EEEEEE></td></tr>
<tr>
    <td bgcolor=#F9F9F9 style='padding-left:20px;'> �����ǳ���</td>
    <td style='padding-left:5px;'>
	
        <? if ($is_dhtml_editor) { ?>
            <?=cheditor2('wr_content', $content);?>
        <? } else { ?>
        <table width=100% cellpadding=0 cellspacing=0>
        <tr>
            <td width=50% align=left valign=bottom>
                <span style="cursor: pointer;" onclick="textarea_decrease('wr_content', 10);"><img src="<?=$board_skin_path?>/img/up.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_original('wr_content', 10);"><img src="<?=$board_skin_path?>/img/start.gif"></span>
                <span style="cursor: pointer;" onclick="textarea_increase('wr_content', 10);"><img src="<?=$board_skin_path?>/img/down.gif"></span></td>
            <td width=50% align=right><? if ($write_min || $write_max) { ?><span id=char_count></span>����<?}?></td>
        </tr>
        </table>
        <textarea id="wr_content" name="wr_content" class=tx style='width:100%; word-break:break-all;' rows=10 itemname="����" required 
        <? if ($write_min || $write_max) { ?>onkeyup="check_byte('wr_content', 'char_count');"<?}?>><?=$content?></textarea>
        <? if ($write_min || $write_max) { ?><script language="javascript"> check_byte('wr_content', 'char_count'); </script><?}?>
        <? } ?>
    </td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#EEEEEE></td></tr>

<? if ($is_file) { ?>
<tr>
    <td bgcolor=#F9F9F9 style='padding-left:20px; height:30px;'>��÷������</td>
    <td style='padding-left:5px;'><table id="variableFiles" cellpadding=0 cellspacing=0></table><?// print_r2($file); ?>
        <script language="JavaScript">
        var flen = 0;
        function add_file(delete_code)
        {
            var upload_count = <?=(int)$board[bo_upload_count]?>;
            if (upload_count && flen >= upload_count)
            {
                alert("�� �Խ����� "+upload_count+"�� ������ ���� ���ε尡 �����մϴ�.");
                return;
            }

            var objTbl;
            var objRow;
            var objCell;
            if (document.getElementById)
                objTbl = document.getElementById("variableFiles");
            else
                objTbl = document.all["variableFiles"];

            objRow = objTbl.insertRow(objTbl.rows.length);
            objCell = objRow.insertCell(0);

            objCell.innerHTML = "<input type='file' class=my_input size=32 name='bf_file[]' title='���� �뷮 <?=$upload_max_filesize?> ���ϸ� ���ε� ����'>";
            if (delete_code)
                objCell.innerHTML += delete_code;
            else
            {
                <? if ($is_file_content) { ?>
                objCell.innerHTML += "<br><input type='text' class=my_input size=50 name='bf_content[]' title='���ε� ���Ͽ� �ش� �Ǵ� ������ �Է��ϼ���.'>";
                <? } ?>
                ;
            }

            flen++;
        }

        <?=$file_script; //�����ÿ� �ʿ��� ��ũ��Ʈ?>

        function del_file()
        {
            // file_length ���Ϸδ� �ʵ尡 �������� �ʾƾ� �մϴ�.
            var file_length = <?=(int)$file_length?>;
            var objTbl = document.getElementById("variableFiles");
            if (objTbl.rows.length - 1 > file_length)
            {
                objTbl.deleteRow(objTbl.rows.length - 1);
                flen--;
            }
        }
        </script></td>
</tr>
<tr><td colspan=2 height=1 bgcolor=#EEEEEE></td></tr>
<? } ?>


<? if ($is_norobot) { ?>
<tr>
    <td style='padding-left:20px; height:30px;'><?=$norobot_str?></td>
    <td style='padding-left:5px;'><input class=my_input type=input size=10 name=wr_key itemname="�ڵ���Ϲ���" required>&nbsp;&nbsp;* ������ ������ <font color="red">�������ڸ�</font> ������� �Է��ϼ���.</td>
</tr>
<? } ?>

</table></td>
</tr></table>

<table width="<?=$width?>" border="0" cellspacing="0" cellpadding="0">
<tr>
    <td height="10" background="<?=$board_skin_path?>/img/write_down_bg.gif"></td>
</tr>
<tr>
    <td align="center" valign="top">
        <input type=image id="btn_submit" src="<?=$board_skin_path?>/img/btn_write.gif" border=0 accesskey='s' onfocus='this.blur()'> &nbsp; <a href="#" onclick="history.go(0)" onfocus='this.blur()'><img id="btn_list" src='<?=$board_skin_path?>/img/btn_re.gif' border='0'></a>
<?if($is_admin){?>
        <a href="./board.php?bo_table=<?=$bo_table?>" onfocus='this.blur()'><img id="btn_list" src="<?=$board_skin_path?>/img/btn_list.gif" border=0></a>
<?}?>
</td>
</tr>
</table>

</form>

<script language="javascript">

function onlyNumber(objtext1){
var inText = objtext1.value;
var ret;

for (var i = 0; i < inText.length; i++) {
ret = inText.charCodeAt(i);
if (!((ret > 47) && (ret < 58))) {
alert("���ڸ��� �Է��ϼ���");
objtext1.value = "";
objtext1.focus();
return false;
}
}
if (objtext1.value.length==6) {
document.form1.RNI_idnum2.focus() ;
}
return true;
}

with (document.fwrite) {
    if (typeof(wr_1) != "undefined")
        wr_1.focus();
    else if (typeof(wr_name) != "undefined")
        wr_name.focus();
    else if (typeof(wr_subject) != "undefined")
        wr_subject.focus();
    else if (typeof(wr_content) != "undefined")
        wr_content.focus();

    if (typeof(ca_name) != "undefined")
        if (w.value == "u")
            ca_name.value = "<?=$write[ca_name]?>";
}

function html_auto_br(obj) {
    if (obj.checked) {
        result = confirm("�ڵ� �ٹٲ��� �Ͻðڽ��ϱ�?\n\n�ڵ� �ٹٲ��� �Խù� ������ �ٹٲ� ����<br>�±׷� ��ȯ�ϴ� ����Դϴ�.");
        if (result)
            obj.value = "html2";
        else
            obj.value = "html1";
    }
    else
        obj.value = "";
}

function fwrite_check(f) {
    var s = "";
    if (s = word_filter_check(f.wr_subject.value)) {
        alert("���� �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        return;
    }

    if (s = word_filter_check(f.wr_content.value)) {
        alert("���뿡 �����ܾ�('"+s+"')�� ���ԵǾ��ֽ��ϴ�");
        return;
    }

    if (char_min > 0 || char_max > 0) {
        var cnt = parseInt(document.getElementById('char_count').innerHTML);
        if (char_min > 0 && char_min > cnt) {
            alert("������ "+char_min+"���� �̻� ���ž� �մϴ�.");
            return;
        } 
        else if (char_max > 0 && char_max < cnt) {
            alert("������ "+char_max+"���� ���Ϸ� ���ž� �մϴ�.");
            return;
        }
    }

    if (typeof(f.wr_key) != "undefined") {
        if (hex_md5(f.wr_key.value) != md5_norobot_key) {
            alert("�ڵ���Ϲ����� �������ڰ� ������� �Էµ��� �ʾҽ��ϴ�.");
            f.wr_key.focus();
            return;
        }
    }

    <?
    if ($is_dhtml_editor) {
        echo cheditor3('wr_content');
        echo "if (!document.getElementById('wr_content').value) { alert('������ �Է��Ͻʽÿ�.'); return; } ";
    }
    ?>

    document.getElementById('btn_submit').disabled = true;
    document.getElementById('btn_list').disabled = true;

    f.action = "./write_update.php";
    f.submit();
}
</script>

<script language="JavaScript" src="<?="$g4[path]/js/board.js"?>"></script>
<script language="JavaScript">
window.onload=function() {
    drawFont();
}
</script>