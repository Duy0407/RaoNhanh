<?
include("config.php");

$usc_type = getValue('usc_type', 'int', 'POST', '');
// echo $usc_type;die;

$regex_email = ("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/");
$regex_sdt = ("/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/");

$ho_ten = getValue('ho_ten', 'str', 'POST', '');
$ho_ten = trim($ho_ten);
$ho_ten = replaceMQ($ho_ten);
$ho_ten = sql_injection_rp($ho_ten);

$dia_chi = getValue('dia_chi', 'str', 'POST', '');
$dia_chi = trim($dia_chi);
$dia_chi = replaceMQ($dia_chi);
$dia_chi = sql_injection_rp($dia_chi);

$dien_thoai = getValue('dien_thoai', 'str', 'POST', '');
$dien_thoai = trim($dien_thoai);
// $dien_thoai = $_POST['dien_thoai'];

$email_lh = getValue('email_lh', 'str', 'POST', '');
$email_lh = trim($email_lh);
$email_lh = replaceMQ($email_lh);
$email_lh = sql_injection_rp($email_lh);

$noi_dung = getValue('noi_dung', 'str', 'POST', '');
$noi_dung = trim($noi_dung);
$noi_dung = replaceMQ($noi_dung);
$noi_dung = sql_injection_rp($noi_dung);
$noi_dung = removeEmoji($noi_dung);

$ngay = strtotime(date('Y-m-d H:i:s', time()));

if (preg_match($regex_sdt, $dien_thoai) && preg_match($regex_email, $email_lh)) {
    if($ho_ten != '' && $dia_chi != '' && $dien_thoai != '' && $email_lh != '' && $noi_dung != ''){
        $insert_lienhe = new db_query("INSERT INTO `lienhe`(`lienhe_name`, `lienhe_diachi`, `lienhe_phone`, `lienhe_email`, `lienhe_noidung`, `lienhe_date`,`lienhe_type`) VALUES ('$ho_ten','$dia_chi','$dien_thoai','$email_lh','$noi_dung','$ngay','$usc_type')");
        // echo "INSERT INTO `lienhe`(`lienhe_name`, `lienhe_diachi`, `lienhe_phone`, `lienhe_email`, `lienhe_noidung`, `lienhe_date`,`lienhe_type`) VALUES ('$ho_ten','$dia_chi','$dien_thoai','$email_lh','$noi_dung','$ngay','$usc_type')";
    }else{
        echo "Gửi phản hồi không thành công";
    }
}else{
    echo "Email hoặc số điện thoại không đúng định dạng";
}
    




?>