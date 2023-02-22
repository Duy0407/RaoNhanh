<?

date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once("../classes/database.php");
require_once("../functions/functions.php");
ob_start();
require_once("../functions/function_rewrite.php");
require_once("../functions/pagebreak.php");
require_once("../classes/config.php");
// require_once("../classes/user.php");
require_once("../classes/resize-class.php");

$version = 180;

if ($_SERVER['REDIRECT_URL'] == '/mua-ban/121/tim-viec-lam.html' || $_SERVER['REDIRECT_URL'] == '/mua-ban/119/viec-lam.html') {
    header('Location: /viec-lam.html');
}

$mt_rand = mt_rand(100000, 999999);

$file = '../cache_file/sql_cache.json';
$arraytong = json_decode(file_get_contents($file), true);
// tất cả tỉnh thành
$arrcity = $arraytong['db_city'];
// tất cả tình thành cùng quận huyện
$arrcity2 = $arraytong['db_city2'];
$db_arrcity2 = array_column($arrcity2, 'cit_name', 'cit_id');
// tất cả quận huyện
$arrcity3 = $arraytong['db_dis'];
$db_arrcity3 = array_column($arrcity3, 'cit_name1', 'cit_id');
// tat ca phuong xa
$db_pxa = $arraytong['db_pxa'];

// tất cả danh mục sản phẩm
$db_cat = $arraytong['db_cat'];

$db_cattk = array_column($db_cat, 'cat_name', 'cat_id');

// tất cả danh mục trừ: việc làm, tìm ứng viên
$db_all_dmuc = $arraytong['db_all_dmuc'];
$list_db_cattk = array_column($db_all_dmuc, 'cat_name');
// tất cả danh mục trừ: việc làm, tìm viec lam
$db_all_dmuc1 = $arraytong['db_all_dmuc1'];
$list_db_cattk1 = array_column($db_all_dmuc1, 'cat_name');
// danh mục sản phẩm cha
$db_cat1 = $arraytong['db_cat1'];
// print_r($db_cat1);
// tất cả tags
$tags_tk = $arraytong['tags_tk'];
$tags_tk1 = array_column($tags_tk, 'ten_tags', 'tags_id');

$list_tag_auto = array_column($tags_tk, 'ten_tags');
// danh muc viec lam
$db_catvl = $arraytong['db_catvl'];
$db_cat_vl = array_column($db_catvl, 'cat_name', 'cat_id');

// tags viec lam
$db_tagsvl = $arraytong['db_tagsvl'];
$db_tags_vl = array_column($db_tagsvl, 'key_name', 'key_id');

$dbtags_vl = array_column($db_tagsvl, 'key_name_vl', 'key_id');

$tags_vltk = array_column($db_tagsvl, 'key_name_vl');

// danh muc viec lam tim kiem
$db_tkcatvl = $arraytong['db_tkcatvl'];
$db_tkcatvl_col = array_column($db_tkcatvl, 'cat_name', 'cat_id');
$tkcatvl_col = array_column($db_tkcatvl, 'cat_name_vl1', 'cat_id');

$list_vl_auto = array_column($db_tkcatvl, 'cat_name_vl');

// tim kiem danh muc
$db_tkcat = $arraytong['db_tkcat'];
$db_tkcat_col = array_column($db_tkcat, 'cat_name', 'cat_id');

// chi tiet
$db_manhinh      = $arraytong['db_manhinh'];
$db_lchung       = $arraytong['db_lchung'];
$db_dluong       = $arraytong['db_dluong'];
$db_nspham       = $arraytong['db_nspham'];
$db_baohanh      = $arraytong['db_baohanh'];
$db_gthucung     = $arraytong['db_gthucung'];
$db_ttthucung    = $arraytong['db_ttthucung'];
$db_mausac       = $arraytong['db_mausac'];
$db_sp_chatlieu  = $arraytong['db_sp_chatlieu'];
$db_xuatxu       = $arraytong['db_xuatxu'];
$db_nsanxuat     = $arraytong['db_nsanxuat'];
$db_soluong      = $arraytong['db_soluong'];
$db_nsp_hdang    = $arraytong['db_nsp_hdang'];
$db_mthethao     = $arraytong['db_mthethao'];
$db_tangphong    = $arraytong['db_tangphong'];
$db_hang         = $arraytong['db_hang'];

