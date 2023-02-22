<?
include("config.php");
$idArr = getValue('id', 'arr', 'POST', []);

$id_dm = getValue('id_dm', 'int', 'POST', '');

$screen = getValue('screen', 'int', 'POST', '');
$arrDetail = [];
foreach ($idArr as $id) {

    $query = new db_query("SELECT b.`new_id`, b.`new_tinhtrang`, b.`new_cate_id`, b.`dia_chi`, b.`new_city`, b.`quan_huyen`, b.`new_baohanh`, b.`new_type`, n.`nhom_sanpham`, n.`loai_sanpham`, n.`chat_lieu`, n.`tgian_bd`, n.`tgian_kt`, n.`ca_ngay`, n.`loai_xe`, n.`loai_hang_hoa`, n.`loai_chung`, n.`kich_co`, n.`giong_thu_cung`, n.`do_tuoi`, n.`gioi_tinh`, n.`han_su_dung`, n.`khoiluong`, n.`the_tich`, n.`loai_hinh_sp`, n.`hang`, n.`hang_vattu`, n.`dung_tich`, n.`loai_thiet_bi`, n.`cong_suat`, n.`khoiluong`, n.`hinhdang`, n.`mon_the_thao`, n.`xuat_xu`, n.`chat_lieu_khung`, n.`mau_sac`, n.`dong_xe`, n.`dong_co`, n.`nam_san_xuat`, n.`so_km_da_di`, n.`dung_tich`, n.`so_cho`, n.`hop_so`, n.`kieu_dang`, n.`nhien_lieu`, n.`loai_noithat`, n.`loai_phu_tung`, n.`trong_tai`, n.`can_ban_mua`, n.`ten_toa_nha`, n.`khu_vuc_mua`, n.`tinh_trang_noi_that`, n.`chieu_dai`, n.`chieu_rong`, n.`dien_tich`, n.`giay_to_phap_ly`, n.`tong_so_tang`, n.`huong_chinh`, n.`loai_hinh_canho`, n.`tang_so`, n.`tong_so_tang`, n.`so_pve_sinh`, n.`so_pngu`, n.`loai_hinh_dat`, n.`bovi_xuly`, n.`ram`, n.`o_cung`, 
    n.`loai_o_cung`, n.`man_hinh`, n.`dong_may`, n.`thiet_bi`, n.`dung_luong`, n.`sdung_sim`, n.`knoi_internet`, n.`cong_suat`, n.`do_phan_giai`, n.`link_kien_phu_kien`, n.`loai_linhphu_kien` FROM `new` AS b INNER JOIN `new_description` AS n ON b.`new_id` = n.`new_id`  WHERE b.`new_id` = '$id' AND b.`new_cate_id` = '$id_dm'");
    $result = mysql_fetch_assoc($query->result);
    $arrDetail[] = $result;
}
$type_user1 = $arrDetail[0]['new_type'];
$type_user2 = $arrDetail[1]['new_type'];

$loaiXe1 = $arrDetail[0]['loai_xe'];
$loaiXe2 = $arrDetail[1]['loai_xe'];
$dongxe1 = $arrDetail[0]['dong_xe'];
$dongxe2 = $arrDetail[1]['dong_xe'];
$loaiHangHoa1 = $arrDetail[0]['loai_hang_hoa'];
$loaiHangHoa2 = $arrDetail[1]['loai_hang_hoa'];

$nhomsp1 = $arrDetail[0]['nhom_sanpham'];
$nhomsp2 = $arrDetail[1]['nhom_sanpham'];
$loaisp1 = $arrDetail[0]['loai_sanpham'];
$loaisp2 = $arrDetail[1]['loai_sanpham'];
$loaisp3 = $arrDetail[0]['loai_chung'];
$loaisp4 = $arrDetail[1]['loai_chung'];
$chatlieu1 = $arrDetail[0]['chat_lieu'];
$chatlieu2 = $arrDetail[1]['chat_lieu'];

$giongthucung1 = $arrDetail[0]['giong_thu_cung'];
$giongthucung2 = $arrDetail[1]['giong_thu_cung'];
$kichco1 = $arrDetail[0]['kich_co'];
$kichco2 = $arrDetail[1]['kich_co'];
$dotuoi1 = $arrDetail[0]['do_tuoi'];
$dotuoi2 = $arrDetail[1]['do_tuoi'];
$gioitinh1 = $arrDetail[0]['gioi_tinh'];
$gioitinh2 = $arrDetail[1]['gioi_tinh'];

$loaihinh1 = $arrDetail[0]['loai_hinh_sp'];
$loaihinh2 = $arrDetail[1]['loai_hinh_sp'];
$hang1 = $arrDetail[0]['hang'];
$hang2 = $arrDetail[1]['hang'];

$dungluong1 = $arrDetail[0]['dung_tich'];
$dungluong2 = $arrDetail[1]['dung_tich'];
$congsuat1 = $arrDetail[0]['cong_suat'];
$congsuat2 = $arrDetail[1]['cong_suat'];
$kg_giat1 = $arrDetail[0]['khoiluong'];
$kg_giat2 = $arrDetail[1]['khoiluong'];
$loaitb1 = $arrDetail[0]['loai_thiet_bi'];
$loaitb2 = $arrDetail[1]['loai_thiet_bi'];
$thietbi1 = $arrDetail[0]['thiet_bi'];
$thietbi2 = $arrDetail[1]['thiet_bi'];
// echo $thietbi1;

$hinhdang1 = $arrDetail[0]['hinhdang'];
$hinhdang2 = $arrDetail[1]['hinhdang'];

$monthethao1 = $arrDetail[0]['mon_the_thao'];
$monthethao2 = $arrDetail[1]['mon_the_thao'];

$baohanh1 = $arrDetail[0]['new_baohanh'];
$baohanh2 = $arrDetail[1]['new_baohanh'];
$xuatxu1 = $arrDetail[0]['xuat_xu'];
$xuatxu2 = $arrDetail[1]['xuat_xu'];
$cl_khung1 = $arrDetail[0]['chat_lieu_khung'];
$cl_khung2 = $arrDetail[1]['chat_lieu_khung'];
$mausac1 = $arrDetail[0]['mau_sac'];
$mausac2 = $arrDetail[1]['mau_sac'];
$dongco1 = $arrDetail[0]['dong_co'];
$dongco2 = $arrDetail[1]['dong_co'];
$nam_sx1 = $arrDetail[0]['nam_san_xuat'];
$nam_sx2 = $arrDetail[1]['nam_san_xuat'];
$dungtich1 = $arrDetail[0]['dung_tich'];
$dungtich2 = $arrDetail[1]['dung_tich'];
$socho1 = $arrDetail[0]['so_cho'];
$socho2 = $arrDetail[1]['so_cho'];
$hopso1 = $arrDetail[0]['hop_so'];
$hopso2 = $arrDetail[1]['hop_so'];
$kieudang1 = $arrDetail[0]['kieu_dang'];
$kieudang2 = $arrDetail[1]['kieu_dang'];
$nhienlieu1 = $arrDetail[0]['nhien_lieu'];
$nhienlieu2 = $arrDetail[1]['nhien_lieu'];
$loai_noithat1 = $arrDetail[0]['loai_noithat'];
$loai_noithat2 = $arrDetail[1]['loai_noithat'];
$loai_phutung1 = $arrDetail[0]['loai_phu_tung'];
$loai_phutung2 = $arrDetail[1]['loai_phu_tung'];
$trongtai1 = $arrDetail[0]['trong_tai'];
$trongtai2 = $arrDetail[1]['trong_tai'];

$nhucau1 = $arrDetail[0]['can_ban_mua'];
$nhucau2 = $arrDetail[1]['can_ban_mua'];

//nhiên liệu
$arr_nl = array(
    1 => 'xăng',
    2 => 'dầu',
    3 => 'Động cơ Hybird',
    4 => 'Điện'
);
//hộp số
$arr_hs = array(
    1 => 'Tự động',
    2 => 'Số sàn',
    3 => 'Bán tự động'
);
//cần bán, cần  mua
$arr_nhucau = array(
    1 => 'Cần bán',
    2 => 'Cho thuê',
    3 => 'Cần mua',
    4 => 'Cần thuê'
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
//hướng cửa chính
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
//loại hình căn hộ
$arr_lhch = array(
    1 => 'Chung cư',
    2 => 'Duplex',
    3 => 'Penthouse',
    4 => 'Căn hộ dịch vụ, mini',
    5 => 'Tập thể, cư xá',
    6 => 'Officetel',
);
//loại hình đất
$arr_lhdat = array(
    1 => 'Đất thổ cư',
    2 => 'Đất nền dự án',
    3 => 'Đất công nghiệp',
    4 => 'Đất nông nghiệp',
);
//tình trạng
$arr_tt = array(
    1 => 'Mới',
    2 => 'Đã sử dụng (chưa sửa chữa)',
    3 => 'Đã sử dụng (qua sửa chữa)',
);
//loại ổ cứng
$arr_loaiocung = array(
    1 => 'HDD',
    2 => 'SSD',
);
$queryDM = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung`");
$sql_dm = $queryDM->result_array();

$query_nsp = new db_query("SELECT `id`, `name` FROM `nhom_sanpham`");
$sql_nsp = $query_nsp->result_array();

$query_cl = new db_query("SELECT `id`, `name` FROM `nhom_sanpham_chatlieu`");
$sql_cl = $query_cl->result_array();

// $query_kl = new db_query("SELECT `id_dl`, `ten_dl`, `id_danhmuc`, `phan_loai`, `id_cha` FROM `dung_luong`");

$query_thu = new db_query("SELECT `id`, `giong_thucung` FROM `giong_thu_cung`");
$sql_thu = $query_thu->result_array();

$query_dotuoi = new db_query("SELECT `id`, `contents_name`, `type` FROM `thongtin_thucung` WHERE `type` = 1");
$sql_dotuoi = $query_dotuoi->result_array();

$query_kichco = new db_query("SELECT `id`, `contents_name`, `type` FROM `thongtin_thucung` WHERE `type` = 2");
$sql_kichco = $query_kichco->result_array();

$query_gioitinh = new db_query("SELECT `id`, `contents_name`, `type` FROM `thongtin_thucung` WHERE `type` = 3");
$sql_gioitinh = $query_gioitinh->result_array();

$query_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang`");
$sql_hang = $query_hang->result_array();

$query_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong`");
$sql_dl = $query_dl->result_array();

$query_hd = new db_query("SELECT `id`, `name` FROM `nhom_sanpham_hinhdang`");
$sql_hd = $query_hd->result_array();

$query_mtt = new db_query("SELECT `id`, `ten_mon` FROM `mon_the_thao`");
$sql_mtt = $query_mtt->result_array();

$query_bh = new db_query("SELECT `id_baohanh`, `tgian_baohanh` FROM `bao_hanh`");
$sql_bh = $query_bh->result_array();

$query_xx = new db_query("SELECT `id_xuatxu`, `noi_xuatxu` FROM `xuat_xu`");
$sql_xx = $query_xx->result_array();

$query_mh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh`");
$sql_mh = $query_mh->result_array();

$query_mx = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac`");
$sql_mx = $query_mx->result_array();

$query_nsx = new db_query("SELECT `id`, `nam_san_xuat` FROM `nam_san_xuat`");
$sql_nsx = $query_nsx->result_array();

$query_sc = new db_query("SELECT `id`, `so_luong` FROM `number_content`");
$sql_sc = $query_sc->result_array();

$query_tang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong`");
$sql_tang = $query_tang->result_array();

$query_vixuli = new db_query("SELECT `bovi_id`, `bovi_ten` FROM `bovi_xuly`");
$sql_vixuli = $query_vixuli->result_array();

$query_dong = new db_query("SELECT `id`, `ten_dong` FROM `dong`");
$sql_dong = $query_dong->result_array();
?>
<?
if ($screen >= 1025) { ?>
    <? if ($id_dm == 52 || $id_dm == 19) {
    ?>
        <table>
            <tr>
                <th>THỜI GIAN LÀM VIỆC</th>
                <td><?= date('H:i', $arrDetail[0]['tgian_bd']) . ' - ' . date('H:i', $arrDetail[0]['tgian_kt']) ?></td>
                <td><?= date('H:i', $arrDetail[1]['tgian_bd']) . ' - ' . date('H:i', $arrDetail[1]['tgian_kt']) ?></td>
            </tr>
            <tr>
                <th>LOẠI XE</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaiXe1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaiXe2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>LOẠI HÀNG HOÁ GIAO</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaiHangHoa1)[0]['ten_loai']) ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaiHangHoa2)[0]['ten_loai']) ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= search($arr_tinh, 'cit_id', $arrDetail[0]['quan_huyen'])[0]['cit_name'] . ', ' . search($arr_tinh, 'cit_id', $arrDetail[0]['new_city'])[0]['cit_name'] ?></td>
                <td><?= search($arr_tinh, 'cit_id', $arrDetail[1]['quan_huyen'])[0]['cit_name'] . ', ' . search($arr_tinh, 'cit_id', $arrDetail[1]['new_city'])[0]['cit_name'] ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 82) { ?>
        <table>
            <tr>
                <th>NHÓM SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_nsp, "id", $nhomsp1)[0]['name']) ?></td>
                <td><?= ucfirst(search($sql_nsp, "id", $nhomsp2)[0]['name']) ?></td>
            </tr>
            <tr>
                <th>LOẠI SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>CHẤT LIỆU</th>
                <td><?= ucfirst(search($sql_cl, "id", $chatlieu1)[0]['name']) ?></td>
                <td><?= ucfirst(search($sql_cl, "id", $chatlieu2)[0]['name']) ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 24) { ?>
        <table>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 84 || $id_dm == 88 || $id_dm == 87 || $id_dm == 101 || $id_dm == 103 || $id_dm == 43 || $id_dm == 44 || $id_dm == 45 || $id_dm == 46 || $id_dm == 53 || $id_dm == 54 || $id_dm == 116 || $id_dm == 117 || $id_dm == 86 || $id_dm == 60 || $id_dm == 83 || $id_dm == 85) { ?>
        <table>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 76 || $id_dm == 65 || $id_dm == 62) { ?>
        <table>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 110 || $id_dm == 111 || $id_dm == 112 || $id_dm == 113) { ?>
        <table>
            <tr>
                <th>GIỐNG THÚ CƯNG</th>
                <td><?= ucfirst(search($sql_thu, "id", $giongthucung1)[0]['giong_thucung'])  ?></td>
                <td><?= ucfirst(search($sql_thu, "id", $giongthucung2)[0]['giong_thucung'])  ?></td>
            </tr>
            <tr>
                <th>ĐỘ TUỔI</th>
                <td><?= ucfirst(search($sql_dotuoi, "id", $dotuoi1)[0]['contents_name'])  ?></td>
                <td><?= ucfirst(search($sql_dotuoi, "id", $dotuoi2)[0]['contents_name'])  ?></td>
            </tr>
            <tr>
                <th>KÍCH CỠ THÚ CƯNG</th>
                <td><?= ucfirst(search($sql_kichco, "id", $kichco1)[0]['contents_name'])  ?></td>
                <td><?= ucfirst(search($sql_kichco, "id", $kichco2)[0]['contents_name'])  ?></td>
            </tr>
            <tr>
                <th>GIỚI TÍNH</th>
                <td><?= ucfirst(search($sql_gioitinh, "id", $gioitinh1)[0]['contents_name'])  ?></td>
                <td><?= ucfirst(search($sql_gioitinh, "id", $gioitinh2)[0]['contents_name'])  ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 114) { ?>
        <!-- đồ ăn, phụ kiện, dịch vụ -->
        <table>
            <tr>
                <th>NHÓM SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_nsp, "id", $nhomsp1)[0]['name']) ?></td>
                <td><?= ucfirst(search($sql_nsp, "id", $nhomsp2)[0]['name']) ?></td>
            </tr>
            <tr>
                <th>GIỐNG THÚ CƯNG</th>
                <td><?= ucfirst(search($sql_thu, "id", $giongthucung1)[0]['giong_thucung'])  ?></td>
                <td><?= ucfirst(search($sql_thu, "id", $giongthucung2)[0]['giong_thucung'])  ?></td>
            </tr>
            <? if ($nhomsp1 == 58 && $nhomsp2 == 58) { ?>
                <tr>
                    <th>HẠN SỬ DỤNG</th>
                    <td><?= date('d/m/Y', $arrDetail[0]['han_su_dung']) ?></td>
                    <td><?= date('d/m/Y', $arrDetail[1]['han_su_dung']) ?></td>
                </tr>
                <tr>
                    <th>TRỌNG LƯỢNG</th>
                    <td><?= ucfirst($arrDetail[0]['khoiluong']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['khoiluong']) ?></td>
                </tr>
                <tr>
                    <th>THỂ TÍCH</th>
                    <td><?= ucfirst($arrDetail[0]['the_tich']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['the_tich']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 100 || $id_dm == 102 || $id_dm == 47 || $id_dm == 48 || $id_dm == 49 || $id_dm == 50 || $id_dm == 106) { ?>
        <table>
            <tr>
                <th>LOẠI SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp3)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp4)[0]['ten_loai'])  ?></td>
            </tr>

            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 115) { ?>
        <table>
            <tr>
                <th>ĐỘ TUỔI</th>
                <td><?= ucfirst($arrDetail[0]['do_tuoi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['do_tuoi']) ?></td>
            </tr>
            <tr>
                <th>KÍCH CỠ THÚ CƯNG</th>
                <td><?= ucfirst($arrDetail[0]['kich_co']) ?></td>
                <td><?= ucfirst($arrDetail[1]['kich_co']) ?></td>
            </tr>
            <tr>
                <th>GIỚI TÍNH</th>
                <td><?= ucfirst(search($sql_gioitinh, "id", $gioitinh1)[0]['contents_name'])  ?></td>
                <td><?= ucfirst(search($sql_gioitinh, "id", $gioitinh2)[0]['contents_name'])  ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 61) { ?>
        <!-- Mỹ phẩm -->
        <table>
            <tr>
                <th>LOẠI HÌNH</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaihinh1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaihinh2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>LOẠI MỸ PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <th>HẠN SỬ DỤNG</th>
                <td><?= date('d/m/Y', $arrDetail[0]['han_su_dung']) ?></td>
                <td><?= date('d/m/Y', $arrDetail[1]['han_su_dung']) ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 108) { ?>
        <!-- Phụ kiện - Dụng cụ làm đẹp -->
        <table>
            <tr>
                <th>LOẠI PHỤ KIỆN</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 109) { ?>
        <!-- Thực phẩm chức năng -->
        <table>
            <tr>
                <th>LOẠI THỰC PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>HẠN SỬ DỤNG</th>
                <td><?= date('d/m/Y', $arrDetail[0]['han_su_dung']) ?></td>
                <td><?= date('d/m/Y', $arrDetail[1]['han_su_dung']) ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 63) { ?>
        <!-- Vật tư y tế -->
        <table>
            <tr>
                <th>LOẠI VẬT TƯ</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>HÃNG</th>
                <td><?= ucfirst($arrDetail[0]['hang_vattu']) ?></td>
                <td><?= ucfirst($arrDetail[1]['hang_vattu']) ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 56) { ?>
        <table>
            <tr>
                <th>LOẠI THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaitb1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaitb2)[0]['ten_loai'])  ?></td>
            </tr>
            <? if ($loaitb1 != 2107 && $loaitb2 != 2107) { ?>
                <tr>
                    <th>HÃNG</th>
                    <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                    <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
                </tr>
            <? } ?>
            <!-- if vào đây theo loại để ra công suất hoặc dung tích -->
            <? if ($loaitb1 == 2103 && $loaitb2 == 2103 || $loaitb1 == 2105 && $loaitb2 == 2105) { ?>
                <tr>
                    <th>DUNG TÍCH</th>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $dungluong1)[0]['ten_dl'])  ?></td>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $dungluong2)[0]['ten_dl'])  ?></td>
                </tr>
            <? } elseif ($loaitb1 == 2104 && $loaitb2 == 2104) { ?>
                <tr>
                    <th>CÔNG SUẤT</th>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $congsuat1)[0]['ten_dl'])  ?></td>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $congsuat2)[0]['ten_dl'])  ?></td>
                </tr>
            <? } elseif ($loaitb1 == 2106 && $loaitb2 == 2106) { ?>
                <tr>
                    <th>KHỐI LƯỢNG GIẶT</th>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $kg_giat1)[0]['ten_dl'])  ?></td>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $kg_giat2)[0]['ten_dl'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 57) { ?>
        <table>
            <tr>
                <th>LOẠI THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_nsp, "id", $loaitb1)[0]['name'])  ?></td>
                <td><?= ucfirst(search($sql_nsp, "id", $loaitb2)[0]['name'])  ?></td>
            </tr>
            <tr>
                <th>LOẠI SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 58 || $id_dm == 59) { ?>
        <table>
            <tr>
                <th>LOẠI THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_nsp, "id", $loaitb1)[0]['name'])  ?></td>
                <td><?= ucfirst(search($sql_nsp, "id", $loaitb2)[0]['name'])  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 78 || $id_dm == 79 || $id_dm == 80 || $id_dm == 82) { ?>
        <table>
            <tr>
                <th>NHÓM SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_nsp, "id", $nhomsp1)[0]['name'])  ?></td>
                <td><?= ucfirst(search($sql_nsp, "id", $nhomsp2)[0]['name'])  ?></td>
            </tr>
            <? if (($nhomsp1 == 2 && $nhomsp2 == 2) || ($nhomsp1 == 3 && $nhomsp2 == 3) || ($nhomsp1 == 5 && $nhomsp2 == 5) || ($nhomsp1 == 8 && $nhomsp2 == 8) || ($nhomsp1 == 9 && $nhomsp2 == 9) || ($nhomsp1 == 12 && $nhomsp2 == 12) || ($nhomsp1 == 13 && $nhomsp2 == 13) || ($nhomsp1 == 15 && $nhomsp2 == 15) || ($nhomsp1 == 18 && $nhomsp2 == 18) || ($nhomsp1 == 19 && $nhomsp2 == 19) || ($nhomsp1 == 27 && $nhomsp2 == 27) || ($nhomsp1 == 28 && $nhomsp2 == 28) || ($nhomsp1 == 29 && $nhomsp2 == 29)) { ?>
                <tr>
                    <th>LOẠI SẢN PHẨM</th>
                    <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                    <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
                </tr>

            <? } elseif (($nhomsp1 != 5 && $nhomsp2 != 5) || ($nhomsp1 != 10 && $nhomsp2 != 10) || ($nhomsp1 != 14 && $nhomsp2 != 14) || ($nhomsp1 != 15 && $nhomsp2 != 15)) { ?>
                <tr>
                    <th>CHẤT LIỆU</th>
                    <td><?= ucfirst(search($sql_cl, "id", $chatlieu1)[0]['name'])  ?></td>
                    <td><?= ucfirst(search($sql_cl, "id", $chatlieu2)[0]['name'])  ?></td>
                </tr>
            <? } ?>
            <? if ($nhomsp1 == 14 && $nhomsp2 == 14) { ?>
                <tr>
                    <th>HÌNH DÁNG</th>
                    <td><?= ucfirst(search($sql_hd, "id", $hinhdang1)[0]['name'])  ?></td>
                    <td><?= ucfirst(search($sql_hd, "id", $hinhdang2)[0]['name'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 118) { ?>
        <table>
            <tr>
                <th>LOẠI SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>

            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 81) { ?>
        <table>
            <tr>
                <th>LOẠI SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <? if (($loaisp1 != 2064 && $loaisp2 != 2064)) { ?>
                <tr>
                    <th>THƯƠNG HIỆU</th>
                    <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                    <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
                </tr>
            <? } ?>
            <? if ($loaisp1 == 2060 && $loaisp2 == 2060) { ?>
                <tr>
                    <th>HÌNH DÁNG</th>
                    <td><?= ucfirst(search($sql_hd, "id", $hinhdang1)[0]['name'])  ?></td>
                    <td><?= ucfirst(search($sql_hd, "id", $hinhdang2)[0]['name'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 75) { ?>
        <!--Dụng cụ thể thao -->
        <table>
            <tr>
                <th>MÔN THỂ THAO</th>
                <td><?= ucfirst(search($sql_mtt, "id", $monthethao1)[0]['ten_mon'])  ?></td>
                <td><?= ucfirst(search($sql_mtt, "id", $monthethao2)[0]['ten_mon'])  ?></td>
            </tr>
            <tr>
                <th>LOẠI DỤNG CỤ</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp3)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp4)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 104) { ?>
        <!--thời trang thể thao -->
        <table>
            <tr>
                <th>MÔN THỂ THAO</th>
                <td><?= ucfirst(search($sql_mtt, "id", $monthethao1)[0]['ten_mon'])  ?></td>
                <td><?= ucfirst(search($sql_mtt, "id", $monthethao2)[0]['ten_mon'])  ?></td>
            </tr>
            <tr>
                <th>LOẠI THỜI TRANG</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp3)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp4)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 105) { ?>
        <!--phụ kiện thể thao -->
        <table>
            <tr>
                <th>MÔN THỂ THAO</th>
                <td><?= ucfirst(search($sql_mtt, "id", $monthethao1)[0]['ten_mon'])  ?></td>
                <td><?= ucfirst(search($sql_mtt, "id", $monthethao2)[0]['ten_mon'])  ?></td>
            </tr>
            <tr>
                <th>LOẠI PHỤ KIỆN</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp3)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp4)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 8) { ?>
        <!--Xe đạp-->
        <table>
            <tr>
                <th>HÃNG XE</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <th>LOẠI XE ĐẠP</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaiXe1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaiXe2)[0]['ten_loai'])  ?></td>
            </tr>
            <? if ($loaiXe1 == 210 && $loaiXe2 == 210) { ?>
                <tr>
                    <th>DÒNG XE ĐẠP THỂ THAO</th>
                    <td><?= ucfirst(search($sql_dm, "id", $dongxe1)[0]['ten_loai'])  ?></td>
                    <td><?= ucfirst(search($sql_dm, "id", $dongxe2)[0]['ten_loai'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>XUẤT XỨ</th>
                <td><?= ucfirst(search($sql_xx, "id_xuatxu", $xuatxu1)[0]['noi_xuatxu'])  ?></td>
                <td><?= ucfirst(search($sql_xx, "id_xuatxu", $xuatxu2)[0]['noi_xuatxu'])  ?></td>
            </tr>
            <tr>
                <th>KÍCH THƯỚC KHUNG</th>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $kichco1)[0]['ten_manhinh'])  ?></td>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $kichco2)[0]['ten_manhinh'])  ?></td>
            </tr>
            <tr>
                <th>MÀU SẮC</th>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac1)[0]['mau_sac'])  ?></td>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac2)[0]['mau_sac'])  ?></td>
            </tr>
            <tr>
                <th>CHẤT LIỆU KHUNG</th>
                <td><?= ucfirst(search($sql_cl, "id", $cl_khung1)[0]['name'])  ?></td>
                <td><?= ucfirst(search($sql_cl, "id", $cl_khung2)[0]['name'])  ?></td>
            </tr>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 40 || $id_dm == 41) { ?>
        <!--Xe đạp điện/xe máy điện -->
        <table>
            <tr>
                <th>HÃNG XE</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <th>ĐỘNG CƠ</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $dongco1)[0]['ten_dl'])  ?></td>
                <td><?= ucfirst(search($sql_dl, "id_dl", $dongco2)[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <th>MÀU SẮC</th>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac1)[0]['mau_sac'])  ?></td>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac2)[0]['mau_sac'])  ?></td>
            </tr>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 9) { ?>
        <!--Xe máy -->
        <table>
            <tr>
                <th>HÃNG XE</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <? if ($hang1 == 1286 && $hang2 != 1286) { ?>
                <tr>
                    <th>DÒNG XE</th>
                    <td><?= ucfirst($arrDetail[0]['dong_xe']) ?></td>
                    <td><?= ucfirst(search($sql_dm, "id", $dongxe2)[0]['ten_loai'])  ?></td>
                </tr>
            <? } elseif ($hang1 != 1286 && $hang2 == 1286) { ?>
                <tr>
                    <th>DÒNG XE</th>
                    <td><?= ucfirst(search($sql_dm, "id", $dongxe1)[0]['ten_loai'])  ?></td>
                    <td><?= ucfirst($arrDetail[1]['dong_xe']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>NĂM SẢN XUẤT</th>
                <td><?= ucfirst(search($sql_nsx, "id", $nam_sx1)[0]['nam_san_xuat'])  ?></td>
                <td><?= ucfirst(search($sql_nsx, "id", $nam_sx2)[0]['nam_san_xuat'])  ?></td>
            </tr>
            <tr>
                <th>LOẠI XE</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaiXe1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loaiXe1)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>DUNG TÍCH</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $dungtich1)[0]['ten_dl'])  ?></td>
                <td><?= ucfirst(search($sql_dl, "id_dl", $dungtich2)[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>SỐ Km ĐÃ ĐI</th>
                <td><?= $arrDetail[0]['so_km_da_di'] ?></td>
                <td><?= $arrDetail[1]['so_km_da_di']  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 10) { ?>
        <!--Oto -->
        <table>
            <tr>
                <th>HÃNG XE</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <th>DÒNG XE</th>
                <td><?= ucfirst(search($sql_dm, "id", $dongxe1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $dongxe2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>NĂM SẢN XUẤT</th>
                <td><?= ucfirst(search($sql_nsx, "id", $nam_sx1)[0]['nam_san_xuat'])  ?></td>
                <td><?= ucfirst(search($sql_nsx, "id", $nam_sx2)[0]['nam_san_xuat'])  ?></td>
            </tr>
            <tr>
                <th>SỐ CHỖ</th>
                <td><?= ucfirst(search($sql_sc, "id", $socho1)[0]['so_luong'])  ?></td>
                <td><?= ucfirst(search($sql_sc, "id", $socho2)[0]['so_luong'])  ?></td>
            </tr>
            <tr>
                <th>NHIÊN LIỆU</th>
                <td><?= ucfirst($arr_nl[$nhienlieu1]) ?></td>
                <td><?= ucfirst($arr_nl[$nhienlieu2]) ?></td>
            </tr>
            <tr>
                <th>XUẤT XỨ</th>
                <td><?= ucfirst(search($sql_xx, "id_xuatxu", $xuatxu1)[0]['noi_xuatxu'])  ?></td>
                <td><?= ucfirst(search($sql_xx, "id_xuatxu", $xuatxu2)[0]['noi_xuatxu'])  ?></td>
            </tr>
            <tr>
                <th>HỘP SỐ</th>
                <td><?= ucfirst($arr_hs[$hopso1]) ?></td>
                <td><?= ucfirst($arr_hs[$hopso2]) ?></td>
            </tr>
            <tr>
                <th>KIỂU DÁNG</th>
                <td><?= ucfirst(search($sql_hd, "id", $kieudang1)[0]['name'])  ?></td>
                <td><?= ucfirst(search($sql_hd, "id", $kieudang2)[0]['name'])  ?></td>
            </tr>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>MÀU SẮC</th>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac1)[0]['mau_sac'])  ?></td>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac2)[0]['mau_sac'])  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>SỐ Km ĐÃ ĐI</th>
                <td><?= $arrDetail[0]['so_km_da_di'] ?></td>
                <td><?= $arrDetail[1]['so_km_da_di']  ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 42) { ?>
        <!-- nội thất oto -->
        <table>
            <tr>
                <th>LOẠI NỘI THẤT</th>
                <td><?= ucfirst(search($sql_dm, "id", $loai_noithat1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loai_noithat2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 39) { ?>
        <!-- phụ tùng xe -->
        <table>
            <tr>
                <th>LOẠI PHỤ TÙNG</th>
                <td><?= ucfirst(search($sql_dm, "id", $loai_phutung1)[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $loai_phutung2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 38) { ?>
        <!-- xe tải, xe khác -->
        <table>
            <tr>
                <th>HÃNG XE</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <th>TRỌNG TẢI</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $trongtai1)[0]['ten_dl'])  ?></td>
                <td><?= ucfirst(search($sql_dl, "id_dl", $trongtai2)[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <th>NHIÊN LIỆU</th>
                <td><?= ucfirst($arr_nl[$nhienlieu1]) ?></td>
                <td><?= ucfirst($arr_nl[$nhienlieu2]) ?></td>
            </tr>
            <tr>
                <th>MÀU SẮC</th>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac1)[0]['mau_sac'])  ?></td>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac2)[0]['mau_sac'])  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <th>SỐ Km ĐÃ ĐI</th>
                <td><?= $arrDetail[0]['so_km_da_di'] ?></td>
                <td><?= $arrDetail[1]['so_km_da_di']  ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 11) { ?>
        <!-- Nhà đất -->
        <table>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <th>CẦN BÁN / CHO THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <th>TÊN TOÀ NHÀ / KHU DÂN CƯ</th>
                    <td><?= ucfirst($arrDetail[0]['ten_toa_nha']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['ten_toa_nha']) ?></td>
                </tr>
            <? } elseif ($type_user1 == 2 && $type_user2 == 2) { ?>
                <tr>
                    <th>CẦN MUA / CẦN THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <th>KHU VỰC MUỐN MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[0]['khu_vuc_mua']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['khu_vuc_mua']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>TỔNG SỐ TẦNG</th>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['tong_so_tang'])[0]['so_luong'])  ?></td>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['tong_so_tang'])[0]['so_luong'])  ?></td>
            </tr>
            <? if ($type_user1 == 2 && $type_user2 == 2) { ?>
                <tr>
                    <th>SỐ PHÒNG NGỦ</th>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['so_pngu'])[0]['so_luong'])  ?></td>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['so_pngu'])[0]['so_luong'])  ?></td>
                </tr>
                <tr>
                    <th>SỐ PHÒNG VỆ SINH</th>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['so_pve_sinh'])[0]['so_luong'])  ?></td>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['so_pve_sinh'])[0]['so_luong'])  ?></td>
                </tr>
            <? } ?>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <th>HƯỚNG CỬA CHÍNH</th>
                    <td><?= ucfirst($arr_huong[$arrDetail[0]['huong_chinh']]) ?></td>
                    <td><?= ucfirst($arr_huong[$arrDetail[1]['huong_chinh']]) ?></td>
                </tr>
                <tr>
                    <th>GIẤY TỜ PHÁP LÝ</th>
                    <td><?= ucfirst($arr_gtpl[$arrDetail[0]['giay_to_phap_ly']]) ?></td>
                    <td><?= ucfirst($arr_gtpl[$arrDetail[1]['giay_to_phap_ly']]) ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>TÌNH TRẠNG NỘI THẤT</th>
                <td><?= ucfirst($arr_ttnt[$arrDetail[0]['tinh_trang_noi_that']]) ?></td>
                <td><?= ucfirst($arr_ttnt[$arrDetail[1]['tinh_trang_noi_that']]) ?></td>
            </tr>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <th>CHIỀU DÀI</th>
                    <td><?= $arrDetail[0]['chieu_dai'] ?> m</td>
                    <td><?= $arrDetail[1]['chieu_dai'] ?> m</td>
                </tr>
                <tr>
                    <th>CHIỀU NGANG</th>
                    <td><?= $arrDetail[0]['chieu_rong'] ?> m</td>
                    <td><?= $arrDetail[1]['chieu_rong'] ?> m</td>
                </tr>
            <? } ?>
            <tr>
                <th>DIỆN TÍCH</th>
                <td><?= $arrDetail[0]['dien_tich'] ?> m<sup>2</sup></td>
                <td><?= $arrDetail[1]['dien_tich'] ?> m<sup>2</sup></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 27) { ?>
        <!-- Chung Cư -->
        <table>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <th>CẦN BÁN / CHO THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <th>TÊN TOÀ NHÀ / KHU DÂN CƯ</th>
                    <td><?= ucfirst($arrDetail[0]['ten_toa_nha']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['ten_toa_nha']) ?></td>
                </tr>
                <tr>
                    <th>TẦNG SỐ</th>
                    <td><?= ucfirst($arrDetail[0]['tang_so']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['tang_so']) ?></td>
                </tr>
            <? } elseif ($type_user1 == 2 && $type_user2 == 2) { ?>
                <tr>
                    <th>CẦN MUA / CẦN THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <th>KHU VỰC MUỐN MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[0]['khu_vuc_mua']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['khu_vuc_mua']) ?></td>
                </tr>
                <tr>
                    <th>TÊN TOÀ NHÀ MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[0]['ten_toa_nha']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['ten_toa_nha']) ?></td>
                </tr>
                <tr>
                    <th>TỔNG SỐ TẦNG</th>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['tong_so_tang'])[0]['so_luong'])  ?></td>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['tong_so_tang'])[0]['so_luong'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>LOẠI HÌNH CĂN HỘ</th>
                <td><?= ucfirst($arr_lhch[$arrDetail[0]['loai_hinh_canho']]) ?></td>
                <td><?= ucfirst($arr_lhch[$arrDetail[1]['loai_hinh_canho']]) ?></td>
            </tr>
            <tr>
                <th>SỐ PHÒNG NGỦ</th>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['so_pngu'])[0]['so_luong'])  ?></td>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['so_pngu'])[0]['so_luong'])  ?></td>
            </tr>
            <tr>
                <th>SỐ PHÒNG VỆ SINH</th>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['so_pve_sinh'])[0]['so_luong'])  ?></td>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['so_pve_sinh'])[0]['so_luong'])  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG NỘI THẤT</th>
                <td><?= ucfirst($arr_ttnt[$arrDetail[0]['tinh_trang_noi_that']]) ?></td>
                <td><?= ucfirst($arr_ttnt[$arrDetail[1]['tinh_trang_noi_that']]) ?></td>
            </tr>
            <tr>
                <th>GIẤY TỜ PHÁP LÝ</th>
                <td><?= ucfirst($arr_gtpl[$arrDetail[0]['giay_to_phap_ly']]) ?></td>
                <td><?= ucfirst($arr_gtpl[$arrDetail[1]['giay_to_phap_ly']]) ?></td>
            </tr>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <th>CHIỀU DÀI</th>
                    <td><?= $arrDetail[0]['chieu_dai'] ?> m</td>
                    <td><?= $arrDetail[1]['chieu_dai'] ?> m</td>
                </tr>
                <tr>
                    <th>CHIỀU NGANG</th>
                    <td><?= $arrDetail[0]['chieu_rong'] ?> m</td>
                    <td><?= $arrDetail[1]['chieu_rong'] ?> m</td>
                </tr>
            <? } ?>
            <tr>
                <th>DIỆN TÍCH</th>
                <td><?= $arrDetail[0]['dien_tich'] ?> m<sup>2</sup></td>
                <td><?= $arrDetail[1]['dien_tich'] ?> m<sup>2</sup></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 33 || $id_dm == 34) { ?>
        <!-- Văn phòng -->
        <table>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <th>CẦN BÁN / CHO THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <th>TÊN TOÀ NHÀ / KHU DÂN CƯ</th>
                    <td><?= ucfirst($arrDetail[0]['ten_toa_nha']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['ten_toa_nha']) ?></td>
                </tr>
                <tr>
                    <th>TẦNG SỐ</th>
                    <td><?= ucfirst($arrDetail[0]['tang_so']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['tang_so']) ?></td>
                </tr>
            <? } elseif ($type_user1 == 2 && $type_user2 == 2) { ?>
                <tr>
                    <th>CẦN MUA / CẦN THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <th>KHU VỰC MUỐN MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[0]['khu_vuc_mua']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['khu_vuc_mua']) ?></td>
                </tr>
                <tr>
                    <th>TỔNG SỐ TẦNG</th>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['tong_so_tang'])[0]['so_luong'])  ?></td>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['tong_so_tang'])[0]['so_luong'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>TÌNH TRẠNG NỘI THẤT</th>
                <td><?= ucfirst($arr_ttnt[$arrDetail[0]['tinh_trang_noi_that']]) ?></td>
                <td><?= ucfirst($arr_ttnt[$arrDetail[1]['tinh_trang_noi_that']]) ?></td>
            </tr>
            <tr>
                <th>HƯỚNG CỬA CHÍNH</th>
                <td><?= ucfirst($arr_huong[$arrDetail[0]['huong_chinh']]) ?></td>
                <td><?= ucfirst($arr_huong[$arrDetail[1]['huong_chinh']]) ?></td>
            </tr>
            <tr>
                <th>GIẤY TỜ PHÁP LÝ</th>
                <td><?= ucfirst($arr_gtpl[$arrDetail[0]['giay_to_phap_ly']]) ?></td>
                <td><?= ucfirst($arr_gtpl[$arrDetail[1]['giay_to_phap_ly']]) ?></td>
            </tr>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <th>CHIỀU DÀI</th>
                    <td><?= $arrDetail[0]['chieu_dai'] ?> m</td>
                    <td><?= $arrDetail[1]['chieu_dai'] ?> m</td>
                </tr>
                <tr>
                    <th>CHIỀU NGANG</th>
                    <td><?= $arrDetail[0]['chieu_rong'] ?> m</td>
                    <td><?= $arrDetail[1]['chieu_rong'] ?> m</td>
                </tr>
            <? } ?>
            <tr>
                <th>DIỆN TÍCH</th>
                <td><?= $arrDetail[0]['dien_tich'] ?> m<sup>2</sup></td>
                <td><?= $arrDetail[1]['dien_tich'] ?> m<sup>2</sup></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 12) { ?>
        <!-- Đất -->
        <table>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <th>CẦN BÁN / CHO THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <th>TÊN DỰ ÁN</th>
                    <td><?= ucfirst($arrDetail[0]['ten_toa_nha']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['ten_toa_nha']) ?></td>
                </tr>
            <? } elseif ($type_user1 == 2 && $type_user2 == 2) { ?>
                <tr>
                    <th>CẦN MUA / CẦN THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <th>TÊN DỰ ÁN MUỐN MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[0]['khu_vuc_mua']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['khu_vuc_mua']) ?></td>
                </tr>
                <tr>
                    <th>KHU VỰC MUỐN MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[0]['khu_vuc_mua']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['khu_vuc_mua']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>LOẠI HÌNH ĐẤT</th>
                <td><?= ucfirst($arr_lhdat[$arrDetail[0]['loai_hinh_dat']]) ?></td>
                <td><?= ucfirst($arr_lhdat[$arrDetail[1]['loai_hinh_dat']]) ?></td>
            </tr>
            <tr>
                <th>HƯỚNG ĐẤT</th>
                <td><?= ucfirst($arr_huong[$arrDetail[0]['huong_chinh']]) ?></td>
                <td><?= ucfirst($arr_huong[$arrDetail[1]['huong_chinh']]) ?></td>
            </tr>
            <tr>
                <th>GIẤY TỜ PHÁP LÝ</th>
                <td><?= ucfirst($arr_gtpl[$arrDetail[0]['giay_to_phap_ly']]) ?></td>
                <td><?= ucfirst($arr_gtpl[$arrDetail[1]['giay_to_phap_ly']]) ?></td>
            </tr>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <th>CHIỀU DÀI</th>
                    <td><?= $arrDetail[0]['chieu_dai'] ?> m</td>
                    <td><?= $arrDetail[1]['chieu_dai'] ?> m</td>
                </tr>
                <tr>
                    <th>CHIỀU NGANG</th>
                    <td><?= $arrDetail[0]['chieu_rong'] ?> m</td>
                    <td><?= $arrDetail[1]['chieu_rong'] ?> m</td>
                </tr>
            <? } ?>
            <tr>
                <th>DIỆN TÍCH</th>
                <td><?= $arrDetail[0]['dien_tich'] ?> m<sup>2</sup></td>
                <td><?= $arrDetail[1]['dien_tich'] ?> m<sup>2</sup></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 26 || $id_dm == 28 || $id_dm == 29) { ?>
        <!-- Nhà trong ngõ -->
        <table>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <th>CẦN BÁN / CHO THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <th>TÊN TOÀ NHÀ / KHU DÂN CƯ</th>
                    <td><?= ucfirst($arrDetail[0]['ten_toa_nha']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['ten_toa_nha']) ?></td>
                </tr>
            <? } elseif ($type_user1 == 2 && $type_user2 == 2) { ?>
                <tr>
                    <th>CẦN MUA / CẦN THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <th>KHU VỰC MUỐN MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[0]['khu_vuc_mua']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['khu_vuc_mua']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>TỔNG SỐ TẦNG</th>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['tong_so_tang'])[0]['so_luong'])  ?></td>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['tong_so_tang'])[0]['so_luong'])  ?></td>
            </tr>
            <tr>
                <th>HƯỚNG CỬA CHÍNH</th>
                <td><?= ucfirst($arr_huong[$arrDetail[0]['huong_chinh']]) ?></td>
                <td><?= ucfirst($arr_huong[$arrDetail[1]['huong_chinh']]) ?></td>
            </tr>
            <tr>
                <th>SỐ PHÒNG NGỦ</th>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['so_pngu'])[0]['so_luong'])  ?></td>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['so_pngu'])[0]['so_luong'])  ?></td>
            </tr>
            <tr>
                <th>SỐ PHÒNG VỆ SINH</th>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['so_pve_sinh'])[0]['so_luong'])  ?></td>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['so_pve_sinh'])[0]['so_luong'])  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG NỘI THẤT</th>
                <td><?= ucfirst($arr_ttnt[$arrDetail[0]['tinh_trang_noi_that']]) ?></td>
                <td><?= ucfirst($arr_ttnt[$arrDetail[1]['tinh_trang_noi_that']]) ?></td>
            </tr>
            <tr>
                <th>GIẤY TỜ PHÁP LÝ</th>
                <td><?= ucfirst($arr_gtpl[$arrDetail[0]['giay_to_phap_ly']]) ?></td>
                <td><?= ucfirst($arr_gtpl[$arrDetail[1]['giay_to_phap_ly']]) ?></td>
            </tr>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <th>CHIỀU DÀI</th>
                    <td><?= $arrDetail[0]['chieu_dai'] ?> m</td>
                    <td><?= $arrDetail[1]['chieu_dai'] ?> m</td>
                </tr>
                <tr>
                    <th>CHIỀU NGANG</th>
                    <td><?= $arrDetail[0]['chieu_rong'] ?> m</td>
                    <td><?= $arrDetail[1]['chieu_rong'] ?> m</td>
                </tr>
            <? } ?>
            <tr>
                <th>DIỆN TÍCH</th>
                <td><?= $arrDetail[0]['dien_tich'] ?> m<sup>2</sup></td>
                <td><?= $arrDetail[1]['dien_tich'] ?> m<sup>2</sup></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 5) { ?>
        <!-- Máy tính để bàn -->
        <table>
            <tr>
                <th>BỘ VI XỬ LÝ</th>
                <td><?= ucfirst(search($sql_vixuli, "bovi_id", $arrDetail[0]['bovi_xuly'])[0]['bovi_ten'])  ?></td>
                <td><?= ucfirst(search($sql_vixuli, "bovi_id", $arrDetail[1]['bovi_xuly'])[0]['bovi_ten'])  ?></td>
            </tr>
            <tr>
                <th>RAM</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['ram'])[0]['ten_dl'])  ?></td>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['ram'])[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <th>Ổ CỨNG</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['o_cung'])[0]['ten_dl'])  ?></td>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['o_cung'])[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <th>LOẠI Ổ CỨNG</th>
                <td><?= ucfirst($arr_loaiocung[$arrDetail[0]['loai_o_cung']]) ?></td>
                <td><?= ucfirst($arr_loaiocung[$arrDetail[1]['loai_o_cung']]) ?></td>
            </tr>
            <tr>
                <th>CARD MÀN HÌNH</th>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[0]['man_hinh'])[0]['ten_manhinh'])  ?></td>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[1]['man_hinh'])[0]['ten_manhinh'])  ?></td>
            </tr>
            <tr>
                <th>KÍCH CỠ MÀN HÌNH</th>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[0]['kich_co'])[0]['ten_manhinh'])  ?></td>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[1]['kich_co'])[0]['ten_manhinh'])  ?></td>
            </tr>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 98) { ?>
        <!-- Laptop -->
        <table>
            <tr>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <? if ($hang1 == 1378 && $hang2 != 1378) { ?>
                <tr>
                    <th>DÒNG MÁY</th>
                    <td><?= ucfirst($arrDetail[0]['dong_may']) ?></td>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[1]['dong_may'])[0]['ten_loai'])  ?></td>
                </tr>
            <? } elseif ($hang1 != 1378 && $hang2 == 1378) { ?>
                <tr>
                    <th>DÒNG MÁY</th>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[0]['dong_may'])[0]['ten_loai'])  ?></td>
                    <td><?= ucfirst($arrDetail[1]['dong_may']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>BỘ VI XỬ LÝ</th>
                <td><?= ucfirst(search($sql_vixuli, "bovi_id", $arrDetail[0]['bovi_xuly'])[0]['bovi_ten'])  ?></td>
                <td><?= ucfirst(search($sql_vixuli, "bovi_id", $arrDetail[1]['bovi_xuly'])[0]['bovi_ten'])  ?></td>
            </tr>
            <tr>
                <th>RAM</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['ram'])[0]['ten_dl'])  ?></td>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['ram'])[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <th>Ổ CỨNG</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['o_cung'])[0]['ten_dl'])  ?></td>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['o_cung'])[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <th>LOẠI Ổ CỨNG</th>
                <td><?= ucfirst($arr_loaiocung[$arrDetail[0]['loai_o_cung']]) ?></td>
                <td><?= ucfirst($arr_loaiocung[$arrDetail[1]['loai_o_cung']]) ?></td>
            </tr>
            <tr>
                <th>CARD MÀN HÌNH</th>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[0]['man_hinh'])[0]['ten_manhinh'])  ?></td>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[1]['man_hinh'])[0]['ten_manhinh'])  ?></td>
            </tr>
            <tr>
                <th>KÍCH CỠ MÀN HÌNH</th>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[0]['kich_co'])[0]['ten_manhinh'])  ?></td>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[1]['kich_co'])[0]['ten_manhinh'])  ?></td>
            </tr>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 6) { ?>
        <!-- Máy ảnh, máy quay -->
        <table>
            <tr>
                <th>THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_nsp, "id", $thietbi1)[0]['name']) ?></td>
                <td><?= ucfirst(search($sql_nsp, "id", $thietbi2)[0]['name']) ?></td>
            </tr>
            <? if ($thietbi1 != 34 && $thietbi2 != 34) { ?>
                <tr>
                    <th>HÃNG</th>
                    <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                    <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
                </tr>

            <? } elseif ($thietbi1 == 34 && $thietbi2 == 34) { ?>
                <tr>
                    <th>HÃNG</th>
                    <td><?= ucfirst($arrDetail[0]['hang']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['hang']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 7) { ?>
        <!-- Điện thoại di động -->
        <table>
            <tr>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <? if ($hang1 == 1683 && $hang2 != 1683) { ?>
                <tr>
                    <th>DÒNG MÁY</th>
                    <td><?= ucfirst($arrDetail[0]['dong_may']) ?></td>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[1]['dong_may'])[0]['ten_loai'])  ?></td>
                </tr>
            <? } elseif ($hang1 != 1683 && $hang2 == 1683) { ?>
                <tr>
                    <th>DÒNG MÁY</th>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[0]['dong_may'])[0]['ten_loai'])  ?></td>
                    <td><?= ucfirst($arrDetail[1]['dong_may']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>MÀU SẮC</th>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac1)[0]['mau_sac'])  ?></td>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac2)[0]['mau_sac'])  ?></td>
            </tr>
            <tr>
                <th>DUNG LƯỢNG</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['dung_luong'])[0]['ten_dl'])  ?></td>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['dung_luong'])[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 35) { ?>
        <!-- Máy tính bảng -->
        <table>
            <tr>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <? if ($hang1 == 1694 && $hang2 == 1694) { ?>
                <tr>
                    <th>DÒNG MÁY</th>
                    <td><?= ucfirst($arrDetail[0]['dong_may']) ?></td>
                    <td><?= ucfirst($arrDetail[1]['dong_may']) ?></td>
                </tr>
            <? } elseif ($hang1 != 1694 && $hang2 != 1694) { ?>
                <tr>
                    <th>DÒNG MÁY</th>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[0]['dong_may'])[0]['ten_loai'])  ?></td>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[1]['dong_may'])[0]['ten_loai'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>SỬ DỤNG SIM</th>
                <td><?= ($arrDetail[0]['sdung_sim'] == 1) ? 'Có' : 'Không' ?></td>
                <td><?= ($arrDetail[1]['sdung_sim'] == 1) ? 'Có' : 'Không' ?></td>
            </tr>
            <tr>
                <th>DUNG LƯỢNG</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['dung_luong'])[0]['ten_dl'])  ?></td>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['dung_luong'])[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <th>KÍCH CỠ MÀN HÌNH</th>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[0]['man_hinh'])[0]['ten_manhinh'])  ?></td>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[1]['man_hinh'])[0]['ten_manhinh'])  ?></td>
            </tr>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 36) { ?>
        <!-- tivi, loa, amly, máy nghe nhạc -->
        <table>
            <tr>
                <th>THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_nsp, "id", $thietbi1)[0]['name']) ?></td>
                <td><?= ucfirst(search($sql_nsp, "id", $thietbi2)[0]['name']) ?></td>
            </tr>
            <tr>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <? if ($thietbi1 == 52 && $thietbi2 == 52) { ?>
                <tr>
                    <th>KÍCH THƯỚC</th>
                    <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[0]['man_hinh'])[0]['ten_manhinh'])  ?></td>
                    <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[1]['man_hinh'])[0]['ten_manhinh'])  ?></td>
                </tr>
                <tr>
                    <th>KẾT NỐI INTERNET</th>
                    <td><?= ($arrDetail[0]['knoi_internet'] == 1) ? 'Có' : 'Không' ?></td>
                    <td><?= ($arrDetail[1]['knoi_internet'] == 1) ? 'Có' : 'Không' ?></td>
                </tr>
                <tr>
                    <th>LOẠI TV</th>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[0]['loai_chung'])[0]['ten_loai'])  ?></td>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[1]['loai_chung'])[0]['ten_loai'])  ?></td>
                </tr>
                <tr>
                    <th>ĐỘ PHÂN GIẢI</th>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['do_phan_giai'])[0]['ten_dl'])  ?></td>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['do_phan_giai'])[0]['ten_dl'])  ?></td>
                </tr>
            <? } elseif ($thietbi1 == 53 && $thietbi2 == 53) { ?>
                <tr>
                    <th>LOẠI LOA</th>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[0]['loai_chung'])[0]['ten_loai'])  ?></td>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[1]['loai_chung'])[0]['ten_loai'])  ?></td>
                </tr>
                <tr>
                    <th>CÔNG SUẤT</th>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['cong_suat'])[0]['ten_dl'])  ?></td>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['cong_suat'])[0]['ten_dl'])  ?></td>
                </tr>
            <? } elseif (($thietbi1 == 54 && $thietbi2 == 54) || ($thietbi1 == 57 && $thietbi2 == 57)) { ?>
                <tr>
                    <th>CÔNG SUẤT ÂM THANH</th>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['cong_suat'])[0]['ten_dl'])  ?></td>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['cong_suat'])[0]['ten_dl'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 37) { ?>
        <!-- phụ kiện, linh kiện -->
        <table>
            <tr>
                <th>LINH KIỆN/PHỤ KIỆN</th>
                <td><?= ($arrDetail[0]['link_kien_phu_kien'] == 1) ? 'Phụ kiện' : 'Linh kiện' ?></td>
                <td><?= ($arrDetail[1]['link_kien_phu_kien'] == 1) ? 'Phụ kiện' : 'Linh kiện' ?></td>
            </tr>
            <tr>
                <th>LOẠI PHỤ KIỆN</th>
                <td><?= ucfirst(search($sql_dm, "id", $arrDetail[0]['loai_linhphu_kien'])[0]['ten_loai'])  ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $arrDetail[1]['loai_linhphu_kien'])[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <th>THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_cl, "id", $thietbi1)[0]['name']) ?></td>
                <td><?= ucfirst(search($sql_cl, "id", $thietbi2)[0]['name']) ?></td>
            </tr>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 99) { ?>
        <!-- thiết bị đeo thông minh -->
        <table>
            <tr>
                <th>THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_dm, "id", $thietbi1)[0]['ten_loai']) ?></td>
                <td><?= ucfirst(search($sql_dm, "id", $thietbi2)[0]['ten_loai']) ?></td>
            </tr>
            <tr>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <th>DÒNG</th>
                <td><?= ucfirst(search($sql_dong, "id", $arrDetail[0]['dong_may'])[0]['ten_dong'])  ?></td>
                <td><?= ucfirst(search($sql_dong, "id", $arrDetail[1]['dong_may'])[0]['ten_dong'])  ?></td>
            </tr>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 96) { ?>
        <!-- Đồ điện tử khác -->
        <table>
            <tr>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? }?>
