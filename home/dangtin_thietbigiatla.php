<?
include 'config.php';
$id = getValue('id', 'int', 'GET', '');
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $list_ktag_query = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id ");
    $query=new db_query("SELECT *  FROM `nhom_sanpham` WHERE `id_danhmuc` = $id ");
    $list_nhom = $query->result_array();
    $list_ktag = $list_ktag_query->result_array();

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
    <title>Đăng tin thiết bị giặt là</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    
    <link rel="stylesheet" type="text/css" href="../css/style_new/style_d.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="../css/style_new/style.css?v=<?= $version ?>">

</head>

<body>
    <?php include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="tindang-container">
            <div class="tindang-header hd-disflex hd-align-center ">
                <p class="font-18-24 font-dam">Đăng tin</p>
                <?php if ($us_type == 1 || $us_type == 3): ?>
                <div class="w-125">
                    <span>Cho tặng miễn phí</span>
                    <label class="switch-124" for="cho-tang-mphi">
                        <input type="checkbox" id="cho-tang-mphi">
                        <span class="slider1 round1"></span>
                    </label>
                </div>
                <?php endif ?>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <?php include "../includes/inc_new/up-media-dang-tin.php"; ?>
                </div>
                <div class="tindang-col-right">
                    <form class="form-dtin-cont" id="form_tb_giatla">
                        <div class="row-tin-dang danhmuc_tt">
                            <p class="font-dam hd_font15-17">Danh mục sản phẩm <span class="color_red">*</span></p>
                            <input data="<?= $id ?>" type="text" class="dmuc-spham" readonly name="san-pham-laptop" placeholder="Đồ gia dụng  >>  Thiết bị giặt là">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tiêu đề <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="tieu_de" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Loại thiết bị<span class="color_red">*</span></p>
                            <select class="slect-hang  loai_thiet_bi hd_height36" name="loai_thiet_bi">
                                <option value="">Loại thiết bị</option>
                                <?php foreach ($list_nhom as $key => $value): ?>
                                    <option value="<?=$value['id']?>"><?=$value['name']?></option>    
                                <?php endforeach ?>
                            </select>
                        </div>
                        <!-- render -->
                        <div class="append_nhom">

                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tình trạng <span class="color_red">*</span></p>
                            <select class="slect-hang  hd_height36" name="tinhtrang">
                                <option value="">Tình trạng</option>
                                <option value="1">Mới </option>
                                <option value="2">Đã sử dụng </option>
                            </select>
                        </div>
                        <?php if ($us_type == 1 || $us_type == 3): ?>
                            <!-- giá người bán -->
                            <div class="row-tin-dang d_8-7_tclass1">
                                <p class="font-dam hd_font15-17 d_8-7_tclass2">Giá <span style="color:#ff0000">*</span></p>
                                <div class="d_themdiv_gia_7_8">
                                    <div class="input-gia-cont d_8-7_tclass3">
                                        <div class="box_input_infor">
                                            <input class="input_infor_tag error" type="text" name="td_gia_spham"
                                                placeholder="" id="gia-ban-sp" autocomplete="off"
                                                oninput="<?php echo $oninput; ?>" onkeyup="format_gtri(this)">
                                        </div>
                                        <div class="money_div d_8-7_tclass5">
                                            <select class="dt-money-up">
                                                <option value="1">VND</option>
                                                <option value="2">USD</option>
                                                <option value="3">EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <span class="sp-lienhe-nban d_8-7_tclass4">
                                        <input type="checkbox" name="td-lienhe_ngban" placeholder="" class="lien-he-ngban">
                                        <label class="color-blk">Liên hệ người bán để hỏi giá</label>
                                    </span>
                                </div>
                            </div>
                            <!--  hết giá người bán -->
                        <?php endif ?>

                        <?php if ($us_type == 2): ?>
                            <!-- giá người mua -->
                            <div class="row-tin-dang-gia">
                                <p class="font-dam hd_font15-17">Giá mong muốn <span class="color_red">*</span></p>
                                <div class="hd-disflex hd-disflex_df_7_8">
                                    <div class="df_8_7_1">
                                        <div class="form_group box_input_infor">
                                            <input onkeyup="format_gtri(this)" type="text" name="gia_mongmuon1" placeholder="Từ" autocomplete="off"
                                                oninput="<?= $oninput ?>"
                                                class="font-14-16 input-gia-cont stgia_tin_dang input_infor_tag error" id=""
                                                onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                        </div>
                                        <div class="form_group box_input_infor">
                                            <input onkeyup="format_gtri(this)" type="text" name="gia_mongmuon2" placeholder="Đến" autocomplete="off"
                                                oninput="<?= $oninput ?>"
                                                class="font-14-16 input-gia-cont stgia_tin_dang input_infor_tag error" id=""
                                                onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                        </div>
                                        <div class="kengang_gia_new">
                                            <p class="kengang_gia_new_ke"></p>
                                        </div>
                                    </div>
                                    <div class="df_8_7_2">
                                        <div class="div_select_dv dvgia_tin_dang dvgia_tin_dang_df_8_7">
                                            <select class="dt-money-up" name="donvi_mua">
                                                <option value="1">VND</option>
                                                <option value="2">USD</option>
                                                <option value="3">EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <!-- hết giá người mua -->
                        <?php endif ?>

                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Mô tả <span class="color_red">*</span></p>
                            <textarea class="texa-mo-ta input_infor_tag error" placeholder="Nhập mô tả" name="mota"></textarea>
                        </div>

                        <div class="box_input_infor">
                            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
                            <select class="slect-chitiet_dm hd_height36 chitiet_dm" style="width:100%" name="chitiet_dm">
                                <option value="0">Thêm chi tiết danh mục</option>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Địa chỉ <span class="color_red">*</span></p>
                            <input type="text" name="td_dia_chi" class="td_ttin_diachi input_infor_tag error" autocomplete="off" placeholder="Địa chỉ">
                        </div>
                        <div class="row-tin-dang div-ma-xac-nhan box_input_infor">
                            <p class="font-dam hd_font15-17">Mã xác nhận <span style="color:#ff0000">*</span></p>
                            <div class="khung_input_capcha">
                                <div class="div_bao_ma_xacnhan">
                                    <input id="captcha_input" type="text" name="captcha_confirm" class="input_infor_tag error" placeholder="Mã xác nhận" autocomplete="off" oninput="<?= $oninput ?>" class="ma_capcha">
                                </div>
                                <div class="bao_p_capcha">
                                    <input readonly type="text" class="ma_dcap_2 ma_dcap_2_df sh_clr_five sh_size_five b_radius_5 background-none" id="captcha"></input>
                                    <div class="img_df">
                                        <img src="../images/anh_moi/new_capcha.svg" class="xoay360">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-tin-dang cont-btn-sb hd-disflex hide-480-mobile">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold">XEM TRƯỚC</button>
                            <button type="button" class="btn-submit td-dang-tin tb_giatla hd_cspointer font-bold">ĐĂNG TIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php include '../modals/md_danh_muc_tin_dang.php' ?>
        <?php include '../modals/md_dia_chi.php' ?>
    </section>
    <?php
    include '../includes/inc_new/inc_footer.php';
    ?>
    <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="/js/style_new/select2.min.js"></script>
    <script type="text/javascript" src="/js/style_new/jquery.validate.min.js"></script>
    <script type="text/javascript" src="../js/style_new/chien_js.js"></script>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script>$('#city_search ,#cate_search').select2();</script>
