<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ� 

// �ڽŸ��� �ڵ带 �־��ּ���.

//print_r2($_FILES); exit;

$data_path = $g4[path]."/data/file/$bo_table";
$thumb_path = $data_path.'/thumb';

if ($_FILES[bf_file][name][0])
{
    $row = sql_fetch(" select * from $g4[board_file_table] where bo_table = '$bo_table' and wr_id = '$wr_id' and bf_no = '0' ");

    $file = $data_path .'/'. $row[bf_file];
    if (preg_match("/\.(jp[e]?g|gif|png)$/i", $file)) {
        $size = getimagesize($file);
        if ($size[2] == 1)
            $src = imagecreatefromgif($file);
        else if ($size[2] == 2)
            $src = imagecreatefromjpeg($file);
        else if ($size[2] == 3)
            $src = imagecreatefrompng($file);
        else
            break;

        $rate = $thu_width / $size[0];
        $height = (int)($size[1] * $rate);

        @unlink($thumb_path.'/'.$wr_id);
        // ���� ���̰� ������ ���̺��� �۴ٸ�
        if ($height < $thu_height)
            $dst = imagecreatetruecolor($thu_width, $height);
        else
            $dst = imagecreatetruecolor($thu_width, $thu_height);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $thu_width, $height, $size[0], $size[1]);
        imagejpeg($dst, $thumb_path.'/'.$wr_id, $thu_quality);
        chmod($thumb_path.'/'.$wr_id, 0606);
    }
}
?>
