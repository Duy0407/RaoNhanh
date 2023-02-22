<?
require_once("inc_security.php");
//check quyền them sua xoa
checkAddEdit("add");

$ff_action 					= $_SERVER['REQUEST_URI'];
$ff_redirect_succ 		= "listing.php";
$ff_redirect_fail 		= "";


$Action 						= getValue("Action","str","POST","");
$arelate_select  			= getValue("arelate_select","arr","POST",array());
$menuid 				= new menu();
$menuid->getArray("categories_multi","cat_id","cat_parent_id"," lang_id = " . $lang_id);
$adm_access_category 	= '';
foreach($arelate_select as $key=>$value){
	$adm_access_category .= '[' . str_replace(",","][",$menuid->getAllChildId($value)) . ']';
}

$errorMsg = "";
$allow_insert = 1;
$myform = new generate_form();
$myform->add("adm_loginname","adm_loginname",0,0,"",1,translate_text("Username is not empty and> 3 characters"),1,translate_text("Administrator account already exists"));
$myform->add("adm_password","adm_password",4,0,"",1,translate_text("Password must be greater than 4 characters"),0,"");
$myform->add("adm_email","adm_email",2,0,"",1,translate_text("Email is invalid"),0,"");
$myform->add("adm_name","adm_name",0,0,"",0,"",0,"");
$myform->add("adm_phone","adm_phone",0,0,"",0,"",0,"");
$myform->add("adm_all_category","adm_all_category",1,0,0,0,"",0,"");
$myform->add("adm_access_category","adm_access_category",0,1,"",0,"",0,"");
$myform->add("adm_edit_all","adm_edit_all",1,0,0,0,"",0,"");
$myform->add("admin_id","admin_id",1,1,0,0,"",0,"");
$myform->addTable("admin_user");
//get vaule from POST
$adm_loginname = getValue("adm_loginname","str","POST","",1);
//password hash md5 --> only replace \' = '
$adm_password = getValue("adm_password","str","POST","",1);
//get Access Module list
$module_list			= "";
$module_list  			= getValue("mod_id","arr","POST","");
$user_lang_id_list  	= getValue("user_lang_id","arr","POST","");
$arelate_select  		= getValue("arelate_select","arr","POST","");

