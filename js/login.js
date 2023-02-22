function validateLoginBuy() {
    var check = true;
    var email = $('#Email').val();
    var password = $('#password').val();


    //check mail
    if (email == '') {
        $("#Email").addClass("error");
        $('.error_email').text('Bạn chưa nhập email hoặc tên đăng nhập');
        check = false;
    } else {
        $("#Email").removeClass("error"); $(".error_email").text('');
    }

    // password
    if (password == '') {
        $("#password").addClass("error");
        $('.error_password').text('Bạn chưa nhập mật khẩu ')
        check = false;
    } else if (password.length < 6) {
        $("#password").addClass("error");
        $('.error_password').text('Độ dài không được ít hơn 6 ký tự ');
        check = false;
    } else if (hasWhiteSpace(password)) {
        $("#password").addClass("error");
        $('.error_password').text('Mật khẩu không được chứa khoảng trắng');
        check = false;
    }
    else {
        $("#password").removeClass("error");
        $(".error_password").text('');
    }

    return check;
}

$(document).ready(function () {
    $('#login_buy').click(function () {
        var vali_login_buy = validateLoginBuy();
        if (vali_login_buy) {
            let checkData = true;
            let data = new FormData();
            let url = "/ajax/ajax_login.php";
            data.append('userType', $('input[name="userType"]').val());
            data.append('email', $('#Email').val());
            data.append('password', $('#password').val());
            let response = callAjax('post', url, data, true);
            if(response !== undefined){
                if(response.result == false){
                    alert(response.message);
                    if(response.type == 2){
                        window.location.href = '/';
                    }
                }else{
                    window.location.href = '/';
                }
            }
        }
    });
})