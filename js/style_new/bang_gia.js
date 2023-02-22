$('.select2_min').select2({
    width: '100%'
});

var tk = 'acb';
$.ajax({
    url: '/render/tk_nganhang.php',
    type: 'POST',
    data: {
        tk: tk,
        type: type,
    },
    success: function (data) {
        $(".main_acb").addClass("active_bg_bank");
        $(".thanhtoan_buoc1_info_sub").html(data);
    }
});

function thaydoi_tknh(id,type=1) {
    var tk = $(id).attr("data");
    $.ajax({
        url: '/render/tk_nganhang.php',
        type: 'POST',
        data: {
            tk: tk,
            type: type,
        },
        success: function (data) {
            $(".main_bggt_thanhtoan_buoc1_box_sub").removeClass("active_bg_bank");
            $(id).addClass("active_bg_bank");
            $(".thanhtoan_buoc1_info_sub").html(data);
        }
    })
};

$(".demo").click(function () {
    if ($(this).prop("checked")) {
        $('.noidung_table_tr_pd').removeClass('active');
        $(this).parents('.noidung_table_tr_pd').addClass('active');
    }
});
// bang gia ghim tin dang
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

$(".dvbg_ghim_main_ngay-cong").click(function () {
    var ngay_ghim = $(this).parents(".dvbg_ghim_main_ngay-click").find(".ngay_ghim").val();
    var them_ngay = 0;
    them_ngay = ++ngay_ghim;
    $(this).parents(".dvbg_ghim_main_ngay-click").find(".ngay_ghim").val(them_ngay);
    var dich_vu = $(this).parents(".dvbg_ghim_main_ngay-click").attr("data");
    var noi_luu = '#giaday_' + dich_vu;
    if (dich_vu == 1) {
        var gia_tien = 18000;
    } else if (dich_vu == 2) {
        var gia_tien = 15000;
    } else if (dich_vu == 3) {
        var gia_tien = 8000;
    } else if (dich_vu == 4) {
        var gia_tien = 10000;
    } else if (dich_vu == 5) {
        var gia_tien = 5000;
    };

    var tong_tien = Number(them_ngay) * 100000;
    $(noi_luu).html(addCommas(tong_tien));
});

$(".dvbg_ghim_main_ngay-tru").click(function () {
    var ngay_ghim = $(this).parents(".dvbg_ghim_main_ngay-click").find(".ngay_ghim").val();
    var tru_ngay = 1;
    if (ngay_ghim == 1) {
        tru_ngay = 1;
    } else if (ngay_ghim > 1) {
        tru_ngay = --ngay_ghim;
    }
    $(this).parents(".dvbg_ghim_main_ngay-click").find(".ngay_ghim").val(tru_ngay);
    var dich_vu = $(this).parents(".dvbg_ghim_main_ngay-click").attr("data");
    var noi_luu = '#giaday_' + dich_vu;
    if (dich_vu == 1) {
        var gia_tien = 18000;
    } else if (dich_vu == 2) {
        var gia_tien = 15000;
    } else if (dich_vu == 3) {
        var gia_tien = 8000;
    } else if (dich_vu == 4) {
        var gia_tien = 10000;
    } else if (dich_vu == 5) {
        var gia_tien = 5000;
    };
    var tong_tien = Number(tru_ngay) * 100000;
    $(noi_luu).html(addCommas(tong_tien));
});

function ngay_dien(id) {
    format_gtri(id);
    var ngay_ghim = $(id).val();
    if (ngay_ghim < 0) {
        ngay_ghim = 1;
        $(id).val(ngay_ghim);
    }
    var dich_vu = $(id).parents(".dvbg_ghim_main_ngay-click").attr("data");
    var noi_luu = '#giaday_' + dich_vu;
    var tong_tien = Number(ngay_ghim) * 100000;
    $(noi_luu).html(addCommas(tong_tien));

}