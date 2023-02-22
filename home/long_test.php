<?
include("config.php");


// @unlink('/pictures/dangtin_bds/1658222595_cate2.png');
// đồ điện tử linh kiện máy tính
// $list_tags = new db_query("SELECT * FROM `key_tags` WHERE `id_parent` = 4341 AND `id_danhmuc` = 37");
// while ($item_tags = mysql_fetch_assoc($list_tags->result)) {
//     $qr_inser = "INSERT INTO `key_tags`(`ten_tags`, `id_parent`, `type_tags`, `id_danhmuc`, `type`)
//             VALUES ('" . $item_tags['ten_tags'] . "','" . $item_tags['id_parent'] . "','" . $item_tags['type_tags'] . "',124,0)";
//     echo $qr_inser.';';
//     echo "<br>";
// }

// đồ điện tử linh kiện điện thoại
// $list_tags = new db_query("SELECT * FROM `key_tags` WHERE `id_parent` = 4342 AND `id_danhmuc` = 37");
// while ($item_tags = mysql_fetch_assoc($list_tags->result)) {
//     $qr_inser = "INSERT INTO `key_tags`(`ten_tags`, `id_parent`, `type_tags`, `id_danhmuc`, `type`)
//             VALUES ('" . $item_tags['ten_tags'] . "','" . $item_tags['id_parent'] . "','" . $item_tags['type_tags'] . "',124,0)";
//     echo $qr_inser . ';';
//     echo "<br>";
// }

// đồ điện tử linh kiện máy tính thiết bị
// $list_tbi = new db_query("SELECT * FROM `nhom_sanpham_chatlieu` WHERE `id_cha` = 4341 AND `id_danhmuc` = 37");
// while ($item_tbi = mysql_fetch_assoc($list_tbi->result)) {
//   $qr_inser = "INSERT INTO `nhom_sanpham_chatlieu`(`name`, `id_cha`, `id_danhmuc`) VALUES ('" . $item_tbi['name'] . "','" . $item_tbi['id_cha'] . "',124)";
//   echo $qr_inser . ';';
//   echo "<br>";
// }

// đồ điện tử linh kiện điện thoại thiết bị
// $list_tbi = new db_query("SELECT * FROM `nhom_sanpham_chatlieu` WHERE `id_cha` = 4342 AND `id_danhmuc` = 37");
// while ($item_tbi = mysql_fetch_assoc($list_tbi->result)) {
//   $qr_inser = "INSERT INTO `nhom_sanpham_chatlieu`(`name`, `id_cha`, `id_danhmuc`) VALUES ('" . $item_tbi['name'] . "','" . $item_tbi['id_cha'] . "',124)";
//   echo $qr_inser . ';';
//   echo "<br>";
// }

// $list_tbi = new db_query("SELECT * FROM `loai_chung` WHERE `id_cha` = 10");
// while ($item_tbi = mysql_fetch_assoc($list_tbi->result)) {
//   $qr_inser = "INSERT INTO `loai_chung`(`ten_loai`, `id_cha`, `id_danhmuc`)
//               VALUES ('".$item_tbi['ten_loai']."','10','79')";
//   echo $qr_inser . ';';
//   echo "<br>";
// }

// $dbanhdd = new db_query("SELECT `new_id`, `new_image`, `new_video` FROM `new` WHERE `new_user_id` = '" . $_COOKIE['UID'] . "' ORDER BY new_id DESC LIMIT 10 ");
// $db_anhdd = $dbanhdd->result_array();
// $db_cloum = array_column($db_anhdd, 'new_image');
// $arr_new = '';
// foreach ($db_cloum as $item_im) {
//   $str_arr = explode(';', $item_im);
//   for ($i = 0; $i < count($str_arr); $i++) {
//     $arr_new .= $str_arr[$i] . ',';
//   }
// }

// echo "<pre>";
// print_r($db_cloum);
// echo "</pre>";

// echo '<br>';
// $arr_new = rtrim($arr_new, ',');
// $arr_new = explode(',', $arr_new);
// $a = array_unique($arr_new);
// echo "<pre>";
// print_r($a);
// echo "</pre>";

// $a = 'Gỗ
// Nhựa
// Sắt
// Inox
// Đá
// Nệm
// Da
// Vải
// Mây
// Khác';
// $abe = explode("\n", $a);
// $coun_dem = count($abe);
// $i = 0;
// $isner_cl = '';
// for ($i = 0; $i < $coun_dem; $i++) {
//    $isner_cl .= "INSERT INTO `nhom_sanpham_chatlieu`(`name`, `id_cha`, `id_danhmuc`) VALUES ('".$abe[$i]."',0,85)" .';'.'<br>';
// };
// print_r($isner_cl);

// echo md5(0983407428452233086632853835832354);

$curl = curl_init();


$data = array(
    'telco' => 'VIETTEL',
    'code' => '4522330866328',
    'serial' => '53835832354',
    'amount' => '100000',
    'request_id' => '',
    'partner_id' => '',
    'sign' => 'cfcd208495d565ef66e7dff9f98764da',
    'command' => 'check',
);

curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://webthe.vn/chargingws/v2',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data,
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json'
    ),
));

$response = curl_exec($curl);
curl_close($curl);
$data_list = json_decode($response, true);
print_r($data_list);
// echo $response;
