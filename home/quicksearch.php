<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include("config.php");
$link = '';
$sq = '';

$new_name = getValue('tukhoa_dacbiet', 'str', 'POST', '');
$new_name = trim($new_name);
$new_name = replaceMQ($new_name);
$new_name = strip_tags($new_name);
$new_name = str_replace(" ", "-", $new_name);
$new_name = str_replace("%", " ", $new_name);

$city        = getValue("name_city", "int", "POST", 0);
$city        = (int)$city;

$name_cate   = getValue("name_cate", "int", "POST", 0);
$name_cate   = (int)$name_cate;


$quan  = getValue("quan_huyen", "int", "POST", 0);
$quan  = (int)$quan;

$xa  = getValue("phuong_xa", "int", "POST", 0);
$xa  = (int)$xa;

$price  = getValue("price_m", "int", "POST", "");
$price  = (int)$price;


$price  = getValue("price_m", "int", "POST", "");
$price  = (int)$price;

$price_den  = getValue("price_den", "int", "POST", "");
$price_den  = (int)$price_den;

// LAPTOP-MAY TINH DE BAN
if ($name_cate == 5 || $name_cate == 98) {
   if ($name_cate == 98) {
      $hang  = getValue("hang", "int", "POST", "");
      $hang  = (int)$hang;
      $dong  = getValue("dongmay", "str", "POST", "");
   }
   $bo_vixuly  = getValue("bo_vixuly", "int", "POST", "");
   $bo_vixuly  = (int)$bo_vixuly;

   $ram  = getValue("ram", "int", "POST", "");
   $ram  = (int)$ram;

   $o_cung  = getValue("o_cung", "int", "POST", "");
   $o_cung  = (int)$o_cung;

   $loai_ocung  = getValue("loai_ocung", "int", "POST", "");
   $loai_ocung  = (int)$loai_ocung;

   $card_manhinh  = getValue("card_manhinh", "int", "POST", "");
   $card_manhinh  = (int)$card_manhinh;

   $kichco_manhinh  = getValue("kichco_manhinh", "int", "POST", "");
   $kichco_manhinh  = (int)$kichco_manhinh;

   $bao_hanh  = getValue("bao_hanh", "int", "POST", "");
   $bao_hanh  = (int)$bao_hanh;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}
//Máy ảnh máy quay
if ($name_cate == 6) {
   $thiet_bi  = getValue("thiet_bi", "int", "POST", "");
   $thiet_bi  = (int)$thiet_bi;

   $hang6  = getValue("hang", "str", "POST", "");

   $bao_hanh  = getValue("bao_hanh", "int", "POST", "");
   $bao_hanh  = (int)$bao_hanh;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}
//ĐTDĐ
if ($name_cate == 7) {
   $dung_luong  = getValue("dung_luong", "int", "POST", "");
   $dung_luong  = (int)$dung_luong;

   $mau_sac  = getValue("mau_sac", "int", "POST", "");
   $mau_sac  = (int)$mau_sac;

   $hang  = getValue("hang", "int", "POST", "");
   $hang  = (int)$hang;
   $dong  = getValue("dongmay", "str", "POST", "");

   $bao_hanh  = getValue("bao_hanh", "int", "POST", "");
   $bao_hanh  = (int)$bao_hanh;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}

//Máy tính bảng
if ($name_cate == 35) {
   $sudung_sim  = getValue("sudung_sim", "int", "POST", "");
   $sudung_sim  = (int)$sudung_sim;

   $dung_luong  = getValue("dung_luong", "int", "POST", "");
   $dung_luong  = (int)$dung_luong;

   $kichco_manhinh  = getValue("kichco_manhinh", "int", "POST", "");
   $kichco_manhinh  = (int)$kichco_manhinh;

   $hang  = getValue("hang", "int", "POST", "");
   $hang  = (int)$hang;
   $dong  = getValue("dongmay", "str", "POST", "");

   $bao_hanh  = getValue("bao_hanh", "int", "POST", "");
   $bao_hanh  = (int)$bao_hanh;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}
