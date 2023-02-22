<div id="modal-huydon" class="modal">
    <div class="modal-content-huydon">
        <div class="huydon-header">
            <p>Hủy đơn hàng</p>
            <span class="close">&times;</span>
        </div>
        <div class="huydon-content">
            <div class="huydon-content-title">
                <p>Lý do hủy đơn hàng <span class="color_red">*</span></p>
            </div>
            <div class="huydon-content-item">
                <div class="huydon-content-1">
                    <input type="radio" name="huydonhang" value="1" checked onclick="lydo_khac(this)">
                    <p>Hết hàng </p>
                </div>
                <div class="huydon-content-1">
                    <input type="radio" name="huydonhang" value="2" onclick="lydo_khac(this)">
                    <p>Không liên lạc được với người mua </p>
                </div>
                <div class="huydon-content-1">
                    <input type="radio" name="huydonhang" value="3" onclick="lydo_khac(this)">
                    <p>Lý do khác</p>
                </div>
                <div class="lydo_khac d_none">
                    <input class="input-huydon" type="text" placeholder="Nhập lý do...">
                </div>
                <label for="">Đơn hàng này sẽ bị hủy sau khi bạn xác nhận. Thao tác này không thể thực hiện lại. Bạn có muốn tiếp tục ?</label>
            </div>
        </div>
        <div class="huydon-footer">
            <button type="button" class="modal-btn-huy">Hủy bỏ</button>
            <button type="button" class="modal-btn-xacnhan" id="xacnhan_huydon" data="" onclick="huy_donhang(this)">Xác nhận</button>
        </div>
    </div>
</div>