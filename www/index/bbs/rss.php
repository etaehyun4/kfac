<?
include_once("./_common.php");

// Ư������ ��ȯ
function specialchars_replace($str, $len=0) {
    if ($len) {
        $str = substr($str, 0, $len);
    }

    $str = preg_replace("/&/", "&amp;", $str);
    $str = preg_replace("/</", "&lt;", $str);
    $str = preg_replace("/>/", "&gt;", $str);
    return $str;
}

$sql = " select gr_id, bo_subject, bo_page_rows, bo_read_level, bo_use_rss_view from $g4[board_table] where bo_table = '$bo_table' ";
$row = sql_fetch($sql);
$subj2 = specialchars_replace($row[bo_subject], 255);
$lines = $row[bo_page_rows];

// ��ȸ�� �бⰡ ������ �Խ��Ǹ� RSS ����
if ($row[bo_read_level] >= 2) {
    echo "��ȸ�� �бⰡ ������ �Խ��Ǹ� RSS �����մϴ�.";
    exit;
}

// RSS ��� üũ
if (!$row[bo_use_rss_view]) {
    echo "RSS ���Ⱑ �����Ǿ� �ֽ��ϴ�.";
    exit;
}

Header("Content-type: text/xml"); 
header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache");   

$sql = " select gr_subject from $g4[group_table] where gr_id = '$row[gr_id]' ";
$row = sql_fetch($sql);
$subj1 = specialchars_replace($row[gr_subject], 255);

echo "<?xml version=\"1.0\" encoding=\"$g4[charset]\"?>\n";
echo "<rss version=\"2.0\" xmlns:dc=\"http://purl.org/dc/elements/1.1/\">\n";
echo "<channel>\n";
echo "<title>".specialchars_replace("$config[cf_title] > $subj1 > $subj2")."</title>\n";
echo "<link>".specialchars_replace("$g4[url]/$g4[bbs]/board.php?bo_table=$bo_table")."</link>\n";
echo "<description>�׽�Ʈ ���� 0.2 (2004-04-26)</description>\n";
echo "<language>ko</language>\n";

$sql = " select wr_id, wr_subject, wr_content, wr_name, wr_datetime, wr_option 
           from $g4[write_prefix]$bo_table 
          where wr_is_comment = 0 
            and wr_option not like '%secret%'
          order by wr_num, wr_reply limit 0, $lines ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    $file = "";

    if (strstr($row[wr_option], 'html'))
        $html = 1;
    else
        $html = 0;

    echo "<item>\n";
    echo "<title>".specialchars_replace($row[wr_subject])."</title>\n";
    echo "<link>".specialchars_replace("$g4[url]/$g4[bbs]/board.php?bo_table=$bo_table&wr_id=$row[wr_id]")."</link>\n";
    echo "<description><![CDATA[".$file . conv_content($row[wr_content], $html)."]]></description>\n";
    echo "<dc:creator>".specialchars_replace($row[wr_name])."</dc:creator>\n";
    $date = $row[wr_datetime];
    // rss ���� ��Ų���� ȣ���ϸ� ��¥�� ����� ǥ�õ��� ����
    //$date = substr($date,0,10) . "T" . substr($date,11,8) . "+09:00";
    $date = date('r', strtotime($date));
    echo "<dc:date>$date</dc:date>\n";
    echo "</item>\n";
}

echo "</channel>\n";
echo "</rss>\n";
?>