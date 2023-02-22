$('#img_ava_edit').change(function () {
    var id = $("#img_ava_edit");
    var lg = id[0].files.length;

    var test_value = $("#img_ava_edit").prop('files');
    var extension = $("#img_ava_edit").val().split('.').pop().toLowerCase();
    if (lg > 0) {
        var fileSize = test_value[0]['size'];
        if (fileSize > 2097152) {
            alert('Kích thước file không được lớn hơn 2 MB');
            return false;
        } else if ($.inArray(extension, ['png', 'gif', 'jpeg', 'jpg', 'psd', 'pdf']) == -1) {
            alert("File ảnh không đúng định dạng !");
            return false;
        } else {
            loadImage(this, 'img-edit');
        }
    }
});


// box left
$('.box-left .menu-top').click(function () {
    if ($(window).width() <= 768) {
        $('.menu-bot').toggle(500);

        var src = $('.btn-mui-ten').find('img').attr('src');
        if (src == "/images/newImages/arrow-down.png") {
            $('.btn-mui-ten').find('img').attr('src', '/images/newImages/arrow-up.png');
        } else {
            $('.btn-mui-ten').find('img').attr('src', '/images/newImages/arrow-down.png');
        }
    }else{
        $('.menu-bot').show(500);
    }
});

// thanh menu
$(".menu-btn").click(function () {
    $(this).parent('.text-tilte').find('.thanh-menu').toggle(100);
});
$(".btnn-menu-btn").click(function () {
    $(this).next().toggle();
});
$(".menu-btn-dbl").click(function () {
    $('.dbl').parseInt().toggle(500);
});

// click active thẻ điện thoại
$('.box-the .btn-the').click(function () {
    $('.btn-the').removeClass('active');
    $(this).addClass('active');
});

// click bank
$('.bank_1 .bank').click(function () {
    $('.bank').removeClass('active');
    $(this).addClass('active');
});

// select 2 khu vực
$('#city').select2();
$('#gender').select2();

// popup thanh toán ghim tin


$('.btn-payment').click(function () {
    var id_tin = $(this).attr("data");
    var payment = $(this).find(".tien_thanhtoan").text();
    var payment1 = Number(payment.replace(/,/g, ''));
    var soDu = $('.money-so-du-tk').text();
    var soDu1 = Number(soDu.replace(/,/g, ''));
    if (payment1 != 0) {
        if (payment1 > soDu1) {
            $('.modalSdkd').css('display', 'block');
        } else {
            $(".modalPaymentConf .dong_ymua").attr("data", id_tin);
            $('.modalPaymentConf').css('display', 'block');
        }
    } else {
        alert("Chọn thời gian đẩy tin");
    }
});

// $('.btn-gt').click(function () {
//     $('.them_ghimtin').css("display", "block");
// });

// format tien
function addCommas(nStr) {
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}


//popup
$('.btn-ddldb').click(function () {
    $('#markedAsSold').css("display", "block");
});

