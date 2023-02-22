<?
include("config.php");

// $catid = getValue("catid", "int", "GET", 0);
// $catid = (int)$catid;
// $tt_con = $catid;
// $cat_cha = $catid;
// $parent_cat =  search($db_cat, 'cat_id', $catid)[0]['cat_parent_id'];
// if ($parent_cat > 0) {
//     $cat_cha = search($db_cat, 'cat_id', $catid)[0]['cat_parent_id'];
// }
// $citid = getValue("city", "int", "GET", 0);
// $citid = (int)$citid;
// $new_tit = getValue("sp", "str", "GET", "");
// $new_tit = replaceMQ($new_tit);
// $new_tit = strip_tags($new_tit);
// $s_tit = $new_tit;
// $new_tit = str_replace("-", " ", $new_tit);
// $new_tit = str_replace(" ", " ", $new_tit);
// $new_tit = str_replace(" ", " ", $new_tit);
// $new_tit = str_replace(" ", " ", $new_tit);
// $new_tit = str_replace(" ", " ", $new_tit);
// $new_tit = trim($new_tit);

// $sql = "";
// $tags_id = getValue('tags', 'int', 'GET', 0);
// $tags_id = (int)$tags_id;

// $ten_tags = $tags_tk1[$tags_id];

// $nn = getValue('nn', 'int', 'GET', 0);
// $nn = (int)$nn;

// $tennganhnghe = $db_cat_vl[$nn];

// $tagsvl = getValue('tagsvl', 'int', 'GET', 0);
// $tagsvl = (int)$tagsvl;

// $ten_tags_vl = $db_tags_vl[$tagsvl];

// $ord = '';

// $district = getValue("district", "int", "GET", 0);
// $district = (int)$district;

// $ward = getValue("ward", "int", "GET", 0);
// $ward = (int)$ward;

// $price = getValue("gia_bd", "int", "GET", "");
// $price = (int)$price;
// if ($price != '') {
//     $sql .= " AND new_money >= $price ";
// }

// $price_den = getValue("gia_kt", "int", "GET", "");
// $price_den = (int)$price_den;
// if ($price_den != '') {
//     $sql .= " AND new_money <= $price_den ";
// }

// $disid = getValue("disid", "int", "GET", 0);
// $disid = (int)$disid;

// if ($disid == 0) {
//     $disname = "";
// } else {
//     $disname = $arrcity2[$disid]['cit_name'];
// }
// if ($disid != 0) {
//     $sql .= " AND `quan_huyen` = $disid ";
// }
// ////MAY TINH DE BAN
// $hang = getValue("hang", "int", "GET", "");
// $hang = (int)$hang;
// if ($hang > 0) {
//     $sql .= " AND hang = '$hang' ";
// }
// $dong = getValue("dong", "str", "GET", "");
// if ($dong != "") {
//     $sql .= " AND dong_may = '$dong' ";
// }

// $bo_vixuly = getValue("bo_vixuly", "int", "GET", "");
// $bo_vixuly = (int)$bo_vixuly;
// if ($bo_vixuly > 0) {
//     $sql .= " AND bovi_xuly = '$bo_vixuly' ";
// }

// $ram = getValue("ram", "int", "GET", "");
// $ram = (int)$ram;
// if ($ram > 0) {
//     $sql .= " AND ram = '$ram' ";
// }

// $o_cung = getValue("o_cung", "int", "GET", "");
// $o_cung = (int)$o_cung;
// if ($o_cung > 0) {
//     $sql .= " AND o_cung = '$o_cung' ";
// }

// $loai_ocung = getValue("loai_ocung", "int", "GET", "");
// $loai_ocung = (int)$loai_ocung;
// if ($loai_ocung > 0) {
//     $sql .= " AND loai_o_cung = '$loai_ocung' ";
// }

// $card_manhinh = getValue("card_manhinh", "int", "GET", "");
// $card_manhinh = (int)$card_manhinh;
// if ($card_manhinh > 0) {
//     $sql .= " AND man_hinh = '$card_manhinh' ";
// }

// $kichco_manhinh = getValue("kichco_manhinh", "int", "GET", "");
// $kichco_manhinh = (int)$kichco_manhinh;
// if ($kichco_manhinh > 0) {
//     $sql .= " AND kich_co = '$kichco_manhinh' ";
// }

// $bao_hanh = getValue("bao_hanh", "int", "GET", "");
// $bao_hanh = (int)$bao_hanh;
// if ($bao_hanh > 0) {
//     $sql .= " AND new_baohanh = '$bao_hanh' ";
// }

// $tinh_trang = getValue("tinh_trang", "int", "GET", "");
// $tinh_trang = (int)$tinh_trang;
// if ($tinh_trang > 0) {
//     $sql .= " AND new_tinhtrang = '$tinh_trang' ";
// }
// //MAY anh may quay
// $thiet_bi = getValue("thiet_bi", "int", "GET", "");
// $thiet_bi = (int)$thiet_bi;
// if ($thiet_bi > 0) {
//     $sql .= " AND thiet_bi = '$thiet_bi' ";
// }
// $hang6 = getValue("hang6", "str", "GET", "");
// if ($hang6 != 0) {
//     $sql .= " AND hang = '$hang6' ";
// }
// //ĐTDĐ
// $dung_luong = getValue("dung_luong", "int", "GET", "");
// $dung_luong = (int)$dung_luong;
// if ($dung_luong > 0) {
//     $sql .= " AND dung_luong = '$dung_luong' ";
// }

// $mau_sac = getValue("mau_sac", "int", "GET", "");
// $mau_sac = (int)$mau_sac;
// if ($mau_sac > 0) {
//     $sql .= " AND mau_sac = '$mau_sac' ";
// }
// //Máy tính bảng
// $sudung_sim = getValue("sudung_sim", "int", "GET", "");
// $sudung_sim = (int)$sudung_sim;
// if ($sudung_sim > 0) {
//     $sql .= " AND sdung_sim = '$sudung_sim' ";
// }
// //Loa amply tivi
// $loai = getValue("loai", "int", "GET", "");
// $loai = (int)$loai;
// if ($loai > 0) {
//     $sql .= " AND loai_chung = '$loai' ";
// }