//Tivi amly loa
if ($name_cate == 36) {
   $thiet_bi  = getValue("thiet_bi", "int", "POST", "");
   $thiet_bi  = (int)$thiet_bi;

   $hang  = getValue("hang", "int", "POST", "");
   $hang  = (int)$hang;

   $kichco_manhinh  = getValue("kichco_manhinh", "int", "POST", "");
   $kichco_manhinh  = (int)$kichco_manhinh;

   $ketnoi_internet  = getValue("ketnoi_internet", "int", "POST", "");
   $ketnoi_internet  = (int)$ketnoi_internet;

   $dung_luong  = getValue("dung_luong", "int", "POST", "");
   $dung_luong  = (int)$dung_luong;

   $loai  = getValue("loai", "int", "POST", "");
   $loai  = (int)$loai;

   $bao_hanh  = getValue("bao_hanh", "int", "POST", "");
   $bao_hanh  = (int)$bao_hanh;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}
//phuj kieenj linh kieenj
if ($name_cate == 37) {
   $hang  = getValue("hang", "int", "POST", "");
   $hang  = (int)$hang;

   $phukien_linhkien  = getValue("phukien_linhkien", "int", "POST", "");
   $phukien_linhkien  = (int)$phukien_linhkien;

   $bao_hanh  = getValue("bao_hanh", "int", "POST", "");
   $bao_hanh  = (int)$bao_hanh;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}

//TB đeo thông minh
if ($name_cate == 99) {
   $thiet_bi  = getValue("thiet_bi", "int", "POST", "");
   $thiet_bi  = (int)$thiet_bi;

   $hang  = getValue("hang", "int", "POST", "");
   $hang  = (int)$hang;
   $dong  = getValue("dongmay", "str", "POST", "");

   $bao_hanh  = getValue("bao_hanh", "int", "POST", "");
   $bao_hanh  = (int)$bao_hanh;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}

//xe đap
if ($name_cate == 8) {
   $loai_xe  = getValue("loai_xe", "int", "POST", "");
   $loai_xe  = (int)$loai_xe;

   $xuat_xu  = getValue("xuat_xu", "int", "POST", "");
   $xuat_xu  = (int)$xuat_xu;

   $hang  = getValue("hang", "int", "POST", "");
   $hang  = (int)$hang;
   $dong_xe  = getValue("dong_xe", "str", "POST", "");

   $kichco_manhinh  = getValue("kichco_manhinh", "int", "POST", "");
   $kichco_manhinh  = (int)$kichco_manhinh;

   $mau_sac  = getValue("mau_sac", "int", "POST", "");
   $mau_sac  = (int)$mau_sac;

   $chat_lieu_khung  = getValue("chat_lieu_khung", "int", "POST", "");
   $chat_lieu_khung  = (int)$chat_lieu_khung;

   $bao_hanh  = getValue("bao_hanh", "int", "POST", "");
   $bao_hanh  = (int)$bao_hanh;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}
//xe mays
if ($name_cate == 9) {
   $loai_xe  = getValue("loai_xe", "int", "POST", "");
   $loai_xe  = (int)$loai_xe;

   $hang  = getValue("hang", "int", "POST", "");
   $hang  = (int)$hang;
   $dong_xe  = getValue("dong_xe", "str", "POST", "");

   $dung_tich  = getValue("dung_tich", "int", "POST", "");
   $dung_tich  = (int)$dung_tich;

   $nam_san_xuat  = getValue("nam_san_xuat", "int", "POST", "");
   $nam_san_xuat  = (int)$nam_san_xuat;

   $bao_hanh  = getValue("bao_hanh", "int", "POST", "");
   $bao_hanh  = (int)$bao_hanh;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}

