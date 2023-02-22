<?php
require_once("inc_security.php");
include("../../functions/rewrite_functions.php");
//gọi class DataGird
$list = new fsDataGird($field_id, $field_name, translate_text("Listing"));
$iCat                = getValue("iCat");
$new_category_id   = array();
$class_menu         = new menu();
$listAll            = $class_menu->getAllChild("category", "cat_id", "cat_parent_id", 0, "1", "cat_id,cat_name,cat_type", "cat_order ASC,cat_name ASC", "cat_has_child", 0);
unset($class_menu);
if ($listAll != '') foreach ($listAll as $key => $row) $new_category_id[$row["cat_id"]] = $row["cat_name"];
$arrayCat = array(0 => translate_text("Category"));
$db_cateogry = new db_query("SELECT cat_type,cat_name,cat_id
									FROM category
									WHERE cat_parent_id = 0
									ORDER BY cat_type");
while ($row = mysql_fetch_array($db_cateogry->result)) {
   $arrayCat[$row["cat_id"]] = $row["cat_name"];
}
$startdate = getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate = getValue("enddate", "str", "GET", "dd/mm/yyyy");
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
$list->add("new_image", "Ảnh đại điện", "string", 1, 0, 'width="100"');
$list->add("new_id", "ID", "string", 1, 1, 'width="60"');
$list->add("usc_email", "Email user", "string", 1, 1, 'width="60"');
$list->add("new_title", translate_text("Tiêu đề"), "string", 0, 1);
$list->add("new_cate_id", translate_text("Danh mục"), "string", 0, 0);
$list->add("new_create_time", "Ngày đăng", "int", 1, 0, 'width="100"');
$list->add("new_active", "Active", "checkbox", 0, 0);
$list->add("", "Ghim", "edit");
$list->add("", "Đẩy tin", "int", 1, 0, 'width="100"');
$list->add("", translate_text("Sửa"), "edit");
$list->addSearch(translate_text("Danh mục"), "iCat", "array", $arrayCat, $iCat);
$list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
$list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
$list->quickEdit    = false;
$list->ajaxedit($fs_table);

$sql =   $list->sqlSearch();
if ($startdate != "dd/mm/yyyy") {
   $intdate = convertDateTime($startdate, "0:0:0");
   $sql .= " AND new_create_time >= " . $intdate;
}
if ($enddate != "dd/mm/yyyy") {
   $intdate = convertDateTime($enddate, "23:59:59");
   $sql .= " AND new_create_time <= " . $intdate;
}
if ($iCat != 0) {
   $sql .= "AND cat_parent_id = " . $iCat . "";
}
$total      = new db_count("SELECT count(*) AS count
									 FROM " . $fs_table . "
                            JOIN category ON new.new_cate_id = category.cat_id LEFT JOIN user ON new.new_user_id = user.usc_id
									 WHERE new_buy_sell = 2 " . $sql);

$total_row = $total->total;

$db_listing = new db_query("SELECT *
									 FROM " . $fs_table . "
                            JOIN category ON new.new_cate_id = category.cat_id LEFT JOIN user ON new.new_user_id = user.usc_id
									 WHERE new_buy_sell = 2 " . $sql . "
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
         $urlNews = 'http://raonhanh365.vn/' . replaceTitle($row['new_title']) . "-c" . $row['new_id'] . ".html";
      ?>
         <?= $list->start_tr($i, $row[$id_field]); ?>
         <td align="center">
            <?
            $imageproduct = explode(";", $row['new_image']);
            $path = $imageproduct[0];
            if ($row["new_image"] != "") {
            ?>
               <a target="_blank" onMouseOver="showtip('<img src=\'<?= $path ?>\' />')" onMouseOut="hidetip()">
                  <img src="<?= $path ?>" height="100" width="100" />
               </a>
            <?
            }
            ?>
         </td>
         <td align="center"><?= $row['new_id'] ?></td>
         <td align="center"><?= $row['usc_email'] ?></td>
         <td><a href="<?= $urlNews ?>" target="_blank"><?= $row['new_title'] ?></a></td>
         <td align="center"><?= $new_category_id[$row['new_cate_id']] ?></td>
         <td align="center"><?= getDateTime(1, 0, 1, 0, "", $row['new_create_time']) ?></td>
         <?= $list->showCheckbox("new_active", $row['new_active'], $row['new_id']) ?>
         <?= $list->showGhim($row['new_id']) ?>
         <td align="center"><a class="day_tin" data="<?= $row['new_id'] ?>" data1="<?= $row['new_user_id'] ?>" onclick="day_tin(this)">Đẩy tin</a></td>
         <?= $list->showEdit($row['new_id']) ?>
         <?= $list->end_tr(); ?>
      <?
      }
      ?>
      <?= $list->showFooter($total_row) ?>
   </div>
</body>
<script>
   function day_tin(id) {
      var new_id = $(id).attr("data");
      var us_id = $(id).attr("data1");
      $.ajax({
         url: '../new/day_tin.php',
         type: 'POST',
         dataType: 'json',
         data: {
            new_id: new_id,
            us_id: us_id,
         },
         success: function(data) {
            if (data.result == true) {
               window.location.href = data.data;
            }else if(data.result == false){
               alert(data.msg);
            }
         }
      })
   }
</script>

</html>