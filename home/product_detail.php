<?

include("config.php");
include("../functions/device_check.php");
$id = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
}


if ($id != 0) {
    $tang_view = new db_query("UPDATE `new` SET `new_view_count`= new_view_count + 1 WHERE `new_id` = $id");
    $ctsp = new db_query("SELECT * FROM `new` AS n INNER JOIN `new_description` AS nd ON n.`new_id`= nd.`new_id` WHERE n.`new_id` = $id LIMIT 1");

    $rs_ctsp = mysql_fetch_assoc($ctsp->result);
    $new_id = $rs_ctsp['new_id'];

    $new_image = $rs_ctsp['new_image'];
    $new_image = explode(';', $new_image);
    $new_user_id = $rs_ctsp['new_user_id'];
    $new_type = $rs_ctsp['new_type'];
    $new_title = $rs_ctsp['new_title'];
    $new_money = $rs_ctsp['new_money'];
    $dia_chi = ltrim($rs_ctsp['dia_chi'], ', ');
    $new_ctiet_dmuc = $rs_ctsp['new_ctiet_dmuc'];
    $new_cate_id = $rs_ctsp['new_cate_id'];
    $new_video = $rs_ctsp['new_video'];
    $new_city = $rs_ctsp['new_city'];

    $new_buy_sell = $rs_ctsp['new_buy_sell'];

    $da_ban = $rs_ctsp['da_ban'];
    $gim1 = $rs_ctsp['new_pin_home'];
    $gim2 = $rs_ctsp['new_pin_cate'];
    $gim3 = $rs_ctsp['new_day_tin'];

    $loai_chung = $rs_ctsp['loai_chung'];
    $han_su_dung = $rs_ctsp['han_su_dung'];
    $han_su_dung = date('d-m-Y', $han_su_dung);
    $nhom_sanpham = $rs_ctsp['nhom_sanpham'];
    $khoiluong = $rs_ctsp['khoiluong'];
    $the_tich = $rs_ctsp['the_tich'];
    $new_city = $rs_ctsp['new_city'];
    $quan_huyen = $rs_ctsp['quan_huyen'];
    $new_view_count = $rs_ctsp['new_view_count'];
    $loai_xe = $rs_ctsp['loai_xe'];
    $loai_hang_hoa = $rs_ctsp['loai_hang_hoa'];

    $tgian_bd = $rs_ctsp['tgian_bd'];
    $tgian_bd = date('h:i A', $tgian_bd);
    $tgian_kt = $rs_ctsp['tgian_kt'];
    $tgian_kt = date('h:i A', $tgian_kt);

    if ($rs_ctsp['new_buy_sell'] == 1 && $new_cate_id != 121) {
        header('Location: /');
    }

    $user_dangnhap = new db_query("SELECT `usc_money` FROM `user` WHERE `usc_id` = '$id_user' AND `usc_type` = '$type_user'");
    $user_dangnhap_ok = mysql_fetch_assoc($user_dangnhap->result);
    $money = $user_dangnhap_ok['usc_money'];



    // Tin ????ng t????ng t???
    $tindang_tt = new db_query("SELECT `new_id`, `new_title`, `link_title`, `dia_chi`, `new_money`, `new_unit`, `gia_kt`, `new_image`, `new_create_time`, `chotang_mphi`,
                                `chat365_id`, `chat365_secret`, `new_cate_id` FROM `new`
                                INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                                WHERE `new_cate_id` = $new_cate_id AND `new_type` = $new_type AND `new_city` = $new_city
                                AND `new_id`!= $id ORDER BY `new_id` DESC LIMIT 6 ");

    $tindang_tt2 = new db_query("SELECT `new_id`, `new_title`, `link_title`, `dia_chi`, `new_money`, `new_unit`, `gia_kt`, `new_image`, `new_create_time`, `chotang_mphi`,
                                `chat365_id`, `chat365_secret`, `new_cate_id` FROM `new`
                                INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                                WHERE `new_cate_id` = $new_cate_id AND `new_type` = $new_type AND `new_id`!= $id ORDER BY `new_id` DESC LIMIT 6 ");

    $tindang_tt3 = new db_query("SELECT `new_id`, `new_title`, `link_title`, `dia_chi`, `new_money`, `new_unit`, `gia_kt`, `new_image`, `new_create_time`, `chotang_mphi`,
                                `chat365_id`, `chat365_secret`, `new_cate_id` FROM `new`
                                INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                                WHERE `new_type` = $new_type AND `new_id`!= $id AND `new_city` = $new_city ORDER BY `new_id` DESC LIMIT 6 ");



    $chotang_mphi = $rs_ctsp['chotang_mphi'];
    $gia2 = $rs_ctsp['gia_kt'];
    $loaitien = $rs_ctsp['new_unit'];

    $mota = $rs_ctsp['new_description'];
    $do_tuoi = $rs_ctsp['do_tuoi'];
    $kich_co = $rs_ctsp['kich_co'];
    $gioi_tinh = $rs_ctsp['gioi_tinh'];
    $giong_thu_cung = $rs_ctsp['giong_thu_cung'];

    // ????? ??I???N T???
    $hang = $rs_ctsp['hang'];
    $loai_linhphu_kien = $rs_ctsp['loai_linhphu_kien'];
    $link_kien_phu_kien = $rs_ctsp['link_kien_phu_kien'];
    $lkpk = array(1 => 'Ph??? ki???n', 2 => 'Linh ki???n');
    $knoi_internet = $rs_ctsp['knoi_internet'];
    $cong_suat = $rs_ctsp['cong_suat'];
    $internet = array(1 => 'C??', 2 => 'Kh??ng');
    $dong_may = $rs_ctsp['dong_may'];
    $do_phan_giai = $rs_ctsp['do_phan_giai'];
    $bovi_xuly = $rs_ctsp['bovi_xuly'];
    $ram = $rs_ctsp['ram'];
    $thiet_bi = $rs_ctsp['thiet_bi'];
    $o_cung = $rs_ctsp['o_cung'];
    $loai_o_cung = $rs_ctsp['loai_o_cung'];
    $loai_o_cung_ar = array(1 => 'HDD', 2 => 'SSD');
    $man_hinh = $rs_ctsp['man_hinh'];
    $kich_co = $rs_ctsp['kich_co'];
    $dung_luong = $rs_ctsp['dung_luong'];
    $new_baohanh = $rs_ctsp['new_baohanh'];
    $new_tinhtrang = $rs_ctsp['new_tinhtrang'];
    $tinht = array(1 => 'M???i', 2 => '???? s??? d???ng (ch??a s???a ch???a)', 3 => '???? s??? d???ng (qua s???a ch???a)');
    $tinhtrang = array(1 => 'M???i', 2 => '???? s??? d???ng');
    $tinhtrang_moi = array(1 => 'm???i 100%', 2 => '???? s??? d???ng');
    $tinhtrangxe = array(1 => 'M???i', 2 => 'C?? (Ch??a s???a ch???a)', 3 => 'C?? (???? s???a ch???a)');
    $sdung_sim = $rs_ctsp['sdung_sim'];
    $sim = array(1 => 'C??', 2 => 'Kh??ng');


    $check_hdthoai = ['1621', '1622', '1629', '1630', '1631', '1632', '1633', '1636', '1639', '1641', '1642', '1650', '1652', '1661', '1662', '1680'];
    // M??y t??nh ????? b??n
    if ($new_cate_id == 98) {
        // H??ng
        if ($hang != "") {
            $hang_qr = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id` = $hang AND `id_danhmuc` = $new_cate_id");
            $hang_ok = mysql_fetch_assoc($hang_qr->result);
        }

        // D??ng M??y
        if ($hang != 1378) {
            if ($dong_may != "") {
                $dongmay = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = '$dong_may' AND `id_danhmuc` = 98 ");
                $dongmay_ok = mysql_fetch_assoc($dongmay->result);
            }
        }
    };

    if ($new_cate_id == 98 || $new_cate_id == 5) {
        // B??? s??? l??
        if ($bovi_xuly != "") {
            $boxuly = new db_query("SELECT `bovi_ten` FROM `bovi_xuly` WHERE `bovi_id` = $bovi_xuly");
            $boxuly_ok = mysql_fetch_assoc($boxuly->result);
        }
        // Ram, ??? c???ng
        $ram_db = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $ram ");
        $ram_ok = mysql_fetch_assoc($ram_db->result);
        // ??? C???ng
        $o_cung_db = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $o_cung");
        $o_cung_ok = mysql_fetch_assoc($o_cung_db->result);

        // K??CH C???
        $kickco = new db_query("SELECT `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $kich_co");
        $kickco_ok = mysql_fetch_assoc($kickco->result);
    };
    // M??n H??nh
    $manhinh = new db_query("SELECT `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $man_hinh");
    $manhinh_ok = mysql_fetch_assoc($manhinh->result);
    if ($new_cate_id == 6 || $new_cate_id == 7 || $new_cate_id == 35) {
        // so s??nh gi??
        $loai_sp1 = $rs_ctsp['thiet_bi'];
        //H??ng
        if ($loai_sp1 != 34) {
            if ($hang != "") {
                $hang_mamq = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id` = $hang");
                $hang_mamq_ok = mysql_fetch_assoc($hang_mamq->result);
                $id_hang = $hang_mamq_ok['id'];
            }
        }
        // D??NG M??Y
        if ($id_hang != 1683 && $id_hang != 1694) {
            if ($dong_may != '') {
                $dongmay_7 = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '$dong_may' ");
                $dongmay7_ok = mysql_fetch_assoc($dongmay_7->result);
            }
        }
        //DUNG L?????NG
        $dungluong = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $dung_luong");
        $dungluong_ok = mysql_fetch_assoc($dungluong->result);
        // M??n H??nh
    };

    if ($new_cate_id == 36) {
        if ($hang != "") {
            $hangchung = new db_query("SELECT `ten_hang` FROM `hang` WHERE `id` = '$hang'");
            $hangchung_ok = mysql_fetch_assoc($hangchung->result);
        }

        $loaitv = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_chung");
        $loaitv_ok = mysql_fetch_assoc($loaitv->result);

        $congxuatloa = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = '$cong_suat'");
        $congxuatloa_ok = mysql_fetch_assoc($congxuatloa->result);
    };

    // ????? PH??N GI???I
    $dophangiai = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = '$do_phan_giai'");
    $dophangiai_ok = mysql_fetch_assoc($dophangiai->result);
    // LINH KI???N, PH??? KI???N
    if ($new_cate_id == 37) {

        $linh_kpk = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id` = $loai_linhphu_kien");
        $linh_kpk_ok = mysql_fetch_assoc($linh_kpk->result);

        $tb_lkpk = new db_query("SELECT `name` FROM `nhom_sanpham_chatlieu` WHERE `id` = $thiet_bi");
        $tb_lkpk_ok = mysql_fetch_assoc($tb_lkpk->result);
    };

    // THI???T B???
    $thietbi = new db_query("SELECT `id`,`name` FROM `nhom_sanpham` WHERE `id` = $thiet_bi");
    $thietbi_ok = mysql_fetch_assoc($thietbi->result);

    // B???o H??nh
    $baohanh = new db_query("SELECT `tgian_baohanh` FROM `bao_hanh` WHERE `id_baohanh` = $new_baohanh");
    $baohanh_ok = mysql_fetch_assoc($baohanh->result);
    // THI???T B??? ??EO TH??NG MINH
    if ($new_cate_id == 99) {

        $tb_thongminh = new db_query(" SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id` = $thiet_bi");
        $tb_thongminh_ok = mysql_fetch_assoc($tb_thongminh->result);
        if ($tb_thongminh_ok['id'] != 4345) {
            $hang_tb_thongminh = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id` = $hang");
            $hang_tb_thongminh_ok = mysql_fetch_assoc($hang_tb_thongminh->result);
            if ($hang_tb_thongminh_ok['id'] != 1766) {
                $dongmay_tbtm = new db_query("SELECT `id`,`ten_dong` FROM `dong` WHERE `id` = $dong_may");
                $dongmay_tbtm_ok = mysql_fetch_assoc($dongmay_tbtm->result);
            }
        }
    };
    // -------------------------
    // USER
    $user = new db_query("SELECT `usc_id`,`usc_name`, `usc_type`,`usc_time`,`usc_logo`,`usc_phone`, `usc_store_name`,`xacthuc_lket`, `chat365_id` FROM `user`
                            WHERE `usc_id` = $new_user_id AND `usc_type` = $new_type");
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

    $usc_type_ar = array(1 => 'c?? nh??n', 5 => 'doanh nghi???p');
    $usc_time = $rs_user['usc_time'];
    $usc_time = date('d-m-Y', $usc_time);


    // + TH?? C??NG
    // - Gi???ng th?? c??ng
    $giongthucung = new db_query("SELECT `id`,`giong_thucung` FROM `giong_thu_cung` WHERE `id_danhmuc` = $new_cate_id");
    $rs_gthucung = mysql_fetch_assoc($giongthucung->result);
    $id_thu = $rs_gthucung['id'];
    // Name Th?? C??ng

    $namethu = new db_query("SELECT `giong_thucung` FROM `giong_thu_cung` WHERE `id` = $giong_thu_cung");
    $namethu_ok = mysql_fetch_assoc($namethu->result);
    // TH??NG TIN T?? C??NG
    if ($new_cate_id == 110 || $new_cate_id == 111 || $new_cate_id == 112 || $new_cate_id == 113) {

        $tuoi_tcung = mysql_fetch_assoc((new db_query("SELECT `contents_name` FROM `thongtin_thucung` WHERE `id` = $do_tuoi"))->result)['contents_name'];
        $kickco_tcung = mysql_fetch_assoc((new db_query("SELECT `contents_name` FROM `thongtin_thucung` WHERE `id` = $kich_co"))->result)['contents_name'];
    }
    $gtinh_tcung = mysql_fetch_assoc((new db_query("SELECT `contents_name` FROM `thongtin_thucung` WHERE `id` = $gioi_tinh"))->result)['contents_name'];

    // TH???C PH???M ????? U???NG
    if ($new_cate_id == 94 || $new_cate_id == 95) {

        $tp_du = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_chung");
        $tp_du_ok = mysql_fetch_assoc($tp_du->result);
        $name_tpdu = $tp_du_ok['ten_loai'];
    }
    // NH??M S???N PH???M
    $nsp = new db_query("SELECT `id`,`name` FROM `nhom_sanpham` WHERE `id` = $nhom_sanpham");
    $nsp_ok = mysql_fetch_assoc($nsp->result);
    $name_nsp = $nsp_ok['name'];
    $id_nsp = $nsp_ok['id'];


    // T???NH TH??NH, QU???N HUY???N
    $show_cty = new db_query("SELECT `cit_name` FROM `city` WHERE `cit_id` = $new_city");
    $show_cty_ok = mysql_fetch_assoc($show_cty->result);
    $show_quanh = new db_query("SELECT `cit_name` FROM `city2` WHERE `cit_id` = $quan_huyen");
    $show_quanh_ok = mysql_fetch_assoc($show_quanh->result);

    // LO???I CHUNG
    // + xe m??y
    $xemay = new db_query("SELECT `ten_loai` FROM  `loai_chung` WHERE `id` = $loai_xe AND `id_danhmuc` = 19");
    $xemay_ok = mysql_fetch_assoc($xemay->result);
    // + lo???i giao h??ng
    $hanghoagiao = new db_query("SELECT `ten_loai` FROM  `loai_chung` WHERE `id` = $loai_hang_hoa AND `id_danhmuc` = 19 AND `id_cha` = 0");
    $hanghoagiao_ok = mysql_fetch_assoc($hanghoagiao->result);


    // XE C???---------------------------------------------
    $mau_sac = $rs_ctsp['mau_sac'];
    $dong_co = $rs_ctsp['dong_co'];
    $dong_xe = $rs_ctsp['dong_xe'];
    $loai_noithat = $rs_ctsp['loai_noithat'];
    $so_km_da_di = $rs_ctsp['so_km_da_di'];
    $dung_tich = $rs_ctsp['dung_tich'];
    $chat_lieu_khung = $rs_ctsp['chat_lieu_khung'];
    $xuat_xu = $rs_ctsp['xuat_xu'];
    $kieu_dang = $rs_ctsp['kieu_dang'];
    $nam_san_xuat = $rs_ctsp['nam_san_xuat'];
    $so_cho = $rs_ctsp['so_cho'];
    $loai_phu_tung = $rs_ctsp['loai_phu_tung'];
    $hop_so = $rs_ctsp['hop_so'];
    $trong_tai = $rs_ctsp['trong_tai'];
    $hop_so_c = array(1 => 'T??? ?????ng', 2 => 'S??? s??n', 3 => 'B??n t??? ?????ng');
    $nhien_lieu = $rs_ctsp['nhien_lieu'];
    $nhien_lieu_c = array(1 => 'x??ng', 2 => 'd???u', 3 => '?????ng c?? Hybird', 4 => '??i???n');
    if ($new_cate_id == 40 || $new_cate_id == 41 || $new_cate_id == 8 || $new_cate_id == 9) {
        $hang_xe = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id` = $hang");
        $hang_xe_ok = mysql_fetch_assoc($hang_xe->result);
        // ?????NG C??
        $dongco = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $dong_co");
        $dongco_ok = mysql_fetch_assoc($dongco->result);
    };

    if ($new_cate_id == 8) {
        $query_ktk = new db_query("SELECT `ten_manhinh` FROM `man_hinh` WHERE id_danhmuc = 8 AND phan_loai = 3 AND `id_manhinh` = $kich_co ");
        $result_ktk = mysql_fetch_assoc($query_ktk->result);
        $kthuoc_khung = $result_ktk['ten_manhinh'];
        if ($loai_xe == 210) {
            $query_lx = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE id_cha = $loai_xe AND id_danhmuc = $new_cate_id ");
            $sql_lx = mysql_fetch_assoc($query_lx->result)['ten_loai'];
        }
    }
    // Lo???i xe ??ap
    $loai_xd = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id` = $loai_xe");
    $loaixd_ok = mysql_fetch_assoc($loai_xd->result);
    // M??U S???C
    $mausac = new db_query("SELECT `mau_sac` FROM `mau_sac` WHERE `id_color` = $mau_sac");
    $mausac_ok = mysql_fetch_assoc($mausac->result);
    // Ch???t li???u khung
    $chatlieukhung = new db_query("SELECT `name` FROM `nhom_sanpham_chatlieu` WHERE `id` = $chat_lieu_khung AND `id_danhmuc` = 8");
    $chatlieukhung_ok = mysql_fetch_assoc($chatlieukhung->result);
    // XU???T S???
    $xuatxu = new db_query("SELECT `noi_xuatxu` FROM `xuat_xu` WHERE `id_xuatxu` = $xuat_xu");
    $xuatxu_ok = mysql_fetch_assoc($xuatxu->result);
    // LO???I N???I TH???T
    $loaichung = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_noithat");
    $loaichung_ok = mysql_fetch_assoc($loaichung->result);

    if ($new_cate_id == 9 || $new_cate_id == 10) { //XE M??Y
        // D??NG XE
        $dongxe = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = '$dong_xe' AND `id_cha` = '$hang'");
        $dongxe_ok = mysql_fetch_assoc($dongxe->result);
        // DUNG T??CH
        $dungtich = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $dung_tich");
        $dungtich_ok = mysql_fetch_assoc($dungtich->result);
    }
    // N??M S???N XU???T
    $namsanxuat = new db_query("SELECT `nam_san_xuat` FROM `nam_san_xuat` WHERE `id` = $nam_san_xuat");
    $namsanxuat_ok = mysql_fetch_assoc($namsanxuat->result);
    // S??? CH???
    $socho = new db_query("SELECT `so_luong` FROM `number_content` WHERE `id` = $so_cho");
    $socho_ok = mysql_fetch_assoc($socho->result);
    // KI???U D??NG
    $kieudang = new db_query("SELECT `name` FROM `nhom_sanpham_hinhdang` WHERE `id` = $kieu_dang");
    $kieudang_ok = mysql_fetch_assoc($kieudang->result);
    // PH??? T??NG XE
    $loaiphutung = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_phu_tung");
    $loaiphutung_ok = mysql_fetch_assoc($loaiphutung->result);

    // Xe ?? T??
    if ($new_cate_id == 10 || $new_cate_id == 38) {
        $hang_oto = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id` = $hang");
        $hang_oto_ok = mysql_fetch_assoc($hang_oto->result);
        //TR???NG T???I
        $trongtai = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = '$trong_tai'");
        $trongtai_ok = mysql_fetch_assoc($trongtai->result);
    }
    // D???CH V??? - GI???I TR??
    if ($new_cate_id == 100 || $new_cate_id == 102) {
        $allloaichung = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_chung");
        $allloaichung_ok = mysql_fetch_assoc($allloaichung->result);
    }
    // TH??? THAO
    $mon_the_thao = $rs_ctsp['mon_the_thao'];
    $momthethao = new db_query("SELECT `id`, `ten_mon` FROM `mon_the_thao` WHERE `id` = '$mon_the_thao'");
    $momthethao_ok = mysql_fetch_assoc($momthethao->result);
    $id_mon = $momthethao_ok['id'];
    $ten_mon = $momthethao_ok['ten_mon'];
    if ($new_cate_id == 75) {
        $loai_dc_thethao = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = '$loai_chung' AND `id_danhmuc` = 75");
        $loaidcthethao_ok = mysql_fetch_assoc($loai_dc_thethao->result);
    }
    if ($new_cate_id == 104) {
        $loai_tt_thethao = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = '$loai_chung' AND `id_danhmuc` = 104");
        $loaittthethao_ok = mysql_fetch_assoc($loai_tt_thethao->result);
    }
    if ($new_cate_id == 105) {
        $loai_pk_thethao = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = '$loai_chung' AND `id_danhmuc` = 105");
        $loaipkthethao_ok = mysql_fetch_assoc($loai_pk_thethao->result);
    }

    // TH???I TRANG
    if ($new_cate_id == 47 || $new_cate_id == 48 || $new_cate_id == 49 || $new_cate_id == 50 || $new_cate_id == 106) {
        $all_loaichung = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = $loai_chung");
        $allloaichung_ok = mysql_fetch_assoc($all_loaichung->result);
    }

    // ------------------------------------

    // B???T ?????NG S???N
    $can_ban_mua = $rs_ctsp['can_ban_mua'];

    $ban_mua = array(1 => 'C???n b??n', 2 => 'Cho thu??', 3 => 'C???n mua', 4 => 'C???n thu??');
    $khu_vuc_mua = $rs_ctsp['khu_vuc_mua'];
    $tong_so_tang = $rs_ctsp['tong_so_tang'];
    $tang_so = $rs_ctsp['tang_so'];
    $dien_tich = $rs_ctsp['dien_tich'];
    $so_pve_sinh = $rs_ctsp['so_pve_sinh'];
    $so_pngu = $rs_ctsp['so_pngu'];
    $chieu_dai = $rs_ctsp['chieu_dai'];
    $chieu_rong = $rs_ctsp['chieu_rong'];
    $ten_toa_nha = $rs_ctsp['ten_toa_nha'];
    $giay_to_phap_ly = $rs_ctsp['giay_to_phap_ly'];
    $giayto = array(1 => '???? c?? s???', 2 => '??ang ch??? s???', 3 => 'Gi???y t??? kh??c');
    $tinh_trang_noi_that = $rs_ctsp['tinh_trang_noi_that'];
    $tinhtrang_nt = array(1 => 'N???i th???t cao c???p', 2 => 'N???i th???t ?????y ?????', 3 => 'Ho??n thi???n c?? b???n', 4 => 'B??n giao th??');
    $huong_chinh = $rs_ctsp['huong_chinh'];
    $huongchinh = array(1 => '????ng', 2 => 'T??y', 3 => 'Nam', 4 => 'B???c', 5 => '????ng b???c', 6 => '????ng nam', 7 => 'T??y b???c', 8 => 'T??y nam');
    $huong_ban_cong = $rs_ctsp['huong_ban_cong'];
    $huong_ban_cong_ok = array(1 => '????ng', 2 => 'T??y', 3 => 'Nam', 4 => 'B???c', 5 => '????ng b???c', 6 => '????ng nam', 7 => 'T??y b???c', 8 => 'T??y nam');
    $loai_hinh_canho = $rs_ctsp['loai_hinh_canho'];
    $loaihinhcanho = array(1 => 'C??n h???', 2 => 'Duplex', 3 => 'Penthouse', 4 => 'C??n h??? d???ch v???, mini', 5 => 'T???p th???, c?? x??', 6 => 'Officetel');
    $loai_hinh_dat = $rs_ctsp['loai_hinh_dat'];
    $loaihinhdat = array(1 => '?????t th??? c??', 2 => '?????t n???n d??? ??n', 3 => '?????t c??ng nghi???p', 4 => '?????t n??ng nghi???p');

    $loaihinh_vp = $rs_ctsp['loaihinh_vp'];
    $loaihinh_vp_ok = array(1 => 'M????t b????ng kinh doanh', 2 => 'V??n pho??ng', 3 => 'Shophouse', 4 => 'Officetel');
    // T???ng s??? t???ng
    $tongtang = new db_query("SELECT `so_luong` FROM `tang_phong` WHERE `id` = $tong_so_tang");
    $tongtang_ok = mysql_fetch_assoc($tongtang->result);
    // S??? ph??ng v??? sinh
    $vesinh = new db_query("SELECT `so_luong` FROM `tang_phong` WHERE `id` = $so_pve_sinh");
    $vesinh_ok = mysql_fetch_assoc($vesinh->result);
    // S??? ph??ng v??? sinh
    $phongnhu = new db_query("SELECT `so_luong` FROM `tang_phong` WHERE `id` = $so_pngu");
    $phongnhu_ok = mysql_fetch_assoc($phongnhu->result);

    if ($new_cate_id == 11 || $new_cate_id == 26 || $new_cate_id == 28 || $new_cate_id == 29) {
        $dac_diem = $rs_ctsp['dac_diem'];
    }
    if ($new_cate_id == 27) {
        $tinh_trang = $rs_ctsp['tinh_trang_bds'];
    }
    // ---------------------------------------------------

    // N???i th???t - Ngo???i th???t
    // + Ph??ng kh??ch
    // Ch???t li???u
    $chatlieu_ntnt = $rs_ctsp['chat_lieu'];
    $loai_sanpham = $rs_ctsp['loai_sanpham'];
    $hinhdang = $rs_ctsp['hinhdang'];
    $chatlieu_qr = new db_query("SELECT `name` FROM `nhom_sanpham_chatlieu` WHERE `id` = '$chatlieu_ntnt'");
    $chatlieu_qr_ok = mysql_fetch_assoc($chatlieu_qr->result);

    $lsp_ntnt = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id` = '$loai_sanpham'");
    $lsp_ntnt_ok = mysql_fetch_assoc($lsp_ntnt->result);
    // n???i th???t ph??ng kh??ch


    // + Ph??ng t???m
    if ($new_cate_id == 81 || $new_cate_id == 56) {

        $hang_ntnt = new db_query("SELECT `ten_hang` FROM `hang` WHERE `id` = $hang");
        $hang_ntnt_ok = mysql_fetch_assoc($hang_ntnt->result);
    }
    $hinhdang_ntnt = new db_query("SELECT `name` FROM `nhom_sanpham_hinhdang` WHERE `id` = '$hinhdang'");
    $hinhdang_ntnt_ok = mysql_fetch_assoc($hinhdang_ntnt->result);

    // ????? gia d???ng
    $loai_thiet_bi = $rs_ctsp['loai_thiet_bi'];


    $loaithietbi_qr = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id` = '$loai_thiet_bi'");
    $loaithietbi_ok = mysql_fetch_assoc($loaithietbi_qr->result);
    // echo $loaithietbi_ok['id'];
    if ($new_cate_id == 56) {

        $dungtich_dgd = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = $dung_tich");;
        $dungtich_dgd_ok = mysql_fetch_assoc($dungtich_dgd->result);
        // C??ng xu???t
        $congxuat = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = '$cong_suat'");
        $congxuat_ok = mysql_fetch_assoc($congxuat->result);
        // Kh???i l?????ng
        $khoiluong_dga = new db_query("SELECT `ten_dl` FROM `dung_luong` WHERE `id_dl` = '$khoiluong'");
        $khoiluong_dga_ok = mysql_fetch_assoc($khoiluong_dga->result);
    }
    $tb_nhabep = new db_query("SELECT `id`,`name` FROM `nhom_sanpham` WHERE `id` = '$loai_thiet_bi'");
    $tb_nhabep_ok = mysql_fetch_assoc($tb_nhabep->result);
    // Thi???t b??? theo m??a, s???c kh???e
    if ($new_cate_id == 59 || $new_cate_id == 58) {
        $ltb_suckhoe = new db_query("SELECT `name` FROM `nhom_sanpham` WHERE `id` = '$loai_thiet_bi'");
        $ltb_suckhoe_ok = mysql_fetch_assoc($ltb_suckhoe->result);
    }

    // S???c kh???e s???c ?????p
    $hang_vattu = $rs_ctsp['hang_vattu'];
    // $hangvattu = new db_query("SELECT `ten_hang` FROM `hang` WHERE `id` = '$hang'");
    $loai_hinh_sp = $rs_ctsp['loai_hinh_sp'];
    $loaihinhsp = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = '$loai_hinh_sp'");
    $loaihinhsp_ok = mysql_fetch_assoc($loaihinhsp->result);
    if ($new_cate_id == 61 || $new_cate_id == 108) {
        $hang_sksd = new db_query("SELECT `ten_hang` FROM `hang` WHERE `id` = '$hang'");
        $hang_sksd_ok = mysql_fetch_assoc($hang_sksd->result);
    }

    // ship
    if ($new_cate_id == 19) {
        if ($loai_xe != "") {
            $sql_lx = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = $loai_xe ");
            $ten_loai = mysql_fetch_assoc($sql_lx->result)['ten_loai'];
        }

        $ca_ngay = $rs_ctsp['ca_ngay'];
    }

    $check_tim = new db_query("SELECT `new_id` FROM `tin_yeu_thich` WHERE `new_id` = $new_id AND `usc_type` = '$type_user' AND `user_id` = '$id_user' ");

    $cate_pas = mysql_fetch_assoc((new db_query("SELECT `cat_id`, `cat_name`, `cat_parent_id` FROM `category` WHERE `cat_id` = $new_cate_id "))->result)['cat_parent_id'];

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
        1 => 'To??n th???i gian',
        2 => 'B??n th???i gian',
        3 => 'Gi??? h??nh ch??nh',
        4 => 'Ca s??ng',
        5 => 'Ca chi???u',
        6 => 'Ca ????m',
    );

    $hthuc_trluong = array(
        1 => 'Theo gi???',
        2 => 'Theo ng??y',
        3 => 'Theo tu???n',
        4 => 'Theo th??ng',
        5 => 'Theo n??m',
    );

    $bang_cap = array(
        1 => '?????i h???c',
        2 => 'Cao ????ng',
        3 => 'Lao ?????ng ph??? th??ng',
    );

    $kinh_nghiem = array(
        1 => 'Ch??a c?? kinh nghi???m',
        2 => 'Kinh nghi???m t??? 1-2 n??m',
        3 => 'Kinh nghi???m tr??n 2 n??m',
    );

    $gioitinh_tdung = array(
        0 => 'Kh??ng y??u c???u',
        1 => 'Nam',
        2 => 'N???',
    );

    $so_sao = new db_query("SELECT SUM(`eva_stars`) AS sum_sao, COUNT(`eva_id`) AS cou_sao FROM `evaluate` WHERE `new_id` = 0 AND `bl_user` = $new_user_id ");
    $ss_sao = mysql_fetch_assoc($so_sao->result);
    $sun_sao = $ss_sao['sum_sao'];
    $cou_sao = $ss_sao['cou_sao'];

    if ($rs_ctsp['new_city'] == 0) {
        $city_name = ' tr??n To??n qu???c';
    } else {
        $city_name = " t???i " . $arrcity[$rs_ctsp['new_city']]['cit_name'];
    }
    $title = $rs_ctsp['new_title'] . $city_name . " - " . $rs_ctsp['new_id'];
    $urldt = "http://dev5.tinnhanh365.vn/" . replaceTitle($rs_ctsp['link_title']) . "-c" . $rs_ctsp['new_id'] . ".html";

    $urluri = "http://dev5.tinnhanh365.vn" . $_SERVER['REQUEST_URI'];

    if ($urldt != $urluri) {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: $urldt");
        exit();
    }
} else {
    header('Location: /');
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>

    <!--    -----tvt them  27/05--->
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" as="image" href="/images/banner.webp">
    <link rel="preload" as="image" href="/images/cv_trangchu1.webp">

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_chien.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/popup.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_h.css?v=<?= $version ?>">
    <!--------------->

    <title><?= removeHTML($title) ?></title>
    <meta name="keywords" content="<?= removeHTML($rs_ctsp['new_title']) ?>, Rao v???t mi???n ph??, <?= removeHTML($rs_ctsp['new_title']) . $city_name ?>, mua b??n, <?= ($rs_ctsp['new_city'] == 0) ? "To??n qu???c" : $arrcity[$rs_ctsp['new_city']]['cit_name']; ?>, rao vat, rao v???t" />
    <meta name="description" content="<?= removeHTML($rs_ctsp['new_title']) . $city_name ?> tr??n k??nh rao v???t mi???n ph?? Raonhanh365. <?= trim(removeHTML(cut_string($rs_ctsp['new_description'], 200, ""))) ?>" />
    <meta property="og:title" content="<?= removeHTML($title) ?>" />
    <meta property="og:description" content="<?= removeHTML($rs_ctsp['new_title']) . $city_name ?> tr??n k??nh rao v???t mi???n ph?? Raonhanh365. <?= trim(removeHTML(cut_string($rs_ctsp['new_description'], 200, ""))) ?>" />
    <meta property="og:url" content="<?= $urldt ?>" />
    <meta name="language" content="vietnamese" />
    <meta name="copyright" content="Copyright ?? 2017 by raonhanh365.vn" />
    <meta name="abstract" content="<?= removeHTML($title) ?>" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-language" itemprop="inLanguage" content="vi" />
    <!-- <meta name="robots" content="index, follow,noodp" /> -->
    <meta name="robots" content="noindex,nofollow">

    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="<?= $new_image[0] ?>" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua b??n rao v???t" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />

    <link rel="canonical" href="<?= $urldt ?>" />


</head>

<body class="bothanh_tde">
    <? include("../includes/common/inc_header.php"); ?>
    <section>
        <div class="v_container" id="ctiet_spham">
            <div class="v_product v_product_df tin_dang_tuong_tu_container_df77">
                <!-- th??ng tin ng?????i b??n-->
                <div class="seller_detail_container_df seller_detail_container bg_shadow_none" data="<?= $new_cate_id ?>" data-type="2" data2="<?= $new_id ?>" data3="<?= $type_user ?>" data4="<?= $id_user ?>">
                    <div class="tt-nguoiban">
                        <div class="sdc_top">
                            <div class="sdc_avatar">
                                <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $usc_logo) ?>" alt="<?= $usc_name ?>">
                            </div>
                            <div class="sdc_info">
                                <p class="fs_16_19 font_500 sdc_name"><?= $usc_name ?></p>
                                <p class="text_disabled fs_13_15 pt-5 sdc_type">T??i kho???n <?= $usc_type_ar[$usc_type] ?></p>
                                <p class="text_disabled fs_13_15 pt-5 sdc_signup">Tham gia: <?= $usc_time ?></p>
                            </div>
                        </div>
                        <div class="sdc_body sdc_body_df mb-20">
                            <div class="v-table v-table_df">
                                <div class="row">
                                    <div class="col_one col_one_df">
                                        <p class="fs_16_19 font_500 text_disabled df">????nh gi??</p>
                                    </div>
                                    <div class="df_5sao_to">
                                        <div class="df_5sao" style="width: <?= ($sun_sao / $cou_sao) * 20 ?>%">
                                            <div class="div5sao_df">
                                                <img src="../images/anh_moi/5sao2.svg">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="border_right"></div>
                                <div class="row">
                                    <div class="col_one col_one_df">
                                        <p class="fs_16_19 font_500 text_disabled">Ph???n h???i chat</p>
                                    </div>
                                    <div class="col_one col_one_df">
                                        <div class="pt-10 fs_20_23 font_500">
                                            <p>0% </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sdc_foot sdc_foot_df">
                            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                <? if ($id_user == $new_user_id) { ?>
                                    <a href="<?php if ($new_type == 1) {
                                                    echo "/ho-so-nguoi-ban-ca-nhan.html";
                                                } else if ($new_type == 5) {
                                                    echo "/ho-so-gian-hang-cua-toi-trang-chu.html";
                                                } ?>">
                                        <div class="v-btn-fluid btn_outline-orange fs_14_16 font_500 sh_cursor"><i class="ic-profile-circle pr-20"></i>XEM TRANG C?? NH??N</div>
                                    </a>
                                <? } else { ?>
                                    <? if ($new_type == 5) { ?>
                                        <a href="/gian-hang/<?= $new_user_id ?>/<?= replaceTitle($usc_store_name) ?>.html">
                                            <div class="v-btn-fluid btn_outline-orange fs_14_16 font_500 sh_cursor"><i class="ic-profile-circle pr-20"></i>XEM TRANG C?? NH??N</div>
                                        </a>
                                    <? } else if ($new_type == 1) { ?>
                                        <a href="/ca-nhan/<?= $new_user_id ?>/<?= replaceTitle($usc_name) ?>.html">
                                            <div class="v-btn-fluid btn_outline-orange fs_14_16 font_500 sh_cursor"><i class="ic-profile-circle pr-20"></i>XEM TRANG C?? NH??N</div>
                                        </a>
                                    <? } ?>
                                    <div id="show_phonenum" class="v-btn-fluid btn-orange mt-10 fs_14_16 font_500 sh_cursor w_100 bdradius_5" data="<?= $new_user_id ?>" onclick="clk_hso_dthoai(this)">
                                        <i class="ic-phone pr-20"></i>
                                        <span class="phone_text hien_so">NH???N ????? HI???N S???</span>
                                    </div>
                                    <? if ($new_cate_id == 120 || $new_cate_id == 121) {
                                        if ($new_cate_id == 120) { ?>
                                            <a href="<?= $link_chat; ?>" target="_blank" class="v-btn-fluid btn-green mt-10 fs_14_16 font_500 sh_cursor"><i class="ic-chat pr-20"></i>CHAT V???I NH?? TUY???N D???NG</a>
                                        <? } else { ?>
                                            <a href="<?= $link_chat; ?>" target="_blank" class="v-btn-fluid btn-green mt-10 fs_14_16 font_500 sh_cursor"><i class="ic-chat pr-20"></i>CHAT V???I ???NG VI??N</a>
                                        <? }
                                    } else if ($new_cate_id != 120 && $new_cate_id != 121) { ?>
                                        <a href="<?= $link_chat; ?>" target="_blank" class="v-btn-fluid btn-green mt-10 fs_14_16 font_500 sh_cursor"><i class="ic-chat pr-20"></i>CHAT V???I NG?????I B??N</a>
                                    <? } ?>

                                    <? if ($new_cate_id == 120) {
                                        $check_ttut = new db_query("SELECT `id`, `status` FROM `apply_new` WHERE `uv_id` = '" . $_COOKIE['UID'] . "'
                                                                    AND `new_id` = '" . $new_id . "' ORDER BY `apply_time` DESC LIMIT 1 ");
                                        if (mysql_num_rows($check_ttut->result) > 0) {
                                            $row_ungt = mysql_fetch_assoc($check_ttut->result);
                                            if ($row_ungt['status'] == 0) { ?>
                                                <button type="button" class="ungtuyen_vtri mt_10 sh_cursor">
                                                    <span class="ic_ungtuyen"><img src="/images/anh_moi/ung_tuyen.png"></span>???? ???NG TUY???N</button>
                                            <? }
                                        } else {
                                            if ($rs_ctsp['han_su_dung'] > time()) { ?>
                                                <button type="button" class="ungtuyen_vtri vtri_utuyen mt_10 sh_cursor" data="<?= $new_id ?>" data1="<?= $_COOKIE['UID'] ?>" data2="<?= $new_user_id ?>">
                                                    <span class="ic_ungtuyen"><img src="/images/anh_moi/ung_tuyen.png"></span> ???NG TUY???N</button>
                                            <? } else {
                                                echo "";
                                            } ?>
                                    <? }
                                    }
                                }
                            } else {
                                if ($new_type == 1) { ?>
                                    <a href="/ca-nhan/<?= $new_user_id ?>/<?= replaceTitle($usc_name) ?>.html">
                                        <div class="v-btn-fluid btn_outline-orange fs_14_16 font_500 sh_cursor"><i class="ic-profile-circle pr-20"></i>XEM TRANG C?? NH??N</div>
                                    </a>
                                <? } else if ($new_type == 5) { ?>
                                    <a href="/gian-hang/<?= $new_user_id ?>/<?= replaceTitle($usc_store_name) ?>.html">
                                        <div class="v-btn-fluid btn_outline-orange fs_14_16 font_500 sh_cursor"><i class="ic-profile-circle pr-20"></i>XEM TRANG C?? NH??N</div>
                                    </a>
                                <? } ?>

                                <div id="show_phonenum" class="v-btn-fluid btn-orange mt-10 fs_14_16 font_500 sh_cursor op_ovl_dn  w_100 bdradius_5">
                                    <i class="ic-phone pr-20"></i>
                                    <span class="phone_text">NH???N ????? HI???N S???</span>
                                </div>
                                <a class="v-btn-fluid btn-green mt-10 fs_14_16 font_500 sh_cursor op_ovl_dn"><i class="ic-chat pr-20"></i>
                                    <?php if ($new_cate_id == 120 || $new_cate_id == 121) {
                                        if ($new_cate_id == 120) {
                                            echo "CHAT V???I NH?? TUY???N D???NG";
                                        } else {
                                            echo "CHAT V???I ???NG VI??N";
                                        }
                                    } else if ($new_cate_id != 120 && $new_cate_id != 121) {
                                        echo "CHAT V???I NG?????I B??N";
                                    } ?>
                                </a>
                                <? if ($new_cate_id == 120) {
                                    if ($rs_ctsp['han_su_dung'] > time()) { ?>
                                        <button type="button" class="ungtuyen_vtri op_ovl_dn mt_10 sh_cursor"> <span class="ic_ungtuyen"><img src="/images/anh_moi/ung_tuyen.png"></span>???NG TUY???N</button>
                                <? } else {
                                        echo "";
                                    }
                                } ?>
                            <? } ?>
                        </div>
                    </div>
                    <? if ($layoutType != 'tablet' && $layoutType != 'mobile') { ?>
                        <div class="ds-khach-on ds_khach_on">
                            <h2 class="tieude_ghonl sh_clr_two">Danh s??ch b???n b??</h2>
                            <div id="list_chat">

                            </div>
                        </div>
                    <? } ?>
                </div>
                <!-- th??ng tin s???n ph???m-->
                <div class="product_container product_container_df">
                    <div class="pc_header d-flex space-between">
                        <div class="pc_head-left">
                            <ul class="v-breadcrumb">
                                <li><a href="/">Trang ch???</a></li>
                                <? if ($new_cate_id != 120 && $new_cate_id != 121) { ?>
                                    <? if ($cate_pas != 0) { ?>
                                        <li><a href="/mua-ban/<?= $cate_pas ?>/<?= replaceTitle($arr_cate[$cate_pas]['cat_name']) ?>.html"><?= $arr_cate[$cate_pas]['cat_name'] ?></a></li>
                                    <? } ?>
                                    <li><a href="/mua-ban/<?= $new_cate_id ?>/<?= replaceTitle($arr_cate[$new_cate_id]['cat_name']) ?>.html"><?= $db_cattk[$new_cate_id] ?></a></li>
                                <? } else if ($new_cate_id == 120 || $new_cate_id == 121) { ?>
                                    <? if ($new_cate_id == 120) { ?>
                                        <li><a href="/viec-lam.html">T??m vi???c l??m</a></li>
                                        <li>
                                            <? // c?? s??n ch??? vi???c l??m
                                            if (in_array($rs_ctsp['new_job_type'], $nganhnghe_cvl)) { ?>
                                                <a href="/<?= replaceTitle($db_cat_vl[$rs_ctsp['new_job_type']]) ?>-n<?= $rs_ctsp['new_job_type'] ?>t0.html">
                                                    <?= $db_cat_vl[$rs_ctsp['new_job_type']] ?>
                                                </a>
                                            <? }
                                            // c?? ch??? t??m tr?????c ch??? vi???c l??m
                                            else if ($rs_ctsp['new_job_type'] == 87) { ?>
                                                <a href="/viec-lam-them-n<?= $rs_ctsp['new_job_type'] ?>t0.html">
                                                    <?= $db_cat_vl[$rs_ctsp['new_job_type']] ?>
                                                </a>
                                            <? } else { ?>
                                                <a href="/viec-lam-<?= replaceTitle($db_cat_vl[$rs_ctsp['new_job_type']]) ?>-n<?= $rs_ctsp['new_job_type'] ?>t0.html">
                                                    <?= $db_cat_vl[$rs_ctsp['new_job_type']] ?>
                                                </a>
                                            <? } ?>
                                        </li>
                                    <? }
                                    if ($new_cate_id == 121) { ?>
                                        <li><a href="/tim-mua-tim-ung-vien-d121.html">T??m ???ng vi??n</a></li>
                                        <li><a href="/ung-vien-<?= replaceTitle($db_cat_vl[$rs_ctsp['new_job_type']]) ?>-n<?= $rs_ctsp['new_job_type'] ?>.html"><?= $db_cat_vl[$rs_ctsp['new_job_type']] ?></a></li>
                                    <? } ?>

                                <? } ?>
                            </ul>
                        </div>
                        <? if ($id_user == $new_user_id) { ?>
                            <div class="tuychon_df">
                                <div class="tuychon_df_sub">
                                    <div class="tuychon_df_img"><?= $ic_tuychon ?></div>
                                    <div class="tuychon_df_text">T??y ch???n</div>
                                </div>
                                <!-- POPUP T??Y CH???N -->
                                <div class="pp_tuychon d_none">
                                    <div class="pp_tuychon_padding">
                                        <? if ($da_ban != 1) { ?>
                                            <div class="tuychon1 cl_danhdauban" data="<?= $new_id ?>">
                                                <div class="tuychon1_img">
                                                    <img src="/images/anh_moi/tuychon1.svg" alt="T??y ch???n">
                                                </div>
                                                <? if ($new_cate_id == 120 || $new_cate_id == 121) { ?>
                                                    <? if ($new_cate_id == 120) { ?>
                                                        <div class="tuychon1_text">???? t??m ???????c ???ng vi??n</div>
                                                    <? } else if ($new_cate_id == 121) { ?>
                                                        <div class="tuychon1_text">???? t??m ???????c vi???c l??m</div>
                                                    <? } ?>
                                                <? } else if ($new_cate_id != 120 && $new_cate_id != 121) { ?>
                                                    <div class="tuychon1_text">????nh d???u l?? ???? b??n</div>
                                                <? } ?>
                                            </div>

                                            <? if ($new_cate_id != 121) { ?>
                                                <? if ($gim1 == 0 && $gim2 == 0 && $gim3 == '') { ?>
                                                    <div class="tuychon1 text-gt" data="<?= $new_id ?>">
                                                        <div class="tuychon1_img">
                                                            <img src="../images/anh_moi/tuychon2.svg" alt="Ghim tin">
                                                        </div>
                                                        <div class="tuychon1_text">Ghim tin</div>
                                                    </div>
                                                <? } ?>
                                            <? } ?>

                                            <a href="/<?= duong_dan($new_id, $new_cate_id) ?>" class="tuychon1">
                                                <div class="tuychon1_img">
                                                    <img src="../images/anh_moi/tuychon3.svg" alt="S???a tin">
                                                </div>
                                                <div class="tuychon1_text">S???a tin</div>
                                            </a>
                                        <? } else { ?>
                                            <div class="tuychon1 cl_dbl" data="<?= $new_id ?>">
                                                <div class="tuychon1_img">
                                                    <img src="../images/anh_moi/tuychon1.svg">
                                                </div>
                                                <? if ($new_cate_id == 120 || $new_cate_id == 121) { ?>
                                                    <div class="tuychon1_text">????ng t??m l???i</div>
                                                <? } else if ($new_cate_id != 120 && $new_cate_id != 121) { ?>
                                                    <div class="tuychon1_text">????ng b??n l???i</div>
                                                <? } ?>
                                            </div>
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        <? } else { ?>
                            <div class="pc_head-right pc_head-right_df">
                                <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                    <button type="button" class="btn-report btn_baocao">B??o c??o tin</button>
                                <? } else { ?>
                                    <button type="button" class="btn-report op_ovl_dn">B??o c??o tin</button>
                                <? } ?>
                            </div>
                        <? } ?>
                    </div>
                    <!--slider-->
                    <div class="slide_show df_over_hd">
                        <div class="slider df_relative">
                            <? if ($new_video != "") { ?>
                                <video controls class="avt_sp_pto" src="<?= $new_video ?>" data="<?= $id ?>"></video>
                            <? } ?>
                            <? for ($i = 0; $i < count($new_image); $i++) { ?>
                                <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $new_image[$i])  ?>" alt="<?= $rs_ctsp['new_title'] ?>" class="avt_sp_pto" data="<?= $id ?>">
                            <? } ?>
                        </div>

                        <? if ($da_ban == 1) { ?>
                            <? if ($new_cate_id == 120) { ?>
                                <div class="abs_tuychon bg_daban">
                                    <p>???? T??M ???NG VI??N</p>
                                </div>
                            <? } else if ($new_cate_id == 121) { ?>
                                <div class="abs_tuychon bg_daban">
                                    <p>???? T??M VI???C</p>
                                </div>
                            <? } else { ?>
                                <div class="abs_tuychon bg_daban">
                                    <p>???? B??N</p>
                                </div>
                            <? } ?>
                        <? } else { ?>
                            <? if ($id_user == $new_user_id) { ?>
                                <? if ($gim1 != 0 || $gim2 != 0 || $gim3 != '') { ?>
                                    <div class="abs_tuychon bg_tc">
                                        <p>??ANG GHIM</p>
                                    </div>
                                <? } ?>
                            <? } ?>
                        <? } ?>

                        <div class="slider-nav df_slick_new">
                            <? if ($new_video != "") { ?>
                                <video controls class="mb-20 anh_ben" src="<?= $new_video ?>"></video>
                            <? } ?>
                            <? for ($i = 0; $i < count($new_image); $i++) { ?>
                                <img class="mb-20 anh_ben" onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= $new_image[$i] ?>" alt="<?= $rs_ctsp['new_title'] ?>">
                            <? } ?>
                        </div>
                        <div class="time_view">
                            <? if ($new_money != 0 && $new_money != "" && $new_cate_id != 120 && $new_cate_id != 121 && $xt_lienket == 1) { ?>
                                <img src="/images/anh_moi/ttoan_dbao.png" class="anh_ttoan_dbao">
                            <? } else { ?>
                                <p></p>
                            <? } ?>
                            <p><?= lay_tgian($rs_ctsp['new_create_time']) ?> | <?= $new_view_count ?> l?????t xem</p>
                        </div>
                    </div>
                    <div class="pc_name w-100 pc_name w-100_df">
                        <h1 class="tieude_tin"><?= $new_title ?></h1>
                    </div>
                    <div class="w-100 d-flex space-between mt-20 align-items-center ssanh_tien_cse">
                        <? if ($new_cate_id != 120 && $new_cate_id != 121) { ?>
                            <? if ($chotang_mphi == 1) { ?>
                                <p class="pc_price fs_26_30">Cho t???ng mi???n ph??</p>
                            <? } else if ($new_money > 0) { ?>
                                <p class="pc_price fs_26_30"><?= number_format($new_money) ?> <?= $arr_dvtien[$loaitien] ?></p>
                            <? } else if ($new_money <= 0) { ?>
                                <p class="pc_price fs_26_30">Li??n h??? ????? h???i gi??</p>
                            <? } ?>
                        <? } else if ($new_cate_id == 120 || $new_cate_id == 121) { ?>
                            <div class="tien_diadiem">
                                <? if ($new_money == 0 && $rs_ctsp['gia_kt'] == 0) { ?>
                                    <p class="pc_price fs_26_30 mb_20">Th???a thu???n</p>
                                <? } else if ($new_money != 0 && $rs_ctsp['gia_kt'] == 0) {  ?>
                                    <p class="pc_price fs_26_30 mb_20">T??? <?= number_format($new_money) ?> <?= $arr_dvtien[$loaitien] ?></p>
                                <? } else if ($new_money == 0 && $rs_ctsp['gia_kt'] != 0) {  ?>
                                    <p class="pc_price fs_26_30 mb_20">?????n <?= number_format($rs_ctsp['gia_kt']) ?> <?= $arr_dvtien[$loaitien] ?></p>
                                <? } else if ($new_money != 0 && $rs_ctsp['gia_kt'] != 0) {  ?>
                                    <p class="pc_price fs_26_30 mb_20"><?= number_format($new_money) ?> - <?= number_format($rs_ctsp['gia_kt']) ?> <?= $arr_dvtien[$loaitien] ?></p>
                                <? } ?>
                                <? if ($new_cate_id == 121) { ?>
                                    <p class="diadiem_tviec sh_size_one"><?= ltrim($rs_ctsp['dia_chi'], ', ') ?></p>
                                <? } else if ($new_cate_id == 120) { ?>
                                    <div class="anhcty_diadiem d_flex">
                                        <? if ($rs_ctsp['com_logo'] != "") { ?>
                                            <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= $rs_ctsp['com_logo'] ?>">
                                        <? } ?>
                                        <div class="diadiem_cty">
                                            <p class="ten_cty mb_10 sh_size_one"><?= $rs_ctsp['new_name'] ?></p>
                                            <p class="ddiem_cty sh_size_one"><?= $rs_ctsp['new_address'] ?></p>
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        <? } ?>
                        <div class="pc_function d-flex space-between img_hide_375">
                            <? if ($id_user == $new_user_id) { ?>
                                <div class="v-btn btn-share ml-10 mr-10 posistion_relative">Chia s???
                                    <div class="share_popup">
                                        <a name="fb_share" type="button" target="_blank"><i class="ic-facebook"></i></a>
                                        <a name="tw_share" type="button" target="_blank"><i class="ic-twitter"></i></a>
                                        <a class="clickCopy"><i class="ic-share_link"></i></a>
                                    </div>
                                </div>
                            <? } else { ?>
                                <? if ($new_cate_id != 120 && $new_cate_id != 121) {
                                    if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                        <? if ($xt_lienket == 1 && $new_money != 0 && $new_money != "" && $da_ban != 1) {
                                            $check_dmua = new db_query("SELECT `dh_id`, `id_nguoi_dh`, `id_nguoi_ban`, `id_spham`, `trang_thai`, `dh_active`,
                                            `nguoimua_huydh` FROM `dat_hang` WHERE `id_spham` = $new_id AND `id_nguoi_dh` = $id_user ORDER BY `dh_id` DESC LIMIT 1 "); ?>
                                            <? if (mysql_num_rows($check_dmua->result) > 0) {
                                                $row_dmua = mysql_fetch_assoc($check_dmua->result); ?>
                                                <? if ($row_dmua['dh_active'] == 1) { ?>
                                                    <? if ($row_dmua['trang_thai'] == 0) { ?>
                                                        <div class="mua_ngay mngay_spham" data="<?= $id ?>">
                                                            <p class="muangay_sp">Ch??? x??c nh???n</p>
                                                        </div>
                                                    <? } else if ($row_dmua['trang_thai'] == 1) { ?>
                                                        <div class="mua_ngay mngay_spham" data="<?= $id ?>">
                                                            <p class="muangay_sp">??ang x??? l??</p>
                                                        </div>
                                                    <? } else if ($row_dmua['trang_thai'] == 2) { ?>
                                                        <div class="mua_ngay mngay_spham" data="<?= $id ?>">
                                                            <p class="muangay_sp">??ang giao</p>
                                                        </div>
                                                    <? } else if ($row_dmua['trang_thai'] == 3) { ?>
                                                        <div class="mua_ngay mngay_spham" data="<?= $id ?>">
                                                            <p class="muangay_sp">???? giao</p>
                                                        </div>
                                                    <? } else if ($row_dmua['trang_thai'] == 3 && $row_dmua['nguoimua_huydh'] == 1) { ?>
                                                        <div class="mua_ngay mngay_spham" data="<?= $id ?>">
                                                            <p class="muangay_sp">H???y ????n h??ng</p>
                                                        </div>
                                                    <? } else { ?>
                                                        <div class="mua_ngay mngay_spham" data="<?= $id ?>">
                                                            <p class="muangay_sp">Ch??? x??c nh???n</p>
                                                        </div>
                                                    <? } ?>
                                                <? } else { ?>
                                                    <div class="mua_ngay mngay_spham" data="<?= $id ?>">
                                                        <p class="muangay_sp">Ch??? x??c nh???n</p>
                                                    </div>
                                                <? } ?>
                                            <? } else { ?>
                                                <div class="mua_ngay mngay_spham" data="<?= $id ?>">
                                                    <p class="muangay_sp">Mua ngay</p>
                                                </div>
                                            <? } ?>
                                        <? } ?>
                                        <a class="d_fi_icon v-btn_df sh_cursor click_ss" href="/so-sanh-san-pham.html?new_id=<?= $new_id ?>">
                                            <div class="d_fi_icon_img">
                                                <img src="/images/anh_moi/icon_them.svg" alt="so s??nh">
                                            </div>
                                            <div class="d_fi_icon_text df_color_xanh">Th??m v??o so s??nh</div>
                                        </a>
                                    <? } else { ?>
                                        <? if ($xt_lienket == 1 && $new_money != 0 && $new_money != "" && $da_ban != 1) { ?>
                                            <div class="mua_ngay op_ovl_dn">
                                                <p class="muangay_sp">Mua ngay</p>
                                            </div>
                                        <? } ?>
                                        <a href="/so-sanh-san-pham.html?new-id=<?= $new_id ?>" class="d_fi_icon v-btn_df sh_cursor">
                                            <div class="d_fi_icon_img">
                                                <img src="/images/anh_moi/icon_them.svg" alt="so s??nh">
                                            </div>
                                            <div class="d_fi_icon_text df_color_xanh">Th??m v??o so s??nh</div>
                                        </a>
                                <? }
                                } ?>
                                <div class="v-btn btn-share ml-10 mr-10 posistion_relative">
                                    Chia s???
                                    <div class="share_popup">
                                        <a name="fb_share" type="button" target="_blank"> <i class="ic-facebook"></i> </a>
                                        <a name="tw_share" type="button" target="_blank"><i class="ic-twitter"></i></a>
                                        <a class="clickCopy"><i class="ic-share_link"></i></a>
                                    </div>
                                </div>
                                <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                    <? if (mysql_num_rows($check_tim->result) > 0) { ?>
                                        <div class="df_tindathich cl_dayeuthich" onclick="yeu_thich(this)" data="<?= $new_id ?>">
                                            <div class="df_tindathich_img">
                                                <img src="/images/anh_moi/tin_da_thich.svg" alt="???? th??ch">
                                            </div>
                                            <div class="df_tindathich_text color_da_thich">???? th??ch</div>
                                        </div>
                                    <? } else { ?>
                                        <div class="df_tindathich cl_yeuthich cl_yeuthich_border" onclick="yeu_thich(this)" data="<?= $new_id ?>">
                                            <div class="df_tindathich_img">
                                                <img src="/images/anh_moi/tin_chua_thich.svg" alt="Y??u th??ch">
                                            </div>
                                            <div class="df_tindathich_text color_yeu_thich">Y??u th??ch</div>
                                        </div>
                                    <? } ?>
                                <? } else { ?>
                                    <a href="/dang-nhap.html" class="df_tindathich cl_yeuthich cl_yeuthich_border">
                                        <div class="df_tindathich_img">
                                            <img src="/images/anh_moi/tin_chua_thich.svg" alt="Y??u th??ch">
                                        </div>
                                        <div class="df_tindathich_text color_yeu_thich">Y??u th??ch</div>
                                    </a>
                                <? } ?>
                            <? } ?>
                        </div>

                        <div class="div_icon_show_375 khung_chise_por">
                            <? if ($rs_ctsp['new_cate_id'] != 120 && $rs_ctsp['new_cate_id'] != 121) { ?>
                                <a href="/so-sanh-san-pham.html?new-id=<?= $new_id ?>" class="div_icon_show_375_img v-btn_df">
                                    <img src="../images/anh_moi/icon_them.svg" alt="">
                                </a>
                            <? } ?>
                            <div class="div_icon_show_375_img show_khung_cs">
                                <img src="../images/anh_moi/chiase.svg" alt="">
                            </div>
                            <div class="khung_chise hidden">
                                <img src="../images/anh_moi/khung_chiase.svg" alt="">
                                <div class="four_nut_mxh">
                                    <div class="four_nut_mxh_sub" name="fb_share" type="button" target="_blank">
                                        <i class="ic-facebook"></i>
                                    </div>
                                    <div class="four_nut_mxh_sub" name="tw_share" type="button" target="_blank">
                                        <i class="ic-twitter"></i>
                                    </div>
                                    <div class="four_nut_mxh_sub clickCopy">
                                        <i class="ic-share_link"></i>
                                    </div>
                                </div>
                            </div>
                            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                <? if (mysql_num_rows($check_tim->result) > 0) { ?>
                                    <div class="div_icon_show_375_img click_bg_tim v-btn_df toggle_color3" onclick="yeu_thich(this)" data="<?= $new_id ?>">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="#FFF" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.82222 15.0659L12.3542 22.1414C12.6415 22.4113 12.7852 22.5463 12.9586 22.5609C12.9866 22.5633 13.0147 22.5633 13.0427 22.5609C13.2161 22.5463 13.3598 22.4113 13.6471 22.1414L21.1791 15.0659C23.2983 13.0752 23.5556 9.79918 21.7733 7.50194L21.4381 7.06998C19.306 4.32183 15.0261 4.78271 13.5279 7.92182C13.3162 8.36524 12.6851 8.36524 12.4734 7.92182C10.9752 4.78271 6.69535 4.32183 4.56316 7.06998L4.22802 7.50194C2.44568 9.79918 2.70302 13.0752 4.82222 15.0659Z" stroke="#FF4343" />
                                        </svg>
                                    </div>
                                <? } else { ?>
                                    <div class="div_icon_show_375_img click_bg_tim v-btn_df" onclick="yeu_thich(this)" data="<?= $new_id ?>">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="#FFF" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.82222 15.0659L12.3542 22.1414C12.6415 22.4113 12.7852 22.5463 12.9586 22.5609C12.9866 22.5633 13.0147 22.5633 13.0427 22.5609C13.2161 22.5463 13.3598 22.4113 13.6471 22.1414L21.1791 15.0659C23.2983 13.0752 23.5556 9.79918 21.7733 7.50194L21.4381 7.06998C19.306 4.32183 15.0261 4.78271 13.5279 7.92182C13.3162 8.36524 12.6851 8.36524 12.4734 7.92182C10.9752 4.78271 6.69535 4.32183 4.56316 7.06998L4.22802 7.50194C2.44568 9.79918 2.70302 13.0752 4.82222 15.0659Z" stroke="#FF4343" />
                                        </svg>
                                    </div>
                                <? } ?>
                            <? } else { ?>
                                <div class="div_icon_show_375_img click_bg_tim v-btn_df op_ovl_dn">
                                    <svg width="26" height="26" viewBox="0 0 26 26" fill="#FFF" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M4.82222 15.0659L12.3542 22.1414C12.6415 22.4113 12.7852 22.5463 12.9586 22.5609C12.9866 22.5633 13.0147 22.5633 13.0427 22.5609C13.2161 22.5463 13.3598 22.4113 13.6471 22.1414L21.1791 15.0659C23.2983 13.0752 23.5556 9.79918 21.7733 7.50194L21.4381 7.06998C19.306 4.32183 15.0261 4.78271 13.5279 7.92182C13.3162 8.36524 12.6851 8.36524 12.4734 7.92182C10.9752 4.78271 6.69535 4.32183 4.56316 7.06998L4.22802 7.50194C2.44568 9.79918 2.70302 13.0752 4.82222 15.0659Z" stroke="#FF4343" />
                                    </svg>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                    <? if ($new_cate_id != 120 && $new_cate_id != 121) { ?>
                        <div class="w-100 mt-50 inf_ctiet_spham">
                            <!-- D??? LI???U ???????C ????? B??N FILE render/ttin_ctiet_cp.php -->
                            <? include("../includes/inc_new/tt_ct_sanpham.php"); ?>
                        </div>
                        <div class="w-100">
                            <h2 class="pc_title pl-10">M?? t???</h2>
                            <p class="mt-30 fs_16_19 text_grey content_mota"><?= nl2br($mota) ?></p>
                        </div>
                        <div class="w-100 mt-50 mb-10 fs_16_19 font_500 text_666666 more_info">
                            <h2 class="pc_title pl-10">Th??ng tin kh??c</h2>
                            <p class="mt-30">Khu v???c:
                                <strong>
                                    <?= ($rs_ctsp['new_sonha'] != "") ? $rs_ctsp['new_sonha'] . ", " : "" ?>
                                    <?= ($rs_ctsp['phuong_xa'] != 0) ? $db_pxa[$rs_ctsp['phuong_xa']]['prefix'] . ' ' . $db_pxa[$rs_ctsp['phuong_xa']]['name'] . ", " : "" ?>
                                    <a href="/mua-ban/rao-vat/<?= $rs_ctsp['new_city'] ?>/<?= replaceTitle($arrcity[$rs_ctsp['new_city']]['cit_name']) ?>.html??fill=1&district=<?= $rs_ctsp['quan_huyen'] ?>">
                                        <?= ($rs_ctsp['quan_huyen'] != 0) ? $arrcity2[$rs_ctsp['quan_huyen']]['cit_name'] . ", " : "" ?>
                                    </a>
                                    <a href="/mua-ban/rao-vat/<?= $rs_ctsp['new_city'] ?>/<?= replaceTitle($arrcity[$rs_ctsp['new_city']]['cit_name']) ?>.html">
                                        <?= ($rs_ctsp['new_city'] != 0) ? $arrcity[$rs_ctsp['new_city']]['cit_name'] : "" ?>
                                    </a>
                                </strong>
                            </p>
                            <? if ($new_ctiet_dmuc != '' && $new_ctiet_dmuc != 0) { ?>
                                <p class="mt-20">Chi ti???t danh m???c:
                                    <strong>
                                        <a href="/mua-ban-<?= replaceTitle($tags_tk1[$new_ctiet_dmuc]) ?>-t<?= $new_ctiet_dmuc ?>.html">
                                            <?= $tags_tk1[$new_ctiet_dmuc] ?>
                                        </a>
                                    </strong>
                                </p>
                            <? } ?>
                        </div>
                        <!-- ket thuc dang tin -->

                        <? }
                    if ($new_cate_id == 120 || $new_cate_id == 121) {
                        if ($new_cate_id == 120) { ?>
                            <!-- tim ung vien -->
                            <div class="ttin_vieclam">
                                <div class="ttin_dangtuyen">
                                    <h2 class="pc_title pl-10">Th??ng tin ????ng tuy???n</h2>
                                    <div class="tinngan_dtuyen">
                                        <p class="gthieu_moto word_br"><?= nl2br($mota) ?></p>
                                        <p class="hienso_nhtuyend">B???m g???i ngay: <span class="hien_so"><?= substr_replace($usc_phone, '*****', -5) ?></span>
                                            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                                <span data="<?= $new_user_id ?>" class="cl_hienso" onclick="clk_hso_dthoai(this)">Hi???n s???</span>
                                            <? } else { ?>
                                                <span data="<?= $new_user_id ?>" class="cl_hienso op_ovl_dn">Hi???n s???</span>
                                            <? } ?>
                                        </p>
                                        <div class="ctiet_utuyen w_100">
                                            <div class="ungtuyen d-flex w_100">
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/nganhnghe.png">Ng??nh ngh???: <?= $db_catvl[$rs_ctsp['new_job_type']]['cat_name'] ?></p>
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/ctiet_cviec.png">Chi ti???t c??ng vi???c: <?= $db_tags_vl[$rs_ctsp['new_ctiet_dmuc']] ?></p>
                                            </div>
                                            <div class="ungtuyen d-flex w_100">
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/hthuc_lv.png">H??nh th???c l??m vi???c: <?= $hthuc_lamviec[$rs_ctsp['new_job_kind']] ?></p>
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/hthuc_tluong.png">H??nh th???c tr??? l????ng: <?= $hthuc_trluong[$rs_ctsp['new_pay_by']] ?></p>
                                            </div>
                                            <div class="ungtuyen d-flex w_100">
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/sluong_tuyen.png">S??? l?????ng c???n tuy???n: <?= $rs_ctsp['new_quantity'] ?></p>
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/han_nop.png">H???n n???p: <?= ($rs_ctsp['han_su_dung'] != "") ? date('d/m/Y', $rs_ctsp['han_su_dung']) : "" ?></p>
                                            </div>
                                        </div>
                                        <p class="ddiem_lamviec ttin_tvutuyen w_100 d-flex"><img src="/images/anh_moi/diadiem_lv.png">?????a ??i???m l??m vi???c: <?= ltrim($rs_ctsp['dia_chi'], ', ') ?></p>
                                    </div>
                                </div>
                                <div class="ttin_them">
                                    <h2 class="pc_title pl-10">Th??ng tin th??m</h2>
                                    <div class="tinngan_dtuyen">
                                        <div class="ctiet_utuyen w_100">
                                            <div class="ungtuyen d-flex w_100">
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/gioitinh.png">Gi???i t??nh: <?= $gioitinh_tdung[$rs_ctsp['gioi_tinh']] ?></p>
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/do_tuoi.png">????? tu???i:
                                                    <?= ($rs_ctsp['new_min_age'] != 0) ? $rs_ctsp['new_min_age'] : "" ?> <?= ($rs_ctsp['new_min_age'] == 0 || $rs_ctsp['new_max_age'] == 0) ? "" : "-" ?> <?= ($rs_ctsp['new_max_age'] != 0) ? $rs_ctsp['new_max_age'] : "" ?>
                                                </p>
                                            </div>
                                            <div class="ungtuyen d-flex w_100">
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/bang_cap.png">B???ng c???p: <?= $bang_cap[$rs_ctsp['new_level']] ?></p>
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/kinhnghiem.png">Kinh nghi???m: <?= $kinh_nghiem[$rs_ctsp['new_exp']] ?></p>
                                            </div>
                                            <div class="ungtuyen d-flex w_100">
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/chungchi.png">Ch???ng ch???: <?= $rs_ctsp['new_skill'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } else if ($new_cate_id == 121) { ?>
                            <!-- tim viec lam -->
                            <div class="ttin_vieclam">
                                <div class="ttin_dangtuyen">
                                    <h2 class="pc_title pl-10">Th??ng tin c?? b???n</h2>
                                    <div class="tinngan_dtuyen">
                                        <p class="gthieu_moto word_br"><?= nl2br($mota) ?></p>
                                        <p class="hienso_nhtuyend">B???m g???i ngay: <span class="hien_so"><?= substr_replace($usc_phone, '*****', -5) ?></span>
                                            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                                <span data="<?= $new_user_id ?>" class="cl_hienso" onclick="clk_hso_dthoai(this)">Hi???n s???</span>
                                            <? } else { ?>
                                                <span data="<?= $new_user_id ?>" class="cl_hienso op_ovl_dn">Hi???n s???</span>
                                            <? } ?>
                                        </p>
                                        <div class="ctiet_utuyen w_100">
                                            <div class="ungtuyen d-flex w_100">
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/gioitinh.png">Gi???i t??nh: <?= ($rs_ctsp['gioi_tinh'] == 1) ? "Nam" : "N???" ?></p>
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/do_tuoi.png">Tu???i: <?= $rs_ctsp['new_min_age'] ?></p>
                                            </div>
                                            <div class="ungtuyen d-flex w_100">
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/nganhnghe.png">Ng??nh ngh???: <?= $db_catvl[$rs_ctsp['new_job_type']]['cat_name'] ?></p>
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/hthuc_lv.png">H??nh th???c l??m vi???c: <?= $hthuc_lamviec[$rs_ctsp['new_job_kind']] ?></p>
                                            </div>
                                            <div class="ungtuyen d-flex w_100">
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/hthuc_tluong.png">H??nh th???c tr??? l????ng: <?= $hthuc_trluong[$rs_ctsp['new_pay_by']] ?></p>
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/kinhnghiem.png">Kinh nghi???m: <?= $kinh_nghiem[$rs_ctsp['new_exp']] ?></p>
                                            </div>
                                            <div class="ungtuyen d-flex w_100">
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/bang_cap.png">B???ng c???p: <?= $bang_cap[$rs_ctsp['new_level']] ?></p>
                                                <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/chungchi.png">Ch???ng ch???: <?= $rs_ctsp['new_skill'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    <? } ?>
                </div>
                <? if ($layoutType == 'tablet' || $layoutType == 'mobile') { ?>
                    <div class="ds-khach-on ds_khach_on dsach_onli">
                        <h2 class="tieude_ghonl sh_clr_two">Danh s??ch b???n b??</h2>
                        <div id="list_chat">

                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
        <div class="v_container tin_dang_tuong_tu_container">
            <div class="tin_dang_tuong_tu">
                <div class="w-100 d-flex space-between pv-20 mt-10">
                    <h2 class="fs_24_28 font_500 pt-20 df_text1">TIN ????NG T????NG T???</h2>
                    <a href="/tat-ca-tin-dang-ban.html">
                        <button class="btn_see_more pt-20 img_hide_375 sh_cursor">Xem t???t c???</button>
                    </a>
                </div>
                <div class="w-100 df_div_nay1">
                    <div class="d-flex df_flww tindangtuongtu">
                        <? if (mysql_num_rows($tindang_tt->result) > 0) {
                            while ($tindang_tt_ok = mysql_fetch_assoc($tindang_tt->result)) {

                                $img = $tindang_tt_ok['new_image'];
                                $img_ok = explode(';', $img);
                                $img_count = count($img_ok);

                                $id_tin = $tindang_tt_ok['new_id'];
                                $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$id_user' AND `usc_type` = '$type_user'");
                                $check_num = mysql_num_rows($check->result); ?>

                                <div class="news_item news_item_df">
                                    <div class="ni_image">
                                        <div class="image_wrapper">
                                            <a href="/<?= replaceTitle($tindang_tt_ok['link_title']) ?>-c<?= $tindang_tt_ok['new_id'] ?>.html">
                                                <img class="img_responsive" onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $img_ok[0])  ?>" alt="<?= $tindang_tt_ok['new_title'] ?>">
                                            </a>
                                            <? if ($img_count > 1) { ?>
                                                <div class="numb_pic"><?= $img_count ?></div>
                                            <? } ?>
                                            <? if (!isset($_COOKIE['UID'])) { ?>
                                                <div class="yeuthich_tinl">
                                                    <img src="/images/anh_moi/yeuthich_moi.png" alt="y??u th??ch" class="ko_yeuthich hd_cspointer">
                                                </div>
                                            <? }
                                            if (isset($_COOKIE['UID'])) { ?>
                                                <div class="yeuthich_tinl">
                                                    <? if ($check_num == 0) { ?>
                                                        <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="y??u th??ch" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                    <? } else { ?>
                                                        <img src="/images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="y??u th??ch" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                    <? } ?>
                                                </div>
                                            <? } ?>
                                        </div>
                                    </div>
                                    <div class="ni_info space-between info_pr">
                                        <a href="/<?= replaceTitle($tindang_tt_ok['link_title']) ?>-c<?= $tindang_tt_ok['new_id'] ?>.html">
                                            <h3 class="fs_16_19 font_500 text_474747 "><?= $tindang_tt_ok['new_title'] ?></h3>
                                        </a>
                                        <div class="w-100">
                                            <p class="text_aaaaaa font-italic "><?= lay_tgian($tindang_tt_ok['new_create_time']) ?></p>
                                            <p class="text_aaaaaa font-italic elipsis1"><?= ltrim($tindang_tt_ok['dia_chi'], ', ') ?></p>
                                            <div class="d-flex space-between df_div_con">
                                                <? if ($tindang_tt_ok['new_cate_id'] != 120 && $tindang_tt_ok['new_cate_id'] != 121) { ?>
                                                    <? if ($tindang_tt_ok['chotang_mphi'] == 1) { ?>
                                                        <p class="pc_price fs_18_21 word_br">Cho t???ng mi???n ph??</p>
                                                    <? } else if ($tindang_tt_ok['new_money'] > 0) { ?>
                                                        <p class="pc_price fs_18_21 word_br">
                                                            <?= number_format($tindang_tt_ok['new_money']) ?> <?= $arr_dvtien[$tindang_tt_ok['new_unit']] ?>
                                                        </p>
                                                    <? } else if ($tindang_tt_ok['new_money'] == 0) { ?>
                                                        <p class="pc_price fs_18_21 word_br">Li??n h??? ng?????i b??n</p>
                                                    <? } ?>
                                                <? } else { ?>
                                                    <? if ($tindang_tt_ok['new_money'] != 0 && $tindang_tt_ok['gia_kt'] != 0) { ?>
                                                        <p class="pc_price fs_18_21 word_br">
                                                            <?= number_format($tindang_tt_ok['new_money']) ?> - <?= number_format($tindang_tt_ok['gia_kt']) ?> <?= $arr_dvtien[$tindang_tt_ok['new_unit']] ?>
                                                        </p>
                                                    <? } else if ($tindang_tt_ok['new_money'] != 0 && $tindang_tt_ok['gia_kt'] == 0) { ?>
                                                        <p class="pc_price fs_18_21 word_br">
                                                            T??? <?= number_format($tindang_tt_ok['new_money']) ?> <?= $arr_dvtien[$tindang_tt_ok['new_unit']] ?>
                                                        </p>
                                                    <? } else if ($tindang_tt_ok['new_money'] == 0 && $tindang_tt_ok['gia_kt'] != 0) { ?>
                                                        <p class="pc_price fs_18_21 word_br">
                                                            ?????n <?= number_format($tindang_tt_ok['gia_kt']) ?> <?= $arr_dvtien[$tindang_tt_ok['new_unit']] ?>
                                                        </p>
                                                    <? } else { ?>
                                                        <p class="pc_price fs_18_21 word_br">
                                                            Th???a thu???n
                                                        </p>
                                                    <? } ?>
                                                <? } ?>

                                                <? if (!isset($_COOKIE['UID'])) { ?>
                                                    <div class="img_like item_chat op_ovl_dn" id-chat="<?= $tindang_tt_ok['chat365_id'] ?>">
                                                        <p class="chat_th">Chat</p>
                                                    </div>
                                                <? }
                                                if (isset($_COOKIE['UID'])) { ?>
                                                    <a class="img_like item_chat" target="_blank" id-chat="<?= $tindang_tt_ok['chat365_id'] ?>" rel="nofollow" href="/<?= replaceTitle($tindang_tt_ok['new_title']) ?>-c<?= $tindang_tt_ok['new_id'] ?>.html">
                                                        <p class="chat_th">Chat</p>
                                                    </a>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <? }
                        } else {
                            if (mysql_num_rows($tindang_tt2->result) > 0) {
                                while ($tindang_tt_ok1 = mysql_fetch_assoc($tindang_tt2->result)) {

                                    $img = $tindang_tt_ok1['new_image'];
                                    $img_ok = explode(';', $img);
                                    $img_count = count($img_ok);

                                    $id_tin = $tindang_tt_ok1['new_id'];
                                    $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$id_user' AND `usc_type` = '$type_user'");
                                    $check_num = mysql_num_rows($check->result); ?>
                                    <div class="news_item news_item_df">
                                        <div class="ni_image">
                                            <div class="image_wrapper">
                                                <a href="/<?= replaceTitle($tindang_tt_ok1['link_title']) ?>-c<?= $tindang_tt_ok1['new_id'] ?>.html">
                                                    <img class="img_responsive" onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $img_ok[0])  ?>" alt="<?= $tindang_tt_ok1['new_title'] ?>">
                                                </a>
                                                <? if ($img_count > 1) { ?>
                                                    <div class="numb_pic"><?= $img_count ?></div>
                                                <? } ?>
                                                <? if (!isset($_COOKIE['UID'])) { ?>
                                                    <div class="yeuthich_tinl">
                                                        <img src="/images/anh_moi/yeuthich_moi.png" alt="y??u th??ch" class="ko_yeuthich hd_cspointer">
                                                    </div>
                                                <? }
                                                if (isset($_COOKIE['UID'])) { ?>
                                                    <div class="yeuthich_tinl">
                                                        <? if ($check_num == 0) { ?>
                                                            <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="y??u th??ch" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                        <? } else { ?>
                                                            <img src="/images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="y??u th??ch" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                        <? } ?>
                                                    </div>
                                                <? } ?>
                                            </div>
                                        </div>
                                        <div class="ni_info space-between info_pr word_br">
                                            <a href="/<?= replaceTitle($tindang_tt_ok1['link_title']) ?>-c<?= $tindang_tt_ok1['new_id'] ?>.html">
                                                <h3 class="fs_16_19 font_500 text_474747"><?= $tindang_tt_ok1['new_title'] ?></h3>
                                            </a>
                                            <div class="w-100">
                                                <p class="text_aaaaaa font-italic "><?= lay_tgian($tindang_tt_ok1['new_create_time']) ?></p>
                                                <p class="text_aaaaaa font-italic elipsis1"><?= ltrim($tindang_tt_ok1['dia_chi'], ', ') ?></p>
                                                <div class="d-flex space-between df_div_con">
                                                    <? if ($tindang_tt_ok1['new_cate_id'] != 120 && $tindang_tt_ok1['new_cate_id'] != 121) { ?>
                                                        <? if ($tindang_tt_ok1['chotang_mphi'] == 1) { ?>
                                                            <p class="pc_price fs_18_21 word_br">Cho t???ng mi???n ph??</p>
                                                        <? } else if ($tindang_tt_ok1['new_money'] > 0) { ?>
                                                            <p class="pc_price fs_18_21 word_br">
                                                                <?= number_format($tindang_tt_ok1['new_money']) ?> <?= $arr_dvtien[$tindang_tt_ok1['new_unit']] ?>
                                                            </p>
                                                        <? } else if ($tindang_tt_ok1['new_money'] == 0) { ?>
                                                            <p class="pc_price fs_18_21 word_br">Li??n h??? ng?????i b??n</p>
                                                        <? } ?>
                                                    <? } else { ?>
                                                        <? if ($tindang_tt_ok1['new_money'] != 0 && $tindang_tt_ok1['gia_kt'] != 0) { ?>
                                                            <p class="pc_price fs_18_21 word_br">
                                                                <?= number_format($tindang_tt_ok1['new_money']) ?> - <?= number_format($tindang_tt_ok1['gia_kt']) ?> <?= $arr_dvtien[$tindang_tt_ok1['new_unit']] ?>
                                                            </p>
                                                        <? } else if ($tindang_tt_ok1['new_money'] != 0 && $tindang_tt_ok1['gia_kt'] == 0) { ?>
                                                            <p class="pc_price fs_18_21 word_br">
                                                                T??? <?= number_format($tindang_tt_ok1['new_money']) ?> <?= $arr_dvtien[$tindang_tt_ok1['new_unit']] ?>
                                                            </p>
                                                        <? } else if ($tindang_tt_ok1['new_money'] == 0 && $tindang_tt_ok1['gia_kt'] != 0) { ?>
                                                            <p class="pc_price fs_18_21 word_br">
                                                                ?????n <?= number_format($tindang_tt_ok1['gia_kt']) ?> <?= $arr_dvtien[$tindang_tt_ok1['new_unit']] ?>
                                                            </p>
                                                        <? } else { ?>
                                                            <p class="pc_price fs_18_21 word_br">
                                                                Th???a thu???n
                                                            </p>
                                                        <? } ?>
                                                    <? } ?>

                                                    <? if (!isset($_COOKIE['UID'])) { ?>
                                                        <div class="img_like item_chat op_ovl_dn" id-chat="<?= $tindang_tt_ok1['chat365_id'] ?>">
                                                            <p class="chat_th">Chat</p>
                                                        </div>
                                                    <? }
                                                    if (isset($_COOKIE['UID'])) { ?>
                                                        <a class="img_like item_chat" target="_blank" id-chat="<?= $tindang_tt_ok1['chat365_id'] ?>" rel="nofollow" href="/<?= replaceTitle($tindang_tt_ok1['new_title']) ?>-c<?= $tindang_tt_ok1['new_id'] ?>.html">
                                                            <p class="chat_th">Chat</p>
                                                        </a>
                                                    <? } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <? }
                            } else {
                                if (mysql_num_rows($tindang_tt3->result) > 0) {
                                    while ($tindang_tt_ok2 = mysql_fetch_assoc($tindang_tt3->result)) {

                                        $img = $tindang_tt_ok2['new_image'];
                                        $img_ok = explode(';', $img);
                                        $img_count = count($img_ok);

                                        $id_tin = $tindang_tt_ok2['new_id'];
                                        $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$id_user' AND `usc_type` = '$type_user'");
                                        $check_num = mysql_num_rows($check->result); ?>
                                        <div class="news_item news_item_df">
                                            <div class="ni_image">
                                                <div class="image_wrapper">
                                                    <a href="/<?= replaceTitle($tindang_tt_ok2['link_title']) ?>-c<?= $tindang_tt_ok2['new_id'] ?>.html">
                                                        <img class="img_responsive" onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $img_ok[0])  ?>" alt="<?= $tindang_tt_ok2['new_title'] ?>">
                                                    </a>
                                                    <? if ($img_count > 1) { ?>
                                                        <div class="numb_pic"><?= $img_count ?></div>
                                                    <? } ?>
                                                    <? if (!isset($_COOKIE['UID'])) { ?>
                                                        <div class="yeuthich_tinl">
                                                            <img src="/images/anh_moi/yeuthich_moi.png" alt="y??u th??ch" class="ko_yeuthich hd_cspointer">
                                                        </div>
                                                    <? }
                                                    if (isset($_COOKIE['UID'])) { ?>
                                                        <div class="yeuthich_tinl">
                                                            <? if ($check_num == 0) { ?>
                                                                <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="y??u th??ch" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                            <? } else { ?>
                                                                <img src="/images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="y??u th??ch" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                            <? } ?>
                                                        </div>
                                                    <? } ?>
                                                </div>
                                            </div>
                                            <div class="ni_info space-between info_pr word_br">
                                                <a href="/<?= replaceTitle($tindang_tt_ok2['link_title']) ?>-c<?= $tindang_tt_ok2['new_id'] ?>.html">
                                                    <h3 class="fs_16_19 font_500 text_474747 text_ellipsis word_br"><?= $tindang_tt_ok2['new_title'] ?></h3>
                                                </a>
                                                <div class="w-100">
                                                    <p class="text_aaaaaa font-italic "><?= lay_tgian($tindang_tt_ok2['new_create_time']) ?></p>
                                                    <p class="text_aaaaaa font-italic elipsis1"><?= ltrim($tindang_tt_ok2['dia_chi'], ', ')  ?></p>
                                                    <div class="d-flex space-between df_div_con">
                                                        <? if ($tindang_tt_ok2['new_cate_id'] != 120 && $tindang_tt_ok2['new_cate_id'] != 121) { ?>
                                                            <? if ($tindang_tt_ok2['chotang_mphi'] == 1) { ?>
                                                                <p class="pc_price fs_18_21 word_br">Cho t???ng mi???n ph??</p>
                                                            <? } else if ($tindang_tt_ok2['new_money'] > 0) { ?>
                                                                <p class="pc_price fs_18_21 word_br">
                                                                    <?= number_format($tindang_tt_ok2['new_money']) ?> <?= $arr_dvtien[$tindang_tt_ok2['new_unit']] ?>
                                                                </p>
                                                            <? } else if ($tindang_tt_ok2['new_money'] == 0) { ?>
                                                                <p class="pc_price fs_18_21 word_br">Li??n h??? ng?????i b??n</p>
                                                            <? } ?>
                                                        <? } else { ?>
                                                            <? if ($tindang_tt_ok2['new_money'] != 0 && $tindang_tt_ok2['gia_kt'] != 0) { ?>
                                                                <p class="pc_price fs_18_21 word_br">
                                                                    <?= number_format($tindang_tt_ok2['new_money']) ?> - <?= number_format($tindang_tt_ok2['gia_kt']) ?> <?= $arr_dvtien[$tindang_tt_ok2['new_unit']] ?>
                                                                </p>
                                                            <? } else if ($tindang_tt_ok2['new_money'] != 0 && $tindang_tt_ok2['gia_kt'] == 0) { ?>
                                                                <p class="pc_price fs_18_21 word_br">
                                                                    T??? <?= number_format($tindang_tt_ok2['new_money']) ?> <?= $arr_dvtien[$tindang_tt_ok2['new_unit']] ?>
                                                                </p>
                                                            <? } else if ($tindang_tt_ok2['new_money'] == 0 && $tindang_tt_ok2['gia_kt'] != 0) { ?>
                                                                <p class="pc_price fs_18_21 word_br">
                                                                    ?????n <?= number_format($tindang_tt_ok2['gia_kt']) ?> <?= $arr_dvtien[$tindang_tt_ok2['new_unit']] ?>
                                                                </p>
                                                            <? } else { ?>
                                                                <p class="pc_price fs_18_21 word_br">
                                                                    Th???a thu???n
                                                                </p>
                                                            <? } ?>
                                                        <? } ?>

                                                        <? if (!isset($_COOKIE['UID'])) { ?>
                                                            <div class="img_like item_chat op_ovl_dn" id-chat="<?= $tindang_tt_ok2['chat365_id'] ?>">
                                                                <p class="chat_th">Chat</p>
                                                            </div>
                                                        <? }
                                                        if (isset($_COOKIE['UID'])) { ?>
                                                            <a class="img_like item_chat" target="_blank" id-chat="<?= $tindang_tt_ok2['chat365_id'] ?>" rel="nofollow" href="/<?= replaceTitle($tindang_tt_ok2['new_title']) ?>-c<?= $tindang_tt_ok2['new_id'] ?>.html">
                                                                <p class="chat_th">Chat</p>
                                                            </a>
                                                        <? } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        <? }
                                }
                            }
                        } ?>
                    </div>
                </div>
                <a href="/tat-ca-tin-dang-ban.html" class="btn_see_more pt-20 img_hide_1366 show_375">Xem t???t c???</a>
            </div>
            <? include('../include/comment/inc_comment.php'); ?>
        </div>

    </section>

    <div class="modal share_modal anh_slick">
        <div class="modal-header tex_center tbao_hd">
            <span class="close share_close sh_cursor sh_clr_one">&times;</span>
            <div class="box_rotate">
                <button data-rotate="90" class="rotate" id="rotate_mess" value="180">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 35 35" fill="none">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M26.7808 4C27.3848 4 27.8745 4.48969 27.8745 5.09375V11.2809C27.8745 11.885 27.3848 12.3747 26.7808 12.3747H20.5936C19.9895 12.3747 19.4998 11.885 19.4998 11.2809C19.4998 10.6769 19.9895 10.1872 20.5936 10.1872H24.0358C19.8863 6.91603 13.8523 7.19468 10.0238 11.0231C5.89484 15.1521 5.89484 21.8465 10.0238 25.9755C14.1528 30.1045 20.8472 30.1045 24.9762 25.9755C27.7424 23.2092 28.6568 19.2909 27.714 15.7604C27.5581 15.1768 27.9049 14.5773 28.4885 14.4215C29.0721 14.2656 29.6716 14.6124 29.8274 15.196C30.9634 19.4499 29.8637 24.1815 26.523 27.5223C21.5397 32.5055 13.4603 32.5055 8.47702 27.5223C3.49377 22.539 3.49377 14.4596 8.47702 9.47634C13.1904 4.76298 20.6736 4.5077 25.687 8.71051V5.09375C25.687 4.48969 26.1767 4 26.7808 4Z" fill="white" style="&#10;    fill: rebeccapurple;&#10;" />
                        <circle cx="17.5" cy="17.5" r="2.5" fill="white" />
                    </svg>
                </button>
            </div>
        </div>
        <div class="modal-content">
            <div class="bgom_modal">
                <div class="modal-body">
                    <div class="slide_show">
                        <div class="sliders">
                            <div class="slide_control next_slide"><i class="ic-next"></i></div>
                            <div class="avt_spham_ban">
                                <? $avtchay_sli = explode(';', $rs_ctsp['new_image']);
                                for ($l = 0; $l < count($avtchay_sli); $l++) { ?>
                                    <img style="object-fit: contain; display:<?= ($l == 0) ? 'block' : 'none' ?>" id="zoom_mess_<?= $l ?>" class="slide_anh" stt="<?= $l ?>" onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $avtchay_sli[$l])  ?>" alt="<?= $rs_ctsp['new_title'] ?>">
                                <? } ?>
                            </div>
                            <div class="slide_control prev_slide"><i class="ic-prev"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="khoi_nghegoi d-flex align-items-center justify-content-center khoi_nghegoi_df_77">
        <div class="khoi_nghegoi_item">
            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                <div class="pb-5">
                    <a href="<?= $link_chat; ?>" target="_blank">
                        <img src="/images/newImages/chat_green.png" alt="">
                    </a>
                </div>
                <span><a href="<?= $link_chat; ?>" target="_blank">Chat</a></span>
            <? } else { ?>
                <div class="pb-5">
                    <a class="op_ovl_dn">
                        <img src="/images/newImages/chat_green.png" alt="">
                    </a>
                </div>
                <span><a class="op_ovl_dn">Chat</a></span>
            <? } ?>
        </div>
        <div class="khoi_nghegoi_item">
            <div class="pb-5">
                <img src="/images/newImages/call_orange.png" alt="">
            </div>
            <span>G???i ??i???n</span>
        </div>
        <div class="khoi_nghegoi_item">
            <div class="pb-5">
                <img src="/images/newImages/sms.png" alt="">
            </div>
            <span>Nh???n tin SMS</span>
        </div>
        <? if ($rs_ctsp['new_cate_id'] == 120) { ?>
            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                <? if ($id_user != $new_user_id) {  ?>
                    <? $check_ttut1 = new db_query("SELECT `id`, `status` FROM `apply_new` WHERE `uv_id` = '" . $_COOKIE['UID'] . "'
                                                AND `new_id` = '" . $new_id . "' ORDER BY `apply_time` DESC LIMIT 1 ");
                    if (mysql_num_rows($check_ttut1->result) > 0) {
                        $row_ungt1 = mysql_fetch_assoc($check_ttut1->result);
                        if ($row_ungt1['status'] == 0) { ?>
                            <div class="khoi_nghegoi_item">
                                <div class="pb-5">
                                    <img src="/images/newImages/call_orange.png" alt="">
                                </div>
                                <span>???? ???ng tuy???n</span>
                            </div>
                        <? } else { ?>
                            <? if ($rs_ctsp['han_su_dung'] > time()) { ?>
                                <div class="khoi_nghegoi_item">
                                    <div class="pb-5 vtri_utuyen" data="<?= $new_id ?>" data1="<?= $_COOKIE['UID'] ?>" data2="<?= $new_user_id ?>">
                                        <img src="/images/newImages/call_orange.png" alt="">
                                    </div>
                                    <span class="vtri_utuyen" data="<?= $new_id ?>" data1="<?= $_COOKIE['UID'] ?>" data2="<?= $new_user_id ?>">???ng tuy???n</span>
                                </div>
                            <? } ?>
                        <? } ?>
                    <? } ?>
                <? } ?>
            <? } else { ?>
                <? if ($rs_ctsp['han_su_dung'] > time()) { ?>
                    <div class="khoi_nghegoi_item">
                        <div class="pb-5 op_ovl_dn">
                            <img src="/images/newImages/call_orange.png" alt="">
                        </div>
                        <span class="op_ovl_dn">???ng tuy???n</span>
                    </div>
                <? } ?>
            <? } ?>
        <? } ?>
    </div>

    <div class="popup_parents popup_parents_ko_du d_none">
        <div class="popup_bg popup_bg_ovl"></div>
        <div class="container_popup">
            <div class="popup_content">
                <div class="popup_title ">
                    Th??ng b??o
                    <div class="img_close img_close_kodu sh_cursor"><img src="/images/anh_moi/close_while.svg" alt="">
                    </div>
                </div>
                <div class="popup_text">
                    S??? d?? t??i kho???n c???a b???n kh??ng ????? ????? s??? d???ng d???ch v??? n??y.
                    Vui l??ng n???p th??m ti???n ????? s??? d???ng d???ch v???!
                </div>
                <div class="popup_btn d_flex">
                    <button type="button" class="btn_huy click_huy_tb">Hu??? b???</button>
                    <? if ($type_user == 1) { ?>
                        <a href="/ho-so-nguoi-ban-ca-nhan/nap-tien-vao-tai-khoan.html" class="btn_dongy btn_dongy_css">N???p ti???n</a>
                    <? } elseif ($type_user == 5) { ?>
                        <a href="/ho-so-gian-hang-nap-tien-vao-tai-khoan.html" class="btn_dongy btn_dongy_css">N???p ti???n</a>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>

    <!-- POPUP B??O L???I -->
    <div class="popup_baoloi dpphide" data1="<?= $new_user_id ?>">
        <div class="popup_baoloi_overlay"></div>
        <form id="from_bct" class="popup_baoloi_pading">
            <div class="popup_baoloi_pading_heading">
                <div class="popup_baoloi_pading_heading_text">B??o c??o vi ph???m</div>
                <div class="popup_baoloi_pading_heading_x">X</div>
            </div>
            <div class="popup_baoloi_pading_content">
                <div class="popup_baoloi_pading_content_select box_input_infor">
                    <div class="content_select_text">V???n ????? c???a tin ????ng <span class="saodo">*</span></div>
                    <select name="van_de" id="vande" class="slect-hang">
                        <option value="">V???n ????? c???a tin ????ng</option>
                        <option value="1">L???a ?????o</option>
                        <option value="2">Tr??ng l???p</option>
                        <option value="3">???? b??n</option>
                        <option value="4">Kh??ng li??n l???c ???????c</option>
                        <option value="5">Th??ng tin kh??ng ????ng th???c t???</option>
                        <option value="6">H?? h???ng sau khi mua</option>
                    </select>
                </div>
                <div class="popup_baoloi_pading_content_mess box_input_infor">
                    <div class="popup_baoloi_pading_content_mess_text">M?? t??? <span class="saodo">*</span></div>
                    <textarea name="mota_vd" id="mota_vd" cols="30" rows="10" placeholder="Nh???p m?? t???"></textarea>
                </div>
                <div class="popup_baoloi_pading_content_btn ">
                    <div class="popup_baoloi_pading_content_btn_text " onclick="baovipham(this)" data="<?= $new_id ?>">G???I</div>
                </div>
            </div>

        </form>
    </div>

    <!-- POPUP ????NH D???U ???? B??N -->
    <div class="pp_dddb show_dddb d_none">
        <div class="pp_dddb_overlay"></div>
        <div class="pp_dddb_padding">
            <div class="pp_dddb_padding_img">
                <img src="../images/anh_moi/icon_tbao_tc.png" alt="">
            </div>
            <div class="pp_dddb_padding_text">
                <p class="pp_dddb_padding_text_p">
                    ????nh d???u ???? b??n th??nh c??ng!
                </p>
                <p class="pp_dddb_padding_text_p">
                    Tin c???a b???n s??? ???????c ???n sau v??i ph??t.
                    Vui l??ng ki???m tra l???i m???c Tin ???? b??n.
                </p>
            </div>
            <div class="pp_dddb_padding_btn cldban">
                <div class="pp_dddb_padding_btn_t">
                    ????ng
                </div>
            </div>
        </div>
    </div>

    <!-- POPUP ????NG B??N L???I -->
    <div class="pp_dddb show_dbl d_none">
        <div class="pp_dddb_overlay"></div>
        <div class="pp_dddb_padding">
            <div class="pp_dddb_padding_img">
                <img src="../images/anh_moi/icon_tbao_tc.png" alt="">
            </div>
            <div class="pp_dddb_padding_text">
                <p class="pp_dddb_padding_text_p">
                    ????ng b??n l???i th??nh c??ng!
                </p>
                <p class="pp_dddb_padding_text_p">Tin c???a b???n s??? ???????c hi???n th??? sau v??i ph??t</p>
            </div>
            <div class="pp_dddb_padding_btn cldbanl" data="">
                <div class="pp_dddb_padding_btn_t">????ng</div>
            </div>
        </div>
    </div>

    <!-- thong bao ung tuyen -->
    <? include('../modals/tbao_dangtin.php'); ?>
    <? include '../modals/md_tb_yeuthich.php'; ?>
    <? include("../includes/common_new/popup.php"); ?>
    <? include("../includes/inc_new/inc_footer.php"); ?>

    <script type="text/javascript" src="/js/style_new/app.js"></script>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>
    <script type="text/javascript">
        const url_cm = '<?= $url_index; ?>';
        // id ng?????i xem
        const uid_view = '<?= $_COOKIE["id_chat365"]; ?>';
        // avatar ng?????i xem
        const uid_ava = '<?= $logo_v; ?>';
        // t??n ng?????i xem
        const uid_name = '<?= $name_v; ?>';
        // id ng?????i t???o
        const uid_author = <?= $new_user_id; ?>;
        // const uid_author = 20;

        var hastag_cm = [];

        if (uid_ava != '' && uid_view > 0) {
            $('.img_user').attr('src', uid_ava);
        }
    </script>
    <script src="/js/socket_cm.js?v=<?= $version; ?>"></script>
    <? if (!isset($$_COOKIE['UID']) && !isset($$_COOKIE['UT'])) { ?>
        <script>
            $('.btn_login_do').click(function() {
                if (document.cookie.indexOf('id_chat365=') == -1) {
                    $('.ct_cm').blur();
                    window.open('http://dev5.tinnhanh365.vn/dang-nhap.html', '_blank').focus();
                } else {
                    window.location.reload();
                }
            })
        </script>
    <? } ?>
</body>

</html>
<script type="text/javascript">
    $(".mngay_spham").click(function() {
        var new_id = $(this).attr("data");
        if (new_id != "") {
            window.location.href = "/xac-nhan-don-hang-d" + new_id + ".html";
        }
    });
    // T??Y CH???N
    $('.tuychon_df_sub').click(function() {
        $(this).toggleClass('bg_tc');
        $('.tuychon_df_text').toggleClass('cl_tc');
        $('.tuychon_df_img').toggleClass('ic_tc');
        $('.pp_tuychon').toggle(500);
    });
    // POPUP L???I
    $('.btn_baocao').click(function() {
        $('.popup_baoloi').removeClass('dpphide');
    });

    function clk_hso_dthoai(id) {
        var us_id = $(id).attr("data");
        $.ajax({
            url: '/render/hienso_dthoai.php',
            type: 'POST',
            data: {
                us_id: us_id,
            },
            success: function(data) {
                $(id).parent().find(".hien_so").text(data);
            }
        })
    };

    // G???i b??o c??o tin
    function baovipham(id) {
        var from_bct = $('#from_bct');
        from_bct.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                van_de: "required",
                mota_vd: {
                    required: true,
                    minlength: 10,
                },
            },
            messages: {
                van_de: "Vui l??ng ch???n v???n ?????",
                mota_vd: {
                    required: "Vui l??ng nh???p m?? t???",
                    minlength: "C?? ??t nh???t 10 k?? t???",
                },
            }
        });
        if (from_bct.valid() === true) {
            var vande = $('#vande').val();
            var mota_vande = $('#mota_vd').val();
            var id_tin = $(id).attr('data');
            var new_usc_id = $('.popup_baoloi').attr('data1');
            $.ajax({
                url: '../ajax/bao_cao_tin.php',
                type: 'POST',
                data: {
                    vande: vande,
                    mota_vande: mota_vande,
                    id_tin: id_tin,
                    new_usc_id: new_usc_id
                },
                success: function(data) {
                    if (data == "") {
                        alert('G???i th??nh c??ng');
                        window.location.reload();
                    } else {
                        alert(data);
                    }
                }
            })
        }
    };

    $('.popup_baoloi_pading_heading_x').click(function() {
        $('.popup_baoloi').addClass('dpphide');
    });

    function slick_click() {
        $('.sliders').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            Accessibility: true,
            adaptiveHeight: false,
            nextArrow: '<div class="slide_control next_slide"><i class="ic-next"></i></div>',
            prevArrow: '<div class="slide_control prev_slide"><i class="ic-prev"></i></div>'
        });
    };

    $(".avt_sp_pto").click(function() {
        $(".anh_slick").show();
        // slick_click();
        // var id_new = $(this).attr("data");
        // $.ajax({
        //     url: '/render/anh_slick.php',
        //     type: 'POST',
        //     data: {
        //         id_new: id_new,
        //     },
        //     success: function(data) {
        //         $(".anh_slick .sliders").html(data);
        //         $(".anh_slick").show();
        //         slick_click();
        //     }
        // })
    });

    $(".close").click(function() {
        $(".modal").hide();
    });

    $('.show_khung_cs').click(function() {
        $('.khung_chise').toggleClass('hidden')
    });

    // ????ng d???u ???? b??n
    $(document).on('click', '.cl_danhdauban', function() {
        var id_ban = $(this).attr('data');
        $('.show_dddb .cldban').attr('data', id_ban);
        $('.show_dddb').show();
    });

    $('.cldban').click(function() {
        var id_tin = $(this).attr('data');
        $.ajax({
            type: 'POST',
            url: '/ajax/updata_tindaban.php',
            data: {
                id_tin: id_tin
            },
            success: function(data) {
                window.location.reload();
            }
        })
    });

    // ????ng b??n l???i
    $(document).on('click', '.cl_dbl', function() {
        var id_dbl = $(this).attr('data')
        $('.show_dbl .cldbanl').attr('data', id_dbl);
        $('.show_dbl').show();
    });

    $('.cldbanl').click(function() {
        var id_tindl = $(this).attr('data');
        $.ajax({
            type: 'POST',
            url: '/ajax/updata_tindaban.php',
            data: {
                id_tindl: id_tindl
            },
            success: function(d) {
                window.location.reload();
            }
        })
    });

    $(".tbao_dtin_tcong .luu_chung").click(function() {
        window.location.reload();
    });

    $(".vtri_utuyen").click(function() {
        var new_id = $(this).attr("data");
        var id_utuyen = $(this).attr("data1");
        var nha_tdung = $(this).attr("data2");
        $.ajax({
            url: '/ajax/ung_tuyen_vtri.php',
            type: 'POST',
            dataType: 'json',
            data: {
                new_id: new_id,
                id_utuyen: id_utuyen,
                nha_tdung: nha_tdung,
            },
            beforeSend: function() {
                $(".vtri_utuyen").prop('disabled', true);
            },
            success: function(data) {
                if (data.result == true) {
                    $(".tbao_dtin_tcong").find(".cau_tbao").text("B???n ???? ???ng tuy???n th??nh c??ng");
                    $(".tbao_dtin_tcong").find(".luu_chung").text("????ng");
                    $(".tbao_dtin_tcong").show();
                } else if (data.result == false) {
                    alert(data.msg);
                    $(".vtri_utuyen").prop('disabled', false);
                }
            }
        })
    });

    $('.btn-share').click(function() {
        $('.share_popup').toggle('visibility');
        $('.fb-share-button').toggle();
    });

    $('[name=fb_share]').click(function() {
        var url = window.location.href;
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
            'facebook-share-dialog',
            'width=800,height=600'
        );
        return false;
    });
    $('[name=tw_share]').click(function() {
        var url = window.location.href;
        window.open('https://twitter.com/share?text=&url=' + url);
        return false;
    });


    $(".clickCopy").click(function() {
        var url = window.location.href;
        copyToClipboard(url);
        $(".sao_chep_??an").show();
        setTimeout(() => {
            $(".sao_chep_??an").hide();
        }, 1500);
    });

    function copyToClipboard(e) {
        var tempItem = document.createElement('input');
        tempItem.setAttribute('type', 'text');
        tempItem.setAttribute('display', 'none');
        let content = e;
        if (e instanceof HTMLElement) {
            content = e.innerHTML;
        }
        tempItem.setAttribute('value', content);
        document.body.appendChild(tempItem);
        tempItem.select();
        document.execCommand('Copy');
        tempItem.parentElement.removeChild(tempItem);
    };
