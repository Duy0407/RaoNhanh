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

$iType				= getValue("iType","str","GET", 0);
$iParent 			= getValue("iParent","str","GET","");

#+
#+ Array Menus
$menu = new menu();
$listAll = $menu->getAllChild("menus_multi","mnu_id","mnu_parent_id","0","mnu_type = " . $iType . " AND lang_id = " . $_SESSION["lang_id"],"mnu_id,mnu_name,mnu_link,mnu_target,mnu_order,mnu_type,mnu_parent_id,mnu_has_child","mnu_order ASC, mnu_name ASC","mnu_has_child");

#+
#+ Goi class generate form
$myform = new generate_form();	//Call Class generate_form();
$myform->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table);	// Add table
#+
#+ Khai bao thong tin cac truong
$myform->add("mnu_type","mnu_type",1,0,0,1,tt("Bạn chưa chọn loại trình đơn"),0,tt("Bạn chưa chọn loại trình đơn"));
$myform->add("mnu_check","mnu_check",0,0,0,0,"",0,"");
$myform->add("mnu_name","mnu_name",0,0,"",1,tt("Bạn chưa nhập tên trình đơn"),0,tt("Bạn chưa nhập tên trình đơn"));
$myform->add("mnu_link","mnu_link",0,0,"",0,"Bạn chưa nhập địa chỉ liên kết !",0,"Bạn chưa nhập địa chỉ liên kết");
$myform->add("mnu_background","mnu_background",0,0,"",0,"Bạn chưa nhập màu nền",0,"Bạn chưa nhập màu nền");
$myform->add("mnu_target","mnu_target",0,0,"_self",1,tt("Bạn chưa nhập thực thi khi ấn vào trình đơn"),0,tt("Bạn chưa nhập thực thi khi ấn vào trình đơn"));
if($array_config["order"]==1) $myform->add("mnu_order","mnu_order",1,0,0,0,"",0,"");
if($array_config["upper"]==1) $myform->add("mnu_parent_id","mnu_parent_id",1,0,0,0,"",0,"");
if($array_config["description"]==1) $myform->add("mnu_description","mnu_description",0,0,"",0,"",0,"");
$myform->add("mnu_data","mnu_data",0,0,"",0,"",0,"");	
#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();

#+
#+ Neu nhu co submit form
if($action == "submitForm"){
	
	if($array_config["image"]==1){
		$upload_pic = new upload("mnu_picture", $fs_filepath, $extension_list, $limit_size);
		if ($upload_pic->file_name != ""){
			$mnu_picture = $upload_pic->file_name;
			//resize_image($fs_filepath,$upload_pic->file_name,100,100,75);
			$myform->add("mnu_picture","mnu_picture",0,1,"",0,"",0,"");
		}
		//Check Error!
		$errorMsg .= $upload_pic->show_warning_error();
	}

	#+
	#+ Kiểm tra lỗi
    $errorMsg .= $myform->checkdata();
	$errorMsg .= $myform->strErrorField ;	//Check Error!
	if($errorMsg == ""){
		#+
		#+ Thuc hien query
		$db_ex	 		= new db_execute_return();
		$query			= $myform->generate_insert_SQL();
		//echo $query;exit();
		$last_id 		= $db_ex->db_execute($query);
		$record_id		= $last_id;
		//
		
		$iType			= getValue("mnu_type","int","POST","");	
		$iParent		= getValue("mnu_parent_id","str","POST","");		
		$fs_redirect 	= $after_save_data. "?record_id=" . $record_id . "&iType=" . $iType . "&iParent=" . $iParent;
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

<?=$form->select("Loại trình đơn", "mnu_type", "mnu_type", $arrType, $mnu_type, "", 1, 150, '', "")?>
<?=$form->select("Vị trí ảnh background", "mnu_check", "mnu_check", $arrTypePage, $mnu_check, "", 1, 150, '', "")?>
<?=$form->text("Tên trình đơn","mnu_name","mnu_name",$mnu_name,"Tên trình đơn",1,250,"",255)?>
<?=$form->text("Liên kết","mnu_link","mnu_link",$mnu_link,"Liên kết",1,250,"",255)?>
<?=$form->text("Màu nền ","mnu_background","mnu_background",$mnu_background,"Background",1,250,"",255)?>
<? 
if($array_config["order"]==1) echo $form->text("Thứ tự","mnu_order","mnu_order",$mnu_order,"Thứ tự",1,50,"",255);
if($array_config["image"]==1) echo $form->getFile("Ảnh minh họa", "mnu_picture", "mnu_picture", "Ảnh minh họa", 0, 32, "", '(Dung lượng tối đa <font color="#FF0000">' . $limit_size . ' Kb</font>)');
if($array_config["upper"]==1) echo $form->select_db_multi("Menu cấp trên", "mnu_parent_id", "mnu_parent_id", $listAll, "mnu_id", "mnu_name", $mnu_parent_id, "Menu cấp trên", "0", "200");
if($array_config["description"]==1) echo $form->textarea(translate_text("description"), "mnu_description", "mnu_description", $mnu_description, translate_text("description"), 1, 600, 120, "", "", "");
?>
<?=$form->close_table();?>
<?=$form->wysiwyg("Danh sách link", "mnu_data", "", "../../resource/ckeditor/", "99%", 300)?>
<?=$form->create_table();?>
<?=$form->select("Mở ra", "mnu_target", "mnu_target", $arrTarget, $mnu_target, "", 1, 150, '', "")?>

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