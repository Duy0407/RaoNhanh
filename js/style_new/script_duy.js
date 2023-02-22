$(".user_manager .anh_taikhoan").click(function () {
    $(this).parents(".user_manager").find(".popup_user_sdn").toggle(500);
});

$(".clk_shpopup").click(function () {
    $(this).parents(".qly_tintc").find(".quanly_tin").toggle();
});

function click_search(th) {
    var name = $(th).attr('data-name');
    $('.nd_box_key').addClass('d_none');
    $('.key_search').val(name);
    $('#cate_search').val("0").trigger('change');
}
function click_search2(el) {
    var tkhoa = $(el).attr("data-name");
    var phan_biet = 2;
    $(".key_search").val(tkhoa);
    $(".tkiem_pbiet_mb").val(phan_biet);
    $(".btn_timkiem ").click();
}
function hidden_search() {
    $('.nd_box_key').addClass('d_none');
}
$('#city_search ,#cate_search').select2();
// hien thi popup thong bao tablet mobile
$(".btn_thongbao").click(function () {
    $(".thongbao_popup").show();
});
// dong popup thong bao tablet mobile
$(".close_btn_tbao").click(function () {
    $(".thongbao_popup").hide();
});
// show Đăng kí đăng nhập 1024
$('.icon_us_show1024').click(function () {
    $('.df_them_div_bao_a').toggleClass('hide_1023');
})
// show thông báo
$('.box_login_da_dn_tb').click(function(){
    // $('.box-notification').show();
    $('.box-notification').toggleClass('d_none');
})
// SHOW popup user
$('.box_login_da_dn_img').click(function () {
    $('.popup_user_sdn').toggleClass('d_none');
});

//SHOW menu 3 gạch 1024
$('.icon_menu_if').click(function () {
    $('.nav-menu-tab').toggleClass('hide_1023');
})

// SHOW TÌM KIẾM CON
$('.key_search').click(function () {
    $('.nd_box_key').removeClass('d_none');
});
// CLOSE TÌM KIẾM CON
$('.icon_X').click(function () {
    $('.nd_box_key').addClass('d_none');
})

// CLICK TIỆN ÍCH
$('.nav-utiliti').click(function () {
    $('.nav-utiliti_icon').toggleClass('d_rotate');
    $('.nav-utiliti_text').toggleClass('cl_ti');
    $('.sub_menu_ul').toggleClass('d_none');
})

function click_color(cl_color) {
    $('.menubar_block1_img').removeClass('menubar_color');
    $('.menubar_block1_tex').removeClass('menubar_color');
    $(cl_color).addClass('menubar_color');
};

$('.md_tinh_tp ,.md_quan_huyen, .md_phuong_xa').select2();

$(".td_ttin_diachi").click(function () {
    // $(".hd_modal_dia_chi .modal_p_header").html("Địa chỉ");
    $(".hd_modal_dia_chi .xacnhan_dc").attr("onclick", "md_dia_chi()");
    $("[name=md_so_nha]").val($(this).data('sn'));
    $("[name=thanhpho]").attr('onchange', 'tinh_tp_a(this)');
    $("[name=quanhuyen]").attr('onchange', 'quan_huyen_a(this)');
    if ($(this).data('tt') > 0){
        $("[name=thanhpho]").val($(this).data('tt')).trigger('change');
    }else{
        $("[name=thanhpho]").val('').trigger('change');
    }
    if ($(this).data('qh') > 0){
        $("[name=quanhuyen]").val($(this).data('qh')).trigger('change');
    }else{
        $("[name=quanhuyen]").val('').trigger('change');
    }
    if ($(this).data('px') > 0){
        $("[name=phuongxa]").val($(this).data('px')).trigger('change');
    }else{
        $("[name=phuongxa]").val('').trigger('change');
    }
    $(".hd_modal_dia_chi").show();
});
$(".td_ttin_khu_vuc").click(function () {
    $(".hd_modal_Khu_vuc").show();
});
$(".diadiem_lamviec").click(function () {
    // $(".hd_modal_dia_chi .modal_p_header").html("Địa chỉ làm việc");
    $(".hd_modal_dia_chi .xacnhan_dc").attr("onclick", "md_dia_chi($('[name=td_diachi_lamviec]'))");
    $("[name=md_so_nha]").val($(this).data('sn'));
    $("[name=thanhpho]").attr('onchange', 'tinh_tp_a(this)');
    $("[name=quanhuyen]").attr('onchange', 'quan_huyen_a(this)');
    if ($(this).data('tt') > 0){
        $("[name=thanhpho]").val($(this).data('tt')).trigger('change');
    }else{
        $("[name=thanhpho]").val('').trigger('change');
    }
    if ($(this).data('qh') > 0){
        $("[name=quanhuyen]").val($(this).data('qh')).trigger('change');
    }else{
        $("[name=quanhuyen]").val('').trigger('change');
    }
    if ($(this).data('px') > 0){
        $("[name=phuongxa]").val($(this).data('px')).trigger('change');
    }else{
        $("[name=phuongxa]").val('').trigger('change');
    }
    $(".hd_modal_dia_chi").show();
});

