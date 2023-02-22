<?
include("../includes/inc_new/icon.php");
include("config.php");


$kv = 1;
$catid = getValue("catid", "int", "GET", 0);

$catid = (int)$catid;

$citid = getValue("city", "int", "GET", 0);
$citid = (int)$citid;
$new_tit   = getValue("sp", "str", "GET", "");
$new_tit   = replaceMQ($new_tit);
$new_tit   = strip_tags($new_tit);
$s_tit     = $new_tit;
$new_tit   = str_replace("-", " ", $new_tit);
$new_tit = str_replace("     ", " ", $new_tit);
$new_tit = str_replace("    ", " ", $new_tit);
$new_tit = str_replace("   ", " ", $new_tit);
$new_tit = str_replace("  ", " ", $new_tit);
$new_tit = trim($new_tit);

// đếm lượng tìm kiếm
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $this_time = time();

    $qr_search = new db_query("SELECT `key_search`,`id` FROM `search` WHERE key_search = '" . $new_tit . "' AND `buy_sell` = 2 ");
    $lis_search_count = mysql_num_rows($qr_search->result);
    $lis_search = mysql_fetch_assoc($qr_search->result);
    $this_id = $lis_search['id'];

    if ($new_tit !== '') {
        if ($lis_search_count == 0) {
            $query_dt = new db_query("INSERT INTO `search`(`key_search`, `user_id`, `created_at`, `buy_sell`) VALUES ('$new_tit','$us_id','$this_time','2')");
        } else {
            $query_up = new db_query("UPDATE  `search` SET  `count_search` = count_search+1 WHERE id=" . $this_id . " AND `buy_sell` = 2 ");
        }
    };
    $cou_ussearch = new db_query("SELECT COUNT(`id`) AS cou_us FROM `search` WHERE `user_id` = $us_id AND `buy_sell` = 2 ");
    $cou_uss = mysql_fetch_assoc($cou_ussearch->result)['cou_us'];
    if ($cou_uss > 10) {
        $xoa_bo = $cou_uss - 10;
        $dele_tkhoa = new db_query("DELETE FROM `search` WHERE `user_id` = $us_id AND `buy_sell` = 2 ORDER BY `count_search` ASC LIMIT $xoa_bo ");
    }
}

$qr_search_popular = new db_query("SELECT `search_key`,`id` FROM `search_popular` WHERE search_key = '" . $new_tit . "'");
$lis_search_count_popular = mysql_num_rows($qr_search_popular->result);
$lis_search_popular = mysql_fetch_assoc($qr_search_popular->result);
$this_id_popular = $lis_search_popular['id'];
if ($new_tit !== '') {
    if ($lis_search_count_popular == 0) {
        $query_insert = new db_query("INSERT INTO `search_popular`(`search_key`, `buy_sell`) VALUES ('$new_tit', '2')");
    } else {
        $query_update = new db_query("UPDATE  `search_popular` SET  `count_num` = count_num+1 WHERE id=" . $this_id_popular . " AND `buy_sell` = 2 ");
    }
};

$cou_ussearch1 = new db_query("SELECT COUNT(`id`) AS cou_us1 FROM `search_popular` WHERE `buy_sell` = 2 ");
$cou_uss1 = mysql_fetch_assoc($cou_ussearch1->result)['cou_us1'];
if ($cou_uss > 10) {
    $xoa_bo = $cou_uss1 - 10;
    $dele_tkhoa = new db_query("DELETE FROM `search_popular` WHERE `buy_sell` = 2 ORDER BY `count_num` ASC LIMIT $xoa_bo ");
};
// end đếm

$tags_id = getValue('tags', 'int', 'GET', 0);
$tags_id = (int)$tags_id;

$ten_tags = $tags_tk1[$tags_id];

$nn = getValue('nn', 'int', 'GET', 0);
$nn = (int)$nn;

$tennganhnghe = $db_cat_vl[$nn];

$tagsvl = getValue('tagsvl', 'int', 'GET', 0);
$tagsvl = (int)$tagsvl;

$ten_tags_vl = $db_tags_vl[$tagsvl];

$sql = '';
$ord = '';

$district = getValue("district", "int", "GET", 0);
$district = (int)$district;

$ward = getValue("ward", "int", "GET", 0);
$ward = (int)$ward;

$price = getValue("gia_bd", "int", "GET", "");
$price = (int)$price;
if ($price != '') {
    $sql .= " AND new_money >= $price ";
}

$price_den = getValue("gia_kt", "int", "GET", "");
$price_den = (int)$price_den;
if ($price_den != '') {
    $sql .= " AND new_money <= $price_den ";
}

////MAY TINH DE BAN
$hang = getValue("hang", "int", "GET", "");
$hang = (int)$hang;
if ($hang > 0) {
    $sql .= " AND hang = '$hang' ";
}
$dong = getValue("dong", "str", "GET", "");
if ($dong != "") {
    $sql .= " AND dong_may = '$dong' ";
}

$bo_vixuly = getValue("bo_vixuly", "int", "GET", "");
$bo_vixuly = (int)$bo_vixuly;
if ($bo_vixuly > 0) {
    $sql .= " AND bovi_xuly = '$bo_vixuly' ";
}

$ram = getValue("ram", "int", "GET", "");
$ram = (int)$ram;
if ($ram > 0) {
    $sql .= " AND ram = '$ram' ";
}

$o_cung = getValue("o_cung", "int", "GET", "");
$o_cung = (int)$o_cung;
if ($o_cung > 0) {
    $sql .= " AND o_cung = '$o_cung' ";
}

$loai_ocung = getValue("loai_ocung", "int", "GET", "");
$loai_ocung = (int)$loai_ocung;
if ($loai_ocung > 0) {
    $sql .= " AND loai_o_cung = '$loai_ocung' ";
}

$card_manhinh = getValue("card_manhinh", "int", "GET", "");
$card_manhinh = (int)$card_manhinh;
if ($card_manhinh > 0) {
    $sql .= " AND man_hinh = '$card_manhinh' ";
}

$kichco_manhinh = getValue("kichco_manhinh", "int", "GET", "");
$kichco_manhinh = (int)$kichco_manhinh;
if ($kichco_manhinh > 0) {
    $sql .= " AND kich_co = '$kichco_manhinh' ";
}

$bao_hanh = getValue("bao_hanh", "int", "GET", "");
$bao_hanh = (int)$bao_hanh;
if ($bao_hanh > 0) {
    $sql .= " AND new_baohanh = '$bao_hanh' ";
}

$tinh_trang = getValue("tinh_trang", "int", "GET", "");
$tinh_trang = (int)$tinh_trang;
if ($tinh_trang > 0) {
    $sql .= " AND new_tinhtrang = '$tinh_trang' ";
}
//MAY anh may quay
$thiet_bi = getValue("thiet_bi", "int", "GET", "");
$thiet_bi = (int)$thiet_bi;
if ($thiet_bi > 0) {
    $sql .= " AND thiet_bi = '$thiet_bi' ";
}
$hang6 = getValue("hang6", "str", "GET", "");
if ($hang6 != 0) {
    $sql .= " AND hang = '$hang6' ";
}
//ĐTDĐ
$dung_luong = getValue("dung_luong", "int", "GET", "");
$dung_luong = (int)$dung_luong;
if ($dung_luong > 0) {
    $sql .= " AND dung_luong = '$dung_luong' ";
}

$mau_sac = getValue("mau_sac", "int", "GET", "");
$mau_sac = (int)$mau_sac;
if ($mau_sac > 0) {
    $sql .= " AND mau_sac = '$mau_sac' ";
}
//Máy tính bảng
$sudung_sim = getValue("sudung_sim", "int", "GET", "");
$sudung_sim = (int)$sudung_sim;
if ($sudung_sim > 0) {
    $sql .= " AND sdung_sim = '$sudung_sim' ";
}
//Loa amply tivi
$loai = getValue("loai", "int", "GET", "");
$loai = (int)$loai;
if ($loai > 0) {
    $sql .= " AND loai_chung = '$loai' ";
}

$ketnoi_internet = getValue("ketnoi_internet", "int", "GET", "");
$ketnoi_internet = (int)$ketnoi_internet;
if ($ketnoi_internet > 0) {
    $sql .= " AND knoi_internet = '$ketnoi_internet' ";
}

$phukien_linhkien = getValue("phukien_linhkien", "int", "GET", "");
$phukien_linhkien = (int)$phukien_linhkien;
if ($phukien_linhkien > 0) {
    $sql .= " AND link_kien_phu_kien = '$phukien_linhkien' ";
}

//xedap
$chat_lieu_khung = getValue("chat_lieu_khung", "int", "GET", "");
$chat_lieu_khung = (int)$chat_lieu_khung;
if ($chat_lieu_khung > 0) {
    $sql .= " AND chat_lieu_khung = '$chat_lieu_khung' ";
}

$xuat_xu = getValue("xuat_xu", "int", "GET", "");
$xuat_xu = (int)$xuat_xu;
if ($xuat_xu > 0) {
    $sql .= " AND xuat_xu = '$xuat_xu' ";
}

