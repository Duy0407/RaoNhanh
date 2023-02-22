<?
function xemtrc_tdang($type, $id_dm, $tieu_de, $gia_sp, $gia_bd, $gia_kt, $don_vi, $donvi_mua, $tang_mphi, $mo_ta, $ctiet_dmuc, $dia_chi, $avt_anh, $url_vd, $tinh_trang, $loai_sp, $loai_sp2, $loai_sp3, $loai_sp4, $loai_sp5, $loai_sp6, $loai_sp7, $loai_sp8, $loai_sp9, $loai_sp10, $loai_sp11)
{

    $donvi = array(
        1 => 'VNĐ',
        2 => 'USD',
        3 => 'EURO',
    );

    $ttrang_arr1 = array(
        1 => 'Mới',
        2 => 'Đã sử dụng (chưa sửa chữa)',
        3 => 'Đã sử dụng (qua sửa chữa)',
    );

    $ttrang_arr2 = array(
        1 => 'Mới',
        2 => 'Đã sử dụng',
    );

    $avt_anh = explode(',', $avt_anh);

    if ($ctiet_dmuc != "" && $ctiet_dmuc != 'undefined') {
        $list_dm = new db_query("SELECT `ten_tags` FROM `key_tags` WHERE `tags_id` = '$ctiet_dmuc' ");
        $ten_tags = mysql_fetch_assoc($list_dm->result)['ten_tags'];
    }

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
        $li = '<img src="' . $avt_anh[$i] . '" alt="' . $tieu_de . '">';
        $tatca .= $li;
    };
    $tatca .= '</div>
                    <div class="slider-nav">';
    for ($i = 0; $i < count($avt_anh); $i++) {
        $li = '<img class="mb-10 mt-10" src=" ' . $avt_anh[$i] . '" alt="' . $tieu_de . '">';
        $tatca .= $li;
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
    // dịch vụ giải trí, sở thích khác
    if ($id_dm != 24 && $id_dm != 76 && $id_dm != 62 && $id_dm != 65 && $id_dm != 70) {
        $loai_ocung = array(
            1 => 'USD',
            2 => 'EURO',
        );

        $tatca .= '
            <div class="w-100 mt-50 df_mt_375">
                <p class="pc_title pl-10 text_ttct_df">Thông tin chi tiết</p>
                <div class="box_bao_text">
                    <div class="khung_bao_text_bd">';
        if ($id_dm == 5) {

            if ($loai_sp != "") {
                $bovi_ten = mysql_fetch_assoc((new db_query("SELECT `bovi_ten` FROM `bovi_xuly` WHERE `bovi_id` = $loai_sp"))->result)['bovi_ten'];
            } else {
                $bovi_ten = "";
            }
            if ($loai_sp2 != "") {
                $list_ram = mysql_fetch_assoc((new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $loai_sp2 "))->result)['ten_dl'];
            } else {
                $list_ram = "";
            }

            if ($loai_sp3 != "") {
                $list_ocung = mysql_fetch_assoc((new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $loai_sp3 "))->result)['ten_dl'];
            } else {
                $list_ocung = "";
            }

            if ($loai_sp4 != "") {
                $card_mhinh = mysql_fetch_assoc((new db_query("SELECT `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $loai_sp4 "))->result)['ten_manhinh'];
            } else {
                $card_mhinh = "";
            }

            if ($loai_sp6 != "") {
                $kich_co = mysql_fetch_assoc((new db_query("SELECT `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $loai_sp6 "))->result)['ten_manhinh'];
            } else {
                $kich_co = "";
            }

            if ($loai_sp7 != "") {
                $bao_hanh = mysql_fetch_assoc((new db_query("SELECT `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp7 "))->result)['tgian_baohanh'];
            } else {
                $bao_hanh = "";
            }

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">BỘ VI XỬ LÝ</p>
                        <p class="div_baotext_con">' . $bovi_ten . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">RAM</p>
                        <p class="div_baotext_con">' . $list_ram . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">Ổ CỨNG</p>
                        <p class="div_baotext_con">' . $list_ocung . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI Ổ CỨNG</p>
                        <p class="div_baotext_con">' . $loai_ocung[$loai_sp5] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">CARD MÀN HÌNH</p>
                        <p class="div_baotext_con">' . $card_mhinh . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">KÍCH CỠ MÀN HÌNH</p>
                        <p class="div_baotext_con">' . $kich_co . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">BẢO HÀNH</p>
                        <p class="div_baotext_con">' . $bao_hanh . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr1[$tinh_trang] . '</p>
                    </div>';
        } else if ($id_dm == 98) {

            $list_hang = mysql_fetch_assoc((new db_query("SELECT `ten_hang` FROM `hang` WHERE `id` = $loai_sp "))->result)['ten_hang'];

            if ($loai_sp != 1378) {
                $list_dong = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp2 "))->result)['ten_loai'];
            } else {
                $list_dong = $loai_sp2;
            };

            if ($loai_sp3 != "") {
                $bivi_xuly = mysql_fetch_assoc((new db_query("SELECT `bovi_ten` FROM `bovi_xuly` WHERE `bovi_id` = $loai_sp3 "))->result)['bovi_ten'];
            } else {
                $bivi_xuly = '';
            };

            if ($loai_sp4 != "") {
                $list_ram = mysql_fetch_assoc((new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $loai_sp4 "))->result)['ten_dl'];
            } else {
                $list_ram = '';
            }

            if ($loai_sp5 != "") {
                $list_ocung = mysql_fetch_assoc((new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $loai_sp5 "))->result)['ten_dl'];
            } else {
                $list_ocung = "";
            }

            if ($loai_sp6 != "") {
                $card_mhinh = mysql_fetch_assoc((new db_query("SELECT `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $loai_sp6 "))->result)['ten_manhinh'];
            } else {
                $card_mhinh = "";
            }

            if ($loai_sp8 != "") {
                $kich_co = mysql_fetch_assoc((new db_query("SELECT `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $loai_sp8 "))->result)['ten_manhinh'];
            } else {
                $kich_co = "";
            }

            if ($loai_sp9 != "") {
                $bao_hanh = mysql_fetch_assoc((new db_query("SELECT `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp9 "))->result)['tgian_baohanh'];
            } else {
                $bao_hanh = "";
            }

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG</p>
                        <p class="div_baotext_con">' . $list_hang . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">DÒNG MÁY</p>
                        <p class="div_baotext_con">' . $list_dong . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">BỘ VI XỬ LÝ</p>
                        <p class="div_baotext_con">' . $bivi_xuly . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">RAM</p>
                        <p class="div_baotext_con">' . $list_ram . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">Ổ CỨNG</p>
                        <p class="div_baotext_con">' . $list_ocung . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI Ổ CỨNG</p>
                        <p class="div_baotext_con">' . $loai_ocung[$loai_sp7] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">CARD MÀN HÌNH</p>
                        <p class="div_baotext_con">' . $card_mhinh . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">KÍCH THƯỚC MÀN HÌNH</p>
                        <p class="div_baotext_con">' . $kich_co . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">BẢO HÀNH</p>
                        <p class="div_baotext_con">' . $bao_hanh . '</p>
                    </div>
                     <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr1[$tinh_trang] . '</p>
                    </div>';
        } else if ($id_dm == 6) {

            $list_tbi = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham` WHERE `id` = $loai_sp "))->result)['name'];

            if ($loai_sp != 34) {
                $list_dong = mysql_fetch_assoc((new db_query("SELECT `ten_hang` FROM `hang` WHERE `id` = $loai_sp2 "))->result)['ten_hang'];
            } else {
                $list_dong = $loai_sp2;
            };

            if ($loai_sp3 != "") {
                $bao_hanh = mysql_fetch_assoc((new db_query("SELECT `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp3 "))->result)['tgian_baohanh'];
            } else {
                $bao_hanh = "";
            }


            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">THIẾT BỊ</p>
                        <p class="div_baotext_con">' . $list_tbi . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG</p>
                        <p class="div_baotext_con">' . $list_dong . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">BẢO HÀNH</p>
                        <p class="div_baotext_con">' . $bao_hanh . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr1[$tinh_trang] . '</p>
                    </div>';
        } else if ($id_dm == 7) {
            $check_hdthoai = ['1621', '1622', '1629', '1630', '1631', '1632', '1633', '1636', '1639', '1641', '1642', '1650', '1652', '1661', '1662', '1680'];

            $list_hang = mysql_fetch_assoc((new db_query("SELECT `ten_hang` FROM `hang` WHERE  `id` = $loai_sp  "))->result)['ten_hang'];
            if (in_array($loai_sp, $check_hdthoai)) {
                $list_dong = '';
            } else {
                if ($list_hang != 1683) {
                    $list_dong = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp2 "))->result)['ten_loai'];
                } else {
                    $list_dong = $loai_sp2;
                }
            };

            if ($loai_sp3 != "") {
                $list_ms = mysql_fetch_assoc((new db_query("SELECT `mau_sac` FROM `mau_sac` WHERE `id_color` = $loai_sp3  "))->result)['mau_sac'];
            } else {
                $list_ms = '';
            };

            if ($loai_sp4 != "") {
                $list_dl = mysql_fetch_assoc((new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $loai_sp4 "))->result)['ten_dl'];
            } else {
                $list_dl = '';
            };

            if ($loai_sp5 != "") {
                $bao_hanh = mysql_fetch_assoc((new db_query("SELECT `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp5 "))->result)['tgian_baohanh'];
            } else {
                $bao_hanh = '';
            };

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG</p>
                        <p class="div_baotext_con">' . $list_hang . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">DÒNG MÁY</p>
                        <p class="div_baotext_con">' . $list_dong . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">MÀU SẮC</p>
                        <p class="div_baotext_con">' . $list_ms . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">DUNG LƯỢNG</p>
                        <p class="div_baotext_con">' . $list_dl . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">BẢO HÀNH</p>
                        <p class="div_baotext_con">' . $bao_hanh . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr1[$tinh_trang] . '</p>
                    </div>';
        } else if ($id_dm == 35) {
            $list_hang = mysql_fetch_assoc((new db_query("SELECT `ten_hang` FROM `hang` WHERE  `id` = $loai_sp "))->result)['ten_hang'];

            if ($loai_sp != 1694) {
                $list_dong = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp2 "))->result)['ten_loai'];
            } else {
                $list_dong = $loai_sp2;
            };

            if ($loai_sp5 != "") {
                $list_dl = mysql_fetch_assoc((new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $loai_sp5 "))->result)['ten_dl'];
            } else {
                $list_dl = "";
            }

            if ($loai_sp4 != "") {
                $list_mhinh = mysql_fetch_assoc((new db_query("SELECT `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $loai_sp4 "))->result)['ten_manhinh'];
            } else {
                $list_mhinh = "";
            }

            if ($loai_sp6 != "") {
                $bao_hanh = mysql_fetch_assoc((new db_query("SELECT `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp6 "))->result)['tgian_baohanh'];
            } else {
                $bao_hanh = "";
            }



            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG</p>
                        <p class="div_baotext_con">' . $list_hang . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">DÒNG MÁY</p>
                        <p class="div_baotext_con">' . $list_dong . '</p>
                    </div>';

            if ($type == 1 || $type == 5) {
                if ($loai_sp3 != "") {
                    $arr_sdsim = array(
                        1 => 'Có',
                        2 => 'Không',
                    );

                    $co_khong = $arr_sdsim[$loai_sp3];
                } else {
                    $co_khong = '';
                };

                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">SỬ DỤNG SIM</p>
                        <p class="div_baotext_con">' . $co_khong . '</p>
                    </div>';
            }

            $tatca .= ' <div class="div_baotext_1">
                            <p class="div_baotext_to">DUNG LƯỢNG</p>
                            <p class="div_baotext_con">' . $list_dl . '</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">KÍCH CỠ MÀN HÌNH</p>
                            <p class="div_baotext_con">' . $list_mhinh . '</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">BẢO HÀNH</p>
                            <p class="div_baotext_con">' . $bao_hanh . '</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">TÌNH TRẠNG</p>
                            <p class="div_baotext_con">' . $ttrang_arr1[$tinh_trang] . '</p>
                        </div>';
        } else if ($id_dm == 36) {
            $list_tbi = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham` WHERE `id` = $loai_sp "))->result)['name'];

            $list_hang = mysql_fetch_assoc((new db_query("SELECT `ten_hang` FROM `hang` WHERE `id` = $loai_sp2 "))->result)['ten_hang'];

            if ($loai_sp5 != "") {
                $bao_hanh = mysql_fetch_assoc((new db_query("SELECT `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp5 "))->result)['tgian_baohanh'];
            } else {
                $bao_hanh = "";
            }

            if ($loai_sp == 52 || $loai_sp == 53) {
                if ($loai_sp3 != "") {
                    $list_loai = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp3 "))->result)['ten_loai'];
                }
            };

            if ($loai_sp == 53 || $loai_sp == 54 || $loai_sp == 57) {
                if ($loai_sp4 != "") {
                    $list_dl =  mysql_fetch_assoc((new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = $loai_sp4 "))->result)['ten_dl'];
                } else {
                    $list_dl = '';
                };

                if ($loai_sp9 != '') {
                    $xuat_xu = mysql_fetch_assoc((new db_query("SELECT `noi_xuatxu` FROM `xuat_xu` WHERE id_xuatxu = $loai_sp9 "))->result)['noi_xuatxu'];
                } else {
                    $xuat_xu = '';
                }
            };

            $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">THIẾT BỊ</p>
                            <p class="div_baotext_con">' . $list_tbi . '</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">HÃNG</p>
                            <p class="div_baotext_con">' . $list_hang . '</p>
                        </div>';
            if ($loai_sp == 52) {
                if ($loai_sp7 != "") {
                    $arr_sdsim = array(
                        1 => 'Có',
                        2 => 'Không',
                    );
                    $co_khong = $arr_sdsim[$loai_sp7];
                } else {
                    $co_khong = '';
                };

                $list_mh = mysql_fetch_assoc((new db_query("SELECT `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $loai_sp6 "))->result)['ten_manhinh'];

                $tatca .= '
                            <div class="div_baotext_1">
                                <p class="div_baotext_to">KÍCH THƯỚC</p>
                                <p class="div_baotext_con">' . $list_mh . '</p>
                            </div>
                            <div class="div_baotext_1">
                                <p class="div_baotext_to">KẾT NỐI INTERNET</p>
                                <p class="div_baotext_con">' . $co_khong . '</p>
                            </div>
                            <div class="div_baotext_1">
                                <p class="div_baotext_to">LOẠI TV</p>
                                <p class="div_baotext_con">' . $list_loai . '</p>
                            </div>';

                $do_phangiai = mysql_fetch_assoc((new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $loai_sp8 "))->result)['ten_dl'];
                $tatca .= '
                            <div class="div_baotext_1">
                                <p class="div_baotext_to">ĐỘ PHÂN GIẢI</p>
                                <p class="div_baotext_con">' . $do_phangiai . '</p>
                            </div>';
            }
            if ($loai_sp == 53) {
                $tatca .= '
                            <div class="div_baotext_1">
                                <p class="div_baotext_to">LOẠI LOA</p>
                                <p class="div_baotext_con">' . $list_loai . '</p>
                            </div>';
            }
            if ($loai_sp == 53 || $loai_sp == 57) {
                $tatca .= '
                            <div class="div_baotext_1">
                                <p class="div_baotext_to">CÔNG XUẤT</p>
                                <p class="div_baotext_con">' . $list_dl . '</p>
                            </div>';
            }
            if ($loai_sp == 54) {
                $tatca .= '
                            <div class="div_baotext_1">
                                <p class="div_baotext_to">CÔNG XUẤT ÂM THANH</p>
                                <p class="div_baotext_con">' . $list_dl . '</p>
                            </div>
                            <div class="div_baotext_1">
                                <p class="div_baotext_to">XUẤT XỨ THƯƠNG HIỆU</p>
                                <p class="div_baotext_con">' . $xuat_xu . '</p>
                            </div>';
            }
            if ($loai_sp == 57) {
                $tatca .= '
                            <div class="div_baotext_1">
                                <p class="div_baotext_to">XUẤT XỨ THƯƠNG HIỆU</p>
                                <p class="div_baotext_con">' . $xuat_xu . '</p>
                            </div>';
            }

            $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">BẢO HÀNH</p>
                            <p class="div_baotext_con">' . $bao_hanh . '</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">TÌNH TRẠNG</p>
                            <p class="div_baotext_con">' . $ttrang_arr1[$tinh_trang] . '</p>
                        </div>';
        } else if ($id_dm == 37) {

            if ($loai_sp != '') {
                $querypk = mysql_fetch_assoc((new db_query("SELECT `ten_loai`  FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];
            };

            if ($loai_sp3 != "") {
                $bao_hanh = mysql_fetch_assoc((new db_query("SELECT `tgian_baohanh` FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp3 "))->result)['tgian_baohanh'];
            } else {
                $bao_hanh = '';
            };

            if ($loai_sp != '') {
                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI PHỤ KIỆN</p>
                        <p class="div_baotext_con">' . $querypk . '</p>
                    </div>';
            }

            if ($loai_sp2 != '') {
                $query = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham_chatlieu` where `id` = $loai_sp2 "))->result)['name'];
                $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">Thiết bị</p>
                            <p class="div_baotext_con">' . $query . '</p>
                        </div>';
            }

            $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">BẢO HÀNH</p>
                            <p class="div_baotext_con">' . $bao_hanh . '</p>
                        </div>
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">TÌNH TRẠNG</p>
                            <p class="div_baotext_con">' . $ttrang_arr1[$tinh_trang] . '</p>
                        </div>';
        } else if ($id_dm == 99) {

            $thiet_bi = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];

            if ($loai_sp4 != "") {
                $bao_hanh = mysql_fetch_assoc((new db_query("SELECT `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp4 "))->result)['tgian_baohanh'];
            } else {
                $bao_hanh = '';
            }

            if ($loai_sp != 4345) {
                if ($loai_sp2 != "") {
                    $hang = mysql_fetch_assoc((new db_query("SELECT `ten_hang`  FROM `hang` WHERE `id` = $loai_sp2 "))->result)['ten_hang'];
                } else {
                    $hang = "";
                }


                if ($loai_sp2 == 1766 || $loai_sp2 == 1774) {
                    $list_dong = $loai_sp3;
                } else {
                    $list_dong = mysql_fetch_assoc((new db_query("SELECT `ten_dong` FROM `dong` WHERE `id` = $loai_sp3 "))->result)['ten_dong'];
                }
            } else {
                $hang = $loai_sp2;
                $list_dong = $loai_sp3;
            };
            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">THIẾT BỊ</p>
                        <p class="div_baotext_con">' . $thiet_bi . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG</p>
                        <p class="div_baotext_con">' . $hang . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">DÒNG</p>
                        <p class="div_baotext_con">' . $list_dong . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">BẢO HÀNH</p>
                        <p class="div_baotext_con">' . $bao_hanh . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr1[$tinh_trang] . '</p>
                    </div>';
        } else if ($id_dm == 96) {

            if ($loai_sp != "") {
                $bao_hanh = mysql_fetch_assoc((new db_query("SELECT `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp "))->result)['tgian_baohanh'];
            } else {
                $bao_hanh = "";
            }

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">BẢO HÀNH</p>
                        <p class="div_baotext_con">' . $bao_hanh . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr1[$tinh_trang] . '</p>
                    </div>';
        } else if ($id_dm == 100) {

            $list_ncu = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI NHẠC CỤ</p>
                        <p class="div_baotext_con">' . $list_ncu . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
        }
        // sách, thiết bị chơi game, thời rang nam, thời trang nữ, thời trang đồng phục, thời trang bé, thủ công mỹ nghệ, hoa quà tặng, nghệ thuật thủ công, đồ dùng văn phòng, noi that vuon
        else if ($id_dm == 101 || $id_dm == 43 || $id_dm == 45 || $id_dm == 44 || $id_dm == 46 || $id_dm == 54 || $id_dm == 84 || $id_dm == 87 || $id_dm == 88 || $id_dm == 116 || $id_dm == 117 || $id_dm == 86 || $id_dm == 60 || $id_dm == 83) {

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
        }
        // nội thất khác
        else if ($id_dm == 85) {
            if ($loai_sp != "") {
                $pr_clieu = mysql_fetch_assoc((new db_query("SELECT `id`, `name` FROM nhom_sanpham_chatlieu WHERE id_danhmuc = '$id_dm' "))->result)['name'];
            }
            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">CHẤT LIỆU</p>
                        <p class="div_baotext_con">' . $pr_clieu . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>
                    ';
        } else if ($id_dm == 103) {
            if ($loai_sp != "" && $loai_sp != 0) {
                $list_baohanh = mysql_fetch_assoc((new db_query("SELECT `tgian_baohanh` FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp "))->result)['tgian_baohanh'];
            }
            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">BẢO HÀNH</p>
                        <p class="div_baotext_con">' . $list_baohanh . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HÃNG</p>
                        <p class="div_baotext_con">' . $loai_sp2 . '</p>
                    </div>
                    ';
        } else if ($id_dm == 116 || $id_dm == 117) {
            $ttrang_arr3 = array(
                1 => 'Mới',
                2 => 'Cũ (Đã sửa chữa)',
                3 => 'Cũ (Chưa sửa chữa)',
            );
            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr3[$tinh_trang] . '</p>
                    </div>';
        } else if ($id_dm == 47) {
            if ($loai_sp != "" && $loai_sp != 0) {
                $loaisanpham = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];
            }
            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI SẢN PHẨM</p>
                        <p class="div_baotext_con">' . $loaisanpham . '</p>
                    </div>
                    ';
        } else if ($id_dm == 53) {
            if ($loai_sp != "" && $loai_sp != 0) {
                $loaisanpham = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];
            }
            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI SẢN PHẨM</p>
                        <p class="div_baotext_con">' . $loaisanpham . '</p>
                    </div>
                    ';
        }
        // sưu tầm đồ cổ, thời trang giày dép, thười trang phụ kiện, thời trang tui xách
        else if ($id_dm == 102 || $id_dm == 48 || $id_dm == 49 || $id_dm == 50 || $id_dm == 106) {

            $list_tm = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI SẢN PHẨM</p>
                        <p class="div_baotext_con">' . $list_tm . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
        }
        // dụng cụ thể thao
        else if ($id_dm == 75) {

            $list_mtt = mysql_fetch_assoc((new db_query("SELECT `id`, `ten_mon` FROM `mon_the_thao` WHERE `id` = $loai_sp "))->result)['ten_mon'];

            if ($loai_sp != 8) {
                if ($type == 1 || $type == 5) {
                    $list_loai = mysql_fetch_assoc((new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp2 "))->result)['ten_loai'];
                }
            } else {
                if ($type == 1 || $type == 5) {
                    $list_loai = $loai_sp2;
                }
            };

            if ($type == 1 || $type == 5) {
                $ttrang = $ttrang_arr2[$tinh_trang];
            }

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">MÔN THỂ THAO</p>
                        <p class="div_baotext_con">' . $list_mtt . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI DỤNG CỤ</p>
                        <p class="div_baotext_con">' . $list_loai . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang . '</p>
                    </div>';
        }
        // thoi trang the thao
        else if ($id_dm == 104) {

            $list_mtt = mysql_fetch_assoc((new db_query("SELECT `ten_mon` FROM `mon_the_thao` WHERE `id` = $loai_sp "))->result)['ten_mon'];

            if ($type == 1 || $type == 5) {
                $list_loai = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp2 "))->result)['ten_loai'];
                $ttrang = $ttrang_arr2[$tinh_trang];
            }

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">MÔN THỂ THAO</p>
                        <p class="div_baotext_con">' . $list_mtt . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI THỜI TRANG</p>
                        <p class="div_baotext_con">' . $list_loai . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang . '</p>
                    </div>';
        }
        // phu kien the thao
        else if ($id_dm == 105) {

            $list_mtt = mysql_fetch_assoc((new db_query("SELECT `ten_mon` FROM `mon_the_thao` WHERE `id` = $loai_sp "))->result)['ten_mon'];

            if ($loai_sp != 8) {
                if ($type == 1 || $type == 5) {
                    $list_loai = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp2 "))->result)['ten_loai'];
                }
            } else {
                if ($type == 1 || $type == 5) {
                    $list_loai = $loai_sp2;
                }
            };

            if ($type == 1 || $type == 5) {
                $ttrang = $ttrang_arr2[$tinh_trang];
            }

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">MÔN THỂ THAO</p>
                        <p class="div_baotext_con">' . $list_mtt . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI PHỤ KIỆN</p>
                        <p class="div_baotext_con">' . $list_loai . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang . '</p>
                    </div>';
        }
        // thực phẩm
        else if ($id_dm == 94) {

            $list_tpham =  mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI THỰC PHẨM</p>
                        <p class="div_baotext_con">' . $list_tpham . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HẠN SỬ DỤNG</p>
                        <p class="div_baotext_con">' . date('d-m-Y', strtotime($loai_sp2)) . '</p>
                    </div>';
        }
        // đồ uống
        else if ($id_dm == 95) {
            $list_tpham =  mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI ĐỒ UỐNG</p>
                        <p class="div_baotext_con">' . $list_tpham . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HẠN SỬ DỤNG</p>
                        <p class="div_baotext_con">' . date('d-m-Y', strtotime($loai_sp2)) . '</p>
                    </div>';
        }
        // thiet bi dien lanh
        else if ($id_dm == 56) {
            $arr_loaimg = array(
                1 => 'Cửa trước',
                2 => 'Cửa sau',
            );

            $list_tpham =  mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];

            if ($loai_sp == 2103 || $loai_sp == 2105) {
                if ($loai_sp2 != "") {
                    $dung_tich = mysql_fetch_assoc((new db_query("SELECT `ten_dl` FROM `dung_luong` where `id_dl` = $loai_sp2 "))->result)['ten_dl'];
                } else {
                    $dung_tich = "";
                }
            }

            if ($loai_sp != 2107) {
                if ($loai_sp3 != "") {
                    $hang = mysql_fetch_assoc((new db_query("SELECT `ten_hang` FROM `hang` WHERE `id` = $loai_sp3 "))->result)['ten_hang'];
                } else {
                    $hang = "";
                }
            }

            if ($loai_sp == 2104) {
                if ($loai_sp4 != "") {
                    $cong_suat = mysql_fetch_assoc((new db_query("SELECT `ten_dl` FROM `dung_luong` where `id_dl` = $loai_sp4 "))->result)['ten_dl'];
                } else {
                    $cong_suat = "";
                }
            }

            if ($loai_sp == 2106) {
                if ($loai_sp5 != "") {
                    $kl_giat = mysql_fetch_assoc((new db_query("SELECT `ten_dl` FROM `dung_luong` where `id_dl` = $loai_sp5 "))->result)['ten_dl'];
                } else {
                    $kl_giat = "";
                }
            }
            if ($loai_sp7 != "") {
                $bao_hanh = mysql_fetch_assoc((new db_query("SELECT `tgian_baohanh` FROM `bao_hanh` where `id_baohanh` = $loai_sp7 "))->result)['tgian_baohanh'];
            }
            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI THIẾT BỊ</p>
                        <p class="div_baotext_con">' . $list_tpham . '</p>
                    </div>';
            if ($loai_sp == 2106) {
                $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">LOẠI MÁY GIẶT</p>
                            <p class="div_baotext_con">' . $arr_loaimg[$loai_sp6] . '</p>
                        </div>
                        ';
            }
            if ($loai_sp != 2107) {
                $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">Hãng</p>
                            <p class="div_baotext_con">' . $hang . '</p>
                        </div>';
            }
            if ($loai_sp == 2104) {
                $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">CÔNG SUẤT</p>
                            <p class="div_baotext_con">' . $cong_suat . '</p>
                        </div>';
            }
            if ($loai_sp == 2106) {
                $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">KHỐI LƯỢNG GIẶT</p>
                            <p class="div_baotext_con">' . $kl_giat . '</p>
                        </div>
                        ';
            }
            if ($loai_sp == 2103 || $loai_sp == 2105) {
                $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">DUNG TÍCH</p>
                            <p class="div_baotext_con">' . $dung_tich . '</p>
                        </div>';
            }

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">BẢO HÀNH</p>
                        <p class="div_baotext_con">' . $bao_hanh . '</p>
                    </div>';
        }
        // thiet bi nha bep
        else if ($id_dm == 57) {
            $list_nhom = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham` WHERE `id` = $loai_sp "))->result)['name'];

            if ($loai_sp != 37) {
                $list_loai = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` where `id` = $loai_sp2 "))->result)['ten_loai'];
            }

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI THIẾT BỊ</p>
                        <p class="div_baotext_con">' . $list_nhom . '</p>
                    </div>';
            if ($loai_sp != 37) {
                $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">LOẠI SẢN PHẨM</p>
                            <p class="div_baotext_con">' . $list_loai . '</p>
                        </div>';
            }

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
        }
        // thiet bi theo mua,thiey bi suc khoe
        else if ($id_dm == 58 || $id_dm == 59) {
            $list_nhom = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham` WHERE `id` = $loai_sp "))->result)['name'];

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI THIẾT BỊ</p>
                        <p class="div_baotext_con">' . $list_nhom . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
        }
        // noi that phong khach
        else if ($id_dm == 78) {
            $list_nhom = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham` WHERE `id` = $loai_sp "))->result)['name'];
            // loai san pham
            if ($loai_sp == 2 || $loai_sp == 3 || $loai_sp == 5) {
                $loai_spham = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` where `id` = $loai_sp2 "))->result)['ten_loai'];
            }

            if ($loai_sp != 5) {
                $chat_lieu = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham_chatlieu` WHERE `id` = $loai_sp3 "))->result)['name'];
            }


            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI THIẾT BỊ</p>
                        <p class="div_baotext_con">' . $list_nhom . '</p>
                    </div>';
            if ($loai_sp == 2 || $loai_sp == 3 || $loai_sp == 5) {
                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI SẢN PHẨM</p>
                        <p class="div_baotext_con">' . $loai_spham . '</p>
                    </div>';
            }

            if ($loai_sp != 5) {
                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">CHẤT LIỆU</p>
                        <p class="div_baotext_con">' . $chat_lieu . '</p>
                    </div>';
            }

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
        }
        // noi that phong ngu
        else if ($id_dm == 79) {
            $list_nhom = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham` WHERE `id` = $loai_sp "))->result)['name'];

            if ($loai_sp != 10 && $loai_sp != 11 && $loai_sp != 16) {
                if ($loai_sp2 != "") {
                    $loai_spham = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` where `id` = $loai_sp2 "))->result)['ten_loai'];
                } else {
                    $loai_spham = "";
                }
            };

            if ($loai_sp != 10 && $loai_sp != 14 && $loai_sp != 15 && $loai_sp != 16) {
                if ($loai_sp3 != "") {
                    $chat_lieu = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham_chatlieu` WHERE `id` = $loai_sp3 "))->result)['name'];
                } else {
                    $chat_lieu = "";
                }
            };

            if ($loai_sp == 14) {
                if ($loai_sp4 != "") {
                    $hinh_dang = mysql_fetch_assoc((new db_query("SELECT `name` FROM nhom_sanpham_hinhdang WHERE `id` = $loai_sp4 "))->result)['name'];
                } else {
                    $hinh_dang = "";
                }
            };

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI THIẾT BỊ</p>
                        <p class="div_baotext_con">' . $list_nhom . '</p>
                    </div>';
            if ($loai_sp != 10 && $loai_sp != 11 && $loai_sp != 16) {
                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI SẢN PHẨM</p>
                        <p class="div_baotext_con">' . $loai_spham . '</p>
                    </div>';
            };

            if ($loai_sp != 10 && $loai_sp != 14 && $loai_sp != 15 && $loai_sp != 16) {
                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">CHẤT LIỆU</p>
                        <p class="div_baotext_con">' . $chat_lieu . '</p>
                    </div>';
            };

            if ($loai_sp == 14) {
                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HÌNH DẠNG</p>
                        <p class="div_baotext_con">' . $hinh_dang . '</p>
                    </div>';
            };

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
        }
        // noi that phong bep
        else if ($id_dm == 80) {
            $list_nhom = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham` WHERE `id` = $loai_sp "))->result)['name'];

            if ($loai_sp == 18 || $loai_sp == 19) {
                $loai_spham = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` where `id` = $loai_sp2 "))->result)['ten_loai'];
            };

            if ($loai_sp3 != "") {
                $chat_lieu = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham_chatlieu` WHERE `id` = $loai_sp3 "))->result)['name'];
            } else {
                $chat_lieu = "";
            }



            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI THIẾT BỊ</p>
                        <p class="div_baotext_con">' . $list_nhom . '</p>
                    </div>';

            if ($loai_sp == 18 || $loai_sp == 19) {
                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI SẢN PHẨM</p>
                        <p class="div_baotext_con">' . $loai_spham . '</p>
                    </div>';
            };

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">CHẤT LIỆU</p>
                        <p class="div_baotext_con">' . $chat_lieu . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
        }
        // noi that phong tam
        else if ($id_dm == 81) {
            $list_nhom = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];

            if ($loai_sp != 2064) {
                if ($loai_sp3 != "") {
                    $thuong_hieu = mysql_fetch_assoc((new db_query("SELECT `ten_hang` FROM hang WHERE id = $loai_sp3 "))->result)['ten_hang'];
                } else {
                    $thuong_hieu = '';
                }
            };

            if ($loai_sp == 2060) {
                if ($loai_sp2 != "") {
                    $hinh_dang = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham_hinhdang` WHERE `id` = $loai_sp2 "))->result)['name'];
                } else {
                    $hinh_dang = "";
                }
            };

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI SẢN PHẨM</p>
                        <p class="div_baotext_con">' . $list_nhom . '</p>
                    </div>';

            if ($loai_sp != 2064) {
                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">THƯƠNG HIỆU</p>
                        <p class="div_baotext_con">' . $thuong_hieu . '</p>
                    </div>';
            };

            if ($loai_sp == 2060) {
                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HÌNH DÁNG</p>
                        <p class="div_baotext_con">' . $hinh_dang . '</p>
                    </div>';
            };

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
        }
        // noi that phong tam
        else if ($id_dm == 82) {
            $list_nhom = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham` WHERE `id` = $loai_sp "))->result)['name'];

            if ($loai_sp != 30) {
                if ($loai_sp2 != "") {
                    $loai_spham = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` where `id`= $loai_sp2 "))->result)['ten_loai'];
                } else {
                    $loai_spham = "";
                }

                if ($loai_sp3 != "") {
                    $chat_lieu = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham_chatlieu` WHERE `id` = $loai_sp3 "))->result)['name'];
                } else {
                    $chat_lieu = "";
                }
            };

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI SẢN PHẨM</p>
                        <p class="div_baotext_con">' . $list_nhom . '</p>
                    </div>';

            if ($loai_sp != 30) {
                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">THƯƠNG HIỆU</p>
                        <p class="div_baotext_con">' . $loai_spham . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">HÌNH DÁNG</p>
                        <p class="div_baotext_con">' . $chat_lieu . '</p>
                    </div>';
            };

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
        }
        // ngoai that
        else if ($id_dm == 118) {
            $list_nhom = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI THIẾT BỊ</p>
                        <p class="div_baotext_con">' . $list_nhom . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
        }
        // ngoai that
        else if ($id_dm == 19) {
            $ten_tpho = mysql_fetch_assoc((new db_query("SELECT `cit_name` FROM `city` WHERE `cit_id` = $loai_sp "))->result)['cit_name'];
            $ten_qhuyen = mysql_fetch_assoc((new db_query("SELECT `cit_name` FROM `city2` WHERE `cit_id` = $loai_sp "))->result)['cit_name'];

            if ($loai_sp5 == 1) {
                $ca_ngay = "Cả ngày";
            } else {
                $tgian_bd = date('h:i A', strtotime($loai_sp3));
                $tgian_kt = date('h:i A', strtotime($loai_sp4));
            };

            if ($loai_sp6 != "") {
                $loai_xe = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp6 "))->result)['ten_loai'];
            } else {
                $loai_xe = "";
            };

            if ($loai_sp7 != "") {
                $loai_hhoa = mysql_fetch_assoc((new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_sp7 "))->result)['ten_loai'];
            } else {
                $loai_hhoa = "";
            };

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">KHU VỰC GIAO NHẬN HÀNG</p>
                        <p class="div_baotext_con">' . $ten_qhuyen . ', ' . $ten_tpho . '</p>
                    </div>';
            if ($loai_sp5 == 1) {
                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">THỜI GIAN LÀM VIỆC</p>
                        <p class="div_baotext_con">' . $ca_ngay . '</p>
                    </div>';
            } else {
                $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">THỜI GIAN LÀM VIỆC</p>
                        <p class="div_baotext_con">' . $tgian_bd . ' - ' . $tgian_kt . '</p>
                    </div>';
            }
            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI XE</p>
                        <p class="div_baotext_con">' . $loai_xe . '</p>
                    </div>
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI HÀNG HOÁ GIAO</p>
                        <p class="div_baotext_con">' . $loai_hhoa . '</p>
                    </div>';
        }
        // đồ điện tử linh kiện
        else if ($id_dm == 124) {
            if ($loai_sp != '') {
                $linh_kien = mysql_fetch_assoc((new db_query("SELECT `ten_loai`  FROM `loai_chung` WHERE `id` = $loai_sp "))->result)['ten_loai'];
            };

            if ($loai_sp2 != '') {
                $thiet_bi = mysql_fetch_assoc((new db_query("SELECT `name` FROM `nhom_sanpham_chatlieu` WHERE `id` = $loai_sp2 "))->result)['name'];
            };

            if ($loai_sp3 != '') {
                $bao_hanh = mysql_fetch_assoc((new db_query("SELECT `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = $loai_sp3 "))->result)['tgian_baohanh'];
            };

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">LOẠI LINH KIỆN</p>
                        <p class="div_baotext_con">' . $linh_kien . '</p>
                    </div>';
            if ($loai_sp2 != '') {
                $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">THIẾT BỊ</p>
                            <p class="div_baotext_con">' . $thiet_bi . '</p>
                        </div>';
            };

            if ($loai_sp3 != '') {
                $tatca .= '
                        <div class="div_baotext_1">
                            <p class="div_baotext_to">BẢO HÀNH</p>
                            <p class="div_baotext_con">' . $bao_hanh . '</p>
                        </div>';
            }

            $tatca .= '
                    <div class="div_baotext_1">
                        <p class="div_baotext_to">TÌNH TRẠNG</p>
                        <p class="div_baotext_con">' . $ttrang_arr2[$tinh_trang] . '</p>
                    </div>';
        }
        $tatca .= '
                </div>
                    </div>
                        </div>';
    }
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
    if ($dia_chi != '') {
        $str_diachi = '';
        $dia_chi = explode(';', $dia_chi);
        foreach ($dia_chi as $item_diachi) {
            if ($item_diachi != '') {
                $str_diachi .= ltrim($item_diachi, ',') . '; ';
            }
        }
        $dia_chi = rtrim($str_diachi, '; ');
        $tatca .= '<p class="mt-30 df_mt">Khu vực: <strong>' . $dia_chi . '</strong></p>';
    }
    // chi tiet danh muc
    if ($ctiet_dmuc != "" && $ctiet_dmuc != 'undefined') {
        $tatca .= '<p class="mt-20 df_mt2">Chi tiết danh mục: <strong>' . $ten_tags . '</strong></p>';
    }

    $tatca .= '</div>';
    $tatca .= '</div>';
    $tatca .= '</div>';
    $tatca .= '<div class="df_khoi_div_to_btn_7_7">
                    <button class="df_khoi_div_con_btn_7_7 btn1 quay_lai">CHỈNH SỬA</button>
                    <button class="b11dc_btn_dangtin dangtin_oto df_khoi_div_con_btn_7_7 btn2 dang_tindi" onclick="m_dangtin()">ĐĂNG TIN</button>
                </div>';
    return $tatca;
}
