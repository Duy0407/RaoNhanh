<?
include 'config.php';
include('../includes/inc_new/icon.php');
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 5) {
        $ht_tt = new db_query("SELECT `usc_id`, `usc_logo`, `usc_anhbia`, `usc_name`, `usc_type`, `usc_phone`, `usc_money`, `usc_time`, `usc_city`, `usc_email`, `usc_address`,
                            `usc_gender`, `usc_birth_day`, `usc_cmt`, `usc_store_name`, `usc_store_phone`, `usc_website`, `usc_facename`, `usc_tax_code`,
                            `usc_store_license`, `usc_des` FROM `user` WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_birth_day = $kn_tt['usc_birth_day'];
        if ($usc_birth_day == 0) {
            $usc_birth_day = '';
        } else {
            $usc_birth_day = date('Y-m-d', $usc_birth_day);
        }
        $usc_email = $kn_tt['usc_email'];
        $usc_type = $kn_tt['usc_type'];
        $arr_type = array(1 => 'cá nhân', 5 => "doanh nghiệp");
        $usc_phone = $kn_tt['usc_phone'];
        $usc_address = $kn_tt['usc_address'];
        $usc_gender = $kn_tt['usc_gender'];
        $usc_money = $kn_tt['usc_money'];
        $usc_time = $kn_tt['usc_time'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
        $usc_cmt = $kn_tt['usc_cmt'];
        $usc_store_name = $kn_tt['usc_store_name'];
        $usc_website = $kn_tt['usc_website'];
        $usc_facename = $kn_tt['usc_facename'];
        $usc_tax_code = $kn_tt['usc_tax_code'];
        $usc_store_license = $kn_tt['usc_store_license'];
        $usc_city = $kn_tt['usc_city'];
        $usc_des = $kn_tt['usc_des'];
        $usc_logo = $kn_tt['usc_logo'];
        $usc_anhbia = $kn_tt['usc_anhbia'];
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
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Hồ sơ người bán doanh nghiệp - Chỉnh sửa thông tin</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="gianhang_container">
            <div class="d_flex j_between hs_df_1">
                <!-- <div class="tongkhoitrai">
                    <?php include "../includes/common/inc_container_box_left_dn.php" ?>
                </div> -->
                <?php include "../includes/common/inc_container_box_left_dn_new.php" ?>
                <div class="khoiphai_gh khoiphai_gh_df_tt bg_trang">
                    <div class="position_ral">

                        <div class="po1 hd_cspointer hd_cspointer_df_tt" data="<?= $usc_anhbia ?>"></div>

                        <div class="po2 hd_cspointer">
                            <div class="avatar_img_df_tt" data="<?= $usc_logo ?>"></div>
                        </div>
                    </div>
                    <div class=" khoi_chinhsua d_flex j_end">
                        <div class="khoiphaicon khoiphaicon_df_tt">
                            <form class="df_form" id="form_edit_tt" data="<?= $id_user ?>" data1="<?= $type_user ?>">
                                <div class="pt30 df_mt_tt">
                                    <div class="d_flex ">
                                        <h3 class="color_text tt_chu tt_chu_df_tt">Thông tin gian hàng</h3>
                                    </div>
                                    <div class="mb20 box_input_infor">
                                        <p class="font-dam hd_font15-17">Tên gian hàng <span class="color_red">*</span>
                                        </p>
                                        <input type="text" name="gian_hang" placeholder=" Tên gian hàng" class="input_text input_infor_tag error" value="<?= $usc_store_name; ?>">
                                    </div>
                                    <div class="mb20 box_input_infor">
                                        <p class="font-dam hd_font15-17">Số điện thoại</span>
                                        </p>
                                        <input type="number" name="sdt" placeholder="Nhập số điện thoại" class="input_text input_infor_tag error" readonly value="<?= $usc_phone; ?>">
                                    </div>
                                    <div class="mb20">
                                        <p class="font-dam hd_font15-17">Website gian hàng</p>
                                        <input type="text" name="website" placeholder=" Website" class="input_text" value="<?= $usc_website; ?>">
                                    </div>
                                    <div class="mb20">
                                        <p class="font-dam hd_font15-17">Facebook gian hàng</p>
                                        <input type="text" name="facebook" placeholder="Facebook" class="input_text" value="<?= $usc_facename; ?>">
                                    </div>
                                    <div class="box_input_infor box_input_infor_df_nay">
                                        <p class="font-dam hd_font15-17">Tỉnh thành <span class="color_red">*</span></p>
                                        <select class="slect-chitiet_dm hd_height36 tinh_thanh" style="width:100%" name="tinh_thanh">
                                            <option value="">Chọn tỉnh thành</option>
                                            <? foreach ($arrcity as $row) { ?>
                                                <option value="<?= $row['cit_id'] ?>" <?= ($row['cit_id'] == $usc_city) ? "selected" : "" ?>>
                                                    <?= $row['cit_name'] ?>
                                                </option>
                                            <? } ?>
                                        </select>
                                    </div>
                                    <div class="mb20 box_input_infor">
                                        <p class="font-dam hd_font15-17">Địa chỉ liên hệ <span class="color_red">*</span></p>
                                        <input type="text" name="address" placeholder="Nhập địa chỉ" class="input_text input_infor_tag error" value="<?= $usc_address; ?>">
                                    </div>
                                    <div class="mb20  position_ral box_input_infor">
                                        <p class="font-dam hd_font15-17">Giấy phép kinh doanh / Căn cước công dân</p>
                                        <div class="upload_giayto input_infor_tag error">
                                            <div class="up_file">
                                                <span class="name_img d_flex">
                                                    <? if ($usc_store_license != "") { ?>
                                                        <div class="box_img box_img_fgc" data="<?= $usc_store_license ?>">
                                                            <span><?= $usc_store_license  ?></span>
                                                            <span class="anhxoa_filecc" onclick="xoa_file_fgc(this)">
                                                                <img src="/images/hd_delete_icon.svg" />
                                                            </span>
                                                        </div>
                                                    <? } ?>
                                                </span>
                                            </div>
                                            <label for="upload_file" class="label_input">Chọn file
                                                <input id="upload_file" type="file" name="giayphep" placeholder="Nhập địa chỉ" class="input_file" onchange="getFileName(this)">
                                            </label>
                                        </div>
                                        <span class="avt_error"></span>
                                    </div>
                                    <div class="mb20">
                                        <p class="font-dam hd_font15-17">Mã số thuế</p>
                                        <input type="text" name="ma_thue" placeholder="Nhập mã số thuế" class="input_text" value="<?= $usc_tax_code; ?>">
                                    </div>
                                    <div class="box_input_infor">
                                        <p class="font-dam hd_font15-17">Mô tả <span class="color_red">*</span></p>
                                        <textarea class="texa-mo-ta input_infor_tag error" placeholder="Nhập mô tả" name="mota" id="mota"><?= $usc_des ?></textarea>
                                        <div class="d_flex j_end">
                                            <p class="nhaptext">Đã nhập <span class="soluong_text">0</span>/1500 ký tự</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="d_flex j_end khoibtn_sub">
                                    <button type="button" class="btn_sub sub_huy_df">Hủy</button>
                                    <button type="button" class="btn_sub sub_luu" id="click_luu">Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="hd_modal_rn hd_modal_tindang ">
            <div class="hd_content_tb my_style hd_content_curspoint font-16 liheght-18">
                <div class="hd_modal_header hd-disflex hd-align-center">
                    <p class="modal_p_header font-16 liheght-18 hd-clor-white">Hủy chỉnh sửa</p>
                    <div class="tat-dang-tin-md hd_cspointer">
                        <img src="../images/hd-x-icon.svg" alt="tắt đang tin danh mục" />
                    </div>
                </div>
                <div class="mt_30">
                    <p class="noidung_tbban text_center">Bạn có chắc chắn muốn hủy chỉnh sửa thông tin?</p>
                </div>
                <div class="d_flex j_eve">
                    <button class="btn_popup btn_huy">Hủy</button>
                    <button class="btn_popup btn_dongy" onclick="window.location.href = '/ho-so-gian-hang-cua-toi-trang-chu.html'">Đồng ý</button>
                </div>

            </div>
        </div>
        <div class="hd_modal_rn  modal_tbthanhcong show_tb_success">
            <div class="hd_content_tb my_style1 hd_content_curspoint font-16 liheght-18">
                <div class="img_tick">
                    <img src="../images/anh_moi/icon_tbao_tc.png" alt="">
                </div>
                <div>
                    <p class="noidung_tbban text_center">Bạn đã chỉnh sửa thông tin thành công!</p>
                </div>
                <div class="d_flex j_eve">
                    <button class=" btn_dong_y" onclick="window.location.href = '/ho-so-gian-hang-cua-toi-trang-chu.html'">Đóng</button>
                </div>
            </div>
        </div>
    </section>
    <? include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="../js/style_new/update_banner.js"></script>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>
</body>

</html>
<script>
    $(".sub_huy_df").click(function() {
        $(".hd_modal_tindang").show();
    });
    // Ảnh Bìa
    var user_anhbia = $('.hd_cspointer_df_tt').attr("data");
    if (user_anhbia != '') {
        img_anhbia = user_anhbia;
    } else {
        img_anhbia = "../images/anh_moi/banner.png";
    }
    $('.hd_cspointer_df_tt').append('<img src="' + img_anhbia +
        '" alt="" class="cover_img imgcs_tt cover_img_df_tt banner_duocthay" onerror="this.src=`/images/anh_moi/banner.png`"><div class="chinhsuatt_img_df_tt_big"><div class="chinhsuatt_img chinhsuatt_img_df_tt"><img src="../images/anh_moi/thay_anh_tt.svg" alt="" class="chon_dethay"  onclick="thay_banner()"></div><input type="file" class="ip_file click_chon_img" onchange="loadFile2()"></div>'
    );

    function thay_banner() {
        $(".click_chon_img").click();
    }

    function loadFile2() {
        var match = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG"];
        var file_data2 = $('.click_chon_img').prop('files')[0];
        var type2 = file_data2.type;
        if ($.inArray(type2, match) == -1) {
            alert("Ảnh Lỗi");
        } else {
            var usc_id = <?= $id_user ?>;
            var type_user = <?= $type_user ?>;
            var fd_d = new FormData();
            fd_d.append('user_id', usc_id);
            fd_d.append('user_type', type_user);
            fd_d.append('files', file_data2);
            $.ajax({
                type: 'POST',
                url: "/ajax/anhbia_user.php",
                data: fd_d,
                contentType: false,
                processData: false,
                success: function(data) {
                    window.location.reload();
                }
            });
        }
    }

    // -------------------------------------------------
    var user_logo = $('.avatar_img_df_tt').attr("data");
    if (user_logo == '') {
        var img_us = "/images/anh_moi/anh_nen.jpg";
    } else {
        var img_us = user_logo;
    }
    $(".avatar_img_df_tt").append('<div class="avatar_img_df_tt_con"><img src="' + img_us +
        '" alt="" class="thay_avatar" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`"></div><div class="df_anhdaidien_tt_big"><div class="df_anhdaidien_tt"><img src="../images/anh_moi/thay_anh_tt.svg" alt="" class="chon_thay_avatar" onclick="check_vt()"></div><input type="file" class="ip_file file_chon" onchange="loadFile()"></div>'
    );

    function check_vt() {
        $(".file_chon").click();
    }

    function loadFile() {
        var match = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG"];
        var file_data = $('.file_chon').prop('files')[0];

        var type = file_data.type;
        if ($.inArray(type, match) == -1) {
            alert("kho")
        } else {
            var usc_id = <?= $id_user ?>;
            var type_user = <?= $type_user ?>;
            var fd = new FormData();

            fd.append('user_id', usc_id);
            fd.append('user_type', type_user);
            fd.append('files', file_data);

            $.ajax({
                type: 'POST',
                url: "../ajax/update_img.php",
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    window.location.reload();
                }
            });
        }

    }

    $(document).on('keyup', '#mota', function() {
        var text = $(this).val();
        $('.soluong_text').html(text.length);
    });

    $(document).on('click', '.btn_huy', function() {
        $('.hd_modal_tindang').fadeOut(500);
    });

    $(document).on('click', '.btn_dong_y', function() {
        $('.modal_tbthanhcong').fadeOut(500);
        $('.hd_modal_tindang').fadeOut(500);
    });

    $('.sub_huy').click(function() {
        window.location.href = "ho-so-gian-hang-cua-toi-trang-chu.html";
    });

    $('.show_menu_768').click(function() {
        $(this).toggleClass('rotate_768');
        $('.hs_768_df3').toggleClass('box_sd_menu');
        $('.them_cl_new').toggle(500);
    });

    // DÙNG CHO MÔ TẢ
    var maxLimit = 1500;
    $('#mota').keyup(function() {
        var lengthCount = this.value.length;
        if (lengthCount > maxLimit) {
            this.value = this.value.substring(0, maxLimit);
            var charactersLeft = maxLimit - lengthCount + 1;
        } else {
            var charactersLeft = maxLimit - lengthCount;
        }
        $('.soluong_text').text(charactersLeft + ' Characters left');
    });

    function getFileName(filename) {
        var file_avt = $(filename).prop('files')[0];
        if (file_avt == undefined) {
            $(filename).val('');
            $('.name_img').html('');
            $('.name_img').attr('data', '');
        } else {
            var file_name = file_avt.name;
            var file_type = file_avt.type;
            var file_size = file_avt.size;
            file_size = (file_size / 1024 / 1024).toFixed(2);
            var match = ['image/png', 'image/jpg', 'image/jpeg', 'application/pdf'];
            if ($.inArray(file_type, match) == -1) {
                alert("Vui lòng chọn file định đạng : JPG, JPEG, PNG, PDF");
                $(filename).val('');
                $('.name_img').html('');
                $('.name_img').attr('data', '');
            } else {
                if (file_size <= 1) {
                    var html = '<div class ="box_img box_img_fgc" data=""> <span>' + file_name + '</span><span class="anhxoa_filecc" onclick="xoa_file_fgc(this)"><img src="../images/hd_delete_icon.svg" /></span></div>';
                    $('.name_img').html(html);
                    $('.name_img').attr('data', '');
                } else {
                    alert("Dung lượng ảnh tối đa 1MB");
                    $(filename).val('');
                    $('.name_img').html('');
                    $('.name_img').attr('data', '');
                }
            }
        }
    }

    function xoa_file_fgc(el) {
        $(el).parents(".box_img_fgc").remove();
        $("#upload_file").val('');
        $('.name_img').attr("data", '');
    }

    $('#click_luu').click(function() {
        var form_edit_tt = $("#form_edit_tt");
        form_edit_tt.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                gian_hang: "required",
                tinhthanh: "required",
                address: "required",
                mota: {
                    required: true,
                    minlength: 10,
                    maxlength: 1500,
                },
            },
            messages: {
                gian_hang: "Vui lòng tên gian hàng",
                tinhthanh: "Vui lòng chọn tỉnh thành",
                address: "Vui lòng nhập địa chỉ liên hệ",
                mota: {
                    required: "Vui lòng nhập mô tả",
                    minlength: "Nhập mô tả phải nhiều hơn 10 ký tự",
                    maxlength: "Nhập mô tả ít hơn 1500 ký tự",
                },
            },

        });
        if (form_edit_tt.valid() === true) {
            var user_id = $("#form_edit_tt").attr("data");
            var user_type = $("#form_edit_tt").attr("data1");

            var ma_thue = $("input[name='ma_thue']").val();
            var gian_hang = $("input[name='gian_hang']").val();
            var website = $("input[name='website']").val();
            var facebook = $("input[name='facebook']").val();
            var tinh_thanh = $("select[name='tinh_thanh']").val();
            var address = $("input[name='address']").val();
            var mota = $("#mota").val();
            var anh_cu = $(".name_img").attr("data");

            var fd = new FormData();
            fd.append('user_id', user_id);
            fd.append('user_type', user_type);
            fd.append('ma_thue', ma_thue);
            fd.append('gian_hang', gian_hang);
            fd.append('website', website);
            fd.append('facebook', facebook);
            fd.append('tinh_thanh', tinh_thanh);
            fd.append('address', address);
            fd.append('mota', mota);
            fd.append('anh_cu', anh_cu);

            var file_data = $('#upload_file').prop('files')[0];
            fd.append('files', file_data);

            $.ajax({
                type: "POST",
                url: "/ajax/chinhsua_tt_doanhnghiep.php",
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == "") {
                        $('.show_tb_success').show();
                    } else {
                        alert(data);
                    }
                }
            })
        }
    })
</script>