//oto
if ($name_cate == 10) {
   $nhien_lieu  = getValue("nhien_lieu", "int", "POST", "");
   $nhien_lieu  = (int)$nhien_lieu;

   $so_cho  = getValue("so_cho", "int", "POST", "");
   $so_cho  = (int)$so_cho;

   $kieu_dang  = getValue("kieu_dang", "int", "POST", "");
   $kieu_dang  = (int)$kieu_dang;

   $hop_so  = getValue("hop_so", "int", "POST", "");
   $hop_so  = (int)$hop_so;

   $hang  = getValue("hang", "int", "POST", "");
   $hang  = (int)$hang;
   $dong_xe  = getValue("dong_xe", "str", "POST", "");

   $nam_san_xuat  = getValue("nam_san_xuat", "int", "POST", "");
   $nam_san_xuat  = (int)$nam_san_xuat;

   $xuat_xu  = getValue("xuat_xu", "int", "POST", "");
   $xuat_xu  = (int)$xuat_xu;

   $mau_sac  = getValue("mau_sac", "int", "POST", "");
   $mau_sac  = (int)$mau_sac;

   $bao_hanh  = getValue("bao_hanh", "int", "POST", "");
   $bao_hanh  = (int)$bao_hanh;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}
//xe tair xe khasc
if ($name_cate == 38) {
   $nhien_lieu  = getValue("nhien_lieu", "int", "POST", "");
   $nhien_lieu  = (int)$nhien_lieu;

   $trong_tai  = getValue("trong_tai", "int", "POST", "");
   $trong_tai  = (int)$trong_tai;

   $hang  = getValue("hang", "int", "POST", "");
   $hang  = (int)$hang;

   $mau_sac  = getValue("mau_sac", "int", "POST", "");
   $mau_sac  = (int)$mau_sac;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}
//phu tùng xe
if ($name_cate == 39) {
   $loai_phu_tung  = getValue("loai_phu_tung", "int", "POST", "");
   $loai_phu_tung  = (int)$loai_phu_tung;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}

//xe máy,đạp điện
if ($name_cate == 40 || $name_cate == 41) {
   $hang  = getValue("hang", "int", "POST", "");
   $hang  = (int)$hang;

   $mau_sac  = getValue("mau_sac", "int", "POST", "");
   $mau_sac  = (int)$mau_sac;

   $dong_co  = getValue("dong_co", "int", "POST", "");
   $dong_co  = (int)$dong_co;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;

   $bao_hanh  = getValue("bao_hanh", "int", "POST", "");
   $bao_hanh  = (int)$bao_hanh;
}
//nội thất oto
if ($name_cate == 42) {
   $loai_noithat  = getValue("loai_noithat", "int", "POST", "");
   $loai_noithat  = (int)$loai_noithat;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}
//BĐS-NHÀ ĐẤT
if ($name_cate == 11 || $name_cate == 28 || $name_cate == 26 || $name_cate == 29 || $name_cate == 33 || $name_cate == 27 || $name_cate == 34) {

   $ten_toa_nha  = getValue("ten_toa_nha", "str", "POST", "");

   $can_ban_mua  = getValue("can_ban_mua", "int", "POST", "");
   $can_ban_mua  = (int)$can_ban_mua;
   if ($name_cate != 33 && $name_cate != 34) {
      if ($name_cate != 27) {
         $tong_so_tang  = getValue("tong_so_tang", "int", "POST", "");
         $tong_so_tang  = (int)$tong_so_tang;
      }

      $so_pve_sinh  = getValue("so_pve_sinh", "int", "POST", "");
      $so_pve_sinh  = (int)$so_pve_sinh;

      $so_pngu  = getValue("so_pngu", "int", "POST", "");
      $so_pngu  = (int)$so_pngu;
   }

   if ($name_cate == 33 || $name_cate == 27 || $name_cate == 34) {
      $tang_so  = getValue("tang_so", "str", "POST", "");
   }
   if ($name_cate == 27) {
      $loai_hinh_canho  = getValue("loai_hinh_canho", "int", "POST", "");
      $loai_hinh_canho  = (int)$loai_hinh_canho;
   }

   $huong_chinh  = getValue("huong_chinh", "int", "POST", "");
   $huong_chinh  = (int)$huong_chinh;

   $giay_to_phap_ly  = getValue("giay_to_phap_ly", "int", "POST", "");
   $giay_to_phap_ly  = (int)$giay_to_phap_ly;

   $dien_tich  = getValue("dien_tich", "str", "POST", "");

   $tinh_trang_noi_that  = getValue("tinh_trang_noi_that", "int", "POST", "");
   $tinh_trang_noi_that  = (int)$tinh_trang_noi_that;

   if ($name_cate == 26 || $name_cate == 29 || $name_cate == 33 || $name_cate == 27 || $name_cate == 34) {
      $chieu_dai  = getValue("chieu_dai", "str", "POST", "");
      $chieu_rong  = getValue("chieu_rong", "str", "POST", "");
   }
}
//BĐS-ĐẤT
if ($name_cate == 12) {

   $ten_toa_nha  = getValue("ten_toa_nha", "str", "POST", "");

   $chieu_dai  = getValue("chieu_dai", "str", "POST", "");

   $chieu_rong  = getValue("chieu_rong", "str", "POST", "");

   $can_ban_mua  = getValue("can_ban_mua", "int", "POST", "");
   $can_ban_mua  = (int)$can_ban_mua;

   $huong_chinh  = getValue("huong_chinh", "int", "POST", "");
   $huong_chinh  = (int)$huong_chinh;

   $giay_to_phap_ly  = getValue("giay_to_phap_ly", "int", "POST", "");
   $giay_to_phap_ly  = (int)$giay_to_phap_ly;

   $loai_hinh_dat  = getValue("loai_hinh_dat", "int", "POST", "");
   $loai_hinh_dat  = (int)$loai_hinh_dat;

   $dien_tich  = getValue("dien_tich", "str", "POST", "");
}

