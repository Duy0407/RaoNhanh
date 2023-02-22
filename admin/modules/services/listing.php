<?
require_once("inc_security.php");

	//gọi class DataGird
	$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
	$list->quickEdit 	= false;
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
	$list->add("sev_name","Đường dẫn","string",0,0);
	$list->add("sev_date","Ngày tạo","date",1,0, 'width="100"');
	$list->add("sev_active", "Active", "checkbox", 1, 0);
	$list->add("",translate_text("Sửa"),"edit");
	$list->add("",translate_text("Xóa"),"delete");
	
	$list->ajaxedit($fs_table);
	
	$sql =	$list->sqlSearch() . $list->searchKeyword($field_name);
		
	$total			= new db_count("SELECT count(*) AS count 
											 FROM " . $fs_table . "
											 WHERE 1 " . $sql);
											 
	$db_listing = new db_query("SELECT * 
										 FROM " . $fs_table . "
										 WHERE 1 " . $sql . "
										 ORDER BY " . $list->sqlSort() . $field_id . " DESC
										 " . $list->limit($total->total));

	$total_row = mysql_num_rows($db_listing->result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
<?=$list->headerScript()?>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*---------Body------------*/ ?>
<div id="listing">
  <?=$list->showTable($db_listing,$total)?>
</div>
<? /*---------Body------------*/ ?>
</body>
</html>