<?
include("config.php");
$id_dm = getValue('id_dm', 'int', 'POST', 0);

$tieu_de = getValue('title', 'str', 'POST', '');
$tieu_de = sql_injection_rp($tieu_de);
$tieu_de = removeEmoji($tieu_de);

$dia_chi_lv = getValue('td_diachi_lamviec', 'str', 'POST', '');
$gioi_tinh = getValue('gioitinh', 'int', 'POST', 0);
$tuoi = getValue('tuoi', 'int', 'POST', 0);
$nganhnghe = getValue('nganhnghe', 'int', 'POST', 0);
$hinhthuc_lviec = getValue('work_type', 'int', 'POST', 0);
$gia_bd = getValue('salary_fr', 'str', 'POST', '');
$gia_kt = getValue('salary_to', 'str', 'POST', '');
$donvi_tien = getValue('salary_unit', 'int', 'POST', 0);
$hinhthuc_trluong = getValue('salary_type', 'int', 'POST', 0);
$bangcap = getValue('bangcap', 'int', 'POST', 0);
$kinhnghiem = getValue('kinhnghiem', 'int', 'POST', 0);
$chungchi = getValue('chungchi', 'str', 'POST', '');

$mota = getValue('mota', 'str', 'POST', '');
$mota = sql_injection_rp($mota);
$mota = removeEmoji($mota);


$hthuc_lamviec = array(
    1 => 'Toàn thời gian',
    2 => 'Bán thời gian',
    3 => 'Giờ hành chính',
    4 => 'Ca sáng',
    5 => 'Ca chiều',
    6 => 'Ca đêm',
);

$hthuc_trluong = array(
    1 => 'Theo giờ',
    2 => 'Theo ngày',
    3 => 'Theo tuần',
    4 => 'Theo tháng',
    5 => 'Theo năm',
);

$bang_cap = array(
    1 => 'Đại học',
    2 => 'Cao đăng',
    3 => 'Lao động phổ thông',
);

$kinh_nghiem = array(
    1 => 'Chưa có kinh nghiệm',
    2 => 'Kinh nghiệm từ 1-2 năm',
    3 => 'Kinh nghiệm trên 2 năm',
);

$gtinh = array(
    '0' => 'Không yêu cầu',
    '1' => 'Nam',
    '2' => 'Nữ',
);

