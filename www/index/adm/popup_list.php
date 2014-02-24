<?php
$sub_menu = "300300";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");




$sql_common = " FROM ZOTTA_POPUP ";
$sql_search = " WHERE (1) ";
$sql_order  = " ORDER BY nIdx DESC ";

$sql = " SELECT COUNT(*) as cnt
         $sql_common
         $sql_order ";

$row = sql_fetch($sql);
$total_count = $row[cnt];

$rows = $config[cf_page_rows];
$total_page  = ceil($total_count / $rows);  // 전체 페이지 계산
if ($page == "") { $page = 1; }             // 페이지가 없으면 첫 페이지 (1 페이지)
$from_record = ($page - 1) * $rows;         // 시작 열을 구함

$sql = " SELECT * 
          $sql_common
          $sql_search
          $sql_order
          limit $from_record, $rows ";
$result = sql_query($sql);

$listall = "<a href='$_SERVER[PHP_SELF]'>처음</a>";

$g4[title] = "팝업관리";
include_once("./admin.head.php");
?>


<table width="100%" cellpadding="3" cellspacing="1">
<tr>
    <td width="50%" align="left"><?=$listall?> (등록된 팝업수 : <?=number_format($total_count)?>개)</td>
    <td width="50%" align="right"></td>
</tr>
</table>


<table width="100%" cellpadding="0" cellspacing="1" border="0">
<tr><td colspan='5' class='line1'></td></tr>
<tr class="bgcol1 bold col1 ht center">
    <td width="15%">등록일</td>
    <td width="40%">제 목</td>
    <td width="25%">게시기간</td>
    <td width="10%">보이기</td>
    <td width="10%"><a href='popup_form.php'><img src='./img/icon_insert.gif' border='0' border='0'></a></td>
</tr>
<tr><td colspan='5' class='line2'></td></tr>

<?php
for ($i=0; $row=sql_fetch_array($result); $i++)
{
    $szRegDate = date('Y/m/d', $row[nDate]);
    $szSubject = cut_str($row[szSubject], 50);
    $szSDay    = date('Y/m/d', $row[nStartDate]);
    $szEDay    = date('Y/m/d', $row[nEndDate]);
    $szView    = $row[szView];

    echo "
    <tr class='list$list col1 ht center'>
        <td>$szRegDate</td>
        <td align='left'>$szSubject</td>
        <td>$szSDay ~ $szEDay</td>
        <td>$szView</td>
        <td>
            <a href='./popup_form.php?page=$page&no=$row[nIdx]'><img src='./img/icon_modify.gif' border='0' border='0'></a>
            <a href='./popup_process.php?szMode=DELETE&page=$page&no=$row[nIdx]&imgurl=$row[szImage]' onClick=\"return confirm('정말 삭제 하시겠습니까?\\n\\n한번 삭제된 내역은 복구할 수 없습니다.')\"><img src='./img/icon_delete.gif' border='0'></a></td>
    </tr>
    ";
}

if ($i == 0) {
    echo "
    <tr><td colspan='5' align='center' height='100' bgcolor='#ffffff'>자료가 없습니다.</td></tr>
    "; 
}
?>

</table>


<?php
$pagelist = get_paging($config[cf_write_pages], $page, $total_page, "$_SERVER[PHP_SELF]?$qstr&page=");
?>


<table width="100%" cellpadding="3" cellspacing="1">
<tr>
    <td width="70%"></td>
    <td width="30%" align="right"><?=$pagelist?></td>
</tr>
</table>

<?php
include_once("./admin.tail.php");
?>