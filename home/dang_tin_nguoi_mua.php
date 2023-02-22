<?
include("config.php");
isset($_GET['kv']) ? $kvg = $_GET['kv'] : $kvg = '';
isset($_GET['dm']) ? $dmg = $_GET['dm'] : $dmg = '';
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    if ($_COOKIE['UT'] != 2) {
        $id_user = $_COOKIE['UID'];
        $type_user = $_COOKIE['UT'];
        $user_main = new db_query("SELECT `usc_money` FROM `user` WHERE `usc_id` = $id_user AND `usc_type` = $type_user");
        $rs_usermain = mysql_fetch_assoc($user_main->result);
        $money = $rs_usermain['usc_money'];

        $user1 = "SELECT `usc_id`, `usc_name`, `usc_type`, `usc_logo`, `usc_phone`, `usc_category`, `usc_cate_id`, `usc_city` FROM `user` WHERE `usc_type` = 2 ";

        $user2 = "SELECT `usc_id`, `usc_name`, `usc_type`, `usc_logo`, `usc_phone`, `usc_category`, `usc_cate_id`, `usc_city` FROM `user`
                INNER JOIN `hien_thi_sdt` ON `user`.`usc_id` = `hien_thi_sdt`.`id_nguoi_mua` WHERE `usc_type` = 2 AND `id_nguoi_ban` = $id_user AND `type` = $type_user ";

        if ($kvg != '' && $dmg != '') {
            $sql_kq = ' AND (FIND_IN_SET(' . $dmg . ', `usc_category`) OR FIND_IN_SET(' . $dmg . ', `usc_cate_id`))   AND `usc_city` =' . $kvg;
        } else if ($kvg == '' && $dmg != '') {
            $sql_kq = ' AND (FIND_IN_SET(' . $dmg . ', `usc_category`) OR FIND_IN_SET(' . $dmg . ', `usc_cate_id`))';
        } else if ($kvg != '' && $dmg == '') {
            $sql_kq = ' AND `usc_city` =' . $kvg;
        } else {
            $sql_kq = '';
        };

        $sql_ht = " AND `hien_thi` != 1 ";

        $user1 .= $sql_ht;
        $user1 .= $sql_kq;
        $user = new db_query($user1);

        $user2 .= $sql_kq;
        $list_us = new db_query($user2);

        $cou = count($db_cat);
        $arr = [];
        for ($i = 0; $i < $cou; $i++) {
            $it = $db_cat[$i];
            $arr[$it['cat_id']] = $it;
        }
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}


?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Thông tin người mua hàng</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_chien.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">

</head>

