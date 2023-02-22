<?
include("config.php");
$id_sp = getValue('id_sp', 'int', 'POST', '');
$id_nhom = getValue('id_nhom', 'int', 'POST', '');
// if ($id_sp == 1) { echo ""; }
// Bất động sản Nhà đất
if ($id_sp == 18) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN MUA / CẦN THUÊ</p>
                <p class="fs_14_16 mt_10">Cần thuê</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KHU VỰC</p>
                <p class="fs_14_16 mt_10">Hoàng Mai, Hà Nội</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TỔNG SỐ TẦNG</p>
                <p class="fs_14_16 mt_10">4</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG VỆ SINH</p>
                <p class="fs_14_16 mt_10">4</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG NGỦ</p>
                <p class="fs_14_16 mt_10">5</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10">Nội thất đầy đủ</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10">2500 m²</p>
            </div>
        </div>
    </div>

<? }
// Bất động sản Văn phòng
else if ($id_sp == 19) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN MUA / CẦN THUÊ</p>
                <p class="fs_14_16 mt_10">Cần mua</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÒA NHÀ</p>
                <p class="fs_14_16 mt_10">Nơ 36 Bắc Linh Đàm</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KHU VỰC</p>
                <p class="fs_14_16 mt_10">Hoàng Mai, Hà Nội</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TỔNG SỐ TẦNG</p>
                <p class="fs_14_16 mt_10">4</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10">Nội thất đầy đủ</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10">2500 m²</p>
            </div>
        </div>
    </div>
<? }
// Bất động sản Căn hộ chung cư
else if ($id_sp == 20) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN MUA / CẦN THUÊ</p>
                <p class="fs_14_16 mt_10">Cần mua</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TOÀ NHÀ</p>
                <p class="fs_14_16 mt_10">CT 32 Bắc Linh Đàm</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KHU VỰC</p>
                <p class="fs_14_16 mt_10">Hoàng Mai, Hà Nội</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI HÌNH CĂN HỘ</p>
                <p class="fs_14_16 mt_10">Penthouse</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TỔNG SỐ TẦNG</p>
                <p class="fs_14_16 mt_10">3</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG NGỦ</p>
                <p class="fs_14_16 mt_10">3</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG VỆ SINH</p>
                <p class="fs_14_16 mt_10">3</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10">Nội thất cao cấp</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10">2500 m²</p>
            </div>
        </div>
    </div>
<? }
// Bất động sản Đất
else if ($id_sp == 21) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN MUA / CẦN THUÊ</p>
                <p class="fs_14_16 mt_10">Cần thuê</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÒA DỰ ÁN</p>
                <p class="fs_14_16 mt_10">Nơ 36 Bắc Linh Đàm</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KHU VỰC</p>
                <p class="fs_14_16 mt_10">Hoàng Mai, Hà Nội</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI HÌNH ĐẤT</p>
                <p class="fs_14_16 mt_10">Đất thổ cư</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HƯỚNG ĐẤT</p>
                <p class="fs_14_16 mt_10">Đông Bắc</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIẤY TỜ PHÁP LÝ</p>
                <p class="fs_14_16 mt_10">Đang chờ sổ</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10">10000 m²</p>
            </div>
        </div>
    </div>
<? }
// Bất động sản Nhà trong ngõ
else if ($id_sp == 22) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN MUA / CẦN THUÊ</p>
                <p class="fs_14_16 mt_10">Cần mua</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KHU VỰC</p>
                <p class="fs_14_16 mt_10">Hoàng Mai, Hà Nội</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TỔNG SỐ TẦNG</p>
                <p class="fs_14_16 mt_10">4</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG NGỦ</p>
                <p class="fs_14_16 mt_10">4</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG VỆ SINH</p>
                <p class="fs_14_16 mt_10">3</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10">Nội thất cao cấp</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10">2500 m²</p>
            </div>
        </div>
    </div>
<? }
// Bất động sản Nhà mặt phố
else if ($id_sp == 23) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN MUA / CẦN THUÊ</p>
                <p class="fs_14_16 mt_10">Cần mua</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KHU VỰC</p>
                <p class="fs_14_16 mt_10">Hoàng Mai, Hà Nội</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TỔNG SỐ TẦNG</p>
                <p class="fs_14_16 mt_10">4</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG NGỦ</p>
                <p class="fs_14_16 mt_10">4</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG VỆ SINH</p>
                <p class="fs_14_16 mt_10">3</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10">Nội thất cao cấp</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10">2500 m²</p>
            </div>
        </div>
    </div>
