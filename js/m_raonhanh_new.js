
//  m_antin m_hientin_span #m_xn_anhientd

$('.m_anhientin').click(function () {
    var new_id_tin = $(this).attr("data");
    var new_active = $(this).attr("data1");
    if (new_active == 1) {
        $("#m_xn_anhientd .title_antd").text("Ẩn tin đăng");
        $("#m_xn_anhientd .content_hientd").text(" Tin đăng của bạn sẽ bị ẩn khỏi trang chủ,mọi người sẽ không tìm thấy tin đăng của bạn. bạn muốn tiếp tục?");
        $("#m_xn_anhientd .aht_ft_p").text(" Ẩn tin");
    } else {

        $("#m_xn_anhientd .title_antd").text("Hiện tin đăng");
        $("#m_xn_anhientd .content_hientd").text("Tin đăng của bạn sẽ hiện trên trang chủ,mọi người sẽ tìm thấy tin đăng của bạn. bạn muốn tiếp tục?");
        $("#m_xn_anhientd .aht_ft_p").text(" Hiện tin");
    }
    $(".aht_ft_p").attr("data", new_id_tin);
    $(".aht_ft_p").attr("data1", new_active);
    $('#m_xn_anhientd').slideToggle(400);


});
function anhientin(e) {
    var new_id_tin = $(e).attr("data");
    var new_active = $(e).attr("data1");
    $.ajax({
        url: "/ajax/anhientin.php",
        type: "POST",
        data: {
            new_id_tin: new_id_tin,
            new_active: new_active,
        },
        success: function (t) {
            // t la tra ve gia tri tu
            if (t == "") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    })
}
//
$('.m_edit_money').click(function () {
    $('#m_cstinnhanh').slideToggle(400);
})
//
$('#m_cstinnhanh .ctn_cstn_b3close').click(function () {
    $('#m_cstinnhanh').hide();
})
$('#m_cstinnhanh .ctn_cstn_b3update').click(function () {
    $('#m_cstinnhanh').slideToggle(400);
})
//
//
$('.m_amount_qlt_edit').click(function () {
    $('#m_cstinnhanh').slideToggle(400);
})
//
$('#m_cstinnhanh .ctn_cstn_b3close').click(function () {
    $('#m_cstinnhanh').hide();
})
$('#m_cstinnhanh .ctn_cstn_b3update').click(function () {
    $('#m_cstinnhanh').hide();
})
$('#m_xn_anhientd .footer_button_huy ').click(function () {
    $('#m_xn_anhientd').hide();
})
// dang ban lai
function id_dangbanlai(e) {
    $('.popup_resell').slideToggle(400);
    var new_id_tin = $(e).attr("data");
    var new_link_suatin = $(e).attr("data1");
    var xacthuc_lk = $(e).attr("data2");
    $('.clickdangbanlai').attr("data", new_id_tin);
    $('.clickdangbanlai').attr("data1", new_link_suatin);
    $('.clickdangbanlai').attr("data2", xacthuc_lk);
}
$('.m_dangbanlai').click(function () {

})
// cap nhap tin
$('.m_refresh_qltb').click(function () {
    $('#m_capnhaptin').slideToggle(400);
    var id_tin = $(this).attr("data");
    $('#m_capnhaptin .cnt_ft_p_dongy').attr("data", id_tin);
})
$('#m_capnhaptin .footer_button_cnthuy').click(function () {
    $('#m_capnhaptin').slideToggle(400);
})
function capnhaptin(e) {
    var new_id = $(e).attr("data");
    $.ajax({
        url: "/ajax/capnhaplaitin.php",
        type: "POST",
        data: {
            new_id_cn: new_id,
        },
        success: function (t) {
            console.log(t);
            if (t == "") {
                window.location.reload();
            } else {
                alert(t);
            }
        }
    });
}
// da ban
$('#m_news_posting .m_daban_cxtlk').click(function () {
    var id_new = $(this).attr("data");
    var id_daban = $(this).attr("data1");
    $('.click_dongyban').attr("data", id_new);
    $('.click_dongyban').attr("data1", id_daban);
    $('#danhdaudaban').slideToggle(400);
})
// -------------------------------------------------------------------Đăng tin---------------------------------------------------------------------
$('.slect-hang').select2();
function checked_input(e) {
    $(e).parent().find("label p").removeClass("active_mb_ct");
    $(e).find('p').addClass("active_mb_ct");
}
$(".donvi_ban").select2({
    minimumResultsForSearch: Infinity,
    tags: true,
});

$(".dientichdat").select2({
    minimumResultsForSearch: Infinity,
    tags: true,
});
$('.ctn_ct_b1_fr2').click(function () {
    $('.hd_modal_danhmuc_td').slideToggle(400);
})

// -----------------------------------------dang anh dang tin------------------------------------------------------------------------------------------
var m_add_anhdt = $('.ctn_ct_b2_media .b2_fr_media').attr("data");
// sau khi lay duoc anh ra thi tao 2 mang 1 mang chua anh va 1 mang chua duong dan anh(src)
var m_arr_anh = [];
var m_arr_src = [];
// tao 1 bien dem so anh
var k = 0;
// dong bo hoa function
async function uploadImg(m_e) {
    // up load file
    var file_data = $(m_e)[0].files;
    var x = 0;
    // tao 1 mang chua cac dinh dang duoi anh de sau xet duyet;
    var dinhdang_anh = ['image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG'];
    var ah = 0;
    $(".m_anh_dangtin_chung").each(function () {
        var id = $(this).attr("data");
        // cu moi 1 lan lay ra thi ah se bang data anh cong them 1
        ah += id++;
    });
    // format ah ve dang so
    // neu ma ah + so file anh ma lon hon 11 thi thong bao qua 10 anh
    if ((Number(ah) + Number(file_data.length)) < 11) {
        // tao 1 vong lap va 1 bien dem i nho hon so file
        for (var i = 0; i < Number(file_data.length); i++) {
            x++;
            // tao ra bien file chua file anh thu i
            var file = file_data[i];
            // tao bien file_size chua kich thuoc cua file anh thu i
            var file_size = file.size;
            // tao bien file_type chua dinh dang anh cua file anh thu i
            var file_type = file.type;
            // chuyen kich thuoc cua anh tu byte ve mb va lay 2 gia tri sau dau ,
            var convert_file_size = (file_size / (1024 * 1024)).toFixed(2);
            // inArray giong voi array nhung inArray tra ket qua la -1 hoac khac -1
            if ($.inArray(file_type, dinhdang_anh) != -1) {
                // neu ma kich thuoc cua anh nho hon 2 mb thi bat chon lai anh
                if (convert_file_size <= 2) {
                    // lay ra duong dan cua anh tu file (= file_data[i]) anh thu i
                    var image = new Image();
                    image.src = URL.createObjectURL(file);
                    // ket thuc dong bo hoa
                    await image.decode();
                    // neu with, height cua anh ma nho hon 300 thi bat chon lai anh
                    if (image.width >= 300 && image.height >= 300) {
                        //
                        m_arr_anh.push(file);
                        m_arr_src.push(URL.createObjectURL(file));
                        var html =
                            `
                        <div class="b2_fr_picture_show">
                            <img src="`+ URL.createObjectURL(file) + `" class="m_anh_dangtin_file m_anh_dangtin_chung" data='1' alt="">
                            <span class='delete-file-upload'><img src="/images/img_new/exp_del_avt.png" onclick='xoa_del_anh(this)' data='`+ (k++) + `' /></span
                        </div>
                        `
                        $('.b2_fr_picture_content').append(html);
                        $('.before_upload_picture').hide();
                        $('.after_upload_picture').show();
                        $('.container_b2_fr_media').addClass("active_anhdd");
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
        alert("Tổng số ảnh không được vượt quá 10")
    }

}
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
        jQuery('.b2_fr_picture_content').append(_html);
        jQuery('.b2_fr_picture_content li').last().find('input[type="file"]').click();
        i++;
    } else {
        jQuery('.b2_fr_picture_content li').last().find('input[type="file"]').click();
    }
});


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
}
function anh_dachon(id) {
    var so_chon = Number($(id).find('span').text());
    var ah = 0;
    $(".m_anh_dangtin_chung").each(function () {
        var id = $(this).attr("data");
        ah += id++;
    });

    if (so_chon + Number(ah) < 11) {
        for (var j = 0; j < arr_new.length; j++) {
            var html =
                ` <div class="b2_fr_picture_show">
                    <span class="close xoa_bocu" onclick="del_img_anh(this)"><img src="/images/img_new/exp_del_avt.png" alt="close this image" /></span>
                    <img src="`+ arr_new[j] + `" onerror="this.closest('div').remove();" class="m_anh_dangtin m_anh_dangtin_chung" data='1' alt="ảnh tin đăng">
                </div>`
            $('.b2_fr_picture_content').append(html);
            $('.before_upload_picture').hide();
            $('.after_upload_picture').show();
            $('.container_b2_fr_media').addClass("active_anhdd");
        }
    } else {
        alert("Tổng số ảnh bạn chọn đã quá 10 ảnh");
    }
    arr_new = [];
    $(id).find("span").text(0);
    $(".popup_anh_dadang").hide();
}
// xoa file trong mang
function xoa_del_anh(id) {
    var id_x = $(id).attr("data");
    m_arr_anh[id_x] = 'undefined';
    m_arr_src[id_x] = 'undefined';
    $(id).parents('.b2_fr_picture_show').remove();

};
$(".xoa_bocu").click(function () {
    var bcu = 1;
    var dv = Number($(".after_upload_picture").attr("data")) - Number(bcu);
    $(".after_upload_picture").attr(dv)
});
function del_img_anh(el) {
    $(el).parents('.b2_fr_picture_show').remove();
};

// upload video
$(".video-upload-after").click(function () {
    $("#cl-upload-video-file").click();
    return false;
});
function upload_video(event) {
    let file = $(event).prop('files')[0];
    var rong = '';
    if (file == undefined) {
        $(".avt_xoavideo").hide();
        $("video.continue_upload_video").attr("src", "");
        $("#video_chon").addClass('d_none');
        $(event).val(rong);
    } else {
        let size = file.size;
        let filesize = (size / (1024 * 1024)).toFixed(2);
        if (filesize <= 20) {
            let blobURL = URL.createObjectURL(file);
            document.querySelector('#video_chon').classList.remove('d_none');
            document.querySelector("video").src = blobURL;
            $('.after-upload-video').show();
            $(".avt_xoavideo").attr("data", "");
            $(".avt_xoavideo").show();
            $('.dang-tin-video').hide();
            $('.m_dang_video').addClass("active_anhdd");
        } else {
            alert("Dung lượng video phải nhỏ hơn 20Mb");
            $(event).val(rong);
        }
    }
}
$(".close_vdeo").click(function () {
    $(this).parents(".avt_xoavideo").attr("data", "");
    $(this).parents(".avt_xoavideo").children("video.continue_upload_video").attr("src", "");
    $(this).parents(".avt_xoavideo").hide();
    $("#cl-upload-video-file").val('');
    $('.m_dang_video').removeClass("active_anhdd");
});

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
// ---------------------------------------------------------------------xe cộ------------------------------------------------------------------
// đếm kí tự + date picker
// $(".b6_fr2_input").datepicker({
//     showButtonPanel: true
// });
// dem so ki tu trong textarea
function textCounter(e, cnt) {
    var id_input_dem = document.getElementById(cnt);
    id_input_dem.value = e.value.length;
}
// 
function dem_kitu(m) {
    var so_kt = m.value.length;
    $(m).parent().find('.count_kitu').attr("value", so_kt);
}
//
$('.xc_themdiachi_fr').click(function () {
    var count_dc = $('.ctn_ct_b9_fr4').length;
    count_dc++;
    var html = `<div class="ctn_ct_b9_fr4 d_flex fl_cl w100 box_input_infor">
                <p class="b9_fr4_title p_400_s15_l18 w100">Địa chỉ <span class='one_stt'>`+ count_dc + `</span></p>
                <input name="td_dia_chi" onkeyup="format_gtri_dc(this)" type="text" class="b9_fr4_input m_diachi_xc p_400_s14_l17" placeholder="Nhập địa chỉ" autocomplete="off">
                <img src="/images/m_raonhanh_imgnew/delete_dc.svg" alt="" class="m_delete_dc cursor_Pt img26" onclick="xoa_diachi(this)">
            </div>`
    $('.xc_box_diachi').append(html);
})

function m_hang_doi(id) {
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
            $(".m_dongxe").html(data);
            rf_select2();
        }
    })
}
// -------------------------m_dangtin_bds_nhadat----------------------------------
$("#m_dangtin_bds_nhadat .b1_fr3_ip2").click(function () {

    if (($(this).is(":checked"))) {
        $('#m_dangtin_bds_nhadat .b3_fr2_datcoc').show();
        $('#m_dangtin_bds_nhadat .b3_fr2_gia').addClass('active_gia');
    }
})

