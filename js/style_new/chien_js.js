// -------Validate đăng tin đồ điện tử--------
$("#form_dt_amly").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        danhmucsanpham_dt1: "required",
        thietbi: "required",
        hang_sp: "required",
        tinh_trang: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        mota: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        danhmucsanpham_dt1: "Vui lòng nhập tiêu đề",
        thietbi: "Vui lòng chọn thiết bị",
        hang_sp: "Vui lòng chọn hãng sản phẩm",
        tinh_trang: "Vui lòng chọn tình trạng sản phẩm",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập giá sản phẩm",
        mota: "Vui lòng nhập mô tả",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_dt_laptop").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tieude1: "required",
        hangsp: "required",
        dongmay: "required",
        tinhtrang: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        mota: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        tieude1: "Vui lòng nhập tiêu đề",
        hangsp: "Vui lòng chọn thiết bị",
        dongmay: "Vui lòng chọn hãng sản phẩm",
        tinhtrang: "Vui lòng chọn tình trạng sản phẩm",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập giá sản phẩm",
        mota: "Vui lòng nhập mô tả",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_dt_pc").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tieude_pc: "required",
        tinhtrang_pc: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        mota: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        tieude_pc: "Vui lòng nhập tiêu đề",
        tinhtrang_pc: "Vui lòng chọn tình trạng sản phẩm",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập giá sản phẩm",
        mota: "Vui lòng nhập mô tả",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_diachi").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tinh_thanh: "required",
        quan_huyen: "required",
        phuong_xa: "required",
        md_so_nha: "required",
    },
    messages: {
        tinh_thanh: "Vui lòng chọn tỉnh thành",
        quan_huyen: "Vui lòng chọn quận huyện",
        phuong_xa: "Vui lòng chọn phường xã",
        md_so_nha: "Vui lòng nhập địa chỉ chi tiết",
    },
});
$("#form_dt_phone").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tieude_phone: "required",
        hang_phone: "required",
        dong_may: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        tinh_trang: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        mau_sac: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        tieude_phone: "Vui lòng nhập tiêu đề",
        hang_phone: "Vui lòng chọn hãng điện thoại",
        dong_may: "Vui lòng chọn dòng máy",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập đầy đủ giá",
        tinh_trang: "Vui lòng chọn tình trạng sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        mau_sac: "Vui lòng chọn màu sắc",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_dt_tablet").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tieude_tablet: "required",
        hang_tablet: "required",
        dong_may: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        tinh_trang: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        tieude_tablet: "Vui lòng nhập tiêu đề",
        hang_tablet: "Vui lòng chọn hãng máy tính bảng",
        dong_may: "Vui lòng chọn dòng máy",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập đầy đủ giá",
        tinh_trang: "Vui lòng chọn tình trạng sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});


$("#form_dt_camera").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tieude_camera: "required",
        thietbi: "required",
        hang_camera: "required",
        dong_tb: "required",
        tinh_trang: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        tieude_camera: "Vui lòng nhập tiêu đề",
        thietbi: "Vui lòng chọn thiết bị",
        hang_camera: "Vui lòng chọn hãng máy ảnh",
        dong_tb: "Vui lòng chọn dòng thiết bị",
        tinh_trang: "Vui lòng chọn tình trạng sản phẩm",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
