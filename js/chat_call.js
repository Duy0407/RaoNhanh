const socket = io.connect('https://socket.timviec365.vn', {
	secure: true,
	enabledTransports: ["https"],
	transports: ['websocket', 'polling']
});


function get_Cookie(cname) {
	var name = cname + "=";
	var decodedCookie = decodeURIComponent(document.cookie);
	var ca = decodedCookie.split(';');
	for (var i = 0; i < ca.length; i++) {
		var c = ca[i];
		while (c.charAt(0) == ' ') {
			c = c.substring(1);
		}
		if (c.indexOf(name) == 0) {
			return c.substring(name.length, c.length);
		}
	}
	return "";
}

const id_chat365 = get_Cookie('id_chat365');
const stop_no = get_Cookie('stop_no');



if (typeof id_chat365 !== 'undefined' && id_chat365 > 0) {
	// Khai báo online khi đăng nhập (1 lần)
	socket.emit("Login", id_chat365, "raonhanh365");
	if (stop_no == '') {
		// Nhận dữ liệu tin nhắn
		socket.on('SendNotificationToHHP', (message, userName, conversationId, conversationName, senderId) => {
			if (conversationName != '') {
				$('.tb_chat365 .name').text(conversationName);
			} else {
				$('.tb_chat365 .name').text(userName);
			}
			if (message.includes("was add friend to")) { message = 'Lời mời kết bạn'; }
			if (message.includes("joined this consersation")) { message = 'Một thành viên đã tham gia cuộc trò chuyện'; }
			if (message.includes("edited a pin to")) { message = 'Tin nhắn được ghim đã thay đổi'; }
			if (message.includes("unpinned a message")) { message = 'Tin nhắn ghim đã bị gỡ bỏ'; }
			if (message.includes("pinned a message")) { message = 'Tin nhắn vừa được ghim'; }
			if (message.includes("has removed") || message.includes("added") || message.includes("from this conversation")) {
				message = '';
			}
			if (message != '' && $('.tb_chat365').is(":hidden")) {
				$('.tb_chat365 .nd').text(message);
				$('.tb_chat365 .btn_login').attr('href', 'https://chat365.timviec365.vn/conversation-c' + conversationId + '-u' + id_chat365);
				$('.tb_chat365').show();
			}
		});
	}
}

var arr_online;
// Sử dụng emit và on lấy danh sách online theo web
socket.emit('GetOnline', 'raonhanh365');
socket.on('GetOnline', (userId) => {
	arr_online = userId;
	var i;
	for (i = 0; i < arr_online.length; ++i) {

		$('.item_chat[id-chat="' + Number(arr_online[i]) + '"]').addClass('onl_active');
		$(".chat_btn[id-chat='" + Number(arr_online[i]) + "']").addClass('bidder_online');
	}

	if ($('#list_chat').length) {
		$.ajax({
			url: "/ajax/get_online.php",
			type: "POST",
			data: {
				online_arr: arr_online,
			},
			success: function (data) {
				if (data != '') {
					$('#list_chat').html(data);
					$('#list_chat2').html(data);
					// slick_cus_onl();
				}
			}
		});
	}
});

socket.on('Login', userId => {
	var index = arr_online.indexOf(userId);
	if (index == -1) {
		arr_online.push(userId);
	}
	$('.item_chat[id-chat="' + userId + '"]').addClass('onl_active');
	if ($('#list_chat').length) {
		$.ajax({
			url: "/ajax/get_online.php",
			type: "POST",
			data: {
				online_id: userId,
			},
			success: function (data) {
				if (data != '') {
					$('#list_chat').prepend(data);
				}
			}
		});
	}
});

socket.on('Logout', userId => {
	var index = arr_online.indexOf(userId);
	if (index !== -1) {
		arr_online.splice(index, 1);
	}
	$('.box_chat[id-chat="' + userId + '"]').remove();
	$('.item_chat[id-chat="' + userId + '"]').removeClass('onl_active');
});

function remove_on(id) {
	// ẩn box thông báo
	$('.tb_chat365').hide();
	$('#xh_f').remove();
	// // Đưa toàn bộ tin nhắn chưa đọc về đã đọc
	// $.ajax({
	// 	url: "/ajax/all_seen_chat.php",
	// 	type: "POST",
	// 	data: {
	// 		seen : id,
	// 	},
	// 	success: function(data) {}
	// });
}


function checklogin2() {
	return $("#user_dn").removeClass("error"), $("#pass_dn").removeClass("error"), $(".noti-error").remove(), "" == $("#user_dn").val() ? ($("#user_dn").addClass("error"), $("#user_dn").after("<div class='noti-error'>Bạn chưa nhập username</div>")) : $("#user_dn").val().length < 7 ? ($("#user_dn").addClass("error"), $("#user_dn").after("<div class='noti-error'>Username phải lớn hơn 6 ký tự</div>")) : 1 == hasWhiteSpace($("#user_dn").val()) ? ($("#user_dn").addClass("error"), $("#user_dn").after("<div class='noti-error'>Username không được chứa khoảng trắng</div>"), $("#user_dn").focus()) : "" == $("#pass_dn").val() ? ($("#pass_dn").addClass("error"), $("#pass_dn").after("<div class='noti-error'>Bạn chưa nhập mật khẩu</div>")) : $("#pass_dn").val().length < 7 ? ($("#pass_dn").addClass("error"), $("#pass_dn").after("<div class='noti-error'>Mật khẩu phải lớn hơn 6 ký tự</div>")) : $.ajax({
		type: "POST",
		url: "/ajax/checkpass.php",
		data: { user: $("#user_dn").val(), pass: $("#pass_dn").val() },
		success: function (r) {
			0 == r ? 0 == $("#pass_dn").hasClass("error") && ($("#pass_dn").addClass("error"), $("#pass_dn").after("<div class='noti-error'>Username hoặc Mật khẩu sai</div>")) : ($("#loginForm_dn").removeAttr("onsubmit"), $("#loginForm_dn").submit())
		}
	}), !1
}


function close_tb() {
	$('.tb_chat365').hide();
	$('#xh_f').remove();
}


$('#cl_ovl_dn').click(function () {
	$('.overlay_dn').removeClass('active');
})

$('.op_ovl_dn').click(function () {
	// alert("1");
	$('.overlay_dn').addClass('active');
})

$('.item_chat').click(function () {
	if ($(this).hasClass('onl_active')) {
		var x = $(this).attr('id-chat');
		if (x > 0) {
			$.ajax({
				url: "/ajax/chat_now.php",
				type: "POST",
				data: {
					u_id: x,
				},
				success: function (data) {
					if (data != '') {
						window.open(data, '_blank').focus();
					}
				}
			});
		}
	}
})