$("#m_dangtin_bds_nhadat .b1_fr3_ip1").click(function () {

    if ($(this).is(":checked")) {
        $('#m_dangtin_bds_nhadat .b3_fr2_datcoc').hide();
        $('#m_dangtin_bds_nhadat .b3_fr2_gia').removeClass('active_gia');
    }
})
// -------------------------m_dangtin_bds_nhatrongngo----------------------------------
$("#m_dangtin_bds_nhatrongngo .b1_fr3_ip2").click(function () {

    if (($(this).is(":checked"))) {
        $('#m_dangtin_bds_nhatrongngo .b3_fr2_datcoc').show();
        $('#m_dangtin_bds_nhatrongngo .b3_fr2_gia').addClass('active_gia');
    }
})

$("#m_dangtin_bds_nhatrongngo .b1_fr3_ip1").click(function () {

    if ($(this).is(":checked")) {
        $('#m_dangtin_bds_nhatrongngo .b3_fr2_datcoc').hide();
        $('#m_dangtin_bds_nhatrongngo .b3_fr2_gia').removeClass('active_gia');
    }
})
// -------------------------m_dangtin_bds_nhamatpho----------------------------------
$("#m_dangtin_bds_nhamatpho .b1_fr3_ip2").click(function () {

    if (($(this).is(":checked"))) {
        $('#m_dangtin_bds_nhamatpho .b3_fr2_datcoc').show();
        $('#m_dangtin_bds_nhamatpho .b3_fr2_gia').addClass('active_gia');
    }
})