//Ship
if ($name_cate == 19) {
   $thanhpho  = getValue("thanhpho", "int", "POST", "");
   $thanhpho  = (int)$thanhpho;

   $quanhuyen  = getValue("quanhuyen", "int", "POST", "");
   $quanhuyen  = (int)$quanhuyen;

   $loai_xe  = getValue("loai_xe", "int", "POST", "");
   $loai_xe  = (int)$loai_xe;

   $loai_hang_hoa  = getValue("loai_hang_hoa", "int", "POST", "");
   $loai_hang_hoa  = (int)$loai_hang_hoa;
}

//Nhaccu
if ($name_cate == 100 || $name_cate == 102 || $name_cate == 47 || $name_cate == 48 || $name_cate == 49 || $name_cate == 50 || $name_cate == 106) {
   $loai  = getValue("loai", "int", "POST", "");
   $loai  = (int)$loai;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}
if ($name_cate == 101 || $name_cate == 103 || $name_cate == 43 || $name_cate == 44 || $name_cate == 45 || $name_cate == 46 || $name_cate == 53 || $name_cate == 54 || $name_cate == 60 || $name_cate == 85 || $name_cate == 84 || $name_cate == 87 || $name_cate == 88 || $name_cate == 86 || $name_cate == 116 || $name_cate == 117) {

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}
//ĐỒ GIA DỤNG -TB ĐIỆN LẠNH
if ($name_cate == 56 || $name_cate == 57 || $name_cate == 58 || $name_cate == 59) {
   $loai_thiet_bi  = getValue("loai_thiet_bi", "int", "POST", "");
   $loai_thiet_bi  = (int)$loai_thiet_bi;
   if ($name_cate == 56) {
      $dung_tich  = getValue("dung_tich", "int", "POST", "");
      $dung_tich  = (int)$dung_tich;

      $hang  = getValue("hang", "int", "POST", "");
      $hang  = (int)$hang;

      $cong_suat  = getValue("cong_suat", "int", "POST", "");
      $cong_suat  = (int)$cong_suat;

      $khoi_luong  = getValue("khoi_luong", "int", "POST", "");
      $khoi_luong  = (int)$khoi_luong;
   }
   if ($name_cate == 57) {
      $loai_sanpham  = getValue("loai_sanpham", "int", "POST", "");
      $loai_sanpham  = (int)$loai_sanpham;
   }
   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}

