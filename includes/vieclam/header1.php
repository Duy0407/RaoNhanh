<?
include("config_vl.php");
require_once("../cache_file/top-cache.php");
require_once "../classes/Mobile_Detect.php";
$detect = new Mobile_Detect;
$dk_ok = 0;
if (isset($_COOKIE['dk_ok'])) {
    $dk_ok    = $_COOKIE['dk_ok'];
}
if (isset($_COOKIE['UID'])) {
    $userid   = $_COOKIE['UID'];
    $userpass = $_COOKIE['PHPSESPASS'];
    $usertype = $_COOKIE['UT'];

    $db_qr4    = new db_query("SELECT * FROM user WHERE usc_id = " . $userid . " AND usc_pass  = '" . $userpass . "'");
    $login = mysql_num_rows($db_qr4->result);
    if ($login > 0) {
        $row4 = mysql_fetch_assoc($db_qr4->result);
    }
}
?>
<header>
    <?php if ($detect->isMobile()) : ?>
        <div class="head_container">
            <div class="nav-mobile">
                <div class="logo">
                    <a href="/viec-lam.html"><img src="/images/vieclam/logo_mb.png"></a>
                </div>
                <div class="search-mb">
                    <form action="/home/search1.php" method="POST">
                        <input type="text" class="keyword" id="keyword" name="keyword" class="enter_ntd" placeholder="Nhập từ khóa tìm kiếm...">
                    </form>
                </div>
                <div class="form-filter-mb">
                    <a class="filter_popup" href="javascript:void(0)" onclick="showft_popup(this,'filter1')" data-id="<?= $row['new_id'] ?>">
                        <img src="/images/vieclam/loc_mb.png">
                        <span>Lọc</span>
                    </a>
                </div>
                <div class="menu" id="myTopnav">
                    <ul>
                        <a class="menu-close" href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="openNav()"><img src="/images/vieclam/menu_mb.png"></a>
                        <li>
                            <button class="dropbtn">
                                <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/menu.png" alt="menu"></div>Tất cả danh mục
                            </button>
                            <div class="dropdown-content">
                                <a href="/viec-lam.html" class="tc">Trang chủ</a>
                                <a href="/danh-sach-tin-dang-tim-viec-lam.html" class="tv">Người tìm việc</a>
                                <a href="https://raonhanh365.vn/tin-tuc" class="tt">Tin tức</a>
                                <a href="#" class="vgb">Việc gần bạn</a>
                                <a href="/gioi-thieu.html" class="gt">Giới thiệu</a>
                                <a href="/lien-he-viec-lam.html" class="lh">Liên hệ</a>
                                <a href="/chinh-sach-bao-mat.html" class="cs">Chính sách</a>
                                <a href="/thoa-thuan-su-dung.html" class="ttsd">Thỏa thuận sử dụng</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="mySidenav" class="sidenav ">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="nav-mb">
                <?
                if (!isset($_COOKIE['UID']) && empty($_COOKIE['UID'])) {
                ?>
                    <div class="register">
                        <div class="lg2">
                            <span class="btn_login"><a rel="nofollow" class="show_reg" href="javascript:void(0)" onclick="show_reg(this,'popup-login')">Đăng nhập</a></span>
                            <span class="line">/</span>
                            <span class="btn_register"><a rel="nofollow" class="show_reg" href="javascript:void(0)" onclick="show_reg(this,'box_singup')">Đăng ký</a></span>
                            <div class="popup-login" id="popup-login">
                                <div class="s-modal-content">
                                    <form id="loginForm_1" method="POST" action="/home/dangnhap.php" enctype="multipart/form-data" onsubmit="return checklogin();">
                                        <h5>ĐĂNG NHẬP TÀI KHOẢN</h5>
                                        <div class="main_login">
                                            <div class="p_username">
                                                <i><img src="/images/ic_us.png"></i>
                                                <input type="text" class="input_acc" placeholder="Tên đăng nhập" id="user" name="user" value="" />
                                            </div>
                                            <div class="clear"></div>
                                            <div class="p_password">
                                                <i><img src="/images/ic_pass.png"></i>
                                                <input type="password" class="input_pass" placeholder="Mật khẩu" id="Password5" name="Password5" value="" />
                                            </div>
                                            <div class="save_login check_cb">
                                                <label class="btn_register_2"><a class="show_reg" href="javascript:void(0)" onclick="show_reg(this,'box_singup')">Đăng ký tài khoản</a></label>
                                                <a style="padding: 0;" href="/quen-mat-khau.html" title="Quên mật khẩu" rel="nofollow">Quên mật khẩu?</a>
                                            </div>
                                            <div class="btn_sub_login">
                                                <input type="submit" id="signin_submit" value="Đăng nhập" tabindex="6" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="box_singup popup-login" id="box_singup" style="display: none;">
                                <div class="popup_register">
                                    <span>ĐĂNG KÝ TÀI KHOẢN CÁ NHÂN</span>
                                    <a href="javascript:void(0)" class="close" onclick="hide_reg('box_singup')"><i class="close_btn"></i></a>
                                    <div class="main_register">
                                        <form method="POST" action="/home/dangky_vl_s.php" onsubmit="return false;">
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Tên tài khoản:</div>
                                                <div class="control2"><input type="text" placeholder="Nhập tên tài khoản" id="usernamedk" name="usernamedk" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Mật khẩu:</div>
                                                <div class="control2"><input placeholder="Nhập mật khẩu" maxlength="16" id="password" name="password" type="password" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Nhập lại mật khẩu:</div>
                                                <div class="control2"><input placeholder="Nhập lại mật khẩu" maxlength="16" id="repassword" name="repassword" type="password" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Họ và tên:</div>
                                                <div class="control2"><input type="text" placeholder="Nhập họ tên" maxlength="20" id="Hoten" name="Hoten" value="" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1">Giới tính:</div>
                                                <div class="control2">
                                                    <select id="gender" name="gender">
                                                        <option value="2">Giới tính</option>
                                                        <option value="0">Nam</option>
                                                        <option value="1">Nữ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1">Ngày sinh:</div>
                                                <div class="control2">
                                                    <select id="slngay" name="slngay">
                                                        <option value='00'>Ngày</option>
                                                        <? $i = 1;
                                                        while ($i <= 31) {
                                                            echo "<option value='$i'>$i</option>";
                                                            $i++;
                                                        } ?>
                                                    </select>
                                                    <select id="slthang" name="slthang">
                                                        <option value='00'>Tháng</option>
                                                        <? $j = 1;
                                                        while ($j <= 12) {
                                                            echo "<option value='$j'>$j</option>";
                                                            $j++;
                                                        } ?>
                                                    </select>
                                                    <select id="slnam" name="slnam">
                                                        <option value='0000'>Năm</option>
                                                        <? $h = date("Y");
                                                        while ($h >= 1912) {
                                                            echo "<option value='$h'>$h</option>";
                                                            $h--;
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Email:</div>
                                                <div class="control2"><input type="text" placeholder="Nhập email" id="Email" name="Email" value="" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Số điện thoại:</div>
                                                <div class="control2"><input class="numbersOnly2" type="text" placeholder="Nhập số điện thoại" id="Phone" name="Phone" value="" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Khu vực:</div>
                                                <div class="control2">
                                                    <select id="city" name="city">
                                                        <option value="0">Chọn thành phố</option>
                                                        <?
                                                        foreach ($arrcity as $key => $value_ci) {
                                                            echo "<option value='" . $value_ci['cit_id'] . "'>" . $value_ci['cit_name'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Địa chỉ liên hệ:</div>
                                                <div class="control2"><input type="text" placeholder="Nhập địa chỉ" id="address" name="address" value="" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Mã xác nhận:</div>
                                                <div class="control2" style="position: relative;">
                                                    <div id="div_captcha">
                                                        <input type="text" class="bnmxn" id="captcha" name="captcha" />
                                                        <p class="captcha">
                                                            <img class="" src="/classes/securitycode.php" />
                                                        <p href="javascript:;" onclick="reloadSecurityCode(this)" class="reset-icon"></p>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" onclick="checkpostdt();" class="btn_dangky" value="Đăng ký" name="postok" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?
                } else {
                ?>
                    <div class="user">
                        <a class="tendangnhap" href="/trang-ca-nhan/trang-ca-nhan-<?= replaceTitle($row4['usc_name']) ?>-tk<?= $row4['usc_id'] ?>.html">
                            <div class="images">
                                <img src="<?= ($row4['usc_logo'] != '') ? str_replace('../pictures', '/pictures', $row4['usc_logo']) : '/images/detai-avata.png'; ?>" alt="<?= $row4['usc_name'] ?>" />
                            </div>
                        </a>
                        <div class="urc-name">
                            <a class="tendangnhap_1" href="/home/dangxuat_vl.php"></a>
                            <input id="show" type=checkbox>
                            <label for="show" class="logout">
                                <p class="name-usc"><?= $row4['usc_name'] ?></p><img src="/images/vieclam/logout.png" alt="logout">
                            </label>
                            <div id="content">
                                <div class="btn_logout"><a href="/home/dangxuat_vl.php">Đăng xuất</a></div>
                            </div>
                        </div>
                    </div>
                <? } ?>
                <div class="dangtin">
                    <a href="/dang-tin-mien-phi-vl.html">Đăng tin miễn phí</a>
                </div>
                <a href="/viec-lam.html" class="tc">Trang chủ</a>
                <a href="/danh-sach-tin-dang-tim-viec-lam.html" class="tv">Người tìm việc</a>
                <a href="https://raonhanh365.vn/tin-tuc" class="tt">Tin tức</a>
                <a href="#" class="vgb">Việc gần bạn</a>
                <a href="/gioi-thieu.html" class="gt">Giới thiệu</a>
                <a href="/lien-he-viec-lam.html" class="lh">Liên hệ</a>
                <a href="/chinh-sach-bao-mat.html" class="cs">Chính sách</a>
                <a href="/thoa-thuan-su-dung.html" class="ttsd">Thỏa thuận sử dụng</a>
            </div>
        </div>
    <?php else : ?>
        <div class="hd-top">
            <div class="col-1">
                <div class="logo">
                    <a href="/viec-lam.html">
                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/logo_vl.png" alt="việc làm raonhanh365">
                    </a>
                </div>
                <div class="form-search">
                    <form autocomplete="off" onsubmit=" return false;">
                        <input type="text" class="tukhoa" id="keyword" name="keyword" class="enter_ntd" placeholder="Nhập từ khóa tìm kiếm...">
                        <span class="line">|</span>
                        <select class="city_ab" name="thanhpho" id="thanhpho" data-select2-id="1" tabindex="-1" aria-hidden="true">
                            <option value="0">Chọn tỉnh / thành phố</option>
                            <?
                            foreach ($arrcity as $type => $item) {
                            ?>
                                <option <?= isset($city) ? ($city == $item['cit_id'] ? "selected" : "") : ""  ?> value="<?= $item['cit_id'] ?>"><?= $item['cit_name'] ?></option>
                            <?
                            }
                            unset($type, $item);
                            ?>
                        </select>
                        <button type="submit" name="timkiem" class="timkiem"><img src="/images/vieclam/search.png" alt="tìm kiếm"></button>
                    </form>
                </div>
                <div class="col-2">
                    <div class="dangtin">
                        <a href="/dang-tin-mien-phi-vl.html">Đăng tin miễn phí</a>
                    </div>
                </div>
                <div class="col-3">
                    <?
                    if (!isset($_COOKIE['UID']) && empty($_COOKIE['UID'])) {
                    ?>
                        <div class="lg2">
                            <span class="btn_login"><a rel="nofollow" class="show_reg" href="javascript:void(0)" onclick="show_reg(this,'popup-login')"><img src="/images/vieclam/dangnhap.png" alt="đăng nhập">Đăng nhập</a></span>
                            <span class="line">|</span>
                            <span class="btn_register"><a rel="nofollow" class="show_reg" href="javascript:void(0)" onclick="show_reg(this,'box_singup')"><img src="/images/vieclam/dangki.png" alt="đăng ky">Đăng ký</a></span>
                            <!-- <div class="box_login_con" style="display: none;">
                        <form id="loginForm_1" method="POST" action="/home/dangnhap.php" enctype="multipart/form-data" onsubmit="return checklogin();">
                               <h5>ĐĂNG NHẬP TÀI KHOẢN</h5>
                               <div class="main_login">
                                        <div class="p_username">
                                            <i><img src="/images/ic_us.png"></i>
                                            <input type="text" class="input_acc" placeholder="Tên đăng nhập" id="user" name="user" value=""/>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="p_password">
                                            <i><img src="/images/ic_pass.png"></i>
                                            <input type="password" class="input_pass" placeholder="Mật khẩu" id="Password5" name="Password5" value=""/>
                                        </div>
                                  <div class="save_login check_cb">
                                      <label class="btn_register_2"><a class="show_reg" href="javascript:void(0)" onclick="show_reg(this,'box_singup')">Đăng ký tài khoản</a></label>
                                     <a href="/quen-mat-khau.html" title="Quên mật khẩu" rel="nofollow">Quên mật khẩu?</a>
                                  </div>
                                  <div class="btn_sub_login">
                                      <input type="submit" id="signin_submit" value="Đăng nhập" tabindex="6"/>
                                  </div>
                               </div>
                        </form>
                  </div>  -->
                            <!-- popup-login -->
                            <div class="popup-login" id="popup-login">
                                <div class="s-modal-content">
                                    <form id="loginForm_1" method="POST" action="/home/dangnhap.php" enctype="multipart/form-data" onsubmit="return checklogin();">
                                        <h5>ĐĂNG NHẬP TÀI KHOẢN</h5>
                                        <div class="main_login">
                                            <div class="p_username">
                                                <i><img src="/images/ic_us.png"></i>
                                                <input type="text" class="input_acc" placeholder="Tên đăng nhập" id="user" name="user" value="" />
                                            </div>
                                            <div class="clear"></div>
                                            <div class="p_password">
                                                <i><img src="/images/ic_pass.png"></i>
                                                <input type="password" class="input_pass" placeholder="Mật khẩu" id="Password5" name="Password5" value="" />
                                            </div>
                                            <div class="save_login check_cb">
                                                <label class="btn_register_2"><a class="show_reg" href="javascript:void(0)" onclick="show_reg(this,'box_singup')">Đăng ký tài khoản</a></label>
                                                <a style="padding: 0;" href="/quen-mat-khau.html" title="Quên mật khẩu" rel="nofollow">Quên mật khẩu?</a>
                                            </div>
                                            <div class="btn_sub_login">
                                                <input type="submit" id="signin_submit" value="Đăng nhập" tabindex="6" />
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- end-popup-login -->
                            <div class="box_singup popup-login" id="box_singup" style="display: none;">
                                <div class="popup_register">
                                    <span>ĐĂNG KÝ TÀI KHOẢN CÁ NHÂN</span>
                                    <a href="javascript:void(0)" class="close" onclick="hide_reg('box_singup')"><i class="close_btn"></i></a>
                                    <div class="main_register">
                                        <form method="POST" action="/home/dangky_vl_s.php" onsubmit="return false;">
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Tên tài khoản:</div>
                                                <div class="control2"><input type="text" placeholder="Nhập tên tài khoản" id="usernamedk" name="usernamedk" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Mật khẩu:</div>
                                                <div class="control2"><input placeholder="Nhập mật khẩu" maxlength="16" id="password" name="password" type="password" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Nhập lại mật khẩu:</div>
                                                <div class="control2"><input placeholder="Nhập lại mật khẩu" maxlength="16" id="repassword" name="repassword" type="password" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Họ và tên:</div>
                                                <div class="control2"><input type="text" placeholder="Nhập họ tên" maxlength="20" id="Hoten" name="Hoten" value="" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1">Giới tính:</div>
                                                <div class="control2">
                                                    <select id="gender" name="gender">
                                                        <option value="2">Giới tính</option>
                                                        <option value="0">Nam</option>
                                                        <option value="1">Nữ</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1">Ngày sinh:</div>
                                                <div class="control2">
                                                    <select id="slngay" name="slngay">
                                                        <option value='00'>Ngày</option>
                                                        <? $i = 1;
                                                        while ($i <= 31) {
                                                            echo "<option value='$i'>$i</option>";
                                                            $i++;
                                                        } ?>
                                                    </select>
                                                    <select id="slthang" name="slthang">
                                                        <option value='00'>Tháng</option>
                                                        <? $j = 1;
                                                        while ($j <= 12) {
                                                            echo "<option value='$j'>$j</option>";
                                                            $j++;
                                                        } ?>
                                                    </select>
                                                    <select id="slnam" name="slnam">
                                                        <option value='0000'>Năm</option>
                                                        <? $h = date("Y");
                                                        while ($h >= 1912) {
                                                            echo "<option value='$h'>$h</option>";
                                                            $h--;
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Email:</div>
                                                <div class="control2"><input type="text" placeholder="Nhập email" id="Email" name="Email" value="" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Số điện thoại:</div>
                                                <div class="control2"><input class="numbersOnly2" type="text" placeholder="Nhập số điện thoại" id="Phone" name="Phone" value="" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Khu vực:</div>
                                                <div class="control2">
                                                    <select id="city" name="city">
                                                        <option value="0">Chọn thành phố</option>
                                                        <?
                                                        foreach ($arrcity as $key => $value_ci) {
                                                            echo "<option value='" . $value_ci['cit_id'] . "'>" . $value_ci['cit_name'] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Địa chỉ liên hệ:</div>
                                                <div class="control2"><input type="text" placeholder="Nhập địa chỉ" id="address" name="address" value="" /></div>
                                            </div>
                                            <div class="form_control">
                                                <div class="control1"><i class="sao">*</i>Mã xác nhận:</div>
                                                <div class="control2" style="position: relative;">
                                                    <div id="div_captcha">
                                                        <input type="text" class="bnmxn" id="captcha" name="captcha" />
                                                        <p class="captcha">
                                                            <img class="" src="/classes/securitycode.php" />
                                                        <p href="javascript:;" onclick="reloadSecurityCode(this)" class="reset-icon"></p>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" onclick="checkpostdt();" class="btn_dangky" value="Đăng ký" name="postok" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            <?
                    } else {
            ?>
                <a class="tendangnhap" href="/trang-ca-nhan/trang-ca-nhan-<?= replaceTitle($row4['usc_name']) ?>-tk<?= $row4['usc_id'] ?>.html">
                    <div class="images">
                        <img src="<?= ($row4['usc_logo'] != '') ? str_replace('../pictures', '/pictures', $row4['usc_logo']) : '/images/detai-avata.png'; ?>" alt="<?= $row4['usc_name'] ?>" />
                    </div>
                </a>
                <div class="urc-name">
                    <a class="tendangnhap" href="/home/dangxuat_vl.php"></a>
                    <input id="show" type=checkbox>
                    <label for="show" class="logout">
                        <p class="name-usc"><?= $row4['usc_name'] ?></p><img src="/images/vieclam/logout.png" alt="logout">
                    </label>
                    <div id="content">
                        <div class="btn_logout"><a href="/home/dangxuat_vl.php">Đăng xuất</a></div>
                    </div>
                </div>

            <? } ?>
            </div>
        </div>
        <div class="head_container">
            <div class="menu" id="myTopnav">
                <ul>
                    <div class="menu-01">
                        <li>
                            <div class="dropbtn">
                                <div class="images"><img src="/images/vieclam/menu.png" alt="menu"></div><span>Tất cả danh mục</span>
                            </div>
                            <div class="dropdown-content">
                                <div class="menu-list">
                                    <a href="/" class="tc">Trang chủ</a>
                                    <a href="/danh-sach-tin-dang-tim-viec-lam.html" class="tv">Người tìm việc</a>
                                    <a href="https://raonhanh365.vn/tin-tuc" class="tt">Tin tức</a>
                                    <a href="#" class="vgb">Việc gần bạn</a>
                                    <a href="/gioi-thieu.html" class="gt">Giới thiệu</a>
                                    <a href="/lien-he-viec-lam.html" class="lh">Liên hệ</a>
                                    <a href="/chinh-sach-bao-mat.html" class="cs">Chính sách</a>
                                    <a href="/thoa-thuan-su-dung.html" class="ttsd">Thỏa thuận sử dụng</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="/">
                                <div class="images"><img src="/images/vieclam/trangchu.png" alt="menu"></div>Trang chủ
                            </a>
                        </li>
                        <li>
                            <a href="/danh-sach-tin-dang-tim-viec-lam.html">
                                <div class="images"><img src="/images/vieclam/timviec.png" alt="menu"></div>Người tìm việc
                            </a>
                        </li>
                        <li>
                            <a href="https://raonhanh365.vn/tin-tuc">
                                <div class="images"><img src="/images/vieclam/tintuc.png" alt="menu"></div>Tin tức
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="images"><img src="/images/vieclam/diadiem.png" alt="menu"></div>Việc gần bạn
                            </a>
                        </li>
                    </div>
                    <div class="httt">
                        <li>
                            <a rel="nofollow" href="#">
                                <div class="images"><img src="/images/vieclam/thongbao.png" alt="menu"></div>Thông báo
                            </a>
                        </li>
                        <li>
                            <a rel="nofollow" href="#">
                                <div class="images"><img src="/images/vieclam/lienhe.png" alt="menu"></div>Hỗ trợ trực tuyến
                            </a>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
        </div>
    <?php endif; ?>
</header>



<div class="filter1" id="filter1" style="display: none;">
    <a href="javascript:void(0)" class="close" onclick="hideft_popup('filter1')">X</a>
    <div class="filter form_filter box_sbl sbl_list_form">
        <div class="loc filter_group box_sbl" id="myFilter">
            <form class="job-tp" method="post">
                <input type="text" name="keyword" id="tukhoa_mb" class="keyword_mb_filter" placeholder="Nhập từ khóa tìm kiếm...">
                <div class="gr-01">
                    <select name="thanhpho" id="thanhpho_mb" data-select2-id="1" tabindex="-1" aria-hidden="true" class="city_mb_filter">
                        <option value="">Chọn tỉnh / thành phố</option>
                        <?
                        $query = new db_query("SELECT cit_id,cit_name FROM city2 where cit_parent = 0");
                        while ($rowcty = mysql_fetch_assoc($query->result)) {
                        ?>
                            <option class="thanhpho" value="<? echo $rowcty['cit_id']; ?>" <? if ($city == $rowcty['cit_id']) {
                                                                                                echo 'selected';
                                                                                            } ?>>
                                <? echo $rowcty['cit_name']; ?>
                            </option>
                        <?
                        }
                        ?>
                    </select>
                    <select name="quanhuyen" id="quanhuyen_mb" value="" data-select2-id="1" tabindex="-1" aria-hidden="true" class="district_mb_filter">
                        <option value="">Chọn quận /huyện</option>
                        <? if (isset($_GET['city'])) :
                            $query = new db_query("SELECT cit_id,cit_name FROM city2 where cit_parent = '" . $_GET['city'] . "'");
                            while ($rowcty = mysql_fetch_assoc($query->result)) : ?>
                                <option class="quanhuyen" value="<? echo $rowcty['cit_id']; ?>">
                                    <? echo $rowcty['cit_name']; ?>
                                </option>
                        <?php endwhile;
                        endif ?>
                    </select>
                </div>
                <div class="gr-01">
                    <select name="nn" id="nganhnghe" data-select2-id="1" tabindex="-1" aria-hidden="true" class="career_mb_filter style_select">
                        <option value="">Chọn ngành nghề</option>
                        <?
                        $db_qra = new db_query("SELECT cat_id, cat_name FROM category_vl ");
                        while ($rowa = mysql_fetch_assoc($db_qra->result)) { ?>
                            <option value="<?= $rowa['cat_id'] ?>" <? if ($catid == $rowa['cat_id']) {
                                                                        echo 'selected';
                                                                    } ?>><?= $rowa['cat_name'] ?></option>
                        <?
                        }
                        ?>
                    </select>
                    <select name="ctnn" id="chitietnn" data-select2-id="1" tabindex="-1" aria-hidden="true" class="job_detail_mb_filter style_select">
                        <option value="">Ngành nghề chi tiết</option>
                        <? if (isset($_GET['catid'])) :
                            $query_cat = new db_query("SELECT key_id,key_name FROM keyword where key_cate_lq = '" . $_GET['catid'] . "'");
                            while ($rowtag = mysql_fetch_assoc($query_cat->result)) : ?>
                                <option class="nnct" value="<? echo $rowtag['key_id']; ?>">
                                    <? echo $rowtag['key_name']; ?>
                                </option>
                        <?php endwhile;
                        endif ?>
                    </select>
                </div>
                <div class="gr-01">
                    <select name="tg" id="thoigian_mb" data-select2-id="1" tabindex="-1" aria-hidden="true" class="job_type_mb_filter">
                        <option value="">Chọn thời gian làm việc</option>
                        <option value="1">Toàn thời gian</option>
                        <option value="2">Bán thời gian</option>
                        <option value="3">Giờ hành chính</option>
                        <option value="4">Ca sáng</option>
                        <option value="5">Ca chiều</option>
                        <option value="6">Ca đêm</option>
                    </select>
                    <select name="luong" id="luong_mb" data-select2-id="1" tabindex="-1" aria-hidden="true" class="pay_mb_filter">
                        <option value="">Hình thức trả lương</option>
                        <option value="1">Theo giờ</option>
                        <option value="2">Theo ngày</option>
                        <option value="3">Theo tuần</option>
                        <option value="4">Theo tháng</option>
                        <option value="5">Theo năm</option>
                    </select>
                </div>
                <div class="gr-01">
                    <input type="text" name="money_min" id="money_min_mb" class="money_min_mb_filter" placeholder="Từ (VNĐ)">
                    <input type="text" name="money_max" id="money_max_mb" class="money_max_mb_filter" placeholder="Đến (VNĐ)">
                </div>
            </form>
        </div>
    </div>
</div>