$dong_xe = getValue("dong_xe", "int", "GET", "");
$dong_xe = (int)$dong_xe;
if ($dong_xe > 0) {
    $sql .= " AND dong_xe = '$dong_xe' ";
}

$loai_xe = getValue("loai_xe", "int", "GET", "");
$loai_xe = (int)$loai_xe;
if ($loai_xe > 0) {
    $sql .= " AND loai_xe = '$loai_xe' ";
}

//xemays
$nam_san_xuat = getValue("nam_san_xuat", "int", "GET", "");
$nam_san_xuat = (int)$nam_san_xuat;
if ($nam_san_xuat > 0) {
    $sql .= " AND nam_san_xuat = '$nam_san_xuat' ";
}

$dung_tich = getValue("dung_tich", "int", "GET", "");
$dung_tich = (int)$dung_tich;
if ($dung_tich > 0) {
    $sql .= " AND dung_tich = '$dung_tich' ";
}
//oto
$nhien_lieu  = getValue("nhien_lieu", "int", "GET", "");
$nhien_lieu  = (int)$nhien_lieu;
if ($nhien_lieu > 0) {
    $sql .= " AND nhien_lieu = '$nhien_lieu' ";
}

$so_cho  = getValue("so_cho", "int", "GET", "");
$so_cho  = (int)$so_cho;
if ($so_cho > 0) {
    $sql .= " AND so_cho = '$so_cho' ";
}

$kieu_dang  = getValue("kieu_dang", "int", "GET", "");
$kieu_dang  = (int)$kieu_dang;
if ($kieu_dang > 0) {
    $sql .= " AND kieu_dang = '$kieu_dang' ";
}

$hop_so  = getValue("hop_so", "int", "GET", "");
$hop_so  = (int)$hop_so;
if ($hop_so > 0) {
    $sql .= " AND hop_so = '$hop_so' ";
}
//xe tải xe khác
$trong_tai  = getValue("trong_tai", "int", "GET", "");
$trong_tai  = (int)$trong_tai;
if ($trong_tai > 0) {
    $sql .= " AND trong_tai = '$trong_tai' ";
}
//phụ tùng xe
$loai_phu_tung  = getValue("loai_phu_tung", "int", "GET", "");
$loai_phu_tung  = (int)$loai_phu_tung;
if ($loai_phu_tung > 0) {
    $sql .= " AND loai_phu_tung = '$loai_phu_tung' ";
}
//xe ddapj,maý ddienej
$dong_co  = getValue("dong_co", "int", "GET", "");
$dong_co  = (int)$dong_co;
if ($dong_co > 0) {
    $sql .= " AND dong_co = '$dong_co' ";
}
//nội thất oto
$loai_noithat  = getValue("loai_noithat", "int", "GET", "");
$loai_noithat  = (int)$loai_noithat;
if ($loai_noithat > 0) {
    $sql .= " AND loai_noithat = '$loai_noithat' ";
}

//BĐS-NHÀ ĐẤT
$dien_tich = getValue("dien_tich", "str", "GET", "");
if ($dien_tich != "") {
    $sql .= " AND dien_tich = '$dien_tich' ";
}

$ten_toa_nha = getValue("ten_toa_nha", "str", "GET", "");
if ($ten_toa_nha != "") {
    $sql .= " AND ten_toa_nha LIKE '%" . $ten_toa_nha . "%' ";
}

$tinh_trang_noi_that  = getValue("tinh_trang_noi_that", "int", "GET", "");
$tinh_trang_noi_that  = (int)$tinh_trang_noi_that;
if ($tinh_trang_noi_that > 0) {
    $sql .= " AND tinh_trang_noi_that = '$tinh_trang_noi_that' ";
}

$so_pngu  = getValue("so_pngu", "int", "GET", "");
$so_pngu  = (int)$so_pngu;
if ($so_pngu > 0) {
    $sql .= " AND so_pngu = '$so_pngu' ";
}

$so_pve_sinh  = getValue("so_pve_sinh", "int", "GET", "");
$so_pve_sinh  = (int)$so_pve_sinh;
if ($so_pve_sinh > 0) {
    $sql .= " AND so_pve_sinh = '$so_pve_sinh' ";
}

$tong_so_tang  = getValue("tong_so_tang", "int", "GET", "");
$tong_so_tang  = (int)$tong_so_tang;
if ($tong_so_tang > 0) {
    $sql .= " AND tong_so_tang = '$tong_so_tang' ";
}

$huong_chinh  = getValue("huong_chinh", "int", "GET", "");
$huong_chinh  = (int)$huong_chinh;
if ($huong_chinh > 0) {
    $sql .= " AND huong_chinh = '$huong_chinh' ";
}

$giay_to_phap_ly  = getValue("giay_to_phap_ly", "int", "GET", "");
$giay_to_phap_ly  = (int)$giay_to_phap_ly;
if ($giay_to_phap_ly > 0) {
    $sql .= " AND giay_to_phap_ly = '$giay_to_phap_ly' ";
}

$can_ban_mua  = getValue("can_ban_mua", "int", "GET", "");
$can_ban_mua  = (int)$can_ban_mua;
if ($can_ban_mua > 0) {
    $sql .= " AND can_ban_mua = '$can_ban_mua' ";
}

//BĐS-ĐẤT
$chieu_dai = getValue("chieu_dai", "str", "GET", "");
if ($chieu_dai != "") {
    $sql .= " AND chieu_dai = '$chieu_dai' ";
}

$chieu_rong = getValue("chieu_rong", "str", "GET", "");
if ($chieu_rong != "") {
    $sql .= " AND chieu_rong = '$chieu_rong' ";
}

$loai_hinh_dat  = getValue("loai_hinh_dat", "int", "GET", "");
$loai_hinh_dat  = (int)$loai_hinh_dat;
if ($loai_hinh_dat > 0) {
    $sql .= " AND loai_hinh_dat = '$loai_hinh_dat' ";
}

//BDS-CUAHANG
$tang_so = getValue("tang_so", "str", "GET", "");
if ($tang_so != "") {
    $sql .= " AND tang_so = '$tang_so' ";
}
//BDS-CHUNGCU
$loai_hinh_canho  = getValue("loai_hinh_canho", "int", "GET", "");
$loai_hinh_canho  = (int)$loai_hinh_canho;
if ($loai_hinh_canho > 0) {
    $sql .= " AND loai_hinh_canho = '$loai_hinh_canho' ";
}
//Ship
$thanhpho  = getValue("thanhpho", "int", "GET", "");
$thanhpho  = (int)$thanhpho;
if ($thanhpho > 0) {
    $sql .= " AND new_city = '$thanhpho' ";
}

$quanhuyen  = getValue("quanhuyen", "int", "GET", "");
$quanhuyen  = (int)$quanhuyen;
if ($quanhuyen > 0) {
    $sql .= " AND quan_huyen = '$quanhuyen' ";
}

$loai_hang_hoa  = getValue("loai_hang_hoa", "int", "GET", "");
$loai_hang_hoa  = (int)$loai_hang_hoa;
if ($loai_hang_hoa > 0) {
    $sql .= " AND loai_hang_hoa = '$loai_hang_hoa' ";
}

//ĐỒ GIA DỤNG-TBĐIEN LANH
$khoi_luong  = getValue("khoi_luong", "int", "GET", "");
$khoi_luong  = (int)$khoi_luong;
if ($khoi_luong > 0) {
    $sql .= " AND khoi_luong = '$khoi_luong' ";
}

$cong_suat  = getValue("cong_suat", "int", "GET", "");
$cong_suat  = (int)$cong_suat;
if ($cong_suat > 0) {
    $sql .= " AND cong_suat = '$cong_suat' ";
}

$loai_thiet_bi  = getValue("loai_thiet_bi", "int", "GET", "");
$loai_thiet_bi  = (int)$loai_thiet_bi;
if ($loai_thiet_bi > 0) {
    $sql .= " AND loai_thiet_bi = '$loai_thiet_bi' ";
}
$loai_sanpham  = getValue("loai_sanpham", "int", "GET", "");
$loai_sanpham  = (int)$loai_sanpham;
if ($loai_sanpham > 0) {
    $sql .= " AND loai_sanpham = '$loai_sanpham' ";
}

//my pham
$loai_hinh_sp  = getValue("loai_hinh_sp", "int", "GET", "");
$loai_hinh_sp  = (int)$loai_hinh_sp;
if ($loai_hinh_sp > 0) {
    $sql .= " AND loai_hinh_sp = '$loai_hinh_sp' ";
}

$han_su_dung = getValue("han_su_dung", "str", "GET", "");
$exp = strtotime($han_su_dung);
if ($han_su_dung != "") {
    $sql .= " AND han_su_dung = '$exp' ";
}
//Vattu yte
$hang_vattu = getValue("hang_vattu", "str", "GET", "");
if ($hang_vattu != "") {
    $sql .= " AND hang_vattu LIKE '%" . $hang_vattu . "%' ";
}

