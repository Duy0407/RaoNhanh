<?php

require_once("inc_security.php");
include("../../functions/rewrite_functions.php");
require_once('../../../classes/PHPExcel.php');
//gọi class DataGird
$van_de_tk		 			= getValue("van_de_tk");
$startdate      = getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate         = getValue("enddate", "str", "GET", "dd/mm/yyyy");
$list = new fsDataGird($field_id, $field_name, translate_text("Listing"));

$arr_vde = array(
	0 => 'Vấn đề',
	1 => 'Lừa đảo',
	2 => 'Trùng lặp',
	3 => 'Đã bán',
	4 => 'Không liên lạc được',
	5 => 'Thông tin không đúng thực tế',
	6 => 'Hư hỏng sau khi mua',
);
/*
1: Ten truong trong bang
2: Tieu de header
3: kieu du lieu ( vnd 	: kiểu tiền VNĐ, usd : kiểu USD, date : kiểu ngày tháng, picture : kiểu hình ảnh,
				array : kiểu combobox có thể edit, arraytext : kiểu combobox ko edit,
				copy : kieu copy, checkbox : kieu check box, edit : kiểu edit, delete : kiểu delete, string : kiểu text có thể edit,
				number : kiểu số, text : kiểu text không edit
4: co sap xep hay khong, co thi de la 1, khong thi de la 0
5: co tim kiem hay khong, co thi de la 1, khong thi de la 0
*/
//$list->add("thi_picture","Image","picture",0,0);
// $list->add("usc_logo", "Ảnh đại điện", "string", 1, 0, 'width="100"');
$list->add("usc_id", "ID người báo cáo", "string", 1, 1, 'width="60"');
$list->add("usc_name", "Tên người báo cáo", "string", 0, 1);
$list->add("new_id", "ID tin báo cáo", "int", 0, 1);
$list->add("van_de", "Vấn đề báo cáo", "string", 0, 0);
$list->add("mo_ta", "Mô tả báo cáo", "string", 0, 0);
$list->add("tgian_baocao", "Thời gian báo cáo", "string", 1, 0);
// $list->add("", 'Ghim', "edit");
$list->add("", translate_text("Sửa"), "edit");
$list->quickEdit    = false;
$list->ajaxedit($fs_table);
$list->addSearch(translate_text("Vấn đề"), "van_de_tk", "array", $arr_vde, "--Chọn danh mục--");
$list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
$list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");

$sql =   $list->sqlSearch();
if ($startdate != "dd/mm/yyyy") {
	$intdate      =   convertDateTime($startdate, "0:0:0");
	$sql         .= " AND tgian_baocao >= " . $intdate;
}
if ($enddate != "dd/mm/yyyy") {
	$intdate      =   convertDateTime($enddate, "23:59:59");
	$sql         .= " AND tgian_baocao <= " . $intdate;
}

if ($van_de_tk != "") {
	$sql         .= " AND van_de = " . $van_de_tk;
}
$total      = new db_count("SELECT count(*) AS count FROM " . $fs_table ." INNER JOIN `user` ON " . $fs_table . ".`user_baocao` = `user`.`usc_id` WHERE 1" . $sql);

$total_row = $total->total;

$db_listing = new db_query("SELECT * FROM " . $fs_table ." INNER JOIN `user` ON " . $fs_table . ".`user_baocao` = `user`.`usc_id`
							WHERE 1 " . $sql . " ORDER BY " . $list->sqlSort() . $field_id . " DESC " . $list->limit($total_row));



?>
<!DOCTYPE html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<?= $load_header ?>
	<?= $list->headerScript() ?>
</head>

<body>
	<div id="listing">
		<?= $list->showHeader($total_row) ?>
		<?
		$i = 0;
		while ($row = mysql_fetch_assoc($db_listing->result)) {
			$i++;
		?>
			<?= $list->start_tr($i, $row[$id_field]); ?>
			<td align="center" width="100"><?= $row['user_baocao'] ?></td>
			<td width="100" align="center"><?= $row['usc_name'] ?></td>
			<td width="300" align="center"><?= $row['new_baocao'] ?></td>
			<td width="200" align="center"><?= $arr_vde[$row['van_de']] ?></td>
			<td align="center"><?= $row['mo_ta'] ?></td>
			<td align="center"><?= date("d/m/Y h:i:s", $row['tgian_baocao']) ?></td>
			<?= $list->showCheckbox("da_xuly", $row['da_xuly'], $row['id']) ?>
			<?= $list->end_tr(); ?>
		<?
		}
		?>
		<?= $list->showFooter($total_row) ?>
	</div>
</body>

</html>