<?
include("config.php");
$nhom = getValue("nhom", "int", "GET", '');
$nhom = (int)$nhom;

$id_dm = getValue("id_dm", "int", "GET", '');
$id_dm = (int)$id_dm;
if ($nhom == 8 || $nhom == 9 || $nhom == 12 || $nhom == 13 || $nhom == 14 || $nhom == 15) {
    $query = new db_query("SELECT `id`, `ten_loai` FROM loai_chung where id_cha=" . $nhom . " and id_danhmuc= " . $id_dm . " ");
    $loai = $query->result_array();
?>
    <div class="d_flex fl_cl box_input_infor w_100 b6_nl_title">
        <p class="b6_fr1_title p_400_s15_l18">Loại sản phẩm <span class="cl_red">*</span></p>
        <select class="b6_fr1_select slect-hang hd_height36 loai_sanpham" name="loai_sanpham">
            <option value="">Chọn</option>
            <? foreach ($loai as $key => $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
            <? } ?>
        </select>
    </div>
<? }
if ($nhom == 8 || $nhom == 9 || $nhom == 11 || $nhom == 12 || $nhom == 13) {
    $query = new db_query("SELECT `id`, `name` FROM nhom_sanpham_chatlieu WHERE id_cha=" . $nhom . "  and id_danhmuc=" . $id_dm . "");
    $chat = $query->result_array();
?>
    <div class="d_flex fl_cl box_input_infor w_100 b6_nl_title">
        <p class="b6_fr1_title p_400_s15_l18">Chất liệu <span class="cl_red">*</span></p>
        <select class="b6_fr1_select slect-hang hd_height36 chat_lieu" name="chat_lieu">
            <option value="">Chọn</option>
            <? foreach ($chat as $key => $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
            <? } ?>
        </select>
    </div>
<? }
if ($nhom == 14) {
    $query = new db_query("SELECT `id`, `name` FROM nhom_sanpham_hinhdang WHERE id_cha = " . $nhom . "  AND id_danhmuc = " . $id_dm . " ");
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
<? }
if ($nhom == 10) {
    $query = new db_query("SELECT `id`, `ten_loai` FROM loai_chung where id_cha=" . $nhom . " and id_danhmuc= " . $id_dm . " ");  ?>
    <div class="d_flex fl_cl box_input_infor w_100 b6_nl_title">
        <p class="b6_fr1_title p_400_s15_l18">Kích cỡ</p>
        <select class="b6_fr1_select slect-hang hd_height36 kich_co" name="kich_co">
            <option value="">Chọn</option>
            <? while ($row_td = mysql_fetch_assoc($query->result)) { ?>
                <option value="<?= $row_td['id'] ?>"><?= $row_td['ten_loai'] ?></option>
            <? } ?>
        </select>
    </div>
<? } ?>