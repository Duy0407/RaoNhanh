<?
include("../home/config.php");
$name = getValue('name', 'str', 'POST', '');
$birthday = getValue('birthday', 'str', "POST", '');
$birthday = ($birthday != "") ? strtotime($birthday) : 0;
$gender = getValue('gender', 'int', "POST", -1);
$phone = getValue('phone', 'str', 'POST', '');
$city = getValue('city', 'str', 'POST', '');
$address = getValue('address', 'str', 'POST', '');
$cccd = getValue('cccd', 'str', 'POST', '');
$maThue = getValue('maThue', 'str', 'POST', '');
$avaEdit = $_FILES['avaEdit'];
$imgAvaEdit = getValue('imgAvaEdit', 'str', 'POST', '');
$id = (int)$_COOKIE['UID'];
$data = [
    'result' => false,
    'message' => 'Cập nhật thông tin thất bại !',
    'data' => null,
];
if ($name != '' && $phone != '' && $city != '' && $address != '') {
    $checkEdit = new db_query("SELECT usc_name,usc_birth_day,usc_gender,usc_phone,usc_city,usc_address,usc_cmt,usc_logo,usc_tax_code FROM user WHERE usc_id = '$id'");
    if (mysql_num_rows($checkEdit->result) == 1) {
        $row_user = mysql_fetch_assoc($checkEdit->result);
        $sql = "UPDATE user SET usc_name = '$name', usc_birth_day = '$birthday' ,usc_gender = '$gender', usc_phone = '$phone',
                usc_city = '$city', usc_address = '$address', usc_cmt = '$cccd', usc_tax_code= '" . $maThue . "' ,usc_update_time = '" . time() . "'
                WHERE usc_id = '$id'";
        $editProf = new db_query($sql);
        if (isset($_FILES['avaEdit']) && $_FILES['avaEdit']['name'][0] != '') {
            $filename = $_FILES['avaEdit']['name'][0];
            $file_size = $_FILES['avaEdit']['size'][0];
            $file_ext = strtolower(end(explode('.', $_FILES['avaEdit']['name'][0])));
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
                move_uploaded_file($_FILES['avaEdit']['tmp_name'][0], $target);
                if($row_user['usc_logo'] != ''){
                    unlink($row_user['usc_logo']);
                }
                $sql_update_logo = new db_query("Update `user` SET usc_logo = '" . $target . "' WHERE usc_id = '" . $id . "' ");
            }
        }
        $data = [
            'result' => true,
            'message' => 'Cập nhật thông tin thành công',
            'data' => [
                'id' => $id,
                'userType' => 1,
            ],
        ];
    }
}
echo json_encode($data);
