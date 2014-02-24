<?
include_once("./_common.php");

$g4[title] = "�ֱ� �Խù�";
include_once("./_head.php");

$sql_common = " from $g4[board_new_table] a, $g4[board_table] b, $g4[group_table] c 
               where a.bo_table = b.bo_table and b.gr_id = c.gr_id and b.bo_use_search = '1' ";
if ($gr_id)
    $sql_common .= " and b.gr_id = '$gr_id' ";
if ($view == "w")
    $sql_common .= " and a.wr_id = a.wr_parent ";
else if ($view == "c")
    $sql_common .= " and a.wr_id <> a.wr_parent ";
if ($mb_id)
    $sql_common .= " and a.mb_id = '$mb_id' ";
$sql_order = " order by a.bn_id desc ";

$sql = " select count(*) as cnt $sql_common ";
$row = sql_fetch($sql);
$total_count = $row[cnt];

$rows = $config[cf_new_rows];
$total_page  = ceil($total_count / $rows);  // ��ü ������ ���
if (!$page) $page = 1; // �������� ������ ù ������ (1 ������)
$from_record = ($page - 1) * $rows; // ���� ���� ����

$group_select = "<select name=gr_id id=gr_id onchange='select_change();'><option value=''>��ü�׷�";
$sql = " select gr_id, gr_subject from $g4[group_table] order by gr_id ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) 
{
    $group_select .= "<option value='$row[gr_id]'>$row[gr_subject]";
}
$group_select .= "</select>";


$list = array();
$sql = " select a.*, b.bo_subject, c.gr_subject, c.gr_id
          $sql_common
          $sql_order
          limit $from_record, $rows ";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) 
{
    $tmp_write_table = $g4[write_prefix] . $row[bo_table];

    if ($row[wr_id] == $row[wr_parent]) // ����
    {
        $comment = "";
        $comment_link = "";
        $row2 = sql_fetch(" select * from $tmp_write_table where wr_id = '$row[wr_id]' ");
        $list[$i] = $row2;

        $name = get_sideview($row2[mb_id], cut_str($row2[wr_name], $config[cf_cut_name]), $row2[wr_email], $row2[wr_homepage]);
        // ������ ��� �ð����� ǥ����
        $datetime = substr($row2[wr_datetime],0,10);
        $datetime2 = $row2[wr_datetime];
        if ($datetime == $g4[time_ymd])
            $datetime2 = substr($datetime2,11,5);
        else
            $datetime2 = substr($datetime2,5,5);

    }
    else // �ڸ�Ʈ
    {
        $comment = "[��] ";
        $comment_link = "#c_{$row[wr_id]}";
        $row2 = sql_fetch(" select * from $tmp_write_table where wr_id = '$row[wr_parent]' ");
        $row3 = sql_fetch(" select mb_id, wr_name, wr_email, wr_homepage, wr_datetime from $tmp_write_table where wr_id = '$row[wr_id]' ");
        $list[$i] = $row2;
        $list[$i][mb_id] = $row3[mb_id];
        $list[$i][wr_name] = $row3[wr_name];
        $list[$i][wr_email] = $row3[wr_email];
        $list[$i][wr_homepage] = $row3[wr_homepage];

        $name = get_sideview($row3[mb_id], cut_str($row3[wr_name], $config[cf_cut_name]), $row3[wr_email], $row3[wr_homepage]);
        // ������ ��� �ð����� ǥ����
        $datetime = substr($row3[wr_datetime],0,10);
        $datetime2 = $row3[wr_datetime];
        if ($datetime == $g4[time_ymd])
            $datetime2 = substr($datetime2,11,5);
        else
            $datetime2 = substr($datetime2,5,5);
    }

    $list[$i][gr_id] = $row[gr_id];
    $list[$i][bo_table] = $row[bo_table];
    $list[$i][name] = $name;
    $list[$i][comment] = $comment;
    $list[$i][href] = "./board.php?bo_table=$row[bo_table]&wr_id=$row2[wr_id]{$comment_link}";
    $list[$i][datetime] = $datetime;
    $list[$i][datetime2] = $datetime2;

    $list[$i][gr_subject] = $row[gr_subject];
    $list[$i][bo_subject] = $row[bo_subject];
    $list[$i][wr_subject] = $row2[wr_subject];
}

$write_pages = get_paging($config[cf_write_pages], $page, $total_page, "?gr_id=$gr_id&view=$view&mb_id=$mb_id&page=");

$new_skin_path = "$g4[path]/skin/new/$config[cf_new_skin]";

echo "<script type=\"text/javascript\" src=\"$g4[path]/js/sideview.js\"></script>\n";

include_once("$new_skin_path/new.skin.php");

include_once("./_tail.php");
?>