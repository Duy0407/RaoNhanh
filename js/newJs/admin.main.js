$('.tat-dang-tin-md').on('click', function () {
    $('.hd_modal_rn').fadeOut(500);
    $('.noti-tat-dmuc').show();
});

//focus và ô input chọn danh mục sản phẩm thì popup danh mục sổ ra
$('.dmuc-spham').click(function () {
    $('.hd_modal_danhmuc_td').fadeIn(500);
});
$('#danh-muc-san-pham').click(function () {
    $('.hd_modal_danhmuc_td').fadeIn(500);
});

//ấn ra ngoài thì popup danh mục sản phẩm tắt đi :
$(window).click(function (e) {
    if ($(e.target).is('.hd_modal_rn')) {
        $('.hd_modal_rn').fadeOut(500);
        $('.noti-tat-dmuc').show();
    }
});

$('.md-do-dien-tu').click(function () {
    $('.hd_modal_do_dt').fadeIn('fast');
    $('.hd_modal_danhmuc_td').hide();
});
$('.tro-ve-dmuc-tdang').click(function () {
    $('.modal_con_td').hide();
    $('.hd_modal_danhmuc_td').fadeIn('fast');
})

//select2: ví dụ : /dang-tin-dien-tu-may-tinh-bang.html
$('.slect-thietbi').select2();

$('.slect-baohanh').select2();
$('.slect-ttrang').select2();
$('.slect-chitiet_dm').select2();

$('.md-tinh-tp').select2();
$('.md-quan-huyen').select2();
$('.md-tinh-tp').select2();
$('.rn-select2').select2();
$('.dt-money-up').select2({
    minimumResultsForSearch: Infinity,
});

/***RENDER TIN ĐĂNG ******/

//hien thi dòng máy thiet bị thong minh :
$('.slect-hang-tbtm').on('change', function () {
    if ($(this).val() == "apple") {
        $('.rd-tbi-tminh').hide();
        $('.rder-tbtminh-apple').show();
    } else if ($(this).val() == "samsung") {
        $('.rd-tbi-tminh').hide();
        $('.rder-tbtminh-samsung').show();
    }
});

//render thiêt bị loa/tivi/amply : /dang-tin-dien-tu-am-ly.html
$('.slect-thietbi').on('change', function () {
    if ($(this).val() == "tivi") {
        $('.rn_hide_dtin_field').hide();
        $('.reder-field-tivi').show();
    } else if ($(this).val() == "loa") {
        $('.rn_hide_dtin_field').hide();
        $('.reder-field-loa').show();
    } else if ($(this).val() == "amply") {
        $('.rn_hide_dtin_field').hide();
        $('.reder-field-amply').show();
    } else if ($(this).val() == "karaoke") {
        $('.rn_hide_dtin_field').hide();
        $('.reder-field-karaoke').show();
    }
    else {
        // $('.rn_hide_dtin_field').hide();
    }
})

$('.slect-thietbi').on('change', function () {
    if ($(this).val() == "tb-khac") {
        $('.rn_hide_dtin_field').hide();
        $('.reder-field-tivi').show();
    }
});

$('.slect-thietbi-m-anh').on('change', function () {
    if ($(this).val() == "tb-khac") {
        $('.reder-field-hang').hide();
    } else if ($(this).val() == "mayanh" || $(this).val() == "mayquay") {
        $('.reder-field-hang').show();
    }
});

$('.slect-thietbi-pkien').on('change', function () {
    if ($(this).val() == "tb-khac") {
        $('.linh-kien-show').hide();
        $('.phu-kien-show').hide();
    } else if ($(this).val() == "phukien") {
        $('.phu-kien-show').show();
        $('.linh-kien-show').hide();
    } else if ($(this).val() == "linhkien") {
        $('.linh-kien-show').show();
        $('.phu-kien-show').hide();
    }
});

//click vào liên hệ người bán thì ô nhập tiền disabled
$('.lien-he-ngban').click(function () {
    if ($('.lien-he-ngban').prop('checked')) {
        var rong = '';
        $('.input-gia-cont #gia-ban-sp').val(rong);
        $('.input-gia-cont #gia-ban-sp').prop('disabled', true);
    }
    else {
        $('.input-gia-cont #gia-ban-sp').prop('disabled', false);
    }
});

