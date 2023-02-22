<?php
require_once("inc_security.php");

#+
#+ Kiem tra quyen them sua xoa
checkAddEdit("add");
function removeTitle($string, $keyReplace)
{
	$string		= html_entity_decode($string, ENT_COMPAT, 'UTF-8');
	$string		= mb_strtolower($string, 'UTF-8');
	$string		= removeAccent($string);
	//neu muon de co dau
	//$string 	=  trim(preg_replace("/[^A-Za-z0-9àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸ]/i"," ",$string));

	$string 	= trim(preg_replace("/[^A-Za-z0-9]/i", " ", $string)); // khong dau
	$string 	= str_replace(" ", "-", $string);
	$string		= str_replace("--", "-", $string);
	$string		= str_replace("--", "-", $string);
	$string		= str_replace("--", "-", $string);
	$string		= str_replace($keyReplace, "-", $string);
	return $string;
}
#+
#+ Khai bao bien
$add				= "add.php";
$listing			= "listing.php";
$edit				= "edit.php";
$after_save_data	= getValue("after_save_data", "str", "POST", $listing);

$errorMsg 			= "";		//Warning Error!
$action				= getValue("action", "str", "POST", "");
$fs_action			= getURL();
$record_id			= getValue("record_id");

$admin_id         = getValue("admin_id", "int", "SESSION");

$new_strdate		= getValue("new_strdate", "str", "POST", date("d/m/Y"));
$new_strtime		= getValue("new_strtime", "str", "POST", date("H:i:s"));
$new_date_last_edit    = convertDateTime($new_strdate, $new_strtime);

$new_strdateht		= getValue("new_strdateht", "str", "POST", date("d/m/Y"));
$new_strtimeht		= getValue("new_strtimeht", "str", "POST", date("H:i:s"));
$new_hantuyen		= convertDateTime($new_strdateht, $new_strtimeht);

#+
$new_title_rewrite 	= getValue("new_title_rewrite", "str", "POST", "");
if ($new_title_rewrite == '') {
	$new_title_rewrite 	= removeTitle(getValue("new_title", "str", "POST", ""), '/');
	$new_title_rewrite 	= strtolower($new_title_rewrite);
} // End if($new_title_rewrite == ''){

$new_category_id  = getValue("new_category_id", "int", "POST", 0);
//Lay loai modul
$queryCat   = "SELECT * FROM categories_multi WHERE cat_id = " . intval($new_category_id);
$dbCat      = new db_query($queryCat);
$new_module_id = 1;

if ($row = mysql_fetch_assoc($dbCat->result)) {
	$new_module_id = $row['cat_type'];
}
#+
#+ Goi class generate form
$myform = new generate_form();	//Call Class generate_form();
$myform->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table);	// Add table
#+
#+ Khai bao thong tin cac truong
$myform->add("bg_thoigian", "bg_thoigian", 0, 0, "", 1, "Bạn chưa nhập tiêu đề tin", 0, "");
$myform->add("bg_dongia", "bg_dongia", 0, 0, "", 1, "Bạn chưa nhập giá", 0, "");
$myform->add("bg_chietkhau", "bg_chietkhau", 0, 0, "", 0, "Bạn chưa nhập chiết khấu", 0, "");
$myform->add("bg_thanhtien", "bg_thanhtien", 0, 0, "", 1, "Bạn chưa thành tiền", 0, "");
$myform->add("bg_vat", "bg_vat", 0, 0, "", 0, "Bạn chưa nhập vat", 0, "");
$myform->add("bg_ttien_vat", "bg_ttien_vat", 0, 0, "", 1, "Bạn chưa nhập giá sau vat", 0, "");
#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();

#+
#+ Neu nhu co submit form
if ($action == "submitForm") {

	#+
	#+ Kiểm tra lỗi
	$errorMsg .= $myform->checkdata();
	$errorMsg .= $myform->strErrorField;	//Check Error!

	if ($errorMsg == "") {

		#+
		#+ Thuc hien query
		$query = $myform->generate_update_SQL($field_id, $record_id);
		$db_ex = new db_execute($query);

		$fs_redirect 	= $after_save_data . "?record_id=" . $record_id;
		redirect($fs_redirect);
		exit();
	}
}

