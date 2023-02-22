//Kiểm tra số điện thoại
jQuery(".numbersOnly").keyup(function () {
    this.value = this.value.replace(/[^0-9]/g, '');
    $('.numbersOnly').val($('.numbersOnly').val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
});
jQuery(".numbersOnly2").keyup(function () {
    this.value = this.value.replace(/[^0-9]/g, '');
});

//Hàm check định dạng email
function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
}

function hasWhiteSpace(s) {
    return s.indexOf(' ') >= 0;
}

function checkpostdt() {
    var check = $(".box_nang_cap form").attr("onsubmit");

    if (check == "return false;") {
        var captcha = $("#captcha_gh").val();
        $(".noti-error").remove();
        $("#logo_gh").removeClass('error');
        $("#pass_gh1").removeClass('error');
        $("#pass_gh2").removeClass('error');
        $("#name_chu_gh").removeClass('error');
        $("#phone_user").removeClass('error');
        $("#cmt_gh").removeClass('error');
        $("#email_gh").removeClass('error');
        $(".slngay_cmt").removeClass('error');
        $(".slthang_cmt").removeClass('error');
        $(".slnam_cmt").removeClass('error');
        var fileExtension = $('#logo_gh').val().split('.').pop().toLocaleLowerCase();
        var type = ['gif', 'jpg', 'png'];
        if($('#logo_gh').val() == ''){
            $('#logo_gh').focus();
            $('#logo_gh').addClass('error');
            $('#logo_gh').after("<div class='noti-error'>Bạn chưa chọn logo</div>");
        }else if (!type.includes(fileExtension)) {
            $('#logo_gh').focus();
            $('#logo_gh').addClass('error');
            $('#logo_gh').after("<div class='noti-error'>Định dạng logo tải lên không hợp lệ (gif, jpg, png)</div>");
        } else if ($('#logo_gh')[0].files[0].size > 2097152) {
            $('#logo_gh').focus();
            $('#logo_gh').addClass('error');
            $('#logo_gh').after("<div class='noti-error'>File ảnh của bạn vượt quá 2MB. Xin vui lòng chọn file khác</div>");
        } else if ($("#email_gh").val() == '') {
            $("#email_gh").focus();
            $("#email_gh").addClass('error');
            $("#email_gh").after("<div class='noti-error'>Bạn chưa nhập email</div>");
        } else if (validateEmail($("#email_gh").val()) == false) {
            $("#email_gh").focus();
            $("#email_gh").addClass('error');
            $("#email_gh").after("<div class='noti-error'>Địa chỉ email không đúng định dạng</div>");
        } else if ($("#pass_gh1").val() == '') {
            $("#pass_gh1").focus();
            $("#pass_gh1").addClass('error');
            $("#pass_gh1").after("<div class='noti-error'>Bạn chưa nhập mật khẩu</div>");
        } else if ($("#pass_gh1").val().length < 7) {
            $("#pass_gh1").focus();
            $("#pass_gh1").addClass('error');
            $("#pass_gh1").after("<div class='noti-error'>Mật khẩu phải nhiều hơn 6 ký tự</div>");
        } else if ($("#pass_gh2").val() == '') {
            $("#pass_gh2").focus();
            $("#pass_gh2").addClass('error');
            $("#pass_gh2").after("<div class='noti-error'>Bạn chưa nhập lại mật khẩu</div>");
        } else if ($("#pass_gh2").val().length < 7) {
            $("#pass_gh2").focus();
            $("#pass_gh2").addClass('error');
            $("#pass_gh2").after("<div class='noti-error'>Mật khẩu nhập lại phải nhiều hơn 6 ký tự</div>");
        } else if ($("#pass_gh2").val() != $("#pass_gh1").val()) {
            $("#pass_gh2").focus();
            $("#pass_gh2").addClass('error');
            $("#pass_gh2").after("<div class='noti-error'>Mật khẩu nhập lại không trùng nhau</div>");
        } else if ($("#name_chu_gh").val() == '') {
            $("#name_chu_gh").focus();
            $("#name_chu_gh").addClass('error');
            $("#name_chu_gh").after("<div class='noti-error'>Bạn chưa nhập họ tên</div>");
            ;
        } else if ($("#name_chu_gh").val().length < 7) {
            $("#name_chu_gh").focus();
            $("#name_chu_gh").addClass('error');
            $("#name_chu_gh").after("<div class='noti-error'>Họ tên phải nhiều hơn 6 ký tự</div>");
        } else if ($("#phone_user").val() == '') {
            $("#phone_user").focus();
            $("#phone_user").addClass('error');
            $("#phone_user").after("<div class='noti-error'>Bạn chưa nhập số điện thoại</div>");
        } else if ($("#phone_user").val().length < 9) {
            $("#phone_user").focus();
            $("#phone_user").addClass('error');
            $("#phone_user").after("<div class='noti-error'>Số điện thoại không hợp lệ</div>");
        } else if ($("#cmt_gh").val() == '') {
            $("#cmt_gh").focus();
            $("#cmt_gh").addClass('error');
            $("#cmt_gh").after("<div class='noti-error'>Bạn chưa nhập số CMT</div>");
        } else if ($("#cmt_gh").val().length < 9) {
            $("#cmt_gh").focus();
            $("#cmt_gh").addClass('error');
            $("#cmt_gh").after("<div class='noti-error'>Số chứng minh thư không hợp lệ</div>");
        } else if ($(".slngay_cmt").val() == '00') {
            $(".slngay_cmt").focus();
            $(".slngay_cmt").addClass('error');
            $(".date_cmt").after("<div class='noti-error'>Bạn chưa ngày cấp CMND</div>");
        } else if ($(".slthang_cmt").val() == '00') {
            $(".slthang_cmt").focus();
            $(".slthang_cmt").addClass('error');
            $(".date_cmt").after("<div class='noti-error'>Bạn chưa tháng cấp CMND</div>");
        } else if ($(".slnam_cmt").val() == '0000') {
            $(".slnam_cmt").focus();
            $(".slnam_cmt").addClass('error');
            $(".date_cmt").after("<div class='noti-error'>Bạn chưa năm cấp CMND</div>");
        } else if ($("#name_store").val() == '') {
            $("#name_store").focus();
            $("#name_store").addClass('error');
            $("#name_store").after("<div class='noti-error'>Bạn chưa nhập tên gian hàng</div>");
            ;
        } else if ($("#phone_store").val() == '') {
            $("#phone_store").focus();
            $("#phone_store").addClass('error');
            $("#phone_store").after("<div class='noti-error'>Bạn chưa nhập số điện thoại gian hàng</div>");
        } else if ($("#phone_store").val().length < 9) {
            $("#phone_store").focus();
            $("#phone_store").addClass('error');
            $("#phone_store").after("<div class='noti-error'>Số điện thoại gian hàng không hợp lệ</div>");
        } else if ($("#city_gh").val() == 0) {
            $("#city_gh").focus();
            $("#city_gh").addClass('error');
            $("#city_gh").after("<div class='noti-error'>Bạn chưa chọn khu vực</div>");
        } else if ($("#diachi_gh").val() == '') {
            $("#diachi_gh").focus();
            $("#diachi_gh").addClass('error');
            $("#diachi_gh").after("<div class='noti-error'>Bạn chưa nhập địa chỉ</div>");
        } else if ($("#diachi_gh").val().length < 10) {
            $("#diachi_gh").focus();
            $("#diachi_gh").addClass('error');
            $("#diachi_gh").after("<div class='noti-error'>Địa chỉ phải nhiều hơn 10 ký tự</div>");
        } else if (captcha === "") {
            $("#captcha_gh").focus();
            $("#captcha_gh").addClass('error');
            $("#div_captcha_gh").after("<div class='control2 noti-error'>Xin vui lòng nhập mã captcha!</div>");
        } else if (captcha.length < 5) {
            $("#captcha_gh").focus();
            $("#captcha_gh").addClass('error');
            $("#div_captcha_gh").after("<div class='control2 noti-error'>Mã captcha phải đủ 5 ký tự!</div>");
        } else if (captcha < 5) {
            $("#captcha_gh").focus();
            $("#captcha_gh").addClass('error');
            $("#div_captcha_gh").after("<div class='control2 noti-error'>Mã captcha phải đủ 5 ký tự!</div>");
        } else {
            var email = $("#email_gh").val();
            var checkEmail = true;
            $.ajax({
                url: "../ajax/checkExistEmail.php",
                type: "POST",
                dataType: 'json',
                async:false,
                data: {
                    'email': email,
                    'type': 5,
                },
                success: function (json) {
                    if(json.result == true){
                        checkEmail = false;
                    }
                }
            });

            if(checkEmail == true){
                $.ajax({
                    url: "../ajax/getcode.php",
                    type: "POST",
                    data: {
                        'code': captcha
                    },
                    success: function (data) {
                        if (data == 0) {
                            if ($("#captcha_gh").hasClass("error") == false) {
                                $("#captcha_gh").addClass('error');
                                $(".reset-icon").click();
                            }
                            $("#captcha_gh").focus();
                            $(".reset-icon").click();
                            $("#div_captcha_gh").after("<div class='noti-error'>Mã bảo mật bạn nhập không chính xác. Xin vui lòng nhập lại</div>");
                        } else {
                            $("#captcha_gh").removeClass('error');
                            $(".noti-error").remove();
                            $(".box_nang_cap form").attr("onsubmit", "return true;");
                            $(".dangky_store").click();

                        }

                    }
                });
            }else{
                $("#email_gh").focus();
                $("#email_gh").addClass('error');
                $("#email_gh").after("<div class='noti-error'>Email đã được đăng ký</div>");
            }

        }
    }
}

