<footer>
    <div class="ctn_footer w_100 sh_bgr_one">
        <div class="ctn_ft_top w_100 d_flex ">
            <div class="ft_top_one">
                <img src="/images/anh_moi/logo_web.png" alt="logo" />
            </div>
            <div class="ft_top_two">
                <input type="text" name="email_dc" class="input_emd sh_size_one " placeholder="Nhập địa chỉ Email">
                <span class="nhan_ett sh_clr_one sh_size_one sh_cursor" onclick="nhan_ttin(this)">Đăng ký nhận thông tin</span>
            </div>
        </div>
        <div class="ctn_ft_between w_100 d_flex">
            <div class="ft_betw_one ">
                <h3 class="ft_tilt sh_clr_two w_100  cr_weight mb_20">ĐƠN VỊ QUẢN LÝ NỘI DUNG</h3>
                <h4 class="ft_inf_name sh_clr_two w_100  cr_weight mb_20">Công ty Cổ phần Thanh toán Hưng Hà</h4>
                <p class="ft_del w_100 w_72 sh_clr_five sh_size_five mb_20">Địa chỉ: Tầng 2, Số 1 đường Trần Nguyên Đán, Khu Đô Thị Định Công, Hoàng Mai, Hà Nội</p>
                <p class="ft_del w_100  sh_clr_five sh_size_five mb_20">Email: timviec365.vn@gmail.com</p>
                <p class="ft_del w_100  sh_clr_five sh_size_five mb_20">Hotline: 1900633682</p>
                <p class="ft_del w_100  sh_clr_five sh_size_five mb_20">Giấy phép số: 4150/GP-TTĐT</p>
                <p class="ft_del w_100  sh_clr_five sh_size_five">Ngày cấp: 24/08/2016</p>
            </div>
            <div class="ft_betw_two">
                <div class="betw_ctn_one w_100">
                    <h3 class="ft_tilt sh_clr_two w_100 cr_weight mb_20">LIÊN KẾT</h3>
                    <div class="betw_chil_one w_100 d_flex">
                        <div class="ctn_chil_one d_flex fl_wrap">
                            <a href="/" class="cr_weight w_100  sh_size_one sh_clr_two mb_20">Cơ chế hoạt động</a>
                            <a href="/quy-dinh-chung.html" class="cr_weight w_100  sh_size_one sh_clr_two mb_20">Quy định chung</a>
                            <a href="/quy-trinh-thanh-toan.html" class="cr_weight w_100  sh_size_one sh_clr_two mb_20">Quy trình thanh toán</a>
                        </div>
                        <div class="ctn_chil_two d_flex fl_wrap">
                            <a href="/quy-trinh-giao-dich.html" class="cr_weight w_100  sh_size_one sh_clr_two mb_20">Quy trình giao dịch</a>
                            <a href="/danh-sach-bao-mat.html" class="cr_weight w_100  sh_size_one sh_clr_two mb_20">Chính sách bảo mật</a>
                            <a href="/giai-quyet-tranh-chap.html" class="cr_weight w_100  sh_size_one sh_clr_two mb_20">Giải quyết tranh chấp</a>
                        </div>
                    </div>
                </div>
                <div class="betw_ctn_two w_100 d_flex lienhe">
                    <div class="ft_betw_chil_one ">
                        <h3 class="ft_tilt sh_clr_two w_100  cr_weight mb_20">LIÊN HỆ QUẢNG CÁO</h3>
                        <p class="ft_del w_100  sh_clr_five sh_size_five mb_15">Email: timviec365.vn@gmail.com</p>
                        <p class="ft_del w_100  sh_clr_five sh_size_five">Hotline: 1900633682</p>
                    </div>
                    <div class="ft_betw_chil_two ">
                        <a href="#"><img src="/images/anh_moi/exp_dangky.png" alt="dang ky bo cong thuong"></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="betw_ctn_two w_100 d_flex lienhe_1024">
            <div class="ft_betw_chil_one ">
                <h3 class="ft_tilt sh_clr_two w_100  cr_weight mb_20">LIÊN HỆ QUẢNG CÁO</h3>
                <p class="ft_del w_100  sh_clr_five sh_size_five mb_15">Email: timviec365.vn@gmail.com</p>
                <p class="ft_del w_100  sh_clr_five sh_size_five">Hotline: 1900633682</p>
            </div>
            <div class="ft_betw_chil_two ">
                <a href="#"><img src="/images/anh_moi/exp_dangky.png" alt="dang ky bo cong thuong"></a>
            </div>
        </div>
        <div class="ctn_ft_day w_100  tex_center">
            <p class="sh_clr_four sh_size_three">Copyright © 2017 Công ty Cổ phần Thanh toán Hưng Hà</p>
        </div>
    </div>
