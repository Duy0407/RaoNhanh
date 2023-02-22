<?
include("config.php");
$tk = getValue('tk', 'str', 'POST', '');
$type = getValue('type', 'int', 'POST', 1);

?>
<div class="thanhtoan_buoc1_info_img">
    <img class="img_bank100px img_bank63px" src="<?= bank($tk)['img'] ?>" alt="<?= $tk ?>"> 
</div>
<div class="thanhtoan_buoc1_info_text">TÀI KHOẢN NGÂN HÀNG</div>
<div class="thanhtoan_buoc1_info_main">
    <div class="thanhtoan_buoc1_info_main_ok">
        <div class="thanhtoan_buoc1_info_main_ok_p1">Số tài khoản:</div>
        <div class="thanhtoan_buoc1_info_main_ok_p2"><?= bank($tk)['stk'] ?></div>
    </div>
    <div class="thanhtoan_buoc1_info_main_ok">
        <div class="thanhtoan_buoc1_info_main_ok_p1">Chủ tài khoản:</div>
        <div class="thanhtoan_buoc1_info_main_ok_p2"><?= bank($tk)['name'] ?></div>
    </div>
    <div class="thanhtoan_buoc1_info_main_ok">
        <div class="thanhtoan_buoc1_info_main_ok_p1">Chi nhánh:</div>
        <div class="thanhtoan_buoc1_info_main_ok_p2"><?= bank($tk)['address'] ?></div>
    </div>
    <div class="thanhtoan_buoc1_info_main_ok">
        <div class="thanhtoan_buoc1_info_main_ok_p1">Nội dung chuyển khoản:</div>
        <div class="thanhtoan_buoc1_info_main_ok_p2 df">[ Tài khoản email] <?=($type==2)?"Đẩy tin":"Ghim ".(($type==1)?"gian hàng":"tin")?> trên Raonhanh365</div>
    </div>
</div>