$("#m_dangtin_bds_nhamatpho .b1_fr3_ip1").click(function () {

    if ($(this).is(":checked")) {
        $('#m_dangtin_bds_nhamatpho .b3_fr2_datcoc').hide();
        $('#m_dangtin_bds_nhamatpho .b3_fr2_gia').removeClass('active_gia');
    }
})
function m_dangtin(e) {
    // $(e).click(function(){
    $('.b11_btn_dangtin').click();
    $('.b11_btn_chinhsua').click();
    // })
}
//click vào liên hệ người bán thì ô nhập tiền disabled
$('.m_lienhenguoiban_cb').click(function () {
    if ($('.m_lienhenguoiban_cb').prop('checked')) {
        var rong = '';
        $('.b3_fr2_gia_container .b3_fr2_gia_input').val(rong);
        $('.b3_fr2_gia_container .b3_fr2_gia_input').prop('disabled', true);
        $('.box_lhhg_ctmp .m_chotangmienphi_cb').prop('checked', false);
    }
    else {
        $('.b3_fr2_gia_container .b3_fr2_gia_input').prop('disabled', false);

    }
});
$('.m_chotangmienphi_cb').click(function () {
    if ($('.m_chotangmienphi_cb').prop('checked')) {
        var rong = '';
        $('.b3_fr2_gia_container .b3_fr2_gia_input').val(rong);
        $('.b3_fr2_gia_container .b3_fr2_gia_input').prop('disabled', true);
        $('.box_lhhg_ctmp .m_lienhenguoiban_cb').prop('checked', false);
    }
    else {
        $('.b3_fr2_gia_container .b3_fr2_gia_input').prop('disabled', false);
    }
});