// ----------Validate đăng tin bất động sản----------
$("#form_bds_nhadat").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        ban_thue: "required",
        mua_thue: "required",
        tieu_de: "required",
        dientich: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        khuvuc: "required",
        so_nhavs: "required",
        so_phongngu: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        ban_thue: "Vui lòng chọn nhu cầu",
        mua_thue: "Vui lòng chọn nhu cầu",
        tieu_de: "Vui lòng nhập tiêu đề",
        dientich: "Vui lòng nhập diện tích",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập đủ giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        khuvuc: "Vui lòng nhập khu vực",
        so_nhavs: "Vui lòng chọn số phòng vệ sinh",
        so_phongngu: "Vui lòng chọn số phòng ngủ",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_bds_chungcu").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        ban_thue: "required",
        mua_thue: "required",
        tieu_de: "required",
        loaihinh: "required",
        tangso: "required",
        dientich: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        so_nhavs: "required",
        so_phongngu: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        ban_thue: "Vui lòng chọn nhu cầu",
        mua_thue: "Vui lòng chọn nhu cầu",
        tieu_de: "Vui lòng nhập tiêu đề",
        loaihinh: "Vui lòng chọn loại hình căn hộ",
        tangso: "Vui lòng chọn tầng",
        dientich: "Vui lòng nhập diện tích",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập đủ giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        so_nhavs: "Vui lòng chọn số phòng vệ sinh",
        so_phongngu: "Vui lòng chọn số phòng ngủ",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_bds_nhatrongngo").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        ban_thue: "required",
        mua_thue: "required",
        tieu_de: "required",
        khuvuc: "required",
        tang_so: "required",
        dientich: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        so_nhavs: "required",
        so_phongngu: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        ban_thue: "Vui lòng chọn nhu cầu",
        mua_thue: "Vui lòng chọn nhu cầu",
        tieu_de: "Vui lòng nhập tiêu đề",
        khuvuc: "Vui lòng chọn khu vực",
        tang_so: "Vui lòng chọn tầng",
        dientich: "Vui lòng nhập diện tích",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập đủ giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        so_nhavs: "Vui lòng chọn số phòng vệ sinh",
        so_phongngu: "Vui lòng chọn số phòng ngủ",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_bds_nhamatpho").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        ban_thue: "required",
        mua_thue: "required",
        tieu_de: "required",
        khuvuc: "required",
        tang_so: "required",
        dientich: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        so_nhavs: "required",
        so_phongngu: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        ban_thue: "Vui lòng chọn nhu cầu",
        mua_thue: "Vui lòng chọn nhu cầu",
        tieu_de: "Vui lòng nhập tiêu đề",
        khuvuc: "Vui lòng chọn khu vực",
        tang_so: "Vui lòng chọn tầng",
        dientich: "Vui lòng nhập diện tích",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập đủ giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        so_nhavs: "Vui lòng chọn số phòng vệ sinh",
        so_phongngu: "Vui lòng chọn số phòng ngủ",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_bds_nharieng").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        ban_thue: "required",
        mua_thue: "required",
        tieu_de: "required",
        khuvuc: "required",
        tang_so: "required",
        dientich: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        so_nhavs: "required",
        so_phongngu: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        ban_thue: "Vui lòng chọn nhu cầu",
        mua_thue: "Vui lòng chọn nhu cầu",
        tieu_de: "Vui lòng nhập tiêu đề",
        khuvuc: "Vui lòng chọn khu vực",
        tang_so: "Vui lòng chọn tầng",
        dientich: "Vui lòng nhập diện tích",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập đủ giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        so_nhavs: "Vui lòng chọn số phòng vệ sinh",
        so_phongngu: "Vui lòng chọn số phòng ngủ",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_bds_cuahang").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        ban_thue: "required",
        mua_thue: "required",
        tieu_de: "required",
        ten_toanha: "required",
        khuvuc: "required",
        tang_so: "required",
        dientich: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        so_nhavs: "required",
        so_phongngu: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        ban_thue: "Vui lòng chọn nhu cầu",
        mua_thue: "Vui lòng chọn nhu cầu",
        tieu_de: "Vui lòng nhập tiêu đề",
        ten_toanha: "Vui lòng chọn tên tòa nhà",
        khuvuc: "Vui lòng chọn khu vực",
        tang_so: "Vui lòng chọn tầng",
        dientich: "Vui lòng nhập diện tích",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập đủ giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        so_nhavs: "Vui lòng chọn số phòng vệ sinh",
        so_phongngu: "Vui lòng chọn số phòng ngủ",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_bds_dat").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        ban_thue: "required",
        mua_thue: "required",
        tieu_de: "required",
        loaihinh: "required",
        khuvuc: "required",
        tang_so: "required",
        dientich: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        ban_thue: "Vui lòng chọn nhu cầu",
        mua_thue: "Vui lòng chọn nhu cầu",
        tieu_de: "Vui lòng nhập tiêu đề",
        loaihinh: "Vui lòng chọn loại hình đất",
        khuvuc: "Vui lòng chọn khu vực",
        tang_so: "Vui lòng chọn tầng",
        dientich: "Vui lòng nhập diện tích",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập đủ giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
