<?
// moi them vao thay config.php
error_reporting(0);
require_once("../functions/functions.php");
ob_start();
require_once("../functions/function_rewrite.php");
require_once '../functions/pagebreak.php';
require_once("../classes/database.php");
require_once("../classes/config.php");
// require_once("../classes/user.php");
require_once("../cache_file/top-cache.php");

date_default_timezone_set('Asia/Ho_Chi_Minh');

// text file cache
$file = '../cache_file/sql_cache.json';

$expire = 1; // 1 s
// Nếu có cache file và còn trong thời gian chưa hết $expire
if (file_exists($file) && filemtime($file) > (time() - $expire)) {
    // Uunserialize data từ cache file
    $arraytong       = json_decode(file_get_contents($file), true);
    $arrcity         = $arraytong['db_city'];
    $arrcity2        = $arraytong['db_city2'];
    $db_cat          = $arraytong['db_cat'];
    $db_cat1         = $arraytong['db_cat1'];
    $tags_tk         = $arraytong['tags_tk'];
    $db_catvl        = $arraytong['db_catvl'];
    $db_tagsvl       = $arraytong['db_tagsvl'];
    $db_tkcatvl      = $arraytong['db_tkcatvl'];
    $db_tkcat        = $arraytong['db_tkcat'];
    $db_pxa          = $arraytong['db_pxa'];
    $db_all_dmuc     = $arraytong['db_all_dmuc'];
    $db_all_dmuc1    = $arraytong['db_all_dmuc1'];
    $db_dis          = $arraytong['db_dis'];

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
    $db_dong         = $arraytong['db_dong'];
    $db_bovi_xuly    = $arraytong['db_bovi_xuly'];
    $db_arr_cat      = $arraytong['db_arr_cat'];
    $db_tkhoadb      = $arraytong['db_tkhoadb'];
    $db_tkhoadb2     = $arraytong['db_tkhoadb2'];
} else // Cập nhật cache file
{
    $db_qrr = new db_query("SELECT * FROM city ");
    $arrcity  = $db_qrr->result_array('cit_id');

    $db_qrr2 = new db_query("SELECT `cit_id`, `cit_name`, `cit_parent` FROM city2 ");
    $arrcity2 = $db_qrr2->result_array('cit_id');

    $db_qrr3 = new db_query("SELECT `cit_id`, `cit_name`, LOWER(`cit_name`) AS cit_name1, `cit_parent` FROM city2 WHERE cit_parent != 0 ");
    $arrcity3 = $db_qrr3->result_array('cit_id');

    $db_qr = new db_query("SELECT * FROM category WHERE cat_active = 1");
    $db_cat  = $db_qr->result_array('cat_id');

    $db_qr1 = new db_query("SELECT * FROM category WHERE cat_active = 1 AND cat_parent_id = 0 ");
    $db_cat1  = $db_qr1->result_array('cat_id');

    // tags dang tin
    $tags_tkim = new db_query("SELECT `tags_id`, RTRIM(`ten_tags`) AS ten_tags FROM `key_tags` ");
    $tags_tk = $tags_tkim->result_array('tags_id');

    // danh mục việc làm
    $cat_vl = new db_query("SELECT `cat_id`, RTRIM(`cat_name`) AS cat_name FROM `category_vl` WHERE `cat_active` = 1");
    $db_catvl = $cat_vl->result_array('cat_id');

    // tags viec lam
    $tags_vl = new db_query("SELECT `key_id`, LOWER(trim(`key_name`)) AS `key_name`, CASE WHEN `key_name` LIKE '%viec lam%' THEN `key_name`
                            ELSE CONCAT('việc làm ', LOWER(trim(`key_name`))) END AS `key_name_vl` FROM `keyword` ");
    $db_tagsvl = $tags_vl->result_array('key_id');

    // danh muc lam viec tim kiem
    $cat_tkvl = new db_query("SELECT `cat_id`, LOWER(trim(`cat_name`)) AS cat_name, CASE WHEN `cat_name` LIKE '%viec lam%' THEN `cat_name`
                            ELSE CONCAT('Việc làm ', trim(`cat_name`)) END AS `cat_name_vl`, CASE WHEN `cat_name` LIKE '%viec lam%' THEN `cat_name`
                            ELSE CONCAT('việc làm ', LOWER(trim(`cat_name`))) END AS `cat_name_vl1` FROM `category_vl` WHERE `cat_active` = 1");
    $db_tkcatvl = $cat_tkvl->result_array('cat_id');

    // tim kiem danh muc
    $db_tkqr = new db_query("SELECT `cat_id`,  LOWER(trim(`cat_name`)) AS cat_name FROM `category` WHERE `cat_active` = 1 ");
    $db_tkcat  = $db_tkqr->result_array('cat_id');

    $dbpxa = new db_query("SELECT `id`, `name`, `prefix`, `province_id`, `district_id` FROM `phuong_xa` ");
    $db_pxa = $dbpxa->result_array('id');

    // tất cả danh mục trừ: việc làm, tìm ưng viên
    $dball_dmuc = new db_query("SELECT * FROM category WHERE cat_active = 1 AND cat_id != 119 AND cat_id != 120 ");
    $db_all_dmuc = $dball_dmuc->result_array('cat_id');

    // tất cả danh mục trừ: việc làm, tìm việc làm
    $dball_dmuc1 = new db_query("SELECT * FROM category WHERE cat_active = 1 AND cat_id != 119 AND cat_id != 121 AND cat_id != 19 AND cat_id != 24 ");
    $db_all_dmuc1 = $dball_dmuc1->result_array('cat_id');

    // lấy thông tin chi tiet san pham

    $qr_manhinh = new db_query("SELECT `id_manhinh`, `ten_manhinh`, `id_danhmuc`, `phan_loai`, `id_cha` FROM `man_hinh` ");
    $db_manhinh = $qr_manhinh->result_array('id_manhinh');

    $qr_loaichung = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` ");
    $db_lchung = $qr_loaichung->result_array('id');

    $qr_dungluong = new db_query("SELECT `id_dl`, `ten_dl`, `id_danhmuc`, `phan_loai`, `id_cha` FROM `dung_luong` ");
    $db_dluong = $qr_dungluong->result_array('id_dl');
    // danh sach nhom san pham
    $qr_nspham = new db_query("SELECT `id`, `name`, `id_danhmuc` FROM `nhom_sanpham` ");
    $db_nspham = $qr_nspham->result_array('id');

    $qr_baohanh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`, `id_parents`, `id_danhmuc` FROM `bao_hanh` ");
    $db_baohanh = $qr_baohanh->result_array('id_baohanh');

    $qr_gthu_cung = new db_query("SELECT `id`, `giong_thucung`, `id_danhmuc`, `id_cha` FROM `giong_thu_cung`");
    $db_gthucung = $qr_gthu_cung->result_array('id');
    // thong tin thu cung
    $qr_ttthucung = new db_query("SELECT `id`, `contents_name`, `id_danhmuc`, `type` FROM `thongtin_thucung` ");
    $db_ttthucung = $qr_ttthucung->result_array('id');

    $qr_mausac = new db_query("SELECT `id_color`, `mau_sac`, `id_parents`, `id_dm` FROM `mau_sac` ");
    $db_mausac = $qr_mausac->result_array('id_color');

    $qr_nspham_clieu = new db_query("SELECT `id`, `name`, `id_cha`, `id_danhmuc` FROM `nhom_sanpham_chatlieu` ");
    $db_sp_chatlieu = $qr_nspham_clieu->result_array('id');

    $qr_xuatxu = new db_query("SELECT `id_xuatxu`, `noi_xuatxu`, `id_parents`, `id_danhmuc` FROM `xuat_xu` ");
    $db_xuatxu = $qr_xuatxu->result_array('id_xuatxu');

    $qr_nsanxuat = new db_query("SELECT `id`, `nam_san_xuat`, `id_cha`, `id_danhmuc` FROM `nam_san_xuat` ");
    $db_nsanxuat = $qr_nsanxuat->result_array('id');

    $qr_soluong = new db_query("SELECT `id`, `so_luong`, `id_parents`, `id_danhmuc` FROM `number_content` ");
    $db_soluong = $qr_soluong->result_array('id');

    $qr_nsp_hinhdang = new db_query("SELECT `id`, `name`, `id_cha`, `id_danhmuc` FROM `nhom_sanpham_hinhdang` ");
    $db_nsp_hdang = $qr_nsp_hinhdang->result_array('id');

    $qr_mthethao = new db_query("SELECT `id`, `ten_mon`, `phan_loai` FROM `mon_the_thao` ");
    $db_mthethao = $qr_mthethao->result_array('id');

    $qr_tangphong = new db_query("SELECT `id`, `so_luong`, `type_zoom`, `id_danhmuc` FROM `tang_phong` ");
    $db_tangphong = $qr_tangphong->result_array('id');

    $qr_hang = new db_query("SELECT `id`, `ten_hang`, `id_parent`, `id_danhmuc` FROM `hang` ");
    $db_hang = $qr_hang->result_array('id');

    $qr_dong = new db_query("SELECT `id`, `ten_dong`, `id_hang`, `id_danhmuc` FROM `dong` ");
    $db_dong = $qr_dong->result_array('id');

    $qr_bovi_xuly = new db_query("SELECT `bovi_id`, `bovi_ten`, `bovi_id_danhmuc` FROM `bovi_xuly` ");
    $db_bovi_xuly = $qr_bovi_xuly->result_array('bovi_id');

    // danh sách danh mục con theo danh mục cha
    $db_qr12 = new db_query("SELECT cat_id, cat_parent_id FROM category WHERE cat_active = 1 AND cat_parent_id != 0 ");
    $db_arr_cat = [];
    while ($row = mysql_fetch_array($db_qr12->result)) {
        $db_arr_cat[$row['cat_parent_id']][] = $row['cat_id'];
    };

    // từ khóa có chữ đầu: mua bán, mua, cho thuê, thuê
    $qr_tkhoa = new db_query("SELECT tags_id FROM `key_tags` WHERE (`ten_tags` LIKE 'mua bán%' OR `ten_tags` LIKE 'mua%' OR `ten_tags`
                            LIKE 'cho thuê%' OR `ten_tags` LIKE 'thuê%') GROUP BY `tags_id` ");
    $db_tkhoadb = $qr_tkhoa->result_array('tags_id');
    // từ khóa có chữ đầu: bán
    $qr_tkhoa2 = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `ten_tags` LIKE 'bán%' AND `ten_tags` NOT LIKE 'mua bán%'
                            AND `id_danhmuc` IN(10,11,12,26,27,28,29,34) ");
    $db_tkhoadb2 = $qr_tkhoa2->result_array('tags_id');

    $arraytong = array(
        'db_city'         => $arrcity,
        'db_city2'        => $arrcity2,
        'db_cat'          => $db_cat,
        'db_cat1'         => $db_cat1,
        'tags_tk'         => $tags_tk,
        'db_catvl'        => $db_catvl,
        'db_tagsvl'       => $db_tagsvl,
        'db_tkcatvl'      => $db_tkcatvl,
        'db_tkcat'        => $db_tkcat,
        'db_pxa'          => $db_pxa,
        'db_all_dmuc'     => $db_all_dmuc,
        'db_all_dmuc1'    => $db_all_dmuc1,
        'db_dis'          => $arrcity3,

        'db_manhinh'      => $db_manhinh,
        'db_lchung'       => $db_lchung,
        'db_dluong'       => $db_dluong,
        'db_nspham'       => $db_nspham,
        'db_baohanh'      => $db_baohanh,
        'db_gthucung'     => $db_gthucung,
        'db_ttthucung'    => $db_ttthucung,
        'db_mausac'       => $db_mausac,
        'db_sp_chatlieu'  => $db_sp_chatlieu,
        'db_xuatxu'       => $db_xuatxu,
        'db_nsanxuat'     => $db_nsanxuat,
        'db_soluong'      => $db_soluong,
        'db_nsp_hdang'    => $db_nsp_hdang,
        'db_mthethao'     => $db_mthethao,
        'db_tangphong'    => $db_tangphong,
        'db_hang'         => $db_hang,
        'db_dong'         => $db_dong,
        'db_bovi_xuly'    => $db_bovi_xuly,
        'db_arr_cat'      => $db_arr_cat,
        'db_tkhoadb'      => $db_tkhoadb,
        'db_tkhoadb2'     => $db_tkhoadb2,
    );
    // Serialize data và push vào cache file
    $OUTPUT = json_encode($arraytong);
    $fp = fopen($file, "w");
    fputs($fp, $OUTPUT);
    fclose($fp);
} // end else
