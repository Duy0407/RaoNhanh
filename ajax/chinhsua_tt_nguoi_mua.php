<?
include("config.php");

$user_id = getValue('user_id', 'int', 'POST', 0);
$user_id = trim($user_id);

$user_type = getValue('user_type', 'int', 'POST', 0);
$user_type = trim($user_type);

$name = getValue('tieu_de', 'str', 'POST', '');
$name = trim($name);
$name = replaceMQ($name);
$name = sql_injection_rp($name);


$ngay_sinh = $_POST['ngay_sinh'];
$ngay_sinh = strtotime($ngay_sinh);

$gioi_tinh = getValue('gioi_tinh', 'int', 'POST', "");

$tinh_thanh = getValue("tinh_thanh", "int", "POST", "");
$tinh_thanh = replaceMQ($tinh_thanh);

$dia_chi = getValue("dia_chi", "str", "POST", "");
$dia_chi = trim($dia_chi);
$dia_chi = replaceMQ($dia_chi);
$dia_chi = sql_injection_rp($dia_chi);

$danh_muc = $_POST['danh_muc'];

$loai_spham = $_POST['loai_spham'];

if ($name != '' &&  $tinh_thanh != '' && $dia_chi != '' && $danh_muc != '') {
    $ngmua_update = new db_query ("UPDATE `user` SET `usc_name` = '$name', `usc_birth_day` = '$ngay_sinh', `usc_gender` = '$gioi_tinh',
                                    `usc_city` = '$tinh_thanh', `usc_address` = '$dia_chi', `usc_category` = '$danh_muc', `usc_cate_id` = '$loai_spham'
                                    WHERE `usc_id` = '$user_id' AND `usc_type` = '$user_type' ");
} else {
    echo "Thông tin không đầy đủ";
}
