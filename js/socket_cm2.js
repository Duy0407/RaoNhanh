// yêu thích tin đăng
function like_url(type, cl, cl2, pb) {
    if (type == 0) {
        if (!$('.' + cl).hasClass('active')) {
            type = 1;
        }
    }
    var url = $(pb).attr("data1");
    var id = uid_view;

    var name = $(pb).attr("data2");
    var img = "";
    var author = $(pb).attr("data3");

    if (id == 0) {
        return false;
    }

    $.ajax({
        url: "/ajax_comment/like_url.php",
        type: "POST",
        data: {
            url: url,
            id: id,
            name: name,
            img: img,
            type: type,
            author: author,
        },
        success: function (data) {
            $('.show_ic').hide();
            $(pb).parents(".box_cm_body").find('.' + cl + '_txt').removeClass('red').removeClass('liked').removeClass('yll').removeClass('orange');
            // gắn active và thêm số
            if (!$(pb).parents(".box_cm_body").find('.' + cl).hasClass('active')) {
                $(pb).parents(".box_cm_body").find('.' + cl).addClass('active').attr('data', type);
                $(pb).parents(".box_cm_body").find('.' + cl2 + ' .count_ic').text(data);
                // if (data != '') {
                //     $(pb).parents(".box_cm_body").find('.cm_view_ic').hide();
                // } else {
                //     $(pb).parents(".box_cm_body").find('.cm_view_ic').show();
                // }
            } else {
                // xóa icon trước đó
                $(pb).parents(".box_cm_body").find('.' + cl2 + ' .icon_new').removeClass('show').removeClass('icon_new');
            }
            // check có icon chưa để thêm vào danh sách
            if (type > 0 && !$(pb).parents(".box_cm_body").find('.' + cl2 + ' .ic' + type).hasClass('show')) {
                $(pb).parents(".box_cm_body").find('.' + cl2 + ' .ic' + type).addClass('icon_new').addClass('show');
            }

            switch (type) {
                case 1:
                    $(pb).parents(".box_cm_body").find('.' + cl + '_txt').addClass("liked").text('Thích');
                    $(pb).parents(".box_cm_body").find('.' + cl + '_img').attr('src', '/images/img_comment/Ic_color_1.png');
                    break;
                case 2:
                    $(pb).parents(".box_cm_body").find('.' + cl + '_txt').addClass("red").text('Yêu thích');
                    $(pb).parents(".box_cm_body").find('.' + cl + '_img').attr('src', '/images/img_comment/Ic_' + type + '.png')
                    break;
                case 3:
                    $(pb).parents(".box_cm_body").find('.' + cl + '_txt').addClass("yll").text('Wow');
                    $(pb).parents(".box_cm_body").find('.' + cl + '_img').attr('src', '/images/img_comment/Ic_' + type + '.png')
                    break;
                case 4:
                    $(pb).parents(".box_cm_body").find('.' + cl + '_txt').addClass("yll").text('Thương thương');
                    $(pb).parents(".box_cm_body").find('.' + cl + '_img').attr('src', '/images/img_comment/Ic_' + type + '.png')
                    break;
                case 5:
                    $(pb).parents(".box_cm_body").find('.' + cl + '_txt').addClass("orange").text('Phẫn nộ');
                    $(pb).parents(".box_cm_body").find('.' + cl + '_img').attr('src', '/images/img_comment/Ic_' + type + '.png')
                    break;
                case 6:
                    $(pb).parents(".box_cm_body").find('.' + cl + '_txt').addClass("yll").text('Buồn');
                    $(pb).parents(".box_cm_body").find('.' + cl + '_img').attr('src', '/images/img_comment/Ic_' + type + '.png')
                    break;
                case 7:
                    $(pb).parents(".box_cm_body").find('.' + cl + '_txt').addClass("yll").text('Ha ha');
                    $(pb).parents(".box_cm_body").find('.' + cl + '_img').attr('src', '/images/img_comment/Ic_' + type + '.png')
                    break;
                default:
                    $(pb).parents(".box_cm_body").find('.' + cl2 + ' .count_ic').text(data);
                    if (data != '') { $('.cm_view_ic').hide(); } else { $('.cm_view_ic').show(); }

                    $(pb).parents(".box_cm_body").find('.' + cl).removeClass('active');
                    $(pb).parents(".box_cm_body").find('.' + cl + '_txt').removeClass('red').removeClass('liked').removeClass('yll').removeClass('orange');
                    $(pb).parents(".box_cm_body").find('.' + cl + '_txt').text('Thích');
                    $(pb).parents(".box_cm_body").find('.' + cl + '_img').attr('src', '/images/img_comment/Ic_color_2.png');
            }
        }
    });
};

