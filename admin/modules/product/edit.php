<?php
require_once("inc_security.php");

#+
#+ Kiem tra quyen them sua xoa
checkAddEdit("add");

#+
#+ Khai bao bien
$add              = "add.php";
$listing          = "listing.php";
$edit				   = "edit.php";
$after_save_data	= getValue("after_save_data", "str", "POST", $listing);

$admin_id         = getValue("admin_id","int","SESSION");

$errorMsg 			= "";		//Warning Error!
$action				= getValue("action", "str", "POST", "");
$fs_action			= getURL();
$record_id			= getValue("record_id");

$pro_strdate		= getValue("pro_strdate", "str", "POST", date("d/m/Y"));
$pro_strtime		= getValue("pro_strtime", "str", "POST", date("H:i:s"));
$pro_date			= convertDateTime($pro_strdate, $pro_strtime);
$pro_date_last_edit = convertDateTime($pro_strdate, $pro_strtime);

$pro_strdateht		= getValue("pro_strdateht", "str", "POST", date("d/m/Y"));
$pro_strtimeht		= getValue("pro_strtimeht", "str", "POST", date("H:i:s"));
$pro_hantuyen		= convertDateTime($pro_strdateht, $pro_strtimeht);

#+
$pro_title_rewrite 	= getValue("pro_title_rewrite", "str", "POST", "");
if($pro_title_rewrite == ''){
	$pro_title_rewrite 	= removeTitle(getValue("pro_title", "str", "POST", ""),'/');
	$pro_title_rewrite 	= strtolower($pro_title_rewrite);
} // End if($pro_title_rewrite == ''){

$pro_category_id  = getValue("pro_category_id", "int", "POST", 0);
//Lay loai modul

$queryCat   = "SELECT * FROM categories_pro WHERE cat_id = " . intval($pro_category_id);
$dbCat      = new db_query($queryCat);
$pro_module_id = 1;

