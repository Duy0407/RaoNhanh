<?
include("config.php");
$response=['name'=>''];
$tt_con = getValue('tt_con', 'int', 'POST', '');

$hang = getValue('hang', 'int', 'POST', '');
$hang6 = getValue('hang6', 'str', 'POST', '');
$dong = getValue('dong', 'str', 'POST', '');

$bo_vixuly  = getValue("bo_vixuly","int","POST","");
$bo_vixuly  = (int)$bo_vixuly;

$ram  = getValue("ram","int","POST","");
$ram  = (int)$ram;

$o_cung  = getValue("o_cung","int","POST","");
$o_cung  = (int)$o_cung;

$loai_ocung  = getValue("loai_ocung","int","POST","");
$loai_ocung  = (int)$loai_ocung;

$card_manhinh  = getValue("card_manhinh","int","POST","");
$card_manhinh  = (int)$card_manhinh;

$kichco_manhinh  = getValue("kichco_manhinh","int","POST","");
$kichco_manhinh  = (int)$kichco_manhinh;

$bao_hanh  = getValue("bao_hanh","int","POST","");
$bao_hanh  = (int)$bao_hanh;

$tinh_trang  = getValue("tinh_trang","int","POST","");
$tinh_trang  = (int)$tinh_trang;

$thiet_bi  = getValue("thiet_bi","int","POST","");
$thiet_bi  = (int)$thiet_bi;

$dung_luong  = getValue("dung_luong","int","POST","");
$dung_luong  = (int)$dung_luong;

$mau_sac  = getValue("mau_sac","int","POST","");
$mau_sac  = (int)$mau_sac;

$sudung_sim  = getValue("sudung_sim","int","POST","");
$sudung_sim  = (int)$sudung_sim;

$loai  = getValue("loai","int","POST","");
$loai  = (int)$loai;

$ketnoi_internet  = getValue("ketnoi_internet","int","POST","");
$ketnoi_internet  = (int)$ketnoi_internet;

$phukien_linhkien  = getValue("phukien_linhkien","int","POST","");
$phukien_linhkien  = (int)$phukien_linhkien;
//xedap
$chat_lieu_khung  = getValue("chat_lieu_khung","int","POST","");
$chat_lieu_khung  = (int)$chat_lieu_khung;

$loai_xe  = getValue("loai_xe","int","POST","");
$loai_xe  = (int)$loai_xe;

$dong_xe  = getValue("dong_xe","int","POST","");
$dong_xe  = (int)$dong_xe;

$xuat_xu  = getValue("xuat_xu","int","POST","");
$xuat_xu  = (int)$xuat_xu;
//xe máy
$dung_tich  = getValue("dung_tich","int","POST","");
$dung_tich  = (int)$dung_tich;

$nam_san_xuat  = getValue("nam_san_xuat","int","POST","");
$nam_san_xuat  = (int)$nam_san_xuat;

//oto
$hop_so  = getValue("hop_so","int","POST","");
$hop_so  = (int)$hop_so;

$nhien_lieu  = getValue("nhien_lieu","int","POST","");
$nhien_lieu  = (int)$nhien_lieu;

$so_cho  = getValue("so_cho","int","POST","");
$so_cho  = (int)$so_cho;

$kieu_dang  = getValue("kieu_dang","int","POST","");
$kieu_dang  = (int)$kieu_dang;

//Xe tải xe khác
$trong_tai  = getValue("trong_tai","int","POST","");
$trong_tai  = (int)$trong_tai;

//phu tung
$loai_phu_tung  = getValue("loai_phu_tung","int","POST","");
$loai_phu_tung  = (int)$loai_phu_tung;

//máy,đạp điện
$dong_co  = getValue("dong_co","int","POST","");
$dong_co  = (int)$dong_co;

//nội thất oto
$loai_noithat  = getValue("loai_noithat","int","POST","");
$loai_noithat  = (int)$loai_noithat;


//BĐS-NHADAT
$dien_tich = getValue('dien_tich', 'str', 'POST', '');
$ten_toa_nha = getValue('ten_toa_nha', 'str', 'POST', '');

$tinh_trang_noi_that  = getValue("tinh_trang_noi_that","int","POST","");
$tinh_trang_noi_that  = (int)$tinh_trang_noi_that;

$so_pngu  = getValue("so_pngu","int","POST","");
$so_pngu  = (int)$so_pngu;

$so_pve_sinh  = getValue("so_pve_sinh","int","POST","");
$so_pve_sinh  = (int)$so_pve_sinh;

$tong_so_tang  = getValue("tong_so_tang","int","POST","");
$tong_so_tang  = (int)$tong_so_tang;

$huong_chinh  = getValue("huong_chinh","int","POST","");
$huong_chinh  = (int)$huong_chinh;

$giay_to_phap_ly  = getValue("giay_to_phap_ly","int","POST","");
$giay_to_phap_ly  = (int)$giay_to_phap_ly;

$can_ban_mua  = getValue("can_ban_mua","int","POST","");
$can_ban_mua  = (int)$can_ban_mua;

//BĐS-DAT
$chieu_dai = getValue('chieu_dai', 'str', 'POST', '');
$chieu_rong = getValue('chieu_rong', 'str', 'POST', '');

$loai_hinh_dat  = getValue("loai_hinh_dat","int","POST","");
$loai_hinh_dat  = (int)$loai_hinh_dat;

//BĐS-CUAHANG
$tang_so = getValue('tang_so', 'str', 'POST', '');

//BDS-CHUNGCU
$loai_hinh_canho  = getValue("loai_hinh_canho","int","POST","");
$loai_hinh_canho  = (int)$loai_hinh_canho;

//TBĐIỆN lạnh
$cong_suat  = getValue("cong_suat","int","POST","");
$cong_suat  = (int)$cong_suat;

$khoiluong  = getValue("khoiluong","int","POST","");
$khoiluong  = (int)$khoiluong;

$loai_thiet_bi  = getValue("loai_thiet_bi","int","POST","");
$loai_thiet_bi  = (int)$loai_thiet_bi;

$loai_sanpham  = getValue("loai_sanpham","int","POST","");
$loai_sanpham  = (int)$loai_sanpham;

//MYPHAM
$han_su_dung = getValue('han_su_dung', 'str', 'POST', '');
$loai_hinh_sp  = getValue("loai_hinh_sp","int","POST","");
$loai_hinh_sp  = (int)$loai_hinh_sp;

//vattu yte
$hang_vattu = getValue('hang_vattu', 'str', 'POST', '');

//phongkhach
$chat_lieu  = getValue("chat_lieu","int","POST","");
$chat_lieu  = (int)$chat_lieu;

$nhom_sanpham  = getValue("nhom_sanpham","int","POST","");
$nhom_sanpham  = (int)$nhom_sanpham;

//phongngu
$hinhdang  = getValue("hinhdang","int","POST","");
$hinhdang  = (int)$hinhdang;

//THU CUNG
$giong_thu_cung  = getValue("giong_thu_cung","int","POST","");
$giong_thu_cung  = (int)$giong_thu_cung;

$do_tuoi  = getValue("do_tuoi","int","POST","");
$do_tuoi  = (int)$do_tuoi;

$gioi_tinh  = getValue("gioi_tinh","int","POST","");
$gioi_tinh  = (int)$gioi_tinh;
//thu cung khac
$kichco = getValue('kichco', 'str', 'POST', '');
$do_tuoi_thucungkhac = getValue('do_tuoi_thucungkhac', 'str', 'POST', '');

//THEER THAO
$mon_the_thao  = getValue("mon_the_thao","int","POST","");
$mon_the_thao  = (int)$mon_the_thao;

$loai75 = getValue('loai75', 'str', 'POST', '');



if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];
}else $acc_type = 0;
// echo $tt_con;

// - Query thú cưng
// + giống thú cưng
$thu_cung = new db_query("SELECT `id`,`giong_thucung` FROM `giong_thu_cung` WHERE `id_danhmuc` = $tt_con");$thucung_ga = $thu_cung;$thucung_cho = $thu_cung;$thucung_meo = $thu_cung;$thucung_chim = $thu_cung;
// + Tuổi thú cưng
$tuoi_thucung = new db_query("SELECT `id`,`contents_name` FROM `thongtin_thucung` WHERE `id_danhmuc` = $tt_con AND `type` = 1");$tuoi_ga  = $tuoi_thucung;$tuoi_cho  = $tuoi_thucung;$tuoi_meo  = $tuoi_thucung;$tuoi_chim  = $tuoi_thucung;
// + Kích cỡ thú cưng
$kc_thu = new db_query("SELECT `id`,`contents_name` FROM `thongtin_thucung` WHERE `id_danhmuc` = $tt_con AND `type` = 2");$kc_ga = $kc_thu;$kc_cho = $kc_thu;$kc_meo = $kc_thu;$kc_chim = $kc_thu;
// + Giới tính thú cưng
$gender_thucung = new db_query("SELECT `id`,`contents_name` FROM `thongtin_thucung` WHERE `id_danhmuc` = $tt_con AND `type` = 3");$gioitinhga = $gender_thucung;$gioitinhcho = $gender_thucung;$gioitinhmeo = $gender_thucung;$gioitinhchim = $gender_thucung;

// ĐỒ DÙNG VĂN PHÒNG, CÔNG NÔNG NGHIỆP
if ($tt_con == 116 || $tt_con == 117 || $tt_con == 86) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>
<? } else if ($tt_con == 5||$tt_con == 98) { ?>

    <?php if ($tt_con == 98): ?>
        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
            <select name="hang" class="form-control share_select2 w_100" data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)">
                <option value="">Hãng</option>
                <?
                $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_danhmuc` = $tt_con ");
                while ($row_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                    <option <?if($hang==$row_hang['id'])echo "selected"; ?> value="<?= $row_hang['id'] ?>"><?= $row_hang['ten_hang'] ?></option>
                <?}?>
            </select>
        </div>

        <div class="dong_doi mb_20">
            <?php if (isset($hang) && $hang==1378): ?>
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng máy</p>
                <input value="<?=($dong)?$dong:''?>" type="text" name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập dòng máy">
            <?php endif ?>
            <?php if (isset($hang) && $hang!=1378): ?>
                <?
                $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $hang AND `id_danhmuc` = 98 ");
                ?>  <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng máy</p>
                    <select name="dongmay" class="form-control share_select2 w_100">
                        <option value="">Dòng máy</option>
                        <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                        <option <?if($row_dong['id']==$dong) echo "selected";?> value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                        <? } ?>
                    </select>
            <?php endif ?>
        </div>
    <?php endif ?>

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Bộ vi xử lý</p>
        <select name="bo_vixuly" class="form-control share_select2 w_100">
            <option value="">Bộ vi xử lý</option>
            <?
            $bivi_xuly = new db_query("SELECT `bovi_id`, `bovi_ten` FROM `bovi_xuly` WHERE `bovi_id_danhmuc` = $tt_con ");
            while ($rs_vxl = (mysql_fetch_assoc($bivi_xuly->result))) { ?>
                <option <?if($rs_vxl['bovi_id']==$bo_vixuly) echo 'selected'?> value="<?=$rs_vxl['bovi_id']?>"><?= $rs_vxl['bovi_ten']?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">RAM</p>
        <select name="ram" class="form-control share_select2 w_100">
            <option value="">RAM</option>
            <?
            $list_ram = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $tt_con AND `phan_loai` = 1 ");
            while ($row_ram = mysql_fetch_assoc($list_ram->result)) { ?>
                <option <?if($row_ram['id_dl']==$ram) echo 'selected'?> value="<?= $row_ram['id_dl'] ?>"><?= $row_ram['ten_dl'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Ổ cứng</p>
        <select name="o_cung" class="form-control share_select2 w_100">
            <option value="">Ổ cứng</option>
            <?
            $list_ocung = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $tt_con AND `phan_loai` = 2 ");
            while ($row_oc = mysql_fetch_assoc($list_ocung->result)) { ?>
                <option <?if($row_oc['id_dl']==$o_cung) echo 'selected'?> value="<?= $row_oc['id_dl'] ?>"><?= $row_oc['ten_dl'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại ổ cứng</p>
        <select name="loai_ocung" class="form-control share_select2 w_100">
            <option value="">Loại ổ cứng</option>
            <option <?if($loai_ocung==1) echo 'selected'?> value="1">HDD</option>
            <option <?if($loai_ocung==2) echo 'selected'?> value="2">SSD</option>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Card màn hình</p>
        <select name="card_manhinh" class="form-control share_select2 w_100">
            <option value="">Card màn hình</option>
            <?
            $card_mhinh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $tt_con AND `phan_loai` = 1 ");
            while ($row_card = mysql_fetch_assoc($card_mhinh->result)) { ?>
                <option <?if($row_card['id_manhinh']==$card_manhinh) echo 'selected'?> value="<?= $row_card['id_manhinh'] ?>"><?= $row_card['ten_manhinh'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Kích cỡ màn hình</p>
        <select name="kichco_manhinh" class="form-control share_select2 w_100">
            <option value="">Kích cỡ màn hình</option>
            <?
            $kich_co = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $tt_con AND `phan_loai` = 2 ");
            while ($row_kc = mysql_fetch_assoc($kich_co->result)) { ?>
                <option <?if($row_kc['id_manhinh']==$kichco_manhinh) echo 'selected'?> value="<?= $row_kc['id_manhinh'] ?>"><?= $row_kc['ten_manhinh'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Bảo hành</p>
        <select name="bao_hanh" class="form-control share_select2 w_100">
            <option value="">Bảo hành</option>
            <?
            $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
            while ($row_bh = mysql_fetch_assoc($bao_hanhquery->result)) { ?>
                <option <?if($row_bh['id_baohanh']==$bao_hanh) echo 'selected'?> value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1)echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2)echo 'selected' ?> value="2">Đã sử dụng (chưa sửa chữa)</option>
            <option <?if($tinh_trang==3)echo 'selected' ?> value="3">Đã sử dụng (qua sửa chữa)</option>
        </select>
    </div>
<? } else if ($tt_con == 6) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Thiết bị</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="thiet_bi" class="form-control share_select2 w_100">
            <option value="">Thiết bị</option>
            <?
            $list_tbi = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` = $tt_con ");
            while ($row_tbi = mysql_fetch_assoc($list_tbi->result)) { ?>
                <option <?if($row_tbi['id']==$thiet_bi) echo 'selected' ?> value="<?= $row_tbi['id'] ?>"><?= $row_tbi['name'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <div class="dong_doi">
        <?php if (isset($thiet_bi)&& $thiet_bi==34): ?>
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
            <input type="text" value="<?=($hang6)?$hang6:''?>" name="hang" class="m_timkiem_input" autocomplete="off" placeholder="Nhập hãng">
        <?php endif ?>
        <?php if (isset($thiet_bi)&& $thiet_bi!=34): ?>
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
            <?
            $list_dong = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $thiet_bi AND `id_danhmuc` = 6 "); ?>
                <select name="hang" class="form-control share_select2 w_100">
                    <option value="">Hãng</option>
                    <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option <?if($row_dong['id']==$hang6) echo'selected' ?> value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_hang'] ?></option>
                    <? } ?>
                </select>
        <?php endif ?>   
        </div>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Bảo hành</p>
        <select name="bao_hanh" class="form-control share_select2 w_100">
            <option value="">Bảo hành</option>
            <?
            $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
            while ($row_bh = mysql_fetch_assoc($bao_hanhquery->result)) { ?>
                <option <?if($row_bh['id_baohanh']==$bao_hanh) echo 'selected' ?> value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1)echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2)echo 'selected' ?> value="2">Đã sử dụng (chưa sửa chữa)</option>
            <option <?if($tinh_trang==3)echo 'selected' ?> value="3">Đã sử dụng (qua sửa chữa)</option>
        </select>
    </div>