// $('.m_lienhenguoiban_cb').click(function () {
//     if ($('.m_lienhenguoiban_cb').prop('checked')) {
//         var rong = '';
//         $('.b3_fr2_gia_container .b3_fr2_gia_input').val(rong);
//         $('.b3_fr2_gia_container .b3_fr2_gia_input').prop('disabled', true);
//     }
//     else {
//         $('.b3_fr2_gia_container .b3_fr2_gia_input').prop('disabled', false);
//     }
// });
// $('.m_chotangmienphi_cb').click(function () {
//     if ($('.m_chotangmienphi_cb').prop('checked')) {
//         var rong = '';
//         $('.b3_fr2_gia_container .b3_fr2_gia_input').val(rong);
//         $('.b3_fr2_gia_container .b3_fr2_gia_input').prop('disabled', true);
//     }
//     else {
//         $('.b3_fr2_gia_container .b3_fr2_gia_input').prop('disabled', false);
//     }
// });
//click vào switch này thì ô nhập tiền disabled
$('.switch-124').click(function () {
    if ($('#cho-tang-mphi').is(':checked')) {
        var rong = '';
        $('.input-gia-cont #gia-ban-sp').val(rong);
        $('.input-gia-cont #gia-ban-sp').prop('disabled', true);
        $('.lien-he-ngban').prop("checked", false);
        $('.lien-he-ngban').prop('disabled', true);
    }
    else {
        $('.input-gia-cont #gia-ban-sp').prop('disabled', false);
        $('.lien-he-ngban').prop('disabled', false);
    }
});

//tải file ảnh ở mục đăng tin : mẫu : /dang-tin-dien-tu-may-tinh-bang.html
// var i = 1;
// $(".avt_img_chonanh_moi").click(function(){

// })
var avtdc = $(".after-upload-imgage").attr("data");
var arr_anh = [];
var arr_src = [];
var k = 0;

async function uploadImg(el) {
    var file_data = $(el)[0].files;
    var x = 0;
    var match = ['image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG'];
    var ah = 0;
    $(".anh_lifile").each(function () {
        var id = $(this).attr("data");
        ah += id++;
    });

    if ((Number(ah) + Number(file_data.length)) < 11) {
        for (var i = 0; i < Number(file_data.length); i++) {
            x++;
            var file = file_data[i];
            var file_size = file.size;
            var file_type = file.type;
            var convert_file_size = (file_size / (1024 * 1024)).toFixed(2);
            if ($.inArray(file_type, match) != -1) {
                if (convert_file_size <= 2) {
                    var image = new Image();
                    image.src = URL.createObjectURL(file);
                    await image.decode();
                    if (image.height >= 300 && image.width >= 300) {

                        var _li = $(el).closest('li');
                        if (_li.hasClass('li_file_hide')) {
                            _li.removeClass('li_file_hide');
                        }
                        arr_anh.push(file);
                        arr_src.push(URL.createObjectURL(file));
                        var html = `<li id="li_files1" class='lifile_avt'>
                                    <img src='`+ URL.createObjectURL(file) + `' class="anh_lifile" data="1">
                                    <span class='delete-file-upload'><img src="/images/img_new/exp_del_avt.png" onclick='xoa_del(this)' data='`+ (k++) + `' /></span
                                </li>`
                        // _li.find('.img-wrap-box').append(html);
                        _li.parents(".frame_img").append(html);
                        $('.before-upload-imgage').hide();
                        $('.after-upload-imgage').show();
                    } else {
                        alert("Ảnh " + file.name + " kích thước ảnh nhỏ hơn 300x300 px vui lòng chọn ảnh hợp lệ");
                        break;
                    }
                } else {
                    alert("Ảnh " + file.name + " kích cỡ ảnh lớn hớn 2MB vui lòng chọn ảnh hợp lệ");
                    break;
                }
            } else {
                alert("Ảnh " + file.name + " sai định dạng ảnh vui lòng chọn ảnh hợp lệ có định dạng: png, jpg, jpeg, gif, jfif ");
                break;
            }
        }
    } else {
        alert("Tổng số ảnh bạn chọn đã quá 10 ảnh");
    }
    // console.log(arr_anh)
};
// xoa file trong mang
function xoa_del(id) {
    var id_x = $(id).attr("data");
    arr_anh[id_x] = 'undefined';
    arr_src[id_x] = 'undefined';
    $(id).parents('.lifile_avt').remove();
    // console.log(arr_anh)
};