//My PHAM
if ($name_cate == 61) {
   $loai_hinh_sp  = getValue("loai_hinh_sp", "int", "POST", "");
   $loai_hinh_sp  = (int)$loai_hinh_sp;

   $loai_sanpham  = getValue("loai_sanpham", "int", "POST", "");
   $loai_sanpham  = (int)$loai_sanpham;

   $hang  = getValue("hang", "int", "POST", "");
   $hang  = (int)$hang;

   $han_su_dung  = getValue("han_su_dung", "str", "POST", "");
}
//VATTU YTE
if ($name_cate == 63) {

   $loai_sanpham  = getValue("loai_sanpham", "int", "POST", "");
   $loai_sanpham  = (int)$loai_sanpham;

   $hang_vattu  = getValue("hang_vattu", "str", "POST", "");

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}

if ($name_cate == 108) {
   $loai_sanpham  = getValue("loai_sanpham", "int", "POST", "");
   $loai_sanpham  = (int)$loai_sanpham;

   $hang  = getValue("hang", "int", "POST", "");
   $hang  = (int)$hang;

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}

if ($name_cate == 109) {
   $loai_sanpham  = getValue("loai_sanpham", "int", "POST", "");
   $loai_sanpham  = (int)$loai_sanpham;

   $han_su_dung  = getValue("han_su_dung", "str", "POST", "");
}
//Nội tất-phòng khách

if ($name_cate == 78 || $name_cate == 79 || $name_cate == 80 || $name_cate == 82) {
   $nhom_sanpham  = getValue("nhom_sanpham", "int", "POST", "");
   $nhom_sanpham  = (int)$nhom_sanpham;

   $loai_sanpham  = getValue("loai_sanpham", "int", "POST", "");
   $loai_sanpham  = (int)$loai_sanpham;

   $chat_lieu  = getValue("chat_lieu", "int", "POST", "");
   $chat_lieu  = (int)$chat_lieu;

   if ($name_cate == 79) {
      $hinhdang  = getValue("hinhdang", "int", "POST", "");
      $hinhdang  = (int)$hinhdang;
   }

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}
//Tám-ngoạitahat
if ($name_cate == 81 || $name_cate == 118) {

   $loai_sanpham  = getValue("loai_sanpham", "int", "POST", "");
   $loai_sanpham  = (int)$loai_sanpham;

   if ($name_cate == 81) {
      $hang  = getValue("hang", "int", "POST", "");
      $hang  = (int)$hang;

      $hinhdang  = getValue("hinhdang", "int", "POST", "");
      $hinhdang  = (int)$hinhdang;
   }

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}
//THU CUNG
if ($name_cate == 110 || $name_cate == 111 || $name_cate == 113 || $name_cate == 112) {

   $giong_thu_cung  = getValue("giong_thu_cung", "int", "POST", "");
   $giong_thu_cung  = (int)$giong_thu_cung;

   $do_tuoi  = getValue("do_tuoi", "int", "POST", "");
   $do_tuoi  = (int)$do_tuoi;

   $gioi_tinh  = getValue("gioi_tinh", "int", "POST", "");
   $gioi_tinh  = (int)$gioi_tinh;

   $kichco_manhinh  = getValue("kichco_manhinh", "int", "POST", "");
   $kichco_manhinh  = (int)$kichco_manhinh;
}
if ($name_cate == 114) {

   $giong_thu_cung  = getValue("giong_thu_cung", "int", "POST", "");
   $giong_thu_cung  = (int)$giong_thu_cung;

   $nhom_sanpham  = getValue("nhom_sanpham", "int", "POST", "");
   $nhom_sanpham  = (int)$nhom_sanpham;
}

if ($name_cate == 115) {

   $kichco  = getValue("kichco", "str", "POST", "");

   $do_tuoi_thucungkhac  = getValue("do_tuoi_thucungkhac", "str", "POST", "");

   $gioi_tinh  = getValue("gioi_tinh", "int", "POST", "");
   $gioi_tinh  = (int)$gioi_tinh;
}

