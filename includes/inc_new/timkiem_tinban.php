<?
include("config.php");

?>
<? if ($tt_con == 5) { ?>
    <div class="ctkiem_tdang_ban <?= ($bo_vixuly != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $bo_vixuly ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bo_vixuly != 0) ? 'active' : '' ?>">
            <? if ($bo_vixuly != 0) {
                $bovi_xuly = new db_query("SELECT `bovi_id`, `bovi_ten` FROM `bovi_xuly` WHERE `bovi_id` = '".$bo_vixuly."' ");
                $ten_bovi = mysql_fetch_assoc($bovi_xuly->result)['bovi_ten'];
                echo $ten_bovi;
            } else { ?>
                Bộ vi xử lý
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($ram != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $ram ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($ram != 0) ? 'active' : '' ?>">
            <? if ($ram != 0) {

                $list_ram = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = '" . $ram . "' ");
                $ten_ram = mysql_fetch_assoc($list_ram->result)['ten_dl'];
                echo $ten_ram;
            } else { ?>
                RAM
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($o_cung != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $o_cung ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($o_cung != 0) ? 'active' : '' ?>">
            <? if ($o_cung != 0) {
                $list_ocung = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = '" . $o_cung . "' ");
                $ten_ocung = mysql_fetch_assoc($list_ocung->result)['ten_dl'];
                echo $ten_ocung;
            } else { ?>
                Ổ cứng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($loai_ocung != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $loai_ocung ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_ocung != 0) ? 'active' : '' ?>">
            <? if ($loai_ocung != 0) {
                $ten_loai_ocung = ($loai_ocung == 1) ? 'HDD' : 'SSD';
                echo $ten_loai_ocung;
            } else { ?>
                Loại ổ cứng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($card_manhinh != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $card_manhinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($card_manhinh != 0) ? 'active' : '' ?>">
            <? if ($card_manhinh != 0) {
                $card_mhinh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $card_manhinh ");
                $ten_mhinh = mysql_fetch_assoc($card_mhinh->result)['ten_manhinh'];
                echo $ten_mhinh;
            } else { ?>
                Card màn hình
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($kichco_manhinh != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $kichco_manhinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($kichco_manhinh != 0) ? 'active' : '' ?>">
            <? if ($kichco_manhinh != 0) {
                $kichco_mhinh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $kichco_manhinh ");
                $kco_mhinh = mysql_fetch_assoc($kichco_mhinh->result)['ten_manhinh'];
                echo $kco_mhinh;
            } else { ?>
                Kích cỡ màn hình
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($bao_hanh != 0) ? 'active' : '' ?>" data="7" data1="<?= $tt_con ?>" data2="<?= $bao_hanh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bao_hanh != 0) ? 'active' : '' ?>">
            <?
            if ($bao_hanh != 0) {
                $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = '" . $bao_hanh . "' ");
                $tgian_baohanh = mysql_fetch_assoc($bao_hanhquery->result)['tgian_baohanh'];
                echo $tgian_baohanh;
            } else { ?>
                Bảo hành
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="8" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 98) { ?>
    <div class="ctkiem_tdang_ban <?= ($hang != "") ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $hang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($hang != "") ? 'active' : '' ?>">
            <? if ($hang != '') {
                $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_danhmuc` = $tt_con AND `id` = '" . $hang . "' ");
                $ten_hang = mysql_fetch_assoc($list_hang->result)['ten_hang'];
                echo $ten_hang; ?>
            <? } else { ?>
                Hãng
            <? } ?>
        </p>
    </div>
    <? if ($hang != '' && $hang != 0) { ?>
        <div class="ctkiem_tdang_ban <?= ($dong != '' && $dong != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data1="<?= $tt_con ?>" data2="<?= $dong ?>" data3="<?= $hang ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($dong != '' && $dong != 0) ? 'active' : '' ?>">
                <? if ($dong != '' && $dong != 0) {
                    if ($hang == 1378) {
                        echo $dong;
                    } else {
                        $list_dong = new db_query("SELECT `ten_loai` FROM `loai_chung` WHERE `id` = '" . $dong . "' ");
                        $ten_dong = mysql_fetch_assoc($list_dong->result)['ten_loai'];
                        echo $ten_dong;
                    } ?>
                <? } else { ?>
                    Dòng máy
                <? } ?>
            </p>
        </div>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($bo_vixuly != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $bo_vixuly ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bo_vixuly != 0) ? 'active' : '' ?>">
            <? if ($bo_vixuly != 0) {
                $bivi_xuly = new db_query("SELECT `bovi_id`, `bovi_ten` FROM `bovi_xuly` WHERE `bovi_id` = $bo_vixuly ");
                $ten_bovi = mysql_fetch_assoc($bo_vixuly->result)['bovi_ten'];
                echo $ten_bovi;
            } else { ?>
                Bộ vi xử lý
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($ram != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $ram ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($ram != 0) ? 'active' : '' ?>">
            <? if ($ram != 0) {
                $list_ram = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = '" . $ram . "' ");
                $ten_ram = mysql_fetch_assoc($list_ram->result)['ten_dl'];
                echo $ten_ram;
            } else { ?>
                RAM
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($o_cung != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $o_cung ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($o_cung != 0) ? 'active' : '' ?>">
            <? if ($o_cung != 0) {
                $list_ocung = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = '" . $o_cung . "' ");
                $ten_ocung = mysql_fetch_assoc($list_ocung->result)['ten_dl'];
                echo $ten_ocung;
            } else { ?>
                Ổ cứng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($loai_ocung != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $loai_ocung ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_ocung != 0) ? 'active' : '' ?>">
            <? if ($loai_ocung != 0) {
                $ten_loai_ocung = ($loai_ocung == 1) ? 'HDD' : 'SSD';
                echo $ten_loai_ocung;
            } else { ?>
                Loại ổ cứng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($card_manhinh != 0) ? 'active' : '' ?>" data="7" data1="<?= $tt_con ?>" data2="<?= $card_manhinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($card_manhinh != 0) ? 'active' : '' ?>">
            <? if ($card_manhinh != 0) {
                $card_mhinh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $card_manhinh ");
                $ten_mhinh = mysql_fetch_assoc($card_mhinh->result)['ten_manhinh'];
                echo $ten_mhinh;
            } else { ?>
                Card màn hình
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($kichco_manhinh != 0) ? 'active' : '' ?>" data="8" data1="<?= $tt_con ?>" data2="<?= $kichco_manhinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($kichco_manhinh != 0) ? 'active' : '' ?>">
            <? if ($kichco_manhinh != 0) {
                $kichco_mhinh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $kichco_manhinh ");
                $kco_mhinh = mysql_fetch_assoc($kichco_mhinh->result)['ten_manhinh'];
                echo $kco_mhinh;
            } else { ?>
                Kích cỡ màn hình
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($bao_hanh != 0) ? 'active' : '' ?>" data="9" data1="<?= $tt_con ?>" data2="<?= $bao_hanh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bao_hanh != 0) ? 'active' : '' ?>">
            <?
            if ($bao_hanh != 0) {
                $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = '" . $bao_hanh . " ");
                $tgian_baohanh = mysql_fetch_assoc($bao_hanhquery->result)['tgian_baohanh'];
                echo $tgian_baohanh;
            } else { ?>
                Bảo hành
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="10" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 6) { ?>
    <div class="ctkiem_tdang_ban <?= ($thiet_bi != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($thiet_bi != 0) ? 'active' : '' ?>">
            <? if ($thiet_bi != 0) {
                $list_tbi = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id` = '" . $thiet_bi . "' ");
                $ten_tbi = mysql_fetch_assoc($list_tbi->result)['name'];
                echo $ten_tbi;
            } else { ?>
                Thiết bị
            <? } ?>
        </p>
    </div>
    <? if ($thiet_bi != 0) { ?>
        <div class="ctkiem_tdang_ban <?= ($hang6 != '') ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $hang6 ?>" data3="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($hang6 != '') ? 'active' : '' ?>">
                <? if ($hang6 != '') {
                    if (isset($thiet_bi) && $thiet_bi == 34) {
                        echo $hang6;
                    } else if (isset($thiet_bi) && $thiet_bi != 34) {
                        $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` ='" . $hang6 . "' LIMIT 1 ");
                        $ten_hang = mysql_fetch_assoc($list_hang->result)['name'];
                        echo $ten_hang;
                    }
                } else { ?>
                    Hãng
                <? } ?>
            </p>
        </div>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($bao_hanh != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $bao_hanh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bao_hanh != 0) ? 'active' : '' ?>">
            <? if ($bao_hanh != 0) {
                $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = '" . $bao_hanh . "' LIMIT 1 ");
                $ten_baohanh = mysql_fetch_assoc($bao_hanhquery->result)['tgian_baohanh'];
                echo $ten_baohanh;
            } else { ?>
                Bảo hành
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang2[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 7) { ?>
    <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $hang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
            <? if ($hang != 0) {
                $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` = '" . $hang . "' ");
                $ten_hang = mysql_fetch_assoc($list_hang->result)['ten_hang'];
                echo $ten_hang;
            } else { ?>
                Hãng
            <? } ?></p>
    </div>
    <? if ($hang != 0) { ?>
        <div class="ctkiem_tdang_ban <?= ($dong != '') ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $dong ?>" data3="<?= $hang ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($dong != '') ? 'active' : '' ?>">
                <? if ($dong != "") { ?>
                    <? if ($hang == 1683) {
                        echo $dong;
                    } else {
                        $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $dong . "' LIMIT 1 ");
                        $ten_dong = mysql_fetch_assoc($list_dong->result)['ten_loai'];
                        echo $ten_dong;
                    }
                } else { ?>
                    Dòng máy
                <? } ?>
            </p>
        </div>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($mau_sac != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $mau_sac ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($mau_sac != 0) ? 'active' : '' ?>">
            <? if ($mau_sac != 0) {
                $list_ms = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE `id_color` = '" . $mau_sac . "' LIMIT 1 ");
                $ten_ms = mysql_fetch_assoc($list_ms->result)['mau_sac'];
                echo $ten_ms;
            } else { ?>
                Màu sắc
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($dung_luong != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $dung_luong ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($dung_luong != 0) ? 'active' : '' ?>">
            <? if ($dung_luong != 0) {
                $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = '" . $dung_luong . "' LIMIT 1 ");
                $ten_dluong = mysql_fetch_assoc($list_dl->result)['ten_dl'];
                echo $ten_dluong;
            } else { ?>
                Dung lượng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($bao_hanh != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $bao_hanh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bao_hanh != 0) ? 'active' : '' ?>">
            <? if ($bao_hanh != 0) {
                $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = '" . $bao_hanh . "' LIMIT 1 ");
                $ten_baohanh = mysql_fetch_assoc($bao_hanhquery->result)['tgian_baohanh'];
                echo $ten_baohanh;
            } else { ?>
                Bảo hành
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang2[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 35) { ?>
    <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $hang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
            <? if ($hang != 0) {
                $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` = '" . $hang . "' ");
                $ten_hang = mysql_fetch_assoc($list_hang->result)['ten_hang'];
                echo $ten_hang;
            } else { ?>
                Hãng
            <? } ?></p>
    </div>
    <? if ($hang != 0) { ?>
        <div class="ctkiem_tdang_ban <?= ($dong != '') ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $dong ?>" data3="<?= $hang ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($dong != '') ? 'active' : '' ?>">
                <? if ($dong != "") { ?>
                    <? if ($hang == 1694) {
                        echo $dong;
                    } else {
                        $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $dong . "' LIMIT 1 ");
                        $ten_dong = mysql_fetch_assoc($list_dong->result)['ten_loai'];
                        echo $ten_dong;
                    }
                } else { ?>
                    Dòng máy
                <? } ?>
            </p>
        </div>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($sudung_sim != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $sudung_sim ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($sudung_sim != 0) ? 'active' : '' ?>">
            <? if ($sudung_sim != 0) {
                echo $arr_cokhong[$sudung_sim];
            } else { ?>
                Sử dụng sim
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($dung_luong != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $dung_luong ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($dung_luong != 0) ? 'active' : '' ?>">
            <? if ($dung_luong != 0) {
                $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = '" . $dung_luong . "' LIMIT 1 ");
                $ten_dluong = mysql_fetch_assoc($list_dl->result)['ten_dl'];
                echo $ten_dluong;
            } else { ?>
                Dung lượng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($kichco_manhinh != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $kichco_manhinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($kichco_manhinh != 0) ? 'active' : '' ?>">
            <? if ($kichco_manhinh != 0) {
                $kichco_mhinh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $kichco_manhinh ");
                $kco_mhinh = mysql_fetch_assoc($kichco_mhinh->result)['ten_manhinh'];
                echo $kco_mhinh;
            } else { ?>
                Kích cỡ màn hình
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($bao_hanh != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $bao_hanh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bao_hanh != 0) ? 'active' : '' ?>">
            <? if ($bao_hanh != 0) {
                $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = '" . $bao_hanh . "' LIMIT 1 ");
                $ten_baohanh = mysql_fetch_assoc($bao_hanhquery->result)['tgian_baohanh'];
                echo $ten_baohanh;
            } else { ?>
                Bảo hành
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang2[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 36) { ?>
    <div class="ctkiem_tdang_ban <?= ($thiet_bi != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($thiet_bi != 0) ? 'active' : '' ?>">
            <? if ($thiet_bi != 0) {
                $list_tbi = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id` = '" . $thiet_bi . "' ");
                $ten_tbi = mysql_fetch_assoc($list_tbi->result)['name'];
                echo $ten_tbi;
            } else { ?>
                Thiết bị
            <? } ?>
        </p>
    </div>
    <? if ($thiet_bi == 52 || $thiet_bi == 53 || $thiet_bi == 54 || $thiet_bi == 57) { ?>
        <? if ($thiet_bi == 52) { ?>
            <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $hang ?>" data3="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
                    <? if ($hang != 0) {
                        $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` = '" . $hang . "' ");
                        $ten_hang = mysql_fetch_assoc($list_hang->result)['ten_hang'];
                        echo $ten_hang;
                    } else { ?>
                        Hãng
                    <? } ?>
                </p>
            </div>
            <div class="ctkiem_tdang_ban <?= ($kichco_manhinh != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $kichco_manhinh ?>" data3="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($kichco_manhinh != 0) ? 'active' : '' ?>">
                    <? if ($kichco_manhinh != 0) {
                        $kichco_mhinh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_manhinh` = $kichco_manhinh ");
                        $kco_mhinh = mysql_fetch_assoc($kichco_mhinh->result)['ten_manhinh'];
                        echo $kco_mhinh;
                    } else { ?>
                        Kích thước
                    <? } ?>
                </p>
            </div>
            <div class="ctkiem_tdang_ban <?= ($ketnoi_internet != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $ketnoi_internet ?>" data3="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($ketnoi_internet != 0) ? 'active' : '' ?>">
                    <? if ($ketnoi_internet != 0) {
                        echo $arr_cokhong[$ketnoi_internet];
                    } else { ?>
                        Kết nối internet
                    <? } ?>
                </p>
            </div>
            <div class="ctkiem_tdang_ban <?= ($loai != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $loai ?>" data3="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($loai != 0) ? 'active' : '' ?>">
                    <? if ($loai != 0) {
                        $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai . "' LIMIT 1 ");
                        $ten_loai = mysql_fetch_assoc($list_loai->result)['ten_loai'];
                        echo $ten_loai;
                    } else { ?>
                        Loại TV
                    <? } ?>
                </p>
            </div>
            <div class="ctkiem_tdang_ban <?= ($dung_luong != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $dung_luong ?>" data3="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($dung_luong != 0) ? 'active' : '' ?>">
                    <? if ($dung_luong != 0) {
                        $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = '" . $dung_luong . "' LIMIT 1 ");
                        $ten_dluong = mysql_fetch_assoc($list_dl->result)['ten_dl'];
                        echo $ten_dluong;
                    } else { ?>
                        Độ phân giải
                    <? } ?>
                </p>
            </div>
        <? } else if ($thiet_bi == 53) { ?>
            <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $hang ?>" data3="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
                    <? if ($hang != 0) {
                        $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` = '" . $hang . "' ");
                        $ten_hang = mysql_fetch_assoc($list_hang->result)['ten_hang'];
                        echo $ten_hang;
                    } else { ?>
                        Hãng
                    <? } ?>
                </p>
            </div>
            <div class="ctkiem_tdang_ban <?= ($loai != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $loai ?>" data3="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($loai != 0) ? 'active' : '' ?>">
                    <? if ($loai != 0) {
                        $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai . "' LIMIT 1 ");
                        $ten_loai = mysql_fetch_assoc($list_loai->result)['ten_loai'];
                        echo $ten_loai;
                    } else { ?>
                        Loại loa
                    <? } ?>
                </p>
            </div>
            <div class="ctkiem_tdang_ban <?= ($dung_luong != 0) ? 'active' : '' ?>" data="10" data1="<?= $tt_con ?>" data2="<?= $dung_luong ?>" data3="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($dung_luong != 0) ? 'active' : '' ?>">
                    <? if ($dung_luong != 0) {
                        $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = '" . $dung_luong . "' LIMIT 1 ");
                        $ten_dluong = mysql_fetch_assoc($list_dl->result)['ten_dl'];
                        echo $ten_dluong;
                    } else { ?>
                        Công suất
                    <? } ?>
                </p>
            </div>
        <? } else if ($thiet_bi == 54 || $thiet_bi == 57) { ?>
            <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $hang ?>" data3="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
                    <? if ($hang != 0) {
                        $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id` = '" . $hang . "' ");
                        $ten_hang = mysql_fetch_assoc($list_hang->result)['ten_hang'];
                        echo $ten_hang;
                    } else { ?>
                        Hãng
                    <? } ?>
                </p>
            </div>
            <div class="ctkiem_tdang_ban <?= ($dung_luong != 0) ? 'active' : '' ?>" data="11" data1="<?= $tt_con ?>" data2="<?= $dung_luong ?>" data3="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($dung_luong != 0) ? 'active' : '' ?>">
                    <? if ($dung_luong != 0) {
                        $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = '" . $dung_luong . "' LIMIT 1 ");
                        $ten_dluong = mysql_fetch_assoc($list_dl->result)['ten_dl'];
                        echo $ten_dluong;
                    } else { ?>
                        Công suất âm thanh
                    <? } ?>
                </p>
            </div>
        <? } ?>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($bao_hanh != 0) ? 'active' : '' ?>" data="7" data1="<?= $tt_con ?>" data2="<?= $bao_hanh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bao_hanh != 0) ? 'active' : '' ?>">
            <? if ($bao_hanh != 0) {
                $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = '" . $bao_hanh . "' LIMIT 1 ");
                $ten_baohanh = mysql_fetch_assoc($bao_hanhquery->result)['tgian_baohanh'];
                echo $ten_baohanh;
            } else { ?>
                Bảo hành
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="8" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang2[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 37) { ?>
    <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $hang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
            <? if ($hang != 0) {
                if ($hang == 1) {
                    echo 'Phụ kiện';
                } else {
                    echo 'Linh kiện';
                }
            } else { ?>
                Phụ kiện/Linh kiện
            <? } ?>
        </p>
    </div>
    <? if ($hang != 0) { ?>
        <div class="ctkiem_tdang_ban <?= ($phukien_linhkien != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $phukien_linhkien ?>" data3="<?= $hang ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($phukien_linhkien != 0) ? 'active' : '' ?>">
                <? if ($hang == 1) {
                    if ($phukien_linhkien != 0) {
                        $querypk = new db_query("SELECT ten_loai FROM `loai_chung` WHERE `id` = '" . $phukien_linhkien . "' LIMIT 1 ");
                        $ten_pkien = mysql_fetch_assoc($querypk->result)['ten_loai'];
                        echo $ten_pkien;
                    } else {
                        echo 'Loại phụ kiện';
                    }
                } else if ($hang == 2) {
                    if ($phukien_linhkien != 0) {
                        $querypk = new db_query("SELECT ten_loai FROM `loai_chung` WHERE `id` = '" . $phukien_linhkien . "' LIMIT 1 ");
                        $ten_pkien = mysql_fetch_assoc($querypk->result)['ten_loai'];
                        echo $ten_pkien;
                    } else {
                        echo 'Loại linh kiện';
                    }
                } ?>
            </p>
        </div>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($bao_hanh != 0) ? 'active' : '' ?>" data="7" data1="<?= $tt_con ?>" data2="<?= $bao_hanh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bao_hanh != 0) ? 'active' : '' ?>">
            <? if ($bao_hanh != 0) {
                $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = '" . $bao_hanh . "' LIMIT 1 ");
                $ten_baohanh = mysql_fetch_assoc($bao_hanhquery->result)['tgian_baohanh'];
                echo $ten_baohanh;
            } else { ?>
                Bảo hành
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="8" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang2[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 99) { ?>
    <div class="ctkiem_tdang_ban <?= ($thiet_bi != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($thiet_bi != 0) ? 'active' : '' ?>">
            <? if ($thiet_bi != 0) {
                $list_tbi = new db_query("SELECT ten_loai FROM `loai_chung` WHERE `id` = '" . $thiet_bi . "' ");
                $ten_tbi = mysql_fetch_assoc($list_tbi->result)['ten_loai'];
                echo $ten_tbi;
            } else { ?>
                Thiết bị
            <? } ?>
        </p>
    </div>
    <? if ($thiet_bi != 0) { ?>
        <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $hang ?>" data3="<?= $thiet_bi ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
                <? if ($hang != 0) {
                    $query = new db_query("SELECT `id`, `ten_hang`  FROM `hang` WHERE `id` ='" . $hang . "' LIMIT 1 ");
                    $ten_hang = mysql_fetch_assoc($query->result)['ten_hang'];
                    echo $ten_hang;
                } else { ?>
                    Hãng
                <? } ?>
            </p>
        </div>
        <? if ($hang != 0) { ?>
            <div class="ctkiem_tdang_ban <?= ($dong != '') ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $dong ?>" data3="<?= $hang ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($dong != '') ? 'active' : '' ?>">
                    <? if ($dong != "") {
                        if ($hang != 1766 && $hang != 1774) {
                            $list_dong = new db_query("SELECT `id`, `ten_dong` FROM `dong` WHERE `id` = '" . $dong . "' LIMIT 1 ");
                            $ten_dong = mysql_fetch_assoc($list_dong->result)['ten_dong'];
                            echo $ten_dong;
                        } else if ($hang == 1766 || $hang == 1774) {
                            echo $dong;
                        }
                    } else { ?>
                        Dòng
                    <? } ?>
                </p>
            </div>
        <? } ?>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($bao_hanh != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $bao_hanh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bao_hanh != 0) ? 'active' : '' ?>">
            <? if ($bao_hanh != 0) {
                $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = '" . $bao_hanh . "' LIMIT 1 ");
                $ten_baohanh = mysql_fetch_assoc($bao_hanhquery->result)['tgian_baohanh'];
                echo $ten_baohanh;
            } else { ?>
                Bảo hành
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang2[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 8) { ?>
    <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $hang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
            <? if ($hang != 0) {
                $query_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE id = '" . $hang . "' LIMIT 1 ");
                $ten_hang = mysql_fetch_assoc($query_hang->result)['ten_hang'];
                echo $ten_hang;
            } else { ?>
                Hãng xe
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($loai_xe != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $loai_xe ?>" onclick="laygia_tri(this)">
        <p class=" tkiem_rkq <?= ($loai_xe != 0) ? 'active' : '' ?>">
            <? if ($loai_xe != 0) {
                $query_lx = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id = '" . $loai_xe . "' LIMIT 1 ");
                $ten_loaixe =  mysql_fetch_assoc($query_lx->result)['ten_loai'];
                echo $ten_loaixe;
            } else { ?>
                Loại xe đạp
            <? } ?>
        </p>
    </div>
    <? if ($loai_xe != 0 && $loai_xe == 210) { ?>
        <div class="ctkiem_tdang_ban <?= ($dong_xe != 0) ? 'active' : '' ?>" data="7" data1="<?= $tt_con ?>" data2="<?= $dong_xe ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($dong_xe != 0) ? 'active' : '' ?>">
                <? if ($dong_xe != 0) {
                    $query_dx = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id = '" . $dong_xe . "' LIMIT 1 ");
                    $ten_dong = mysql_fetch_assoc($query_dx->result)['ten_loai'];
                    echo $ten_dong;
                } else { ?>
                    Dòng xe đạp thể thao
                <? } ?>
            </p>
        </div>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($xuat_xu != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $xuat_xu ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($xuat_xu != 0) ? 'active' : '' ?>">
            <? if ($xuat_xu != 0) {
                $query_xx = new db_query("SELECT `id_xuatxu`, `noi_xuatxu` FROM `xuat_xu` WHERE id_xuatxu = '" . $xuat_xu . "' LIMIT 1 ");
                $ten_xuatxu = mysql_fetch_assoc($query_xx->result)['noi_xuatxu'];
                echo $ten_xuatxu;
            } else { ?>
                Xuất xứ
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($kichco_manhinh != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $kichco_manhinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($kichco_manhinh != 0) ? 'active' : '' ?>">
            <? if ($kichco_manhinh != 0) {
                $query_ktk = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE id_manhinh = '" . $kichco_manhinh . "' LIMIT 1 ");
                $ten_manhinh = mysql_fetch_assoc($query_ktk->result)['ten_manhinh'];
                echo $ten_manhinh;
            } else { ?>
                Kích thước khung
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($mau_sac != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $mau_sac ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($mau_sac != 0) ? 'active' : '' ?>">
            <? if ($mau_sac != 0) {
                $query_mx = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE id_color = '" . $mau_sac . "' LIMIT 1 ");
                $ten_mausac = mysql_fetch_assoc($query_mx->result)['mau_sac'];
                echo $ten_mausac;
            } else { ?>
                Màu sắc
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($chat_lieu_khung != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $chat_lieu_khung ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($chat_lieu_khung != 0) ? 'active' : '' ?>">
            <? if ($chat_lieu_khung != 0) {
                $cl_khung = new db_query("SELECT `id`,`name` FROM `nhom_sanpham_chatlieu` WHERE `id` = '" . $chat_lieu_khung . "' LIMIT 1 ");
                $ten_chatlieu = mysql_fetch_assoc($query_hang->result)['name'];
                echo $ten_chatlieu;
            } else { ?>
                Chất liệu khung
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($bao_hanh != 0) ? 'active' : '' ?>" data="8" data1="<?= $tt_con ?>" data2="<?= $bao_hanh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bao_hanh != 0) ? 'active' : '' ?>">
            <? if ($bao_hanh != 0) {
                $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = '" . $bao_hanh . "' LIMIT 1 ");
                $ten_baohanh = mysql_fetch_assoc($bao_hanhquery->result)['tgian_baohanh'];
                echo $ten_baohanh;
            } else { ?>
                Bảo hành
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="9" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
    <!-- XE MÁY ĐIỆN/XE ĐẠP ĐIỆN -->
<? } else if ($tt_con == 40 || $tt_con == 41) { ?>
    <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $hang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
            <? if ($hang != 0) {
                $query_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE id = '" . $hang . "' LIMIT 1 ");
                $ten_hang = mysql_fetch_assoc($query_hang->result)['ten_hang'];
                echo $ten_hang;
            } else { ?>
                Hãng xe
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($dong_co != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $dong_co ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($dong_co != 0) ? 'active' : '' ?>">
            <? if ($dong_co != 0) {
                $list_dongco = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_dl` = '" . $dong_co . "' ");
                $ten_dongco = mysql_fetch_assoc($list_dongco->result)['ten_dl'];
                echo $ten_dongco;
            } else { ?>
                Động cơ
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($mau_sac != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $mau_sac ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($mau_sac != 0) ? 'active' : '' ?>">
            <? if ($mau_sac != 0) {
                $query_mx = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE id_color = '" . $mau_sac . "' LIMIT 1 ");
                $ten_mausac = mysql_fetch_assoc($query_mx->result)['mau_sac'];
                echo $ten_mausac;
            } else { ?>
                Màu sắc
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($bao_hanh != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $bao_hanh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bao_hanh != 0) ? 'active' : '' ?>">
            <? if ($bao_hanh != 0) {
                $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = '" . $bao_hanh . "' LIMIT 1 ");
                $ten_baohanh = mysql_fetch_assoc($bao_hanhquery->result)['tgian_baohanh'];
                echo $ten_baohanh;
            } else { ?>
                Bảo hành
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
    <!-- XE MÁY -->
<? } else if ($tt_con == 9) { ?>
    <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $hang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
            <? if ($hang != 0) {
                $query_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE id = '" . $hang . "' LIMIT 1 ");
                $ten_hang = mysql_fetch_assoc($query_hang->result)['ten_hang'];
                echo $ten_hang;
            } else { ?>
                Hãng xe
            <? } ?>
        </p>
    </div>
    <? if ($hang != 0) { ?>
        <div class="ctkiem_tdang_ban <?= ($dong_xe != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $dong_xe ?>" data3="<?= $hang ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($dong_xe != 0) ? 'active' : '' ?>">
                <? if ($dong_xe != 0) {
                    if ($hang != 1286) {
                        $query_dx = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id = '" . $dong_xe . "' LIMIT 1 ");
                        $ten_dong = mysql_fetch_assoc($query_dx->result)['ten_loai'];
                        echo $ten_dong;
                    } else {
                        echo $dong_xe;
                    }
                } else { ?>
                    Dòng xe
                <? } ?>
            </p>
        </div>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($loai_xe != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $loai_xe ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_xe != 0) ? 'active' : '' ?>">
            <? if ($loai_xe != 0) {
                $query_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id = '" . $loai_xe . "' LIMIT 1 ");
                $ten_loai = mysql_fetch_assoc($query_loai->result)['ten_loai'];
                echo $ten_loai;
            } else { ?>
                Loại xe
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($dung_tich != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $dung_tich ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($dung_tich != 0) ? 'active' : '' ?>">
            <? if ($dung_tich != 0) {
                $query_dtich = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE id_dl = '" . $dung_tich . "' LIMIT 1 ");
                $ten_dl = mysql_fetch_assoc($query_dtich->result)['ten_dl'];
                echo $ten_dl;
            } else { ?>
                Dung tích xe
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($nam_san_xuat != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $nam_san_xuat ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($nam_san_xuat != 0) ? 'active' : '' ?>">
            <? if ($nam_san_xuat != 0) {
                $query_nsx = new db_query("SELECT `id`, `nam_san_xuat` FROM `nam_san_xuat` WHERE id = '" . $nam_san_xuat . "' LIMIT 1 ");
                $ten_nam = mysql_fetch_assoc($query_nsx->result)['nam_san_xuat'];
                echo $ten_nam;
            } else { ?>
                Năm sản xuất
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($bao_hanh != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $bao_hanh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bao_hanh != 0) ? 'active' : '' ?>">
            <? if ($bao_hanh != 0) {
                $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = '" . $bao_hanh . "' LIMIT 1 ");
                $ten_baohanh = mysql_fetch_assoc($bao_hanhquery->result)['tgian_baohanh'];
                echo $ten_baohanh;
            } else { ?>
                Bảo hành
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="7" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
    <!-- OTO -->
<? } else if ($tt_con == 10) { ?>
    <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $hang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
            <? if ($hang != 0) {
                $query_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE id = '" . $hang . "' LIMIT 1 ");
                $ten_hang = mysql_fetch_assoc($query_hang->result)['ten_hang'];
                echo $ten_hang;
            } else { ?>
                Hãng xe
            <? } ?>
        </p>
    </div>
    <? if ($loai_xe != 0) { ?>
        <div class="ctkiem_tdang_ban <?= ($dong_xe != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $dong_xe ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($dong_xe != 0) ? 'active' : '' ?>">
                <? if ($dong_xe != 0) {
                    if ($hang != 1363) {
                        $query_dx = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id = '" . $dong_xe . "' LIMIT 1 ");
                        $ten_dong = mysql_fetch_assoc($query_dx->result)['ten_loai'];
                        echo $ten_dong;
                    } else {
                        echo $dong_xe;
                    }
                } else { ?>
                    Dòng xe
                <? } ?>
            </p>
        </div>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($nam_san_xuat != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $nam_san_xuat ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($nam_san_xuat != 0) ? 'active' : '' ?>">
            <? if ($nam_san_xuat != 0) {
                $query_nsx = new db_query("SELECT `id`, `nam_san_xuat` FROM `nam_san_xuat` WHERE id = '" . $nam_san_xuat . "' LIMIT 1 ");
                $ten_nam = mysql_fetch_assoc($query_nsx->result)['nam_san_xuat'];
                echo $ten_nam;
            } else { ?>
                Năm sản xuất
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($hop_so != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $hop_so ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($hop_so != 0) ? 'active' : '' ?>">
            <? if ($hop_so != 0) {
                echo $arr_hopso[$hop_so]; ?>
            <? } else { ?>
                Hộp số
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($nhien_lieu != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $nhien_lieu ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($nhien_lieu != 0) ? 'active' : '' ?>">
            <? if ($nhien_lieu != 0) {
                echo $arr_nhienlieu[$nhien_lieu]; ?>
            <? } else { ?>
                Nhiên liệu
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($xuat_xu != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $xuat_xu ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($xuat_xu != 0) ? 'active' : '' ?>">
            <? if ($xuat_xu != 0) {
                $query_xx = new db_query("SELECT `id_xuatxu`, `noi_xuatxu` FROM `xuat_xu` WHERE id_xuatxu = '" . $xuat_xu . "' LIMIT 1 ");
                $ten_xuatxu = mysql_fetch_assoc($query_xx->result)['noi_xuatxu'];
                echo $ten_xuatxu;
            } else { ?>
                Xuất xứ
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($so_cho != 0) ? 'active' : '' ?>" data="7" data1="<?= $tt_con ?>" data2="<?= $so_cho ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($so_cho != 0) ? 'active' : '' ?>">
            <? if ($so_cho != 0) {
                $query_socho = new db_query("SELECT `id`, `so_luong` FROM `number_content` WHERE id = '" . $so_cho . "' LIMIT 1 ");
                $ten_cho = mysql_fetch_assoc($query_hang->result)['so_luong'];
                echo $ten_cho;
            } else { ?>
                Số chỗ
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($mau_sac != 0) ? 'active' : '' ?>" data="8" data1="<?= $tt_con ?>" data2="<?= $mau_sac ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($mau_sac != 0) ? 'active' : '' ?>">
            <? if ($mau_sac != 0) {
                $query_mx = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE id_color = '" . $mau_sac . "' LIMIT 1 ");
                $ten_mausac = mysql_fetch_assoc($query_mx->result)['mau_sac'];
                echo $ten_mausac;
            } else { ?>
                Màu sắc
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($kieu_dang != 0) ? 'active' : '' ?>" data="9" data1="<?= $tt_con ?>" data2="<?= $kieu_dang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($kieu_dang != 0) ? 'active' : '' ?>">
            <? if ($kieu_dang != 0) {
                $query_kdang = new db_query("SELECT `id`, `name` FROM `nhom_sanpham_hinhdang` WHERE id = '" . $kieu_dang . "' LIMIT 1 ");
                $ten_kdang = mysql_fetch_assoc($query_kdang->result)['name'];
                echo $ten_kdang;
            } else { ?>
                Kiểu dáng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($bao_hanh != 0) ? 'active' : '' ?>" data="10" data1="<?= $tt_con ?>" data2="<?= $bao_hanh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($bao_hanh != 0) ? 'active' : '' ?>">
            <? if ($bao_hanh != 0) {
                $bao_hanhquery = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_baohanh` = '" . $bao_hanh . "' LIMIT 1 ");
                $ten_baohanh = mysql_fetch_assoc($bao_hanhquery->result)['tgian_baohanh'];
                echo $ten_baohanh;
            } else { ?>
                Bảo hành
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="11" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang3[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
    <!-- XE TẢI -->
<? } else if ($tt_con == 38) { ?>
    <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $hang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
            <? if ($hang != 0) {
                $query_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE id = '" . $hang . "' LIMIT 1 ");
                $ten_hang = mysql_fetch_assoc($query_hang->result)['ten_hang'];
                echo $ten_hang;
            } else { ?>
                Hãng xe
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($trong_tai != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $trong_tai ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($trong_tai != 0) ? 'active' : '' ?>">
            <? if ($trong_tai != 0) {
                $query_trtai = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE id_dl = '" . $trong_tai . "' LIMIT 1 ");
                $ten_trtai = mysql_fetch_assoc($query_hang->result)['ten_hang'];
                echo $ten_trtai;
            } else { ?>
                Trọng tải
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($nhien_lieu != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $nhien_lieu ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($nhien_lieu != 0) ? 'active' : '' ?>">
            <? if ($nhien_lieu != 0) {
                echo $arr_nhienlieu[$nhien_lieu]; ?>
            <? } else { ?>
                Nhiên liệu
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($mau_sac != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $mau_sac ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($mau_sac != 0) ? 'active' : '' ?>">
            <? if ($mau_sac != 0) {
                $query_mx = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE id_color = '" . $mau_sac . "' LIMIT 1 ");
                $ten_mausac = mysql_fetch_assoc($query_mx->result)['mau_sac'];
                echo $ten_mausac;
            } else { ?>
                Màu sắc
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
    <!-- Phụ tùng xe -->
<? } else if ($tt_con == 39) { ?>
    <div class="ctkiem_tdang_ban <?= ($loai_phu_tung != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai_phu_tung ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_phu_tung != 0) ? 'active' : '' ?>">
            <? if ($loai_phu_tung != 0) {
                $query_lptung = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id = '" . $loai_phu_tung . "' LIMIT 1 ");
                $ten_lptung = mysql_fetch_assoc($query_hang->result)['ten_loai'];
                echo $ten_lptung;
            } else { ?>
                Loại phụ tùng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
    <!-- Nội thất oto -->
<? } else if ($tt_con == 42) { ?>
    <div class="ctkiem_tdang_ban <?= ($loai_noithat != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai_noithat ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_noithat != 0) ? 'active' : '' ?>">
            <? if ($loai_noithat != 0) {
                $query_nthat_oto = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id = '" . $loai_noithat . "' LIMIT 1 ");
                $ten_nthat_oto = mysql_fetch_assoc($query_hang->result)['ten_loai'];
                echo $ten_nthat_oto;
            } else { ?>
                Loại nội thất
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
    <!-- NHÀ ĐẤT -->
<? } else if ($tt_con == 11 || $tt_con == 26 || $tt_con == 28 || $tt_con == 29) { ?>
    <div class="ctkiem_tdang_ban <?= ($can_ban_mua != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $can_ban_mua ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($can_ban_mua != 0) ? 'active' : '' ?>">
            <? if ($can_ban_mua != 0) {
                if ($can_ban_mua == 1) {
                    echo "Cần bán";
                } else if ($can_ban_mua == 2) {
                    echo 'Cho thuê';
                }
            } else { ?>
                Cần bán/Cho thuê
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($ten_toa_nha != '') ? 'active' : '' ?>" data="9" data1="<?= $tt_con ?>" data2="<?= $ten_toa_nha ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($ten_toa_nha != '') ? 'active' : '' ?>">
            <? if ($ten_toa_nha != '') {
                echo $ten_toa_nha;
            } else { ?>
                Tên toà nhà/Khu dân cư
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tong_so_tang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $tong_so_tang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tong_so_tang != 0) ? 'active' : '' ?>">
            <? if ($tong_so_tang != 0) {
                $sql_tang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE id = '" . $tong_so_tang . "' LIMIT 1 ");
                $ten_tang = mysql_fetch_assoc($sql_tang->result)['so_luong'];
                echo $ten_tang;
            } else { ?>
                Tổng số tầng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($huong_chinh != 0) ? 'active' : '' ?>" data="8" data1="<?= $tt_con ?>" data2="<?= $huong_chinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($huong_chinh != 0) ? 'active' : '' ?>">
            <? if ($huong_chinh != 0) {
                echo $arr_huongchinh[$huong_chinh];
            } else { ?>
                Hướng cửa chính
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($giay_to_phap_ly != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $giay_to_phap_ly ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($giay_to_phap_ly != 0) ? 'active' : '' ?>">
            <? if ($giay_to_phap_ly != 0) {
                echo $arr_giaytophaply[$giay_to_phap_ly];
            } else { ?>
                Giấy tờ pháp lý
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($so_pve_sinh != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $so_pve_sinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($so_pve_sinh != 0) ? 'active' : '' ?>">
            <? if ($so_pve_sinh != 0) {
                $sql_vs = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE id = '" . $so_pve_sinh . "' LIMIT 1 ");
                $so_phong = mysql_fetch_assoc($sql_vs->result)['so_luong'];
                echo $so_phong;
            } else { ?>
                Số phòng vệ sinh
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($so_pngu != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $so_pngu ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($so_pngu != 0) ? 'active' : '' ?>">
            <? if ($so_pngu != 0) {
                $sql_n = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE id = '" . $so_pngu . "' LIMIT 1 ");
                $so_phong = mysql_fetch_assoc($sql_vs->result)['so_luong'];
                echo $so_phong;
            } else { ?>
                Số phòng ngủ
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($dien_tich != '') ? 'active' : '' ?>" data="7" data1="<?= $tt_con ?>" data2="<?= $dien_tich ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($dien_tich != '') ? 'active' : '' ?>">
            <? if ($dien_tich != '') {
                echo $dien_tich;
            } else { ?>
                Diện tích
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang_noi_that != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $tinh_trang_noi_that ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang_noi_that != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang_noi_that != 0) {
                echo $arr_ttnoithat[$tinh_trang_noi_that];
            } else { ?>
                Tình trạng nội thất
            <? } ?>
        </p>
    </div>
    <!-- ĐẤT -->
<? } else if ($tt_con == 12) { ?>
    <div class="ctkiem_tdang_ban <?= ($can_ban_mua != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $can_ban_mua ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($can_ban_mua != 0) ? 'active' : '' ?>">
            <? if ($can_ban_mua != 0) {
                if ($can_ban_mua == 1) {
                    echo "Cần bán";
                } else if ($can_ban_mua == 2) {
                    echo 'Cho thuê';
                }
            } else { ?>
                Cần bán/Cho thuê
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($ten_toa_nha != '') ? 'active' : '' ?>" data="8" data1="<?= $tt_con ?>" data2="<?= $ten_toa_nha ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($ten_toa_nha != '') ? 'active' : '' ?>">
            <? if ($ten_toa_nha != '') {
                echo $ten_toa_nha;
            } else { ?>
                Tên dự án
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($loai_hinh_dat != '') ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $loai_hinh_dat ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_hinh_dat != '') ? 'active' : '' ?>">
            <? if ($loai_hinh_dat != '') {
                echo $arr_loaihinh[$loai_hinh_dat];
            } else { ?>
                Loại hình đất
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($huong_chinh != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $huong_chinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($huong_chinh != 0) ? 'active' : '' ?>">
            <? if ($huong_chinh != 0) {
                echo $arr_huongchinh[$huong_chinh];
            } else { ?>
                Hướng đất
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($giay_to_phap_ly != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $giay_to_phap_ly ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($giay_to_phap_ly != 0) ? 'active' : '' ?>">
            <? if ($giay_to_phap_ly != 0) {
                echo $arr_giaytophaply[$giay_to_phap_ly];
            } else { ?>
                Giấy tờ pháp lý
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($dien_tich != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $dien_tich ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($dien_tich != 0) ? 'active' : '' ?>">
            <? if ($dien_tich != 0) {
                echo $dien_tich;
            } else { ?>
                Diện tích
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($chieu_dai != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $chieu_dai ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($chieu_dai != 0) ? 'active' : '' ?>">
            <? if ($chieu_dai != 0) {
                echo $dien_tich;
            } else { ?>
                Chiều dài
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($chieu_rong != 0) ? 'active' : '' ?>" data="7" data1="<?= $tt_con ?>" data2="<?= $chieu_rong ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($chieu_rong != 0) ? 'active' : '' ?>">
            <? if ($chieu_rong != 0) {
                echo $chieu_rong;
            } else { ?>
                Chiều ngang
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 27 || $tt_con == 33 || $tt_con == 34) { ?>
    <div class="ctkiem_tdang_ban <?= ($can_ban_mua != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $can_ban_mua ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($can_ban_mua != 0) ? 'active' : '' ?>">
            <? if ($can_ban_mua != 0) {
                if ($can_ban_mua == 1) {
                    echo "Cần bán";
                } else if ($can_ban_mua == 2) {
                    echo 'Cho thuê';
                }
            } else { ?>
                Cần bán/Cho thuê
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($ten_toa_nha != '') ? 'active' : '' ?>" data="10" data1="<?= $tt_con ?>" data2="<?= $ten_toa_nha ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($ten_toa_nha != '') ? 'active' : '' ?>">
            <? if ($ten_toa_nha != '') {
                echo $ten_toa_nha;
            } else { ?>
                Tên toà nhà/Khu dân cư
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tang_so != '') ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $tang_so ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tang_so != '') ? 'active' : '' ?>">
            <? if ($tang_so != '') {
                echo $tang_so;
            } else { ?>
                Tầng số
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($loai_hinh_canho != '') ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $loai_hinh_canho ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_hinh_canho != '') ? 'active' : '' ?>">
            <? if ($loai_hinh_canho != '') {
                echo $arr_lhcanho[$loai_hinh_canho];
            } else { ?>
                Loại hình căn hộ
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($giay_to_phap_ly != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $giay_to_phap_ly ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($giay_to_phap_ly != 0) ? 'active' : '' ?>">
            <? if ($giay_to_phap_ly != 0) {
                echo $arr_giaytophaply[$giay_to_phap_ly];
            } else { ?>
                Giấy tờ pháp lý
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($so_pngu != 0) ? 'active' : '' ?>" data="7" data1="<?= $tt_con ?>" data2="<?= $so_pngu ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($so_pngu != 0) ? 'active' : '' ?>">
            <? if ($so_pngu != 0) {
                $sql_n = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE id = '" . $so_pngu . "' LIMIT 1 ");
                $so_phong = mysql_fetch_assoc($sql_vs->result)['so_luong'];
                echo $so_phong;
            } else { ?>
                Số phòng ngủ
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($so_pve_sinh != 0) ? 'active' : '' ?>" data="8" data1="<?= $tt_con ?>" data2="<?= $so_pve_sinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($so_pve_sinh != 0) ? 'active' : '' ?>">
            <? if ($so_pve_sinh != 0) {
                $sql_vs = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE id = '" . $so_pve_sinh . "' LIMIT 1 ");
                $so_phong = mysql_fetch_assoc($sql_vs->result)['so_luong'];
                echo $so_phong;
            } else { ?>
                Số phòng vệ sinh
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang_noi_that != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $tinh_trang_noi_that ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang_noi_that != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang_noi_that != 0) {
                echo $arr_ttnoithat[$tinh_trang_noi_that];
            } else { ?>
                Tình trạng nội thất
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($dien_tich != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $dien_tich ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($dien_tich != 0) ? 'active' : '' ?>">
            <? if ($dien_tich != 0) {
                echo $dien_tich;
            } else { ?>
                Diện tích
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($huong_chinh != 0) ? 'active' : '' ?>" data="9" data1="<?= $tt_con ?>" data2="<?= $huong_chinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($huong_chinh != 0) ? 'active' : '' ?>">
            <? if ($huong_chinh != 0) {
                echo $arr_huongchinh[$huong_chinh];
            } else { ?>
                Hướng cửa chính
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 33) { ?>
    <div class="ctkiem_tdang_ban <?= ($can_ban_mua != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $can_ban_mua ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($can_ban_mua != 0) ? 'active' : '' ?>">
            <? if ($can_ban_mua != 0) {
                if ($can_ban_mua == 1) {
                    echo "Cần bán";
                } else if ($can_ban_mua == 2) {
                    echo 'Cho thuê';
                }
            } else { ?>
                Cần bán/Cho thuê
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($ten_toa_nha != '') ? 'active' : '' ?>" data="7" data1="<?= $tt_con ?>" data2="<?= $ten_toa_nha ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($ten_toa_nha != '') ? 'active' : '' ?>">
            <? if ($ten_toa_nha != '') {
                echo $ten_toa_nha;
            } else { ?>
                Tên toà nhà/Khu dân cư
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tong_so_tang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $tong_so_tang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tong_so_tang != 0) ? 'active' : '' ?>">
            <? if ($tong_so_tang != 0) {
                $sql_tang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE id = '" . $tong_so_tang . "' LIMIT 1 ");
                $ten_tang = mysql_fetch_assoc($sql_tang->result)['so_luong'];
                echo $ten_tang;
            } else { ?>
                Tổng số tầng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($giay_to_phap_ly != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $giay_to_phap_ly ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($giay_to_phap_ly != 0) ? 'active' : '' ?>">
            <? if ($giay_to_phap_ly != 0) {
                echo $arr_giaytophaply[$giay_to_phap_ly];
            } else { ?>
                Giấy tờ pháp lý
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang_noi_that != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $tinh_trang_noi_that ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang_noi_that != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang_noi_that != 0) {
                echo $arr_ttnoithat[$tinh_trang_noi_that];
            } else { ?>
                Tình trạng nội thất
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($dien_tich != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $dien_tich ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($dien_tich != 0) ? 'active' : '' ?>">
            <? if ($dien_tich != 0) {
                echo $dien_tich;
            } else { ?>
                Diện tích
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($huong_chinh != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $huong_chinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($huong_chinh != 0) ? 'active' : '' ?>">
            <? if ($huong_chinh != 0) {
                echo $arr_huongchinh[$huong_chinh];
            } else { ?>
                Hướng cửa chính
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 34) { ?>
    <div class="ctkiem_tdang_ban <?= ($can_ban_mua != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $can_ban_mua ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($can_ban_mua != 0) ? 'active' : '' ?>">
            <? if ($can_ban_mua != 0) {
                if ($can_ban_mua == 1) {
                    echo "Cần bán";
                } else if ($can_ban_mua == 2) {
                    echo 'Cho thuê';
                }
            } else { ?>
                Cần bán/Cho thuê
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($ten_toa_nha != '') ? 'active' : '' ?>" data="8" data1="<?= $tt_con ?>" data2="<?= $ten_toa_nha ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($ten_toa_nha != '') ? 'active' : '' ?>">
            <? if ($ten_toa_nha != '') {
                echo $ten_toa_nha;
            } else { ?>
                Tên toà nhà/Khu dân cư
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($loai_hinh_canho != '') ? 'active' : '' ?>" data="7" data1="<?= $tt_con ?>" data2="<?= $loai_hinh_canho ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_hinh_canho != '') ? 'active' : '' ?>">
            <? if ($loai_hinh_canho != '') {
                echo $arr_lhcanho[$loai_hinh_canho];
            } else { ?>
                Loại hình văn phòng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tong_so_tang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $tong_so_tang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tong_so_tang != 0) ? 'active' : '' ?>">
            <? if ($tong_so_tang != 0) {
                $sql_tang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE id = '" . $tong_so_tang . "' LIMIT 1 ");
                $ten_tang = mysql_fetch_assoc($sql_tang->result)['so_luong'];
                echo $ten_tang;
            } else { ?>
                Tổng số tầng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($giay_to_phap_ly != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $giay_to_phap_ly ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($giay_to_phap_ly != 0) ? 'active' : '' ?>">
            <? if ($giay_to_phap_ly != 0) {
                echo $arr_giaytophaply[$giay_to_phap_ly];
            } else { ?>
                Giấy tờ pháp lý
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang_noi_that != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $tinh_trang_noi_that ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang_noi_that != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang_noi_that != 0) {
                echo $arr_ttnoithat[$tinh_trang_noi_that];
            } else { ?>
                Tình trạng nội thất
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($dien_tich != 0) ? 'active' : '' ?>" data="5" data1="<?= $tt_con ?>" data2="<?= $dien_tich ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($dien_tich != 0) ? 'active' : '' ?>">
            <? if ($dien_tich != 0) {
                echo $dien_tich;
            } else { ?>
                Diện tích
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($huong_chinh != 0) ? 'active' : '' ?>" data="6" data1="<?= $tt_con ?>" data2="<?= $huong_chinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($huong_chinh != 0) ? 'active' : '' ?>">
            <? if ($huong_chinh != 0) {
                echo $arr_huongchinh[$huong_chinh];
            } else { ?>
                Hướng cửa chính
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 19) { ?>
    <div class="ctkiem_tdang_ban <?= ($loai_xe != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $loai_xe ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_xe != 0) ? 'active' : '' ?>">
            <? if ($loai_xe != 0) {
                $sql_lx = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai_xe . "' LIMIT 1 ");
                $ten_xe = mysql_fetch_assoc($sql_lx->result)['ten_loai'];
                echo $ten_xe;
            } else { ?>
                Loại xe
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($loai_hang_hoa != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $loai_hang_hoa ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_hang_hoa != 0) ? 'active' : '' ?>">
            <? if ($loai_hang_hoa != 0) {
                $query_lhh = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai_hang_hoa . "' LIMIT 1 ");
                $ten_xe = mysql_fetch_assoc($query_lhh->result)['ten_loai'];
                echo $ten_xe;
            } else { ?>
                Loại hàng hóa giao
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 100) { ?>
    <div class="ctkiem_tdang_ban <?= ($loai != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai != 0) ? 'active' : '' ?>">
            <? if ($loai != 0) {
                $list_ncu = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai . "' LIMIT 1 ");
                $ten_loainc = mysql_fetch_assoc($list_ncu->result)['ten_loai'];
                echo $ten_loainc;
            } else { ?>
                Loại nhạc cụ
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 101 || $tt_con == 103 || $tt_con == 43 || $tt_con == 44 || $tt_con == 45 || $tt_con == 46 || $tt_con == 53 || $tt_con == 54 || $tt_con == 60 || $tt_con == 83 || $tt_con == 85 || $tt_con == 84 || $tt_con == 87 || $tt_con == 88 || $tt_con == 86 || $tt_con == 116 || $tt_con == 117) { ?>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?></p>
    </div>
<? } else if ($tt_con == 102 || $tt_con == 47 || $tt_con == 48 || $tt_con == 49 || $tt_con == 50 || $tt_con == 106) { ?>
    <div class="ctkiem_tdang_ban <?= ($loai != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai != 0) ? 'active' : '' ?>">
            <? if ($loai != 0) {
                $list_ncu = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai . "' LIMIT 1 ");
                $ten_loainc = mysql_fetch_assoc($list_ncu->result)['ten_loai'];
                echo $ten_loainc;
            } else { ?>
                Loại sản phẩm
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 94 || $tt_con == 95) { ?>
    <div class="ctkiem_tdang_ban <?= ($loai != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai != 0) ? 'active' : '' ?>">
            <? if ($loai != 0) {
                $list_ncu = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai . "' LIMIT 1 ");
                $ten_loainc = mysql_fetch_assoc($list_ncu->result)['ten_loai'];
                echo $ten_loainc;
            } else {
                if ($tt_con == 94) {
                    echo 'Loại thực phẩm';
                } else if ($tt_con == 95) {
                    echo 'Loại đồ uống';
                }
            } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($han_su_dung != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $han_su_dung ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($han_su_dung != 0) ? 'active' : '' ?>">
            <? if ($han_su_dung != 0) {
                echo date('d-m-Y', strtotime($han_su_dung)); ?>
            <? } else { ?>
                Hạn sử dụng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 75) { ?>
    <!-- THỂ THAO -->
    <div class="ctkiem_tdang_ban <?= ($mon_the_thao != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $mon_the_thao ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($mon_the_thao != 0) ? 'active' : '' ?>">
            <? if ($mon_the_thao != 0) {
                $monthethao = new db_query("SELECT `id`,`ten_mon` FROM `mon_the_thao` WHERE id='" . $mon_the_thao . "' LIMIT 1 ");
                $ten_mon = mysql_fetch_assoc($monthethao->result)['ten_mon'];
                echo $ten_mon;
            } else { ?>
                Môn thể thao
            <? } ?>
        </p>
    </div>
    <? if ($mon_the_thao != 0) { ?>
        <div class="ctkiem_tdang_ban <?= ($loai75 != '') ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $loai75 ?>" data3="<?= $mon_the_thao ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($loai75 != '') ? 'active' : '' ?>">
                <? if ($loai75 != '') {
                    if ($mon_the_thao != 8) {
                        $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai75 . "' LIMIT 1 ");
                        $ten_loai = mysql_fetch_assoc($list_loai->result)['ten_loai'];
                        echo $ten_loai;
                    } else {
                        echo $loai75;
                    }
                } else { ?>
                    Loại dụng cụ
                <? } ?>
            </p>
        </div>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 104) { ?>
    <!-- THỂ THAO -->
    <div class="ctkiem_tdang_ban <?= ($mon_the_thao != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $mon_the_thao ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($mon_the_thao != 0) ? 'active' : '' ?>">
            <? if ($mon_the_thao != 0) {
                $monthethao = new db_query("SELECT `id`,`ten_mon` FROM `mon_the_thao` WHERE id='" . $mon_the_thao . "' LIMIT 1 ");
                $ten_mon = mysql_fetch_assoc($monthethao->result)['ten_mon'];
                echo $ten_mon;
            } else { ?>
                Môn thể thao
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($loai75 != '') ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $loai75 ?>" data3="<?= $mon_the_thao ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai75 != '') ? 'active' : '' ?>">
            <? if ($loai75 != '') {
                $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai75 . "' LIMIT 1 ");
                $ten_loai = mysql_fetch_assoc($list_loai->result)['ten_loai'];
                echo $ten_loai;
            } else { ?>
                Loại thời trang
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 105) { ?>
    <!-- THỂ THAO -->
    <div class="ctkiem_tdang_ban <?= ($mon_the_thao != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $mon_the_thao ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($mon_the_thao != 0) ? 'active' : '' ?>">
            <? if ($mon_the_thao != 0) {
                $monthethao = new db_query("SELECT `id`,`ten_mon` FROM `mon_the_thao` WHERE id='" . $mon_the_thao . "' LIMIT 1 ");
                $ten_mon = mysql_fetch_assoc($monthethao->result)['ten_mon'];
                echo $ten_mon;
            } else { ?>
                Môn thể thao
            <? } ?>
        </p>
    </div>
    <? if ($mon_the_thao != 0) { ?>
        <div class="ctkiem_tdang_ban <?= ($loai75 != '') ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $loai75 ?>" data3="<?= $mon_the_thao ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($loai75 != '') ? 'active' : '' ?>">
                <? if ($loai75 != '') {
                    if ($mon_the_thao != 8) {
                        $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai75 . "' LIMIT 1 ");
                        $ten_loai = mysql_fetch_assoc($list_loai->result)['ten_loai'];
                        echo $ten_loai;
                    } else {
                        echo $loai75;
                    }
                } else { ?>
                    Loại phụ kiện
                <? } ?>
            </p>
        </div>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 110 || $tt_con == 111 || $tt_con == 112 || $tt_con == 113) { ?>
    <!-- THÚ CƯNG -->
    <div class="ctkiem_tdang_ban <?= ($giong_thu_cung != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $giong_thu_cung ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($giong_thu_cung != 0) ? 'active' : '' ?>">
            <? if ($giong_thu_cung != 0) {
                $thu_cung = new db_query("SELECT `id`,`giong_thucung` FROM `giong_thu_cung` WHERE `id` = '" . $giong_thu_cung . "' LIMIT 1 ");
                $ten_giong = mysql_fetch_assoc($thu_cung->result)['giong_thucung'];
                echo $ten_giong;
            } else { ?>
                Giống thú cưng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($do_tuoi != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $do_tuoi ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($do_tuoi != 0) ? 'active' : '' ?>">
            <? if ($do_tuoi != 0) {
                $tuoi_thucung = new db_query("SELECT `id`,`contents_name` FROM `thongtin_thucung` WHERE `id` = $do_tuoi LIMIT 1 ");
                $tuoi_tc = mysql_fetch_assoc($tuoi_thucung->result)['contents_name'];
                echo $tuoi_tc;
            } else { ?>
                Độ tuổi
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($kich_co != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $kich_co ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($kich_co != 0) ? 'active' : '' ?>">
            <? if ($kich_co != 0) {
                $kc_thucung = new db_query("SELECT `id`,`contents_name` FROM `thongtin_thucung` WHERE `id` = $kich_co LIMIT 1 ");
                $kco_tc = mysql_fetch_assoc($tuoi_thucung->result)['contents_name'];
                echo $kco_tc;
            } else { ?>
                Kích cỡ thú cưng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($gioi_tinh != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $gioi_tinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($gioi_tinh != 0) ? 'active' : '' ?>">
            <? if ($gioi_tinh != 0) {
                $kc_thucung = new db_query("SELECT `id`,`contents_name` FROM `thongtin_thucung` WHERE `id` = $gioi_tinh LIMIT 1 ");
                $kco_tc = mysql_fetch_assoc($tuoi_thucung->result)['contents_name'];
                echo $kco_tc;
            } else { ?>
                Giới tính
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 114) { ?>
    <div class="ctkiem_tdang_ban <?= ($nhom_sanpham != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $nhom_sanpham ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($nhom_sanpham != 0) ? 'active' : '' ?>">
            <? if ($nhom_sanpham != 0) {
                $nhomsp = new db_query("SELECT `id`,`name` FROM `nhom_sanpham` WHERE `id` = '" . $nhom_sanpham . "' LIMIT 1 ");
                $ten_nhom = mysql_fetch_assoc($nhomsp->result)['name'];
                echo $ten_nhom;
            } else { ?>
                Nhóm sản phẩm
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($giong_thu_cung != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $giong_thu_cung ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($giong_thu_cung != 0) ? 'active' : '' ?>">
            <? if ($giong_thu_cung != 0) {
                $giongtc = new db_query("SELECT `id`,`giong_thucung` FROM `giong_thu_cung` WHERE `id` = '" . $giong_thu_cung . "' LIMIT 1 ");
                $ten_giong = mysql_fetch_assoc($giongtc->result)['name'];
                echo $ten_giong;
            } else { ?>
                Giống thú cưng
            <? } ?>
        </p>
    </div>
    <!-- <div class="ctkiem_tdang_ban">
        <p class="tkiem_rkq">Trọng lượng</p>
    </div>
    <div class="ctkiem_tdang_ban">
        <p class="tkiem_rkq">Thể tích</p>
    </div> -->
<? } else if ($tt_con == 115) { ?>
    <div class="ctkiem_tdang_ban <?= ($do_tuoi_thucungkhac != '') ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $do_tuoi_thucungkhac ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($do_tuoi_thucungkhac != '') ? 'active' : '' ?>">
            <? if ($do_tuoi_thucungkhac != '') {
                echo $do_tuoi_thucungkhac;
            } else { ?>
                Độ tuổi
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($kichco != '') ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $kichco ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($kichco != '') ? 'active' : '' ?>">
            <? if ($kichco != '') {
                echo $kichco;
            } else { ?>
                Kích cỡ thú cưng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($gioi_tinh != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $gioi_tinh ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($gioi_tinh != 0) ? 'active' : '' ?>">
            <? if ($gioi_tinh != 0) {
                $kc_thucung = new db_query("SELECT `id`,`contents_name` FROM `thongtin_thucung` WHERE `id` = $gioi_tinh LIMIT 1 ");
                $kco_tc = mysql_fetch_assoc($tuoi_thucung->result)['contents_name'];
                echo $kco_tc;
            } else { ?>
                Giới tính
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 78 || $tt_con == 79 || $tt_con == 80 || $tt_con == 82) { ?>
    <!-- NỘI THẤT NGOẠI THẤT -->
    <div class="ctkiem_tdang_ban <?= ($nhom_sanpham != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $nhom_sanpham ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($nhom_sanpham != 0) ? 'active' : '' ?>">
            <? if ($nhom_sanpham != 0) {
                $nhomsp = new db_query("SELECT `id`,`name` FROM `nhom_sanpham` WHERE `id` = '" . $nhom_sanpham . "' LIMIT 1 ");
                $ten_nhom = mysql_fetch_assoc($nhomsp->result)['name'];
                echo $ten_nhom;
            } else { ?>
                Nhóm sản phẩm
            <? } ?>
        </p>
    </div>
    <? if ($nhom_sanpham != 0) { ?>
        <div class="ctkiem_tdang_ban <?= ($loai_sanpham != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $loai_sanpham ?>" data3="<?= $nhom_sanpham ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($loai_sanpham != 0) ? 'active' : '' ?>">
                <? if ($loai_sanpham != 0) {
                    if ($tt_con == 78) {
                        if ($nhom_sanpham == 2 || $nhom_sanpham == 3 || $nhom_sanpham == 5) {
                            $query = new db_query("SELECT  `id`, `ten_loai` FROM loai_chung where id= '" . $loai_sanpham . "' LIMIT 1 ");
                            $ten_loai = mysql_fetch_assoc($query->result)['ten_loai'];
                            echo $ten_loai;
                        }
                    } else if ($tt_con == 79) {
                        if ($nhom_sanpham == 8 || $nhom_sanpham == 9 || $nhom_sanpham == 12 || $nhom_sanpham == 13 || $nhom_sanpham == 14 || $nhom_sanpham == 15) {
                            $query = new db_query("SELECT  `id`, `ten_loai` FROM loai_chung where id= '" . $loai_sanpham . "' LIMIT 1 ");
                            $ten_loai = mysql_fetch_assoc($query->result)['ten_loai'];
                            echo $ten_loai;
                        }
                    } else if ($tt_con == 80) {
                        if ($nhom_sanpham == 18 || $nhom_sanpham == 19) {
                            $query = new db_query("SELECT  `id`, `ten_loai` FROM loai_chung where id= '" . $loai_sanpham . "' LIMIT 1 ");
                            $ten_loai = mysql_fetch_assoc($query->result)['ten_loai'];
                            echo $ten_loai;
                        }
                    } else if ($tt_con == 82) {
                        if ($nhom_sanpham != 30) {
                            $query = new db_query("SELECT  `id`, `ten_loai` FROM loai_chung where id= '" . $loai_sanpham . "' LIMIT 1 ");
                            $ten_loai = mysql_fetch_assoc($query->result)['ten_loai'];
                            echo $ten_loai;
                        }
                    }
                } else { ?>
                    Loại sản phẩm
                <? } ?>
            </p>
        </div>
        <? if ($nhom_sanpham != 0) {
            if ($tt_con == 78) {
                if ($nhom_sanpham != 5) { ?>
                    <div class="ctkiem_tdang_ban <?= ($chat_lieu != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $chat_lieu ?>" data3="<?= $nhom_sanpham ?>" onclick="laygia_tri(this)">
                        <p class="tkiem_rkq <?= ($chat_lieu != 0) ? 'active' : '' ?>">
                            Chất liệu
                        </p>
                    </div>
                <? }
            } else if ($tt_con == 79) {
                if ($nhom_sanpham == 8 || $nhom_sanpham == 9 || $nhom_sanpham == 12 || $nhom_sanpham == 13 || $nhom_sanpham == 11) { ?>
                    <div class="ctkiem_tdang_ban <?= ($chat_lieu != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $chat_lieu ?>" data3="<?= $nhom_sanpham ?>" onclick="laygia_tri(this)">
                        <p class="tkiem_rkq <?= ($chat_lieu != 0) ? 'active' : '' ?>">
                            Chất liệu
                        </p>
                    </div>
                <? }
            } else if ($tt_con == 80) { ?>
                <div class="ctkiem_tdang_ban <?= ($chat_lieu != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $chat_lieu ?>" data3="<?= $nhom_sanpham ?>" onclick="laygia_tri(this)">
                    <p class="tkiem_rkq <?= ($chat_lieu != 0) ? 'active' : '' ?>">
                        Chất liệu
                    </p>
                </div>
                <? } else if ($tt_con == 82) {
                if ($nhom_sanpham != 30) { ?>
                    <div class="ctkiem_tdang_ban <?= ($chat_lieu != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $chat_lieu ?>" data3="<?= $nhom_sanpham ?>" onclick="laygia_tri(this)">
                        <p class="tkiem_rkq <?= ($chat_lieu != 0) ? 'active' : '' ?>">
                            Chất liệu
                        </p>
                    </div>
            <? }
            } ?>
        <? } ?>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>

    <!-- <div class="thuoc_tinh w_100 mb_20">
        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Nhóm sản phẩm</p>
        <select data="<?= $tt_con ?>" onchange="hang_doi_timkiem(this)" name="nhom_sanpham" class="form-control share_select2 w_100">
            <option value="">Nhóm sản phẩm</option>
            <?
            $phongkhach = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` = $tt_con");
            while ($rs_phongkhach = (mysql_fetch_assoc($phongkhach->result))) {
            ?>
                <option <? if ($nhom_sanpham == $rs_phongkhach['id']) echo 'selected' ?> value="<?= $rs_phongkhach['id'] ?>"><?= $rs_phongkhach['name'] ?></option>
            <? } ?>
        </select>
    </div>
    <div class="dong_doi mb_20">
        <?php if (isset($nhom_sanpham) && $nhom_sanpham > 0) : ?>
            <?php if ($tt_con == 78) : ?>
                <?php if ($nhom_sanpham == 2 || $nhom_sanpham == 3 || $nhom_sanpham == 5) : ?>
                    <?
                    $query = new db_query("SELECT * FROM loai_chung where id_cha=" . $nhom_sanpham . " and id_danhmuc= " . $tt_con . " ");
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
                            <?php foreach ($loai as $key => $value) : ?>
                                <option <? if ($loai_sanpham == $value['id']) echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                <?php endif ?>

                <?php if ($nhom_sanpham != 5) : ?>
                    <?
                    $query = new db_query("SELECT * FROM nhom_sanpham_chatlieu WHERE id_cha=" . $nhom_sanpham . "  and id_danhmuc=" . $tt_con . "");
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
                            <?php foreach ($chat as $key => $value) : ?>
                                <option <? if ($chat_lieu == $value['id']) echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                <?php endif ?>
            <?php endif ?>

            <?php if ($tt_con == 79) : ?>
                <?php if ($nhom_sanpham == 8 || $nhom_sanpham == 9 || $nhom_sanpham == 12 || $nhom_sanpham == 13 || $nhom_sanpham == 14 || $nhom_sanpham == 15) : ?>
                    <?
                    $query = new db_query("SELECT * FROM loai_chung where id_cha=" . $nhom_sanpham . " and id_danhmuc= " . $tt_con . " ");
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
                            <?php foreach ($loai as $key => $value) : ?>
                                <option <? if ($loai_sanpham == $value['id']) echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                <?php endif ?>

                <?php if ($nhom_sanpham == 8 || $nhom_sanpham == 9 || $nhom_sanpham == 12 || $nhom_sanpham == 13 || $nhom_sanpham == 11) : ?>
                    <?
                    $query = new db_query("SELECT * FROM nhom_sanpham_chatlieu WHERE id_cha=" . $nhom_sanpham . "  and id_danhmuc=" . $tt_con . "");
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
                            <?php foreach ($chat as $key => $value) : ?>
                                <option <? if ($chat_lieu == $value['id']) echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                <?php endif ?>

                <?php if ($nhom_sanpham == 14) : ?>
                    <?
                    $query = new db_query("SELECT * FROM nhom_sanpham_hinhdang WHERE id_cha=" . $nhom_sanpham . "  and id_danhmuc=" . $tt_con . "");
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
                            <?php foreach ($hinhdang as $key => $value) : ?>
                                <option <? if ($hinhdang == $value['id']) echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                <?php endif ?>
            <?php endif ?>

            <?php if ($tt_con == 80) : ?>
                <?php if ($nhom_sanpham == 18 || $nhom_sanpham == 19) : ?>
                    <?
                    $query = new db_query("SELECT * FROM loai_chung where id_cha=" . $nhom_sanpham . " and id_danhmuc= " . $tt_con . " ");
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
                            <?php foreach ($loai as $key => $value) : ?>
                                <option <? if ($loai_sanpham == $value['id']) echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                <?php endif ?>

                <?
                $query = new db_query("SELECT * FROM nhom_sanpham_chatlieu WHERE id_cha=" . $nhom_sanpham . "  and id_danhmuc=" . $tt_con . "");
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
                        <?php foreach ($chat as $key => $value) : ?>
                            <option <? if ($chat_lieu == $value['id']) echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
            <?php endif ?>

            <?php if ($tt_con == 82) : ?>
                <?php if ($nhom_sanpham != 30) : ?>
                    <?
                    $query = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` where `id_cha`= $nhom_sanpham AND `id_danhmuc`=  $tt_con  ");
                    $loai = $query->result_array();

                    $query2 = new db_query("SELECT `id`, `name` FROM `nhom_sanpham_chatlieu` WHERE `id_cha` = $nhom_sanpham  AND `id_danhmuc` = $tt_con ");
                    $chat = $query2->result_array();
                    ?>
                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại sản phẩm</p>
                        <select name="loai_sanpham" class="form-control share_select2 w_100">
                            <option value="">Loại sản phẩm</option>
                            <?php foreach ($loai as $key => $value) : ?>
                                <option <? if ($loai_sanpham == $value['id']) echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>

                    <div class="thuoc_tinh w_100 mb_20 ">
                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Chất liệu</p>
                        <select name="chat_lieu" class="form-control share_select2 w_100">
                            <option value="">Chất liệu</option>
                            <?php foreach ($chat as $key => $value) : ?>
                                <option <? if ($chat_lieu == $value['id']) echo 'selected' ?> value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                <?php endif ?>
            <?php endif ?>

        <?php endif ?>
    </div>-->
<? } else if ($tt_con == 81) { ?>
    <div class="ctkiem_tdang_ban <?= ($loai_sanpham != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai_sanpham ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_sanpham != 0) ? 'active' : '' ?>">
            <? if ($loai_sanpham != 0) {
                $phongtam = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai_sanpham . "' ");
                $ten_loai = mysql_fetch_assoc($phongtam->result)['ten_loai'];
                echo $ten_loai; ?>
            <? } else { ?>
                Loại sản phẩm
            <? } ?>
        </p>
    </div>
    <? if ($loai_sanpham != 2064) { ?>
        <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $hang ?>" data3="<?= $loai_sanpham ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
                <? if ($hang != 0) {
                    $query_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE id = '" . $hang . "' LIMIT 1 ");
                    $ten_hang = mysql_fetch_assoc($query_hang->result)['ten_hang'];
                    echo $ten_hang;
                } else { ?>
                    Thương hiệu
                <? } ?>
            </p>
        </div>
    <? } ?>
    <? if ($loai_sanpham == 2060) { ?>
        <div class="ctkiem_tdang_ban <?= ($hinhdang != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $hinhdang ?>" data3="<?= $loai_sanpham ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($hinhdang != 0) ? 'active' : '' ?>">
                <? if ($hinhdang != 0) {
                    $query = new db_query("SELECT `id`, `name` FROM nhom_sanpham_hinhdang WHERE id=" . $hinhdang . " LIMIT 1 ");
                    $ten_hinhdang = mysql_fetch_assoc($query_hang->result)['name'];
                    echo $ten_hinhdang;
                } else { ?>
                    Hình dáng
                <? } ?>
            </p>
        </div>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 118) { ?>
    <div class="ctkiem_tdang_ban <?= ($loai_sanpham != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai_sanpham ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_sanpham != 0) ? 'active' : '' ?>">
            <? if ($loai_sanpham != 0) {
                $phongtam = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai_sanpham . "' ");
                $ten_loai = mysql_fetch_assoc($phongtam->result)['ten_loai'];
                echo $ten_loai; ?>
            <? } else { ?>
                Loại sản phẩm
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 61) { ?>
    <!-- SỨC KHỎE - SẮC ĐẸP -->
    <!-- Mỹ Phẩm -->
    <div class="ctkiem_tdang_ban <?= ($loai_hinh_sp != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai_hinh_sp ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_hinh_sp != 0) ? 'active' : '' ?>">
            <? if ($loai_hinh_sp != 0) {
                $loaihinh_mp = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id` = $loai_hinh_sp LIMIT 1");
                $ten_loai = mysql_fetch_assoc($loaihinh_mp->result)['ten_loai'];
                echo $ten_loai; ?>
            <? } else { ?>
                Loại hình
            <? } ?>
        </p>
    </div>
    <? if ($loai_hinh_sp != 0) { ?>
        <div class="ctkiem_tdang_ban <?= ($loai_sanpham != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $loai_sanpham ?>" data3="<?= $loai_hinh_sp ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($loai_sanpham != 0) ? 'active' : '' ?>">
                <? if ($loai_sanpham != 0) {
                    $phongtam = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai_sanpham . "' ");
                    $ten_loai = mysql_fetch_assoc($phongtam->result)['ten_loai'];
                    echo $ten_loai; ?>
                <? } else { ?>
                    Loại mỹ phẩm
                <? } ?>
            </p>
        </div>
        <div class="ctkiem_tdang_ban <?= ($hang != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $hang ?>" data3="<?= $loai_hinh_sp ?>" onclick="laygia_tri(this)">
            <p class="tkiem_rkq <?= ($hang != 0) ? 'active' : '' ?>">
                <? if ($hang != 0) {
                    $query_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE id = '" . $hang . "' LIMIT 1 ");
                    $ten_hang = mysql_fetch_assoc($query_hang->result)['ten_hang'];
                    echo $ten_hang;
                } else { ?>
                    Hãng
                <? } ?>
            </p>
        </div>
    <? } ?>
    <div class="ctkiem_tdang_ban <?= ($han_su_dung != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $han_su_dung ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($han_su_dung != 0) ? 'active' : '' ?>">
            <? if ($han_su_dung != 0) {
                echo date('d-m-Y', strtotime($han_su_dung)); ?>
            <? } else { ?>
                Hạn sử dụng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 63) { ?>
    <!-- Vật tư y tế -->
    <div class="ctkiem_tdang_ban <?= ($loai_sanpham != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai_sanpham ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_sanpham != 0) ? 'active' : '' ?>">
            <? if ($loai_sanpham != 0) {
                $phongtam = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai_sanpham . "' ");
                $ten_loai = mysql_fetch_assoc($phongtam->result)['ten_loai'];
                echo $ten_loai; ?>
            <? } else { ?>
                Loại vật tư
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($hang_vattu != '') ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $hang_vattu ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($hang_vattu != '') ? 'active' : '' ?>">
            <? if ($hang_vattu != '') {
                echo date('d-m-Y', $hang_vattu); ?>
            <? } else { ?>
                Hãng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 108) { ?>
    <!-- Dụng cụ làm đẹp -->
    <div class="ctkiem_tdang_ban <?= ($loai_sanpham != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai_sanpham ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_sanpham != 0) ? 'active' : '' ?>">
            <? if ($loai_sanpham != 0) {
                $phongtam = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai_sanpham . "' ");
                $ten_loai = mysql_fetch_assoc($phongtam->result)['ten_loai'];
                echo $ten_loai; ?>
            <? } else { ?>
                Loại phụ kiện
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($hang != '') ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $hang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($hang != '') ? 'active' : '' ?>">
            <? if ($hang != '') {
                $hang_pk = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id` = '" . $hang . "' LIMIT 1 ");
                $ten_hang = mysql_fetch_assoc($hang_pk->result)['ten_hang'];
                echo $ten_hang; ?>
            <? } else { ?>
                Hãng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 109) { ?>
    <!-- Thực phẩm chức năng -->
    <div class="ctkiem_tdang_ban <?= ($loai_sanpham != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai_sanpham ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_sanpham != 0) ? 'active' : '' ?>">
            <? if ($loai_sanpham != 0) {
                $phongtam = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai_sanpham . "' ");
                $ten_loai = mysql_fetch_assoc($phongtam->result)['ten_loai'];
                echo $ten_loai; ?>
            <? } else { ?>
                Loại thực phẩm chức năng
            <? } ?>
        </p>
    </div>
    <div class="ctkiem_tdang_ban <?= ($han_su_dung != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $han_su_dung ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($han_su_dung != 0) ? 'active' : '' ?>">
            <? if ($han_su_dung != 0) {
                echo date('d-m-Y', strtotime($han_su_dung)); ?>
            <? } else { ?>
                Hạn sử dụng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 56) { ?>
    <div class="ctkiem_tdang_ban <?= ($loai_thiet_bi != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai_thiet_bi ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_thiet_bi != 0) ? 'active' : '' ?>">
            <? if ($loai_thiet_bi != 0) {
                $phongtam = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai_thiet_bi . "' ");
                $ten_loai = mysql_fetch_assoc($phongtam->result)['ten_loai'];
                echo $ten_loai; ?>
            <? } else { ?>
                Loại thiết bị
            <? } ?>
        </p>
    </div>
    <? if ($loai_thiet_bi != 0) {
        if ($loai_thiet_bi == 2103 || $loai_thiet_bi == 2105) { ?>
            <div class="ctkiem_tdang_ban <?= ($dung_tich != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $dung_tich ?>" data3="<?= $loai_thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($dung_tich != 0) ? 'active' : '' ?>">
                    <? if ($dung_tich != 0) {
                        $query_dtich = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE id_dl = '" . $dung_tich . "' LIMIT 1 ");
                        $ten_dl = mysql_fetch_assoc($query_dtich->result)['ten_dl'];
                        echo $ten_dl;
                    } else { ?>
                        Dung tích
                    <? } ?>
                </p>
            </div>
        <? };
        if ($loai_thiet_bi != 2107) { ?>
            <div class="ctkiem_tdang_ban <?= ($hang != '') ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $hang ?>" data3="<?= $loai_thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($hang != '') ? 'active' : '' ?>">
                    <? if ($hang != '') {
                        $hang_pk = new db_query("SELECT `id`,`ten_hang` FROM `hang` WHERE `id` = '" . $hang . "' LIMIT 1 ");
                        $ten_hang = mysql_fetch_assoc($hang_pk->result)['ten_hang'];
                        echo $ten_hang; ?>
                    <? } else { ?>
                        Hãng
                    <? } ?>
                </p>
            </div>
        <? };
        if ($loai_thiet_bi == 2104) { ?>
            <div class="ctkiem_tdang_ban <?= ($cong_suat != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $cong_suat ?>" data3="<?= $loai_thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($cong_suat != 0) ? 'active' : '' ?>">
                    <? if ($cong_suat != 0) {
                        $query_dtich = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE id_dl = '" . $cong_suat . "' LIMIT 1 ");
                        $ten_dl = mysql_fetch_assoc($query_dtich->result)['ten_dl'];
                        echo $ten_dl;
                    } else { ?>
                        Công suất
                    <? } ?>
                </p>
            </div>
        <? };
        if ($loai_thiet_bi == 2106) { ?>
            <div class="ctkiem_tdang_ban <?= ($khoi_luong != 0) ? 'active' : '' ?>" data="4" data1="<?= $tt_con ?>" data2="<?= $khoi_luong ?>" data3="<?= $loai_thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($khoi_luong != 0) ? 'active' : '' ?>">
                    <? if ($khoi_luong != 0) {
                        $query_dtich = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE id_dl = '" . $khoi_luong . "' LIMIT 1 ");
                        $ten_dl = mysql_fetch_assoc($query_dtich->result)['ten_dl'];
                        echo $ten_dl;
                    } else { ?>
                        Khối lượng giặt
                    <? } ?>
                </p>
            </div>
    <? }
    } ?>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } else if ($tt_con == 57 || $tt_con == 58 || $tt_con == 59) { ?>
    <div class="ctkiem_tdang_ban <?= ($loai_thiet_bi != 0) ? 'active' : '' ?>" data="1" data1="<?= $tt_con ?>" data2="<?= $loai_thiet_bi ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($loai_thiet_bi != 0) ? 'active' : '' ?>">
            <? if ($loai_thiet_bi != 0) {
                $phongtam = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai_thiet_bi . "' ");
                $ten_loai = mysql_fetch_assoc($phongtam->result)['ten_loai'];
                echo $ten_loai; ?>
            <? } else { ?>
                Loại thiết bị
            <? } ?>
        </p>
    </div>
    <? if ($loai_thiet_bi != 0 && $tt_con == 57) {
        if ($loai_thiet_bi != 37) { ?>
            <div class="ctkiem_tdang_ban <?= ($loai_sanpham != 0) ? 'active' : '' ?>" data="3" data1="<?= $tt_con ?>" data2="<?= $loai_sanpham ?>" data3="<?= $loai_thiet_bi ?>" onclick="laygia_tri(this)">
                <p class="tkiem_rkq <?= ($loai_sanpham != 0) ? 'active' : '' ?>">
                    <? if ($loai_sanpham != 0) {
                        $phongtam = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id` = '" . $loai_sanpham . "' ");
                        $ten_loai = mysql_fetch_assoc($phongtam->result)['ten_loai'];
                        echo $ten_loai; ?>
                    <? } else { ?>
                        Loại sản phẩm
                    <? } ?>
                </p>
            </div>
    <? };
    } ?>
    <div class="ctkiem_tdang_ban <?= ($tinh_trang != 0) ? 'active' : '' ?>" data="2" data1="<?= $tt_con ?>" data2="<?= $tinh_trang ?>" onclick="laygia_tri(this)">
        <p class="tkiem_rkq <?= ($tinh_trang != 0) ? 'active' : '' ?>">
            <? if ($tinh_trang != 0) {
                echo $arr_tinhtrang1[$tinh_trang]; ?>
            <? } else { ?>
                Tình trạng
            <? } ?>
        </p>
    </div>
<? } ?>