<?
include 'config.php';
?>
<!DOCTYPE html>
<html lang="vi">
<!--link meta seo-->

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport"
        content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Hồ sơ người bán cá nhân - Shop không có web</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/css/select2.min.css?v='<?= $version ?>'" as="style">
    <link href="/css/select2.min.css?v='<?= $version ?>'" rel="stylesheet" type="text/css" />

    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>

    <link rel="preload" href="/css/newCss/home_new.css" as="style">
    <link rel="stylesheet" href="/css/newCss/home_new.css" type="text/css">

    <link rel="stylesheet" href="/css/style_new/footer.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style_new/style.css">
    <link rel="stylesheet" type="text/css" href="../css/style_new/style_b.css">
    <link rel="stylesheet" type="text/css" href="../css/style_new/style_quang.css">

</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section class="stall_no_website">
        <div class="gianhang_container">
            <div class="khoi_khong_face">
                <div class="position_ral">
                    <img src="../images/anh_moi/banner.png" alt="" class="cover_img">
                    <div class="chinhsua_img">
                        <img src="../images/anh_moi/gallery-edit.png" alt="">
                    </div>
                    <div class="avatar_img">
                        <img src="../images/anh_moi/anh_nen.jpg" alt="">
                        <div class="tt_hoatdong"></div>
                        <p class="text_trangthai">Đang hoạt động</p>
                    </div>
                    <div class="ten_cuahang">Cửa hàng điện thoại di động giá tốt</div>

                </div>

                <div class="khoi_internet khoi_internet_khach_dg">
                    <div class="df_hs_khach_dg">
                        <a href="/ho-so-gian-hang-cua-toi-khach.html" class="btn_trangchu_a ">
                            <p class="color_text">Trang chủ</p>
                        </a>
                        <a href="/ho-so-gian-hang-cua-toi-dang-gia-khach.html" class="btn_danhgia_a ">
                            <p class="color_cam">Đánh giá</p>
                        </a>
                    </div>

                    <div class="d_flex j_end hide_a_375 df_position_r">
                        <div class="icon_link_375">
                            <img src="../images/anh_moi/link_375.svg" alt="">
                        </div>
                        <div class="them_div_bao_ngoai1 hide_375">
                            <a href="" class="d_flex btn_facebook hs_df_10">
                                <div class="btn_facebook_img">
                                    <img src="../images/anh_moi/fb_svg.svg" alt="">
                                </div>
                                <p>Facebook</p>
                            </a>
                            <a href="" class="d_flex btn_web hs_df_10">
                                <div class="btn_web_img">
                                    <img src="../images/anh_moi/web_svg.svg" alt="">
                                </div>
                                <p>Website</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="khoi_vietdanhgia">
                    <div class="khoicon_danhgia">
                        <div class="d_flex hd-align-center">
                            <div class="bg_vang bg_chung">
                                <img src="../images/anh_moi/star.png" alt="">
                            </div>
                            <div class="color_vang gioithieu font-24-28">Đánh giá tài khoản</div>
                        </div>
                        <div class="d_flex hd-jtify-center  hd-align-center">
                            <div class="so_sao">4,5</div>
                            <div id="rating">
                                <input type="radio" id="star5" name="rating" value="5" />
                                <label class="full" for="star5" title="Awesome - 5 stars"></label>

                                <input type="radio" id="star4" name="rating" value="4" />
                                <label class="full" for="star4" title="Pretty good - 4 stars"></label>

                                <input type="radio" id="star3" name="rating" value="3" />
                                <label class="full" for="star3" title="Meh - 3 stars"></label>

                                <input type="radio" id="star2" name="rating" value="2" />
                                <label class="full" for="star2" title="Kinda bad - 2 stars"></label>

                                <input type="radio" id="star1" name="rating" value="1" />
                                <label class="full" for="star1" title="Sucks big time - 1 star"></label>
                            </div>
                        </div>
                        <div class="khoilon_danhgia_scroll">
                            <div class="khoilon_danhgia">
                                <div class="khoi_cmt_danhgia">
                                    <div class="d_flex img_cmt_danhgia">
                                        <img src="../images/anh_moi/anh040.png" alt="" class="img_anh_danhgia">
                                        <p class="name_rate color_text">26sonlachaoaenha <span class="time_rate">15 giờ
                                                trước</span>
                                        </p>
                                    </div>
                                    <div id="rating_1">
                                        <input type="radio" id="star9" name="rating" value="1" />
                                        <label class="full" for="star9" title="Awesome - 1 stars"></label>

                                        <input type="radio" id="star0" name="rating" value="2" />
                                        <label class="full" for="star0" title="Pretty good - 2 stars"></label>

                                        <input type="radio" id="star6" name="rating" value="3" />
                                        <label class="full" for="star6" title="Meh - 3 stars"></label>

                                        <input type="radio" id="star7" name="rating" value="4" />
                                        <label class="full" for="star7" title="Kinda bad - 4 stars"></label>

                                        <input type="radio" id="star8" name="rating" value="5" />
                                        <label class="full" for="star8" title="Sucks big time - 5 star"></label>
                                    </div>

                                </div>
                                <div class="hd_cspointer d_flex hd-align-center tl_taikhoandanhgia">
                                    <button type="button" class="tl_tkdanhgia hd_cspointer font-bold font-14-16">Trả
                                        lời</button>
                                    <div class="danhgia_hscn2">
                                        <div class="d_flex hd-align-center phanhoikh">
                                            <div class="bg_vang k_anh_chung">
                                                <img src="../images/anh_moi/edit_rate.png" alt="">
                                            </div>
                                            <div class="color_vang ghichu">Phản hồi với khách hàng</div>
                                            <div class="nut_cancel hd_cspointer">
                                                <img src="../images/anh_moi/anh020.png" alt="anh020"
                                                    class="nut_cancel_anh" style="background: #F26222;">
                                            </div>
                                        </div>
                                        <div class="o-phanhoikh">
                                            <p class="font-dam hd_font15-17">Nội dung phản hồi<span
                                                    class="color_red p5">*</span></p>
                                            <textarea class="text-phan-hoi form-control" placeholder="Nhập nội dung"
                                                name="noidung_phanhoi"></textarea>
                                        </div>
                                        <div class="btn-phan-hoi-kh d_flex">
                                            <button type="button" class="btn-gui-ph hd_cspointer font-bold">Gửi
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="khoilon_danhgia">
                                <div class="khoi_cmt_danhgia">
                                    <div class="d_flex img_cmt_danhgia">
                                        <img src="../images/anh_moi/anh040.png" alt="" class="img_anh_danhgia">
                                        <p class="name_rate color_text">26sonlachaoaenha <span class="time_rate">15 giờ
                                                trước</span>
                                        </p>
                                    </div>
                                    <div id="rating_1">
                                        <input type="radio" id="star9" name="rating" value="1" />
                                        <label class="full" for="star9" title="Awesome - 1 stars"></label>

                                        <input type="radio" id="star0" name="rating" value="2" />
                                        <label class="full" for="star0" title="Pretty good - 2 stars"></label>

                                        <input type="radio" id="star6" name="rating" value="3" />
                                        <label class="full" for="star6" title="Meh - 3 stars"></label>

                                        <input type="radio" id="star7" name="rating" value="4" />
                                        <label class="full" for="star7" title="Kinda bad - 4 stars"></label>

                                        <input type="radio" id="star8" name="rating" value="5" />
                                        <label class="full" for="star8" title="Sucks big time - 5 star"></label>
                                    </div>

                                </div>
                                <div class="hd_cspointer hd-align-center tl_taikhoandanhgia">
                                    <p class="texttl_tkdanhgia text_danhgia color-blk">Đánh giá dài trông sẽ như thế này
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at felis vel
                                        sapien maximus tristique. Nam felis elit, aliquam eget est vitae, scelerisque
                                        tincidunt lectus. Aliquam varius vitae massa tristique dictum. Pellentesque sit
                                        amet nibh vitae quam tincidunt iaculis. Sed non sem id felis sagittis placerat
                                    </p>
                                    <div class="a_chinhsua_tkdanhgia hd-align-center d_flex">
                                        <div class="b_chinhsua_tkdanhgia">
                                        </div>
                                        <div class="c_chinhsua_tkdanhgia">
                                            <div class="d_flex hd-align-center d_chinhsua_tkdanhgia">
                                                <img src="../images/anh_moi/anh040.png" alt="" class="img_anh_danhgia">
                                                <p class="name_rate color_text">26sonlachaoaenha</p>
                                                <p class="chinhsua_tkdanhgia font-12 font-bold">Chỉnh sửa<span
                                                        class="time_rate">3 ngày trước</span></p>
                                            </div>
                                            <p class="texttl_tkdanhgia1 text_aj color-blk">Đánh giá dài trông sẽ như thế
                                                này Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus at
                                                felis vel sapien maximus tristique. Nam felis elit, aliquam eget est
                                                vitae, scelerisque tincidunt lectus. Aliquam varius vitae m</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="khoilon_danhgia">
                                <div class="khoi_cmt_danhgia">
                                    <div class="d_flex img_cmt_danhgia">
                                        <img src="../images/anh_moi/anh040.png" alt="" class="img_anh_danhgia">
                                        <p class="name_rate color_text">26sonlachaoaenha <span class="time_rate">15 giờ
                                                trước</span>
                                        </p>
                                    </div>
                                    <div id="rating_1">
                                        <input type="radio" id="star9" name="rating" value="1" />
                                        <label class="full" for="star9" title="Awesome - 1 stars"></label>

                                        <input type="radio" id="star0" name="rating" value="2" />
                                        <label class="full" for="star0" title="Pretty good - 2 stars"></label>

                                        <input type="radio" id="star6" name="rating" value="3" />
                                        <label class="full" for="star6" title="Meh - 3 stars"></label>

                                        <input type="radio" id="star7" name="rating" value="4" />
                                        <label class="full" for="star7" title="Kinda bad - 4 stars"></label>

                                        <input type="radio" id="star8" name="rating" value="5" />
                                        <label class="full" for="star8" title="Sucks big time - 5 star"></label>
                                    </div>

                                </div>
                                <div class="hd_cspointer d_flex hd-align-center tl_taikhoandanhgia">
                                    <button type="button" class="tl_tkdanhgia hd_cspointer font-bold font-14-16">Trả
                                        lời</button>
                                    <div class="danhgia_hscn2">
                                        <div class="d_flex hd-align-center phanhoikh">
                                            <div class="bg_vang k_anh_chung">
                                                <img src="../images/anh_moi/edit_rate.png" alt="">
                                            </div>
                                            <div class="color_vang ghichu">Phản hồi với khách hàng</div>
                                            <div class="nut_cancel hd_cspointer">
                                                <img src="../images/anh_moi/anh020.png" alt="anh020"
                                                    class="nut_cancel_anh" style="background: #F26222;">
                                            </div>
                                        </div>
                                        <div class="o-phanhoikh">
                                            <p class="font-dam hd_font15-17">Nội dung phản hồi<span
                                                    class="color_red p5">*</span></p>
                                            <textarea class="text-phan-hoi form-control" placeholder="Nhập nội dung"
                                                name="noidung_phanhoi"></textarea>
                                        </div>
                                        <div class="btn-phan-hoi-kh d_flex">
                                            <button type="button" class="btn-gui-ph hd_cspointer font-bold">Gửi
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="khoi_vietdanhgia d_none">
                    <div class="khoicon_danhgia">
                        <div class="d_flex hd-align-center">
                            <div class="bg_vang bg_chung">
                                <img src="../images/anh_moi/star.png" alt="">
                            </div>
                            <div class="color_vang gioithieu font-24-28">Đánh giá tài khoản</div>
                        </div>
                        <p class="font-bold color_999 font-24-28 chua_tk_danhgia">Tài khoản này chưa có đánh giá nào</p>

                    </div>
                </div>

                <div class="khoi_vietdanhgia">
                    <div class="khoicon_danhgia_b">
                        <div class="d_flex hd-align-center mb20">
                            <div class="bg_vang bg_chung">
                                <img src="../images/anh_moi/edit_rate.png" alt="">
                            </div>
                            <div class="color_vang gioithieu font-24-28">Viết đánh giá</div>
                        </div>
                        <div class="d_flex j_between">
                            <div class="row-tin-dang khoitraidanhgia">
                                <p class="font-dam hd_font15-17">Nội dung đánh giá <span class="color_red">*</span></p>
                                <textarea class="texa-mo-ta" placeholder="Nhập mô tả" name="mota"></textarea>
                            </div>
                            <div class="khoiphai_danhgiasao">
                                <div id="rating_2">
                                    <input type="radio" id="star11" name="rating" value="1" />
                                    <label class="full" for="star11" title="Awesome - 1 stars"></label>

                                    <input type="radio" id="star12" name="rating" value="2" />
                                    <label class="full" for="star12" title="Pretty good - 2 stars"></label>

                                    <input type="radio" id="star13" name="rating" value="3" />
                                    <label class="full" for="star13" title="Meh - 3 stars"></label>

                                    <input type="radio" id="star14" name="rating" value="4" />
                                    <label class="full" for="star14" title="Kinda bad - 4 stars"></label>

                                    <input type="radio" id="star15" name="rating" value="5" />
                                    <label class="full" for="star15" title="Sucks big time - 5 star"></label>
                                </div>
                                <div class="d_flex j_between item_end khoitong_nhapma">
                                    <div class="khoinhapma">
                                        <p class="font-dam hd_font15-17">Mã xác nhận <span class="color_red">*</span>
                                        </p>
                                        <input type="text" name="ma_xacnhan" placeholder="Mã xác nhận"
                                            class="ma_xac_nhan">
                                    </div>
                                    <div class=" khoicapcha d_flex hd-align-center">

                                        <p class=" b_radius_5 background-none show_macapcha">93254 </p>
                                        <div style="transform: rotate(7560deg); transition: all 0.3s ease 0s;">
                                            <img src="../images/hd-refresh-captcha.svg" alt="tải lại mã captch"
                                                class="hd_cspointer xoay360 xoay361">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d_flex j_end">
                            <button class="btn_guidanhgia" name="submit" type="button">Gửi đánh giá</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>

    <?
    include '../includes/inc_new/inc_footer.php';
    ?>
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/style_new/select2.min.js"></script>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
</body>