// ---------Validate đăng tin ship----------------------------
$("#form_ship").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tinh: "required",
        huyen: "required",
        tieu_de: "required",
        time_lamviec: "required",
        time_ketthuc: "required",
        tang_so: "required",
        dientich: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        tinh: "Vui lòng chọn tỉnh thành",
        huyen: "Vui lòng chọn quận huyện",
        tieu_de: "Vui lòng nhập tiêu đề",
        time_lamviec: "Vui lòng nhập đủ thời gian làm việc",
        time_ketthuc: "Vui lòng chọn khu vực",
        tang_so: "Vui lòng chọn tầng",
        dientich: "Vui lòng nhập diện tích",
        td_gia_spham: "Vui lòng nhập giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
// ---------------validate đăng tin xe cộ-------------------------
$(".bike").click(function () {
    var form_xeco_circle = $("#form_xeco_circle");
    form_xeco_circle.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            hang_xe: "required",
            loai_xe_dap: "required",
            dong_xe: "required",
            tinhtrang: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            hang_xe: "Vui lòng chọn hãng xe",
            loai_xe_dap: "Vui lòng chọn loại xe",
            dong_xe: "Vui lòng chọn dòng xe",
            tinhtrang: "Vui lòng chọn tình trạng xe",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_xeco_circle.valid() === true) {
        alert("true");
    }
})