<? }
// Bất động sản Nhà riêng, nguyên căn
else if ($id_sp == 24) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN MUA / CẦN THUÊ</p>
                <p class="fs_14_16 mt_10">Cần mua</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KHU VỰC</p>
                <p class="fs_14_16 mt_10">Hoàng Mai, Hà Nội</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TỔNG SỐ TẦNG</p>
                <p class="fs_14_16 mt_10">4</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG NGỦ</p>
                <p class="fs_14_16 mt_10">4</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG VỆ SINH</p>
                <p class="fs_14_16 mt_10">3</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10">Nội thất cao cấp</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10">2500 m²</p>
            </div>
        </div>
    </div>
<? }
// Bất động sản Cửa hàng
else if ($id_sp == 25) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN MUA / CẦN THUÊ</p>
                <p class="fs_14_16 mt_10">Cần mua</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÒA NHÀ</p>
                <p class="fs_14_16 mt_10">20C</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KHU VỰC</p>
                <p class="fs_14_16 mt_10">Hoàng Mai, Hà Nội</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TẦNG SỐ</p>
                <p class="fs_14_16 mt_10">6</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10">Nội thất cao cấp</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10">2500 m²</p>
            </div>
        </div>
    </div>
<? }
// ship
else if ($id_sp == 3) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">KHU VỰC GIAO NHẬN HÀNG</p>
                <p class="fs_14_16 mt_10">Hoàng Mai</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">THỜI GIAN LÀM VIỆC</p>
                <p class="fs_14_16 mt_10">6:00 AM - 22:00 PM</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI XE</p>
                <p class="fs_14_16 mt_10">Xe máy</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI HÀNG HOÁ GIAO</p>
                <p class="fs_14_16 mt_10">Dễ vỡ</p>
            </div>
        </div>
    </div>
<? }
// Mẹ và bé Đồ cho mẹ
else if ($id_sp == 26) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Mẹ và bé Đồ cho bé
else if ($id_sp == 27) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Dịch vụ - Giải trí Dịch vụ
else if ($id_sp == 28) {
    echo ""; ?>
<? }
// Dịch vụ - Giải trí Nhạc cụ
else if ($id_sp == 29) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI NHẠC CỤ</p>
                <p class="fs_14_16 mt_10">Guitar</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Dịch vụ - Giải trí Sách
else if ($id_sp == 30) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Dịch vụ - Giải trí Đồ sưu tầm, đồ cổ
else if ($id_sp == 31) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10">Guitar</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Cũ</p>
            </div>
        </div>
    </div>
<? }
// Dịch vụ - Giải trí Thiết bị chơi game || Dịch vụ - Giải trí Sở thích khác
else if ($id_sp == 32 || $id_sp == 33) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Cũ</p>
            </div>
        </div>
    </div>
<? }
// Thể thao Dụng cụ thể thao
else if ($id_sp == 34) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÔN THỂ THAO</p>
                <p class="fs_14_16 mt_10">Ván trượt</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10">Ván trượt & giày Patin</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Thể thao Thời trang thể thao
else if ($id_sp == 35) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÔN THỂ THAO</p>
                <p class="fs_14_16 mt_10">Ván trượt</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI THỜI TRANG</p>
                <p class="fs_14_16 mt_10">Ván trượt & giày Patin</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Thể thao Phụ kiện thể thao
else if ($id_sp == 36) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÔN THỂ THAO</p>
                <p class="fs_14_16 mt_10">golf</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI PHỤ KIỆN</p>
                <p class="fs_14_16 mt_10">Bóng golf</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Thực phẩm đồ uống Thực phẩm
else if ($id_sp == 37) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI THỰC PHẨM</p>
                <p class="fs_14_16 mt_10">Đồ khô</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐƠN VỊ</p>
                <p class="fs_14_16 mt_10">300gr</p>
            </div>
        </div>
    </div>
<? }
// Thực phẩm đồ uống Đồ uống
else if ($id_sp == 38) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI ĐỒ UỐNG</p>
                <p class="fs_14_16 mt_10">Nước giải khát</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐƠN VỊ</p>
                <p class="fs_14_16 mt_10">300ml</p>
            </div>
        </div>
    </div>