// $ketnoi_internet = getValue("ketnoi_internet", "int", "GET", "");
// $ketnoi_internet = (int)$ketnoi_internet;
// if ($ketnoi_internet > 0) {
//     $sql .= " AND knoi_internet = '$ketnoi_internet' ";
// }

// $phukien_linhkien = getValue("phukien_linhkien", "int", "GET", "");
// $phukien_linhkien = (int)$phukien_linhkien;
// if ($phukien_linhkien > 0) {
//     $sql .= " AND link_kien_phu_kien = '$phukien_linhkien' ";
// }

// //xedap
// $chat_lieu_khung = getValue("chat_lieu_khung", "int", "GET", "");
// $chat_lieu_khung = (int)$chat_lieu_khung;
// if ($chat_lieu_khung > 0) {
//     $sql .= " AND chat_lieu_khung = '$chat_lieu_khung' ";
// }

// $xuat_xu = getValue("xuat_xu", "int", "GET", "");
// $xuat_xu = (int)$xuat_xu;
// if ($xuat_xu > 0) {
//     $sql .= " AND xuat_xu = '$xuat_xu' ";
// }

// $dong_xe = getValue("dong_xe", "int", "GET", "");
// $dong_xe = (int)$dong_xe;
// if ($dong_xe > 0) {
//     $sql .= " AND dong_xe = '$dong_xe' ";
// }

// $loai_xe = getValue("loai_xe", "int", "GET", "");
// $loai_xe = (int)$loai_xe;
// if ($loai_xe > 0) {
//     $sql .= " AND loai_xe = '$loai_xe' ";
// }

// //xemays
// $nam_san_xuat = getValue("nam_san_xuat", "int", "GET", "");
// $nam_san_xuat = (int)$nam_san_xuat;
// if ($nam_san_xuat > 0) {
//     $sql .= " AND nam_san_xuat = '$nam_san_xuat' ";
// }

// $dung_tich = getValue("dung_tich", "int", "GET", "");
// $dung_tich = (int)$dung_tich;
// if ($dung_tich > 0) {
//     $sql .= " AND dung_tich = '$dung_tich' ";
// }
// //oto
// $nhien_lieu  = getValue("nhien_lieu", "int", "GET", "");
// $nhien_lieu  = (int)$nhien_lieu;
// if ($nhien_lieu > 0) {
//     $sql .= " AND nhien_lieu = '$nhien_lieu' ";
// }

// $so_cho  = getValue("so_cho", "int", "GET", "");
// $so_cho  = (int)$so_cho;
// if ($so_cho > 0) {
//     $sql .= " AND so_cho = '$so_cho' ";
// }

// $kieu_dang  = getValue("kieu_dang", "int", "GET", "");
// $kieu_dang  = (int)$kieu_dang;
// if ($kieu_dang > 0) {
//     $sql .= " AND kieu_dang = '$kieu_dang' ";
// }

// $hop_so  = getValue("hop_so", "int", "GET", "");
// $hop_so  = (int)$hop_so;
// if ($hop_so > 0) {
//     $sql .= " AND hop_so = '$hop_so' ";
// }
// //xe tải xe khác
// $trong_tai  = getValue("trong_tai", "int", "GET", "");
// $trong_tai  = (int)$trong_tai;
// if ($trong_tai > 0) {
//     $sql .= " AND trong_tai = '$trong_tai' ";
// }
// //phụ tùng xe
// $loai_phu_tung  = getValue("loai_phu_tung", "int", "GET", "");
// $loai_phu_tung  = (int)$loai_phu_tung;
// if ($loai_phu_tung > 0) {
//     $sql .= " AND loai_phu_tung = '$loai_phu_tung' ";
// }
// //xe ddapj,maý ddienej
// $dong_co  = getValue("dong_co", "int", "GET", "");
// $dong_co  = (int)$dong_co;
// if ($dong_co > 0) {
//     $sql .= " AND dong_co = '$dong_co' ";
// }
// //nội thất oto
// $loai_noithat  = getValue("loai_noithat", "int", "GET", "");
// $loai_noithat  = (int)$loai_noithat;
// if ($loai_noithat > 0) {
//     $sql .= " AND loai_noithat = '$loai_noithat' ";
// }

// //BĐS-NHÀ ĐẤT
// $dien_tich = getValue("dien_tich", "str", "GET", "");
// if ($dien_tich != "") {
//     $sql .= " AND dien_tich = '$dien_tich' ";
// }

// $ten_toa_nha = getValue("ten_toa_nha", "str", "GET", "");
// if ($ten_toa_nha != "") {
//     $sql .= " AND ten_toa_nha LIKE '%" . $ten_toa_nha . "%' ";
// }

// $tinh_trang_noi_that  = getValue("tinh_trang_noi_that", "int", "GET", "");
// $tinh_trang_noi_that  = (int)$tinh_trang_noi_that;
// if ($tinh_trang_noi_that > 0) {
//     $sql .= " AND tinh_trang_noi_that = '$tinh_trang_noi_that' ";
// }

// $so_pngu  = getValue("so_pngu", "int", "GET", "");
// $so_pngu  = (int)$so_pngu;
// if ($so_pngu > 0) {
//     $sql .= " AND so_pngu = '$so_pngu' ";
// }

// $so_pve_sinh  = getValue("so_pve_sinh", "int", "GET", "");
// $so_pve_sinh  = (int)$so_pve_sinh;
// if ($so_pve_sinh > 0) {
//     $sql .= " AND so_pve_sinh = '$so_pve_sinh' ";
// }

// $tong_so_tang  = getValue("tong_so_tang", "int", "GET", "");
// $tong_so_tang  = (int)$tong_so_tang;
// if ($tong_so_tang > 0) {
//     $sql .= " AND tong_so_tang = '$tong_so_tang' ";
// }

// $huong_chinh  = getValue("huong_chinh", "int", "GET", "");
// $huong_chinh  = (int)$huong_chinh;
// if ($huong_chinh > 0) {
//     $sql .= " AND huong_chinh = '$huong_chinh' ";
// }

