<?
include("config.php");
$tinh_tp = getValue('tinh_tp', 'int', 'POST', ''); 
?>

<option value="">Quận/huyện</option>

<? if ($tinh_tp != "") {
    $ds_quanhuyen = new db_query("SELECT `cit_id`, `cit_name` FROM `city2` WHERE `cit_parent` = $tinh_tp ");
    while ($row_qh = mysql_fetch_assoc($ds_quanhuyen->result)) { ?>
        <option  value="<?= $row_qh['cit_id'] ?>"><?= $row_qh['cit_name'] ?></option>

<? }}?>