</body>

</html>
<script>
    $('.loai_thiet_bi').change(function(){
        var nhom = $(this).val();
        var ct_dm=<?=$id?>;
        $.ajax({
           url : "../render/select_delivery.php",
           method: 'POST',
           data:{nhom:nhom,ct_dm:ct_dm},
            success:function(data){
               $('.chitiet_dm').html(data);     
            }
        });
    })  

    $(".tb_giatla").click(function () {
    var form_tb_giatla = $("#form_tb_giatla");
    form_tb_giatla.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            loai_thiet_bi: "required",
            hang: "required",
            tinhtrang: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            loai_thiet_bi: "Vui lòng chọn loại thiết bị",
            hang: "Vui lòng chọn hãng thiết bị",
            tinhtrang: "Vui lòng chọn tình trạng",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_tb_giatla.valid() === true) {
        var id_dm = $(".dmuc-spham").attr("data");
        var tieu_de = $("input[name='tieu_de']").val();
        var nhom = $("select[name='loai_thiet_bi']").val();

        var tinh_trang_ban = $("select[name='tinhtrang']").val();
        

        if ($(".lien-he-ngban").is(":checked")) {
            var td_gia_spham = '0';
        };
        var tang_mphi = 0;
            if ($("#cho-tang-mphi").is(":checked")) {
                tang_mphi = 1;
            }
        <?php if ($us_type == 1||$us_type == 3): ?>
            var don_vi = $("select[name='donvi_ban']").val();
            var td_gia_spham = $("input[name='td_gia_spham']").val();
        <?php endif ?>

        var mo_ta = $("textarea[name='mota']").val();
        var chitiet_dm = $("select[name='chitiet_dm']").val();
        var dia_chi = $("input[name='td_dia_chi']").val();

        var tinh_thanh = $("select[name='thanhpho']").val();
        var quan_huyen = $("select[name='quanhuyen']").val();
        var phuong_xa = $("select[name='phuongxa']").val();
        var so_nha = $("input[name='md_so_nha']").val();

        <?php if ($us_type == 2): ?>
            var gia_bd = $("input[name='gia_mongmuon1']").val();
            var gia_kt = $("input[name='gia_mongmuon2']").val();
            var donvi_mua = $("select[name='donvi_mua']").val();
        <?php endif ?>

        var fd = new FormData();
            
            fd.append('id_dm', id_dm);
            fd.append('tieu_de', tieu_de);
            fd.append('nhom', nhom);
            
            fd.append('tinh_trang_ban', tinh_trang_ban);
            fd.append('chitiet_dm', chitiet_dm);
            fd.append('dia_chi', dia_chi);
            fd.append('tinh_thanh', tinh_thanh);
            fd.append('quan_huyen', quan_huyen);
            fd.append('phuong_xa', phuong_xa);
            fd.append('so_nha', so_nha);
            fd.append('mo_ta', mo_ta);
            fd.append('tang_mphi', tang_mphi);

            <?php if ($us_type == 2): ?>
                fd.append('gia_bd', gia_bd);
                fd.append('gia_kt', gia_kt);
                fd.append('donvi_mua', donvi_mua);
            <?php endif ?>

            <?php if ($us_type == 1||$us_type == 3): ?>
            fd.append('gia_tpham', td_gia_spham);
            fd.append('don_vi', don_vi);
            <?php endif ?>
            $('.avt_files').each(function() {
                fd.append('files[]', $(this).prop("files")[0]);
            });

            var video = $("#cl-upload-video-file")[0].files;
            fd.append('file', video[0]);



            $.ajax({
                type: 'POST',
                url: '/ajax_dogiadung/dtin_thietbigiatla.php',
                data: fd,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data == "") {
                        alert("Đăng tin thành công");
                        window.location.reload();
                    } else {
                        alert(data);
                    }
                }
            })
    }
})
</script>