<? }
// Thú cưng Gà
else if ($id_sp == 39) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỐNG THÚ CƯNG</p>
                <p class="fs_14_16 mt_10">Gà Tân Châu</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐỘ TUỔI</p>
                <p class="fs_14_16 mt_10">Trên 1 năm</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ THÚ CƯNG</p>
                <p class="fs_14_16 mt_10">Trung bình</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỚI TÍNH</p>
                <p class="fs_14_16 mt_10">Đực</p>
            </div>
        </div>
    </div>
<? }
// Thú cưng Chó
else if ($id_sp == 40) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỐNG THÚ CƯNG</p>
                <p class="fs_14_16 mt_10">Chó Alaska</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐỘ TUỔI</p>
                <p class="fs_14_16 mt_10">Trên 1 năm</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ THÚ CƯNG</p>
                <p class="fs_14_16 mt_10">Nhỏ</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỚI TÍNH</p>
                <p class="fs_14_16 mt_10">Đực</p>
            </div>
        </div>
    </div>
<? }
// Thú cưng Mèo
else if ($id_sp == 41) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỐNG THÚ CƯNG</p>
                <p class="fs_14_16 mt_10">Mèo Anh lông dài</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐỘ TUỔI</p>
                <p class="fs_14_16 mt_10">Trên 1 năm</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ THÚ CƯNG</p>
                <p class="fs_14_16 mt_10">Trung bình</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỚI TÍNH</p>
                <p class="fs_14_16 mt_10">Cái</p>
            </div>
        </div>
    </div>
<? }
// Thú cưng Chim
else if ($id_sp == 42) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỐNG THÚ CƯNG</p>
                <p class="fs_14_16 mt_10">Chim Hoàng Yến</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐỘ TUỔI</p>
                <p class="fs_14_16 mt_10">Trên 1 năm</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ THÚ CƯNG</p>
                <p class="fs_14_16 mt_10">Nhỏ</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỚI TÍNH</p>
                <p class="fs_14_16 mt_10">Cái</p>
            </div>
        </div>
    </div>
<? }
// Thú cưng Thú cưng khác
else if ($id_sp == 43) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐỘ TUỔI</p>
                <p class="fs_14_16 mt_10">Trên 1 năm</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ THÚ CƯNG</p>
                <p class="fs_14_16 mt_10">Nhỏ</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỚI TÍNH</p>
                <p class="fs_14_16 mt_10">Cái</p>
            </div>
        </div>
    </div>
<? }
// Thú cưng Đồ ăn, phụ kiện, dịch vụ
else if ($id_sp == 44) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <!-- nhom Đồ ăn -->
        <? if ($id_nhom == 1) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Đồ ăn</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">GIỐNG THÚ CƯNG</p>
                    <p class="fs_14_16 mt_10">Mèo</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TRỌNG LƯỢNG</p>
                    <p class="fs_14_16 mt_10">15g</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THỂ TÍCH</p>
                    <p class="fs_14_16 mt_10">60ml</p>
                </div>
            </div>
        <? }
        // nhom phụ kiện
        else if ($id_nhom == 2) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Phụ kiện</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">GIỐNG THÚ CƯNG</p>
                    <p class="fs_14_16 mt_10">Mèo</p>
                </div>
            </div>
        <? }
        // nhom dịch vụ
        else if ($id_nhom == 3) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Dịch vụ</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">GIỐNG THÚ CƯNG</p>
                    <p class="fs_14_16 mt_10">Chó</p>
                </div>
            </div>
        <? } ?>
    </div>
<? }
// Thời trang Thời trang nam
else if ($id_sp == 45) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Thời trang Thời trang nữ
else if ($id_sp == 46) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Thời trang Đồ đôi, đồng phục
else if ($id_sp == 47) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Thời trang Thời trang bé
else if ($id_sp == 48) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Thời trang Giày dép
else if ($id_sp == 49) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10">Đồ nữ</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Thời trang Phụ kiện
else if ($id_sp == 50) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10">Đồ nam</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Cà vạt</p>
            </div>
        </div>
    </div>
