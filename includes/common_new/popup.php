<!--gửi mail đổi mật khẩu thành công-->
<div id="forgotSendMail" class="modalSuccessSendMail t_popup">
    <!-- Modal content -->
    <div class="box-check">
        <div class="modal-content">
            <p class="title_modal">Kiểm tra Email của bạn</p>
            <p class="text-check-mail">Hệ thống đã gửi xác nhận yêu cầu đổi mật khẩu của bạn,
                vui lòng kiêm tra hòm thư và làm theo hướng dẫn</p>

            <div class="btn_modal">
                <a href="/" class="btn-return input_form btn_resendMail btn_general" value="">Về trang chủ</a>
            </div>
        </div>
    </div>
</div>

<!--gửi mail đăng ký thành công-->
<!-- <div id="successSendMail" class="modalSuccessSendMail t_popup">
    <div class="box-check">
        <div class="modal-content">
            <p class="title_modal">Kiểm tra Email của bạn</p>
            <p class="text-check-mail">Vui lòng kiểm tra hòm thư email cá nhân để xác thực tài khoản!
                Nếu bạn chưa nhận được Email xác thực, hãy bấm nút Gửi lại Email</p>

            <div class="btn_modal">
                <a href="dang-xuat.html" class="btn-return input_form btn_backHome btn_general" value="">Về trang chủ</a>
                <button class="btn-return input_form btn_resendMail btn_general" id="reSendMailRegister" value="">Gửi lại email</button>
            </div>
        </div>
    </div>
</div> -->


<!-- -- đánh dấu là đã bán ---  -->
<div id="markedAsSold" class="modalmarkedAsSold dban_lai dddban">
    <!-- Modal content -->
    <div class="box-check">
        <div class="modal-content">
            <div class="title-modal">
                <p class="text_title_modal">Đánh dấu đã bán</p>
                <span class="close_popup close dong_ddau"><img src="/images/anh_moi/close_popup.png"></span>
            </div>
            <p class="text-check-mail">Tin đăng sẽ bị ẩn khỏi trang chủ và tất cả các mục con của Raonhanh365. Đồng thời các gói quảng cáo bạn đã mua cho tin đăng này sẽ không được bảo lưu trừ khi bạn dùng chức năng “Đăng bán lại”. Bạn có muốn tiếp tục?</p>
            <div class="btn_modal">
                <p class="btn-cancel input_form huy_ddau_ban">Huỷ bỏ</p>
                <div class="btn-success input_form dongy_tindd" data="" data2="">Đồng ý</div>
            </div>
        </div>
    </div>
</div>

<!-- -- đăng bán lại ---  -->
<div id="popup_resell_over" class="popup_resell">
    <!-- Modal content -->
    <div class="box-check">
        <div class="modal-content">
            <div class="title-modal">
                <p class="text_title_modal">Đăng bán lại</p>
                <span class="close dong_ddau"><img src="/images/newImages/close.png"></span>
            </div>
            <p class="text-check-mail">
                Tin của bạn sẽ được đăng lại trên hệ thống Raonhanh365.
                Bạn có muốn tiếp tục?
            </p>
            <div class="btn_modal">
                <p class="btn-cancel input_form huy_ddau_ban">Huỷ bỏ</p>
                <p class="btn-success input_form clickdangbanlai" data="">Đồng ý</p>
            </div>
        </div>
    </div>
</div>

<!-- -- số dư không đủ ---  -->
<div id="insufficient" class="modalSdkd">
    <!-- Modal content -->
    <div class="box-check">
        <div class="modal-content">
            <div class="title-modal">
                <p class="text_title_modal">Số dư không đủ</p>
                <span class="close close_sodu"><img src="/images/newImages/close.png"></span>

            </div>
            <p class="text-check-mail">Số dư hiện tại của bạn không đủ. <br> Bạn có muốn nạp thêm tiền vào Raonhanh365 ?</p>
            <div class="btn_modal">
                <button class="btn-cancel huybo_sodu">Huỷ bỏ</button>
                <button class="btn-success">Đồng ý</a>
            </div>
        </div>
    </div>
</div>

<!-- -- xác nhân thanh toán ---  -->
<div id="payment_conf" class="modalPaymentConf">
    <!-- Modal content -->
    <div class="box-check">
        <div class="modal-content">
            <div class="title-modal">
                <p class="text_title_modal">Xác nhận thanh toán</p>
                <span class="close close_ttoan"><img src="/images/newImages/close.png"></span>
            </div>
            <p class="text-check-mail">Bạn có chắc muốn thanh toán <span></span> VNĐ? <br>Sau khi xác nhận, tiền sẽ không thể hoàn lại</p>
            <div class="btn_modal">
                <button class="btn-cancel btn huybo_ymua">Huỷ bỏ</button>
                <button class="btn-success btn dong_ymua" data="">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