// $giay_to_phap_ly  = getValue("giay_to_phap_ly", "int", "GET", "");
// $giay_to_phap_ly  = (int)$giay_to_phap_ly;
// if ($giay_to_phap_ly > 0) {
//     $sql .= " AND giay_to_phap_ly = '$giay_to_phap_ly' ";
// }

// $can_ban_mua  = getValue("can_ban_mua", "int", "GET", "");
// $can_ban_mua  = (int)$can_ban_mua;
// if ($can_ban_mua > 0) {
//     $sql .= " AND can_ban_mua = '$can_ban_mua' ";
// }

// //BĐS-ĐẤT
// $chieu_dai = getValue("chieu_dai", "str", "GET", "");
// if ($chieu_dai != "") {
//     $sql .= " AND chieu_dai = '$chieu_dai' ";
// }

// $chieu_rong = getValue("chieu_rong", "str", "GET", "");
// if ($chieu_rong != "") {
//     $sql .= " AND chieu_rong = '$chieu_rong' ";
// }

// $loai_hinh_dat  = getValue("loai_hinh_dat", "int", "GET", "");
// $loai_hinh_dat  = (int)$loai_hinh_dat;
// if ($loai_hinh_dat > 0) {
//     $sql .= " AND loai_hinh_dat = '$loai_hinh_dat' ";
// }

// //BDS-CUAHANG
// $tang_so = getValue("tang_so", "str", "GET", "");
// if ($tang_so != "") {
//     $sql .= " AND tang_so = '$tang_so' ";
// }
// //BDS-CHUNGCU
// $loai_hinh_canho  = getValue("loai_hinh_canho", "int", "GET", "");
// $loai_hinh_canho  = (int)$loai_hinh_canho;
// if ($loai_hinh_canho > 0) {
//     $sql .= " AND loai_hinh_canho = '$loai_hinh_canho' ";
// }
// //Ship
// $thanhpho  = getValue("thanhpho", "int", "GET", "");
// $thanhpho  = (int)$thanhpho;
// if ($thanhpho > 0) {
//     $sql .= " AND new_city = '$thanhpho' ";
// }

// $quanhuyen  = getValue("quanhuyen", "int", "GET", "");
// $quanhuyen  = (int)$quanhuyen;
// if ($quanhuyen > 0) {
//     $sql .= " AND quan_huyen = '$quanhuyen' ";
// }

// $loai_hang_hoa  = getValue("loai_hang_hoa", "int", "GET", "");
// $loai_hang_hoa  = (int)$loai_hang_hoa;
// if ($loai_hang_hoa > 0) {
//     $sql .= " AND loai_hang_hoa = '$loai_hang_hoa' ";
// }

// //ĐỒ GIA DỤNG-TBĐIEN LANH
// $khoi_luong  = getValue("khoi_luong", "int", "GET", "");
// $khoi_luong  = (int)$khoi_luong;
// if ($khoi_luong > 0) {
//     $sql .= " AND khoi_luong = '$khoi_luong' ";
// }

// $cong_suat  = getValue("cong_suat", "int", "GET", "");
// $cong_suat  = (int)$cong_suat;
// if ($cong_suat > 0) {
//     $sql .= " AND cong_suat = '$cong_suat' ";
// }

// $loai_thiet_bi  = getValue("loai_thiet_bi", "int", "GET", "");
// $loai_thiet_bi  = (int)$loai_thiet_bi;
// if ($loai_thiet_bi > 0) {
//     $sql .= " AND loai_thiet_bi = '$loai_thiet_bi' ";
// }
// $loai_sanpham  = getValue("loai_sanpham", "int", "GET", "");
// $loai_sanpham  = (int)$loai_sanpham;
// if ($loai_sanpham > 0) {
//     $sql .= " AND loai_sanpham = '$loai_sanpham' ";
// }

// //my pham
// $loai_hinh_sp  = getValue("loai_hinh_sp", "int", "GET", "");
// $loai_hinh_sp  = (int)$loai_hinh_sp;
// if ($loai_hinh_sp > 0) {
//     $sql .= " AND loai_hinh_sp = '$loai_hinh_sp' ";
// }

// $han_su_dung = getValue("han_su_dung", "str", "GET", "");
// $exp = strtotime($han_su_dung);
// if ($han_su_dung != "") {
//     $sql .= " AND han_su_dung = '$exp' ";
// }
// //Vattu yte
// $hang_vattu = getValue("hang_vattu", "str", "GET", "");
// if ($hang_vattu != "") {
//     $sql .= " AND hang_vattu LIKE '%" . $hang_vattu . "%' ";
// }

// //Nội thất phòng khách,ngủ
// $nhom_sanpham  = getValue("nhom_sanpham", "int", "GET", "");
// $nhom_sanpham  = (int)$nhom_sanpham;
// if ($nhom_sanpham > 0) {
//     $sql .= " AND nhom_sanpham = '$nhom_sanpham' ";
// }

// $hinhdang  = getValue("hinhdang", "int", "GET", "");
// $hinhdang  = (int)$hinhdang;
// if ($hinhdang > 0) {
//     $sql .= " AND hinhdang = '$hinhdang' ";
// }

// $chat_lieu  = getValue("chat_lieu", "int", "GET", "");
// $chat_lieu  = (int)$chat_lieu;
// if ($chat_lieu > 0) {
//     $sql .= " AND chat_lieu = '$chat_lieu' ";
// }

// //thú cung
// $giong_thu_cung  = getValue("giong_thu_cung", "int", "GET", "");
// $giong_thu_cung  = (int)$giong_thu_cung;
// if ($giong_thu_cung > 0) {
//     $sql .= " AND giong_thu_cung = '$giong_thu_cung' ";
// }

// $do_tuoi  = getValue("do_tuoi", "int", "GET", "");
// $do_tuoi  = (int)$do_tuoi;
// if ($do_tuoi > 0) {
//     $sql .= " AND do_tuoi = '$do_tuoi' ";
// }

// $gioi_tinh  = getValue("gioi_tinh", "int", "GET", "");
// $gioi_tinh  = (int)$gioi_tinh;
// if ($gioi_tinh > 0) {
//     $sql .= " AND gioi_tinh = '$gioi_tinh' ";
// }

