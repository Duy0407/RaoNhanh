$(document).ready(function () {
    var do_xuay = 0;
    $(".reset-icon").click(function () {
        do_xuay += 360;
        xoay($(this), do_xuay);
    });

    function xoay(img, deg) {
        img.css("transform", "rotate(" + deg + "deg)");
        img.css("transition", "0.3s");
    };
});

$('.cate_shop').select2({
    placeholder: "Chọn lĩnh vực kinh doanh",
});

$('#prevStep2').click(function () {
    $('#regis_step2').toggle(500);
    $('#regis_step3').toggle(500);
});
$('#prevStep1').click(function () {
    $('#regis_step1').toggle(500);
    $('#regis_step2').toggle(500);
});

$('#Hoten').click(function () {
    $('.error_hoten').hide();
});

$("#birthday").click(function () {
    $(".error_birth").hide();
})
// -------------------Checkbox lấy số điện thoại cá nhân
$('.checkbox-label').click(function () {
    if ($("#usePhoneCaNhan").is(":checked")) {
        var sdt = $('#Phone').val();
        if (sdt != "" && sdt != 0) {
            $('#phone_shop').val(sdt);
            $('#phone_shop').attr('readonly', true)
        }
    } else {
        var rong = '';
        $('#phone_shop').val(rong);
        $('#phone_shop').attr('readonly', false)
    }
})

// ---------------------Upload file ảnh
function loadImage(input, output) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        console.log(reader);
        reader.onload = function (e) {
            $(output).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('.upfile').click(function () {
    $('#giayPhepShop').click();
});

$('#giayPhepShop').on('change', function () {
    loadImage(this, ".giayPhepShop")
});

$('.logo_shop').click(function () {
    $('#logo_shop').click();
});

$('#logo_shop').on('change', function () {
    loadImage(this, ".logo_shop")
});

function showFileName(e) {
    if (e.files.length > 2) {
        alert('Tải lên tối đa 2 file');
        $(e).val('');
    } else {
        var html = '';
        for (var i = 0; i < e.files.length; ++i) {
            var name = e.files.item(i).name;
            html += `<span class="name_img">` + name + `</span>`;
        }
        $('.name_file').html(html);
    }

}
// ---------------------------

$.validator.addMethod("validatePassword", function (value, element) {
    return this.optional(element) || /^\S*(?=\S{6,})(?=\S*[a-zA-Z])(?=\S*[0-9])(?=\S*[\d])\S*$/i.test(value);
}, "Hãy nhập mật khẩu từ 6 ký tự trở lên gồm ít nhất một chữ cái, ít nhất một chữ số và không chứa khoảng trắng");

$.validator.addMethod("validateEmail", function (value, element) {
    return this.optional(element) || /^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/i.test(value);
}, "Hãy nhập đúng định dạng email");

$.validator.addMethod("validatePhone", function (value, element) {
    return this.optional(element) || /^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/i.test(value);
}, "Hãy nhập đúng định dạng số điện thoại");

$.validator.addMethod("dateRange",
    function () {
        var date1 = $("input[name='dataLicens']").val();
        var date2 = $("#register_buy_enterprise").attr("data");
        return (date1 <= date2);
    });


$(".btn_regist_buy").click(function () {
    var form = $("#register_buy_enterprise");
    form.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            password: {
                required: true,
                minlength: 6,
                validatePassword: true,
            },
            repassword: {
                required: true,
                equalTo: "#password",
            },
            Hoten: {
                required: true,
                minlength: 1,
            },
            Phone: {
                required: true,
                validatePhone: true,
            },

        },
        messages: {
            password: {
                required: "Vui lòng nhập mật khẩu",
                minlength: "Độ dài mật khẩu trên 6 ký tự",
            },
            repassword: {
                required: "Vui lòng nhập lại mật khẩu",
                equalTo: "Mật khẩu chưa khớp! vui lòng nhập lại",
            },
            Hoten: {
                required: "Vui lòng nhập họ và tên",
                minlength: "Độ dài họ và tên trên 1 ký tự",
            },
            Phone: {
                required: "Vui lòng nhập số điện thoại",
            },
        },

    });
    if (form.valid() === true) {
        var email = $("input[name='email']").val();
        var password = $("input[name='password']").val();
        var name_user = $("input[name='Hoten']").val();
        var Phone = $("input[name='Phone']").val();

        var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-="
        var check = function (string) {
            for (i = 0; i < specialChars.length; i++) {
                if (string.indexOf(specialChars[i]) > -1) {
                    return true
                }
            }
            return false;
        }
        if (check(name_user) == false) {
            $.ajax({
                url: "/ajax/dangky_tkdn.php",
                type: "POST",
                data: {
                    email: email,
                    name_user: name_user,
                    password: password,
                    Phone: Phone,
                },
                success: function (data) {
                    if (data == "") {
                        alert("Bạn đăng ký tài khoản thành công.");
                        window.location.href = "/";
                    } else {
                        alert(data);
                    }
                }
            })
        } else {
            $('.error_hoten').text("Tên công ty không thể chứa kí tự đặc biệt");
            $('.error_hoten').show();
        }
    }
});