if ($Action =='insert')
{
	if ($module_list ==""){
		$allow_insert = 0;
		$errorMsg 			.= translate_text("Please_select_modules!");
	}
	
	//insert new user to database
	if ($allow_insert == 1){
		//Call Class generate_form();
		$querystr = $myform->generate_insert_SQL();
		$errorMsg .= $myform->checkdata();
		$last_id = 0;
		if($errorMsg == ""){
			$db_ex = new db_execute_return();
			$last_id = $db_ex->db_execute($querystr);
			unset($db_ex);
			if($last_id!=0){
				//insert user right\
				if(isset($module_list[0])){
					for ($i=0; $i< count($module_list); $i++){
						$query_str = "INSERT INTO admin_user_right VALUES(" . $last_id . "," . $module_list[$i] . ", " . getValue("adu_add" . $module_list[$i] , "int","POST") . ", " . getValue("adu_edit" . $module_list[$i] , "int","POST") . ", " . getValue("adu_delete" . $module_list[$i] , "int","POST") . ")";
						$db_ex = new db_execute($query_str);
						unset($db_ex);
					}
				}
				if(isset($user_lang_id_list[0])){
					for ($i=0; $i< count($user_lang_id_list); $i++){
						$query_str = "INSERT INTO admin_user_language VALUES(" . $last_id . "," . $user_lang_id_list[$i] .")";
						$db_ex = new db_execute($query_str);
						unset($db_ex);
					}
				}
				//category right
			
			redirect($ff_redirect_succ);
			exit();
			}
		}
	}
}
$myform->evaluate();
$db_getallmodule = new db_query("SELECT * 
											FROM modules
											ORDER BY mod_order DESC");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*------------------------------------------------------------------------------------------------*/ ?>
<?=template_top(translate_text("Add new member"))?>
		<? /*---------Body------------*/ ?>
			<form ACTION="<?=$ff_action;?>" METHOD="POST" name="add_user" enctype="multipart/form-data">
			<table cellpadding="5" cellspacing="0" style="border-collapse:collapse" border="0" bordercolor="<?=$fs_border?>">
			<tr valign="baseline"> 
			<td class="textBold" colspan="2" align="center">
			<font color="#FF0000"><?=$errorMsg;?></font>
			</td>
			</tr>
			<tr <?=$fs_change_bg?>> 
				<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Tên đăng nhập")?> :</td>
				<td class="textBold">
				<input type="text" name="adm_loginname" id="adm_loginname" value="<?=$adm_loginname?>" size="50" class="form"> 
				</td>
			</tr>
			<tr <?=$fs_change_bg?>> 
				<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Họ tên")?> :</td>
				<td class="textBold">
				<input type="text" name="adm_name" id="adm_name" value="<?=$adm_name?>" size="50" class="form"> 
				</td>
			</tr>
			<tr <?=$fs_change_bg?>> 
				<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Số điện thoại")?> :</td>
				<td class="textBold">
				<input type="text" name="adm_phone" id="adm_phone" value="<?=$adm_phone?>" size="50" class="form"> 
				</td>
			</tr>
			<tr <?=$fs_change_bg?>> 
			<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Mật khẩu")?> :</td>
			<td class="textBold"><input type="password" name="adm_password" size="50"  class="form"> </td>
			</tr>
			<tr <?=$fs_change_bg?>> 
			<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Nhập lại mật khẩu")?> :</td>
			<td class="textBold"><input  type="password" name="adm_password_con" size="50"  class="form"> </td>
			</tr>
			<tr <?=$fs_change_bg?>> 
			<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Email")?> :</td>
			<td> <input type="text" name="adm_email" id="adm_email" value="<?=$adm_email?>" size="50" class="form">
			</td>
			</tr>
			<tr <?=$fs_change_bg?>> 
			<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Quyền quản lý")?> :</td>
			<td> 
			<table cellpadding="2" cellspacing="0" style="border-collapse:collapse" border="1" bordercolor="<?=$fs_border?>">
				<tr bgcolor="#E0EAF3" height="30">
					<td class="textBold"><?=translate_text("Chọn")?></td>
					<td class="textBold"><?=translate_text("Danh sách")?></td>
					<td class="textBold"><?=translate_text("Thêm")?></td>
					<td class="textBold"><?=translate_text("Sửa")?></td>
					<td class="textBold"><?=translate_text("Xóa")?></td>
				</tr>
				<?
				while ($row=mysql_fetch_array($db_getallmodule->result)){
					if(file_exists("../../modules/" . $row["mod_path"] . "/inc_security.php")===true){
					?>
						<tr>
							<td align="center"><input type="checkbox" name="mod_id[]" id="mod_id" value="<?=$row['mod_id'];?>"></td>
							<td class="textBold"><?=translate_text($row['mod_name']);?></td>
							<td align="center"><input type="checkbox" name="adu_add<?=$row['mod_id'];?>" id="adu_add<?=$row['mod_id'];?>" value="1"></td>
							<td align="center"><input type="checkbox" name="adu_edit<?=$row['mod_id'];?>" id="adu_edit<?=$row['mod_id'];?>" value="1"></td>
							<td align="center"><input type="checkbox" name="adu_delete<?=$row['mod_id'];?>" id="adu_delete<?=$row['mod_id'];?>" value="1"></td>
						</tr>
					<?
					}
				}
				unset($db_getall_channel);
				?>
			</table>
			</td>
			</tr>
			 <tr <?=$fs_change_bg?>> 
				<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Ngôn ngữ")?> :</td>
				<td> <input type="hidden" name="adm_edit_all" value="1">
					<?
					$db_getall_languages = new db_query("SELECT * 
														 FROM languages
														 ORDER BY lang_id ASC");
					$cha_type="";
					?>
					<table cellpadding="2" cellspacing="0">
						<tr>
						<?
						while ($row=mysql_fetch_array($db_getall_languages->result)){
						?>
							<td><input type="checkbox" name="user_lang_id[]" checked="checked" id="user_lang_id" value="<?=$row['lang_id'];?>"></td>
							<td class="textBold"><?=$row['lang_name'];?></td>
						<?
						}
						unset($db_getall_channel);
						?>
						</tr>
					</table>
				</td>
			 </tr>
			 <tr <?=$fs_change_bg?>> 
				<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Tất cả danh mục")?>:</td> 
				<td class="textBold"> 
					<input type="checkbox" name="adm_all_category" onclick="checkshowlistcat()" id="adm_all_category" checked="checked" value="1">
					<script language="javascript">
						function checkshowlistcat(){
							if(document.getElementById("adm_all_category").checked == true){
								document.getElementById("showlistcategory").style.display = 'none';
							}else{
								document.getElementById("showlistcategory").style.display = '';
							}
						}
					</script>
				</td>
			</tr>
			<tbody id="showlistcategory" style="display:none">
			<tr <?=$fs_change_bg?>> 
				<td align="right" valign="middle" nowrap class="textBold" valign="top"><?=translate_text("Chọn danh mục")?>:</td> 
				<td class="textBold">
					<?
					$db_category = new db_query("SELECT cat_id,cat_name FROM categories_multi WHERE cat_parent_id = 0");
					?>
					<ul>
						<?
						while($cat = mysql_fetch_assoc($db_category->result)){
						?>
						<li><input type="checkbox" name="arelate_select[]" value="<?=$cat["cat_id"]?>" /> <?=$cat["cat_name"]?></li>
						<?
						}
						?>
					</ul>
				</td>
			</tr>
			</tbody>
			<tr valign="baseline"> 
			<td nowrap align="right"> </td>
			<td> <input type="button" class="bottom" onClick="document.add_user.submit();" value="<?=translate_text("Cập nhật")?>"> 
			</td>
			</tr>
			</table>
			<input type="hidden" name="Action" value="insert">
			</form>
		<? /*---------Body------------*/ ?>
<?=template_bottom() ?>
<? /*------------------------------------------------------------------------------------------------*/ ?>
</body>
<?
$db_getallmodule->close();
unset($db_getallmodule);
?>