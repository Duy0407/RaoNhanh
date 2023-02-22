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

$tai_khoan = new db_query("SELECT `usc_money` FROM `user` WHERE `usc_id` = $record_id ");
$row_taik = mysql_fetch_assoc($tai_khoan->result);
$taik_stien = $row_taik['usc_money'];
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table);	// Add table
#+
#+ Khai bao thong tin cac truong
$myform->add("usc_name", "usc_name", 0, 0, "", 1, "Bạn chưa nhập tên tài khoản", 0, "");
$myform->add("usc_account", "usc_account", 0, 0, "", 0, "Bạn chưa nhập tên đăng nhập", 0, "");
$myform->add("usc_phone", "usc_phone", 0, 0, 0, 1, "Bạn chưa nhập số điện thoại", 0, "");
$myform->add("usc_email", "usc_email", 0, 0, "", 0, "Bạn chưa nhập email", 0, "");
$myform->add("usc_money", "usc_money", 1, 0, 0, 0, "Số tiền không đúng quy định", 0, "");
#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();

# lay gia tri
$tien_tru = getValue('usc_money2', 'int', 'POST', 0);
$tien_cong = getValue('usc_money1', 'int', 'POST', 0);
#+
#+ Neu nhu co submit form
if ($action == "submitForm") {
	if ($tien_tru != 0) {
		if(is_numeric($tien_tru)== false){
			if ($tien_tru < 0) {
				$errorMsg .= "Số tiền trừ phải lớn hơn 0";
			} else {
				if ($tien_tru > $taik_stien) {
					$errorMsg .= "Số tiền trừ phải nhỏ hơn số tiền tài khoản hiện có";
				}
			}
		}else{
			$errorMsg .= "Số tiền trừ phải là số";
		}
	}

	if($tien_cong != 0){
		if (is_numeric($tien_cong) == false) {
			$errorMsg .= "Số tiền cộng phải là số";
		}
	}
	#+
	#+ Kiểm tra lỗi
	$errorMsg .= $myform->checkdata();
	$errorMsg .= $myform->strErrorField;	//Check Error!

	if ($errorMsg == "") {
		#+
		#+ Thuc hien query
		$query = $myform->generate_update_SQL($field_id, $record_id);
		$db_ex = new db_execute($query);

		// them tien vao tk
		if (isset($tien_cong) && $tien_cong != 0 && $tien_cong != "") {
			$thoi_gian = time();
			$noi_dung = "Nạp tiền";
			$inser_tthem = new db_query("UPDATE `user` SET `usc_money`= usc_money + $tien_cong  WHERE `usc_id`= $record_id ");

			$inser_lsu = new db_query("INSERT INTO `history`(`his_id`, `his_user_id`, `his_price`, `his_price_suc`, `his_time`, `his_type`, `noi_dung`,`his_pb`)
                            VALUES ('','$record_id','$tien_cong','$tien_cong','$thoi_gian','5','$noi_dung','0')");
		}
		// tru tien tai khoan
		if (isset($tien_tru) && $tien_tru != 0 && $tien_tru < $taik_stien) {
			$inser_tthem = new db_query("UPDATE `user` SET `usc_money`= usc_money - $tien_tru  WHERE `usc_id`= $record_id ");
		}


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
	<?= $form->text("Tên tài khoản", "usc_name", "usc_name", $usc_name, "Tên tài khoản", 1, 250, "", 255) ?>
	<?= $form->text("Tên đăng nhập", "usc_account", "usc_account", $usc_account, "Tên đăng nhập", 0, 250, "", 255) ?>
	<?= $form->text("Số điện thoại", "usc_phone", "usc_phone", $usc_phone, "Số điện thoại", 1, 250, "", 255) ?>
	<?= $form->text("Email", "usc_email", "usc_email", $usc_email, "Email", 0, 250, "", 255) ?>
	<?= $form->text("Số tiền", "usc_money", "usc_money", $usc_money, "Số tiền", 0, 250, "", 255) ?>
	<?= $form->text("Số tiền cộng vào", "usc_money1", "usc_money1", 0, "Số tiền thêm", 0, 250, "", 255) ?>
	<?= $form->text("Số tiền bị trừ", "usc_money2", "usc_money2", 0, "Số tiền trừ", 0, 250, "", 255) ?>
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