//THE THAO
if ($name_cate == 75 || $name_cate == 104 || $name_cate == 105) {
   $mon_the_thao  = getValue("mon_the_thao", "int", "POST", "");
   $mon_the_thao  = (int)$mon_the_thao;

   if ($name_cate == 75 || $name_cate == 105) {
      $loai75  = getValue("loai75", "str", "POST", "");
   }

   if ($name_cate == 104) {
      $loai  = getValue("loai", "int", "POST", "");
      $loai  = (int)$loai;
   }

   $tinh_trang  = getValue("tinh_trang", "int", "POST", "");
   $tinh_trang  = (int)$tinh_trang;
}

if ($name_cate == 94 || $name_cate == 95) {
   $loai  = getValue("loai", "int", "POST", "");
   $loai  = (int)$loai;

   $han_su_dung  = getValue("han_su_dung", "str", "POST", "");
}



if ($quan > 0 || $xa > 0 || $price > 0 || $price_den > 0 || $hang > 0 || $hang6 != "" || $dong != "" || $bo_vixuly > 0 || $ram > 0 || $o_cung > 0 || $loai_ocung > 0 || $card_manhinh > 0 || $kichco_manhinh > 0 || $bao_hanh > 0 || $tinh_trang > 0 || $thiet_bi > 0 || $dung_luong > 0 || $mau_sac > 0 || $sudung_sim > 0 || $loai > 0 || $ketnoi_internet > 0 || $phukien_linhkien > 0 || $xuat_xu > 0 || $chat_lieu_khung > 0 || $loai_xe > 0 || $dong_xe > 0 || $dung_tich > 0 || $nam_san_xuat > 0 || $nhien_lieu > 0 || $hop_so > 0 || $so_cho > 0 || $kieu_dang > 0 || $trong_tai > 0 || $loai_phu_tung > 0 || $dong_co > 0 || $loai_noithat > 0 || $can_ban_mua > 0 || $tong_so_tang > 0 || $huong_chinh > 0 || $giay_to_phap_ly > 0 || $so_pve_sinh > 0 || $so_pngu > 0 || $tinh_trang_noi_that > 0 || $dien_tich != "" || $ten_toa_nha != "" || $chieu_dai != "" || $chieu_rong != "" || $tang_so != "" || $loai_hinh_dat > 0 || $loai_hinh_canho > 0 || $thanhpho > 0 || $quanhuyen > 0 || $loai_hang_hoa > 0 || $cong_suat > 0 || $khoi_luong > 0 || $loai_thiet_bi > 0 || $loai_sanpham > 0 || $han_su_dung != "" || $loai_hinh_sp > 0 || $hang_vattu != "" || $nhom_sanpham > 0 || $hinhdang > 0 || $chat_lieu > 0 || $giong_thu_cung > 0 || $do_tuoi > 0 || $gioi_tinh > 0 || $kichco != "" || $do_tuoi_thucungkhac != "" || $loai75 != "" || $mon_the_thao > 0) {
   $sq = "?fill=1";
} else {
   $sq = "";
}

if ($quan > 0) $sq .= "&district=" . $quan;

if ($xa > 0) $sq .= "&ward=" . $xa;

if ($price > 0) $sq .= "&gia_bd=" . $price;

if ($price_den > 0) $sq .= "&gia_kt=" . $price_den;

if ($hang > 0) $sq .= "&hang=" . $hang;

if ($hang6 != "") $sq .= "&hang6=" . $hang6;

if ($dong != "") $sq .= "&dong=" . $dong;

if ($bo_vixuly != "") $sq .= "&bo_vixuly=" . $bo_vixuly;

if ($ram != "") $sq .= "&ram=" . $ram;

if ($o_cung != "") $sq .= "&o_cung=" . $o_cung;

if ($loai_ocung != "") $sq .= "&loai_ocung=" . $loai_ocung;

if ($card_manhinh != "") $sq .= "&card_manhinh=" . $card_manhinh;

if ($kichco_manhinh != "") $sq .= "&kichco_manhinh=" . $kichco_manhinh;

if ($bao_hanh != "") $sq .= "&bao_hanh=" . $bao_hanh;

