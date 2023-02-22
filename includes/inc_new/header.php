<? include("../includes/inc_new/icon.php");
if (isset($timkiem_mua) && $timkiem_mua != "") {
    $list_gop = $list_vl_auto;
} else {
    $list_gop = array_merge($list_tag_auto, $list_vl_auto, $tags_vltk);
}
$list_gop = json_encode($list_gop);


?>
<script>
    var list_tag = <?= $list_gop ?>;
</script>
<div class="header">
    <div>
        <a class="drop_menu"><img src="/images/img_new/3gach.svg" alt="menu"></a>
        <a><img src="/images/img_new/logo.svg" alt="logo" class="pt_15 logo"></a>
    </div>
    <ul class="nav-menu nav-menu-tab d_none">
        <li class="nav-li"><a class="cl_ti" href="/">Trang chủ</a></li>
        <li class="nav-li">
            <a href="/trang-tin-mua.html" class="">Trang tin mua</a>
        </li>
        <li class="nav-li utiliti">
            <div class="nav-utiliti">
                <div class="nav-utiliti_text">Tiện ích</div>
                <div class="nav-utiliti_icon">
                    <img src="https://raonhanh365.vn/images/anh_moi/tienich.svg" alt="Tiện ích">
                </div>
            </div>
            <ul class="sub_menu_ul d_none">
                <li class="sub_menu_li"><a href="/so-sanh-san-pham.html">So sánh giá</a></li>
                <li class="sub_menu_li"><a href="/tim-quanh-day.html">Tìm quanh đây</a></li>
            </ul>
        </li>
        <li class="nav-li"><a href="/bang-gia.html">Bảng giá</a></li>
        <li class="nav-li"><a href="/tin-tuc">Tin tức</a></li>
        <li class="nav-li"><a href="/tro-giup.html">Hướng dẫn</a></li>
        <li class="nav-li"><a href="/lien-he.html">Liên hệ</a></li>
        <li class="nav-li"><a href="/chon-loai-dang-tin.html">Đăng tin</a></li>
    </ul>
    <div class="d_flex menu">
        <ul class="pt_5">
            <li><a href="/trang-tin-mua.html" class="sh_clrw">Trang tin mua</a></li>
            <li>
                <div class="d_flex tienich sh_cursor">
                    <div class="m_5 cl_w">Tiện ích</div>
                    <div><img src="/images/img_new/Vector.svg" alt="tiện ích" class="pt_10"></div>
                </div>
                <div class="tienich_con d_none">
                    <div class="ctn_tienich">
                        <a href="/so-sanh-san-pham.html">So sánh giá</a>
                        <a>Tìm quanh đây</a>
                    </div>
                </div>
            </li>
            <li><a href="/bang-gia.html" class="sh_clrw">Bảng giá</a></li>
            <li><a href="/tin-tuc" class="sh_clrw">Tin tức</a></li>
            <li><a class="sh_clrw">Chuyển đổi số</a></li>
        </ul>
        <div class="d_flex align_c">
            <div class="mr_30">
                <img src="/images/img_new/chuong.svg">
            </div>
            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                <a href="https://chat365.timviec365.vn/" target="_blank" rel="nofollow" class="d_content chat">
                    <img src="/images/img_new/chat.svg">
                    <span>Chat</span>
                </a>
            <? } else { ?>
                <a href="/dang-nhap.html" class="d_content chat">
                    <img src="/images/img_new/chat.svg">
                    <span>Chat</span>
                </a>
            <? } ?>
            <div class="ml_30 dangtin">
                <div class="btn_dangtin">
                    <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                        <a href="/chon-loai-dang-tin.html">
                            <img src="/images/img_new/dangtin.svg">
                            <p>Đăng tin</p>
                        </a>
                    <? } else { ?>
                        <a href="/dang-nhap.html">
                            <img src="/images/img_new/dangtin.svg">
                            <p>Đăng tin</p>
                        </a>
                    <? } ?>
                </div>
            </div>
            <? if (!isset($_COOKIE['UID']) && !isset($_COOKIE['UT'])) { ?>
                <div class="box-login box-login-pc">
                    <div class="icon_us_show1024">
                        <img src="/images/anh_moi/ic_us_t_dn.svg">
                    </div>
                    <div class="df_them_div_bao_a hide_1023">
                        <a href="/dang-ky.html">Đăng ký</a>
                        <span class="sh_clrw">/</span>
                        <a href="/dang-nhap.html">Đăng nhập</a>
                    </div>
                </div>
            <? } else if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                <div class="d_flex ml_30 user_manager">
                    <div class="anh_taikhoan sh_cursor">
                        <? if ($user_logo != '') { ?>
                            <img src="<?= $user_logo ?>" onerror="this.onerror=null;this.src='/images/img_new/img_daidien.png';" class="anh_daidien">
                        <? } else { ?>
                            <img src="/images/img_new/img_daidien.png">
                        <? } ?>
                        <div><img src="/images/img_new/polygon.svg"></div>
                    </div>
                    <div class="popup_user_sdn d_none">
                        <div class="popup_user_sdn_padding">
                            <div class="popup_user_sdn_img_tt">
                                <div class="popup_user_sdn_img">
                                    <? if ($user_logo != '') { ?>
                                        <img src="<?= $user_logo ?>" onerror="this.src='/images/img_new/img_daidien.png'">
                                    <? } else { ?>
                                        <img src="/images/img_new/img_daidien.png">
                                    <? } ?>
                                </div>
                                <div class="popup_user_sdn_tt">
                                    <div class="popup_user_sdn_tt_name">
                                        <? if ($_COOKIE['UT'] == 1) { ?>
                                            <a href="/ca-nhan/<?= $_COOKIE['UID'] ?>/<?= replaceTitle($user_name) ?>.html"><?= $user_name ?></a>
                                        <? } else if ($_COOKIE['UT'] == 5) { ?>
                                            <a href="/gian-hang/<?= $_COOKIE['UID'] ?>/<?= replaceTitle($usc_store_name) ?>.html"><?= $user_name ?></a>
                                        <? } ?>
                                    </div>
                                    <div class="popup_user_sdn_tt_loai_tk">Tài khoản <?= $arr_type[$_COOKIE['UT']]; ?></div>
                                    <div class="popup_user_sdn_tt_sodu">Số dư:
                                        <? if ($user_money == 0) { ?>
                                            <span class="popup_user_sdn_tt_sodu_color">0</span>
                                        <? } else { ?>
                                            <span class="popup_user_sdn_tt_sodu_color"><?= number_format($user_money) ?> VNĐ</span>
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                            <!-- NGƯỜI BÁN -->
                            <div class="cac_truong_nguoi_ban">
                                <? if ($_COOKIE['UT'] == 1) { ?>
                                    <a href="/ho-so-nguoi-ban-ca-nhan.html" class="popup_user_sdn_link cl_strock">
                                        <div class="popup_user_sdn_link_img">
                                            <?= $icon_tongquan ?>
                                        </div>
                                        <div class="popup_user_sdn_link_tex">Tổng quan tài khoản</div>
                                    </a>
                                    <div class="popup_user_sdn_link qly_tintc cl_strock">
                                        <div class="top_qlytin">
                                            <div class="popup_user_sdn_link_img">
                                                <?= $icon_ql_tin ?>
                                            </div>
                                            <p class="popup_user_sdn_link_tex clk_shpopup sh_cursor">Quản lý tin đăng</p>
                                        </div>
                                        <div class="quanly_tin d_none">
                                            <a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin.html" class="tin_chon sh_cursor">Tin bán</a>
                                            <a class="tin_chon sh_cursor">Tin mua</a>
                                            <a class="tin_chon sh_cursor">Tim tìm việc làm</a>
                                            <a class="tin_chon sh_cursor">Tin tìm ứng viên</a>
                                            <a class="tin_chon sh_cursor">Tin đang dự thầu</a>
                                            <a class="tin_chon sh_cursor">Tin đang ứng tuyển</a>
                                        </div>
                                    </div>
                                    <div class="popup_user_sdn_link qly_tintc cl_strock">
                                        <div class="top_qlytin">
                                            <div class="popup_user_sdn_link_img">
                                                <?= $icon_tinyeuthich ?>
                                            </div>
                                            <p class="popup_user_sdn_link_tex clk_shpopup sh_cursor">Tin đã yêu thích</p>
                                        </div>
                                        <div class="quanly_tin d_none">
                                            <a class="tin_chon sh_cursor" href="/ho-so-nguoi-ban-ca-nhan/tin-da-yeu-thich.html">Tin bán</a>
                                            <a class="tin_chon sh_cursor">Tin mua</a>
                                        </div>
                                    </div>
                                    <a href="/ho-so-nguoi-ban-ca-nhan/nap-tien-vao-tai-khoan.html" class="popup_user_sdn_link cl_strock">
                                        <div class="popup_user_sdn_link_img">
                                            <?= $icon_naptien ?>
                                        </div>
                                        <div class="popup_user_sdn_link_tex">Nạp tiền</div>
                                    </a>
                                <? } elseif ($_COOKIE['UT'] == 5) { ?>
                                    <a href="/ho-so-gian-hang-cua-toi-trang-chu.html" class="popup_user_sdn_link cl_strock">
                                        <div class="popup_user_sdn_link_img">
                                            <?= $icon_tongquan ?>
                                        </div>
                                        <div class="popup_user_sdn_link_tex">Gian hàng của tôi</div>
                                    </a>
                                    <div class="popup_user_sdn_link qly_tintc cl_strock">
                                        <div class="top_qlytin">
                                            <div class="popup_user_sdn_link_img">
                                                <?= $icon_ql_tin ?>
                                            </div>
                                            <p class="popup_user_sdn_link_tex clk_shpopup sh_cursor">Quản lý tin đăng</p>
                                        </div>
                                        <div class="quanly_tin d_none">
                                            <a href="/ho-so-quan-ly-tin-ban.html" class="tin_chon sh_cursor">Tin bán</a>
                                            <a class="tin_chon sh_cursor">Tin mua</a>
                                            <a class="tin_chon sh_cursor">Tim tìm việc làm</a>
                                            <a class="tin_chon sh_cursor">Tin tìm ứng viên</a>
                                            <a class="tin_chon sh_cursor">Tin đang dự thầu</a>
                                            <a class="tin_chon sh_cursor">Tin đang ứng tuyển</a>
                                        </div>
                                    </div>
                                    <div class="popup_user_sdn_link qly_tintc cl_strock">
                                        <div class="top_qlytin">
                                            <div class="popup_user_sdn_link_img">
                                                <?= $icon_tinyeuthich ?>
                                            </div>
                                            <p class="popup_user_sdn_link_tex clk_shpopup sh_cursor">Tin đã yêu thích</p>
                                        </div>
                                        <div class="quanly_tin d_none">
                                            <a class="tin_chon sh_cursor" href="/ho-so-gian-hang-tin-ban-da-yeu-thich.html">Tin bán</a>
                                            <a class="tin_chon sh_cursor">Tin mua</a>
                                        </div>
                                    </div>
                                    <a href="/ho-so-gian-hang-nap-tien-vao-tai-khoan.html" class="popup_user_sdn_link cl_strock">
                                        <div class="popup_user_sdn_link_img">
                                            <?= $icon_naptien ?>
                                        </div>
                                        <div class="popup_user_sdn_link_tex">Nạp tiền</div>
                                    </a>
                                <? } ?>
                                <a href="/dang-xuat.html" class="popup_user_sdn_link popup_user_sdn_link_lc">
                                    <div class="popup_user_sdn_link_img hv_stroke">
                                        <?= $icon_dangxuat ?>
                                    </div>
                                    <div class="popup_user_sdn_link_tex popup_user_sdn_link_texcl">Đăng xuất</div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
    </div>
</div>