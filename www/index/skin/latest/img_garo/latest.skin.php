<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
if (!function_exists("imagecopyresampled")) alert("GD 2.0.1 이상 버전이 설치되어 있어야 사용할 수 있는 갤러리 게시판 입니다.");

$img_width = '75'; //썸네일 가로길이
$img_height = '57'; //썸네일 세로길이
$img_quality = '90'; //퀼리티 100이하로 설정
$data_path = $g4[path]."/data/file/$bo_table";
$thumb_path = $data_path.'/thumb'; //썸네일 이미지 생성 디렉토리
$ym = date("ym", $g4[server_time]);

@mkdir($thumb_path, 0707);
@chmod($thumb_path, 0707);
?>

<?  for ($i=0; $i<count($list); $i++) {
	$img = "";
    $thumb = $thumb_path.'/'.$list[$i][wr_id];
    // 썸네일 이미지가 존재하지 않는다면
    if (!file_exists($thumb)) {
        $file = $list[$i][file][0][path] .'/'. $list[$i][file][0][file];
        // 업로드된 파일이 이미지라면
        if (preg_match("/\.(jp[e]?g|gif|png)$/i", $file) && file_exists($file)) {
            $size = getimagesize($file);
            if ($size[2] == 1)
                $src = imagecreatefromgif($file);
            else if ($size[2] == 2)
                $src = imagecreatefromjpeg($file);
            else if ($size[2] == 3)
                $src = imagecreatefrompng($file);
            else
                break;

            $rate = $img_width / $size[0];
            $height = (int)($size[1] * $rate);

            // 계산된 썸네일 이미지의 높이가 설정된 이미지의 높이보다 작다면
            if ($height < $img_height)
                // 계산된 이미지 높이로 복사본 이미지 생성
                $dst = imagecreatetruecolor($img_width, $height);
            else
                // 설정된 이미지 높이로 복사본 이미지 생성
                $dst = imagecreatetruecolor($img_width, $img_height);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $img_width, $height, $size[0], $size[1]);
            imagejpeg($dst, $thumb_path.'/'.$list[$i][wr_id], $img_quality);
            chmod($thumb_path.'/'.$list[$i][wr_id], 0606);
        } else {
			$edit_img = $list[$i]['wr_content'];
			if (eregi("data/cheditor4/{$ym}/[^<>]*\.(gif|jpg|png|bmp)", $edit_img, $tmp)) { // data/geditor------
				$file = './' . $tmp[0]; // 파일명
				$size = getimagesize($file);
				if ($size[2] == 1)
					$src = imagecreatefromgif($file);
				else if ($size[2] == 2)
					$src = imagecreatefromjpeg($file);
				else if ($size[2] == 3)
					$src = imagecreatefrompng($file);
				else
					break;

				$rate = $img_width / $size[0];
				$height = (int)($size[1] * $rate);

				// 계산된 썸네일 이미지의 높이가 설정된 이미지의 높이보다 작다면
				if ($height < $img_height)
					// 계산된 이미지 높이로 복사본 이미지 생성
					$dst = imagecreatetruecolor($img_width, $height);
				else
					// 설정된 이미지 높이로 복사본 이미지 생성
					$dst = imagecreatetruecolor($img_width, $img_height);
				imagecopyresampled($dst, $src, 0, 0, 0, 0, $img_width, $height, $size[0], $size[1]);
				imagejpeg($dst, $thumb_path.'/'.$list[$i][wr_id], $img_quality);
				chmod($thumb_path.'/'.$list[$i][wr_id], 0606);
			}
	    }
	}
	if (file_exists($thumb)){
        $img = "<a href='{$list[$i][href]}'><img src='$thumb' width='$img_width' height='$img_height' border='0'></a>";
	 } else {
		$img = "<table border='0' cellpadding='0' cellspacing='1' bgcolor='#d9d9d9' align='center'><tr height='$img_height'><td width='$img_width' bgcolor='#ffffff'></td></tr></table>";
		//이미지가 아니네
        if(preg_match("/\.(swf|wma|asf)$/i","$file") && file_exists($file)) $img = "<script>doc_write(flash_movie('$file', 'flash$i', '$img_width', '$img_height', 'transparent'));</script>";
	 }

$p_six = explode("|",$list[$i][wr_6]);
$six01 = $p_six[0];
$six02 = $p_six[1];
$six03 = $p_six[2];
$six04 = $p_six[3];
$six05 = $p_six[4];
$six06 = $p_six[5];
$six07 = $p_six[6];
$six08 = $p_six[7];
$six09 = $p_six[8];
$six10 = $p_six[9];
$six11 = $p_six[10];
$six12 = $p_six[11];
$six13 = $p_six[12];
$six14 = $p_six[13];
$six15 = $p_six[14];
$six16 = $p_six[15];
$six17 = $p_six[16];
$six18 = $p_six[17];
$six19 = $p_six[18];
$six20 = $p_six[19];
$six21 = $p_six[20];
$six22 = $p_six[21];
$six23 = $p_six[22];
$six24 = $p_six[23];
$six25 = $p_six[24];
$six26 = $p_six[25];
$six27 = $p_six[26];
$six28 = $p_six[27];
$six29 = $p_six[28];
$six30 = $p_six[29];

$p_nine = explode("|",$list[$i][wr_9]);
$nine01 = $p_nine[0];
$nine02 = $p_nine[1];
$nine03 = $p_nine[2];
$nine04 = $p_nine[3];
$nine05 = $p_nine[4];
$nine06 = $p_nine[5];
$nine07 = $p_nine[6];
$nine08 = $p_nine[7];
$nine09 = $p_nine[8];
$nine10 = $p_nine[9];
$nine11 = $p_nine[10];
$nine12 = $p_nine[11];
$nine13 = $p_nine[12];
$nine14 = $p_nine[13];
$nine15 = $p_nine[14];
$nine16 = $p_nine[15];

?>
<!--<table border='0' width="<?=$img_width?>" cellpadding='0' cellspacing='0' align='center'><tr height="3"><td></td></tr></table>-->
<table width="98%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style='padding: 5 3 3 3;' width="<?=$img_width?>"><?=$img?></td>
    <td style='padding: 5 3 3 3;' align=left><a href='<?=$list[$i][href]?>'><?=$list[$i][subject]?><BR>
<?
echo "<font color=#FF3300>{$list[$i][ca_name]} ";
if($list[$i][ca_name] == "매매") {
	echo number_format($nine12);
} else if($list[$i][ca_name] == "전세") {
	echo number_format($nine08)." / ".number_format($six01);
} else {
	echo number_format($nine08)." / ".number_format($nine10);
}
?>
</font></a></td>
  </tr>
</table>
<!--<table border='0' width="<?=$img_width?>" cellpadding='0' cellspacing='0' align='center'><tr height="4"><td></td></tr><tr><td class=small align=center></td></tr></table>-->
<?}?>