var i = 1;
$('.add_img').click(function () {
    $(".popup_anh_dadang").hide();
    var _lastimg = jQuery('.frame_img li').last().find('input[type="file"]').val();

    if (_lastimg != '') {
        var _html = '<li id="li_files" class="li_file_hide po_ab" >';
        _html += '<div class="lifile_avt1 d_none">';
        _html += '<input type="file"  onchange="uploadImg(this)" id="files" name="files[]" multiple class="avt_files" accept="iamge/*" />';
        _html += '</div>';
        _html += '</li>';
        jQuery('.frame_img').append(_html);
        jQuery('.frame_img li').last().find('input[type="file"]').click();
        i++;
    } else {
        // if (_lastimg == '') {
        jQuery('.frame_img li').last().find('input[type="file"]').click();
        // } else {
        //     if ($('.list_img').hasClass('show-btn') === true) {
        //         $('.list_img').removeClass('show-btn');
        //     }
        // }
    }
});

$(".xoa_bocu").click(function () {
    var bcu = 1;
    var dv = Number($(".after-upload-imgage").attr("data")) - Number(bcu);
    $(".after-upload-imgage").attr(dv)
});

function del_img(el) {
    $(el).parents('li').remove();
    $('.img').show();
};

function anh_chon(id) {
    var us_id = $(id).attr("data");
    $.ajax({
        url: '/render/anh_dadang.php',
        type: 'POST',
        data: {
            us_id: us_id,
        },
        success: function (data) {
            $(".popup_anh_dadang .anh_ddangl").html(data);
            $(".popup_anh_dadang").show();
        }
    })
}
var arr_new = [];

function css_bor(id) {
    $(id).parents('.form_anhchon').toggleClass('active', $(id).is(':checked'));
    var a = 1;
    $(".anhdachon").each(function () {
        if ($(this).is(":checked") == true) {
            $(".anhda_chon").find("span").text(a);
            $(this).attr("data", a);
            a++;
        }
    });

    if ($(id).is(":checked") == true) {
        var anh = $(id).parents(".form_anhchon").find('.anh_chond').attr("src");
        arr_new.push(anh);
    } else {
        var anh = $(id).parents(".form_anhchon").find('.anh_chond').attr("src");
        arr_new.splice(arr_new.indexOf(anh), 1);
    };
    // console.log(arr_new);
}


function anh_dachon(id) {
    var so_chon = Number($(id).find('span').text());
    var ah = 0;
    $(".anh_lifile").each(function () {
        var id = $(this).attr("data");
        ah += id++;
    });

    if (so_chon + Number(ah) < 11) {
        for (var j = 0; j < arr_new.length; j++) {
            var html = `<li id="li_files1">
                            <div class="img-wrap">
                                <span class="close xoa_bocu" onclick="del_img(this)"><img src="/images/img_new/exp_del_avt.png" alt="close this image" /></span>
                                <div class="img-wrap-box anh_dadang">
                                    <img src="` + arr_new[j] + `" onerror="this.closest('li').remove();" class="anh_lifile" data="1" />
                                </div>
                            </div>
                        </li>`;
            $(".frame_img").append(html);
            $('.before-upload-imgage').hide();
            $('.after-upload-imgage').show();
        }
    } else {
        alert("Tổng số ảnh bạn chọn đã quá 10 ảnh");
    }
    arr_new = [];
    $(id).find("span").text(0);
    $(".popup_anh_dadang").hide();
}

//Tải video lên ở mục đăng đăng tin sản phẩm : /dang-tin-dien-tu-may-tinh-de-ban.html
// $(".video-upload-after").click(function () {
//     $("#cl-upload-video-file").click();
//     return false;
// });