// echo "<pre>";
// print_r($db_hang);
// echo "</pre>";

$db_dong         = $arraytong['db_dong'];
$db_bovi_xuly    = $arraytong['db_bovi_xuly'];
// danh mục con theo danh mục cha
$db_arr_cat = $arraytong['db_arr_cat'];
// từ khóa đặc biệt: mua bán, mua, cho thuê, thuê
$db_tkhoadb  = $arraytong['db_tkhoadb'];
$db_tkhoadb1 = array_column($db_tkhoadb, 'tags_id');
// từ khóa đặc biệt: bán
$qr_tkhoadb2  = $arraytong['db_tkhoadb2'];
$db_tkhoadb2 = array_column($qr_tkhoadb2, 'tags_id');

$db_tkhoadb3 = array_merge($db_tkhoadb1, $db_tkhoadb2);

//get dữ liệu sau đăng nhập
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $userid   = $_COOKIE['UID'];
    $userpass = $_COOKIE['PHPSESPASS'];
    $usertype = $_COOKIE['UT'];

    $qr_info    = new db_query("SELECT `usc_phone`, `usc_address`, `usc_id`, `usc_name`, `usc_logo`, `usc_money`, `usc_time`, `xacthuc_lket`,
                                `usc_email`, `usc_store_name`, `usc_authentic` FROM user
                                WHERE usc_id = " . $userid . " AND usc_pass  = '" . $userpass . "'");
    $login = mysql_num_rows($qr_info->result);
    if ($login > 0) {
        $row4 = mysql_fetch_assoc($qr_info->result);
        if($row4['usc_authentic'] == 0){
            header('Location: /xac-nhan-dang-ky.html');
        };
        $usc_phone = $row4['usc_phone'];
        $usc_email = $row4['usc_email'];
        $usc_address = $row4['usc_address'];
        $user_id = $row4['usc_id'];
        $user_name = $row4['usc_name'];

        $user_logo = $row4['usc_logo'];

        $user_money = $row4['usc_money'];
        $user_time = $row4['usc_time'];
        if ($user_time == 0) {
            $user_time = '';
        } else {
            $user_time = date('d-m-Y', $user_time);
        };
        $usc_store_name = $row4['usc_store_name'];

        $xacthuc_lket = $row4['xacthuc_lket'];
    }

    // ds tin đã thích
    $check = new db_query("SELECT `id`,`new_id` FROM `tin_yeu_thich` WHERE `user_id` = '$user_id' AND `usc_type` = '$usertype' ORDER BY id DESC ");
    $list_new_like = array_column($check->result_array(), 'new_id');

    // đếm đơn bán hàng
    $cho_xacnhan = new db_query("SELECT COUNT(`dh_id`) AS cou_cxn FROM `dat_hang` WHERE `id_nguoi_ban` = $userid AND `trang_thai` = 0 AND `dh_active` = 1 "); // chờ xác nhận
    $cou_cxn = mysql_fetch_assoc($cho_xacnhan->result)['cou_cxn'];

    $dang_xl = new db_query("SELECT COUNT(`dh_id`) AS cou_dxl FROM `dat_hang` WHERE `id_nguoi_ban` = $userid AND `trang_thai` = 1 "); // đang xử lý
    $cou_dxl = mysql_fetch_assoc($dang_xl->result)['cou_dxl'];

    $dang_giao = new db_query("SELECT COUNT(`dh_id`) AS cou_dg FROM `dat_hang` WHERE `id_nguoi_ban` = $userid AND `trang_thai` = 2 "); // đang giao
    $cou_dg = mysql_fetch_assoc($dang_giao->result)['cou_dg'];

    $da_giao = new db_query("SELECT COUNT(`dh_id`) AS cou_dag FROM `dat_hang` WHERE `id_nguoi_ban` = $userid AND `trang_thai` = 3 "); // đã giao
    $cou_dag = mysql_fetch_assoc($da_giao->result)['cou_dag'];

    $hoan_tat = new db_query("SELECT COUNT(`dh_id`) AS cou_ht FROM `dat_hang` WHERE `id_nguoi_ban` = $userid AND `trang_thai` = 4 "); // hoàn tất
    $cou_ht = mysql_fetch_assoc($hoan_tat->result)['cou_ht'];

    $huy_dhang = new db_query("SELECT COUNT(`dh_id`) AS cou_hdh FROM `dat_hang` WHERE `id_nguoi_ban` = $userid AND `trang_thai` = 5 "); // đã hủy đơn
    $cou_hdh = mysql_fetch_assoc($huy_dhang->result)['cou_hdh'];

    // đếm đơn mua hàng
    $cho_xacnhanm = new db_query("SELECT COUNT(`dh_id`) AS cou_cxnm FROM `dat_hang` WHERE `id_nguoi_dh` = $userid AND `trang_thai` = 0 "); // chờ xác nhận
    $cou_cxnm = mysql_fetch_assoc($cho_xacnhanm->result)['cou_cxnm'];

    $dang_xlm = new db_query("SELECT COUNT(`dh_id`) AS cou_dxlm FROM `dat_hang` WHERE `id_nguoi_dh` = $userid AND `trang_thai` = 1 "); // đang xử lý
    $cou_dxlm = mysql_fetch_assoc($dang_xlm->result)['cou_dxlm'];

    $dang_giaom = new db_query("SELECT COUNT(`dh_id`) AS cou_dgm FROM `dat_hang` WHERE `id_nguoi_dh` = $userid AND `trang_thai` = 2 "); // đang giao
    $cou_dgm = mysql_fetch_assoc($dang_giaom->result)['cou_dgm'];

    $da_giaom = new db_query("SELECT COUNT(`dh_id`) AS cou_dagm FROM `dat_hang` WHERE `id_nguoi_dh` = $userid AND `trang_thai` = 3 AND `nguoimua_huydh` != 1 AND `xnhan_nmua` = 0 "); // đã giao
    $cou_dagm = mysql_fetch_assoc($da_giaom->result)['cou_dagm'];

    $hoan_tatm = new db_query("SELECT COUNT(`dh_id`) AS cou_htm FROM `dat_hang` WHERE `id_nguoi_dh` = $userid AND (`trang_thai` = 4 OR `xnhan_nmua` = 1) "); // hoàn tất
    $cou_htm = mysql_fetch_assoc($hoan_tatm->result)['cou_htm'];

    $huy_dhangm = new db_query("SELECT COUNT(`dh_id`) AS cou_hdhm FROM `dat_hang` WHERE `id_nguoi_dh` = $userid AND (`trang_thai` = 5 OR `nguoimua_huydh` = 1) "); // đã hủy đơn
    $cou_hdhm = mysql_fetch_assoc($huy_dhangm->result)['cou_hdhm'];
}
$arr_type = array(1 => 'cá nhân', 5 => "doanh nghiệp");
$arr_dvtien = array(
    1 => 'VNĐ',
    2 => 'USD',
    3 => 'EURO',
);

