<?
include("config.php");
$tkhoan = getValue('taikhoan', 'str', 'POST', '');
$regex_email = ("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/");
$regex_sdt = ("/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/");
if ($tkhoan != "") {
    if (preg_match($regex_email, $tkhoan) == true || preg_match($regex_sdt, $tkhoan) == true) {
        if (preg_match($regex_sdt, $tkhoan) == true) {
            $query_check = new db_query("SELECT `usc_id` FROM `user` WHERE usc_phone = '$tkhoan' ");
            if (mysql_num_rows($query_check->result) > 0) {
                $data = array(
                    'result' => false,
                    'msg' => 'Số điện thoại đã tồn tại',
                );
            }else{
                $data = array(
                    'result' => true,
                    'msg' => null,
                );
            }
        } else if (preg_match($regex_email, $tkhoan) == true) {
            $query_check = new db_query("SELECT `usc_id` FROM `user` WHERE usc_email = '$tkhoan' ");
            if (mysql_num_rows($query_check->result) > 0) {
                $data = array(
                    'result' => false,
                    'msg' => 'Email đã tồn tại',
                );
            }else{
                $data = array(
                    'result' => true,
                    'msg' => null,
                );
            }
        }
    } else if (preg_match($regex_email, $tkhoan) == false && preg_match($regex_sdt, $tkhoan) == false) {
        $data = array(
            'result' => false,
            'msg' => 'Không đúng định dạng',
        );
    }
}else{
    $data = array(
        'result' => false,
        'msg' => 'Nhập số điện thoại hoặc email',
    );
}
echo json_encode($data, true);
