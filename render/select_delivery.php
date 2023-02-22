<?
include("config.php");
$id_lkp = getValue('id_lkp', 'int', 'POST', '');
$id_dm = getValue('id_dm', 'int', 'POST', '');
$id_loai = getValue('id_loai', 'int', 'POST', '');
// echo $id_dm . '_' . $id_lkp;
// die;

if ($id_dm != "" && $id_lkp != "") {
    $list_ktag_query = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent`= $id_lkp ");
    $list_ktag = $list_ktag_query->result_array();
    // phụ kiện
    if ($id_dm == 37) { ?>
        <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
            <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
            <? foreach ($list_ktag as $key => $province) { ?>
                <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
            <? } ?>
        </select>
        <?
    } else if ($id_dm == 99) {
        if ($id_lkp != 4345) { ?>
            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
            <select class="slect-hang hd_height36 chitiet_dm" name="chitiet_dm">
                <option disabled selected value="">Thêm chi tiết danh mục</option>
                <? foreach ($list_ktag as $key => $province) { ?>
                    <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
                <? } ?>
            </select>
        <? }
    }
    // tivi, loa, amply
    else if ($id_dm == 36) { ?>
        <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
            <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
            <? foreach ($list_ktag as $key => $province) { ?>
                <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
            <? } ?>
        </select>
        <? }
    //
    else if ($id_dm == 56) {
        if ($id_lkp != 2107) { ?>
            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
            <select class="slect-hang hd_height36 chitiet_dm" name="chitiet_dm">
                <option value="">Thêm chi tiết danh mục</option>
                <? foreach ($list_ktag as $key => $province) { ?>
                    <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
                <? } ?>
            </select>
        <? }
    } else if ($id_dm == 57) {
        if ($id_lkp != 37) { ?>
            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
            <select class="slect-hang hd_height36 chitiet_dm" name="chitiet_dm">
                <option value="">Thêm chi tiết danh mục</option>
                <? foreach ($list_ktag as $key => $province) { ?>
                    <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
                <? } ?>
            </select>
        <? }
    } else if ($id_dm == 58) {
        if ($id_lkp != 43) { ?>
            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
            <select class="slect-hang hd_height36 chitiet_dm" name="chitiet_dm">
                <option value="">Thêm chi tiết danh mục</option>
                <? foreach ($list_ktag as $key => $province) { ?>
                    <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
                <? } ?>
            </select>
        <? }
    } else if ($id_dm == 59) { ?>
        <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
        <select class="slect-hang hd_height36 chitiet_dm" name="chitiet_dm">
            <option value="">Thêm chi tiết danh mục</option>
            <? foreach ($list_ktag as $key => $province) { ?>
                <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
            <? } ?>
        </select>
        <?
        // ngoại thất
    } else if ($id_dm == 118) {
        if ($id_lkp != 2093) { ?>
            <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
                <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
                <? foreach ($list_ktag as $key => $province) { ?>
                    <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
                <? } ?>
            </select>
        <? }
    }
    // nội thất phòng ngủ
    else if ($id_dm == 79) {
        if ($id_lkp != 16 && $id_lkp != 11 && $id_lkp != 14) { ?>
            <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
                <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
                <? foreach ($list_ktag as $key => $province) { ?>
                    <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
                <? } ?>
            </select>
        <? }
    }
    // nội thất văn phòng
    else if ($id_dm == 82) {
        if ($id_lkp != 30) { ?>
            <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
                <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
                <? foreach ($list_ktag as $key => $province) { ?>
                    <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
                <? } ?>
            </select>
        <? }
    }
    // nội thất phòng bếp
    else if ($id_dm == 80) {
        if ($id_lkp != 20) { ?>
            <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
                <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
                <? foreach ($list_ktag as $key => $province) { ?>
                    <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
                <? } ?>
            </select>
        <? }
    }
    // nội thất phòng tắm
    else if ($id_dm == 81) {
        if ($id_lkp != 2064) { ?>
            <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
                <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
                <? foreach ($list_ktag as $key => $province) { ?>
                    <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
                <? } ?>
            </select>
        <? }
    }
    // nội thất phòng khách
    else if ($id_dm == 78) {
        if ($id_lkp != 4 && $id_lkp != 6 && $id_lkp != 7) { ?>
            <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
                <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
                <? foreach ($list_ktag as $key => $province) { ?>
                    <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
                <? } ?>
            </select>
        <? }
    }
    // đồ điện tử linh kiện
    else if ($id_dm == 124) { ?>
        <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
            <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
            <? foreach ($list_ktag as $key => $province) { ?>
                <option value="<?= $province['tags_id'] ?>"><?= $province['ten_tags'] ?></option>';
            <? } ?>
        </select>
<? }
} ?>