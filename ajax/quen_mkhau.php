<?
include("config.php");
require_once('../functions/send_mail.php');
$type = getValue('type_p', 'int', 'POST', 0);

$sdt = getValue('sdt', 'str', 'POST', '');
$sdt = trim($sdt);
$sdt = sql_injection_rp($sdt);


$maotp = $mt_rand;
$thoi_gian = strtotime(date('Y-m-d', time()));


$regex_email = ("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/");
$regex_sdt = ("/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/");

if($sdt != '' && $type != 0){
    if (preg_match($regex_email, $sdt) == true || preg_match($regex_sdt, $sdt) == true) {
        if (preg_match($regex_sdt, $sdt) == true) {
            $query_check = new db_query("SELECT `usc_id` FROM `user` WHERE usc_phone = '$sdt' ");
            if (mysql_num_rows($query_check->result) > 0) {
                $check_lqmk = new db_query("SELECT `solan_qmk`, `ngay_qmk` FROM `user` WHERE `usc_phone` = '$sdt' AND `usc_type` = $type ");
                $row_qmk = mysql_fetch_assoc($check_lqmk->result);
                $solan_qmk = $row_qmk['solan_qmk'];
                $ngay_qmk = $row_qmk['ngay_qmk'];

                if ($ngay_qmk < $thoi_gian) {
                    $update_otp = new db_query("UPDATE `user` SET `solan_qmk` = '0', `ngay_qmk` = '$thoi_gian'  WHERE `usc_phone` = '$sdt'
                                                AND `usc_type` = $type ");
                };

                if ($solan_qmk >= 2) {
                    $data = array(
                        'result' => false,
                        'msg' => "Số lần quên mật khẩu của bạn đã hết, hãy chờ đến ngày mai bạn hãy vào lại nhé",
                        'type_data' => null,
                    );
                } else {
                    $update_otp = new db_query("UPDATE `user` SET `otp_sdt` = '$maotp', `solan_qmk` = solan_qmk + 1, `ngay_qmk` = '$thoi_gian'  WHERE `usc_phone` = '$sdt'
                                            AND `usc_type` = $type ");
                    if ($type == 5) {
                        $ch = curl_init('http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_post_json/');
                        $payload = '{
                                "ApiKey": "CD013D8EF367403A13DB9695679A32",
                                "Content": "TIMVIEC365 mã OTP nhà tuyển dụng tại https://timviec365.vn/ : ' . $maotp . '",
                                "Phone": "' . $sdt . '",
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
                                "Phone": "' . $sdt . '",
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
                    };
                    $data = array(
                        'result' => true,
                        'msg' => null,
                        'type_data' => $type,
                    );
                };
            } else {
                $data = array(
                    'result' => false,
                    'msg' => 'Số điện thoại không tồn tại',
                    'type_data' => null,
                );
            }
        } else if (preg_match($regex_email, $sdt) == true) {
            $query_check = new db_query("SELECT `usc_id`, `usc_name`, `usc_pass` FROM `user` WHERE usc_email = '$sdt' ");
            if (mysql_num_rows($query_check->result) > 0) {
                $update_otp = new db_query("UPDATE `user` SET `otp_sdt` = '$maotp' WHERE `usc_email` = '$sdt' AND `usc_type` = $type ");
                $row_dta = mysql_fetch_assoc($query_check->result);
                $id = $row_dta['usc_id'];
                $name = $row_dta['usc_name'];
                $token = $row_dta['usc_pass'];
                Send_QMK($sdt, $name, $maotp);
                $data = array(
                    'result' => true,
                    'msg' => null,
                    'type_data' => $type,
                );
            } else {
                $data = array(
                    'result' => false,
                    'msg' => 'Email không tồn tại',
                    'type_data' => null,
                );
            }
        }
    } else if (preg_match($regex_email, $sdt) == false && preg_match($regex_sdt, $sdt) == false) {
        $data = array(
            'result' => false,
            'msg' => 'Không đúng định dạng',
            'type_data' => null,
        );
    }
}else if($sdt != "" && $type == 0){
    if (preg_match($regex_email, $sdt) == true || preg_match($regex_sdt, $sdt) == true) {
        if (preg_match($regex_sdt, $sdt) == true) {
            $query_check = new db_query("SELECT `usc_id`, `usc_type` FROM `user` WHERE `usc_phone` = '$sdt' AND (`usc_type` = 1 OR `usc_type` = 5) ");
            if (mysql_num_rows($query_check->result) > 0) {
                $check_lqmk = new db_query("SELECT `solan_qmk`, `ngay_qmk` FROM `user` WHERE `usc_phone` = '$sdt' ");
                $row_qmk = mysql_fetch_assoc($check_lqmk->result);
                $solan_qmk = $row_qmk['solan_qmk'];
                $ngay_qmk = $row_qmk['ngay_qmk'];
                $lay_ustype = mysql_fetch_assoc($query_check->result)['usc_type'];

                if ($ngay_qmk < $thoi_gian) {
                    $update_otp = new db_query("UPDATE `user` SET `solan_qmk` = '0', `ngay_qmk` = '$thoi_gian'  WHERE `usc_phone` = '$sdt' ");
                };

                if ($solan_qmk >= 2) {
                    $data = array(
                        'result' => false,
                        'msg' => "Số lần quên mật khẩu của bạn đã hết, hãy chờ đến ngày mai bạn hãy vào lại nhé",
                        'type_data' => null,
                    );
                } else {
                    $update_otp = new db_query("UPDATE `user` SET `otp_sdt` = '$maotp', `solan_qmk` = solan_qmk + 1, `ngay_qmk` = '$thoi_gian'  WHERE `usc_phone` = '$sdt'
                                            AND `usc_type` = $lay_ustype ");
                    if ($type == 5) {
                        $ch = curl_init('http://rest.esms.vn/MainService.svc/json/SendMultipleMessage_V4_post_json/');
                        $payload = '{
                                "ApiKey": "CD013D8EF367403A13DB9695679A32",
                                "Content": "TIMVIEC365 mã OTP nhà tuyển dụng tại https://timviec365.vn/ : ' . $maotp . '",
                                "Phone": "' . $sdt . '",
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
                                "Phone": "' . $sdt . '",
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
                    };
                    $data = array(
                        'result' => true,
                        'msg' => null,
                        'type_data' => $lay_ustype,
                    );
                };
            } else {
                $data = array(
                    'result' => false,
                    'msg' => 'Số điện thoại không tồn tại',
                    'type_data' => null,
                );
            }
        } else if (preg_match($regex_email, $sdt) == true) {
            $query_check = new db_query("SELECT `usc_id`, `usc_name`, `usc_pass`, `usc_type`  FROM `user` WHERE usc_email = '$sdt' AND (`usc_type` = 1 OR `usc_type` = 5) ");
            if (mysql_num_rows($query_check->result) > 0) {
                $update_otp = new db_query("UPDATE `user` SET `otp_sdt` = '$maotp' WHERE `usc_email` = '$sdt' AND `usc_type` = $type ");
                $row_dta = mysql_fetch_assoc($query_check->result);
                $id = $row_dta['usc_id'];
                $name = $row_dta['usc_name'];
                $token = $row_dta['usc_pass'];
                $lay_ustype = $row_dta['usc_type'];
                Send_QMK($sdt, $name, $maotp);

                $data = array(
                    'result' => true,
                    'msg' => null,
                    'type_data' => $lay_ustype,
                );
            } else {
                $data = array(
                    'result' => false,
                    'msg' => 'Email không tồn tại',
                    'type_data' => null,
                );
            }
        }
    } else if (preg_match($regex_email, $sdt) == false && preg_match($regex_sdt, $sdt) == false) {
        $data = array(
            'result' => false,
            'msg' => 'Không đúng định dạng',
            'type_data' => null,
        );
    }
}else{
    $data = array(
        'result' => false,
        'msg' => "Thông tin không đầy đủ",
        'type_data' => null,
    );
}
echo json_encode($data, true);
