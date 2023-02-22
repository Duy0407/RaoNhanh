<?
$type = getValue('type', 'int', 'GET', 1);
?>
<script>
    var type = <?=$type?>;
</script>
<div class="main_bggt_thanhtoan_buoc1">
    <div class="main_bggt_thanhtoan_buoc_hd">Bước 1 : Chuyển tiền qua internet banking </div>
    <div class="main_bggt_thanhtoan_buoc1_suv">
        <div class="main_bggt_thanhtoan_buoc1_box1">
            <div class="main_bggt_thanhtoan_buoc1_box_sub main_acb" data="acb" onclick="thaydoi_tknh(this,<?=$type?>)">
                <div class="thanhtoan_buoc1_box_bank1">
                    <img src="../images/anh_moi/bank4.svg" alt="">
                </div>
            </div>
            <div class="main_bggt_thanhtoan_buoc1_box_sub" data="vietcombank" onclick="thaydoi_tknh(this,<?=$type?>)">
                <div class="thanhtoan_buoc1_box_bank1">
                    <img src="../images/anh_moi/bank2.png" alt="">
                </div>
            </div>
            <div class="main_bggt_thanhtoan_buoc1_box_sub" data="mb" onclick="thaydoi_tknh(this,<?=$type?>)">
                <div class="thanhtoan_buoc1_box_bank1">
                    <img src="../images/anh_moi/mbbanh.svg" alt="">
                </div>
            </div>
            <div class="main_bggt_thanhtoan_buoc1_box_sub" data="bidv" onclick="thaydoi_tknh(this,<?=$type?>)">
                <div class="thanhtoan_buoc1_box_bank1">
                    <img src="../images/anh_moi/bank1.svg" alt="">
                </div>
            </div>
        </div>

        <div class="main_bggt_thanhtoan_buoc1_box2">
            <div class="thanhtoan_buoc1_info">
                <div class="thanhtoan_buoc1_info_sub">
                    <!-- <div class="thanhtoan_buoc1_info_img">
                                        <img src="../images/anh_moi/bank4.svg" alt="">
                                    </div>
                                    <div class="thanhtoan_buoc1_info_text">TÀI KHOẢN NGÂN HÀNG</div>
                                    <div class="thanhtoan_buoc1_info_main">
                                        <div class="thanhtoan_buoc1_info_main_ok">
                                            <div class="thanhtoan_buoc1_info_main_ok_p1">Số tài khoản:</div>
                                            <div class="thanhtoan_buoc1_info_main_ok_p2">21610000462781</div>
                                        </div>
                                        <div class="thanhtoan_buoc1_info_main_ok">
                                            <div class="thanhtoan_buoc1_info_main_ok_p1">Chủ tài khoản:</div>
                                            <div class="thanhtoan_buoc1_info_main_ok_p2">DƯƠNG THỊ MINH TUYỂN</div>
                                        </div>
                                        <div class="thanhtoan_buoc1_info_main_ok">
                                            <div class="thanhtoan_buoc1_info_main_ok_p1">Chi nhánh:</div>
                                            <div class="thanhtoan_buoc1_info_main_ok_p2">Hà Nội</div>
                                        </div>
                                        <div class="thanhtoan_buoc1_info_main_ok">
                                            <div class="thanhtoan_buoc1_info_main_ok_p1">Nội dung chuyển khoản:</div>
                                            <div class="thanhtoan_buoc1_info_main_ok_p2 df">[ Tài khoản email] Ghim gian hàng trên Raonhanh365</div>
                                        </div>
                                    </div> -->
                </div>
            </div>

            <div class="main_bggt_thanhtoan_buoc1_bank2">
                <div class="main_bggt_thanhtoan_buoc1_box_sub df2" data="sacombank" onclick="thaydoi_tknh(this,<?=$type?>)">
                    <div class="thanhtoan_buoc1_box_bank1">
                        <img src="../images/anh_moi/bank10.svg" alt="">
                    </div>
                </div>
                <div class="main_bggt_thanhtoan_buoc1_box_sub df2" data="vib" onclick="thaydoi_tknh(this,<?=$type?>)">
                    <div class="thanhtoan_buoc1_box_bank1">
                        <img src="../images/anh_moi/bank11.svg" alt="">
                    </div>
                </div>
            </div>
        </div>


        <div class="main_bggt_thanhtoan_buoc1_box3">
            <div class="main_bggt_thanhtoan_buoc1_box_sub" data="agribank" onclick="thaydoi_tknh(this,<?=$type?>)">
                <div class="thanhtoan_buoc1_box_bank1">
                    <img src="../images/anh_moi/bank5.svg" alt="">
                </div>
            </div>
            <div class="main_bggt_thanhtoan_buoc1_box_sub" data="msb" onclick="thaydoi_tknh(this,<?=$type?>)">
                <div class="thanhtoan_buoc1_box_bank1">
                    <img src="../images/anh_moi/bank6.svg" alt="">
                </div>
            </div>
            <div class="main_bggt_thanhtoan_buoc1_box_sub" data="techcombank" onclick="thaydoi_tknh(this,<?=$type?>)">
                <div class="thanhtoan_buoc1_box_bank1">
                    <img src="../images/anh_moi/bank7.svg" alt="">
                </div>
            </div>
            <div class="main_bggt_thanhtoan_buoc1_box_sub" data="vietinbank" onclick="thaydoi_tknh(this,<?=$type?>)">
                <div class="thanhtoan_buoc1_box_bank1">
                    <img src="../images/anh_moi/bank8.svg" alt="">
                </div>
            </div>
        </div>
    </div>
    <div class="thanhtoan_luu_y">Lưu ý: Khi chuyển khoản vui lòng ghi đúng nội dung </div>
