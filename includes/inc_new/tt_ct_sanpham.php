<?

// Bất động sản Nhà đất
if ($new_cate_id == 11) { ?>
    <h2 class="pc_title pl-10">Thông tin chi tiết</h2>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN BÁN / CHO THUÊ</p>
                <p class="fs_14_16 mt_10"><?= $ban_mua[$can_ban_mua] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÊN TOÀ NHÀ / KHU DÂN CƯ</p>
                <p class="fs_14_16 mt_10"><?= $ten_toa_nha ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TỔNG SỐ TẦNG</p>
                <p class="fs_14_16 mt_10"><?= $tongtang_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HƯỚNG CỬA CHÍNH</p>
                <p class="fs_14_16 mt_10"><?= $huongchinh[$huong_chinh] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIẤY TỜ PHÁP LÝ</p>
                <p class="fs_14_16 mt_10"><?= $giayto[$giay_to_phap_ly] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU DÀI</p>
                <p class="fs_14_16 mt_10"><?= $chieu_dai ?> m</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU NGANG</p>
                <p class="fs_14_16 mt_10"><?= $chieu_rong ?> m</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang_nt[$tinh_trang_noi_that] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10"><?= $dien_tich ?> m2</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG NGỦ</p>
                <p class="fs_14_16 mt_10"><?= $phongnhu_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ NHÀ VỆ SINH</p>
                <p class="fs_14_16 mt_10"><?= $vesinh_ok['so_luong'] ?></p>
            </div>


            <? if ($dac_diem != 0) {
                if ($dac_diem == 1) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="fs_14_16 mt_10">Hẻm xe hơi</p>
                    </div>
                <? } else if ($dac_diem == 2) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="fs_14_16 mt_10">Nở hậu</p>
                    </div>
                <? } else if ($dac_diem == 3) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="fs_14_16 mt_10">Hẻm xe hơi, Nở hậu</p>
                    </div>
            <? }
            } ?>


        </div>
    </div>

<? }
// Bất động sản Văn phòng
else if ($new_cate_id == 34) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN BÁN / CHO THUÊ</p>
                <p class="fs_14_16 mt_10"><?= $ban_mua[$can_ban_mua] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÊN TOÀ NHÀ / KHU DÂN CƯ</p>
                <p class="fs_14_16 mt_10"><?= $ten_toa_nha ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TẦNG SỐ</p>
                <p class="fs_14_16 mt_10"><?= $tang_so ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HƯỚNG CỬA CHÍNH</p>
                <p class="fs_14_16 mt_10"><?= $huongchinh[$huong_chinh] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang_nt[$tinh_trang_noi_that] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIẤY TỜ PHÁP LÝ</p>
                <p class="fs_14_16 mt_10"><?= $giayto[$giay_to_phap_ly] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU DÀI</p>
                <p class="fs_14_16 mt_10"><?= $chieu_dai ?> m</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU NGANG</p>
                <p class="fs_14_16 mt_10"><?= $chieu_rong ?> m</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10"><?= $dien_tich ?> m2</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI HÌNH VĂN PHÒNG</p>
                <p class="fs_14_16 mt_10"><?= $loaihinh_vp_ok[$loaihinh_vp] ?></p>
            </div>
        </div>
    </div>
<? }
// Bất động sản Căn hộ chung cư
else if ($new_cate_id == 27) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN BÁN / CHO THUÊ</p>
                <p class="fs_14_16 mt_10"><?= $ban_mua[$can_ban_mua] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÊN TOÀ NHÀ / KHU DÂN CƯ</p>
                <p class="fs_14_16 mt_10"><?= $ten_toa_nha ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI HÌNH CĂN HỘ</p>
                <p class="fs_14_16 mt_10"><?= $loaihinhcanho[$loai_hinh_canho] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TẦNG SỐ</p>
                <p class="fs_14_16 mt_10"><?= $tang_so ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG NGỦ</p>
                <p class="fs_14_16 mt_10"><?= $phongnhu_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG VỆ SINH</p>
                <p class="fs_14_16 mt_10"><?= $vesinh_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang_nt[$tinh_trang_noi_that] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIẤY TỜ PHÁP LÝ</p>
                <p class="fs_14_16 mt_10"><?= $giayto[$giay_to_phap_ly] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU DÀI</p>
                <p class="fs_14_16 mt_10"><?= $chieu_dai ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU NGANG</p>
                <p class="fs_14_16 mt_10"><?= $chieu_rong ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10"><?= $dien_tich ?> m2</p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <? if ($tinh_trang == 1) { ?>
                    <p class="fs_14_16 mt_10">Đã bàn giao</p>
                <? }
                if ($tinh_trang == 2) { ?>
                    <p class="fs_14_16 mt_10">Chưa bàn giao</p>
                <? } ?>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HƯỚNG BAN CÔNG</p>
                <p class="fs_14_16 mt_10"><?= $huong_ban_cong_ok[$huong_ban_cong] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HƯỚNG CỬA CHÍNH</p>
                <p class="fs_14_16 mt_10"><?= $huongchinh[$huong_chinh] ?></p>
            </div>

        </div>
    </div>
