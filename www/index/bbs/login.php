<?
include_once("./_common.php");

$g4[title] = "�α���";
//include_once("./_head.php");

if(strpos($url, "board") !== false || strpos($url, "write.php") !== false )
	include_once("../kfac_login/head.html");

include_once("$g4[path]/head.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/poll.lib.php");
include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");

// �̹� �α��� ���̶��
if ($member[mb_id])
{
//    alert_close("�̹� �α��� �Ǿ����ϴ�.");

?>
<script>
if (confirm(" �α׾ƿ� �Ͻðڽ��ϱ�? ")) 
	{
		self.location = "./logout.php";
		opener.document.location.reload();
	}

javascript:window.close();
</script>
<?


    if ($url)
        goto_url($url);
    else
        goto_url($g4[path]);


}

if ($url)
    $urlencode = urlencode($url);
else
    $urlencode = urlencode($_SERVER[REQUEST_URI]);

//$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";
$member_skin_path = "$g4[path]/skin/member/ajax_basic";

include_once("$member_skin_path/login.skin.php");

//include_once("./_tail.php");

if(strpos($url, "board") !== false || strpos($url, "write.php") !== false )
	include_once("../kfac_sub01/footer.html");
?>