//
if ($('.b6_tinhtrang_moi_input').is(":checked")) {
    $('.ctn_ct_b6_sokmdadi').addClass("d_none");
}
$('.b6_tinhtrang_cu_input').click(function () {
    if ($(".b6_tinhtrang_cu_input").is(":checked")) {
        $('.ctn_ct_b6_sokmdadi').removeClass("d_none");
    }
})
$('.b6_tinhtrang_moi_input').click(function () {
    if ($(".b6_tinhtrang_moi_input").is(":checked")) {
        $('.ctn_ct_b6_sokmdadi').addClass("d_none");
    }
})

//
function xoa_diachi(e) {
    $(e).parent().remove();
    var x = 2;
    $(".one_stt").each(function () {
        $(this).text(x);
        x++;
    })
}

//
$('.txt_add_pnlsp').click(function () {
    // console.log(111);
    // $('.m_phannhomloaisp').hide();
})
/// khi click vao txt_add_pnlsp them nhom phan loai san pham thi show bang them nhom phan loai
$('.m_thongtinbanhang .txt_add_pnlsp').click(function () {
    $('.m_thongtinbanhang .m_phannhomloaisp').hide();
    $('.m_thongtinbanhang .container_ttbh').show();
    var html = (`
            <div class="frame_share_bnplsp d_flex fl_row gap20 al_ct mg_t15">
                <div class="fr_share_nhomphanloaisp">
                    <div class="nhomphanloaisp_text p_400_s15_l18 mg_bt5">Nhóm phân loại sản phẩm <span class="cl_red">*</span></div>
                    <input type="text" class="nhomphanloaisp_select p_400_s14_l16" name="nhom_phan_loai" maxlength="20" onKeyUp="dem_kitu(this)" placeholder="Nhập nhóm phân loại sản phẩm (cách nhau bằng dấu , )">
                    <div class="nplsp_note p_400_s12_l14 cl_99999">
                        <input type="text" name="count_kitu" class="count_kitu" value="0"> / 20 ký tự
                    </div>
                </div>
            <div class="fr_share_cacphanloai">
                <div class="phanloaisp_text p_400_s15_l18 mg_bt5">Các phân loại</div>
                    <input type="text" class="phanloaisp_select p_400_s14_l16" name="phan_loai" placeholder="Nhập phân loại (cách nhau bằng dấu , )">
                </div>
                 <div class="delete_nplsp cursor_Pt mgt_20" onclick="delete_nplsp(this)">
                    <img src="/images/m_raonhanh_imgnew/delete_red.png" class="icon_delete_nplsp img20" >
                 </div>
            </div>

            `);
    $('.m_thongtinbanhang .box_share_bnplsp').append(html);
    $('.m_gia_slkho .b3_fr2_gia_input').prop('disabled', true);
    $('.m_gia_slkho .btn_slk').prop('disabled', true);
    $('.m_gia_slkho .b3_fr2_gia_input').addClass('op7');
    $('.m_gia_slkho .btn_slk').addClass('op7');
})
// khi click vao class txt_add_bpnlsp show them nhom phan loai
$('.m_thongtinbanhang .txt_add_bpnlsp').click(function () {
    var html = (`
            <div class="frame_share_bnplsp d_flex fl_row gap20 al_ct mg_t15">
                <div class="fr_share_nhomphanloaisp">
                    <div class="nhomphanloaisp_text p_400_s15_l18 mg_bt5">Nhóm phân loại sản phẩm <span class="cl_red">*</span></div>
                    <input type="text" class="nhomphanloaisp_select p_400_s14_l16" name="nhom_phan_loai" maxlength="20" onKeyUp="dem_kitu(this)"  placeholder="Nhập nhóm phân loại sản phẩm (cách nhau bằng dấu , )">
                    <div class="nplsp_note p_400_s12_l14 cl_99999">
                        <input type="text" name="count_kitu" class="count_kitu" value="0"> / 20 ký tự
                    </div>
                </div>
            <div class="fr_share_cacphanloai">
                <div class="phanloaisp_text p_400_s15_l18 mg_bt5">Các phân loại</div>
                    <input type="text" class="phanloaisp_select p_400_s14_l16" name="phan_loai" placeholder="Nhập phân loại (cách nhau bằng dấu , )">
                </div>
                 <div class="delete_nplsp cursor_Pt mgt_20" onclick="delete_nplsp(this)">
                    <img src="/images/m_raonhanh_imgnew/delete_red.png" class="icon_delete_nplsp img20" >
                 </div>
            </div>
            `);
    $('.m_thongtinbanhang .box_share_bnplsp').append(html);
})
//
function delete_nplsp(e) {
  
    $(e).parent().remove();
    var count_nplsp = $('.frame_share_bnplsp').length;
    if (count_nplsp == 0) {
        $('.m_thongtinbanhang .m_phannhomloaisp').show();
        $('.m_thongtinbanhang .container_ttbh').hide();
        $('.m_gia_slkho .b3_fr2_gia_input').prop('disabled', false);
        $('.m_gia_slkho .btn_slk').prop('disabled', false);
        $('.m_gia_slkho .b3_fr2_gia_input').removeClass('op7');
        $('.m_gia_slkho .btn_slk').removeClass('op7');
    }
    $('.box_add_bpnlsp .txt_update_bpnlsp .cap_nhat').click();
}
function delete_bangplsp(e) {
    $(e).parent().parent().remove();
    var count_nplsp = $('.footer_bangphanloai').length;
    if (count_nplsp == 0) {
        $('.m_thongtinbanhang .m_bangphanloai').hide();
    }
}
$('.sldh_toida_add').click(function () {
    var html = `<p class="sldh_toida_txt_khac mg_bt5 p_400_s15_l18 d_flex fl_row al_ct gap5">Số lượng đặt hàng tối đa <span class="cl_red">*</span>
                        <img src="/images/m_raonhanh_imgnew/Question Circle.png" class="img16 cursor_Pt question_cirlce question_cirlce_td" onclick = "tbtd(this)">
                        </p>
                        <p class="thongbao_sltd">Số lượng khách hàng đặt hàng tối đa trong đơn</p>
                        `;
    $('.sldh_toida_show').show();
    $(this).hide();
    $('.sldh_toida_txt').replaceWith(html);
})
$('.xoa_dhtd').click(function () {
    var html = `<p class="sldh_toida_txt mg_bt5 p_400_s15_l18">Số lượng đặt hàng tối đa</p>`;
    $('.sldh_toida_show').hide();
    $('.sldh_toida_add').show();
    $('.sldh_toida_txt_khac').replaceWith(html);
})
// khi click vao phi van chuyen thi box nhap phi van chuyen show
$('.phi_vanchuyen_input').click(function () {
    if ($('.phi_vanchuyen_input').is(":checked")) {
        $('.box_phivanchuyen .nhapphivanchuyen').show();
    }
})
// khi click vao mien phi van chuyen thi box nhap phi van chuyen hide
$('.mienphi_vanchuyen_input').click(function () {
    if ($('.mienphi_vanchuyen_input').is(":checked")) {
        $('.box_phivanchuyen .nhapphivanchuyen').hide();
    }
})
$('.icon_delete_loai').click(function () {
    $(this).parent().parent().remove();
})
// khi click icon xoa thi xoa bang khuyen mai
$('.icon_xoa_km').click(function () {
    $('.khuyenmai_bangkm').hide();
    $('.khuyemai_add_khuyemmai').show();
})
// khi click icon hien thi xoa bang khuyen mai
$('.txt_add_km').click(function () {
    $('.khuyenmai_bangkm').show();
    $('.khuyemai_add_khuyemmai').hide();
})
$('.question_cirlce_tt').click(function () {
    $('.thongbao_sltt').slideToggle();
})

