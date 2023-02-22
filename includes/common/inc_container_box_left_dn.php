<?
$a = ['/ho-so-gian-hang-chinh-sua-thong-tin.html', '/ho-so-gian-hang-cua-toi-dang-gia.html', '/ho-so-gian-hang-cua-toi-trang-chu.html'];
// $b = ['','','','',]
?>

<div class="khoitrai_gh khoitrai_gh_df">
    <div class="hs_768_df3 menu-top">
        <div class="hs_768_df3_them_div">
            <div class="avt_nguoiban">
                <? if ($user_logo != "") { ?>
                    <img src="<?= $user_logo ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                <? } else { ?>
                    <img src="/images/anh_moi/avatar.png" alt="">
                <? } ?>
            </div>
            <div class="df_text_ttngdung">
                <h3 class="color_text font-16 name_user_gh"><?= $usc_store_name ?></h3>
                <div class="thongtin_ngban">
                    <p>Tài khoản doanh nghiệp</p>
                    <p>Tham gia: <span><?= $user_time; ?></span></p>
                    <p>Số dư:
                        <? if ($user_money != '') { ?>
                            <span class="color_cam font-bold"><?= number_format($user_money) ?> VNĐ</span>
                        <? } else { ?>
                            <span class="color_cam font-bold">0</span>
                        <? } ?>
                    </p>
                </div>
            </div>
        </div>
        <div class="icon_down_d768 show_menu_768">
            <img src="../images/anh_moi/down768.svg" alt="">
        </div>
    </div>
    <div id="id_active" class="them_cl_new hide_768 menu-bot">
        <a href="/ho-so-gian-hang-cua-toi-trang-chu.html" class="d_flex khoi_list_thongtin <?= (in_array($_SERVER['REDIRECT_URL'], $a)) ? "active" : "" ?>">
            <span class="item-icf"><?= $icon_gianhang ?></span>
            <p class="font-dam font-16 tt_thongtin">Gian hàng của tôi</p>
        </a>
        <?php
        $url = $_SERVER['REDIRECT_URL'];
        $arr_tinmua = [
            "/ho-so-quan-ly-tin-mua.html",
            "/ho-so-quan-ly-tin-mua/tin-con-han.html",
            "/ho-so-quan-ly-tin-mua/tin-het-han.html",
            "/ho-so-quan-ly-tin-mua/tin-dang-an.html",
            "/danh-sach-nha-thau.html",
            "/quan-ly-don-hang-mua.html",
            "/quan-ly-don-hang-dang-xu-ly-nguoi-mua.html",
            "/quan-ly-don-hang-dang-giao-nguoi-mua.html",
            "/quan-ly-don-hang-da-giao-nguoi-mua.html",
            "/quan-ly-don-hang-da-huy-nguoi-mua.html",
            "/quan-ly-don-hang-hoan-tat-nguoi-mua.html"
        ];
        $arr_tinban = [
            "/ho-so-quan-ly-tin-ban.html",
            "/quan-ly-don-hang-ban.html",
            "/quan-ly-don-hang-dang-xu-ly.html",
            "/quan-ly-don-hang-dang-giao.html",
            "/quan-ly-don-hang-da-giao.html",
            "/quan-ly-don-hang-da-huy.html",
            "/quan-ly-don-hang-hoan-tat.html"
        ];
        $arr_tintvl = [
            "/ho-so-quan-ly-tin-tim-viec-lam.html",
        ];
        $arr_tintuv = [
            "/ho-so-quan-ly-tin-tim-ung-vien.html",
        ];
        $arr_tinbid = [
            "/ho-so-quan-ly-tin-dang-du-thau.html",
        ];
        $arr_tinapply = [
            "/ho-so-quan-ly-tin-dang-ung-tuyen.html",
        ];

        $arr_ql_tin = array_merge($arr_tinmua, $arr_tinban, $arr_tintvl, $arr_tintuv, $arr_tinbid, $arr_tinapply);
        ?>
        <a class="d_flex khoi_list_thongtin n_khoi_list_thongtin<?=in_array($url, $arr_ql_tin) ? " active" : ""?>">
            <span class="item-icf"><?= $ql_tin_dn; ?></span>
            <p class="font-dam font-16 tt_thongtin">Quản lý tin</p>
        </a>
        <div class="n_drop_content<?=in_array($url, $arr_ql_tin) ? "" : " d_none"?>">
            <a href="/ho-so-quan-ly-tin-ban.html" class="<?=in_array($url,$arr_tinban)?"active":""?>">Tin bán</a>
            <a href="/ho-so-quan-ly-tin-mua.html" class="<?=in_array($url,$arr_tinmua)?"active":""?>">Tin mua</a>
            <a href="/ho-so-quan-ly-tin-tim-viec-lam.html" class="<?=in_array($url,$arr_tintvl)?"active":""?>">Tin tìm việc làm</a>
            <a href="/ho-so-quan-ly-tin-tim-ung-vien.html" class="<?=in_array($url,$arr_tintuv)?"active":""?>">Tin tìm ứng viên</a>
            <a href="/ho-so-quan-ly-tin-dang-du-thau.html" class="<?=in_array($url,$arr_tinbid)?"active":""?>">Tin đang dự thầu</a>
            <a href="/ho-so-quan-ly-tin-dang-ung-tuyen.html" class="<?=in_array($url,$arr_tinapply)?"active":""?>">Tin đang ứng tuyển</a>
        </div>
        <?php
            $arr_can_apply = ['/ung-vien-ung-tuyen.html'];
        ?>
        <a class="d_flex khoi_list_thongtin n_khoi_list_thongtin<?= in_array($_SERVER['REDIRECT_URL'], $arr_can_apply) ? " active" : "" ?>">
            <span class="item-icf"><?= $ic_ungvien_ut ?></span>
            <p class="font-dam font-16 tt_thongtin">Ứng viên ứng tuyển</p>
        </a>
        <?php
        $arr_tinlike = ['/ho-so-gian-hang-tin-mua-da-yeu-thich.html', '/ho-so-gian-hang-tin-ban-da-yeu-thich.html'];
        ?>
        <a class="d_flex khoi_list_thongtin n_khoi_list_thongtin<?= in_array($_SERVER['REDIRECT_URL'], $arr_tinlike) ? " active" : "" ?>">
            <span class="item-icf"><?= $icon_tinyt ?></span>
            <p class="font-dam font-16 tt_thongtin">Tin đã yêu thích</p>
        </a>
        <div class="n_drop_content<?= in_array($_SERVER['REDIRECT_URL'], $arr_tinlike) ? "" : " d_none" ?>">
            <a href="/ho-so-gian-hang-tin-mua-da-yeu-thich.html" class="<?=($url=="/ho-so-gian-hang-tin-mua-da-yeu-thich.html")?"active":""?>">Tin bán</a>
            <a href="/ho-so-gian-hang-tin-ban-da-yeu-thich.html" class="<?=($url=="/ho-so-gian-hang-tin-ban-da-yeu-thich.html")?"active":""?>">Tin mua</a>
        </div>
        <a href="ho-so-gian-hang-dich-vu-quang-cao.html" class="d_flex khoi_list_thongtin">
            <span class="item-icf"><?= $icon_dichvu_qcao ?></span>
            <p class="font-dam font-16 tt_thongtin">Dịch vụ quảng cáo</p>
        </a>
        <a href="ho-so-gian-hang-lich-su-giao-dich.html" class="d_flex khoi_list_thongtin">
            <span class="item-icf"><?= $icon_naptien ?></span>
            <p class="font-dam font-16 tt_thongtin">Lịch sử giao dịch</p>
        </a>
        <a href="ho-so-gian-hang-nap-tien-vao-tai-khoan.html" class="d_flex khoi_list_thongtin">
            <span class="item-icf"><?= $napdoanhnghiep; ?></span>
            <p class="font-dam font-16 tt_thongtin">Nạp tiền vào tài khoản</p>
        </a>
        <a href="ho-so-gian-hang-doi-mat-khau.html" class="d_flex khoi_list_thongtin">
            <span class="item-icf"><?= $icon_rtvbm ?></span>
            <p class="font-dam font-16 tt_thongtin">Đổi mật khẩu</p>
        </a>
        <a href="" class="d_flex khoi_list_thongtin">
            <span class="item-icf-fill"><?= $icon_cdoi365 ?></span>
            <p class="font-dam font-16 tt_thongtin">Chuyển đổi số 365</p>
        </a>
    </div>
</div>