// yêu thích commnent
function like_url_cm(t, type, cl, cl2) {
    if (type == 0) {
        if (!$(t).parents('.' + cl2).find('.' + cl).hasClass('active')) {
            type = 1;
        }
    }
    var url = url_cm;
    var id = uid_view;
    var name = uid_name;
    var img = uid_ava;
    var author = uid_author;

    var cm_id = $(t).parents('.cm_content').attr('data');
    $.ajax({
        url: "/ajax_comment/like_url.php",
        type: "POST",
        data: {
            url: url,
            id: id,
            name: name,
            img: img,
            type: type,
            cm_id: cm_id,
            author: author,
        },
        success: function (data) {
            $('.show_ic').hide();
            $(t).parents('.' + cl2).find('.' + cl + '_txt').removeClass('red').removeClass('liked').removeClass('yll').removeClass('orange');
            // gắn active và xóa icon
            if ($(t).parents('.' + cl2).find('.' + cl).hasClass('active')) {
                var check = $(t).parents('.' + cl2).find('.icon_new').removeClass('show').removeClass('icon_new');
            }
            else {
                $(t).parents('.' + cl2).find('.' + cl).addClass('active');
                $(t).parents('.' + cl2).find('.count_ic').text((Number($(t).parents('.' + cl2).find('.count_ic').text()) + 1));
            }
            // check có icon chưa để thêm vào danh sách
            if (type > 0 && !$(t).parents('.' + cl2).find('.ic' + type).hasClass('show')) {
                $(t).parents('.' + cl2).find('.ic' + type).addClass('icon_new').addClass('show');
            }

            switch (type) {
                case 1:
                    $(t).parents('.' + cl2).find('.' + cl + '_txt').addClass("liked").text('Thích');
                    break;
                case 2:
                    $(t).parents('.' + cl2).find('.' + cl + '_txt').addClass("red").text('Yêu thích');
                    break;
                case 3:
                    $(t).parents('.' + cl2).find('.' + cl + '_txt').addClass("yll").text('Wow');
                    break;
                case 4:
                    $(t).parents('.' + cl2).find('.' + cl + '_txt').addClass("yll").text('Thương thương');
                    break;
                case 5:
                    $(t).parents('.' + cl2).find('.' + cl + '_txt').addClass("orange").text('Phẫn nộ');
                    break;
                case 6:
                    $(t).parents('.' + cl2).find('.' + cl + '_txt').addClass("yll").text('Buồn');
                    break;
                case 7:
                    $(t).parents('.' + cl2).find('.' + cl + '_txt').addClass("yll").text('Ha ha');
                    break;
                default:
                    if ($(t).hasClass('active')) {
                        var dem = Number($(t).parents('.' + cl2).find('.count_ic').text()) - 1;
                        var txt_dem = "";
                        if (dem > 0) { txt_dem = dem; }
                        $(t).parents('.' + cl2).find('.count_ic').text(txt_dem);
                    }
                    $(t).parents('.' + cl2).find('.' + cl).removeClass('active');
                    $(t).parents('.' + cl2).find('.' + cl + '_txt').removeClass('red').removeClass('liked').removeClass('yll').removeClass('orange');
                    $(t).parents('.' + cl2).find('.' + cl + '_txt').text('Thích');
            }
        }
    });
}

