<?php
require_once("inc_security.php");
include("../../functions/rewrite_functions.php");
require_once('../../../classes/PHPExcel.php');
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
$list->add("usc_logo", "Ảnh đại điện", "string", 1, 0, 'width="100"');
$list->add("usc_id", "ID", "string", 1, 1, 'width="60"');
$list->add("usc_name", "Tên người dùng", "string", 0, 1);
$list->add("usc_phone", "Số điện thoại", "string", 1, 1);
$list->add("usc_time", "Thời gian đăng ký", "int", 1, 0);
$list->add("usc_money", "Số tiền", "string", 1, 0);
$list->add("", translate_text("Sửa"), "edit");
$list->quickEdit    = false;
$list->ajaxedit($fs_table);
$list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
$list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
$sql =   $list->sqlSearch();
if ($startdate != "dd/mm/yyyy") {
   $intdate      =   convertDateTime($startdate, "0:0:0");
   $sql         .= " AND usc_time >= " . $intdate;
}
if ($enddate != "dd/mm/yyyy") {
   $intdate      =   convertDateTime($enddate, "23:59:59");
   $sql         .= " AND usc_time <= " . $intdate;
}
$total      = new db_count("SELECT count(*) AS count
									 FROM " . $fs_table . "
									 WHERE 1 " . $sql);

$total_row = $total->total;

$db_listing = new db_query("SELECT *
									 FROM " . $fs_table . "
									 WHERE 1  " . $sql . "
									 ORDER BY " . $list->sqlSort() . $field_id . " DESC " .
   $list->limit($total_row));
$db_full = new db_query("SELECT *
								 FROM " . $fs_table . "
								 WHERE 1  " . $sql . "
								 ORDER BY " . $list->sqlSort() . $field_id . " DESC ");
$xuatex = getValue("postexcel", "str", "POST", "");
if ($xuatex != "") {
   $objPHPExcel = new PHPExcel();

   $objPHPExcel->setActiveSheetIndex(0)
      ->setCellValue('A1', 'Tên người dùng')
      ->setCellValue('B1', 'Tên đăng nhập')
      ->setCellValue('C1', 'Số điện thoại')
      ->setCellValue('D1', 'Email')
      ->setCellValue('E1', 'Ngày đăng ký');
   while ($rowx = mysql_fetch_assoc($db_full->result)) {
      $listsss =
         array(
            'name' => $rowx['usc_name'],
            'usc_name' => $rowx['usc_account'],
            'email' => $rowx['usc_email'],
            'phone' => $rowx['usc_phone'],
            'time'  => date("d/m/Y", $rowx['usc_time']),
         );
      $lists[]   =   $listsss;
   }
   //set gia tri cho cac cot du lieu
   $i = 2;
   foreach ($lists as $row2) {
      $objPHPExcel->setActiveSheetIndex(0)
         ->setCellValue('A' . $i, $row2['name'])
         ->setCellValue('B' . $i, $row2['usc_name'])
         ->setCellValue('C' . $i, $row2['email'])
         ->setCellValue('D' . $i, $row2['phone'])
         ->setCellValue('E' . $i, $row2['time']);
      $i++;
   }
   //ghi du lieu vao file,định dạng file excel 2007
   $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
   $full_path = 'data_raonhanh.xlsx'; //duong dan file
   $objWriter->save($full_path);
   header("Content-Type: application/octet-stream");
   header("Content-Disposition: attachment; filename=data_raonhanh.xlsx");
   readfile("https://raonhanh365.vn/admin/modules/user/data_raonhanh.xlsx");
}
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
      <form method="post" name="form_ab">
         <input type="submit" name="postexcel" class="bottom" style="float: left !important;margin-left: 13px !important;margin: 3px 13px 8px;" value="Xuất Excel" />
      </form>
      <?
      $i = 0;
      while ($row = mysql_fetch_assoc($db_listing->result)) {
         $i++;
      ?>
         <? $path = str_replace("../", "/", $row['usc_logo']); ?>
         <?= $list->start_tr($i, $row[$id_field]); ?>
         <td align="center" width="100">
            <? if ($row["usc_logo"] != "") { ?>
               <a target="_blank" onMouseOver="showtip('<img src=\'<?= $path ?>\' />')" onMouseOut="hidetip()">
                  <img src="<?= $path ?>" height="50" width="50" />
               </a>
            <?   } else {  ?>
               <a target="_blank" onMouseOver="showtip('<img src=\'../../../images/no_avatar.png\' />')" onMouseOut="hidetip()">
                  <img src="../../../images/no_avatar.png" height="50" width="50" />
               </a>
            <? } ?>
         </td>
         <td width="100" align="center"><?= $row['usc_id'] ?></td>
         <td width="300" align="center"><a><?= $row['usc_name'] ?></a></td>
         <td align="center"><?= $row['usc_phone'] != 0 ? $row['usc_phone'] : 'Chưa cập nhật' ?></td>
         <td align="center"><?= date("d/m/Y h:i:s", $row['usc_time']) ?></td>
         <td align="center"><?= number_format($row['usc_money']) . " VNĐ" ?></td>
         <?= $list->showEdit($row['usc_id']) ?>
         <?= $list->end_tr(); ?>
      <?
      }
      ?>
      <?= $list->showFooter($total_row) ?>
   </div>
</body>

</html>