function tbtd() {
    $('.thongbao_sltd').slideToggle();
}
$(".cap_nhat").click(function () {
    var check_mang1 = [];
    $(".phanloaisp_select").each(function(){
        var check_pl = $(this).val();
        if(check_pl == ""){
            check_mang1.push(0);
        }else{
            check_mang1.push(1);
        }
    })
    // khac -1 đúng == -1 sai
    var check_mang2 = [];
    $(".nhomphanloaisp_select").each(function(){
        var check_npl = $(this).val();
        if(check_npl == ""){
            check_mang2.push(0);
        }else{
            check_mang2.push(1);
        }
    })

    if($.inArray(0,check_mang1) != -1 || $.inArray(0,check_mang2) != -1){
        alert("VUI LÒNG NHẬP NHÓM SẢN PHẨM HOẶC LOẠI SẢN PHẨM!!");
        return;
    }else {
        if($.inArray(1,check_mang1) != -1 && $.inArray(1,check_mang2) != -1){
            var arr_vl = [];
            $(".phanloaisp_select").each(function () {
                var item_gtr = $(this).val();
                item_gtr = item_gtr.split(',');
                arr_vl.push(item_gtr);
            });
            cartesian(...arr_vl);
    
            var json = JSON.stringify(cartesian(...arr_vl));
            $.ajax({
                url: '/render/loai_nhomspham.php',
                type: 'POST',
                data: {
                    json: json,
                },
                success: function (data) {
                    $(".m_bangphanloai .container_ft_bpl").html(data);
                }
            })
            $('.m_bangphanloai').show(); 
        }
    }

});

