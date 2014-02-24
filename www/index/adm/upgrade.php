<?
$sub_menu = "100600";
include_once("./_common.php");

check_demo();

if ($is_admin != "super")
    alert("최고관리자만 접근 가능합니다.", $g4[path]);

$g4[title] = "업그레이드";
include_once("./admin.head.php");

// 팝업 생성
$sql = "
DROP TABLE IF EXISTS `ZOTTA_POPUP`;
";

sql_query($sql, FALSE);

$sql = "
CREATE TABLE `ZOTTA_POPUP` (
  `nIdx` mediumint(6) unsigned NOT NULL auto_increment,
  `nWidth` smallint(3) unsigned default NULL,
  `nHeight` smallint(3) unsigned default NULL,
  `nLeft` smallint(3) default NULL,
  `nRight` smallint(3) default NULL,
  `nOptions` varchar(255) default NULL,
  `szSubject` varchar(255) default NULL,
  `szMemo` text,
  `szImage` varchar(255) default NULL,
  `szView` char(1) NOT NULL default 'N',
  `nStartDate` int(12) unsigned default NULL,
  `nEndDate` int(12) unsigned default NULL,
  `nDate` int(12) unsigned default NULL,
  PRIMARY KEY  (`nIdx`)
) TYPE=MyISAM COMMENT='팝업관리'
";
sql_query($sql, FALSE);

echo "UPGRADE 완료.";

include_once("./admin.tail.php");
?>