$("[data-dimiss=modal]").click(function () {
    $(this).parents(".modal").hide();
});

function yeu_thich(id) {

    var new_id = $(id).attr('data');
    $.ajax({
        type: 'POST',
        url: '/ajax/tinyeuthich.php',
        data: {
            new_id: new_id,
        },
        success: function (data) {
            console.log(data);
            if (data == 1) {
                $('.khoi_thongbao_no_ythich').show();
                setTimeout(() => {
                    $(".khoi_thongbao_no_ythich").hide();
                    // window.location.reload();
                }, 2000);
            } else if (data == 2) {
                $('.khoi_thongbao').show();
                setTimeout(() => {
                    $(".khoi_thongbao").hide();
                    // window.location.reload();
                }, 2000);
            }
        }
    })
}
// long
var n_tt = n_qh = n_px = n_sn = n_tt_lv = n_qh_lv = n_px_lv = n_sn_lv = 0;
function lay_tt_ctiet(element = '') {
    var tinh_thanh = $(".md_tinh_tp").val();
    var quan_huyen = $(".md_quan_huyen").val();
    var phuong_xa = $(".md_phuong_xa").val();
    var so_nha = $(".td_snha_dpho").val();

    $.ajax({
        url: '/render/tt_ctiet_ttp.php',
        type: 'POST',
        data: {
            tinh_thanh: tinh_thanh,
            quan_huyen: quan_huyen,
            phuong_xa: phuong_xa,
            so_nha: so_nha,
        },
        success: function (data) {
            if (element == '') {
                $(".td_ttin_diachi").val(data);
                n_tt = tinh_thanh; n_qh = quan_huyen; n_px = phuong_xa; n_sn = so_nha;
                $(".td_ttin_diachi").data('tt', tinh_thanh);
                $(".td_ttin_diachi").data('qh', quan_huyen);
                $(".td_ttin_diachi").data('px', phuong_xa);
                $(".td_ttin_diachi").data('sn', so_nha);
            } else {
                $(element).val(data);
                n_tt_lv = tinh_thanh; n_qh_lv = quan_huyen; n_px_lv = phuong_xa; n_sn_lv = so_nha;
                $(element).data('tt', tinh_thanh);
                $(element).data('qh', quan_huyen);
                $(element).data('px', phuong_xa);
                $(element).data('sn', so_nha);
            }
            $(".hd_modal_dia_chi").hide();
        }
    })
};

function md_dia_chi(element = '') {
    var form_md_diachi = $("#form_md_diachi");
    if (element == "") {
        form_md_diachi.validate({
            errorPlacement: function (error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                thanhpho: "required",
                quanhuyen: "required",
            },
            messages: {
                thanhpho: "Tỉnh/thành phố không được để trống",
                quanhuyen: "Quận/huyện không được để trống",
            },
        });
    } else {
        // console.log(1);
        form_md_diachi.validate({
            errorPlacement: function (error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                thanhpho: "required",
                quanhuyen: "required",
                // phuongxa: "required",
                // md_so_nha: "required",
            },
            messages: {
                thanhpho: "Tỉnh/thành phố không được để trống",
                quanhuyen: "Quận/huyện không được để trống",
                // phuongxa: "Phường/xã không được để trống",
                // md_so_nha: "Số nhà, đường phố không được để trống",
            },
        });
    }

    if (form_md_diachi.valid() === true) {
        lay_tt_ctiet(element);
    }
}