$("#form_xeco_moto").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tieu_de: "required",
        hang_xe: "required",
        loai_xe_dap: "required",
        dong_xe: "required",
        loai_xe: "required",
        nam_san_xuat: "required",
        tinhtrang: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        tieu_de: "Vui lòng nhập tiêu đề",
        hang_xe: "Vui lòng chọn hãng xe",
        loai_xe_dap: "Vui lòng chọn loại xe",
        dong_xe: "Vui lòng chọn dòng xe",
        loai_xe: "Vui lòng chọn loại xe",
        nam_san_xuat: "Vui lòng chọn năm sản xuất",
        tinhtrang: "Vui lòng chọn tình trạng xe",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_xeco_car").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tieu_de: "required",
        hang_xe: "required",
        loai_xe_dap: "required",
        dong_xe: "required",
        loai_xe: "required",
        nam_san_xuat: "required",
        tinhtrang: "required",
        hop_so: "required",
        nhien_lieu: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        tieu_de: "Vui lòng nhập tiêu đề",
        hang_xe: "Vui lòng chọn hãng xe",
        loai_xe_dap: "Vui lòng chọn loại xe",
        dong_xe: "Vui lòng chọn dòng xe",
        loai_xe: "Vui lòng chọn loại xe",
        nam_san_xuat: "Vui lòng chọn năm sản xuất",
        tinhtrang: "Vui lòng chọn tình trạng xe",
        hop_so: "Vui lòng chọn tình trạng xe",
        nhien_lieu: "Vui lòng chọn nhiên liệu sử dụng",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_xeco_xedapdien").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tieu_de: "required",
        hang_xe: "required",
        loai_xe_dap: "required",
        dong_xe: "required",
        loai_xe: "required",
        nam_san_xuat: "required",
        tinhtrang: "required",
        hop_so: "required",
        nhien_lieu: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        tieu_de: "Vui lòng nhập tiêu đề",
        hang_xe: "Vui lòng chọn hãng xe",
        loai_xe_dap: "Vui lòng chọn loại xe",
        dong_xe: "Vui lòng chọn dòng xe",
        loai_xe: "Vui lòng chọn loại xe",
        nam_san_xuat: "Vui lòng chọn năm sản xuất",
        tinhtrang: "Vui lòng chọn tình trạng xe",
        hop_so: "Vui lòng chọn tình trạng xe",
        nhien_lieu: "Vui lòng chọn nhiên liệu sử dụng",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_xeco_xemaydien").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tieu_de: "required",
        hang_xe: "required",
        tinhtrang: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        tieu_de: "Vui lòng nhập tiêu đề",
        hang_xe: "Vui lòng chọn hãng xe",
        tinhtrang: "Vui lòng chọn tình trạng xe",
        hop_so: "Vui lòng chọn tình trạng xe",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_xeco_phutung").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tieu_de: "required",
        loai_phu_tung: "required",
        tinhtrang: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        tieu_de: "Vui lòng nhập tiêu đề",
        loai_phu_tung: "Vui lòng chọn loại phụ tùng",
        tinhtrang: "Vui lòng chọn tình trạng xe",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$("#form_xeco_noithatoto").validate({
    errorPlacement: function (error, element) {
        error.appendTo(element.parents(".box_input_infor"));
        error.wrap("<span class='error'>");
        element.parents('.box_input_infor').addClass('validate_input');
    },
    rules: {
        tieu_de: "required",
        loai_noi_that: "required",
        tinhtrang: "required",
        gia_mongmuon1: "required",
        gia_mongmuon2: "required",
        td_gia_spham: "required",
        chitiet_dm: "required",
        td_dia_chi: "required",
        mota: "required",
        captcha_confirm: {
            required: true,
            equalTo: "#captcha",
        },
    },
    messages: {
        tieu_de: "Vui lòng nhập tiêu đề",
        loai_noi_that: "Vui lòng chọn loại nội thất",
        tinhtrang: "Vui lòng chọn tình trạng xe",
        gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
        gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
        td_gia_spham: "Vui lòng nhập giá sản phẩm",
        chitiet_dm: "Vui lòng chọn chi tiết danh mục",
        td_dia_chi: "Vui lòng nhập địa chỉ",
        mota: "Vui lòng nhập mô tả",
        captcha_confirm: {
            required: "Vui lòng nhập mã xác nhận",
            equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
        }
    },
});
$(".dangtin").click(function () {
    var form_xeco_xetaixekhac = $("#form_xeco_xetaixekhac");
    form_xeco_xetaixekhac.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de1: "required",
            hang_xe: "required",
            loai_xe_dap: "required",
            dong_xe: "required",
            trong_tai: "required",
            nhienlieu: "required",
            tinhtrang: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de1: "Vui lòng nhập tiêu đề",
            hang_xe: "Vui lòng chọn hãng xe",
            loai_xe_dap: "Vui lòng chọn loại xe",
            dong_xe: "Vui lòng chọn dòng xe",
            trong_tai: "Vui lòng chọn trọng tải của xe",
            nhienlieu: "Vui lòng chọn nhiên liệu sử dụng",
            tinhtrang: "Vui lòng chọn tình trạng xe",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_xeco_xetaixekhac.valid() === true) {
        alert("true");
    }
})
// -------------Validate đăng tin thú cưng---------------
$(".thucung_ga").click(function () {
    var form_thucung_ga = $("#form_thucung_ga");
    form_thucung_ga.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            giong_thucung: "required",
            do_tuoi: "required",
            kichco: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            giong_thucung: "Vui lòng chọn giống thú cưng",
            do_tuoi: "Vui lòng chọn độ tuổi",
            kichco: "Vui lòng chọn kích cỡ thú cưng",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_thucung_ga.valid() === true) {
        alert("true");
    }
})
$(".thucung_cho").click(function () {
    var form_thucung_cho = $("#form_thucung_cho");
    form_thucung_cho.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            giong_thucung: "required",
            do_tuoi: "required",
            kichco: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            giong_thucung: "Vui lòng chọn giống thú cưng",
            do_tuoi: "Vui lòng chọn độ tuổi",
            kichco: "Vui lòng chọn kích cỡ thú cưng",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_thucung_cho.valid() === true) {
        alert("true");
    }
})
$(".thucung_meo").click(function () {
    var form_thucung_meo = $("#form_thucung_meo");
    form_thucung_meo.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            giong_thucung: "required",
            do_tuoi: "required",
            kichco: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            giong_thucung: "Vui lòng chọn giống thú cưng",
            do_tuoi: "Vui lòng chọn độ tuổi",
            kichco: "Vui lòng chọn kích cỡ thú cưng",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_thucung_meo.valid() === true) {
        alert("true");
    }
})
$(".thucung_chim").click(function () {
    var form_thucung_chim = $("#form_thucung_chim");
    form_thucung_chim.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            giong_thucung: "required",
            do_tuoi: "required",
            kichco: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            giong_thucung: "Vui lòng chọn giống thú cưng",
            do_tuoi: "Vui lòng chọn độ tuổi",
            kichco: "Vui lòng chọn kích cỡ thú cưng",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_thucung_chim.valid() === true) {
        alert("true");
    }
})
$(".pk_thucung").click(function () {
    var form_pk_thucung = $("#form_pk_thucung");
    form_pk_thucung.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            giong_thucung: "required",
            nhomsanpham: "required",
            han_sd: "required",
            trong_luong: "required",
            thetich: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            giong_thucung: "Vui lòng chọn giống thú cưng",
            nhomsanpham: "Vui lòng chọn nhóm sản phẩm",
            han_sd: "Vui lòng nhập hạn sử dụng",
            trong_luong: "Vui lòng nhập trọng lượng",
            thetich: "Vui lòng nhập thể tích",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_pk_thucung.valid() === true) {
        alert("true");
    }
})
$(".thucung_khac").click(function () {
    var form_thucung_khac = $("#form_thucung_khac");
    form_thucung_khac.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            do_tuoi: "required",
            kichco: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            do_tuoi: "Vui lòng chọn độ tuổi",
            kichco: "Vui lòng chọn kích cỡ",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_thucung_khac.valid() === true) {
        alert("true");
    }
})
// -------------------Validate đăng tin đồ gia dụng---------------