<? }
// Bất động sản Đất
else if ($new_cate_id == 12) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN BÁN / CHO THUÊ</p>
                <p class="fs_14_16 mt_10"><?= $ban_mua[$can_ban_mua] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÊN DỰ ÁN</p>
                <p class="fs_14_16 mt_10"><?= $ten_toa_nha ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI HÌNH ĐẤT</p>
                <p class="fs_14_16 mt_10"><?= $loaihinhdat[$loai_hinh_dat] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HƯỚNG ĐẤT</p>
                <p class="fs_14_16 mt_10"><?= $huongchinh[$huong_chinh] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIẤY TỜ PHÁP LÝ</p>
                <p class="fs_14_16 mt_10"><?= $giayto[$giay_to_phap_ly] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU DÀI</p>
                <p class="fs_14_16 mt_10"><?= $chieu_dai ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU NGANG</p>
                <p class="fs_14_16 mt_10"><?= $chieu_rong ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10"><?= $dien_tich ?> m²</p>
            </div>
        </div>
    </div>
<? }
// Bất động sản Nhà trong ngõ
else if ($new_cate_id == 26) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN BÁN / CHO THUÊ</p>
                <p class="fs_14_16 mt_10"><?= $ban_mua[$can_ban_mua] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÊN TÒA NHÀ / KHU DÂN CƯ</p>
                <p class="fs_14_16 mt_10"><?= $ten_toa_nha ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TỔNG SỐ TẦNG</p>
                <p class="fs_14_16 mt_10"><?= $tongtang_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HƯỚNG CỬA CHÍNH</p>
                <p class="fs_14_16 mt_10"><?= $huongchinh[$huong_chinh] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG NGỦ</p>
                <p class="fs_14_16 mt_10"><?= $phongnhu_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG VỆ SINH</p>
                <p class="fs_14_16 mt_10"><?= $vesinh_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang_nt[$tinh_trang_noi_that] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIẤY TỜ PHÁP LÝ</p>
                <p class="fs_14_16 mt_10"><?= $giayto[$giay_to_phap_ly] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU DÀI</p>
                <p class="fs_14_16 mt_10"><?= $chieu_dai ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU NGANG</p>
                <p class="fs_14_16 mt_10"><?= $chieu_rong ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10"><?= $dien_tich ?> m²</p>
            </div>
            <? if ($dac_diem != 0) {
                if ($dac_diem == 1) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="fs_14_16 mt_10">Hẻm xe hơi</p>
                    </div>
                <? } else if ($dac_diem == 2) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="fs_14_16 mt_10">Nở hậu</p>
                    </div>
                <? } else if ($dac_diem == 3) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="fs_14_16 mt_10">Hẻm xe hơi, Nở hậu</p>
                    </div>
            <? }
            } ?>
        </div>
    </div>
<? }
// Bất động sản Nhà mặt phố
else if ($new_cate_id == 28) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN BÁN / CHO THUÊ</p>
                <p class="fs_14_16 mt_10"><?= $ban_mua[$can_ban_mua] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÊN TOÀ NHÀ / KHU DÂN CƯ</p>
                <p class="fs_14_16 mt_10"><?= $ten_toa_nha ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TỔNG SỐ TẦNG</p>
                <p class="fs_14_16 mt_10"><?= $tongtang_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HƯỚNG CỬA CHÍNH</p>
                <p class="fs_14_16 mt_10"><?= $huongchinh[$huong_chinh] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG NGỦ</p>
                <p class="fs_14_16 mt_10"><?= $phongnhu_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG VỆ SINH</p>
                <p class="fs_14_16 mt_10"><?= $vesinh_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang_nt[$tinh_trang_noi_that] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIẤY TỜ PHÁP LÝ</p>
                <p class="fs_14_16 mt_10"><?= $giayto[$giay_to_phap_ly] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU DÀI</p>
                <p class="fs_14_16 mt_10"><?= $chieu_dai ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU NGANG</p>
                <p class="fs_14_16 mt_10"><?= $chieu_rong ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10"><?= $dien_tich ?> m²</p>
            </div>
            <? if ($dac_diem != 0) {
                if ($dac_diem == 1) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="fs_14_16 mt_10">Hẻm xe hơi</p>
                    </div>
                <? } else if ($dac_diem == 2) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="fs_14_16 mt_10">Nở hậu</p>
                    </div>
                <? } else if ($dac_diem == 3) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="fs_14_16 mt_10">Hẻm xe hơi, Nở hậu</p>
                    </div>
            <? }
            } ?>
        </div>
    </div>
<? }
// Bất động sản Nhà riêng, nguyên căn
else if ($new_cate_id == 29) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN BÁN / CHO THUÊ</p>
                <p class="fs_14_16 mt_10"><?= $ban_mua[$can_ban_mua] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÊN TOÀ NHÀ / KHU DÂN CƯ</p>
                <p class="fs_14_16 mt_10"><?= $ten_toa_nha ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TỔNG SỐ TẦNG</p>
                <p class="fs_14_16 mt_10"><?= $tongtang_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HƯỚNG CỬA CHÍNH</p>
                <p class="fs_14_16 mt_10"><?= $huongchinh[$huong_chinh] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG NGỦ</p>
                <p class="fs_14_16 mt_10"><?= $phongnhu_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ PHÒNG VỆ SINH</p>
                <p class="fs_14_16 mt_10"><?= $vesinh_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang_nt[$tinh_trang_noi_that] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIẤY TỜ PHÁP LÝ</p>
                <p class="fs_14_16 mt_10"><?= $giayto[$giay_to_phap_ly] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU DÀI</p>
                <p class="fs_14_16 mt_10"><?= $chieu_dai ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU NGANG</p>
                <p class="fs_14_16 mt_10"><?= $chieu_rong ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10"><?= $dien_tich ?> m²</p>
            </div>

            <? if ($dac_diem != 0) {
                if ($dac_diem == 1) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="fs_14_16 mt_10">Hẻm xe hơi</p>
                    </div>
                <? } else if ($dac_diem == 2) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="fs_14_16 mt_10">Nở hậu</p>
                    </div>
                <? } else if ($dac_diem == 3) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">ĐẶC ĐIỂM NHÀ ĐẤT</p>
                        <p class="fs_14_16 mt_10">Hẻm xe hơi, Nở hậu</p>
                    </div>
            <? }
            } ?>
        </div>
    </div>
