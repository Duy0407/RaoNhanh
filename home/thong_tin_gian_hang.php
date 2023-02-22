<?
include("config.php");

isset($_GET['kv']) ? $kvg = $_GET['kv'] : $kvg = '';
isset($_GET['dm']) ? $dmg = $_GET['dm'] : $dmg = '';

$user1 = "SELECT `usc_id`,`usc_name`,`usc_type`,`usc_logo`,`usc_phone`,`usc_category`,`usc_city` FROM `user` LEFT JOIN `category` ON category.`cat_id` = user.`usc_category` WHERE user.`usc_type` = 3";


if ($kvg != '' && $dmg != '') {
    $sql_kq = ' AND (user.`usc_category` =' . $dmg . ' OR category.`cat_parent_id` ='. $dmg .' )  AND `usc_city` =' . $kvg;
} else if ($kvg == '' && $dmg != '') {
    $sql_kq = ' AND (user.`usc_category` =' . $dmg . ' OR category.`cat_parent_id` ='. $dmg .')';
} else if ($kvg != '' && $dmg == '') {
    $sql_kq = ' AND user.`usc_city` =' . $kvg;
} else {
    $sql_kq = '';
}
$user1 .= $sql_kq;
$user = new db_query($user1);
// Danh mục
$cou = count($db_cat);
$arr = [];
for ($i = 0; $i < $cou; $i++) {
    $it = $db_cat[$i];
    $arr[$it['cat_id']] = $it;
}



?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Thông tin gian hàng</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../css/style_new/style.css">
    <link rel="stylesheet" href="../css/style_new/footer.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_chien.css">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css">

</head>

<body>
    <?php include("../includes/common/inc_header.php"); ?>
    <div class="popup_parents popup_parents_one">
        <div class="popup_bg"></div>
        <div class="container_popup">
            <div class="popup_content">
                <div class="popup_title ">
                    Thông báo
                    <div class="img_close sh_cursor"><img src="/images/anh_moi/close_while.svg" alt=""></div>
                </div>
                <div class="popup_text all_money" data="<?= $money ?>">
                    Bạn có <?= number_format($money) ?> VNĐ trong tài khoản. Phí dịch vụ để xem số điện thoại là 10,000
                    VNĐ.
                    <p>Bạn có muốn tiếp tục?</p>
                </div>
                <div class="popup_btn d_flex">
                    <button type="button" class="btn_huy huytb">Huỷ bỏ</button>
                    <button type="button" class="btn_dongy dongy_xem " data="">Đồng ý</button>
                </div>
            </div>
        </div>
    </div>
    <div class="popup_parents popup_parents_ko_du d_none">
        <div class="popup_bg popup_bg_ovl"></div>
        <div class="container_popup">
            <div class="popup_content">
                <div class="popup_title ">
                    Thông báo
                    <div class="img_close img_close_kodu sh_cursor"><img src="/images/anh_moi/close_while.svg" alt="">
                    </div>
                </div>
                <div class="popup_text">
                    Số dư tài khoản của bạn không đủ để sử dụng dịch vụ này.
                    Vui lòng nạp thêm tiền để sử dụng dịch vụ!
                </div>
                <div class="popup_btn d_flex">
                    <button type="button" class="btn_huy click_huy_tb">Huỷ bỏ</button>
                    <? if ($type_user == 1) { ?>
                        <a href="/ho-so-nguoi-ban-ca-nhan/nap-tien-vao-tai-khoan.html" class="btn_dongy btn_dongy_css">Nạp
                            tiền</a>
                    <? } elseif ($type_user == 3) { ?>
                        <a href="/ho-so-gian-hang-nap-tien-vao-tai-khoan.html" class="btn_dongy btn_dongy_css">Nạp tiền</a>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
    <section>

        <div class="content_header">
            <div class="top_title">
                TRANG THÔNG TIN GIAN HÀNG
            </div>
            <div class="container_body person_num">
                <div class="box_input d_flex">
                    <div class="khoi_input pad_20-30">
                        <div class="khoi_nhap bg_select_kv">
                            <div class="title">Khu vực</div>
                            <select name="khuvuc_dn" id="khuvuc_id" class="top_input with_100 select2_min">
                                <option value="">Khu vực</option>
                                <? foreach ($arrcity as $khuvuc) { ?>
                                    <option value="<?= $khuvuc['cit_id'] ?>" <?= ($khuvuc['cit_id'] == $kvg) ? 'selected' : '' ?>> <?= $khuvuc['cit_name'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                    </div>
                    <div class="khoi_select danhmuc_top">
                        <div class="title">Danh mục sản phẩm</div>
                        <select name="danhmuc_dn" id="danhmuc_id" class="top_input with_100 select2_min">
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
                                <th class="span_thead w_300">Người dùng</th>
                                <th class="span_thead">Lĩnh vực kinh doanh</th>
                                <th class="span_thead w_217">Tỉnh thành</th>
                                <th class="span_thead">Số điện thoại</th>
                            </thead>
                            <tbody class="tt_khachhang">
                                <? while ($result_user = (mysql_fetch_assoc($user->result))) {
                                    $id_usc = $result_user['usc_id'];
                                    $cate = $result_user['usc_category'];
                                    $cate2 = explode(',', $cate);
                                    $dem = count($cate2);

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
                                                <a href="/<?= replaceTitle($result_user['usc_name']) ?>-t<?= $id_usc ?>.html">
                                                    <div class="user_name user_name_if"><?= $result_user['usc_name'] ?></div>
                                                </a>
                                            </div>
                    </div>
                    </td>
                    <td class="text_sp">
                        <div class="text_sp_div user">
                            <p>
                                <?
                                    $kq_trim = '';
                                    for ($i = 0; $i < $dem; $i++) {
                                        $kqd = $arr[$cate2[$i]]['cat_name'];
                                        $kq_trim .= $kqd;
                                    }
                                    echo ($kq_trim);
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
                        <div class="user">
                            <?= $result_user['usc_phone'] ?>
                        </div>
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

    $('.btn_hienso_cl').click(function() {
        var id_nmua = $(this).attr("data")
        $('.dongy_xem').attr('data', id_nmua);
        $('.popup_parents_one').show();
    })
    $('.img_close, .huytb , .popup_bg').click(function() {
        $('.popup_parents_one').hide();
    })

    $('.dongy_xem').click(function() {
        var all_money = Number($('.all_money').attr('data'));
        var money = Number(10000);
        var id_nmua = $(this).attr('data');
        if (all_money >= money) {
            // console.log('Đủ');
            $.ajax({
                type: 'POST',
                url: "../ajax/money.php",
                data: {
                    all_money: all_money,
                    id_nmua: id_nmua,
                    money: money,
                },
                success: function(data) {
                    if (data == '') {
                        window.location.reload();
                    }
                }
            })


        } else {
            $('.popup_parents_one').hide();
            $('.popup_parents_ko_du').show();
            $('.click_huy_tb, .img_close_kodu, .popup_bg_ovl').click(function() {
                $('.popup_parents_ko_du').hide();
            })
        }
    })

    $('.btn_apdung').click(function() {
        var khuvuc_dn = $("#khuvuc_id").val();
        var danhmuc_dn = $("#danhmuc_id").val();
        window.location.href = '/thong-tin-gian-hang.html?kv=' + khuvuc_dn + '&dm=' + danhmuc_dn;
    })
</script>

</html>