//Nội thất phòng khách,ngủ
$nhom_sanpham  = getValue("nhom_sanpham", "int", "GET", "");
$nhom_sanpham  = (int)$nhom_sanpham;
if ($nhom_sanpham > 0) {
    $sql .= " AND nhom_sanpham = '$nhom_sanpham' ";
}

$hinhdang  = getValue("hinhdang", "int", "GET", "");
$hinhdang  = (int)$hinhdang;
if ($hinhdang > 0) {
    $sql .= " AND hinhdang = '$hinhdang' ";
}

$chat_lieu  = getValue("chat_lieu", "int", "GET", "");
$chat_lieu  = (int)$chat_lieu;
if ($chat_lieu > 0) {
    $sql .= " AND chat_lieu = '$chat_lieu' ";
}

//thú cung
$giong_thu_cung  = getValue("giong_thu_cung", "int", "GET", "");
$giong_thu_cung  = (int)$giong_thu_cung;
if ($giong_thu_cung > 0) {
    $sql .= " AND giong_thu_cung = '$giong_thu_cung' ";
}

$do_tuoi  = getValue("do_tuoi", "int", "GET", "");
$do_tuoi  = (int)$do_tuoi;
if ($do_tuoi > 0) {
    $sql .= " AND do_tuoi = '$do_tuoi' ";
}

$gioi_tinh  = getValue("gioi_tinh", "int", "GET", "");
$gioi_tinh  = (int)$gioi_tinh;
if ($gioi_tinh > 0) {
    $sql .= " AND gioi_tinh = '$gioi_tinh' ";
}

//tcung khac
$kichco = getValue("kichco", "str", "GET", "");
if ($kichco != "") {
    $sql .= " AND kich_co LIKE '%" . $kichco . "%' ";
}
$do_tuoi_thucungkhac = getValue("do_tuoi_thucungkhac", "str", "GET", "");
if ($do_tuoi_thucungkhac != "") {
    $sql .= " AND do_tuoi LIKE '%" . $do_tuoi_thucungkhac . "%' ";
}

//THE THAO
$loai75 = getValue("loai75", "str", "GET", "");
if ($loai75 != "") {
    $sql .= " AND loai_chung LIKE '%" . $loai75 . "%' ";
}

$mon_the_thao  = getValue("mon_the_thao", "int", "GET", "");
$mon_the_thao  = (int)$mon_the_thao;
if ($mon_the_thao > 0) {
    $sql .= " AND mon_the_thao = '$mon_the_thao' ";
}


// tim kiem danh muc
if ($catid == 0) {
    $catname = "";
} else {
    $catname = $db_cat[$catid]['cat_name'];
}

if ($citid == 0) {
    $citname = "";
} else {
    $citname = $arrcity[$citid]['cit_name'];
}

if ($district == 0) {
    $districtname = "";
} else {
    $districtname = $arrcity2[$district]['cit_name'];
    $sql .= " AND quan_huyen = '$district' ";
}

$db_qrr3 = new db_query("SELECT * FROM phuong_xa ");
$arrcity3 = $db_qrr3->result_array('id');
if ($ward == 0) {
    $wardname = "";
} else {
    $wardname = $arrcity3[$ward]['name'];
    $sql .= " AND phuong_xa = '$ward' ";
}

if ($new_tit != "") {
    $sql .= " AND new_title LIKE '%" . $new_tit . "%' ";
}

if ($tags_id != 0) {
    $sql .= " AND `new_ctiet_dmuc` = $tags_id  ";
}

if ($tagsvl != 0) {
    $sql .= " AND `new_ctiet_dmuc` = $tagsvl AND `new_cate_id` = 120 ";
}


if ($nn != 0) {
    $sql .= " AND new_job_type = $nn ";
}

$db_qrcat = new db_query("SELECT cat_parent_id,cat_name,cat_id FROM category WHERE cat_id = " . $catid . " LIMIT 1");
$rowcat = mysql_fetch_assoc($db_qrcat->result);
$cat_parent_id = $rowcat['cat_parent_id'];
$urlcat = "https://raonhanh365.vn" . rewrite_page_1($catid, $catname, $citid, $citname, $s_tit, $nn, $tennganhnghe, $tags_id, $ten_tags, $tagsvl, $ten_tags_vl);

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];
}

