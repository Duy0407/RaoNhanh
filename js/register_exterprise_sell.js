
function validateRegistStep1() {
    var check = true;
    var email = $('#Email').val();
    var password = $('#password').val();
    var repassword = $('#repassword').val();
    var hoten = $('#Hoten').val();
    var birthday = $('#birthday').val();
    var phone = $('#Phone').val();
    var cccd = $('#cccd').val();
    var ngayCap = $('#ngayCap').val();

    // value nhập vào ngày cấp
    var timeNgayCap = ngayCap.split('-');
    timeNgayCap = Date.parse(timeNgayCap.join('/'));

    // check ngày tháng năm hiện tại
    var today = new Date();
    today.setHours(0, 0, 0, 0);
    today = Date.parse(today);

    // email
    if (email == '') {
        $("#Email").addClass("error");
        $('.error_email').text('Bạn chưa nhập Email ');
        check = false;
    } else if (!validateEmail(email)) {
        $("#Email").addClass("error");
        $('.error_email').text("Email không đúng định dạng");
        check = false;
    } else {
        var checkExistEmail = checkExitsEmail(5, email);
        if (checkExistEmail.result) {
            $("#Email").addClass("error"), $('.error_email').text("Email đã được đăng ký");
            check = false;
        } else {
            $("#Email").removeClass("error"), $(".error_email").text('');
        }
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

    //repassword
    if (repassword == '') {
        $("#repassword").addClass("error");
        $('.error_repassword').text('Bạn chưa nhập lại mật khẩu')
        check = false;
    } else if (repassword.length < 6) {
        $("#repassword").addClass("error");
        $('.error_repassword').text('Độ dài không được ít hơn 6 ký tự ');
        check = false;
    } else if (repassword != password) {
        $("#repassword").addClass("error");
        $('.error_repassword').text('Mật khẩu không trùng khớp');
        check = false;
    } else {
        $("#repassword").removeClass("error"), $(".error_repassword").text('');
    }

    //họ tên
    if (hoten == '') {
        $("#Hoten").addClass("error");
        $('.error_hoten').text('Bạn chưa nhập họ và tên ')
        check = false;
    } else if (hoten.length < 6) {
        $("#Hoten").addClass("error");
        $('.error_hoten').text('Họ tên phải nhiều hơn 6 ký tự ');
        check = false;
    }
    else if (!validateName(hoten)) {
        $("#Hoten").addClass("error");
        $('.error_hoten').text("Họ và tên không chứa ký tự đặc biệt");
        check = false;
    }
    else {
        $("#Hoten").removeClass("error"), $(".error_hoten").text('');
    }

    //birthday
    if (birthday != '') {
        var birthday = birthday.split('-');
        birthday = Date.parse(birthday.join('/'));
        var today = new Date();
        today.setHours(0, 0, 0, 0);
        today = Date.parse(today);
        if (birthday > today) {
            $("#birthday").addClass("error");
            $('.error_birth').text("Ngày sinh không hợp lệ");
            check = false;
        } else {
            $("#birthday").removeClass("error");
            $('.error_birth').text("");
        }
    }

    // số điện thoại
    if (phone == '') {
        $("#Phone").addClass("error");
        $('.error_phone').text('Bạn chưa nhập số điện thoại ')
        check = false;
    } else if (!validatePhone(phone)) {
        $("#Phone").addClass("error");
        $('.error_phone').text("Số điện thoại không đúng định dạng");
        check = false;
    } else {
        $("#Phone").removeClass("error"), $(".error_phone").text('');
    }

    //  CMND / CCCD
    if (cccd == '') {
        $("#cccd").addClass("error");
        $('.error_cccd').text('Bạn chưa nhập số căn cước công dân ')
        check = false;
    } else if (!validateCCCD(cccd)) {
        $("#cccd").addClass("error");
        $('.error_cccd').text('Số CMND hoặc CCCD không đúng định dạng');
        check = false;

    } else {
        $("#cccd").removeClass("error"); $(".error_cccd").text('');
    }

    // Ngày cấp
    if (ngayCap == '') {
        $("#ngayCap").addClass("error");
        $('.error_ngayCap').text('Bạn chưa nhập ngày cấp CMND ');
        check = false;
    } else if (today < timeNgayCap) {
        $("#ngayCap").addClass("error");
        $('.error_ngayCap').text('Ngày cấp không hợp lệ');
        check = false;
    } else {
        $('#ngayCap').removeClass("error"), $(".error_ngayCap").text('');
    }
    return check;
}
// ======================= Step 2 =============================

function validateRegistStep2() {
    var nameShop = $('#name_shop').val();
    nameShop = nameShop.trim();
    var phoneShop = $('#phone_shop').val();
    var cityShop = $('#city_shop').val();
    var addressShop = $('#address_shop').val();
    var captcha = $('#captcha').val();
    var check = true;

    // tên gian hàng
    if (nameShop == '') {
        $("#name_shop").addClass("error");
        $('.error_name_shop').text('Bạn chưa nhập tên gian hàng ');
        check = false;
    } else if (nameShop.length < 6) {
        $("#name_shop").addClass("error");
        $('.error_name_shop').text('Tên gian hàng phải nhiều hơn 6 ký tự ');
        check = false;
    } else if (!validateNameShop(nameShop)) {
        $("name_shop").addClass("error");
        $('.error_name_shop').text('Tên gian hàng không được chứa ký tự đặc biệt');
        check = false;
    } else {
        $("#name_shop").removeClass("error"), $(".error_name_shop").text('');
    }

    // số điện thoại gian hàng
    if (!$("#usePhoneCaNhan").is(':checked')) {
        if (phoneShop == '') {
            $("#phone_shop").addClass("error");
            $('.error_phone_shop').text('Bạn chưa nhập số điện thoại ');
            check = false;
        } else if (!validatePhone(phoneShop)) {
            $("#phone_shop").addClass("error");
            $('.error_phone_shop').text("Số điện thoại không đúng định dạng");
            check = false;
        }
    } else {
        $("#phone_shop").removeClass("error"), $(".error_phone_shop").text('');
    }


    //khu vực
    if (cityShop == '') {
        $("#city_shop").addClass("error");
        $('.error_city_shop').text('Bạn chưa nhập khu vực ');
        check = false;
    } else {
        $("#city_shop").removeClass("error"), $(".error_city_shop").text('');
    }

    // địa chỉ liên hệ
    if (addressShop == '') {
        $('#address_shop').addClass("error");
        $('.error_address_shop').text('Bạn chưa nhập địa chỉ ');
        check = false;
    } else if (addressShop.length < 6) {
        $("#address_shop").addClass("error");
        $('.error_address_shop').text('Địa chỉ phải nhiều hơn 6 ký tự ');
        check = false;
    } else {
        $("#address_shop").removeClass("error"), $(".error_address_shop").text('');
    }

    // captcha
    if (captcha == '') {
        $('#captcha').addClass("error");
        $('.error_captcha').text('Bạn chưa nhập mã captcha');
        check = false;
    } else if (captcha.length < 5) {
        $("#captcha").addClass("error");
        $('.error_captcha').text('Mã captcha phải đủ 5 ký tự');
        check = false;
    } else {
        var formData = new FormData();
        formData.append('code', $('#captcha').val());
        let url = "/ajaxNew/checkCaptcha.php";
        let response = callAjax('post', url, formData, true);
        if (response != undefined) {
            if (response.result == false) {
                $("#captcha").addClass("error");
                $('.error_captcha').text('Mã captcha không đúng');
                check = false;
            } else {
                $("#captcha").removeClass("error"), $(".error_captcha").text('');
            }
        } else {
            alert('Có lỗi xảy ra');
            window.location.href = '/';
        }
    }
    return check;
}
$(document).ready(function () {
    // check dung lượng file ảnh logo
    $('#logo_shop').change(function () {
        var id = $("#logo_shop");
        var lg = id[0].files.length;

        var test_value = $("#logo_shop").prop('files');
        console.log(test_value);
        var extension = $("#logo_shop").val().split('.').pop().toLowerCase();
        if (lg > 0) {
            var fileSize = test_value[0]['size'];
            if (fileSize > 2097152) {
                alert('Kích thước file không được lớn hơn 2 MB');
                $('.logo_shop').attr('src', '../images/newImages/logo_shop.png');
                return false;
            } else if ($.inArray(extension, ['png', 'jpeg', 'jpg']) == -1) {
                alert("File ảnh không đúng định dạng !");
                $('.logo_shop').attr('src', '../images/newImages/logo_shop.png');
                return false;
            } else {
                loadImage(this, '.logo_shop');
            }
        }

    });
    // check dung lượng file ảnh page2
    $('#giayPhepShop').change(function () {
        var id = $("#giayPhepShop");
        var lg = id[0].files.length;

        var test_value = $("#giayPhepShop").prop('files');
        var extension = $("#giayPhepShop").val().split('.').pop().toLowerCase();
        if (lg > 0) {
            var fileSize = test_value[0]['size'];
            if (fileSize > 2097152) {
                alert('Kích thước file không được lớn hơn 2 MB');
                $('.name_img').text('').css("background", "#FFFFFF");
                return false;
            } else if ($.inArray(extension, ['png', 'gif', 'jpeg', 'jpg', 'psd', 'pdf']) == -1) {
                alert("File ảnh không đúng định dạng !");
                $('.name_img').text('').css("background", "#FFFFFF");
                return false;
            }
        }
    })
    // check page 1
    $('#btn_step1').click(function () {
        var vali_step1 = validateRegistStep1();
        if (vali_step1) {
            $('#regis_step1').addClass('tab');
            $('#regis_step2').removeClass('tab');
        }
    });

    // check page 2
    $('#prevStep1').click(function () {
        $('#regis_step1').removeClass('tab');
        $('#regis_step2').addClass('tab');
    });
    $('#btn_step2').click(function () {

        var vali_step2 = validateRegistStep2();
        if (vali_step2) {
            $('#regis_step2').addClass('tab');
            $('#regis_step3').removeClass('tab');
        }
    });

    $('#btn_step3').click(function () {
        if (validateRegistStep1() && validateRegistStep2()) {
            if ($('#logo_shop').val() == '') {
                alert('Vui lòng chọn ảnh logo');
            } else {

                var vali_step2 = validateRegistStep2();
                if (vali_step2) {
                    $('#regis_step2').addClass('tab');
                    $('#regis_step3').removeClass('tab');
                }
                // lấy dữ liệu
                if ($('#usePhoneCaNhan').is(':checked')) {
                    var phoneShop = $('#Phone').val();
                } else {
                    var phoneShop = $('#phone_shop').val();
                }

                var formRegisExterprise = new FormData();

                var totalfiles = $('#giayPhepShop').prop('files').length;
                for (var index = 0; index < totalfiles; index++) {
                    formRegisExterprise.append("giayPhepShop[]", $('#giayPhepShop').prop('files')[index]);
                }
                var logoShop = $('#logo_shop').prop('files').length;
                for (var index = 0; index < logoShop; index++) {
                    formRegisExterprise.append("logoShop[]", $('#logo_shop').prop('files')[index]);
                }


                // page 1
                formRegisExterprise.append('email', $('#Email').val());
                formRegisExterprise.append('password', $('#password').val());
                formRegisExterprise.append('repassword', $('#repassword').val());
                formRegisExterprise.append('hoten', $('#Hoten').val());
                formRegisExterprise.append('birthday', $('#birthday').val());
                formRegisExterprise.append('gender', $('#gender').val());
                formRegisExterprise.append('phone', $('#Phone').val());
                formRegisExterprise.append('cccd', $('#cccd').val());
                formRegisExterprise.append('ngayCap', $('#ngayCap').val());
                //page 2
                formRegisExterprise.append('nameshop', $('#name_shop').val());
                formRegisExterprise.append('lvkd', $('#lvkd').val());
                formRegisExterprise.append('phoneShop', phoneShop);
                formRegisExterprise.append('websiteShop', $('#website_shop').val());
                formRegisExterprise.append('facebookShop', $('#facebook_shop').val());
                formRegisExterprise.append('khuVuc', $('#city_shop').val());
                formRegisExterprise.append('addressShop', $('#address_shop').val());
                formRegisExterprise.append('captcha', $('#captcha').val());
                let url = "/ajaxNew/registExterpriseSell.php";
                var response = callAjax('POST', url, formRegisExterprise, true);
                if (response != undefined) {
                    if (response.result == true) {
                        $('#reSendMailRegister').attr('data-id', response.data['id']);
                        $('#reSendMailRegister').attr('data-email', response.data['email']);
                        $('#reSendMailRegister').attr('data-name', response.data['name']);
                        $('#reSendMailRegister').attr('data-type', response.data['userType']);
                        $('#successSendMail').show();
                    } else {
                        alert(response.message);
                        window.onLoad();
                    }
                }
                else{
                    alert('Có lỗi xảy ra!');
                    window.location.href = '/';
                }
            }
        } else {
            alert('Vui lòng nhập đẩy đủ thông tin');
            location.reload();
        }
    });
    // gửi lại mail đăng ký
    $('#reSendMailRegister').click(function(){
        var formRegisExterprise = new FormData();
        formRegisExterprise.append('id',$('#reSendMailRegister').data('id'));
        formRegisExterprise.append('email',$('#reSendMailRegister').data('email'));
        formRegisExterprise.append('name',$('#reSendMailRegister').data('name'));
        formRegisExterprise.append('type',$('#reSendMailRegister').data('type'));
        let url = "/ajaxNew/reSendMailRegister.php";
        let response = callAjax('post', url, formRegisExterprise, true);
        if (response != undefined) {
            if(response.result == true){
                alert('Email xác thực đã được gửi lại đến địa chỉ email của bạn. Vui lòng kiểm tra lại hộp thư đến để hoàn tất đăng ký!');
            }else{
                alert('Có lỗi xảy ra!');
                window.location.href = '/';
            }
        }else{
            alert('Có lỗi xảy ra!');
            window.location.href = '/';
        }
    });

    //check page 3
    $('#prevStep2').click(function () {
        $('#regis_step2').removeClass('tab');
        $('#regis_step3').addClass('tab');
    });
    // $('#btn_step3').click(function () {
    $('.upfile').click(function () {
        $('.giayPhep_shop').click();
    });
    $('.div_logo').click(function () {
        $('#logo_shop').click();
    });
});