$arr_cate = [];
foreach ($db_cat as $key => $value) {
    $arr_cate[$value['cat_id']] = $value;
};


$arr_tinh = [];
for ($i = 0; $i < count($arrcity2); $i++) {
    $value = $arrcity2[$i];
    $arr_tinh[$value['cit_id']] = $value;
};

$oninput = "this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');";

if (isset($_COOKIE['id_chat365']) && $_COOKIE['id_chat365'] > 0) {
    $u_seen = un_seen_chat2($_COOKIE['id_chat365']);
}
$count_tb_chat = (isset($u_seen['data']['countConversation'])) ? $u_seen['data']['countConversation'] : 0;

// bỏ những danh mục trong tin mua
$bodmuc_mua = ['119', '120', '19', '24'];
// bỏ danh mục trong tìm kiếm tin bán
$bodmuc_ban = ['119', '121'];
// bỏ danh mục đăng tin mua
$bo_dtinmua = ['119', '120', '121', '19', '24'];

$bo_dtinmua_ttrang = ['11', '12', '26', '27', '28', '29', '33', '34', '100', '111', '112', '113', '114', '115', '84', '87', '88', '94', '95', '61', '109'];

// ngành nghề có chữ việc làm
$nganhnghe_cvl = ['83', '10', '79'];
// tags ngành nghề có chữ việc làm
$tagsnnghe_cvl = ['2061', '2062', '2063', '2065', '2066', '2069'];
// bỏ nhũng danh mục thanh toán đảm bảo
$bodmuc_ttdb = ['3', '11', '12', '26', '27', '28', '29', '33', '34', '119', '120', '121'];