</html>
<script>
$('#city_search ,#cate_search').select2();

$('.arrow_show_768').click(function() {
    $(this).toggleClass('rotate');
    $('.menu_hoso_768').toggle(500);
})
</script>
<script>
function calcRate(r) {
    const f = ~~r, //Tương tự Math.floor(r)
        id = 'star' + f + (r % f ? 'half' : '')
    id && (document.getElementById(id).checked = !0)
}
$(document).ready(function() {
    var do_xuay = 0;

    $(".xoay360").click(function() {
        do_xuay += 360;
        xoay($(this), do_xuay);
    })

    function xoay(img, deg) {
        $('.xoay360').css("transform", "rotate(" + deg + "deg)");
        $('.xoay360').css("transition", "0.2s");
    }

    function ramdumso(length) {
        var result = '';
        var characters = '0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }
    $(".show_macapcha").html(ramdumso(5));
    $(".xoay360").click(function() {
        $(".show_macapcha").html(ramdumso(5));
    })

});

$(".tl_tkdanhgia").click(function() {
    $('.tl_tkdanhgia').hide();
    $(this).parent('.tl_taikhoandanhgia').find('.danhgia_hscn2').show();
});

$(".nut_cancel").click(function() {
    $('.danhgia_hscn2').hide();
    // $(this).parent().find('.danhgia_hscn2').hide();
    $(this).parents().find('.tl_tkdanhgia').show();
});

$(".form-control").click(function() {
    $(".o-phanhoikh").removeClass("active");
    $(this).parents(".o-phanhoikh").addClass("active");
});
var form_control = $(".form-control");

$(window).click(function(e) {
    if (!form_control.is(e.target)) {
        $(".o-phanhoikh").removeClass("active");
    }
});
$('.icon_link_375').click(function(){
    $('.them_div_bao_ngoai1').toggleClass('hide_375');
})
</script>