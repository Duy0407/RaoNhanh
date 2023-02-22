<?
include('config.php');
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];
    $id_dm = getValue('id_dm', 'int', 'POST', 0);

    $list_ten = new db_query("SELECT `cat_parent_id`, `cat_name`  FROM `category` WHERE `cat_id` = $id_dm ");
    $row_dmuc = mysql_fetch_assoc($list_ten->result);
    $cat_parent_id = $row_dmuc['cat_parent_id'];
    $cat_name = $row_dmuc['cat_name'];
    if ($cat_parent_id != 0) {
        $ten_dmcha = mysql_fetch_assoc((new db_query("SELECT `cat_name`  FROM `category` WHERE `cat_id` = $cat_parent_id "))->result)['cat_name'];
    } else {
        $ten_dmcha = '';
    };

    $tieu_de = getValue('tieu_de', 'str', 'POST', '');
    $tieu_de = sql_injection_rp($tieu_de);

    $ho_ten = getValue('ho_ten', 'str', 'POST', '');
    $ho_ten = sql_injection_rp($ho_ten);
    // dia chi mua hang
    $dia_chi = getValue('dia_chi', 'str', 'POST', '');
    $dia_chi = sql_injection_rp($dia_chi);
    // end
    // dia diem nop ho so
    $diadiem_nop = getValue('diadiem_nop', 'str', 'POST', '');

    $mo_ta = getValue('mota', 'str', 'POST', '');
    $mo_ta = sql_injection_rp($mo_ta);

    $gia_bdau = getValue('salary_fr', 'str', 'POST', '');
    $gia_kthuc = getValue('salary_to', 'str', 'POST', '');
    $donvi_tien = getValue('salary_unit', 'int', 'POST', 0);
    $tinh_trang = getValue('tinh_trang', 'int', 'POST', 0);
    $hinhthuc_nop = getValue('hinhthuc_nop', 'int', 'POST', 0);

    $noidung_nhs = getValue('noidung_thau', 'str', 'POST', '');
    $noidung_nhs = sql_injection_rp($noidung_nhs);

    $tgian_bdau = getValue('tgian_bdau', 'str', 'POST', '');
    $tgian_bdau = strtotime($tgian_bdau);

    $tgian_kthuc = getValue('tgian_kthuc', 'str', 'POST', '');
    $tgian_kthuc = strtotime($tgian_kthuc);

    $tbao_bd_thau = getValue('tbao_bd_thau', 'str', 'POST', '');
    $tbao_bd_thau = strtotime($tbao_bd_thau);

    $tbao_kt_thau = getValue('tbao_kt_thau', 'str', 'POST', '');
    $tbao_kt_thau = strtotime($tbao_kt_thau);

    $chidan_timhieu = getValue('chidan_timhieu', 'str', 'POST', '');
    $chidan_timhieu = sql_injection_rp($chidan_timhieu);

    $phidu_thau = getValue('phidu_thau', 'str', 'POST', '');
    $dvi_thau = getValue('dvi_thau', 'int', 'POST', 0);

    $avt_anh = $_POST['avt_anh'];
    if ($avt_anh != "") {
        $avt_anh = explode(',', $avt_anh);
        $cou_file  = count($avt_anh);
    } else {
        $cou_file = 0;
    };

    $file_mota = $_FILES['file_mota']['name'];
    $file_thutuc = $_FILES['file_thutuc']['name'];
    $file_hoso = $_FILES['file_hoso']['name'];


    if ($id_dm != 0) {
        if ($file_mota != "") {
            $filemota = time() . '_' . str_replace(' ', '_', $_FILES['file_mota']['name']);
            $file_mota1 = 'avt_tindangmua/' . $filemota;
            $filetmp_name_mt = $_FILES['file_mota']['tmp_name'];
        } else {
            $file_mota1 = "";
        };

        if ($file_thutuc != "") {
            $filethutuc = time() . '_' . str_replace(' ', '_', $_FILES['file_thutuc']['name']);
            $file_thutuc1 = 'avt_tindangmua/' . $filethutuc;
            $filetmp_name_tt = $_FILES['file_thutuc']['tmp_name'];
        } else {
            $file_thutuc1 = "";
        };

        if ($file_hoso != "") {
            $filehoso = time() . '_' . str_replace(' ', '_', $_FILES['file_hoso']['name']);
            $file_hoso1 = 'avt_tindangmua/' . $filehoso;
            $filetmp_name_hs = $_FILES['file_hoso']['tmp_name'];
        } else {
            $file_hoso1 = "";
        }; ?>
        <div class="v_product v_product_df_7-7 d_flex direc_col">
            <div class="product_container">
                <div class="pc_header d-flex space-between pad_b20">
                    <div class="pc_head-left">
                        <ul class="v-breadcrumb">
                            <li><a href="/">Trang chủ</a></li>
                            <li><a href="#"><?= $cat_name ?></a></li>
                            <? if ($ten_dmcha != "") { ?>
                                <li><a href="#"><?= $ten_dmcha ?></a></li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
                <div class="dang-tin-uv-anh slide_show">
                    <div class="slider df_relative">
                        <? if ($cou_file > 0) {
                            for ($i = 0; $i < $cou_file; $i++) { ?>
                                <img class="w_100" src="<?= $avt_anh[$i] ?>" alt="">
                            <? }
                        } else { ?>
                            <img class="w_100" src="/images/anh_moi/banner.png" alt="">
                        <? } ?>
                    </div>
                </div>
                <div class="pc_name w-100">
                    <p class="pad_b20"><?= $tieu_de ?></p>
                </div>
                <div class="dang-tin-uv-luong ">
                    <div class="luong-trai d_f-g9">
                        <? if ($gia_bdau != 0 && $gia_kthuc == 0) { ?>
                            <p class="luong-tu pad_0">Từ <?= number_format($gia_bdau) ?> <?= $arr_dvtien[$donvi_tien] ?></p>
                        <? } else if ($gia_bdau == 0 && $gia_kthuc != 0) { ?>
                            <p class="luong-tu pad_0">Đến <?= number_format($gia_kthuc) ?> <?= $arr_dvtien[$donvi_tien] ?></p>
                        <? } else if ($gia_bdau != 0 && $gia_kthuc != 0) { ?>
                            <p class="luong-tu pad_0">Từ <?= number_format($gia_bdau) ?> - <?= number_format($gia_kthuc) ?> <?= $arr_dvtien[$donvi_tien] ?></p>
                        <? } ?>
                        <label class="al_items-c" for="">
                            <img src="../images/dang-tin-mua/user1.svg" alt="">
                            <p class="vitri-vl"><?= $ho_ten ?></p>
                        </label>
                        <label class="al_items-c" for="">
                            <img src="../images/dang-tin-mua/bxs_map.svg" alt="">
                            <p class="vitri-vl"><?= $dia_chi ?></p>
                        </label>
                    </div>
                </div>
                <div class="tt-dau-thau">
                    <p class="tt-dau-thau-1">Thông tin đấu thầu</p>
                    <p class="chu-1 font_w600 color_gray47">Mô tả sản phẩm</p>
                    <p class="chu-2 color_gray47 mt10"><?= $mo_ta ?></p>
                    <div class="up-file">
                        <? if ($file_mota != "") { ?>
                            <label class="tai_lieu"><span class="shownamefile1"><?= $filemota ?></span>
                                <img src="../images/dang-tin-mua/upload-cloud-red.svg" alt="" style="float: right; padding-left:10px">
                            </label>
                        <? } ?>
                    </div>
                </div>
                <div class="tinh-trang">
                    <p class="chu-1 font_w600 color_gray47">Tình trạng</p>
                    <p class="chu-2 color_blue4c font_w500 mt10"><?= ($tinh_trang == 1) ? "Cũ" : "Mới(chưa qua sử dụng)" ?></p>
                </div>
                <div class="thu-tuc mt20">
                    <div class="thu-tuc-1">
                        <p class="chu-1 font_w600 color_gray47">Thủ tục nộp hồ sơ mời thầu:
                        <div class="chon-on-off">
                            <div class="loaihoso"><?= ($noidung_nhs != "") ? "Online" : "Offline" ?> </div>
                        </div>
                    </div>
                    </p>
                    <? if ($noidung_nhs != "") { ?>
                        <p class="chu-1 color_666"><?= $noidung_nhs ?></p>
                    <? }
                    if ($diadiem_nop != "") { ?>
                        <p class="chu-1 color_666"><?= $diadiem_nop ?></p>
                    <? } ?>
                    <div class="up-file">
                        <? if ($file_thutuc != "") { ?>
                            <label class="tai_lieu"><span class="shownamefile2"><?= $filethutuc ?></span>
                                <img src="../images/dang-tin-mua/upload-cloud-red.svg" alt="" style="float: right; padding-left:10px">
                            </label>
                        <? } ?>
                    </div>

                </div>
                <div class="tg-batdau mt10">
                    <p class="chu-1 font_w600 color_gray47">Thời gian bắt đầu nhận hồ sơ mời thầu:</p>
                    <p class="chu-1 color_blue4c font_w500 mt10"><?= date('d/m/Y', $tgian_bdau) ?></p>
                </div>
                <div class="tg-ketthuc mt10">
                    <p class="chu-1 font_w600 color_gray47">Thời gian kết thúc nhận hồ sơ mời thầu:</p>
                    <p class="chu-1 color_blue4c font_w500 mt10"><?= date('d/m/Y', $tgian_kthuc) ?></p>
                </div>
                <div class="thoihan-bao-kq mt10">
                    <p class="chu-1 font_w600 color_gray47">Thời hạn thông báo kết quả trúng thầu:</p>
                    <p class="chu-1 color_blue4c font_w500 mt10"><?= date('d/m/Y', $tbao_bd_thau) ?> - <?= date('d/m/Y', $tbao_kt_thau) ?></p>
                </div>
                <div class="chi-dan mt10">
                    <p class="chu-1 font_w600 color_gray47">Chỉ dẫn tìm hiểu hồ sơ mời thầu:</p>
                    <p class="chu-1 color_gray47 mt10"><?= $chidan_timhieu ?></p>
                    <div class="up-file">
                        <? if ($file_hoso != "") { ?>
                            <label class="tai_lieu"><span class="shownamefile2"><?= $filehoso ?></span>
                                <img src="../images/dang-tin-mua/upload-cloud-red.svg" alt="" style="float: right; padding-left:10px">
                            </label>
                        <? } ?>
                    </div>
                </div>
                <div class="phi-du-thau">
                    <p class="chu-1 font_w600 color_gray47">Phí dự thầu</p>
                    <p class="chu-1 color_blue4c font_w500 pad_t10"><?= ($phidu_thau != "") ? number_format($phidu_thau) : "" ?> <?= ($phidu_thau != "") ? $arr_dvtien[$dvi_thau] : "" ?></p>
                </div>
            </div>
            <div class="btn-tinmua d_flex gap20 mt30 m0-auto">
                <button type="button" class="btn-mua1" onclick="chinhsua()">
                    <p class="btn-chu">Chỉnh sửa</p>
                </button>
                <button type="button" class="btn-mua2" onclick="tieptuc()">
                    <p class="btn-chu">Đăng tin</p>
                </button>
            </div>
        </div>
<? }
} ?>