<? } else if ($tt_con == 7) { ?> 
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
        <select name="hang" class="form-control share_select2 w_100" data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)">
            <option value="">Hãng</option>
            <?
            $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_danhmuc` = $tt_con ");
            while ($row_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                <option <?if($row_hang['id']==$hang)echo 'selected' ?> value="<?= $row_hang['id'] ?>"><?= $row_hang['ten_hang'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20 dong_doi">
        <?php if (isset($hang) && $hang==1683): ?>
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng máy</p>
            <input value="<?=($dong)?$dong:''?>" type="text" name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập hãng">
        <?php endif ?>
        <?php if (isset($hang) && $hang!=1683): ?>
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng máy</p>
            <?
            $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $hang AND `id_danhmuc` = 7 ");
            ?>
                <select name="dongmay" class="form-control share_select2 w_100">
                    <option value="">Dòng máy</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option <?if($row_dong['id'] ==$dong)echo 'selected' ?> value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                <? } ?>
                </select>
        <?php endif ?>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Màu sắc</p>
        <select name="mau_sac" class="form-control share_select2 w_100">
            <option value="">Màu sắc</option>
            <? $list_ms = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE `id_parents` = 0 AND `id_dm` = $tt_con ");
                while ($row_ms = mysql_fetch_assoc($list_ms->result)) { ?>
                    <option <?if($row_ms['id_color']==$mau_sac)echo 'selected' ?> value="<?= $row_ms['id_color'] ?>"><?= $row_ms['mau_sac'] ?></option>
            <? } ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dung lượng</p>
        <select name="dung_luong" class="form-control share_select2 w_100">
            <option value="">Dung lượng</option>
            <?
            $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $tt_con AND `id_cha` = 0 ");
           while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                <option <?if($row_dl['id_dl']==$dung_luong)echo 'selected' ?> value="<?= $row_dl['id_dl'] ?>"><?= $row_dl['ten_dl'] ?></option>
            <?}?>
        </select>
    </div>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Bảo hành</p>
        <select name="bao_hanh" class="form-control share_select2 w_100">
            <option value="">Bảo hành</option>
            <?
            $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
            while ($row_bh = mysql_fetch_assoc($bao_hanhquery->result)) { ?>
                <option <?if($row_bh['id_baohanh']==$bao_hanh) echo 'selected' ?> value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1)echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2)echo 'selected' ?> value="2">Đã sử dụng (chưa sửa chữa)</option>
            <option <?if($tinh_trang==3)echo 'selected' ?> value="3">Đã sử dụng (qua sửa chữa)</option>
        </select>
    </div>
<? } else if ($tt_con == 35) { ?> 
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
        <select name="hang" class="form-control share_select2 w_100" data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)">
            <option  value="">Hãng</option>
            <?
            $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_danhmuc` = $tt_con ");
            while ($row_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                <option <?if($row_hang['id']==$hang)echo 'selected' ?> value="<?= $row_hang['id'] ?>"><?= $row_hang['ten_hang'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20 dong_doi">
        <?php if (isset($hang) && $hang==1694): ?>
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng máy</p>
            <input type="text" value="<?=($dong)?$dong:''?>" name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập hãng">
        <?php endif ?>
        <?php if (isset($hang) && $hang!=1694): ?>
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng máy</p>
            <?
            $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $hang AND `id_danhmuc` = 35 ");
            ?>
                <select name="dongmay" class="form-control share_select2 w_100">
                    <option value="">Dòng máy</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option <?if($row_dong['id']==$dong)echo 'selected' ?> value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                <? } ?>
                </select>
        <?php endif ?>
    </div>

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Sử dụng sim</p>
        <select name="sudung_sim" class="form-control share_select2 w_100">
            <option value="">Sử dụng SIM</option>
            <option <?if($sudung_sim==1)echo 'selected' ?> value="1">Có</option>
            <option <?if($sudung_sim==2)echo 'selected' ?> value="2">Không</option>
            
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dung lượng</p>
        <select name="dung_luong" class="form-control share_select2 w_100">
            <option value="">Dung lượng</option>
            <?
            $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $tt_con AND `id_cha` = 0 ");
           while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                <option <?if($row_dl['id_dl']==$dung_luong)echo 'selected' ?> value="<?= $row_dl['id_dl'] ?>"><?= $row_dl['ten_dl'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Kích cỡ màn hình</p>
        <select name="kichco_manhinh" class="form-control share_select2 w_100">
            <option value="">Kích cỡ màn hình</option>
            <?  $list_mhinh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $tt_con AND `id_cha` = 0 ");
                while ($row_mh = mysql_fetch_assoc($list_mhinh->result)) { ?>
                    <option <?if($row_mh['id_manhinh']==$kichco_manhinh)echo 'selected' ?> value="<?= $row_mh['id_manhinh'] ?>"><?= $row_mh['ten_manhinh'] ?></option>
            <? } ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Bảo hành</p>
        <select name="bao_hanh" class="form-control share_select2 w_100">
            <option value="">Bảo hành</option>
            <?
            $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
            while ($row_bh = mysql_fetch_assoc($bao_hanhquery->result)) { ?>
                <option <?if($row_bh['id_baohanh']==$bao_hanh) echo 'selected' ?> value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1)echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2)echo 'selected' ?> value="2">Đã sử dụng (chưa sửa chữa)</option>
            <option <?if($tinh_trang==3)echo 'selected' ?> value="3">Đã sử dụng (qua sửa chữa)</option>
        </select>
    </div>
<? } else if ($tt_con == 36) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Thiết bị</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="thiet_bi" class="form-control share_select2 w_100">
            <option value="">Thiết bị</option>
            <?
            $list_tbi = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` = $tt_con ");
            while ($row_tbi = mysql_fetch_assoc($list_tbi->result)) { ?>
                <option <?if($row_tbi['id']==$thiet_bi) echo 'selected' ?> value="<?= $row_tbi['id'] ?>"><?= $row_tbi['name'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="dong_doi">
        <?php if ($thiet_bi==52): ?>
            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
                <?
                $list_dong = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $thiet_bi AND `id_danhmuc` = 36 ");
                ?>
                    <select name="hang" class="form-control share_select2 w_100">
                        <option value="">Hãng</option>
                    <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                        <option <?if($row_dong['id']==$hang)echo 'selected' ?> value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_hang'] ?></option>
                    <? } ?>
                    </select>
            </div>

            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Kích thước</p>
                <?
                $list_mh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = 36 AND `id_cha` = $thiet_bi ");
                ?>
                    <select name="kichco_manhinh" class="form-control share_select2 w_100">
                        <option value="">Kích thước</option>
                    <? while ($row_mh = mysql_fetch_assoc($list_mh->result)) { ?>
                        <option <?if($row_mh['id_manhinh']==$kichco_manhinh) echo 'selected' ?> value="<?= $row_mh['id_manhinh'] ?>"><?= $row_mh['ten_manhinh'] ?></option>
                    <? } ?>
                    </select>
            </div>

            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Kết nối internet</p>
                
                    <select name="ketnoi_internet" class="form-control share_select2 w_100">
                        <option value="">Kết nối internet</option>
                        <option <?if($ketnoi_internet==1) echo 'selected' ?> value="1" >Có</option>
                        <option <?if($ketnoi_internet==2) echo 'selected' ?> value="2">Không</option>
                    </select>
            </div>

            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Độ phân giải</p>
                <?
                
                $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = 36 AND `id_cha` = $thiet_bi ");
                ?>
                    <select name="dung_luong" class="form-control share_select2 w_100">
                        <option value="">Độ phân giải</option>
                    <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                            <option <?if($dung_luong==$row_dl['id_dl']) echo 'selected' ?> value="<?= $row_dl['id_dl'] ?>"><?= $row_dl['ten_dl'] ?></option>
                    <? } ?>
                    </select>
            </div>

            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại TV</p>
                <?
                $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $thiet_bi AND `id_danhmuc` = 36 ");
                ?>
                    <select name="loai" class="form-control share_select2 w_100">
                        <option value="">Loại TV</option>
                    <? while ($row_loai = mysql_fetch_assoc($list_loai->result)) { ?>
                    <option <?if($loai==$row_loai['id']) echo 'selected' ?> value="<?= $row_loai['id'] ?>"><?= $row_loai['ten_loai'] ?></option>
                    <? } ?>
                    </select>
            </div>
        <?php endif ?>

        <?php if ($thiet_bi==53): ?>
            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
                <?
                $list_dong = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $thiet_bi AND `id_danhmuc` = 36 ");
                ?>
                    <select name="hang" class="form-control share_select2 w_100">
                        <option value="">Hãng</option>
                    <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                        <option <?if($row_dong['id']==$hang)echo 'selected' ?> value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_hang'] ?></option>
                    <? } ?>
                    </select>
            </div>
            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại loa</p>
                <?
                $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $thiet_bi AND `id_danhmuc` = 36 ");
                ?>
                    <select name="loai" class="form-control share_select2 w_100">
                        <option value="">Loại loa</option>
                    <? while ($row_loai = mysql_fetch_assoc($list_loai->result)) { ?>
                    <option <?if($loai==$row_loai['id'])echo 'selected' ?> value="<?= $row_loai['id'] ?>"><?= $row_loai['ten_loai'] ?></option>
                    <? } ?>
                    </select>
            </div>
            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Công suất</p>
                <?
                $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = 36 AND `id_cha` = $thiet_bi ");
                ?>
                    <select name="dung_luong" class="form-control share_select2 w_100">
                        <option value="">Công suất</option>
                    <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                    <option <?if($dung_luong==$row_dl['id_dl']) echo 'selected' ?> value="<?= $row_dl['id_dl'] ?>"><?= $row_dl['ten_dl'] ?></option>
                    <? } ?>
                    </select>
            </div>
        <?php endif ?>

        <?php if ($thiet_bi==54||$thiet_bi==57): ?>
            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
                <?
                $list_dong = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $thiet_bi AND `id_danhmuc` = 36 ");
                ?>
                    <select name="hang" class="form-control share_select2 w_100">
                        <option value="">Hãng</option>
                    <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                        <option <?if($row_dong['id']==$hang)echo 'selected' ?>  value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_hang'] ?></option>
                    <? } ?>
                    </select>
            </div>
            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Công suất âm thanh</p>
                <?
                $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = 36 AND `id_cha` = $thiet_bi ");
                ?>
                    <select name="dung_luong" class="form-control share_select2 w_100">
                        <option value="">Công suất âm thanh</option>
                    <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                    <option <?if($row_dl['id_dl']==$dung_luong)echo 'selected' ?>  value="<?= $row_dl['id_dl'] ?>"><?= $row_dl['ten_dl'] ?></option>
                    <? } ?>
                    </select>
            </div>
        <?php endif ?>
    </div>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Bảo hành</p>
        <select name="bao_hanh" class="form-control share_select2 w_100">
            <option value="">Bảo hành</option>
            <?
            $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
            while ($row_bh = mysql_fetch_assoc($bao_hanhquery->result)) { ?>
                <option <?if($row_bh['id_baohanh']==$bao_hanh) echo 'selected' ?> value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1)echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2)echo 'selected' ?> value="2">Đã sử dụng (chưa sửa chữa)</option>
            <option <?if($tinh_trang==3)echo 'selected' ?> value="3">Đã sử dụng (qua sửa chữa)</option>
        </select>
    </div>  
<? } else if ($tt_con == 37) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Phụ kiện/Linh kiện</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="hang" class="form-control share_select2 w_100">
            <option value="">Phụ kiện/Linh kiện</option>
            <option <?if($hang==1)echo 'selected' ?> value="1">Phụ kiện</option>
            <option <?if($hang==2)echo 'selected' ?> value="2">Linh kiện</option>
        </select>
    </div>
    <div class="dong_doi">
        <?php if (isset($hang)&& $hang==1): ?>
            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại phụ kiện</p>
                <?
                $querypk = new db_query("SELECT *  FROM `loai_chung` WHERE `id_danhmuc` = 37 and `id_cha`= 0");
                $list_phukien = $querypk->result_array();
                ?>
                    <select name="phukien_linhkien" class="form-control share_select2 w_100">
                        <option value="">Loại phụ kiện</option>
                     <? foreach ($list_phukien as $key => $value) { ?>
                        <option <?if($value['id']==$phukien_linhkien) echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
                    <? } ?>
                    </select>
            </div>
        <?php endif ?>

        <?php if (isset($hang)&& $hang==2): ?>
            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại linh kiện</p>
                <?
                $querylk = new db_query("SELECT *  FROM `loai_chung` WHERE `id_danhmuc` = 37 and `id_cha`= 1");
                $list_linhkien = $querylk->result_array();
                ?>
                    <select name="phukien_linhkien" class="form-control share_select2 w_100">
                        <option value="">Loại linh kiện</option>
                     <? foreach ($list_linhkien as $key => $value) { ?>
                        <option <?if($value['id']==$phukien_linhkien) echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
                    <? } ?>
                    </select>
            </div>
        <?php endif ?>
    </div>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Bảo hành</p>
        <select name="bao_hanh" class="form-control share_select2 w_100">
            <option value="">Bảo hành</option>
            <?
            $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
            while ($row_bh = mysql_fetch_assoc($bao_hanhquery->result)) { ?>
                <option <?if($row_bh['id_baohanh']==$bao_hanh) echo 'selected' ?> value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1)echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2)echo 'selected' ?> value="2">Đã sử dụng (chưa sửa chữa)</option>
            <option <?if($tinh_trang==3)echo 'selected' ?> value="3">Đã sử dụng (qua sửa chữa)</option>
        </select>
    </div> 
<? } else if ($tt_con == 99) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Thiết bị</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="thiet_bi" class="form-control share_select2 w_100">
            <option value="">Thiết bị</option>
            <?
            $query = new db_query("SELECT *  FROM `loai_chung` WHERE `id_danhmuc` = $tt_con ");
            $list_nhom = $query->result_array();
            ?>
            <?php foreach ($list_nhom as $key => $value) : ?>
                <option <?if($value['id']==$thiet_bi)echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="dong_doi">
        <?php if (isset($thiet_bi) && $thiet_bi>0): ?>
            <?
            $query = new db_query("SELECT `id`, `ten_hang`  FROM `hang` WHERE `id_danhmuc` = 99 and `id_parent`= $thiet_bi ");
            ?>
            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng </p>
                    <select data="<?= $id_dm ?>" onchange="hang_doi_timkiem2(this)" name="hang" class="form-control share_select2 w_100">
                        <option value="">Hãng</option>
                     <? while ($row_hang = mysql_fetch_assoc($query->result)) { ?>
                        <option <?if($row_hang['id']==$hang)echo 'selected' ?> value="<?= $row_hang['id'] ?>"><?= $row_hang['ten_hang'] ?></option>
                    <? } ?>
                    </select>
            </div>
        <?php endif ?>
    </div>
    <div class="dong_doi2 mb_20 ">
        <?php if (isset($hang) && $hang>0): ?>
            <?php if ($hang != 1766 && $hang != 1774): ?>
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng </p>
            <?
            $list_dong = new db_query("SELECT `id`, `ten_dong` FROM `dong` WHERE `id_hang` = $hang AND `id_danhmuc` = 99 ");
            ?>
                <select name="dongmay" class="form-control share_select2 w_100">
                    <option value="">Dòng</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option <?if($row_dong['id']==$dong)echo 'selected' ?> value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_dong'] ?></option>
                <? } ?>
                </select>
        <?php endif ?>
        <?php if ($hang == 1766 || $hang == 1774): ?>
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng</p>
            <input type="text" value="<?=($dong)?$dong:''?>"  name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập dòng máy">
        <?php endif ?>
        <?php endif ?>
    </div>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Bảo hành</p>
        <select name="bao_hanh" class="form-control share_select2 w_100">
            <option value="">Bảo hành</option>
            <?
            $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
            while ($row_bh = mysql_fetch_assoc($bao_hanhquery->result)) { ?>
                <option <?if($row_bh['id_baohanh']==$bao_hanh) echo 'selected' ?> value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1)echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2)echo 'selected' ?> value="2">Đã sử dụng (chưa sửa chữa)</option>
            <option <?if($tinh_trang==3)echo 'selected' ?> value="3">Đã sử dụng (qua sửa chữa)</option>
        </select>
    </div>   
<? } else if ($tt_con == 8) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng xe</p>
        <select  name="hang" class="form-control share_select2 w_100">
            <option value="">Hãng xe</option>
            <?
            $query_hang = new db_query("SELECT `id`, `ten_hang`, `id_parent` FROM `hang` WHERE id_parent = 8 ");
            $sql_hang = $query_hang->result_array();
            ?>
            <? foreach ($sql_hang as $rows) : ?>
                <option <?if($rows['id']==$hang)echo 'selected' ?> value="<?= $rows['id'] ?>"><?= $rows['ten_hang'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại xe đạp</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="loai_xe" class="form-control share_select2 w_100">
            <option value="">Loại xe đạp</option>
            <?
            $query_lx = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = 8 AND id_danhmuc = 2");
            $sql_lx = $query_lx->result_array();
            ?>
            <? foreach ($sql_lx as $tr) : ?>
                <option <?if($tr['id']==$loai_xe)echo 'selected' ?> value="<?= $tr['id'] ?>"><?= $tr['ten_loai'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="dong_doi">
        <?php if (isset($loai_xe) && $loai_xe>0): ?>
            <?php if ($loai_xe==210): ?>
                <?
                $query_dx = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = 210");
                $sql_dx = $query_dx->result_array();
                ?>
                <div class="thuoc_tinh w_100 mb_20 ">
                    <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng xe đạp thể thao </p>
                        <select  name="dong_xe" class="form-control share_select2 w_100">
                            <option value="">Dòng xe đạp thể thao</option>
                         <? foreach ($sql_dx as $dx) : ?>
                            <option <?if($dx['id']==$dong_xe)echo 'selected' ?> value="<?= $dx['id'] ?>"><?= $dx['ten_loai'] ?></option>
                        <? endforeach ?>
                        </select>
                </div>
            <?php endif ?>
        <?php endif ?>
    </div>
    <?php if ($acc_type == 2): ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Xuất xứ</p>
        <select  name="xuat_xu" class="form-control share_select2 w_100">
            <option value="">Xuất xứ</option>
            <?
           $query_xx = new db_query("SELECT `id_xuatxu`, `noi_xuatxu`, `id_parents`, `id_danhmuc` FROM `xuat_xu` WHERE id_parents = 8");
            $sql_xx = $query_xx->result_array();
            ?>
            <? foreach ($sql_xx as $xx) : ?>
                <option <?if($xx['id_xuatxu']==$xuat_xu)echo 'selected' ?> value="<?= $xx['id_xuatxu'] ?>"><?= $xx['noi_xuatxu'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Kích thước khung</p>
        <select  name="kichco_manhinh" class="form-control share_select2 w_100">
            <option value="">Kích thước khung</option>
            <?
            $query_ktk = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE id_danhmuc = 8 AND phan_loai = 3");
            $result_ktk = $query_ktk->result_array();
            ?>
            <? foreach ($result_ktk as $ktk) { ?>
                <option <?if( $ktk['id_manhinh']==$kichco_manhinh)echo 'selected' ?> value="<?= $ktk['id_manhinh'] ?>"><?= $ktk['ten_manhinh'] ?></option>
            <? } ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Màu sắc</p>
        <select  name="mau_sac" class="form-control share_select2 w_100">
            <option value="">Màu sắc</option>
            <?
            $query_mx = new db_query("SELECT `id_color`, `mau_sac`, `id_parents`, `id_dm` FROM `mau_sac` WHERE id_parents = 8");
            $sql_mx = $query_mx->result_array();
            ?>
            <? foreach ($sql_mx as $mx) : ?>
                <option <?if( $mx['id_color']==$mau_sac)echo 'selected' ?> value="<?= $mx['id_color'] ?>"><?= $mx['mau_sac'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chất liệu khung</p>
        <select  name="chat_lieu_khung" class="form-control share_select2 w_100">
            <option value="">Chất liệu khung</option>
            <?
           $cl_khung = new db_query("SELECT `id`,`name` FROM `nhom_sanpham_chatlieu` WHERE `id_danhmuc` = 8");
             $show_clk = $cl_khung->result_array();
            ?>
             <? foreach ($show_clk as $clk) { ?>
                <option <?if( $clk['id']==$chat_lieu_khung)echo 'selected' ?> value="<?= $clk['id'] ?>"><?= $clk['name'] ?></option>
            <? } ?>
        </select>
    </div>
    <?php endif ?>
    <?php if ($acc_type == 1 || $acc_type == 3): ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Màu sắc</p>
        <select  name="mau_sac" class="form-control share_select2 w_100">
            <option value="">Màu sắc</option>
            <?
            $query_mx = new db_query("SELECT `id_color`, `mau_sac`, `id_parents`, `id_dm` FROM `mau_sac` WHERE id_parents = 8");
            $sql_mx = $query_mx->result_array();
            ?>
            <? foreach ($sql_mx as $mx) : ?>
                <option <?if( $mx['id_color']==$mau_sac)echo 'selected' ?> value="<?= $mx['id_color'] ?>"><?= $mx['mau_sac'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chất liệu khung</p>
        <select  name="chat_lieu_khung" class="form-control share_select2 w_100">
            <option value="">Chất liệu khung</option>
            <?
           $cl_khung = new db_query("SELECT `id`,`name` FROM `nhom_sanpham_chatlieu` WHERE `id_danhmuc` = 8");
             $show_clk = $cl_khung->result_array();
            ?>
             <? foreach ($show_clk as $clk) { ?>
                <option <?if( $clk['id']==$chat_lieu_khung)echo 'selected' ?> value="<?= $clk['id'] ?>"><?= $clk['name'] ?></option>
            <? } ?>
        </select>
    </div>    
    <?php endif ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Bảo hành</p>
        <select name="bao_hanh" class="form-control share_select2 w_100">
            <option value="">Bảo hành</option>
            <?
            $query_bh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`, `id_parents`, `id_danhmuc` FROM `bao_hanh` WHERE id_parents = 8");
            $sql_bh = $query_bh->result_array();
            ?>
           <? foreach ($sql_bh as $bh) : ?>
                <option <?if($bh['id_baohanh']==$bao_hanh) echo 'selected' ?> value="<?= $bh['id_baohanh'] ?>"><?= $bh['tgian_baohanh'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>

<!-- XE MÁY ĐIỆN/XE ĐẠP ĐIỆN -->
<? } else if ($tt_con == 40||$tt_con ==41) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng xe</p>
        <select  name="hang" class="form-control share_select2 w_100">
            <option value="">Hãng xe</option>
            <?
            $query_hang = new db_query("SELECT `id`, `ten_hang`, `id_parent` FROM `hang` WHERE id_parent = 40 ");
            $sql_hang = $query_hang->result_array();
            ?>
            <? foreach ($sql_hang as $rows) : ?>
                <option <?if($rows['id']==$hang)echo 'selected' ?> value="<?= $rows['id'] ?>"><?= $rows['ten_hang'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Động cơ</p>
        <select  name="dong_co" class="form-control share_select2 w_100">
            <option value="">Động cơ</option>
            <?
            $list_dongco = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = 40 ");
            ?>
            <? while ($row_dongco = mysql_fetch_assoc($list_dongco->result)) { ?>
                <option <?if( $row_dongco['id_dl']==$dong_co)echo 'selected' ?>  value="<?= $row_dongco['id_dl'] ?>"><?= $row_dongco['ten_dl'] ?></option>
            <? } ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Màu sắc</p>
        <select  name="mau_sac" class="form-control share_select2 w_100">
            <option value="">Màu sắc</option>
            <?
            $query_mx = new db_query("SELECT `id_color`, `mau_sac`, `id_parents`, `id_dm` FROM `mau_sac` WHERE id_parents = 8");
            $sql_mx = $query_mx->result_array();
            ?>
            <? foreach ($sql_mx as $mx) : ?>
                <option <?if( $mx['id_color']==$mau_sac)echo 'selected' ?>  value="<?= $mx['id_color'] ?>"><?= $mx['mau_sac'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Bảo hành</p>
        <select name="bao_hanh" class="form-control share_select2 w_100">
            <option value="">Bảo hành</option>
            <?
            $query_bh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`, `id_parents`, `id_danhmuc` FROM `bao_hanh` WHERE id_parents = 8");
            $sql_bh = $query_bh->result_array();
            ?>
           <? foreach ($sql_bh as $bh) : ?>
                <option <?if($bh['id_baohanh']==$bao_hanh) echo 'selected' ?> value="<?= $bh['id_baohanh'] ?>"><?= $bh['tgian_baohanh'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>

    <!-- XE MÁY -->

    <? } else if ($tt_con == 9) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng xe</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="hang" class="form-control share_select2 w_100">
            <option value="">Hãng xe</option>
           <?
            $query_xm = new db_query("SELECT `id`, `ten_hang`, `id_parent` FROM `hang` WHERE id_parent = 9 ");
            $sql_xm = $query_xm->result_array();
            ?>
            <? foreach ($sql_xm as $xm) : ?>
                <option <?if($xm['id']==$hang)echo 'selected' ?> value="<?= $xm['id'] ?>"><?= $xm['ten_hang'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="dong_doi mb_20">
        <?php if (isset($hang) && $hang>0): ?>
            <?php if ($hang != 1286): ?>
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng xe</p>
            <?
            $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $hang ");
            ?>
                <select name="dong_xe" class="form-control share_select2 w_100">
                    <option value="">Dòng xe</option>
                    <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                        <option <?if($row_dong['id']==$dong_xe)echo 'selected' ?> value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                    <? } ?>
                </select>
        <?php endif ?>
        <?php if ($hang == 1286): ?>
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng xe</p>
            <input type="text" value="<?=($dong_xe)?$dong_xe:''?>" name="dong_xe" class="m_timkiem_input" autocomplete="off" placeholder="Nhập dòng xe">
        <?php endif ?>
        <?php endif ?>
    </div>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại xe</p>
        <select  name="loai_xe" class="form-control share_select2 w_100">
            <option value="">Loại xe</option>
            <?
            $query_lx = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_danhmuc = 9");
            $result_lx = $query_lx->result_array();
            ?>
            <?foreach($result_lx as $lx):?>
                <option <?if($lx['id']==$loai_xe)echo 'selected' ?>  value="<?= $lx['id']?>"><?= $lx['ten_loai']?></option>
            <?endforeach?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dung tích xe</p>
        <select  name="dung_tich" class="form-control share_select2 w_100">
            <option value="">Dung tích xe</option>
            <?
            $query_dt = new db_query("SELECT `id_dl`, `ten_dl`, `id_danhmuc`, `phan_loai` FROM `dung_luong` WHERE id_danhmuc = 9 AND phan_loai = 3");
            $result_dt = $query_dt->result_array();
            ?>
            <? foreach ($result_dt as $dt) : ?>
                <option <?if($dt['id_dl']==$dung_tich)echo 'selected' ?> value="<?= $dt['id_dl'] ?>"><?= $dt['ten_dl'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <?php if ($acc_type == 2||$acc_type == 0): ?>
        
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Năm sản xuất</p>
        <select  name="nam_san_xuat" class="form-control share_select2 w_100">
            <option value="">Năm sản xuất</option>
            <?
            $query_nsx = new db_query("SELECT `id`, `nam_san_xuat` FROM `nam_san_xuat` WHERE id_danhmuc = 2");
            $result_nsx  = $query_nsx->result_array();
            ?>
            <? foreach ($result_nsx as $rows) : ?>
                <option <?if($rows['id']==$nam_san_xuat)echo 'selected' ?> value="<?= $rows['id'] ?>"><?= $rows['nam_san_xuat'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <?php endif ?>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Bảo hành</p>
        <select name="bao_hanh" class="form-control share_select2 w_100">
            <option value="">Bảo hành</option>
            <?
            $query_bh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`, `id_parents`, `id_danhmuc` FROM `bao_hanh` WHERE id_parents = 8");
            $sql_bh = $query_bh->result_array();
            ?>
           <? foreach ($sql_bh as $bh) : ?>
                <option <?if($bh['id_baohanh']==$bao_hanh) echo 'selected' ?> value="<?= $bh['id_baohanh'] ?>"><?= $bh['tgian_baohanh'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Cũ (Chưa sửa chữa)</option>
            <option <?if($tinh_trang==3) echo 'selected' ?> value="3">Cũ (Đã sửa chữa)</option>
        </select>
    </div>

    <!-- OTO -->

<? } else if ($tt_con == 10) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng xe</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="hang" class="form-control share_select2 w_100">
            <option value="">Hãng xe</option>
           <?
            $query_hang = new db_query("SELECT `id`, `ten_hang`, `id_parent` FROM `hang` WHERE id_parent = 10");
            $result_hang = $query_hang->result_array();
            ?>
            <? foreach ($result_hang as $rows) : ?>
                <option <?if($rows['id']==$hang) echo 'selected' ?> value="<?= $rows['id'] ?>"><?= $rows['ten_hang'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="dong_doi mb_20">
        <?php if (isset($hang)&&$hang>0): ?>
        <?php if ($hang != 1363): ?>
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng xe</p>
            <?
            $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $hang ");
            ?>
            <select name="dong_xe" class="form-control share_select2 w_100">
                <option value="">Dòng xe</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option <?if($dong_xe==$row_dong['id'])echo 'selected' ?> value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                <? } ?>
            </select>
        <?php endif ?>
        <?php if ($hang == 1363): ?>
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng xe</p>
            <input type="text" value="<?=($dong_xe)?$dong_xe:''?>" name="dong_xe" class="m_timkiem_input" autocomplete="off" placeholder="Nhập dòng xe">
        <?php endif ?>
        <?php endif ?>
    </div>

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Năm sản xuất</p>
        <select  name="nam_san_xuat" class="form-control share_select2 w_100">
            <option value="">Năm sản xuất</option>
            <?
            $query_nsx = new db_query("SELECT `id`, `nam_san_xuat`, `id_cha`, `id_danhmuc` FROM `nam_san_xuat` WHERE id_danhmuc = 2");
            $result_nsx  = $query_nsx->result_array();
            ?>
            <? foreach ($result_nsx as $rows) : ?>
                <option <?if($nam_san_xuat==$rows['id']) echo 'selected' ?> value="<?= $rows['id'] ?>"><?= $rows['nam_san_xuat'] ?></option>
            <? endforeach ?>
        </select>
    </div>

    
    <?php if ($acc_type == 2 || $acc_type == 0): ?>

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hộp số</p>
        <select name="hop_so" class="form-control share_select2 w_100">
            <option value="">Hộp số</option>
            <option <?if($hop_so==1) echo 'selected' ?> value="1">Tự động</option>
            <option <?if($hop_so==2) echo 'selected' ?> value="2">Số sàn</option>
            <option <?if($hop_so==3) echo 'selected' ?> value="3">Bán tự động</option>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Nhiên liệu</p>
        <select  name="nhien_lieu" class="form-control share_select2 w_100">
            <option value="">Nhiên liệu</option>
            <option <?if($nhien_lieu==1) echo 'selected' ?> value="1">Xăng</option>
            <option <?if($nhien_lieu==2) echo 'selected' ?> value="2">Dầu</option>
            <option <?if($nhien_lieu==3) echo 'selected' ?> value="3">Động cơ Hybird</option>
            <option <?if($nhien_lieu==4) echo 'selected' ?> value="4">Điện</option>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Xuất xứ</p>
        <select  name="xuat_xu" class="form-control share_select2 w_100">
            <option value="">Xuất xứ</option>
            <?
            $query_xx = new db_query("SELECT `id_xuatxu`, `noi_xuatxu`, `id_parents`, `id_danhmuc` FROM `xuat_xu` WHERE id_parents = 8");
            $sql_xx = $query_xx->result_array();
            ?>
            <? foreach ($sql_xx as $xx) : ?>
                <option <?if($xuat_xu==$xx['id_xuatxu'])echo 'selected' ?> value="<?= $xx['id_xuatxu'] ?>"><?= $xx['noi_xuatxu'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Số chỗ</p>
        <select  name="so_cho" class="form-control share_select2 w_100">
            <option value="">Số chỗ</option>
            <?
            $sql_sc = new db_query("SELECT `id`, `so_luong` FROM `number_content` WHERE id_parents = 10");
            $result_sc = $sql_sc->result_array();
            ?>
            <? foreach ($result_sc as $sc) : ?>
                <option <?if($so_cho==$sc['id'])echo 'selected' ?> value="<?= $sc['id'] ?>"><?= $sc['so_luong'] ?></option>
            <? endforeach ?>
        </select>
    </div>  
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Màu sắc</p>
        <select  name="mau_sac" class="form-control share_select2 w_100">
            <option value="">Màu sắc</option>
            <?
            $query_mx = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE id_dm = 2");
            $sql_mx = $query_mx->result_array();
            ?>
            <? foreach ($sql_mx as $mx) : ?>
                <option <?if($mau_sac==$mx['id_color'])echo 'selected' ?> value="<?= $mx['id_color'] ?>"><?= $mx['mau_sac'] ?></option>
            <? endforeach ?>
        </select>
    </div>  
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Kiểu dáng</p>
        <select  name="kieu_dang" class="form-control share_select2 w_100">
            <option value="">Kiểu dáng</option>
            <?
            $query_kd = new db_query("SELECT `id`, `name` FROM `nhom_sanpham_hinhdang` WHERE id_cha = 10");
            $result_kd = $query_kd->result_array();
            ?>
            <? foreach ($result_kd as $kd) : ?>
                <option <?if($kieu_dang==$kd['id'])echo 'selected' ?> value="<?= $kd['id'] ?>"><?= $kd['name'] ?></option>
            <? endforeach ?>
        </select>
    </div>    
    
    <?php endif ?>
    <?php if ($acc_type == 1|| $acc_type == 3): ?>
     <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Số chỗ</p>
        <select  name="so_cho" class="form-control share_select2 w_100">
            <option value="">Số chỗ</option>
            <?
            $sql_sc = new db_query("SELECT `id`, `so_luong` FROM `number_content` WHERE id_parents = 10");
            $result_sc = $sql_sc->result_array();
            ?>
            <? foreach ($result_sc as $sc) : ?>
                <option <?if($so_cho==$sc['id'])echo 'selected' ?> value="<?= $sc['id'] ?>"><?= $sc['so_luong'] ?></option>
            <? endforeach ?>
        </select>
    </div>  
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Màu sắc</p>
        <select  name="mau_sac" class="form-control share_select2 w_100">
            <option value="">Màu sắc</option>
            <?
            $query_mx = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE id_dm = 2");
            $sql_mx = $query_mx->result_array();
            ?>
            <? foreach ($sql_mx as $mx) : ?>
                <option <?if($mau_sac==$mx['id_color'])echo 'selected' ?> value="<?= $mx['id_color'] ?>"><?= $mx['mau_sac'] ?></option>
            <? endforeach ?>
        </select>
    </div>    
    <?php endif ?>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Bảo hành</p>
        <select name="bao_hanh" class="form-control share_select2 w_100">
            <option value="">Bảo hành</option>
            <?
            $query_bh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`, `id_parents`, `id_danhmuc` FROM `bao_hanh` WHERE id_parents = 8");
            $sql_bh = $query_bh->result_array();
            ?>
           <? foreach ($sql_bh as $bh) : ?>
                <option <?if($bao_hanh==$bh['id_baohanh']) echo 'selected' ?> value="<?= $bh['id_baohanh'] ?>"><?= $bh['tgian_baohanh'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected'; ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected'; ?> value="2">Cũ (Chưa sửa chữa)</option>
            <option <?if($tinh_trang==3) echo 'selected'; ?> value="3">Cũ (Đã sửa chữa)</option>
        </select>
    </div>
<!-- XE TẢI -->    
<? } else if ($tt_con == 38) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng xe</p>
        <select  name="hang" class="form-control share_select2 w_100">
            <option value="">Hãng xe</option>
            <?
            $sql_hx = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE id_parent = 38");
            $result_hang = $sql_hx->result_array();
            ?>
            <? foreach ($result_hang as $hangxe) : ?>
                <option <?if($hang==$hangxe['id'])echo "selected" ?> value="<?= $hangxe['id'] ?>"><?= $hangxe['ten_hang'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Trọng tải</p>
        <select  name="trong_tai" class="form-control share_select2 w_100">
            <option value="">Trọng tải</option>
            <?
            $sql_tt = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE id_danhmuc =38");
            $result_tt = $sql_tt->result_array();
            ?>
            <? foreach ($result_tt as $tt) : ?>
                <option <?if($trong_tai==$tt['id_dl'])echo "selected" ?> value="<?= $tt['id_dl'] ?>"><?= $tt['ten_dl'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Nhiên liệu</p>
        <select  name="nhien_lieu" class="form-control share_select2 w_100">
            <option value="">Nhiên liệu</option>
            <option <?if($nhien_lieu==1) echo 'selected' ?> value="1">Xăng</option>
            <option <?if($nhien_lieu==2) echo 'selected' ?> value="2">Dầu</option>
            <option <?if($nhien_lieu==3) echo 'selected' ?> value="3">Động cơ Hybird</option>
        </select>
    </div>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Màu sắc</p>
        <select  name="mau_sac" class="form-control share_select2 w_100">
            <option value="">Màu sắc</option>
            <?
            $query_mx = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE id_dm = 2");
            $sql_mx = $query_mx->result_array();
            ?>
            <? foreach ($sql_mx as $mx) : ?>
                <option <?if($mau_sac==$mx['id_color'])echo "selected" ?> value="<?= $mx['id_color'] ?>"><?= $mx['mau_sac'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>
<!-- Phụ tùng xe -->    
<? } else if ($tt_con == 39) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại phụ tùng</p>
        <select  name="loai_phu_tung" class="form-control share_select2 w_100">
            <option value="">Loại phụ tùng</option>
            <?
            $sql_pt = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_danhmuc = 39");
            $query_pt = $sql_pt->result_array();
            ?>
            <? foreach ($query_pt as $pt) : ?>
                <option <?if($loai_phu_tung==$pt['id'])echo "selected" ?>  value="<?= $pt['id'] ?>"><?= $pt['ten_loai'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>

    <!-- Nội thất oto -->    
<? } else if ($tt_con == 42) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại nội thất</p>
        <select  name="loai_noithat" class="form-control share_select2 w_100">
            <option value="">Loại nội thất</option>
            <?
            $sql_nt = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = 42");
            $result_nt = $sql_nt->result_array();
            ?>
            <? foreach ($result_nt as $nt) : ?>
                <option  <?if($loai_noithat==$nt['id'])echo "selected" ?> value="<?= $nt['id'] ?>"><?= $nt['ten_loai'] ?></option>
            <? endforeach ?>
        </select>
    </div>
    
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>
<!-- NHÀ ĐẤT -->    
<? } else if ($tt_con == 11) { ?>
    <?php if ($acc_type == 2||$acc_type == 0): ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Cần bán/Cho thuê</p>
        <select name="can_ban_mua" class="form-control share_select2 w_100">
            <option value="">Cần bán/Cho thuê</option>
           <option <?if($can_ban_mua==1) echo 'selected' ?> value="1">Cần bán</option>
           <option <?if($can_ban_mua==2) echo 'selected' ?> value="2">Cho thuê</option>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20 po_ra">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tên toà nhà/Khu dân cư</p>
        <input type="text" value="<?=($ten_toa_nha)?$ten_toa_nha:''?>" placeholder="Tên toà nhà/Khu dân cư" autocomplete="off" name="ten_toa_nha" class="s_dt font-14-16 w_100 gia-ban-sp_df"  >
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tổng số tầng</p>
        <select name="tong_so_tang" class="form-control share_select2 w_100">
            <option value="">Tổng số tầng</option>
          <?
            $sql_tang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 1");
            $result_t = $sql_tang->result_array();
            ?>
         <? foreach ($result_t as $tang) : ?>
             <option <?if($tang['id']==$tong_so_tang) echo 'selected' ?> value="<?= $tang['id'] ?>"><?= $tang['so_luong'] ?></option>
         <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hướng cửa chính</p>
        <select name="huong_chinh" class="form-control share_select2 w_100">
            <option value="">Hướng cửa chính</option>
             <option <?if($huong_chinh==1) echo 'selected' ?> value="1">Đông</option>
             <option <?if($huong_chinh==2) echo 'selected' ?> value="2">Tây </option>
             <option <?if($huong_chinh==3) echo 'selected' ?> value="3">Nam </option>
             <option <?if($huong_chinh==4) echo 'selected' ?> value="4">Bắc </option>
             <option <?if($huong_chinh==5) echo 'selected' ?> value="5">Đông bắc </option>
             <option <?if($huong_chinh==6) echo 'selected' ?> value="6">Đông nam </option>
             <option <?if($huong_chinh==7) echo 'selected' ?> value="7">Tây bắc </option>
             <option <?if($huong_chinh==8) echo 'selected' ?> value="8">Tây nam </option>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Giấy tờ pháp lý</p>
        <select name="giay_to_phap_ly" class="form-control share_select2 w_100">
            <option value="">Giấy tờ pháp lý</option>
             <option <?if($giay_to_phap_ly==1) echo 'selected' ?> value="1">Đã có sổ</option>
             <option <?if($giay_to_phap_ly==2) echo 'selected' ?> value="2">Đang chờ sổ</option>
             <option <?if($giay_to_phap_ly==3) echo 'selected' ?> value="3">Giấy tờ khác</option>
        </select>
    </div>
    <?php endif ?>
    <?php if ($acc_type == 1||$acc_type == 3): ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Cần mua/Cần thuê </p>
        <select name="can_ban_mua" class="form-control share_select2 w_100">
            <option value="">Cần mua/Cần thuê </option>
           <option <?if($can_ban_mua==3) echo 'selected' ?> value="3">Cần mua</option>
           <option <?if($can_ban_mua==4) echo 'selected' ?> value="4">Cần thuê</option>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tổng số tầng</p>
        <select name="tong_so_tang" class="form-control share_select2 w_100">
            <option value="">Tổng số tầng</option>
           <?
            $sql_tang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE  type_zoom = 1");
            $result_t = $sql_tang->result_array();
            ?>
             <? foreach ($result_t as $tang) : ?>
                 <option <?if($tang['id']==$tong_so_tang) echo 'selected' ?> value="<?= $tang['id'] ?>"><?= $tang['so_luong'] ?></option>
             <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Số phòng vệ sinh</p>
        <select name="so_pve_sinh" class="form-control share_select2 w_100">
            <option value="">Số phòng vệ sinh</option>
           <?
            $sql_vs = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 3");
            $result_vs = $sql_vs->result_array();
            ?>
         <? foreach ($result_vs as $vs) : ?>
             <option <?if($vs['id']==$so_pve_sinh) echo 'selected' ?> value="<?= $vs['id'] ?>"><?= $vs['so_luong'] ?></option>
         <? endforeach ?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Số phòng ngủ</p>
        <select name="so_pngu" class="form-control share_select2 w_100">
            <option value="">Số phòng ngủ</option>
          <?
            $sql_n = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 2");
            $result_n = $sql_n->result_array();
            ?>
         <? foreach ($result_n as $pn) : ?>
             <option <?if($pn['id']==$so_pngu) echo 'selected' ?> value="<?= $pn['id'] ?>"><?= $pn['so_luong'] ?></option>
         <? endforeach ?>
        </select>
    </div>
    <?php endif ?>

    <div class="thuoc_tinh w_100 mb_20 po_ra">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Diện tích</p>
        <input type="text" value="<?=($dien_tich)?$dien_tich:''?>" placeholder="Diện tích" autocomplete="off" name="dien_tich" class="s_dt font-14-16 w_100 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
            <p class="cl_bl po_ab" >m2</p>
    </div>

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng nội thất</p>
        <select name="tinh_trang_noi_that" class="form-control share_select2 w_100">
            <option value="">Tình trạng nội thất</option>
            <option <?if($tinh_trang_noi_that==1) echo 'selected' ?> value="1">Nội thất cao cấp</option>
            <option <?if($tinh_trang_noi_that==2) echo 'selected' ?> value="2">Nội thất đầy đủ</option>
            <option <?if($tinh_trang_noi_that==3) echo 'selected' ?> value="3">Hoàn thiện cơ bản</option>
            <option <?if($tinh_trang_noi_that==4) echo 'selected' ?> value="4">Bàn giao thô</option>
        </select>
    </div>
 
 <!-- ĐẤT -->
<? } else if ($tt_con == 12) { ?>

    <?php if ($acc_type == 2||$acc_type == 0): ?>
        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Cần bán/Cho thuê</p>
            <select name="can_ban_mua" class="form-control share_select2 w_100">
                <option value="">Cần bán/Cho thuê</option>
               <option <?if($can_ban_mua==1) echo 'selected' ?> value="1">Cần bán</option>
               <option <?if($can_ban_mua==2) echo 'selected' ?> value="2">Cho thuê</option>
            </select>
        </div>
        <div class="thuoc_tinh w_100 mb_20 po_ra">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tên dự án</p>
            <input type="text" value="<?=($ten_toa_nha)?$ten_toa_nha:''?>" placeholder="Tên dự án" autocomplete="off" name="ten_toa_nha" class="s_dt font-14-16 w_100 gia-ban-sp_df"  >
        </div>
         <div class="thuoc_tinh w_100 mb_20 po_ra">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chiều dài</p>
            <input type="text" value="<?=($chieu_dai)?$chieu_dai:''?>" placeholder="Chiều dài" autocomplete="off" name="chieu_dai" class="s_dt font-14-16 w_100 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                <p class="cl_bl po_ab" >m</p>
        </div>
         <div class="thuoc_tinh w_100 mb_20 po_ra">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chiều ngang</p>
            <input type="text" value="<?=($chieu_rong)?$chieu_rong:''?>" placeholder="Chiều ngang" autocomplete="off" name="chieu_rong" class="s_dt font-14-16 w_100 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                <p class="cl_bl po_ab" >m</p>
        </div>
    <?php endif ?>

    <?php if ($acc_type == 1||$acc_type == 3): ?>
        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Cần mua/Cần thuê </p>
            <select name="can_ban_mua" class="form-control share_select2 w_100">
                <option value="">Cần mua/Cần thuê </option>
               <option <?if($can_ban_mua==3) echo 'selected' ?> value="3">Cần mua</option>
               <option <?if($can_ban_mua==4) echo 'selected' ?> value="4">Cần thuê</option>
            </select>
        </div>
    <?php endif ?>

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại hình đất</p>
        <select name="loai_hinh_dat" class="form-control share_select2 w_100">
            <option value="">Loại hình đất</option>
            <option <?if($loai_hinh_dat==1) echo 'selected' ?> value="1">Đất thổ cư</option>
            <option <?if($loai_hinh_dat==2) echo 'selected' ?> value="2">Đất nền dự án</option>
            <option <?if($loai_hinh_dat==3) echo 'selected' ?> value="3">Đất công nghiệp</option>
            <option <?if($loai_hinh_dat==4) echo 'selected' ?> value="4">Đất nông nghiệp</option>
        </select>
    </div>

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hướng đất</p>
        <select name="huong_chinh" class="form-control share_select2 w_100">
            <option value="">Hướng đất</option>
             <option <?if($huong_chinh==1) echo 'selected' ?> value="1">Đông</option>
             <option <?if($huong_chinh==2) echo 'selected' ?> value="2">Tây </option>
             <option <?if($huong_chinh==3) echo 'selected' ?> value="3">Nam </option>
             <option <?if($huong_chinh==4) echo 'selected' ?> value="4">Bắc </option>
             <option <?if($huong_chinh==5) echo 'selected' ?> value="5">Đông bắc </option>
             <option <?if($huong_chinh==6) echo 'selected' ?> value="6">Đông nam </option>
             <option <?if($huong_chinh==7) echo 'selected' ?> value="7">Tây bắc </option>
             <option <?if($huong_chinh==8) echo 'selected' ?> value="8">Tây nam </option>
        </select>
    </div>

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Giấy tờ pháp lý</p>
        <select name="giay_to_phap_ly" class="form-control share_select2 w_100">
            <option value="">Giấy tờ pháp lý</option>
             <option <?if($giay_to_phap_ly==1) echo 'selected' ?> value="1">Đã có sổ</option>
             <option <?if($giay_to_phap_ly==2) echo 'selected' ?> value="2">Đang chờ sổ</option>
             <option <?if($giay_to_phap_ly==3) echo 'selected' ?> value="3">Giấy tờ khác</option>
        </select>
    </div>

    <div class="thuoc_tinh w_100 mb_20 po_ra">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Diện tích</p>
        <input type="text" value="<?=($dien_tich)?$dien_tich:''?>" placeholder="Diện tích" autocomplete="off" name="dien_tich" class="s_dt font-14-16 w_100 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
            <p class="cl_bl po_ab" >m2</p>
    </div>

<? } else if ($tt_con == 26||$tt_con == 27||$tt_con == 29||$tt_con == 33||$tt_con == 34||$tt_con == 28) { ?>
    <?php if ($acc_type == 2||$acc_type == 0): ?>
        
        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Cần bán/Cho thuê</p>
            <select name="can_ban_mua" class="form-control share_select2 w_100">
                <option value="">Cần bán/Cho thuê</option>
               <option <?if($can_ban_mua==1) echo 'selected' ?> value="1">Cần bán</option>
               <option <?if($can_ban_mua==2) echo 'selected' ?> value="2">Cho thuê</option>
            </select>
        </div>
        <div class="thuoc_tinh w_100 mb_20 po_ra">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tên toà nhà/Khu dân cư</p>
            <input type="text" value="<?=($ten_toa_nha)?$ten_toa_nha:''?>" placeholder="Tên toà nhà/Khu dân cư" autocomplete="off" name="ten_toa_nha" class="s_dt font-14-16 w_100 gia-ban-sp_df"  >
        </div>
        <?php if ($tt_con == 33||$tt_con == 27||$tt_con == 34): ?>
        <div class="thuoc_tinh w_100 mb_20 po_ra">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tầng số</p>
            <input type="text" value="<?=($tang_so)?$tang_so:''?>" placeholder="Tầng số" autocomplete="off" name="tang_so" class="s_dt font-14-16 w_100 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" >
        </div>
        <?php endif ?>

        <?php if ($tt_con == 27): ?>
        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại hình căn hộ </p>
            <select name="loai_hinh_canho" class="form-control share_select2 w_100">
                <option value="">Loại hình căn hộ </option>
                <option <?if($loai_hinh_canho==1) echo 'selected' ?> value="1">Chung cư</option>
                <option <?if($loai_hinh_canho==2) echo 'selected' ?> value="2">Duplex</option>
                <option <?if($loai_hinh_canho==3) echo 'selected' ?> value="3">Penthouse</option>
                <option <?if($loai_hinh_canho==4) echo 'selected' ?> value="4">Căn hộ dịch vụ, mini</option>
                <option <?if($loai_hinh_canho==5) echo 'selected' ?> value="5">Tập thể, cư xá</option>
                <option <?if($loai_hinh_canho==6) echo 'selected' ?> value="6">Officetel</option>
            </select>
        </div>
        <?php endif ?>

        <?php if ($tt_con != 33&&$tt_con != 34): ?>

            <?php if ($tt_con != 27): ?>
                <div class="thuoc_tinh w_100 mb_20">
                    <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tổng số tầng</p>
                    <select name="tong_so_tang" class="form-control share_select2 w_100">
                        <option value="">Tổng số tầng</option>
                         <?
                        $sql_tang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE  type_zoom = 1");
                        $result_t = $sql_tang->result_array();
                        ?>
                        <? foreach ($result_t as $tang) : ?>
                            <option <?if($tang['id']==$tong_so_tang) echo 'selected' ?> value="<?= $tang['id'] ?>"><?= $tang['so_luong'] ?></option>
                        <? endforeach ?>
                    </select>
                </div>
            <?php endif ?>

            <div class="thuoc_tinh w_100 mb_20">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Số phòng ngủ</p>
                <select name="so_pngu" class="form-control share_select2 w_100">
                    <option value="">Số phòng ngủ</option>
                     <?
                    $sql_n = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 2");
                    $result_n = $sql_n->result_array();
                    ?>
                    <? foreach ($result_n as $pn) : ?>
                        <option <?if($pn['id']==$so_pngu) echo 'selected' ?> value="<?= $pn['id'] ?>"><?= $pn['so_luong'] ?></option>
                    <? endforeach ?>
                </select>
            </div>

            <div class="thuoc_tinh w_100 mb_20">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Số phòng vệ sinh</p>
                <select name="so_pve_sinh" class="form-control share_select2 w_100">
                    <option value="">Số phòng vệ sinh</option>
                     <?
                    $sql_vs = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 3");
                    $result_vs = $sql_vs->result_array();
                    ?>
                    <? foreach ($result_vs as $vs) : ?>
                        <option <?if($vs['id']==$so_pve_sinh) echo 'selected' ?> value="<?= $vs['id'] ?>"><?= $vs['so_luong'] ?></option>
                    <? endforeach ?>
                </select>
            </div>
        <?php endif ?>
        <?php if ($tt_con != 27): ?>
            <div class="thuoc_tinh w_100 mb_20">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hướng cửa chính</p>
                <select name="huong_chinh" class="form-control share_select2 w_100">
                    <option value="">Hướng cửa chính</option>
                     <option <?if($huong_chinh==1) echo 'selected' ?> value="1">Đông</option>
                     <option <?if($huong_chinh==2) echo 'selected' ?> value="2">Tây </option>
                     <option <?if($huong_chinh==3) echo 'selected' ?> value="3">Nam </option>
                     <option <?if($huong_chinh==4) echo 'selected' ?> value="4">Bắc </option>
                     <option <?if($huong_chinh==5) echo 'selected' ?> value="5">Đông bắc </option>
                     <option <?if($huong_chinh==6) echo 'selected' ?> value="6">Đông nam </option>
                     <option <?if($huong_chinh==7) echo 'selected' ?> value="7">Tây bắc </option>
                     <option <?if($huong_chinh==8) echo 'selected' ?> value="8">Tây nam </option>
                </select>
            </div>
        <?php endif ?>
        
        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Giấy tờ pháp lý</p>
            <select name="giay_to_phap_ly" class="form-control share_select2 w_100">
                <option value="">Giấy tờ pháp lý</option>
                 <option <?if($giay_to_phap_ly==1) echo 'selected' ?> value="1">Đã có sổ</option>
                 <option <?if($giay_to_phap_ly==2) echo 'selected' ?> value="2">Đang chờ sổ</option>
                 <option <?if($giay_to_phap_ly==3) echo 'selected' ?> value="3">Giấy tờ khác</option>
            </select>
        </div>

        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng nội thất</p>
            <select name="tinh_trang_noi_that" class="form-control share_select2 w_100">
                <option value="">Tình trạng nội thất</option>
                 <option <?if($tinh_trang_noi_that==1) echo 'selected' ?> value="1">Nội thất cao cấp</option>
                <option <?if($tinh_trang_noi_that==2) echo 'selected' ?> value="2">Nội thất đầy đủ</option>
                <option <?if($tinh_trang_noi_that==3) echo 'selected' ?> value="3">Hoàn thiện cơ bản</option>
                <option <?if($tinh_trang_noi_that==4) echo 'selected' ?> value="4">Bàn giao thô</option>
            </select>
        </div>
        
        <div class="thuoc_tinh w_100 mb_20 po_ra">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Diện tích</p>
            <input type="text" value="<?=($dien_tich)?$dien_tich:''?>" placeholder="Diện tích" autocomplete="off" name="dien_tich" class="s_dt font-14-16 w_100 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                <p class="cl_bl po_ab" >m2</p>
        </div>  
         <div class="thuoc_tinh w_100 mb_20 po_ra">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chiều dài</p>
            <input type="text" value="<?=($chieu_dai)?$chieu_dai:''?>" placeholder="Chiều dài" autocomplete="off" name="chieu_dai" class="s_dt font-14-16 w_100 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                <p class="cl_bl po_ab" >m</p>
        </div>
        <div class="thuoc_tinh w_100 mb_20 po_ra">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chiều ngang</p>
            <input type="text" value="<?=($chieu_rong)?$chieu_rong:''?>" placeholder="Chiều ngang" autocomplete="off" name="chieu_rong" class="s_dt font-14-16 w_100 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                <p class="cl_bl po_ab" >m</p>
        </div>
    <?php endif ?>

    <?php if ($acc_type == 1||$acc_type == 3): ?>
        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Cần mua/Cần thuê </p>
            <select name="can_ban_mua" class="form-control share_select2 w_100">
                <option value="">Cần mua/Cần thuê </option>
               <option <?if($can_ban_mua==3) echo 'selected' ?> value="3">Cần mua</option>
               <option <?if($can_ban_mua==4) echo 'selected' ?> value="4">Cần thuê</option>
            </select>
        </div>

        <?php if ($tt_con == 33||$tt_con == 27||$tt_con == 34): ?>
            <div class="thuoc_tinh w_100 mb_20 po_ra">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tầng số</p>
                <input type="text" value="<?=($tang_so)?$tang_so:''?>" placeholder="Tầng số" autocomplete="off" name="tang_so" class="s_dt font-14-16 w_100 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" >
            </div>
        <?php endif ?>

        <?php if ($tt_con == 27): ?>
            <div class="thuoc_tinh w_100 mb_20">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại hình căn hộ </p>
                <select name="loai_hinh_canho" class="form-control share_select2 w_100">
                    <option value="">Loại hình căn hộ </option>
                    <option <?if($loai_hinh_canho==1) echo 'selected' ?> value="1">Chung cư</option>
                    <option <?if($loai_hinh_canho==2) echo 'selected' ?> value="2">Duplex</option>
                    <option <?if($loai_hinh_canho==3) echo 'selected' ?> value="3">Penthouse</option>
                    <option <?if($loai_hinh_canho==4) echo 'selected' ?> value="4">Căn hộ dịch vụ, mini</option>
                    <option <?if($loai_hinh_canho==5) echo 'selected' ?> value="5">Tập thể, cư xá</option>
                    <option <?if($loai_hinh_canho==6) echo 'selected' ?> value="6">Officetel</option>
                </select>
            </div>
        <?php endif ?>
        <?php if ($tt_con != 33&&$tt_con != 34): ?>
            <?php if ($tt_con != 27): ?>
            <div class="thuoc_tinh w_100 mb_20">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tổng số tầng</p>
                <select name="tong_so_tang" class="form-control share_select2 w_100">
                    <option value="">Tổng số tầng</option>
                     <?
                    $sql_tang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE  type_zoom = 1");
                    $result_t = $sql_tang->result_array();
                    ?>
                    <? foreach ($result_t as $tang) : ?>
                        <option <?if($tang['id']==$tong_so_tang) echo 'selected' ?> value="<?= $tang['id'] ?>"><?= $tang['so_luong'] ?></option>
                    <? endforeach ?>
                </select>
            </div>
            <?php endif ?>
            <div class="thuoc_tinh w_100 mb_20">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Số phòng ngủ</p>
                <select name="so_pngu" class="form-control share_select2 w_100">
                    <option value="">Số phòng ngủ</option>
                     <?
                    $sql_n = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 2");
                    $result_n = $sql_n->result_array();
                    ?>
                    <? foreach ($result_n as $pn) : ?>
                        <option <?if($pn['id']==$so_pngu) echo 'selected' ?> value="<?= $pn['id'] ?>"><?= $pn['so_luong'] ?></option>
                    <? endforeach ?>
                </select>
            </div>

            <div class="thuoc_tinh w_100 mb_20">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Số phòng vệ sinh</p>
                <select name="so_pve_sinh" class="form-control share_select2 w_100">
                    <option value="">Số phòng vệ sinh</option>
                     <?
                    $sql_vs = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 3");
                    $result_vs = $sql_vs->result_array();
                    ?>
                    <? foreach ($result_vs as $vs) : ?>
                        <option <?if($vs['id']==$so_pve_sinh) echo 'selected' ?> value="<?= $vs['id'] ?>"><?= $vs['so_luong'] ?></option>
                    <? endforeach ?>
                </select>
            </div>
        <?php endif ?>

        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng nội thất</p>
            <select name="tinh_trang_noi_that" class="form-control share_select2 w_100">
                <option value="">Tình trạng nội thất</option>
                 <option <?if($tinh_trang_noi_that==1) echo 'selected' ?> value="1">Nội thất cao cấp</option>
                <option <?if($tinh_trang_noi_that==2) echo 'selected' ?> value="2">Nội thất đầy đủ</option>
                <option <?if($tinh_trang_noi_that==3) echo 'selected' ?> value="3">Hoàn thiện cơ bản</option>
                <option <?if($tinh_trang_noi_that==4) echo 'selected' ?> value="4">Bàn giao thô</option>
            </select>
        </div>
        
        <div class="thuoc_tinh w_100 mb_20 po_ra">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Diện tích</p>
            <input type="text" value="<?=($dien_tich)?$dien_tich:''?>" placeholder="Diện tích" autocomplete="off" name="dien_tich" class="s_dt font-14-16 w_100 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                <p class="cl_bl po_ab" >m2</p>
        </div>  
    <?php endif ?>
                
<? } else if ($tt_con == 100) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại nhạc cụ</p>
        <select name="loai" class="form-control share_select2 w_100">
            <option value="">Loại nhạc cụ</option>
            <?
            $list_ncu = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $tt_con ");
            ?>
            <? while ($row_nc = mysql_fetch_assoc($list_ncu->result)) { ?>
                <option <?if($loai==$row_nc['id'])echo 'selected' ?> value="<?= $row_nc['id'] ?>"><?= $row_nc['ten_loai'] ?></option>
            <? } ?>
        </select>
    </div>

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>
<? } else if ($tt_con == 101||$tt_con == 103||$tt_con == 43||$tt_con == 44||$tt_con == 45||$tt_con == 46||$tt_con == 53||$tt_con == 54||$tt_con == 60) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>        
<? } else if ($tt_con == 102) { ?>

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
        <select name="loai" class="form-control share_select2 w_100">
            <option value="">Loại sản phẩm</option>
            <?
            $list_tm = new db_query("SELECT `id`, `ten_loai`  FROM `loai_chung` WHERE `id_danhmuc` = $tt_con ");
            ?>
            <? while ($row_l = mysql_fetch_assoc($list_tm->result)) { ?>
                <option <?if($loai==$row_l['id'])echo 'selected' ?> value="<?= $row_l['id'] ?>"><?= $row_l['ten_loai'] ?></option>
            <? } ?>
        </select>
    </div>

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>
<? } else if ($tt_con == 47||$tt_con == 48||$tt_con == 49||$tt_con == 50||$tt_con == 106) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
        <select name="loai" class="form-control share_select2 w_100">
            <option value="">Loại sản phẩm</option>
            <?
            $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $tt_con ");
            ?>
            <? while ($row_loai = mysql_fetch_assoc($list_loai->result)) { ?>
                <option <?if($loai==$row_loai['id'])echo 'selected' ?> value="<?= $row_loai['id'] ?>"><?= $row_loai['ten_loai'] ?></option>
            <? } ?>
        </select>
    </div>

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>
           
<? } else if ($tt_con == 94 || $tt_con == 95) { ?>   <!-- THỰC PHẨM ĐỒ UỐNG -->
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại thực phẩm</p>
        <select name="loai" class="form-control share_select2 w_100">
            <option value="">Loại thực phẩm</option>
            <?if($tt_con == 94){
                $thucpham = new db_query ("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $tt_con");
                while ($rs_thucpham = (mysql_fetch_assoc($thucpham->result))) {
            ?>
                <option <?if($loai==$rs_thucpham['id'])echo 'selected' ?> value="<?= $rs_thucpham['id']?>"><?= $rs_thucpham['ten_loai']?></option>
                <?}?>
            <?}else if($tt_con == 95){ 
                $douong = new db_query ("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $tt_con");    
                while ($rs_douong = (mysql_fetch_assoc($douong->result))) {
            ?>
                <option <?if($loai==$rs_douong['id'])echo 'selected' ?> value="<?= $rs_douong['id']?>"><?= $rs_douong['ten_loai']?></option>
                <?}?>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20 thechachung_df">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hạn sử dụng</p>
        <input type="date" class="input_chung_df" name="han_su_dung" value="<?=($han_su_dung)?$han_su_dung:''?>">
    </div>
<? } else if ($tt_con == 75 || $tt_con == 104 || $tt_con == 105) { ?>  <!-- THỂ THAO -->
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Môn thể thao</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="mon_the_thao" class="form-control share_select2 w_100">
            <option value="">Môn thể thao</option>
            <?$monthethao = new db_query("SELECT `id`,`ten_mon` FROM `mon_the_thao`");
            while ($rs_monthethao = (mysql_fetch_assoc($monthethao->result))) { ?>
        
                <option <?if($mon_the_thao==$rs_monthethao['id']) echo 'selected' ?> value="<?=$rs_monthethao['id']?>"><?= $rs_monthethao['ten_mon']?></option>
            <?}?>
        </select>
    </div>
    <div class="dong_doi mb_20">
        <?php if (isset($mon_the_thao)&&$mon_the_thao>0): ?>
            <?php if ($tt_con==75): ?>
                <?php if ($mon_the_thao!=8): ?>
                    <?
                    $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $mon_the_thao AND `id_danhmuc` = $tt_con ");
                    ?>
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại dụng cụ</p>
                        <select name="loai75" class="form-control share_select2 w_100">
                            <option value="">Loại dụng cụ</option>
                            <? while ($row_dc = mysql_fetch_assoc($list_loai->result)) { ?>
                                <option <?if($loai75==$row_dc['id']) echo 'selected' ?> value="<?= $row_dc['id'] ?>"><?= $row_dc['ten_loai'] ?></option>
                            <? } ?>
                        </select>
                <?php endif ?>
                <?php if ($mon_the_thao==8): ?>
                    <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại dụng cụ</p>
                    <input type="text" name="loai75" value="<?=($loai75)?$loai75:''?>"  class="m_timkiem_input" autocomplete="off" placeholder="Nhập loại dụng cụ">
                <?php endif ?>
            <?php endif ?>

            <?php if ($tt_con==105): ?>
                <?php if ($mon_the_thao!=8): ?>
                    <?
                    $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $mon_the_thao AND `id_danhmuc` = $tt_con ");
                    ?>
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại phụ kiện </p>
                        <select name="loai75" class="form-control share_select2 w_100">
                            <option value="">Loại phụ kiện </option>
                            <? while ($row_dc = mysql_fetch_assoc($list_loai->result)) { ?>
                                <option <?if($loai75==$row_dc['id']) echo 'selected' ?> value="<?= $row_dc['id'] ?>"><?= $row_dc['ten_loai'] ?></option>
                            <? } ?>
                        </select>
                <?php endif ?>
                <?php if ($mon_the_thao==8): ?>
                    <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại phụ kiện </p>
                    <input type="text" name="loai75" value="<?=($loai75)?$loai75:''?>" class="m_timkiem_input" autocomplete="off" placeholder="Nhập loại phụ kiện">
                <?php endif ?>
            <?php endif ?>

        <?php endif ?>
    </div>
    <?php if ($tt_con == 104): ?>
        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại thời trang</p>
            <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="loai" class="form-control share_select2 w_100">
                <option value="">Loại thời trang</option>
                <?
                $list_lc2 = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $tt_con ");
                ?>
                <? while ($row_lc1 = mysql_fetch_assoc($list_lc2->result)) { ?>
                    <option <?if($loai==$row_lc1['id']) echo 'selected' ?> value="<?= $row_lc1['id'] ?>"> <?= $row_lc1['ten_loai'] ?></option>
                <? } ?>
            </select>
        </div>
    <?php endif ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>
<? } else if ($tt_con == 110 || $tt_con == 111 || $tt_con == 112 || $tt_con == 113) { ?> <!-- THÚ CƯNG -->
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Giống thú cưng</p>
        <select name="giong_thu_cung" class="form-control share_select2 w_100">
            <option value="">Giống thú cưng</option>
            <?
                while ($rs_thucung_ga = (mysql_fetch_assoc($thucung_ga->result))) {
            ?>
                <option <?if($giong_thu_cung==$rs_thucung_ga['id'])echo 'selected' ?> value="<?= $rs_thucung_ga['id']?>"><?=$rs_thucung_ga['giong_thucung']?></option>
                <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Độ tuổi</p>
        <select name="do_tuoi" class="form-control share_select2 w_100">
            <option value="">Độ tuổi</option>
            <?if($tt_con == 110){
                while ($rs_tuoi_ga = (mysql_fetch_assoc($tuoi_ga->result))) {
            ?>
                <option <?if($do_tuoi==$rs_tuoi_ga['id'])echo 'selected' ?> value="<?= $rs_tuoi_ga['id']?>"><?=$rs_tuoi_ga['contents_name']?></option>
                <?}?>
            <?}else if($tt_con == 111){
                while ($rs_tuoi_cho = (mysql_fetch_assoc($tuoi_cho->result))) {
            ?>
                <option <?if($do_tuoi==$rs_tuoi_cho['id'])echo 'selected' ?> value="<?= $rs_tuoi_cho['id']?>"><?=$rs_tuoi_cho['contents_name']?></option>
                <?}?>
            <?}else if($tt_con == 112){
                while ($rs_tuoi_meo = (mysql_fetch_assoc($tuoi_meo->result))) {
            ?>
                <option <?if($do_tuoi==$rs_tuoi_meo['id'])echo 'selected' ?> value="<?= $rs_tuoi_meo['id']?>"><?=$rs_tuoi_meo['contents_name']?></option>
                <?}?>
            <?}else if($tt_con == 113){
                while ($rs_tuoi_chim = (mysql_fetch_assoc($tuoi_chim->result))) {?>
                <option <?if($do_tuoi==$rs_tuoi_chim['id'])echo 'selected' ?> value="<?= $rs_tuoi_chim['id']?>"><?=$rs_tuoi_chim['contents_name']?></option>
                <?}?>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Kích cỡ thú cưng</p>
        <select name="kichco_manhinh" class="form-control share_select2 w_100">
            <option value="">Kích cỡ thú cưng</option>
            <?if($tt_con == 110){
                while ($rs_tuoi_ga = (mysql_fetch_assoc($kc_ga->result))) {
            ?>
                <option <?if($kichco_manhinh==$rs_tuoi_ga['id'])echo 'selected' ?> value="<?= $rs_tuoi_ga['id']?>"><?=$rs_tuoi_ga['contents_name']?></option>
                <?}?>
            <?}else if($tt_con == 111){
                while ($rs_tuoi_cho = (mysql_fetch_assoc($kc_cho->result))) {
            ?>
                <option <?if($kichco_manhinh==$rs_tuoi_cho['id'])echo 'selected' ?> value="<?= $rs_tuoi_cho['id']?>"><?=$rs_tuoi_cho['contents_name']?></option>
                <?}?>
            <?}else if($tt_con == 112){
                while ($rs_tuoi_meo = (mysql_fetch_assoc($kc_meo->result))) {
            ?>
                <option <?if($kichco_manhinh==$rs_tuoi_meo['id'])echo 'selected' ?> value="<?= $rs_tuoi_meo['id']?>"><?=$rs_tuoi_meo['contents_name']?></option>
                <?}?>
            <?}else if($tt_con == 113){
                while ($rs_tuoi_chim = (mysql_fetch_assoc($kc_chim->result))) {
            ?>
                <option <?if($kichco_manhinh==$rs_tuoi_chim['id'])echo 'selected' ?> value="<?= $rs_tuoi_chim['id']?>"><?=$rs_tuoi_chim['contents_name']?></option>
                <?}?>
            <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Giới tính</p>
        <select name="gioi_tinh" class="form-control share_select2 w_100">
            <option value="">Giới tính</option>
            <?if($tt_con == 110){
                while ($rs_gioitinhga = (mysql_fetch_assoc($gioitinhga->result))) {
            ?>
                <option <?if($gioi_tinh==$rs_gioitinhga['id'])echo 'selected' ?> value="<?= $rs_gioitinhga['id']?>"><?=$rs_gioitinhga['contents_name']?></option>
                <?}?>
            <?}else if($tt_con == 111){
                while ($rs_gioitinhcho = (mysql_fetch_assoc($gioitinhcho->result))) {
            ?>
                <option <?if($gioi_tinh==$rs_gioitinhcho['id'])echo 'selected' ?> value="<?= $rs_gioitinhcho['id']?>"><?=$rs_gioitinhcho['contents_name']?></option>
                <?}?>
            <?}else if($tt_con == 112){
                while ($rs_gioitinhmeo = (mysql_fetch_assoc($gioitinhmeo->result))) {
            ?>
                <option <?if($gioi_tinh==$rs_gioitinhmeo['id'])echo 'selected' ?> value="<?= $rs_gioitinhmeo['id']?>"><?=$rs_gioitinhmeo['contents_name']?></option>
                <?}?>
            <?}else if($tt_con == 113){
                while ($rs_gioitinhchim = (mysql_fetch_assoc($gioitinhchim->result))) {
            ?>
                <option <?if($gioi_tinh==$rs_gioitinhchim['id'])echo 'selected' ?> value="<?= $rs_gioitinhchim['id']?>"><?=$rs_gioitinhchim['contents_name']?></option>
                <?}?>
            <?}?>
        </select>
    </div>
<? } else if ($tt_con == 114) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Nhóm sản phẩm</p>
        <select name="nhom_sanpham" class="form-control share_select2 w_100">
            <option value="">Nhóm sản phẩm</option>
            <?$nhomsp = new db_query("SELECT `id`,`name` FROM `nhom_sanpham` WHERE `id_danhmuc` = $tt_con");
                while ($rs_nhomsp = (mysql_fetch_assoc($nhomsp->result))) {?>
                    <option <?if($nhom_sanpham==$rs_nhomsp['id'])echo 'selected' ?> value="<?= $rs_nhomsp['id']?>"><?= $rs_nhomsp['name']?></option>
                <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Giống thú cưng</p>
        <select name="giong_thu_cung" class="form-control share_select2 w_100">
            <option value="">Giống thú cưng</option>
            <? $all_thucung = new db_query("SELECT `id`,`giong_thucung` FROM `giong_thu_cung` WHERE `id_danhmuc` != 114");?>
            <?while($rs_all_thucung = (mysql_fetch_assoc($all_thucung->result))){?>
                <option <?if($giong_thu_cung==$rs_all_thucung['id'])echo 'selected' ?> value="<?= $rs_all_thucung['id']?>"><?= $rs_all_thucung['giong_thucung']?></option>
            <?}?>
        </select>
    </div>
<? } else if ($tt_con == 115) { ?>
    <div class="thuoc_tinh w_100 mb_20 thechachung_df">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Độ tuổi</p>
        <input autocomplete="off" type="text" name="do_tuoi_thucungkhac" class="input_chung_df" placeholder="Nhập độ tuổi" value="<?=($do_tuoi_thucungkhac)?$do_tuoi_thucungkhac:''?>" class="s_dt font-14-16 w_100 gia-ban-sp_df" >
    </div>
    <div class="thuoc_tinh w_100 mb_20 thechachung_df">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Kích cỡ thú cưng</p>
        <input type="text" class="input_chung_df" value="<?=($kichco)?$kichco:''?>"  placeholder="Nhập kích cỡ" name="kichco" class="s_dt font-14-16 w_100 gia-ban-sp_df">
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Giới tính</p>
        <select name="gioi_tinh" class="form-control share_select2 w_100">
            <option value="">Giới tính</option>
            <? $gt_khac = new db_query("SELECT `id`, `contents_name` FROM `thongtin_thucung` WHERE `id_danhmuc` = 115");
                while ($rs_gt_khac = (mysql_fetch_assoc($gt_khac->result))) {?>
                    <option <?if($gioi_tinh==$rs_gt_khac['id'])echo 'selected' ?>  value="<?= $rs_gt_khac['id']?>"><?= $rs_gt_khac['contents_name']?></option>
                <?}?>
        </select>
    </div>
<? } else if ($tt_con == 78 || $tt_con == 79 || $tt_con == 80 || $tt_con == 82) { ?>  <!-- NỘI THẤT NGOẠI THẤT -->
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Nhóm sản phẩm</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="nhom_sanpham" class="form-control share_select2 w_100" >
            <option value="">Nhóm sản phẩm</option>
            <? 
            $phongkhach = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` = $tt_con");
            while ($rs_phongkhach = (mysql_fetch_assoc($phongkhach->result))) {
            ?>
                <option <?if($nhom_sanpham==$rs_phongkhach['id'])echo 'selected' ?> value="<?= $rs_phongkhach['id'] ?>"><?= $rs_phongkhach['name'] ?></option>
            <? } ?>
        </select>
    </div>

    <div class="dong_doi mb_20">
        <?php if (isset($nhom_sanpham)&&$nhom_sanpham>0): ?>
            <?php if ($tt_con==78): ?>
                <?php if ($nhom_sanpham==2||$nhom_sanpham==3||$nhom_sanpham==5): ?>
                    <?
                    $query= new db_query("SELECT * FROM loai_chung where id_cha=".$nhom_sanpham." and id_danhmuc= ".$tt_con." ");
                    $loai = $query->result_array();
                    ?>
                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
                        <?
                        $query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$nhom_sanpham'");
                        $result = $query->result_array();
                        ?>
                            <select name="loai_sanpham" class="form-control share_select2 w_100">
                                <option value="">Loại sản phẩm</option>
                                <?php foreach ($loai as $key => $value): ?>
                                    <option <?if($loai_sanpham==$value['id'])echo 'selected' ?> value="<?=$value['id']?>"><?=$value['ten_loai']?></option>    
                                <?php endforeach ?>
                            </select>
                    </div>
                <?php endif ?>

                <?php if ($nhom_sanpham!=5): ?>
                    <?
                    $query = new db_query("SELECT * FROM nhom_sanpham_chatlieu WHERE id_cha=".$nhom_sanpham."  and id_danhmuc=".$tt_con."");
                    $chat = $query->result_array();
                    ?>
                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chất liệu</p>
                        <?
                        $query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$nhom_sanpham'");
                        $result = $query->result_array();
                        ?>
                            <select name="chat_lieu" class="form-control share_select2 w_100">
                                <option value="">Chất liệu</option>
                                <?php foreach ($chat as $key => $value): ?>
                                    <option <?if($chat_lieu==$value['id'])echo 'selected' ?> value="<?=$value['id']?>"><?=$value['name']?></option>    
                                <?php endforeach ?>
                            </select>
                    </div>
                <?php endif ?>
            <?php endif ?>

            <?php if ($tt_con==79): ?>
                <?php if ($nhom_sanpham==8||$nhom_sanpham==9||$nhom_sanpham==12||$nhom_sanpham==13||$nhom_sanpham==14||$nhom_sanpham==15): ?>
                    <?
                    $query= new db_query("SELECT * FROM loai_chung where id_cha=".$nhom_sanpham." and id_danhmuc= ".$tt_con." ");
                    $loai = $query->result_array();
                    ?>
                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
                        <?
                        $query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$nhom_sanpham'");
                        $result = $query->result_array();
                        ?>
                            <select name="loai_sanpham" class="form-control share_select2 w_100">
                                <option value="">Loại sản phẩm</option>
                                <?php foreach ($loai as $key => $value): ?>
                                    <option <?if($loai_sanpham==$value['id'])echo 'selected' ?> value="<?=$value['id']?>"><?=$value['ten_loai']?></option>    
                                <?php endforeach ?>
                            </select>
                    </div>
                <?php endif ?>

                <?php if ($nhom_sanpham==8||$nhom_sanpham==9||$nhom_sanpham==12||$nhom_sanpham==13||$nhom_sanpham==11): ?>
                    <?
                    $query = new db_query("SELECT * FROM nhom_sanpham_chatlieu WHERE id_cha=".$nhom_sanpham."  and id_danhmuc=".$tt_con."");
                    $chat = $query->result_array();
                    ?>
                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chất liệu</p>
                        <?
                        $query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$nhom_sanpham'");
                        $result = $query->result_array();
                        ?>
                            <select name="chat_lieu" class="form-control share_select2 w_100">
                                <option value="">Chất liệu</option>
                                <?php foreach ($chat as $key => $value): ?>
                                    <option <?if($chat_lieu==$value['id'])echo 'selected' ?> value="<?=$value['id']?>"><?=$value['name']?></option>    
                                <?php endforeach ?>
                            </select>
                    </div>
                <?php endif ?>

                <?php if ($nhom_sanpham==14): ?>
                    <?
                    $query = new db_query("SELECT * FROM nhom_sanpham_hinhdang WHERE id_cha=".$nhom_sanpham."  and id_danhmuc=".$tt_con."");
                    $hinhdang = $query->result_array();
                    ?>
                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hình dáng</p>
                        <?
                        $query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$nhom_sanpham'");
                        $result = $query->result_array();
                        ?>
                            <select name="hinhdang" class="form-control share_select2 w_100">
                                <option value="">Hình dáng</option>
                                <?php foreach ($hinhdang as $key => $value): ?>
                                    <option <?if($hinhdang==$value['id'])echo 'selected' ?> value="<?=$value['id']?>"><?=$value['name']?></option>    
                                <?php endforeach ?>
                            </select>
                    </div>
                <?php endif ?>
            <?php endif ?>

            <?php if ($tt_con==80): ?>
                <?php if ($nhom_sanpham==18||$nhom_sanpham==19): ?>
                    <?
                    $query= new db_query("SELECT * FROM loai_chung where id_cha=".$nhom_sanpham." and id_danhmuc= ".$tt_con." ");
                    $loai = $query->result_array();
                    ?>
                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
                        <?
                        $query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$nhom_sanpham'");
                        $result = $query->result_array();
                        ?>
                            <select name="loai_sanpham" class="form-control share_select2 w_100">
                                <option value="">Loại sản phẩm</option>
                                <?php foreach ($loai as $key => $value): ?>
                                    <option <?if($loai_sanpham==$value['id'])echo 'selected' ?> value="<?=$value['id']?>"><?=$value['ten_loai']?></option>    
                                <?php endforeach ?>
                            </select>
                    </div>
                <?php endif ?>

                    <?
                    $query = new db_query("SELECT * FROM nhom_sanpham_chatlieu WHERE id_cha=".$nhom_sanpham."  and id_danhmuc=".$tt_con."");
                    $chat = $query->result_array();
                    ?>
                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chất liệu</p>
                        <?
                        $query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$nhom_sanpham'");
                        $result = $query->result_array();
                        ?>
                            <select name="chat_lieu" class="form-control share_select2 w_100">
                                <option value="">Chất liệu</option>
                                <?php foreach ($chat as $key => $value): ?>
                                    <option <?if($chat_lieu==$value['id'])echo 'selected' ?> value="<?=$value['id']?>"><?=$value['name']?></option>    
                                <?php endforeach ?>
                            </select>
                    </div>
            <?php endif ?>

            <?php if ($tt_con==82): ?>
                <?php if ($nhom_sanpham!= 30): ?>
                    <?
                    $query= new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` where `id_cha`= $nhom_sanpham AND `id_danhmuc`=  $tt_con  ");
                    $loai = $query->result_array();

                    $query2 = new db_query("SELECT `id`, `name` FROM `nhom_sanpham_chatlieu` WHERE `id_cha` = $nhom_sanpham  AND `id_danhmuc` = $tt_con ");
                    $chat = $query2->result_array();
                    ?>
                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
                            <select name="loai_sanpham" class="form-control share_select2 w_100">
                                <option value="">Loại sản phẩm</option>
                                <?php foreach ($loai as $key => $value): ?>
                                    <option <?if($loai_sanpham==$value['id'])echo 'selected' ?> value="<?=$value['id']?>"><?=$value['ten_loai']?></option>
                                <?php endforeach ?>
                            </select>
                    </div>

                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chất liệu</p>
                            <select name="chat_lieu" class="form-control share_select2 w_100">
                                <option value="">Chất liệu</option>
                                <?php foreach ($chat as $key => $value): ?>
                                    <option <?if($chat_lieu==$value['id'])echo 'selected' ?> value="<?=$value['id']?>"><?=$value['name']?></option>
                                <?php endforeach ?>
                            </select>
                    </div>
                <?php endif ?>
            <?php endif ?>

        <?php endif ?>
    </div> 

    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>
<? } else if ($tt_con == 81 || $tt_con == 118) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="loai_sanpham" class="form-control share_select2 w_100">
            <option value="" >Loại sản phẩm</option>
                <? $phongtam = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $tt_con "); ?>
                <? while ($rs_phongtam = (mysql_fetch_assoc($phongtam->result))) { ?>
                    <option <?if($loai_sanpham==$rs_phongtam['id'])echo 'selected' ?> value="<?= $rs_phongtam['id'] ?>"><?= $rs_phongtam['ten_loai'] ?></option>
                <? } ?>
        </select>
    </div>
    <div class="dong_doi mb_20">
        <?php if (isset($loai_sanpham)&&$loai_sanpham>0): ?>
            <?php if ($tt_con==81): ?>
                <?php if ($loai_sanpham!= 2064): ?>
                    <?
                    $query = new db_query("SELECT * FROM hang WHERE id_parent=".$loai_sanpham."  and id_danhmuc=".$tt_con."");
                    $thuonghieu = $query->result_array();
                    ?>
                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Thương hiệu</p>
                        <?
                        $query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$loai_sanpham'");
                        $result = $query->result_array();
                        ?>
                            <select name="hang" class="form-control share_select2 w_100">
                                <option value="">Thương hiệu</option>
                                <?php foreach ($thuonghieu as $key => $value): ?>
                                    <option <?if($hang==$value['id'])echo 'selected' ?> value="<?=$value['id']?>"><?=$value['ten_hang']?></option>    
                                <?php endforeach ?>
                            </select>
                    </div>
                <?php endif ?>
                
                <?php if ($loai_sanpham == 2060): ?>
                    <?
                    $query = new db_query("SELECT * FROM nhom_sanpham_hinhdang WHERE id_cha=".$loai_sanpham."  and id_danhmuc=".$tt_con."");
                    $hinhdang_query = $query->result_array();
                    ?>
                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hình dáng</p>
                        <?
                        $query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$loai_sanpham'");
                        $result = $query->result_array();
                        ?>
                            <select name="hinhdang" class="form-control share_select2 w_100">
                                <option value="">Hình dáng</option>
                                <?php foreach ($hinhdang_query as $key => $value): ?>
                                    <option <?if($hinhdang==$value['id'])echo 'selected' ?> value="<?=$value['id']?>"><?=$value['name']?></option>    
                                <?php endforeach ?>
                            </select>
                    </div>
                <?php endif ?>
            <?php endif ?>
        <?php endif ?>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>
<? } else if ($tt_con == 85||$tt_con == 84 || $tt_con == 87 || $tt_con == 88) { ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
         <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="">Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>    
<? }else if ($tt_con == 61){?>   <!-- SỨC KHỎE - SẮC ĐẸP --> <!-- Mỹ Phẩm -->
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại hình</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="loai_hinh_sp" class="form-control share_select2 w_100">
            <option value="" >Chọn loại hình</option>
            <?$loaihinh_mp = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $tt_con");
                while ($rs_loaihinh_mp = (mysql_fetch_assoc($loaihinh_mp->result))) {?>
                    <option <?if($rs_loaihinh_mp['id']==$loai_hinh_sp) echo'selected' ?> value="<?=$rs_loaihinh_mp['id']?>"><?=$rs_loaihinh_mp['ten_loai']?></option>
                <?}?>
        </select>
    </div>
    <div class="dong_doi mb_20"> 
        <?php if (isset($loai_hinh_sp)&&$loai_hinh_sp>0): ?>
            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại mỹ phẩm</p>
                <?
                $query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$loai_hinh_sp'");
                $result = $query->result_array();
                ?>
                    <select name="loai_sanpham" class="form-control share_select2 w_100">
                        <option value="">Loại mỹ phẩm</option>
                        <?php foreach ($result as $key => $rows): ?>
                            <option <?if($rows['id']==$loai_sanpham) echo'selected' ?> value="<?=$rows['id']?>"><?=$rows['ten_loai']?></option>
                        <?php endforeach ?>
                    </select>
            </div>

            <div class="thuoc_tinh w_100 mb_20 ">
                <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
                <?
                $query_hang = new db_query("SELECT `id`, `ten_hang`, `id_parent` FROM `hang` WHERE id_parent = '$loai_hinh_sp'");
                $sql_hang = $query_hang->result_array();
                ?>
                    <select name="hang" class="form-control share_select2 w_100">
                        <option value="">Hãng</option>
                        <?php foreach ($sql_hang as $key => $rows): ?>
                            <option <?if($rows['id']==$hang) echo'selected' ?> value="<?=$rows['id']?>"><?=$rows['ten_hang']?></option>
                        <?php endforeach ?>
                    </select>
            </div>
        <?php endif ?>
    </div> 
    <div class="thuoc_tinh w_100 mb_20 thechachung_df">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hạn sử dụng</p>
        <input type="date" class="input_chung_df" name="han_su_dung" value="<?=($han_su_dung)?$han_su_dung:''?>">
    </div>
<? } else if ($tt_con == 62){?> <!-- Spa -->
    <?= "";?>
<? } else if ($tt_con == 63){?> <!-- Vật tư y tế -->
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại vật tư</p>
        <select name="loai_sanpham" class="form-control share_select2 w_100">
            <option value="" >Loại vật tư</option>
            <?$loaihinh_vtyt = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $tt_con");
                while ($rs_loaihinh_vtyt = (mysql_fetch_assoc($loaihinh_vtyt->result))) {?>
                    <option <?if($rs_loaihinh_vtyt['id']==$loai_sanpham) echo'selected' ?> value="<?=$rs_loaihinh_vtyt['id']?>"><?=$rs_loaihinh_vtyt['ten_loai']?></option>
                <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20 thechachung_df">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
        <input type="text" class="input_chung_df" name="hang_vattu" placeholder="Nhập Hãng" value="<?=($hang_vattu)?$hang_vattu:''?>">
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="" >Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới 100%</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>
<? } else if ($tt_con == 108){?> <!-- Dụng cụ làm đẹp -->
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight ">Loại phụ kiện</p>
        <select name="loai_sanpham" class="form-control share_select2 w_100">
            <option value="" >Loại phụ kiện</option>
            <?$loaiphukien_lamdep = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id_cha` = 209");
                while ($rs_loaiphukien_lamdep = (mysql_fetch_assoc($loaiphukien_lamdep->result))) {?>
                    <option <?if($rs_loaiphukien_lamdep['id']==$loai_sanpham) echo'selected' ?> value="<?=$rs_loaiphukien_lamdep['id']?>"><?=$rs_loaiphukien_lamdep['ten_loai']?></option>
                <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
        <select name="hang" class="form-control share_select2 w_100">
            <option value="0" >Hãng</option>
            <?$hang_pk = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id_parent` = 209");
                while ($rs_hang_pk = (mysql_fetch_assoc($hang_pk->result))) {?>
                    <option <?if($rs_hang_pk['id']==$hang) echo'selected' ?> value="<?=$rs_hang_pk['id']?>"><?= $rs_hang_pk['ten_hang']?></option>
                <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="" >Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới 100%</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>
<? } else if ($tt_con == 109){?> <!-- Thực phẩm chức năng -->
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại thực phẩm chức năng</p>
        <select name="loai_sanpham" class="form-control share_select2 w_100">
            <option value="" >Loại thực phẩm chức năng</option>
            <?$loai_tpcn = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id_cha` = 109");
                while ($rs_loai_tpcn = (mysql_fetch_assoc($loai_tpcn->result))) {?>
                    <option <?if($rs_loai_tpcn['id']==$loai_sanpham) echo'selected' ?> value="<?=$rs_loai_tpcn['id']?>"><?=$rs_loai_tpcn['ten_loai']?></option>
                <?}?>
        </select>
    </div>
    <div class="thuoc_tinh w_100 mb_20 thechachung_df">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hạn sử dụng</p>
        <input type="date" class="input_chung_df" name="han_su_dung" value="<?=($han_su_dung)?$han_su_dung:''?>">
    </div>
    
<? } else if ($tt_con == 56||$tt_con == 57||$tt_con == 58||$tt_con == 59){?> <!-- Đồ gia dụng --> <!-- Thiết bị điện lạnh -->
    <?php if ($tt_con == 56): ?>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại thiết bị</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="loai_thiet_bi" class="form-control share_select2 w_100">
            <option value="">Loại thiết bị</option>
            <?$dgd_thietbi = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $tt_con");
                while ($rs_dgd_thietbi = (mysql_fetch_assoc($dgd_thietbi->result))) {?>
                    <option <?if($rs_dgd_thietbi['id']==$loai_thiet_bi) echo'selected' ?> value="<?=$rs_dgd_thietbi['id']?>"><?=$rs_dgd_thietbi['ten_loai']?></option>
                <?}?>
        </select>
    </div>
    <?php endif ?>
    <?php if ($tt_con == 57||$tt_con == 58||$tt_con == 59): ?>
        
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại thiết bị</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="loai_thiet_bi" class="form-control share_select2 w_100">
            <option value="">Loại thiết bị</option>
            <?
             $list_nhom = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` = $tt_con ");
            ?>
            <? while ($row_tbi = mysql_fetch_assoc($list_nhom->result)) { ?>
                <option <?if($row_tbi['id']==$loai_thiet_bi) echo'selected' ?> value="<?= $row_tbi['id'] ?>"><?= $row_tbi['name'] ?></option>
            <? } ?>
        </select>
    </div>
    <?php endif ?>
    <div class="dong_doi mb_20">
        <?php if ($tt_con == 56): ?>
        <?php if (isset($loai_thiet_bi)&&$loai_thiet_bi>0): ?>
            <?php if ($loai_thiet_bi == 2103 || $loai_thiet_bi == 2105): ?> 
                <div class="thuoc_tinh w_100 mb_20 ">
                    <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dung tích</p>
                    <?
                    $query = new db_query("SELECT * FROM dung_luong where id_cha=" . $loai_thiet_bi . " and id_danhmuc= " . $tt_con . " ");
                    $dungtich = $query->result_array();
                    ?>
                        <select name="dung_tich" class="form-control share_select2 w_100">
                            <option value="">Dung tích</option>
                            <?php foreach ($dungtich as $key => $value) : ?>
                                <option <?if($value['id_dl']==$dung_tich) echo'selected' ?> value="<?= $value['id_dl'] ?>"><?= $value['ten_dl'] ?></option>
                            <?php endforeach ?>
                        </select>
                </div>
            <?php endif ?>

            <?php if ($loai_thiet_bi != 2107): ?> 
                <div class="thuoc_tinh w_100 mb_20 ">
                    <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Hãng</p>
                    <?
                    $query = new db_query("SELECT * FROM hang WHERE id_parent=" . $loai_thiet_bi . "  and id_danhmuc=" . $tt_con . "");
                    $hang = $query->result_array();
                    ?>
                        <select name="hang" class="form-control share_select2 w_100">
                            <option value="">Hãng</option>
                            <?php foreach ($hang as $key => $value) : ?>
                                <option <?if($value['id']==$hang) echo'selected' ?> value="<?= $value['id'] ?>"><?= $value['ten_hang'] ?></option>
                            <?php endforeach ?>
                        </select>
                </div>
            <?php endif ?>
            <?php if ($loai_thiet_bi == 2104): ?> 
                <div class="thuoc_tinh w_100 mb_20 ">
                    <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Công suất</p>
                    <?
                    $query = new db_query("SELECT * FROM dung_luong where id_cha=" . $loai_thiet_bi . " and id_danhmuc= " . $tt_con . " ");
                    $congsuat = $query->result_array();
                    ?>
                        <select name="cong_suat" class="form-control share_select2 w_100">
                            <option value="">Công suất</option>
                            <?php foreach ($congsuat as $key => $value) : ?>
                                <option <?if($value['id_dl']==$cong_suat) echo'selected' ?> value="<?= $value['id_dl'] ?>"><?= $value['ten_dl'] ?></option>
                            <?php endforeach ?>
                        </select>
                </div>
            <?php endif ?>

            <?php if ($loai_thiet_bi == 2106): ?> 
                <div class="thuoc_tinh w_100 mb_20 ">
                    <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Khối lượng giặt</p>
                    <?
                    $query = new db_query("SELECT * FROM dung_luong where id_cha=" . $loai_thiet_bi . " and id_danhmuc= " . $tt_con . " ");
                    $khoiluong = $query->result_array();
                    ?>
                        <select name="khoi_luong" class="form-control share_select2 w_100">
                            <option value="">Khối lượng giặt</option>
                            <?php foreach ($khoiluong as $key => $value) : ?>
                                <option <?if($value['id_dl']==$khoi_luong) echo'selected' ?> value="<?= $value['id_dl'] ?>"><?= $value['ten_dl'] ?></option>
                            <?php endforeach ?>
                        </select>
                </div>
            <?php endif ?>
        <?php endif ?>
        <?php endif ?>

        <?php if ($tt_con == 57): ?>
            <?php if (isset($loai_thiet_bi) && $loai_thiet_bi>0): ?>   
                <?php if ($loai_thiet_bi !=37): ?>    
                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
                        <?
                        $query= new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` where `id_cha` = $loai_thiet_bi AND `id_danhmuc` = 57 ");
                        $loaisp = $query->result_array();
                        ?>
                            <select name="loai_sanpham" class="form-control share_select2 w_100">
                                <option value="">Chọn loại sản phẩm</option>
                                <?php foreach ($loaisp as $key => $value): ?>
                                    <option <?if($value['id']==$loai_sanpham) echo'selected' ?> value="<?=$value['id']?>"><?=$value['ten_loai']?></option>
                                <?php endforeach ?>
                            </select>
                    </div>
                <?php endif ?> 
            <?php endif ?>
        <?php endif ?>
    </div>
    <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Tình trạng</p>
        <select name="tinh_trang" class="form-control share_select2 w_100">
            <option value="" >Tình trạng</option>
            <option <?if($tinh_trang==1) echo 'selected' ?> value="1">Mới</option>
            <option <?if($tinh_trang==2) echo 'selected' ?> value="2">Đã sử dụng</option>
        </select>
    </div>
<? } ?>
