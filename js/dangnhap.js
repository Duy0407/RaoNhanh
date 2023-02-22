function checklogin() {
    return $("#user").removeClass("error"), $("#Password5").removeClass("error"), $(".noti-error").remove(), "" == $("#user").val() ? ($("#user").addClass("error"), $("#user").after("<div class='noti-error'>Bạn chưa nhập username</div>")) : $("#user").val().length < 7 ? ($("#user").addClass("error"), $("#user").after("<div class='noti-error'>Username phải lớn hơn 6 ký tự</div>")) : 1 == hasWhiteSpace($("#user").val()) ? ($("#user").addClass("error"), $("#user").after("<div class='noti-error'>Username không được chứa khoảng trắng</div>"), $("#user").focus()) : "" == $("#Password5").val() ? ($("#Password5").addClass("error"), $("#Password5").after("<div class='noti-error'>Bạn chưa nhập mật khẩu</div>")) : $("#Password5").val().length < 7 ? ($("#Password5").addClass("error"), $("#Password5").after("<div class='noti-error'>Mật khẩu phải lớn hơn 6 ký tự</div>")) : $.ajax({
        type: "POST",
        url: "/ajax/checkpass.php",
        data: {user: $("#user").val(), pass: $("#Password5").val()},
        success: function (r) {
            0 == r ? 0 == $("#Password5").hasClass("error") && ($("#Password5").addClass("error"), $("#Password5").after("<div class='noti-error'>Username hoặc Mật khẩu sai</div>")) : ($("#loginForm_1").removeAttr("onsubmit"), $("#loginForm_1").submit())
        }
    }), !1
}