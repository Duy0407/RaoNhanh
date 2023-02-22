<?
include("config.php");
//$tt_con = 98;

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

$kich_co  = getValue("kich_co", "int", "GET", "");
$kich_co  = (int)$kich_co;
if ($kich_co > 0) {
    $sql .= " AND kich_co = '$kich_co' ";
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

$arr_tinhtrang1 = array(
    1 => 'Mới',
    2 => 'Đã sử dụng',
);

$arr_tinhtrang2 = array(
    1 => 'Mới',
    2 => 'Đã sử dụng (chưa sửa chữa)',
    3 => 'Đã sử dụng (qua sửa chữa)',
);

$arr_tinhtrang3 = array(
    1 => 'Mới',
    2 => 'Cũ (Chưa sửa chữa)',
    3 => 'Cũ (Đã sửa chữa)',
);

$arr_cokhong = array(
    1 => 'Có',
    2 => 'Không',
);

$arr_hopso = array(
    1 => 'Tự động',
    2 => 'Số sàn',
    3 => 'Bán tự động',
);

$arr_nhienlieu = array(
    1 => 'Xăng',
    2 => 'Dầu',
    3 => 'Động cơ Hybird',
    4 => 'Điện',
);

$arr_huongchinh = array(
    1 => 'Đông',
    2 => 'Tây',
    3 => 'Nam',
    4 => 'Bắc',
    5 => 'Đông bắc',
    6 => 'Đông nam',
    7 => 'Tây bắc',
    8 => 'Tây nam',
);

$arr_giaytophaply = array(
    1 => 'Đã có sổ',
    2 => 'Đang chờ sổ',
    3 => 'Giấy tờ khác',
);

$arr_ttnoithat = array(
    1 => 'Nội thất cao cấp',
    2 => 'Nội thất đầy đủ',
    3 => 'Hoàn thiện cơ bản',
    4 => 'Bàn giao thô',
);
// loai hinh dat
$arr_loaihinh = array(
    1 => 'Đất thổ cư',
    2 => 'Đất nền dự án',
    3 => 'Đất công nghiệp',
    4 => 'Đất nông nghiệp',
);
// loai hinh can ho chung cu
$arr_lhcanho = array(
    1 => 'Chung cư',
    2 => 'Duplex',
    3 => 'Penthouse',
    4 => 'Căn hộ dịch vụ, mini',
    5 => 'Tập thể, cư xá',
    6 => 'Officetel',
);
// loai hinh van phong
$arr_lhcanho = array(
    1 => 'Mặt bằng kinh doanh',
    2 => 'Văn phòng',
    3 => 'Shophouse',
    4 => 'Officetel',
);
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/trangchu.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/header.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/footer.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/style_new/tim_kiem.css">
</head>

<body>
    <? include('../includes/inc_new/header.php'); ?>
    <div class="search_db">
        <div class="form-search form-search_df">
            <form action="/home/quicksearch_2.php" method="POST" id="search-form">
                <?
                $tit_sp  = getValue("sp", "str", "GET", "");
                $tit_sp   = replaceMQ($tit_sp);
                $tit_sp   = strip_tags($tit_sp);
                $tit_sp   = str_replace("-", " ", $tit_sp);
                $tit_sp = trim($tit_sp);

                $tags_id = getValue('tags', 'int', 'GET', 0);
                $tags_id = (int)$tags_id;
                $ten_tags = $tags_tk1[$tags_id];

                $tagsvl = getValue('tagsvl', 'int', 'GET', 0);
                $tagsvl = (int)$tagsvl;
                $ten_tags_vl = $db_tags_vl[$tagsvl];

                $nn = getValue('nn', 'int', 'GET', 0);
                $nn = (int)$nn;
                $tennganhnghe = $db_cat_vl[$nn];

                if ($tit_sp != "" && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
                    $tentim_kiem = $tit_sp;
                } else if ($tit_sp == "" && $tags_id != 0 && $tagsvl == 0 && $nn == 0) {
                    $tentim_kiem = $ten_tags;
                } else if ($tit_sp == "" && $tags_id == 0 && $tagsvl != 0 && $nn == 0) {
                    if (in_array($tagsvl, $tagsnnghe_cvl)) {
                        $tentim_kiem = $ten_tags_vl;
                    } else {
                        $tentim_kiem = 'việc làm ' . $ten_tags_vl;
                    }
                } else if ($tit_sp == "" && $tags_id == 0 && $tagsvl == 0 && $nn != 0) {
                    if ($nn == 87) {
                        $tentim_kiem = 'Việc làm thêm';
                    } else if ($nn == 83 || $nn == 79 || $nn == 10) {
                        $tentim_kiem = ucfirst($tennganhnghe);
                    } else {
                        $tentim_kiem = 'Việc làm ' . $tennganhnghe;
                    }
                } else {
                    $tentim_kiem = '';
                }
                ?>
                <div class="choose_search">
                    <input value="<?= $tentim_kiem ?>" type="text" class="key_search" id="keyword" placeholder="Tìm kiếm sản phẩm ..." name="new_name" autocomplete="off" />
                    <select id="city_search" class="city_search" name="name_city">
                        <option value="0">Toàn quốc</option>
                        <? foreach ($arrcity as $item => $type) { ?>
                            <option <?= isset($citid) ? ($citid == $type['cit_id'] ? "selected" : "") : "" ?> value="<?= $type['cit_id'] ?>"><?= $type['cit_name'] ?></option>
                        <? }
                        unset($item, $type);
                        ?>
                    </select>
                    <select id="cate_search" class="cate_search" name="name_cate">
                        <option value="0">Chọn danh mục</option>
                        <? foreach ($db_cat as $item => $type) {
                            if (isset($timkiem_mua) && $timkiem_mua != "") {
                                if (in_array($type['cat_id'], $bodmuc_mua) == false) { ?>
                                    <option <?= isset($catid) ? ($catid == $type['cat_id'] ? "selected" : "") : "" ?> value="<?= $type['cat_id'] ?>"><?= ($type['cat_id'] != 121) ? $type['cat_name'] : 'Tìm ứng viên' ?></option>
                                <? }
                            } else if (!isset($timkiem_mua) && $timkiem_mua == "") {
                                if (in_array($type['cat_id'], $bodmuc_ban) == false) { ?>
                                    <option <?= isset($catid) ? ($catid == $type['cat_id'] ? "selected" : "") : "" ?> value="<?= $type['cat_id'] ?>"><?= ($type['cat_id'] != 120) ? $type['cat_name'] : 'Tìm việc làm' ?></option>
                        <? }
                            }
                        }
                        unset($item, $type);
                        ?>
                    </select>
                    <input type="hidden" name="phan_biet_mb" class="tkiem_pbiet_mb" value="<?= (isset($timkiem_mua) && $timkiem_mua != "") ? "1" : "2" ?>">
                    <input type="submit" class="btn_timkiem button sh_cursor" value="TÌM KIẾM" />
                </div>
            </form>
            <div class="nd_box_key d_none">
                <?php if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
                    $us_id = $_COOKIE['UID']; ?>
                    <div class="kq_lq" id="key_lq">
                        <p class="text_def">Tìm kiếm gần đây</p>
                        <div id="fts_idautocomplete-list" class="autocomplete-items-tag">
                            <?
                            if (!isset($timkiem_mua) && $timkiem_mua == "") {
                                $qr_search = new db_query("SELECT `key_search`FROM `search` WHERE user_id = " . $us_id . " ORDER BY created_at desc limit 20");
                                $lis_search = $qr_search->result_array();
                                if (count($lis_search) > 0) {
                                    foreach ($lis_search as $item => $type) { ?>
                                        <p class="key_tag" onclick="click_search(this)" data-name="<?= ($type['key_search']) ?>"> <?= str_replace("-", " ", $type['key_search'])  ?></p>
                                    <?  }
                                    unset($item, $type);
                                }
                                if (count($lis_search) == 0) { ?>
                                    <p class="key_tag">Bạn chưa tìm kiếm</p>
                            <? }
                            } ?>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="kq_lq" id="key_lq">
                        <p class="text_def">Tìm kiếm gần đây</p>
                        <div id="fts_idautocomplete-list" class="autocomplete-items-tag">
                        </div>
                    </div>
                <?php } ?>
                <div class="kq_gy" id="list_cate">
                    <p class="text_def">Từ khóa phổ biến</p>
                    <div id="fts_idautocomplete-list" class="autocomplete-items">
                        <? foreach ($db_cat as $item => $type) {
                            if (isset($timkiem_mua) && $timkiem_mua != "") {
                                if (in_array($type['cat_id'], $bodmuc_mua) == false) { ?>
                                    <p class="key_tag" onclick="click_search(this)" data-name="<?= ($type['cat_id'] != 121) ? $type['cat_name'] : 'Tìm ứng viên' ?>"><?= ($type['cat_id'] != 121) ? $type['cat_name'] : 'Tìm ứng viên' ?></p>
                                <? }
                            } else if (!isset($timkiem_mua) && $timkiem_mua == "") {
                                if (in_array($type['cat_id'], $bodmuc_ban) == false) { ?>
                                    <p class="key_tag" onclick="click_search(this)" data-name="<?= ($type['cat_id'] != 120) ? $type['cat_name'] : 'Tìm việc làm' ?>"><?= ($type['cat_id'] != 120) ? $type['cat_name'] : 'Tìm việc làm' ?></p>
                        <? }
                            }
                        }
                        unset($item, $type);
                        ?>
                    </div>
                </div>
                <div class="icon_X">
                    <img src="/images/anh_moi/close.png" alt="">
                </div>
            </div>
        </div>
        <div class="header_loc">
            <div class="content_loc">
                <div class="d_flex w_100">
                    <a class="goleft"></a>
                    <div class="boloc">
                        <div class="boloc_tkiem_moi">
                            <div class="scroll">
                                <button class="huy_loc" id="first">Xóa lọc</button>
                                <div class="ctkiem_tdang_ban active click_showpopup_khuvuc">
                                    <p class="tkiem_rkq active">
                                        Toàn quốc
                                    </p>
                                </div>
                                <div class="ctkiem_tdang_ban active click_dm_show">
                                    <p class="tkiem_rkq active">
                                        Danh mục sản phẩm
                                    </p>
                                </div>
                                <div class="select_seach d_none">
                                    <select class="select slect-hang" name="tkiem_ttoan_dbao">
                                        <option value="">Có thanh toán đảm bảo</option>
                                        <option value="1">Có</option>
                                        <option value="2">Không</option>
                                    </select>
                                </div>
                                <div class="select_seach sh_border d_flex">
                                    <p>Giá:</p>
                                    <input class="b0 bg_none pl_10" type="text" placeholder="Từ">
                                    <input class="b0 bg_none" type="text" placeholder="Đến">
                                </div>
                                <? include('../includes/inc_new/timkiem_tinban.php') ?>
                            </div>
                        </div>
                    </div>
                    <a class="goright"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="chat">
            <div class="content_chat">
                <div class="content_chat_header">
                    <img src="/images/anh_moi/icon_chat.svg" alt="">
                    <p class="cl_r font_w500 font_s16 lh_25 pl_10">CHAT KHÁCH HÀNG ONLINE</p>
                </div>
                <div class="d_flex flex_w pt_20">
                    <?php for ($i = 0; $i < 10; $i++) { ?>
                        <div class="list_item_chat">
                            <div class="in_vl">
                                <div class="img_item_on">
                                    <a>
                                        <img class="ava_kh" src="https://timviec365.vn/pictures/2021/06/17/edh1666946368.png" alt="no image">
                                    </a>
                                </div>
                                <div class="right_item_vl">
                                    <h3 style="margin:0;">
                                        <a class="name_com font_s16">CONG TY TNHH BEST SUN TECHNOLOGY
                                            <span class="tooltip ">
                                                <span>CONG TY TNHH BEST SUN TECHNOLOGY</span>
                                            </span>
                                        </a>
                                    </h3>
                                    <div class="pt_5 mb_5">
                                        <span class="address">Hà Nội</span>
                                    </div>
                                    <a class="tit_com">Tuyển trợ lý kiêm phiên dịch tiếng Trung
                                        <span class="tooltip ">
                                            <span>Tuyển trợ lý kiêm phiên dịch tiếng Trung</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="banner1">
                <div class="detail_banner1">
                    <a>
                        <img src="/images/anh_moi/download.png" alt="">
                    </a>
                </div>
            </div>
            <div class="banner2">
                <div class="banner_tit">
                    <span>TẢI APP CHAT365 BẢN PC ĐỂ<br>CHAT VỚI KHÁCH HÀNG</span>
                </div>
                <div class="detail_banner2">
                    <a>
                        <img src="/images/anh_moi/downchat.png" alt="" class="transparent">
                    </a>
                </div>
            </div>
            <div class="button_chat">
                <button class="button_chat_2"><span>CHAT NGAY</span></button>
            </div>
        </div>
        <div class="tin_dang">
            <div class="check_ut">
                <div class="check_ut_2">
                    <p>Ưu tiên hiển thị:</p>
                    <div class="d_flex">
                        <input type="radio" name="check_pb" class="check_pb" id="check_pb1">
                        <label for="check_pb1" class="input_pb"></label>
                        <label for="check_pb1" class="input_pb_t">Phổ biến nhất</label>
                    </div>
                    <div class="d_flex">
                        <input type="radio" name="check_pb" class="check_pb" id="check_pb2">
                        <label for="check_pb2" class="input_pb"></label>
                        <label for="check_pb2" class="input_pb_t">Mới nhất</label>
                    </div>
                    <div class="d_flex">
                        <input type="radio" name="check_pb" class="check_pb" id="check_pb3">
                        <label for="check_pb3" class="input_pb"></label>
                        <label for="check_pb3" class="input_pb_t">Doanh nghiêp</label>
                    </div>
                    <div class="d_flex">
                        <input type="radio" name="check_pb" class="check_pb" id="check_pb4">
                        <label for="check_pb4" class="input_pb"></label>
                        <label for="check_pb4" class="input_pb_t">Cá nhân</label>
                    </div>
                </div>
            </div>
            <?php
            $post_num = 0;
            for ($i = 0; $i < 10; $i++) { ?>
                <div class="content_td">
                    <div class="tin">
                        <div class="chitiet_tin d_flex">
                            <div class="img_tin">
                                <img class="img_tin_2" src="http://dev5.tinnhanh365.vn/pictures/news/2022/10/05/lge1664960394.jpg">
                                <div class="d_flex j_bw">
                                    <button class="btn_chat"><img src="/images/anh_moi/chat365.svg"><span>Chat</span></button>
                                    <button class="favo"></button>
                                </div>
                            </div>
                            <div class="info">
                                <div class="title">
                                    <div class="title-1">
                                        <span class="font_w500 font_s16">Ốp điện thoại silicon mềm phi hành gia dành cho Realme 8 7 5 6 Pro 6i 7i 8i v13 C17 A16K</span>
                                        <button class="favo"></button>
                                    </div>
                                    <div class="people">
                                        <span>Darlene Robertson</span>
                                    </div>
                                </div>
                                <div class="info-2">
                                    <div class="info-2-child cost">
                                        <span>Tặng miễn phí</span>
                                    </div>
                                    <div class="info-2-child add">
                                        <span>Hà Nội và 2 tỉnh khác</span>
                                    </div>
                                    <div class="info-2-child time">
                                        <span>Đăng: 2 phút trước</span>
                                    </div>
                                    <div class="info-2-child pay">
                                        <span>Đảm bảo thanh toán: có</span>
                                    </div>
                                </div>
                                <div class="mota">
                                    <p class="mota_child">Siêu phẩm điện thoại tầm trung Realme Q3 Pro 5G, Đổi trả trong 7 ngày đầu (Hoàn tiền sản phẩm...</p>
                                </div>
                            </div>
                        </div>
                        <div class="tuong_tac">
                            <div class="tt_left">
                                <img src="/images/anh_moi/like.svg" class="icon">
                                <img src="/images/anh_moi/haha.svg" class="icon">
                                <img src="/images/anh_moi/love.svg" class="icon">
                                <!-- <img src="sad.svg" class="icon">
                            <img src="love2.svg" class="icon">
                            <img src="wow.svg" class="icon">
                            <img src="angry.svg" class="icon"> -->
                                <span class="count_tt">Bạn và 12 người khác</span>
                            </div>
                            <div class="tt_right">
                                <span class="tt_right_count">25 bình luận</span>
                                <span class="tt_right_count">10 lượt chia sẻ</span>
                                <span class="tt_right_count count_seen">10 lượt xem</span>
                            </div>
                        </div>
                        <div class="action">
                            <div class="like">
                                <div class="list_tt" data-id="<?= $i ?>">
                                    <img src="/images/anh_moi/like.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_like')">
                                    <img src="/images/anh_moi/haha.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_haha')">
                                    <img src="/images/anh_moi/love.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_love')">
                                    <img src="/images/anh_moi/sad.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_sad')">
                                    <img src="/images/anh_moi/love2.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_love2')">
                                    <img src="/images/anh_moi/wow.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_wow')">
                                    <img src="/images/anh_moi/angry.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_angry')">
                                </div>
                                <span id="liked-<?= $i ?>" onclick="like(<?= $i ?>,'ic_liked')">Thích</span>
                            </div>
                            <div class="comment" onclick="comment(<?= $i ?>)">
                                <span>Bình luận</span>
                            </div>
                            <div class="share">
                                <span>Chia sẻ</span>
                            </div>
                        </div>
                        <div class="comment_act d_none" id="comment_act-<?= $i ?>">
                            <div class="avata">
                                <img src="/images/anh_moi/avata.png">
                            </div>
                            <div class="my_cmt">
                                <input type="text" class="cmt" placeholder="Viết bình luận">
                                <div class="my_cmt_child">
                                    <button class="emoji"></button>
                                    <button class="camera"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="more">
                <button class="xemthem"><span>Xem thêm</span></button>
            </div>
        </div>
    </div>
    <div class="key_popular">
        <h2>CÁC TỪ KHÓA PHỔ BIẾN</h2>
        <div class="key">
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <div class="tk">
                    <span>shiba inu</span>
                </div>
            <?php } ?>
        </div>
    </div>

    <div class="modal share_modal tintuc_tkiem">
        <div class="modal-content">
            <div class="bgom_modal sh_bgr_one">
                <div class="baogom_tkiem">
                    <div class="modal-header tex_center tbao_hd">
                        <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                        <h2 class="sh_size_one sh_clr_one">Tên trường tìm kiếm</h2>
                    </div>
                    <div class="modal-body">
                        <div class="form_thuoctinh">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="btt_footer">
                        <p class="dong_y cr_weight sh_cursor sh_clr_one sh_size_three butt_ctn sh_bgr_two sh_border_rdu click_xn_kv">Xác nhận</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? include('../modals/popup_page_timkiem.php') ?>
    <? include('../modals/khu_vuc_manh.php') ?>
    <? include('../includes/inc_new/inc_footer.php') ?>
</body>

<script language="javascript">
    $('.goright').click(function(e) {
        e.preventDefault();
        $('.boloc').animate({
            scrollLeft: "+=300px"
        }, "slow");
    });

    $('.goleft').click(function(e) {
        e.preventDefault();
        $('.boloc').animate({
            scrollLeft: "-=300px"
        }, "slow");
    });

    function like(i, t) {
        var icon = document.getElementById("liked-" + i)
        if (icon.classList.contains(t) == true) {
            icon.removeAttribute('class');
            icon.parentElement.style.background = "url(like2.svg) no-repeat";
            icon.parentElement.style.backgroundPosition = "0px 10px";
            icon.style.color = 'black';
            icon.innerHTML = "Thích";
        } else {
            if (t == "ic_liked") {
                if (icon.classList.contains("ic_like") == true || icon.classList.contains("ic_haha") == true || icon.classList.contains("ic_love") == true || icon.classList.contains("ic_sad") == true || icon.classList.contains("ic_love2") == true || icon.classList.contains("ic_wow") == true || icon.classList.contains("ic_angry") == true) {
                    icon.removeAttribute('class');
                    bg = "url(/images/anh_moi/like2.svg) 0px 10px no-repeat";
                    col = 'black';
                    text = "Thích"
                } else {
                    icon.removeAttribute('class');
                    icon.classList.add("ic_like");
                    bg = "url(/images/anh_moi/like.svg) 0% 50% / 26px no-repeat";
                    col = 'red';
                    text = "Thích"
                }
                icon.parentElement.style.background = bg;
                icon.style.color = col;
                icon.innerHTML = text;
            } else {
                icon.removeAttribute('class');
                icon.classList.add(t);
                if (t == "ic_like") {
                    bg = "url(/images/anh_moi/like.svg) 0% 50% / 26px no-repeat";
                    col = 'red';
                    text = "Thích"
                } else if (t == "ic_haha") {
                    bg = "url(/images/anh_moi/haha.svg) 0% 50% / 26px no-repeat";
                    col = '#ffc531';
                    text = "Haha"
                } else if (t == "ic_love") {
                    bg = "url(/images/anh_moi/love.svg) 0% 50% / 26px no-repeat";
                    col = 'red';
                    text = "Yêu thích"
                } else if (t == "ic_sad") {
                    bg = "url(/images/anh_moi/sad.svg) 0% 50% / 26px no-repeat";
                    col = '#ffc531';
                    text = "Buồn"
                } else if (t == "ic_love2") {
                    bg = "url(/images/anh_moi/love2.svg) 0% 50% / 26px no-repeat";
                    col = '#ffc531';
                    text = "Yêu thích"
                } else if (t == "ic_wow") {
                    bg = "url(/images/anh_moi/wow.svg) 0% 50% / 26px no-repeat";
                    col = '#ffc531';
                    text = "Wow"
                } else if (t == "ic_angry") {
                    bg = "url(/images/anh_moi/angry.svg) 0% 50% / 26px no-repeat";
                    col = 'red';
                    text = "Phẫn nộ"
                }
                icon.parentElement.style.background = bg;
                icon.style.color = col;
                icon.innerHTML = text;
            }
        }
    };

    function comment(i) {
        document.getElementById("comment_act-" + i).classList.toggle("d_none")
    };

    function laygia_tri(id) {
        var id_dm = $(id).attr("data1");
        var gia_tri = $(id).attr("data");
        $.ajax({
            url: '/render/lay_thuoc_tinh.php',
            type: 'POST',
            data: {
                id_dm: id_dm,
                gia_tri: gia_tri,
            },
            success: function(data) {
                $(".tintuc_tkiem").find(".baogom_tkiem").html(data);
                $(".tintuc_tkiem").show();
            }
        })
    };

    function close_tki() {
        $(".tintuc_tkiem").hide();
    }
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
    $(".share_select2").select2({
        width: '100%',
    });
    $('.click_showpopup_khuvuc').click(function() {
        $('.khu_vuc').show();
    });
    $('.close').click(function() {
        $('.khu_vuc').hide();
    });
    $('.click_dm_show').click(function() {
        $('.hd_modal_danhmuc_td_df').fadeIn(500);
    });

    $('.click_dong_dm').click(function() {
        $('.hd_modal_danhmuc_td_df').fadeOut(500);
    });


</script>

</html>