function cartesian(...args) {
    var r = [],
        max = args.length - 1;

    function helper(arr, i) {
        for (var j = 0, l = args[i].length; j < l; j++) {
            var a = arr.slice(0);
            a.push(args[i][j]);
            if (i == max)
                r.push(a);
            else
                helper(a, i + 1);
        }
    }
    helper([], 0);
    return r;
}

// $('.box_giatri_km .giatri_km_input').prop("disabled",true);
$('.loai_km').on('change',function(){
var loai_km = $(this).val();
    var txt1 = `VNĐ`;
    var txt2 = `%`;
    if(loai_km ==1){
        $('.box_giatri_km .giatri_km_input').prop("disabled",false);
        $('.box_giatri_km .show_dv_km').text(txt2);
        $('.box_giatri_km .giatri_km_input').attr("placeholder","0");
        $('.box_giatri_km .giatri_km_input').attr("maxlength","3");
    }else if(loai_km ==2){
        $('.box_giatri_km .giatri_km_input').prop("disabled",false);
        $('.box_giatri_km .show_dv_km').text(txt1);
        $('.box_giatri_km .giatri_km_input').attr("placeholder","Nhập giá trị giảm");
        $('.box_giatri_km .giatri_km_input').removeAttr("maxlength");
    }else{
        $('.box_giatri_km .giatri_km_input').prop("disabled",true);
    }
})