// function upload_video(event) {
//     let file = $(event).prop('files')[0];
//     var rong = '';
//     if (file == undefined) {
//         $(".avt_xoavideo").hide();
//         $("video.continue_upload_video").attr("src", "");
//         $("#video_chon").addClass('d_none');
//         $(event).val(rong);
//     } else {
//         let size = file.size;
//         let filesize = (size / (1024 * 1024)).toFixed(2);
//         if (filesize <= 20) {
//             let blobURL = URL.createObjectURL(file);
//             document.querySelector('#video_chon').classList.remove('d_none');
//             document.querySelector("video").src = blobURL;
//             $('.after-upload-video').show();
//             $(".avt_xoavideo").attr("data", "");
//             $(".avt_xoavideo").show();
//             $('.dang-tin-video').hide();
//         } else {
//             alert("Dung lượng video phải nhỏ hơn 20Mb");
//             $(event).val(rong);
//         }
//     }
// }

// $(".close_vdeo").click(function () {
//     $(this).parents(".avt_xoavideo").attr("data", "");
//     $(this).parents(".avt_xoavideo").children("video.continue_upload_video").attr("src", "");
//     $(this).parents(".avt_xoavideo").hide();
//     $("#cl-upload-video-file").val('');
// });

$(document).ready(function () {
    var do_xuay = 0;

    $(".xoay360").click(function () {
        do_xuay += 360;
        xoay($(this), do_xuay);
    })
    function xoay(img, deg) {
        $('.xoay360').css("transform", "rotate(" + deg + "deg)");
        $('.xoay360').css("transition", "0.2s");
    }
    function ramdumso(length) {
        var result = '';
        var characters = '0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() * charactersLength));
        }
        return result;
    }
    $(".ma_dcap_2").val(ramdumso(6));
    $(".xoay360").click(function () {
        var x = ramdumso(6);
        $(".ma_dcap_2").val(x);
    })

});


$('.list-money-rn p').on('click', function () {
    var c_money = $(this).html();
    $('.dt-money-up').html(c_money);
});

//focus vào các ô thì border chuyển sang màu cam :
$('.tindang-container input').focus(function () {

    $('.texa-mo-ta').removeClass('input_active');
    $('.row-tin-dang input').removeClass('input_active');
    $(this).parents('.input-gia-cont').removeClass('input_active');
    $(this).addClass('input_active');
    $(this).parents('.input-gia-cont').addClass('input_active');
});

$('.tindang-container input').blur(function () {
    $(this).removeClass('input_active');
    $('.input-gia-cont').removeClass('input_active');
})

$('.tindang-container textarea').blur(function () {
    $(this).removeClass('input_active');
})

$('.tindang-container input').blur(function () {
    $(this).removeClass('input_active');
})

//focus vào các ô thì border chuyển sang màu cam : Vi dụ : /dang-tin-dien-tu-may-tinh-de-ban.html
$('.texa-mo-ta').focus(function () {
    $('.row-tin-dang input').removeClass('input_active');
    $(this).addClass('input_active');
});

// lam ma capcha
$(document).ready(function () {
    var do_xuay = 0;
    $(".avt_icon_lh_cp_2 img").click(function () {
        do_xuay += 360;
        xoay($(this), do_xuay);
    });

    function xoay(img, deg) {
        img.css("transform", "rotate(" + deg + "deg)");
        img.css("transition", "0.3s");
    };
});


function ramdumso(length) {
    var result = '';
    var characters = '0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() *
            charactersLength));
    }
    return result;
}
$(".ma_dcap_2").val(ramdumso(5));
$(".avt_icon_lh_cp_2").click(function () {
    var x = ramdumso(5);
    $(".ma_dcap_2").val(x);

})
$('.lien-he-ngban').click(function () {
    if ($('.lien-he-ngban').prop('checked')) {
        var rong = '';
        $('.price').val(rong);
        $('.price').prop('disabled', true);
    } else {
        $('.price').prop('disabled', false);
    }
});

$.validator.addMethod("vali_phone", function (value, element) {
    return this.optional(element) || /^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|087|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/i.test(value);
}, "Hãy nhập đúng định dạng số điện thoại");

$.validator.addMethod("vali_email", function (value, element) {
    return this.optional(element) || /^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/i.test(value);
}, "Hãy nhập đúng định dạng email");