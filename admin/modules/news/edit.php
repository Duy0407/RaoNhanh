<style>
#cke_new_description,#cke_content_relate
{
   width: 80%;
   margin: 0 auto;
   position: relative;
   top: -15px;
}
</style>
<?php
require_once("inc_security.php");
function removeTitle($string,$keyReplace){
	$string		= html_entity_decode($string, ENT_COMPAT, 'UTF-8');
	$string		= mb_strtolower($string, 'UTF-8');
	$string		= removeAccent($string);
	//neu muon de co dau
	//$string 	=  trim(preg_replace("/[^A-Za-z0-9àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸ]/i"," ",$string));

	$string 	= trim(preg_replace("/[^A-Za-z0-9]/i"," ",$string));
    // khong dau
	$string 	= str_replace(" ","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace($keyReplace,"-",$string);
	return $string;
}
function tt($variable){
	return "" . $variable . "";
}
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

$admin_id         = getValue("admin_id","int","SESSION");

$new_strdate		= getValue("new_strdate", "str", "POST", date("d/m/Y"));
$new_strtime		= getValue("new_strtime", "str", "POST", date("H:i:s"));
$new_date_last_edit    = convertDateTime($new_strdate, $new_strtime);

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
$listAll = $menu->getAllChild("categories_multi","cat_id","cat_parent_id","0","cat_active = 1","cat_id,cat_name,cat_order,cat_type,cat_parent_id,cat_has_child","cat_type, cat_order ASC, cat_name ASC","cat_has_child");

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
$myform->add("new_title","new_title",0, 0,"",1,"Bạn chưa nhập tiêu đề tin",0,"Tiêu đề tin đã tồn tại");
$myform->add("new_url","new_url",0, 1,"",0,"",0,"Url đã tồn tại");
$myform->add("new_teaser","new_teaser",0,0,"",1,"Bạn chưa nhập meta description",0,"");
$myform->add("new_keyword","new_keyword",0,0,"",1,"Bạn chưa nhập meta keyword",0,"");

$myform->add("new_sapo","new_sapo",0,0,"",0,"Bạn chưa nhập sapo",0,"");
$myform->add("new_description","new_description",0,0,"",1,"Bạn chưa mô tả tin",0,"");

$myform->add("title_relate","title_relate",0,0,"",0,"",0,"");
$myform->add("content_relate","content_relate",0,0,"",1,"",0,"");

$myform->add("new_date_last_edit","new_date_last_edit",1,1,0,0,"",0,"");
$myform->add("new_hot","new_hot",1,0,0,0,"",0,"");
$myform->add("new_new","new_new",1,0,0,0,"",0,"");
$myform->add("new_active", "new_active", 1, 0, 1, 0, "", 0, "");
#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();

#+
#+ Neu nhu co submit form
if($action == "submitForm"){

   if($array_config["image"]==1){
		$upload_pic = new upload("picture", $fs_filepath, $extension_list, $limit_size);
		if ($upload_pic->file_name != ""){
			$picture = $picture = date("Y",time())."/".date("m",time())."/".date("d",time())."/".$upload_pic->file_name;
			$myform->add("new_picture","picture",0,1,"",0,"",0,"");
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
		$query = $myform->generate_update_SQL($field_id,$record_id);
		$db_ex = new db_execute($query);

		$fs_redirect 	= $after_save_data. "?record_id=".$record_id."&category=".getValue("new_category_id","int","POST");
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

if($row 	= mysql_fetch_assoc($db_data->result))
{
	foreach($row as $key=>$value)
	{
		if($key!='lang_id' && $key!='admin_id') $$key = $value;
	}
}else
{
	exit();
}

$readonly = '';
if(	$_SESSION["isAdmin"] == 0){
    $readonly = "readonly";
}else{
    $readonly = "";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
<script type="text/javascript" src="/admin/resource/ckeditor/ckeditor.js?t=D03G5XL"></script>
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
<?=$form->text("Tiêu đề tin","new_title","new_title",$new_title,"Tiêu đề tin",1,500,"",255)?>
<?=$form->text("Url tin","new_url","new_url",$new_url,"Url tin",1,500,"",255,'',$readonly)?>
<?=$form->getFile("<font class='form_asterisk'>*</font>Ảnh minh họa", "picture", "picture", "Ảnh minh họa", 0, 32, "", '<br />(Dung lượng tối đa <font color="#FF0000">'.$limit_size.' Kb</font>)')?>
<?=$form->textarea("<font class='form_asterisk'>*</font>Meta Description<br/>(<span class='num_word'>0</span>/160 ký tự)", "new_teaser", "new_teaser", $new_teaser, "Des", 0, 600, 80, "", "", "")?>
<?=$form->textarea("<font class='form_asterisk'>*</font>Keywords", "new_keyword", "new_keyword", $new_keyword, "Keywords", 0, 600, 60, "", "", "")?>
<?=$form->close_table();?>
<?=$form->wysiwyg("Tóm tắt (sapo)", "new_sapo", $new_sapo, "../../resource/ckeditor/", "80%","600")?>
<?=$form->create_table();?>
<?=$form->text("Ngày Sửa", "new_strdate" . $form->ec . "new_strtime", "new_strdate" . $form->ec . "new_strtime", $new_strdate . $form->ec . $new_strtime, "Ngày (dd/mm/yyyy)" . $form->ec . "Giờ (hh:mm:ss)", 0, 70 . $form->ec . 70, $form->ec, 10 . $form->ec . 10, " - ", $form->ec, "&nbsp; <i>(Ví dụ: dd/mm/yyyy - hh:mm:ss)</i>");?>
<?=$form->checkbox("Loại bản ghi", "new_active".$form->ec."new_new".$form->ec."new_hot", "new_active".$form->ec."new_new".$form->ec."new_hot", "1".$form->ec."1".$form->ec."1", $new_active.$form->ec.$new_new.$form->ec.$new_hot, "Kích hoạt".$form->ec."Tin mới".$form->ec."Tin hot", "0".$form->ec."0".$form->ec."0", "".$form->ec."".$form->ec."", "")?>
<?=$form->close_table();?>
<?=$form->wysiwyg("<font class='form_asterisk'>*</font>Mô tả chi tiết", "new_description", $new_description, "../../resource/ckeditor/", "99%", 300)?>

<?=$form->create_table();?>
<?=$form->text("Tiêu đề bài viết liên quan","title_relate","title_relate",$title_relate,"Tiêu đề bài viết liên quan",1,500,"",255)?>
<?=$form->close_table();?>
<?=$form->create_table();?>
<?=$form->wysiwyg("Nội dung bài viết liên quan", "content_relate", $content_relate, "../../resource/ckeditor/", "", 300)?>
<?=$form->close_table();?>
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
<script !src="">
    let num = $('#new_teaser').val().length;
    $('.num_word').text(num);
    $('#new_teaser').keyup(function () {
        let num = $(this).val().length;
        $('.num_word').text(num);
    });
</script>
<style>
#cke_new_sapo {
    width: 80%;
    margin: 0 auto;
    position: relative;
    top: -15px;
}
.form_name, .form_name_2{
	width: 100px;
}
</style>
</html>