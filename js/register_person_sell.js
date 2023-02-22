function validateRegist(){
    var check = true;
    var email = $('#Email').val();
    var password = $('#password').val();
    var repassword = $('#repassword').val();
    var hoten = $('#Hoten').val();
    var birthday = $('#birthday').val();
    var phone = $('#Phone').val();
    var city = $('#city').val();
    var address = $('#address').val();
    var captcha = $('#captcha').val();


    // email
    if(email == ''){
        $("#Email").addClass("error");
        $('.error_email').text('Bạn chưa nhập Email ')
        check = false;
    }else if (!validateEmail(email)){
        $("#Email").addClass("error"), $('.error_email').text("Email không đúng định dạng");   
        check = false;
    }else{
        var checkExistEmail = checkExitsEmail(1,email);
        if(checkExistEmail.result){
            $("#Email").addClass("error"), $('.error_email').text("Email đã được đăng ký");
            check = false;
        }else{
            $("#Email").removeClass("error"),  $(".error_email").text('');
        }
    }

    // password
    if(password == ''){
        $("#password").addClass("error");
        $('.error_password').text('Bạn chưa nhập mật khẩu ')
        check = false;
    }else if(password.length < 6 ){
        $("#password").addClass("error");
        $('.error_password').text('Độ dài không được ít hơn 6 ký tự ');
        check = false;
    }else if(hasWhiteSpace(password)){
        $("#password").addClass("error");
        $('.error_password').text('Mật khẩu không được chứa khoảng trắng');
        check = false;
    }
    else{
        $("#password").removeClass("error");
        $(".error_password").text('');
    }

    //repassword
    if(repassword == ''){
        $("#repassword").addClass("error");
        $('.error_repassword').text('Bạn chưa nhập lại mật khẩu')
        check = false;
    }else if(repassword.length < 6 ){
        $("#repassword").addClass("error");
        $('.error_repassword').text('Độ dài không được ít hơn 6 ký tự ');
        check = false;
    }else if(repassword != password){
        $("#password").addClass("error");
        $('.error_repassword').text('Mật khẩu không trùng khớp');
        check = false;
    }else{
        $("#repassword").removeClass("error"),  $(".error_repassword").text('');
    }

    //họ tên
    if(hoten == ''){
        $("#Hoten").addClass("error");
        $('.error_hoten').text('Bạn chưa nhập họ và tên ')
        check = false;
    }else if(hoten.length < 6 ){
        $("#Hoten").addClass("error");
        $('.error_hoten').text('Họ tên phải nhiều hơn 6 ký tự ');
        check = false;
    }
    else if (!validateName(hoten)){
        $("#Hoten").addClass("error");
        $('.error_hoten').text("Họ và tên không chứa ký tự đặc biệt");   
        check = false;
    }
    else{
        $("#Hoten").removeClass("error"),  $(".error_hoten").text('');
    }

    //ngày sinh
    if(birthday != ''){
        console.log(birthday);
        var birthday = birthday.split('-');
        birthday = Date.parse(birthday.join('/'));
        var today = new Date();
        today.setHours(0,0,0,0);
        today = Date.parse(today);
        if(birthday > today){
            $("#birthday").addClass("error");
            $('.error_birth').text("Ngày sinh không hợp lệ");
        }else{
            $('.error_birth').text("");
            $("#birthday").removeClass("error");
        }
    }

    // số điện thoại
    if(phone == ''){
        $("#Phone").addClass("error");
        $('.error_phone').text('Bạn chưa nhập số điện thoại ')
        check = false;
    }else if(!validatePhone(phone)){
        $("#Phone").addClass("error");
        $('.error_phone').text("Số điện thoại không đúng định dạng");   
        check = false;
    }else{
        $("#Phone").removeClass("error"),  $(".error_phone").text('');
    }
    //khu vực
    if(city == ''){
        $("#city").addClass("error");
        $('.error_city').text('Bạn chưa nhập khu vực ')
        check = false;
    }else{
        $("#city").removeClass("error"),  $(".error_city").text('');
    }

    //địa chỉ liên hệ
    if(address == ''){
        $('#address').addClass("error");
        $('.error_address').text('Bạn chưa nhập địa chỉ ');
        check = false;
    }else if(address.length < 10 ){
        $("#address").addClass("error");
        $('.error_address').text('Địa chỉ phải nhiều 10 ký tự');
        check = false;
    }else{
        $("#address").removeClass("error"),  $(".error_address").text('');
    }
    // captcha
    if(captcha == ''){
        $('#captcha').addClass("error");
        $('.error_captcha').text('Bạn chưa nhập mã captcha');
        check = false;
    }else if(captcha.length < 5 ){
        $("#captcha").addClass("error");
        $('.error_captcha').text('Mã captcha phải đủ 5 ký tự');
        check = false;
    }else{
        var formData = new FormData();
        formData.append('code',$('#captcha').val());
        let url = "/ajaxNew/checkCaptcha.php";
        let response = callAjax('post', url, formData, true);
        if (response != undefined) {
            if(response.result == false){
                $("#captcha").addClass("error");
                $('.error_captcha').text('Mã captcha không đúng');
                check = false;
            }else{
                $("#captcha").removeClass("error"),  $(".error_captcha").text('');
            }
        }else{
            alert('Có lỗi xảy ra');
            window.location.href = '/';
        }
    }
    return check;
}
// check form submit
$(document).ready(function(){
    $('.btn_regist_buy').click(function(){
        var checkValid = validateRegist();
        if(checkValid){
            var formData = new FormData();
            formData.append('email',$('#Email').val());
            formData.append('password',$('#password').val());
            formData.append('name',$('#Hoten').val());
            formData.append('birthday',$('#birthday').val());
            formData.append('gender',$('#gender').val());
            formData.append('phone',$('#Phone').val());
            formData.append('city',$('#city').val());
            formData.append('address',$('#address').val());
            let url = "/ajaxNew/registAcountPersonSell.php";
            let response = callAjax('post', url, formData, true);
            if (response != undefined) {
                if(response.result == true){
                    $('#reSendMailRegister').attr('data-id',response.data['id']);
                    $('#reSendMailRegister').attr('data-email',response.data['email']);
                    $('#reSendMailRegister').attr('data-name',response.data['name']);
                    $('#reSendMailRegister').attr('data-type',response.data['userType']);
                    $('#successSendMail').show();
                }else{
                    alert(response.message);
                    window.onLoad();
                }
            }else{
                alert('Có lỗi xảy ra!');
                window.location.href = '/';
            }
        }
    });
    //gửi lại mail đăng ký
    $('#reSendMailRegister').click(function(){
        var formData = new FormData();
        formData.append('id',$('#reSendMailRegister').data('id'));
        formData.append('email',$('#reSendMailRegister').data('email'));
        formData.append('name',$('#reSendMailRegister').data('name'));
        formData.append('type',$('#reSendMailRegister').data('type'));
        let url = "/ajaxNew/reSendMailRegister.php";
        let response = callAjax('post', url, formData, true);
        if (response != undefined) {
            if(response.result == true){
                alert('Email xác thực đã được gửi lại đến địa chỉ email của bạn. Vui lòng kiểm tra lại hộp thư đến để hoàn tất đăng ký!');
            }else{
                alert('Có lỗi xảy raa!');
                window.location.href = '/';
            }
        }else{
            alert('Có lỗi xảy ra!');
            window.location.href = '/';
        }
    });
});