function tinh_tp(id, qh = 0) {
    var tinh_tp = $(id).val();
    $.ajax({
        url: '/render/ds_quan_huyen.php',
        type: 'POST',
        data: {
            tinh_tp: tinh_tp,
        },
        success: function (data) {
            $(".md_quan_huyen").html(data);
            if (qh != 0) {
                $(".md_quan_huyen").val(qh).trigger('change');
                $(id).attr('onchange', 'tinh_tp(this)');
            }
        }
    })
}

function quan_huyen(id, px = 0) {
    var quan_huyen = $(id).val();
    $.ajax({
        url: '/render/ds_phuong_xa.php',
        type: 'POST',
        data: {
            quan_huyen: quan_huyen,
        },
        success: function (data) {
            $(".md_phuong_xa").html(data);
            if (px != 0) {
                $(".md_phuong_xa").val(px).trigger('change');
                $(id).attr('onchange', 'quan_huyen(this)');
            }
        }
    })
}

function tinh_tp_a(id) {
    var tinh_tp = $(id).val();
    $.ajax({
        url: '/render/ds_quan_huyen.php',
        async: false,
        type: 'POST',
        data: {
            tinh_tp: tinh_tp,
        },
        success: function (data) {
            $(".md_quan_huyen").html(data);
            $(id).parents(".modal_sel").find(".kv_quanhuyen").html(data);
        }
    })
}

function quan_huyen_a(id) {
    var quan_huyen = $(id).val();
    $.ajax({
        url: '/render/ds_phuong_xa.php',
        async: false,
        type: 'POST',
        data: {
            quan_huyen: quan_huyen,
        },
        success: function (data) {
            $(".md_phuong_xa").html(data);
            $(id).parents(".modal_sel").find(".kv_phuongxa").html(data);
        }
    })
}

//chien
function md_khu_vuc() {
    var form_md_khu_vuc = $("#form_md_khu_vuc");
    form_md_khu_vuc.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            kv_thanhpho: "required",
            kv_quanhuyen: "required",
            kv_phuongxa: "required",
            kv_so_nha: "required",
        },
        messages: {
            kv_thanhpho: "Tỉnh/thành phố không được để trống",
            kv_quanhuyen: "Quận/huyện không được để trống",
            kv_phuongxa: "Phường/xã không được để trống",
            kv_so_nha: "Số nhà không được để trống",
        },
    });
    if (form_md_khu_vuc.valid() === true) {
        var tinh_thanh1 = $(".kv_thanhpho").val();
        var quan_huyen1 = $(".kv_quanhuyen").val();
        var phuong_xa1 = $(".kv_phuongxa").val();
        var kv_so_nha = $(".kv_so_nha").val();
        $.ajax({
            url: '/ajax/tt_Khuvuc.php',
            type: 'POST',
            data: {
                tinh_thanh1: tinh_thanh1,
                quan_huyen1: quan_huyen1,
                phuong_xa1: phuong_xa1,
                kv_so_nha: kv_so_nha,
            },
            success: function (data) {
                $(".diadiem_nhanhs").val(data);
                $(".hd_modal_Khu_vuc").hide();
            }
        })
    }
}

function appen_khuvuc() {
    var tinh_thanh1 = $(".tinhthanh").val();
    var quan_huyen1 = $(".quanhuyen").val();
    var phuong_xa1 = $(".phuongxa").val();
    $.ajax({
        url: '/ajax/tt_Khuvuc.php',
        type: 'POST',
        data: {
            tinh_thanh1: tinh_thanh1,
            quan_huyen1: quan_huyen1,
            phuong_xa1: phuong_xa1,
        },
        success: function (data) {
            $(".td_ttin_khu_vuc").val(data);
            $(".hd_modal_Khu_vuc").hide();
            // console.log(data);
        }
    })
};

