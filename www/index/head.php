<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once("$g4[path]/head.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/poll.lib.php");
include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");

//print_r2(get_defined_constants());

// 사용자 화면 상단과 좌측을 담당하는 페이지입니다.
// 상단, 좌측 화면을 꾸미려면 이 파일을 수정합니다.

//$table_width = 1004;
?>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><table width="1004" border="0" cellspacing="0" cellpadding="0">
		<tr>
			<td height="200"></td>
		</tr>

       <tr>
         			<td>
<table width="220" cellspacing="0" cellpadding="0" align="center" valign="middle">
		<tr>
			<td width="43" height="57"></td>
			<!-- 로고 -->
			<td width="220"><a href="<?=$g4['path']?>/"><img src="<?=$g4['path']?>/img/logo_admin.jpg" width="220" height="57" border="0"></a></td>
			<td>
				<table width=100% border=0 cellpadding=0 cellspacing=0>
				<tr>
					<td>&nbsp;</td>
				</tr>
				</table>
			</td>
			<td width="390" align="right">
			   </td>
			<td width="35"></td>
		</tr>
		</table>


</td>
          <td width="220"> <?=outlogin("basic"); // 외부 로그인 ?></td>
			<td width="20"></td>
          <td>
        <?=visit("basic"); // 방문자수 ?>

        <div style='height:10px;'></div>

        <?=connect(); // 현재 접속자수 ?></td>
        </tr>
      </table></td>
  </tr>
</table>

 <td width=683 valign=top>

