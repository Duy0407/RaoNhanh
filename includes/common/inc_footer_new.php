<footer>
    <div class="menu_footer">
        <div class="container">
            <ul>
                <li><a rel="nofollow" href="/co-che-hoat-dong-e1.html" title="Cơ chế hoạt động">CƠ CHẾ HOẠT ĐỘNG</a></li>
                <li><a rel="nofollow" href="/quy-dinh-chung-e2.html" title="Quy định chung">QUY ĐỊNH CHUNG</a></li>
                <li><a rel="nofollow" href="/quy-trinh-thanh-toan-e3.html" title="Quy trình thanh toán">QUY TRÌNH THANH TOÁN</a></li>
                <li><a rel="nofollow" href="/quy-trinh-giao-dich-e4.html" title="Quy trình giao dịch">QUY TRÌNH GIAO DỊCH</a></li>
                <li><a rel="nofollow" href="/chinh-sach-bao-mat-e5.html" title="Chính sách bảo mật">CHÍNH SÁCH BẢO MẬT</a></li>
                <li><a rel="nofollow" href="/giai-quyet-tranh-chap-e6.html" title="Giải quyết tranh chấp">GIẢI QUYẾT TRANH CHẤP</a></li>
            </ul>
        </div>
    </div>
    <div class="b_footer">
        <div class="container">
            <div class="top_footer">
                <?
                $db_qrc = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = 0 AND cat_type <> '' ORDER BY cat_type ASC LIMIT 5");
                while ($rowc = mysql_fetch_assoc($db_qrc->result)) {
                ?>
                    <?
                    ?>
                    <div class="item_mn">
                        <a href="<?= rewrite_cate($rowc['cat_id'], $rowc['cat_name']) ?>" title="<?= $rowc['cat_name'] ?>"><span><?= mb_strtoupper($rowc['cat_name'], 'UTF-8') ?></span></a>
                        <div class="main_mn">
                            <?
                            $db_catcon = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = " . $rowc['cat_id'] . " LIMIT 3");
                            while ($rowcon = mysql_fetch_assoc($db_catcon->result)) {
                            ?>
                                <a href="<?= rewrite_cate($rowcon['cat_id'], $rowcon['cat_name']) ?>" title="<?= $rowcon['cat_name'] ?>"><?= $rowcon['cat_name'] ?></a>
                            <?
                            }
                            unset($db_catcon, $rowcon);
                            ?>
                        </div>
                    </div>
                <?
                }
                unset($db_qrc, $rowc);
                ?>
            </div>
            <span class="arr_footer"></span>
            <div class="bot_footer">
                <div class="col1">

                    <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
                        <tr>
                            <td style="">
                                <table border="0" width="280" cellspacing="0" cellpadding="0" style="border-collapse:separate;background-color:#ffffff;border:1px solid #dddfe2;border-radius:3px;font-family:Helvetica, Arial, sans-serif;width: 100%">
                                    <tr style="padding-bottom: 8px;">
                                        <td style="">
                                            <img class="img lazyload" style="width: 100%;" src="/images/loading.gif" data-src="https://scontent.fhan4-1.fna.fbcdn.net/v/t1.6435-9/102907519_932733947174454_5999736836864491611_n.jpg?_nc_cat=105&ccb=1-5&_nc_sid=8631f5&_nc_ohc=f8zfZJ-0OgcAX8ECv1N&_nc_ht=scontent.fhan4-1.fna&oh=00_AT9zpk-vqEt8kv-LkrlIvdCRRqW-lDmfQnM8vMK4mZerAw&oe=625C87EF" width="280" height="110" alt="" />
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-size:14px;font-weight:bold;padding:8px 8px 0px 8px;text-align:center;">CHỢ MUA BÁN RAO VẶT - RAONHANH365</td>
                                    </tr>
                                    <tr>
                                        <td style="color:#90949c;font-size:12px;font-weight:normal;text-align:center;">Nhóm Riêng tư · 126.800 thành viên</td>
                                    </tr>
                                    <tr>
                                        <td style="padding:8px 12px 12px 12px;">
                                            <table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%;">
                                                <tr>
                                                    <td style="background-color:#4267b2;border-radius:3px;text-align:center;">
                                                        <a style="color:#3b5998;text-decoration:none;cursor:pointer;width:100%;" href="https://www.facebook.com/plugins/group/join/popup/?group_id=544992575515172&amp;source=email_campaign_plugin" target="_blank" rel="nofollow">
                                                            <table border="0" cellspacing="0" cellpadding="3" align="center" style="border-collapse:collapse;width: 100%">
                                                                <tr>
                                                                    <td class="facebook">Tham gia nhóm</td>
                                                                </tr>
                                                            </table>
                                                        </a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    <span>LIÊN HỆ QUẢNG CÁO</span>
                    <!-- ads@tinnhanh365.vn -->
                    <p><img src="/images/loading.gif" class="lazyload" data-src="/images/ic_mail_ft.png" /><b>Email:</b> timviec365.vn@gmail.com</p>
                    <p><img src="/images/loading.gif" class="lazyload" data-src="/images/ic_phone_ft.png" /><b>Hotline:</b> 1900633682</p>
                </div>
                <div class="col2">
                    <p>ĐƠN VỊ QUẢN LÝ NỘI DUNG</p>
                    <div><span class="trang congty"><b>Công ty Cổ phần Thanh toán Hưng Hà</b></span></div>
                    <div><span class="trang diachi"><b>Địa chỉ văn phòng: </b>Tầng 2, Số 1 đường Trần Nguyên Đán, Khu Đô Thị Định Công, Hoàng Mai, Hà Nội </span></div>
                    <div><span class="trang emaillienhe"><b>Email:</b> timviec365.vn@gmail.com</span></div>
                    <div><span class="trang dienthoai"><b>Hotline:</b> 1900633682</span></div>
                    <div><span class="trang giayphep"><b>Giấy phép số:</b> 4150/GP-TTĐT</span></div>
                    <div><span class="trang"><b>Ngày cấp:</b> 24/08/2016</span></div>
                </div>
                <div class="col3">
                    <div class="box_sub">
                        <div class="sub_email">
                            <div style="float: left;">
                                <a rel="nofollow" href="http://online.gov.vn/Home/WebDetails/35979?AspxAutoDetectCookieSupport=1"><img style="margin:auto;margin-left: 120px;" src="/images/loading.gif" class="lazyload" data-src="/images/bct.png" alt="Đã đăng ký Bộ Công Thương" height="60" /></a>
                                <p style="margin:auto;width: 100%;text-align: center;margin-top: 10px;">Copyright © 2017 <b>Công ty Cổ phần Thanh toán Hưng Hà</b></p>
                            </div>
                            <div class="input_email">
                                <input type="text" placeholder="Nhập địa chỉ email của bạn ..." />
                                <input type="submit" value="ĐĂNG KÝ NGAY" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>


    <div id="btn-top" style=""></div>
    <div id="box-chat"></div>
</footer>