<!-- -- ghim tin ---  -->
<div id="pinNew" class="modalPinNew them_ghimtin">
    <!-- Modal content -->
    <div class="box-check">
        <div class="modal-content">
            <div class="content " id="page1">
                <div class="title-modal">
                    <p class="text_title_modal">Ghim tin</p>
                    <span class="close close_gtin"><img src="/images/newImages/close.png"></span>
                </div>
                <div class="main-content">
                    <p class="text-title">Chọn nơi ghim tin</p>
                    <div class="click">
                        <label class="box-click">
                            <div class="tde_ghim">
                                <span class="page">Trang chủ (Tin nổi bật)</span>
                                <span class="ten-khac">nổi bật trang chủ</span>
                                <input name="ghim_tin" type="checkbox" value="0" class="ghimtin_chek tin_nbat" />
                            </div>
                            <span class="moneyHour"> 18,000 VNĐ/giờ </span>
                        </label>

                        <label class="box-click ">
                            <div class="tde_ghim">
                                <span class="page">Trang chủ (Tin hấp dẫn)</span>
                                <span class="ten-khac">tin hấp dẫn trang chủ</span>
                                <input name="ghim_tin" type="checkbox" value="0" class="ghimtin_chek tt_hapdan" />
                            </div>
                            <span class="moneyHour"> 15,000 VNĐ/giờ </span>
                        </label>
                        <label class="box-click">
                            <div class="tde_ghim">
                                <span class="page">Trang danh mục</span>
                                <span class="ten-khac">trang danh mục</span>
                                <input name="ghim_tin" type="checkbox" value="0" class="ghimtin_chek tin_dmuc" />
                            </div>
                            <span class="moneyHour"> 8,000 VNĐ/giờ </span>
                        </label>
                        <label class="box-click">
                            <div class="tde_ghim">
                                <span class="page">Trang tỉnh thành</span>
                                <span class="ten-khac">trang tỉnh thành</span>
                                <input name="ghim_tin" type="checkbox" value="0" class="ghimtin_chek tin_tthanh" />
                            </div>
                            <span class="moneyHour"> 10,000 VNĐ/giờ </span>
                        </label>
                        <label class="box-click">
                            <div class="tde_ghim">
                                <span class="page">Trang danh mục tại tỉnh thành</span>
                                <span class="ten-khac">trang danh mục tại tỉnh thành</span>
                                <input name="ghim_tin" type="checkbox" value="0" class="ghimtin_chek tin_dmtthanh" />
                            </div>
                            <span class="moneyHour"> 5,000 VNĐ/giờ </span>
                        </label>
                    </div>
                    <div class="box-select">Bạn đã chọn gói ghim tin <span class="attr-box-select"></span></div>
                    <div class="btn_modal">
                        <button class="btn-cancel btn" value="">Huỷ bỏ</button>
                        <button class="btn-success btn" id="btn_step1" value="">Tiếp tục</button>
                    </div>
                </div>
            </div>
            <div class="content tab" id="page2">
                <div class="title-modal">
                    <button class="arrow"><img src="/images/newImages/arrow-left.png"></button>
                    <p class="text_title_modal">Ghim tin</p>
                    <span class="close close_gtin"><img src="/images/newImages/close.png"></span>
                </div>
                <div class="main-content-p2">
                    <div class="title">
                        <span class="text-title">Chọn ngày giờ ghim tin</span>
                        <span class="box-switch">
                            <span class="text-switch">Cả ngày</span>
                            <label class="btn-switch switch-124" for="checkedAll">
                                <input type="checkbox" name="checkedAll" id="checkedAll">
                                <span class="slider1 round1"></span>
                            </label>
                        </span>
                    </div>
                    <div class="box-hour">
                        <div class="select-hour">
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st1" value="0" data="1">
                                <div class="option_inner">
                                    <div class="name">0h-1h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st2" value="0" data="2">
                                <div class="option_inner">
                                    <div class="name">1-2h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st3" value="0" data="3">
                                <div class="option_inner">
                                    <div class="name">2h-3h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st4" value="0" data="4">
                                <div class="option_inner">
                                    <div class="name">3h-4h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st5" value="0" data="5">
                                <div class="option_inner">
                                    <div class="name">4h-5h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st6" value="0" data="6">
                                <div class="option_inner">
                                    <div class="name">5h-6h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st7" value="0" data="7">
                                <div class="option_inner">
                                    <div class="name">6h-7h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st8" value="0" data="8">
                                <div class="option_inner">
                                    <div class="name">7h-8h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st9" value="0" data="9">
                                <div class="option_inner">
                                    <div class="name">8h-9h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st10" value="0" data="10">
                                <div class="option_inner">
                                    <div class="name">9h-10h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st10" value="0" data="11">
                                <div class="option_inner">
                                    <div class="name">10h-11h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st12" value="0" data="12">
                                <div class="option_inner">
                                    <div class="name">11h-12h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st13" value="0" data="13">
                                <div class="option_inner">
                                    <div class="name">12h-13h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st14" value="0" data="14">
                                <div class="option_inner">
                                    <div class="name">13h-14h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st15" value="0" data="15">
                                <div class="option_inner">
                                    <div class="name">14h-15h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st16" value="0" data="16">
                                <div class="option_inner">
                                    <div class="name">15h-16h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st17" value="0" data="17">
                                <div class="option_inner">
                                    <div class="name">16h-17h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st18" value="0" data="18">
                                <div class="option_inner">
                                    <div class="name">17h-18h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st19" value="0" data="19">
                                <div class="option_inner">
                                    <div class="name">18h-19h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st20" value="0" data="20">
                                <div class="option_inner">
                                    <div class="name">19h-20h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st21" value="0" data="21">
                                <div class="option_inner">
                                    <div class="name">20h-21h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st22" value="0" data="22">
                                <div class="option_inner">
                                    <div class="name">21h-22h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st23" value="0" data="23">
                                <div class="option_inner">
                                    <div class="name">22h-23h</div>
                                </div>
                            </label>
                            <label class="hour-day">
                                <input type="checkbox" class="checkbox time_pin" name="st1" id="st24" value="0" data="24">
                                <div class="option_inner">
                                    <div class="name">23h-00h</div>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="so-ngay">
                        <p class="ngay-ghim">Số ngày ghim tin</p>
                        <div class="border-box">
                            <button class="tru btn">-</button>
                            <input type="number" class="btn so" value="10" max="30" min="1">
                            <button class="cong btn">+</button>
                        </div>
                    </div>
                    <div class="box-noi-ghim">
                        <div class="font slcNoiGhim" data="">Nơi ghim: <span></span></div>
                        <div class="font slcHour">Thời gian ghim: <span></span></div>
                        <div class="font tgian_batdau" data="<?= date('H:i', time()) ?>">Thời gian bắt đầu: <span class="batdau_tgiant" data="" data1=""></span></div>
                    </div>
                    <button class="btn-payment">
                        <span class="text-payment">Thanh toán </span>
                        <span class="money-payment"> <span>0</span> VNĐ</span>
                    </button>
                    <p class="so-du-tk">Số dư: <span class="money-so-du-tk"><?= number_format($user_money) ?></span> VND</p>
                </div>
            </div>



        </div>
    </div>
