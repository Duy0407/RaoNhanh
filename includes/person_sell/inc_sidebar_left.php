<?php
include('../inc_new/icon.php');
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 1) {
        $ht_tt = new db_query("SELECT `usc_id`,`usc_name`,`usc_type`,`usc_logo`,`usc_time`,`usc_money` FROM `user` WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_money = $kn_tt['usc_money'];
        $usc_time = $kn_tt['usc_time'];
        $usc_logo = $kn_tt['usc_logo'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d/m/Y', $usc_time);
        }
        $usc_type = $kn_tt['usc_type'];
        $arr_type = array(1 => 'cá nhân', 5 => "doanh nghiệp");

        $arr_tindang = ['/ho-so-nguoi-ban-ca-nhan/quan-ly-tin.html', '/xac-thuc-tai-khoan-ngan-hang.html', '/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-mua.html'];

        $arr_tinytb = ['/ho-so-nguoi-ban-ca-nhan/tin-da-yeu-thich.html', '/ho-so-nguoi-ban-ca-nhan/tin-mua-yeu-thich.html'];
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}


?>
<div class="box-left">
    <div class="menu-top menu-top_df">
        <div class="anh anhcon_df_dl">
            <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= $usc_logo; ?>" class="lazyload img-detail-prf">
        </div>
        <div class="chu">
            <div class="hvt"><a href="/ca-nhan/<?= $_COOKIE['UID'] ?>/<?= replaceTitle($usc_name) ?>.html"><?= $usc_name; ?></a></div>
            <div class="chu_fig_dl">
                <div class="tk-ca-nhan">Tài khoản <?= $arr_type[$usc_type]; ?></div>
                <div class="date-profile">Tham gia: <?= $usc_time; ?></div>
                <div class="so-du">Số dư: <span class="tien-so-du"><?= number_format($usc_money) ?> VND</span></div>
            </div>
        </div>
        <div class="mui-ten">
            <button class="btn-mui-ten">
                <img data-src="/images/newImages/arrow-down.png" type="button" class="lazyload arr-down" src="/images/newImages/arrow-down.png">
            </button>
        </div>
    </div>
    <div class="menu-bot menu-bot_375">
        <ul>
            <li id="overview">
                <a href="/ho-so-nguoi-ban-ca-nhan.html">
                    <div class="box <?= $classActive_tq ?>">
                        <div class="anh-bot">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="img_tq">
                                <path d="M5.90024 17H18.0902C19.9902 17 20.9902 16 20.9902 14.1V2H2.99023V14.1C3.00023 16 4.00024 17 5.90024 17Z" stroke="" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M2 2H22" stroke="" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M8 22L12 20V17" stroke="" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M16 22L12 20" stroke="" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7.5 11L10.65 8.37C10.9 8.16 11.23 8.22 11.4 8.5L12.6 10.5C12.77 10.78 13.1 10.83 13.35 10.63L16.5 8" stroke="" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="chu-bot">
                            <p class="text_tq link">Tổng quan</p>
                        </div>
                    </div>
                </a>
            </li>
            <?php
            $url = $_SERVER['REDIRECT_URL'];
            $arr_tinmua = [
                "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-mua.html",
                "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-mua/tin-con-han.html",
                "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-mua/tin-het-han.html",
                "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-mua/tin-dang-an.html",
                "/danh-sach-nha-thau.html",
                "/quan-ly-don-hang-mua.html",
                "/quan-ly-don-hang-dang-xu-ly-nguoi-mua.html",
                "/quan-ly-don-hang-dang-giao-nguoi-mua.html",
                "/quan-ly-don-hang-da-giao-nguoi-mua.html",
                "/quan-ly-don-hang-da-huy-nguoi-mua.html",
                "/quan-ly-don-hang-hoan-tat-nguoi-mua.html"
            ];
            $arr_tinban = [
                "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin.html",
                "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-dang-dang.html",
                "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-da-ban.html",
                "/quan-ly-don-hang-ban.html",
                "/quan-ly-don-hang-dang-xu-ly.html",
                "/quan-ly-don-hang-dang-giao.html",
                "/quan-ly-don-hang-da-giao.html",
                "/quan-ly-don-hang-da-huy.html",
                "/quan-ly-don-hang-hoan-tat.html"
            ];
            $arr_tintvl = [
                "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-tim-viec-lam.html",
            ];
            $arr_tintuv = [
                "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-tim-ung-vien.html",
            ];
            $arr_tinbid = [
                "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-dang-du-thau.html",
            ];
            $arr_tinapply = [
                "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-dang-ung-tuyen.html",
            ];

            $arr_ql_tin = array_merge($arr_tinmua, $arr_tinban, $arr_tintvl, $arr_tintuv, $arr_tinbid, $arr_tinapply);
            ?>
            <div class="chia_muaban">
                <li id="management_news" class="ctin_mbam <?= (in_array($url, $arr_ql_tin) || in_array($url, $arr_tindang)) ? "menu_active" : "" ?>">
                    <a>
                        <div class="box <?= $classActive_qlt ?>">
                            <div class="anh-bot fill">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="img_qlt">
                                    <path d="M11.4 22.75H7.6C3.21 22.75 1.25 20.79 1.25 16.4V12.6C1.25 8.21 3.21 6.25 7.6 6.25H10.6C11.01 6.25 11.35 6.59 11.35 7C11.35 7.41 11.01 7.75 10.6 7.75H7.6C4.02 7.75 2.75 9.02 2.75 12.6V16.4C2.75 19.98 4.02 21.25 7.6 21.25H11.4C14.98 21.25 16.25 19.98 16.25 16.4V13.4C16.25 12.99 16.59 12.65 17 12.65C17.41 12.65 17.75 12.99 17.75 13.4V16.4C17.75 20.79 15.79 22.75 11.4 22.75Z" stroke="<?= $color_qlt ?>" />
                                    <path d="M16.9996 14.15H13.7996C10.9896 14.15 9.84961 13.01 9.84961 10.2V6.99999C9.84961 6.69999 10.0296 6.41999 10.3096 6.30999C10.5896 6.18999 10.9096 6.25999 11.1296 6.46999L17.5296 12.87C17.7396 13.08 17.8096 13.41 17.6896 13.69C17.5796 13.97 17.2996 14.15 16.9996 14.15ZM11.3496 8.80999V10.2C11.3496 12.19 11.8096 12.65 13.7996 12.65H15.1896L11.3496 8.80999Z" stroke="<?= $color_qlt ?>" />
                                    <path d="M15.5996 2.75H11.5996C11.1896 2.75 10.8496 2.41 10.8496 2C10.8496 1.59 11.1896 1.25 11.5996 1.25H15.5996C16.0096 1.25 16.3496 1.59 16.3496 2C16.3496 2.41 16.0096 2.75 15.5996 2.75Z" stroke="<?= $color_qlt ?>" />
                                    <path d="M7 5.75C6.59 5.75 6.25 5.41 6.25 5C6.25 2.93 7.93 1.25 10 1.25H12.62C13.03 1.25 13.37 1.59 13.37 2C13.37 2.41 13.03 2.75 12.62 2.75H10C8.76 2.75 7.75 3.76 7.75 5C7.75 5.41 7.41 5.75 7 5.75Z" stroke="<?= $color_qlt ?>" />
                                    <path d="M19.1895 17.75C18.7795 17.75 18.4395 17.41 18.4395 17C18.4395 16.59 18.7795 16.25 19.1895 16.25C20.3295 16.25 21.2495 15.32 21.2495 14.19V8C21.2495 7.59 21.5895 7.25 21.9995 7.25C22.4095 7.25 22.7495 7.59 22.7495 8V14.19C22.7495 16.15 21.1495 17.75 19.1895 17.75Z" stroke="<?= $color_qlt ?>" />
                                    <path d="M22 8.74999H19C16.34 8.74999 15.25 7.65999 15.25 4.99999V1.99999C15.25 1.69999 15.43 1.41999 15.71 1.30999C15.99 1.18999 16.31 1.25999 16.53 1.46999L22.53 7.46999C22.74 7.67999 22.81 8.00999 22.69 8.28999C22.58 8.56999 22.3 8.74999 22 8.74999ZM16.75 3.80999V4.99999C16.75 6.82999 17.17 7.24999 19 7.24999H20.19L16.75 3.80999Z" stroke="<?= $color_qlt ?>" />
                                </svg>

                            </div>
                            <div class="chu-bot">
                                <p class="text_qlt link">Quản lý tin</p>
                            </div>
                        </div>
                    </a>
                </li>
                <div class="chiatin_muaban quanly_tin<?= (in_array($url, $arr_ql_tin)) ? " active" : "" ?>">
                    <li class="<?= in_array($url, $arr_tinban) ? "active_tin" : "" ?>"><a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin.html">Tin bán</a></li>
                    <li class="<?= in_array($url, $arr_tinmua) ? "active_tin" : "" ?>"><a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-mua.html">Tin mua</a></li>
                    <li class="<?= in_array($url, $arr_tintvl) ? "active_tin" : "" ?>"><a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-tim-viec-lam.html">Tin tìm việc làm</a></li>
                    <li class="<?= in_array($url, $arr_tintuv) ? "active_tin" : "" ?>"><a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-tim-ung-vien.html">Tin tìm ứng viên</a></li>
                    <li class="<?= in_array($url, $arr_tinbid) ? "active_tin" : "" ?>"><a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-dang-du-thau.html">Tin đang dự thầu</a></li>
                    <li class="<?= in_array($url, $arr_tinapply) ? "active_tin" : "" ?>"><a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-dang-ung-tuyen.html">Tin đang ứng tuyển</a></li>
                </div>
            </div>
            <!-- don hang -->
            <?
            $url = $_SERVER['REDIRECT_URL'];
            $arr_can_order = ['/ung-vien-ung-tuyen.html'];
            ?>
            <div class="m_order cursor_Pt">
                <li id="m_order_li" class="ctin_mbam <?= (in_array($_SERVER['REDIRECT_URL'], $arr_can_order)) ? "menu_active" : "" ?>">
                    <a>
                        <div class="box">
                            <div class="anh-bot">
                                <img src="/images/m_raonhanh_imgnew/bag-2.png" alt="Icon đơn hàng" class="m_order_img">
                            </div>
                            <div class="chu-bot">
                                <p class="text_m_order link">Đơn hàng</p>
                            </div>
                        </div>
                    </a>
                </li>
            </div>
            <!-- don hang -->
            <!-- Quan ly khuyen mai -->
            <?
            $url = $_SERVER['REDIRECT_URL'];
            $arr_can_promotion = ['/ung-vien-ung-tuyen.html'];
            ?>
            <div class="m_discount_managers cursor_Pt">
                <li id="discount_managers_li" class="ctin_mbam <?= (in_array($_SERVER['REDIRECT_URL'], $arr_can_promotion)) ? "menu_active" : "" ?>">
                    <a>
                        <div class="box">
                            <div class="anh-bot">
                                <img src="/images/m_raonhanh_imgnew/discount.png" alt="Icon khuyến mại" class="discount_manager_img">
                            </div>
                            <div class="chu-bot">
                                <p class="text_discount_manager link">Quản lý khuyến mãi</p>
                            </div>
                        </div>
                    </a>
                </li>
            </div>
            <!-- quan ly khuyen mai -->
            <?php
            $url = $_SERVER['REDIRECT_URL'];
            $arr_can_apply = ['/ung-vien-ung-tuyen.html'];
            ?>
            <li id="management_news" class="ctin_mbam <?= (in_array($_SERVER['REDIRECT_URL'], $arr_can_apply)) ? "menu_active" : "" ?>">
                <a href="/ung-vien-ung-tuyen.html">
                    <div class="box <?= $classActive_tdyt ?>">
                        <div class="anh-bot">
                            <?= $ic_ungvien_ut ?>
                        </div>
                        <div class="chu-bot">
                            <p class="text_qlt link">Ứng viên ứng tuyển</p>
                        </div>
                    </div>
                </a>
            </li>

            <div class="chia_muaban">
                <li id="favotite_news" class="ctin_mbam <?= (in_array($_SERVER['REDIRECT_URL'], $arr_tinytb)) ? "menu_active" : "" ?>">
                    <a>
                        <div class="box <?= $classActive_tdyt ?>">
                            <div class="anh-bot">
                                <svg width="22" height="20" viewBox="0 0 22 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.62 18.8101C11.28 18.9301 10.72 18.9301 10.38 18.8101C7.48 17.8201 1 13.6901 1 6.6901C1 3.6001 3.49 1.1001 6.56 1.1001C8.38 1.1001 9.99 1.9801 11 3.3401C12.01 1.9801 13.63 1.1001 15.44 1.1001C18.51 1.1001 21 3.6001 21 6.6901C21 13.6901 14.52 17.8201 11.62 18.8101Z" stroke="<?= $color_tdyt ?>" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </div>
                            <div class="chu-bot">
                                <p class="text_favorite_news link">Tin đã yêu thích</p>
                            </div>
                        </div>
                    </a>
                </li>
                <div class="chiatin_muaban yeuthich_tin <?= (in_array($_SERVER['REDIRECT_URL'], $arr_tinytb)) ? "active" : "" ?>">
                    <li class="<?= ($_SERVER['REDIRECT_URL'] == "/ho-so-nguoi-ban-ca-nhan/tin-da-yeu-thich.html") ? "active_tin" : "" ?>"><a href="/ho-so-nguoi-ban-ca-nhan/tin-da-yeu-thich.html">Tin bán</a></li>
                    <li class="<?= ($_SERVER['REDIRECT_URL'] == "/ho-so-nguoi-ban-ca-nhan/tin-mua-yeu-thich.html") ? "active_tin" : "" ?>"><a href="/ho-so-nguoi-ban-ca-nhan/tin-mua-yeu-thich.html">Tin mua</a></li>
                </div>
            </div>

            <li id="advertising_service">
                <a href="/ho-so-nguoi-ban-ca-nhan/dich-vu-quang-cao.html">
                    <div class="box <?= $classActive_dvqc ?>">
                        <div class="anh-bot fill">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="img_dvqc">
                                <path d="M10.9897 22.5C11.5897 22.5 12.5197 22.21 13.4097 20.75L15.1697 17.9C15.3397 17.62 15.8597 17.35 16.1797 17.37L19.5198 17.54C21.5198 17.64 22.2197 16.81 22.4697 16.31C22.7197 15.81 22.9398 14.74 21.6398 13.22L19.6597 10.92C19.4597 10.68 19.3497 10.16 19.4397 9.86002L20.4498 6.63004C20.9598 5.01004 20.3898 4.14004 20.0098 3.76004C19.6298 3.38004 18.7497 2.83003 17.1297 3.37003L14.1797 4.34003C13.9097 4.43003 13.4097 4.35003 13.1797 4.19003L10.0997 1.97003C8.68972 0.950032 7.66976 1.22003 7.19976 1.47003C6.72976 1.72003 5.92977 2.40005 5.95977 4.14005L6.02977 7.93002C6.03977 8.21002 5.80977 8.67003 5.58977 8.84003L3.10973 10.72C1.75973 11.75 1.70973 12.78 1.79973 13.31C1.88973 13.84 2.28972 14.8 3.90972 15.3L7.13976 16.31C7.43976 16.4 7.80976 16.79 7.88976 17.09L8.65972 20.03C9.16972 21.96 10.1697 22.39 10.7297 22.47C10.7997 22.49 10.8897 22.5 10.9897 22.5ZM16.1498 15.87C15.2898 15.87 14.3398 16.39 13.8998 17.11L12.1398 19.96C11.6398 20.78 11.1898 21.03 10.9498 20.99C10.7198 20.96 10.3597 20.58 10.1097 19.66L9.33977 16.72C9.12977 15.92 8.37977 15.13 7.58977 14.89L4.35973 13.88C3.73973 13.69 3.33977 13.38 3.27977 13.06C3.21977 12.74 3.49976 12.32 4.01976 11.92L6.49974 10.04C7.10974 9.58004 7.54972 8.66002 7.53972 7.90002L7.46972 4.11002C7.45972 3.44002 7.61972 2.94004 7.90972 2.79004C8.19972 2.64004 8.68974 2.79002 9.23974 3.18002L12.3198 5.40002C12.9298 5.84002 13.9397 6.00004 14.6697 5.76004L17.6197 4.79004C18.2397 4.59004 18.7397 4.60002 18.9697 4.83002C19.1997 5.06002 19.2198 5.56002 19.0298 6.18002L18.0198 9.41003C17.7698 10.2 17.9898 11.27 18.5298 11.89L20.5098 14.19C21.1398 14.92 21.2397 15.43 21.1297 15.64C21.0297 15.85 20.5497 16.08 19.5997 16.03L16.2598 15.86C16.2198 15.87 16.1798 15.87 16.1498 15.87Z" fill="<?= $color_dvqc ?>" />
                                <path d="M2.08969 22.7502C2.27969 22.7502 2.46966 22.6802 2.61966 22.5302L5.64969 19.5002C5.93969 19.2102 5.93969 18.7302 5.64969 18.4402C5.35969 18.1502 4.87969 18.1502 4.58969 18.4402L1.55966 21.4702C1.26966 21.7602 1.26966 22.2402 1.55966 22.5302C1.70966 22.6802 1.89969 22.7502 2.08969 22.7502Z" fill="<?= $color_dvqc ?>" />
                            </svg>
                        </div>
                        <div class="chu-bot">
                            <p class="text_dvu_qcao link">Dịch vụ quảng cáo</p>
                        </div>
                    </div>
                </a>
            </li>
            <li id="transaction_history">
                <a href="/ho-so-nguoi-ban-ca-nhan/lich-su-giao-dich.html">
                    <div class="box <?= $classActive_lsgd ?>">
                        <div class="anh-bot">
                            <?= $icon_naptien ?>

                        </div>
                        <div class="chu-bot">
                            <p class="text_lsu_gd link">Lịch sử giao dịch</p>
                        </div>
                    </div>
                </a>
            </li>
            <li id="recharge_wallet" class=<?= ($url == "/ho-so-nguoi-ban-ca-nhan/nap-tien-vao-tai-khoan.html") ? "menu_active" : "" ?>>
                <a href="/ho-so-nguoi-ban-ca-nhan/nap-tien-vao-tai-khoan.html">
                    <div class="box <?= $classActive_ntvtk ?>">
                        <div class="anh-bot">
                            <?= $ic_naptien_ngban; ?>

                        </div>
                        <div class="chu-bot">
                            <p class="text_nap_tien link">Nạp tiền vào tài khoản</p>
                        </div>

                    </div>
                </a>
            </li>
            <li id="change_password">
                <a href="/ho-so-nguoi-ban-ca-nhan/doi-mat-khau.html">
                    <div class="box <?= $classActive_dmk ?>">
                        <div class="anh-bot">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="img_dmk">
                                <path d="M6 10V8C6 4.69 7 2 12 2C17 2 18 4.69 18 8V10" stroke="<?= $color_dmk ?>" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M17 22H7C3 22 2 21 2 17V15C2 11 3 10 7 10H17C21 10 22 11 22 15V17C22 21 21 22 17 22Z" stroke="<?= $color_dmk ?>" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M15.9965 16H16.0054" stroke="<?= $color_dmk ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M11.9945 16H12.0035" stroke="<?= $color_dmk ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M7.99451 16H8.00349" stroke="<?= $color_dmk ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                        </div>
                        <div class="chu-bot">
                            <p class="text_doi_mk link">Đổi mật khẩu</p>
                        </div>
                    </div>
                </a>
            </li>
            <li id="digital_conversion_365">
                <a href="/ho-so-nguoi-ban-ca-nhan/chuyen-doi-so-365.html">
                    <div class="box <?= $classActive_cds ?>">
                        <div class="anh-bot fill">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="img_cds">
                                <path d="M19 10.75H17C14.58 10.75 13.25 9.42 13.25 7V5C13.25 2.58 14.58 1.25 17 1.25H19C21.42 1.25 22.75 2.58 22.75 5V7C22.75 9.42 21.42 10.75 19 10.75ZM17 2.75C15.42 2.75 14.75 3.42 14.75 5V7C14.75 8.58 15.42 9.25 17 9.25H19C20.58 9.25 21.25 8.58 21.25 7V5C21.25 3.42 20.58 2.75 19 2.75H17Z" fill="<?= $color_cds ?>" />
                                <path d="M7 22.75H5C2.58 22.75 1.25 21.42 1.25 19V17C1.25 14.58 2.58 13.25 5 13.25H7C9.42 13.25 10.75 14.58 10.75 17V19C10.75 21.42 9.42 22.75 7 22.75ZM5 14.75C3.42 14.75 2.75 15.42 2.75 17V19C2.75 20.58 3.42 21.25 5 21.25H7C8.58 21.25 9.25 20.58 9.25 19V17C9.25 15.42 8.58 14.75 7 14.75H5Z" fill="<?= $color_cds ?>" />
                                <path d="M6 10.75C3.38 10.75 1.25 8.62 1.25 6C1.25 3.38 3.38 1.25 6 1.25C8.62 1.25 10.75 3.38 10.75 6C10.75 8.62 8.62 10.75 6 10.75ZM6 2.75C4.21 2.75 2.75 4.21 2.75 6C2.75 7.79 4.21 9.25 6 9.25C7.79 9.25 9.25 7.79 9.25 6C9.25 4.21 7.79 2.75 6 2.75Z" fill="<?= $color_cds ?>" />
                                <path d="M18 22.75C15.38 22.75 13.25 20.62 13.25 18C13.25 15.38 15.38 13.25 18 13.25C20.62 13.25 22.75 15.38 22.75 18C22.75 20.62 20.62 22.75 18 22.75ZM18 14.75C16.21 14.75 14.75 16.21 14.75 18C14.75 19.79 16.21 21.25 18 21.25C19.79 21.25 21.25 19.79 21.25 18C21.25 16.21 19.79 14.75 18 14.75Z" fill="<?= $color_cds ?>" />
                            </svg>

                        </div>
                        <div class="chu-bot">
                            <a href="https://quanlychung.timviec365.vn/" target="_blank" class="text_chuyen_doi_so link">Chuyển đổi số 365</a>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>