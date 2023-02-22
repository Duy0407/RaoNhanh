<?
require_once("inc_security.php");
//check quyền them sua xoa
checkAddEdit("edit");


$ff_action				= getURL();
$ff_redirect_succ 	= "listing.php";
$ff_redirect_fail 	= "";
$iAdm 					= getValue("iAdm");
$ff_table 				= "admin_user";

$fs_redirect			= base64_decode(getValue("returnurl","str","GET",base64_encode("listing.php")));
$record_id				= getValue("iAdm","int","GET");
$field_id				= "adm_id";
$errorMsg				= "";
$Action 					= getValue("Action","str","POST","");

$arelate_select  			= getValue("arelate_select","arr","POST",array());
$menuid 				= new menu();
$menuid->getArray("categories_multi","cat_id","cat_parent_id"," lang_id = " . $lang_id);
$adm_access_category 	= '';
foreach($arelate_select as $key=>$value){
	$adm_access_category .= '[' . str_replace(",","][",$menuid->getAllChildId($value)) . ']';
}


//Call Class generate_form();
$myform = new generate_form();
$myform->add("adm_email","adm_email",2,0,"",1," Email không chính xác !",0,"");
$myform->add("adm_name","adm_name",0,0,"",0,"",0,"");
$myform->add("adm_phone","adm_phone",0,0,"",0,"",0,"");
$myform->add("adm_all_category","adm_all_category",1,0,0,0,"",0,"");
$myform->add("adm_access_category","adm_access_category",0,1,"",0,"",0,"");
$myform->add("adm_edit_all","adm_edit_all",1,0,0,0,"",0,"");
$myform->add("admin_id","admin_id",1,1,0,0,"",0,"");

$myform->addTable($fs_table);

//Edit user profile
if ($Action =='update')
{
		$errorMsg .= $myform->checkdata();
		if($errorMsg == ""){
			//echo $myform->generate_update_SQL("adm_id",$iAdm); exit();
			$db_ex = new db_execute($myform->generate_update_SQL("adm_id",$iAdm));
			unset($db_ex);
			$module_list  			= getValue("mod_id","arr","POST","");
			$user_lang_id_list  	= getValue("user_lang_id","arr","POST","");
			$arelate_select  		= getValue("arelate_select","arr","POST","");

			$db_delete = new db_execute("DELETE FROM admin_user_right WHERE adu_admin_id =" . $iAdm);
			unset($db_delete);
			if(isset($module_list[0])){
				for ($i=0; $i< count($module_list); $i++){
					$query_str = "INSERT INTO admin_user_right VALUES(" . $iAdm . "," . $module_list[$i] . ", " . getValue("adu_add" . $module_list[$i] , "int","POST") . ", " . getValue("adu_edit" . $module_list[$i] , "int","POST") . ", " . getValue("adu_delete" . $module_list[$i] , "int","POST") . ")";
					$db_ex = new db_execute($query_str);
					unset($db_ex);
				}
			}
			$db_delete = new db_execute("DELETE FROM admin_user_language WHERE aul_admin_id =" . $iAdm);
			unset($db_delete);
			if(isset($user_lang_id_list[0])){
				for ($i=0; $i< count($user_lang_id_list); $i++){
					$query_str = "INSERT INTO admin_user_language VALUES(" . $iAdm . "," . $user_lang_id_list[$i] .")";
					$db_ex = new db_execute($query_str);
					unset($db_ex);
				}
			}
			redirect($ff_redirect_succ);
			exit();
		}
}

//Edit user password
$errorMsgpass = '';
if ($Action =='update_password')
{
	$myform = new generate_form();
	$myform->add("adm_password","adm_password",4,0,"",1,translate_text("Please enter new password"),0,"");
	$myform->addTable($fs_table);
	$errorMsgpass .= $myform->checkdata();
	if($errorMsgpass == ""){
		$db_ex = new db_execute($myform->generate_update_SQL("adm_id",$iAdm));
		unset($db_ex);
		echo '<script>alert("' . translate_text("Your_new_password_has_been_updated") . '")</script>';
		redirect($ff_redirect_succ);
	}
}




