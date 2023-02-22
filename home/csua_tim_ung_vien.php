<?
include("config.php");
$id_vl = getValue('id_cs', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_vl != 0) {
    $user_id = $_COOKIE['UID'];
    $user_type = $_COOKIE['UT'];
    $check_tind = new db_query("SELECT * FROM new LEFT JOIN new_description ON new.new_id = new_description.new_id WHERE new_user_id = $user_id AND new.new_id = $id_vl AND  new_cate_id = 120 ");
    if (mysql_num_rows($check_tind->result) > 0) {
        $row_tt = mysql_fetch_assoc($check_tind->result);
        $avt_dangtin = $row_tt['new_image'];
        $video_dangtin = $row_tt['com_logo'];
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
    <title>Chỉnh sửa tin đăng tìm ứng viên</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style_new/style_t.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_h.css?v=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="tindang-container">
            <div class="tindang-header hd-disflex hd-align-center ">
                <p class="font-18-24 font-dam">Đăng tin</p>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <? include "../includes/inc_new/up_media_dangtin_tuyendung.php"; ?>
                </div>
                <div class="tindang-col-right" data="<?= date('Y-m-d', time()) ?>">
                    <form class="form-dtin-cont" id="form_tuyen_dung" data="<?= $acc_id ?>" data1="<?= $acc_type ?>">
                        <div class="row-tin-dang danhmuc_tt">
                            <p class="font-dam hd_font15-17">Danh mục sản phẩm <span class="color_red">*</span></p>
                            <input type="text" class="dmuc-spham" data="120" readonly name="san-pham-laptop" placeholder="Việc làm >> Tìm ứng viên">
                        </div>
                        <div class="title_dangtin">Thông tin nhà tuyển dụng</div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tên công ty <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="ten_cty" placeholder="Nhập tên" value="<?= $row_tt['new_name'] ?>">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Địa chỉ <span class="color_red">*</span></p>
                            <input readonly type="text" name="td_diachi" class="td_ttin_diachi input_infor_tag error" placeholder="Địa chỉ" value="<?= $row_tt['new_address'] ?>" data-tt="<?= $row_tt['com_city'] ?>" data-qh="<?= $row_tt['com_district'] ?>" data-px="<?= $row_tt['com_ward'] ?>" data-sn="<?= $row_tt['com_address_num'] ?>">
                        </div>
                        <div class="title_dangtin">Thông tin đăng tuyển</div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Vị trí đăng tuyển <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="vitri_td" placeholder="VD: Tuyển nhân viên kế toán tổng hợp" value="<?= $row_tt['new_title'] ?>">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Ngành nghề <span class="color_red">*</span></p>
                            <select class="slect-hang hd_height36" name="nganhnghe">
                                <option disabled selected value="">Chọn ngành nghề</option>
                                <?
                                $db_qra = new db_query("SELECT cat_id, cat_name FROM category_vl ");
                                while ($rowa = mysql_fetch_assoc($db_qra->result)) { ?>
                                    <option value="<? echo $rowa['cat_id'] ?>" <?= ($rowa['cat_id'] == $row_tt['new_job_type']) ? 'selected' : '' ?>><?= $rowa['cat_name'] ?></option>
                                <?
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Chi tiết công việc <span class="color_red">*</span></p>
                            <select class="slect-hang hd_height36" name="detail_job">
                                <option disabled selected value="">Chọn chi tiết công việc</option>
                                <?
                                $list_tag = new db_query("SELECT key_id,key_name FROM keyword where key_cate_lq = " . $row_tt['new_job_type']);
                                while ($rowa = mysql_fetch_assoc($list_tag->result)) { ?>
                                    <option value="<? echo $rowa['key_id'] ?>" <?= ($rowa['key_id'] == $row_tt['new_ctiet_dmuc']) ? 'selected' : '' ?>><?= $rowa['key_name'] ?></option>
                                <?
                                }
                                ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Hình thức làm việc <span class="color_red">*</span></p>
                            <select class="slect-hang hd_height36" name="work_type">
                                <option disabled selected value="">Chọn hình thức làm việc</option>
                                <option value="1">Toàn thời gian</option>
                                <option value="2">Bán thời gian</option>
                                <option value="3">Giờ hành chính</option>
                                <option value="4">Ca sáng</option>
                                <option value="5">Ca chiều</option>
                                <option value="6">Ca đêm</option>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Địa điểm làm việc <span class="color_red">*</span></p>
                            <input readonly type="text" name="td_diachi_lamviec" class="diadiem_lamviec input_infor_tag error" placeholder="Địa chỉ" value="<?= $row_tt['dia_chi'] ?>" data-tt="<?= $row_tt['new_city'] ?>" data-qh="<?= $row_tt['quan_huyen'] ?>" data-px="<?= $row_tt['phuong_xa'] ?>" data-sn="<?= $row_tt['new_sonha'] ?>">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Mức lương</p>
                            <div class="item_muc_luong d_flex">
                                <div data-id="1" class="muc_luong">Thỏa thuận</div>
                                <div data-id="2" class="muc_luong">Từ mức</div>
                                <div data-id="3" class="muc_luong">Đến mức</div>
                                <div data-id="4" class="muc_luong">Từ mức - Đến mức</div>
                            </div>
                            <div class="khoi_muc_luong">
                                <div id="input_1" class="input_salary">
                                    <input class="input_infor_tag error " type="text" name="" disabled placeholder="Thỏa thuận">
                                </div>
                                <div id="input_2" class="input-gia-cont d_none w_100 d_8-7_tclass3 input_salary">
                                    <div class="">
                                        <input class="input_infor_tag error" placeholder="Nhập số tiền" type="text" name="td_gia_spham" onkeyup="format_gtri(this)" id="gia-ban-sp" autocomplete="off" oninput="<?php echo $oninput; ?>">
                                    </div>
                                    <div class="money_div d_8-7_tclass5">
                                        <select class="dt-money-up donvi_ban" name="dvi_tien">
                                            <option value="1">VND</option>
                                            <option value="2">USD</option>
                                            <option value="3">EURO</option>
                                        </select>
                                    </div>
                                </div>
                                <div id="input_3" class="input-gia-cont d_none w_100 d_8-7_tclass3 input_salary">
                                    <div class="">
                                        <input class="input_infor_tag error" type="text" placeholder="Nhập số tiền" name="td_gia_spham" onkeyup="format_gtri(this)" id="gia-ban-sp" autocomplete="off" oninput="<?php echo $oninput; ?>">
                                    </div>
                                    <div class="money_div d_8-7_tclass5">
                                        <select class="dt-money-up donvi_ban" name="dvi_tien">
                                            <option value="1">VND</option>
                                            <option value="2">USD</option>
                                            <option value="3">EURO</option>
                                        </select>
                                    </div>
                                </div>

                                <div id="input_4" class="hd-disflex d_none hd-disflex_df_7_8 input_salary">
                                    <div class="df_8_7_1">
                                        <div class="form_group">
                                            <input type="text" name="salary_fr" onkeyup="format_gtri(this)" placeholder="Từ mức" autocomplete="off" oninput="<?= $oninput ?>" class="font-14-16 input-gia-cont stgia_tin_dang input_infor_tag error" id="" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                        </div>
                                        <div class="form_group">
                                            <input type="text" name="salary_to" onkeyup="format_gtri(this)" placeholder="Đến mức" autocomplete="off" oninput="<?= $oninput ?>" class="font-14-16 input-gia-cont stgia_tin_dang input_infor_tag error" id="" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                        </div>
                                        <div class="kengang_gia_new">
                                            <p class="kengang_gia_new_ke"></p>
                                        </div>
                                    </div>
                                    <div class="df_8_7_2">
                                        <div class="div_select_dv dvgia_tin_dang dvgia_tin_dang_df_8_7">
                                            <select class="dt-money-up donvi_mua" name="dvi_tien">
                                                <option value="1">VND</option>
                                                <option value="2">USD</option>
                                                <option value="3">EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Hình thức trả lương <span class="color_red">*</span></p>
                            <select class="slect-hang hd_height36" name="salary_type">
                                <option disabled selected value="">Chọn hình thức trả lương</option>
                                <option value="1">Theo giờ</option>
                                <option value="2">Theo ngày</option>
                                <option value="3">Theo tuần</option>
                                <option value="4">Theo tháng</option>
                                <option value="5">Theo năm</option>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Số lượng cần tuyển <span class="color_red">*</span></p>
                            <input type="text" name="quantity" autocomplete="off" placeholder="Nhập số lượng" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" value="<?= $row_tt['new_quantity'] ?>">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Mô tả công việc <span class="color_red">*</span></p>
                            <textarea class="texa-mo-ta input_infor_tag error" placeholder="Vui lòng nêu rõ
Trách nhiệm của nhân viên với công việc là gì?
Nhiệm vụ công việc cần thực hiện hàng ngày là gì
Những kỹ năng bắt buộc?
Những kỹ năng mang tính khuyến khích" name="mota"><?= $row_tt['new_description'] ?></textarea>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Hạn nộp <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="date" name="hannop" value="<?= date('Y-m-d', $row_tt['han_su_dung']) ?>">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Số điện thoại liên hệ <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="sdt_lienhe" value="<?= $row_tt['new_phone'] ?>" placeholder="Nhập số điện thoại liên hệ" autocomplete="off">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Email liên hệ <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="email_lienhe" value="<?= $row_tt['new_email'] ?>" placeholder="Nhập email liên hệ" autocomplete="off">
                        </div>
                        <div class="title_dangtin">Thông tin thêm</div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Giới tính</p>
                            <div class="item_muc_luong d_flex">
                                <div data-id="0" class="gioi_tinh">Không yêu cầu</div>
                                <div data-id="1" class="gioi_tinh">Nam</div>
                                <div data-id="2" class="gioi_tinh">Nữ</div>
                            </div>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Độ tuổi</p>
                            <div class="d_flex j_between">
                                <div class="nhap_dotuoi"><input type="text" name="minAge" autocomplete="off" placeholder="Tối thiểu" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" value="<?= ($row_tt['new_min_age'] > 0) ? $row_tt['new_min_age'] : "" ?>">
                                </div>
                                <div class="nhap_dotuoi"><input type="text" name="maxAge" autocomplete="off" placeholder="Tối đa" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" value="<?= ($row_tt['new_max_age'] > 0) ? $row_tt['new_max_age'] : "" ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Yêu cầu bằng cấp</p>
                            <select class="slect-hang hd_height36" name="bangcap">
                                <option disabled selected value="">Chọn bằng cấp</option>
                                <option value="1">Đại học</option>
                                <option value="2">Cao đẳng</option>
                                <option value="3">Lao động phổ thông</option>
                            </select>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Yêu cầu kinh nghiệm</p>
                            <select class="slect-hang hd_height36" name="kinhnghiem">
                                <option disabled selected value="">Chọn kinh nghiệm</option>
                                <option value="1">Chưa có kinh nghiệm</option>
                                <option value="2">Kinh nghiệm từ 1-2 năm</option>
                                <option value="3">Kinh nghiệm trên 2 năm</option>
                            </select>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Chứng chỉ</p>
                            <input class="input_infor_tag error" type="text" name="chungchi" placeholder="Nhập chứng chỉ" value=<?= $row_tt['new_skill'] ?>>
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
                        <div class="row-tin-dang-btn cont-btn-sb hd-disflex">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold">XEM
                                TRƯỚC</button>
                            <button type="button" class="btn-submit dang_tin dang_tin_td td-dang-tin hd_cspointer font-bold">ĐĂNG
                                TIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="v_container d_none"></div>
        <? include '../modals/md_danh_muc_tin_dang.php' ?>
        <? include '../modals/md_dia_chi.php' ?>
    </section>
    <?
    include '../includes/inc_new/inc_footer.php';
    ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
</body>
<?php
if ($row_tt['new_money'] != 0 && $row_tt['gia_kt'] != 0) {
    $new_money_type = 4;
} elseif ($row_tt['gia_kt'] != 0) {
    $new_money_type = 3;
} elseif ($row_tt['new_money'] != 0) {
    $new_money_type = 2;
} else {
    $new_money_type = 1;
}
?>
<script>
    var new_money_type = <?= $new_money_type ?>;
    var new_money_min = <?= $row_tt['new_money'] ?>;
    var new_money_max = <?= $row_tt['gia_kt'] ?>;
    var new_money_unit = <?= $row_tt['new_unit'] ?>;
    var gioi_tinh = <?= $row_tt['gioi_tinh'] ?>;
    var bangcap = <?= $row_tt['new_level'] ?>;
    var work_type = <?= $row_tt['new_job_kind'] ?>;
    var salary_type = <?= $row_tt['new_pay_by'] ?>;
    var kinhnghiem = <?= $row_tt['new_exp'] ?>;
    var user_type = <?= $user_type ?>;

    if (bangcap > 0) {
        $("[name=bangcap]").val(bangcap).trigger('change');
    }
    if (kinhnghiem > 0) {
        $("[name=kinhnghiem]").val(kinhnghiem).trigger('change');
    }
    $("[name=work_type]").val(work_type).trigger('change');
    $("[name=salary_type]").val(salary_type).trigger('change');

    $('.muc_luong').click(function() {
        $('.muc_luong').removeClass('active');
        $(this).addClass('active');
        var type = $(this).data('id');
        $('.input_salary').addClass('d_none')
        $('#input_' + type).removeClass('d_none')
    });
    $('.muc_luong[data-id=' + new_money_type + ']').click();
    switch (new_money_type) {
        case 2:
            $('#input_' + new_money_type).find("[name=td_gia_spham]").val(new_money_min).trigger('keyup');
            $('#input_' + new_money_type).find("[name=dvi_tien]").val(new_money_unit).trigger('change');
            break;
        case 3:
            $('#input_' + new_money_type).find("[name=td_gia_spham]").val(new_money_max).trigger('keyup');
            $('#input_' + new_money_type).find("[name=dvi_tien]").val(new_money_unit).trigger('change');
            break;
        case 4:
            $("[name=salary_fr]").val(new_money_min).trigger('keyup');
            $("[name=salary_to]").val(new_money_max).trigger('keyup');
            $('#input_' + new_money_type).find("[name=dvi_tien]").val(new_money_unit).trigger('change');
            break;
        default:
            break;
    }
    $('.gioi_tinh').click(function() {
        $('.gioi_tinh').removeClass('active');
        $(this).addClass('active');
    });
    $('.gioi_tinh[data-id=' + gioi_tinh + ']').click();
    $('#upload_logo').change(function() {
        var file = $(this).prop('files')[0];
        var size = file.size;
        var file_type = file.type;
        var filesize = (size / (1024 * 1024)).toFixed(2);
        var tmppath = URL.createObjectURL(file);
        var match = ['image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG'];
        if ($.inArray(file_type, match) == -1) {
            alert("Vui lòng chọn file định đạng : JPG, JPEG, PNG, GIF, JPE");
            $(this).val('');
        } else if (filesize < 2) {
            document.querySelector('#video_chon').classList.remove('d_none');
            document.querySelector('#video_chon').src = tmppath;
            $('.after-upload-video').show();
            $(".avt_xoavideo").attr("data", "");
            $(".avt_xoavideo").show();
            $('.up_logo_cty').hide();
        } else {
            alert("Dung lượng ảnh tối đa 2MB");
            $(this).val('');
        }
    });
    $(".logo-upload-after").click(function() {
        $("#upload_logo").click();
        return false;
    });
    $(".close_logo").click(function() {
        $(this).parents(".avt_xoavideo").attr("data", "");
        $(this).parents(".avt_xoavideo").children(".up_logo_cty").attr("src", "");
        $(this).parents(".avt_xoavideo").hide();
        $("#upload_logo").val('');
    });
    $("[name=nganhnghe]").change(function() {
        var id_ct = $(this).val();
        $.ajax({
            url: '/ajax/getlist_tag.php',
            data: {
                id_ct: id_ct,
            },
            success: function(t) {
                $("[name=detail_job]").html(t);
            }
        });
    });
    $.validator.addMethod("requiredSalary", function(value, element) {
        switch ($('.muc_luong.active').data('id')) {
            case 1:
                return true;
                break;
            case 2:
                return ($("#input_2 input[name='td_gia_spham']").val() != '');
                break;
            case 3:
                return ($("#input_3 input[name='td_gia_spham']").val() != '');
                break;
            case 4:
                return (($("input[name='salary_fr']").val() != '') && ($("input[name='salary_to']").val() != ''));
                break;
            default:
                return true;
                break;
        }
    }, "Vui lòng nhập lương");
    $.validator.addMethod("validSalary", function(value, element) {
        if ($('.muc_luong.active').data('id') == 4) {
            var fr = Number($("input[name='salary_fr']").val().replace(/,/g, ""));
            var to = Number($("input[name='salary_to']").val().replace(/,/g, ""));
            return (fr < to);
        } else return true;
    }, "Số trước phải nhỏ hơn số sau");
    $.validator.addMethod("checkTitle", function(value, element) {
        var flag = false;
        $.ajax({
            url: '/ajax/compare_title.php',
            type: "POST",
            dataType: "json",
            async: false,
            data: {
                title: value,
                id_vl: <?= $row_tt['new_id'] ?>,
            },
            success: function(t) {
                flag = t.result;
            }
        });
        return flag;
    });


    $.validator.addMethod("dateRange",
        function() {
            var date1 = $("input[name='hannop']").val();
            var date2 = $(".tindang-col-right").attr("data");
            return (date1 >= date2);
        });
    $(".dang_tin_td").click(function() {
        var form_tuyen_dung = $("#form_tuyen_dung");
        form_tuyen_dung.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                ten_cty: {
                    required: true,
                },
                td_diachi: {
                    required: true,
                },
                vitri_td: {
                    required: true,
                    minlength: 10,
                    maxlength: 70,
                    checkTitle: true,
                },
                nganhnghe: {
                    required: true,
                },
                detail_job: {
                    required: true,
                },
                work_type: {
                    required: true,
                },
                td_diachi_lamviec: {
                    required: true,
                },
                td_gia_spham: {
                    requiredSalary: true,
                    validSalary: true,
                },
                salary_fr: {
                    requiredSalary: true,
                    validSalary: true,
                },
                salary_type: {
                    required: true,
                },
                quantity: {
                    required: true,
                },
                mota: {
                    required: true,
                    minlength: 40,
                    maxlength: 10000,
                },
                hannop: {
                    required: true,
                    dateRange: true,
                },
                captcha_confirm: {
                    required: true,
                    equalTo: "#captcha",
                },
                sdt_lienhe: {
                    required: true,
                    vali_phone: true,
                },
                email_lienhe: {
                    required: true,
                    vali_email: true,
                },
            },
            messages: {
                ten_cty: {
                    required: "Vui lòng nhập tên công ty",
                },
                td_diachi: {
                    required: "Vui lòng nhập địa chỉ",
                },
                vitri_td: {
                    required: "Vui lòng nhập vị trí",
                    minlength: "Tiêu đề ít nhất 10 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                    checkTitle: "Tiêu đề tuyển dụng đã tồn tại",
                },
                nganhnghe: {
                    required: "Vui lòng chọn ngành nghề",
                },
                detail_job: {
                    required: "Vui lòng chọn chi tiết công việc",
                },
                work_type: {
                    required: "Vui lòng chọn hình thức làm việc",
                },
                td_diachi_lamviec: {
                    required: "Vui lòng nhập địa chỉ làm việc",
                },
                salary_type: {
                    required: "Vui lòng chọn hình thức trả lương",
                },
                quantity: {
                    required: "Vui lòng nhập số lượng",
                },
                mota: {
                    required: "Vui lòng nhập mô tả",
                    minlength: "Mô tả ít nhất 40 ký tự",
                    maxlength: "Mô tả nhiều nhất 10000 ký tự",
                },
                hannop: {
                    required: "Vui lòng nhập hạn nộp",
                    dateRange: "Hạn nộp phải sau ngày hôm nay",
                },
                captcha_confirm: {
                    required: "Vui lòng nhập mã xác nhận",
                    equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
                },
                sdt_lienhe: {
                    required: "Nhập số điện thoại liên hệ",
                },
                email_lienhe: {
                    required: "Nhập email liên hệ",
                },
            },
        });
        console.log($("#input_3").find("[name=dvi_tien]").val());
        if (form_tuyen_dung.valid() === true) {
            var fd = new FormData();
            fd.append('new_id', <?= $row_tt['new_id'] ?>);
            fd.append('ten_cty', $("[name=ten_cty]").val());
            // địa chỉ công ty
            fd.append('td_diachi', $("[name=td_diachi]").val());
            fd.append('tinhthanh', $("[name=td_diachi]").data('tt'));
            fd.append('quanhuyen', $("[name=td_diachi]").data('qh'));
            fd.append('phuongxa', $("[name=td_diachi]").data('px'));
            fd.append('sonha', $("[name=td_diachi]").data('sn'));

            fd.append('vitri_td', $("[name=vitri_td]").val());
            fd.append('nganhnghe', $("[name=nganhnghe]").val());
            fd.append('detail_job', $("[name=detail_job]").val());
            fd.append('work_type', $("[name=work_type]").val());
            // địa chỉ làm việc
            fd.append('td_diachi_lamviec', $("[name=td_diachi_lamviec]").val());
            fd.append('tinhthanh_lv', $("[name=td_diachi_lamviec]").data('tt'));
            fd.append('quanhuyen_lv', $("[name=td_diachi_lamviec]").data('qh'));
            fd.append('phuongxa_lv', $("[name=td_diachi_lamviec]").data('px'));
            fd.append('sonha_lv', $("[name=td_diachi_lamviec]").data('sn'));
            // mức lương
            switch ($('.muc_luong.active').data('id')) {
                case 1:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', 0);
                    break;
                case 2:
                    fd.append('salary_fr', $("#input_2").find("[name=td_gia_spham]").val().replace(/,/g, ""));
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', $("#input_2").find("[name=dvi_tien]").val());
                    break;
                case 3:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', $("#input_3").find("[name=td_gia_spham]").val().replace(/,/g, ""));
                    fd.append('salary_unit', $("#input_3").find("[name=dvi_tien]").val());
                    break;
                case 4:
                    fd.append('salary_fr', $("[name=salary_fr]").val().replace(/,/g, ""));
                    fd.append('salary_to', $("[name=salary_to]").val().replace(/,/g, ""));
                    fd.append('salary_unit', $("#input_4").find("[name=dvi_tien]").val());
                    break;
                default:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', 0);
                    break;
            }
            fd.append('salary_type', $("[name=salary_type]").val());

            fd.append('quantity', $("[name=quantity]").val());
            fd.append('mota', $("[name=mota]").val());
            fd.append('hannop', $("[name=hannop]").val());
            // thông tin thêm
            fd.append('gioitinh', $(".gioi_tinh.active").data("id"));
            fd.append('minAge', $("[name=minAge]").val());
            fd.append('maxAge', $("[name=maxAge]").val());
            fd.append('bangcap', $("[name=bangcap]").val());
            fd.append('kinhnghiem', $("[name=kinhnghiem]").val());
            fd.append('chungchi', $("[name=chungchi]").val());
            // logo công ty - logo cũ
            var logo_cu = $(".avt_xoavideo").attr("data");
            fd.append('logo_cu', logo_cu);
            // logo công ty - logo mới
            var logo = $("#upload_logo")[0].files;
            fd.append('logo', logo[0]);
            // ảnh hoạt động công ty - ảnh cũ
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            fd.append('old_files', anh_dd);
            // ảnh hoạt động công ty - ảnh mới
            for (var i = 0; i < arr_anh.length; i++) {
                if (arr_anh[i] != 'undefined') {
                    fd.append('files[]', arr_anh[i]);
                }
            }
            fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
            fd.append('email_lhe', $("input[name='email_lienhe']").val());
            $.ajax({
                url: '/ajax/dangtin_tim_ungvien.php',
                type: 'POST',
                data: fd,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(data) {
                    alert(data.msg);
                    if (data.result == true) {
                        if (user_type == 5) {
                            window.location = "/ho-so-quan-ly-tin-tim-ung-vien.html";
                        } else {
                            window.location = "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-tim-ung-vien.html";
                        }
                    }
                }
            });
        } else {

        }
    });

    function slide_slick() {
        $('.slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            Accessibility: true,
            adaptiveHeight: false,
            asNavFor: '.slider-nav',
            arrows: true,
            autoplay: true,
            respondTo: '.slider',
            nextArrow: '<div class="slide_control next_slide"><i class="ic-next"></i></div>',
            prevArrow: '<div class="slide_control prev_slide"><i class="ic-prev"></i></div>'
        });
        $('.slider-nav').slick({
            asNavFor: '.slider',
            slidesToShow: 3,
            slidesToScroll: 1,
            focusOnSelect: true,
            slide: '.anh_ben',
            vertical: true,
            verticalSwiping: true,
            centerMode: true,
        });
    }



    $(".td-xem-truoc").click(function() {
        var form_tuyen_dung = $("#form_tuyen_dung");
        form_tuyen_dung.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                ten_cty: {
                    required: true,
                },
                td_diachi: {
                    required: true,
                },
                vitri_td: {
                    required: true,
                    minlength: 10,
                    maxlength: 70,
                    checkTitle: true,
                },
                nganhnghe: {
                    required: true,
                },
                detail_job: {
                    required: true,
                },
                work_type: {
                    required: true,
                },
                td_diachi_lamviec: {
                    required: true,
                },
                td_gia_spham: {
                    requiredSalary: true,
                    validSalary: true,
                },
                salary_fr: {
                    requiredSalary: true,
                    validSalary: true,
                },
                salary_type: {
                    required: true,
                },
                quantity: {
                    required: true,
                },
                mota: {
                    required: true,
                    minlength: 40,
                    maxlength: 10000,
                },
                hannop: {
                    required: true,
                    dateRange: true,
                },
                captcha_confirm: {
                    required: true,
                    equalTo: "#captcha",
                },
                sdt_lienhe: {
                    required: true,
                    vali_phone: true,
                },
                email_lienhe: {
                    required: true,
                    vali_email: true,
                },
            },
            messages: {
                ten_cty: {
                    required: "Vui lòng nhập tên công ty",
                },
                td_diachi: {
                    required: "Vui lòng nhập địa chỉ",
                },
                vitri_td: {
                    required: "Vui lòng nhập vị trí",
                    minlength: "Tiêu đề ít nhất 10 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                    checkTitle: "Tiêu đề tuyển dụng đã tồn tại",
                },
                nganhnghe: {
                    required: "Vui lòng chọn ngành nghề",
                },
                detail_job: {
                    required: "Vui lòng chọn chi tiết công việc",
                },
                work_type: {
                    required: "Vui lòng chọn hình thức làm việc",
                },
                td_diachi_lamviec: {
                    required: "Vui lòng nhập địa chỉ làm việc",
                },
                salary_type: {
                    required: "Vui lòng chọn hình thức trả lương",
                },
                quantity: {
                    required: "Vui lòng nhập số lượng",
                },
                mota: {
                    required: "Vui lòng nhập mô tả",
                    minlength: "Mô tả ít nhất 40 ký tự",
                    maxlength: "Mô tả nhiều nhất 10000 ký tự",
                },
                hannop: {
                    required: "Vui lòng nhập hạn nộp",
                    dateRange: "Hạn nộp phải sau ngày hôm nay",
                },
                captcha_confirm: {
                    required: "Vui lòng nhập mã xác nhận",
                    equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
                },
                sdt_lienhe: {
                    required: "Nhập số điện thoại liên hệ",
                },
                email_lienhe: {
                    required: "Nhập email liên hệ",
                },
            },
        });
        if (form_tuyen_dung.valid() === false) {
            event.preventDefault();
            event.stopPropagation();
            var errorElements = $("span.error");
            for (let index = 0; index < errorElements.length; index++) {
                if ($(errorElements[index]).find("label").text() != "") {
                    const element = errorElements[index];
                    $('html, body').animate({
                        scrollTop: $(errorElements[index]).offset().top - 80
                    }, 1000);
                    return false;
                }
            }
        }
        if (form_tuyen_dung.valid() === true) {
            var tuoi_tu = $("input[name='minAge']").val();
            var tuoi_den = $("input[name='maxAge']").val();
            if (tuoi_tu != "" && tuoi_den != "") {
                if (tuoi_tu > tuoi_den) {
                    $(".error_dotuoi").text("Độ tuổi tối thiểu nhỏ hơn độ tuổi tối đa");
                    return false;
                }
            }
            var fd = new FormData();
            fd.append('id_dm', $(".dmuc-spham").attr("data"));
            fd.append('ten_cty', $("[name=ten_cty]").val());
            // địa chỉ công ty
            fd.append('td_diachi', $("[name=td_diachi]").val());

            fd.append('vitri_td', $("[name=vitri_td]").val());
            fd.append('nganhnghe', $("[name=nganhnghe]").val());
            fd.append('detail_job', $("[name=detail_job]").val());
            fd.append('work_type', $("[name=work_type]").val());
            // địa chỉ làm việc
            fd.append('td_diachi_lamviec', $("[name=td_diachi_lamviec]").val());
            // mức lương
            switch ($('.muc_luong.active').data('id')) {
                case 1:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', 0);
                    break;
                case 2:
                    fd.append('salary_fr', $("#input_2").find("[name=td_gia_spham]").val().replace(/,/g, ""));
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', $("#input_2").find("[name=dvi_tien]").val());
                    break;
                case 3:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', $("#input_3").find("[name=td_gia_spham]").val().replace(/,/g, ""));
                    fd.append('salary_unit', $("#input_3").find("[name=dvi_tien]").val());
                    break;
                case 4:
                    fd.append('salary_fr', $("[name=salary_fr]").val().replace(/,/g, ""));
                    fd.append('salary_to', $("[name=salary_to]").val().replace(/,/g, ""));
                    fd.append('salary_unit', $("#input_4").find("[name=dvi_tien]").val());
                    break;
                default:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', 0);
                    break;
            }
            fd.append('salary_type', $("[name=salary_type]").val());

            fd.append('quantity', $("[name=quantity]").val());
            fd.append('mota', $("[name=mota]").val());
            fd.append('hannop', $("[name=hannop]").val());
            // thông tin thêm
            fd.append('gioitinh', $(".gioi_tinh.active").data("id"));
            fd.append('minAge', $("[name=minAge]").val());
            fd.append('maxAge', $("[name=maxAge]").val());
            fd.append('bangcap', $("[name=bangcap]").val());
            fd.append('kinhnghiem', $("[name=kinhnghiem]").val());
            fd.append('chungchi', $("[name=chungchi]").val());
            // logo công ty
            var logo = $("#upload_logo")[0].files;
            // ảnh hoạt động công ty
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            fd.append('arr_src', arr_src.concat(anh_dd));
            $.ajax({
                url: '/render/xem_truoc_tdvl.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    $(".v_container").html(data);
                    $(".v_container").removeClass("d_none");
                    $(".tindang-container").addClass("d_none");
                    slide_slick();
                }
            });
        }
    })
</script>

</html>