<? }
// Bất động sản Cửa hàng
else if ($new_cate_id == 33) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CẦN BÁN / CHO THUÊ</p>
                <p class="fs_14_16 mt_10"><?= $ban_mua[$can_ban_mua] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÊN TOÀ NHÀ / KHU DÂN CƯ</p>
                <p class="fs_14_16 mt_10"><?= $ten_toa_nha ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TẦNG SỐ</p>
                <p class="fs_14_16 mt_10"><?= $tang_so ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HƯỚNG CỬA CHÍNH</p>
                <p class="fs_14_16 mt_10"><?= $huongchinh[$huong_chinh] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIẤY TỜ PHÁP LÝ</p>
                <p class="fs_14_16 mt_10"><?= $giayto[$giay_to_phap_ly] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG NỘI THẤT</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang_nt[$tinh_trang_noi_that] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU DÀI</p>
                <p class="fs_14_16 mt_10"><?= $chieu_dai ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHIỀU NGANG</p>
                <p class="fs_14_16 mt_10"><?= $chieu_rong ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DIỆN TÍCH</p>
                <p class="fs_14_16 mt_10"><?= $dien_tich ?> m²</p>
            </div>
        </div>
    </div>
<? }



// ship
else if ($new_cate_id == 19) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">KHU VỰC GIAO NHẬN HÀNG</p>
                <p class="fs_14_16 mt_10">
                    <?= $show_cty_ok['cit_name'] ?>, <?= $show_quanh_ok['cit_name'] ?>
                </p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">THỜI GIAN LÀM VIỆC</p>
                <? if ($ca_ngay == 1) { ?>
                    <p class="fs_14_16 mt_10">Cả ngày</p>
                <? } else { ?>
                    <p class="fs_14_16 mt_10"><?= $tgian_bd ?> - <?= $tgian_kt ?></p>
                <? } ?>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI XE</p>
                <p class="fs_14_16 mt_10"><?= $ten_loai ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI HÀNG HOÁ GIAO</p>
                <p class="fs_14_16 mt_10"><?= $hanghoagiao_ok['ten_loai'] ?></p>
            </div>
        </div>
    </div>
<? }

// Mẹ và bé Đồ cho mẹ
else if ($new_cate_id == 53) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Mẹ và bé Đồ cho bé
else if ($new_cate_id == 54) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }

// Dịch vụ - Giải trí Dịch vụ
else if ($new_cate_id == 65) {
    echo ""; ?>
<? }
// Dịch vụ - Giải trí Nhạc cụ
else if ($new_cate_id == 100) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI NHẠC CỤ</p>
                <p class="fs_14_16 mt_10"><?= $allloaichung_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Dịch vụ - Giải trí Sách
else if ($new_cate_id == 101) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Dịch vụ - Giải trí Đồ sưu tầm, đồ cổ
else if ($new_cate_id == 102) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $allloaichung_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Dịch vụ - Giải trí Thiết bị chơi game
else if ($new_cate_id == 103) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Dịch vụ - Giải trí Sở thích khác
else if ($new_cate_id == 70) {
    echo "";
}


// Thể thao Dụng cụ thể thao
else if ($new_cate_id == 75) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÔN THỂ THAO</p>
                <p class="fs_14_16 mt_10"><?= $ten_mon ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI DỤNG CỤ</p>
                <p class="fs_14_16 mt_10">
                    <? if ($id_mon != 8) { ?>
                        <?= $loaidcthethao_ok['ten_loai'] ?>
                    <? } else { ?>
                        <?= $loai_chung ?>
                    <? } ?>
                </p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Thể thao Thời trang thể thao
else if ($new_cate_id == 104) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÔN THỂ THAO</p>
                <p class="fs_14_16 mt_10"><?= $ten_mon ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI THỜI TRANG</p>
                <p class="fs_14_16 mt_10">
                    <? if ($id_mon != 8) { ?>
                        <?= $loaittthethao_ok['ten_loai'] ?>
                    <? } else { ?>
                        <?= $loai_chung ?>
                    <? } ?>
                </p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Thể thao Phụ kiện thể thao
else if ($new_cate_id == 105) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÔN THỂ THAO</p>
                <p class="fs_14_16 mt_10"><?= $ten_mon ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI PHỤ KIỆN</p>
                <p class="fs_14_16 mt_10">
                    <? if ($id_mon != 8) { ?>
                        <?= $loaipkthethao_ok['ten_loai'] ?>
                    <? } else { ?>
                        <?= $loai_chung ?>
                    <? } ?>
                </p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }


// Thực phẩm đồ uống Thực phẩm
else if ($new_cate_id == 94) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI THỰC PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $name_tpdu ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HẠN SỬ DỤNG</p>
                <p class="fs_14_16 mt_10"><?= $han_su_dung ?></p>
            </div>
        </div>
    </div>
<? }
// Thực phẩm đồ uống Đồ uống
else if ($new_cate_id == 95) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI ĐỒ UỐNG</p>
                <p class="fs_14_16 mt_10"><?= $name_tpdu ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HẠN SỬ DỤNG</p>
                <p class="fs_14_16 mt_10"><?= $han_su_dung ?></p>
            </div>
        </div>
    </div>
