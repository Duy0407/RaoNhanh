<? 
require_once("inc_security.php");

#+
#+ Kiem tra quyen them sua xoa
checkAddEdit("add");

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

$sev_strdate		= getValue("sev_strdate", "str", "POST", date("d/m/Y"));
$sev_strtime		= getValue("sev_strtime", "str", "POST", date("H:i:s"));
$sev_date			= convertDateTime($sev_strdate, $sev_strtime);

$sev_name_rewrite 	= getValue("sev_name_rewrite", "str", "POST", "");
if($sev_name_rewrite == ''){
	$sev_name_rewrite 	= removeTitle(getValue("sev_name", "str", "POST", ""),'/');
	$sev_name_rewrite 	= strtolower($sev_name_rewrite);
} // End if($pro_title_rewrite == ''){
#+
#+ Goi class generate form
$myform = new generate_form();	//Call Class generate_form();
$myform->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table);	// Add table
#+
#+ Khai bao thong tin cac truong
$myform->add("sev_name","sev_name",0,0,"",0,"",0,"");
$myform->add("sev_name_rewrite","sev_name_rewrite",0, 1,"",0,"",0,"Tin này đã tồn tại trong CSDL");
$myform->add("sev_description","sev_description",0,0,"",0,"Nội dung phần giới thiệu",0,"");
$myform->add("sev_date","sev_date",1,1,0,0,"",0,"");
$myform->add("sev_active", "sev_active", 1, 0, 1, 0, "", 0, "");

#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();

#+
#+ Neu nhu co submit form
if($action == "submitForm"){
	// Ảnh 
	$upload_pic = new upload("picture", $fs_filepath, $extension_list, $limit_size);
	if ($upload_pic->file_name != ""){
		$picture = $upload_pic->file_name;
		//resize_image($fs_filepath,$upload_pic->file_name,100,100,75);
		$myform->add("sev_picture","picture",0,1,"",0,"",0,"");
	}
	//Check Error!
	$errorMsg .= $upload_pic->show_warning_error();
	#+
	#+ Kiểm tra lỗi
    $errorMsg .= $myform->checkdata();
	$errorMsg .= $myform->strErrorField ;	//Check Error!
	if($errorMsg == ""){
		#+
		#+ Thuc hien query
		$db_ex	 		= new db_execute_return();
		$query			= $myform->generate_insert_SQL();
		$last_id 		= $db_ex->db_execute($query);
		$record_id 		= $last_id;
		//echo $query;exit();

		#+
		#+ Chuyen ve trang khac khi xu ly du lieu oki
		redirect($after_save_data."?record_id=".$record_id);
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*------------------------------------------------------------------------------------------------*/ ?>
<?=template_top(translate_text("Records Add"))?>
<? /*------------------------------------------------------------------------------------------------*/ ?>
<?
$form = new form();
$form->create_form("form_name",$fs_action,"post","multipart/form-data",'onsubmit="validateForm();return false;"  id="form_name" ');
$form->create_table();		
?>
<?=$form->text_note('Những ô dấu sao (<font class="form_asterisk">*</font>) là bắt buộc phải nhập.')?>
<?=$form->errorMsg($errorMsg)?>

<?=$form->text(translate_text("Tên dịch vụ"),"sev_name","sev_name",$sev_name,translate_text("link"),1,550,"",255)?>
<?=$form->getFile("Ảnh 1", "picture", "picture", "Ảnh minh họa", 0, 32, "", '<br />(Dung lượng tối đa <font color="#FF0000">'.$limit_size.' Kb</font>)')?>
<?=$form->close_table();?>
<?=$form->wysiwyg("Chi tiết dịch vụ", "sev_description", $sev_description, "../../resource/ckeditor/", "99%", 300)?>
<?=$form->create_table();?>
<?=$form->radio("Sau khi lưu dữ liệu", "add_new" . $form->ec . "return_listing" . $form->ec . "return_edit", "after_save_data", $add . $form->ec . $listing . $form->ec . $edit, $after_save_data, "Thêm mới" . $form->ec . "Quay về danh sách" . $form->ec . "Sửa bản ghi", 0, "" . $form->ec . "" . $form->ec . "");?>
<?=$form->button("submit" . $form->ec . "reset", "submit" . $form->ec . "reset", "submit" . $form->ec . "reset", "Cập nhật" . $form->ec . "Làm lại", "Cập nhật" . $form->ec . "Làm lại", 'style="background:url(' . $fs_imagepath . 'button_1.gif) no-repeat; border:none;"' . $form->ec . 'style="background:url(' . $fs_imagepath . 'button_2.gif) no-repeat; border:none;"', "");?><br />
<?=$form->hidden("action", "action", "submitForm", "");?>
<?
$form->close_table();
$form->close_form();
unset($form);
?>
<? /*------------------------------------------------------------------------------------------------*/ ?>
<?=template_bottom() ?>
<? /*------------------------------------------------------------------------------------------------*/ ?>
</body>
</html>