// $kich_co  = getValue("kich_co", "int", "GET", "");
// $kich_co  = (int)$kich_co;
// if ($kich_co > 0) {
//     $sql .= " AND kich_co = '$kich_co' ";
// }


// //tcung khac
// $kichco = getValue("kichco", "str", "GET", "");
// if ($kichco != "") {
//     $sql .= " AND kich_co LIKE '%" . $kichco . "%' ";
// }
// $do_tuoi_thucungkhac = getValue("do_tuoi_thucungkhac", "str", "GET", "");
// if ($do_tuoi_thucungkhac != "") {
//     $sql .= " AND do_tuoi LIKE '%" . $do_tuoi_thucungkhac . "%' ";
// }

// //THE THAO
// $loai75 = getValue("loai75", "str", "GET", "");
// if ($loai75 != "") {
//     $sql .= " AND loai_chung LIKE '%" . $loai75 . "%' ";
// }

// $mon_the_thao  = getValue("mon_the_thao", "int", "GET", "");
// $mon_the_thao  = (int)$mon_the_thao;
// if ($mon_the_thao > 0) {
//     $sql .= " AND mon_the_thao = '$mon_the_thao' ";
// }

// $arr_tinhtrang1 = array(
//     1 => 'Mới',
//     2 => 'Đã sử dụng',
// );

// $arr_tinhtrang2 = array(
//     1 => 'Mới',
//     2 => 'Đã sử dụng (chưa sửa chữa)',
//     3 => 'Đã sử dụng (qua sửa chữa)',
// );

// $arr_tinhtrang3 = array(
//     1 => 'Mới',
//     2 => 'Cũ (Chưa sửa chữa)',
//     3 => 'Cũ (Đã sửa chữa)',
// );

// $arr_cokhong = array(
//     1 => 'Có',
//     2 => 'Không',
// );

// $arr_hopso = array(
//     1 => 'Tự động',
//     2 => 'Số sàn',
//     3 => 'Bán tự động',
// );

// $arr_nhienlieu = array(
//     1 => 'Xăng',
//     2 => 'Dầu',
//     3 => 'Động cơ Hybird',
//     4 => 'Điện',
// );

// $arr_huongchinh = array(
//     1 => 'Đông',
//     2 => 'Tây',
//     3 => 'Nam',
//     4 => 'Bắc',
//     5 => 'Đông bắc',
//     6 => 'Đông nam',
//     7 => 'Tây bắc',
//     8 => 'Tây nam',
// );

// $arr_giaytophaply = array(
//     1 => 'Đã có sổ',
//     2 => 'Đang chờ sổ',
//     3 => 'Giấy tờ khác',
// );

// $arr_ttnoithat = array(
//     1 => 'Nội thất cao cấp',
//     2 => 'Nội thất đầy đủ',
//     3 => 'Hoàn thiện cơ bản',
//     4 => 'Bàn giao thô',
// );
// // loai hinh dat
// $arr_loaihinh = array(
//     1 => 'Đất thổ cư',
//     2 => 'Đất nền dự án',
//     3 => 'Đất công nghiệp',
//     4 => 'Đất nông nghiệp',
// );
// // loai hinh can ho chung cu
// $arr_lhcanho = array(
//     1 => 'Chung cư',
//     2 => 'Duplex',
//     3 => 'Penthouse',
//     4 => 'Căn hộ dịch vụ, mini',
//     5 => 'Tập thể, cư xá',
//     6 => 'Officetel',
// );
// // loai hinh van phong
// $arr_lhcanho = array(
//     1 => 'Mặt bằng kinh doanh',
//     2 => 'Văn phòng',
//     3 => 'Shophouse',
//     4 => 'Officetel',
// );

// $phanbiet_mc = getValue('sort', 'int', 'GET', 1);
// if ($phanbiet_mc == 1) {
//     $sql1 = " ORDER BY  new_pin_cate DESC, new_view_count DESC, new_update_time DESC ";
// } else if ($phanbiet_mc == 2) {
//     $sql1 = " ORDER BY new_pin_cate DESC, new_update_time DESC ";
// } else if ($phanbiet_mc == 3) {
//     $sql1 = " AND new_type = 5 ORDER BY new_pin_cate DESC, new_update_time DESC ";
// } else if ($phanbiet_mc == 4) {
//     $sql1 = " AND new_type = 1 ORDER BY new_pin_cate DESC, new_update_time DESC ";
// }

// $fill = getValue('fill', 'int', 'GET', 0);
// isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
// isset($_GET['curr']) ? $curr = $_GET['curr'] : $curr = 10;

// $start = ($page - 1) * $curr;
// $start = abs($start);

// $limit = " LIMIT $start,$curr ";
// $rv_page = '&page=' . $page;
// // echo $fill;
// if ($fill == 0) {
//     $url = $_SERVER['REQUEST_URI'] . '?fill=1';
//     $url = str_replace($rv_page, '', $url);
// } else {
//     $url = $_SERVER['REQUEST_URI'];
//     $url = str_replace($rv_page, '', $url);
// }
// echo $url;

$curl = curl_init();
$data = array(
    'site' => 'spraonhanh365',
    'size' => '20',
    'pagination' => 1,
    'new_city' => 1,
);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.10:5003/search_sanpham');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$response = curl_exec($curl);
print_r($response);die;
curl_close($curl);

$data_list = json_decode($response, true);
print_r($data_list);die;

$list_tt = $data_list['data']['list_id'];
echo "<pre>";
print_r($list_tt);
echo "</pre>";


// if ($catid == 0 && $citid == 0) {
//     $db_qra = new db_query("SELECT new.`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_city`, `dia_chi`, `new_money`, `gia_kt`, `new_view_count`,
//                             `new_unit`, `new_image`, `chotang_mphi`, `new_update_time`, new_description, new_user_id, usc_name, chat365_id
//                             FROM new
//                             LEFT JOIN new_description ON new.new_id = new_description.new_id
//                             LEFT JOIN user ON new.new_user_id = user.usc_id
//                             WHERE new_buy_sell = 2 and new_active = 1 " . $sql . " " . $sql1 . " " . $limit . " ");

