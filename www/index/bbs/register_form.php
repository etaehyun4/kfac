<?
include_once("./_common.php");

// �ҹ������� ������ ��ū����
$token = md5(uniqid(rand(), true));
set_session("ss_token", $token);

if ($w == "") {
    // ȸ�� �α����� �� ��� ȸ������ �� �� ����
    // ���â�� �ߴ°��� �������� �Ʒ��� �ڵ�� ��ü
    // alert("�̹� �α������̹Ƿ� ȸ�� ���� �Ͻ� �� �����ϴ�.", "./");
    if ($member[mb_id])
        goto_url($g4[path]);

    // ���۷� üũ
    referer_check();

    if (!$_POST[agree])
        alert("ȸ�����Ծ���� ���뿡 �����ϼž� ȸ������ �Ͻ� �� �ֽ��ϴ�.", "./register.php");

    if (!$_POST[agree2])
        alert("����������ȣ��å�� ���뿡 �����ϼž� ȸ������ �Ͻ� �� �ֽ��ϴ�.", "./register.php");

    // �ֹε�Ϲ�ȣ�� ����Ѵٸ� �ߺ��˻縦 �մϴ�.
    if ($config[cf_use_jumin]) {
        $jumin = sql_password($mb_jumin);
        $row = sql_fetch(" select mb_name from $g4[member_table] where mb_jumin = '$jumin' ");
        if ($row[mb_name]) {
            if ($row[mb_name] == $mb_name)
                alert("�̹� ���ԵǾ� �ֽ��ϴ�.");
            else
                alert("�ٸ� �̸����� ���� �ֹε�Ϲ�ȣ�� �̹� ���ԵǾ� �ֽ��ϴ�.\\n\\n�����ڿ��� ������ �ֽʽÿ�.");
        }

        // �ֹε�Ϲ�ȣ�� 7��° ���ڸ� ����
        $y = substr($mb_jumin, 6, 1);

        // ������ F, M ���� ������.
        // �ֹε�Ϲ�ȣ�� 7��° �ڸ��� Ȧ���̸� ����(Male), ¦���̸� ����(Female)
        $sex = $y % 2 == 0 ? "F" : "M";

        // ������ 8�ڸ��� ����� (���߿� �˻��� ���ϰ� �ϱ� ����)
        // �ֹε�Ϲ�ȣ ���ڸ��� �׳� ���Ϸ� ����� �Ф�
        // �ֹε�Ϲ�ȣ 7��° �ڸ��� ������...
        $birth = substr($mb_jumin, 0, 6);
        if ($y == 9 || $y == 0) // 1800���� (��÷���?)
            $birth = "18" . $birth;
        else if ($y == 1 || $y == 2) // 1900����
            $birth = "19" . $birth;
        else if ($y == 3 || $y == 4) // 2000����
            $birth = "20" . $birth;
        else // ����
            $birth = "xx" . $birth;
    }

    $member[mb_birth] = $birth;
    $member[mb_sex] = $sex;
    $member[mb_name] = $mb_name;

    $g4[title] = "ȸ�� ����";
} 
else if ($w == "u") 
{
    if ($is_admin) 
        alert("�������� ȸ�������� ������ ȭ�鿡�� ������ �ֽʽÿ�.", $g4[path]);

    if (!$member[mb_id])
        alert("�α��� �� �̿��Ͽ� �ֽʽÿ�.", "/index/bbs/login.php?url=/index/pnc_sub02/pnc_point.html");

//    if ($member[mb_id] != $mb_id)
//        alert("�α��ε� ȸ���� �Ѿ�� ������ ���� �ٸ��ϴ�.");

//    if (!($member[mb_password] == sql_password($_POST[mb_password]) && $_POST[mb_password]))
//        alert("�н����尡 Ʋ���ϴ�.");

    // ���� �� �ٽ� �� ������ ���ƿ��� ���� �ӽ÷� ������ ����
    set_session("ss_tmp_password", $_POST[mb_password]);

    //if ($member[mb_id] == "xxx") alert("xxx ���� �Ұ�");

    $g4[title] = "ȸ�� ���� ����";
} else
    alert("w ���� ����� �Ѿ���� �ʾҽ��ϴ�.");

// ȸ�������� ���
$mb_icon = "$g4[path]/data/member/".substr($member[mb_id],0,2)."/$member[mb_id].gif";
$member_skin_path = "$g4[path]/skin/member/ajax_basic";

//include_once("./_head.php");
include_once("$g4[path]/head.sub.php");
include_once("$g4[path]/lib/outlogin.lib.php");
include_once("$g4[path]/lib/poll.lib.php");
include_once("$g4[path]/lib/visit.lib.php");
include_once("$g4[path]/lib/connect.lib.php");
include_once("$g4[path]/lib/popular.lib.php");
include_once("./norobot.inc.php"); // �ڵ���Ϲ���
include_once("$member_skin_path/register_form.skin.php");
//include_once("../skin/member/ajax_basic/register_form.skin.php");
include_once("./_tail.php");


?>