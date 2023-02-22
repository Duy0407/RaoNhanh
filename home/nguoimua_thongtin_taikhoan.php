<?php
include('../includes/inc_new/icon.php');
include 'config.php';
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 2) {

        $ht_tt = new db_query("SELECT `usc_id`, `usc_logo`, `hien_thi`, `usc_cate_id`, `usc_category`, `usc_name`, `usc_type`, `usc_phone`, `usc_time`,
                            `usc_email`, `usc_address` FROM `user` WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_time = $kn_tt['usc_time'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
        $usc_email = $kn_tt['usc_email'];
        $usc_type = $kn_tt['usc_type'];
        $arr_type = array(1 => 'người bán', 2 => 'người mua', 3 => "doanh nghiệp");
        $usc_phone = $kn_tt['usc_phone'];
        $usc_address = $kn_tt['usc_address'];
        $usc_logo = $kn_tt['usc_logo'];
        $hien_thi = $kn_tt['hien_thi'];

        $usc_category = $kn_tt['usc_category'];
        $cate2 = explode(',', $usc_category);
        $dem = count($cate2);


        $usc_cate_id = $kn_tt['usc_cate_id'];
        $cate_con = explode(",", $usc_cate_id);
        $dem_con = count($cate_con);

        $tongtin = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user");
        $result_tongtin = mysql_num_rows($tongtin->result);

        $tongtindamua = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `usc_type` = $type_user AND `user_id` = $id_user");
        $result_tongtindamua = mysql_num_rows($tongtindamua->result);


        // DANH MỤC CHA
        $cou = count($db_cat);
        $arr = [];
        for ($i = 0; $i < $cou; $i++) {
            $it = $db_cat[$i];
            $arr[$it['cat_id']] = $it;
        }

        // DANH MỤC CON
        $month = date('m', time());
        $year = date('Y', time());
        $start_month = strtotime($year . '-' . $month . '-01');
        $end_month = strtotime(date("Y-m-t"));
        $ttrong_thang = new db_query("SELECT COUNT(`new_id`) AS cou_month FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user
                                    AND `new_create_time` >= $start_month AND `new_create_time` <= $end_month ");
        $cou_month = mysql_fetch_assoc($ttrong_thang->result)['cou_month'];

        $list_bl = new db_query("SELECT `eva_id`, `user_id`, `bl_user`, `eva_parent_id`, `eva_stars`, `eva_comment`, `eva_comment_time`, `eva_active`,
                        `da_csbl`, `tgian_hetcs` FROM `evaluate` WHERE `bl_user` = $id_user AND `eva_active` = 1 ");
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="vi">
<!--link meta seo-->

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Thông tin tài khoản</title>
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
        <div class="chinhsua-container hd-disflex tong_quan_renter">
            <div class="cs-col-left">
                <div class="cs-header-right hd-disflex">
                    <div class="img-left-tt">
                        <div class="avatar-img-left hd_cspointer df">
                            <? if ($usc_logo != '') { ?>
                                <img src="/pictures/avt_dangtin/<?= $usc_logo ?>" class="avatar-img-left-tt" alt="anh">
                            <? } else { ?>
                                <img src="/images/anh_moi/anh004.png" class="avatar-img-left-tt" alt="anh">
                            <? } ?>
                            <!-- <input type="file" id="" onchange="loadFile()" style="display: none;"> -->
                        </div>
                    </div>
                    <div class="name">
                        <div class="name_left_375">
                            <p class="font-16-1875 color-blk font-bold"><?= $usc_name; ?></p>
                            <div class="edit_detail_account">
                                <p class="font-13-1523 font-dam">Tài khoản <?= $arr_type[$usc_type]; ?></p>
                                <p class="font-13-1523 font-dam">Tham gia: <?= $usc_time; ?></p>
                            </div>
                        </div>
                        <div class="name_right_375" onclick="edit_list(this)">
                            <img src="/images/icon/arrow-down.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="list_danhmuc list_danhmuc-hidden">
                    <? include("../includes/inc_new/sidebar_nguoimua.php") ?>
                </div>
            </div>
            <div class="top_hoso_canhan">
                <div class="hoso_canhan">
                    <div class="hoso_canhan-header hd-disflex hd-align-center">
                        <div class="box-hoso_canhan hd-disflex">
                            <div class="icf-hoso_canhan">
                                <img src="/images/icon/avt_edit.svg" alt="">
                            </div>
                            <p class="font-24-2813 font-dam">Thông tin tài khoản</p>
                        </div>
                        <div class="hoso_canhan-header-right hd-disflex ht_datas">
                            <p class="header-right-ri font-15-18 font-bold color-blk">Cho phép người bán truy cập thông tin tài khoản</p>
                            <div class="header-right-le">
                                <label class="switch-125 chophepvao">
                                    <input type="checkbox" id="cho-phep-nb-truy-cap" class="inputchophepvao" name="checkchophep" <?= ($hien_thi == 0) ? "checked" : ""; ?>>
                                    <span class="slider2 round2"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="hoso_canhan-content hd-disflex">
                        <div class="img-hoso-canhan">
                            <div class="avatar-img-hosocanhan hd_cspointer df2">
                                <? if ($usc_logo != '') { ?>
                                    <img src="/pictures/avt_dangtin/<?= $usc_logo ?>" class="avatar-img-hscn" alt="">
                                <? } else { ?>
                                    <img src="/images/anh_moi/anh023.png" class="avatar-img-hscn" alt="">
                                <? } ?>
                            </div>
                        </div>
                        <div class="thong-tin-hscn">
                            <div class="thong-tin-hscn1 hd-disflex">
                                <p class="ten-hscn font-dam"><?= $usc_name; ?></p>

                                <a href="chinh-sua-thong-tin-nguoi-mua.html" class="btn-cs-tt hd_cspointer color_cam font-13-15">Chỉnh sửa thông tin</a>
                            </div>
                            <div class="thong-tin-hscn2 ">
                                <div class="hd-disflex">
                                    <p class="loaitk-hscn mb20 color_xam font-16-19 w50">Loại tài khoản:
                                        <?= $arr_type[$type_user]; ?></p>
                                    <p class="ntg-hscn mb20 color_xam font-16-19 w50">Ngày tham gia: <?= $usc_time; ?>
                                    </p>
                                </div>
                                <div class="hd-disflex">
                                    <p class="sdt-hscn mb20 color_xam font-16-19 w50">Số điện thoại: <?= $usc_phone; ?>
                                    </p>
                                    <p class="email-hscn mb20 color_xam font-16-19 w50">Email: <?= $usc_email; ?></p>
                                </div>
                                <div class="hd-disflex">
                                    <!-- <p class="hdtb-hscn mb20 color_xam font-16-19 w50">Hoạt động trung bình: 1h30m/ngày</p> -->
                                    <p class="diachi-hscn mb20 color_xam font-16-19 w50">Địa chỉ: <?= $usc_address; ?>
                                    </p>
                                </div>
                                <div class="hd-disflex hd_disflex df">
                                    <p class="dmqt-hscn df color_xam font-16-19 w50">Danh mục quan tâm:
                                        <?
                                        $kqp = '';
                                        for ($i = 0; $i < $dem; $i++) {
                                            $kq = $arr[$cate2[$i]]['cat_name'];
                                            $kqp .= $kq . ", ";
                                        }
                                        echo rtrim($kqp, ", ");
                                        ?>
                                    </p>
                                    <p class="spqt-hscn color_xam font-16-19 w50">Sản phẩm quan tâm:
                                        <?
                                        $kq_con2 = '';
                                        for ($i = 0; $i < $dem_con; $i++) {
                                            $kq_con = $arr[$cate_con[$i]]['cat_name'];
                                            $kq_con2 .= $kq_con . ", ";
                                        }
                                        echo rtrim($kq_con2, ", ");
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="box_hscn_cha d_flex j_between">
                        <div class="box_hscn_con">
                            <div class="d_flex hd-align-center">
                                <div class="k_anh_chung">
                                    <img src="../images/anh_moi/tindadang.svg" alt="">
                                </div>
                                <div class="color_cam ghichu">Tin đã đăng</div>
                            </div>
                            <p class="soluong_tt color_cam"><?= $result_tongtin ?></p>
                            <p class="tin_ghi_chu">+<?= $cou_month ?> tin mới trong 30 ngày qua</p>
                        </div>
                        <div class="box_hscn_con">
                            <div class="d_flex hd-align-center">
                                <div class="k_anh_chung">
                                    <img src="../images/anh_moi/danhgia.svg" alt="">
                                </div>
                                <div class="color_vang ghichu">Đánh giá trung bình</div>
                            </div>
                            <p class="soluong_tt color_vang">4,5</p>
                            <p class="tin_ghi_chu">Trên 25 lượt đánh giá</p>
                        </div>
                        <div class="box_hscn_con">
                            <div class="d_flex hd-align-center">
                                <div class="k_anh_chung">
                                    <img src="../images/anh_moi/luotthichtim.svg" alt="">
                                </div>
                                <div class="color_do ghichu">Lượt thích tin</div>
                            </div>
                            <p class="soluong_tt color_do"><?= $result_tongtindamua ?></p>
                            <p class="tin_ghi_chu">+34 lượt thích trong 30 ngày qua</p>
                        </div>
                    </div>
                </div>
                <div class="danhgia_hscn">
                    <div class="d_flex hd-align-center danhgiataikhoan">
                        <div class="k_anh_chung">
                            <img src="../images/anh_moi/danhgia.svg" alt="">
                        </div>
                        <div class="color_vang ghichu">Đánh giá tài khoản</div>
                    </div>
                    <div class="cha_danhgiataikhoan" data="<?= $id_user ?>">
                        <? if (mysql_num_rows($list_bl->result) > 0) {
                            while ($row_bl = mysql_fetch_assoc($list_bl->result)) {
                                $bl_id = $row_bl['eva_id'];
                                $bl_usc = $row_bl['user_id'];
                                // lấy thông tin người binh luận
                                $nguoi_bl = new db_query("SELECT `usc_id`, `usc_name`, `usc_logo` FROM `user` WHERE `usc_id` = $bl_usc ");
                                $row_nbl = mysql_fetch_assoc($nguoi_bl->result);
                                $bl_logo = $row_nbl['usc_logo'];

                                // tra loi binh luan
                                $check_dcbl = new db_query("SELECT `eva_id`, `bl_user`, `eva_comment`, `eva_comment_time`, `da_csbl` FROM `evaluate`
                                                        WHERE `user_id` = $id_user AND `eva_active` = 1 AND `eva_parent_id` = $bl_id "); ?>

                                <div class="con_danhgiataikhoan" data="<?= $bl_id ?>">
                                    <div class="d_flex align_c mb_10">
                                        <div class="con_danhgiataikhoan-avt">
                                            <? if ($bl_logo != "") { ?>
                                                <img src="../images/ava_default.png" alt="">
                                            <? } else { ?>
                                                <img src="/pictures/avt_dangtin/<?= $bl_logo ?>" alt="">
                                            <? } ?>
                                        </div>
                                        <p class="name_tkdanhgia"><?= $row_nbl['usc_name'] ?>
                                            <span class="time_tkdanhgia"><?= lay_tgian($row_bl['eva_comment_time']) ?></span>
                                        </p>
                                    </div>
                                    <div class="d_flex hd-align-center star_taikhoandanhgia">
                                        <? for ($i = 0; $i < $row_bl['eva_stars']; $i++) { ?>
                                            <img src="../images/icon/star.svg" class="anh025">
                                        <? }
                                        for ($j = 0; $j < (5 - $row_bl['eva_stars']); $j++) { ?>
                                            <img src="/images/newImages/sao-rong.png" class="anh026">
                                        <? } ?>
                                    </div>
                                    <div class="d_flex hd-align-center tl_taikhoandanhgia">
                                        <p class="texttl_tkdanhgia text_aj color-blk"><?= $row_bl['eva_comment'] ?></p>
                                    </div>
                                    <? if (mysql_num_rows($check_dcbl->result) > 0) {
                                        $row_tl = mysql_fetch_assoc($check_dcbl->result);  ?>
                                        <div class="a_chinhsua_tkdanhgia">
                                            <div class="da_danhgia d_flex">
                                                <div class="b_chinhsua_tkdanhgia">
                                                </div>
                                                <div class="c_chinhsua_tkdanhgia">
                                                    <div class="d_flex align_c mb_10">
                                                        <div class="con_danhgiataikhoan-avt">
                                                            <img src="/images/ava_default.png" alt="">
                                                        </div>
                                                        <p class="name_tkdanhgia"><?= $usc_name ?></p>
                                                        <p class="chinhsua_tkdanhgia">
                                                            <? if ($row_tl['da_csbl'] != 1) { ?>
                                                                <span class="chinhsua_bluan" data="<?= $row_tl['eva_id'] ?>" data1="<?= $_COOKIE['UT'] ?>"> Chỉnh sửa</span>
                                                            <? } ?>
                                                            <span class="time_tkdanhgia"><?= lay_tgian($row_tl['eva_comment_time']) ?></span>
                                                        </p>
                                                    </div>
                                                    <p class="texttl_tkdanhgia1 text_aj color-blk"><?= $row_tl['eva_comment'] ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    <? } else { ?>
                                        <div class="hd_cspointer d_flex hd-align-center">
                                            <button type="button" class="tl_tkdanhgia hd_cspointer font-bold font-14-16">Trả lời</button>
                                            <div class="danhgia_hscn2">
                                                <div class="d_flex hd-align-center phanhoikh">
                                                    <div class="bg_vang k_anh_chung">
                                                        <img src="../images/anh_moi/edit_rate.png" alt="">
                                                    </div>
                                                    <div class="color_vang ghichu">Phản hồi với khách hàng</div>
                                                    <div class="nut_cancel hd_cspointer">
                                                        <img src="../images/anh_moi/anh020.png" alt="anh020" class="nut_cancel_anh" style="background: #F26222;">
                                                    </div>
                                                </div>
                                                <div class="o-phanhoikh">
                                                    <p class="font-dam hd_font15-17">Nội dung phản hồi<span class="color_red p5">*</span></p>
                                                    <textarea class="text-phan-hoi form-control" placeholder="Nhập nội dung" name="noidung_phanhoi"></textarea>
                                                </div>
                                                <div class="btn-phan-hoi-kh d_flex">
                                                    <button type="button" class="btn-gui-ph gui_phanhoi hd_cspointer">Gửi </button>
                                                </div>
                                            </div>
                                        </div>
                                    <? } ?>
                                </div>
                        <? }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <?php include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="/js/newJs/admin.main.js"></script>
</body>

</html>
<script type="text/javascript">
    $("#cho-phep-nb-truy-cap").click(function() {
        var check_ht = 1;
        if ($(this).is(":checked")) {
            var check_ht = 0;
        }
        $.ajax({
            type: 'POST',
            url: "/ajax/chophepvao.php",
            data: {
                check_ht: check_ht
            },
            success: function(data) {
                window.location.reload();
            }
        })

    })

    function edit_list(a) {
        $('.list_danhmuc').toggleClass('list_danhmuc-hidden')
        $(a).toggleClass('rotate_icon')
    }

    $(".tl_tkdanhgia").click(function() {
        $(this).hide();
        $(this).parent().find('.danhgia_hscn2').show();
    });

    $(".nut_cancel").click(function() {
        $(this).parents('.danhgia_hscn2').hide();
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

    $(".gui_phanhoi").click(function() {
        var binh_luan = $(this).parents(".danhgia_hscn2").find(".text-phan-hoi").val();
        var nguoi_tloi = $(this).parents(".cha_danhgiataikhoan").attr("data");
        var id_bl = $(this).parents(".con_danhgiataikhoan").attr("data");
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

    $(".chinhsua_bluan").click(function() {
        var bl_id = $(this).attr("data");
        var type_cs = $(this).attr("data1");
        var _this = $(this);
        $.ajax({
            url: '/render/csua_bluan.php',
            type: 'POST',
            data: {
                bl_id: bl_id,
                type_cs: type_cs,
            },
            success: function(data) {
                _this.parents(".a_chinhsua_tkdanhgia").append(data);
            }
        })
    });
</script>