<? }
// Thời trang Túi xách
else if ($id_sp == 51) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10">Túi đeo chéo </p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Thời trang Đồng hồ
else if ($id_sp == 52) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10">Đồng hồ nam </p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Thời trang Nước hoa
else if ($id_sp == 53) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10">Nước hoa nữ</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Đồ dùng văn phòng, công nông nghiệp Đồ dùng văn phòng
else if ($id_sp == 54) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Đồ dùng văn phòng, công nông nghiệp Đồ chuyên dụng, giống nuôi trồng
else if ($id_sp == 55) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Đồ dùng văn phòng, công nông nghiệp Thiết bị giáo dục
else if ($id_sp == 56) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Laptop
else if ($id_sp == 57) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10">Apple</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DÒNG MÁY</p>
                <p class="fs_14_16 mt_10">iPhone 12</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">BỘ VI XỬ LÝ</p>
                <p class="fs_14_16 mt_10">Apple A14 Bionic</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">RAM</p>
                <p class="fs_14_16 mt_10">8GB</p>
            </div>

        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">Ổ CỨNG</p>
                <p class="fs_14_16 mt_10">128GB</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI Ổ CỨNG</p>
                <p class="fs_14_16 mt_10">HDD</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CARD MÀN HÌNH</p>
                <p class="fs_14_16 mt_10">Apple GPU</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH THƯỚC MÀN HÌNH</p>
                <p class="fs_14_16 mt_10">6.3 inches</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10">Còn bảo hành</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Máy tính để bàn
else if ($id_sp == 58) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">BỘ VI XỬ LÝ</p>
                <p class="fs_14_16 mt_10">Apple A14 Bionic</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">RAM</p>
                <p class="fs_14_16 mt_10">4 GB</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">Ổ CỨNG</p>
                <p class="fs_14_16 mt_10">128GB</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI Ổ CỨNG</p>
                <p class="fs_14_16 mt_10">SSD</p>
            </div>

        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CARD MÀN HÌNH</p>
                <p class="fs_14_16 mt_10">NVIDIA GTX</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ MÀN HÌNH</p>
                <p class="fs_14_16 mt_10">16 inches</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10">Còn bảo hành</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Điện thoại di động
else if ($id_sp == 59) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10">Apple</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DÒNG MÁY</p>
                <p class="fs_14_16 mt_10">iPhone 12</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÀU SẮC</p>
                <p class="fs_14_16 mt_10">Tím</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DUNG LƯỢNG</p>
                <p class="fs_14_16 mt_10">64 GB</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10">Còn bảo hành</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Cũ (Chưa sửa chữa)</p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Máy tính bảng
else if ($id_sp == 60) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10">Apple</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DÒNG MÁY</p>
                <p class="fs_14_16 mt_10">iPhone 12</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DUNG LƯỢNG</p>
                <p class="fs_14_16 mt_10">64 GB</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ MÀN HÌNH</p>
                <p class="fs_14_16 mt_10">12,9 inches</p>
            </div>
        </div>
        <div class="row mt-50">

            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10">Còn bảo hành</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Đồ điện tử khác
else if ($id_sp == 61) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10">Còn bảo hành</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Tivi, Loa, Amply, Máy nghe nhạc
else if ($id_sp == 62) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <? if ($id_nhom == 1) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Tivi</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HÃNG</p>
                    <p class="fs_14_16 mt_10">LG</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">KÍCH THƯỚC</p>
                    <p class="fs_14_16 mt_10">55 inches</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">KẾT NỐI INTERNET</p>
                    <p class="fs_14_16 mt_10">Có</p>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI TV</p>
                    <p class="fs_14_16 mt_10">Smart TV</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">BẢO HÀNH</p>
                    <p class="fs_14_16 mt_10">Còn bảo hành</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 2) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Loa</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HÃNG</p>
                    <p class="fs_14_16 mt_10">JBL</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI LOA</p>
                    <p class="fs_14_16 mt_10">Loa Bluetooth</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CÔNG SUẤT</p>
                    <p class="fs_14_16 mt_10">Dưới 100W</p>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">BẢO HÀNH</p>
                    <p class="fs_14_16 mt_10">Còn bảo hành</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 3 || $id_nhom == 6) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Amply</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HÃNG</p>
                    <p class="fs_14_16 mt_10">Pioneer</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CÔNG SUẤT ÂM THANH</p>
                    <p class="fs_14_16 mt_10">Trên 1000W</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">BẢO HÀNH</p>
                    <p class="fs_14_16 mt_10">Còn bảo hành</p>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 4 || $id_nhom == 5) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Tai nghe</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HÃNG</p>
                    <p class="fs_14_16 mt_10">Sony</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">BẢO HÀNH</p>
                    <p class="fs_14_16 mt_10">Còn bảo hành</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Cũ (chưa sửa chữa)</p>
                </div>
            </div>
        <? } else { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Tai nghe</p>
                </div>

                <div class="col text_center">
                    <p class="fs_16_19 font_600">BẢO HÀNH</p>
                    <p class="fs_14_16 mt_10">Còn bảo hành</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Cũ (chưa sửa chữa)</p>
                </div>
            </div>
        <? } ?>
    </div>
