<?
include("config.php");
$email = getValue('email', 'str', 'POST', '');
$phone = getValue('phone', 'str', 'POST', '');

$regex_email = ("/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/");

$regex_sdt = ("/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/");

if($email != "" && $phone != ""){
    if (preg_match($regex_sdt, $phone) && preg_match($regex_email, $email)) {
        $check_tt = new db_query("SELECT `usc_id` FROM `user` WHERE `usc_phone` = '".$phone. "' OR `usc_email` = '".$email."' ");

        if(mysql_num_rows($check_tt -> result) > 0){
            echo "Sô điện thoại hoặc email đăng ký đã tồn tại";
        }else{
            echo "";
        }
    }else{
        echo "Định dạnh số điện thoại hoặc email không đúng";
    }
}


?>