<div id="modal-huydon" class="modal">
    <div class="modal-content-huydon">
        <div class="huydon-header">
            <p>Hủy đơn hàng</p>
            <span class="close">&times;</span>
        </div>
        <div class="huydon-content">
            <div class="huydon-content-title">
                <p>Lý do hủy đơn hàng<span class="color_red">*</span></p>
            </div>
            <div class="huydon-content-item">
                <div class="huydon-content-1">
                    <input type="radio" name="huydonhang" value="1" checked onclick="lydo_khac(this)">
                    <p>Thay đổi địa chỉ nhận hàng</p>
                </div>
                <div class="huydon-content-1">
                    <input type="radio" name="huydonhang" value="2" onclick="lydo_khac(this)">
                    <p>Đổi ý không mua nữa</p>
                </div>
                <div class="huydon-content-1">
                    <input type="radio" name="huydonhang" value="3" onclick="lydo_khac(this)">
                    <p>Lý do khác</p>
                </div>
                <div class="lydo_khac d_none">
                    <input class="input-huydon" type="text" placeholder="Nhập lý do...">
                </div>
                <label for="">Đơn hàng này sẽ bị hủy sau khi bạn xác nhận. Bạn có muốn tiếp tục ?</label>
            </div>
        </div>
        <div class="huydon-footer">
            <button type="button" class="modal-btn-huy">Hủy bỏ</button>
            <button type="button" class="modal-btn-xacnhan" id="xacnhan_huydon" data="" onclick="huy_donhang(this)">Xác nhận</button>
        </div>
    </div>
</div>

<div id="modal_dathang" class="modal popup_dhang_tcong">
    <div class="modal-content">
        <!-- <span class="close">&times;</span> -->
        <div class="content-xacthuc-img">
            <img src="/images/bo-sung-raonhanh/xacthuc.svg" alt="">
        </div>
        <div class="content-xacthuc-title">
            <p>Hủy đơn hàng thành công !</p>
        </div>
        <div class="huydon-footer">
            <button type="button" class="modal-btn-dong" id="dong">Đóng</button>
        </div>
    </div>
</div>