<?php
$sub_menu = "300300";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");


$szMode     = "INSERT";
$szAction   = "./popup_process.php?szMode=INSERT";
$szButton   = "<input type='submit' class='btn1' value='  Ȯ  ��  '>";

# ���� �����̶��
if ($_GET[no] != "")
{
  $szMode     = "MODIFY";
  $szAction   = "./popup_process.php?szMode=MODIFY&no=$_GET[no]&page=$_GET[page]";
  $szButton   = "<input type='submit' class='btn1' value='  ��  ��  '>";

  $szSql      = " SELECT * FROM ZOTTA_POPUP WHERE nIdx='$_GET[no]' ";
  $arrPOPUP   = sql_fetch($szSql);

  $szStart    = date('Ymd', $arrPOPUP[nStartDate]);
  $szEnd      = date('Ymd', $arrPOPUP[nEndDate]);
}

$g4[title] = "�˾�����";
include_once("./admin.head.php");
include_once("$g4[path]/lib/cheditor.lib.php");
?>

<script src="<?=$g4[editor_path]?>/cheditor.js"></script>
<?=cheditor1('szMemo', $arrPOPUP[szMemo]);?>

<form name="regform" method="post" action="javascript:regform_submit(document.regform)" enctype="multipart/form-data" style="margin:0;">

<table width="100%" cellpadding="0" cellspacing="0" border="0">
<colgroup width="15%" class='col1 pad1 bold right'>
<colgroup width="35%" class='col2 pad2'>
<colgroup width="15%" class='col1 pad1 bold right'>
<colgroup width="35%" class='col2 pad2'>
<tr><td colspan="4" class='line2'></td></tr>

<tr class='ht'>
    <td>������</td>
    <td><input type="text" class="ed" name="szStart" size=9 value='<?=$szStart;?>' Maxlength="8" itemname="������" required style="cursor:hand;">��) 20060801 <a href="#none" onClick="win_calendar('szStart', document.getElementById('szStart').value, '');" >��¥ ����</a>
    <td>������</td>
    <td><input type="text" class="ed" name="szEnd" size=9 value='<?=$szEnd;?>' Maxlength="8" itemname="������" required style="cursor:hand;">��) 20060801 <a href="#none" onClick="win_calendar('szEnd', document.getElementById('szEnd').value, '');" >��¥ ����</a></td>
</tr>
<tr><td colspan="4" class='line2'></td></tr>

<tr class='ht'>
    <td>���� ������</td>
    <td><input type="text" name="nWidth"  size=4 value='<?=$arrPOPUP[nWidth]?>' Maxlength="3" itemname="����ũ��" required> px,</td>
    <td>���� ������</td>
    <td><input type="text" name="nHeight" size=4 value='<?=$arrPOPUP[nHeight]?>' Maxlength="3" itemname="����ũ��" required> px</td>
</tr>

<tr><td colspan="4" class='line2'></td></tr>

<tr class='ht'>
	<td>����   ��ġ</td>
	<td><input type="text" name="nLeft"   size=4 value='<?=$arrPOPUP[nLeft]?>' Maxlength="3" itemname="������ġ" required> px,</td>
	<td>����   ��ġ&nbsp;&nbsp;</td>
	<td><input type="text" name="nRight"  size=4 value='<?=$arrPOPUP[nRight]?>' Maxlength="3" itemname="������ġ" required> px </td>
</tr>

<tr><td colspan="4" class='line2'></td></tr>

<tr class='ht'>
  <td style="text-align:left; ">��ũ�� ǥ�ÿ��� </td>
  <td colspan="3" >
		<input type="radio" name="nOptions" value="Y" <?php if($arrPOPUP[nOptions] == "Y") echo "CHECKED"; ?>>���̱�
		<input type="radio" name="nOptions" value="N" <?php if($arrPOPUP[nOptions] == "N" or !$arrPOPUP[nOptions]) echo "CHECKED"; ?>>������ ����</td>
	</td>
</tr>

<tr><td colspan="4" class='line2'></td></tr>

<tr class='ht'>
    <td>Ÿ��Ʋ</td>
    <td><input type="text" class="ed" name="szSubject" style="width:100%;" value='<?=$arrPOPUP[szSubject]?>' itemname="����" required></td>
    <td>����ϱ�</td>
    <td>
        <input type="radio" name="szView" value="Y" <?php if($arrPOPUP[szView] == "Y") echo "CHECKED"; ?>>����!! 
        <input type="radio" name="szView" value="" <?php if($arrPOPUP[szView] == "" or !$arrPOPUP[szView]) echo "CHECKED"; ?>>������ ����</td>
</tr>
<tr><td colspan="4" class='line2'></td></tr>

<tr class='ht'>
    <td>�� ��</td>
    <td colspan="3">
        <?=cheditor2('regform', 'szMemo', '100%', '350');?>
        <br />
    </td>
</tr>
<tr><td colspan="4" class='line1'></td></tr>

</table>



<p align="center">
<?=$szButton;?>
&nbsp;
<input type="button" class="btn1" value='  ��  ��  ' onClick="history.back();">&nbsp;
</p>


</form>


<script language="JavaScript">
function regform_submit(f)
{
    <?=cheditor3('szMemo');?>

    f.action = "<?=$szAction;?>";
    f.submit();
}
</script>



<?php
include_once("./admin.tail.php");
?>