<?
include 'config.php';

$id = getValue('id', 'int', 'GET', 0);


if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];
};

if ($id != 0) {
    $user = new db_query("SELECT `usc_id`, `usc_store_name`, `usc_logo`, `usc_anhbia`, `usc_time`, `usc_email`, `usc_address`, `usc_des`,
                    `usc_website`, `usc_facename`, `usc_type`, `chat365_id`, `email_ht` FROM `user` WHERE `usc_id` = '$id' ");

    $user_ok = mysql_fetch_assoc($user->result);
    $name_store = $user_ok['usc_store_name'];
    $time_store = $user_ok['usc_time'];
    $email_store = $user_ok['usc_email'];
    $address_store = $user_ok['usc_address'];
    $des_store = $user_ok['usc_des'];
    $logo_usc = $user_ok['usc_logo'];
    $img_store = $user_ok['usc_anhbia'];
    $usc_type = $user_ok['usc_type'];

    $bluan_toi = new db_query("SELECT COUNT(`eva_id`) AS cou_eva, SUM(`eva_stars`) AS sum_eva FROM `evaluate`
                            INNER JOIN `user` ON `evaluate`.`user_id` = `user`.`usc_id` WHERE `bl_user` = $id
                            AND `new_id` = 0 AND `eva_active` = 1 AND (`usc_type` = 1 OR `usc_type` = 5) ");
    $row_bltoi = mysql_fetch_assoc($bluan_toi->result);

    $list_bl = new db_query("SELECT `eva_id`, `user_id`, `bl_user`, `eva_parent_id`, `eva_stars`, `eva_comment`, `eva_comment_time`, `eva_active`,
                        `da_csbl`, `tgian_hetcs`, `usc_name`, `usc_logo`, `usc_store_name`, `usc_type` FROM `evaluate`
                        INNER JOIN `user` ON `evaluate`.`user_id` = `user`.`usc_id`
                        WHERE `bl_user` = $id AND `eva_active` = 1 AND (`usc_type` = 1 OR `usc_type` = 5) ");

    $urlusc = "http://dev5.tinnhanh365.vn/danh-gia-gian-hang/" . $user_ok['usc_id'] . "/" . replaceTitle($user_ok['usc_store_name']) . ".html";

    $urluri = "http://dev5.tinnhanh365.vn" . $_SERVER['REQUEST_URI'];


    if ($urlusc != $urluri) {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: $urlusc");
        exit();
    }

    $sv_url2 = "/danh-gia-gian-hang/" . $user_ok['usc_id'] . "/" . replaceTitle($user_ok['usc_store_name']) . ".html";
}


?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Shop rao vặt <?= $user_ok['usc_store_name'] ?> - Gian hàng mua bán <?= $user_ok['usc_store_name'] ?></title>
    <meta name="keywords" content="rao vặt <?= $user_ok['usc_store_name'] ?>,mua bán, gian hàng <?= $user_ok['usc_store_name'] ?>, rao vặt miễn phí, mua bán <?= $user_ok['usc_store_name'] ?>, shop <?= $user_ok['usc_store_name'] ?>, raonhanh365" />
    <meta name="description" content="Shop Rao vặt <?= $user_ok['usc_store_name'] ?> là kênh mua bán của <?= $user_ok['usc_store_name'] ?> cũng là gian hàng uy tín chất lượng trên Raonhanh365. <?= $user_ok['usc_store_name'] ?> có tới hàng trăm sản phẩm rao vặt nổi bật trên thị trường Việt. Tham gia rao vặt miễn phí cùng mua bán với <?= $user_ok['usc_store_name'] ?> trên Raonhanh365.vn để thỏa mãn mọi nhu cầu mua sắm của mọi người." />
    <meta property="og:title" content="Shop rao vặt <?= $user_ok['usc_store_name'] ?> - Gian hàng mua bán <?= $user_ok['usc_store_name'] ?>" />
    <meta property="og:description" content="Shop Rao vặt <?= $user_ok['usc_store_name'] ?> là kênh mua bán của <?= $user_ok['usc_store_name'] ?> cũng là gian hàng uy tín chất lượng trên Raonhanh365. <?= $user_ok['usc_store_name'] ?> có tới hàng trăm sản phẩm rao vặt nổi bật trên thị trường Việt. Tham gia rao vặt miễn phí cùng mua bán với <?= $user_ok['usc_store_name'] ?> trên Raonhanh365.vn để thỏa mãn mọi nhu cầu mua sắm của mọi người." />
    <meta property="og:url" content="<?= $urlusc ?>" />
    <meta name="language" content="vietnamese" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="Shop rao vặt <?= $user_ok['usc_store_name'] ?> - Gian hàng mua bán <?= $user_ok['usc_store_name'] ?><" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-language" itemprop="inLanguage" content="vi" />
    <!-- <meta name="robots" content="index,follow" /> -->
    <meta name="robots" content="noindex, nofollow" />

    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="/" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />

    <link rel="preload" href="<?= $urlusc ?>" />

    <link rel="canonical" href="<?= $urlusc ?>" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />

    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="gianhang_container">
            <div class="khoi_khong_face">
                <? include('../includes/inc_new/inc_ghang_top.php'); ?>

                <div class="khoi_vietdanhgia">
                    <div class="khoicon_danhgia khoicon_danhgia_df_1">
                        <div class="d_flex hd-align-center">
                            <div class="bg_chung bg_chung_hs_df">
                                <img src="/images/anh_moi/danhgia.svg" alt="Đánh giá tài khoản">
                            </div>
                            <div class="color_vang gioithieu gioithieu_df_hs">Đánh giá tài khoản</div>
                        </div>
                        <!-- Chưa có đánh giá -->
                        <div class="div_chua_co_danh_gia d_none">
                            <div class="div_chua_co_danh_gia_tex">Tài khoản này chưa có đánh giá nào</div>
                        </div>
                        <!-- Đã có đánh giá -->
                        <div class="div_khoi_da_co_danh_gia">
                            <div class="d_flex hd-jtify-center hd-align-center">
                                <div class="so_sao"><?= round(($row_bltoi['sum_eva'] / $row_bltoi['cou_eva']), 1) ?></div>
                                <div id="rating" class="khh_dgia">
                                    <div class="div5sao_df" style="width: <?= round(($row_bltoi['sum_eva'] / $row_bltoi['cou_eva']), 1) * 20 ?>%;">
                                        <img src="/images/anh_moi/5sao2.svg" class="da_danhgia">
                                    </div>
                                </div>
                            </div>
                            <? if (mysql_num_rows($list_bl->result) > 0) {
                                while ($row_bl = mysql_fetch_assoc($list_bl->result)) {
                                    $bl_id = $row_bl['eva_id'];
                                    $bl_usc = $row_bl['user_id'];
                                    $bl_logo = $row_bl['usc_logo'];

                                    // tra loi binh luan
                                    $check_dcbl = new db_query("SELECT `bl_user`, `eva_comment`, `eva_comment_time` FROM `evaluate`
                                                        WHERE `user_id` = $id AND `eva_active` = 1 AND `eva_parent_id` = $bl_id ");  ?>
                                    <div class="khoilon_danhgia">
                                        <div class="khoi_cmt_danhgia">
                                            <div class="them_div_khoi_cmt_danhgia">
                                                <div class="them_div_anh_df">
                                                    <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $bl_logo) ?>" alt="<?= ($row_bl['usc_type'] == 1) ? $row_bl['usc_name'] : $row_bl['usc_store_name'] ?>" class="avt_ndanhgia_bl">
                                                </div>
                                                <p class="name_rate color_text"><?= ($row_bl['usc_type'] == 1) ? $row_bl['usc_name'] : $row_bl['usc_store_name'] ?>
                                                    <? if ($bl_usc == $_COOKIE['UID']) {
                                                        if ($row_bl['da_csbl'] != 1) { ?>
                                                            <span class="chinhsua_comment" data="<?= $bl_id ?>" data1="<?= $usc_type ?>">Chỉnh sửa</span>
                                                    <? }
                                                    } ?>
                                                    <span class="time_rate"><?= lay_tgian($row_bl['eva_comment_time']) ?></span>
                                                </p>
                                            </div>
                                            <div id="rating_1" class="sosao_dgia">
                                                <?
                                                for ($j = 0; $j < (5 - $row_bl['eva_stars']); $j++) { ?>
                                                    <img src="/images/newImages/sao-rong.png" class="anh026">
                                                <? }
                                                for ($i = 0; $i < $row_bl['eva_stars']; $i++) { ?>
                                                    <img src="/images/icon/star.svg" class="anh025">
                                                <? } ?>
                                            </div>
                                        </div>
                                        <p class="color_text font-16 text_danhgia"><?= $row_bl['eva_comment'] ?></p>
                                        <div class="traloi_csua_dgia"></div>
                                        <? if (mysql_num_rows($check_dcbl->result) > 0) {
                                            $row_tl = mysql_fetch_assoc($check_dcbl->result); ?>
                                            <div class="a_chinhsua_tkdanhgiakx d_flex">
                                                <div class="b_chinhsua_tkdanhgiakx"></div>
                                                <div class="c_chinhsua_tkdanhgiakx">
                                                    <div class="d_flex align_c mb_10 dng_trl">
                                                        <div class="them_div_anh_df">
                                                            <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $usc_logo) ?>" alt="<?= $user_ok['usc_store_name'] ?>">
                                                        </div>
                                                        <p class="name_rate"><?= $user_ok['usc_store_name'] ?>
                                                            <span class="time_rate"><?= lay_tgian($row_tl['eva_comment_time']) ?></span>
                                                        </p>
                                                    </div>
                                                    <p class="texttl_tkdanhgia1kx"><?= $row_tl['eva_comment'] ?></p>
                                                </div>
                                            </div>
                                        <? } ?>
                                    </div>
                            <? }
                            } ?>
                        </div>
                    </div>
                </div>
                <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                    <div class="khoi_vietdanhgia">
                        <div class="khoicon_danhgia khoicon_danhgia_df2">
                            <div class="d_flex hd-align-center mb20">
                                <div class="bg_chung bg_chung_df_icon_viet">
                                    <img src="/images/anh_moi/vietdanhgia.svg" alt="">
                                </div>
                                <div class="color_vang gioithieu">Viết đánh giá</div>
                            </div>
                            <form class="danh_gia_dn" data="<?= $us_id ?>" data1="<?= $id ?>">
                                <div class="d_flex j_between df_680px ">
                                    <div class="row-tin-dang khoitraidanhgia khoitraidanhgia_df_hs form_gr">
                                        <p class="font-dam hd_font15-17">Nội dung đánh giá <span class="color_red">*</span></p>
                                        <textarea class="texa-mo-ta" placeholder="Nhập mô tả" name="mota"></textarea>
                                    </div>
                                    <div class="khoiphai_danhgiasao khoiphai_danhgiasao_df">
                                        <div id="rating_2">
                                            <input type="radio" id="star11" name="rating" value="5" checked />
                                            <label class="full" for="star11" title="Awesome - 1 stars"></label>

                                            <input type="radio" id="star12" name="rating" value="4" />
                                            <label class="full" for="star12" title="Pretty good - 2 stars"></label>

                                            <input type="radio" id="star13" name="rating" value="3" />
                                            <label class="full" for="star13" title="Meh - 3 stars"></label>

                                            <input type="radio" id="star14" name="rating" value="2" />
                                            <label class="full" for="star14" title="Kinda bad - 4 stars"></label>

                                            <input type="radio" id="star15" name="rating" value="1" />
                                            <label class="full" for="star15" title="Sucks big time - 5 star"></label>
                                        </div>
                                        <div class="item_end khoitong_nhapma form_gr">
                                            <p class="font-dam hd_font15-17">Mã xác nhận <span class="color_red">*</span></p>
                                            <div class="khoinhapma">
                                                <div class="khoinhapma_input">
                                                    <input type="text" name="ma_xacnhan" placeholder="Mã xác nhận" class="ma_xac_nhan">
                                                </div>
                                                <div class="khoicapcha d_flex hd-align-center">

                                                    <p class="b_radius_5 background-none show_macapcha">442644</p>
                                                    <input type="hidden" value="442644" id="macap_cha_moi" class="ma_cpch">

                                                    <div style="transform: rotate(7560deg); transition: all 0.3s ease 0s;">
                                                        <img src="/images/hd-refresh-captcha.svg" alt="tải lại mã captch" class="hd_cspointer xoay360 xoay361">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d_flex j_end">
                                    <button class="btn_guidanhgia" type="button" onclick="gui_bluan()">Gửi đánh giá</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>

    </section>

    <? include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="/js/newJs/admin.main.js"></script>
</body>

</html>
<script type="text/javascript">
    // xoay
    var do_xuay = 0;
    $(".xoay360").click(function() {
        do_xuay += 360;
        xoay($(this), do_xuay);
    });

    function xoay(img, deg) {
        $('.xoay360').css("transform", "rotate(" + deg + "deg)");
        $('.xoay360').css("transition", "0.2s");
    };

    function ramdumso(length) {
        var result = '';
        var characters = '0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    };

    var ran1 = ramdumso(6);
    $(".show_macapcha").html(ran1);
    $("#macap_cha_moi").val(ran1);

    $(".xoay360").click(function() {
        var ran = ramdumso(6);
        $(".show_macapcha").html(ran);
        $("#macap_cha_moi").val(ran)
    })

    function xoay_cp(id) {
        do_xuay += 360;
        xoay($(id), do_xuay);
        var ran2 = ramdumso(6);
        $(id).parents(".khoicapcha").find(".show_macapcha").html(ran2);
        $(id).parents(".khoicapcha").find(".macapch").val(ran2)
    }

    $('.icon_link_375').click(function() {
        $('.them_div_bao_ngoai1').toggleClass('hide_375');
    });

    function gui_bluan() {
        var form_dgia = $(".danh_gia_dn");
        form_dgia.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".form_gr"));
                error.wrap("<span class='error'>");
            },
            rules: {
                mota: {
                    required: true,
                },
                ma_xacnhan: {
                    required: true,
                    equalTo: "#macap_cha_moi",
                }
            },
            messages: {
                mota: {
                    required: "Nhập đánh giá của bạn",
                },
                ma_xacnhan: {
                    required: "Nhập mã otp",
                    equalTo: "Mã xác thực không đúng",
                }
            },
        });
        if (form_dgia.valid() === true) {
            var noi_dung_dgia = $("textarea[name='mota']").val();
            var so_sao = $("input[name='rating']:checked").val();
            var us_bl = $(".danh_gia_dn").attr("data1");
            var us_nbl = $(".danh_gia_dn").attr("data");
            $.ajax({
                url: '/ajax/binh_luan.php',
                type: 'POST',
                data: {
                    noi_dung_dgia: noi_dung_dgia,
                    so_sao: so_sao,
                    us_bl: us_bl,
                    us_nbl: us_nbl,
                },
                success: function(data) {
                    if (data == "") {
                        alert("Gửi đánh giá thành công");
                        window.location.reload();
                    } else {
                        alert(data);
                    }
                }
            })
        }
    };


    $(".chinhsua_comment").click(function() {
        var bl_id = $(this).attr("data");
        var type = $(this).attr("data1");
        var _this = $(this);
        $.ajax({
            url: '/render/chinh_sua_bl.php',
            type: 'POST',
            data: {
                bl_id: bl_id,
                type: type,
            },
            success: function(data) {
                _this.parents(".khoilon_danhgia").find(".traloi_csua_dgia").html(data);
                _this.parents(".khoilon_danhgia").find(".traloi_csua_dgia").addClass("sh_bgr");
                xoay_cp($(".xoay360"));
            }
        })
    });

    function dong_csbluan(id) {
        $(id).parents(".traloi_csua_dgia").html('');
    };

    function an_err(el) {
        $(el).parents(".form_gr").find(".error_cap").text('');
    }

    function csua_bluan_dn(id) {
        var form_csdgia = $(".danh_gia_dn1");
        form_csdgia.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".form_gr"));
                error.wrap("<span class='error'>");
            },
            rules: {
                mota1: {
                    required: true,
                },
                ma_xacnhan1: {
                    required: true,
                }
            },
            messages: {
                mota1: {
                    required: "Nhập đánh giá của bạn",
                },
                ma_xacnhan1: {
                    required: "Nhập mã otp",
                }
            },
        });
        if (form_csdgia.valid() === true) {
            var bl_id = $(id).attr("data");
            var noi_dung = $(id).parents(".khoicon_danhgia").find(".texa-mo-ta").val();
            var so_sao = $(id).parents(".khoicon_danhgia").find("input[name='rating1']:checked").val();
            var maopt = $(id).parents(".khoicon_danhgia").find(".macapch").val();
            var maoptn = $(id).parents(".khoicon_danhgia").find(".ma_xac_nhan").val();
            if (maopt != maoptn) {
                $(id).parents(".khoicon_danhgia").find(".error_cap").text("Mã xác thực không đúng");
            } else {
                $.ajax({
                    url: '/ajax/csua_bluan.php',
                    type: 'POST',
                    data: {
                        bl_id: bl_id,
                        noi_dung: noi_dung,
                        so_sao: so_sao,
                    },
                    success: function(data) {
                        if (data == "") {
                            alert("Bạn chỉnh sửa bình luận thành công");
                            window.location.reload();
                        } else {
                            alert(data);
                        }
                    }
                })
            }
        }
    }
</script>