<? }
// Đồ điện tử Thiết bị đeo thông minh
else if ($id_sp == 63) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <? if ($id_nhom == 1 || $id_nhom == 2 || $id_nhom == 3) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Đồng hồ thông minh</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HÃNG</p>
                    <p class="fs_14_16 mt_10">Amazfit</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">BẢO HÀNH</p>
                    <p class="fs_14_16 mt_10">Còn bảo hành</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } ?>
    </div>
<? }
// Đồ điện tử Máy ảnh máy quay
else if ($id_sp == 64) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <? if ($id_nhom == 1 || $id_nhom == 2 || $id_nhom == 3) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Máy ảnh</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HÃNG</p>
                    <p class="fs_14_16 mt_10">Nikon</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">BẢO HÀNH</p>
                    <p class="fs_14_16 mt_10">Còn bảo hành</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Cũ (đã sửa chữa)</p>
                </div>
            </div>
        <? } else if ($id_nhom == 4) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Khác</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">BẢO HÀNH</p>
                    <p class="fs_14_16 mt_10">Còn bảo hành</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Cũ (đã sửa chữa)</p>
                </div>
            </div>
        <? } ?>
    </div>
<? }
// Đồ điện tử Phụ kiện, Linh kiện
else if ($id_sp == 65) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <? if ($id_nhom == 1) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LINH KIỆN/PHỤ KIỆN</p>
                    <p class="fs_14_16 mt_10">Phụ kiện</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI PHỤ KIỆN</p>
                    <p class="fs_14_16 mt_10">Phụ kiện máy tính</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Màn hình</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">BẢO HÀNH</p>
                    <p class="fs_14_16 mt_10">Hết bảo hành</p>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 2) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LINH KIỆN/PHỤ KIỆN</p>
                    <p class="fs_14_16 mt_10">Linh kiện</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI LINH KIỆN</p>
                    <p class="fs_14_16 mt_10">Linh kiện điện thoại</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Màn hình</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">BẢO HÀNH</p>
                    <p class="fs_14_16 mt_10">Hết bảo hành</p>
                </div>
            </div>
            <div class="row mt-50">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } ?>
    </div>
<? }
// Nội thất - Ngoại thất Nội thất phòng khách
else if ($id_sp == 66) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <? if ($id_nhom == 1 || $id_nhom == 4 || $id_nhom == 6) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Bàn trà</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CHẤT LIỆU</p>
                    <p class="fs_14_16 mt_10">Gỗ</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 2 || $id_nhom == 3) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Ghế, Sofa</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Ghế massage</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CHẤT LIỆU</p>
                    <p class="fs_14_16 mt_10">Da</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 5) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Đèn</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Đèn halogen </p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 7) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Nội thất Khác</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CHẤT LIỆU</p>
                    <p class="fs_14_16 mt_10">Sắt</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } ?>
    </div>
<? }
// Nội thất - Ngoại thất Nội thất phòng ngủ
else if ($id_sp == 67) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <? if ($id_nhom == 1) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Giường</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Giường đơn</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } elseif ($id_nhom == 2 || $id_nhom == 5 || $id_nhom == 6) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Tủ - Kệ</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Tủ, kệ quần áo</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CHẤT LIỆU</p>
                    <p class="fs_14_16 mt_10">Gỗ công nghiệp</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 3) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Chăn ga gối nệm</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 4) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Tấm ốp tường</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CHẤT LIỆU</p>
                    <p class="fs_14_16 mt_10">Nhựa PVC </p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 7) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Gương</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Gương đèn led cảm ứng</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HÌNH DÁNG</p>
                    <p class="fs_14_16 mt_10">Chữ nhật</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 8) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Quạt</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Quạt phun sương</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THƯƠNG HIỆU</p>
                    <p class="fs_14_16 mt_10">Sunhouse</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 9) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Đèn</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Đèn neon</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 10) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Nội thất khác</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } ?>
    </div>
