<?php
/**
 * �˾����� ���α׷�
**/

// �˾� ��� ��� �������� - ���� //
$nNow       = time();
$szSql      = " 
            SELECT nIdx, nStartDate, nEndDate, nWidth, nHeight, nLeft, nRight , nOptions
            FROM ZOTTA_POPUP 
            WHERE szView='Y' AND ($nNow BETWEEN nStartDate AND nEndDate) 
            ORDER BY nIdx asc
            ";

$input = mysql_query($szSql);

$dataArray = array ();
for ($i = 0; $i < mysql_num_fields($input); $i ++) {
  array_push($dataArray, mysql_field_name($input, $i));
}
$fieldArray =$dataArray;

$returnArray = array ();
$onerowArray = array ();

while ($row = mysql_fetch_row($input)) {
  for ($j = 0; $j < sizeof($fieldArray); $j ++) {
    //$onerowArray = array_merge($onerowArray, array( $fieldArray[$j] => $row[$fieldArray[$j]] ));
    $onerowArray = array_merge($onerowArray, array ($fieldArray[$j] => $row[$j]));
  }
  array_push($returnArray, $onerowArray);
}
$onerowArray = '';
$arrPOP = $returnArray;
//print_r($arrPOP);
// �˾� ��� ��� �������� - �� //
      

# ��Ͽ� ����, ��â ����
for ( $i=0; $i < count($arrPOP); $i++){
  if ($arrPOP[$i]["nIdx"])
  {
    $cookieName = "zotta_popup_idx".$arrPOP[$i]["nIdx"];
      if ($_COOKIE[$cookieName] != "done")
      {
          $szWidth    = $arrPOP[$i][nWidth];
          $szHeight   = $arrPOP[$i][nHeight] + 27;
          $szLeft     = $arrPOP[$i][nLeft];
          $szRight    = $arrPOP[$i][nRight];
          $options    = $arrPOP[$i][nOptions];

          $scrollbar = ($options == "Y") ? "scrollbars=yes" :  "scrollbars=no";
          $optionsS  = $scrollbar.",width=".$szWidth.",height=".$szHeight.",left=".$szLeft.",top=".$szRight.", status=no";

          echo "\r\n<script language='javascript'>\r\n\t window.open( '".$g4[path]."/autoPOPUP.php?idx=".$arrPOP[$i]["nIdx"]."', 'popup_nIdx".$arrPOP[$i]["nIdx"]."', '".$optionsS."'); \r\n</script>";
      }
  }
}
?>