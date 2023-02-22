<?
include("../home/config.php");
session_start();
$code  = getValue('code', 'int', 'POST', 0);
$code  = (int)$code;


if (!isset($_SESSION["code"])) {
    $_SESSION['code'] = '';
}
$data = ['result' => false];
if ($code != 0 && $_SESSION['code'] != '') {
    if ($code === (int)$_SESSION['code']) {
        $data = ['result' => true];
    }
}
unset($code);
echo json_encode($data, JSON_UNESCAPED_UNICODE);
