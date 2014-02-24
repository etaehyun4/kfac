<?
if (!defined('_GNUBOARD_')) exit;
 
 function gga_image_size($x, $y, $thumbx, $thumby) { 
  if($x > $thumbx) { 
      $overx = ($x - $thumbx) / $x; 
      $x = $thumbx; 
      $y = intval($y - ($y * $overx)); 
  } 
  if($y > $thumby) { 
      $overy = ($y - $thumby) / $y; 
      $y = $thumby; 
      $x = intval($x - ($x * $overy)); 
  } 
    
  return array('x'=>$x, 'y'=>$y); 
} 

?>