$(document).ready(function () {
    $("#email_gh").blur(function () {

        $(".noti-error").remove();
        if ($("#email_gh").val().length > 6) {
            $("#email_gh").removeClass('error');
            $(".noti-error").remove();
            $.ajax({
                type: "POST",
                url: '/ajax/checkmail.php',
                data: {email: $("#email_gh").val()},
                success: function (data) {
                    if (data == 1) {
                        if ($("#email_gh").hasClass("error") == false) {
                            $("#email_gh").addClass('error');
                            $("#email_gh").after("<div class='noti-error'>Email này đã có người đăng ký</div>");
                        }
                        $("#email_gh").focus();
                    } else {
                        $("#email_gh").removeClass('error');
                        $(".noti-error").remove();
                    }
                }
            });
        } else {
            $("#Email").addClass('error');
            $("#Email").after("<div class='noti-error'>Email phải nhiều hơn 6 ký tự</div>");
        }

    });
//     check tên cửa hàng
    $("#name_store").blur(function () {
        var store_name = $("#name_store");
        $(".noti-error").remove();
        if (store_name.val().length > 0) {
            $("#name_store").removeClass('error');
            $(".noti-error").remove();
            $.ajax({
                type: "POST",
                url: '/ajax/check_store_name.php',
                data: {store_name: $("#name_store").val()},
                success: function (data) {
                    if (data == 1) {
                        if ($("#name_store").hasClass("error") == false) {
                            $("#name_store").addClass('error');
                            $("#name_store").after("<div class='noti-error'>Tên gian hàng đã có người đăng ký</div>");
                        }
                        $("#name_store").focus();
                    } else if (data == 0) {
                        $("#name_store").removeClass('error');
                        $(".noti-error").remove();
                    }
                }
            });
        } else {
            $("#name_store").addClass('error');
            $("#name_store").after("<div class='noti-error'>Tên gian hàng không được để trống</div>");
        }

    });


});

