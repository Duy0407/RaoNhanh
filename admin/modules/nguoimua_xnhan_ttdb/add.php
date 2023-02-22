<?
require_once("inc_security.php");

#+
#+ Kiem tra quyen them sua xoa
checkAddEdit("add");

#+
#+ Khai bao bien
$add              = "add.php";
$listing          = "listing.php";
$edit				   = "edit.php";
$after_save_data	= getValue("after_save_data", "str", "POST", $add);

$admin_id         = getValue("admin_id","int","SESSION");

$errorMsg 			= "";		//Warning Error!
$action				= getValue("action", "str", "POST", "");
$fs_action			= getURL();
$record_id			= getValue("record_id");

$new_strdate		= getValue("new_strdate", "str", "POST", date("d/m/Y"));
$new_strtime		= getValue("new_strtime", "str", "POST", date("H:i:s"));
$new_date			= convertDateTime($new_strdate, $new_strtime);
$new_date_last_edit = convertDateTime($new_strdate, $new_strtime);

$new_strdateht		= getValue("new_strdateht", "str", "POST", date("d/m/Y"));
$new_strtimeht		= getValue("new_strtimeht", "str", "POST", date("H:i:s"));
$new_hantuyen		= convertDateTime($new_strdateht, $new_strtimeht);

#+
$new_title_rewrite 	= getValue("new_title_rewrite", "str", "POST", "");
if($new_title_rewrite == ''){
	$new_title_rewrite 	= removeTitle(getValue("new_title", "str", "POST", ""),'/');
	$new_title_rewrite 	= strtolower($new_title_rewrite);
} // End if($new_title_rewrite == ''){

$new_category_id  = getValue("new_category_id", "int", "POST", 0);
//Lay loai modul

$queryCat   = "SELECT * FROM categories_multi WHERE cat_id = " . intval($new_category_id);
$dbCat      = new db_query($queryCat);
$new_module_id = 1;

if($row = mysql_fetch_assoc($dbCat->result)){
   $new_module_id = $row['cat_type'];
}
#+
#+ Array Category
$menu 	= new menu();
$listAll = $menu->getAllChild("categories_multi","cat_id","cat_parent_id","0","cat_type IN(".$cat_type_select.")","cat_id,cat_name,cat_order,cat_type,cat_parent_id,cat_has_child","cat_type, cat_order ASC, cat_name ASC","cat_has_child");

/*/
//Lay du lieu de chuyen qua bien
$new_title        = getValue("new_title", "str", "POST", "", 1);
$new_title_md5    = md5($new_title);
$new_picture_width	= 0;
$new_picture_height	= 0;
$new_category_id  = getValue("new_category_id", "int", "POST", 0);
$new_language     = getValue("new_language", "int", "POST", 1);
$new_teaser       = getValue("new_teaser", "str", "POST", "", 1);
$new_description  = getValue("new_description", "str", "POST", "", 1);
$html             =	new html_cleanup($new_description);
$html->clean();
$new_description  =	$html->output_html;
$new_description  =	replace_content($new_description);
unset($html);
$new_hot          = getValue("new_hot", "int", "POST", 0);
$new_date         = time();
$new_active       = getValue("new_active", "int", "POST", 0);
$data_tag         = getValue("as_values", "str", "POST", "", 1);
$array_data       = explode(",", $data_tag);
array_pop($array_data);
//*/

