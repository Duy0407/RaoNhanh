<?
include("config.php");
$id_dm  = getValue('id_dm', 'int', 'POST', '');
$id_tbi = getValue('id_tbi', 'int', 'POST', '');
if ($id_tbi != "") {
	$query = new db_query("SELECT `id`, `ten_hang`  FROM `hang` WHERE `id_danhmuc` = $id_dm and `id_parent`= $id_tbi ");
	if ($id_tbi != 4345) { ?>
		<p class="font-dam hd_font15-17">Hãng <span class="color_red">*</span></p>
		<select name="hang_tb" class="slect-hang slect-hang-tbtm hd_height36 choose hang_tb" data="<?= $id_dm ?>" onchange="hang_doi(this)">
			<option disabled selected value="">Hãng</option>
			<? while ($row_hang = mysql_fetch_assoc($query->result)) { ?>
				<option value="<?= $row_hang['id'] ?>"><?= $row_hang['ten_hang'] ?></option>
			<? } ?>
		</select>
	<? } else { ?>
		<p class="b9_fr2_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
		<input type="text" name="hang_tb" class="b3_fr1_input p_400_s14_l17 hang_tb" placeholder="Nhập hãng" autocomplete="off">
<? }
} ?>