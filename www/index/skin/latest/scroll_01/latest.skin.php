<?
if (!defined("_GNUBOARD_")) exit; // °³º° ÆäÀÌÁö Á¢±Ù ºÒ°¡ 
// ÃÖ½Å±Û ¼³Á¤
$t_width = 500; // Àü±¤ÆÇ ³ÐÀÌ

?>
<style>
A:link {text-decoration:none; color:#5B5B5B}
A:visited {text-decoration:none; color:#5B5B5B}
A:active {text-decoration:none; color:#5B5B5B}
A:hover {text-decoration:none; color:#BC0000}
A:hover  {color:BC0000;text-decoration:underline}

body, table, tr, td, select,div,input,form,textarea {font-family:µ¸¿ò;font-size:9pt;color:#5B5B5B;}
select,input,form {font-family:µ¸¿ò; font-size:9pt; color:#353535; line-height:150%}
</style> 

<!-- <?=$board[bo_subject]?> (<?=$board[bo_table]?>) Àü±¤ÆÇ ÃÖ½Å±Û ½ÃÀÛ -->
<table border="0" cellpadding="0" cellspacing="0" WIDTH=20% align=left> 
  <!--tr> 
    <td width="32" rowspan="3"> <img src="<?=$latest_skin_path?>/img/left.gif" border="0"></td> 
    <td height=9 background="<?=$latest_skin_path?>/img/top.gif" border="0"></td> 
    <td rowspan="3" width="32"> <a href="<?=$g4[bbs_path]?>/board.php?bo_table=<?=$bo_table?>" onFocus="this.blur()"><img src="<?=$latest_skin_path?>/img/right.gif" border="0"></a></td> 
  </tr-->
  <tr> 
    <td height=18 align="left" bgcolor="#FFFFFF">
	
	<marquee width='<?=$t_width?>' direction='left' scrollamount='3' scrolldelay=100 onmouseover='this.stop();' onmouseout='this.start();'>
        <?
	for ($i=0; $i<count($list); $i++) { 
        echo $list[$i][icon_reply] . " ";
        echo "<a href='{$list[$i][href]}'>";
        if ($list[$i][is_notice])
            echo "<font style='font-family:µ¸¿ò; font-size:9pt; color:#2C88B9;'><strong>{$list[$i][subject]}</strong></font>";
        else
			echo "<img src=$latest_skin_path/img/dia_green.gif border=0 vspace=0 hspace=0>&nbsp;";
            echo "<font style='font-family:µ¸¿ò; font-size:9pt; color:#6A6A6A;'>{$list[$i][subject]}&nbsp;&nbsp;&nbsp;</font>";
        echo "</a>";
       
		}
        ?>
  </marquee>

  
  
  <!--tr> 
    <td background="<?=$latest_skin_path?>/img/bottom.gif" height=7></td> 
  </tr--> 
</table> 

<!-- <?=$board[bo_subject]?> (<?=$board[bo_table]?>) Àü±¤ÆÇ ÃÖ½Å±Û ³¡ -->