$('.btn-switch').click(function () {
    var tong = $('.so').val();
    var tgian_bd = [];
    if ($(this).find("#checkedAll").is(":checked")) {
        var so_ngay = $('.so').val();
        var dongia = $(".khoi_chon_daytin").attr("data");
        var tien_ttoan = Number(24) * Number(dongia) * Number(so_ngay);
        $(".money-payment").find("span").text(addCommas(tien_ttoan));
        $("#payment_conf .text-check-mail").find("span").text(addCommas(tien_ttoan));
        $(".time_pin").each(function () {
            this.checked = true;
            $(this).val("1");
            $('.slcHour').find('span').text('Cả ngày trong ' + tong + ' ngày');
            $('.hour-day').addClass('selected');
            if ($(this).is(":checked")) {
                var tgianbd = $(this).attr("data");
                tgian_bd.push(tgianbd);
            }
        })
        var bd = Math.min.apply(Math, tgian_bd);
        var tgian_hientai = $(".tgian_batdau").attr("data");
        var tgian_bdau = bd - 1;
        var d = new Date();
        var date_ss = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();

        var hien_tai = date_ss + ' ' + tgian_hientai;
        hien_tai = new Date(hien_tai).getTime();

        var tgian_kthuc = date_ss + ' ' + (bd + ':00');
        tgian_kthuc = new Date(tgian_kthuc).getTime();

        var strDate = d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear();
        var endate = (d.getDate() + 1) + "/" + (d.getMonth() + 1) + "/" + d.getFullYear();

        var ngay_luu = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
        var ngay_ktluu = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + (d.getDate() + 1);

        if (tgian_kthuc >= hien_tai) {
            var bdau_tg = tgian_bdau + 'h - ' + bd + 'h ngày ' + strDate;
            $(".batdau_tgiant").attr("data", tgian_bdau + ':00');
            $(".batdau_tgiant").attr("data1", ngay_luu)
            $(".batdau_tgiant").text(bdau_tg);
        } else if (tgian_kthuc < hien_tai) {
            var bdau_tg = tgian_bdau + 'h - ' + bd + 'h ngày ' + endate;
            $(".batdau_tgiant").attr("data", tgian_bdau + ':00');
            $(".batdau_tgiant").attr("data1", ngay_ktluu)
            $(".batdau_tgiant").text(bdau_tg);
        }
    } else {
        $(".time_pin").each(function () {
            this.checked = false;
            $(this).val("0");
            $(".money-payment").find("span").text('0')
            $('.slcHour').find('span').text('');
            $('.hour-day').removeClass('selected');
            $(".batdau_tgiant").text('');
        })
    }
});

$('.box-hour .hour-day').click(function () {
    var so_ngay = $('.so').val();
    var tex_arr = [];
    var tgian = 0;
    var tgian_bd = [];
    // tính tiền
    $(".time_pin").each(function () {
        if ($(this).is(":checked")) {
            $(this).val('1');
            var gtri_val = $(this).val();
            tgian = Number(tgian) + Number(gtri_val);
            var tex = $(this).parents(".hour-day").find(".name").text();
            tex_arr.push(tex);

            var tgianbd = $(this).attr("data");
            tgian_bd.push(tgianbd);
        }
    });

    var bd = Math.min.apply(Math, tgian_bd);
    var tgian_hientai = $(".tgian_batdau").attr("data");
    if (bd != '' && bd != 'Infinity') {
        var tgian_bdau = bd - 1;
        var d = new Date();
        var date_ss = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();

        var hien_tai = date_ss + ' ' + tgian_hientai;
        hien_tai = new Date(hien_tai).getTime();

        var tgian_kthuc = date_ss + ' ' + (bd + ':00');
        tgian_kthuc = new Date(tgian_kthuc).getTime();

        var strDate = d.getDate() + "/" + (d.getMonth() + 1) + "/" + d.getFullYear();
        var endate = (d.getDate() + 1) + "/" + (d.getMonth() + 1) + "/" + d.getFullYear();

        var ngay_luu = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + d.getDate();
        var ngay_ktluu = d.getFullYear() + '-' + (d.getMonth() + 1) + '-' + (d.getDate() + 1);

        if (tgian_kthuc >= hien_tai) {
            var bdau_tg = tgian_bdau + 'h - ' + bd + 'h ngày ' + strDate;
            $(".batdau_tgiant").attr("data", tgian_bdau + ':00');
            $(".batdau_tgiant").attr("data1", ngay_luu)
            $(".batdau_tgiant").text(bdau_tg);
        } else if (tgian_kthuc < hien_tai) {
            var bdau_tg = tgian_bdau + 'h - ' + bd + 'h ngày ' + endate;
            $(".batdau_tgiant").attr("data", tgian_bdau + ':00');
            $(".batdau_tgiant").attr("data1", ngay_ktluu)
            $(".batdau_tgiant").text(bdau_tg);
        }
    } else if (bd == 'Infinity') {
        $(".batdau_tgiant").text('');
    };


    var dongia = $(".khoi_chon_daytin").attr("data");
    var tien_ttoan = Number(tgian) * Number(dongia) * Number(so_ngay);

    // console.log(so_ngay)
    $(".money-payment").find("span").text(addCommas(tien_ttoan));
    $("#payment_conf .text-check-mail").find("span").text(addCommas(tien_ttoan));

    var arr_gio = tex_arr.join(", ");
    $('.slcHour').find('span').html(arr_gio + ' trong ' + so_ngay + '' + ' ngày');
    // check chọn giờ
    if ($(this).find(".time_pin").is(":checked")) {
        $(this).find(".time_pin").val('1');
        $(this).addClass("selected");
        var isAllChecked = 0;
        $(".hour-day .time_pin").each(function () {
            if (!this.checked)
                isAllChecked = 1;
        })
        if (isAllChecked == 0) {
            $(".time_pin").val('1');
            $('.slcHour').find('span').text('Cả ngày trong ' + so_ngay + ' ngày');
            $("#checkedAll").prop("checked", true);
        }
    } else {
        $(this).find(".time_pin").val('0')
        $(this).removeClass("selected");
        $("#checkedAll").prop("checked", false);
    }
});