// ---------------Validate đăng tin sức khỏe - sắc đẹp----------------
$(".mypham").click(function () {
    var form_mypham = $("#form_mypham");
    form_mypham.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            loaihinh: "required",
            loai_mypham: "required",
            hang: "required",
            hansudung: "required",
            tinhtrang: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            loaihinh: "Vui lòng chọn loại hình",
            loai_mypham: "Vui lòng chọn loại mỹ phẩm",
            hang: "Vui lòng chọn hãng sản phẩm",
            hansudung: "Vui lòng nhập hạn sử dụng",
            tinhtrang: "Vui lòng chọn tình trạng",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_mypham.valid() === true) {
        alert("true");
    }
})
$(".mypham").click(function () {
    var form_mypham = $("#form_mypham");
    form_mypham.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            loaihinh: "required",
            loai_mypham: "required",
            hang: "required",
            hansudung: "required",
            tinhtrang: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            loaihinh: "Vui lòng chọn loại hình",
            loai_mypham: "Vui lòng chọn loại mỹ phẩm",
            hang: "Vui lòng chọn hãng sản phẩm",
            hansudung: "Vui lòng nhập hạn sử dụng",
            tinhtrang: "Vui lòng chọn tình trạng",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_mypham.valid() === true) {
        alert("true");
    }
})
$(".dt_spa").click(function () {
    var form_spa = $("#form_spa");
    form_spa.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_spa.valid() === true) {
        alert("true");
    }
})
$(".pk_lamdep").click(function () {
    var form_pk_lamdep = $("#form_pk_lamdep");
    form_pk_lamdep.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            loai_phukien: "required",
            tinhtrang: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            loai_phukien: "Vui lòng chọn loại phụ kiện",
            tinhtrang: "Vui lòng chọn tình trạng",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_pk_lamdep.valid() === true) {
        alert("true");
    }
})
$(".tpchucnang").click(function () {
    var form_tpchucnang = $("#form_tpchucnang");
    form_tpchucnang.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            loai_thucpham: "required",
            han_sd: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            loai_thucpham: "Vui lòng chọn loại thực phẩm",
            han_sd: "Vui lòng nhập hạn sử dụng",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_tpchucnang.valid() === true) {
        alert("true");
    }
})
$(".vattu_yte").click(function () {
    var form_vattu_yte = $("#form_vattu_yte");
    form_vattu_yte.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            tieu_de: "required",
            loai_vattu: "required",
            tinhtrang: "required",
            gia_mongmuon1: "required",
            gia_mongmuon2: "required",
            td_gia_spham: "required",
            chitiet_dm: "required",
            td_dia_chi: "required",
            mota: "required",
            captcha_confirm: {
                required: true,
                equalTo: "#captcha",
            },
        },
        messages: {
            tieu_de: "Vui lòng nhập tiêu đề",
            loai_vattu: "Vui lòng chọn loại vật tư",
            tinhtrang: "Vui lòng chọn tình trạng",
            gia_mongmuon1: "Vui lòng nhập giá mong muốn từ",
            gia_mongmuon2: "Vui lòng nhập giá mong muốn đến",
            td_gia_spham: "Vui lòng nhập giá sản phẩm",
            chitiet_dm: "Vui lòng chọn chi tiết danh mục",
            td_dia_chi: "Vui lòng nhập địa chỉ",
            mota: "Vui lòng nhập mô tả",
            captcha_confirm: {
                required: "Vui lòng nhập mã xác nhận",
                equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
            }
        },
    });
    if (form_vattu_yte.valid() === true) {
        alert("true");
    }
})