if ($tinh_trang != "") $sq .= "&tinh_trang=" . $tinh_trang;

if ($thiet_bi != "") $sq .= "&thiet_bi=" . $thiet_bi;

if ($dung_luong != "") $sq .= "&dung_luong=" . $dung_luong;

if ($mau_sac != "") $sq .= "&mau_sac=" . $mau_sac;

if ($sudung_sim != "") $sq .= "&sudung_sim=" . $sudung_sim;

if ($ketnoi_internet != "") $sq .= "&ketnoi_internet=" . $ketnoi_internet;

if ($loai != "") $sq .= "&loai=" . $loai;

if ($phukien_linhkien != "") $sq .= "&phukien_linhkien=" . $phukien_linhkien;

if ($chat_lieu_khung != "") $sq .= "&chat_lieu_khung=" . $chat_lieu_khung;

if ($xuat_xu != "") $sq .= "&xuat_xu=" . $xuat_xu;

if ($dong_xe != "") $sq .= "&dong_xe=" . $dong_xe;

if ($loai_xe != "") $sq .= "&loai_xe=" . $loai_xe;

if ($dung_tich != "") $sq .= "&dung_tich=" . $dung_tich;

if ($nam_san_xuat != "") $sq .= "&nam_san_xuat=" . $nam_san_xuat;

if ($nhien_lieu != "") $sq .= "&nhien_lieu=" . $nhien_lieu;

if ($hop_so != "") $sq .= "&hop_so=" . $hop_so;

if ($so_cho != "") $sq .= "&so_cho=" . $so_cho;

if ($kieu_dang != "") $sq .= "&kieu_dang=" . $kieu_dang;

if ($trong_tai != "") $sq .= "&trong_tai=" . $trong_tai;

if ($loai_phu_tung != "") $sq .= "&loai_phu_tung=" . $loai_phu_tung;

if ($dong_co != "") $sq .= "&dong_co=" . $dong_co;

if ($loai_noithat != "") $sq .= "&loai_noithat=" . $loai_noithat;

//BĐS-NHADAT
if ($dien_tich != "") $sq .= "&dien_tich=" . $dien_tich;

if ($ten_toa_nha != "") $sq .= "&ten_toa_nha=" . $ten_toa_nha;

if ($tinh_trang_noi_that != "") $sq .= "&tinh_trang_noi_that=" . $tinh_trang_noi_that;

if ($so_pngu != "") $sq .= "&so_pngu=" . $so_pngu;

if ($so_pve_sinh != "") $sq .= "&so_pve_sinh=" . $so_pve_sinh;

if ($tong_so_tang != "") $sq .= "&tong_so_tang=" . $tong_so_tang;

if ($huong_chinh != "") $sq .= "&huong_chinh=" . $huong_chinh;

if ($giay_to_phap_ly != "") $sq .= "&giay_to_phap_ly=" . $giay_to_phap_ly;

if ($can_ban_mua != "") $sq .= "&can_ban_mua=" . $can_ban_mua;

//BDS-DAT
if ($chieu_dai != "") $sq .= "&chieu_dai=" . $chieu_dai;

if ($chieu_rong != "") $sq .= "&chieu_rong=" . $chieu_rong;

if ($loai_hinh_dat != "") $sq .= "&loai_hinh_dat=" . $loai_hinh_dat;

if ($tang_so != "") $sq .= "&tang_so=" . $tang_so;

if ($loai_hinh_canho != "") $sq .= "&loai_hinh_canho=" . $loai_hinh_canho;

//SHIP
if ($thanhpho != "") $sq .= "&thanhpho=" . $thanhpho;
if ($quanhuyen != "") $sq .= "&quanhuyen=" . $quanhuyen;
if ($loai_hang_hoa != "") $sq .= "&loai_hang_hoa=" . $loai_hang_hoa;