// seo
if ($s_tit != "" && $citid == 0 && $catid == 0 && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
    $title = "Mua bán " . $new_tit;
    $desc = "Danh sách tin mua bán " . $new_tit . " rao vặt trên toàn quốc tại Raonhanh365.vn";
    $key =  $new_tit;
} else if ($s_tit != "" && $citid != 0 && $catid == 0 && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
    $title = "Mua bán " . $new_tit . " tại " . $citname;
    $desc = "Danh sách tin mua bán " . $new_tit . " tại " . $citname . " rao vặt trên toàn quốc tại Raonhanh365.vn";
    $key =  $new_tit . " tại " . $citname;
} else if ($s_tit != "" && $citid == 0 && $catid != 0 && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
    $title = "Mua bán " . $new_tit . " thuộc " . $catname;
    $desc = "Danh sách tin mua bán " . $new_tit . " thuộc " . $catname . " rao vặt trên toàn quốc tại Raonhanh365.vn";
    $key =  $new_tit . " thuộc " . $catname;
} else if ($s_tit != "" && $citid != 0 && $catid != 0 && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
    $title = "Mua bán " . $new_tit . " thuộc " . $catname . " tại " . $citname;
    $desc = "Danh sách tin mua bán " . $new_tit . " thuộc " . $catname . " tại " . $citname . " rao vặt trên toàn quốc tại Raonhanh365.vn";
    $key =  $new_tit . " thuộc " . $catname . " tại " . $citname;
} else if ($catid != 0 && $citid == 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
    if ($catid != 120) {
        $title = "Rao vặt " . mb_strtolower($catname, 'UTF-8') . " giá rẻ cập nhật hàng giờ - raonhanh365";
        $desc = "Rao vặt " . $rowcat['cat_name'] . " - kênh thông tin về " . mb_strtolower($catname, 'UTF-8') . " giá rẻ. Bạn có thể rao vặt " . $catname . " nhanh chóng kể cả sản phẩm cũ và mới giúp tiếp cận khách hàng hiệu quả nhất, đồng thời raonhanh365 còn là nơi đáng tin cậy để bạn có thể mua hàng với những gian hàng quảng cáo " . $catname . " đã được xác minh cập nhật 24/24.";
        $key = "Rao vặt " . mb_strtolower($catname, 'UTF-8') . "," . mb_strtolower($catname, 'UTF-8') . ", mua bán " . mb_strtolower($catname, 'UTF-8') . "";
    } else if ($catid == 120) {
        $title = "Tìm Việc Làm Nhanh & Tuyển Dụng Hiệu Quả | Raonhanh365";
        $desc = "Tìm việc làm mới nhất lương cao, hấp dẫn từ những nhà tuyển dụng hàng đầu. Danh sách việc làm lương cao từ các công ty được tổng hợp tại Raonhanh365.vn";
        $key = "việc làm, tìm việc làm, tìm việc, tìm việc làm nhanh, tuyển dụng, tuyển dụng việc làm, việc làm nhanh";
    }
} else if ($catid == 0 && $citid != 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
    $title = "Mạng xã hội mua bán rao vặt miễn phí tại " . $citname . " | Raonhanh365.vn";
    $desc = "Mạng xã hội Rao vặt miễn phí tại " . $citname . " với hệ thống cập nhật liên tục hàng ngàn các tin mua bán mỗi ngày, rao vặt " . $citname . " trên các gian hàng uy tín được xác thực tại website Raonhanh365.vn, " . $citname . " rao vặt đồ cũ giá rẻ cần là có";
    $key =  "mua bán " . $citname . ", rao vặt " . $citname . ", rao vặt tại " . $citname . ", quảng cáo tại " . $citname . " , đăng tin mua bán " . $citname . ", quảng cáo " . $citname;
} else if ($catid != 0 && $citid != 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
    $title = "Mua bán rao vặt " . $catname . " Tại " . $citname . " hiệu quả, giá tốt";
    $desc = "Mua bán " . $catname . " tại " . $citname . " - Raonhanh365.vn là mạng xã hội mua bán rao vặt miễn phí các tin " . $catname . " tại " . $citname . " mang lại sự tiện lợi cho người mua và người bán với môi trường kinh doanh cạnh tranh công bằng, rao vặt " . $catname . " tại " . $citname . " ở raonhanh365 bạn sẽ gia tăng doanh thu đáng kể và tìm được mặt hàng ưng ý.";
    $key = "rao vặt " . $catname . " tại " . $citname . ", " . $catname . " tại " . $citname . ", mua bán " . $catname . " tại " . $citname . ", rao vặt, mua bán " . $citname . "";
} else if ($tags_id != 0 && $citid != 0 && $s_tit == "" && $catid == 0 && $tagsvl == 0 && $nn == 0) {
    $title = "Mua bán rao vặt " . $ten_tags . " Tại " . $citname . " hiệu quả, giá tốt";
    $desc = "Mua bán " . $ten_tags . " tại " . $citname . " - Raonhanh365.vn là mạng xã hội mua bán rao vặt miễn phí các tin " . $ten_tags . " tại " . $citname . " mang lại sự tiện lợi cho người mua và người bán với môi trường kinh doanh cạnh tranh công bằng, rao vặt " . $ten_tags . " tại " . $citname . " ở raonhanh365 bạn sẽ gia tăng doanh thu đáng kể và tìm được mặt hàng ưng ý.";
    $key = "rao vặt " . $ten_tags . " tại " . $citname . ", " . $ten_tags . " tại " . $citname . ", mua bán " . $ten_tags . " tại " . $citname . ", rao vặt, mua bán " . $citname . "";
} else if ($tags_id != 0 && $citid == 0 && $s_tit == "" && $catid == 0 && $tagsvl == 0 && $nn == 0) {
    $title = "Rao vặt " . mb_strtolower($ten_tags, 'UTF-8') . " giá rẻ cập nhật hàng giờ - raonhanh365";
    $desc = "Rao vặt " . $ten_tags . " - kênh thông tin về " . mb_strtolower($ten_tags, 'UTF-8') . " giá rẻ. Bạn có thể rao vặt " . $ten_tags . " nhanh chóng kể cả sản phẩm cũ và mới giúp tiếp cận khách hàng hiệu quả nhất, đồng thời raonhanh365 còn là nơi đáng tin cậy để bạn có thể mua hàng với những gian hàng quảng cáo " . $ten_tags . " đã được xác minh cập nhật 24/24.";
    $key = "Rao vặt " . mb_strtolower($ten_tags, 'UTF-8') . "," . mb_strtolower($ten_tags, 'UTF-8') . ", mua bán " . mb_strtolower($ten_tags, 'UTF-8') . "";
} else if ($tagsvl != 0 && $citid == 0 && $s_tit == "" && $catid == 0 && $tags_id == 0 && $nn == 0) {
    if (in_array($tagsvl, $tagsnnghe_cvl)) {
        $title = ucfirst($ten_tags_vl) . " mới nhất - " . date('m', time()) . "/" . date('Y', time());
        $desc = "Danh sách " . $ten_tags_vl . " mới nhất được cập nhật thường xuyên và liên tục trên Raonhanh365. Tin tuyển dụng " . $ten_tags_vl . " lương cao - " . date('m', time()) . "/" . date('Y', time());
        $key = $ten_tags_vl . ", tìm " . $ten_tags_vl;
    } else {
        $title = "Việc làm " . $ten_tags_vl . " mới nhất - " . date('m', time()) . "/" . date('Y', time());
        $desc = "Danh sách việc làm " . $ten_tags_vl . " mới nhất được cập nhật thường xuyên và liên tục trên Raonhanh365. Tin tuyển dụng việc làm " . $ten_tags_vl . " lương cao - " . date('m', time()) . "/" . date('Y', time());
        $key = "việc làm " . $ten_tags_vl . ", tìm việc làm " . $ten_tags_vl;
    }
} else if ($tagsvl != 0 && $citid != 0 && $s_tit == "" && $catid == 0 && $tags_id == 0 && $nn == 0) {
    if (in_array($tagsvl, $tagsnnghe_cvl)) {
        $title = ucfirst($ten_tags_vl) . " tại " . $citname . " mới nhất  - " . date('m', time()) . "/" . date('Y', time());
        $desc = "Danh sách " . $ten_tags_vl . " mới nhất được cập nhật thường xuyên và liên tục trên Raonhanh365. Tin tuyển dụng " . $ten_tags_vl . " lương cao - " . date('m', time()) . "/" . date('Y', time());
        $key = $ten_tags_vl . ", tìm " . $ten_tags_vl;
    } else {
        $title = "Việc làm " . $ten_tags_vl . " tại " . $citname . " mới nhất - " . date('m', time()) . "/" . date('Y', time());
        $desc = "Danh sách việc làm " . $ten_tags_vl . " tại " . $citname . " mới nhất được cập nhật thường xuyên và liên tục trên Raonhanh365. Tin tuyển dụng việc làm " . $ten_tags_vl . " tại " . $citname . " lương cao - " . date('m', time()) . "/" . date('Y', time());
        $key = "việc làm " . $ten_tags_vl . " tại " . $citname . ", tìm việc làm " . $ten_tags_vl . " tại " . $citname;
    }
} else if ($nn != 0 && $citid == 0 && $s_tit == "" && $catid == 0 && $tags_id == 0 && $tagsvl == 0) {
    if ($nn == 87) {
        $title = "Tuyển dụng, tìm việc làm thêm - " . date('m', time()) . "/" . date('Y', time());
        $desc = "Danh sách việc làm thêm mới nhất được cập nhật thường xuyên và liên tục trên Raonhanh365. Tin tuyển dụng việc làm thêm lương cao - " . date('m', time()) . "/" . date('Y', time());
        $key = "việc làm thêm";
    } else if ($nn == 83 || $nn == 79 || $nn == 10) {
        $title = "Tuyển dụng, tìm " . $tennganhnghe . "-" . date('m', time()) . " / " . date('Y', time());
        $desc = "Danh sách " . $tennganhnghe . " mới nhất được cập nhật thường xuyên và liên tục trên Raonhanh365. Tin tuyển dụng việc làm " . $tennganhnghe . " lương cao - " . date('m', time()) . "/" . date('Y', time());
        $key = $tennganhnghe;
    } else {
        $title = "Tuyển dụng, tìm việc làm " . $tennganhnghe . "- " . date('m', time()) . "/" . date('Y', time());
        $desc = "Danh sách việc làm " . $tennganhnghe . " mới nhất được cập nhật thường xuyên và liên tục trên Raonhanh365. Tin tuyển dụng việc làm " . $tennganhnghe . " lương cao - " . date('m', time()) . "/" . date('Y', time());
        $key = "việc làm " . $tennganhnghe;
    };
} else if ($nn != 0 && $citid != 0 && $s_tit == "" && $catid == 0 && $tags_id == 0 && $tagsvl == 0) {
    $title = "Tuyển dụng, tìm việc làm tại " . $citname . " - " . date('m', time()) . "/" . date('Y', time());
    $desc = "Việc làm tại " . $citname . " mới nhất được cập nhật trên Raonhanh365. Danh sách tin tuyển dụng việc làm " . $citname . "  lương cao cập nhật thường xuyên và liên tục.";
    $key = "tìm việc làm tại " . $citname . ", việc làm tại " . $citname;
};

