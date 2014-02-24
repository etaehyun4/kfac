<?php
$sub_menu = "300300";
include_once("./_common.php");

auth_check($auth[$sub_menu], "r");




switch ($_GET[szMode])
{
# 등록
case "INSERT":

    $nNowDate = time();
    $szStart  = mktime(0,0,1, substr($_POST[szStart],4,2), substr($_POST[szStart],6,2), substr($_POST[szStart],0,4));
    $szEnd    = mktime(23,59,59,substr($_POST[szEnd],4,2),substr($_POST[szEnd],6,2),substr($_POST[szEnd],0,4));

    if ($szStart > $szEnd)
    {
        alert("종료일이 시작일보다 빠릅니다."); 
    }

    $sql_common = " 
                nStartDate  = '$szStart',
                nEndDate    = '$szEnd',
                nWidth      = '$_POST[nWidth]',
                nHeight     = '$_POST[nHeight]',
                nLeft       = '$_POST[nLeft]',
                nRight      = '$_POST[nRight]',
                nOptions    = '$_POST[nOptions]',
                szSubject   = '$_POST[szSubject]',
                szMemo      = '$_POST[szMemo]',
                szView      = '$_POST[szView]',
                nDate       = '$nNowDate'
                ";

    $sql = " INSERT INTO ZOTTA_POPUP SET $sql_common ";

    sql_query($sql);
    goto_url("./popup_list.php");

    break;


case "MODIFY" :

    $szStart  = mktime(0,0,1, substr($_POST[szStart],4,2), substr($_POST[szStart],6,2), substr($_POST[szStart],0,4));
    $szEnd    = mktime(23,59,59,substr($_POST[szEnd],4,2),substr($_POST[szEnd],6,2),substr($_POST[szEnd],0,4));

    if ($szStart > $szEnd)
    {
        alert("종료일이 시작일보다 빠릅니다."); 
    }

    $sql_common = " 
                nStartDate  = '$szStart',
                nEndDate    = '$szEnd',
                nWidth      = '$_POST[nWidth]',
                nHeight     = '$_POST[nHeight]',
                nLeft       = '$_POST[nLeft]',
                nRight      = '$_POST[nRight]',
                nOptions    = '$_POST[nOptions]',
                szSubject   = '$_POST[szSubject]',
                szMemo      = '$szMemo',
                szView      = '$_POST[szView]'
                ";

    $sql = " UPDATE ZOTTA_POPUP SET $sql_common WHERE nIdx='$_GET[no]' ";

    sql_query($sql);
    goto_url("./popup_list.php?page=$_GET[page]");

    break;

case "DELETE" :

    if ($imgurl) {
        @unlink("$g4[path]/data/popup/$_GET[imgurl]");
    }

    sql_query(" DELETE FROM ZOTTA_POPUP WHERE nIdx='$_GET[no]' ");
    goto_url("./popup_list.php?page=$_GET[page]");

    break;
}

?>