<?
if ($id != 0) {
    $tang_view = new db_query("UPDATE `new` SET `new_view_count`= new_view_count + 1 WHERE `new_id` = $id");
    $ctsp1 = new db_query("SELECT * FROM `new` WHERE `new_id` = $id LIMIT 1");
    $ctsp2 = new db_query("SELECT * FROM `new_description` WHERE `new_id` = $id LIMIT 1");
    
    $rs_ctsp_new = mysql_fetch_assoc($ctsp1->result);
    $rs_ctsp_new_des = mysql_fetch_assoc($ctsp2->result);

    if ($rs_ctsp_new['new_buy_sell'] == 1 && $rs_ctsp_new['new_cate_id'] != 121) {
        header('Location: /');
    }

    $user_dangnhap = new db_query("SELECT `usc_money` FROM `user` WHERE `usc_id` = '$id_user' AND `usc_type` = '$type_user'");
    $user_dangnhap_ok = mysql_fetch_assoc($user_dangnhap->result);
    $money = $user_dangnhap_ok['usc_money'];



    // Tin đăng tương tự
    $tindang_tt = new db_query("SELECT `new_id`, `new_title`, `link_title`, `dia_chi`, `new_money`, `new_unit`, `gia_kt`, `new_image`, `new_create_time`, `chotang_mphi`,
                                `chat365_id`, `chat365_secret`, `new_cate_id`,`usc_name` FROM `new`
                                INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                                WHERE `new_cate_id` = ".$rs_ctsp_new['new_cate_id']." AND `new_type` = ".$rs_ctsp_new['new_type']." AND `new_city` = ".$rs_ctsp_new['new_city']."
                                AND `new_id`!= $id ORDER BY `new_id` DESC LIMIT 18 ");

    $tindang_tt2 = new db_query("SELECT `new_id`, `new_title`, `link_title`, `dia_chi`, `new_money`, `new_unit`, `gia_kt`, `new_image`, `new_create_time`, `chotang_mphi`,
                                `chat365_id`, `chat365_secret`, `new_cate_id`,`usc_name` FROM `new`
                                INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                                WHERE `new_cate_id` = ".$rs_ctsp_new['new_cate_id']." AND `new_type` = ".$rs_ctsp_new['new_type']." AND `new_id`!= $id ORDER BY `new_id` DESC LIMIT 18 ");

    $tindang_tt3 = new db_query("SELECT `new_id`, `new_title`, `link_title`, `dia_chi`, `new_money`, `new_unit`, `gia_kt`, `new_image`, `new_create_time`, `chotang_mphi`,
                                `chat365_id`, `chat365_secret`, `new_cate_id`,`usc_name` FROM `new`
                                INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                                WHERE `new_type` = ".$rs_ctsp_new['new_type']." AND `new_id`!= $id AND `new_city` = ".$rs_ctsp_new['new_city']." ORDER BY `new_id` DESC LIMIT 18 ");

    // ĐỒ ĐIỆN TỬ
    $lkpk = array(1 => 'Phụ kiện', 2 => 'Linh kiện');
    $internet = array(1 => 'Có', 2 => 'Không');
    $loai_o_cung_ar = array(1 => 'HDD', 2 => 'SSD');
    $tinht = array(1 => 'Mới', 2 => 'Đã sử dụng (chưa sửa chữa)', 3 => 'Đã sử dụng (qua sửa chữa)');
    $tinhtrang = array(1 => 'Mới', 2 => 'Đã sử dụng');
    $tinhtrang_moi = array(1 => 'mới 100%', 2 => 'Đã sử dụng');
    $tinhtrangxe = array(1 => 'Mới', 2 => 'Cũ (Chưa sửa chữa)', 3 => 'Cũ (Đã sửa chữa)');
    $sim = array(1 => 'Có', 2 => 'Không');


    $check_hdthoai = ['1621', '1622', '1629', '1630', '1631', '1632', '1633', '1636', '1639', '1641', '1642', '1650', '1652', '1661', '1662', '1680'];
    // Máy tính để bàn
    if ($rs_ctsp_new['new_cate_id'] == 98) {
        // Hãng
        if ($rs_ctsp_new_des['hang'] != "") {
            $hang_qr = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id` = ".$rs_ctsp_new_des['hang']." AND `id_danhmuc` = ".$rs_ctsp_new['new_cate_id']."");
            $hang_ok = mysql_fetch_assoc($hang_qr->result);
        }

        // Dòng Máy
        if ($rs_ctsp_new_des['hang'] != 1378) {
            if ($rs_ctsp_new_des['dong_may'] != "") {
                $dongmay = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['dong_may']." AND `id_danhmuc` = 98 ");
                $dongmay_ok = mysql_fetch_assoc($dongmay->result);
            }
        }
    };

    if ($rs_ctsp_new['new_cate_id'] == 98 || $rs_ctsp_new['new_cate_id'] == 5) {
        // Bộ sử lý
        if ($rs_ctsp_new_des['bovi_xuly'] != "") {
            $boxuly = new db_query("SELECT `bovi_ten` FROM `bovi_xuly` WHERE `bovi_id` = ".$rs_ctsp_new_des['bovi_xuly']."");
            $boxuly_ok = mysql_fetch_assoc($boxuly->result);
        }
        // Ram, Ổ cứng
        $ram_db = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` =  ".$rs_ctsp_new_des['ram']." ");
        $ram_ok = mysql_fetch_assoc($ram_db->result);
        // Ổ Cứng
        $o_cung_db = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = ".$rs_ctsp_new_des['o_cung']."");
        $o_cung_ok = mysql_fetch_assoc($o_cung_db->result);

        // KÍCH CỞ
        $kickco = new db_query("SELECT `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = ".$rs_ctsp_new_des['kich_co']."");
        $kickco_ok = mysql_fetch_assoc($kickco->result);
    };
    // Màn Hình
    $manhinh = new db_query("SELECT `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = ".$rs_ctsp_new_des['man_hinh']."");
    $manhinh_ok = mysql_fetch_assoc($manhinh->result);
    if ($rs_ctsp_new['new_cate_id'] == 6 || $rs_ctsp_new['new_cate_id'] == 7 || $rs_ctsp_new['new_cate_id'] == 35) {
        // so sánh giá
        $loai_sp1 = $rs_ctsp['thiet_bi'];
        //Hãng
        if ($rs_ctsp_new_des['thiet_bi'] != 34) {
            if ($rs_ctsp_new_des['hang'] != "") {
                $hang_mamq = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id` = ".$rs_ctsp_new_des['hang']."");
                $hang_mamq_ok = mysql_fetch_assoc($hang_mamq->result);
                $id_hang = $hang_mamq_ok['id'];
            }
        }
        // DÒNG MÁY
        if ($id_hang != 1683 && $id_hang != 1694) {
            if ($rs_ctsp_new_des['dong_may'] != '') {
                $dongmay_7 = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['dong_may']." ");
                $dongmay7_ok = mysql_fetch_assoc($dongmay_7->result);
            }
        }
        //DUNG LƯỢNG
        $dungluong = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = ".$rs_ctsp_new_des['dung_luong']."");
        $dungluong_ok = mysql_fetch_assoc($dungluong->result);
        // Màn Hình
    };

    if ($rs_ctsp_new['new_cate_id'] == 36) {
        if ($rs_ctsp_new_des['hang'] != "") {
            $hangchung = new db_query("SELECT `ten_hang` FROM `hang` WHERE `id` = ".$rs_ctsp_new_des['hang']."");
            $hangchung_ok = mysql_fetch_assoc($hangchung->result);
        }

        $loaitv = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_chung']."");
        $loaitv_ok = mysql_fetch_assoc($loaitv->result);

        $congxuatloa = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = ".$rs_ctsp_new_des['cong_suat']."");
        $congxuatloa_ok = mysql_fetch_assoc($congxuatloa->result);
    };

    // ĐỘ PHÂN GIẢI
    $dophangiai = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = ".$rs_ctsp_new_des['do_phan_giai']."");
    $dophangiai_ok = mysql_fetch_assoc($dophangiai->result);
    // LINH KIỆN, PHỤ KIỆN
    if ($rs_ctsp_new['new_cate_id'] == 37) {

        $linh_kpk = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_linhphu_kien']."");
        $linh_kpk_ok = mysql_fetch_assoc($linh_kpk->result);

        $tb_lkpk = new db_query("SELECT `name` FROM `nhom_sanpham_chatlieu` WHERE `id` = ".$rs_ctsp_new_des['thiet_bi']."");
        $tb_lkpk_ok = mysql_fetch_assoc($tb_lkpk->result);
    };

    // THIẾT BỊ
    $thietbi = new db_query("SELECT `id`,`name` FROM `nhom_sanpham` WHERE `id` = ".$rs_ctsp_new_des['thiet_bi']."");
    $thietbi_ok = mysql_fetch_assoc($thietbi->result);

    // Bảo Hành
    $baohanh = new db_query("SELECT `tgian_baohanh` FROM `bao_hanh` WHERE `id_baohanh` = ".$rs_ctsp_new['new_baohanh']."");
    $baohanh_ok = mysql_fetch_assoc($baohanh->result);
    // THIẾT BỊ ĐEO THÔNG MINH
    if ($rs_ctsp_new['new_cate_id'] == 99) {

        $tb_thongminh = new db_query(" SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['thiet_bi']."");
        $tb_thongminh_ok = mysql_fetch_assoc($tb_thongminh->result);
        if ($tb_thongminh_ok['id'] != 4345) {
            $hang_tb_thongminh = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id` = ".$rs_ctsp_new_des['hang']."");
            $hang_tb_thongminh_ok = mysql_fetch_assoc($hang_tb_thongminh->result);
            if ($hang_tb_thongminh_ok['id'] != 1766) {
                $dongmay_tbtm = new db_query("SELECT `id`,`ten_dong` FROM `dong` WHERE `id` = ".$rs_ctsp_new_des['dong_may']."");
                $dongmay_tbtm_ok = mysql_fetch_assoc($dongmay_tbtm->result);
            }
        }
    };
    // -------------------------
    // USER
    $user = new db_query("SELECT `usc_id`,`usc_name`, `usc_type`,`usc_time`,`usc_logo`,`usc_phone`,`usc_address`,`usc_email`, `usc_store_name`,`xacthuc_lket`, `chat365_id` FROM `user`
                            WHERE `usc_id` = ".$rs_ctsp_new['new_user_id']." AND `usc_type` = ".$rs_ctsp_new['new_type']."");
    $rs_user = mysql_fetch_assoc($user->result);
    $usc_type = $rs_user['usc_type'];
    if ($usc_type == 5) {
        $usc_name = $rs_user['usc_store_name'];
    } else {
        $usc_name = $rs_user['usc_name'];
    };

    $usc_store_name = $rs_user['usc_store_name'];
    $usc_phone = $rs_user['usc_phone'];
    $usc_logo = $rs_user['usc_logo'];
    $xt_lienket = $rs_user['xacthuc_lket'];
    // $new_user_id = $rs_user['new_user_id'];

    $usc_type_ar = array(1 => 'cá nhân', 5 => 'doanh nghiệp');
    $usc_time = $rs_user['usc_time'];
    $usc_time = date('d-m-Y', $usc_time);


    // + THÚ CƯNG
    // - Giống thú cưng
    $giongthucung = new db_query("SELECT `id`,`giong_thucung` FROM `giong_thu_cung` WHERE `id_danhmuc` = ".$rs_ctsp_new['new_cate_id']."");
    $rs_gthucung = mysql_fetch_assoc($giongthucung->result);
    $id_thu = $rs_gthucung['id'];
    // Name Thú Cưng

    $namethu = new db_query("SELECT `giong_thucung` FROM `giong_thu_cung` WHERE `id` = ".$rs_ctsp_new_des['giong_thu_cung']."");
    $namethu_ok = mysql_fetch_assoc($namethu->result);
    // THÔNG TIN TÚ CƯNG
    if ($rs_ctsp_new['new_cate_id'] == 110 || $rs_ctsp_new['new_cate_id'] == 111 || $rs_ctsp_new['new_cate_id'] == 112 || $rs_ctsp_new['new_cate_id'] == 113) {

        $tuoi_tcung = mysql_fetch_assoc((new db_query("SELECT `contents_name` FROM `thongtin_thucung` WHERE `id` = ".$rs_ctsp_new_des['do_tuoi'].""))->result)['contents_name'];
        $kickco_tcung = mysql_fetch_assoc((new db_query("SELECT `contents_name` FROM `thongtin_thucung` WHERE `id` = ".$rs_ctsp_new_des['kich_co'].""))->result)['contents_name'];
    }
    $gtinh_tcung = mysql_fetch_assoc((new db_query("SELECT `contents_name` FROM `thongtin_thucung` WHERE `id` = ".$rs_ctsp_new_des['gioi_tinh'].""))->result)['contents_name'];

    // THỰC PHẨM ĐỒ UỐNG
    if ($rs_ctsp_new['new_cate_id'] == 94 || $rs_ctsp_new['new_cate_id'] == 95) {

        $tp_du = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_chung']."");
        $tp_du_ok = mysql_fetch_assoc($tp_du->result);
        $name_tpdu = $tp_du_ok['ten_loai'];
    }
    // NHÓM SẢN PHẨM
    $nsp = new db_query("SELECT `id`,`name` FROM `nhom_sanpham` WHERE `id` = ".$rs_ctsp_new_des['nhom_sanpham']."");
    $nsp_ok = mysql_fetch_assoc($nsp->result);
    $name_nsp = $nsp_ok['name'];
    $id_nsp = $nsp_ok['id'];


    // TỈNH THÀNH, QUẬN HUYỆN
    $show_cty = new db_query("SELECT `cit_name` FROM `city` WHERE `cit_id` = ".$rs_ctsp_new['new_city']."");
    $show_cty_ok = mysql_fetch_assoc($show_cty->result);
    $show_quanh = new db_query("SELECT `cit_name` FROM `city2` WHERE `cit_id` = ".$rs_ctsp_new['quan_huyen']."");
    $show_quanh_ok = mysql_fetch_assoc($show_quanh->result);

    // LOẠI CHUNG
    // + xe máy
    $xemay = new db_query("SELECT `ten_loai` FROM  `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_xe']." AND `id_danhmuc` = 19");
    $xemay_ok = mysql_fetch_assoc($xemay->result);
    // + loại giao hàng
    $hanghoagiao = new db_query("SELECT `ten_loai` FROM  `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_hang_hoa']." AND `id_danhmuc` = 19 AND `id_cha` = 0");
    $hanghoagiao_ok = mysql_fetch_assoc($hanghoagiao->result);


    // XE CỘ---------------------------------------------
    $hop_so_c = array(1 => 'Tự động', 2 => 'Số sàn', 3 => 'Bán tự động');
    $nhien_lieu_c = array(1 => 'xăng', 2 => 'dầu', 3 => 'Động cơ Hybird', 4 => 'điện');
    if ($rs_ctsp_new['new_cate_id'] == 40 || $rs_ctsp_new['new_cate_id'] == 41 || $rs_ctsp_new['new_cate_id'] == 8 || $rs_ctsp_new['new_cate_id'] == 9) {
        $hang_xe = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id` = ".$rs_ctsp_new_des['hang']."");
        $hang_xe_ok = mysql_fetch_assoc($hang_xe->result);
        // ĐỘNG CƠ
        $dongco = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = ".$rs_ctsp_new_des['dong_co']."");
        $dongco_ok = mysql_fetch_assoc($dongco->result);
    };

    if ($rs_ctsp_new['new_cate_id'] == 8) {
        $query_ktk = new db_query("SELECT `ten_manhinh` FROM `man_hinh` WHERE id_danhmuc = 8 AND phan_loai = 3 AND `id_manhinh` = ".$rs_ctsp_new_des['kich_co']." ");
        $result_ktk = mysql_fetch_assoc($query_ktk->result);
        $kthuoc_khung = $result_ktk['ten_manhinh'];
        if ($rs_ctsp_new_des['loai_xe'] == 210) {
            $query_lx = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE id_cha = ".$rs_ctsp_new_des['loai_xe']." AND id_danhmuc = ".$rs_ctsp_new['new_cate_id']." ");
            $sql_lx = mysql_fetch_assoc($query_lx->result)['ten_loai'];
        }
    }
    // Loại xe đap
    $loai_xd = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_xe']."");
    $loaixd_ok = mysql_fetch_assoc($loai_xd->result);
    // MÀU SẮC
    $mausac = new db_query("SELECT `mau_sac` FROM `mau_sac` WHERE `id_color` = ".$rs_ctsp_new_des['mau_sac']."");
    $mausac_ok = mysql_fetch_assoc($mausac->result);
    // Chất liệu khung
    $chatlieukhung = new db_query("SELECT `name` FROM `nhom_sanpham_chatlieu` WHERE `id` = ".$rs_ctsp_new_des['chat_lieu_khung']." AND `id_danhmuc` = 8");
    $chatlieukhung_ok = mysql_fetch_assoc($chatlieukhung->result);
    // XUẤT SỨ
    $xuatxu = new db_query("SELECT `noi_xuatxu` FROM `xuat_xu` WHERE `id_xuatxu` = ".$rs_ctsp_new_des['xuat_xu']."");
    $xuatxu_ok = mysql_fetch_assoc($xuatxu->result);
    // LOẠI NỘI THẤT
    $loaichung = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_noithat']."");
    $loaichung_ok = mysql_fetch_assoc($loaichung->result);

    if ($new_cate_id == 9 || $new_cate_id == 10) { //XE MÁY
        // DÒNG XE
        $dongxe = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['dong_xe']." AND `id_cha` = ".$rs_ctsp_new_des['hang']."");
        $dongxe_ok = mysql_fetch_assoc($dongxe->result);
        // DUNG TÍCH
        $dungtich = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = ".$rs_ctsp_new_des['dung_tich']."");
        $dungtich_ok = mysql_fetch_assoc($dungtich->result);
    }
    // NĂM SẢN XUẤT
    $namsanxuat = new db_query("SELECT `nam_san_xuat` FROM `nam_san_xuat` WHERE `id` = ".$rs_ctsp_new_des['nam_san_xuat']."");
    $namsanxuat_ok = mysql_fetch_assoc($namsanxuat->result);
    // SỐ CHỖ
    $socho = new db_query("SELECT `so_luong` FROM `number_content` WHERE `id` = ".$rs_ctsp_new_des['so_cho']."");
    $socho_ok = mysql_fetch_assoc($socho->result);
    // KIỂU DÁNG
    $kieudang = new db_query("SELECT `name` FROM `nhom_sanpham_hinhdang` WHERE `id` = ".$rs_ctsp_new_des['kieu_dang']."");
    $kieudang_ok = mysql_fetch_assoc($kieudang->result);
    // PHỤ TÙNG XE
    $loaiphutung = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_phu_tung']."");
    $loaiphutung_ok = mysql_fetch_assoc($loaiphutung->result);

    // Xe Ô TÔ
    if ($rs_ctsp_new['new_cate_id'] == 10 || $rs_ctsp_new['new_cate_id'] == 38) {
        $hang_oto = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id` = ".$rs_ctsp_new_des['hang']."");
        $hang_oto_ok = mysql_fetch_assoc($hang_oto->result);
        //TRỌNG TẢI
        $trongtai = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = ".$rs_ctsp_new_des['trong_tai']."");
        $trongtai_ok = mysql_fetch_assoc($trongtai->result);
    }
    // DỊCH VỤ - GIẢI TRÍ
    if ($rs_ctsp_new['new_cate_id'] == 100 || $rs_ctsp_new['new_cate_id'] == 102) {
        $allloaichung = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_chung']."");
        $allloaichung_ok = mysql_fetch_assoc($allloaichung->result);
    }
    // THỂ THAO
    $mon_the_thao = $rs_ctsp['mon_the_thao'];
    $momthethao = new db_query("SELECT `id`, `ten_mon` FROM `mon_the_thao` WHERE `id` = ".$rs_ctsp_new_des['mon_the_thao']."");
    $momthethao_ok = mysql_fetch_assoc($momthethao->result);
    $id_mon = $momthethao_ok['id'];
    $ten_mon = $momthethao_ok['ten_mon'];
    if ($rs_ctsp_new['new_cate_id'] == 75) {
        $loai_dc_thethao = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_chung']." AND `id_danhmuc` = 75");
        $loaidcthethao_ok = mysql_fetch_assoc($loai_dc_thethao->result);
    }
    if ($rs_ctsp_new['new_cate_id'] == 104) {
        $loai_tt_thethao = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_chung']." AND `id_danhmuc` = 104");
        $loaittthethao_ok = mysql_fetch_assoc($loai_tt_thethao->result);
    }
    if ($rs_ctsp_new['new_cate_id'] == 105) {
        $loai_pk_thethao = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_chung']." AND `id_danhmuc` = 105");
        $loaipkthethao_ok = mysql_fetch_assoc($loai_pk_thethao->result);
    }

    // THỜI TRANG
    if ($rs_ctsp_new['new_cate_id'] == 47 || $rs_ctsp_new['new_cate_id'] == 48 || $rs_ctsp_new['new_cate_id'] == 49 || $rs_ctsp_new['new_cate_id'] == 50 || $rs_ctsp_new['new_cate_id'] == 106) {
        $all_loaichung = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_chung']."");
        $allloaichung_ok = mysql_fetch_assoc($all_loaichung->result);
    }

    // ------------------------------------

    // BẤT ĐỘNG SẢN
    $can_ban_mua = $rs_ctsp['can_ban_mua'];

    $ban_mua = array(1 => 'Cần bán', 2 => 'Cho thuê', 3 => 'Cần mua', 4 => 'Cần thuê');
    $giayto = array(1 => 'Đã có sổ', 2 => 'Đang chờ sổ', 3 => 'Giấy tờ khác');
    $tinhtrang_nt = array(1 => 'Nội thất cao cấp', 2 => 'Nội thất đầy đủ', 3 => 'Hoàn thiện cơ bản', 4 => 'Bàn giao thô');
    $huongchinh = array(1 => 'Đông', 2 => 'Tây', 3 => 'Nam', 4 => 'Bắc', 5 => 'Đông bắc', 6 => 'Đông nam', 7 => 'Tây bắc', 8 => 'Tây nam');
    $huong_ban_cong_ok = array(1 => 'Đông', 2 => 'Tây', 3 => 'Nam', 4 => 'Bắc', 5 => 'Đông bắc', 6 => 'Đông nam', 7 => 'Tây bắc', 8 => 'Tây nam');
    $loaihinhcanho = array(1 => 'Căn hộ', 2 => 'Duplex', 3 => 'Penthouse', 4 => 'Căn hộ dịch vụ, mini', 5 => 'Tập thể, cư xá', 6 => 'Officetel');
    $loaihinhdat = array(1 => 'Đất thổ cư', 2 => 'Đất nền dự án', 3 => 'Đất công nghiệp', 4 => 'Đất nông nghiệp');

    $loaihinh_vp = $rs_ctsp['loaihinh_vp'];
    $loaihinh_vp_ok = array(1 => 'Mặt bằng kinh doanh', 2 => 'Văn phòng', 3 => 'Shophouse', 4 => 'Officetel');
    // Tổng số tầng
    $tongtang = new db_query("SELECT `so_luong` FROM `tang_phong` WHERE `id` = ".$rs_ctsp_new_des['tong_so_tang']."");
    $tongtang_ok = mysql_fetch_assoc($tongtang->result);
    // Số phòng vệ sinh
    $vesinh = new db_query("SELECT `so_luong` FROM `tang_phong` WHERE `id` = ".$rs_ctsp_new_des['so_pve_sinh']."");
    $vesinh_ok = mysql_fetch_assoc($vesinh->result);
    // Số phòng vệ sinh
    $phongnhu = new db_query("SELECT `so_luong` FROM `tang_phong` WHERE `id` = ".$rs_ctsp_new_des['so_pngu']."");
    $phongnhu_ok = mysql_fetch_assoc($phongnhu->result);

    if ($rs_ctsp_new['new_cate_id'] == 11 || $rs_ctsp_new['new_cate_id'] == 26 || $rs_ctsp_new['new_cate_id'] == 28 || $rs_ctsp_new['new_cate_id'] == 29) {
        $dac_diem = $rs_ctsp['dac_diem'];
    }
    if ($rs_ctsp_new['new_cate_id'] == 27) {
        $tinh_trang = $rs_ctsp['tinh_trang_bds'];
    }
    // ---------------------------------------------------

    // Nội thất - Ngoại thất
    // + Phòng khách
    // Chất liệu
    $chatlieu_qr = new db_query("SELECT `name` FROM `nhom_sanpham_chatlieu` WHERE `id` = ".$rs_ctsp_new_des['chat_lieu']."");
    $chatlieu_qr_ok = mysql_fetch_assoc($chatlieu_qr->result);

    $lsp_ntnt = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_sanpham']."");
    $lsp_ntnt_ok = mysql_fetch_assoc($lsp_ntnt->result);
    // nội thất phòng khách


    // + Phòng tắm
    if ($rs_ctsp_new['new_cate_id'] == 81 || $rs_ctsp_new['new_cate_id'] == 56) {

        $hang_ntnt = new db_query("SELECT `ten_hang` FROM `hang` WHERE `id` = ".$rs_ctsp_new_des['hang']."");
        $hang_ntnt_ok = mysql_fetch_assoc($hang_ntnt->result);
    }
    $hinhdang_ntnt = new db_query("SELECT `name` FROM `nhom_sanpham_hinhdang` WHERE `id` = ".$rs_ctsp_new_des['hinhdang']."");
    $hinhdang_ntnt_ok = mysql_fetch_assoc($hinhdang_ntnt->result);

    // Đồ gia dụng
    $loai_thiet_bi = $rs_ctsp['loai_thiet_bi'];


    $loaithietbi_qr = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_thiet_bi']."");
    $loaithietbi_ok = mysql_fetch_assoc($loaithietbi_qr->result);
    // echo $loaithietbi_ok['id'];
    if ($rs_ctsp_new['new_cate_id'] == 56) {

        $dungtich_dgd = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = ".$rs_ctsp_new_des['dung_tich']."");;
        $dungtich_dgd_ok = mysql_fetch_assoc($dungtich_dgd->result);
        // Công xuất
        $congxuat = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = ".$rs_ctsp_new_des['cong_suat']."");
        $congxuat_ok = mysql_fetch_assoc($congxuat->result);
        // Khối lượng
        $khoiluong_dga = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = ".$rs_ctsp_new_des['khoiluong']."");
        $khoiluong_dga_ok = mysql_fetch_assoc($khoiluong_dga->result);
    }
    $tb_nhabep = new db_query("SELECT `id`,`name` FROM `nhom_sanpham` WHERE `id` =  ".$rs_ctsp_new_des['loai_thiet_bi']."");
    $tb_nhabep_ok = mysql_fetch_assoc($tb_nhabep->result);
    // Thiết bị theo mùa, sức khỏe
    if ($rs_ctsp_new['new_cate_id'] == 59 || $rs_ctsp_new['new_cate_id'] == 58) {
        $ltb_suckhoe = new db_query("SELECT `name` FROM `nhom_sanpham` WHERE `id` =  ".$rs_ctsp_new_des['loai_thiet_bi']."");
        $ltb_suckhoe_ok = mysql_fetch_assoc($ltb_suckhoe->result);
    }

    // Sức khỏe sắc đẹp
    // $hangvattu = new db_query("SELECT `ten_hang` FROM `hang` WHERE `id` = '$hang'");
    $loaihinhsp = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` =  ".$rs_ctsp_new_des['loai_hinh_sp']."");
    $loaihinhsp_ok = mysql_fetch_assoc($loaihinhsp->result);
    if ($rs_ctsp_new['new_cate_id'] == 61 || $rs_ctsp_new['new_cate_id'] == 108) {
        $hang_sksd = new db_query("SELECT `ten_hang` FROM `hang` WHERE `id` = ".$rs_ctsp_new_des['hang']."");
        $hang_sksd_ok = mysql_fetch_assoc($hang_sksd->result);
    }

    // ship
    if ($rs_ctsp_new['new_cate_id'] == 19) {
        if ($rs_ctsp_new_des['loai_xe'] != "") {
            $sql_lx = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = ".$rs_ctsp_new_des['loai_xe']." ");
            $ten_loai = mysql_fetch_assoc($sql_lx->result)['ten_loai'];
        }

        $ca_ngay = $rs_ctsp['ca_ngay'];
    }

    $check_tim = new db_query("SELECT `new_id` FROM `tin_yeu_thich` WHERE `new_id` = ".$rs_ctsp_new['new_id']." AND `usc_type` = '$type_user' AND `user_id` = '$id_user' ");

    $cate_pas = mysql_fetch_assoc((new db_query("SELECT `cat_id`, `cat_name`, `cat_parent_id` FROM `category` WHERE `cat_id` =".$rs_ctsp_new['new_cate_id'].""))->result)['cat_parent_id'];

    $my_id = intval(@$_COOKIE['id_chat365']);
    if ($my_id > 0) {
        $qr_sc = new db_query("SELECT chat365_secret FROM user WHERE chat365_id = '$my_id'");
        $row_sc = mysql_fetch_assoc($qr_sc->result);
        $chat365_secret = $row_sc['chat365_secret'];
    } else {
        $chat365_secret = '';
    }
    $link_chat = get_link_chat365($my_id, $rs_user['chat365_id'], $rs_user['usc_id'], $rs_user['usc_name'], $rs_user['usc_phone'], '', $chat365_secret);

    $hthuc_lamviec = array(
        1 => 'Toàn thời gian',
        2 => 'Bán thời gian',
        3 => 'Giờ hành chính',
        4 => 'Ca sáng',
        5 => 'Ca chiều',
        6 => 'Ca đêm',
    );

    $hthuc_trluong = array(
        1 => 'Theo giờ',
        2 => 'Theo ngày',
        3 => 'Theo tuần',
        4 => 'Theo tháng',
        5 => 'Theo năm',
    );

    $bang_cap = array(
        1 => 'Đại học',
        2 => 'Cao đăng',
        3 => 'Lao động phổ thông',
    );

    $kinh_nghiem = array(
        1 => 'Chưa có kinh nghiệm',
        2 => 'Kinh nghiệm từ 1-2 năm',
        3 => 'Kinh nghiệm trên 2 năm',
    );

    $gioitinh_tdung = array(
        0 => 'Không yêu cầu',
        1 => 'Nam',
        2 => 'Nữ',
    );

    $so_sao = new db_query("SELECT SUM(`eva_stars`) AS sum_sao, COUNT(`eva_id`) AS cou_sao FROM `evaluate` WHERE `new_id` = 0 AND `bl_user` = ".$rs_ctsp_new['new_user_id']."");
    $ss_sao = mysql_fetch_assoc($so_sao->result);
    $sun_sao = $ss_sao['sum_sao'];
    $cou_sao = $ss_sao['cou_sao'];

    if ($rs_ctsp_new['new_city'] == 0) {
        $city_name = ' trên Toàn quốc';
    } else {
        $city_name = " tại " . $arrcity[$rs_ctsp_new['new_city']]['cit_name'];
    }
    $title = $rs_ctsp_new['new_title'] . $city_name . " - " . $rs_ctsp_new['new_id'];
    $urldt = "http://dev5.tinnhanh365.vn/" . replaceTitle($rs_ctsp_new['link_title']) . "-c" . $rs_ctsp_new['new_id'] . ".html";

    $urluri = "http://dev5.tinnhanh365.vn" . $_SERVER['REQUEST_URI'];

    // if ($urldt != $urluri) {
    //     header("HTTP/1.1 301 Moved Permanently");
    //     header("Location: $urldt");
    //     exit();
    // }
} else {
    header('Location: /');
}
$qr_home = $tindang_tt->result_array();
$qr_chat = [];
$qr_chat2 = [];

foreach ($qr_home as $row_chat) {
    $qr_chat[] = (int)trim($row_chat['chat365_id']);
};

$qr_chat = array_unique($qr_chat);
foreach ($qr_chat as $row_chat2) {
    $qr_chat2[] = (int)$row_chat2;
}
$qr_chat2 = json_encode($qr_chat2);

$curl = curl_init();
$data = array(
    'arrayUser' => $qr_chat2,
);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/users/getstatus/arrayuser');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$response = curl_exec($curl);
curl_close($curl);
$data_list = json_decode($response, true);
$list_gtri = $data_list['data']['result'];
$qr_gtri = array_column($list_gtri, 'status', 'id');

$boqua = ['Đang ', 'Không hoạt động', 'Hoạt động', 'trước', 'Vừa truy cập', 'hoạt động'];
?>