</script>
<script type="text/javascript">
    $(document).ready(function() {
        var img = '';
        var img1 = document.querySelector("#zoom_mess_0");
        const rotate = document.getElementById("rotate_mess");
        var mouseX1, mouseY1, mouseTX, mouseTY, startXOffset = 222.6665,
            startYOffset = 224.713,
            startX = 0,
            startY = 0,
            panning = !1;
        const ts = {
            scale: 1,
            rotate: 0,
            translate: {
                x: 0,
                y: 0
            }
        };
        img = img1;
        $('.slide_anh').each(function() {
            let a = `translate(${ts.translate.x}px,${ts.translate.y}px) scale(${ts.scale}) rotate(${ts.rotate}deg) translate3d(0,0,0)`;
            $(this).css('transform', a)
        });

        var stt = 0;
        startImg = $('.slide_anh:first').attr('stt');
        endImg = $('.slide_anh:last').attr('stt');
        $('.slide_anh').each(function() {
            if ($(this).is(':visible')) {
                stt = $(this).attr('stt');
            }
        });

        $('.next_slide').click(function() {
            if (stt == endImg) {
                stt = -1;
            }
            next = ++stt;
            console.log(next);
            $('.slide_anh').hide();
            img = document.querySelector("#zoom_mess_" + next);
            $('.slide_anh').eq(next).show();
            avr_img();
            reset();
        });


        $('.prev_slide').click(function() {
            if (stt == 0) {
                stt = endImg;
                prew = stt++;
            }
            prew = --stt;
            $('.slide_anh').hide();
            img = document.querySelector("#zoom_mess_" + prew);
            $('.slide_anh').eq(prew).show();
            avr_img();
            reset();
        });

        function setTransform() {
            let a = `translate(${ts.translate.x}px,${ts.translate.y}px) scale(${ts.scale}) rotate(${ts.rotate}deg) translate3d(0,0,0)`;
            img.style.transform = a
        };

        function reset() {
            ts.scale = 1, ts.rotate = 0, ts.translate = {
                x: 0,
                y: 0
            }, rotate.value = 180, img.style.transform = "none", $("#rotate_mess").attr('data-rotate', 90)
        };

        $(document).on('click', "#rotate_mess", function(a) {
            let rotate = $(this).attr('data-rotate')
            a.preventDefault(), ts.rotate = rotate, setTransform();
            if (rotate >= 360) {
                $(this).attr('data-rotate', 90);
            } else {
                $(this).attr('data-rotate', Number(rotate) + 90);
            }
        });

        function avr_img() {
            img.onwheel = function(a) {
                a.preventDefault();
                var e = img.onwheel;
                img.onwheel = null;
                let c = img.getBoundingClientRect(),
                    f = (a.clientX - c.x) / ts.scale,
                    g = (a.clientY - c.y) / ts.scale,
                    d = a.wheelDelta ? a.wheelDelta : -a.deltaY;

                ts.scale = d > 0 ? ts.scale + .2 : ts.scale - .2;
                let b = d > 0 ? .1 : -0.1;
                if (ts.scale < 0.5) {
                    ts.scale = 0.5
                }
                ts.translate.x += -f * b * 2 + img.offsetWidth * b, ts.translate.y += -g * b * 2 + img.offsetHeight * b, setTransform(), img.onwheel = e
            }, img.onmousedown = function(a) {
                a.preventDefault(), panning = !0, img.style.cursor = "grabbing", mouseX1 = a.clientX, mouseY1 = a.clientY, mouseTX = ts.translate.x, mouseTY = ts.translate.y
            }, img.onmouseup = function(a) {
                panning = !1, img.style.cursor = "grab"
            }, img.onmousemove = function(a) {
                a.preventDefault();
                let b = img.getBoundingClientRect();
                a.clientX, b.x, a.clientY, b.y;
                let c = a.clientX,
                    d = a.clientY;
                pointX = c - startX, pointY = d - startY, panning && (ts.translate.x = mouseTX + (c - mouseX1), ts.translate.y = mouseTY + (d - mouseY1), setTransform())
            }, setTransform();
        };

        img.onwheel = function(a) {
            a.preventDefault();
            var e = img.onwheel;
            img.onwheel = null;
            let c = img.getBoundingClientRect(),
                f = (a.clientX - c.x) / ts.scale,
                g = (a.clientY - c.y) / ts.scale,
                d = a.wheelDelta ? a.wheelDelta : -a.deltaY;

            ts.scale = d > 0 ? ts.scale + .2 : ts.scale - .2;
            let b = d > 0 ? .1 : -0.1;
            if (ts.scale < 0.5) {
                ts.scale = 0.5
            }
            ts.translate.x += -f * b * 2 + img.offsetWidth * b, ts.translate.y += -g * b * 2 + img.offsetHeight * b, setTransform(), img.onwheel = e
        }, img.onmousedown = function(a) {
            a.preventDefault(), panning = !0, img.style.cursor = "grabbing", mouseX1 = a.clientX, mouseY1 = a.clientY, mouseTX = ts.translate.x, mouseTY = ts.translate.y
        }, img.onmouseup = function(a) {
            panning = !1, img.style.cursor = "grab"
        }, img.onmousemove = function(a) {
            a.preventDefault();
            let b = img.getBoundingClientRect();
            a.clientX, b.x, a.clientY, b.y;
            let c = a.clientX,
                d = a.clientY;
            pointX = c - startX, pointY = d - startY, panning && (ts.translate.x = mouseTX + (c - mouseX1), ts.translate.y = mouseTY + (d - mouseY1), setTransform())
        }, setTransform();
    });
    // zoom anh chi tiet tin dang
</script>