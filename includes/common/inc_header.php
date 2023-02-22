<?

include("../includes/inc_new/icon.php");

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
<header>
    <div class="header">
        <div class="nav_header nav_header_df">
            <div class="nav-menu head_menu_tab">
                <button class="ic_menu ic_menu_df_hd">
                    <svg class="icon_menu icon_menu_if" width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.875 10.625H33.125M6.875 30.625H33.125H6.875ZM6.875 20.625H33.125H6.875Z" stroke="#F26222" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
                <div class="logo_new"><a href="/" class="logo_link" title="Chợ mua bán, quảng cáo, rao vặt miễn phí"><img src="/images/logo.png" alt="Chợ mua bán, quảng cáo, rao vặt miễn phí" class="logo-new"></a></div>
            </div>

            <ul class="nav-menu nav-menu-tab hide_1023">
                <li class="nav-li"><a class="<?= ($_SERVER["REDIRECT_URL"] == "/") ? "cl_ti" : "" ?>" href="/">Trang chủ</a></li>
                <li class="nav-li">
                    <a href="/trang-tin-mua.html" class="<?= ($_SERVER["REDIRECT_URL"] == "/trang-tin-mua.html") ? "cl_ti" : "" ?>">Trang tin mua</a>
                </li>
                <li class="nav-li utiliti">
                    <div class="nav-utiliti">
                        <div class="nav-utiliti_text">Tiện ích</div>
                        <div class="nav-utiliti_icon">
                            <img src="/images/anh_moi/tienich.svg" alt="">
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
            </ul>
            <? if (!isset($_COOKIE['UID'])) { ?>

                <!-- CHƯA ĐĂNG NHẬP -->
                <div class="box-login box-login-pc ">
                    <div class="icon_us_show1024">
                        <img src="/images/anh_moi/ic_us_t_dn.svg" alt="">
                    </div>
                    <div class="df_them_div_bao_a hide_1023">
                        <a href="/dang-nhap.html" class="login login_df">Đăng nhập</a>
                        <a href="/dang-ky.html" class="register register_df button">Đăng ký</a>
                    </div>
                </div>
            <? } else if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                <!-- ĐẴ ĐĂNG NHẬP -->
                <? $list_tb = new db_query("SELECT `id`, `notify_from`, `notify`.`new_id`, `type`, `create_time`, `notify_content`, `usc_name`, `usc_logo`, `usc_store_name`,
                                            `usc_type`, `new_title`, `link_title`, `new_buy_sell`, `new_cate_id` FROM `notify`
                                            INNER JOIN `user` ON `notify`.`notify_from` = `user`.`usc_id`
                                            INNER JOIN `new` ON `notify`.`new_id` = `new`.`new_id`
                                            WHERE `notify_to` = '" . $_COOKIE['UID'] . "' ORDER BY `id` DESC "); ?>
                <div class="box_login_da_dn">
                    <div class="box-noti-a">
                        <div class="box_login_da_dn_tb box_login_da_dn_icon show-noti">
                            <img src="/images/anh_moi/sdn_chuong.svg" alt="">
                            <span class="soluong_tbao"><?= mysql_num_rows($list_tb->result) ?></span>
                        </div>
                        <div class="bg box-notification d_none">
                            <? if (mysql_num_rows($list_tb->result) == 0) { ?>
                                <div class="nothing-here">
                                    <div class="bg-svg">
                                        <?= $bg_nothing_here ?>
                                    </div>
                                    <p>Bạn chưa có thông báo nào!</p>
                                </div>
                            <? } else { ?>
                                <div class="notification">
                                    <div class="noti-scroll-custom">
                                        <div class="list-notification">
                                            <? while ($row_tbao = mysql_fetch_assoc($list_tb->result)) { ?>
                                                <div class="noti-one">
                                                    <div class="avt_tbao_tde">
                                                        <div class="noti-img">
                                                            <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png'" src="<?= $row_tbao['usc_logo'] ?>" alt="<?= ($row_tbao['usc_type'] == 1) ? $row_tbao['usc_name'] : $row_tbao['usc_store_name'] ?>">
                                                        </div>
                                                        <div class="noti-txt">
                                                            <? if ($row_tbao['type'] == 0 || $row_tbao['type'] == 1 || $row_tbao['type'] == 2 || $row_tbao['type'] == 3) {
                                                                if ($row_tbao['new_buy_sell'] == 2 || $row_tbao['new_cate_id'] == 120 || $row_tbao['new_cate_id'] == 121) {
                                                                    $ddan = 'c';
                                                                } else {
                                                                    $ddan = 'ct';
                                                                }
                                                                $duong_link = '/' . replaceTitle($row_tbao['link_title']) . '-' . $ddan . $row_tbao['new_id'] . '.html';
                                                            } else if ($row_tbao['type'] == 4) {
                                                                $duong_link = '/quan-ly-don-hang-ban.html';
                                                            } else if ($row_tbao['type'] == 5) {
                                                                $duong_link = '/quan-ly-don-hang-dang-xu-ly-nguoi-mua.html';
                                                            } else if ($row_tbao['type'] == 6 || $row_tbao['type'] == 7) {
                                                                $duong_link = '/quan-ly-don-hang-dang-giao-nguoi-mua.html';
                                                            } else if ($row_tbao['type'] == 8) {
                                                                $duong_link = '/quan-ly-don-hang-da-giao-nguoi-mua.html';
                                                            } else if ($row_tbao['type'] == 9) {
                                                                $duong_link = '/quan-ly-don-hang-hoan-tat-nguoi-mua.html';
                                                            } else if ($row_tbao['type'] == 10 || $row_tbao['type'] == 11) {
                                                                $duong_link = '/quan-ly-don-hang-da-giao.html';
                                                            } else if ($row_tbao['type'] == 12) {
                                                                $duong_link = '/quan-ly-don-hang-da-huy-nguoi-mua.html';
                                                            }
                                                            ?>
                                                            <a href="<?= $duong_link ?>" class="noti">
                                                                <strong><?= ($row_tbao['usc_type'] == 1) ? $row_tbao['usc_name'] : $row_tbao['usc_store_name'] ?></strong>
                                                                <?= $row_tbao['notify_content'] ?> <strong><?= $row_tbao['new_title'] ?></strong>
                                                            </a>
                                                            <p class="noti-time"><?= lay_tgian($row_tbao['create_time']) ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="noti-del sh_cursor" data="<?= $row_tbao['id'] ?>" onclick="del_noti(this)">
                                                        <?= $ic_noti_del ?>
                                                    </div>
                                                </div>
                                            <? } ?>
                                        </div>
                                    </div>
                                </div>
                            <? } ?>
                            <? if (mysql_num_rows($list_tb->result) > 0) { ?>
                                <div class="noti-txt note_dele_all">
                                    <p class="noti-time sh_cursor" onclick="del_all(this)">Xóa tất cả</p>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                    <a class="box_login_da_dn_chat box_login_da_dn_icon" href="https://chat365.timviec365.vn/" target="_blank" rel="nofollow">
                        <img src="/images/anh_moi/sdn_chat.svg" alt="">
                        <span class="so_tinnhan"><?= $count_tb_chat ?></span>
                    </a>
                    <div class="box_login_da_dn_img">
                        <? if ($user_logo != '') { ?>
                            <img src="<?= $user_logo ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                        <? } else { ?>
                            <img src="/images/anh_moi/avatar.png" alt="">
                        <? } ?>
                        <div class="popup_user_sdn d_none">
                            <div class="popup_user_sdn_padding">
                                <div class="popup_user_sdn_img_tt">
                                    <div class="popup_user_sdn_img">
                                        <? if ($user_logo != '') { ?>
                                            <img src="<?= $user_logo ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                        <? } else { ?>
                                            <img src="/images/anh_moi/avatar.png" alt="">
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
                                        <a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin.html" class="popup_user_sdn_link cl_strock">
                                            <div class="popup_user_sdn_link_img">
                                                <?= $icon_ql_tin ?>
                                            </div>
                                            <div class="popup_user_sdn_link_tex">Quản lý tin đăng</div>
                                        </a>
                                        <a href="/ho-so-nguoi-ban-ca-nhan/tin-da-yeu-thich.html" class="popup_user_sdn_link cl_strock">
                                            <div class="popup_user_sdn_link_img">
                                                <?= $icon_tinyeuthich ?>
                                            </div>
                                            <div class="popup_user_sdn_link_tex">Tin đã yêu thích</div>
                                        </a>
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
                                        <a href="/ho-so-quan-ly-tin-ban.html" class="popup_user_sdn_link cl_strock">
                                            <div class="popup_user_sdn_link_img">
                                                <?= $icon_ql_tin ?>
                                            </div>
                                            <div class="popup_user_sdn_link_tex">Quản lý tin đăng</div>
                                        </a>
                                        <a href="/ho-so-gian-hang-tin-ban-da-yeu-thich.html" class="popup_user_sdn_link cl_strock">
                                            <div class="popup_user_sdn_link_img">
                                                <?= $icon_tinyeuthich ?>
                                            </div>
                                            <div class="popup_user_sdn_link_tex">Tin đã yêu thích</div>
                                        </a>
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
                                <!-- HẾT NGƯỜI BÁN -->
                            </div>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>

        <div class="box-search">
            <div class="logo_new logo_new_pc"><a href="/" title="Chợ mua bán, quảng cáo, rao vặt miễn phí"><img src="/images/logo.png" alt="Chợ mua bán, quảng cáo, rao vặt miễn phí" class="logo-new"></a>
            </div>
            <div class="form-search form-search_df">
                <form action="/home/quicksearch_2.php" method="POST" id="search-form">
                    <?
                    $tit_sp  = getValue("sp", "str", "GET", "");
                    $tit_sp   = replaceMQ($tit_sp);
                    $tit_sp   = strip_tags($tit_sp);
                    $tit_sp   = str_replace("-", " ", $tit_sp);
                    $tit_sp = trim($tit_sp);

                    $tags_id = getValue('tags', 'int', 'GET', 0);
                    $tags_id = (int)$tags_id;
                    $ten_tags = $tags_tk1[$tags_id];

                    $tagsvl = getValue('tagsvl', 'int', 'GET', 0);
                    $tagsvl = (int)$tagsvl;
                    $ten_tags_vl = $db_tags_vl[$tagsvl];

                    $nn = getValue('nn', 'int', 'GET', 0);
                    $nn = (int)$nn;
                    $tennganhnghe = $db_cat_vl[$nn];

                    if ($tit_sp != "" && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
                        $tentim_kiem = $tit_sp;
                    } else if ($tit_sp == "" && $tags_id != 0 && $tagsvl == 0 && $nn == 0) {
                        $tentim_kiem = $ten_tags;
                    } else if ($tit_sp == "" && $tags_id == 0 && $tagsvl != 0 && $nn == 0) {
                        if (in_array($tagsvl, $tagsnnghe_cvl)) {
                            $tentim_kiem = $ten_tags_vl;
                        } else {
                            $tentim_kiem = 'việc làm ' . $ten_tags_vl;
                        }
                    } else if ($tit_sp == "" && $tags_id == 0 && $tagsvl == 0 && $nn != 0) {
                        if ($nn == 87) {
                            $tentim_kiem = 'Việc làm thêm';
                        } else if ($nn == 83 || $nn == 79 || $nn == 10) {
                            $tentim_kiem = ucfirst($tennganhnghe);
                        } else {
                            $tentim_kiem = 'Việc làm ' . $tennganhnghe;
                        }
                    } else {
                        $tentim_kiem = '';
                    }
                    ?>
                    <div class="choose_search">
                        <input value="<?= $tentim_kiem ?>" type="text" class="key_search" id="keyword" placeholder="Tìm kiếm sản phẩm ..." name="new_name" autocomplete="off" />
                        <select id="city_search" class="city_search" name="name_city">
                            <option value="0">Toàn quốc</option>
                            <? foreach ($arrcity as $item => $type) { ?>
                                <option <?= isset($citid) ? ($citid == $type['cit_id'] ? "selected" : "") : "" ?> value="<?= $type['cit_id'] ?>"><?= $type['cit_name'] ?></option>
                            <? }
                            unset($item, $type);
                            ?>
                        </select>
                        <select id="cate_search" class="cate_search" name="name_cate">
                            <option value="0">Chọn danh mục</option>
                            <? foreach ($db_cat as $item => $type) {
                                if (isset($timkiem_mua) && $timkiem_mua != "") {
                                    if (in_array($type['cat_id'], $bodmuc_mua) == false) { ?>
                                        <option <?= isset($catid) ? ($catid == $type['cat_id'] ? "selected" : "") : "" ?> value="<?= $type['cat_id'] ?>"><?= ($type['cat_id'] != 121) ? $type['cat_name'] : 'Tìm ứng viên' ?></option>
                                    <? }
                                } else if (!isset($timkiem_mua) && $timkiem_mua == "") {
                                    if (in_array($type['cat_id'], $bodmuc_ban) == false) { ?>
                                        <option <?= isset($catid) ? ($catid == $type['cat_id'] ? "selected" : "") : "" ?> value="<?= $type['cat_id'] ?>"><?= ($type['cat_id'] != 120) ? $type['cat_name'] : 'Tìm việc làm' ?></option>
                            <? }
                                }
                            }
                            unset($item, $type);
                            ?>
                        </select>
                        <input type="hidden" name="phan_biet_mb" class="tkiem_pbiet_mb" value="<?= (isset($timkiem_mua) && $timkiem_mua != "") ? "1" : "2" ?>">
                        <input type="submit" class="btn_timkiem button sh_cursor" value="TÌM KIẾM" />
                    </div>
                </form>
                <div class="nd_box_key d_none">
                    <?php if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
                        $us_id = $_COOKIE['UID']; ?>
                        <div class="kq_lq" id="key_lq">
                            <p class="text_def">Tìm kiếm gần đây</p>
                            <div id="fts_idautocomplete-list" class="autocomplete-items-tag">
                                <?
                                if (!isset($timkiem_mua) && $timkiem_mua == "") {
                                    $qr_search = new db_query("SELECT `key_search`FROM `search` WHERE user_id = " . $us_id . " ORDER BY created_at desc limit 20");
                                    $lis_search = $qr_search->result_array();
                                    if (count($lis_search) > 0) {
                                        foreach ($lis_search as $item => $type) { ?>
                                            <p class="key_tag" onclick="click_search(this)" data-name="<?= ($type['key_search']) ?>"> <?= str_replace("-", " ", $type['key_search'])  ?></p>
                                        <?  }
                                        unset($item, $type);
                                    }
                                    if (count($lis_search) == 0) { ?>
                                        <p class="key_tag">Bạn chưa tìm kiếm</p>
                                <? }
                                } ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="kq_lq" id="key_lq">
                            <p class="text_def">Tìm kiếm gần đây</p>
                            <div id="fts_idautocomplete-list" class="autocomplete-items-tag">
                            </div>
                        </div>
                    <?php } ?>
                    <div class="kq_gy" id="list_cate">
                        <p class="text_def">Từ khóa phổ biến</p>
                        <div id="fts_idautocomplete-list" class="autocomplete-items">
                            <? foreach ($db_cat as $item => $type) {
                                if (isset($timkiem_mua) && $timkiem_mua != "") {
                                    if (in_array($type['cat_id'], $bodmuc_mua) == false) { ?>
                                        <p class="key_tag" onclick="click_search(this)" data-name="<?= ($type['cat_id'] != 121) ? $type['cat_name'] : 'Tìm ứng viên' ?>"><?= ($type['cat_id'] != 121) ? $type['cat_name'] : 'Tìm ứng viên' ?></p>
                                    <? }
                                } else if (!isset($timkiem_mua) && $timkiem_mua == "") {
                                    if (in_array($type['cat_id'], $bodmuc_ban) == false) { ?>
                                        <p class="key_tag" onclick="click_search(this)" data-name="<?= ($type['cat_id'] != 120) ? $type['cat_name'] : 'Tìm việc làm' ?>"><?= ($type['cat_id'] != 120) ? $type['cat_name'] : 'Tìm việc làm' ?></p>
                            <? }
                                }
                            }
                            unset($item, $type);
                            ?>
                        </div>
                    </div>
                    <div class="icon_X">
                        <img src="/images/anh_moi/close.png" alt="">
                    </div>
                </div>
                <div class="box-keyword">
                    <span class="title_keyword">Từ khóa nổi bật:</span>
                    <div class="keywords">
                        <?
                        $qr = new db_query("SELECT `search_key` FROM `search_popular` ORDER BY count_num desc limit 7");
                        $lis = $qr->result_array();
                        ?>
                        <?php if (count($lis) > 0) : ?>
                            <?php foreach ($lis as $m => $value_lis) : ?>
                                <a onclick="click_search2(this)" data-name="<?= str_replace('-', ' ', $value_lis['search_key'])  ?>" class="keyword sh_cursor"><?= str_replace('-', ' ', $value_lis['search_key'])  ?></a>
                            <?php endforeach ?>
                        <?php endif ?>
                        <?php if (count($lis) == 0) : ?>
                            <a class="keyword ">Đang cập nhật...</a>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="post_new post_new_df">
                <? if (isset($_COOKIE['UT']) && isset($_COOKIE['UID'])) { ?>
                    <a href="/chon-loai-dang-tin.html" class="post-new button">
                        <img class="icon_post" src="/images/icon/fluent_calendar_edit.svg" alt="">
                        <p>Đăng tin</p>
                    </a>
                <? } else if (!isset($_COOKIE['UT']) && !isset($_COOKIE['UID'])) { ?>
                    <a href="/dang-nhap.html" class="post-new button">
                        <img class="icon_post" src="/images/icon/fluent_calendar_edit.svg" alt="">
                        <p>Đăng tin</p>
                    </a>
                <? } ?>
            </div>
        </div>

        <!-- MENU BARR -->
        <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
            <div class="popup_menubar">
                <div class="popup_menubar_padding">
                    <a href="/" class="menubar_block1 <?= ($_SERVER['REDIRECT_URL'] == '/') ? "menubar_color" : "" ?>" onclick="click_color(this)">
                        <div class="menubar_block1_img">
                            <?= $icon_trangchu ?>
                        </div>
                        <div class="menubar_block1_tex">Trang chủ</div>
                    </a>
                    <a href="https://chat365.timviec365.vn/" target="_blank" rel="nofollow" class="menubar_block1" onclick="click_color(this)">
                        <div class="menubar_block1_img">
                            <?= $icon_chat ?>
                        </div>
                        <div class="menubar_block1_tex">Chat</div>
                    </a>
                    <a href="/chon-loai-dang-tin.html" class="menubar_dangtin">
                        <div class="menubar_dangtin_img">
                            <?= $icon_dangtin ?>
                        </div>
                    </a>
                    <a class="menubar_block1 btn_thongbao">
                        <div class="menubar_block1_img">
                            <?= $icon_thongbao ?>
                        </div>
                        <div class="menubar_block1_tex">Thông báo</div>
                    </a>
                    <? if ($_COOKIE['UT'] == 1) { ?>
                        <a href="/ho-so-nguoi-ban-ca-nhan.html" class="menubar_block1 <?= ($_SERVER['REDIRECT_URL'] == '/ho-so-nguoi-ban-ca-nhan.html') ? "menubar_color" : "" ?>" onclick="click_color(this)">
                            <div class="menubar_block1_img">
                                <?= $icon_taikhoan ?>
                            </div>
                            <div class="menubar_block1_tex">Tài khoản</div>
                        </a>
                    <? } else if ($_COOKIE['UT'] == 5) { ?>
                        <a href="/ho-so-gian-hang-cua-toi-trang-chu.html" class="menubar_block1 <?= ($_SERVER['REDIRECT_URL'] == '/ho-so-gian-hang-cua-toi-trang-chu.html') ? "menubar_color" : "" ?>" onclick="click_color(this)">
                            <div class="menubar_block1_img">
                                <?= $icon_taikhoan ?>
                            </div>
                            <div class="menubar_block1_tex">Tài khoản</div>
                        </a>
                    <? } ?>
                </div>
            </div>
        <? } ?>
    </div>
</header>