function reply_cm(t) {
    var img_u = "https://timviec365.vn/images/user_no.png";
    if (uid_ava != '') { img_u = uid_ava; }
    var input = '<div class="cm_input input_reply active">\n' +
        '                                <span class="line_reply1"></span>\n' +
        '                                <img class="ava_cm" src="' + img_u + '" alt="binh luan">\n' +
        '                                <textarea class="ct_cm tag_cm_rl" maxlength="250" oninput="this.style.height = (this.scrollHeight) + \'px\'" onkeydown="send_cm_rl(this,event)" placeholder="Viết bình luận"></textarea>\n' +
        '                                <svg class="ic_send_rl" onclick="ic_send_rl(this)" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '                                    <rect width="32" height="32" rx="16" fill="#4C5BD4"></rect>\n' +
        '                                    <path d="M24.7922 8.21841C24.6908 8.11767 24.5628 8.04793 24.4231 8.01737C24.2835 7.98681 24.138 7.99672 24.0037 8.04592L7.48458 14.0456C7.34211 14.0996 7.21946 14.1956 7.13291 14.3208C7.04635 14.4461 7 14.5946 7 14.7468C7 14.899 7.04635 15.0476 7.13291 15.1728C7.21946 15.2981 7.34211 15.3941 7.48458 15.448L13.9346 18.0204L18.6951 13.2507L19.7538 14.3081L14.9708 19.0854L17.5538 25.5275C17.6094 25.6671 17.7057 25.7867 17.8302 25.8709C17.9547 25.9552 18.1017 26.0001 18.2521 26C18.4038 25.9969 18.551 25.9479 18.6744 25.8596C18.7977 25.7712 18.8913 25.6476 18.9429 25.505L24.9498 9.00587C25.001 8.87319 25.0133 8.72871 24.9854 8.58929C24.9575 8.44987 24.8905 8.32124 24.7922 8.21841Z" fill="white"></path>\n' +
        '                                </svg>\n' +
        '                                <svg class="cm_img_ct" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">\n' +
        '                        <path d="M6.76017 22H17.2402C20.0002 22 21.1002 20.31 21.2302 18.25L21.7502 9.99C21.8902 7.83 20.1702 6 18.0002 6C17.3902 6 16.8302 5.65 16.5502 5.11L15.8302 3.66C15.3702 2.75 14.1702 2 13.1502 2H10.8602C9.83017 2 8.63017 2.75 8.17017 3.66L7.45017 5.11C7.17017 5.65 6.61017 6 6.00017 6C3.83017 6 2.11017 7.83 2.25017 9.99L2.77017 18.25C2.89017 20.31 4.00017 22 6.76017 22Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>\n' +
        '                            <path d="M10.5 8H13.5" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>\n' +
        '                            <path d="M12 18C13.79 18 15.25 16.54 15.25 14.75C15.25 12.96 13.79 11.5 12 11.5C10.21 11.5 8.75 12.96 8.75 14.75C8.75 16.54 10.21 18 12 18Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>\n' +
        '                           </svg>\n' +
        '                        <input style="display: none;" name="listimg" onchange="preview_image(event, this);" class="fileupload_rl" type="file">\n' +
        '                       <div class="tag_friend_rl"></div>\n' +
        '               </div>';

    if ($(t).parents('.frame_cm_box').find('.cm_input').length < 1) {
        $('.cm_input').removeClass('active');
        $('.frame_cm_box').find('.cm_input').remove();
        $(t).parents('.frame_cm_box').append(input);
        $('.cm_input.active').find('.ct_cm').focus();
    }
    var cm_new = $(t).parents('.box_cm_vl');
    autotag(cm_new.find('.tag_cm_rl'), arr_friend, 'tag_friend_rl', [], cm_new);
};