// });
// chọn ngày
// cộng ngày
if ($('.cong').click(function () {
    var tong = parseInt($('.so').val());
    tong = tong++;
    $('.so').val(++tong);
    var so_ngay = $(".so").val();
    var tgian = 0;
    var tgoi_ghim = $(".slcNoiGhim").attr("data");
    var tex_arr = [];
    $(".time_pin").each(function () {
        if ($(this).is(":checked")) {
            var gtri_val = $(this).val();
            tgian = Number(tgian) + Number(gtri_val);
            var tex = $(this).parents(".hour-day").find(".name").text();
            tex_arr.push(tex);
        }
    });
    var dongia = $(".khoi_chon_daytin").attr("data");
    var tien_ttoan = Number(tgian) * Number(so_ngay) * Number(dongia);

    $(".money-payment").find("span").text(addCommas(tien_ttoan));
    $("#payment_conf .text-check-mail").find("span").text(addCommas(tien_ttoan));
    var arr_gio = tex_arr.join(", ");
    $('.slcHour').find('span').html(arr_gio + ' trong ' + so_ngay + '' + ' ngày');
    if ($("#checkedAll").is(":checked")) {
        $('.slcHour').find('span').html('Cả ngày trong  ' + so_ngay + '' + ' ngày');
    }
}));

// trừ ngày
if ($('.tru').click(function () {
    var tong = $('.so').val();
    var so_ngay = 0;
    if (tong > 1) {
        $('.so').val(--tong);
        so_ngay = $(".so").val();
    } else {
        $('.so').val(tong);
        so_ngay = $(".so").val();
    }
    var tgian = 0;
    var tex_arr = [];
    $(".time_pin").each(function () {
        if ($(this).is(":checked")) {
            var gtri_val = $(this).val();
            tgian = Number(tgian) + Number(gtri_val);
            var tex = $(this).parents(".hour-day").find(".name").text();
            tex_arr.push(tex);
        }

    });
    var dongia = $(".khoi_chon_daytin").attr("data");
    var tien_ttoan = Number(tgian) * Number(so_ngay) * Number(dongia);

    $(".money-payment").find("span").text(addCommas(tien_ttoan));
    $("#payment_conf .text-check-mail").find("span").text(addCommas(tien_ttoan));
    var arr_gio = tex_arr.join(", ");
    $('.slcHour').find('span').html(arr_gio + ' trong ' + so_ngay + '' + ' ngày');
    if ($("#checkedAll").is(":checked")) {
        $('.slcHour').find('span').html('Cả ngày trong  ' + so_ngay + '' + ' ngày');
    }
}));

$(".close_ttoan, .huybo_ymua").click(function () {
    $("#payment_conf").hide();
});

