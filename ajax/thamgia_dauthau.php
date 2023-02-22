<?
include("config.php");
if(isset($_COOKIE['UID']) && isset($_COOKIE['UT'])){
    $new_id = getValue('new_id', 'int', 'POST', 0);
    $id_nduthau = getValue('id_nduthau', 'int', 'POST', 0);
    $id_nmua = getValue('id_nmua', 'int', 'POST', 0);

    $dvi_dthau = getValue('dvi_dthau', 'str', 'POST', '');
    $dvi_dthau = trim($dvi_dthau);
    $dvi_dthau = sql_injection_rp($dvi_dthau);

    $ten_spham = getValue('ten_spham', 'str', 'POST', '');
    $ten_spham = trim($ten_spham);
    $ten_spham = sql_injection_rp($ten_spham);

    $mota_spham = getValue('mota_spham', 'str', 'POST', '');
    $mota_spham = trim($mota_spham);
    $mota_spham = sql_injection_rp($mota_spham);

    $gioi_thieu = getValue('gioi_thieu', 'str', 'POST', '');
    $gioi_thieu = trim($gioi_thieu);
    $gioi_thieu = sql_injection_rp($gioi_thieu);

    $mota_nangluc = getValue('mota_nangluc', 'str', 'POST', '');
    $mota_nangluc = trim($mota_nangluc);
    $mota_nangluc = sql_injection_rp($mota_nangluc);

    $phidu_thau = getValue('phidu_thau', 'str', 'POST', '');
    $phidu_thau = trim($phidu_thau);
    $phidu_thau = sql_injection_rp($phidu_thau);
    $phidu_thau = str_replace(',', '', $phidu_thau);

    $dvi_tien = getValue('dvi_tien', 'int', 'POST', 0);

    $mota_khuyenmai = getValue('mota_khuyenmai', 'str', 'POST', '');
    $mota_khuyenmai = trim($mota_khuyenmai);
    $mota_khuyenmai = sql_injection_rp($mota_khuyenmai);

    $link_spham = getValue('link_spham', 'str', 'POST', '');
    $link_spham = trim($link_spham);
    $link_spham = sql_injection_rp($link_spham);

    $ngay_tgia = time();

    $file_nangluc = $_FILES['file_nangluc']['name'];
    $file_gioithieu = $_FILES['file_gioithieu']['name'];
    $file_kmai = $_FILES['file_kmai']['name'];

    $bo_ddang = ['image/gif', 'video/mp4'];

    $noi_dung = "Thông báo tham dự thầu";

    if($new_id != 0 && $id_nduthau != 0){
        if ($file_nangluc != "") {
            $file_type_nl = $_FILES['file_nangluc']['type'];
            if (in_array($file_type_nl, $bo_ddang) == false) {
                $filenangluc = time() . '_' . str_replace(' ', '_', $file_nangluc);
                $file_nangluc1 = 'avt_dthau/' . $filenangluc;
                $filetmp_name_nl = $_FILES['file_nangluc']['tmp_name'];

                $dir = '../pictures/avt_dthau/';
                move_uploaded_file($filetmp_name_nl, $dir . '/' . $filenangluc);
            } else {
                $file_nangluc1 = '';
            }
        } else {
            $file_nangluc1 = '';
        }

        if ($file_gioithieu != "") {
            $file_type_gt = $_FILES['file_gioithieu']['type'];
            if (in_array($file_type_gt, $bo_ddang) == false) {
                $filegthieu = time() . '_' . str_replace(' ', '_', $file_gioithieu);
                $file_gioithieu1 = 'avt_dthau/' . $filegthieu;
                $filetmp_name_gt = $_FILES['file_gioithieu']['tmp_name'];

                $dir = '../pictures/avt_dthau/';
                move_uploaded_file($filetmp_name_gt, $dir . '/' . $filegthieu);
            } else {
                $file_gioithieu1 = '';
            }
        } else {
            $file_gioithieu1 = '';
        }

        if ($file_kmai != "") {
            $file_type_km = $_FILES['file_kmai']['type'];
            if (in_array($file_type_km, $bo_ddang) == false) {
                $filekmai = time() . '_' . str_replace(' ', '_', $file_kmai);
                $file_kmai1 = 'avt_dthau/' . $filekmai;
                $filetmp_name_km = $_FILES['file_kmai']['tmp_name'];

                $dir = '../pictures/avt_dthau/';
                move_uploaded_file($filetmp_name_km, $dir . '/' . $filekmai);
            } else {
                $file_kmai1 = '';
            }
        } else {
            $file_kmai1 = '';
        }

        $inser_dthau = new db_query("INSERT INTO `dau_thau`(`id`, `new_id`, `user_id`, `user_name`, `user_intro`, `user_file`, `user_profile`, `user_profile_file`,
                                    `product_name`, `product_desc`, `product_link`, `price`, `price_unit`, `promotion`, `promotion_file`, `status`,
                                    `create_time`) VALUES ('','$new_id','$id_nduthau','$dvi_dthau','$gioi_thieu','$file_gioithieu1','$mota_nangluc','$file_nangluc1',
                                    '$ten_spham','$mota_spham','$link_spham','$phidu_thau','$dvi_tien','$mota_khuyenmai','$file_kmai1','0','$ngay_tgia')");

        $inser_tbao = new db_query("INSERT INTO `notify`(`id`, `notify_from`, `new_id`, `notify_to`, `type`, `create_time`, `notify_content`)
                                    VALUES ('','$id_nduthau','$new_id','$id_nmua','0','$ngay_tgia','$noi_dung')");

        $data = [
            'result' => true,
            'msg' => null,
        ];
    }else{
        $data = [
            'result' => false,
            'msg' => 'Thông tin không đầy đủ',
        ];
    }
}else{
    $data = [
        'result' => false,
        'msg' => 'Thông tin không đầy đủ',
    ];
}
echo json_encode($data, true);