// xóa bình luận (tìm kiếm không hiện ra bình luận)
function delete_cm(id) {
    if (confirm('Bạn có chắc chắn muốn xóa bình luận này không!')) {
        $.ajax({
            url: "/ajax_comment/delete_cm.php",
            type: "POST",
            data: {
                id_cm: id,
                uid: uid_view,
            },
            success: function (data) {
                var pr = $('.cm_' + id).attr('data-pr');
                $('.cm_' + id).remove();
                if ($('.cm_content[data-pr="' + pr + '"]').length == 1) {
                    $('.cm_content[data-pr="' + pr + '"]').parent().removeClass('cm_has_reply');
                }
            }
        });
    }
}


$('.cm_cm_ic').on('mousemove', function () {
    var cm_new = $(this).parents('.box_cm_vl');
    cm_new.find('.box_cm_ic').show(500);
    $('.box_sh_ic').hide(200);
});
$('.cm_sh_ic').on('mousemove', function () {
    var cm_new = $(this).parents('.box_cm_vl');
    cm_new.find('.box_sh_ic').show(500);
    $('.box_cm_ic').hide(200);
});


$('.box_cm_head, .order_cm').on('mousemove', function () {
    $('.box_sh_ic').hide();
    $('.box_cm_ic').hide();
});
$('.cm_sh_ic').click(function () {
    if (uid_view > 0 && $('#popup_items_sh .items').length) {
        $('#popup_items_sh').show();
    }
})
$('.frame_cm_like').click(function () {
    if (uid_view > 0) {
        $('#popup_items_icon').show();
    }
})

// $('.close_cm').click(function () {
//     $('.popup_comment').hide();
//     $('#popup_share_chat365').attr('share-url', '');
//     $('#popup_share_gr').attr('share-url', '');
// });

function close_cm() {
    $('.popup_comment').hide();
    $('#popup_share_chat365').attr('share-url', '');
    $('#popup_share_gr').attr('share-url', '');
}
// $('.share_items_chat365').click(function () {
//     var cm_url = $(this).parents('.box_cm_vl').attr('data-url');
//     $('.box_share').removeClass('show');
//     $('#popup_share_chat365').attr('share-url', cm_url).show();
// });

function share_items_chat365(id) {
    var cm_url = $(id).parents('.box_cm_vl').attr('data-url');
    $('.box_share').removeClass('show');
    $('#popup_share_chat365').attr('share-url', cm_url).show();
}

// $('.share_group_chat365').click(function () {
//     var cm_url = $(this).parents('.box_cm_vl').attr('data-url');
//     $('.box_share').removeClass('show');
//     $('#popup_share_gr').attr('share-url', cm_url).show();
// });

function share_group_chat365(id) {
    var cm_url = $(this).parents('.box_cm_vl').attr('data-url');
    $('.box_share').removeClass('show');
    $('#popup_share_gr').attr('share-url', cm_url).show();
}

// $('.comment_event').click(function () {
//     $('.input_comment .ct_cm').focus();
// })

$('.comment_event').click(function () {
    if (uid_view > 0) {
        var cm_new = $(this).parents('.box_cm_vl');
        cm_new.find('.order_cm').show();
        cm_new.find('.ct_cm').focus();
        $('.ct_cm').val('');
        hastag_cm = [];
        autotag(cm_new.find('.tag_cm'), arr_friend, 'tag_friend', [], cm_new);
    }
});
// gửi bình luận tin
$('.ct_cm').keydown(function (e) {
    var comment = $(this).val().trim();
    if (e.keyCode === 13 && !e.shiftKey) {
        e.stopPropagation();
        e.preventDefault();
        var cm_new = $(this).parents('.box_cm_vl');
        var file = cm_new.find('.fileupload').prop('files')[0];
        if (comment != "" || file != undefined) {
            var url = cm_new.attr('data-url');
            var author = cm_new.attr('cm-new');
            send_cm(url, uid_view, uid_name, uid_ava, comment, 0, file, author);
            $(this).val("").css('height', '48px').focus();
        }
        return false;
    }
});
// $('.ic_send_cm').click(function () {
//     var cm_new = $(this).parents('.box_cm_vl');
//     var comment = cm_new.find('.input_comment .ct_cm').val().trim();
//     var file = cm_new.find('.fileupload').prop('files')[0];
//     var url = cm_new.attr('data-url');
//     var author = cm_new.attr('cm-new');
//     if (comment != "" || file != undefined) {
//         send_cm(url, uid_view, uid_name, uid_ava, comment, 0, file, author);
//         cm_new.find('.input_comment .ct_cm').val("").css('height', '48px').focus();
//         return false;
//     }
// });

