<?
include_once("./_common.php");

$mb = get_member($_SESSION[ss_mb_reg]);
// ȸ�������� ���ٸ� �ʱ� �������� �̵�
if (!$mb[mb_id]) 
    goto_url($g4[path]);

//$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";

$member_skin_path = "$g4[path]/skin/member/ajax_basic";

$g4[title] = "ȸ�����԰��";
include_once("$g4[path]/head.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/poll.lib.php");
include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");
//include_once("./_head.php");
include_once("$member_skin_path/register_result.skin.php");
//include_once("./_tail.php");

?>
<script>
opener.document.location.reload();
</script>