//     $numrow = new db_query("SELECT count(new.new_id) AS cou_td FROM new LEFT JOIN new_description ON new.new_id = new_description.new_id
//                             LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 AND new_buy_sell = 2 " . $sql . "");
// } else if ($catid != 0 && $citid == 0) {
//     if ($rowcat['cat_parent_id'] == 0) {
//         $cauqr = "(new_cate_id = " . $catid . " OR cat_parent_id = " . $catid . ")";
//     } else {
//         $cauqr = "new_cate_id = " . $catid . "";
//     }

//     $db_qra = new db_query("SELECT new.`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_city`, `dia_chi`, `new_money`, `gia_kt`, `new_view_count`,
//                             `new_unit`, `new_image`, `chotang_mphi`, `new_update_time`, new_description, new_user_id, usc_name, chat365_id  FROM new
//                             LEFT JOIN new_description ON new.new_id = new_description.new_id
//                             LEFT JOIN category ON new.new_cate_id = category.cat_id
//                             LEFT JOIN user ON new.new_user_id = user.usc_id
//                             WHERE new_buy_sell = 2 AND new_active = 1 " . $sql . "  AND " . $cauqr . " " . $sql1 . " " . $limit . " ");

//     $numrow = new db_query("SELECT count(new.new_id) AS cou_td FROM new LEFT JOIN new_description ON new.new_id = new_description.new_id LEFT JOIN category
//                             ON new.new_cate_id = category.cat_id WHERE new_active = 1 AND new_buy_sell = 2 " . $sql . " AND " . $cauqr . " ");
// } else if ($catid == 0 && $citid != 0) {
//     $db_qra = new db_query("SELECT new.`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_city`, `dia_chi`, `new_money`, `gia_kt`, `new_view_count`,
//                             `new_unit`, `new_image`, `chotang_mphi`, `new_update_time`, new_description, new_user_id, usc_name, chat365_id  FROM new
//                             LEFT JOIN new_description ON new.new_id = new_description.new_id
//                             LEFT JOIN user ON new.new_user_id = user.usc_id
//                             WHERE new_buy_sell = 2 AND new_active = 1 AND new_city = " . $citid . " " . $sql . " " . $sql1 . " " . $limit . " ");

//     $numrow = new db_query("SELECT count(new.new_id) AS cou_td FROM new LEFT JOIN new_description ON new.new_id = new_description.new_id
//                             LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 AND new_buy_sell = 2 AND new_city = " . $citid . " " . $sql . "");
// } else if ($catid != 0 && $citid != 0) {
//     if ($rowcat['cat_parent_id'] == 0) {
//         $cauqr = "(new_cate_id = " . $catid . " OR cat_parent_id = " . $catid . ")";
//     } else {
//         $cauqr = "new_cate_id = " . $catid . "";
//     }

//     $db_qra = new db_query("SELECT new.`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_city`, `dia_chi`, `new_money`, `gia_kt`, `new_view_count`,
//                             `new_unit`, `new_image`, `chotang_mphi`, `new_update_time`, new_description, new_user_id, usc_name, chat365_id  FROM new
//                             LEFT JOIN new_description ON new.new_id = new_description.new_id
//                             LEFT JOIN category ON new.new_cate_id = category.cat_id
//                             LEFT JOIN user ON new.new_user_id = user.usc_id
//                             WHERE new_buy_sell = 2 AND new_active = 1 " . $sql . " AND new_city = " . $citid . "  AND " . $cauqr . " " . $sql1 . " " . $limit . "");

//     $numrow = new db_query("SELECT count(new.new_id) AS cou_td FROM new LEFT JOIN new_description ON new.new_id = new_description.new_id LEFT JOIN category
//                             ON new.new_cate_id = category.cat_id WHERE new_active = 1 AND new_buy_sell = 2 " . $sql . " AND new_city = " . $citid . "  AND " . $cauqr . " ");
// }

