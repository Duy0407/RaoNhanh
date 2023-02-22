<?
include("config.php");
$nhom = getValue("nhom", "int", "GET", 0);
$id_dm = getValue("id_dm", "int", "GET", 0);

if ($nhom != 2064) {
    $query = new db_query("SELECT `id`, `ten_hang` FROM hang WHERE id_parent=" . $nhom . "  and id_danhmuc=" . $id_dm . "");
    $thuonghieu = $query->result_array();
?>
    <div class="d_flex fl_cl box_input_infor w_100 b6_nl_title">
        <p class="b6_fr1_title p_400_s15_l18">Thương hiệu</p>
        <select class="b6_fr1_select slect-hang hd_height36 thuong_hieu" name="thuong_hieu">
            <option value="">Chọn</option>
            <? foreach ($thuonghieu as $key => $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['ten_hang'] ?></option>
            <? } ?>
        </select>
    </div>
<? }
if ($nhom == 2060) {
    $query = new db_query("SELECT `id`, `name` FROM nhom_sanpham_hinhdang WHERE id_cha=" . $nhom . "  and id_danhmuc=" . $id_dm . "");
    $hinhdang = $query->result_array();
?>
    <div class="d_flex fl_cl box_input_infor w_100 b6_nl_title">
        <p class="b6_fr1_title p_400_s15_l18">Hình dáng <span class="cl_red">*</span></p>
        <select class="b6_fr1_select slect-hang hd_height36 hinh_dang" name="hinh_dang">
            <option value="">Chọn</option>
            <? foreach ($hinhdang as $key => $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
            <? } ?>
        </select>
    </div>
<? } ?>