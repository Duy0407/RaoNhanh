<?
include("config.php");
require_once('../functions/send_mail.php');
$tk = getValue('sdt', 'str', 'POST', '');
$type = getValue('type', 'int', 'POST', '');

$maotp = $mt_rand;
$thoi_gian = strtotime(date('Y-m-d', time()));
$regex_email = ("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/");
$regex_sdt = ("/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/");
if($tk != "" && $type != ""){

    if (preg_match($regex_sdt, $tk) == true || preg_match($regex_email, $tk) == true) {
        if(preg_match($regex_sdt, $tk) == true){
            $query_check = new db_query("SELECT `usc_phone`, `usc_id` FROM `user` WHERE `usc_phone` = '$tk' AND `usc_type` = '$type' ");
            if (mysql_num_rows($query_check->result) > 0) {
                $check_lqmk = new db_query("SELECT `solan_qmk`, `ngay_qmk` FROM `user` WHERE `usc_phone` = '$tk' AND `usc_type` = '$type' ");
                $row_qmk = mysql_fetch_assoc($check_lqmk->result);
                $solan_qmk = $row_qmk['solan_qmk'];
                $ngay_qmk = $row_qmk['ngay_qmk'];
                if ($ngay_qmk == $thoi_gian) {
                    if ($solan_qmk >= 2) {
                        echo "Số lần quên mật khẩu của bạn đã hết, hãy chờ đến ngày mai bạn hãy vào lại nhé";
                    } else {
                        $update_code = new db_query("UPDATE `user` SET `otp_sdt`= '$maotp', `solan_qmk` = solan_qmk + 1, `ngay_qmk` = '$thoi_gian' WHERE `usc_phone` = '$tk'
                                            AND `usc_type` = '$type' ");
                        if ($type == 5) {
                            $ch = curl_init('http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_post_json/');
                            $payload = '{
                                "ApiKey": "CD013D8EF367403A13DB9695679A32",
                                "Content": "TIMVIEC365 mã OTP nhà tuyển dụng tại https://timviec365.vn/ : ' . $maotp . '",
                                "Phone": "' . $tk . '",
                                "SecretKey": "80A7A1845725B74E5766A5BFB0B167",
                                "IsUnicode": "1",
                                "Brandname": "TIMVIEC365",
                                "SmsType": "2"
                            }';
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $result = curl_exec($ch);
                            curl_close($ch);
                        } else if ($type == 1) {
                            $ch = curl_init('http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_post_json/');
                            $payload = '{
                                "ApiKey": "CD013D8EF367403A13DB9695679A32",
                                "Content": "TIMVIEC365 mã OTP của ứng viên tại https://timviec365.vn/ : ' . $maotp . '",
                                "Phone": "' . $tk . '",
                                "SecretKey": "80A7A1845725B74E5766A5BFB0B167",
                                "IsUnicode": "1",
                                "Brandname": "TIMVIEC365",
                                "SmsType": "2"
                            }';
                            curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                            $result = curl_exec($ch);
                            curl_close($ch);
                        }
                    }
                } else {
                    $update_code = new db_query("UPDATE `user` SET `otp_sdt`= '$maotp', `solan_qmk` = '1', `ngay_qmk` = '$thoi_gian' WHERE `usc_phone` = '$tk'
                                            AND `usc_type` = '$type' ");
                    if ($type == 5) {
                        $ch = curl_init('http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_post_json/');
                        $payload = '{
                                "ApiKey": "CD013D8EF367403A13DB9695679A32",
                                "Content": "TIMVIEC365 mã OTP nhà tuyển dụng tại https://timviec365.vn/ : ' . $maotp . '",
                                "Phone": "' . $tk . '",
                                "SecretKey": "80A7A1845725B74E5766A5BFB0B167",
                                "IsUnicode": "1",
                                "Brandname": "TIMVIEC365",
                                "SmsType": "2"
                            }';
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $result = curl_exec($ch);
                        curl_close($ch);
                    } else if ($type == 1) {
                        $ch = curl_init('http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_post_json/');
                        $payload = '{
                                "ApiKey": "CD013D8EF367403A13DB9695679A32",
                                "Content": "TIMVIEC365 mã OTP của ứng viên tại https://timviec365.vn/ : ' . $maotp . '",
                                "Phone": "' . $tk . '",
                                "SecretKey": "80A7A1845725B74E5766A5BFB0B167",
                                "IsUnicode": "1",
                                "Brandname": "TIMVIEC365",
                                "SmsType": "2"
                            }';
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
                        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $result = curl_exec($ch);
                        curl_close($ch);
                    }
                }
            } else {
                echo "Thông tin không chính xác";
            }
        }else if(preg_match($regex_email, $tk) == true){
            $query_check = new db_query("SELECT `usc_id`, `usc_name`, `usc_pass`, `usc_type`  FROM `user` WHERE usc_email = '$tk' AND `usc_type` = $type ");
            if (mysql_num_rows($query_check->result) > 0) {

                $update_otp = new db_query("UPDATE `user` SET `otp_sdt` = '$maotp' WHERE `usc_email` = '$tk' AND `usc_type` = $type ");

                $row_dta = mysql_fetch_assoc($query_check->result);
                $name = $row_dta['usc_name'];

                Send_QMK($tk, $name, $maotp);

            } else {
                echo "Thông tin không chính xác";
            }
        }
    }else if(preg_match($regex_sdt, $tk) == false && preg_match($regex_email, $tk) == false){
        echo "Thông tin không chính xác";
    }
}else{
    echo "Thông tin không đầy đủ";
}

?>