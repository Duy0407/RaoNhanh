<?
include("config.php");
$nhom = getValue("nhom", "int", "POST", '');
$nhom = (int)$nhom;

$id_dm = getValue("id_dm", "int", "POST", '');
$id_dm = (int)$id_dm;
?>


<?php if ($nhom != 2107) {
    $query = new db_query("SELECT * FROM hang WHERE id_parent=" . $nhom . "  and id_danhmuc=" . $id_dm . "");
    $hang = $query->result_array();
?>
    <div class="row-tin-dang box_input_infor">
        <p class="font-dam hd_font15-17">Hãng <span class="cl_red">*</span></p>
        <select class="slect-hang  hd_height36" name="hang">
            <option value="">Hãng</option>
            <?php foreach ($hang as $key => $value) : ?>
                <option value="<?= $value['id'] ?>"><?= $value['ten_hang'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
<?php } ?>

<?
if ($nhom == 2103 || $nhom == 2105) {
    $query = new db_query("SELECT * FROM dung_luong where id_cha=" . $nhom . " and id_danhmuc= " . $id_dm . " ");
    $dungtich = $query->result_array();
?>
    <div class="row-tin-dang box_input_infor">
        <p class="font-dam hd_font15-17">Dung tích</p>
        <select class="slect-hang  hd_height36" name="dungtich">
            <option value="">Dung tích</option>
            <?php foreach ($dungtich as $key => $value) : ?>
                <option value="<?= $value['id_dl'] ?>"><?= $value['ten_dl'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
<? } ?>

<?php if ($nhom == 2104) :
    $query = new db_query("SELECT * FROM dung_luong where id_cha=" . $nhom . " and id_danhmuc= " . $id_dm . " ");
    $congsuat = $query->result_array();
?>
    <div class="row-tin-dang">
        <p class="font-dam hd_font15-17">Công suất</p>
        <select class="slect-hang  hd_height36" name="cong_suat">
            <option value="">Công suất</option>
            <?php foreach ($congsuat as $key => $value) : ?>
                <option value="<?= $value['id_dl'] ?>"><?= $value['ten_dl'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
<?php endif ?>

<?php if ($nhom == 2106) :
    $query = new db_query("SELECT * FROM dung_luong where id_cha=" . $nhom . " and id_danhmuc= " . $id_dm . " ");
    $khoiluong = $query->result_array();
?>
    <div class="row-tin-dang">
        <p class="font-dam hd_font15-17">Khối lượng giặt</p>
        <select class="slect-hang  hd_height36" name="khoi_luong">
            <option value="">Khối lượng giặt</option>
            <?php foreach ($khoiluong as $key => $value) : ?>
                <option value="<?= $value['id_dl'] ?>"><?= $value['ten_dl'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="row-tin-dang">
        <p class="font-dam hd_font15-17">Loại máy giặt</p>
        <select class="slect-hang  hd_height36" name="loai_may_giat">
            <option value="">Loại máy giặt</option>
            <option value="1">Cửa trước</option>
            <option value="2">Cửa sau</option>
        </select>
    </div>
<?php endif ?>