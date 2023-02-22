<?
include("config.php");
$id_lkp = getValue('id_lkp', 'int', 'POST', '');
$id_dm = getValue('id_dm', 'int', 'POST', '');

if ($id_dm != "" && $id_lkp != "") {
    if ($id_lkp != 4340) {
        $query = new db_query("SELECT * FROM `nhom_sanpham_chatlieu` where `id_cha` = $id_lkp AND `id_danhmuc` = $id_dm ");
        $tb = $query->result_array();
?>
        <p class="font-dam hd_font15-17">Thiết bị <span class="color_red">*</span></p>
        <select name="thietbi1" class="slect-thietbi slect-thietbi-m-anh hd_height36">
            <option value="">Thiết bị</option>
            <?php foreach ($tb as $key => $value) : ?>
                <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
            <?php endforeach ?>
        </select>
<? }
} ?>