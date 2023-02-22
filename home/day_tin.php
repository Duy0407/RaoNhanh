<?
include("config.php");
$id = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id != 0) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $tien_daytin = mysql_fetch_assoc((new db_query("SELECT `bg_dongia` FROM `bang_gia` WHERE `bg_type` = 4 "))->result)['bg_dongia'];

    $list_tin = new db_query("SELECT `new_title`, `new_money`, `new_image`, `dia_chi`, `new_create_time`, `new_unit`, `new_cate_id`, `gia_kt`, `new_update_time`,
                            `chotang_mphi` FROM `new` WHERE `new_id` = $id AND `new_buy_sell` = 2 AND `new_user_id` = $us_id LIMIT 1 ");
    if (mysql_num_rows($list_tin->result) > 0) {
        $row_tin = mysql_fetch_assoc($list_tin->result);
        $new_image = explode(';', $row_tin['new_image']);
    } else {
        if ($us_type == 1) {
            header('Location: /ho-so-nguoi-ban-ca-nhan.html');
        } else {
            header('Location: /ho-so-gian-hang-cua-toi-trang-chu.html');
        }
    }
} else {
    header('Location: /');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Đẩy tin</title>
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
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
                            <a>
                                <h4 class="text_ellipsis ellip_line2 mg_b30"><?= $row_tin['new_title'] ?></h4>
                            </a>
                            <div class="content_product">
                                <p><?= lay_tgian($row_tin['new_update_time']) ?></p>
                                <p><?= $row_tin['dia_chi'] ?></p>
                                <? if ($row_tin['new_cate_id'] != 120) { ?>
                                    <? if ($row_tin['chotang_mphi'] == 1) { ?>
                                        <span>Cho tặng miễn phí</span>
                                    <? } else if ($row_tin['new_money'] <= 0) { ?>
                                        <span>Liên hệ người bán</span>
                                    <? } else if ($row_tin['new_money'] > 0) { ?>
                                        <span><?= number_format($row_tin['new_money']) ?> <?= $arr_dvtien[$row_tin['new_unit']] ?></span>
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
            <div class="khoi_chon_daytin" data="<?= $tien_daytin ?>">
                <div class="main-content-p2 day_tin">
                    <div class="title">
                        <span class="text-title">Chọn ngày giờ ghim tin</span>
                        <span class="box-switch">
                            <span class="text-switch">Cả ngày</span>
                            <label class="btn-switch switch-124" for="checkedAll">
                                <input type="checkbox" name="checkedAll" id="checkedAll">
                                <span class="slider1 round1"></span>
                            </label>
                        </span>
                    </div>
                    <div class="box-hour">
                        <div class="select-hour">
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st1" value="0" data="1">
                                <div class="option_inner">
                                    <div class="name">0h-1h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st2" value="0" data="2">
                                <div class="option_inner">
                                    <div class="name">1-2h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st3" value="0" data="3">
                                <div class="option_inner">
                                    <div class="name">2h-3h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st4" value="0" data="4">
                                <div class="option_inner">
                                    <div class="name">3h-4h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st5" value="0" data="5">
                                <div class="option_inner">
                                    <div class="name">4h-5h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st6" value="0" data="6">
                                <div class="option_inner">
                                    <div class="name">5h-6h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st7" value="0" data="7">
                                <div class="option_inner">
                                    <div class="name">6h-7h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st8" value="0" data="8">
                                <div class="option_inner">
                                    <div class="name">7h-8h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st9" value="0" data="9">
                                <div class="option_inner">
                                    <div class="name">8h-9h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st10" value="0" data="10">
                                <div class="option_inner">
                                    <div class="name">9h-10h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st10" value="0" data="11">
                                <div class="option_inner">
                                    <div class="name">10h-11h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st12" value="0" data="12">
                                <div class="option_inner">
                                    <div class="name">11h-12h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st13" value="0" data="13">
                                <div class="option_inner">
                                    <div class="name">12h-13h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st14" value="0" data="14">
                                <div class="option_inner">
                                    <div class="name">13h-14h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st15" value="0" data="15">
                                <div class="option_inner">
                                    <div class="name">14h-15h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st16" value="0" data="16">
                                <div class="option_inner">
                                    <div class="name">15h-16h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st17" value="0" data="17">
                                <div class="option_inner">
                                    <div class="name">16h-17h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st18" value="0" data="18">
                                <div class="option_inner">
                                    <div class="name">17h-18h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st19" value="0" data="19">
                                <div class="option_inner">
                                    <div class="name">18h-19h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st20" value="0" data="20">
                                <div class="option_inner">
                                    <div class="name">19h-20h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st21" value="0" data="21">
                                <div class="option_inner">
                                    <div class="name">20h-21h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st22" value="0" data="22">
                                <div class="option_inner">
                                    <div class="name">21h-22h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st23" value="0" data="23">
                                <div class="option_inner">
                                    <div class="name">22h-23h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st24" value="0" data="24">
                                <div class="option_inner">
                                    <div class="name">23h-00h</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="so-ngay d_flex align_c">
                        <p class="ngay-ghim">Số ngày đẩy tin</p>
                        <div class="border_box">
                            <button class="tru btn">-</button>
                            <input type="number" class="btn so" value="10" max="30" min="1" readonly>
                            <button class="cong btn">+</button>
                        </div>
                    </div>
                    <div class="box-noi-ghim">
                        <div class="font slcNoiGhim" data="">Nơi đẩy: <span>Trang chủ</span></div>
                        <div class="font slcHour">Thời gian ghim: <span></span></div>
                        <div class="font tgian_batdau" data="<?= date('H:i', time()) ?>">Thời gian bắt đầu: <span class="batdau_tgiant" data="" data1=""></span></div>
                    </div>
                    <button class="btn-payment" data="<?= $id ?>">
                        <span class="text-payment">Thanh toán </span>
                        <span class="money-payment"> <span class="tien_thanhtoan">0</span> VNĐ</span>
                    </button>
                    <p class="so-du-tk">Số dư: <span class="money-so-du-tk"><?= number_format($user_money) ?></span> VNĐ</p>
                </div>
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
                        <button class="btn-success btn dong_ymua" data="" data1="<?= $_COOKIE['UT'] ?>">Xác nhận</button>
                    </div>
                </div>
            </div>
        </div>


    </section>
    <? include('../includes/inc_new/inc_footer.php') ?>
</body>
<script type="text/javascript" src="/js/personal_seller_profile.js"></script>
<script type="text/javascript">
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

    $(".close_sodu, .huybo_sodu").click(function() {
        $("#insufficient").hide();
    });
</script>

</html>