function ic_send_cm(id) {
    var cm_new = $(id).parents('.box_cm_vl');
    var comment = cm_new.find('.input_comment .ct_cm').val().trim();
    var file = cm_new.find('.fileupload').prop('files')[0];
    var url = cm_new.attr('data-url');
    var author = cm_new.attr('cm-new');
    if (comment != "" || file != undefined) {
        send_cm(url, uid_view, uid_name, uid_ava, comment, 0, file, author);
        cm_new.find('.input_comment .ct_cm').val("").css('height', '48px').focus();
        return false;
    }
}
// gửi câu trả lời của bình luận
function send_cm_rl(t, e) {
    if (e.keyCode === 13 && !e.shiftKey) {
        e.stopPropagation();
        e.preventDefault();
        var cm_new = $(t).parents('.box_cm_vl');

        var file = cm_new.find('.fileupload_rl').prop('files')[0];
        var comment = $(t).val().trim();

        if (comment != "" || file != undefined) {
            var url = cm_new.attr('data-url');
            var author = cm_new.attr('cm-new');
            var cm_id = $(t).parents('.cm_content').attr('data-pr');
            send_cm(url, uid_view, uid_name, uid_ava, comment, cm_id, file, author);
            $(t).parents('.cm_input').remove();
        }
        return false;
    }
}

function ic_send_rl(t) {
    var cm_new = $(t).parents('.box_cm_vl');
    var comment = $(t).parents('.cm_input ').find('.ct_cm').val().trim();
    var file = cm_new.find('.fileupload_rl').prop('files')[0];

    if (comment != "" || file != undefined) {
        var url = cm_new.attr('data-url');
        var author = cm_new.attr('cm-new');
        var cm_id = $(t).parents('.cm_content').attr('data-pr');
        send_cm(url, uid_view, uid_name, uid_ava, comment, cm_id, file, author);
    }
    setTimeout(function () {
        $(t).parents('.cm_input ').remove();
    }, 200);
    return false;
}

// gửi chia sẻ tin
$('.bg_send').click(function () {
    var x = $(this);
    if (x.hasClass('shared')) {
        return false;
    }

    if (x.hasClass('send_gr')) {
        var nd = $('#nd_gr_share').val();
    } else {
        var nd = $('#nd_share').val();
    }

    if (!$('.items[share-id="' + uid_view + '"]').length) {
        $('#popup_items_sh .frame_items').append('<div class="items" share-id="' + uid_view + '"><div class="items_u"><img src="' + uid_ava + '" alt="' + uid_name + '"><span class="name">' + uid_name + '</span></div></div>');
        $('.box_sh_ic .frame').append('<p class="sh_items" sh-id="' + uid_view + '">' + uid_name + '</p>');
    }

    $.ajax({
        url: "/ajax_comment/share_cm.php",
        type: "POST",
        data: {
            id_user: x.attr('data-id'),
            cv_sender: x.attr('data-gr'),
            id_sender: uid_view,
            ava_sender: uid_ava,
            name_sender: uid_name,
            url: url_cm,
            nd_sender: nd
        },
        success: function (data) {
            x.addClass('shared').text('Đã gửi');
            $('.cm_sh_ic').html('<b>&#149;</b> ' + data + ' chia sẻ');
        }
    });
});