function format_gtri(id) {
    var gia_tri = $(id).val();
    $.ajax({
        url: '/render/format_giatri.php',
        type: 'POST',
        data: {
            gia_tri: gia_tri,
        },
        success: function (data) {
            $(id).val(data);
        }
    })
}

// 
function format_gtri_dc(id) {
    var gia_tri = $(id).val();
    gia_tri = gia_tri.replace(';',',');
    $(id).val(gia_tri);
}

function showHidePass(e) {
    var urlImg = $(e).attr('src');
    if (urlImg == "../images/newImages/icon_show_eye.svg") {
        $(e).attr('src', '../images/newImages/icon_hide_eye.svg');
        $(e).closest("div").find('input').attr('type', 'password');
    } else {
        $(e).attr('src', '../images/newImages/icon_show_eye.svg');
        $(e).closest("div").find('input').attr('type', 'text');
    }
}

function rf_select2() {
    $('.slect-hang').select2();
}

function hang_doi(id) {
    var id_hang = $(id).val();
    var id_dm = $(id).attr("data");
    $.ajax({
        url: '/render/hang_dong.php',
        type: 'POST',
        data: {
            id_dm: id_dm,
            id_hang: id_hang,
        },
        success: function (data) {
            $(".dong_doi").html(data);
            rf_select2();
        }
    })
}

function tbao_dtin_tcong() {
    var tbao = "Bạn đã đăng tin thành công!";
    $(".tbao_tcong_d .cau_tbao").text(tbao);
    $(".tbao_tcong_d").show();
    $(".luu_chung").click(function () {
        if ($(this).attr('data') == 5){
            window.location = "/ho-so-quan-ly-tin-ban.html";
        }else{
            window.location = "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin.html";
        }
    });
}

function tbao_csdtin_tcong() {
    var tbao1 = "Bạn đã chỉnh sửa đăng tin thành công!";
    $(".tbao_tcong_d .cau_tbao").text(tbao1);
    $(".tbao_tcong_d").show();
    $(".luu_chung").click(function () {
        if ($(this).attr('data') == 5){
            window.location = "/ho-so-quan-ly-tin-ban.html";
        }else{
            window.location = "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin.html";
        }
    });
}

// thay doi chi tiet danh muc theo loai san pham
function tags_tdoi(id) {
    var id_dm = $(".dmuc-spham").attr("data");
    var id_tt = $(id).val();
    $.ajax({
        url: '/render/ctiet_dmuc.php',
        type: 'POST',
        data: {
            id_dm: id_dm,
            id_tt: id_tt,
        },
        success: function (data) {
            $(".ctiet_danhmuc").html(data);
            rf_select2();
        }
    })
}

function tags_doi(id) {
    var id_dm = $(id).attr("data");
    var td_loai = $(id).val();
    $.ajax({
        url: "/render/select_delivery.php",
        method: 'POST',
        data: {
            id_lkp: td_loai,
            id_dm: id_dm
        },
        success: function (data) {
            $('.tags_doi').html(data);
            rf_select2();
        }
    });
}

$('.slect-hang').select2();

$(document).on('change', 'select', function () {
    $(this).parents(".box_input_infor").find("span.error label.error").hide();
});

$.validator.addMethod("gianguoimua",
    function () {
        var gia_bd = $("input[name='gia_mongmuon1']").val();
        gia_bd = gia_bd.replace(/\,/g, '');
        var gia_kt = $("input[name='gia_mongmuon2']").val();
        gia_kt = gia_kt.replace(/\,/g, '');
        return (parseInt(gia_bd) < parseInt(gia_kt));
    });



function dang_nhaptk(id) {
    var _this = $(id);
    var loginFrom = $("#loginForm_dn");
    loginFrom.validate({
        rules: {
            user: {
                required: true,
            },
            Password5: {
                required: true,
            },
        },
        messages: {
            user: {
                required: "Số điện thoại / email không được để trống",
            },
            Password5: {
                required: 'Mật khẩu không được để trống',
            },
        },
    });
    if (loginFrom.valid() === true) {
        var taikhoan = $(".input_acc").val();
        var matkhau = $(".input_pass").val();
        $.ajax({
            url: '/ajax/dang_nhap.php',
            type: 'POST',
            data: {
                taikhoan: taikhoan,
                matkhau: matkhau,
            },
            success: function (data) {
                var obj = JSON.parse(data);
                if (obj.result == false) {
                    _this.parents(".overlay_dn").find(".error_sai").text(obj.error['message']);
                } else if (obj.result == true) {
                    window.location.reload();
                }
            }
        })
    }
}


