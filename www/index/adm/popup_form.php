<?php
$sub_menu = "300300";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");


$szMode     = "INSERT";
$szAction   = "./popup_process.php?szMode=INSERT";
$szButton   = "<input type='submit' class='btn1' value='  확  인  '>";

# 만일 수정이라면
if ($_GET[no] != "")
{
  $szMode     = "MODIFY";
  $szAction   = "./popup_process.php?szMode=MODIFY&no=$_GET[no]&page=$_GET[page]";
  $szButton   = "<input type='submit' class='btn1' value='  수  정  '>";

  $szSql      = " SELECT * FROM ZOTTA_POPUP WHERE nIdx='$_GET[no]' ";
  $arrPOPUP   = sql_fetch($szSql);

  $szStart    = date('Ymd', $arrPOPUP[nStartDate]);
  $szEnd      = date('Ymd', $arrPOPUP[nEndDate]);
}

$g4[title] = "팝업관리";
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
    <td>시작일</td>
    <td><input type="text" class="ed" name="szStart" size=9 value='<?=$szStart;?>' Maxlength="8" itemname="시작일" required style="cursor:hand;">예) 20060801 <a href="#none" onClick="win_calendar('szStart', document.getElementById('szStart').value, '');" >날짜 선택</a>
    <td>종료일</td>
    <td><input type="text" class="ed" name="szEnd" size=9 value='<?=$szEnd;?>' Maxlength="8" itemname="종료일" required style="cursor:hand;">예) 20060801 <a href="#none" onClick="win_calendar('szEnd', document.getElementById('szEnd').value, '');" >날짜 선택</a></td>
</tr>
<tr><td colspan="4" class='line2'></td></tr>

<tr class='ht'>
    <td>가로 사이즈</td>
    <td><input type="text" name="nWidth"  size=4 value='<?=$arrPOPUP[nWidth]?>' Maxlength="3" itemname="가로크기" required> px,</td>
    <td>세로 사이즈</td>
    <td><input type="text" name="nHeight" size=4 value='<?=$arrPOPUP[nHeight]?>' Maxlength="3" itemname="세로크기" required> px</td>
</tr>

<tr><td colspan="4" class='line2'></td></tr>

<tr class='ht'>
	<td>가로   위치</td>
	<td><input type="text" name="nLeft"   size=4 value='<?=$arrPOPUP[nLeft]?>' Maxlength="3" itemname="가로위치" required> px,</td>
	<td>세로   위치&nbsp;&nbsp;</td>
	<td><input type="text" name="nRight"  size=4 value='<?=$arrPOPUP[nRight]?>' Maxlength="3" itemname="세로위치" required> px </td>
</tr>

<tr><td colspan="4" class='line2'></td></tr>

<tr class='ht'>
  <td style="text-align:left; ">스크롤 표시여부 </td>
  <td colspan="3" >
		<input type="radio" name="nOptions" value="Y" <?php if($arrPOPUP[nOptions] == "Y") echo "CHECKED"; ?>>보이기
		<input type="radio" name="nOptions" value="N" <?php if($arrPOPUP[nOptions] == "N" or !$arrPOPUP[nOptions]) echo "CHECKED"; ?>>보이지 않음</td>
	</td>
</tr>

<tr><td colspan="4" class='line2'></td></tr>

<tr class='ht'>
    <td>타이틀</td>
    <td><input type="text" class="ed" name="szSubject" style="width:100%;" value='<?=$arrPOPUP[szSubject]?>' itemname="제목" required></td>
    <td>출력하기</td>
    <td>
        <input type="radio" name="szView" value="Y" <?php if($arrPOPUP[szView] == "Y") echo "CHECKED"; ?>>당장!! 
        <input type="radio" name="szView" value="" <?php if($arrPOPUP[szView] == "" or !$arrPOPUP[szView]) echo "CHECKED"; ?>>보이지 않음</td>
</tr>
<tr><td colspan="4" class='line2'></td></tr>

<tr class='ht'>
    <td>내 용</td>
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
<input type="button" class="btn1" value='  목  록  ' onClick="history.back();">&nbsp;
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