// $('.b11_btn_dangtin').click(function(){
//     // so luong kho
//     var arr_slk = [];
//     $('.ft_bpl_slk').each(function() {
//         var slk = $(this).val();
//         if (slk != "") {
//             arr_slk.push(1);
//         }else{
//             arr_slk.push(0);
//         }
//     })
//     // gia ban
//     var arr_gia = [];
//     $('.txt_gia_bpl').each(function() {
//         var gia_sp = $(this).val();
//         if (gia_sp != "") {
//             arr_gia.push(1);
//         }else{
//             arr_gia.push(0);
//         }

//     })
//     if(($.inArray(0,arr_slk) != -1) && ($.inArray(0,arr_gia) != -1)){
//         alert("VUI LÒNG NHẬP SỐ LƯỢNG KHO HOẶC GIÁ SẢN PHẨM ĐANG TRỐNG!!");
//         return;
//     }

//     var check_mang1 = [];
//     $(".phanloaisp_select").each(function(){
//         var check_pl = $(this).val();
//         if(check_pl == ""){
//             check_mang1.push(0);
//         }else{
//             check_mang1.push(1);
//         }
//     })
//     // khac -1 đúng == -1 sai
//     var check_mang2 = [];
//     $(".nhomphanloaisp_select").each(function(){
//         var check_npl = $(this).val();
//         if(check_npl == ""){
//             check_mang2.push(0);
//         }else{
//             check_mang2.push(1);
//         }
//     })

//     if($.inArray(0,check_mang1) != -1 || $.inArray(0,check_mang2) != -1){
//         alert("VUI LÒNG NHẬP NHÓM SẢN PHẨM HOẶC LOẠI SẢN PHẨM!!");
//         return 0;
//     }
// })