</div>
<div class="main_bggt_thanhtoan_buoc2">
    <div class="main_bggt_thanhtoan_buoc_hd">Bước 2 : Thông báo cho chuyên viên hỗ trợ </div>
    <div class="main_bggt_thanhtoan_buoc2_box">
        <div class="thanhtoan_buoc2_box_hd">SAU KHI CHUYỂN TIỀN THÀNH CÔNG QUÝ KHÁCH HÀNG VUI LÒNG GỬI THÔNG BÁO CHUYỂN TIỀN CHO HỆ THỐNG THEO MỘT TRONG CÁC CÁCH SAU</div>
        <div class="thanhtoan_buoc2_box_tb">
            <div class="thanhtoan_buoc2_box_tb1">
                <div class="thanhtoan_buoc2_box_tb1_img">
                    <img src="../images/anh_moi/g_tb1.svg" alt="">
                </div>
                <div class="thanhtoan_buoc2_box_tb1_text">Gửi thông báo nạp tiền</div>
            </div>
            <div class="thanhtoan_buoc2_box_tb1">
                <div class="thanhtoan_buoc2_box_tb1_img">
                    <img src="../images/anh_moi/g_tb2.svg" alt="">
                </div>
                <div class="thanhtoan_buoc2_box_tb1_text">Thông báo trên Chatbox</div>
            </div>
            <div class="thanhtoan_buoc2_box_tb1">
                <div class="thanhtoan_buoc2_box_tb1_img">
                    <img src="../images/anh_moi/g_tb3.svg" alt="">
                </div>
                <div class="thanhtoan_buoc2_box_tb1_text">Thông báo trên Skype</div>
            </div>
            <div class="thanhtoan_buoc2_box_tb1">
                <div class="thanhtoan_buoc2_box_tb1_img">
                    <img src="../images/anh_moi/g_tb4.svg" alt="">
                </div>
                <div class="thanhtoan_buoc2_box_tb1_text">Thông báo qua Hotline</div>
            </div>
        </div>
    </div>
</div>