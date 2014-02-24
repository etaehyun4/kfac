<?
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

function get_member_level($mb_id,$mb_point) {
    global $g4;

		$is_admin = is_admin($mb_id);
		$point = $mb_point;
		$level = ceil($point / 2500); //반올림을 하여 레벨을 구함.
		if($mb_id)if($level <= 1) $level = 1; // 위 반올림에서 렙1미만 회원에게 레벨1을 줌, (비회원은 0)
		if ($level > 59) $level = 59; // 최대 레벨 설정
		if($is_admin == 'super') $level = 60; //관리자는 최고 레벨
		$no = sprintf("%03d", $level);
		return "<img src='$g4[path]/img/l1/{$no}.gif' align=absmiddle hspace=1 title='등급 {$level} / ".number_format($mb_point)."점'>";

}

//포인트 상태바
function exp_bar($mb_id,$mb_point,$option) {
		global $g4;
		
		$is_admin = is_admin($mb_id);
		$point = $mb_point;
		$level = ceil($point / 2500); //반올림을 하여 레벨을 구함.
		if($mb_id)if($level <= 1){$level = 1;} // 반올림에서 렙1미만 회원에게 레벨1을 줌, (비회원은 0)
		if ($level > 59){$level = 59;} //최대 레벨 설정
		if($is_admin == 'super'){$level = 60;} //관리자는 최고 레벨
		$no = sprintf("%03d", $level);
		$max = $level * 2500;
		if(!$level){$max=2500; $a_max=2500; $a_min=0;}else{$a_max = (int)($max / $level);$a_min = (int)($point - (2500 * ($level-1)));} //레벨이 없으면 최대값, 있으면 레벨에 맞는 최대값을 구함

		if($is_admin == 'super'){$max=2500; $a_max=2500; $a_min=0;} //관리자는 기본세팅
		
	    $bar = (int)($a_min / $a_max * 100);
		if($bar > 100) $bar = 0;
        $graph = $bar."%"; //등급, 경험치바 표시
		if($level == 0){$level = "--";} // 레벨값을 이용해 레벨대신 표시
		if($level == 60){$level = "admin";} // 레벨값을 이용해 레벨대신 표시
		if($option == 0){
			echo "<table width='80' border='0' cellspacing='0' cellpadding='0'><tr><td><font style='font-size:9px;'>Level. $level</font></td><td align='right'><font style='font-size:9px;'>$graph</font></td></tr></table><table width='80' border='0' cellspacing='0' cellpadding='0' background='$g4[path]/img/exp_bar.gif'><tr height='1'><td rowspan='3' width='1'></td><td width='77'></td><td rowspan='3' width='2'></td></td></tr><tr height='6'><td><img src='$g4[path]/img/exp_in.gif' width='$graph' height='6'></td></tr><tr height='2'><td></td></tr></table>";
		}
		if($option == 1){
			echo "<table width='115' border='0' cellspacing='0' cellpadding='0'><td width='30'><img src='http://reapier.cdn1.cafe24.com/l1/{$no}.gif' title='등급 {$level} / ".number_format($mb_point)."점'></td><td width='3'></td><td width='80'><table width='80' border='0' cellspacing='0' cellpadding='0'><tr><td><font style='font-size:9px;'>Level. $level</font></td><td align='right'><font style='font-size:9px;'>$graph</font></td></tr></table><table width='80' border='0' cellspacing='0' cellpadding='0' background='$g4[path]/img/exp_bar.gif'><tr height='1'><td rowspan='3' width='1'></td><td width='77'></td><td rowspan='3' width='2'></td></td></tr><tr height='6'><td><img src='$g4[path]/img/exp_in.gif' width='$graph' height='6'></td></tr><tr height='2'><td></td></tr></table></td></tr></table>";
		}
		if($option == 2){
			echo "<table width='90' border='0' cellspacing='0' cellpadding='0'><tr><td align='right'><table width='80' border='0' cellspacing='0' cellpadding='0'><tr><td><span style='font-size:9px;'>Lv.$level</span></td><td align='right'><span style='font-size:9px;'>$graph</span></td></tr></table><table width='80' border='0' cellspacing='0' cellpadding='0' background='$g4[path]/img/exp_bar.gif'><tr height='1'><td rowspan='3' width='1'></td><td width='77'></td><td rowspan='3' width='2'></td></td></tr><tr height='6'><td><img src='$g4[path]/img/exp_in.gif' width='$graph' height='6'></td></tr><tr height='2'><td></td></tr></table></td></tr></table>";
		}
		
}