#+
#+ Khai bao ten form
$myform->addFormname("submitForm"); //add  tên form để javacheck
#+
#+ Xử lý javascript
$myform->addjavasrciptcode('');
$myform->checkjavascript();


#+
#+ lay du lieu cua record can sua doi
$query = "SELECT * FROM " . $fs_table . " WHERE " . $field_id . " = " . $record_id;
$db_data 	= new db_query($query);

if ($row 	= mysql_fetch_assoc($db_data->result)) {
	foreach ($row as $key => $value) {
		if ($key != 'lang_id' && $key != 'admin_id') $$key = $value;
	}
} else {
	exit();
}

#+
#+ Array Category
$menu 	= new menu();
$listAll = $menu->getAllChild("categories_multi", "cat_id", "cat_parent_id", "0", "cat_type IN(" . $cat_type_select . ")", "cat_id,cat_name,cat_order,cat_type,cat_parent_id,cat_has_child", "cat_type, cat_order ASC, cat_name ASC", "cat_has_child");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<?= $load_header ?>
</head>

<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
	<? /*------------------------------------------------------------------------------------------------*/ ?>
	<?= template_top(translate_text("Records Add")) ?>
	<? /*------------------------------------------------------------------------------------------------*/ ?>
	<?
	$form = new form();
	$form->create_form("form_name", $fs_action, "post", "multipart/form-data", 'onsubmit="validateForm();return false;"  id="form_name" ');
	$form->create_table();
	?>
	<?= $form->text_note('Những ô dấu sao (<font class="form_asterisk">*</font>) là bắt buộc phải nhập.') ?>
	<?= $form->errorMsg($errorMsg) ?>
	<?= $form->text("Tiêu đề tin", "bg_thoigian", "bg_thoigian", $bg_thoigian, "Tiêu đề tin", 1, 250, "", 255) ?>
	<?= $form->text("Giá tin ghim", "bg_dongia", "bg_dongia", $bg_dongia, "Giá tin ghim", 1, 250, "", 255) ?>
	<?= $form->text("Chiết khấu", "bg_chietkhau", "bg_chietkhau", $bg_chietkhau, "Chiết khấu", 0, 250, "", 255) ?>
	<?= $form->text("Thành tiền", "bg_thanhtien", "bg_thanhtien", $bg_thanhtien, "Thành tiền", 1, 250, "", 255) ?>
	<?= $form->text("Vat", "bg_vat", "bg_vat", $bg_vat, "Vat", 0, 250, "", 255) ?>
	<?= $form->text("Giá sau Vat", "bg_ttien_vat", "bg_ttien_vat", $bg_ttien_vat, "Giá sau Vat", 1, 250, "", 255) ?>
	<?= $form->radio("Sau khi lưu dữ liệu", "add_new" . $form->ec . "return_listing" . $form->ec . "return_edit", "after_save_data", $add . $form->ec . $listing . $form->ec . $edit, $after_save_data, "Thêm mới" . $form->ec . "Quay về danh sách" . $form->ec . "Sửa bản ghi", 0, "" . $form->ec . "" . $form->ec . ""); ?>
	<?= $form->button("submit" . $form->ec . "reset", "submit" . $form->ec . "reset", "submit" . $form->ec . "reset", "Cập nhật" . $form->ec . "Làm lại", "Cập nhật" . $form->ec . "Làm lại", 'style="background:url(' . $fs_imagepath . 'button_1.gif) no-repeat; border:none;"' . $form->ec . 'style="background:url(' . $fs_imagepath . 'button_2.gif) no-repeat; border:none;"', ""); ?><br />
	<?= $form->hidden("action", "action", "submitForm", ""); ?>
	<?
	$form->close_table();
	$form->close_form();
	unset($form);
	?>
	<? /*------------------------------------------------------------------------------------------------*/ ?>
	<?= template_bottom() ?>
	<? /*------------------------------------------------------------------------------------------------*/ ?>
</body>

</html>