$(".close_gtin").click(function () {
    $("#pinNew").hide();
});

// $(".close_sodu, .huybo_sodu").click(function () {
//     $("#insufficient").hide();
// });
// $('.ddldb').click(function () {
//     $('#markedAsSold').css("display", "block");
// });

$(".close_gtin").click(function () {
    $("#pinNew").hide();
});

$(".close_ttoan").click(function () {
    $("#payment_conf").hide();
});

$('.arrow').click(function () {
    $('#page2').addClass('tab');
    $('#page1').removeClass('tab');
});
$(document).click(function (event) {
    $target = $(event.target);
    //đánh dấu đã bán

    if (!$target.closest('.box-check').length && !$target.closest('.btn-ddldb').length && !$target.closest('.text-ddldb').length && $('#markedAsSold').is(":visible")) {
        $('#markedAsSold').hide();
    }

    // --------------đăng bán lại
    if (!$target.closest('.box-check').length && !$target.closest('.btn-dbl').length && !$target.closest('.resell_con').length && $('#popup_resell_over').is(":visible")) {
        $('#popup_resell_over').hide();
    }
});

// img edit
function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector('#img-ava-edit').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
$('.fake-img-edit').click(function () {
    $('#img_ava_edit').click();
});
// ------------------

$('.text-gt').click(function () {
    var id_tin = $(this).attr("data");
    var ghim_tin = '/ghim-tin-' + id_tin + '.html';
    var day_tin = '/day-tin-' + id_tin + '.html';
    $(".dich_vu").find(".btn_ghimtin").attr('href', ghim_tin);
    $(".dich_vu").find(".btn_daytin").attr('href', day_tin);
    $('.dich_vu').show();
});

$('.resell_con').click(function () {
    $('.popup_resell').fadeIn();
});


// ĐÃ BÁN
$('.btn_ddldb').click(function () {
    var dtdd = $(this).attr('data');
    $('.modalmarkedAsSold .dongy_tindd').attr("data", dtdd);
    $('.dban_lai').show();
});

$(".huy_ddau_ban, .dong_ddau").click(function () {
    $(".modalmarkedAsSold").hide();
    $(".popup_resell").hide();
});

// ĐĂNG BÁN LẠI
$('.btn-dbl').click(function () {
    var dtd1 = $(this).attr('data');
    var type = $(this).attr('data-update');
    $('.popup_resell .clickdangbanlai').attr("data", dtd1);
    $('.popup_resell .clickdangbanlai').attr("data-update", type);
    $('.popup_resell').show();
});

$(".menu-btn-dbl").click(function () {
    $(this).next().toggle();
});

$(".dong_ymua").click(function () {
    var new_id = $(this).attr("data");
    var so_ngay = $('.so').val();
    var type_ut = $(this).attr("data1");
    var gio_arr = [];
    $(".khoi_chon_daytin .time_pin").each(function () {
        if ($(this).is(":checked")) {
            var gio = $(this).attr("data");
            gio_arr.push(gio);
        }
    });
    var tien_ttoan = $(".money-payment").find("span").text();
    var gio_bdau = $(".batdau_tgiant").attr("data");
    var ngay_bdau = $(".batdau_tgiant").attr("data1");

    $.ajax({
        url: '/ajax/day_tindang.php',
        type: 'POST',
        data: {
            new_id: new_id,
            gio_arr: gio_arr,
            tien_ttoan: tien_ttoan,
            so_ngay: so_ngay,
            gio_bdau: gio_bdau,
            ngay_bdau: ngay_bdau,
        },
        success: function (data) {
            if (data == "") {
                alert("Bạn ghim tin thành công");
                if (type_ut == 1) {
                    window.location.href = '/ho-so-nguoi-ban-ca-nhan/quan-ly-tin.html';
                } else {
                    window.location.href = '/ho-so-quan-ly-tin-ban.html';
                }
            } else {
                alert(data);
            }
        }
    })
});