$(window).click(function (e) {
    if (!$('.popup_items_sh').is(e.target) && $('.popup_items_sh').has(e.target).length == 0 && !$('.cm_sh_ic').is(e.target) && $('.cm_sh_ic').has(e.target).length == 0) {
        $('#popup_items_sh').hide();
    }
    if (!$('.popup_items_icon').is(e.target) && $('.popup_items_icon').has(e.target).length == 0 && !$('.frame_cm_like').is(e.target) && $('.frame_cm_like').has(e.target).length == 0) {
        $('#popup_items_icon').hide();
    }
    if (((!$('.like_cm').is(e.target) && $('.like_cm').has(e.target).length == 0) || (!$('.like_event').is(e.target) && $('.like_event').has(e.target).length == 0)) && !$('.show_ic').is(e.target) && $('.show_ic').has(e.target).length == 0) {
        $('.show_ic').hide();
    }
    if (!$('.cm_cm_ic').is(e.target) && $('.cm_cm_ic').has(e.target).length == 0 && !$('.box_cm_ic').is(e.target) && $('.box_cm_ic').has(e.target).length == 0) {
        $('.box_cm_ic').hide();
    }
    if (!$('.cm_sh_ic').is(e.target) && $('.cm_sh_ic').has(e.target).length == 0 && !$('.box_sh_ic').is(e.target) && $('.box_sh_ic').has(e.target).length == 0) {
        $('.box_sh_ic').hide();
    }
    if (!$('.share_event').is(e.target) && $('.share_event').has(e.target).length == 0 && !$('.box_share ').is(e.target) && $('.box_share ').has(e.target).length == 0) {
        $('.box_share ').removeClass('show');
    }
    if (!$('.share_items_mxh').is(e.target) && $('.share_items_mxh').has(e.target).length == 0 && !$('.box_share_mxh ').is(e.target) && $('.box_share_mxh ').has(e.target).length == 0) {
        $('.box_share_mxh').removeClass('show');
    }
    if (!$('.share_items_chat365').is(e.target) && $('.share_items_chat365').has(e.target).length == 0 && !$('.popup_share_chat365 ').is(e.target) && $('.popup_share_chat365 ').has(e.target).length == 0) {
        $('#popup_share_chat365').hide();
    }
});

function add_show(cl,pb) {
    if (uid_view > 0) {
        $(pb).parents().find('.' + cl).toggleClass('show');
    }
}

function show_icon(t, type) {
    $('.items_ic').removeClass('active');
    $(t).addClass('active');
    $('.box_icon,.more_icon').removeClass('show');
    $('.icon_show_' + type).addClass('show');
}

function show_ic(t, cl) {
    $(t).parents('.' + cl).find('.show_ic').show();
}

function hide_ic(t, cl) {
    setTimeout(function () {
        $(t).parents('.' + cl).find('.show_ic').hide();
    }, 300)
}