function cli_an(id) {
    $(id).parents(".overlay_dn").find(".error_sai").text('');
}
// chỉnh sửa bình luận trang tổng quan
function cs_trloibl(id) {
    var bl_id = $(id).attr("data");
    var noi_dung = $(id).parents(".binhluan_motlan").find(".text-phan-hoi").val();
    $.ajax({
        url: '/ajax/csua_trloi_bl.php',
        type: 'POST',
        data: {
            bl_id: bl_id,
            noi_dung: noi_dung,
        },
        success: function (data) {
            if (data == "") {
                alert("Chỉnh sửa bình luận thành công");
                window.location.reload();
            } else {
                alert(data);
            }
        }
    })
}
// đóng chỉnh sửa bình luận trang tổng quan
function close_csb(id) {
    $(id).parents(".bluan_csua_tk").find(".binhluan_motlan").remove();
};

$(".ctin_mbam").click(function () {
    $(this).parents('.chia_muaban').find(".chiatin_muaban").toggleClass("active");
});
// autocomplete_tag = localStorage.getItem("list_tag").split(",");
autocomplete(document.getElementById("keyword"), list_tag, "key_lq");
function autocomplete(inp, arr, append) {
    var currentFocus;
    inp.addEventListener("input", function (e) {
        var a, b, i, val = this.value;
        closeAllLists();
        if (!val) { return false; }
        currentFocus = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "autocomplete-list");
        a.setAttribute("class", "autocomplete-items-tag");
        $('#' + append).append(a);
        for (i = 0; i < arr.length; i++) {
            for (j = 0; j < arr[i].length; j++) {
                if (arr[i].substr(j, val.length).toUpperCase() == val.toUpperCase()) {
                    b = document.createElement("DIV");
                    b.setAttribute("class", "key_tag");
                    b.innerHTML = arr[i];
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    b.addEventListener("click", function (e) {
                        inp.value = this.getElementsByTagName("input")[0].value;
                        closeAllLists();
                        // document.getElementById('box_search_key').style.display = "none";
                        // open_box('box_search_city');
                    });
                    a.appendChild(b);
                    break;
                }
            }
        }
    });
    inp.addEventListener("keydown", function (e) {
        var x = document.getElementById(this.id + "autocomplete-list");

        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            currentFocus++;
            addActive(x);
        } else if (e.keyCode == 38) {
            currentFocus--;
            addActive(x);
        } else if (e.keyCode == 13) {
            e.preventDefault();
            $('#btn_search').click();
            if (currentFocus > -1) {
                if (x) x[currentFocus].click();
            }
        }
    });
    function addActive(x) {
        if (!x) return false;
        removeActive(x);
        if (currentFocus >= x.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (x.length - 1);
        x[currentFocus].classList.add("autocomplete-active");
        inp.value = x[currentFocus].textContent;
    }
    function removeActive(x) {
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("autocomplete-active");
        }
    }
    function closeAllLists(elmnt) {
        var x = document.getElementsByClassName("autocomplete-items-tag");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
    });
}

function xac_nhan_bh(id) {
    var id_dh = $(id).attr("data");
    var tthai = $(id).attr("data1");
    $.ajax({
        url: '/ajax/xac_nhan_bhang.php',
        type: 'POST',
        data: {
            id_dh: id_dh,
            tthai: tthai,
        },
        success: function (data) {
            if (data == "") {
                if (tthai == 1) {
                    window.location.href = "/quan-ly-don-hang-dang-xu-ly.html";
                } else if (tthai == 2) {
                    window.location.href = "/quan-ly-don-hang-dang-giao.html";
                } else if (tthai == 3) {
                    window.location.href = "/quan-ly-don-hang-da-giao.html";
                } else if (tthai == 4) {
                    window.location.href = "/quan-ly-don-hang-hoan-tat.html";
                }
            } else {
                alert(data);
            }
        }
    })
}