<? }

// Thú cưng Gà
else if ($new_cate_id == 110) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỐNG THÚ CƯNG</p>
                <p class="fs_14_16 mt_10"><?= $namethu_ok['giong_thucung'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐỘ TUỔI</p>
                <p class="fs_14_16 mt_10"><?= $tuoi_tcung ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ THÚ CƯNG</p>
                <p class="fs_14_16 mt_10"><?= $kickco_tcung ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỚI TÍNH</p>
                <p class="fs_14_16 mt_10"><?= $gtinh_tcung ?></p>
            </div>
        </div>
    </div>
<? }
// Thú cưng Chó
else if ($new_cate_id == 111) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỐNG THÚ CƯNG</p>
                <p class="fs_14_16 mt_10"><?= $namethu_ok['giong_thucung'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐỘ TUỔI</p>
                <p class="fs_14_16 mt_10"><?= $tuoi_tcung ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ THÚ CƯNG</p>
                <p class="fs_14_16 mt_10"><?= $kickco_tcung ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỚI TÍNH</p>
                <p class="fs_14_16 mt_10"><?= $gtinh_tcung ?></p>
            </div>
        </div>
    </div>
<? }
// Thú cưng Mèo
else if ($new_cate_id == 112) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỐNG THÚ CƯNG</p>
                <p class="fs_14_16 mt_10"><?= $namethu_ok['giong_thucung'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐỘ TUỔI</p>
                <p class="fs_14_16 mt_10"><?= $tuoi_tcung ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ THÚ CƯNG</p>
                <p class="fs_14_16 mt_10"><?= $kickco_tcung ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỚI TÍNH</p>
                <p class="fs_14_16 mt_10"><?= $gtinh_tcung ?></p>
            </div>
        </div>
    </div>
<? }
// Thú cưng Chim
else if ($new_cate_id == 113) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỐNG THÚ CƯNG</p>
                <p class="fs_14_16 mt_10"><?= $namethu_ok['giong_thucung'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐỘ TUỔI</p>
                <p class="fs_14_16 mt_10"><?= $tuoi_tcung ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ THÚ CƯNG</p>
                <p class="fs_14_16 mt_10"><?= $kickco_tcung ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỚI TÍNH</p>
                <p class="fs_14_16 mt_10"><?= $gtinh_tcung ?></p>
            </div>
        </div>
    </div>
<? }
// Thú cưng Thú cưng khác
else if ($new_cate_id == 115) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐỘ TUỔI</p>
                <p class="fs_14_16 mt_10"><?= $do_tuoi ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ THÚ CƯNG</p>
                <p class="fs_14_16 mt_10"><?= $kich_co ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỚI TÍNH</p>
                <p class="fs_14_16 mt_10"><?= $gtinh_tcung ?></p>
            </div>
        </div>
    </div>
<? }
// Thú cưng Đồ ăn, phụ kiện, dịch vụ
else if ($new_cate_id == 114) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $name_nsp ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">GIỐNG THÚ CƯNG</p>
                <p class="fs_14_16 mt_10"><?= $namethu_ok['giong_thucung'] ?></p>
            </div>
            <? if ($id_nsp == 58) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HẠN SỬ DỤNG</p>
                    <p class="fs_14_16 mt_10"><?= $han_su_dung ?></p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">TRỌNG LƯỢNG</p>
                    <p class="fs_14_16 mt_10"><?= $khoiluong ?></p>
                </div>

                <div class="col text_center">
                    <p class="fs_16_19 font_600">THỂ TÍCH</p>
                    <p class="fs_14_16 mt_10"><?= $the_tich ?></p>
                </div>
            <? } ?>

        </div>
    </div>
<? }





// Thời trang Thời trang nam
else if ($new_cate_id == 43) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Thời trang Thời trang nữ
else if ($new_cate_id == 44) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Thời trang Đồ đôi, đồng phục
else if ($new_cate_id == 45) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?> </p>
            </div>
        </div>
    </div>
<? }
// Thời trang Thời trang bé
else if ($new_cate_id == 46) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?> </p>
            </div>
        </div>
    </div>
<? }
// Thời trang Giày dép
else if ($new_cate_id == 47) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $allloaichung_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?> </p>
            </div>
        </div>
    </div>
<? }
// Thời trang Phụ kiện
else if ($new_cate_id == 48) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $allloaichung_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?> </p>
            </div>
        </div>
    </div>
<? }
// Thời trang Túi xách
else if ($new_cate_id == 49) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $allloaichung_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?> </p>
            </div>
        </div>
    </div>
<? }
// Thời trang Đồng hồ
else if ($new_cate_id == 50) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $allloaichung_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?> </p>
            </div>
        </div>
    </div>
<? }
// Thời trang Nước hoa
else if ($new_cate_id == 106) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $allloaichung_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?> </p>
            </div>
        </div>
    </div>
<? }



