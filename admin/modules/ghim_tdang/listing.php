<?php
require_once("inc_security.php");
include("../../functions/rewrite_functions.php");
//gọi class DataGird
$list = new fsDataGird($field_id, $field_name, translate_text("Listing"));
$iCat                = getValue("iCat");
$new_category_id   = array();
$class_menu         = new menu();
unset($class_menu);

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
$list->add("bg_id", "ID", "string", 1, 1, 'width="60"');
$list->add("bg_thoigian", translate_text("Loại tin"), "string", 0, 1);
$list->add("bg_dongia", translate_text("Đơn giá"), "string", 0, 0);
$list->add("bg_chietkhau", translate_text("Chiết khấu"), "string", 0, 0);
$list->add("bg_thanhtien", translate_text("Thành tiền"), "string", 0, 0);
$list->add("bg_vat", translate_text("Vat"), "string", 0, 0);
$list->add("bg_ttien_vat", translate_text("Tiền sau Vat"), "string", 0, 0);
$list->add("", translate_text("Sửa"), "edit");
$list->quickEdit    = false;
$list->ajaxedit($fs_table);

$sql =   $list->sqlSearch();
if ($iCat != 0) {
   $sql .= "AND cat_parent_id = " . $iCat . "";
}
$total      = new db_count("SELECT count(*) AS count  FROM " . $fs_table . " WHERE bg_type = 3 " . $sql);

$total_row = $total->total;

$db_listing = new db_query("SELECT *
									 FROM " . $fs_table . "
									 WHERE bg_type = 3 " . $sql . "
									 ORDER BY " . $list->sqlSort() . $field_id . " ASC " .
   $list->limit($total_row));

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
         <td align="center"><?= $row['bg_id'] ?></td>
         <td align="center"><a><?= $row['bg_thoigian'] ?></a></td>
         <td align="center"><?= number_format($row['bg_dongia']) . " VNĐ" ?></td>
         <td align="center"><?= number_format($row['bg_chietkhau']) . " %" ?></td>
         <td align="center"><?= number_format($row['bg_thanhtien']) . " VNĐ" ?></td>
         <td align="center"><?= number_format($row['bg_vat']) . " %" ?></td>
         <td align="center"><?= number_format($row['bg_ttien_vat']) . " VNĐ" ?></td>
         <?= $list->showEdit($row['bg_id']) ?>
         <?= $list->end_tr(); ?>
      <?
      }
      ?>
      <?= $list->showFooter($total_row) ?>
   </div>
</body>

</html>