<?
include("config.php");
$id_dm = getValue('id_dm', 'int', 'POST', '');
$id_hang = getValue('id_hang', 'int', 'POST', '');
?>
<?php if ($id_dm != "" && $id_hang != ""): ?>
	<?php if ($id_dm==99): ?>
		<?php if ($id_hang != 1766 && $id_hang != 1774): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng </p>
			<?
			$list_dong = new db_query("SELECT `id`, `ten_dong` FROM `dong` WHERE `id_hang` = $id_hang AND `id_danhmuc` = $id_dm ");
			?>
		        <select name="dongmay" class="form-control share_select2 w_100">
		            <option value="">Dòng</option>
	            <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
	                <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_dong'] ?></option>
	            <? } ?>
		        </select>
		<?php endif ?>
		<?php if ($id_hang == 1766 || $id_hang == 1774): ?>
			<p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Dòng</p>
			<input type="text" name="dongmay" class="m_timkiem_input" autocomplete="off" placeholder="Nhập dòng máy">
		<?php endif ?>
	<?php endif ?>
<?php endif ?>