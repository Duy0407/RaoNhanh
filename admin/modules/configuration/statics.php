<?
require_once("inc_security.php");
require_once("configcombobox.php");
$arrayStatic	= array(
								"con_static_footer"=>translate_text("Footer_page")
								,"con_static_header"=>translate_text("Header page")
								);
//Call Class generate_form();
$myform = new generate_form();
//Loại bỏ chuc nang thay the Tag Html
$myform->removeHTML(0);
/*
1. data_field : Ten truong
2. data_value : Ten form
3. data_type : Kieu du lieu , 0 : string , 1 : kieu int, 2 : kieu email, 3 : kieu double
4. data_store : Noi luu giu data  0 : post, 1 : variable
5. data_default_value : gia tri mac dinh, neu require thi` phai lon hon hoac bang default
6. data_require : du lieu nay co can thiet hay khong
7. data_error_message : Loi dua ra man hinh
8. data_unique : Chỉ có duy nhất trong database
9. data_error_message2 : Loi dua ra man hinh neu co duplicate
*/
//Get all input name
$db_checkField = new db_query("SHOW COLUMNS FROM configuration");
$arrayField = array();
while($row=mysql_fetch_assoc($db_checkField->result)){
	$arrayField[$row["Field"]] = '';
}

foreach($arrayStatic as $key=>$value){
	if(!isset($arrayField[$key])){
		$db_ex = new db_execute("ALTER TABLE `configuration` ADD `" . $key . "` INT( 11 ) NULL DEFAULT '0'");
	}
	$$key = getValue("$key","int","POST",0);
}
//Insert to database
foreach($arrayStatic as $key=>$value){
	$myform->add("$key","$key",1,0,1,0,"",0,"");
}
//Add table
$myform->addTable($fs_table);
//Warning Error!
$errorMsg = "";
//Get Action.
$action	= getValue("action", "str", "POST", "");
if($action == "update"){
	//Check Error!
	$errorMsg .= $myform->checkdata();
	if($errorMsg == ""){
		$db_ex = new db_execute($myform->generate_update_SQL("con_lang_id",$lang_id));
		//echo $myform->generate_update_SQL("con_id",1);
		//Redirect to:
		redirect($_SERVER['REQUEST_URI']);
		exit();
	}
}
//add form for javacheck
$myform->addFormname("setting");
$myform->checkjavascript();
//Select data
$db_data = new db_query("SELECT * FROM configuration WHERE con_lang_id = " . $lang_id);
if (mysql_num_rows($db_data->result) > 0)
{
	$row = mysql_fetch_array($db_data->result);
	foreach($arrayStatic as $key=>$value){
		$$key = $row["$key"];
	}
	$db_data->close();
	unset($db_data);
}
else{
	echo "Cannot find data";
	exit();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
<? $myform->checkjavascript(); ?>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*------------------------------------------------------------------------------------------------*/ ?>
<?=template_top(translate_text("Configuration page satics"))?>

<? if($errorMsg!=''){?><h1 class="error"><?=$errorMsg?></h1><? }?>
<form action="<?=getURL()?>" method="post" name="setting">
<table border="0" cellpadding="5" cellspacing="0" width="100%">
	<?
	//config static module
	$db_static = new db_query("SELECT sta_id,sta_title FROM statics_multi WHERE  statics_multi.lang_id = " . $lang_id  );
	if (mysql_num_rows($db_static->result) > 0) mysql_data_seek($db_static->result,0);
	//loop all static config
	$i=0;
	foreach($arrayStatic as $key=>$value){
	$i++;
	?>
	<tr <? if($i % 2 == 0){ echo "bgcolor='#EEE'"; }else{ echo "bgcolor='#FFF'"; } ?>>
		<td width="30%" nowrap="nowrap">&nbsp;-&nbsp;<b><?=$value;?></b></td>
		<td>
			<?=get_config_combo($db_static->result,$key,$$key);?>
		</td>
	</tr>
	<?
	}
	$db_static->close();
	unset($db_static);
	?>
	<tr>
		<td>&nbsp;</td>
		<td height="30">
			<input type="button" class="bottom" value="<?=translate_text("Cập nhật")?>" style="cursor:hand; width:100px" onClick="validateForm();">&nbsp;
			<input type="reset" class="bottom" value="<?=translate_text("Làm lại")?>" style="cursor:hand; width:100px">
			<input type="hidden" name="action" value="update">
		</td>
	</tr>
<? /*---------------------------------*/ ?>
</form>
</table>
<? template_bottom() ?>
</body>
</html>