function huy_donhang(id) {
    var id_dh = $(id).attr("data");
    var huy = $("input[name='huydonhang']:checked").val();
    if (huy == 3) {
        var text_huy = $("#modal-huydon .input-huydon").val();
    } else {
        var text_huy = $("input[name='huydonhang']:checked").parents(".huydon-content-1").find("p").text();
    };

    $.ajax({
        url: '/ajax/huy_donhang.php',
        type: 'POST',
        data: {
            id_dh: id_dh,
            huy_dh: text_huy,
        },
        success: function (data) {
            if (data == "") {
                $("#modal_dathang").show();
            } else {
                alert(data);
            }
        }
    })
}

function lydo_khac(id) {
    var idd = $(id).val();
    if (idd == 3) {
        $(id).parents("#modal-huydon").find(".lydo_khac").removeClass('d_none');
    } else {
        $(id).parents("#modal-huydon").find(".lydo_khac").addClass('d_none');
    }
}

$(".n_khoi_list_thongtin").click(function () {
    $(this).next('.n_drop_content').toggleClass('d_none');
});

$("#pinNew1 .img_close").click(function () {
    $("#pinNew1").hide();
});

function clk_ddan_dlich(id_dm) {
    var id = $(id_dm).attr("data");
    var pbiet = $(id_dm).attr("data1");
    if (pbiet == 2) {
        if (id == 19) {
            window.location.href = '/dang-tin-ship.html';
        } else if (id == 24) {
            window.location.href = '/dang-tin-khuyen-mai-giam-gia.html';
        } else if (id == 76) {
            window.location.href = '/dang-tin-du-lich.html';
        }
    } else if (pbiet == 1) {
        window.location.href = '/dang-tin-mua-d' + id + '.html';
    }

}

function dmuc_con_muaban(id_dm) {
    var id = $(id_dm).attr("data");
    var pbiet = $(id_dm).attr("data1");
    $.ajax({
        url: '/render/dtin_dmuc_ban.php',
        type: 'POST',
        data: {
            id: id,
            pbiet: pbiet,
        },
        success: function (data) {
            $(".hd_modal_do_dt .hd_content_curspoint").html(data);
            $(".hd_modal_do_dt").show();
            $(".hd_modal_danhmuc_td").hide();
        }
    })
}

function close_dmuctin() {
    $(".hd_modal_do_dt").hide();
    $(".hd_modal_danhmuc_td").show();
}

// điền
function del_noti(el) {
    var id_nof = $(el).attr("data");
    var nofi = 1;
    $.ajax({
        url: '/ajax/xoa_tbao.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id_nof: id_nof,
            nofi: nofi,
        },
        success: function (data) {
            if (data.result == true) {
                $(el).parents(".noti-one").remove();
            } else if (data.result == false) {
                alert(data.msg);
            }
        }
    })
}

function del_all(el) {
    var id_nof = 2;
    var nofi = 2;
    $.ajax({
        url: '/ajax/xoa_tbao.php',
        type: 'POST',
        dataType: 'json',
        data: {
            id_nof: id_nof,
            nofi: nofi,
        },
        success: function (data) {
            if (data.result == true) {
                $(el).parents(".note_dele_all").hide();
                $(el).parents(".box-notification").find('.notification').addClass('d_none');
                $(el).parents(".box-notification").find('.nothing-here').removeClass('d_none');
            } else if (data.result == false) {
                alert(data.msg);
            }
        }
    })
}

// nhận thông tin
function nhan_ttin(el) {
    var email = $(el).parent(".ft_top_two").find(".input_emd").val();
    $.ajax({
        url: '/ajax/nhan_ttin.php',
        type: 'POST',
        dataType: 'json',
        data: {
            email: email,
        },
        success: function (data) {
            if (data.result == true) {
                alert("Bạn đăng ký nhận thông báo thành công")
                window.location.reload();
            } else if (data.result == false) {
                alert(data.msg);
            }

        }
    })
}