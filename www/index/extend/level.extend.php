<?
if (!defined("_GNUBOARD_")) exit; // ���� ������ ���� �Ұ�

function get_member_level($mb_id,$mb_point) {
    global $g4;

		$is_admin = is_admin($mb_id);
		$point = $mb_point;
		$level = ceil($point / 2500); //�ݿø��� �Ͽ� ������ ����.
		if($mb_id)if($level <= 1) $level = 1; // �� �ݿø����� ��1�̸� ȸ������ ����1�� ��, (��ȸ���� 0)
		if ($level > 59) $level = 59; // �ִ� ���� ����
		if($is_admin == 'super') $level = 60; //�����ڴ� �ְ� ����
		$no = sprintf("%03d", $level);
		return "<img src='$g4[path]/img/l1/{$no}.gif' align=absmiddle hspace=1 title='��� {$level} / ".number_format($mb_point)."��'>";

}

//����Ʈ ���¹�
function exp_bar($mb_id,$mb_point,$option) {
		global $g4;
		
		$is_admin = is_admin($mb_id);
		$point = $mb_point;
		$level = ceil($point / 2500); //�ݿø��� �Ͽ� ������ ����.
		if($mb_id)if($level <= 1){$level = 1;} // �ݿø����� ��1�̸� ȸ������ ����1�� ��, (��ȸ���� 0)
		if ($level > 59){$level = 59;} //�ִ� ���� ����
		if($is_admin == 'super'){$level = 60;} //�����ڴ� �ְ� ����
		$no = sprintf("%03d", $level);
		$max = $level * 2500;
		if(!$level){$max=2500; $a_max=2500; $a_min=0;}else{$a_max = (int)($max / $level);$a_min = (int)($point - (2500 * ($level-1)));} //������ ������ �ִ밪, ������ ������ �´� �ִ밪�� ����

		if($is_admin == 'super'){$max=2500; $a_max=2500; $a_min=0;} //�����ڴ� �⺻����
		
	    $bar = (int)($a_min / $a_max * 100);
		if($bar > 100) $bar = 0;
        $graph = $bar."%"; //���, ����ġ�� ǥ��
		if($level == 0){$level = "--";} // �������� �̿��� ������� ǥ��
		if($level == 60){$level = "admin";} // �������� �̿��� ������� ǥ��
		if($option == 0){
			echo "<table width='80' border='0' cellspacing='0' cellpadding='0'><tr><td><font style='font-size:9px;'>Level. $level</font></td><td align='right'><font style='font-size:9px;'>$graph</font></td></tr></table><table width='80' border='0' cellspacing='0' cellpadding='0' background='$g4[path]/img/exp_bar.gif'><tr height='1'><td rowspan='3' width='1'></td><td width='77'></td><td rowspan='3' width='2'></td></td></tr><tr height='6'><td><img src='$g4[path]/img/exp_in.gif' width='$graph' height='6'></td></tr><tr height='2'><td></td></tr></table>";
		}
		if($option == 1){
			echo "<table width='115' border='0' cellspacing='0' cellpadding='0'><td width='30'><img src='http://reapier.cdn1.cafe24.com/l1/{$no}.gif' title='��� {$level} / ".number_format($mb_point)."��'></td><td width='3'></td><td width='80'><table width='80' border='0' cellspacing='0' cellpadding='0'><tr><td><font style='font-size:9px;'>Level. $level</font></td><td align='right'><font style='font-size:9px;'>$graph</font></td></tr></table><table width='80' border='0' cellspacing='0' cellpadding='0' background='$g4[path]/img/exp_bar.gif'><tr height='1'><td rowspan='3' width='1'></td><td width='77'></td><td rowspan='3' width='2'></td></td></tr><tr height='6'><td><img src='$g4[path]/img/exp_in.gif' width='$graph' height='6'></td></tr><tr height='2'><td></td></tr></table></td></tr></table>";
		}
		if($option == 2){
			echo "<table width='90' border='0' cellspacing='0' cellpadding='0'><tr><td align='right'><table width='80' border='0' cellspacing='0' cellpadding='0'><tr><td><span style='font-size:9px;'>Lv.$level</span></td><td align='right'><span style='font-size:9px;'>$graph</span></td></tr></table><table width='80' border='0' cellspacing='0' cellpadding='0' background='$g4[path]/img/exp_bar.gif'><tr height='1'><td rowspan='3' width='1'></td><td width='77'></td><td rowspan='3' width='2'></td></td></tr><tr height='6'><td><img src='$g4[path]/img/exp_in.gif' width='$graph' height='6'></td></tr><tr height='2'><td></td></tr></table></td></tr></table>";
		}
		
}
