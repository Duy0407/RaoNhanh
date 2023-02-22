<?
include("../includes/inc_new/icon.php");
include("config.php");

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $usc_id = $_COOKIE['UID'];
    $usc_type = $_COOKIE['UT'];

    $user = new db_query("SELECT `usc_name`, `usc_email`, `usc_address`, `usc_phone` FROM `user` WHERE `usc_id` = $usc_id AND `usc_type` = $usc_type");
    $user_result = mysql_fetch_assoc($user->result);
    $user_name = $user_result['usc_name'];
    $user_email = $user_result['usc_email'];
    $user_address = $user_result['usc_address'];
    $user_phone = $user_result['usc_phone'];
}else{
    $usc_type = 0;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow" /> 
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    
    <link type="text/css" href="/css/style_new/footer.css?v=<?= $version ?>" rel="stylesheet">
    <link type="text/css" href="/css/style_new/giai_dap.css?v=<?= $version ?>" rel="stylesheet">
    <link type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" rel="stylesheet">
    <title>Liên Hệ</title>

</head>

<body>
    <?

    //----------------
    include("../includes/common/inc_header.php");
    include("../classes/Mobile_Detect.php");
    ?>

    <section>
        <div class="ctn_wapper w_100 fl_left">
            <div class="ctn_banner w_100 fl_left">
                <div class="ctn_noidung_bn tex_center w_100 fl_left">
                    <h1 class="sh_clr_one cr_weight w_100 fl_left tieu_de tieu_de_lh tieu_de_df">LIÊN HỆ VỚI CHÚNG TÔI</h1>
                </div>
            </div>
            <div class="ctn_content w_100 fl_left">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe content_lienhe_lhct w_100 fl_left ">
                        <div class="lienhe_gthieu w_100 fl_left">
                            <h4 class="sh_clr_two w_100 fl_left lh_ten_cty tex_center">Công ty cổ phần thanh toán Hưng Hà</h4>
                            <div class="lienhe_cty w_100">
                                <div class="web_lhe tt_lienhe tex_center hide_375">
                                    <p class="avt_lhe_email"><img src="/images/anh_moi/exp_email1.png" alt="email"></p>
                                    <p class="thongtin_lhe thongtin_lhe_df sh_clr_two sh_size_four">Info@24hpay.vn</p>
                                </div>
                                <div class="diachi_lhe tt_lienhe tex_center hide_375">
                                    <p class="avt_lhe_dchi"><img src="/images/anh_moi/exp_diachi1.svg" alt="dia chi"></p>
                                    <p class="thongtin_lhe thongtin_lhe_df sh_clr_two sh_size_four">Tầng 2, Số 1 đường Trần Nguyên Đán, KĐT Định Công, Hoàng Mai, Hà Nội</p>
                                </div>
                                <div class="sdthoai_lhe tt_lienhe tex_center hide_375">
                                    <p class="avt_lhe_sdt"><img src="/images/anh_moi/exp_phone1.svg" alt="so dien thoai"></p>
                                    <p class="thongtin_lhe thongtin_lhe_df sh_clr_two sh_size_four">1900633682</p>
                                </div>

                                <div class="diachi_lhe diachi_lhe_375 tt_lienhe tex_center show_375">
                                    <p class="avt_lhe_dchi svg26"><img src="/images/anh_moi/diachi_svg26.svg" alt="dia chi"></p>
                                    <p class="thongtin_lhe thongtin_lhe_df sh_clr_two sh_size_four">Tầng 2, Số 1 đường Trần Nguyên Đán, KĐT Định Công, Hoàng Mai, Hà Nội</p>
                                </div>
                                <div class="web_lhe tt_lienhe tex_center show_375">
                                    <p class="avt_lhe_email svg26"><img src="/images/anh_moi/sms.svg" alt="email"></p>
                                    <p class="thongtin_lhe thongtin_lhe_df sh_clr_two sh_size_four">Info@24hpay.vn</p>
                                </div>
                                <div class="sdthoai_lhe tt_lienhe tex_center show_375">
                                    <p class="avt_lhe_sdt svg26"><img src="/images/anh_moi/phone_svg26.svg" alt="so dien thoai"></p>
                                    <p class="thongtin_lhe thongtin_lhe_df sh_clr_two sh_size_four">1900633682</p>
                                </div>

                            </div>
                        </div>
                        <div class="lienhe_cauhoi lienhe_cauhoi_df lienhe_cauhoi_df_375 w_100 fl_left sh_bgr_one">
                            <form class="dat_cau_hoi w_100" id="lien_he" data="<?= $usc_id ?>" data1="<?= $usc_type ?>">
                                <div class="dcau_hoi dcau_hoi_df w_100">
                                    <div class="cauhoi_trai dat_cauh">
                                        <div class="form-group w_100 fl_left box_input_infor">
                                            <label class="sh_clr_two mb_10 w_100 fl_left sh_size_one">Họ và tên <span class="sh_clr_three">*</span></label>
                                            <span class="avt_icon_lh"><?= $exp_user ?></span>
                                            <input type="text" name="ho_ten" autocomplete="off" class=" form-control sh_size_five w_100 fl_left" placeholder="Họ và tên" value="<?=$user_name?>">
                                        </div>
                                        <div class="form-group w_100 fl_left box_input_infor">
                                            <label class="sh_clr_two mb_10 w_100 fl_left sh_size_one">Địa chỉ <span class="sh_clr_three">*</span></label>
                                            <span class="avt_icon_lh"><?= $exp_address ?></span>
                                            <input type="text" name="dia_chi" autocomplete="off" class="form-control sh_size_five w_100 fl_left" placeholder="Địa chỉ liên hệ" value="<?=$user_address?>">
                                        </div>
                                        <div class="form-group w_100 fl_left box_input_infor">
                                            <label class="sh_clr_two mb_10 w_100 fl_left sh_size_one">Điện thoại <span class="sh_clr_three">*</span></label>
                                            <span class="avt_icon_lh"><?= $exp_phone ?></span>
                                            <input type="text" name="dien_thoai" autocomplete="off" class="form-control sh_size_five w_100 fl_left" placeholder="Điện thoại liên hệ" value="<?=$user_phone?>">
                                        </div>
                                        <div class="form-group w_100 fl_left box_input_infor">
                                            <label class="sh_clr_two mb_10 w_100 fl_left sh_size_one">Email <span class="sh_clr_three">*</span></label>
                                            <span class="avt_icon_lh"><?= $exp_email ?></span>
                                            <input type="text" name="email_lh" autocomplete="off" class="form-control sh_size_five w_100 fl_left" placeholder="Email liên hệ" value="<?=$user_email?>">
                                        </div>
                                    </div>
                                    <div class="cauhoi_phai dat_cauh">
                                        <div class="form-group w_100 fl_left box_input_infor">
                                            <label class="sh_clr_two mb_10 w_100 fl_left sh_size_one">Nội dung <span class="sh_clr_three">*</span></label>
                                            <textarea class="form-control sh_size_five w_100 fl_left" autocomplete="off" placeholder="Nội dung góp ý" name="noi_dung"></textarea>
                                        </div>
                                    </div>
                                    <div class="them_div_moi">
                                        <div class="div_bao_capcha box_input_infor">
                                            <label class="tex_ma_capcha">Mã xác nhận <span class="sh_clr_three">*</span></label>
                                            <div class="div_input_capcha">
                                                <div class="div_input_capcha_2 form-group">
                                                    <input  type="number" id="captcha" name="ma_capcha" autocomplete="off" class="form-control click_border" placeholder="Mã xác nhận">
                                                </div>
                                                <div class="div_capcha_d">
                                                    <input readonly type="text" class="khung_capcha_d_df ma_dcap_2">
                                                    <div class="khung_capcha_img">
                                                        <img src="images/anh_moi/ma_capcha.svg" class="xoay360">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="form_butt w_100 fl_left tex_center">
                                    <button type="button" class="luu_cauhoi sh_border_rdu_two sh_cursor sh_clr_one sh_size_four sh_size_four_last">
                                        <span class="avt_icon_butt"></span> Gửi phản hồi
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?
    include '../includes/inc_new/inc_footer.php';
    ?>

</body>
<script type="text/javascript" src="../js/newJs/admin.main.js"></script>

<script type="text/javascript">

    $(".luu_cauhoi").click(function () {
    var lienhe = $("#lien_he");
    lienhe.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            ho_ten: "required",
            dia_chi: "required",
            dien_thoai: "required",
            email_lh: {
                required: true,
            },
            noi_dung: "required",
            ma_capcha: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            ho_ten: "Họ và tên không được để trống",
            dia_chi: "Địa chỉ không được để trống",
            dien_thoai: "Điện thoại không được để trống",
            email_lh: "Email không được để trống",
            noi_dung: "Không được để trống nội dung",
            ma_capcha: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (lienhe.valid() === true) {
        var usc_type = $('#lien_he').attr('data1');
        var ho_ten = $("input[name='ho_ten']").val();
        var dia_chi = $("input[name='dia_chi']").val();
        var dien_thoai = $("input[name='dien_thoai']").val();
        var email_lh = $("input[name='email_lh']").val();
        var noi_dung = $("textarea[name='noi_dung']").val();

        var fd = new FormData();
        fd.append('usc_type',usc_type);
        fd.append('ho_ten',ho_ten);
        fd.append('dia_chi',dia_chi);
        fd.append('dien_thoai',dien_thoai);
        fd.append('email_lh',email_lh);
        fd.append('noi_dung',noi_dung);

        $.ajax({
            type: 'POST',
            url: "../ajax/lien_he.php",
            data: fd,
            contentType: false,
            processData: false,
            success: function(data){
                if(data == ''){
                    window.location.reload() 
                }else{
                    console.log(data);
                }
            }
        })

        
    }
})




    $(".form-control").click(function() {
        $(".form-group").removeClass("active");
        $(this).parents(".form-group").addClass("active");
    });

    $('.click_border').click(function(){
        $(this).addClass('active_d')
    })

    $(window).click(function(e) {
        if (!$(".form-control").is(e.target)) {
            $(".form-group").removeClass("active");
        }
        if (!$(".click_border").is(e.target)) {
            $('.click_border').removeClass("active_d");
        }
        
    });

</script>

</html>