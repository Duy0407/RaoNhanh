<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $so_cmnd = getValue('so_cmnd', 'str', 'POST', '');
    $so_cmnd = sql_injection_rp($so_cmnd);
    $so_cmnd = trim($so_cmnd);

    $so_taikhoan = getValue('so_taikhoan', 'str', 'POST', '');
    $so_taikhoan = sql_injection_rp($so_taikhoan);
    $so_taikhoan = trim($so_taikhoan);

    $chu_tk = getValue('chu_tk', 'str', 'POST', '');
    $chu_tk = sql_injection_rp($chu_tk);
    $chu_tk = trim($chu_tk);

    $cmt_anhtr = $_FILES['cmt_anhtr']['name'];

    $cmt_anhs = $_FILES['cmt_anhs']['name'];

    $nh_tkhoan = getValue('nh_tkhoan', 'str', 'POST', '');

    $thoi_gian = strtotime(date('Y-m-d H:i:s', time()));

    if ($so_cmnd != "" && $so_taikhoan != "" && $chu_tk != "" && $cmt_anhtr != "" && $cmt_anhs != "") {


        if ($cmt_anhtr != "") {
            $dir = "../pictures/avt_dangtin/";
            $cmt_anhtr = time() . '_' . str_replace($bo_dau, '_', $cmt_anhtr);
            $filename = '/pictures/avt_dangtin/' . $cmt_anhtr;
            $filetmp_name = $_FILES['cmt_anhtr']['tmp_name'];
            move_uploaded_file($filetmp_name, $dir . '/' . $cmt_anhtr);
        }

        if ($cmt_anhs != "") {
            $dir1 = "../pictures/avt_dangtin/";
            $cmt_anhs = time() . '_' . str_replace($bo_dau, '_', $cmt_anhs);
            $filename2 = '/pictures/avt_dangtin/' . $cmt_anhs;
            $filetmp2_name = $_FILES['cmt_anhs']['tmp_name'];
            move_uploaded_file($filetmp2_name, $dir1 . '/' . $cmt_anhs);
        }

        $updat_lk = new db_query("UPDATE `user` SET `xacthuc_lket` = '2', `usc_cmt` = '$so_cmnd', `anh_cmt_mtr` = '$filename', `anh_cmt_ms` = '$filename2',
                            `ten_nganhang` = '$nh_tkhoan', `so_taikhoan` = '$so_taikhoan', `chu_taikhoan` = '$chu_tk', `tgian_xacthuc` = '$thoi_gian'
                            WHERE `usc_id` = $us_id AND `usc_type` = $us_type ");
    } else {
        echo "Thông tin không đầy đủ";
    }
} else {
    echo "Thông tin không đầy đủ";
}
