<?
include("config.php");
$nhom = getValue('nhom', 'int', 'POST', '');
$nhom = (int)$nhom;

$id_dm = getValue('id_dm', 'int', 'POST', '');
$id_dm = (int)$id_dm;

if ($nhom != 37 && $nhom != "" && $id_dm != "") {
    $query = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` where `id_cha` = $nhom AND `id_danhmuc` = $id_dm ");
    $loai = $query->result_array();
?>
    <p class="b6_lhinh_txt p_400_s15_l18">
        Loại sản phẩm <span class="cl_red">*</span>
    </p>
    <select class="slect-hang hd_height36 b6_lhinh_select loai_san_pham" name="loai_san_pham">
        <option value="">Loại sản phẩm</option>
        <?php foreach ($loai as $key => $value) : ?>
            <option value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
        <?php endforeach ?>
    </select>
<? } ?>