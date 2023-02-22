<?
    $a = ['/ho-so-gian-hang-chinh-sua-thong-tin.html', '/ho-so-gian-hang-cua-toi-dang-gia.html', '/ho-so-gian-hang-cua-toi-trang-chu.html'];

    $url = $_SERVER['REDIRECT_URL'];
?>

<div class="box-left">
    <div class="menu-top menu-top_df">
        <div class="anh anhcon_df_dl">
            <? if ($user_logo != '') { ?>
                <img src="<?= $user_logo; ?>" class="lazyload img-detail-prf" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
            <? } else { ?>
                <img src="/images/anh_moi/dai_dien_avt.png" alt="" class="lazyload img-detail-prf">
            <? } ?>
        </div>
        <div class="chu">
            <div class="hvt"><a href="/gian-hang/<?= $_COOKIE['UID'] ?>/<?= replaceTitle($usc_store_name) ?>.html"><?= $usc_store_name; ?></a></div>
            <div class="chu_fig_dl">
                <div class="tk-ca-nhan">Tài khoản doanh nghiệp</div>
                <div class="date-profile">Tham gia: <?= $user_time; ?></div>
                <div class="so-du">Số dư: <span class="tien-so-du"><?= number_format($user_money) ?> VND</span></div>
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
            <?php $arr_gian_hang = ["/ho-so-gian-hang-cua-toi-trang-chu.html","/ho-so-gian-hang-cua-toi-dang-gia.html","/ho-so-gian-hang-chinh-sua-thong-tin.html"]; ?>
            <li class="ctin_mbam<?=in_array($url, $arr_gian_hang)?" menu_active":""?>">
                <a href="/ho-so-gian-hang-cua-toi-trang-chu.html">
                    <div class="box">
                        <div class="anh-bot">
                            <span class="item-icf"><?= $icon_gianhang ?></span>
                        </div>
                        <div class="chu-bot">
                            <p class="text_qlt link">Gian hàng của tôi</p>
                        </div>
                    </div>
                </a>
            </li>
            <?php
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
            <div class="chia_muaban">
                <li class="ctin_mbam<?=(in_array($url, $arr_ql_tin) || in_array($url, $arr_tindang))?" menu_active":""?>">
                    <a>
                        <div class="box">
                            <div class="anh-bot fill">
                                <span class="item-icf"><?= $ql_tin_dn; ?></span>
                            </div>
                            <div class="chu-bot">
                                <p class="text_qlt link">Quản lý tin</p>
                            </div>
                        </div>
                    </a>
                </li>
                <div class="chiatin_muaban quanly_tin<?=(in_array($url, $arr_ql_tin))?" active":""?>">
                    <li class="<?= in_array($url, $arr_tinban) ? "active_tin" : "" ?>"><a href="/ho-so-quan-ly-tin-ban.html">Tin bán</a></li>
                    <li class="<?= in_array($url, $arr_tinmua) ? "active_tin" : "" ?>"><a href="/ho-so-quan-ly-tin-mua.html">Tin mua</a></li>
                    <li class="<?= in_array($url, $arr_tintvl) ? "active_tin" : "" ?>"><a href="/ho-so-quan-ly-tin-tim-viec-lam.html">Tin tìm việc làm</a></li>
                    <li class="<?= in_array($url, $arr_tintuv) ? "active_tin" : "" ?>"><a href="/ho-so-quan-ly-tin-tim-ung-vien.html">Tin tìm ứng viên</a></li>
                    <li class="<?= in_array($url, $arr_tinbid) ? "active_tin" : "" ?>"><a href="/ho-so-quan-ly-tin-dang-du-thau.html">Tin đang dự thầu</a></li>
                    <li class="<?= in_array($url, $arr_tinapply) ? "active_tin" : "" ?>"><a href="/ho-so-quan-ly-tin-dang-ung-tuyen.html">Tin đang ứng tuyển</a></li>
                </div>
            </div>
            <!-- -----------------quan ly don hang-------------------- -->
            <li class="ctin_mbam<?=($url == "/ho-so-gian-hang-quan-ly-don-hang.html")?" menu_active":""?>">
                <a href="/ho-so-gian-hang-quan-ly-don-hang.html">
                    <div class="box <?= $classActive_qldh ?>">
                        <div class="anh-bot fill">
                            <span class="item-icf">
                                <img src="/images/m_raonhanh_imgnew/bag-2.png" alt="Icon đơn hàng" class="m_order_img">
                            </span>
                        </div>
                        <div class="chu-bot">
                            <p class="link">Đơn Hàng</p>
                        </div>
                    </div>
                </a>
            </li>
            <!-- end quản lý đơn hàng  -->
            <!-- -----------------quan ly khuyen mai-------------------- -->
            <li class="ctin_mbam<?=($url == "/ho-so-gian-hang-quan-ly-khuyen-mai.html")?" menu_active":""?>">
                <a href="/ho-so-gian-hang-quan-ly-khuyen-mai.html">
                    <div class="box <?= $classActive_qlkm ?>">
                        <div class="anh-bot fill">
                            <span class="item-icf"> 
                                <img src="/images/m_raonhanh_imgnew/discount.png" alt="Icon khuyến mại" class="discount_manager_img">
                            </span>
                        </div>
                        <div class="chu-bot">
                            <p class="link">Quản lý khuyến mãi</p>
                        </div>
                    </div>
                </a>
            </li>
            <!-- end quản lý đơn hàng  -->
            <?php
                $arr_can_apply = ['/ho-so-quan-ly-ung-vien-ung-tuyen.html'];
            ?>
            <li class="ctin_mbam<?=(in_array($url, $arr_can_apply))?" menu_active":""?>">
                <a href="/ho-so-quan-ly-ung-vien-ung-tuyen.html">
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
            <?php
                $arr_tinlike = ['/ho-so-gian-hang-tin-mua-da-yeu-thich.html', '/ho-so-gian-hang-tin-ban-da-yeu-thich.html'];
            ?>

            <div class="chia_muaban">
                <li class="ctin_mbam <?= (in_array($url, $arr_tinlike)) ? "menu_active" : "" ?>">
                    <a>
                        <div class="box <?= $classActive_tdyt ?>">
                            <div class="anh-bot">
                                <span class="item-icf"><?= $icon_tinyt ?></span>
                            </div>
                            <div class="chu-bot">
                                <p class="link">Tin đã yêu thích</p>
                            </div>
                        </div>
                    </a>
                </li>
                <div class="chiatin_muaban yeuthich_tin <?= (in_array($url, $arr_tinlike)) ? "active" : "" ?>">
                    <li class="<?= ($url == "/ho-so-gian-hang-tin-ban-da-yeu-thich.html") ? "active_tin" : "" ?>"><a href="/ho-so-gian-hang-tin-ban-da-yeu-thich.html">Tin bán</a></li>
                    <li class="<?= ($url == "/ho-so-gian-hang-tin-mua-da-yeu-thich.html") ? "active_tin" : "" ?>"><a href="/ho-so-gian-hang-tin-mua-da-yeu-thich.html">Tin mua</a></li>
                </div>
            </div>
            <li class="ctin_mbam<?=($url == "/ho-so-gian-hang-dich-vu-quang-cao.html")?" menu_active":""?>">
                <a href="/ho-so-gian-hang-dich-vu-quang-cao.html">
                    <div class="box <?= $classActive_dvqc ?>">
                        <div class="anh-bot fill">
                            <span class="item-icf"><?= $icon_dichvu_qcao ?></span>
                        </div>
                        <div class="chu-bot">
                            <p class="link">Dịch vụ quảng cáo</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="ctin_mbam<?=($url == "/ho-so-gian-hang-lich-su-giao-dich.html")?" menu_active":""?>">
                <a href="/ho-so-gian-hang-lich-su-giao-dich.html">
                    <div class="box <?= $classActive_lsgd ?>">
                        <div class="anh-bot">
                            <span class="item-icf"><?= $icon_naptien ?></span>
                        </div>
                        <div class="chu-bot">
                            <p class="link">Lịch sử giao dịch</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="ctin_mbam<?=($url == "/ho-so-gian-hang-nap-tien-vao-tai-khoan.html")?" menu_active":""?>">
                <a href="/ho-so-gian-hang-nap-tien-vao-tai-khoan.html">
                    <div class="box <?= $classActive_ntvtk ?>">
                        <div class="anh-bot">
                            <span class="item-icf"><?= $napdoanhnghiep; ?></span>
                        </div>
                        <div class="chu-bot">
                            <p class="text_nap_tien link">Nạp tiền vào tài khoản</p>
                        </div>
                    </div>
                </a>
            </li>
            <li class="ctin_mbam<?=($url == "/ho-so-gian-hang-doi-mat-khau.html")?" menu_active":""?>">
                <a href="/ho-so-gian-hang-doi-mat-khau.html">
                    <div class="box <?= $classActive_ntvtk ?>">
                        <div class="anh-bot">
                            <span class="item-icf"><?= $icon_rtvbm ?></span>
                        </div>
                        <div class="chu-bot">
                            <p class="text_doi_mk link">Đổi mật khẩu</p>
                        </div>
                    </div>
                </a>
            </li>
            <li>
                <a href="">
                    <div class="box">
                        <div class="anh-bot fill">
                            <span class="item-icf-fill"><?= $icon_cdoi365 ?></span>
                        </div>
                        <div class="chu-bot">
                            <p class="text_chuyen_doi_so link">Chuyển đổi số 365</p>
                        </div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>