// -------------Validate hồ sơ chỉnh sửa thông tin--------------------
$(".sub_luu").click(function () {
    var form_edit_tt = $("#form_edit_tt");
    form_edit_tt.validate({
        errorPlacement: function (error, element) {
            error.appendTo(element.parents(".box_input_infor"));
            error.wrap("<span class='error'>");
            element.parents('.box_input_infor').addClass('validate_input');
        },
        rules: {
            hovaten: "required",
            sdt: {
                required: true,
                minlength: 10,
                number: true
            },
            gian_hang: "required",
            gian_hang_phone: {
                required: true,
                minlength: 10,
                number: true
            },
            tinhthanh: "required",
            address: "required",
            // giayphep: "required",
            mota: "required",
        },
        messages: {
            hovaten: "Vui lòng nhập họ tên",
            sdt: {
                required: "Vui lòng nhập số điện thoại",
                minlength: "Số điện thoại không đúng",
                number: "Vui lòng chỉ nhập số"
            },
            gian_hang: "Vui lòng tên gian hàng",
            gian_hang_phone: {
                required: "Vui lòng nhập số điện thoại",
                minlength: "Số điện thoại không đúng",
                number: "Vui lòng chỉ nhập số"
            },
            tinhthanh: "Vui lòng chọn tỉnh thành",
            address: "Vui lòng nhập địa chỉ liên hệ",
            // giayphep: "Vui lòng tải giấy tờ",
            mota: "Vui lòng nhập mô tả",
        },

    });
    if (form_edit_tt.valid() === true) {
        // $('.hd_modal_tindang').fadeIn(500);

    }
})


// Validate chỉnh sửa thông tin người mua