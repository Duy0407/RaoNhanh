<?
include("config.php");

$user_id = getValue('user_id', 'int', 'POST', 0);
$user_id = trim($user_id);

$user_type = getValue('user_type', 'int', 'POST', 0);
$user_type = trim($user_type);

$fil_name = $_FILES['files']['name'];
$fil_name = trim($fil_name);
$fil_name = str_replace(' ', '_', $fil_name);

$filename = '/pictures/avt_dangtin/'. time() . '_' . $fil_name;

$file_name = time() . '_' . $fil_name;

$filetmp_name = $_FILES['files']['tmp_name'];
// $filesize = $_FILES['files']['size'] / 1024;
// $filesize = sprintf("%.2f", $filesize);
// $filetype = $_FILES['files']['type'];

if($fil_name != ''){
    $dir = "../pictures/avt_dangtin/";
    move_uploaded_file($filetmp_name, $dir . '/' . $file_name);
    $up_img = new db_query("UPDATE `user` SET `usc_logo` = '$filename' WHERE `usc_id` = '$user_id' AND `usc_type` = '$user_type'");
}else{
    echo "Ảnh Lỗi";
}

?>