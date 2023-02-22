<?

include("config.php");
include("includes/inc_new/icon.php");

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 1) {
        $ht_tt = new db_query("SELECT `usc_id`,`usc_name`,`usc_money`,`usc_type`,`usc_phone`,`usc_logo`,`usc_time`,`usc_email`,`usc_address`, `email_ht` FROM `user`
                                WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_time = $kn_tt['usc_time'];
        $usc_logo = $kn_tt['usc_logo'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
        $usc_email = $kn_tt['usc_email'];
        $usc_type = $kn_tt['usc_type'];
        $usc_phone = $kn_tt['usc_phone'];
        $usc_address = $kn_tt['usc_address'];
        $arr_type = array(1 => 'người bán', 5 => "doanh nghiệp");
        $usc_money = $kn_tt['usc_money'];

        // TỔNG TIN
        $tongtin = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user");
        $result_tongtin = mysql_num_rows($tongtin->result);

        // TIN ĐÃ BÁN
        $tongtindaban = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `da_ban` = 1");
        $result_tongtindaban = mysql_num_rows($tongtindaban->result);

        // Lấy tin yêu thích
        $tin_yt = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `user_id` = $id_user AND `usc_type` = $type_user");
        $result_tin_yt = mysql_num_rows($tin_yt->result);

        // 30 ngay qua
        $ngay_qua = time() - (30 * 86400);

        $sotin = new db_query("SELECT COUNT(`new_id`) AS cou_tnq FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_create_time` > $ngay_qua ");
        $cou_tnq = mysql_fetch_assoc($sotin->result)['cou_tnq'];

        $sotin_dban = new db_query("SELECT COUNT(`new_id`) AS cou_tdb FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `tgian_ban` > $ngay_qua
                            AND `da_ban` = 1 ");
        $cou_tdb = mysql_fetch_assoc($sotin_dban->result)['cou_tdb'];

        $sotin_yc = new db_query("SELECT COUNT(`id`) AS cou_tyt FROM `tin_yeu_thich` WHERE `usc_type` = $usertype AND `user_id` = $id_user AND `tgian_thich` > $ngay_qua ");
        $cou_tyt = mysql_fetch_assoc($sotin_yc->result)['cou_tyt'];

        $ntien_tk = new db_query("SELECT SUM(`his_price`) AS sun_ntien FROM `history` WHERE `his_seri` != '' AND `his_user_id` = $id_user AND `his_time` > $ngay_qua  ");
        $sun_ntien = mysql_fetch_assoc($ntien_tk->result)['sun_ntien'];

        $bluan_toi = new db_query("SELECT COUNT(`eva_id`) AS cou_eva, SUM(`eva_stars`) AS sum_eva FROM `evaluate` WHERE `bl_user` = $id_user
                                    AND `new_id` = 0 AND `eva_active` = 1 ");
        $row_bltoi = mysql_fetch_assoc($bluan_toi->result);

        // lay danh sách binh luạn

        $list_bl = new db_query("SELECT `eva_id`, `user_id`, `eva_stars`, `eva_comment`, `eva_comment_time` FROM `evaluate`
                                WHERE `bl_user` = $id_user AND `eva_active` = 1 ");
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
    <link rel="dns-prefetch" href="https://www.google.com.vn">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://www.google.com.vn">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <!--    -----tvt them  27/05--->
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" as="image" href="/images/banner.webp">
    <link rel="preload" as="image" href="/images/cv_trangchu1.webp">

    <!--------------->

    <title>Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN</title>
    <meta name="keywords" content="Raonhanh365, rao vặt miễn phí, trang rao vặt, kênh mua bán, quảng cáo, mua ban, quang cao, rao vat, đăng tin miễn phí" />
    <meta name="description" content="Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn, là cầu nối tốt nhất giữa người mua và người bán." />
    <meta property="og:title" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN" />
    <meta property="og:description" content="Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn. Raonhanh365 'đăng tin miễn phí - mua bán tức thì, nơi kết nối giữa người mua kẻ bán.'" />
    <meta property="og:url" content="https://raonhanh365.vn/" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN<" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="https://raonhanh365.vn/images/banner_raonhanh365.jpg" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <link rel="canonical" href="https://raonhanh365.vn" />
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
    <!-- <link rel="stylesheet" href="../css/style_new/app.css"> -->
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_quang.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/personal_seller_profile.css?v=<?= $version ?>" />
    <!-- <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?v=<?= $version ?>"> -->
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien3.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_raonhanhcssnew.css?v=<?= $version ?>" />
</head>

<body>
    <?
    include("../includes/common/inc_header.php"); ?>
    <section class="personal_seller_profile_total">
        <?php include "../includes/person_sell/inc_sidebar_left.php" ?>
        <div class="box-right personal_seller_profile">
            <div class="hoso-canhan">
                <div class="tttk-inf">
                    <div class="acc-inf">
                        <div class="title-inf">
                            <div class="anh">
                                <img src="/images/newImages/tttk.png" class="img-prf lazyload" data-src="/images/newImages/tttk.png">
                            </div>
                            <div class="chu">
                                <p class="chu-prf">Thông tin tài khoản</p>
                            </div>
                        </div>
                    </div>
                    <div class="detail-prf">
                        <div class="anh anh_df_dl">
                            <? if ($usc_logo != '') { ?>
                                <img src="<?= $usc_logo; ?>" class="lazyload img-detail-prf" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                            <? } else { ?>
                                <img src="/images/anh_moi/anh010.png" alt="">
                            <? } ?>

                        </div>
                        <div class="chu">
                            <div class="title">
                                <div class="hvt-prf"><?= $usc_name; ?></div>
                                <div class="div-edit-prf"><a href="../chinh-sua-thong-tin.html" class="edit-prf">Chỉnh sửa thông tin</a></div>
                            </div>
                            <div class="content">
                                <p class="loai-tk">Loại tài khoản: <?= $arr_type[$type_user]; ?></p>
                                <p class="ngay-tham-gia">Ngày tham gia: <?= $usc_time; ?></p>
                                <p class="phone-num">Số điện thoại: <?= $usc_phone; ?></p>
                                <p class="email">Email: <?= ($kn_tt['email_ht'] != "") ? $kn_tt['email_ht'] : $usc_email ?></p>
                                <p class="address">Địa chỉ: <?= $usc_address; ?></p>
                            </div>
                            <div class="edit-prf-2-tong">
                                <div class="edit-prf-2"><a href="/chinh-sua-thong-tin.html">Chỉnh sửa thông tin</a></div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="statistical">
                    <div class="box-sta">
                        <div class="title-sta text-tdd">
                            <img src="/images/newImages/tin-da-dang.png" class="tdd lazyload" data-src="/images/newImages/tin-da-dang.png">
                            <p class="text-title">Tin đã đăng</p>
                        </div>
                        <div class="content-tdd">
                            <p class="view"><?= $result_tongtin ?></p>
                            <p class="footer">+ <?= $cou_tnq ?> đã bán trong 30 ngày qua</p>
                        </div>
                    </div>
                    <div class="box-sta">
                        <div class="title-sta text-tdb">
                            <img src="/images/newImages/tin-da-ban.png" class="tdb lazyload" data-src="/images/newImages/tin-da-ban.png">
                            <p class="text-title">Tin đã bán</p>
                        </div>
                        <div class="content-tdb">
                            <p class="view"><?= $result_tongtindaban ?></p>
                            <p class="footer">+ <?= $cou_tdb ?> tin mới trong 30 ngày qua</p>
                        </div>
                    </div>
                    <div class="box-sta">
                        <div class="title-sta text-ltt">
                            <img src="/images/newImages/luot-thich-tin.png" class="ltt lazyload" data-src="/images/newImages/luot-thich-tin.png">
                            <p class="text-title">Lượt thích tin</p>
                        </div>
                        <div class="content-ltt">
                            <p class="view"><?= $result_tin_yt ?></p>
                            <p class="footer">+ <?= $cou_tyt ?> lượt thích trong 30 ngày qua</p>
                        </div>
                    </div>
                    <div class="box-sta">
                        <div class="title-sta text-sd">
                            <img src="/images/newImages/so-du.png" class="sd lazyload" data-src="/images/newImages/so-du.png">
                            <p class="text-title">Số dư (VNĐ)</p>
                        </div>
                        <div class="content-sd">
                            <p class="view"><?= number_format($usc_money) ?></p>
                            <p class="footer">+ <?= number_format($sun_ntien) ?> VNĐ trong 30 ngày qua</p>
                        </div>
                    </div>
                    <div class="box-sta">
                        <div class="title-sta text-dgtb">
                            <img src="/images/newImages/danh-gia-trung-binh.png" class="dgtb lazyload" data-src="/images/newImages/danh-gia-trung-binh.png">
                            <p class="text-title">Đánh giá trung bình</p>
                        </div>
                        <div class="content-dgtb">
                            <p class="view"><?= round(($row_bltoi['sum_eva'] / $row_bltoi['cou_eva']), 1) ?></p>
                            <p class="footer">Trên <?= $row_bltoi['cou_eva'] ?> lượt đánh giá</p>
                        </div>
                    </div>
                    <div class="box-sta">
                        <div class="title-sta text-tlphc">
                            <img src="/images/newImages/ti-le-phan-hoi-chat.png" class="tlphc lazyload" data-src="/images/newImages/ti-le-phan-hoi-chat.png">
                            <p class="text-title">Tỉ lệ phản hồi chat</p>
                        </div>
                        <div class="content-tlphc">
                            <p class="view">0%</p>
                            <p class="footer">Thường trả lời trong vòng 2 giờ
                        </div>
                    </div>

                </div>
                <div class="box-dgtk">
                    <div class="title-box-dgtk">
                        <div class="dgtk-img">
                            <img src="/images/newImages/danh-gia-trung-binh.png" class="dgtb lazyload" data-src="/images/newImages/danh-gia-trung-binh.png">
                        </div>
                        <p class="text-box-dgtk">Đánh giá tài khoản</p>
                    </div>
                    <div class="box-content-dgtk" data="<?= $id_user ?>">
                        <? if (mysql_num_rows($list_bl->result) > 0) {
                            while ($row_bl = mysql_fetch_assoc($list_bl->result)) {
                                $id_bl = $row_bl['eva_id'];
                                $bl_usc = $row_bl['user_id'];
                                $nguoi_bl = new db_query("SELECT `usc_id`, `usc_name`, `usc_logo` FROM `user` WHERE `usc_id` = $bl_usc ");
                                $row_nbl = mysql_fetch_assoc($nguoi_bl->result);
                                $check_dcbl = new db_query("SELECT `eva_id`, `bl_user`, `eva_comment`, `eva_comment_time` FROM `evaluate`
                                                        WHERE `user_id` = $id_user AND `eva_active` = 1 AND `eva_parent_id` = $id_bl "); ?>
                                <div class="content-dgtk" data="<?= $id_bl ?>">
                                    <div class="boc_bluan boctr_bl">
                                        <div class="title-dgtk d_flex">
                                            <div class="avt_cmt"><img src="/images/anh_moi/anh004.png" alt=""></div>
                                            <span class="text-title-dgtk"><?= $row_nbl['usc_name'] ?></span>
                                            <span class="time-title-dgtk"><?= lay_tgian($row_bl['eva_comment_time']) ?></span>
                                        </div>
                                        <div class="sao">
                                            <? for ($i = 0; $i < $row_bl['eva_stars']; $i++) { ?>
                                                <img data-src="/images/newImages/sao.png" src="/images/newImages/sao.png" class="lazyload danh-gia-tk">
                                            <? }
                                            for ($i = 0; $i < (5 - $row_bl['eva_stars']); $i++) { ?>
                                                <img data-src="/images/newImages/sao-rong.png" src="/images/newImages/sao-rong.png" class="lazyload danh-gia-tk">
                                            <? } ?>
                                        </div>
                                        <p class="cmt-dgtk"><?= $row_bl['eva_comment'] ?></p>
                                        <div class="cmt_answer <?= (mysql_num_rows($check_dcbl->result) > 0) ? "traloi_bluan" : "d_flex" ?>">
                                            <? if (mysql_num_rows($check_dcbl->result) > 0) {
                                                $row_trl = mysql_fetch_assoc($check_dcbl->result); ?>
                                                <div class="title-dgtk d_flex">
                                                    <div class="avt_cmt"><img src="/images/anh_moi/anh004.png" alt=""></div>
                                                    <span class="text-title-dgtk"><?= $user_name ?></span>
                                                    <span class="time-title-dgtk"><?= lay_tgian($row_trl['eva_comment_time']) ?></span>
                                                </div>
                                                <p class="cmt-dgtk"><?= $row_trl['eva_comment'] ?></p>
                                            <? } else { ?>
                                                <div class="cmt_answer-img"><img src="/images/icon/answer.svg" alt=""></div>
                                                <p class="color_blue tra_loi">Trả lời</p>
                                            <? } ?>
                                        </div>
                                        <? if (mysql_num_rows($check_dcbl->result) == 0) {
                                            include('../includes/inc_new/evaluate.php');
                                        } ?>
                                    </div>
                                </div>
                            <? }
                        } else { ?>
                            <div class="cha_danhgiataikhoankx">
                                <p class="chua_codgia">Tài khoản chưa có đánh giá nào </p>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <? include '../modals/md_tb_yeuthich.php' ?>
    <? include("../includes/inc_new/inc_footer.php"); ?>
    <? include("../includes/person_sell/inc_validate.php"); ?>
    <script>
        $('.thongtin-2-txt').click(function() {
            $('.thongtin-2-txt').removeClass('active');
            $(this).addClass('active');
            var type = $(this).data('id');
            $('.thongtin-chitiet-dn').addClass('d_none')
            $('#thongtinct-' + type).removeClass('d_none')
        });

        $('.mota-ct').click(function() {
            $('.ct-an').show();
            $('.mota-ct').hide();
        })

        $('.tra_loi').click(function() {
            $('.danhgia_hskx2').hide(500);
            $(this).parents('.content-dgtk').find('.danhgia_hskx2').show();
        });

        $('.nut_cancel').click(function() {
            $(this).parents('.content-dgtk').find('.danhgia_hskx2').hide();
        });

        $(".btn-gui-dg").click(function() {
            var binh_luan = $(this).parents(".boctr_bl").find(".text-danh-gia-kx").val();
            var nguoi_tloi = $(this).parents(".box-content-dgtk").attr("data");
            var id_bl = $(this).parents(".content-dgtk").attr("data");
            if (binh_luan.trim() != "") {
                $.ajax({
                    url: '/ajax/traloi_bluan.php',
                    type: 'POST',
                    data: {
                        binh_luan: binh_luan,
                        nguoi_tloi: nguoi_tloi,
                        id_bl: id_bl,
                    },
                    success: function(data) {
                        if (data == "") {
                            alert("Bạn trả lời binh thành công");
                            window.location.reload();
                        } else {
                            alert(data);
                        }
                    }
                })
            } else {
                alert("Nhập trả lời bình luận");
            }
        });

        $('#overview').addClass('menu_active')
    </script>
</body>

</html>