if($row = mysql_fetch_assoc($dbCat->result)){
   $pro_module_id = $row['cat_type'];
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
$myform->add("admin_id","admin_id",1,0,$admin_id,0,"",0,"");
$myform->add("pro_category_id", "pro_category_id", 1, 0, 0, 0, translate_text("Bạn chưa chọn danh mục"), 0, "");
$myform->add("pro_title","pro_title",0, 0,"",1,"Bạn chưa nhập tiêu đề sản phẩm",0,"");
$myform->add("pro_title_rewrite","pro_title_rewrite",0, 1,"",0,"",0,"Sản phẩm này đã tồn tại trong CSDL");
$myform->add("pro_price","pro_price",0,0,"",1,"Bạn chưa nhập giá sản phẩm",0,"");
$myform->add("pro_teaser","pro_teaser",0,0,"",0,"Bạn chưa nhập mô tả sản phẩm",0,"");
$myform->add("pro_machine","pro_machine",0,0,"",0,"",0,"");
$myform->add("pro_information","pro_information",0,0,"",0,"",0,"");
$myform->add("pro_date","pro_date",1,1,0,0,"",0,"");
$myform->add("pro_order","pro_order",1,0,0,0,"",0,"");
$myform->add('pro_hot','pro_hot',1,0,0);
$myform->add('pro_fast','pro_fast',1,0,0);
$myform->add("pro_active", "pro_active", 1, 0, 1, 0, "", 0, "");

#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();

#+
#+ Neu nhu co submit form
if($action == "submitForm"){
   if($pro_category_id == 0)
   {
      $errorMsg .= "Bạn chưa chọn danh mục";
   }
	if($array_config["image"]==1){
	  // Ảnh 1
		$upload_pic_1 = new upload("picture_1", $fs_filepath, $extension_list, $limit_size);
		if ($upload_pic_1->file_name != ""){
			$picture_1 = $upload_pic_1->file_name;
			//resize_image($fs_filepath,$upload_pic->file_name,100,100,75);
			$myform->add("pro_picture_1","picture_1",0,1,"",0,"",0,"");
		}
		//Check Error!
		$errorMsg .= $upload_pic_1->show_warning_error();
      
      // Ảnh 2
      $upload_pic_2 = new upload("picture_2", $fs_filepath, $extension_list, $limit_size);
		if ($upload_pic_2->file_name != ""){
			$picture_2 = $upload_pic_2->file_name;
			//resize_image($fs_filepath,$upload_pic->file_name,100,100,75);
			$myform->add("pro_picture_2","picture_2",0,1,"",0,"",0,"");
		}
		//Check Error!
		$errorMsg .= $upload_pic_2->show_warning_error();
      
      // Ảnh 3
      	$upload_pic_3 = new upload("picture_3", $fs_filepath, $extension_list, $limit_size);
		if ($upload_pic_3->file_name != ""){
			$picture_3 = $upload_pic_3->file_name;
			//resize_image($fs_filepath,$upload_pic->file_name,100,100,75);
			$myform->add("pro_picture_3","picture_3",0,1,"",0,"",0,"");
		}
		//Check Error!
		$errorMsg .= $upload_pic_3->show_warning_error();
      
      // Ảnh 4
      	$upload_pic_4 = new upload("picture_4", $fs_filepath, $extension_list, $limit_size);
		if ($upload_pic_4->file_name != ""){
			$picture_4 = $upload_pic_4->file_name;
			//resize_image($fs_filepath,$upload_pic->file_name,100,100,75);
			$myform->add("pro_picture_4","picture_4",0,1,"",0,"",0,"");
		}
		//Check Error!
		$errorMsg .= $upload_pic_4->show_warning_error();
      
      // Ảnh 5
      	$upload_pic_5 = new upload("picture_5", $fs_filepath, $extension_list, $limit_size);
		if ($upload_pic_5->file_name != ""){
			$picture = $upload_pic_5->file_name;
			//resize_image($fs_filepath,$upload_pic->file_name,100,100,75);
			$myform->add("pro_picture_5","picture_5",0,1,"",0,"",0,"");
		}
		//Check Error!
		$errorMsg .= $upload_pic_5->show_warning_error();
      
      // Ảnh 6
      	$upload_pic_6 = new upload("picture_6", $fs_filepath, $extension_list, $limit_size);
		if ($upload_pic_6->file_name != ""){
			$picture = $upload_pic_6->file_name;
			//resize_image($fs_filepath,$upload_pic->file_name,100,100,75);
			$myform->add("pro_picture_6","picture_6",0,1,"",0,"",0,"");
		}
		//Check Error!
		$errorMsg .= $upload_pic_6->show_warning_error();
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

#+
#+ Array Category
$menu 	= new menu();
$listAll = $menu->getAllChild("categories_pro","cat_id","cat_parent_id","0","cat_type = ''","cat_id,cat_name,cat_order,cat_type,cat_parent_id,cat_has_child","cat_type, cat_order ASC, cat_name ASC","cat_has_child");
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

<tr>
    <td class="form_name"><font class="form_asterisk">* </font>Chọn danh mục</td>
    <td class="form_text">
    	
        <select name="pro_category_id" id="pro_category_id" class="form_control">
        	<option value=""><?=tt("Chọn danh mục")?></option>
        
			<?
            $cat_type = "";
            foreach($listAll as $i=>$cat){
                ?>
                    <option value="<?=$cat["cat_id"]?>" <? if($pro_category_id == $cat["cat_id"]){?>selected<? }?> data-type="">
                    <?
                    for($j=0;$j<$cat["level"];$j++) echo '|--';
                    echo $cat["cat_name"];
                    ?>
                    </option>
                <?
            }
            ?>
        </select>
        
        <select id="hidden" style="display:none"></select>
    </td>
</tr>

<?=$form->text("Tên sản phẩm","pro_title","pro_title",$pro_title,"Tên sản phẩm",1,250,"",255)?>
<?=$form->text("Giá","pro_price","pro_price",$pro_price,"Giá sản phẩm",1,250,"",255)?>
<?=$form->text("Giá gốc","pro_machine","pro_machine",$pro_machine,"Giá gốc",0,250,"",255)?>
<?=$form->text(translate_text("Thứ tự"),"pro_order","pro_order",$pro_order,translate_text("Thứ tự"),0,50,"",255);?>
<?=$form->checkbox('Bán chạy', 'pro_hot', 'pro_hot', 1, $pro_hot, '')?>
<?=$form->checkbox('Khuyến mãi','pro_fast', 'pro_fast', 1, $pro_fast, '')?>
<?=$form->getFile("Ảnh 1", "picture_1", "picture_1", "Ảnh minh họa", 0, 32, "", '<br />(Dung lượng tối đa <font color="#FF0000">'.$limit_size.' Kb</font>)')?>
<?=$form->getFile("Ảnh 2", "picture_2", "picture_2", "Ảnh minh họa", 0, 32, "", '<br />(Dung lượng tối đa <font color="#FF0000">'.$limit_size.' Kb</font>)')?>
<?=$form->getFile("Ảnh 3", "picture_3", "picture_3", "Ảnh minh họa", 0, 32, "", '<br />(Dung lượng tối đa <font color="#FF0000">'.$limit_size.' Kb</font>)')?>
<?=$form->getFile("Ảnh 4", "picture_4", "picture_4", "Ảnh minh họa", 0, 32, "", '<br />(Dung lượng tối đa <font color="#FF0000">'.$limit_size.' Kb</font>)')?>
<?=$form->getFile("Ảnh 5", "picture_5", "picture_5", "Ảnh minh họa", 0, 32, "", '<br />(Dung lượng tối đa <font color="#FF0000">'.$limit_size.' Kb</font>)')?>
<?=$form->getFile("Ảnh 6", "picture_6", "picture_6", "Ảnh minh họa", 0, 32, "", '<br />(Dung lượng tối đa <font color="#FF0000">'.$limit_size.' Kb</font>)')?>
<?=$form->textarea("Tóm tắt", "pro_teaser", "pro_teaser", $pro_teaser, "Tóm tắt tin", 0, 600, 120, "", "", "")?>
<?=$form->text("Ngày tạo", "pro_strdate" . $form->ec . "pro_strtime", "pro_strdate" . $form->ec . "pro_strtime", $pro_strdate . $form->ec . $pro_strtime, "Ngày (dd/mm/yyyy)" . $form->ec . "Giờ (hh:mm:ss)", 0, 70 . $form->ec . 70, $form->ec, 10 . $form->ec . 10, " - ", $form->ec, "&nbsp; <i>(Ví dụ: dd/mm/yyyy - hh:mm:ss)</i>");?>
<?=$form->close_table();?>
<?=$form->wysiwyg("Thông tin sản phẩm", "pro_information", $pro_information, "../../resource/ckeditor/", "99%", 300)?>
<?=$form->create_table();?>
<?=$form->close_table();?>
<?=$form->radio("Sau khi lưu dữ liệu", "add_pro" . $form->ec . "return_listing" . $form->ec . "return_edit", "after_save_data", $add . $form->ec . $listing . $form->ec . $edit, $after_save_data, "Thêm mới" . $form->ec . "Quay về danh sách" . $form->ec . "Sửa bản ghi", 0, "" . $form->ec . "" . $form->ec . "");?>
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