</footer>

<div class="overlay_dn">
    <div class="popup_dn">
        <div class="fr_head">
            <p>Đăng nhập</p>
            <span id="cl_ovl_dn">X</span>
        </div>
        <div class="fr_body">
            <form id="loginForm_dn">
                <span class="dnhap_taikhch"></span>
                <div class="main_login">
                    <div class="p_username mainl_form">
                        <label class="cr_weight">Số điện thoại/email/tên đăng nhập</label>
                        <input type="text" id="user_dn" name="user" class="input_acc" tabindex="1" placeholder="Nhập số điện thoại hoặc email hoặc tên đăng nhập" onclick="cli_an(this)" />
                    </div>
                    <div class="clear"></div>
                    <div class="p_password mainl_form">
                        <label class="cr_weight">Mật khẩu</label>
                        <input type="password" id="pass_dn" name="Password5" class="input_pass" tabindex="2" placeholder="Mật khẩu" onclick="cli_an(this)" />
                        <span class="error_sai sh_size_five color_red mt_5"></span>
                    </div>
                    <input type="hidden" name="r_chat" value="1">
                    <div class="btn_sub_login">
                        <input type="button" value="Đăng nhập" id="submit_dn" class="input_sm sh_cursor" tabindex="3" onclick="dang_nhaptk(this)" />
                    </div>
                    <div class="save_login check_cb">
                        <a class="qmk_dn_ovl cr_weight sh_size_one sh_clr_six" href="/quen-mat-khau.html" title="Quên mật khẩu" rel="nofollow">Quên mật khẩu?</a>
                        <p class="dk_ovl sh_size_one">Chưa có tài khoản? <a class="btn_register_2 sh_cursor cr_weight sh_clr_six" href="/dang-ky.html"> Đăng ký</a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $list_tb = new db_query("SELECT `id`, `notify_from`, `notify`.`new_id`, `type`, `create_time`, `notify_content`, `usc_name`, `usc_logo`, `usc_store_name`,
                                            `usc_type`, `new_title`, `link_title`, `new_buy_sell`, `new_cate_id` FROM `notify`
                                            INNER JOIN `user` ON `notify`.`notify_from` = `user`.`usc_id`
                                            INNER JOIN `new` ON `notify`.`new_id` = `new`.`new_id`
                                            WHERE `notify_to` = '" . $_COOKIE['UID'] . "' ORDER BY `id` DESC ") ?>
    <div class="modal thongbao_popup">
        <div class="modal-content">
            <div class="bgom_modal sh_bgr_one">
                <div class="modal-header tex_center tbao_hd">
                    <span class="close close_btn_tbao sh_cursor sh_clr_one">&times;</span>
                    <h2 class="sh_size_one sh_clr_one">Thông báo</h2>
                </div>
                <div class="modal-body">
                    <div class="tbao_body">
                        <? if (mysql_num_rows($list_tb->result) > 0) { ?>
                            <? while ($row_tbao = mysql_fetch_assoc($list_tb->result)) { ?>
                                <div class="noti-one">
                                    <div class="avt_tbao_tde">
                                        <div class="noti-img">
                                            <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png'" src="<?= $row_tbao['usc_logo'] ?>" alt="<?= ($row_tbao['usc_type'] == 1) ? $row_tbao['usc_name'] : $row_tbao['usc_store_name'] ?>">
                                        </div>
                                        <div class="noti-txt">
                                            <a href="/<?= replaceTitle($row_tbao['link_title']) ?>-<?= (($row_tbao['new_buy_sell'] == 2 || $row_tbao['new_cate_id'] == 120 || $row_tbao['new_cate_id'] == 121)) ? 'c' : 'ct' ?><?= $row_tbao['new_id'] ?>.html" class="noti">
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
                        <? } else { ?>
                            <div class="nothing-here">
                                <div class="bg-svg">
                                    <?= $bg_nothing_here ?>
                                </div>
                                <p>Bạn chưa có thông báo nào!</p>
                            </div>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<? } ?>
<script type="text/javascript" src="/js/style_new/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/style_new/select2.min.js"></script>
<script type="text/javascript" src="/js/style_new/jquery.validate.min.js"></script>
<script src="/js/slickslider/slick.min.js"></script>
<script src="/js/lazysizes.min.js"></script>
<script type="text/javascript" src="/js/style_new/script_duy.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.0.1/socket.io.min.js" integrity="sha512-eVL5Lb9al9FzgR63gDs1MxcDS2wFu3loYAgjIH0+Hg38tCS8Ag62dwKyH+wzDb+QauDpEZjXbMn11blw8cbTJQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/js/chat_call.js?ver=<?= $version; ?>"></script>

<?
if (isset($_COOKIE['chat365']) && $_COOKIE['chat365'] != '') {
    if (isset($_COOKIE['id_chat365']) && $_COOKIE['id_chat365'] > 0) {
        $un_seen = un_seen_chat($_COOKIE['id_chat365']);
    } else {
        $un_seen = array();
    }
?>
    <!-- <iframe style="display:none" src="https://chat365.timviec365.vn/api_app/login_chat365.php?id=Y2FjbUgrRlJqRjVFMG5PWnZ5NW5Xdz09&amp;pass=021ace4a4f36711b27e62dac5706273c&amp;sc=HJva6hdkct&amp;from=raonhanh365.vn" name="chat365_if"></iframe> -->
    <iframe style="display:none" src="https://chat365.timviec365.vn/api_app/login_chat365.php?<?= $_COOKIE['chat365']; ?>" name="chat365_if"></iframe>
<?
}
if (isset($_COOKIE['UID'])) {
    $name_tb = (isset($un_seen['data']['conversation']['conversationName'])) ? $un_seen['data']['conversation']['conversationName'] : '';
    $mess_tb = (isset($un_seen['data']['conversation']['message'])) ? $un_seen['data']['conversation']['message'] : '';
    $count_tb = (isset($un_seen['data']['countConversation'])) ? $un_seen['data']['countConversation'] : 0;
    $id_tb = (isset($un_seen['data']['conversation']['conversationId'])) ? $un_seen['data']['conversation']['conversationId'] : 0;
?>
    <div class="tb_chat365" <?= (isset($un_seen['data']) && $un_seen['data'] != NULL && isset($_COOKIE['chat365'])) ? 'style="display:block"' : ''; ?>>
        <div class="wapper">
            <div class="auth_form">
                <p class="post_title">Thông báo<img class="close_pop_login" onclick="close_tb()" src="/images/anh_moi/close_btndo.png" alt="close"></p>
                <div class="frame_tbmess">
                    <?= ($count_tb != 1) ? '<p class="post_info" id="xh_f">Bạn có <span class="col_blu">' . $count_tb . '</span> cuộc trò truyện mới chưa trả lời</p><p class="post_info">Tin nhắn mới nhất từ <span class="name">' . $name_tb . '</span>: <span class="nd col_blu">' . $mess_tb . '</span></p>' : '<p class="post_info">Bạn có tin nhắn mới từ <span class="name">' . $name_tb . '</span>: <span class="nd col_blu">' . $mess_tb . '</span></p>'; ?>
                </div>
                <a target="_blank" href="<?= ($count_tb != 1) ? 'https://chat365.timviec365.vn' : 'https://chat365.timviec365.vn/conversation-c' . $id_tb . '-u' . $_COOKIE['id_chat365']; ?>" rel="nofollow" onclick="remove_on(<?= $_COOKIE['id_chat365']; ?>)" class="btn_login">
                    <img src="/images/anh_moi/iconchat_green.png" alt="Trả lời" width="16px" height="16px"> Trả lời
                </a>
            </div>
        </div>
    </div>
<? }
setcookie('chat365', null, -1, '/'); ?>

<div class="modal popup_anh_dadang">
    <div class="modal-content">
        <div class="body_modal">
            <h3>File đã đăng</h3>
            <div class="anh_ddangl">

            </div>
            <div class="butt_anhddang">
                <p class="anhda_chon" onclick="anh_dachon(this)">Chọn (<span>0</span>)</p>
                <p class="anhtai_len add_img">Tải file từ máy</p>
            </div>
        </div>
    </div>
</div>