function send_cm(url, id, name, img, comment, cm_id = 0, file, uid_author) {
    var new_old = Number($('.new_old').val());

    let formData = new FormData();

    if (file !== undefined) {
        formData.append('file', file);
    }

    var cm_hastag = JSON.stringify(hastag_cm);

    formData.append('url', url);
    formData.append('id', id);
    formData.append('name', name);
    formData.append('img', img);
    formData.append('comment', comment);
    formData.append('cm_id', cm_id);
    formData.append('cm_hastag', cm_hastag);
    formData.append('author', uid_author);

    $.ajax({
        url: "/ajax_comment/send_cm.php",
        type: "POST",
        contentType: false,
        data: formData,
        cache: false,
        processData: false,
        success: function (data) {
            if (data == 'error') {
                alert('Bạn bình luận quá nhanh. Vui lòng chờ vài giây để tiếp tục bình luận.');
            }
            if (data != '' && data != 'error') {
                if (cm_id == 0) {
                    $('.box_cm_vl[data-url="' + url + '"] .box_cm_list').prepend(data);
                    $('.box_cm_vl[data-url="' + url + '"] .cm_list').show();
                    var x = parseInt($('.box_cm_vl[data-url="' + url + '"] .cm_cm_ic span').text()) + 1;
                    $('.box_cm_vl[data-url="' + url + '"] .cm_cm_ic span').text(x);
                    $('.box_load_img').remove();
                    $('.fileupload').val('');
                }
                else if (cm_id >= 0) {
                    if (!$('.cm_' + cm_id).parents('.cm_comment').hasClass('cm_has_reply')) {
                        $('.cm_' + cm_id).parents('.cm_comment').addClass('cm_has_reply');
                    }
                    $('.cm_' + cm_id).find('.line_reply1').remove();
                    $('.cm_' + cm_id).find('.frame_cm_box').append(data);
                    $('.box_load_img').remove();
                    $('.fileupload').val('');
                }

            }
            hastag_cm = [];
        }
    });
}
function cm_loadmore(id, url, check = 0) {
    var page = Number($('.cm_list').attr('data'));
    var count_page = Number($('.cm_list').attr('data-count'));
    var sort = $('.new_old').val();
    if (check == 0) { page = 1; }
    $.ajax({
        url: "/ajax_comment/load_cm.php",
        type: "POST",
        data: {
            id: id,
            page: page,
            sort: sort,
            url: url,
        },
        success: function (data) {
            if (check == 0) {
                $('.cm_list').attr('data', 2);
                $('.box_cm_list').html(data);
                $(".cm_list").animate({ scrollTop: 0 }, 500);
                $('.cm_loadmore').show();
            }
            else {
                $('.cm_list').attr('data', page + 1);
                $('.box_cm_list').append(data);
                if ((page + 1) > count_page) {
                    $('.cm_loadmore').hide();
                }
            }
        }
    });
}