//Select access module
$acess_module			= "";
$arrayAddEdit 			= array();
$db_access = new db_query("SELECT *
									FROM admin_user, admin_user_right, modules
									WHERE adm_id = adu_admin_id AND mod_id = adu_admin_module_id AND adm_id =" . $iAdm);
while ($row_access = mysql_fetch_array($db_access->result)){
	$acess_module 			.= "[" . $row_access['mod_id'] . "]";
	$arrayAddEdit[$row_access['mod_id']] = array($row_access["adu_add"],$row_access["adu_edit"],$row_access["adu_delete"]);
}
unset($db_access);

//Select access channel
$access_channel="";
//Select access languages
$access_language="";
$db_access = new db_query("SELECT *
										FROM admin_user, admin_user_language, languages
										WHERE adm_id = aul_admin_id AND languages.lang_id = aul_lang_id AND adm_id =" . $iAdm);
while($row_access = mysql_fetch_array($db_access->result)) $access_language .="[" . $row_access['lang_id'] . "]";
unset($row_access);

//Check user exist or not
$db_admin_sel = new db_query("SELECT *
										  FROM admin_user
										  WHERE adm_id = " . $iAdm);
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
<?=template_top(translate_text("Edit member"))?>
<table cellpadding="5" cellspacing="0" width="100%">
	<tr>
		<td valign="top" class="bold bg">
			<?=translate_text("Sửa thông tin")?>
		</td>
		<td valign="top" class="bold bg">
			<?=translate_text("Thay đổi password")?>
		</td>
	</tr>
	<tr>
		<td>
			<? $row = mysql_fetch_array($db_admin_sel->result); ?>
			<form ACTION="<?=$ff_action;?>" METHOD="POST" name="edit_user">
					<table align="center" cellpadding="4" cellspacing="0" border="0">
						<tr class="bgTableBorder">
							<td class="textBold" colspan="2" align="center"></td>
						</tr>
						<tr>
							<td align="right" nowrap="nowrap" class="textBold"><?=translate_text("Tên đăng nhập")?> :</td>
							<td class="textBold">
								<?=$row['adm_loginname'];?>
							</td>
						</tr>
						<tr <?=$fs_change_bg?>>
							<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Họ tên")?> :</td>
							<td class="textBold">
							<input type="text" name="adm_name" id="adm_name" value="<?=$row["adm_name"]?>" size="50" maxlength="50" class="form">
							</td>
						</tr>
						<tr <?=$fs_change_bg?>>
							<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Điện thoại")?> :</td>
							<td class="textBold">
							<input type="text" name="adm_phone" id="adm_phone" value="<?=$row["adm_phone"]?>" size="50" maxlength="50" class="form">
							</td>
						</tr>
						<tr <?=$fs_change_bg?>>
						<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Email")?> :</td>
						<td> <input type="text" name="adm_email" id="adm_email" value="<?=$row["adm_email"]?>" size="50" maxlength="50" class="form">
						</td>
						</tr>
						<tr <?=$fs_change_bg?>>
						<td align="right" valign="middle" nowrap class="textBold"><?=translate_text("Quyền quản lý")?> :</td>
						<td>
						<table cellpadding="2" cellspacing="0" style="border-collapse:collapse" border="1" bordercolor="#DDF8CC">
							<tr bgcolor="#E0EAF3" height="30">
								<td class="textBold"><?=translate_text("Chọn")?></td>
								<td class="textBold"><?=translate_text("Danh sách")?></td>
								<td class="textBold"><?=translate_text("Thêm")?></td>
								<td class="textBold"><?=translate_text("Sửa")?></td>
								<td class="textBold"><?=translate_text("Xóa")?></td>
							</tr>
							<?
							while ($mod=mysql_fetch_array($db_getallmodule->result)){
								if(file_exists("../../modules/" . $mod["mod_path"] . "/inc_security.php")===true){
								?>
									<tr>
										<td align="center"><input type="checkbox" name="mod_id[]" id="mod_id" value="<?=$mod['mod_id'];?>" <? if (strpos($acess_module, "[" . $mod['mod_id'] . "]") !== false) {?> checked="checked"<? } ?> ></td>
										<td class="textBold"><?=translate_text($mod['mod_name']);?></td>
										<td align="center"><input type="checkbox" name="adu_add<?=$mod['mod_id'];?>" id="adu_add<?=$mod['mod_id'];?>" <? if(isset($arrayAddEdit[$mod['mod_id']])){ if($arrayAddEdit[$mod['mod_id']][0]==1) echo ' checked="checked"'; }?> value="1"></td>
										<td align="center"><input type="checkbox" name="adu_edit<?=$mod['mod_id'];?>" id="adu_edit<?=$mod['mod_id'];?>" <? if(isset($arrayAddEdit[$mod['mod_id']])){ if($arrayAddEdit[$mod['mod_id']][1]==1) echo ' checked="checked"'; }?> value="1"></td>
										<td align="center"><input type="checkbox" name="adu_delete<?=$mod['mod_id'];?>" id="adu_delete<?=$mod['mod_id'];?>" <? if(isset($arrayAddEdit[$mod['mod_id']])){ if($arrayAddEdit[$mod['mod_id']][2]==1) echo ' checked="checked"'; }?> value="1"></td>
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
							<td> <input type="hidden" name="adm_edit_all" <? if($row["adm_edit_all"]==1) echo 'checked="checked"';?> value="1" >
								<?
								$db_getall_languages = new db_query("SELECT *
																	 FROM languages
																	 ORDER BY lang_id ASC");
								$cha_type="";
								?>
								<table cellpadding="2" cellspacing="0">
									<tr>
									<?
									while ($lan=mysql_fetch_array($db_getall_languages->result)){
									?>
										<td><input type="checkbox" name="user_lang_id[]" id="user_lang_id" value="<?=$lan['lang_id'];?>" <? if (strpos($access_language, "[" . $lan['lang_id'] . "]") !== false) {?> checked="checked"<? } ?>></td>
										<td class="textBold"><?=$lan['lang_name'];?></td>
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
								<input type="checkbox" name="adm_all_category" onclick="checkshowlistcat()" id="adm_all_category"  <? if($row["adm_all_category"]==1) echo ' checked="checked"';?> value="1">
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
						<tbody id="showlistcategory" <? if($row["adm_all_category"]==1) echo 'style="display:none"';?> >
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
									<li><input type="checkbox" name="arelate_select[]" <? if(strpos($row["adm_access_category"],"[" . $cat["cat_id"]  . "]")!==false) echo ' checked="checked"'?> value="<?=$cat["cat_id"]?>" /> <?=$cat["cat_name"]?></li>
									<?
									}
									?>
								</ul>
							</td>
						</tr>
						</tbody>
						<tr>
							<td nowrap align="right"></td>
							<td>
								<input type="button" class="bottom" onClick="document.edit_user.submit();" value="<?=translate_text("Cập nhật")?>">
							</td>
						</tr>
					</table>
			<input type="hidden" name="Action" value="update">
			<input type="hidden" name="record_id" value="<?=$row["adm_id"]; ?>">
			</form>
		</td>
		<td align="center" valign="top">
			<form ACTION="<?=$ff_action;?>?iAdm=<?=$iAdm?>" METHOD="POST" name="edit_password" onSubmit="formchangepass(); return false;">
					<table align="center" cellpadding="4" cellspacing="1" bordercolor="#CCCCCC" border="1" style="border-collapse:collapse">
						<?
						if($errorMsgpass!=''){
						?>
							<tr>
								<td colspan="2" style="color:#FF0000"><?=$errorMsgpass?></td>
							</tr>
						<?
						}
						?>
						<tr>
							<td align="right" nowrap="nowrap" class="textBold"><?=translate_text("Mật khẩu mới")?> :</td>
							<td>
								<input type="password" name="adm_password" id="adm_password" size="20" class="form">
							</td>
						</tr>
						<tr>
							<td align="right" nowrap="nowrap" class="textBold"><?=translate_text("Nhập lại mật khẩu")?> :</td>
							<td>
								<input type="password" name="adm_password_con" id="adm_password_con" size="20" class="form">
							</td>
						</tr>
						<tr>
							<td nowrap align="right"></td>
							<td>
								<input type="submit" class="bottom" value="<?=translate_text("Cập nhật")?>" >
							</td>
						</tr>
					</table>
					<input type="hidden" name="Action" value="update_password">
					<input type="hidden" name="record_id" value="<?=$row["adm_id"]; ?>">
			</form>
		</td>
	</tr>
</table>
<script language="javascript">
function formchangepass(){
	if(document.getElementById("adm_password").value==''){
		document.getElementById("adm_password").focus();
		alert("<?=translate_text("Please enter new password")?>");
		return false;
	}
	if(document.getElementById("adm_password").value!=document.getElementById("adm_password_con").value){
		document.getElementById("adm_password_con").focus();
		alert("<?=translate_text("New password and confirm password is not correct")?>");
		return false;
	}
	document.edit_password.submit();
}
</script>
<?=template_bottom() ?>
</body>
<?
$db_admin_sel->close();
unset($db_admin_sel);
?>