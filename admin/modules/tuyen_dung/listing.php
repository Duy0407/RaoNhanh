<?php
require_once("inc_security.php");
include("../../functions/rewrite_functions.php");
//gọi class DataGird
$startdate      = getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate         = getValue("enddate", "str", "GET", "dd/mm/yyyy");
$list = new fsDataGird($field_id, $field_name, translate_text("Listing"));

$iCit                = getValue("iCit");
$new_category_id   = array();
$class_menu         = new menu();
$listAll            = $class_menu->getAllChild("category", "cat_id", "cat_parent_id", 0, "1", "cat_id,cat_name,cat_type", "cat_order ASC,cat_name ASC", "cat_has_child", 0);
unset($class_menu);
// if($listAll != '') foreach($listAll as $key=>$row) $new_category_id[$row["cat_id"]] = $row["cat_name"];
// $arrayCit = array(0=>translate_text("city2"));
// $db_city = new db_query("SELECT cit_id,cit_name
// 									FROM city2
// 									WHERE cit_parent = 0
// 									ORDER BY cit_id");
// while($row = mysql_fetch_array($db_city->result)){
// 	$arrayCit[$row["cit_id"]] = $row["cit_name"];
// }

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
$list->add("new_image", "Ảnh bài viết", "string", 1, 0, 'width="100"');
$list->add("new_id", "ID", "string", 1, 1, 'width="60"');
$list->add("new_title", translate_text("Tiêu đề"), "string", 0, 1);
$list->add("new_city", "Tỉnh / thành", "string", 0, 0);
$list->add("new_update_time", "Ngày đăng", "int", 1, 0, 'width="100"');
// $list->add("",translate_text("Sửa"),"edit");
// $list->addSearch(translate_text("Tỉnh thành"),"iCit","array",$arrayCat,$iCat);
$list->quickEdit    = false;
$list->ajaxedit($fs_table);

$list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
$list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");

$sql =   $list->sqlSearch();

if ($startdate != "dd/mm/yyyy") {
   $intdate      =   convertDateTime($startdate, "0:0:0");
   $sql         .= " AND new_update_time >= " . $intdate;
}
if ($enddate != "dd/mm/yyyy") {
   $intdate      =   convertDateTime($enddate, "23:59:59");
   $sql         .= " AND new_update_time <= " . $intdate;
}
// if($iCat != 0)
// {
//    $sql .= "AND new_city = ".$iCat."";
// }
$total      = new db_count("SELECT count(*) AS count
									 FROM " . $fs_table . "
                            JOIN city2 ON new.new_city = city2.cit_id
									 WHERE new_cate_id = 120 " . $sql);

$total_row = $total->total;

$db_listing = new db_query("SELECT *
									 FROM " . $fs_table . "
                            JOIN city2 ON new.new_city = city2.cit_id
									 WHERE new_cate_id = 120 " . $sql . "
									 ORDER BY " . $list->sqlSort() . $field_id . " DESC " .
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
         //$urlNews = createLink('detail_news', $row);
         $urlNews = 'http://dev5.tinnhanh365.vn/'.replaceTitle($row['link_title'])."-c".$row['new_id'].".html";
      ?>
         <?= $list->start_tr($i, $row[$id_field]); ?>
         <td align="center">
            <?
            $new_images = explode(';', $row['new_image']);
            $path = str_replace("../", "/", $new_images[0]);
            if ($row["new_image"] != "") {
            ?>
               <a target="_blank" onMouseOver="showtip('<img src='<?= $path ?>' />')" onMouseOut="hidetip()">
                  <img src="<?= $path ?>" height="100" width="100" />
               </a>
            <?
            }
            ?>
         </td>
         <td align="center"><?= $row['new_id'] ?></td>
         <td><a href="/<?= replaceTitle($row['link_title']) ?>-c<?= $row['new_id'] ?>.html" target="_blank"><?= $row['new_title'] ?></a></td>
         <td align="center"><?= $row['new_city'] ?></td>
         <td align="center"><?= getDateTime(1, 0, 1, 0, "", $row['new_update_time']) ?></td>

         <?= $list->end_tr(); ?>
      <?
      }
      ?>
      <?= $list->showFooter($total_row) ?>
   </div>
</body>

</html>