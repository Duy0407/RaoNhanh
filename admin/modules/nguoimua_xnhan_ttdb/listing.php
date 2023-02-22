<?php
require_once("inc_security.php");
include("../../functions/rewrite_functions.php");
//gọi class DataGird
$startdate      = getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate         = getValue("enddate", "str", "GET", "dd/mm/yyyy");
$list = new fsDataGird($field_id, $field_name, translate_text("Listing"));
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
$list->add("dh_id", "ID", "string", 1, 0, 'width="60"');
$list->add("usc_name", "Tên tài khoản người mua", "string", 0, 1);
$list->add("id_nguoi_dh", "ID tài khoản", "string", 0, 1);
$list->add("id_nguoi_ban", "Tên người bán", "string", 1, 0);
$list->add("loai_ttoan", "Loại thanh toán", "string", 0, 0);
$list->add("tien_ttoan", "Tiền thanh toán", "string", 0, 0);
$list->add("tgian_xacnhan", "Thời gian", "string", 1, 0);
$list->add("dh_active", "Active", "checkbox", 0, 0);
$list->quickEdit    = false;
$list->ajaxedit($fs_table);
$list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
$list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
$sql =   $list->sqlSearch();
if ($startdate != "dd/mm/yyyy") {
   $intdate      =   convertDateTime($startdate, "0:0:0");
   $sql         .= " AND tgian_xacnhan >= " . $intdate;
}
if ($enddate != "dd/mm/yyyy") {
   $intdate      =   convertDateTime($enddate, "23:59:59");
   $sql         .= " AND tgian_xacnhan <= " . $intdate;
}
$total      = new db_count("SELECT count(*) AS count
									 FROM " . $fs_table ." INNER JOIN user ON " . $fs_table . ".id_nguoi_dh = user.usc_id
                           INNER JOIN new ON " . $fs_table . ".id_spham = new.new_id
									 WHERE 1 " . $sql);

$total_row = $total->total;

$db_listing = new db_query("SELECT `dh_id`, `id_nguoi_dh`, `id_nguoi_ban`, `id_spham`, `loai_ttoan`, `tien_ttoan`, `tgian_xacnhan`, `dh_active`, `usc_name`,
                           `new_unit` FROM " . $fs_table . "
                           INNER JOIN user ON " . $fs_table . ".id_nguoi_dh = user.usc_id
                           INNER JOIN new ON " . $fs_table . ".id_spham = new.new_id
                           WHERE 1 " . $sql . "
                           ORDER BY " . $list->sqlSort() . $field_id . " DESC " .
   $list->limit($total_row));
$arr_tien = array(
   '1' => 'VNĐ',
   '2' => 'USD',
   '3' => 'EURO',
);
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
         $nguoi_ban = new db_query("SELECT `usc_name` FROM `user` WHERE `usc_id` = '" . $row['id_nguoi_ban'] . "' ");
         $ten_nban = mysql_fetch_assoc($nguoi_ban->result)['usc_name'];
         $i++;
      ?>
         <?= $list->start_tr($i, $row[$id_field]); ?>
         <td width="100" align="center"><?= $row['dh_id'] ?></td>
         <td width="150" align="center"><a><?= $row['usc_name'] ?></a></td>
         <td width="150" align="center"><a><?= $row['id_nguoi_dh'] ?></a></td>
         <td align="center"><?= $ten_nban ?></td>
         <td align="center"><?= ($row['loai_ttoan'] == 1) ? 'thanh toán toàn bộ' : 'đặt cọc 10%' ?></td>
         <td align="center"><?= number_format($row['tien_ttoan']) ?> <?= $arr_tien[$row['new_unit']] ?></td>
         <td align="center"><?= date("d/m/Y", $row['tgian_xacnhan']) ?></td>
         <?= $list->showCheckbox("dh_active", $row['dh_active'], $row['dh_id']) ?>
         <?= $list->end_tr(); ?>
      <?
      }
      ?>
      <?= $list->showFooter($total_row) ?>
   </div>
</body>

</html>