// Đồ dùng văn phòng, công nông nghiệp Đồ dùng văn phòng
else if ($new_cate_id == 54) { ?>
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
else if ($new_cate_id == 55) { ?>
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
else if ($new_cate_id == 98) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10"><?= $hang_ok['ten_hang'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DÒNG MÁY</p>
                <p class="fs_14_16 mt_10">
                    <? if ($hang_ok['id'] != 1378) { ?>
                        <?= $dongmay_ok['ten_loai'] ?>
                    <? } else { ?>
                        <?= $dong_may ?>
                    <? } ?>
                </p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">BỘ VI XỬ LÝ</p>
                <p class="fs_14_16 mt_10"><?= $boxuly_ok['bovi_ten'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">RAM</p>
                <p class="fs_14_16 mt_10"><?= $ram_ok['ten_dl'] ?></p>
            </div>

        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">Ổ CỨNG</p>
                <p class="fs_14_16 mt_10"><?= $o_cung_ok['ten_dl'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI Ổ CỨNG</p>
                <p class="fs_14_16 mt_10"><?= $loai_o_cung_ar[$loai_o_cung] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CARD MÀN HÌNH</p>
                <p class="fs_14_16 mt_10"><?= $manhinh_ok['ten_manhinh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH THƯỚC MÀN HÌNH</p>
                <p class="fs_14_16 mt_10"><?= $kickco_ok['ten_manhinh'] ?></p>
            </div>
        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinht[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Máy tính để bàn
else if ($new_cate_id == 5) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">BỘ VI XỬ LÝ</p>
                <p class="fs_14_16 mt_10"><?= $boxuly_ok['bovi_ten'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">RAM</p>
                <p class="fs_14_16 mt_10"><?= $ram_ok['ten_dl'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">Ổ CỨNG</p>
                <p class="fs_14_16 mt_10"><?= $o_cung_ok['ten_dl'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI Ổ CỨNG</p>
                <p class="fs_14_16 mt_10"><?= $loai_o_cung_ar[$loai_o_cung] ?></p>
            </div>

        </div>
        <div class="row mt-50">
            <div class="col text_center">
                <p class="fs_16_19 font_600">CARD MÀN HÌNH</p>
                <p class="fs_14_16 mt_10"><?= $manhinh_ok['ten_manhinh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ MÀN HÌNH</p>
                <p class="fs_14_16 mt_10"><?= $kickco_ok['ten_manhinh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinht[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Điện thoại di động
else if ($new_cate_id == 7) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10"><?= $hang_mamq_ok['ten_hang'] ?></p>
            </div>
            <? if (in_array($hang_mamq_ok['id'], $check_hdthoai) == false) { ?>
                <? if ($hang_mamq_ok['id'] != 1683) { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">DÒNG MÁY</p>
                        <p class="fs_14_16 mt_10"><?= $dongmay7_ok['ten_loai'] ?></p>
                    </div>
                <? } else { ?>
                    <div class="col text_center">
                        <p class="fs_16_19 font_600">DÒNG MÁY</p>
                        <p class="fs_14_16 mt_10"><?= $dong_may ?></p>
                    </div>
                <? } ?>
            <? } else { ?>
                <?= '' ?>
            <? } ?>
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÀU SẮC</p>
                <p class="fs_14_16 mt_10"><?= $mausac_ok['mau_sac'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DUNG LƯỢNG</p>
                <p class="fs_14_16 mt_10"><?= $dungluong_ok['ten_dl'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinht[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Máy tính bảng
else if ($new_cate_id == 35) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10"><?= $hang_mamq_ok['ten_hang'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DÒNG MÁY</p>
                <p class="fs_14_16 mt_10">
                    <? if ($id_hang != 1694) { ?>
                        <?= $dongmay7_ok['ten_loai'] ?>
                    <? } else { ?>
                        <?= $dong_may ?>
                    <? } ?>
                </p>
            </div>
            <? if ($new_type == 1 || $new_type == 3) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">SỬ DỤNG SIM</p>
                    <p class="fs_14_16 mt_10"><?= $sim[$sdung_sim] ?></p>
                </div>
            <? } ?>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DUNG LƯỢNG</p>
                <p class="fs_14_16 mt_10"><?= $dungluong_ok['ten_dl'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH CỠ MÀN HÌNH</p>
                <p class="fs_14_16 mt_10"><?= $manhinh_ok['ten_manhinh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinht[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Đồ điện tử khác
else if ($new_cate_id == 96) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinht[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Tivi, Loa, Amply, Máy nghe nhạc
else if ($new_cate_id == 36) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">THIẾT BỊ</p>
                <p class="fs_14_16 mt_10"><?= $thietbi_ok['name'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10"><?= $hangchung_ok['ten_hang'] ?></p>
            </div>
            <? if ($thietbi_ok['id'] == 52) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">KÍCH THƯỚC</p>
                    <p class="fs_14_16 mt_10"><?= $manhinh_ok['ten_manhinh'] ?></p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">KẾT NỐI INTERNET</p>
                    <p class="fs_14_16 mt_10"><?= $internet[$knoi_internet] ?></p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI TV</p>
                    <p class="fs_14_16 mt_10"><?= $loaitv_ok['ten_loai'] ?></p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">ĐỘ PHÂN GIẢI</p>
                    <p class="fs_14_16 mt_10"><?= $dophangiai_ok['ten_dl'] ?></p>
                </div>
            <? } ?>
            <? if ($thietbi_ok['id'] == 53) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI LOA</p>
                    <p class="fs_14_16 mt_10"><?= $loaitv_ok['ten_loai'] ?></p>
                </div>
            <? } ?>
            <? if ($thietbi_ok['id'] == 53 || $thietbi_ok['id'] == 57) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CÔNG XUẤT</p>
                    <p class="fs_14_16 mt_10"><?= $congxuatloa_ok['ten_dl'] ?></p>
                </div>
            <? } ?>
            <? if ($thietbi_ok['id'] == 54) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CÔNG XUẤT ÂM THANH</p>
                    <p class="fs_14_16 mt_10"><?= $congxuatloa_ok['ten_dl'] ?></p>
                </div>
            <? } ?>
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinht[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Thiết bị đeo thông minh
else if ($new_cate_id == 99) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">THIẾT BỊ</p>
                <p class="fs_14_16 mt_10"><?= $tb_thongminh_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10">
                    <? if ($tb_thongminh_ok['id'] != 4345) { ?>
                        <?= $hang_tb_thongminh_ok['ten_hang'] ?>
                    <? } else { ?>
                        <?= $hang ?>
                    <? } ?>
                </p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DÒNG</p>
                <p class="fs_14_16 mt_10">
                    <? if ($tb_thongminh_ok['id'] != 4345) { ?>
                        <? if ($hang_tb_thongminh_ok['id'] != 1766) { ?>
                            <?= $dongmay_tbtm_ok['ten_dong'] ?>
                        <? } else { ?>
                            <?= $dong_may ?>
                        <? } ?>
                    <? } else { ?>
                        <?= $dong_may ?>
                    <? } ?>


                </p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinht[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Máy ảnh máy quay
else if ($new_cate_id == 6) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">THIẾT BỊ</p>
                <p class="fs_14_16 mt_10"><?= $thietbi_ok['name'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <? if ($thietbi_ok['id'] != 34) { ?>
                    <p class="fs_14_16 mt_10"><?= $hang_mamq_ok['ten_hang'] ?></p>
                <? } else { ?>
                    <?= $hang ?>
                <? } ?>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinht[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Đồ điện tử Phụ kiện, Linh kiện
else if ($new_cate_id == 37) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LINH KIỆN/PHỤ KIỆN</p>
                <p class="fs_14_16 mt_10"><?= $lkpk[$link_kien_phu_kien] ?></p>
            </div>
            <? if ($link_kien_phu_kien == 1) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI PHỤ KIỆN</p>
                    <p class="fs_14_16 mt_10"><?= $linh_kpk_ok['ten_loai'] ?></p>
                </div>
            <? } ?>
            <? if ($link_kien_phu_kien == 2) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI LINK KIỆN</p>
                    <p class="fs_14_16 mt_10"><?= $linh_kpk_ok['ten_loai'] ?></p>
                </div>
            <? } ?>
            <? if ($linh_kpk_ok['id'] != 4340) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THIẾT BỊ</p>
                    <p class="fs_14_16 mt_10"><?= $tb_lkpk_ok['name'] ?></p>
                </div>
            <? } ?>

            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinht[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }



// Nội thất - Ngoại thất Nội thất phòng khách
else if ($new_cate_id == 78) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $name_nsp ?></p>
            </div>
            <? if ($id_nsp == 2 || $id_nsp == 3 || $id_nsp == 5) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10"><?= $lsp_ntnt_ok['ten_loai'] ?></p>
                </div>
            <? } ?>
            <? if ($id_nsp == 1 || $id_nsp == 2 || $id_nsp == 3 || $id_nsp == 4 || $id_nsp == 6 || $id_nsp == 7) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CHẤT LIỆU</p>
                    <p class="fs_14_16 mt_10"><?= $chatlieu_qr_ok['name'] ?></p>
                </div>
            <? } ?>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Nội thất - Ngoại thất Nội thất phòng ngủ
else if ($new_cate_id == 79) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $name_nsp ?></p>
            </div>
            <? if ($id_nsp == 8 || $id_nsp == 9 || $id_nsp == 12 || $id_nsp == 13 || $id_nsp == 14 || $id_nsp == 15) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10"><?= $lsp_ntnt_ok['ten_loai'] ?></p>
                </div>
            <? } ?>
            <? if ($id_nsp == 14) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">Hình dáng</p>
                    <p class="fs_14_16 mt_10"><?= $hinhdang_ntnt_ok['name'] ?></p>
                </div>
            <? } ?>
            <? if ($id_nsp != 16 && $id_nsp != 10 && $id_nsp != 14 && $id_nsp != 15) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CHẤT LIỆU</p>
                    <p class="fs_14_16 mt_10"><?= $chatlieu_qr_ok['name'] ?></p>
                </div>
            <? } ?>

            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Nội thất - Ngoại thất Nội thất phòng bếp
else if ($new_cate_id == 80) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $name_nsp ?></p>
            </div>
            <? if ($id_nsp == 18 || $id_nsp == 19) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10"><?= $lsp_ntnt_ok['ten_loai'] ?></p>
                </div>
            <? } ?>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHẤT LIỆU</p>
                <p class="fs_14_16 mt_10"><?= $chatlieu_qr_ok['name'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Nội thất - Ngoại thất Nội thất phòng tắm
else if ($new_cate_id == 81) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $lsp_ntnt_ok['ten_loai'] ?></p>
            </div>
            <? if ($lsp_ntnt_ok['id'] != 2064) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">THƯƠNG HIỆU</p>
                    <p class="fs_14_16 mt_10"><?= $hang_ntnt_ok['ten_hang'] ?></p>
                </div>
            <? } ?>
            <? if ($lsp_ntnt_ok['id'] == 2060) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HÌNH DÁNG</p>
                    <p class="fs_14_16 mt_10"><?= $hinhdang_ntnt_ok['name'] ?></p>
                </div>
            <? } ?>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Nội thất - Ngoại thất Nội thất văn phòng
else if ($new_cate_id == 82) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">NHÓM SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $name_nsp ?></p>
            </div>
            <? if ($id_nsp != 30) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10"><?= $lsp_ntnt_ok['ten_loai'] ?></p>
                </div>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CHẤT LIỆU</p>
                    <p class="fs_14_16 mt_10"><?= $chatlieu_qr_ok['name'] ?></p>
                </div>
            <? } ?>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Nội thất -  Nội thất - Ngoại thất Vườn || Ngoại thất Nội thất khác
else if ($new_cate_id == 83 || $new_cate_id == 85) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Nội thất - Ngoại thất Ngoại thất
else if ($new_cate_id == 118) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $lsp_ntnt_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }



// Đồ gia dụng Thiết bị điện lạnh
else if ($new_cate_id == 56) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI THIẾT BỊ</p>
                <p class="fs_14_16 mt_10"><?= $loaithietbi_ok['ten_loai'] ?></p>
            </div>
            <? if ($loaithietbi_ok['id'] != 2107) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">HÃNG</p>
                    <p class="fs_14_16 mt_10"><?= $hang_ntnt_ok['ten_hang'] ?></p>
                </div>
            <? } ?>
            <? if ($loaithietbi_ok['id'] == 2104) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">CÔNG SUẤT</p>
                    <p class="fs_14_16 mt_10"><?= $congxuat_ok['ten_dl'] ?></p>
                </div>
            <? } ?>
            <? if ($loaithietbi_ok['id'] == 2106) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">KHỐI LƯỢNG GIẶT</p>
                    <p class="fs_14_16 mt_10"><?= $khoiluong_dga_ok['ten_dl'] ?></p>
                </div>
            <? } ?>
            <? if ($loaithietbi_ok['id'] == 2103 || $loaithietbi_ok['id'] == 2105) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">DUNG TÍCH</p>
                    <p class="fs_14_16 mt_10"><?= $dungtich_dgd_ok['ten_dl'] ?></p>
                </div>
            <? } ?>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Đồ gia dụng Thiết bị nhà bếp
else if ($new_cate_id == 57) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">

            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI THIẾT BỊ</p>
                <p class="fs_14_16 mt_10"><?= $tb_nhabep_ok['name'] ?></p>
            </div>
            <? if ($tb_nhabep_ok['id'] != 37) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">LOẠI SẢN PHẨM</p>
                    <p class="fs_14_16 mt_10"><?= $lsp_ntnt_ok['ten_loai'] ?></p>
                </div>
            <? } ?>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Đồ gia dụng khác,Đồ dùng văn phong, đồ chuyên dụng giống nuôi trồng, Thiết bị giáo dục , Thiết kế phong thủy, Hoa Quà tặng, Nghệ thuật - thủ công
