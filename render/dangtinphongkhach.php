<?
include("config.php");
$nhom = getValue('nhom', 'int', 'POST', '');
$id_dm = getValue('id_dm', 'int', 'POST', '');

if ($nhom == 2 || $nhom == 3 || $nhom == 5) {
    $query = new db_query("SELECT `id`, `ten_loai` FROM loai_chung WHERE id_cha=" . $nhom . " AND id_danhmuc= " . $id_dm . " ");
    $loai = $query->result_array();
?>
    <div class="d_flex fl_cl box_input_infor w_100 b6_nl_title">
        <p class="b6_fr1_title p_400_s15_l18">Loại sản phẩm <span class="cl_red">*</span></p>
        <select class="b6_fr1_select slect-hang hd_height36 loai_sanpham" name="loai_sanpham">
            <option disabled selected value="">Chọn</option>
            <? foreach ($loai as $key => $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
            <? } ?>
        </select>
    </div>
<? }
if ($nhom != 5) {
    $query = new db_query("SELECT `id`, `name` FROM nhom_sanpham_chatlieu WHERE id_cha=" . $nhom . "  AND id_danhmuc=" . $id_dm . "");
    $chat = $query->result_array(); ?>
    <div class="d_flex fl_cl box_input_infor w_100 b6_nl_title">
        <p class="b6_fr1_title p_400_s15_l18">Chất liệu <span class="cl_red">*</span></p>
        <select class="b6_fr1_select slect-hang hd_height36 chat_lieu" name="chat_lieu">
            <option disabled selected value="">Chọn</option>
            <? foreach ($chat as $key => $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
            <? } ?>
        </select>
    </div>
<? } ?>