<body>
    <?php include("../includes/common/inc_header.php"); ?>
    
    <section>

        <div class="content_header">
            <div class="top_title">
                DANH SÁCH TIN NGƯỜI MUA
            </div>
            <div class="container_body person_num">
                <div class="box_input d_flex">
                    <div class="khoi_input pad_20-30">
                        <div class="khoi_nhap bg_select_kv  ">
                            <div class="title">Khu vực</div>
                            <select name="khuvuc_dn" id="id_khuvuc" class="top_input with_100 select2_min">
                                <option value="">Khu vực</option>
                                <? foreach ($arrcity as $khuvuc) { ?>
                                    <option value="<?= $khuvuc['cit_id'] ?>" <?= ($khuvuc['cit_id'] == $kvg) ? 'selected' : '' ?>> <?= $khuvuc['cit_name'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                    </div>
                    <div class="khoi_select danhmuc_top">
                        <div class="title">Danh mục sản phẩm</div>
                        <select name="" id="id_danhmuc" class="top_input with_100 select2_min">
                            <option value="">Danh mục sản phẩm</option>
                            <? foreach ($db_cat as $categorys) { ?>
                                <option value="<?= $categorys['cat_id'] ?>" <?= ($categorys['cat_id'] == $dmg) ? 'selected' : '' ?>><?= $categorys['cat_name'] ?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="btn_apdung">
                        <p>Áp dụng</p>
                    </div>
                </div>
                <div class="box_scroll">
                    <div class="box_person">
                        <table class="table_user">
                            <thead>
                                <th class="span_thead w_300">Người mua</th>
                                <th class="span_thead">Tên sản phẩm</th>
                                <th class="span_thead w_217">Tỉnh thành</th>
                                <th class="span_thead">Thời gian hết hạn thầu</th>
                            </thead>
                            <tbody class="tt_khachhang">
                                <? while ($row_user = (mysql_fetch_assoc($list_us->result))) {
                                    $cate = $row_user['usc_category'];
                                    $cate2 = explode(',', $cate);
                                    $dem = count($cate2);
                                    $cate_con = $row_user['usc_cate_id'];
                                    $cate_con1 = explode(',', $cate_con);
                                    $cate_condem = count($cate_con1);
                                    $ngmua = $row_user['usc_id'];
                                    $img = $row_user['usc_logo'];
                                ?>
                                    <tr class="tr cl_duy" data="<?= $ngmua ?>">
                                        <td>
                                            <div class="user d_flex">
                                                <a href="/nguoi-mua/<?= $row_user['usc_id'] ?>/<?= $row_user['usc_name'] ?>.html" class="avatar avatar_df_a">
                                                    <? if ($img == '') { ?>
                                                        <img src="/images/anh_moi/avatar.png" alt="">
                                                    <? } else { ?>
                                                        <img src="/pictures/avt_dangtin/<?= $img ?>" alt="">
                                                    <? } ?>
                                                </a>
                                                <a href="/nguoi-mua/<?= $row_user['usc_id'] ?>/<?= $row_user['usc_name'] ?>.html">
                                                    <p class="user_name user_name_if"><?= $row_user['usc_name'] ?></p>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text_sp">
                                            <div class="text_sp_div user">
                                                <p>
                                                    <?
                                                    $kq_trim = '';
                                                    for ($i = 0; $i < $dem; $i++) {
                                                        $kqd = $arr[$cate2[$i]]['cat_name'];
                                                        $kq_trim .= $kqd . ", ";
                                                    }
                                                    echo trim($kq_trim, ",");
                                                    ?>
                                                    <?
                                                    $kq_con = '';
                                                    for ($i = 0; $i < $cate_condem; $i++) {
                                                        $kqc = $arr[$cate_con1[$i]]['cat_name'];
                                                        $kq_con .= $kqc . ", ";
                                                    }
                                                    echo trim($kq_con, ", ");
                                                    ?>
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="user">
                                                <? $ct = $row_user['usc_city'];
                                                $city = new db_query("SELECT `cit_name` FROM `city2` WHERE `cit_id` = $ct");
                                                $kq = (mysql_fetch_assoc($city->result)); ?>
                                                <?= $kq['cit_name'] ?>
                                            </div>
                                        </td>
                                        <td class="phone_user"></td>
                                            <div class="user">25/12/2022</div>
                                        </td>
                                    </tr>
                                <? }
                                while ($result_user = (mysql_fetch_assoc($user->result))) {
                                    $cate = $result_user['usc_category'];
                                    $cate2 = explode(',', $cate);
                                    $dem = count($cate2);
                                    $cate_con = $result_user['usc_cate_id'];
                                    $cate_con1 = explode(',', $cate_con);
                                    $cate_condem = count($cate_con1);
                                    $ngmua = $result_user['usc_id'];
                                    $img = $result_user['usc_logo'];
                                ?>
                                    <tr class="tr cl_duy" data="<?= $ngmua ?>">
                                        <td>
                                            <div class="user d_flex">
                                                <div class="avatar avatar_df_a">
                                                    <? if ($img == '') { ?>
                                                        <img src="/images/anh_moi/avatar.png" alt="">
                                                    <? } else { ?>
                                                        <img src="/pictures/avt_dangtin/<?= $img ?>" alt="">
                                                    <? } ?>
                                                </div>
                                                <a href="/ho-so-nguoi-mua-khach-xem-<?= $result_user['usc_id'] ?>.html">
                                                    <div class="user_name user_name_if"><?= $result_user['usc_name'] ?></div>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="text_sp">
                                            <div class="text_sp_div user">
                                                <p>
                                                    <?
                                                    $kq_trim = '';
                                                    for ($i = 0; $i < $dem; $i++) {
                                                        $kqd = $arr[$cate2[$i]]['cat_name'];
                                                        $kq_trim .= $kqd . ", ";
                                                    }
                                                    echo trim($kq_trim, ",");
                                                    ?>
                                                    <?
                                                    $kq_con = '';
                                                    for ($i = 0; $i < $cate_condem; $i++) {
                                                        $kqc = $arr[$cate_con1[$i]]['cat_name'];
                                                        $kq_con .= $kqc . ", ";
                                                    }
                                                    echo trim($kq_con, ", ");
                                                    ?>
                                                </p>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="user">
                                                <? $ct = $result_user['usc_city'] ?>
                                                <? $city = new db_query("SELECT `cit_name` FROM `city2` WHERE `cit_id` = $ct");
                                                $kq = (mysql_fetch_assoc($city->result))
                                                ?>
                                                <?= $kq['cit_name'] ?>
                                            </div>
                                        </td>
                                        <td class="phone_user">
                                            <div class="user">25/12/2022</div>
                                        </td>
                                    </tr>
                                <? } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="footer dangtin_nguoi_mua">
        <?php include("../includes/inc_new/inc_footer.php") ?>
    </div>
    <script type="text/javascript" src="/js/newJs/admin.main.js"></script>
</body>
<script>
    $('.select2_min').select2({
        width: '100%'
    });
    $('.btn_apdung').click(function() {
        var id_khuvuc = $('#id_khuvuc').val();
        var id_danhmuc = $('#id_danhmuc').val();
        window.location.href = '/thong-tin-nguoi-mua.html?kv=' + id_khuvuc + '&dm=' + id_danhmuc;
    })
</script>

</html>