else if ($new_cate_id == 60 || $new_cate_id == 116 || $new_cate_id == 117 || $new_cate_id == 86 || $new_cate_id == 84 || $new_cate_id == 87 || $new_cate_id == 88) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Đồ gia dụng Thiết bị sức khoẻ
else if ($new_cate_id == 59 || $new_cate_id == 58) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI THIẾT BỊ</p>
                <p class="fs_14_16 mt_10"><?= $ltb_suckhoe_ok['name'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }

// Sức khỏe - Sắc đẹp Mỹ phẩm
else if ($new_cate_id == 61) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI HÌNH</p>
                <p class="fs_14_16 mt_10"><?= $loaihinhsp_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI MỸ PHẨM</p>
                <p class="fs_14_16 mt_10"><?= $lsp_ntnt_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10"><?= $hang_sksd_ok['ten_hang'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HẠN SỬ DỤNG</p>
                <p class="fs_14_16 mt_10"><?= $han_su_dung ?></p>
            </div>
        </div>
    </div>
<? }
// Sức khỏe - Sắc đẹp Spa
else if ($new_cate_id == 62) {
    echo ""; ?>
<? }
// Sức khỏe - Sắc đẹp TDụng cụ - Phụ kiện làm đẹp
else if ($new_cate_id == 108) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI PHỤ KIỆN</p>
                <p class="fs_14_16 mt_10"><?= $lsp_ntnt_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10"><?= $hang_sksd_ok['ten_hang'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang_moi[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Sức khỏe - Sắc đẹp Thực phẩm chức năng
