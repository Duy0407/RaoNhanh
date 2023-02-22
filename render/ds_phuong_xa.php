<?
include("config.php");
$quan_huyen = getValue('quan_huyen', 'int', 'POST', '');

?>

<option value="">Phường/xã</option>

<? if ($quan_huyen != "") {
    $ds_quanhuyen = new db_query("SELECT `id`, `name`, `prefix`, `province_id`, `district_id` FROM `phuong_xa` WHERE `district_id` = $quan_huyen ");
    while ($row_qh = mysql_fetch_assoc($ds_quanhuyen->result)) { ?>
        <option  value="<?= $row_qh['id'] ?>"><?= $row_qh['prefix'] ?> <?= $row_qh['name'] ?></option>

<? }
}
