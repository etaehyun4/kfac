<? ob_start(); ?>
<?

include_once("./_common.php");
include_once("$g4[path]/lib/latest.lib.php");
include_once("$g4[path]/head.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/poll.lib.php");
include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");

if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가 
//최고관리자와 일반의 다른헤더사용하기 head 불러오기 
if ($member[mb_level] >= 10) { 
include_once ("$g4[admin_path]/admin.tail.php"); 
} else { 
include_once("$g4[admin_path]/HTML/sub_Board/Footer.html"); 
} 
?> 
