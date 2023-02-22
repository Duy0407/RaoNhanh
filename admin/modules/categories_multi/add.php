<? 
require_once("inc_security.php");

#+
#+ Kiem tra quyen them sua xoa
checkAddEdit("add");
function removeTitle($string,$keyReplace){
	$string		= html_entity_decode($string, ENT_COMPAT, 'UTF-8');
	$string		= mb_strtolower($string, 'UTF-8');
	$string		= removeAccent($string);
	//neu muon de co dau
	//$string 	=  trim(preg_replace("/[^A-Za-z0-9àáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸ]/i"," ",$string));

	$string 	= trim(preg_replace("/[^A-Za-z0-9]/i"," ",$string)); // khong dau
	$string 	= str_replace(" ","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace("--","-",$string);
	$string		= str_replace($keyReplace,"-",$string);
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

$cat_type			= getValue("cat_type","str","GET","");
if($cat_type=="") $cat_type=getValue("cat_type","str","POST","");
$sql				= "1";
if($cat_type!="") $sql=" cat_type = '" . $cat_type . "'";

#+
$cat_name_rewrite 	= getValue("cat_name_rewrite", "str", "POST", "");
if($cat_name_rewrite == ''){
	$cat_name_rewrite 	= removeTitle(getValue("cat_name", "str", "POST", ""),'/');
	$cat_name_rewrite 	= strtolower($cat_name_rewrite);
} // End if($cat_name_rewrite == ''){
	
#+
#+ Array category	
$menu 				= new menu();
$listAll 			= $menu->getAllChild("category","cat_id","cat_parent_id","0",$sql." AND lang_id = " . $lang_id . $sqlcategory,"cat_id,cat_name,cat_order,cat_type,cat_parent_id,cat_has_child","cat_type, cat_order ASC, cat_name ASC","cat_has_child");


#+
#+ Goi class generate form
$myform = new generate_form();	//Call Class generate_form();
$myform->removeHTML(0);	//Loại bỏ chức năng không cho điền tag html trong form
#+
#+ Khai bao bang du lieu
$myform->addTable($fs_table);	// Add table
#+
#+ Khai bao thong tin cac truong
$myform->add("admin_id","admin_id",1,1,0,0,"",0,"");
$myform->add("cat_name","cat_name",0,0,"",1,translate_text("Vui lòng nhập tên danh mục"),0,"");
$myform->add("cat_active","active",1,0,1,0,"",0,"");
$myform->add("cat_show","1",1,0,1,0,"",0,"");
if($array_config["order"]==1) $myform->add("cat_order","cat_order",1,0,0,0,"",0,"");
if($array_config["upper"]==1) $myform->add("cat_parent_id","cat_parent_id",1,0,0,0,"",0,"");
if($array_config["description"]==1) $myform->add("cat_description","cat_description",0,0,"",0,"",0,"");

#+
#+ đổi tên trường thành biến và giá trị
$myform->evaluate();

#+
#+ Neu nhu co submit form
if($action == "submitForm"){
	
	if($array_config["image"]==1){
		$upload_pic = new upload("picture", $fs_filepath, $extension_list, $limit_size);
		if ($upload_pic->file_name != ""){
			$picture = $upload_pic->file_name;
			//resize_image($fs_filepath,$upload_pic->file_name,100,100,75);
			$myform->add("cat_picture","picture",0,1,"",0,"",0,"");
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
		$last_id 		= $db_ex->db_execute($query);
		$record_id 		= $last_id;
		//echo $query;exit();

		$iParent = getValue("cat_parent_id","int","POST");
		if($iParent > 0){
			$db_ex = new db_execute("UPDATE category SET cat_has_child = 1 WHERE cat_id = " . $iParent);
		}

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

<? //=$form->select("Loại danh mục", "cat_type", "cat_type", $array_value, $cat_type, "", 1, 150, '', "")?>
<tr>
	<td class="form_name">Chọn danh mục</td>
	<td class="form_text">  	
		<select name="cat_parent_id" id="cat_parent_id" class="form_control">
			<option value="">Chọn danh mục</option>
			<?
         $cat_type = "";
         foreach($listAll as $i=>$cat){
				if($cat_type != $cat["cat_type"]){
					$cat_type = $cat["cat_type"];
					?>
					<optgroup label="---- <?=ucwords($cat["cat_type"])?> -----" data-type="<?=$cat_type?>"></optgroup>
					<option value="" data-type="<?=$cat_type?>">Chọn <?=ucwords($array_value[$cat["cat_type"]])?></option>
					<?
				}
				?>
				<option value="<?=$cat["cat_id"]?>" <? if($cat_parent_id == $cat["cat_id"]){?>selected<? }?> data-type="<?=$cat_type?>">
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
		<script type="text/javascript">
		$(function(e) {
			$('#cat_type').change(function(e) {
				cat_type = $(this).val();
				$('#hidden').children().appendTo('#cat_parent_id');
				if(cat_type != '') $('#cat_parent_id').children('[data-type!='+cat_type+']').appendTo('#hidden');
			});
			$('#cat_parent_id').change(function(e) {
				type = $('option:selected', this).attr('data-type');
				$('#cat_type').children('[value^='+type+']').attr('selected','selected');
			}).trigger('change');  
		});
		</script>
	</td>
</tr>

<?=$form->text(translate_text("Tên danh mục"),"cat_name","cat_name",$cat_name,translate_text("Tên danh mục"),1,250,"",255)?>
<? 
if($array_config["order"]==1) echo $form->text(translate_text("Thứ tự"),"cat_order","cat_order",$cat_order+1,translate_text("Thứ tự"),1,50,"",255);
if($array_config["image"]==1) echo $form->getFile(translate_text("Ảnh"), "picture", "picture", translate_text("Ảnh"), 0, 32, "", '(Dung lượng tối đa <font color="#FF0000">' . $limit_size . ' Kb</font>)');
if($array_config["description"]==1) echo $form->textarea(translate_text("Mô tả"), "cat_description", "cat_description", $cat_description, translate_text("description"),0, 600, 120, "", "", "");
// if($array_config["upper"]==1) echo $form->select_db_multi(translate_text("upper"), "cat_parent_id", "cat_parent_id", $listAll, "cat_id", "cat_name", $cat_parent_id, translate_text("upper"), "1", "200");
?>
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