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
$after_save_data	= getValue("after_save_data", "str", "POST", $edit);

$errorMsg 			= "";		//Warning Error!
$action				= getValue("action", "str", "POST", "");
$fs_action			= getURL();
$record_id			= getValue("record_id");

$seo_strdate		= getValue("seo_strdate", "str", "POST", date("d/m/Y"));
$seo_strtime		= getValue("seo_strtime", "str", "POST", date("H:i:s"));
$seo_date			= convertDateTime($seo_strdate, $seo_strtime);

#+
#+ Goi class generate form
$myform = new generate_form();	//Call Class generate_form();
$myform->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table);	// Add table
#+
#+ Khai bao thong tin cac truong
$myform->add("seo_link","seo_link",0,0,"",0,tt("Điền link SEO"),0,"");
$myform->add("seo_title","seo_title",0,0,"",0,tt("Điền title SEO"),0,"");
$myform->add("seo_description","seo_description",0,0,"",0,tt("Điền description SEO"),0,"");
$myform->add("seo_keyword","seo_keyword",0,0,"",0,tt("Điền keyword SEO"),0,"");
/*/
$myform->add("seo_h1","seo_h1",0,0,"",0,"",0,"");
$myform->add("seo_h1d","seo_h1d",0,0,"",0,"",0,"");
$myform->add("seo_h2","seo_h2",0,0,"",0,"",0,"");
$myform->add("seo_h2d","seo_h2d",0,0,"",0,"",0,"");
$myform->add("seo_h3","seo_h3",0,0,"",0,"",0,"");
$myform->add("seo_h3d","seo_h3d",0,0,"",0,"",0,"");
$myform->add("seo_date","seo_date",1,1,0,0,"",0,"");
//*/

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
	if($errorMsg == ""){
		#+
		#+ Thuc hien query
		$query = $myform->generate_update_SQL($field_id,$record_id);
		$db_ex = new db_execute($query);
		# echo $query;exit();
			
		#+
		#+ Chuyen ve trang khac khi xu ly du lieu oki
		redirect($after_save_data . "?record_id=" . $record_id);
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

<?=$form->text(translate_text("link"),"seo_link","seo_link",$seo_link,translate_text("link"),1,550,"",255)?>
<?=$form->text(translate_text("title"),"seo_title","seo_title",$seo_title,translate_text("title"),1,250,"",255)?>
<?=$form->textarea(translate_text("description"), "seo_description", "seo_description", $seo_description, translate_text("description"), 1, 600, 120, "", "", "");?>
<?=$form->textarea(translate_text("keyword"), "seo_keyword", "seo_keyword", $seo_keyword, translate_text("keyword"), 1, 600, 120, "", "", "");?>

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