#+
#+ Goi class generate form
$myform = new generate_form();	//Call Class generate_form();
$myform->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table);	// Add table
#+
#+ Khai bao thong tin cac truong
$myform->add("admin_id","admin_id",1,0,$admin_id,0,"",0,"");
$myform->add("new_title","new_title",0, 0,"",1,"Bạn chưa nhập tiêu đề tin",0,"");
$myform->add("new_title_rewrite","new_title_rewrite",0, 1,"",0,"",0,"Tin này đã tồn tại trong CSDL");
$myform->add("new_picture_web","new_picture_web",0,0,"",0,"Bạn chưa chọn ảnh đại diện",0,"");
$myform->add("new_teaser","new_teaser",0,0,"",1,"Bạn chưa nhập tóm tắt",0,"");
$myform->add("new_description","new_description",0,0,"",1,"Bạn chưa mô tả tin",0,"");
$myform->add("new_date","new_date",1,1,0,0,"",0,"");
$myform->add("new_date_last_edit","new_date_last_edit",1,1,$new_date_last_edit,0,"",0,"");
$myform->add("new_order","new_order",1,0,0,0,"",0,"");
$myform->add("new_hot","new_hot",1,0,0,0,"",0,"");
$myform->add("new_new","new_new",1,0,0,0,"",0,"");
$myform->add("new_active", "new_active", 1, 0, 1, 0, "", 0, "");

#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();

#+
#+ Neu nhu co submit form
if($action == "submitForm"){

	

	#+
	#+ Kiểm tra lỗi
   $errorMsg .= $myform->checkdata();
	$errorMsg .= $myform->strErrorField ;	//Check Error!
   if($array_config["image"]==1){
		$upload_pic = new upload("picture", $fs_filepath, $extension_list, $limit_size);
		if ($upload_pic->file_name != ""){
			$picture = $upload_pic->file_name;
			//resize_image($fs_filepath,$upload_pic->file_name,100,100,75);
			$myform->add("new_picture","picture",0,1,"",0,"",0,"");
		}
      else
      {
         $errorMsg .= "• Bạn chưa chọn ảnh đại diện";
      }
		//Check Error!
	}
	if($errorMsg == ""){
      
		#+
		#+ Thuc hien query
		$db_ex	 		= new db_execute_return();
		$query			= $myform->generate_insert_SQL();

		$last_id 		= $db_ex->db_execute($query);
		$record_id 		= $last_id;
		//echo $query;exit();

		$fs_redirect 	= $after_save_data. "?record_id=".$record_id."&new_category_id=".$new_category_id;
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
<?=$form->text("Tiêu đề tin","new_title","new_title",$new_title,"Tiêu đề tin",1,250,"",255)?>
<?=$form->getFile("Ảnh minh họa", "picture", "picture", "Ảnh minh họa", 0, 32, "", '<br />(Dung lượng tối đa <font color="#FF0000">'.$limit_size.' Kb</font>)')?>
<?=$form->textarea("Tóm tắt", "new_teaser", "new_teaser", $new_teaser, "Tóm tắt tin", 0, 600, 120, "", "", "")?>
<?=$form->text("Ngày tạo", "new_strdate" . $form->ec . "new_strtime", "new_strdate" . $form->ec . "new_strtime", $new_strdate . $form->ec . $new_strtime, "Ngày (dd/mm/yyyy)" . $form->ec . "Giờ (hh:mm:ss)", 0, 70 . $form->ec . 70, $form->ec, 10 . $form->ec . 10, " - ", $form->ec, "&nbsp; <i>(Ví dụ: dd/mm/yyyy - hh:mm:ss)</i>");?>
<?=$form->text(translate_text("order"),"new_order","new_order",$new_order+1,translate_text("order"),0,50,"",255);?>
<?=$form->checkbox("Loại bản ghi", "new_active".$form->ec."new_new".$form->ec."new_hot", "new_active".$form->ec."new_new".$form->ec."new_hot", "1".$form->ec."1".$form->ec."1", $new_active.$form->ec.$new_new.$form->ec.$new_hot, "Kích hoạt".$form->ec."Tin mới".$form->ec."Tin hot", "0".$form->ec."0".$form->ec."0", "".$form->ec."".$form->ec."", "")?>
<?=$form->close_table();?>
<?=$form->wysiwyg("Mô tả chi tiết", "new_description", $new_description, "../../resource/ckeditor/", "99%", 300)?>
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