<?} else {?>
    <?if ($id_dm == 52 || $id_dm == 19) {?>
        <table>
            <tr>
                <td><?= date('H:i', $arrDetail[0]['tgian_bd']) . ' - ' . date('H:i', $arrDetail[0]['tgian_kt']) ?></td>
                <th>THỜI GIAN LÀM VIỆC</th>
                <td><?= date('H:i', $arrDetail[1]['tgian_bd']) . ' - ' . date('H:i', $arrDetail[1]['tgian_kt']) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaiXe1)[0]['ten_loai'])  ?></td>
                <th>LOẠI XE</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaiXe2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaiHangHoa1)[0]['ten_loai']) ?></td>
                <th>LOẠI HÀNG HOÁ GIAO</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaiHangHoa2)[0]['ten_loai']) ?></td>
            </tr>
            <tr>
                <td><?= search($arr_tinh, 'cit_id', $arrDetail[0]['quan_huyen'])[0]['cit_name'] . ', ' . search($arr_tinh, 'cit_id', $arrDetail[0]['new_city'])[0]['cit_name'] ?></td>
                <th>KHU VỰC</th>
                <td><?= search($arr_tinh, 'cit_id', $arrDetail[1]['quan_huyen'])[0]['cit_name'] . ', ' . search($arr_tinh, 'cit_id', $arrDetail[1]['new_city'])[0]['cit_name'] ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 82) { ?>
        <table>
            <tr>
                <td><?= ucfirst(search($sql_nsp, "id", $nhomsp1)[0]['name']) ?></td>
                <th>NHÓM SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_nsp, "id", $nhomsp2)[0]['name']) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <th>LOẠI SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_cl, "id", $chatlieu1)[0]['name']) ?></td>
                <th>CHẤT LIỆU</th>
                <td><?= ucfirst(search($sql_cl, "id", $chatlieu2)[0]['name']) ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 24) { ?>
        <table>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 84 || $id_dm == 88 || $id_dm == 87 || $id_dm == 101 || $id_dm == 103 || $id_dm == 43 || $id_dm == 44 || $id_dm == 45 || $id_dm == 46 || $id_dm == 53 || $id_dm == 54 || $id_dm == 116 || $id_dm == 117 || $id_dm == 86 || $id_dm == 60 || $id_dm == 83 || $id_dm == 85) { ?>
        <table>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 76 || $id_dm == 65 || $id_dm == 62) { ?>
        <table>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 110 || $id_dm == 111 || $id_dm == 112 || $id_dm == 113) { ?>
        <table>
            <tr>
                <td><?= ucfirst(search($sql_thu, "id", $giongthucung1)[0]['giong_thucung'])  ?></td>
                <th>GIỐNG THÚ CƯNG</th>
                <td><?= ucfirst(search($sql_thu, "id", $giongthucung2)[0]['giong_thucung'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dotuoi, "id", $dotuoi1)[0]['contents_name'])  ?></td>
                <th>ĐỘ TUỔI</th>
                <td><?= ucfirst(search($sql_dotuoi, "id", $dotuoi2)[0]['contents_name'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_kichco, "id", $kichco1)[0]['contents_name'])  ?></td>
                <th>KÍCH CỠ THÚ CƯNG</th>
                <td><?= ucfirst(search($sql_kichco, "id", $kichco2)[0]['contents_name'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_gioitinh, "id", $gioitinh1)[0]['contents_name'])  ?></td>
                <th>GIỚI TÍNH</th>
                <td><?= ucfirst(search($sql_gioitinh, "id", $gioitinh2)[0]['contents_name'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 114) { ?>
        <!-- đồ ăn, phụ kiện, dịch vụ -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_nsp, "id", $nhomsp1)[0]['name']) ?></td>
                <th>NHÓM SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_nsp, "id", $nhomsp2)[0]['name']) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_thu, "id", $giongthucung1)[0]['giong_thucung'])  ?></td>
                <th>GIỐNG THÚ CƯNG</th>
                <td><?= ucfirst(search($sql_thu, "id", $giongthucung2)[0]['giong_thucung'])  ?></td>
            </tr>
            <? if ($nhomsp1 == 58 && $nhomsp2 == 58) { ?>
                <tr>
                    <td><?= date('d/m/Y', $arrDetail[0]['han_su_dung']) ?></td>
                    <th>HẠN SỬ DỤNG</th>
                    <td><?= date('d/m/Y', $arrDetail[1]['han_su_dung']) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['khoiluong']) ?></td>
                    <th>TRỌNG LƯỢNG</th>
                    <td><?= ucfirst($arrDetail[1]['khoiluong']) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['the_tich']) ?></td>
                    <th>THỂ TÍCH</th>
                    <td><?= ucfirst($arrDetail[1]['the_tich']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 100 || $id_dm == 102 || $id_dm == 47 || $id_dm == 48 || $id_dm == 49 || $id_dm == 50 || $id_dm == 106) { ?>
        <table>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp3)[0]['ten_loai'])  ?></td>
                <th>LOẠI SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp4)[0]['ten_loai'])  ?></td>
            </tr>

            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 115) { ?>
        <table>
            <tr>
                <td><?= ucfirst($arrDetail[0]['do_tuoi']) ?></td>
                <th>ĐỘ TUỔI</th>
                <td><?= ucfirst($arrDetail[1]['do_tuoi']) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['kich_co']) ?></td>
                <th>KÍCH CỠ THÚ CƯNG</th>
                <td><?= ucfirst($arrDetail[1]['kich_co']) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_gioitinh, "id", $gioitinh1)[0]['contents_name'])  ?></td>
                <th>GIỚI TÍNH</th>
                <td><?= ucfirst(search($sql_gioitinh, "id", $gioitinh2)[0]['contents_name'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 61) { ?>
        <!-- Mỹ phẩm -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaihinh1)[0]['ten_loai'])  ?></td>
                <th>LOẠI HÌNH</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaihinh2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <th>LOẠI MỸ PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <td><?= date('d/m/Y', $arrDetail[0]['han_su_dung']) ?></td>
                <th>HẠN SỬ DỤNG</th>
                <td><?= date('d/m/Y', $arrDetail[1]['han_su_dung']) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 108) { ?>
        <!-- Phụ kiện - Dụng cụ làm đẹp -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <th>LOẠI PHỤ KIỆN</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 109) { ?>
        <!-- Thực phẩm chức năng -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <th>LOẠI THỰC PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= date('d/m/Y', $arrDetail[0]['han_su_dung']) ?></td>
                <th>HẠN SỬ DỤNG</th>
                <td><?= date('d/m/Y', $arrDetail[1]['han_su_dung']) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 63) { ?>
        <!-- Vật tư y tế -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <th>LOẠI VẬT TƯ</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['hang_vattu']) ?></td>
                <th>HÃNG</th>
                <td><?= ucfirst($arrDetail[1]['hang_vattu']) ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 56) { ?>
        <table>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaitb1)[0]['ten_loai'])  ?></td>
                <th>LOẠI THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaitb2)[0]['ten_loai'])  ?></td>
            </tr>
            <? if ($loaitb1 != 2107 && $loaitb2 != 2107) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                    <th>HÃNG</th>
                    <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
                </tr>
            <? } ?>
            <!-- if vào đây theo loại để ra công suất hoặc dung tích -->
            <? if ($loaitb1 == 2103 && $loaitb2 == 2103 || $loaitb1 == 2105 && $loaitb2 == 2105) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $dungluong1)[0]['ten_dl'])  ?></td>
                    <th>DUNG TÍCH</th>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $dungluong2)[0]['ten_dl'])  ?></td>
                </tr>
            <? } elseif ($loaitb1 == 2104 && $loaitb2 == 2104) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $congsuat1)[0]['ten_dl'])  ?></td>
                    <th>CÔNG SUẤT</th>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $congsuat2)[0]['ten_dl'])  ?></td>
                </tr>
            <? } elseif ($loaitb1 == 2106 && $loaitb2 == 2106) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $kg_giat1)[0]['ten_dl'])  ?></td>
                    <th>KHỐI LƯỢNG GIẶT</th>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $kg_giat2)[0]['ten_dl'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 57) { ?>
        <table>
            <tr>
                <td><?= ucfirst(search($sql_nsp, "id", $loaitb1)[0]['name'])  ?></td>
                <th>LOẠI THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_nsp, "id", $loaitb2)[0]['name'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <th>LOẠI SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 58 || $id_dm == 59) { ?>
        <table>
            <tr>
                <td><?= ucfirst(search($sql_nsp, "id", $loaitb1)[0]['name'])  ?></td>
                <th>LOẠI THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_nsp, "id", $loaitb2)[0]['name'])  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 78 || $id_dm == 79 || $id_dm == 80 || $id_dm == 82) { ?>
        <table>
            <tr>
                <td><?= ucfirst(search($sql_nsp, "id", $nhomsp1)[0]['name'])  ?></td>
                <th>NHÓM SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_nsp, "id", $nhomsp2)[0]['name'])  ?></td>
            </tr>
            <? if (($nhomsp1 == 2 && $nhomsp2 == 2) || ($nhomsp1 == 3 && $nhomsp2 == 3) || ($nhomsp1 == 5 && $nhomsp2 == 5) || ($nhomsp1 == 8 && $nhomsp2 == 8) || ($nhomsp1 == 9 && $nhomsp2 == 9) || ($nhomsp1 == 12 && $nhomsp2 == 12) || ($nhomsp1 == 13 && $nhomsp2 == 13) || ($nhomsp1 == 15 && $nhomsp2 == 15) || ($nhomsp1 == 18 && $nhomsp2 == 18) || ($nhomsp1 == 19 && $nhomsp2 == 19) || ($nhomsp1 == 27 && $nhomsp2 == 27) || ($nhomsp1 == 28 && $nhomsp2 == 28) || ($nhomsp1 == 29 && $nhomsp2 == 29)) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                    <th>LOẠI SẢN PHẨM</th>
                    <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
                </tr>

            <? } elseif (($nhomsp1 != 5 && $nhomsp2 != 5) || ($nhomsp1 != 10 && $nhomsp2 != 10) || ($nhomsp1 != 14 && $nhomsp2 != 14) || ($nhomsp1 != 15 && $nhomsp2 != 15)) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_cl, "id", $chatlieu1)[0]['name'])  ?></td>
                    <th>CHẤT LIỆU</th>
                    <td><?= ucfirst(search($sql_cl, "id", $chatlieu2)[0]['name'])  ?></td>
                </tr>
            <? } ?>
            <? if ($nhomsp1 == 14 && $nhomsp2 == 14) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_hd, "id", $hinhdang1)[0]['name'])  ?></td>
                    <th>HÌNH DÁNG</th>
                    <td><?= ucfirst(search($sql_hd, "id", $hinhdang2)[0]['name'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 118) { ?>
        <table>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <th>LOẠI SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>

            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 81) { ?>
        <table>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp1)[0]['ten_loai'])  ?></td>
                <th>LOẠI SẢN PHẨM</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp2)[0]['ten_loai'])  ?></td>
            </tr>
            <? if (($loaisp1 != 2064 && $loaisp2 != 2064)) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                    <th>THƯƠNG HIỆU</th>
                    <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
                </tr>
            <? } ?>
            <? if ($loaisp1 == 2060 && $loaisp2 == 2060) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_hd, "id", $hinhdang1)[0]['name'])  ?></td>
                    <th>HÌNH DÁNG</th>
                    <td><?= ucfirst(search($sql_hd, "id", $hinhdang2)[0]['name'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 75) { ?>
        <!--Dụng cụ thể thao -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_mtt, "id", $monthethao1)[0]['ten_mon'])  ?></td>
                <th>MÔN THỂ THAO</th>
                <td><?= ucfirst(search($sql_mtt, "id", $monthethao2)[0]['ten_mon'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp3)[0]['ten_loai'])  ?></td>
                <th>LOẠI DỤNG CỤ</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp4)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 104) { ?>
        <!--thời trang thể thao -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_mtt, "id", $monthethao1)[0]['ten_mon'])  ?></td>
                <th>MÔN THỂ THAO</th>
                <td><?= ucfirst(search($sql_mtt, "id", $monthethao2)[0]['ten_mon'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp3)[0]['ten_loai'])  ?></td>
                <th>LOẠI THỜI TRANG</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp4)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 105) { ?>
        <!--phụ kiện thể thao -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_mtt, "id", $monthethao1)[0]['ten_mon'])  ?></td>
                <th>MÔN THỂ THAO</th>
                <td><?= ucfirst(search($sql_mtt, "id", $monthethao2)[0]['ten_mon'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp3)[0]['ten_loai'])  ?></td>
                <th>LOẠI PHỤ KIỆN</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaisp4)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 8) { ?>
        <!--Xe đạp-->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <th>HÃNG XE</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaiXe1)[0]['ten_loai'])  ?></td>
                <th>LOẠI XE ĐẠP</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaiXe2)[0]['ten_loai'])  ?></td>
            </tr>
            <? if ($loaiXe1 == 210 && $loaiXe2 == 210) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_dm, "id", $dongxe1)[0]['ten_loai'])  ?></td>
                    <th>DÒNG XE ĐẠP THỂ THAO</th>
                    <td><?= ucfirst(search($sql_dm, "id", $dongxe2)[0]['ten_loai'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ucfirst(search($sql_xx, "id_xuatxu", $xuatxu1)[0]['noi_xuatxu'])  ?></td>
                <th>XUẤT XỨ</th>
                <td><?= ucfirst(search($sql_xx, "id_xuatxu", $xuatxu2)[0]['noi_xuatxu'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $kichco1)[0]['ten_manhinh'])  ?></td>
                <th>KÍCH THƯỚC KHUNG</th>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $kichco2)[0]['ten_manhinh'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac1)[0]['mau_sac'])  ?></td>
                <th>MÀU SẮC</th>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac2)[0]['mau_sac'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_cl, "id", $cl_khung1)[0]['name'])  ?></td>
                <th>CHẤT LIỆU KHUNG</th>
                <td><?= ucfirst(search($sql_cl, "id", $cl_khung2)[0]['name'])  ?></td>
            </tr>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 40 || $id_dm == 41) { ?>
        <!--Xe đạp điện/xe máy điện -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <th>HÃNG XE</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dl, "id_dl", $dongco1)[0]['ten_dl'])  ?></td>
                <th>ĐỘNG CƠ</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $dongco2)[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac1)[0]['mau_sac'])  ?></td>
                <th>MÀU SẮC</th>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac2)[0]['mau_sac'])  ?></td>
            </tr>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 9) { ?>
        <!--Xe máy -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <th>HÃNG XE</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <? if ($hang1 == 1286 && $hang2 != 1286) { ?>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['dong_xe']) ?></td>
                    <th>DÒNG XE</th>
                    <td><?= ucfirst(search($sql_dm, "id", $dongxe2)[0]['ten_loai'])  ?></td>
                </tr>
            <? } elseif ($hang1 != 1286 && $hang2 == 1286) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_dm, "id", $dongxe1)[0]['ten_loai'])  ?></td>
                    <th>DÒNG XE</th>
                    <td><?= ucfirst($arrDetail[1]['dong_xe']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ucfirst(search($sql_nsx, "id", $nam_sx1)[0]['nam_san_xuat'])  ?></td>
                <th>NĂM SẢN XUẤT</th>
                <td><?= ucfirst(search($sql_nsx, "id", $nam_sx2)[0]['nam_san_xuat'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loaiXe1)[0]['ten_loai'])  ?></td>
                <th>LOẠI XE</th>
                <td><?= ucfirst(search($sql_dm, "id", $loaiXe1)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dl, "id_dl", $dungtich1)[0]['ten_dl'])  ?></td>
                <th>DUNG TÍCH</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $dungtich2)[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= $arrDetail[0]['so_km_da_di'] ?></td>
                <th>SỐ Km ĐÃ ĐI</th>
                <td><?= $arrDetail[1]['so_km_da_di']  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 10) { ?>
        <!--Oto -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <th>HÃNG XE</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $dongxe1)[0]['ten_loai'])  ?></td>
                <th>DÒNG XE</th>
                <td><?= ucfirst(search($sql_dm, "id", $dongxe2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_nsx, "id", $nam_sx1)[0]['nam_san_xuat'])  ?></td>
                <th>NĂM SẢN XUẤT</th>
                <td><?= ucfirst(search($sql_nsx, "id", $nam_sx2)[0]['nam_san_xuat'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_sc, "id", $socho1)[0]['so_luong'])  ?></td>
                <th>SỐ CHỖ</th>
                <td><?= ucfirst(search($sql_sc, "id", $socho2)[0]['so_luong'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_nl[$nhienlieu1]) ?></td>
                <th>NHIÊN LIỆU</th>
                <td><?= ucfirst($arr_nl[$nhienlieu2]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_xx, "id_xuatxu", $xuatxu1)[0]['noi_xuatxu'])  ?></td>
                <th>XUẤT XỨ</th>
                <td><?= ucfirst(search($sql_xx, "id_xuatxu", $xuatxu2)[0]['noi_xuatxu'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_hs[$hopso1]) ?></td>
                <th>HỘP SỐ</th>
                <td><?= ucfirst($arr_hs[$hopso2]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_hd, "id", $kieudang1)[0]['name'])  ?></td>
                <th>KIỂU DÁNG</th>
                <td><?= ucfirst(search($sql_hd, "id", $kieudang2)[0]['name'])  ?></td>
            </tr>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac1)[0]['mau_sac'])  ?></td>
                <th>MÀU SẮC</th>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac2)[0]['mau_sac'])  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= $arrDetail[0]['so_km_da_di'] ?></td>
                <th>SỐ Km ĐÃ ĐI</th>
                <td><?= $arrDetail[1]['so_km_da_di']  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 42) { ?>
        <!-- nội thất oto -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loai_noithat1)[0]['ten_loai'])  ?></td>
                <th>LOẠI NỘI THẤT</th>
                <td><?= ucfirst(search($sql_dm, "id", $loai_noithat2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 39) { ?>
        <!-- phụ tùng xe -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $loai_phutung1)[0]['ten_loai'])  ?></td>
                <th>LOẠI PHỤ TÙNG</th>
                <td><?= ucfirst(search($sql_dm, "id", $loai_phutung2)[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 38) { ?>
        <!-- xe tải, xe khác -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <th>HÃNG XE</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dl, "id_dl", $trongtai1)[0]['ten_dl'])  ?></td>
                <th>TRỌNG TẢI</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $trongtai2)[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_nl[$nhienlieu1]) ?></td>
                <th>NHIÊN LIỆU</th>
                <td><?= ucfirst($arr_nl[$nhienlieu2]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac1)[0]['mau_sac'])  ?></td>
                <th>MÀU SẮC</th>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac2)[0]['mau_sac'])  ?></td>
            </tr>
            <tr>
                <td><?= ($arrDetail[0]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ($arrDetail[1]['new_tinhtrang'] == 1) ? 'Mới' : 'Đã sử dụng' ?></td>
            </tr>
            <tr>
                <td><?= $arrDetail[0]['so_km_da_di'] ?></td>
                <th>SỐ Km ĐÃ ĐI</th>
                <td><?= $arrDetail[1]['so_km_da_di']  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 11) { ?>
        <!-- Nhà đất -->
        <table>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <th>CẦN BÁN / CHO THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['ten_toa_nha']) ?></td>
                    <th>TÊN TOÀ NHÀ / KHU DÂN CƯ</th>
                    <td><?= ucfirst($arrDetail[1]['ten_toa_nha']) ?></td>
                </tr>
            <? } elseif ($type_user1 == 2 && $type_user2 == 2) { ?>
                <tr>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <th>CẦN MUA / CẦN THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['khu_vuc_mua']) ?></td>
                    <th>KHU VỰC MUỐN MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[1]['khu_vuc_mua']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['tong_so_tang'])[0]['so_luong'])  ?></td>
                <th>TỔNG SỐ TẦNG</th>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['tong_so_tang'])[0]['so_luong'])  ?></td>
            </tr>
            <? if ($type_user1 == 2 && $type_user2 == 2) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['so_pngu'])[0]['so_luong'])  ?></td>
                    <th>SỐ PHÒNG NGỦ</th>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['so_pngu'])[0]['so_luong'])  ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['so_pve_sinh'])[0]['so_luong'])  ?></td>
                    <th>SỐ PHÒNG VỆ SINH</th>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['so_pve_sinh'])[0]['so_luong'])  ?></td>
                </tr>
            <? } ?>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <td><?= ucfirst($arr_huong[$arrDetail[0]['huong_chinh']]) ?></td>
                    <th>HƯỚNG CỬA CHÍNH</th>
                    <td><?= ucfirst($arr_huong[$arrDetail[1]['huong_chinh']]) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arr_gtpl[$arrDetail[0]['giay_to_phap_ly']]) ?></td>
                    <th>GIẤY TỜ PHÁP LÝ</th>
                    <td><?= ucfirst($arr_gtpl[$arrDetail[1]['giay_to_phap_ly']]) ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ucfirst($arr_ttnt[$arrDetail[0]['tinh_trang_noi_that']]) ?></td>
                <th>TÌNH TRẠNG NỘI THẤT</th>
                <td><?= ucfirst($arr_ttnt[$arrDetail[1]['tinh_trang_noi_that']]) ?></td>
            </tr>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <td><?= $arrDetail[0]['chieu_dai'] ?> m</td>
                    <th>CHIỀU DÀI</th>
                    <td><?= $arrDetail[1]['chieu_dai'] ?> m</td>
                </tr>
                <tr>
                    <td><?= $arrDetail[0]['chieu_rong'] ?> m</td>
                    <th>CHIỀU NGANG</th>
                    <td><?= $arrDetail[1]['chieu_rong'] ?> m</td>
                </tr>
            <? } ?>
            <tr>
                <td><?= $arrDetail[0]['dien_tich'] ?> m<sup>2</sup></td>
                <th>DIỆN TÍCH</th>
                <td><?= $arrDetail[1]['dien_tich'] ?> m<sup>2</sup></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 27) { ?>
        <!-- Chung Cư -->
        <table>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <th>CẦN BÁN / CHO THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['ten_toa_nha']) ?></td>
                    <th>TÊN TOÀ NHÀ / KHU DÂN CƯ</th>
                    <td><?= ucfirst($arrDetail[1]['ten_toa_nha']) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['tang_so']) ?></td>
                    <th>TẦNG SỐ</th>
                    <td><?= ucfirst($arrDetail[1]['tang_so']) ?></td>
                </tr>
            <? } elseif ($type_user1 == 2 && $type_user2 == 2) { ?>
                <tr>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <th>CẦN MUA / CẦN THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['khu_vuc_mua']) ?></td>
                    <th>KHU VỰC MUỐN MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[1]['khu_vuc_mua']) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['ten_toa_nha']) ?></td>
                    <th>TÊN TOÀ NHÀ MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[1]['ten_toa_nha']) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['tong_so_tang'])[0]['so_luong'])  ?></td>
                    <th>TỔNG SỐ TẦNG</th>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['tong_so_tang'])[0]['so_luong'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ucfirst($arr_lhch[$arrDetail[0]['loai_hinh_canho']]) ?></td>
                <th>LOẠI HÌNH CĂN HỘ</th>
                <td><?= ucfirst($arr_lhch[$arrDetail[1]['loai_hinh_canho']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['so_pngu'])[0]['so_luong'])  ?></td>
                <th>SỐ PHÒNG NGỦ</th>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['so_pngu'])[0]['so_luong'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['so_pve_sinh'])[0]['so_luong'])  ?></td>
                <th>SỐ PHÒNG VỆ SINH</th>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['so_pve_sinh'])[0]['so_luong'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_ttnt[$arrDetail[0]['tinh_trang_noi_that']]) ?></td>
                <th>TÌNH TRẠNG NỘI THẤT</th>
                <td><?= ucfirst($arr_ttnt[$arrDetail[1]['tinh_trang_noi_that']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_gtpl[$arrDetail[0]['giay_to_phap_ly']]) ?></td>
                <th>GIẤY TỜ PHÁP LÝ</th>
                <td><?= ucfirst($arr_gtpl[$arrDetail[1]['giay_to_phap_ly']]) ?></td>
            </tr>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <td><?= $arrDetail[0]['chieu_dai'] ?> m</td>
                    <th>CHIỀU DÀI</th>
                    <td><?= $arrDetail[1]['chieu_dai'] ?> m</td>
                </tr>
                <tr>
                    <td><?= $arrDetail[0]['chieu_rong'] ?> m</td>
                    <th>CHIỀU NGANG</th>
                    <td><?= $arrDetail[1]['chieu_rong'] ?> m</td>
                </tr>
            <? } ?>
            <tr>
                <td><?= $arrDetail[0]['dien_tich'] ?> m<sup>2</sup></td>
                <th>DIỆN TÍCH</th>
                <td><?= $arrDetail[1]['dien_tich'] ?> m<sup>2</sup></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 33 || $id_dm == 34) { ?>
        <!-- Văn phòng -->
        <table>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <th>CẦN BÁN / CHO THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['ten_toa_nha']) ?></td>
                    <th>TÊN TOÀ NHÀ / KHU DÂN CƯ</th>
                    <td><?= ucfirst($arrDetail[1]['ten_toa_nha']) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['tang_so']) ?></td>
                    <th>TẦNG SỐ</th>
                    <td><?= ucfirst($arrDetail[1]['tang_so']) ?></td>
                </tr>
            <? } elseif ($type_user1 == 2 && $type_user2 == 2) { ?>
                <tr>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <th>CẦN MUA / CẦN THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['khu_vuc_mua']) ?></td>
                    <th>KHU VỰC MUỐN MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[1]['khu_vuc_mua']) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['tong_so_tang'])[0]['so_luong'])  ?></td>
                    <th>TỔNG SỐ TẦNG</th>
                    <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['tong_so_tang'])[0]['so_luong'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ucfirst($arr_ttnt[$arrDetail[0]['tinh_trang_noi_that']]) ?></td>
                <th>TÌNH TRẠNG NỘI THẤT</th>
                <td><?= ucfirst($arr_ttnt[$arrDetail[1]['tinh_trang_noi_that']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_huong[$arrDetail[0]['huong_chinh']]) ?></td>
                <th>HƯỚNG CỬA CHÍNH</th>
                <td><?= ucfirst($arr_huong[$arrDetail[1]['huong_chinh']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_gtpl[$arrDetail[0]['giay_to_phap_ly']]) ?></td>
                <th>GIẤY TỜ PHÁP LÝ</th>
                <td><?= ucfirst($arr_gtpl[$arrDetail[1]['giay_to_phap_ly']]) ?></td>
            </tr>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <td><?= $arrDetail[0]['chieu_dai'] ?> m</td>
                    <th>CHIỀU DÀI</th>
                    <td><?= $arrDetail[1]['chieu_dai'] ?> m</td>
                </tr>
                <tr>
                    <td><?= $arrDetail[0]['chieu_rong'] ?> m</td>
                    <th>CHIỀU NGANG</th>
                    <td><?= $arrDetail[1]['chieu_rong'] ?> m</td>
                </tr>
            <? } ?>
            <tr>
                <td><?= $arrDetail[0]['dien_tich'] ?> m<sup>2</sup></td>
                <th>DIỆN TÍCH</th>
                <td><?= $arrDetail[1]['dien_tich'] ?> m<sup>2</sup></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 12) { ?>
        <!-- Đất -->
        <table>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <th>CẦN BÁN / CHO THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['ten_toa_nha']) ?></td>
                    <th>TÊN DỰ ÁN</th>
                    <td><?= ucfirst($arrDetail[1]['ten_toa_nha']) ?></td>
                </tr>
            <? } elseif ($type_user1 == 2 && $type_user2 == 2) { ?>
                <tr>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <th>CẦN MUA / CẦN THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['khu_vuc_mua']) ?></td>
                    <th>TÊN DỰ ÁN MUỐN MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[1]['khu_vuc_mua']) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['khu_vuc_mua']) ?></td>
                    <th>KHU VỰC MUỐN MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[1]['khu_vuc_mua']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ucfirst($arr_lhdat[$arrDetail[0]['loai_hinh_dat']]) ?></td>
                <th>LOẠI HÌNH ĐẤT</th>
                <td><?= ucfirst($arr_lhdat[$arrDetail[1]['loai_hinh_dat']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_huong[$arrDetail[0]['huong_chinh']]) ?></td>
                <th>HƯỚNG ĐẤT</th>
                <td><?= ucfirst($arr_huong[$arrDetail[1]['huong_chinh']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_gtpl[$arrDetail[0]['giay_to_phap_ly']]) ?></td>
                <th>GIẤY TỜ PHÁP LÝ</th>
                <td><?= ucfirst($arr_gtpl[$arrDetail[1]['giay_to_phap_ly']]) ?></td>
            </tr>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <td><?= $arrDetail[0]['chieu_dai'] ?> m</td>
                    <th>CHIỀU DÀI</th>
                    <td><?= $arrDetail[1]['chieu_dai'] ?> m</td>
                </tr>
                <tr>
                    <td><?= $arrDetail[0]['chieu_rong'] ?> m</td>
                    <th>CHIỀU NGANG</th>
                    <td><?= $arrDetail[1]['chieu_rong'] ?> m</td>
                </tr>
            <? } ?>
            <tr>
                <td><?= $arrDetail[0]['dien_tich'] ?> m<sup>2</sup></td>
                <th>DIỆN TÍCH</th>
                <td><?= $arrDetail[1]['dien_tich'] ?> m<sup>2</sup></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 26 || $id_dm == 28 || $id_dm == 29) { ?>
        <!-- Nhà trong ngõ -->
        <table>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <th>CẦN BÁN / CHO THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['ten_toa_nha']) ?></td>
                    <th>TÊN TOÀ NHÀ / KHU DÂN CƯ</th>
                    <td><?= ucfirst($arrDetail[1]['ten_toa_nha']) ?></td>
                </tr>
            <? } elseif ($type_user1 == 2 && $type_user2 == 2) { ?>
                <tr>
                    <td><?= ucfirst($arr_nhucau[$nhucau1]) ?></td>
                    <th>CẦN MUA / CẦN THUÊ</th>
                    <td><?= ucfirst($arr_nhucau[$nhucau2]) ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['khu_vuc_mua']) ?></td>
                    <th>KHU VỰC MUỐN MUA/THUÊ</th>
                    <td><?= ucfirst($arrDetail[1]['khu_vuc_mua']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['tong_so_tang'])[0]['so_luong'])  ?></td>
                <th>TỔNG SỐ TẦNG</th>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['tong_so_tang'])[0]['so_luong'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_huong[$arrDetail[0]['huong_chinh']]) ?></td>
                <th>HƯỚNG CỬA CHÍNH</th>
                <td><?= ucfirst($arr_huong[$arrDetail[1]['huong_chinh']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['so_pngu'])[0]['so_luong'])  ?></td>
                <th>SỐ PHÒNG NGỦ</th>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['so_pngu'])[0]['so_luong'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[0]['so_pve_sinh'])[0]['so_luong'])  ?></td>
                <th>SỐ PHÒNG VỆ SINH</th>
                <td><?= ucfirst(search($sql_tang, "id", $arrDetail[1]['so_pve_sinh'])[0]['so_luong'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_ttnt[$arrDetail[0]['tinh_trang_noi_that']]) ?></td>
                <th>TÌNH TRẠNG NỘI THẤT</th>
                <td><?= ucfirst($arr_ttnt[$arrDetail[1]['tinh_trang_noi_that']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_gtpl[$arrDetail[0]['giay_to_phap_ly']]) ?></td>
                <th>GIẤY TỜ PHÁP LÝ</th>
                <td><?= ucfirst($arr_gtpl[$arrDetail[1]['giay_to_phap_ly']]) ?></td>
            </tr>
            <? if (($type_user1 == 1 || $type_user1 == 3) && ($type_user2 == 1 || $type_user2 == 3)) { ?>
                <tr>
                    <td><?= $arrDetail[0]['chieu_dai'] ?> m</td>
                    <th>CHIỀU DÀI</th>
                    <td><?= $arrDetail[1]['chieu_dai'] ?> m</td>
                </tr>
                <tr>
                    <td><?= $arrDetail[0]['chieu_rong'] ?> m</td>
                    <th>CHIỀU NGANG</th>
                    <td><?= $arrDetail[1]['chieu_rong'] ?> m</td>
                </tr>
            <? } ?>
            <tr>
                <td><?= $arrDetail[0]['dien_tich'] ?> m<sup>2</sup></td>
                <th>DIỆN TÍCH</th>
                <td><?= $arrDetail[1]['dien_tich'] ?> m<sup>2</sup></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 5) { ?>
        <!-- Máy tính để bàn -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_vixuli, "bovi_id", $arrDetail[0]['bovi_xuly'])[0]['bovi_ten'])  ?></td>
                <th>BỘ VI XỬ LÝ</th>
                <td><?= ucfirst(search($sql_vixuli, "bovi_id", $arrDetail[1]['bovi_xuly'])[0]['bovi_ten'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['ram'])[0]['ten_dl'])  ?></td>
                <th>RAM</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['ram'])[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['o_cung'])[0]['ten_dl'])  ?></td>
                <th>Ổ CỨNG</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['o_cung'])[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_loaiocung[$arrDetail[0]['loai_o_cung']]) ?></td>
                <th>LOẠI Ổ CỨNG</th>
                <td><?= ucfirst($arr_loaiocung[$arrDetail[1]['loai_o_cung']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[0]['man_hinh'])[0]['ten_manhinh'])  ?></td>
                <th>CARD MÀN HÌNH</th>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[1]['man_hinh'])[0]['ten_manhinh'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[0]['kich_co'])[0]['ten_manhinh'])  ?></td>
                <th>KÍCH CỠ MÀN HÌNH</th>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[1]['kich_co'])[0]['ten_manhinh'])  ?></td>
            </tr>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 98) { ?>
        <!-- Laptop -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <? if ($hang1 == 1378 && $hang2 != 1378) { ?>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['dong_may']) ?></td>
                    <th>DÒNG MÁY</th>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[1]['dong_may'])[0]['ten_loai'])  ?></td>
                </tr>
            <? } elseif ($hang1 != 1378 && $hang2 == 1378) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[0]['dong_may'])[0]['ten_loai'])  ?></td>
                    <th>DÒNG MÁY</th>
                    <td><?= ucfirst($arrDetail[1]['dong_may']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ucfirst(search($sql_vixuli, "bovi_id", $arrDetail[0]['bovi_xuly'])[0]['bovi_ten'])  ?></td>
                <th>BỘ VI XỬ LÝ</th>
                <td><?= ucfirst(search($sql_vixuli, "bovi_id", $arrDetail[1]['bovi_xuly'])[0]['bovi_ten'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['ram'])[0]['ten_dl'])  ?></td>
                <th>RAM</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['ram'])[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['o_cung'])[0]['ten_dl'])  ?></td>
                <th>Ổ CỨNG</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['o_cung'])[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_loaiocung[$arrDetail[0]['loai_o_cung']]) ?></td>
                <th>LOẠI Ổ CỨNG</th>
                <td><?= ucfirst($arr_loaiocung[$arrDetail[1]['loai_o_cung']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[0]['man_hinh'])[0]['ten_manhinh'])  ?></td>
                <th>CARD MÀN HÌNH</th>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[1]['man_hinh'])[0]['ten_manhinh'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[0]['kich_co'])[0]['ten_manhinh'])  ?></td>
                <th>KÍCH CỠ MÀN HÌNH</th>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[1]['kich_co'])[0]['ten_manhinh'])  ?></td>
            </tr>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 6) { ?>
        <!-- Máy ảnh, máy quay -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_nsp, "id", $thietbi1)[0]['name']) ?></td>
                <th>THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_nsp, "id", $thietbi2)[0]['name']) ?></td>
            </tr>
            <? if ($thietbi1 != 34 && $thietbi2 != 34) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                    <th>HÃNG</th>
                    <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
                </tr>

            <? } elseif ($thietbi1 == 34 && $thietbi2 == 34) { ?>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['hang']) ?></td>
                    <th>HÃNG</th>
                    <td><?= ucfirst($arrDetail[1]['hang']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 7) { ?>
        <!-- Điện thoại di động -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <? if ($hang1 == 1683 && $hang2 != 1683) { ?>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['dong_may']) ?></td>
                    <th>DÒNG MÁY</th>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[1]['dong_may'])[0]['ten_loai'])  ?></td>
                </tr>
            <? } elseif ($hang1 != 1683 && $hang2 == 1683) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[0]['dong_may'])[0]['ten_loai'])  ?></td>
                    <th>DÒNG MÁY</th>
                    <td><?= ucfirst($arrDetail[1]['dong_may']) ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac1)[0]['mau_sac'])  ?></td>
                <th>MÀU SẮC</th>
                <td><?= ucfirst(search($sql_mx, "id_color", $mausac2)[0]['mau_sac'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['dung_luong'])[0]['ten_dl'])  ?></td>
                <th>DUNG LƯỢNG</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['dung_luong'])[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 35) { ?>
        <!-- Máy tính bảng -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <? if ($hang1 == 1694 && $hang2 == 1694) { ?>
                <tr>
                    <td><?= ucfirst($arrDetail[0]['dong_may']) ?></td>
                    <th>DÒNG MÁY</th>
                    <td><?= ucfirst($arrDetail[1]['dong_may']) ?></td>
                </tr>
            <? } elseif ($hang1 != 1694 && $hang2 != 1694) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[0]['dong_may'])[0]['ten_loai'])  ?></td>
                    <th>DÒNG MÁY</th>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[1]['dong_may'])[0]['ten_loai'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= ($arrDetail[0]['sdung_sim'] == 1) ? 'Có' : 'Không' ?></td>
                <th>SỬ DỤNG SIM</th>
                <td><?= ($arrDetail[1]['sdung_sim'] == 1) ? 'Có' : 'Không' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['dung_luong'])[0]['ten_dl'])  ?></td>
                <th>DUNG LƯỢNG</th>
                <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['dung_luong'])[0]['ten_dl'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[0]['man_hinh'])[0]['ten_manhinh'])  ?></td>
                <th>KÍCH CỠ MÀN HÌNH</th>
                <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[1]['man_hinh'])[0]['ten_manhinh'])  ?></td>
            </tr>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 36) { ?>
        <!-- tivi, loa, amly, máy nghe nhạc -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_nsp, "id", $thietbi1)[0]['name']) ?></td>
                <th>THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_nsp, "id", $thietbi2)[0]['name']) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <? if ($thietbi1 == 52 && $thietbi2 == 52) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[0]['man_hinh'])[0]['ten_manhinh'])  ?></td>
                    <th>KÍCH THƯỚC</th>
                    <td><?= ucfirst(search($sql_mh, "id_manhinh", $arrDetail[1]['man_hinh'])[0]['ten_manhinh'])  ?></td>
                </tr>
                <tr>
                    <td><?= ($arrDetail[0]['knoi_internet'] == 1) ? 'Có' : 'Không' ?></td>
                    <th>KẾT NỐI INTERNET</th>
                    <td><?= ($arrDetail[1]['knoi_internet'] == 1) ? 'Có' : 'Không' ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[0]['loai_chung'])[0]['ten_loai'])  ?></td>
                    <th>LOẠI TV</th>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[1]['loai_chung'])[0]['ten_loai'])  ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['do_phan_giai'])[0]['ten_dl'])  ?></td>
                    <th>ĐỘ PHÂN GIẢI</th>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['do_phan_giai'])[0]['ten_dl'])  ?></td>
                </tr>
            <? } elseif ($thietbi1 == 53 && $thietbi2 == 53) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[0]['loai_chung'])[0]['ten_loai'])  ?></td>
                    <th>LOẠI LOA</th>
                    <td><?= ucfirst(search($sql_dm, "id", $arrDetail[1]['loai_chung'])[0]['ten_loai'])  ?></td>
                </tr>
                <tr>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['cong_suat'])[0]['ten_dl'])  ?></td>
                    <th>CÔNG SUẤT</th>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['cong_suat'])[0]['ten_dl'])  ?></td>
                </tr>
            <? } elseif (($thietbi1 == 54 && $thietbi2 == 54) || ($thietbi1 == 57 && $thietbi2 == 57)) { ?>
                <tr>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[0]['cong_suat'])[0]['ten_dl'])  ?></td>
                    <th>CÔNG SUẤT ÂM THANH</th>
                    <td><?= ucfirst(search($sql_dl, "id_dl", $arrDetail[1]['cong_suat'])[0]['ten_dl'])  ?></td>
                </tr>
            <? } ?>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 37) { ?>
        <!-- phụ kiện, linh kiện -->
        <table>
            <tr>
                <td><?= ($arrDetail[0]['link_kien_phu_kien'] == 1) ? 'Phụ kiện' : 'Linh kiện' ?></td>
                <th>LINH KIỆN/PHỤ KIỆN</th>
                <td><?= ($arrDetail[1]['link_kien_phu_kien'] == 1) ? 'Phụ kiện' : 'Linh kiện' ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $arrDetail[0]['loai_linhphu_kien'])[0]['ten_loai'])  ?></td>
                <th>LOẠI PHỤ KIỆN</th>
                <td><?= ucfirst(search($sql_dm, "id", $arrDetail[1]['loai_linhphu_kien'])[0]['ten_loai'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_cl, "id", $thietbi1)[0]['name']) ?></td>
                <th>THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_cl, "id", $thietbi2)[0]['name']) ?></td>
            </tr>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 99) { ?>
        <!-- thiết bị đeo thông minh -->
        <table>
            <tr>
                <td><?= ucfirst(search($sql_dm, "id", $thietbi1)[0]['ten_loai']) ?></td>
                <th>THIẾT BỊ</th>
                <td><?= ucfirst(search($sql_dm, "id", $thietbi2)[0]['ten_loai']) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_hang, "id", $hang1)[0]['ten_hang'])  ?></td>
                <th>HÃNG</th>
                <td><?= ucfirst(search($sql_hang, "id", $hang2)[0]['ten_hang'])  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst(search($sql_dong, "id", $arrDetail[0]['dong_may'])[0]['ten_dong'])  ?></td>
                <th>DÒNG</th>
                <td><?= ucfirst(search($sql_dong, "id", $arrDetail[1]['dong_may'])[0]['ten_dong'])  ?></td>
            </tr>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
    <? } elseif ($id_dm == 96) { ?>
        <!-- Đồ điện tử khác -->
        <table>
            <tr>
                <td><?= search($sql_bh, "id_baohanh", $baohanh1)[0]['tgian_baohanh'] ?></td>
                <th>BẢO HÀNH</th>
                <td><?= search($sql_bh, "id_baohanh", $baohanh2)[0]['tgian_baohanh']  ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arr_tt[$arrDetail[0]['new_tinhtrang']]) ?></td>
                <th>TÌNH TRẠNG</th>
                <td><?= ucfirst($arr_tt[$arrDetail[1]['new_tinhtrang']]) ?></td>
            </tr>
            <tr>
                <td><?= ucfirst($arrDetail[0]['dia_chi']) ?></td>
                <th>KHU VỰC</th>
                <td><?= ucfirst($arrDetail[1]['dia_chi']) ?></td>
            </tr>
        </table>
<? }
} ?>