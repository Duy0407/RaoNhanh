<?
include("../home/config.php");
include("../functions/send_mail.php");
$email = getValue('email', 'str', "POST", '');
$password = getValue('password', 'str', "POST", '');
$repassword = getValue('repassword', 'str', "POST", '');
$hoten = getValue('hoten', 'str', "POST", '');
$birthday = getValue('birthday', 'str', "POST", '');
$birthday = ($birthday != "") ? strtotime($birthday) : 0;
$gender = getValue('gender', 'int', "POST", -1);
$phone = getValue('phone', 'str', "POST", '');
$cccd = getValue('cccd', 'str', "POST", '');
$ngayCap = getValue('ngayCap', 'str', "POST", '');
$ngayCap = ($ngayCap != "") ? strtotime($ngayCap) : 0;

// page2
$nameshop = getValue('nameshop', 'str', "POST", '');
$lvkd = getValue('lvkd', 'str', "POST", '');
$phoneShop = getValue('phoneShop', 'str', "POST", '');
$websiteShop = getValue('websiteShop', 'str', "POST", '');
$facebookShop = getValue('facebookShop', 'str', "POST", '');
$khuVuc = getValue('khuVuc', 'str', "POST", '');
$addressShop = getValue('addressShop', 'str', "POST", '');
$giayPhepShop = $_FILES['giayPhepShop'];
$captcha = getValue('captcha', 'int', "POST", 0);
//page3
$logoShop = $_FILES['logoShop'];
$data = [
    'result'=>false,
    'message'=>'Có lỗi xảy ra',
    'data'=>null,
];
if ($email != '' && $password != '' && $repassword != '' && $hoten != '' && $phone != '' && $cccd != ''  && $ngayCap != ''
    && $nameshop != '' && $phoneShop != '' && $khuVuc != '' && $addressShop != '' && $captcha != '') {
        $checkEmail = new db_query("SELECT * FROM user WHERE usc_type = 5 AND usc_email = '$email'");
        if (mysql_num_rows($checkEmail->result) == 0) {
            $sql = "INSERT INTO user(usc_email, usc_pass, usc_name, usc_birth_day, usc_gender, usc_phone, usc_cmt, usc_date_cmt, 
            usc_store_name, usc_category, usc_store_phone, usc_website, usc_facename, usc_city, usc_address, usc_time, usc_type)
            VALUES ('" . $email . "', '" . md5($password . "raonhanh365") . "', '" . $hoten . "', '" . $birthday . "', '" . $gender . "', '" . $phone . "', '" . $cccd . "', '" . $ngayCap . "',
            '" . $nameshop . "', '" . $lvkd . "', '" . $phoneShop . "', '" . $websiteShop . "', '" . $facebookShop . "', '" . $khuVuc . "', '" . $addressShop . "', '" . time() . "', '5')";
            $inser_user = new db_query($sql);
            $id = mysql_insert_id();
            if ($id > 0) {
                $str_file = '';
                if (isset($_FILES['giayPhepShop']) && $_FILES['giayPhepShop']['name'] != '') {
                    $name_file = [];
                    for ($i = 0; $i < count($_FILES['giayPhepShop']['name']); $i++) {
                        $filename = $_FILES['giayPhepShop']['name'][$i];
                        $name_file[] = $filename;
                        $file_size = $_FILES['giayPhepShop']['size'][$i];
                        $file_ext = strtolower(end(explode('.', $_FILES['giayPhepShop']['name'][$i])));
                        $array_ext = array('png', 'gif', 'jpeg', 'jpg', 'psd', 'pdf');
                        if (in_array($file_ext, $array_ext) === false) {
                            $message = 'File ảnh không đúng định dạng !';
                        } else if ($file_size > 2097152) {
                            $message = 'Kích thước file không được lớn hơn 2 MB';
                        } else {
                            $path_file = "../uploads/";
                            if (!file_exists($path_file . $id)) {
                                mkdir($path_file . $id, 0777);
                            }
                            $target = $path_file . $id . '/' . $filename;
                            move_uploaded_file($_FILES['giayPhepShop']['tmp_name'][$i], $target);
                        }
                    }
                    $str_file_giayPhep = implode(',', $name_file);
                }
                if (isset($_FILES['logoShop']['name']) && $_FILES['logoShop']['name'][0] != '') {
                    $filename = $_FILES['logoShop']['name'][0];
                    $file_size = $_FILES['logoShop']['size'][0];
                    $file_ext = strtolower(end(explode('.', $_FILES['logoShop']['name'][0])));
                    $array_ext = array('png', 'jpeg', 'jpg');
                    if (in_array($file_ext, $array_ext) === false) {
                        $message = "File ảnh không đúng định dạng !";
                    } else if ($file_size > 2097152) {
                        $message = "Kích thước file không được lớn hơn 2 MB";
                    } else {
                        $day = date("d");
                        $month = date("m");
                        $year = date("Y");
                        $path_file = "../pictures/";
                        if (!file_exists($path_file . $year)) {
                            mkdir($path_file . $year, 0777);
                        }
                        if (!file_exists($path_file . $year . "/" . $month)) {
                            mkdir($path_file . $year . "/" . $month, 0777);
                        }
                        if (!file_exists($path_file . $year . "/" . $month . "/" . $day)) {
                            mkdir($path_file . $year . "/" . $month . "/" . $day, 0777);
                        }
                        $newfile = time() . '.png';
                    
                        $target = $path_file . $year . "/" . $month . "/" . $day . "/" . $newfile;
                        move_uploaded_file($_FILES['logoShop']['tmp_name'][0], $target);
                    }
                }
                $sql_update_logo = new db_query("Update `user` SET usc_logo = '". $target ."', usc_store_license = '". $str_file_giayPhep."' WHERE usc_id = '".$id."' ");
                $code = md5($email);
                $link = $domain."/xac-thuc-tai-khoan-thanh-cong.html?code=".$code."&id=".$id;
                SendRegisterUV($email,$hoten,$link);
                $data = [
                    'result'=>true,
                    'message'=>'Đăng ký thành công',
                    'data'=>[
                        'id'=>$id,
                        'name'=>$hoten,
                        'email'=>$email,
                        'userType'=>5,
                    ],
                ];
                // Đồng bộ tài khoản công ty với base chuyển đổi số
               /*$from            = 'raonhanh365vn';
               $array           = [
                   'email'           => $email,
                   'password'        => md5($password),
                   'company_name'    => $hoten,
                   'company_phone'   => $phone,
                   'company_address' => $addressShop,
                   'from'            => $from,
               ];

               $curl = curl_init();

               curl_setopt_array($curl, array(
                   CURLOPT_RETURNTRANSFER => 1,
                   CURLOPT_URL            => 'https://chamcong.24hpay.vn/api_chat365/register_company.php',
                   CURLOPT_POST           => 1,
                   CURLOPT_SSL_VERIFYPEER => false, //Bỏ kiểm SSL
                   CURLOPT_POSTFIELDS     => $array,
               ));
               $resp = curl_exec($curl);
               $resp = json_decode($resp);
               if ($resp->data->result == true) {
                  $update = new db_query("UPDATE user SET quet_cds = 1 WHERE usc_id='$last_id5'");
               }else {
                  $update = new db_query("UPDATE user SET quet_cds = 2 WHERE usc_id='$last_id5'");
               }
               curl_close($curl);*/
//         ===============
            }
        }
}

echo json_encode($data);