function autotag(inp, arr, append, tag, parent) {
    if (arr.length == 0) {
        return false;
    }
    var currentFocus;

    inp.on("keyup", function (e) {
        var a, b, i, val, str = this.value;
        var arr_val = str.split(" @");
        var arr_tag = [];

        hastag_cm = tag;

        if (arr_val.length > 1) {
            val = arr_val[arr_val.length - 1];
        } else if (str.startsWith("@") && arr_val.length == 1) {
            val = str.substring(1);
        } else {
            val = '';
        }
        closeAllLists();
        if (!str.startsWith("@") && !str.endsWith(" @") && str != '@' && val.trim() == '') {
            parent.find('.' + append).hide();
            return false;
        }

        currentFocus = -1;
        a = document.createElement("DIV");
        a.setAttribute("id", this.id + "tagchat-list");
        a.setAttribute("class", "tagchat-items");
        parent.find('.' + append).append(a);

        var sl = 0;

        for (i = 0; i < arr.length; i++) {
            for (j = 0; j < arr[i][0].length; j++) {
                if (arr[i][0].substr(j, val.length).toUpperCase() == val.toUpperCase() || (e.keyCode === 50 && e.shiftKey)) {
                    b = document.createElement("DIV");
                    b.innerHTML = "<img src='" + arr[i][1] + "' alt='img'><span>" + arr[i][0] + "</span>" + "<input type='hidden' value='" + arr[i][0] + "'>" + "<input type='hidden' value='" + arr[i][2] + "'>";
                    b.addEventListener("click", function (e) {

                        var vl = inp.val().substr(0, inp.val().lastIndexOf(val)) + this.getElementsByTagName("input")[0].value;
                        inp.val(vl);

                        arr_tag[0] = this.getElementsByTagName("input")[1].value;
                        arr_tag[1] = '@' + this.getElementsByTagName("input")[0].value;
                        hastag_cm.push(arr_tag);
                        closeAllLists();
                    });
                    a.appendChild(b);
                    sl++;
                    break;
                }
            }
            if (sl > 5) { break; }
        }

        if (sl == 0) {
            parent.find('.' + append).hide();
        } else {
            parent.find('.' + append).show();
        }

        var x = document.getElementById(this.id + "tagchat-list");
        if (x) x = x.getElementsByTagName("div");
        if (e.keyCode == 40) {
            currentFocus++;
            addActive(x);
            parent.find('.' + append).hide();
        } else if (e.keyCode == 38) {
            currentFocus--;
            addActive(x);
            parent.find('.' + append).hide();
        } else if (e.keyCode == 13) {
            e.preventDefault();
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
        x[currentFocus].classList.add("tagchat-active");
    }

    function removeActive(x) {
        for (var i = 0; i < x.length; i++) {
            x[i].classList.remove("tagchat-active");
        }
    }

    function closeAllLists(elmnt) {
        var x = document.getElementsByClassName("tagchat-items");
        for (var i = 0; i < x.length; i++) {
            if (elmnt != x[i] && elmnt != inp) {
                x[i].parentNode.removeChild(x[i]);
            }
        }
    }
    document.addEventListener("click", function (e) {
        closeAllLists(e.target);
        parent.find('.' + append).hide();
    });
}

function check_data(e) {
    var data = $(e).val();
    if (data == '') {
        $(e).removeAttr('style');
    } else {
        e.style.height = (e.scrollHeight) + 'px'
    }
}
function share_fb(url) {
    window.open('https://www.facebook.com/sharer/sharer.php?u=' + url, 'facebook-share-dialog', "width=626, height=436")
}
function share_tw(url) {
    window.open('https://twitter.com/intent/tweet?url=' + url, 'twitter-share-dialog', "width=626, height=436")
}
function share_vk(url) {
    window.open('http://vk.com/share.php?url=' + url, 'vk-share-dialog', "width=626, height=436")
}
function share_in(url) {
    window.open('https://www.linkedin.com/sharing/share-offsite/?url=' + url, 'in-share-dialog', "width=626, height=436")
}

$('.box_cm_vl').delegate(".cm_img_ct", "click", function () {
    $(this).next().click();
})

function preview_image(e, element) {
    var _URL = window.URL || window.webkitURL;
    var file, img;
    if ((file = element.files[0])) {
        if (file.size < 3145728) {
            img = new Image();
            img.onload = function () {
                img.src = _URL.createObjectURL(file);
            }
        }
    }
    preview_before_upload(e, element);
}

function preview_before_upload(event, elem, t) {
    if (typeof FileReader == "undefined") return true;
    var elem = $(elem);
    var id = $(elem).attr('id');
    var files = event.target.files;
    for (var i = 0, file; file = files[i]; i++) {
        if (file.size > 3145728) {
            alert('Vui lòng chọn file dung lượng nhỏ hơn 3MB');
        } else {
            if (file.type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = (function (theFile) {
                    return function (event) {
                        var image = event.target.result;
                        $('.for_' + id).remove();
                        if (id == 'secleimg') {
                            $('.input_comment').append('<div class="box_load_img for_' + id + '"><img src="' + image + '" class="load_img_cm" alt="bình luận ảnh"><span onclick="remove_icm(`' + id + '`)" class="del_icm">&#215;</span></div>');
                        } else {
                            $('.input_reply').append('<div class="box_load_img for_' + id + '"><img src="' + image + '" class="load_img_cm" alt="bình luận ảnh"><span onclick="remove_icm(`' + id + '`)" class="del_icm">&#215;</span></div>');
                        }
                        $('#' + t).hide();
                    };
                })(file);
                reader.readAsDataURL(file);
            }
        }
    }
}

function remove_icm(t) {
    $('.for_' + t).remove();
    $('#' + t).val('');
}


// còn cần dữ liệu phù hợp
var arr_friend = [];


$('#list_friend_chat img').each(function () {
    var name = $(this).attr('alt');
    var img = $(this).attr('src');
    var id_c = $(this).attr('data-id');
    arr_friend.push([name, img, id_c]);
});



autotag(document.getElementById("ct_cm"), arr_friend, 'tag_friend', []);