if ($catid == 0 && $citid == 0) {
    $db_qra = new db_query("SELECT new.`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_ctiet_dmuc`,`new_city`, `dia_chi`, `new_money`, `gia_kt`,
                            `new_unit`, `new_image`, `chotang_mphi`, `new_user_id`, `new_type`, `new_create_time`, `new_update_time`, `new_active`
                            FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id
                            LEFT JOIN new_description ON new.new_id = new_description.new_id
                            INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                            WHERE new_buy_sell = 2 and new_active = 1 " . $sql . " ORDER BY new_pin_cate DESC, new_update_time DESC ");

    $numrow = new db_query("SELECT count(1) FROM new LEFT JOIN new_description ON new.new_id = new_description.new_id
                            LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 " . $sql . "");
} else if ($catid != 0 && $citid == 0) {
    if ($rowcat['cat_parent_id'] == 0) {
        $cauqr = "(new_cate_id = " . $catid . " OR cat_parent_id = " . $catid . ")";
    } else {
        $cauqr = "new_cate_id = " . $catid . "";
    }

    $db_qra = new db_query("SELECT new.`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_ctiet_dmuc`,`new_city`, `dia_chi`, `new_money`, `gia_kt`,
                            `new_unit`, `new_image`, `chotang_mphi`, `new_user_id`, `new_type`, `new_create_time`, `new_update_time`, `new_active`  FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id
                            LEFT JOIN new_description ON new.new_id = new_description.new_id
                            INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                            WHERE new_buy_sell = 2 AND new_active = 1 " . $sql . "  AND " . $cauqr . " ORDER BY new_pin_cate DESC,
                            new_update_time DESC");

    $numrow = new db_query("SELECT count(1) FROM new LEFT JOIN new_description ON new.new_id = new_description.new_id LEFT JOIN category
                            ON new.new_cate_id = category.cat_id WHERE new_active = 1 " . $sql . " AND " . $cauqr . " ");
} else if ($catid == 0 && $citid != 0) {
    $db_qra = new db_query("SELECT new.`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_ctiet_dmuc`,`new_city`, `dia_chi`, `new_money`, `gia_kt`,
                            `new_unit`, `new_image`, `chotang_mphi`, `new_user_id`, `new_type`, `new_create_time`, `new_update_time`, `new_active`  FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id
                            LEFT JOIN new_description ON new.new_id = new_description.new_id
                            INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                            WHERE new_buy_sell = 2 AND new_active = 1 AND new_city = " . $citid . " " . $sql . " ORDER BY new_pin_cate DESC, new_update_time DESC");

    $numrow = new db_query("SELECT count(1) FROM new LEFT JOIN new_description ON new.new_id = new_description.new_id
                            LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 AND new_city = " . $citid . " " . $sql . "");
} else if ($catid != 0 && $citid != 0) {
    if ($rowcat['cat_parent_id'] == 0) {
        $cauqr = "(new_cate_id = " . $catid . " OR cat_parent_id = " . $catid . ")";
    } else {
        $cauqr = "new_cate_id = " . $catid . "";
    }

    $db_qra = new db_query("SELECT new.`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_ctiet_dmuc`,`new_city`, `dia_chi`, `new_money`, `gia_kt`,
                            `new_unit`, `new_image`, `chotang_mphi`, `new_user_id`, `new_type`, `new_create_time`, `new_update_time`, `new_active`  FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id
                            LEFT JOIN new_description ON new.new_id = new_description.new_id
                            INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                            WHERE new_buy_sell = 2 AND new_active = 1 " . $sql . " AND new_city = " . $citid . "  AND " . $cauqr . " ORDER BY new_update_time DESC");

    $numrow = new db_query("SELECT count(1) FROM new LEFT JOIN new_description ON new.new_id = new_description.new_id LEFT JOIN category
                            ON new.new_cate_id = category.cat_id WHERE new_active = 1 " . $sql . " AND new_city = " . $citid . "  AND " . $cauqr . " ");
}


?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title><?= $title ?></title>
    <meta name="keywords" content="<?= $key ?>" />
    <meta name="description" content="<?= $desc ?>" />
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:description" content="<?= $desc ?>" />
    <meta property="og:url" content="<?= $urlcat ?>" />
    <meta name="language" content="vietnamese" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="<?= $title ?>" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-language" itemprop="inLanguage" content="vi" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="/" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />

    <link rel="canonical" href="<?= $urlcat ?>" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link type="text/css" rel="stylesheet" href="/css/style_new/giai_dap.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
</head>

<body>
    <input type="hidden" class="cat_parent_id" value="<?= ($cat_parent_id != "") ? $cat_parent_id : '0' ?>">
    <input type="hidden" class="cat_child_id" value="<?= ($catid != "") ? $catid : '0' ?>">

    <? include("../includes/common/inc_header.php"); ?>
    <section>
        <div class="ctn_wapper w_100 tim_m_k timkiem_sanp">
            <div class="ctn_fl_chung">
                <div class="ctn_search ctn_search_df w_100">
                    <div class="tk_tren tk_tren-df w_100 d_flex mb_30">
                        <div class="timkiem_trai">
                            <div class="kqua_tk sh_bgr_one w_100 mb_30">
                                <h1 class="timkiem_ketq w_100 sh_clr_two cr_weight mb_30 text_upcase">
                                    <? if ($s_tit != "" && $citid == 0 && $catid == 0 && $tags_id == 0 && $tagsvl == 0 && $nn == 0) { ?>
                                        Kết quả tìm kiếm <?= $new_tit ?>
                                    <? } else if ($s_tit != "" && $citid != 0 && $catid == 0 && $tags_id == 0 && $tagsvl == 0 && $nn == 0) { ?>
                                        <?= $new_tit ?> tại <?= $citname ?>
                                    <? } else if ($s_tit != "" && $citid == 0 && $catid != 0 && $tags_id == 0 && $tagsvl == 0 && $nn == 0) { ?>
                                        <?= $new_tit ?> thuộc <?= $catname ?>
                                    <? } else if ($s_tit != "" && $citid != 0 && $catid != 0 && $tags_id == 0 && $tagsvl == 0 && $nn == 0) { ?>
                                        <?= $new_tit ?> thuộc <?= $catname ?> tại <?= $citname ?>
                                    <? } else if ($catid != 0 && $citid == 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $nn == 0) { ?>
                                        <? if ($catid == 120) { ?>
                                            Việc làm
                                        <? } else { ?>
                                            <?= $catname ?>
                                        <? } ?>
                                    <? } else if ($catid == 0 && $citid != 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $nn == 0) { ?>
                                        Rao vặt <?= $citname ?>
                                    <? } else if ($catid != 0 && $citid != 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $nn == 0) { ?>
                                        Mua bán <?= $catname ?> tại <?= $citname ?>
                                    <? } else if ($tags_id != 0 && $citid != 0 && $s_tit == "" && $catid == 0 && $tagsvl == 0 && $nn == 0) { ?>
                                        Mua bán <?= $ten_tags ?> tại <?= $citname ?>
                                    <? } else if ($tags_id != 0 && $citid == 0 && $s_tit == "" && $catid == 0 && $tagsvl == 0 && $nn == 0) { ?>
                                        Mua bán <?= $ten_tags ?>
                                    <? } else if ($tagsvl != 0 && $citid == 0 && $s_tit == "" && $tags_id == 0 && $catid == 0 && $nn == 0) { ?>
                                        <? if (in_array($tagsvl, $tagsnnghe_cvl)) { ?>
                                            Tìm <?= $ten_tags_vl ?>
                                        <? } else { ?>
                                            Tìm việc làm <?= $ten_tags_vl ?>
                                        <? } ?>
                                    <? } else if ($tagsvl != 0 && $citid != 0 && $s_tit == "" && $tags_id == 0 && $catid == 0 && $nn == 0) { ?>
                                        <? if (in_array($tagsvl, $tagsnnghe_cvl)) { ?>
                                            Tìm <?= $ten_tags_vl ?> tại <?= $citname ?>
                                        <? } else { ?>
                                            Tìm việc làm <?= $ten_tags_vl ?> tại <?= $citname ?>
                                        <? } ?>
                                    <? } else if ($nn != 0 && $citid == 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $catid == 0) { ?>
                                        <? if ($nn == 87) { ?>
                                            Việc làm thêm
                                        <? } else if ($nn == 83 || $nn == 79 || $nn == 10) { ?>
                                            <?= ucfirst($tennganhnghe) ?>
                                        <? } else { ?>
                                            Việc làm <?= $tennganhnghe ?>
                                        <? } ?>
                                    <? } else if ($nn != 0 && $citid != 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $catid == 0) { ?>
                                        <? if ($nn == 87) { ?>
                                            Việc làm thêm tại <?= $citname ?>
                                        <? } else if ($nn == 83 || $nn == 79 || $nn == 10) { ?>
                                            <?= ucfirst($tennganhnghe) ?> tại <?= $citname ?>
                                        <? } else { ?>
                                            Việc làm <?= $tennganhnghe ?> tại <?= $citname ?>
                                        <? } ?>
                                    <? } ?>
                                </h1>
                                <div class="m_more_search tatca_kq w_100 show_apend">
                                    <?
                                    $count = mysql_fetch_assoc($numrow->result);
                                    $count = $count['count(1)'];
                                    $rowa = $db_qra->result_array();
                                    $loaitien = array(1 => 'VNĐ', 2 => 'USD', 3 => 'EURO');
                                    ?>
                                    <?php if (count($rowa) > 0) {
                                        foreach ($rowa as $key => $rowa) : $image = explode(';', $rowa['new_image']); ?>
                                            <div class="ttin_timkiem sh_bgr_one w_100 d_flex mb_20 show_tr" data-price='<? if ($rowa['new_money'] == "") echo '0';
                                                                                                                        else echo str_replace(',', '', $rowa['new_money']) ?>' data-newest='<?= $rowa['new_create_time'] ?>'>
                                                <div class="avt_spham_tk">
                                                    <img onerror='this.onerror=null;this.src="/images/anh_moi/avatar.png";' src="<?= str_replace('../', '/', $image[0])  ?>" class="avt_sanph sh_border_rdu_two" alt="<?= $rowa['new_title'] ?>" />
                                                    <? if (count($image) > 1) { ?>
                                                        <span class="sl_anhdl sh_clr_one"><?= count($image) ?></span>
                                                    <? }
                                                    if (!isset($_COOKIE['UID'])) { ?>
                                                        <a class="timkiem_tinnkthich" href="/dang-nhap.html">
                                                            <img src="/images/anh_moi/yeuthich_moi.png" alt="Yêu thích" class="ko_yeuthich hd_cspointer">
                                                        </a>
                                                    <? }
                                                    if (isset($_COOKIE['UID'])) {
                                                        $id_tin = $rowa['new_id'];
                                                        $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$us_id' AND `usc_type` = '$us_type'");
                                                        $check_num = mysql_num_rows($check->result);
                                                    ?>
                                                        <p class="timkiem_tinnkthich">
                                                            <? if ($check_num == 0) { ?>
                                                                <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="Yêu thích" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                            <? } else { ?>
                                                                <img src="/images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="Yêu thích" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                            <? } ?>
                                                        </p>
                                                    <? } ?>
                                                </div>
                                                <div class="ttin_vt_spham">
                                                    <h4 class="tde_spham w_100 elipsis1"><a href="/<?= replaceTitle($rowa['new_title']) ?>-c<?= $rowa['new_id'] ?>.html" class="sh_clr_two"><?= $rowa['new_title'] ?></a></h4>
                                                    <p class="tgian_spham w_100 sh_size_five sh_clr_four mb_5">
                                                        <?= lay_tgian($rowa['new_create_time']); ?>
                                                    </p>
                                                    <p class="dchi_spham w_100 sh_size_five sh_clr_four mb_10 elipsis1"><?= ltrim($rowa['dia_chi'], ', ') ?></p>
                                                    <div class="giath_spham w_100 d_flex">
                                                        <p class="gia_spham sh_size_four sh_clr_six cr_bold elipsis1">
                                                            <? if ($rowa['new_cate_id'] != 120 && $rowa['new_cate_id'] != 121) { ?>
                                                                <? if ($rowa['chotang_mphi'] != 1) { ?>
                                                                    <? if ($rowa['new_money'] != 0) { ?>
                                                                        <?= number_format($rowa['new_money']) ?> <?= $loaitien[$rowa['new_unit']] ?>
                                                                    <? } ?>
                                                                    <? if ($rowa['new_money'] == 0) { ?>
                                                                        Liên hệ người bán
                                                                    <? } ?>
                                                                <? } ?>
                                                                <? if ($rowa['chotang_mphi'] == 1) { ?>
                                                                    Cho tặng miễn phí
                                                                <? } ?>
                                                            <? } else if ($rowa['new_cate_id'] == 120 || $rowa['new_cate_id'] == 121) { ?>
                                                                <? if ($rowa['new_money'] != 0 && $rowa['gia_kt'] != 0) { ?>
                                                                    <?= number_format($rowa['new_money']) ?> - <?= number_format($rowa['gia_kt']) ?> <?= $loaitien[$rowa['new_unit']] ?>
                                                                <? } else if ($rowa['new_money'] != 0 && $rowa['gia_kt'] == 0) { ?>
                                                                    Từ <?= number_format($rowa['new_money']) ?> <?= $loaitien[$rowa['new_unit']] ?>
                                                                <? } else if ($rowa['new_money'] == 0 && $rowa['gia_kt'] != 0) { ?>
                                                                    Đến <?= number_format($rowa['gia_kt']) ?> <?= $loaitien[$rowa['new_unit']] ?>
                                                                <? } else { ?>
                                                                    Thỏa thuận
                                                                <? } ?>
                                                            <? } ?>
                                                        </p>
                                                        <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                                            <a class="img_like item_chat" target="_blank" id-chat="<?= $rowa['chat365_id'] ?>" rel="nofollow" href="<?= rewriteNews($rowa['new_id'], $rowa['new_title']); ?>">
                                                                <p class="chat_th">Chat</p>
                                                            </a>
                                                        <? } else { ?>
                                                            <a class="img_like item_chat op_ovl_dn" id-chat="<?= $rowa['chat365_id'] ?>">
                                                                <p class="chat_th">Chat</p>
                                                            </a>
                                                        <? } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                        <div class="timkiem_phai">
                            <div class="khachh_onli sxep_tk sh_bgr_one sh_br_rdu sh_bshow mb_30">
                                <h3 class="tieude_ghonl sh_clr_six">Khách hàng online</h3>
                                <div class="tatca_ngonli" id="list_chat">

                                </div>
                            </div>
                            <div class="sxep_tk sh_bgr_one sh_br_rdu sh_bshow mb_30 w_100">
                                <div class="tca_thtinh_dm share_select">
                                    <div class="thuoc_tinh w_100 mb_20">
                                        <p class="w_100 sh_clr_two sh_size_three mb_5">Sắp xếp theo</p>
                                        <select name="ten_thuoc_tinh" class="luachon_diem form-control share_select2 w_100">
                                            <option value="">Sắp xếp theo</option>
                                            <option value="1">Tin mới trước</option>
                                            <option value="2">Giá thấp trước</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="ctiet_tk sh_bgr_one sh_br_rdu sh_bshow w_100">
                                <form action="/home/quicksearch.php" method="POST">
                                    <div class="form-group mb_20 w_100">
                                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Khu vực</p>
                                        <input type="hidden" name="tukhoa_dacbiet" value="<?= $new_tit ?>" class="tukhoa_dacbiet tkiem_pbiet_mb">
                                        <p class="kq_chpup sh_border sh_border_rdu w_100 sh_size_five sh_clr_two click_showpopup_khuvuc sh_cursor show_name_khuvuc"><?= ($ward != 0) ? $wardname . ', ' : '' ?> <?= ($district != 0) ? $districtname . ', ' : '' ?> <?= ($citid != 0) ? $citname : 'Toàn Quốc' ?></p>
                                    </div>
                                    <? include("../modals/khu_vuc_manh.php") ?>
                                    <div class="form-group mb_20 w_100 cr_weight_df">
                                        <p class="sh_clr_two sh_size_three mb_5 cr_weight cr_weight">Danh mục sản phẩm</p>
                                        <input type="text" name="danhmuc_sanpham" value="<?= ($catid != 0) ? $catname : 'Danh sách danh mục' ?>" id="danh-muc-san-pham" class="click_dm_show" readonly data-catid='<?= ($catid != 0) ? $catid : '' ?>'>
                                        <input type="hidden" class="name_cate" name="name_cate" value="<?= ($catid != 0) ? $catid : '' ?>">
                                    </div>
                                    <div class="tca_thtinh_dm share_select show_tt" data="">
                                        <!-- Duy render -->
                                    </div>
                                    <div class="form-group mb_20 w_100">
                                        <p class="sh_clr_two sh_size_three mb_5 cr_weight">Giá</p>
                                        <div class="gia_timkiem w_100">
                                            <input value="<?= ($price != "") ? $price : '' ?>" name='price_m' type="text" placeholder="Từ" autocomplete="off" class="font-14-16 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                            <span>-</span>
                                            <input value="<?= ($price_den != "") ? $price_den : '' ?>" name='price_den' type="text" placeholder="Đến" autocomplete="off" class="font-14-16 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                        </div>
                                    </div>
                                    <div class="sub_timk d_flex">
                                        <p onclick="window.location.href='/tat-ca-tin-dang-ban.html'" class="bo_loc right-10 cr_weight sh_size_three sh_clr_three sh_border_rdu sh_cursor sh_bgr_one">
                                            Bỏ lọc</p>
                                        <button type="submit" class="ap_dung cr_weight sh_size_three sh_clr_one sh_border_rdu sh_cursor">Áp dụng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tu_phobien w_100 sh_br_rdu sh_bgr_one">
                        <h4 class="sh_clr_two cr_weight w_100 tuk_pbien mb_20">CÁC TỪ KHÓA PHỔ BIẾN</h4>
                        <div class="tu_phobien_ch_them">
                            <div class="tu_phobien_ch w_100 d_flex fl_wrap sh_cursor">
                                <?
                                $qr = new db_query("SELECT `search_key` FROM `search_popular` ORDER BY count_num desc , rand() limit 7");
                                $lis = $qr->result_array();
                                ?>
                                <?php foreach ($lis as $m => $value_lis) : ?>
                                    <p onclick="click_search2(this)" data-name="<?= str_replace('-', ' ', $value_lis['search_key'])  ?>" class=" cr_weight mb_10 sh_clr_two sh_size_five mr_20"><?= str_replace('-', ' ', $value_lis['search_key'])  ?></p>
                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <? include('../modals/popup_page_timkiem.php') ?>
    <? include '../modals/md_tb_yeuthich.php'; ?>
    <? include("../includes/inc_new/inc_footer.php") ?>

</body>
<script type="text/javascript" src="/js/style_new/slick.min.js"></script>
<script type="text/javascript" src="/js/style_new/style.js"></script>
<script type="text/javascript">
    $("#keyword").keyup(function() {
        var tukhoa = $(this).val();
        $(".tukhoa_dacbiet").val(tukhoa);
    });

    function click_search2(th) {
        var name = $(th).attr('data-name');
        $('.nd_box_key').addClass('d_none');
        $('.key_search').val(name);
        $('#cate_search').val("0").trigger('change');
        $('.btn_timkiem').click();
    };

    $(".share_select2").select2({
        width: '100%',
    });

    // SHOW KHU VỰC
    $('.click_dm_show').click(function() {
        $('.hd_modal_danhmuc_td_df').fadeIn(500);
    });

    $('.click_dong_dm').click(function() {
        $('.hd_modal_danhmuc_td_df').fadeOut(500);
    });

    function tinh_tp(id) {
        var tinh_tp = $(id).val();
        $.ajax({
            url: '/render/ds_quan_huyen.php',
            type: 'POST',
            data: {
                tinh_tp: tinh_tp,
            },
            success: function(data) {
                $(".md_quan_huyen").html(data);
            }
        })
    };
    // Danh mục con
    function show_ct_con(id) {
        var cate_con = $(id).attr('data');
        var cate_name = $(id).attr('data-name');

        if (cate_con == 76 || cate_con == 24 || cate_con == 19) {
            var thanhpho = <?= ($thanhpho != 0) ? $thanhpho : 0 ?>;
            var quanhuyen = <?= ($quanhuyen != 0) ? $quanhuyen : 0 ?>;
            var loai_xe = <?= ($loai_xe != 0) ? $loai_xe : 0 ?>;
            var loai_hang_hoa = <?= ($loai_hang_hoa != 0) ? $loai_hang_hoa : 0 ?>;

            $('.hd_modal_danhmuc_td_df').hide();
            $('#danh-muc-san-pham').val(cate_name).trigger('change');
            $('.name_cate').val(cate_con).trigger('change');
            $.ajax({
                type: 'POST',
                url: '/render/thuoc_tinh_no_cate_con.php',
                data: {
                    cate_con: cate_con,
                    thanhpho: thanhpho,
                    quanhuyen: quanhuyen,
                    loai_xe: loai_xe,
                    loai_hang_hoa: loai_hang_hoa
                },
                success: function(data) {
                    $('.show_tt').html(data);
                    $('#danh-muc-san-pham').attr('data-catid', cate_con);
                    $('.hd_modal_danhmuc_td_df').hide();
                    $('.hd_modal_do_dt_df').hide();
                    rf_select2d();
                }
            })
        } else {
            if (cate_con == 1) {
                var text_btn = "Tìm kiếm Đồ điện tử";
            } else if (cate_con == 2) {
                var text_btn = "Tìm kiếm xe cộ";
            } else if (cate_con == 3) {
                var text_btn = "Tìm kiếm bất động sản";
            } else if (cate_con == 13) {
                var text_btn = "Tìm kiếm dịch vụ - giải trí";
            } else if (cate_con == 18) {
                var text_btn = "Tìm kiếm thời trang";
            } else if (cate_con == 20) {
                var text_btn = "Tìm kiếm mẹ và bé";
            } else if (cate_con == 21) {
                var text_btn = "Tìm kiếm đồ gia dụng";
            } else if (cate_con == 22) {
                var text_btn = "Tìm kiếm sức khỏe - sắc đẹp";
            } else if (cate_con == 23) {
                var text_btn = "Tìm kiếm nội thất - ngoại thất";
            } else if (cate_con == 25) {
                var text_btn = "Tìm kiếm thủ công - mỹ nghệ";
            } else if (cate_con == 51) {
                var text_btn = "Tìm kiếm thú cưng";
            } else if (cate_con == 74) {
                var text_btn = "Tìm kiếm thể thao";
            } else if (cate_con == 77) {
                var text_btn = "Tìm kiếm đồ dùng văn phòng, công nông nghiệp";
            } else if (cate_con == 77) {
                var text_btn = "Tìm kiếm đồ thực phẩm đồ uống";
            }
            var cat_child_id = $('.cat_child_id').val();
            $.ajax({
                type: 'POST',
                url: "/ajax/show_cate_con.php",
                data: {
                    cate_con: cate_con
                },
                dataType: "JSON",
                success: function(data) {
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += `<ul class="ul_hd_modal_do_dt hd-padding-20 click_child_` + data[i].cat_id + `"  onclick="click_tt_con(this)" data="` + data[i].cat_id + `" data-name="` + data[i].cat_name + `">
                             <li class="hd-disflex hd-align-center">
                                 <span>` + data[i].cat_name + `</span>
                                 <span></span>
                             </li>
                         </ul>`;
                    }
                    $('.show_arr').html(html);
                    $('.hd_modal_danhmuc_td_df').hide();
                    $(".hd_modal_do_dt_df .doi_ten").text(text_btn);
                    $('.hd_modal_do_dt_df').show();

                }
            })
        }
    };

    function rf_select2d() {
        $('.share_select2').select2({
            width: '100%',
        });
    };
    // Show thuộc tính danh mục con
    function click_tt_con(id) {
        var tt_con = $(id).attr('data');
        var tt_name = $(id).attr('data-name');
        $('.name_cate').val(tt_con).trigger('change');
        $.ajax({
            type: 'POST',
            url: '/render/thuoc_tinh.php',
            data: {
                tt_con: tt_con
            },
            success: function(data) {
                $('.show_tt').html(data);
                $('#danh-muc-san-pham').val(tt_name).trigger('change');
                $('#danh-muc-san-pham').attr('data-catid', tt_con);
                $('.hd_modal_danhmuc_td_df').hide();
                $('.hd_modal_do_dt_df').hide();
                rf_select2d();
            }
        })
    };

    $('.cate_con_back, .close_catecon').click(function() {
        $('.hd_modal_danhmuc_td_df').fadeIn(500);
        $('.hd_modal_do_dt_df').fadeOut(500);
    });
    // ------------------------------------
    $('.toanquoc').change(function() {
        var tinh_tp = $('.toanquoc').val();
        if (tinh_tp == 0) $('.cf_1268591').attr("disabled", true);
        else $('.cf_1268591').attr("disabled", false);
        $.ajax({
            url: '/render/ds_quan_huyen.php',
            type: 'POST',
            data: {
                tinh_tp: tinh_tp
            },
            success: function(data) {
                $(".md_quan_huyen").html(data);
                $(".md_phuong_xa").html('<option value="">Phường/xã</option>');
            }
        })
    });

    $('.md_quan_huyen').change(function() {
        var quan_huyen = $('.md_quan_huyen').val();
        $.ajax({
            url: '/render/ds_phuong_xa.php',
            type: 'POST',
            data: {
                quan_huyen: quan_huyen
            },
            success: function(data) {
                $(".md_phuong_xa").html(data);
            }
        })

    });

    $('.click_xn_kv').click(function() {
        $('.khuvuc_hide').hide();
    });

    $('.click_xn_kv').click(function() {
        var tinh_tp = $('.toanquoc').val();
        var quan_huyen = $('.md_quan_huyen').val();
        var xa_phuong = $('.md_phuong_xa').val();
        $.ajax({
            type: 'POST',
            url: "/ajax/name_khuvuc.php",
            data: {
                tinh_tp: tinh_tp,
                quan_huyen: quan_huyen,
                xa_phuong: xa_phuong
            },
            success: function(data) {
                $('.show_name_khuvuc').html(data);
            }

        })
    });

    // SHOW POPUP KHU VỰC
    $('.click_showpopup_khuvuc').click(function() {
        $('.khu_vuc').show();
    });

    $('.close').click(function() {
        $('.khu_vuc').hide();
    });

    // SHOW KHU VỰC BỘ LỌC
    $('.show_khu_vuc_boloc').click(function() {
        $('.khu_vuc').show();
        $('.popup_boloc_1024').addClass('hidden');
    });

    $('.luachon_diem').change(function() {
        var chon = $(this).val();
        if (chon == "") window.location.reload();
        if (chon == 2) {
            $(".show_tr").sort(sort_li).appendTo('.show_apend');

            function sort_li(a, b) {
                return ($(b).data('price')) < ($(a).data('price')) ? 1 : -1;
            }
        }
        if (chon == 1) {
            $(".show_tr").sort(sort_li).appendTo('.show_apend');

            function sort_li(a, b) {
                return ($(b).data('newest')) > ($(a).data('newest')) ? 1 : -1;
            }
        }
    });

    function hang_doi_timkiem(id) {
        var id_hang = $(id).val();
        var id_dm = $(id).attr("data");

        $.ajax({
            url: '/render/timkiem_hang_dong.php',
            type: 'POST',
            data: {
                id_dm: id_dm,
                id_hang: id_hang
            },
            success: function(data) {
                $(".dong_doi").html(data);
                $(".dong_doi2").html('');
                rf_select2d();
            }
        })
    }

    function hang_doi_timkiem2(id) {
        var id_hang = $(id).val();
        var id_dm = $(id).attr("data");
        $.ajax({
            url: '/render/timkiem_hang_dong2.php',
            type: 'POST',
            data: {
                id_dm: id_dm,
                id_hang: id_hang,
            },
            success: function(data) {
                $(".dong_doi2").html(data);
                rf_select2d();
            }
        })
    }

    function click_tt_con2(n) {
        var hang = <?= ($hang != 0) ? $hang : 0 ?>;
        var hang6 = "<?= ($hang6 != "") ? $hang6 : 0 ?>";
        var dong = "<?= ($dong != "") ? $dong : 0 ?>";
        var bo_vixuly = <?= ($bo_vixuly != 0) ? $bo_vixuly : 0 ?>;
        var ram = <?= ($ram != 0) ? $ram : 0 ?>;
        var o_cung = <?= ($o_cung != 0) ? $o_cung : 0 ?>;
        var loai_ocung = <?= ($loai_ocung != 0) ? $loai_ocung : 0 ?>;
        var card_manhinh = <?= ($card_manhinh != 0) ? $card_manhinh : 0 ?>;
        var kichco_manhinh = <?= ($kichco_manhinh != 0) ? $kichco_manhinh : 0 ?>;
        var bao_hanh = <?= ($bao_hanh != 0) ? $bao_hanh : 0 ?>;
        var tinh_trang = <?= ($tinh_trang != 0) ? $tinh_trang : 0 ?>;
        var thiet_bi = <?= ($thiet_bi != 0) ? $thiet_bi : 0 ?>;
        var dung_luong = <?= ($dung_luong != 0) ? $dung_luong : 0 ?>;
        var mau_sac = <?= ($mau_sac != 0) ? $mau_sac : 0 ?>;
        var sudung_sim = <?= ($sudung_sim != 0) ? $sudung_sim : 0 ?>;
        var ketnoi_internet = <?= ($ketnoi_internet != 0) ? $ketnoi_internet : 0 ?>;
        var loai = <?= ($loai != 0) ? $loai : 0 ?>;
        //xedap
        var loai_xe = <?= ($loai_xe != 0) ? $loai_xe : 0 ?>;
        var phukien_linhkien = <?= ($phukien_linhkien != 0) ? $phukien_linhkien : 0 ?>;
        var chat_lieu_khung = <?= ($chat_lieu_khung != 0) ? $chat_lieu_khung : 0 ?>;
        var xuat_xu = <?= ($xuat_xu != 0) ? $xuat_xu : 0 ?>;
        var dong_xe = <?= ($dong_xe != 0) ? $dong_xe : 0 ?>;
        //xemay
        var dung_tich = <?= ($dung_tich != 0) ? $dung_tich : 0 ?>;
        var nam_san_xuat = <?= ($nam_san_xuat != 0) ? $nam_san_xuat : 0 ?>;
        //oto
        var nhien_lieu = <?= ($nhien_lieu != 0) ? $nhien_lieu : 0 ?>;
        var so_cho = <?= ($so_cho != 0) ? $so_cho : 0 ?>;
        var kieu_dang = <?= ($kieu_dang != 0) ? $kieu_dang : 0 ?>;
        var hop_so = <?= ($hop_so != 0) ? $hop_so : 0 ?>;
        //xe tải
        var trong_tai = <?= ($trong_tai != 0) ? $trong_tai : 0 ?>;
        //phuj tung xe
        var loai_phu_tung = <?= ($loai_phu_tung != 0) ? $loai_phu_tung : 0 ?>;
        //xe ddapj,masy ddieenj
        var dong_co = <?= ($dong_co != 0) ? $dong_co : 0 ?>;
        //nôi thất oto
        var loai_noithat = <?= ($loai_noithat != 0) ? $loai_noithat : 0 ?>;
        //BĐS-NHADAT
        var dien_tich = "<?= ($dien_tich != "") ? $dien_tich : 0 ?>";
        var ten_toa_nha = "<?= ($ten_toa_nha != "") ? $ten_toa_nha : 0 ?>";
        var tinh_trang_noi_that = <?= ($tinh_trang_noi_that != 0) ? $tinh_trang_noi_that : 0 ?>;
        var so_pngu = <?= ($so_pngu != 0) ? $so_pngu : 0 ?>;
        var so_pve_sinh = <?= ($so_pve_sinh != 0) ? $so_pve_sinh : 0 ?>;
        var tong_so_tang = <?= ($tong_so_tang != 0) ? $tong_so_tang : 0 ?>;
        var huong_chinh = <?= ($huong_chinh != 0) ? $huong_chinh : 0 ?>;
        var giay_to_phap_ly = <?= ($giay_to_phap_ly != 0) ? $giay_to_phap_ly : 0 ?>;
        var can_ban_mua = <?= ($can_ban_mua != 0) ? $can_ban_mua : 0 ?>;
        //BĐS-DAT
        var chieu_dai = "<?= ($chieu_dai != "") ? $chieu_dai : 0 ?>";
        var chieu_rong = "<?= ($chieu_rong != "") ? $chieu_rong : 0 ?>";
        var loai_hinh_dat = <?= ($loai_hinh_dat != 0) ? $loai_hinh_dat : 0 ?>;
        var loai_hinh_canho = <?= ($loai_hinh_canho != 0) ? $loai_hinh_canho : 0 ?>;
        //BDS-CUAHANg
        var tang_so = "<?= ($tang_so != "") ? $tang_so : 0 ?>";
        //ĐỒ GIA DUNG-TB ĐIỆN LẠNH
        var khoi_luong = <?= ($khoi_luong != 0) ? $khoi_luong : 0 ?>;
        var cong_suat = <?= ($cong_suat != 0) ? $cong_suat : 0 ?>;
        var loai_thiet_bi = <?= ($loai_thiet_bi != 0) ? $loai_thiet_bi : 0 ?>;
        var loai_sanpham = <?= ($loai_sanpham != 0) ? $loai_sanpham : 0 ?>;
        //mypham
        var han_su_dung = "<?= ($han_su_dung != "") ? $han_su_dung : 0 ?>";
        var loai_hinh_sp = <?= ($loai_hinh_sp != 0) ? $loai_hinh_sp : 0 ?>;
        //vattu yte
        var hang_vattu = "<?= ($hang_vattu != "") ? $hang_vattu : 0 ?>";
        //phong khách,ngủ
        var nhom_sanpham = <?= ($nhom_sanpham != 0) ? $nhom_sanpham : 0 ?>;
        var hinhdang = <?= ($hinhdang != 0) ? $hinhdang : 0 ?>;
        var chat_lieu = <?= ($chat_lieu != 0) ? $chat_lieu : 0 ?>;
        //thú cung
        var giong_thu_cung = <?= ($giong_thu_cung != 0) ? $giong_thu_cung : 0 ?>;
        var do_tuoi = <?= ($do_tuoi != 0) ? $do_tuoi : 0 ?>;
        var gioi_tinh = <?= ($gioi_tinh != 0) ? $gioi_tinh : 0 ?>;

        var do_tuoi_thucungkhac = "<?= ($do_tuoi_thucungkhac != "") ? $do_tuoi_thucungkhac : 0 ?>";
        var kichco = "<?= ($kichco != "") ? $kichco : 0 ?>";

        //the thao
        var loai75 = "<?= ($loai75 != "") ? $loai75 : 0 ?>";
        var mon_the_thao = <?= ($mon_the_thao != 0) ? $mon_the_thao : 0 ?>;

        $.ajax({
            type: 'POST',
            url: '/render/thuoc_tinh.php',
            data: {
                tt_con: n,
                hang: hang,
                dong: dong,
                bo_vixuly: bo_vixuly,
                ram: ram,
                o_cung: o_cung,
                loai_ocung: loai_ocung,
                card_manhinh: card_manhinh,
                kichco_manhinh: kichco_manhinh,
                bao_hanh: bao_hanh,
                tinh_trang: tinh_trang,
                thiet_bi: thiet_bi,
                hang6: hang6,
                dung_luong: dung_luong,
                mau_sac: mau_sac,
                sudung_sim: sudung_sim,
                ketnoi_internet: ketnoi_internet,
                loai: loai,
                phukien_linhkien: phukien_linhkien,
                loai_xe: loai_xe,
                dong_xe: dong_xe,
                xuat_xu: xuat_xu,
                chat_lieu_khung: chat_lieu_khung,
                dung_tich: dung_tich,
                nam_san_xuat: nam_san_xuat,
                nhien_lieu: nhien_lieu,
                so_cho: so_cho,
                kieu_dang: kieu_dang,
                hop_so: hop_so,
                trong_tai: trong_tai,
                loai_phu_tung: loai_phu_tung,
                dong_co: dong_co,
                loai_noithat: loai_noithat,
                dien_tich: dien_tich,
                ten_toa_nha: ten_toa_nha,
                tinh_trang_noi_that: tinh_trang_noi_that,
                so_pngu: so_pngu,
                so_pve_sinh: so_pve_sinh,
                tong_so_tang: tong_so_tang,
                huong_chinh: huong_chinh,
                giay_to_phap_ly: giay_to_phap_ly,
                can_ban_mua: can_ban_mua,
                chieu_dai: chieu_dai,
                chieu_rong: chieu_rong,
                loai_hinh_dat: loai_hinh_dat,
                tang_so: tang_so,
                loai_hinh_canho: loai_hinh_canho,
                khoi_luong: khoi_luong,
                cong_suat: cong_suat,
                loai_thiet_bi: loai_thiet_bi,
                loai_sanpham: loai_sanpham,
                han_su_dung: han_su_dung,
                loai_hinh_sp: loai_hinh_sp,
                hang_vattu: hang_vattu,
                chat_lieu: chat_lieu,
                hinhdang: hinhdang,
                nhom_sanpham: nhom_sanpham,
                giong_thu_cung: giong_thu_cung,
                do_tuoi: do_tuoi,
                gioi_tinh: gioi_tinh,
                kichco: kichco,
                do_tuoi_thucungkhac: do_tuoi_thucungkhac,
                loai75: loai75,
                mon_the_thao: mon_the_thao
            },
            success: function(data) {
                $('.show_tt').html(data);
                rf_select2d();
            }

        })
    }
    $(document).ready(function() {
        // $("select[name='hang']").val('1368').trigger('change');
        var cat_parent_id = $('.cat_parent_id').val();
        var cat_child_id = $('.cat_child_id').val();
        if (cat_parent_id != "") {
            if (cat_parent_id == 0) {
                if (cat_child_id == 19 || cat_child_id == 24 || cat_child_id == 76) {
                    $('.click_parent_' + cat_child_id + '').click();
                }
            } else {
                click_tt_con2(cat_child_id);
            }
        }
    })
</script>

</html>