//ĐỒ GIA DỤNG-TBĐIEN LANH
if ($khoi_luong != "") $sq .= "&khoi_luong=" . $khoi_luong;
if ($cong_suat != "") $sq .= "&cong_suat=" . $cong_suat;
if ($loai_thiet_bi != "") $sq .= "&loai_thiet_bi=" . $loai_thiet_bi;
if ($loai_sanpham != "") $sq .= "&loai_sanpham=" . $loai_sanpham;

//MY PHAM
if ($han_su_dung != "") $sq .= "&han_su_dung=" . $han_su_dung;
if ($loai_hinh_sp != "") $sq .= "&loai_hinh_sp=" . $loai_hinh_sp;

//Vattu
if ($hang_vattu != "") $sq .= "&hang_vattu=" . $hang_vattu;

//Noot thaats phog khack,ngu
if ($nhom_sanpham != "") $sq .= "&nhom_sanpham=" . $nhom_sanpham;
if ($hinhdang != "") $sq .= "&hinhdang=" . $hinhdang;
if ($chat_lieu != "") $sq .= "&chat_lieu=" . $chat_lieu;

//thú cưng
if ($giong_thu_cung != "") $sq .= "&giong_thu_cung=" . $giong_thu_cung;
if ($do_tuoi != "") $sq .= "&do_tuoi=" . $do_tuoi;
if ($gioi_tinh != "") $sq .= "&gioi_tinh=" . $gioi_tinh;

if ($kichco != "") $sq .= "&kichco=" . $kichco;

//THE THAO
if ($mon_the_thao != "") $sq .= "&mon_the_thao=" . $mon_the_thao;
if ($loai75 != "") $sq .= "&loai75=" . $loai75;




if ($new_name != "" && $city == 0 && $name_cate == 0) {
   $link = "/s/" . $new_name . ".html" . $sq;
   // từ khóa trùng với danh mục
   if (array_search(strtolower(str_replace("-", " ", $new_name)), $db_cattk) > 0) {
      $link = "/mua-ban/" . array_search(strtolower(str_replace("-", " ", $new_name)), $db_cattk) . "/" . $new_name . ".html" . $sq;
   };
   // từ khóa trùng với tags đăng tin
   if (array_search(strtolower(str_replace("-", " ", $new_name)), $tags_tk1) > 0) {
      $link = "/mua-ban-" . $new_name . "-t" . array_search(strtolower(str_replace("-", " ", $new_name)), $tags_tk1) . ".html" . $sq;
   };
} else if ($new_name != "" && $city != 0 && $name_cate == 0) {
   $link = "/s/" . $new_name . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . ".html" . $sq;
   // từ khóa tags + tình thành
   if (array_search(strtolower(str_replace("-", " ", $new_name)), $tags_tk1) > 0) {
      $link = "/mua-ban-" . $new_name . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "t" . array_search(strtolower(str_replace("-", " ", $new_name)), $tags_tk1) . ".html" . $sq;
   };
} else if ($new_name != "" && $city == 0 && $name_cate != 0) {
   $link = "/s/" . $new_name . "-thuoc-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-w" . $name_cate . ".html" . $sq;
} else if ($new_name != "" && $city != 0 && $name_cate != 0) {
   $link = "/s/" . $new_name . "-thuoc-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-e" . $city . "-h" . $name_cate . ".html" . $sq;
   if (replaceTitle($new_name) == replaceTitle($db_cat[$name_cate]['cat_name'])) {
      $link = "/mua-ban/rao-vat/" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w" . $name_cate . ".html" . $sq;
   }
} else if ($city != 0 && $name_cate == 0) {
   $link = "/mua-ban/rao-vat/" . $city . "/" . replaceTitle($arrcity[$city]['cit_name']) . ".html" . $sq;
} else if ($city == 0 && $name_cate != 0) {
   $link = "/mua-ban/" . $name_cate . "/" . replaceTitle($db_cat[$name_cate]['cat_name']) . ".html" . $sq;
} else if ($city != 0 && $name_cate != 0) {
   $link = "/mua-ban/rao-vat/" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w" . $name_cate . ".html" . $sq;
} else {
   $link = "/tat-ca-tin-dang-ban.html";
}
header("Location: $link");
die();

?>