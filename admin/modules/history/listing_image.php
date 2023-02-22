<?php
require_once("inc_security.php");

//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));

$new_category_id	= array();
$class_menu			= new menu();
$listAll				= $class_menu->getAllChild("categories_multi", "cat_id", "cat_parent_id", 0, "cat_type IN (".$cat_type_select.") AND lang_id = " . $lang_id, "cat_id,cat_name,cat_type", "cat_order ASC,cat_name ASC", "cat_has_child", 0);
unset($class_menu);
if($listAll != '') foreach($listAll as $key=>$row) $new_category_id[$row["cat_id"]] = $row["cat_name"];

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
$list->add("new_id","ID","string",1,1, 'width="60"');
$list->add($field_name, translate_text("Tiêu đề"), "string", 0, 1);
$list->add("new_picture", translate_text("Ảnh bài viết"), "string", 0, 1);
$list->add("",translate_text("Sửa"),"edit");

$list->quickEdit 	= false;
$list->ajaxedit($fs_table);

$sql =	$list->sqlSearch();

$total		= new db_count("SELECT count(*) AS count
									 FROM " . $fs_table . "
									 WHERE 1 " . $sql);

$total_row = $total->total;

$db_listing = new db_query("SELECT *
									 FROM " . $fs_table . "
									 WHERE 1 " . $sql . "
									 ORDER BY " . $list->sqlSort() . $field_id . " DESC " .
    $list->limit($total_row));

?>
<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?=$load_header?>
    <?=$list->headerScript()?>
</head>
<body>
<div id="listing">
    <?=$list->showHeader($total_row)?>
    <?
    $i=0;
    while($row = mysql_fetch_assoc($db_listing->result)){
        $i++;
        $urlNews = createLink('detail_news', $row);
        ?>
        <?=$list->start_tr($i, $row[$id_field]);?>
        <td><?=$row['new_id']?></td>
        <td><?=$row['new_title']?></td>
        <td align="center"><img src="<?=$fs_filepath . $row['new_picture']?>" alt="" width="100" height="100"></td>
        <?=$list->showEditPic($row['new_id'])?>
        <?=$list->end_tr();?>
        <?
    }
    ?>
    <?=$list->showFooter($total_row)?>
</div>
</body>
</html>