<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 

// 자신만의 코드를 넣어주세요.



$wr_9 = "$ext9_00|$ext9_01|$ext9_02|$ext9_03|$ext9_04|$ext9_05|$ext9_06|$ext9_07|$ext9_08|$ext9_09|";
$sql9 = " update $write_table set wr_9 = '$wr_9' where wr_id = '$wr_id' ";
sql_query($sql9);

$wr_10 = "$ext10_00|$ext10_01|$ext10_02|$ext10_03|";
$sql10 = " update $write_table set wr_10 = '$wr_10' where wr_id = '$wr_id' ";
sql_query($sql10);


if($w != 'u') {
alert("성공적으로 메일이 전송되었습니다. 빠른시간내에 연락드리겠습니다.", $g4[path]); 
}

?>

<!--
<?
if($is_admin){
?>
<script language="JavaScript">
	alert("정상적으로 처리되었습니다.");
	
</script>
<? } else {?>
<script language="JavaScript">
	alert("정상적으로 신청되었습니다.");
	window.location='../';
	
</script>
<? } ?>
-->