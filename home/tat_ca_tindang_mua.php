<?
include("../includes/inc_new/icon.php");
include("config.php");
$kv = 1;
$timkiem_mua = 1;

$list_tdang = new db_query("SELECT `new`.`new_id`, `new_unit`, `new_title`, `dia_chi`, `new_money`, `new_image`, `new_pin_home`, `new_cate_id`,
                `new_type`, `chat365_id`, `chat365_secret`, `new_update_time`, `usc_name`, `usc_store_name`, `han_su_dung`, `gia_kt` FROM `new`
                INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                INNER JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                WHERE `da_ban` = 0 AND `new_buy_sell` = 1 AND `new_active` = 1 ORDER BY `new_update_time` DESC, `new_id` DESC ");

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Tin Cần Mua Mới Nhất <?= date('m', time()) ?> / <?= date('Y', time()) ?></title>
    <meta name="keywords" content="Raonhanh365, rao vặt miễn phí, trang rao vặt, kênh mua bán, quảng cáo, mua ban, quang cao, rao vat, đăng tin miễn phí" />
    <meta name="description" content="Danh sách tin mua mới nhất tháng/năm hiện tại trên raonhanh365.vn. Cập nhật liên tục hàng giờ" />
    <meta property="og:title" content="Tin Cần Mua Mới Nhất  <?= date('m', time()) ?> / <?= date('Y', time()) ?>" />
    <meta property="og:description" content="Danh sách tin mua mới nhất tháng/năm hiện tại trên raonhanh365.vn. Cập nhật liên tục hàng giờ" />
    <!-- <meta property="og:url" content="https://raonhanh365.vn/" /> -->
    <meta property="og:url" content="http://dev5.tinnhanh365.vn/trang-tin-mua.html" />

    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN<" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <meta name="robots" content="noindex, nofollow" />

    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <!-- <meta property="og:image:url" content="https://raonhanh365.vn/images/banner_raonhanh365.jpg" /> -->
    <meta property="og:image:url" content="http://dev5.tinnhanh365.vn/images/banner_raonhanh365.jpg" />

    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <!-- <link rel="canonical" href="https://raonhanh365.vn" /> -->
    <link rel="canonical" href="http://dev5.tinnhanh365.vn/trang-tin-mua.html" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link type="text/css" rel="stylesheet" href="/css/style_new/giai_dap.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
</head>

<body>

    <? include("../includes/common/inc_header.php"); ?>
    <section>
        <div class="ctn_wapper w_100 tim_m_k tatcatindang_ban">
            <div class="ctn_fl_chung">
                <div class="ctn_search ctn_search_df w_100">
                    <div class="tk_tren tk_tren-df w_100 d_flex mb_30">
                        <div class="timkiem_trai">
                            <div class="kqua_tk sh_bgr_one w_100 mb_30">
                                <h3 class="timkiem_ketq w_100 sh_clr_two cr_weight mb_30 text_upcase">
                                    Tất cả tin đăng
                                </h3>
                                <div class="m_more_search tatca_kq w_100 show_apend">
                                    <? while ($rowa = mysql_fetch_assoc($list_tdang->result)) {
                                        $image = explode(';', $rowa['new_image']);
                                        $new_unit = $rowa['new_unit'];
                                        if ($rowa['new_money'] != 0) {
                                            if ($new_unit == 1) {
                                                $new_moneym = $rowa['new_money'];
                                            } else if ($new_unit == 2) {
                                                $new_moneym = $rowa['new_money'] * 23725;
                                            } else if ($new_unit == 3) {
                                                $new_moneym = $rowa['new_money'] * 22808;
                                            }
                                        } else if ($rowa['new_money'] == 0 && $rowa['gia_kt'] != 0) {
                                            if ($new_unit == 1) {
                                                $new_moneym = $rowa['gia_kt'];
                                            } else if ($new_unit == 2) {
                                                $new_moneym = $rowa['gia_kt'] * 23725;
                                            } else if ($new_unit == 3) {
                                                $new_moneym = $rowa['gia_kt'] * 22808;
                                            }
                                        }  ?>
                                        <div class="ttin_timkiem sh_bgr_one w_100 d_flex mb_20 show_tr" data-price='<?= $new_moneym ?>' data-newest='<?= $rowa['new_update_time'] ?>'>
                                            <div class="avt_spham_tk">
                                                <a href="/<?= replaceTitle($rowa['new_title']) ?>-<?= ($rowa['new_cate_id'] == 121) ? "c" : "ct" ?><?= $rowa['new_id'] ?>.html">
                                                    <img onerror='this.onerror=null;this.src="/images/anh_moi/avatar.png";' src="<?= $image[0] ?>" class="avt_sanph sh_border_rdu_two" alt="ảnh sản phẩm" />
                                                </a>
                                                <? if (count($image) > 1) { ?>
                                                    <span class="sl_anhdl sh_clr_one"><?= count($image) ?></span>
                                                <? }
                                                if (!isset($_COOKIE['UID'])) { ?>
                                                    <a class="timkiem_tinnkthich" href="/dang-nhap.html">
                                                        <img src="/images/anh_moi/yeuthich_moi.png" alt="" class="ko_yeuthich hd_cspointer">
                                                    </a>
                                                <? }
                                                if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
                                                    $id_tin = $rowa['new_id'];
                                                    $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$user_id' AND `usc_type` = '$usertype' ");
                                                    $check_num = mysql_num_rows($check->result);
                                                ?>
                                                    <p class="timkiem_tinnkthich">
                                                        <? if ($check_num > 0) { ?>
                                                            <img src="/images/anh_moi/yeu_thich.png" data="<?= $id_tin ?>" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                        <? } else { ?>
                                                            <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                        <? } ?>
                                                    </p>
                                                <? } ?>
                                            </div>
                                            <div class="ttin_vt_spham">
                                                <h4 class="tde_spham w_100 elipsis1 <?= ($rowa['new_cate_id'] != 121) ? "tde_sanpham_mua" : "" ?>">
                                                    <a href="/<?= replaceTitle($rowa['new_title']) ?>-<?= ($rowa['new_cate_id'] == 121) ? 'c' : 'ct' ?><?= $rowa['new_id'] ?>.html" class="sh_clr_two">
                                                        <?= $rowa['new_title'] ?>
                                                    </a>
                                                </h4>
                                                <? if ($rowa['new_cate_id'] != 121) { ?>
                                                    <div class="nguoim_dangtin d_flex mb_10">
                                                        <img src="/images/anh_moi/avt_tam_ndang.png" class="anhtam_ndang">
                                                        <span class="text_ellipsis ellip_line1 ten_ndang_tin ml_5 sh_clr_six sh_size_five">
                                                            <?= ($rowa['new_type'] == 1) ? $rowa['usc_name'] : $rowa['usc_store_name']  ?>
                                                        </span>
                                                    </div>
                                                <? } ?>
                                                <p class="tgian_spham w_100 sh_size_five sh_clr_four mb_5">
                                                    <?= lay_tgian($rowa['new_update_time']) ?>
                                                </p>
                                                <p class="dchi_spham w_100 sh_size_five sh_clr_four <?= ($rowa['new_cate_id'] != 121) ? 'mb_5' : 'mb_10' ?> elipsis1"><?= ltrim($rowa['dia_chi'], ', ') ?></p>
                                                <? if ($rowa['new_cate_id'] != 121) { ?>
                                                    <p class="fz_13 tgian_hhan_thau mb_5 sh_clr_four">Thời gian hết hạn thầu: <?= date('d/m/Y', $rowa['han_su_dung']) ?></p>
                                                <? } ?>
                                                <div class="giath_spham w_100 d_flex">
                                                    <p class="gia_spham sh_size_four sh_clr_six cr_bold elipsis1">
                                                        <? if ($rowa['new_money'] != 0 && $rowa['gia_kt'] != 0) { ?>
                                                            <?= number_format($rowa['new_money']) ?> - <?= number_format($rowa['gia_kt']) ?> <?= $arr_dvtien[$rowa['new_unit']] ?>
                                                        <? } else if ($rowa['new_money'] != 0 && $rowa['gia_kt'] == 0) { ?>
                                                            Từ <?= number_format($rowa['new_money']) ?> <?= $arr_dvtien[$rowa['new_unit']] ?>
                                                        <? } else if ($rowa['new_money'] == 0 && $rowa['gia_kt'] != 0) { ?>
                                                            Đến <?= number_format($rowa['gia_kt']) ?> <?= $arr_dvtien[$rowa['new_unit']] ?>
                                                        <? } ?>
                                                        <? if ($rowa['new_cate_id'] == 120 || $rowa['new_cate_id'] == 121) { ?>
                                                            <? if ($rowa['new_money'] == 0 && $rowa['gia_kt'] == 0) { ?>
                                                                Thỏa thuận
                                                            <? } ?>
                                                        <? } ?>
                                                    </p>

                                                    <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                                        <a class="img_like item_chat" target="_blank" id-chat="<?= $rowa['chat365_id'] ?>" rel="nofollow" href="/<?= replaceTitle($rowa['new_title']) ?>-ct<?= $rowa['new_id'] ?>.html">
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
                                    <? } ?>
                                </div>
                            </div>
                        </div>
                        <div class="timkiem_phai">
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
                                <form action="/home/quicksearch_mua.php" method="POST">
                                    <div class="form-group mb_20 w_100">
                                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Khu vực</p>
                                        <input type="hidden" name="tukhoa_dacbiet" value="<?= $new_tit ?>" class="tukhoa_dacbiet tkiem_pbiet_mb">
                                        <p class="kq_chpup sh_border sh_border_rdu w_100 sh_size_five sh_clr_two click_showpopup_khuvuc sh_cursor show_name_khuvuc"><?= ($ward != 0) ? $wardname . ', ' : '' ?> <?= ($district != 0) ? $districtname . ', ' : '' ?> <?= ($citid != 0) ? $citname : 'Toàn Quốc' ?></p>
                                    </div>
                                    <? include("../modals/khu_vuc_manh.php") ?>
                                    <div class="form-group mb_20 w_100 cr_weight_df share_select">
                                        <p class="sh_clr_two sh_size_three mb_5 cr_weight cr_weight">Danh mục sản phẩm</p>
                                        <select name="danh_muc" class="form-control share_select2 w_100">
                                            <option value="">Chọn danh mục sản phẩm</option>
                                            <? foreach ($db_cat as $item => $row_dm) {
                                                if (in_array($row_dm['cat_id'], $bodmuc_mua) == false) { ?>
                                                    <option value="<?= $row_dm['cat_id'] ?>"><?= ($row_dm['cat_id'] != 121) ? $row_dm['cat_name'] : 'Tìm ứng viên' ?></option>
                                            <? }
                                            };
                                            unset($item, $row_dm); ?>
                                        </select>
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
                                        <p onclick="window.location.href='/tat-ca-tin-dang-mua.html'" class="bo_loc right-10 cr_weight sh_size_three sh_clr_three sh_border_rdu sh_cursor sh_bgr_one">
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
                            <div class="tu_phobien_ch w_100 d_flex fl_wrap">
                                <?
                                $qr = new db_query("SELECT `search_key` FROM `search_popular` ORDER BY count_num desc , rand() limit 7");
                                $lis = $qr->result_array();
                                ?>
                                <?php foreach ($lis as $m => $value_lis) { ?>
                                    <p onclick="click_search2(this)" data-name="<?= str_replace('-', ' ', $value_lis['search_key'])  ?>" class="cr_weight mb_10 sh_clr_two sh_size_five mr_20"><?= str_replace('-', ' ', $value_lis['search_key'])  ?></p>
                                <?php };
                                unset($m, $value_lis) ?>
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
<script type="text/javascript" src="/js/style_new/style.js"></script>
<script type="text/javascript">
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

    function rf_select2d() {
        $('.share_select2').select2({
            width: '100%',
        });
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
</script>

</html>