<?php
include('../includes/inc_new/icon.php');
include 'config.php';
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 2) {
        // $dm = new db_query("SELECT ")
        $ht_tt = new db_query("SELECT `usc_id`,`usc_name`,`usc_type`,`usc_logo`,`usc_phone`,`usc_money`,`usc_time`,`usc_city`,`usc_category`,`usc_email`,`usc_address`,`usc_gender`,`usc_birth_day`,`usc_category`,`usc_cate_id` FROM `user` WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_time = $kn_tt['usc_time'];
        $usc_money = $kn_tt['usc_money'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
        $usc_email = $kn_tt['usc_email'];
        $usc_type = $kn_tt['usc_type'];
        $arr_type = array(1 => 'người Bán', 2 => 'người mua', 3 => "doanh nghiệp");
        $usc_phone = $kn_tt['usc_phone'];
        $usc_address = $kn_tt['usc_address'];
        $usc_gender = $kn_tt['usc_gender'];
        $usc_birth_day = $kn_tt['usc_birth_day'];
        if ($usc_birth_day == 0) {
            $usc_birth_day = '';
        } else {
            $usc_birth_day = date('Y-m-d', $usc_birth_day);
        }
        $usc_cmt = $kn_tt['usc_cmt'];
        $usc_city = $kn_tt['usc_city'];
        $usc_category = $kn_tt['usc_category'];
        $usc_category = explode(",", $usc_category);

        $usc_cate_id = $kn_tt['usc_cate_id'];
        $usc_cate_id = explode(",", $usc_cate_id);

        $usc_logo = $kn_tt['usc_logo'];
        $today =  date('Y-m-d', time());
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
    <title>Chỉnh sửa thông tin tài khoản</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?$ver=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?$ver=<?= $version ?>">

</head>

<body>
    <?php include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="chinhsua-container hd-disflex chinhsua_ttin_account">
            <div class="cs-col-left">
                <div class="cs-header-right hd-disflex">
                    <div class="img-left-tt">
                        <div class="avatar-img-left hd_cspointer df3">
                            <? if ($usc_logo != '') { ?>
                                <img src="/pictures/avt_dangtin/<?= $usc_logo ?>" class="avatar-img-left-tt" alt="anh">
                            <? } else { ?>
                                <img src="/images/anh_moi/anh004.png" class="avatar-img-left-tt" alt="anh">
                            <? } ?>
                        </div>
                    </div>
                    <div class="name">
                        <div class="name_left_375">
                            <p class="font-16-1875 color-blk font-bold"><?= $usc_name; ?></p>
                            <div class="edit_detail_account">
                                <p class="font-13-1523 font-dam">Tài khoản <?= $arr_type[$usc_type]; ?></p>
                                <p class="font-13-1523 font-dam">Tham gia: <span><?= $usc_time; ?></span></p>
                            </div>
                        </div>
                        <div class="name_right_375" onclick="edit_list(this)">
                            <img src="/images/icon/arrow-down.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="list_danhmuc list_danhmuc-hidden">
                    <? include('../includes/inc_new/sidebar_nguoimua.php') ?>
                </div>
            </div>
            <div class="cs-col-right">
                <div class="cs-header hd-disflex hd-align-center">
                    <div class="box-cs hd-disflex align_c">
                        <div class="icf-box-cs">
                            <img src="/images/icon/avt_edit.svg" alt="">
                        </div>
                        <p class="font-24-2813 font-dam">Chỉnh sửa thông tin tài khoản</p>
                    </div>
                </div>
                <div class="cs-content hd-disflex edit_content_acc_right">
                    <div class="cs-content-left">
                        <div class="avatar-cs hd_cspointer">
                            <div class="lammo-anh lammo_anh" data="<?= $usc_logo ?>">
                                <!-- <label for="upload_edit_avt" class="lammo_anh-hover" style="cursor: pointer;">
                                    <img src="/images/anh_moi/anh010.png" class="avarta-img-cs" alt="anh" onclick="click_file()">
                                    <img src="/images/anh_moi/anh011.png" class="avarta-img-cs2" alt="anh2" onclick="click_file()">
                                    <input type="file" id="file_input" class="hidden" onchange="loadFile()">
                                </label> -->
                            </div>
                        </div>
                    </div>
                    <div class="cs-content-right">
                        <form class="form-cs dl_nguoimua" id="dl_nguoimua" data="<?= $id_user ?>" data1="<?= $type_user ?>">
                            <div class="row-cs box_input_infor">
                                <p class="font-bold color-blk hd_font15-18">Họ và tên <span class="color_red">*</span>
                                </p>
                                <input type="text" name="tieu_de" placeholder="Họ và tên" class="form-control" value="<?= $usc_name; ?>">
                            </div>
                            <div class="nhom-cs df_lh_dl">
                                <div class="row-cs lay_ngayht" data="<?= $today; ?>">
                                    <p class="font-bold color-blk hd_font15-18">Ngày sinh</p>
                                    <input type="date" name="ngay_sinh" value="<?= $usc_birth_day; ?>" class="not_today">
                                </div>
                                <div class="row-cs">
                                    <p class="font-bold color-blk hd_font15-18">Giới tính</p>
                                    <select class="slect-gioi-tinh hd_height36" name="gioi_tinh">
                                        <option value="">Giới tính</option>
                                        <option value="0" <?= ($usc_gender == 0) ? "selected" : ""; ?>>Nam</option>
                                        <option value="1" <?= ($usc_gender == 1) ? "selected" : ""; ?>>Nữ</option>
                                        <option value="2" <?= ($usc_gender == 2) ? "selected" : ""; ?>>Khác</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row-cs box_input_infor">
                                <p class="font-bold color-blk hd_font15-18">Số điện thoại</p>
                                <input readonly type="text" name="sdt" placeholder="Số điện thoại" class="form-control" value="<?= $usc_phone ?>">
                            </div>
                            <div class="row-cs df_lh_dl box_input_infor">
                                <p class="font-bold color-blk hd_font15-18">Tỉnh thành<span class="color_red">*</span> </p>
                                <select class="slect-tinh-thanh hd_height36" name="tinh_thanh">
                                    <option value="">Chọn tỉnh thành</option>
                                    <? foreach ($arrcity as $row) { ?>
                                        <option value="<?= $row['cit_id'] ?>" <?= ($row['cit_id'] == $usc_city) ? "selected" : "" ?>><?= $row['cit_name'] ?>
                                        </option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="row-cs box_input_infor">
                                <p class="font-bold color-blk hd_font15-18">Địa chỉ liên hệ <span class="color_red">*</span></p>
                                <input type="text" name="dia_chi" placeholder="Nhập địa chỉ" class="form-control" autocomplete="off" value="<?= $usc_address ?>">
                            </div>
                            <div class="row-cs df_lh_dl color box_input_infor">
                                <p class="font-bold color-blk hd_font15-18">Danh mục sản phẩm<span class="color_red">*</span></p>
                                <select id="list_product" name="list_product[]" class="input_form " multiple>
                                    <? foreach ($db_cat1 as $category) { ?>
                                        <option value="<?= $category['cat_id'] ?>" <?= (in_array($category['cat_id'], $usc_category)) ? "selected" : "" ?>><?= $category['cat_name'] ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="row-cs df_lh_dl color box_input_infor">
                                <p class="font-bold color-blk hd_font15-18">Loại sản phẩm</p>
                                <select id="loai_sp" class="slect-tinh-thanh hd_height36" name="l_sanpham[]" multiple>
                                    <option value="">Chọn loại sản phẩm</option>
                                    <? foreach ($db_cat as $category) { ?>
                                        <option value="<?= $category['cat_id'] ?>" <?= (in_array($category['cat_id'], $usc_cate_id)) ? "selected" : "" ?>><?= $category['cat_name'] ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="row-cs cont-btn-sb hd-disflex hide-480-mobile">
                                <button type="button" class="btn-submit td-huy hd_cspointer font-bold">Hủy</button>
                                <button type="button" class="btn-submit td-luu hd_cspointer font-bold" id="btn_submit_d">Lưu</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
        </div>
    </section>

    <div class="modal share_modal tbao_tcong_d">
        <div class="modal-content">
            <div class="bgom_modal sh_bgr_one">
                <div class="modal-body">
                    <div class="form_body tex_center">
                        <div class="avt_tbao_tc">
                            <img src="../images/anh_moi/icon_tbao_tc.png" />
                        </div>
                        <p class="sh_size_two sh_clr_two cau_tbao">Bạn đã chỉnh sửa thông tin thành công!</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="luu_chung cr_weight sh_cursor sh_clr_one sh_size_three butt_ctn sh_bgr_two sh_border_rdu" onclick="window.location.href = '/nguoi-mua-thong-tin-tai-khoan.html';">
                        Đồng ý</p>
                </div>
            </div>
        </div>
    </div>

    <?php
    include '../includes/inc_new/inc_footer.php';
    ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <!-- <script type="text/javascript" src="../js/style_new/js_quang.js"></script> -->
</body>

</html>
<script>
    $('.not_today').change(function() {
        var today = $('.lay_ngayht').attr('data');
        var showngay = $(this).val();
        if (showngay > today) {
            alert('Ngày sinh không hợp lệ');
        }
    });

    $('#list_product').select2({
        width: '100%',
        placeholder: "Chọn danh mục sản phẩm",
        maximumSelectionLength: 5,
    });

    var user_logo = $(".lammo_anh").attr("data");
    if (user_logo == '') {
        var img_md = "/images/anh_moi/anh010.png";
    } else {
        var img_md = "/pictures/avt_dangtin/" + user_logo;
    }

    $('.lammo_anh').append(
        '<label for="upload_edit_avt" class="lammo_anh-hover" style="cursor: pointer;"><img src="' + img_md + '" class="avarta-img-cs" alt="anh" onclick="click_file()"> <img src="/images/anh_moi/anh011.png" class="avarta-img-cs2" alt="anh2" onclick="click_file()"><input type="file" class="hidden file_input" onchange="loadFile()"></label>'
    )

    function click_file() {
        $('.file_input').click();
    }

    function loadFile() {
        var match = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG"];
        var file_data = $('.file_input').prop('files')[0];

        var type = file_data.type;
        if ($.inArray(type, match) == -1) {
            alert('ảnh không đúng định dạng')
        } else {
            var usc_id = <?= $id_user ?>;
            var type_user = <?= $type_user ?>;

            var fd = new FormData();
            fd.append('user_id', usc_id);
            fd.append('user_type', type_user);
            fd.append('files', file_data);

            $.ajax({
                type: 'POST',
                url: "../ajax/update_img_ngmua.php",
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    window.location.reload();
                }
            })

        }
    }

    $(".tl_tkdanhgia").click(function() {
        $(".danhgia_hscn2").show();
    });
    $(document).ready(function() {
        $('.slect-tinh-thanh').select2();
    });
    // $(document).ready(function() {
    $('.slect-loai-sp').select2();
    // });
    // $(document).ready(function() {
    $('.slect-gioi-tinh').select2();
    // });

    $(".form-control").click(function() {
        $(".row-cs").removeClass("active");
        $(this).parents(".row-cs").addClass("active");
    });
    var form_control = $(".form-control");

    $(window).click(function(e) {
        if (!form_control.is(e.target)) {
            $(".row-cs").removeClass("active");
        }
    });

    $('.td-huy').click(function() {
        window.location.href = "nguoi-mua-thong-tin-tai-khoan.html";
    });

    $('#btn_submit_d').click(function() {
        var dl_nguoimua = $('#dl_nguoimua');
        dl_nguoimua.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                tieu_de: "required",
                tinh_thanh: {
                    required: true,
                },
                dia_chi: "required",
                'list_product[]': "required",
            },
            messages: {
                tieu_de: "Họ tên không được để trống",
                tinh_thanh: {
                    required: "Không được để trống tỉnh thành",
                },
                dia_chi: "Không được để trống địa chỉ",
                'list_product[]': "Không được để trống danh mục",
            }
        });

        if (dl_nguoimua.valid() === true) {
            var user_id = $("#dl_nguoimua").attr("data");
            var user_type = $("#dl_nguoimua").attr("data1");

            var tieu_de = $("input[name='tieu_de']").val();
            var ngay_sinh = $("input[name='ngay_sinh']").val();
            var gioi_tinh = $("select[name='gioi_tinh']").val();
            var tinh_thanh = $("select[name='tinh_thanh']").val();
            var dia_chi = $("input[name='dia_chi']").val();
            var danh_muc = $("#list_product").val();
            var loai_spham = $("#loai_sp").val();

            var fd = new FormData();
            fd.append('user_id', user_id);
            fd.append('user_type', user_type);

            fd.append('tieu_de', tieu_de);
            fd.append('ngay_sinh', ngay_sinh);
            fd.append('gioi_tinh', gioi_tinh);
            fd.append('tinh_thanh', tinh_thanh);
            fd.append('dia_chi', dia_chi);
            fd.append('danh_muc', danh_muc);
            fd.append('loai_spham', loai_spham);

            $.ajax({
                url: '../ajax/chinhsua_tt_nguoi_mua.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == '') {
                        $('.tbao_tcong_d').show();
                    } else {
                        alert(data);
                    }
                    // console.log(data);
                }
            })

        }
    });


    $('#list_product').change(function() {
        var list_product = $(this).val();
        $.ajax({
            type: 'POST',
            url: "../ajax/list_dm.php",
            data: {
                list_product: list_product
            },
            success: function(data) {
                $('#loai_sp').html(data)
            }
        })
    })
</script>