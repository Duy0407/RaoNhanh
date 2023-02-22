<?
include("config.php");
$id = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id != 0) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];
    $list_tin = new db_query("SELECT `new_title`, `new_money`, `new_image`, `dia_chi`, `new_create_time`, `new_unit`, `new_cate_id`, `gia_kt`, `chotang_mphi` FROM `new`
                            WHERE `new_id` = $id AND `new_buy_sell` = 2 AND `new_user_id` = $us_id ");
    if (mysql_num_rows($list_tin->result) > 0) {
        $row_tin = mysql_fetch_assoc($list_tin->result);
        $new_image = explode(';', $row_tin['new_image']);

        $list_goi = new db_query("SELECT `bg_id`, `bg_thoigian`, `bg_dongia`, `bg_chietkhau`, `bg_thanhtien` FROM `bang_gia` WHERE `bg_type` = 3 ");
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html>
<!--link meta seo-->

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Ghim tin</title>
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/popup.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_h.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="container_all_body">
            <div class="box_contents">
                <div class="info_purchase_content_item box_product_item w_100 mg_b0">
                    <div class="info_purchase_content_item_child d_flex">
                        <div class="img_box_item">
                            <img class="img_product" src="<?= $new_image[0] ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                        </div>
                        <div class="info_purchase_content_item_text product_item_text">
                            <a href="#">
                                <h4 class="text_ellipsis ellip_line2 mg_b30"><?= $row_tin['new_title'] ?></h4>
                            </a>
                            <div class="content_product">
                                <p><?= lay_tgian($row_tin['new_create_time']) ?></p>
                                <p><?= $row_tin['dia_chi'] ?></p>
                                <? if ($row_tin['new_cate_id'] != 120) { ?>
                                    <? if ($row_tin['chotang_mphi'] == 1) { ?>
                                        <span>Cho tặng miễn phí</span>
                                    <? } else { ?>
                                        <? if ($row_tin['new_money'] == 0) { ?>
                                            <span>Liên hệ người bán</span>
                                        <? } else { ?>
                                            <span><?= number_format($row_tin['new_money']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></span>
                                        <? } ?>
                                    <? } ?>
                                <? } else { ?>
                                    <? if ($row_tin['new_money'] != 0 && $row_tin['gia_kt'] != 0) { ?>
                                        <span><?= number_format($row_tin['new_money']) ?> - <?= number_format($row_tin['gia_kt']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></span>
                                    <? } else if ($row_tin['new_money'] != 0 && $row_tin['gia_kt'] == 0) { ?>
                                        <span>Từ <?= number_format($row_tin['new_money']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></span>
                                    <? } else if ($row_tin['new_money'] == 0 && $row_tin['gia_kt'] != 0) { ?>
                                        <span>Đến <?= number_format($row_tin['gia_kt']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></span>
                                    <? } else { ?>
                                        <span>Thỏa thuận</span>
                                    <? } ?>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="khoi_chon">
                <div class="title_select">Chọn nơi ghim tin</div>
                <div class="chon_noi_ghim d_flex space_b">
                    <div class="noi_ghim w_50 active" data="1">Trang chủ</div>
                    <div class="noi_ghim w_50" data="2">Trang danh mục</div>
                </div>
            </div>
            <div class="khoi_gia">
                <div class="title_price">Ghim tin</div>
                <p class="noighimtindang_ngt">Ghim tin trên trang chủ</p>
                <div class="gia_ghim d_flex">
                    <? $x = 1;
                    while ($row_goi = mysql_fetch_assoc($list_goi->result)) { ?>
                        <div class="item_price" data="<?= $x++ ?>">
                            <div class="title_item" data="<?= $row_goi['id'] ?>"><?= $row_goi['bg_thoigian'] ?></div>
                            <? if ($row_goi['bg_chietkhau'] != 0) { ?>
                                <div class="d_flex align_c pd_t19">
                                    <div class="khoi_item_gia">
                                        <div class="gia_goc"><?= number_format($row_goi['bg_dongia']) ?> VNĐ</div>
                                        <div class="price"><?= number_format($row_goi['bg_thanhtien']) ?> VNĐ</div>
                                    </div>
                                    <div class="khoi_khuyenmai">-<?= $row_goi['bg_chietkhau'] ?>%</div>
                                </div>
                            <? } else { ?>
                                <div class="d_flex gia_tien">
                                    <div class="price"><?= number_format($row_goi['bg_dongia']) ?> VNĐ</div>
                                </div>
                            <? } ?>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>

        <!-- -- xác nhân thanh toán ---  -->
        <div id="payment_conf" class="modalPaymentConf">
            <div class="box-check">
                <div class="modal-content">
                    <div class="title-modal">
                        <p class="text_title_modal">Xác nhận thanh toán</p>
                        <span class="close close_ttoan"><img src="/images/newImages/close.png"></span>
                    </div>
                    <p class="text-check-mail">Bạn có chắc muốn thanh toán <span></span> VNĐ? <br>Sau khi xác nhận, tiền sẽ không thể hoàn lại</p>
                    <div class="btn_modal">
                        <button class="btn-cancel btn huybo_ymua">Huỷ bỏ</button>
                        <button class="btn-success btn dong_ymua" data="<?= $id ?>">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="popup_cha thanh_toan" hidden>
            <div class="popup_bg"></div>
            <div class="container_popup">
                <div class="popup_title ">
                    Thanh toán
                    <div class="img_close"><img src="/images/anh_moi/close_popup.png" alt=""></div>
                </div>
                <div class="popup_content">
                    <div class="boc_ghimt">
                        <div class="box_item_price" data="">
                            <div class="title_item"></div>
                            <div class="d_flex gia_tien">
                                <div class="price"></div>
                            </div>
                        </div>
                        <div class="text_content">Bạn đã chọn gói ghim tin nổi bật trang chủ</div>
                        <div class="btn_thanhtoan d_flex space_b">
                            <div class="text_btn">Thanh toán</div>
                            <div class="text_btn tong_ttoan_ghim"></div>
                        </div>
                    </div>
                    <div class="so_du d_flex">
                        <p>Số dư:</p>
                        <p class="tien_du"><?= number_format($user_money) ?> VNĐ</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="popup_cha thanh_cong" hidden>
            <div class="popup_bg"></div>
            <div class="container_popup popup_xacnhan_tc">
                <div class="img_thanhcong d_flex jus_c"><img src="/images/anh_moi/thanh_cong.png" alt=""></div>
                <div class="text_popup_tc">Ghim tin thành công!</div>
                <div class="text_popup_tc"> Tin của bạn sẽ được ghim vào lúc <?= date('H:i', time()); ?>.</div>
                <div class="btn_close" data="<?= $us_type ?>">Đóng</div>
            </div>
        </div>

        <!-- -- số dư không đủ ---  -->
        <div id="insufficient" class="modalSdkd">
            <div class="box-check">
                <div class="modal-content">
                    <div class="title-modal">
                        <p class="text_title_modal">Số dư không đủ</p>
                        <span class="close close_sodu"><img src="/images/newImages/close.png"></span>
                    </div>
                    <p class="text-check-mail">Số dư hiện tại của bạn không đủ. <br> Bạn có muốn nạp thêm tiền vào Raonhanh365 ?</p>
                    <div class="btn_modal">
                        <button type="button" class="btn-cancel huybo_sodu">Huỷ bỏ</button>
                        <button type="button" class="btn-success sodu_khongdu" data="<?= $us_type ?>">Đồng ý</a>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <? include('../includes/inc_new/inc_footer.php') ?>
</body>

<script type="text/javascript">
    $('.noi_ghim').click(function() {
        var id = $(this).attr("data");
        if (id == 1) {
            var text_g = "Ghim tin trên trang chủ";
            $(".noighimtindang_ngt").text(text_g);
        } else if (id == 2) {
            var text_g = "Ghim tin trên trang danh mục";
            $(".noighimtindang_ngt").text(text_g);
        }
        $('.noi_ghim').removeClass('active');
        $(this).addClass('active');
    });
    $('.item_price').click(function() {
        var id_ghim = $(this).attr("data");
        console.log(id_ghim);
        var goi_ghim = $(this).find(".title_item").text();
        var gia_tien = $(this).find(".price").text();
        $(".thanh_toan").find(".box_item_price").attr("data", id_ghim);
        $(".thanh_toan").find(".title_item").text(goi_ghim);
        $(".thanh_toan").find(".price").text(gia_tien);
        $(".thanh_toan").find(".tong_ttoan_ghim").text(gia_tien);
        $('.thanh_toan').show();
    });

    $('.img_close').click(function() {
        $('.thanh_toan').hide();
    });

    $('.btn_thanhtoan').click(function() {
        var tien_du = $(this).parents(".thanh_toan").find(".tien_du").text();
        tien_du = tien_du.replace(' VNĐ', '');
        tien_du = Number(tien_du.replace(/,/g, ''));

        var tien_ghim = $(this).parents(".thanh_toan").find(".tong_ttoan_ghim").text();
        tien_ghim = tien_ghim.replace(' VNĐ', '');
        tien_ghim = Number(tien_ghim.replace(/,/g, ''));
        if (tien_ghim > tien_du) {
            $(".modalSdkd").show();
        } else {
            $(".modalPaymentConf").show();
        }
    });

    $(".huybo_ymua, .close_ttoan").click(function() {
        $(".modalPaymentConf").hide();
    });

    $(".huybo_sodu, .close_sodu").click(function() {
        $(".modalSdkd").hide();
    });

    $(".sodu_khongdu").click(function() {
        var type_us = $(this).attr("data");
        if (type_us != "") {
            if (type_us == 1) {
                window.location.href = '/ho-so-nguoi-ban-ca-nhan/nap-tien-vao-tai-khoan.html';
            } else {
                window.location.href = '/ho-so-gian-hang-nap-tien-vao-tai-khoan.html';
            }
        }
    });

    $(".btn_close").click(function() {
        $(".thanh_cong").hide();
        var us_type = $(this).attr("data");
        if (us_type == 1) {
            window.location.href = '/ho-so-nguoi-ban-ca-nhan/quan-ly-tin.html';
        } else {
            window.location.href = '/ho-so-quan-ly-tin.html';
        }
    });

    $(".dong_ymua").click(function() {
        var new_id = $(this).attr("data");
        var noi_ghim = $(".noi_ghim.active").attr("data");
        var tien_ghim = $(".thanh_toan").find(".tong_ttoan_ghim").text();
        tien_ghim = tien_ghim.replace(' VNĐ', '');
        var so_ngay_ghim = $(".thanh_toan").find(".box_item_price").attr("data");
        $.ajax({
            url: '/ajax/ghim_tindang.php',
            type: 'POST',
            data: {
                new_id: new_id,
                noi_ghim: noi_ghim,
                tien_ghim: tien_ghim,
                so_ngay: so_ngay_ghim,
            },
            success: function(data) {
                if (data == "") {
                    $(".modalPaymentConf").hide();
                    $(".thanh_toan").hide();
                    $(".thanh_cong").show();
                } else {
                    alert(data);
                }
            }
        })
    });
</script>

</html>