<? }
// Nội thất - Ngoại thất Nội thất phòng bếp
else if ($id_sp == 68) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <? if ($id_nhom == 1 || $id_nhom == 3) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Bàn ăn</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CHẤT LIỆU</p>
                    <p class="fs_14_16 mt_10">Đá</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 2) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Ghế</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Ghế xoay </p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CHẤT LIỆU</p>
                    <p class="fs_14_16 mt_10">Da</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } elseif ($id_nhom == 4) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Nội thất khác</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } ?>
    </div>
<? }
// Nội thất - Ngoại thất Nội thất phòng tắm
else if ($id_sp == 69) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <? if ($id_nhom == 1 || $id_nhom == 3 || $id_nhom == 4) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Bồn rửa</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THƯƠNG HIỆU</p>
                    <p class="fs_14_16 mt_10">Hafele</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 2) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Gương </p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THƯƠNG HIỆU</p>
                    <p class="fs_14_16 mt_10">DEHOME </p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HÌNH DÁNG</p>
                    <p class="fs_14_16 mt_10">Treo tường</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 5 || $id_nhom == 6) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Bồn cầu </p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THƯƠNG HIỆU</p>
                    <p class="fs_14_16 mt_10">DEHOME </p>
                </div>
            </div>
        <? } ?>
    </div>
<? }
// Nội thất - Ngoại thất Nội thất văn phòng
else if ($id_sp == 70) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <? if ($id_nhom == 1 || $id_nhom == 2 || $id_nhom == 3) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Bàn làm việc</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Bàn Giám đốc</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CHẤT LIỆU</p>
                    <p class="fs_14_16 mt_10">Gỗ tự nhiên</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 4) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Nội thất văn phòng khác</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } ?>
    </div>
<? }
// Nội thất - Ngoại thất Nội thất khác || Nội thất - Ngoại thất Vườn
else if ($id_sp == 71 || $id_sp == 72) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Nội thất - Ngoại thất Ngoại thất
else if ($id_sp == 73) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <? if ($id_nhom == 1 || $id_nhom == 2 || $id_nhom == 3 || $id_nhom == 4 || $id_nhom == 5) { ?>
                    <p class="fs_14_16 mt_10">Cây cảnh</p>
                <? } ?>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Đồ gia dụng Thiết bị điện lạnh
else if ($id_sp == 74) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <? if ($id_nhom == 1 || $id_nhom == 3) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Tủ lạnh - Tủ mát</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HÃNG</p>
                    <p class="fs_14_16 mt_10">Toshiba</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">DUNG TÍCH</p>
                    <p class="fs_14_16 mt_10">200 - 299 lít</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 2) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Điều hoà - Máy lạnh</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HÃNG</p>
                    <p class="fs_14_16 mt_10">Panasonic</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CÔNG SUẤT</p>
                    <p class="fs_14_16 mt_10">> 2 HP</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Cũ (Đã sửa chữa)</p>
                </div>
            </div>
        <? } elseif ($id_nhom == 4) {
        ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Điều hoà - Máy lạnh</p>
                </div>

                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Cũ (Đã sửa chữa)</p>
                </div>
            </div>
        <?
        } ?>
    </div>
<? }
// Đồ gia dụng Thiết bị nhà bếp
else if ($id_sp == 75) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <? if ($id_nhom == 1 || $id_nhom == 2) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Đồ điện nhà bếp</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10">Máy hút mùi</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Mới</p>
                </div>
            </div>
        <? } else if ($id_nhom == 3) { ?>
            <div class="row">
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10">Khác</p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                    <p class="fs_14_16 mt_10">Cũ (Đã sửa chữa)</p>
                </div>
            </div>
        <? } ?>
    </div>
<? }
// Đồ gia dụng Thiết bị theo mùa || Đồ gia dụng Đồ gia dụng khác || Thủ công - Mỹ nghệ - Quà tặng
else if ($id_sp == 76 || $id_sp == 79 || $id_sp == 80 || $id_sp == 81 || $id_sp == 82) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Đồ gia dụng Thiết bị sức khoẻ
else if ($id_sp == 77) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI THIẾT BỊ</p>
                <p class="fs_14_16 mt_10">Dụng cụ massage và trị liệu</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Đồ gia dụng Thiết bị giặt là