$total = mysql_fetch_assoc($numrow->result)['cou_td'];
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
                                        <? if ($citid != 0 && $disid == 0 && $ward == 0) {
                                            echo $arrcity2[$citid]['cit_name'];
                                        } else if ($citid != 0 && $disid != 0 && $ward == 0) {
                                            echo $arrcity2[$disid]['cit_name'] . ', ' . $arrcity2[$citid]['cit_name'];
                                        } else if ($citid != 0 && $disid != 0 && $ward != 0) {
                                            echo $db_pxa[$ward]['prefix'] . ' ' . $db_pxa[$ward]['name'] . ', ' . $arrcity2[$disid]['cit_name'] . ', ' . $arrcity2[$citid]['cit_name'];
                                        } else if ($citid == 0 && $disid == 0 && $ward == 0) {
                                            echo "Toàn quốc";
                                        } ?>
                                    </p>
                                </div>
                                <div class="ctkiem_tdang_ban active click_dm_show">
                                    <p class="tkiem_rkq active" onclick="show_ct_con_int(<?= $cat_cha ?>,'<?= $db_cat[$catid]['cat_name'] ?>')">
                                        <?= ($catid > 0) ? $db_cat[$catid]['cat_name'] : "Danh mục sản phẩm" ?>
                                    </p>
                                </div>
                                <div class="select_seach d_none">
                                    <select class="select slect-hang" name="tkiem_ttoan_dbao">
                                        <option value="">Có thanh toán đảm bảo</option>
                                        <option value="1">Có</option>
                                        <option value="2">Không</option>
                                    </select>
                                </div>
                                <div class="ctkiem_tdang_ban active click_showpopup_gia">
                                    <p class="tkiem_rkq active">
                                        <? if ($price != 0 && $price_den != 0) {
                                            echo 'Từ ' . $price . ' - ' . 'đến ' . $price_den;
                                        } else if ($price > 0 && $price_den == 0) {
                                            echo 'Từ ' . $price;
                                        } else if ($price == 0 && $price_den > 0) {
                                            echo 'Đến ' . $price_den;
                                        } else {
                                            echo "Giá";
                                        } ?>
                                    </p>
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
                    <div class="khachang_chatol" id="list_chat">

                    </div>
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
                <h1 class="kqua_timkiem cr_weight sh_clr_two">aaaa</h1>
                <div class="check_ut_2">
                    <p>Ưu tiên hiển thị:</p>
                    <div class="d_flex">
                        <input type="radio" name="sort" <?= ($phanbiet_mc == 1) ? 'checked' : '' ?> value="1" class="check_pb" id="check_pb1">
                        <label for="check_pb1" class="input_pb"></label>
                        <label for="check_pb1" class="input_pb_t">Phổ biến nhất</label>
                    </div>
                    <div class="d_flex">
                        <input type="radio" name="sort" <?= ($phanbiet_mc == 2) ? 'checked' : '' ?> value="2" class="check_pb" id="check_pb2">
                        <label for="check_pb2" class="input_pb"></label>
                        <label for="check_pb2" class="input_pb_t">Mới nhất</label>
                    </div>
                    <div class="d_flex">
                        <input type="radio" name="sort" <?= ($phanbiet_mc == 3) ? 'checked' : '' ?> value="3" class="check_pb" id="check_pb3">
                        <label for="check_pb3" class="input_pb"></label>
                        <label for="check_pb3" class="input_pb_t">Doanh nghiêp</label>
                    </div>
                    <div class="d_flex">
                        <input type="radio" name="sort" <?= ($phanbiet_mc == 4) ? 'checked' : '' ?> value="4" class="check_pb" id="check_pb4">
                        <label for="check_pb4" class="input_pb"></label>
                        <label for="check_pb4" class="input_pb_t">Cá nhân</label>
                    </div>
                </div>
            </div>
            <!-- <div class="tin_dang_spban" id="tin_dang_spban" data="<?= $citid ?>" data1="<?= $catid ?>" data2="<?= $sql ?>" data3="<?= $cauqr ?>" data4="<?= $sql1 ?>" data5="<?= mysql_fetch_assoc($numrow->result)['cou_td'] ?>" data6="0" data7="20" data8="2" data9="20" data10="<?= $price ?>" data11="<?= $price_den ?>">
                <? while ($row_db = mysql_fetch_assoc($db_qra->result)) {
                    $link_url = ($row_db['link_title'] != '') ? replaceTitle($row_db['link_title']) : replaceTitle($row_db['new_title']); ?>
                    <div class="content_td">
                        <div class="tin">
                            <div class="chitiet_tin d_flex">
                                <div class="img_tin">
                                    <div class="onl_off_chat po_ra">
                                        <img class="img_tin_2" onerror="this.onerror=null;this.src='/images/img_new/avt_daidien3.png'" src="<?= explode(';', $row_db['new_image'])[0] ?>">
                                        <span class="nhanbiet_onoff item_chat" id-chat="<?= $row_db['chat365_id'] ?>"></span>
                                    </div>
                                    <div class="d_flex j_bw">
                                        <a class="btn_chat item_chat" id-chat="<?= $row_db['chat365_id'] ?>">
                                            <img src="/images/anh_moi/chat365.svg">
                                            <span>Chat</span>
                                        </a>
                                        <p class="favo"></p>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="title">
                                        <div class="title-1">
                                            <p class="font_w500 font_s16 tieude_sp">
                                                <a href="/<?= $link_url . '-c' . $row_db['new_id'] . '.html' ?>" class="sh_size_one sh_clr_two cr_weight">
                                                    <?= $row_db['new_title'] ?>
                                                </a>
                                            </p>
                                            <button class="favo active"></button>
                                        </div>
                                        <div class="people">
                                            <span><?= $row_db['usc_name'] ?></span>
                                        </div>
                                    </div>
                                    <div class="info-2">
                                        <div class="info-2-child cost">
                                            <span>
                                                <? if ($row_db['new_cate_id'] != 120) {
                                                    if ($row_db['chotang_mphi'] == 1) {
                                                        echo "Cho tặng miễn phí";
                                                    } else if ($row_db['new_money'] > 0) {
                                                        echo number_format($row_db['new_money']) . ' ' . $arr_dvtien[$row_db['new_unit']];
                                                    } else if ($row_db['new_money'] == 0 || $row_db['new_money'] == "") {
                                                        echo "Liên hệ người bán";
                                                    }
                                                } else {
                                                    if ($row_db['new_money'] != 0 && $row_db['gia_kt'] != 0) {
                                                        echo number_format($row_db['new_money']) . ' - ' . number_format($row_db['gia_kt']) . ' ' . $arr_dvtien[$row_db['new_unit']];
                                                    } else if ($row_db['new_money'] != 0 && $row_db['gia_kt'] == 0) {
                                                        echo 'Từ ' . number_format($row_db['new_money']) . ' ' . $arr_dvtien[$row_db['new_unit']];
                                                    } else if ($row_db['new_money'] == 0 && $row_db['gia_kt'] != 0) {
                                                        echo 'Đến ' . number_format($row_db['gia_kt']) . ' ' . $arr_dvtien[$row_db['new_unit']];
                                                    } else {
                                                        echo "Thỏa thuận";
                                                    }
                                                } ?>
                                            </span>
                                        </div>
                                        <div class="info-2-child add">
                                            <span><?= $row_db['dia_chi'] ?></span>
                                        </div>
                                        <div class="info-2-child time">
                                            <span>Đăng: <?= lay_tgian($row_db['new_update_time']) ?></span>
                                        </div>
                                        <div class="info-2-child pay">
                                            <span>Đảm bảo thanh toán: <?= ($xacthuc_lket == 1) ? 'có' : 'không' ?></span>
                                        </div>
                                    </div>
                                    <div class="mota">
                                        <p class="mota_child"><?= $row_db['new_description'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <? include('../includes/comment_tk/inc_comment.php') ?>
                        </div>
                    </div>
                <? } ?>
            </div> -->
            <div class="tin_dang_spban" id="tin_dang_spban" data="<?= $citid ?>" data1="<?= $catid ?>" data2="<?= $sql ?>" data3="<?= $cauqr ?>" data4="<?= $sql1 ?>" data5="<?= mysql_fetch_assoc($numrow->result)['cou_td'] ?>" data6="0" data7="20" data8="2" data9="20" data10="<?= $price ?>" data11="<?= $price_den ?>">
                <?
                //while ($row_db = mysql_fetch_assoc($db_qra->result)) {
                foreach ($list_tt as $row_db) {
                    $link_url = ($row_db['link_title'] != '') ? replaceTitle($row_db['link_title']) : replaceTitle($row_db['new_title']); ?>
                    <div class="content_td">
                        <div class="tin">
                            <div class="chitiet_tin d_flex">
                                <div class="img_tin">
                                    <div class="onl_off_chat po_ra">
                                        <img class="img_tin_2" onerror="this.onerror=null;this.src='/images/img_new/avt_daidien3.png'" src="<?= explode(';', $row_db['new_image'])[0] ?>">
                                        <span class="nhanbiet_onoff item_chat" id-chat="<?= $row_db['chat365_id'] ?>"></span>
                                    </div>
                                    <div class="d_flex j_bw">
                                        <a class="btn_chat item_chat" id-chat="<?= $row_db['chat365_id'] ?>">
                                            <img src="/images/anh_moi/chat365.svg">
                                            <span>Chat</span>
                                        </a>
                                        <p class="favo"></p>
                                    </div>
                                </div>
                                <div class="info">
                                    <div class="title">
                                        <div class="title-1">
                                            <p class="font_w500 font_s16 tieude_sp">
                                                <a href="/<?= $link_url . '-c' . $row_db['new_id'] . '.html' ?>" class="sh_size_one sh_clr_two cr_weight">
                                                    <?= $row_db['new_title'] ?>
                                                </a>
                                            </p>
                                            <button class="favo active"></button>
                                        </div>
                                        <div class="people">
                                            <span><?= $row_db['usc_name'] ?></span>
                                        </div>
                                    </div>
                                    <div class="info-2">
                                        <div class="info-2-child cost">
                                            <span>
                                                <? if ($row_db['new_cate_id'] != 120) {
                                                    if ($row_db['chotang_mphi'] == 1) {
                                                        echo "Cho tặng miễn phí";
                                                    } else if ($row_db['new_money'] > 0) {
                                                        echo number_format($row_db['new_money']) . ' ' . $arr_dvtien[$row_db['new_unit']];
                                                    } else if ($row_db['new_money'] == 0 || $row_db['new_money'] == "") {
                                                        echo "Liên hệ người bán";
                                                    }
                                                } else {
                                                    if ($row_db['new_money'] != 0 && $row_db['gia_kt'] != 0) {
                                                        echo number_format($row_db['new_money']) . ' - ' . number_format($row_db['gia_kt']) . ' ' . $arr_dvtien[$row_db['new_unit']];
                                                    } else if ($row_db['new_money'] != 0 && $row_db['gia_kt'] == 0) {
                                                        echo 'Từ ' . number_format($row_db['new_money']) . ' ' . $arr_dvtien[$row_db['new_unit']];
                                                    } else if ($row_db['new_money'] == 0 && $row_db['gia_kt'] != 0) {
                                                        echo 'Đến ' . number_format($row_db['gia_kt']) . ' ' . $arr_dvtien[$row_db['new_unit']];
                                                    } else {
                                                        echo "Thỏa thuận";
                                                    }
                                                } ?>
                                            </span>
                                        </div>
                                        <div class="info-2-child add">
                                            <span><?= $row_db['dia_chi'] ?></span>
                                        </div>
                                        <div class="info-2-child time">
                                            <span>Đăng: <?= lay_tgian($row_db['new_update_time']) ?></span>
                                        </div>
                                        <div class="info-2-child pay">
                                            <span>Đảm bảo thanh toán: <?= ($xacthuc_lket == 1) ? 'có' : 'không' ?></span>
                                        </div>
                                    </div>
                                    <div class="mota">
                                        <p class="mota_child"><?= $row_db['new_description'] ?></p>
                                    </div>
                                </div>
                            </div>
                            <? include('../includes/comment_tk/inc_comment.php') ?>
                        </div>
                    </div>
                <? } ?>
            </div>
            <!-- <div class="ctn_phantrang">
                <ul>
                    <?= generatePageBar3('', $page, $curr, $total, $url, '&', '', 'active', 'preview', '<', 'next', '>', '', '<<<', '', '>>>'); ?>
                </ul>
            </div> -->
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
    <script type="text/javascript">
        // id người xem
        const uid_view = '<?= $_COOKIE["id_chat365"]; ?>';
        // avatar người xem
        const uid_ava = '<?= $logo_v; ?>';
        // tên người xem
        const uid_name = '<?= $user_name ?>';
        // id người tạo
        // const uid_author = <? //$new_user_id;
                                ?>;

        var hastag_cm = [];

        if (uid_ava != '' && uid_view > 0) {
            $('.img_user').attr('src', uid_ava);
        }

        // $(".comment_event").click(function() {
        //     $(this).parents(".box_cm_body").find(".order_cm").show();
        // })

        function cm_show(id) {
            $(id).parents(".box_cm_body").find(".order_cm").show();
        }
    </script>
    <script src="/js/socket_cm2.js?v=<?= $version; ?>"></script>
    <? if (!isset($$_COOKIE['UID']) && !isset($$_COOKIE['UT'])) { ?>
        <script>
            $('.btn_login_do').click(function() {
                if (document.cookie.indexOf('id_chat365=') == -1) {
                    $('.ct_cm').blur();
                    $(".overlay_dn").addClass("active");
                    // window.open('http://raonhanh365.vn/dang-nhap.html', '_blank').focus();
                } else {
                    window.location.reload();
                }
            });
        </script>
    <? } ?>
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


    function laygia_tri(t) {
        var id_dm = $(t).attr("data1");
        var gia_tri = $(t).attr("data");
        var id_cha = $(t).attr("data3");
        var checked = $(t).attr("data2");

        $.ajax({
            url: '/render/lay_thuoc_tinh.php',
            type: 'POST',
            data: {
                id_dm: id_dm,
                gia_tri: gia_tri,
                id_cha: id_cha,
                checked: checked,
            },
            success: function(data) {
                $(".tintuc_tkiem").find(".baogom_tkiem").html(data);
                $(".tintuc_tkiem").addClass('active').show();
            }
        })
    };

    function close_tki() {
        $(".tintuc_tkiem").removeClass('active').hide();
    };

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
    $('.click_showpopup_gia').click(function() {
        $('.pop_gia').show();
    });
    $('.close').click(function() {
        $('.khu_vuc,.pop_gia').hide();
    });
    $('.click_dm_show').click(function() {
        $('.hd_modal_danhmuc_td_df').fadeIn(500);
    });

    $('.click_dong_dm').click(function() {
        $('.hd_modal_danhmuc_td_df').fadeOut(500);
    });

    $('.click_xn_kv').click(function() {
        var str_get = '<?= strstr($_SERVER['QUERY_STRING'], '&'); ?>';
        var txt = (str_get != "") ? str_get : "";
        if ($('.tintuc_tkiem').hasClass('active')) {
            var name_inp = $('.tintuc_tkiem').find("input[type='radio']").attr('name');
            var giatri = Number($("input[name='" + name_inp + "']:checked").val());

            var name_tex = $('.tintuc_tkiem').find("input[type='text']").attr('name');
            var giatri_tex = $("input[name='" + name_tex + "']").val();

            var name_date = $('.tintuc_tkiem').find("input[type='date']").attr('name');
            var giatri_date = $("input[name='" + name_date + "']").val();
            var giatri_dat = new Date(giatri_date).getTime();

            txt = txt.replace("&fill=1", "");
            if (giatri > 0) {
                var regx = "/" + name_inp + "=+[0-9]{1,3}/g";
                txt = txt.replace(eval(regx), "");
                txt += "&" + name_inp + "=" + giatri;
            }
            if (giatri_tex != "" && giatri_tex != undefined) {
                var regx2 = "/" + name_tex + "=+[a-zA-Z0-9]{1,}/g";
                txt = txt.replace(eval(regx2), "");
                txt += "&" + name_tex + "=" + giatri_tex;
            }

            if (giatri_dat > 0) {
                var regx3 = "/" + name_date + "=+[a-zA-Z0-9]{1,}/g";
                txt = txt.replace(eval(regx3), "");
                txt += "&" + name_date + "=" + giatri_date;
            }
        }
        search_th(0, txt);
    });

    // sap xep theo thu tu
    $('.check_pb').click(function() {
        var str_get = '<?= strstr($_SERVER['QUERY_STRING'], '&'); ?>';
        var txt = (str_get != "") ? str_get : "";
        if ($('.check_pb').is(":checked")) {
            var name_inp = $(this).attr('name');
            var giatri = Number($("input[name='" + name_inp + "']:checked").val());
            txt = txt.replace("&fill=1", "");
            console.log(txt);
            if (giatri > 0) {
                var regx = "/" + name_inp + "=+[0-9]{1,3}/g";
                txt = txt.replace(eval(regx), "");
                txt += "&" + name_inp + "=" + giatri;
            }
        }
        search_th(0, txt);
    });

    $('.cate_con_back, .close_catecon').click(function() {
        $('.hd_modal_danhmuc_td_df').fadeIn(500);
        $('.hd_modal_do_dt_df').fadeOut(500);
    });
    $('.huy_loc').click(function() {
        location.href = "<?= $_SERVER['REDIRECT_URL'] ?>";
    })
    // Danh mục con
    function show_ct_con_int(cate_con, cate_name) {
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
                        html += `<ul class="ul_hd_modal_do_dt hd-padding-20 click_child_` + data[i].cat_id + `"  onclick="search_th(` + data[i].cat_id + `)" data="` + data[i].cat_id + `" data-name="` + data[i].cat_name + `">
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

    function search_th(catid = 0, txt = '') {
        var key = $('.key_search').val();
        var kv_city = $('.toanquoc').val();
        var kv_dis = $('.md_quan_huyen').val();
        var kv_wards = $('.md_phuong_xa ').val();
        var cat_id = (catid == 0) ? <?= $catid ?> : catid;
        var gia_tu = $('.gia_tu').val();
        var gia_den = $('.gia_den').val();
        var giatu_cu = $("#tin_dang_spban").attr("data10");
        var giaden_cu = $("#tin_dang_spban").attr("data11");
        $.ajax({
            url: '/ajax/search_th.php',
            type: "POST",
            data: {
                phan_biet_mb: 2,
                key: key,
                cat_id: cat_id,
                kv_city: kv_city,
                kv_dis: kv_dis,
                kv_wards: kv_wards,
                gia_tu: gia_tu,
                gia_den: gia_den,
                txt: txt,
                giatu_cu: giatu_cu,
                giaden_cu: giaden_cu,
            },
            success: function(data) {
                location.href = data;
            }
        })

    }

    $(document).ready(function() {
        $('.tin_dang_spban').scroll(function() {
            var id_city = $(this).attr("data"); // id tỉnh thành
            var id_cate = $(this).attr("data1"); // id danh mục
            var cl_sql = $(this).attr("data2");
            var cl_cauqr = $(this).attr("data3");
            var cl_sql1 = $(this).attr("data4");

            var cou_tt = $(this).attr('data5'); // tổng số tin đăng
            var load = Number($(this).attr('data7')); // số tin đã lấy ra
            var div = document.getElementById('tin_dang_spban');
            var bottom = div.scrollHeight - div.clientHeight;
            var scr = $(this).scrollTop();
            var distance = scr - bottom;
            var is_loadh = $('.tin_dang_spban').attr('data9'); // số tin một lần thêm vào
            var page = Number($(this).attr("data8")); // phân trang, tổng số trang hiện tại đang xem
            var loads = $(this).attr("data6"); // số tin đã đc thêm vào

            if (distance > -1 && parseInt(loads) < parseInt(load)) {
                if (load <= cou_tt) {
                    $.ajax({
                        url: '/render/append_tindang.php',
                        type: 'POST',
                        data: {
                            id_city: id_city,
                            id_cate: id_cate,
                            cl_sql: cl_sql,
                            cl_cauqr: cl_cauqr,
                            cl_sql1: cl_sql1,
                            page: page,
                            is_loadh: is_loadh,
                        },
                        success: function(data) {
                            $('.tin_dang_spban').attr('data7', (load + 20));
                            $('.tin_dang_spban').attr('data8', (page + 1));
                            $('.tin_dang_spban').attr('data6', (Number(loads) + 20));
                            $('.tin_dang_spban').append(data);
                        }
                    })
                }
            }
        })
    })
</script>

</html>