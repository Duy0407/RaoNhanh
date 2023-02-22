<?
include("../includes/inc_new/icon.php");
include("config.php");
$kv = 1;

$list_tdang = new db_query("SELECT `new_id`, `new_unit`, `new_title`, `chotang_mphi`, `new_create_time`, `dia_chi`, `new_money`, `new_image`, `new_pin_home`,
                `chat365_id`, `chat365_secret`, `new_update_time`, `new_cate_id`, `gia_kt` FROM `new` INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                WHERE `new_active` = 1 AND `da_ban` = 0 AND `new_buy_sell` = 2 ORDER BY `new_order` DESC, `new_pin_home` DESC, `new_id` DESC ");

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Tất cả tin đăng bán</title>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />

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
                        <div class="timkiem_trai ">
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
                                        }else{
                                            $new_moneym = 0;
                                        } ?>
                                        <div class="ttin_timkiem sh_bgr_one w_100 d_flex mb_20 show_tr" data-price='<?= $new_moneym ?>' data-newest='<?= $rowa['new_update_time'] ?>'>
                                            <div class="avt_spham_tk">
                                                <img onerror='this.onerror=null;this.src="/images/anh_moi/avatar.png";' src="<?= $image[0] ?>" class="avt_sanph sh_border_rdu_two" alt="ảnh sản phẩm" />
                                                <? if (count($image) > 1) { ?>
                                                    <span class="sl_anhdl sh_clr_one"><?= count($image) ?></span>
                                                <? }
                                                if (!isset($_COOKIE['UID'])) { ?>
                                                    <a class="timkiem_tinnkthich" href="/dang-nhap.html">
                                                        <img src="/images/anh_moi/yeuthich_moi.png" alt="" class="ko_yeuthich hd_cspointer">
                                                    </a>
                                                <? }
                                                if (isset($_COOKIE['UID'])) {
                                                    $id_tin = $rowa['new_id'];
                                                    $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$us_id' AND `usc_type` = '$us_type'");
                                                    $check_num = mysql_num_rows($check->result);
                                                ?>
                                                    <p class="timkiem_tinnkthich">
                                                        <? if ($check_num == 0) { ?>
                                                            <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                        <? } else { ?>
                                                            <img src="/images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                        <? } ?>
                                                    </p>
                                                <? } ?>
                                            </div>
                                            <div class="ttin_vt_spham">
                                                <h4 class="tde_spham w_100 elipsis1"><a href="/<?= replaceTitle($rowa['new_title']) ?>-c<?= $rowa['new_id'] ?>.html" class="sh_clr_two"><?= $rowa['new_title'] ?></a></h4>
                                                <p class="tgian_spham w_100 sh_size_five sh_clr_four mb_5">
                                                    <?= lay_tgian($rowa['new_update_time']) ?>
                                                </p>
                                                <p class="dchi_spham w_100 sh_size_five sh_clr_four mb_10 elipsis1"><?= ltrim($rowa['dia_chi'], ', ') ?></p>
                                                <div class="giath_spham w_100 d_flex">
                                                    <p class="gia_spham sh_size_four sh_clr_six cr_bold elipsis1">
                                                        <? if ($rowa['new_cate_id'] != 120 && $rowa['new_cate_id'] != 121) { ?>
                                                            <? if ($rowa['chotang_mphi'] != 1) { ?>
                                                                <? if ($rowa['new_money'] != 0) { ?>
                                                                    <?= number_format($rowa['new_money']) ?> <?= $arr_dvtien[$rowa['new_unit']] ?>
                                                                <? } ?>
                                                                <? if ($rowa['new_money'] == 0) { ?>
                                                                    Liên hệ người bán
                                                                <? } ?>
                                                            <? } ?>
                                                            <? if ($rowa['chotang_mphi'] == 1) { ?>
                                                                Cho tặng miễn phí
                                                            <? } ?>
                                                        <? } else { ?>
                                                            <? if ($rowa['new_money'] != 0 && $rowa['gia_kt'] != 0) { ?>
                                                                <?= number_format($rowa['new_money']) ?> - <?= number_format($rowa['gia_kt']) ?> <?= $arr_dvtien[$rowa['new_unit']] ?>
                                                            <? } else if ($rowa['new_money'] != 0 && $rowa['gia_kt'] == 0) { ?>
                                                                Từ <?= number_format($rowa['new_money']) ?> <?= $arr_dvtien[$rowa['new_unit']] ?>
                                                            <? } else if ($rowa['new_money'] == 0 && $rowa['gia_kt'] != 0) { ?>
                                                                Đến <?= number_format($rowa['gia_kt']) ?> <?= $arr_dvtien[$rowa['new_unit']] ?>
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
                                <form action="/home/quicksearch.php" method="POST">
                                    <div class="form-group mb_20 w_100">
                                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Khu vực</p>
                                        <input type="hidden" name="tukhoa_dacbiet" value="" class="tukhoa_dacbiet tkiem_pbiet_mb">
                                        <p class="kq_chpup sh_border sh_border_rdu w_100 sh_size_five sh_clr_two click_showpopup_khuvuc sh_cursor show_name_khuvuc">Toàn Quốc</p>
                                    </div>
                                    <? include("../modals/khu_vuc_manh.php") ?>
                                    <div class="form-group mb_20 w_100 cr_weight_df">
                                        <p class="sh_clr_two sh_size_three mb_5 cr_weight cr_weight">Danh mục sản phẩm</p>
                                        <input type="text" name="danhmuc_sanpham" value="Danh sách danh mục" id="danh-muc-san-pham" class="click_dm_show" readonly data-catid="">
                                        <input type="hidden" class="name_cate" name="name_cate" value="">
                                    </div>
                                    <div class="tca_thtinh_dm share_select show_tt" data="">
                                        <!-- Duy render -->
                                    </div>
                                    <div class="form-group mb_20 w_100">
                                        <p class="sh_clr_two sh_size_three mb_5 cr_weight">Giá</p>
                                        <div class="gia_timkiem w_100">
                                            <input value="" name='price_m' type="text" placeholder="Từ" autocomplete="off" class="font-14-16 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                            <span>-</span>
                                            <input value="" name='price_den' type="text" placeholder="Đến" autocomplete="off" class="font-14-16 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
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