$ten_cty = getValue('ten_cty', 'str', 'POST', '');
$td_diachi = getValue('td_diachi', 'str', 'POST', '');
$vitri_td = getValue('vitri_td', 'str', 'POST', '');
$ctiet_cviec = getValue('detail_job', 'int', 'POST', '');
$so_luong = getValue('quantity', 'int', 'POST', 0);
$hannop = strtotime($_POST['hannop']);
$tu_tuoi = getValue('minAge', 'int', 'POST', 0);
$den_tuoi = getValue('maxAge', 'int', 'POST', 0);
$logo = $_POST['logo'];
$arr_src = $_POST['arr_src'];
$avt_anh = explode(',', $arr_src);
if ($id_dm != 0) {
?>
    <div class="v_product v_product_df_7-7">
        <div class="product_container">
            <div class="slide_show">
                <div class="slider">
                    <? for ($i = 0; $i < count($avt_anh); $i++) { ?>
                        <img src="<?= $avt_anh[$i] ?>" class="avt_sp_pto">
                    <? } ?>
                </div>
                <div class="slider-nav">
                    <? for ($i = 0; $i < count($avt_anh); $i++) { ?>
                        <img class="mb-10 mt-10 anh_ben" src="<?= $avt_anh[$i] ?>">
                    <? } ?>
                </div>
            </div>
            <div class="pc_name w-100">
                <p><?= $tieu_de ?></p>
            </div>
            <div class="w-100 d-flex space-between mt-20">
                <? if ($gia_bd != 0 && $gia_kt != 0) { ?>
                    <p class="pc_price fs_26_30">
                        <?= number_format($gia_bd) ?> - <?= number_format($gia_kt) ?> <?= $arr_dvtien[$donvi_tien] ?>
                    </p>
                <? } else if ($gia_bd != 0 && $gia_kt == 0) { ?>
                    <p class="pc_price fs_26_30">
                        Từ <?= number_format($gia_bd) ?> <?= $arr_dvtien[$donvi_tien] ?>
                    </p>
                <? } else if ($gia_bd == 0 && $gia_kt != 0) { ?>
                    <p class="pc_price fs_26_30">
                        Đến <?= number_format($gia_kt) ?> <?= $arr_dvtien[$donvi_tien] ?>
                    </p>
                <? } else { ?>
                    <p class="pc_price fs_26_30">
                        Thỏa thuận
                    </p>
                <? } ?>
            </div>
            <? if ($id_dm == 121) { ?>
                <p class="diadiem_tviec sh_size_one mt-20"><?= $dia_chi_lv ?></p>
            <? } ?>

            <? if ($id_dm == 120) { ?>
                <div class="anhcty_diadiem d_flex mt-20">
                    <div class="diadiem_cty">
                        <p class="ten_cty mb_10 sh_size_one"><?= $ten_cty ?></p>
                        <p class="ddiem_cty sh_size_one"><?= $td_diachi ?></p>
                    </div>
                </div>
            <? } ?>
            <div class="ttin_vieclam">
                <? if ($id_dm == 121) { ?>
                    <div class="ttin_dangtuyen">
                        <h2 class="pc_title pl-10">Thông tin cơ bản</h2>
                        <div class="tinngan_dtuyen">
                            <p class="gthieu_moto word_br"><?= nl2br($mota) ?></p>
                            <p class="hienso_nhtuyend">Bấm gọi ngay: <span class="hien_so"><?= substr_replace('0987654', '*****', -5) ?></span>
                                <span data="" class="cl_hienso op_ovl_dn">Hiện số</span>
                            </p>
                            <div class="ctiet_utuyen w_100">
                                <div class="ungtuyen d-flex w_100">
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/gioitinh.png">Giới tính: <?= ($gioi_tinh == 1) ? "Nam" : "Nữ" ?></p>
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/do_tuoi.png">Tuổi: <?= $tuoi ?></p>
                                </div>
                                <div class="ungtuyen d-flex w_100">
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/nganhnghe.png">Ngành nghề: <?= $db_cat_vl[$nganhnghe]['cat_name'] ?></p>
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/hthuc_lv.png">Hình thức làm việc: <?= $hthuc_lamviec[$hinhthuc_lviec] ?></p>
                                </div>
                                <div class="ungtuyen d-flex w_100">
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/hthuc_tluong.png">Hình thức trả lương: <?= $hthuc_trluong[$hinhthuc_trluong] ?></p>
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/kinhnghiem.png">Kinh nghiệm: <?= $kinh_nghiem[$kinhnghiem] ?></p>
                                </div>
                                <div class="ungtuyen d-flex w_100">
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/bang_cap.png">Bằng cấp: <?= $bang_cap[$bangcap] ?></p>
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/chungchi.png">Chứng chỉ: <?= $chungchi ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } else if ($id_dm == 120) { ?>
                    <div class="ttin_dangtuyen">
                        <h2 class="pc_title pl-10">Thông tin đăng tuyển</h2>
                        <div class="tinngan_dtuyen">
                            <p class="gthieu_moto word_br"><?= nl2br($mota) ?></p>
                            <p class="hienso_nhtuyend">Bấm gọi ngay: <span class="hien_so"><?= substr_replace('0987654', '*****', -5) ?></span>
                                <span data="" class="cl_hienso op_ovl_dn">Hiện số</span>
                            </p>
                            <div class="ctiet_utuyen w_100">
                                <div class="ungtuyen d-flex w_100">
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/nganhnghe.png">Ngành nghề: <?= $db_cat_vl[$nganhnghe] ?></p>
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/ctiet_cviec.png">Chi tiết công việc: <?= $db_tags_vl[$ctiet_cviec] ?></p>
                                </div>
                                <div class="ungtuyen d-flex w_100">
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/hthuc_lv.png">Hình thức làm việc: <?= $hthuc_lamviec[$hinhthuc_lviec] ?></p>
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/hthuc_tluong.png">Hình thức trả lương: <?= $hthuc_trluong[$hinhthuc_trluong] ?></p>
                                </div>
                                <div class="ungtuyen d-flex w_100">
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/sluong_tuyen.png">Số lượng cần tuyển: <?= $so_luong ?></p>
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/han_nop.png">Hạn nộp: <?= date('d/m/Y', $hannop) ?></p>
                                </div>
                            </div>
                            <p class="ddiem_lamviec ttin_tvutuyen w_100 d-flex"><img src="/images/anh_moi/diadiem_lv.png">Địa điểm làm việc: <?= $dia_chi_lv ?></p>
                        </div>
                    </div>
                    <div class="ttin_them">
                        <h2 class="pc_title pl-10">Thông tin thêm</h2>
                        <div class="tinngan_dtuyen">
                            <div class="ctiet_utuyen w_100">
                                <div class="ungtuyen d-flex w_100">
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/gioitinh.png">Giới tính: <?= $gtinh[$gioi_tinh] ?></p>
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/do_tuoi.png">Độ tuổi:
                                        <?= ($tu_tuoi != 0) ?  $tu_tuoi : "" ?> <?= ($tu_tuoi != 0 && $den_tuoi != 0) ? '-' : '' ?> <?= ($den_tuoi != 0) ? $den_tuoi : "" ?>
                                    </p>
                                </div>
                                <div class="ungtuyen d-flex w_100">
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/bang_cap.png">Bằng cấp: <?= $bang_cap[$bangcap] ?></p>
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/kinhnghiem.png">Kinh nghiệm: <?= $kinh_nghiem[$kinhnghiem] ?></p>
                                </div>
                                <div class="ungtuyen d-flex w_100">
                                    <p class="d-flex ttin_tvutuyen"><img src="/images/anh_moi/chungchi.png">Chứng chỉ: <?= $chungchi ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        </div>
    </div>
    <div class="df_khoi_div_to_btn_7_7">
        <button class="df_khoi_div_con_btn_7_7 btn1 quay_lai">CHỈNH SỬA</button>
        <button class="df_khoi_div_con_btn_7_7 btn2 dang_tindi">ĐĂNG TIN</button>
    </div>
<? } ?>

<script>
    $(".quay_lai").click(function() {
        $(".v_container").addClass("d_none");
        $(".v_container").html('');
        $(".dang-tin-uv").removeClass("d_none");
        $(".tindang-container").removeClass("d_none");
    });

    $(".dang_tindi").click(function() {
        $(".dang-tin").click();
        $(".dang_tin_td").click();
    });
</script>