else if ($new_cate_id == 109) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI THỰC PHẨM CHỨC NĂNG</p>
                <p class="fs_14_16 mt_10"><?= $lsp_ntnt_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HẠN SỬ DỤNG</p>
                <p class="fs_14_16 mt_10"><?= $han_su_dung ?></p>
            </div>
        </div>
    </div>
<? }
// Sức khỏe - Sắc đẹp Vật tư y tế
else if ($new_cate_id == 63) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI VẬT TƯ</p>
                <p class="fs_14_16 mt_10"><?= $lsp_ntnt_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG</p>
                <p class="fs_14_16 mt_10"><?= $hang_vattu ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang_moi[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }


// Xe cộ Xe đạp
else if ($new_cate_id == 8) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG XE</p>
                <p class="fs_14_16 mt_10"><?= $hang_xe_ok['ten_hang'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI XE ĐẠP</p>
                <p class="fs_14_16 mt_10"><?= $loaixd_ok['ten_loai'] ?></p>
            </div>
            <? if ($loaixd_ok['id'] == 210) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">DÒNG XE ĐẠP THỂ THAO</p>
                    <p class="fs_14_16 mt_10"><?= $sql_lx ?></p>
                </div>
            <? } ?>
            <div class="col text_center">
                <p class="fs_16_19 font_600">XUẤT XỨ</p>
                <p class="fs_14_16 mt_10"><?= $xuatxu_ok['noi_xuatxu'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KÍCH THƯỚC KHUNG</p>
                <p class="fs_14_16 mt_10"><?= $kthuoc_khung ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÀU SẮC</p>
                <p class="fs_14_16 mt_10"><?= $mausac_ok['mau_sac'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">CHẤT LIỆU KHUNG</p>
                <p class="fs_14_16 mt_10"><?= $chatlieukhung_ok['name'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Xe cộ Xe máy
else if ($new_cate_id == 9) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG XE</p>
                <p class="fs_14_16 mt_10"><?= $hang_xe_ok['ten_hang'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DÒNG XE</p>
                <p class="fs_14_16 mt_10">
                    <? if ($hang_xe_ok['id'] != 1286) { ?>
                        <?= $dongxe_ok['ten_loai'] ?>
                    <? } else { ?>
                        <?= $dong_xe ?>
                    <? } ?>
                </p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">NĂM SẢN XUẤT</p>
                <p class="fs_14_16 mt_10"><?= $namsanxuat_ok['nam_san_xuat'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI XE</p>
                <p class="fs_14_16 mt_10"><?= $loaixd_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DUNG TÍCH</p>
                <p class="fs_14_16 mt_10"><?= $dungtich_ok['ten_dl'] ?></p>
            </div>

            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrangxe[$new_tinhtrang] ?></p>
            </div>
            <? if ($new_tinhtrang != 1) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">SỐ KM ĐÃ ĐI</p>
                    <p class="fs_14_16 mt_10"><?= $so_km_da_di ?></p>
                </div>
            <? } ?>
        </div>
    </div>
<? }
// Xe cộ Ô tô
else if ($new_cate_id == 10) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG XE</p>
                <p class="fs_14_16 mt_10"><?= $hang_oto_ok['ten_hang'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">DÒNG XE</p>
                <p class="fs_14_16 mt_10">
                    <? if ($hang_oto_ok['id'] != 1363) { ?>
                        <?= $dongxe_ok['ten_loai'] ?>
                    <? } else { ?>
                        <?= $dong_xe ?>
                    <? } ?>
                </p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">NĂM SẢN XUẤT</p>
                <p class="fs_14_16 mt_10"><?= $namsanxuat_ok['nam_san_xuat'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">SỐ CHỖ</p>
                <p class="fs_14_16 mt_10"><?= $socho_ok['so_luong'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">NHIÊN LIỆU</p>
                <p class="fs_14_16 mt_10"><?= $nhien_lieu_c[$nhien_lieu] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÀU SẮC</p>
                <p class="fs_14_16 mt_10"><?= $mausac_ok['mau_sac'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">XUẤT XỨ</p>
                <p class="fs_14_16 mt_10"><?= $xuatxu_ok['noi_xuatxu'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">HỘP SỐ</p>
                <p class="fs_14_16 mt_10"><?= $hop_so_c[$hop_so] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">KIỂU DÁNG</p>
                <p class="fs_14_16 mt_10"><?= $kieudang_ok['name'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrangxe[$new_tinhtrang] ?></p>
            </div>
            <? if ($new_tinhtrang != 1) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">SỐ KM ĐÃ ĐI</p>
                    <p class="fs_14_16 mt_10"><?= $so_km_da_di ?></p>
                </div>
            <? } ?>
        </div>
    </div>
<? }
// Xe cộ Xe đạp điện || Xe cộ Xe máy điện
else if ($new_cate_id == 40 || $new_cate_id == 41) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG XE</p>
                <p class="fs_14_16 mt_10"><?= $hang_xe_ok['ten_hang'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">ĐỘNG CƠ</p>
                <p class="fs_14_16 mt_10"><?= $dongco_ok['ten_dl'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÀU SẮC</p>
                <p class="fs_14_16 mt_10"><?= $mausac_ok['mau_sac'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">BẢO HÀNH</p>
                <p class="fs_14_16 mt_10"><?= $baohanh_ok['tgian_baohanh'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Xe cộ Phụ tùng xe
else if ($new_cate_id == 39) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI PHỤ TÙNG</p>
                <p class="fs_14_16 mt_10"><?= $loaiphutung_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Xe cộ Nội thất ô tô
else if ($new_cate_id == 42) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">LOẠI NỘI THẤT</p>
                <p class="fs_14_16 mt_10"><?= $loaichung_ok['ten_loai'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrang[$new_tinhtrang] ?></p>
            </div>
        </div>
    </div>
<? }
// Xe cộ Xe tải, xe khác
else if ($new_cate_id == 38) { ?>
    <p class="pc_title pl-10">Thông tin chi tiết</p>
    <div class="v-table mt-30 inf_ctiet_spham">
        <div class="row">
            <div class="col text_center">
                <p class="fs_16_19 font_600">HÃNG XE</p>
                <p class="fs_14_16 mt_10"><?= $hang_oto_ok['ten_hang'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TRỌNG TẢI</p>
                <p class="fs_14_16 mt_10"><?= $trongtai_ok['ten_dl'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">NHIÊN LIỆU</p>
                <p class="fs_14_16 mt_10"><?= $nhien_lieu_c[$nhien_lieu] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">MÀU SẮC</p>
                <p class="fs_14_16 mt_10"><?= $mausac_ok['mau_sac'] ?></p>
            </div>
            <div class="col text_center">
                <p class="fs_16_19 font_600">TÌNH TRẠNG</p>
                <p class="fs_14_16 mt_10"><?= $tinhtrangxe[$new_tinhtrang] ?></p>
            </div>
            <? if ($new_tinhtrang != 1) { ?>
                <div class="col text_center">
                    <p class="fs_16_19 font_600">SỐ KM ĐÃ ĐI</p>
                    <p class="fs_14_16 mt_10"><?= $so_km_da_di ?></p>
                </div>
            <? } ?>
        </div>
    </div>
<? } ?>