//check định dạng mail
function validateEmail(r) {
    return /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(r)
}
// check link websiteShop
function validateWebsiteShop(r) {
    return /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(r)
}
// regex định dạng họ và tên
function validateName(r) {
    return /^[a-zA-ZaAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậâẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆfFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ\s]+$/.test(r);
}

//check name shop
function validateNameShop(r) {
    return /^[a-zA-Z1234567890aAàÀảẢãÃáÁạẠăĂằẰẳẲẵẴắẮặẶâÂầẦẩẨẫẪấẤậâẬbBcCdDđĐeEèÈẻẺẽẼéÉẹẸêÊềỀểỂễỄếẾệỆfFgGhHiIìÌỉỈĩĨíÍịỊjJkKlLmMnNoOòÒỏỎõÕóÓọỌôÔồỒổỔỗỖốỐộỘơƠờỜởỞỡỠớỚợỢpPqQrRsStTuUùÙủỦũŨúÚụỤưƯừỪửỬữỮứỨựỰvVwWxXyYỳỲỷỶỹỸýÝỵỴzZ\s]+$/.test(r);
}
// regex pass khoảng trắng
function validatePass(r) {
    return /^[(\S\w\S)]+$/.test(r);
}

// regex captcha
function validateCaptcha(r) {
    return /^[0-9]+$/.test(r);
}
// regex phone
function validatePhone(r) {
    return /^(84|0[3|5|7|8|9])+([0-9]{8})$/.test(r);
}
// check cmnd 12 số
function validateCCCD(r) {
    return /^\d{9,}$/.test(r);
}
// check mã thuế
function valiMaThue(r){
    return /^([0-9]{12,})$/.test(r);
}

//check chứa khoảng trắng
function hasWhiteSpace(r) {
    return r.indexOf(" ") >= 0
}
function showFileName(e){
    if(e.files.length > 2){
        alert('Tải lên tối đa 2 file');
        $(e).val('');
    }else{
        var html = '';
        for (var i = 0; i < e.files.length; ++i) {
            var name = e.files.item(i).name;
            html += `<span class="name_img">`+name+`</span>`;
        }
        $('.name_file').html(html);
    }

}
function changeSlug(text) {
    text = text.replace(/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/g, 'a');
    text = text.replace(/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/g, 'e');
    text = text.replace(/(ì|í|ị|ỉ|ĩ)/g, 'i');
    text = text.replace(/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/g, 'o');
    text = text.replace(/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/g, 'u');
    text = text.replace(/(ỳ|ý|ỵ|ỷ|ỹ)/g, 'y');
    text = text.replace(/(đ)/g, 'd');
    text = text.replace(/( )/g, '-');
    text = text.toLowerCase();
    return text;
}
function loadImage(input, output) {
    var fsize = input.files[0].size;
    if (fsize > 2097152){
        alert("Kích thước ảnh tối đa là 2MB") ;
    }else{
        if (input.files && input.files[0]) {
            // console.log('aaaaa');
            var reader = new FileReader();
            reader.onload = function(e) {
                $(output).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
}
function reloadSecurityCode(r) {
    $(r).parent().find("img").attr("src", "/classes/securitycode.php?t=" + Date.now())
}
function callAjax(method, url, data = {}, sentImage = false) {
    var result;
    if (!sentImage) {
        $.ajax({
            type: method,
            url: url,
            dataType: "json",
            async: false,
            data: data,
            success: function(response) {
                result = response;
            }
        });
    } else {
        $.ajax({
            type: method,
            url: url,
            dataType: "json",
            async: false,
            data: data,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                result = response;
            }
        });
    }

    return result;
}
//check exits email
function checkExitsEmail(userType,email){
    var formData = new FormData();
    formData.append('type',userType);
    formData.append('email',email);
    let url = "/ajax/checkExistEmail.php";
    let response = callAjax('post', url, formData, true);
    if (response != undefined) {
        return response;
    }
}
