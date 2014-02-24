<?
include_once("./_common.php");

// 로그인중인 경우 회원가입 할 수 없습니다.
if ($member[mb_id]) 
    alert_close("로그인중인 경우 회원가입 할 수 없습니다.");

// 세션을 지웁니다.
set_session("ss_mb_reg", "");

$member_skin_path = "$g4[path]/skin/member/$config[cf_member_skin]";

$g4[title] = "회원가입약관";
//include_once("./_head.php");
include_once("$g4[path]/head.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/poll.lib.php");
include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");
include_once("$member_skin_path/register.skin.php");
//include_once("./_tail.php");
?>
