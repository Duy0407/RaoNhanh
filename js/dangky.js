function reload(r) {
    document.getElementById(r).src = document.getElementById(r).src
}

function reloadSecurityCode(r) {
    $(r).parent().find("img").attr("src", "/classes/securitycode.php?t=" + Date.now())
}

//check định dạng mail
function validateEmail(r) {
    return /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(r)
}

//check chứa khoảng trắng
function hasWhiteSpace(r) {
    return r.indexOf(" ") >= 0
}

function checkpostdt() {
    if ("return false;" == $(".main_register form").attr("onsubmit")) {
        var r = $("#captcha").val();
        $(".noti-error").remove(), $("#password").removeClass("error"), $("#repassword").removeClass("error"), $("#Hoten").removeClass("error"), $("#Phone").removeClass("error"), $("#Email").removeClass("error"), $("#address").removeClass("error"), $("#city").removeClass("error"), "" == $("#password").val() ? ($("#password").focus(), $("#password").addClass("error"), $("#password").after("<div class='noti-error'>Bạn chưa nhập mật khẩu</div>")) : $("#password").val().length < 7 ? ($("#password").focus(), $("#password").addClass("error"), $("#password").after("<div class='noti-error'>Mật khẩu phải nhiều hơn 6 ký tự</div>")) : "" == $("#repassword").val() ? ($("#repassword").focus(), $("#repassword").addClass("error"), $("#repassword").after("<div class='noti-error'>Bạn chưa nhập lại mật khẩu</div>")) : $("#repassword").val().length < 7 ? ($("#repassword").focus(), $("#repassword").addClass("error"), $("#repassword").after("<div class='noti-error'>Mật khẩu nhập lại phải nhiều hơn 6 ký tự</div>")) : $("#repassword").val() != $("#password").val() ? ($("#repassword").focus(), $("#repassword").addClass("error"), $("#repassword").after("<div class='noti-error'>Mật khẩu nhập lại không trùng nhau</div>")) : "" == $("#Hoten").val() ? ($("#Hoten").focus(), $("#Hoten").addClass("error"), $("#Hoten").after("<div class='noti-error'>Bạn chưa nhập họ tên</div>")) : $("#Hoten").val().length < 7 ? ($("#Hoten").focus(), $("#Hoten").addClass("error"), $("#Hoten").after("<div class='noti-error'>Họ tên phải nhiều hơn 6 ký tự</div>")) : "" == $("#Email").val() ? ($("#Email").focus(), $("#Email").addClass("error"), $("#Email").after("<div class='noti-error'>Bạn chưa nhập email</div>")) : 0 == validateEmail($("#Email").val()) ? ($("#Email").focus(), $("#Email").addClass("error"), $("#Email").after("<div class='noti-error'>Địa chỉ email không đúng định dạng</div>")) : "" == $("#Phone").val() ? ($("#Phone").focus(), $("#Phone").addClass("error"), $("#Phone").after("<div class='noti-error'>Bạn chưa nhập số điện thoại</div>")) : 0 == $("#city").val() ? ($("#city").focus(), $("#city").addClass("error"), $("#city").after("<div class='noti-error'>Bạn chưa chọn tỉnh thành</div>")) : "" == $("#address").val() ? ($("#address").focus(), $("#address").addClass("error"), $("#address").after("<div class='noti-error'>Bạn chưa nhập địa chỉ</div>")) : $("#address").val().length < 10 ? ($("#address").focus(), $("#address").addClass("error"), $("#address").after("<div class='noti-error'>Địa chỉ phải nhiều hơn 10 ký tự</div>")) : "" === r ? ($("#captcha").focus(), $("#captcha").addClass("error"), $("#div_captcha").after("<div class='control2 noti-error'>Xin vui lòng nhập mã captcha!</div>")) : r.length < 5 ? ($("#captcha").focus(), $("#captcha").addClass("error"), $("#div_captcha").after("<div class='control2 noti-error'>Mã captcha phải đủ 5 ký tự!</div>")) : r < 5 ? ($("#captcha").focus(), $("#captcha").addClass("error"), $("#div_captcha").after("<div class='control2 noti-error'>Mã captcha phải đủ 5 ký tự!</div>")) : $.ajax({
            url: "/ajax/getcode.php",
            type: "POST",
            data: {
                code: r
            },
            success: function(r) {
                0 == r ? (0 == $("#captcha").hasClass("error") && ($("#captcha").addClass("error"), $(".reset-icon").click()), $("#captcha").focus(), $(".reset-icon").click(), $("#div_captcha").after("<div class='noti-error'>Mã bảo mật bạn nhập không chính xác. Xin vui lòng nhập lại</div>")) : ($("#captcha").removeClass("error"), $(".noti-error").remove(), $(".main_register form").attr("onsubmit", "return true;"), $(".btn_dangky").click())
            }
        })
    }
}
jQuery(".numbersOnly").keyup(function() {
    this.value = this.value.replace(/[^0-9]/g, ""), $(".numbersOnly").val($(".numbersOnly").val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."))
}), jQuery(".numbersOnly2").keyup(function() {
    this.value = this.value.replace(/[^0-9]/g, "")
}), $(document).ready(function() {
    $("#Email").blur(function() {
        $(".noti-error").remove(), $("#Email").val().length > 6 ? ($("#Email").removeClass("error"), $(".noti-error").remove(), $.ajax({
            type: "POST",
            url: "/ajax/checkmail.php",
            data: {
                email: $("#Email").val()
            },
            success: function(r) {
                1 == r ? (0 == $("#Email").hasClass("error") && ($("#Email").addClass("error"), $("#Email").after("<div class='noti-error'>Email này đã có người đăng ký</div>")), $("#Email").focus()) : ($("#Email").removeClass("error"), $(".noti-error").remove())
            }
        })) : ($("#Email").addClass("error"), $("#Email").after("<div class='noti-error'>Email phải nhiều hơn 6 ký tự</div>"))
    })
});