</div>
<!-- -- ghim tin chi tiet ---  -->
<div class="modalPinNew chitiet_ghimtin">
    <!-- Modal content -->
    <div class="box-check">
        <div class="modal-content">
            <div class="content " id="page1">
                <div class="title-modal">
                    <p class="text_title_modal">Ghim tin</p>
                    <span class="close close_ctgtin dong_ddau"><img src="/images/newImages/close.png"></span>
                </div>
                <div class="main-content df ghimtin_ctiet_ld">

                </div>
            </div>
        </div>
    </div>
</div>
<!-- --------------popup chọn dịch vụ------------------- -->
<div id="pinNew1" class="modalPinNew dich_vu">
    <div class="popup_cha dich_vu">
        <div class="popup_bg"></div>
        <div class="container_popup">
            <div class="popup_title ">
                Sử dụng dịch vụ
                <div class="img_close"><img src="/images/anh_moi/close_popup.png" alt=""></div>
            </div>
            <div class="popup_content ghim_daytin">
                <div class="d_flex space_b">
                    <div class="khoi_ghimtin">
                        <div class="title_pp">Ghim tin</div>
                        <div class="text_pp">Ghim tin trên trang chủ, trang danh mục</div>
                    </div>
                    <div class="khoi_daytin">
                        <div class="title_pp">Đẩy tin</div>
                        <div class="text_pp">Đẩy tin theo lịch hẹn, tùy chọn số lần/ngày trên trang chủ</div>
                    </div>
                </div>
                <div class="btn_select d_flex space_b">
                    <a href="" class="btn_pp btn_ghimtin">Ghim tin</a>
                    <a href="" class="btn_pp btn_daytin">Đẩy tin</a>
                </div>
            </div>
        </div>
    </div>
</div>