else if ($id_sp == 78) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI THIẾT BỊ</p>
                <p class="fs_14_16 mt_10">Bàn là hơi nước</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10">Philips</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CÔNG SUẤT</p>
                <p class="fs_14_16 mt_10">1800W</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Sức khỏe - Sắc đẹp Mỹ phẩm
else if ($id_sp == 83) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI HÌNH</p>
                <p class="fs_14_16 mt_10">Chăm sóc da mặt</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI MỸ PHẨM</p>
                <p class="fs_14_16 mt_10">Kem dưỡng da</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10">La Roche - Posay</p>
            </div>
        </div>
    </div>
<? }
// Sức khỏe - Sắc đẹp Spa
else if ($id_sp == 84) {
    echo ""; ?>
<? }
// Sức khỏe - Sắc đẹp TDụng cụ - Phụ kiện làm đẹp
else if ($id_sp == 85) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI PHỤ KIỆN</p>
                <p class="fs_14_16 mt_10">Dụng cụ trang điểm</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10">Kẹp bấm mi</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Sức khỏe - Sắc đẹp Thực phẩm chức năng
else if ($id_sp == 86) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI THỰC PHẨM CHỨC NĂNG</p>
                <p class="fs_14_16 mt_10">Hỗ trợ tăng cơ</p>
            </div>
        </div>
    </div>
<? }
// Sức khỏe - Sắc đẹp Vật tư y tế
else if ($id_sp == 87) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI VẬT TƯ</p>
                <p class="fs_14_16 mt_10">Bao tay và khẩu trang y tế</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10">Duy Hàng</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Xe cộ Xe đạp
else if ($id_sp == 88) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG XE</p>
                <p class="fs_14_16 mt_10">Asama</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI XE ĐẠP</p>
                <p class="fs_14_16 mt_10">Xe đạp phổ thông</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÀU SẮC</p>
                <p class="fs_14_16 mt_10">Đen</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHẤT LIỆU KHUNG</p>
                <p class="fs_14_16 mt_10">Thép</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10">Còn bảo hành</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Xe cộ Xe máy
else if ($id_sp == 89) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG XE</p>
                <p class="fs_14_16 mt_10">Honda</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DÒNG XE</p>
                <p class="fs_14_16 mt_10">Winner X</p>
            </div>

            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI XE</p>
                <p class="fs_14_16 mt_10">Tay côn/Moto</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DUNG TÍCH</p>
                <p class="fs_14_16 mt_10">150cc</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10">Còn bảo hành</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Xe cộ Ô tô
else if ($id_sp == 90) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG XE</p>
                <p class="fs_14_16 mt_10">Honda</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DÒNG XE</p>
                <p class="fs_14_16 mt_10">Winner X</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">NĂM SẢN XUẤT</p>
                <p class="fs_14_16 mt_10">2021</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ CHỖ</p>
                <p class="fs_14_16 mt_10">5</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">NHIÊN LIỆU</p>
                <p class="fs_14_16 mt_10">Xăng</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÀU SẮC</p>
                <p class="fs_14_16 mt_10">Đen</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Xe cộ Xe đạp điện || Xe cộ Xe máy điện
else if ($id_sp == 91 || $id_sp == 92) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG XE</p>
                <p class="fs_14_16 mt_10">Vinfast</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐỘNG CƠ</p>
                <p class="fs_14_16 mt_10">> 1000W</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÀU SẮC</p>
                <p class="fs_14_16 mt_10">Đen</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Xe cộ Phụ tùng xe
else if ($id_sp == 93) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI PHỤ TÙNG</p>
                <p class="fs_14_16 mt_10">Phụ tùng xe máy</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Xe cộ Nội thất ô tô
else if ($id_sp == 94) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI NỘI THẤT</p>
                <p class="fs_14_16 mt_10">Thảm sàn</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Mới</p>
            </div>
        </div>
    </div>
<? }
// Xe cộ Xe tải, xe khác
else if ($id_sp == 95) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG XE</p>
                <p class="fs_14_16 mt_10">Hino</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TRỌNG TẢI</p>
                <p class="fs_14_16 mt_10">5 tấn</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">NHIÊN LIỆU</p>
                <p class="fs_14_16 mt_10">Dầu</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÀU SẮC</p>
                <p class="fs_14_16 mt_10">Xanh</p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10">Cũ (Chưa sửa chữa)</p>
            </div>
        </div>
    </div>
<? } ?>