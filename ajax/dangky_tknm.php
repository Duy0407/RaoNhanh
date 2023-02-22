<?
include("config.php");

$email_user = getValue('email', 'str', 'POST', '');
$email_user = sql_injection_rp(replaceMQ($email_user));

$password = getValue('password', 'str', 'POST', '');
$password = sql_injection_rp(replaceMQ($password));

$ngay_dky = strtotime(date('Y-m-d H:i:s', time()));

$name_user = getValue('name_user', 'str', 'POST', '');
$name_user = sql_injection_rp(replaceMQ($name_user));

// $birthday = getValue('birthday', 'str', 'POST', '');
// $birthday = strtotime($birthday);

// $gender = getValue('gender', 'int', 'POST', 0);


$Phone = getValue('Phone', 'str', 'POST', '');
$Phone = sql_injection_rp(replaceMQ($Phone));

$city = getValue('city', 'int', 'POST', 0);


// $address = getValue('address', 'str', 'POST', '');
// $address = sql_injection_rp(replaceMQ($address));

$type = 2; //Tài khoản người mua

$list_product = $_POST['list_product'];
$list_product = implode(',', $list_product);

$product_type = $_POST['product_type'];
$product_type = implode(',', $product_type);

if ($Phone != '' && $password != '' && $name_user != '') {
    $query_check = new db_query("SELECT `usc_phone` FROM `user` WHERE `usc_phone` = '$Phone' ");
    if (mysql_num_rows($query_check->result) > 0) {
        echo "Số điện thoại của bạn đã được đăng kí. Vui lòng nhập số điện thoại khác!";
    } else{
        if($email_user != ""){
            $check_email = new db_query("SELECT `usc_phone` FROM `user` WHERE `usc_email` = '$email_user' ");
        }else{
            $check_email = '';
        };

        if(mysql_num_rows($check_email -> result) > 0){
            echo "Email của bạn đã được đăng kí. Vui lòng nhập số email khác!";
        }else{
            $password1 = md5($password . "raonhanh365");

            $query_dk = new db_query("INSERT INTO `user`(`usc_id`, `usc_name`, `usc_pass`, `usc_phone`,`usc_authentic`, `usc_email`,
                    `usc_type`, `usc_time`, `usc_city`, `usc_category`,`usc_cate_id`) VALUES ('','$name_user','$password1',
                    '$Phone','1','$email_user','$type','$ngay_dky','$city', '$list_product', '$product_type')");

            $id_dn = new db_query("SELECT LAST_INSERT_ID() AS id");
            $id = mysql_fetch_assoc($id_dn->result)['id'];

            // đồng bộ id chat vào raonhanh365
            $data_rp = get_id_chat365($Phone, $name_user, md5($password));
            // lưu giá trị đồng bộ chat
            $str_chat = 'id=' . $data_rp['data']['userId'] . '&pass=' . md5($password) . '&from=raonhanh365.vn';
            $id_chat = $data_rp['data']['userId'];
            if ($data_rp['data']['secretCode'] == '') {
                $update = new db_query("UPDATE user SET `chat365_id` = " . $data_rp['data']['userId'] . " WHERE `usc_id`='" . $id . "'");
            } else {
                $update = new db_query("UPDATE user SET `chat365_id` = " . $data_rp['data']['userId'] . ", `chat365_secret` = '" . $data_rp['data']['secretCode'] . "' WHERE `usc_id` ='" . $id . "'");
            }

            setcookie('UT', $type, time() + 24 * 3600, '/');
            setcookie('UID', $id, time() + 24 * 3600, '/');
            setcookie('PHPSESPASS', $password1, time() + 24 * 3600, '/');

            setcookie('chat365', $str_chat, time() + 24 * 3600, '/');
            setcookie('id_chat365', $id_chat, time() + 24 * 3600, '/');
        }
    }
} else {
    echo "Thông tin không đầy đủ";
}
