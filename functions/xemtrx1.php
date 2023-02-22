<?
function xemtrc_tdang1($type, $id_dm, $tieu_de, $gia_sp, $gia_bd, $gia_kt, $don_vi, $td_diachi_nha, $donvi_mua, $tang_mphi, $mo_ta, $ctiet_dmuc, $dia_chi, $avt_anh, $url_vd, $tinh_trang, $loai_sp, $loai_sp2, $loai_sp3, $loai_sp4, $loai_sp5, $loai_sp6, $loai_sp7, $loai_sp8, $loai_sp9, $loai_sp10, $loai_sp11, $loai_sp12, $loai_sp13, $loai_sp14, $loai_sp15, $loai_sp16)
{
    // echo $gia_sp;die;
    $donvi = array(
        1 => 'VNĐ',
        2 => 'USD',
        3 => 'EURO',
    );

    $ttrang_arr = array(
        1 => 'Mới',
        2 => 'Đã sử dụng (chưa sửa chữa)',
        3 => 'Đã sử dụng (qua sửa chữa)',
    );

    $dia_chi = explode(',', $dia_chi);
    $dia_chi = implode(';', $dia_chi);


    $avt_anh = explode(',', $avt_anh);

    $list_dm = new db_query("SELECT `ten_tags` FROM `key_tags` WHERE `tags_id` = '$ctiet_dmuc' ");
    $ten_tags = mysql_fetch_assoc($list_dm->result)['ten_tags'];
    $tatca = '   <div class="v_product v_product_df_7-7">';
    $tatca .= ' <div class="product_container">';
    // $tatca .= ' <div class="pc_header d-flex space-between">
    //                 <div class="pc_head-left">
    //                     <ul class="v-breadcrumb">
    //                         <li><a href="#">Danh mục lớn</a></li>
    //                         <li><a href="#">Danh mục nhỏ</a></li>
    //                         <li><a href="#">Danh mục con</a></li>
    //                     </ul>
    //                 </div>
    //             </div>';
    // slide anh
    $tatca .= ' <div class="slide_show">
                    <div class="slider">';
    for ($i = 0; $i < count($avt_anh); $i++) {
        if ($avt_anh[$i] != 'undefined') {
            $li = '<img src="' . $avt_anh[$i] . '" alt="">';
            $tatca .= $li;
        }
    };
    $tatca .= '</div>
                    <div class="slider-nav">';
    for ($i = 0; $i < count($avt_anh); $i++) {
        if ($avt_anh[$i] != 'undefined') {
            $li = '<img class="mb-10 mt-10" src=" ' . $avt_anh[$i] . '" alt="">';
            $tatca .= $li;
        }
    };

    $tatca .= '</div>
                </div>';
    // tieu de
    $tatca .= ' <div class="pc_name w-100">
                    <p>' . $tieu_de . '</p>
                </div>';
    // gia san pham

    if ($type == 1 || $type == 5) {
        if ($tang_mphi == 0) {
            if ($gia_sp != 0) {
                $tatca .= ' <div class="w-100 d-flex space-between mt-20">
                                <p class="pc_price fs_26_30">' . $gia_sp . ' ' . $donvi[$don_vi] . '</p>
                            </div>';
            } else if ($gia_sp == 0) {
                $tatca .= ' <div class="w-100 d-flex space-between mt-20">
                                <p class="pc_price fs_26_30">Liên hệ người bán</p>
                            </div>';
            }
        } else if ($tang_mphi == 1) {
            $tatca .= ' <div class="w-100 d-flex space-between mt-20">
                            <p class="pc_price fs_26_30">Cho tặng miễn phí</p>
                        </div>';
        }
    }
    // thong tin chi tiet
    $tatca .= '
            <div class="w-100 mt-50 df_mt_375">
                <p class="pc_title pl-10 text_ttct_df">Thông tin chi tiết</p>
                <div class="box_bao_text">
                    <div class="khung_bao_text_bd">';
    if ($id_dm == 61) { //Mỹ phẩm
        if ($loai_sp != "") {
            $loaihinh = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];
        } else {
            $loaihinh = "";
        }

        if ($loai_sp2 != "") {
            $loaimypham = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp2 "))->result)['ten_loai'];
        } else {
            $loaimypham = "";
        }

        if ($loai_sp3 != "") {
            $hang = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` = $loai_sp3 "))->result)['ten_hang'];
        } else {
            $hang = "";
        }

        $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI HÌNH</p>
                        <p class="div_baotext_con">' . $loaihinh . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI MỸ PHẨM</p>
                        <p class="div_baotext_con">' . $loaimypham . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG</p>
                        <p class="div_baotext_con">' . $hang . '</p>
                    </div>';

        if ($type == 1 || $type == 5) {
            $tatca .= '<div class="div_baotext_1">
                                    <p class="div_baotext_to">HẠN SỬ DỤNG</p>
                                    <p class="div_baotext_con">' . date('d/m/Y', strtotime($loai_sp4)) . '</p>
                                </div>';
        }
    } elseif ($id_dm == 108) { //Dụng cụ làm đẹp
        if ($loai_sp != "") {
            $loaiphukien = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];
        } else {
            $loaiphukien = "";
        }

        if ($loai_sp3 != "") {
            $hang = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` = $loai_sp3 "))->result)['ten_hang'];
        } else {
            $hang = "";
        }

        $arr_tt = array(
            1 => 'Mới 100%',
            2 => 'Đã qua sử dụng',
        );
        $tatca .= '
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI MỸ PHẨM</p>
                        <p class="div_baotext_con">' . $loaiphukien . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $arr_tt[$loai_sp2] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG</p>
                        <p class="div_baotext_con">' . $hang . '</p>
                    </div>';
    } elseif ($id_dm == 109) { //Thực phẩm chức năng
        $loaithucpham = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];
        $tatca .= '
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI THỰC PHẨM</p>
                        <p class="div_baotext_con">' . $loaithucpham . '</p>
                    </div>';
        if ($type == 1 || $type == 5) {
            $tatca .= '<div class="div_baotext_1">
                                    <p class="div_baotext_to">HẠN SỬ DỤNG</p>
                                    <p class="div_baotext_con">' . date('d/m/Y', strtotime($loai_sp2)) . '</p>
                                </div>';
        }
    } elseif ($id_dm == 63) { //vật tư ý tế
        $loaivattu = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];
        $arr_tt = array(
            1 => 'Mới 100%',
            2 => 'Đã qua sử dụng',
        );
        $tatca .= '
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI VẬT TƯ</p>
                        <p class="div_baotext_con">' . $loaivattu . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG</p>
                        <p class="div_baotext_con">' . $loai_sp3 . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $arr_tt[$loai_sp2] . '</p>
                    </div>';
    } elseif ($id_dm == 110 || $id_dm == 111 || $id_dm == 112 || $id_dm == 113) { //Gà, Chó, Mèo, Chim
        $giongthucung = mysql_fetch_assoc((new db_query("SELECT `id`, `giong_thucung` FROM `giong_thu_cung` WHERE `id` = $loai_sp "))->result)['giong_thucung'];
        $dotuoi = mysql_fetch_assoc((new db_query("SELECT `id`, `contents_name`, `type` FROM `thongtin_thucung` WHERE `type`=1 AND`id` = $loai_sp2 "))->result)['contents_name'];
        $kichco = mysql_fetch_assoc((new db_query("SELECT `id`, `contents_name`, `type` FROM `thongtin_thucung` WHERE `type`=2 AND`id` = $loai_sp3 "))->result)['contents_name'];
        $gioitinh = mysql_fetch_assoc((new db_query("SELECT `id`, `contents_name`, `type` FROM `thongtin_thucung` WHERE `type`=3 AND`id` = $loai_sp4 "))->result)['contents_name'];
        $tatca .= '
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">GIỐNG THÚ CƯNG</p>
                        <p class="div_baotext_con">' . $giongthucung . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">ĐỘ TUỔI</p>
                        <p class="div_baotext_con">' . $dotuoi . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">KÍCH CỠ THÚ CƯNG</p>
                        <p class="div_baotext_con">' . $kichco . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">GIỚI TÍNH</p>
                        <p class="div_baotext_con">' . $gioitinh . '</p>
                    </div>';
    } elseif ($id_dm == 114) { // Đồ ăn, phụ kiện, dịch vụ
        $nhomsanpham = mysql_fetch_assoc((new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id` = $loai_sp "))->result)['name'];
        $giongthucung = mysql_fetch_assoc((new db_query("SELECT `id`, `giong_thucung` FROM `giong_thu_cung` WHERE `id` = $loai_sp2 "))->result)['giong_thucung'];
        $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">NHÓM SẢN PHẨM</p>
                        <p class="div_baotext_con">' . $nhomsanpham . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">GIỐNG THÚ CƯNG</p>
                        <p class="div_baotext_con">' . $giongthucung . '</p>
                    </div>';
        if ($loai_sp == 58) {
            $tatca .= '  <div class="div_baotext_1">
                        <p class="div_baotext_to">HẠN SỬ DỤNG</p>
                        <p class="div_baotext_con">' . date('d/m/Y', strtotime($loai_sp3)) . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">TRỌNG LƯỢNG</p>
                        <p class="div_baotext_con">' . $loai_sp4 . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">THỂ TÍCH</p>
                        <p class="div_baotext_con">' . $loai_sp5 . '</p>
                    </div>';
        }
    } elseif ($id_dm == 115) { // thú cưng khác
        $giongthucung = mysql_fetch_assoc((new db_query("SELECT `id`, `giong_thucung` FROM `giong_thu_cung` WHERE `id` = $loai_sp "))->result)['giong_thucung'];
        $gioitinh = mysql_fetch_assoc((new db_query("SELECT `id`, `contents_name`, `type` FROM `thongtin_thucung` WHERE `type`=3 AND`id` = $loai_sp4 "))->result)['contents_name'];
        $tatca .= '  <div class="div_baotext_1">
                        <p class="div_baotext_to">GIỐNG THÚ CƯNG</p>
                        <p class="div_baotext_con">' . $giongthucung . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">ĐỘ TUỔI</p>
                        <p class="div_baotext_con">' . $loai_sp2 . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">KÍCH CỠ</p>
                        <p class="div_baotext_con">' . $loai_sp3 . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">GIỚI TÍNH</p>
                        <p class="div_baotext_con">' . $gioitinh . '</p>
                    </div>';
    } elseif ($id_dm == 8) { //Xe đạp
        if($loai_sp != 0 && $loai_sp != ''){
            $hang = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` = $loai_sp "))->result)['ten_hang'];
        }
        if ($loai_sp2 != 0 && $loai_sp2 != '') {
            $loaixe = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp2 "))->result)['ten_loai'];
        }
        if ($loai_sp2 == 210 && $loai_sp3 != 0 && $loai_sp3 != '') {
            $dongxe = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp3 "))->result)['ten_loai'];
        }
        if ($loai_sp4 != 0 && $loai_sp4 != '') {
            $xuatxu = mysql_fetch_assoc((new db_query("SELECT `id_xuatxu`, `noi_xuatxu` FROM `xuat_xu` WHERE `id_xuatxu` = $loai_sp4 "))->result)['noi_xuatxu'];
        }
        if ($loai_sp5 != 0 && $loai_sp5 != '') {
            $kichthuockhung = mysql_fetch_assoc((new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $loai_sp5 "))->result)['ten_manhinh'];
        }
        if ($loai_sp6 != 0 && $loai_sp6 != '') {
            $mausac = mysql_fetch_assoc((new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE `id_color` = $loai_sp6 "))->result)['mau_sac'];
        }
        if ($loai_sp7 != 0 && $loai_sp7 != '') {
            $chatlieukhung = mysql_fetch_assoc((new db_query("SELECT `id`, `name` FROM `nhom_sanpham_chatlieu` WHERE `id` = $loai_sp7 "))->result)['name'];
        }
        if ($loai_sp8 != 0 && $loai_sp8 != '') {
            $baohanh = mysql_fetch_assoc((new db_query("SELECT `id_baohanh`, `tgian_baohanh` FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp8 "))->result)['tgian_baohanh'];
        }
        $arr_tt = array(
            1 => 'Mới',
            2 => 'Đã sử dụng',
        );
        $tatca .= ' <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG XE</p>
                        <p class="div_baotext_con">' . $hang . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI XE ĐẠP</p>
                        <p class="div_baotext_con">' . $loaixe . '</p>
                    </div>';
        // if ($loai_sp2 == 210) {
        //     $tatca .= '   <div class="div_baotext_1">
        //                 <p class="div_baotext_to">DÒNG XE ĐẠP THỂ THAO</p>
        //                 <p class="div_baotext_con">' . $dongxe . '</p>
        //             </div>';
        // }
        $tatca .= ' <div class="div_baotext_1">
                        <p class="div_baotext_to">XUẤT XỨ</p>
                        <p class="div_baotext_con">' . $xuatxu . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">KÍCH THƯỚC KHUNG</p>
                        <p class="div_baotext_con">' . $kichthuockhung . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">MÀU SẮC</p>
                        <p class="div_baotext_con">' . $mausac . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">CHẤT LIỆU KHUNG</p>
                        <p class="div_baotext_con">' . $chatlieukhung . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">BẢO HÀNH</p>
                        <p class="div_baotext_con">' . $baohanh . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $arr_tt[$loai_sp9]  . '</p>
                    </div>';
    } elseif ($id_dm == 9) { //xe máy
        $hang = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` = $loai_sp "))->result)['ten_hang'];
        if ($loai_sp != 1286 && $loai_sp2 != '' && $loai_sp2 != 0) {
            $dongxe = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp2 "))->result)['ten_loai'];
        }
        if ($loai_sp4 != '' && $loai_sp4 != 0) {
            $dungtich = mysql_fetch_assoc((new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = $loai_sp4 "))->result)['ten_dl'];
        }
        if ($loai_sp3 != '' && $loai_sp3 != 0) {
            $loai_xe = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp3 "))->result)['ten_loai'];
        }
        if ($loai_sp5 != '' && $loai_sp5 != 0) {
            $namsanxuat = mysql_fetch_assoc((new db_query("SELECT `id`, `nam_san_xuat` FROM `nam_san_xuat` WHERE `id` = $loai_sp5 "))->result)['nam_san_xuat'];
        }
        if ($loai_sp6 != '' && $loai_sp6 != 0) {
            $baohanh = mysql_fetch_assoc((new db_query("SELECT `id_baohanh`, `tgian_baohanh` FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp6 "))->result)['tgian_baohanh'];
        }
        $arr_tt = array(
            1 => 'Mới',
            2 => 'Đã sử dụng',
        );
        $tatca .= ' <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG XE</p>
                        <p class="div_baotext_con">' . $hang . '</p>
                    </div>';
        if ($loai_sp == 1286) {
            $tatca .= '   <div class="div_baotext_1">
                        <p class="div_baotext_to">DÒNG XE</p>
                        <p class="div_baotext_con">' . $loai_sp2 . '</p>
                    </div>';
        } elseif ($loai_sp != 1286) {
            $tatca .= '   <div class="div_baotext_1">
                        <p class="div_baotext_to">DÒNG XE</p>
                        <p class="div_baotext_con">' . $dongxe . '</p>
                    </div>';
        };
        $tatca .= ' <div class="div_baotext_1">
                        <p class="div_baotext_to">NĂM SẢN XUẤT</p>
                        <p class="div_baotext_con">' . $namsanxuat . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI XE</p>
                        <p class="div_baotext_con">' . $loai_xe . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">DUNG TÍCH</p>
                        <p class="div_baotext_con">' . $dungtich . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $arr_tt[$loai_sp7]  . '</p>
                    </div>';
        if ($loai_sp7 == 2 || $loai_sp7 == 3) {
            $tatca .= ' <div class="div_baotext_1">
                        <p class="div_baotext_to">SỐ Km ĐÃ ĐI</p>
                        <p class="div_baotext_con">' . $loai_sp8 . '</p>
                    </div>';
        }
    } elseif ($id_dm == 40 || $id_dm == 41) { // Xe đạp điện, xe máy điện
        $hang = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` = $loai_sp "))->result)['ten_hang'];
        $dongco = mysql_fetch_assoc((new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = $loai_sp2 "))->result)['ten_dl'];
        $mausac = mysql_fetch_assoc((new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE `id_color` = $loai_sp3 "))->result)['mau_sac'];
        $baohanh = mysql_fetch_assoc((new db_query("SELECT `id_baohanh`, `tgian_baohanh` FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp4 "))->result)['tgian_baohanh'];
        $arr_tt = array(
            1 => 'Mới',
            2 => 'Đã sử dụng',
        );
        $tatca .= ' <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG XE</p>
                        <p class="div_baotext_con">' . $hang . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">ĐỘNG CƠ</p>
                        <p class="div_baotext_con">' . $dongco . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">MÀU SẮC</p>
                        <p class="div_baotext_con">' . $mausac . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">BẢO HÀNH</p>
                        <p class="div_baotext_con">' . $baohanh . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $arr_tt[$loai_sp5]  . '</p>
                    </div>';
    } elseif ($id_dm == 10) { //oto
        if ($loai_sp != 0 && $loai_sp != "") {
            $hang = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` = $loai_sp "))->result)['ten_hang'];
        }
        if ($loai_sp2 != 0 && $loai_sp2 != "") {
            $dongxe = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp2 "))->result)['ten_loai'];
        }
        if ($loai_sp3 != 0 && $loai_sp3 != "") {
            $namsanxuat = mysql_fetch_assoc((new db_query("SELECT `id`, `nam_san_xuat` FROM `nam_san_xuat` WHERE `id` = $loai_sp3 "))->result)['nam_san_xuat'];
        }
        if ($loai_sp6 != 0 && $loai_sp6 != "") {
            $xuatxu = mysql_fetch_assoc((new db_query("SELECT `id_xuatxu`, `noi_xuatxu` FROM `xuat_xu` WHERE `id_xuatxu` = $loai_sp6 "))->result)['noi_xuatxu'];
        }
        if ($loai_sp7 != 0 && $loai_sp7 != "") {
            $socho = mysql_fetch_assoc((new db_query("SELECT `id`, `so_luong` FROM `number_content` WHERE `id` = $loai_sp7 "))->result)['so_luong'];
        }
        if ($loai_sp8 != 0 && $loai_sp8 != "") {
            $mausac = mysql_fetch_assoc((new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE `id_color` = $loai_sp8 "))->result)['mau_sac'];
        }
        if ($loai_sp9 != 0 && $loai_sp9 != "") {
            $kieudang = mysql_fetch_assoc((new db_query("SELECT `id`, `name` FROM `nhom_sanpham_hinhdang` WHERE `id` = $loai_sp9 "))->result)['name'];
        }
        if ($loai_sp10 != 0 && $loai_sp10 != "") {
            $baohanh = mysql_fetch_assoc((new db_query("SELECT `id_baohanh`, `tgian_baohanh` FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp10 "))->result)['tgian_baohanh'];
        }
        $arr_nl = array(
            1 => 'xăng',
            2 => 'dầu',
            3 => 'Động cơ Hybird',
            4 => 'Điện'
        );
        $arr_hs = array(
            1 => 'Tự động',
            2 => 'Số sàn',
            3 => 'Bán tự động'
        );
        $arr_tt = array(
            1 => 'Mới',
            2 => 'Đã sử dụng ',
        );
        $tatca .= ' <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG XE</p>
                        <p class="div_baotext_con">' . $hang . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">DÒNG XE</p>
                        <p class="div_baotext_con">' . $dongxe . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">NĂM SẢN XUẤT</p>
                        <p class="div_baotext_con">' . $namsanxuat . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">SỐ CHỖ</p>
                        <p class="div_baotext_con">' . $socho . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">NHIÊN LIỆU</p>
                        <p class="div_baotext_con">' . $arr_nl[$loai_sp5]  . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">XUẤT XỨ</p>
                        <p class="div_baotext_con">' . $xuatxu . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">HỘP SỐ</p>
                        <p class="div_baotext_con">' . $arr_hs[$loai_sp4]  . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">KIỂU DÁNG</p>
                        <p class="div_baotext_con">' . $kieudang . '</p>
                    </div>
                      <div class="div_baotext_1">
                        <p class="div_baotext_to">MÀU SẮC</p>
                        <p class="div_baotext_con">' . $mausac . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $arr_tt[$tinh_trang] . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">SỐ Km ĐÃ ĐI</p>
                        <p class="div_baotext_con">' . $loai_sp11  . '</p>
                    </div>';
    } elseif ($id_dm == 39) { // Phụ tùng xe
        if ($loai_sp != 0 && $loai_sp != "") {
            $loaiphutung = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];
        }
        $arr_tt = array(
            1 => 'Mới',
            2 => 'Đã sử dụng',
        );
        $tatca .= ' <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI PHỤ TÙNG</p>
                        <p class="div_baotext_con">' . $loaiphutung . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $arr_tt[$loai_sp2] . '</p>
                    </div>';
    } elseif ($id_dm == 42) { //nội thất oto
        if ($loai_sp != 0 && $loai_sp != "") {
            $loainoithat = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];
        }
        $arr_tt = array(
            1 => 'Mới',
            2 => 'Đã sử dụng',
        );
        $tatca .= ' <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI PHỤ TÙNG</p>
                        <p class="div_baotext_con">' . $loainoithat . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $arr_tt[$loai_sp2] . '</p>
                    </div>';
    } elseif ($id_dm == 38) { // xe tải xe khác
        if($loai_sp !=0 && $loai_sp!=""){
            $hang = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` = $loai_sp "))->result)['ten_hang'];
        }
        if ($loai_sp2 != 0 && $loai_sp2 != "") {
            $trongtai = mysql_fetch_assoc((new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = $loai_sp2"))->result)['ten_dl'];
        }
        if ($loai_sp4 != 0 && $loai_sp4 != "") {
            $mausac = mysql_fetch_assoc((new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE `id_color` = $loai_sp4 "))->result)['mau_sac'];
        }
        $arr_nl = array(
            1 => 'xăng',
            2 => 'dầu',
            3 => 'Động cơ Hybird',
        );
        $arr_tt = array(
            1 => 'Mới',
            2 => 'Cũ'
        );
        $tatca .= ' <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG XE</p>
                        <p class="div_baotext_con">' . $hang . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TRỌNG TẢI</p>
                        <p class="div_baotext_con">' . $trongtai . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">NHIÊN LIỆU</p>
                        <p class="div_baotext_con">' . $arr_nl[$loai_sp3]  . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">MÀU SẮC</p>
                        <p class="div_baotext_con">' . $mausac . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $arr_tt[$loai_sp5] . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">SỐ Km ĐÃ ĐI</p>
                        <p class="div_baotext_con">' . $loai_sp6  . '</p>
                    </div>';
    } elseif ($id_dm == 11) { // Nhà đất
        if ($loai_sp5 != '' && $loai_sp5 != 0) {
            $tang = mysql_fetch_assoc((new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE `id` = $loai_sp5 "))->result)['so_luong'];
        }
        if ($loai_sp6 != '' && $loai_sp6 != 0) {
            $sophongvs = mysql_fetch_assoc((new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE `id` = $loai_sp6 "))->result)['so_luong'];
        }
        if ($loai_sp7 != '' && $loai_sp7 != 0) {
            $sophongngu = mysql_fetch_assoc((new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE `id` = $loai_sp7 "))->result)['so_luong'];
        }
        $arr_nhucau = array(
            1 => 'Cần bán',
            2 => 'Cho thuê',
            3 => 'Cần mua',
            4 => 'Cần thuê'
        );
        $arr_huong = array(
            1 => 'Đông',
            2 => 'Tây',
            3 => 'Nam',
            4 => 'Bắc',
            5 => 'Đông bắc',
            6 => 'Đông nam',
            7 => 'Tây bắc',
            8 => 'Tây nam',
        );
        //tình trạng nội thất
        $arr_ttnt = array(
            1 => 'Nội thất cao cấp',
            2 => 'Nội thất đầy đủ',
            3 => 'Hoàn thiện cơ bản',
            4 => 'Bàn giao thô'
        );
        //tình trạng đất
        $arr_ttd = array(
            1 => 'Hẻm xe hơi',
            2 => 'Nở hậu',
            3 => 'Hẻm xe hơi, Nở hậu'
        );
        //giấy tờ pháp lý
        $arr_gtpl = array(
            1 => 'Đã có sổ',
            2 => 'Đang chờ sổ',
            3 => 'Giấy tờ khác'
        );
        if ($type == 1 || $type == 5) {
            $tatca .= '

                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CẦN BÁN / CHO THUÊ</p>
                            <p class="div_baotext_con">' . $arr_nhucau[$loai_sp] . '</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">TÊN TOÀ NHÀ / KHU DÂN CƯ</p>
                            <p class="div_baotext_con">' . $loai_sp3 . '</p>
                        </div>
                         <div class="div_baotext_1">
                        <p class="div_baotext_to">HƯỚNG CỬA CHÍNH</p>
                        <p class="div_baotext_con">' . $arr_huong[$loai_sp8] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">GIẤY TỜ PHÁP LÝ</p>
                        <p class="div_baotext_con">' . $arr_gtpl[$loai_sp9] . '</p>
                    </div>';
        }
        $tatca .= ' <div class="div_baotext_1">
                        <p class="div_baotext_to">TỔNG SỐ TẦNG</p>
                        <p class="div_baotext_con">' . $tang . '</p>
                    </div>
                    <div class="div_baotext_1">
                    <p class="div_baotext_to">SỐ PHÒNG NGỦ</p>
                    <p class="div_baotext_con">' . $sophongngu . '</p>
                </div>
                <div class="div_baotext_1">
                    <p class="div_baotext_to">SỐ PHÒNG VỆ SINH</p>
                    <p class="div_baotext_con">' . $sophongvs . '</p>
                </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG NỘI THẤT</p>
                        <p class="div_baotext_con">' . $arr_ttnt[$loai_sp10]  . '</p>
                    </div>';
        if ($type == 1 || $type == 5) {
            $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CHIỀU DÀI</p>
                            <p class="div_baotext_con">' . $loai_sp12 . ' m</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CHIỀU NGANG</p>
                            <p class="div_baotext_con">' . $loai_sp13 . ' m</p>
                        </div>';
            if ($loai_sp14 != 0) {
                $loai_sp14 = explode(',', $loai_sp14);
                $a = '';
                for ($i = 0; $i < count($loai_sp14); $i++) {
                    $b = $arr_ttd[$loai_sp14[$i]];
                    $a .= $b . ', ';
                }
                $tatca .= '  <div class="div_baotext_1">
                        <p class="div_baotext_to">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="div_baotext_con">' . rtrim($a, ', ') .  '</p>
                    </div>';
            }
        }
        $tatca .= ' <div class="div_baotext_1">
                            <p class="div_baotext_to">DIỆN TÍCH</p>
                            <p class="div_baotext_con">' . $loai_sp11 . ' m<sup>2</sup></p>
                        </div>';
    } elseif ($id_dm == 27) { // căn hộ chung cư
        if ($loai_sp10 != 0 && $loai_sp10 != '') {
            $sophongvs = mysql_fetch_assoc((new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE `id` = $loai_sp10 "))->result)['so_luong'];
        }
        if ($loai_sp9 != 0 && $loai_sp9 != '') {
            $sophongngu = mysql_fetch_assoc((new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE `id` = $loai_sp9"))->result)['so_luong'];
        }
        $arr_nhucau = array(
            1 => 'Cần bán',
            2 => 'Cho thuê',
            3 => 'Cần mua',
            4 => 'Cần thuê'
        );
        $arr_huong = array(
            1 => 'Đông',
            2 => 'Tây',
            3 => 'Nam',
            4 => 'Bắc',
            5 => 'Đông bắc',
            6 => 'Đông nam',
            7 => 'Tây bắc',
            8 => 'Tây nam',
        );
        //tình trạng nội thất
        $arr_ttnt = array(
            1 => 'Nội thất cao cấp',
            2 => 'Nội thất đầy đủ',
            3 => 'Hoàn thiện cơ bản',
            4 => 'Bàn giao thô'
        );
        //giấy tờ pháp lý
        $arr_gtpl = array(
            1 => 'Đã có sổ',
            2 => 'Đang chờ sổ',
            3 => 'Giấy tờ khác'
        );
        //loại hình căn hộ
        $arr_lhch = array(
            1 => 'Chung cư',
            2 => 'Duplex',
            3 => 'Penthouse',
            4 => 'Căn hộ dịch vụ, mini',
            5 => 'Tập thể, cư xá',
            6 => 'Officetel',
        );
        if ($type == 1 || $type == 5) {
            $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CẦN BÁN / CHO THUÊ</p>
                            <p class="div_baotext_con">' . $arr_nhucau[$loai_sp] . '</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">TÊN TOÀ NHÀ / KHU DÂN CƯ</p>
                            <p class="div_baotext_con">' . $loai_sp3 . '</p>
                        </div>
                        <div class="div_baotext_1">
                        <p class="div_baotext_to">TẦNG SỐ</p>
                        <p class="div_baotext_con">' . $loai_sp7 . '</p>
                    </div>';
        }
        $tatca .= '  <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI HÌNH CĂN HỘ</p>
                        <p class="div_baotext_con">' . $arr_lhch[$loai_sp6] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">SỐ PHÒNG NGỦ</p>
                        <p class="div_baotext_con">' . $sophongngu . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">SỐ PHÒNG VỆ SINH</p>
                        <p class="div_baotext_con">' . $sophongvs . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">GIẤY TỜ PHÁP LÝ</p>
                        <p class="div_baotext_con">' . $arr_gtpl[$loai_sp11] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG NỘI THẤT</p>
                        <p class="div_baotext_con">' . $arr_ttnt[$loai_sp12]  . '</p>
                    </div>';
        if ($type == 1 || $type == 5) {
            $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CHIỀU DÀI</p>
                            <p class="div_baotext_con">' . $loai_sp14 . ' m</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CHIỀU NGANG</p>
                            <p class="div_baotext_con">' . $loai_sp15 . ' m</p>
                        </div>';
        }
        $tatca .= ' <div class="div_baotext_1">
                            <p class="div_baotext_to">DIỆN TÍCH</p>
                            <p class="div_baotext_con">' . $loai_sp13 . ' m<sup>2</sup></p>
                        </div>';
    } elseif ($id_dm == 34 || $id_dm == 33) { // Văn phòng, Cửa hàng
        if ($loai_sp5 != '' && $loai_sp5 != 0) {
            $tang = mysql_fetch_assoc((new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE `id` = $loai_sp5 "))->result)['so_luong'];
        }
        $arr_nhucau = array(
            1 => 'Cần bán',
            2 => 'Cho thuê',
        );
        $arr_huong = array(
            1 => 'Đông',
            2 => 'Tây',
            3 => 'Nam',
            4 => 'Bắc',
            5 => 'Đông bắc',
            6 => 'Đông nam',
            7 => 'Tây bắc',
            8 => 'Tây nam',
        );
        //tình trạng nội thất
        $arr_ttnt = array(
            1 => 'Nội thất cao cấp',
            2 => 'Nội thất đầy đủ',
            3 => 'Hoàn thiện cơ bản',
            4 => 'Bàn giao thô'
        );
        //giấy tờ pháp lý
        $arr_gtpl = array(
            1 => 'Đã có sổ',
            2 => 'Đang chờ sổ',
            3 => 'Giấy tờ khác'
        );
        //loại hình căn hộ
        $arr_lhch = array(
            1 => 'Chung cư',
            2 => 'Duplex',
            3 => 'Penthouse',
            4 => 'Căn hộ dịch vụ, mini',
            5 => 'Tập thể, cư xá',
            6 => 'Officetel',
        );
        if ($type == 1 || $type == 5) {
            $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CẦN BÁN / CHO THUÊ</p>
                            <p class="div_baotext_con">' . $arr_nhucau[$loai_sp] . '</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">TÊN TOÀ NHÀ / KHU DÂN CƯ</p>
                            <p class="div_baotext_con">' . $loai_sp3 . '</p>
                        </div>
                        <div class="div_baotext_1">
                        <p class="div_baotext_to">TỔNG SỐ TẦNG</p>
                        <p class="div_baotext_con">' . $tang . '</p>
                    </div>';
        }
        $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HƯỚNG CỬA CHÍNH</p>
                        <p class="div_baotext_con">' . $arr_huong[$loai_sp6] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">GIẤY TỜ PHÁP LÝ</p>
                        <p class="div_baotext_con">' . $arr_gtpl[$loai_sp9] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG NỘI THẤT</p>
                        <p class="div_baotext_con">' . $arr_ttnt[$loai_sp10]  . '</p>
                    </div>';
        if ($type == 1 || $type == 5) {
            $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CHIỀU DÀI</p>
                            <p class="div_baotext_con">' . $loai_sp12 . ' m</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CHIỀU NGANG</p>
                            <p class="div_baotext_con">' . $loai_sp13 . ' m</p>
                        </div>';
        }
        $tatca .= ' <div class="div_baotext_1">
                            <p class="div_baotext_to">DIỆN TÍCH</p>
                            <p class="div_baotext_con">' . $loai_sp11 . ' m<sup>2</sup></p>
                        </div>';
    } elseif ($id_dm == 12) { //Đất
        $arr_nhucau = array(
            1 => 'Cần bán',
            2 => 'Cho thuê',
            3 => 'Cần mua',
            4 => 'Cần thuê'
        );
        $arr_huong = array(
            1 => 'Đông',
            2 => 'Tây',
            3 => 'Nam',
            4 => 'Bắc',
            5 => 'Đông bắc',
            6 => 'Đông nam',
            7 => 'Tây bắc',
            8 => 'Tây nam',
        );
        //giấy tờ pháp lý
        $arr_gtpl = array(
            1 => 'Đã có sổ',
            2 => 'Đang chờ sổ',
            3 => 'Giấy tờ khác'
        );
        //loại hình đất
        $arr_lhd = array(
            1 => 'Đất thổ cư',
            2 => 'Đất nền dự án',
            3 => 'Đất công nghiệp',
            4 => 'Đất nông nghiệp',
        );
        if ($type == 1 || $type == 5) {
            $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CẦN BÁN / CHO THUÊ</p>
                            <p class="div_baotext_con">' . $arr_nhucau[$loai_sp] . '</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">TÊN DỰ ÁN</p>
                            <p class="div_baotext_con">' . $loai_sp3 . '</p>
                        </div>';
        }
        $tatca .= '<div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI HÌNH ĐẤT</p>
                        <p class="div_baotext_con">' . $arr_lhd[$loai_sp6]  . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HƯỚNG ĐẤT</p>
                        <p class="div_baotext_con">' . $arr_huong[$loai_sp7] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">GIẤY TỜ PHÁP LÝ</p>
                        <p class="div_baotext_con">' . $arr_gtpl[$loai_sp8] . '</p>
                    </div>';
        if ($type == 1 || $type == 5) {
            $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CHIỀU DÀI</p>
                            <p class="div_baotext_con">' . $loai_sp10 . ' m</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CHIỀU NGANG</p>
                            <p class="div_baotext_con">' . $loai_sp11 . ' m</p>
                        </div>';
        }
        $tatca .= ' <div class="div_baotext_1">
                            <p class="div_baotext_to">DIỆN TÍCH</p>
                            <p class="div_baotext_con">' . $loai_sp9 . ' m<sup>2</sup></p>
                        </div>';
    } elseif ($id_dm == 26 || $id_dm == 28 || $id_dm == 29) { // nhà trong ngõ, nhà mặt phố, nhà riêng
        if ($loai_sp5 != '' && $loai_sp5 != 0) {
            $tang = mysql_fetch_assoc((new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE `id` = $loai_sp5 "))->result)['so_luong'];
        }
        if ($loai_sp8 != '' && $loai_sp8 != 0) {
            $sophongvs = mysql_fetch_assoc((new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE `id` = $loai_sp8 "))->result)['so_luong'];
        }
        if ($loai_sp7 != '' && $loai_sp7 != 0) {
            $sophongngu = mysql_fetch_assoc((new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE `id` = $loai_sp7 "))->result)['so_luong'];
        }
        $arr_nhucau = array(
            1 => 'Cần bán',
            2 => 'Cho thuê',
        );
        $arr_huong = array(
            1 => 'Đông',
            2 => 'Tây',
            3 => 'Nam',
            4 => 'Bắc',
            5 => 'Đông bắc',
            6 => 'Đông nam',
            7 => 'Tây bắc',
            8 => 'Tây nam',
        );
        //tình trạng nội thất
        $arr_ttnt = array(
            1 => 'Nội thất cao cấp',
            2 => 'Nội thất đầy đủ',
            3 => 'Hoàn thiện cơ bản',
            4 => 'Bàn giao thô'
        );
        //giấy tờ pháp lý
        $arr_gtpl = array(
            1 => 'Đã có sổ',
            2 => 'Đang chờ sổ',
            3 => 'Giấy tờ khác'
        );
        if ($type == 1 || $type == 5) {
            $tatca .= '

                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CẦN BÁN / CHO THUÊ</p>
                            <p class="div_baotext_con">' . $arr_nhucau[$loai_sp] . '</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">TÊN TOÀ NHÀ / KHU DÂN CƯ</p>
                            <p class="div_baotext_con">' . $loai_sp3 . '</p>
                        </div>
                         <div class="div_baotext_1">
                        <p class="div_baotext_to">HƯỚNG CỬA CHÍNH</p>
                        <p class="div_baotext_con">' . $arr_huong[$loai_sp6] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">GIẤY TỜ PHÁP LÝ</p>
                        <p class="div_baotext_con">' . $arr_gtpl[$loai_sp9] . '</p>
                    </div>';
        }
        $tatca .= ' <div class="div_baotext_1">
                        <p class="div_baotext_to">TỔNG SỐ TẦNG</p>
                        <p class="div_baotext_con">' . $tang . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">SỐ PHÒNG NGỦ</p>
                        <p class="div_baotext_con">' . $sophongngu . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">SỐ PHÒNG VỆ SINH</p>
                        <p class="div_baotext_con">' . $sophongvs . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG NỘI THẤT</p>
                        <p class="div_baotext_con">' . $arr_ttnt[$loai_sp10]  . '</p>
                    </div>';
        if ($type == 1 || $type == 5) {
            $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CHIỀU DÀI</p>
                            <p class="div_baotext_con">' . $loai_sp12 . ' m</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CHIỀU NGANG</p>
                            <p class="div_baotext_con">' . $loai_sp13 . ' m</p>
                        </div>';
        }
        $tatca .= ' <div class="div_baotext_1">
                            <p class="div_baotext_to">DIỆN TÍCH</p>
                            <p class="div_baotext_con">' . $loai_sp11 . ' m<sup>2</sup></p>
                        </div>';
    } elseif ($id_dm == 123) { // nhà trọ
        
        

        //tình trạng nội thất
        $arr_ttnt = array(
            1 => 'Nội thất cao cấp',
            2 => 'Nội thất đầy đủ',
            3 => 'Hoàn thiện cơ bản',
            4 => 'Bàn giao thô'
        );
        //giấy tờ pháp lý
        $arr_gtpl = array(
            1 => 'Đã có sổ',
            2 => 'Đang chờ sổ',
            3 => 'Giấy tờ khác'
        );
        $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG NỘI THẤT</p>
                        <p class="div_baotext_con">' . $arr_ttnt[$loai_sp10]  . '</p>
                    </div>';
        if ($type == 1 || $type == 5) {
            $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CHIỀU DÀI</p>
                            <p class="div_baotext_con">' . $loai_sp12 . ' m</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CHIỀU NGANG</p>
                            <p class="div_baotext_con">' . $loai_sp13 . ' m</p>
                        </div>';
        }
        $tatca .= ' <div class="div_baotext_1">
                            <p class="div_baotext_to">DIỆN TÍCH</p>
                            <p class="div_baotext_con">' . $loai_sp11 . ' m<sup>2</sup></p>
                        </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TIỀN ĐẶT CỌC</p>
                        
                        <p class="div_baotext_con">' . $loai_sp16 . ' <sup>đ</sup></p>
                    </div>  
                ';
    }

    $tatca .= '
                </div>
                    </div>
                        </div>';
    // mo ta
    $tatca .= '
                <div class="w-100 mt-50">
                    <p class="pc_title pl-10">Mô tả</p>
                    <p class="mt-30 fs_16_19 text_grey">' . $mo_ta . '</p>
                </div>';
    // dia chi va chi tiet danh muc
    $tatca .= '<div class="w-100 mt-50 mb-10 fs_16_19 font_500 text_666666">
                    <p class="pc_title pl-10">Thông tin khác</p>';
    // dia chi
    if ($td_diachi_nha == '') {
        $tatca .= '<p class="mt-30 df_mt">Khu vực: <strong>' . $dia_chi . '</strong></p>';
    } else if ($dia_chi != "" && $td_diachi_nha != "") {
        $tatca .= '<p class="mt-30 df_mt">Khu vực: <strong>' . $td_diachi_nha . '</strong></p>';
    }

    // chi tiet danh muc
    if ($id_dm != 24) {
        $tatca .= '<p class="mt-20 df_mt2">Chi tiết danh mục: <strong>' . $ten_tags . '</strong></p>';
    }
    $tatca .= '</div>';
    $tatca .= '</div>';
    $tatca .= '</div>';
    $tatca .= '<div class="df_khoi_div_to_btn_7_7">
                    <button class="df_khoi_div_con_btn_7_7 btn1 quay_lai">CHỈNH SỬA</button>
                    <button class="df_khoi_div_con_btn_7_7 btn2 dang_tindi" onclick="m_dangtin(this)">ĐĂNG TIN</button>
                </div>';
    return $tatca;
}
