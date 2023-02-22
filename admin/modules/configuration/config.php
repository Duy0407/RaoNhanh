<?
require_once("inc_security.php");
//Call Class generate_form();
$myform = new generate_form();
//Loại bỏ chuc nang thay the Tag Html
$myform->removeHTML(0);
//array chua cac truong ko update
$arrayFieldNotUpdate 	= "'con_id','con_lang_id','con_mod_rewrite'";
$db_config					= new db_query("SELECT * FROM configuration WHERE con_lang_id = " . $lang_id);
$row							= mysql_fetch_array($db_config->result);

//array list update
$arrayField = array(
	// 1 ten truong, 2 kieu, 3 gia tri mac dinh, 4 chieu rong, 5 tieu de
	array("con_site_title",0,1000,90,"Page title","text")
	,array("con_admin_email",0,1000,90,"Email Admin","text")
	# ,array("con_page_size",1,1000,10,"Page width size","text")
	# ,array("con_left_size",1,1000,10,"Cột trái","text")
	# ,array("con_percent",1,40,10,"Phần trăm title","text")
	//,array("con_currency",0,180,10,"Tiền tệ mặc định","text")
	//,array("con_list_currency",0,1000,90,"Các kiểu tiền tệ","text")
	//,array("con_support_online",0,180,90,"Hỗ trợ trực tuyến","textarea")
	,array("con_meta_description",0,180,90,translate_text("Page_infomation"),"textarea")
	,array("con_meta_keywords",0,180,90,translate_text("Google_keyword"),"textarea")	
	,array("con_address",0,180,90,translate_text("Địa chỉ"),"textarea")
	,array("con_map",0,180,90,translate_text("Bản đồ"),"textarea")
	,array("con_facebook",0,0,90,"Facebook","text")
	,array("con_googleplus",0,0,90,"Google plus","text")
	,array("con_youtube",0,0,90,"Youtube","text")
	,array("con_tw",0,0,90,"Twitter","text")
	,array("con_rss",0,0,30,"RSS","text")
	,array("con_admin_email",0,0,30,"Email web","text")
	,array("con_help_product_model",0,0,30,"Model","text")
	,array("con_phone_1",0,0,30,"Hỗ trợ chung","text")
	,array("con_phone_2",0,0,30,"Fax","text")
	,array("con_phone_3",0,0,30,"Hotline","text")
);

//Insert to database
for($i=0;$i<count($arrayField);$i++){
	$myform->add($arrayField[$i][0],$arrayField[$i][0],$arrayField[$i][1],0,"",0,"",0,"");
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
		$db_ex = new db_execute($myform->generate_update_SQL("con_lang_id",$_SESSION["lang_id"]));
		//echo $myform->generate_update_SQL("con_lang_id",$_SESSION["lang_id"]);
		//Redirect to:
		redirect($_SERVER['REQUEST_URI']);
		exit();
	}
}
//add form for javacheck
$myform->addFormname("setting");
$myform->checkjavascript();
//Select data
$db_data = new db_query("SELECT * FROM configuration WHERE con_lang_id = " . $_SESSION["lang_id"]);
if (mysql_num_rows($db_data->result) > 0)
{
	$row = mysql_fetch_array($db_data->result);
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
<?=template_top(translate_text("Configuration"))?>
	<form action="<?=$_SERVER['SCRIPT_NAME'] . "?" . @$_SERVER['QUERY_STRING']?>" method="post" name="setting" enctype="multipart/form-data">
			<? /*---------------------------------*/ ?>
         <? if($errorMsg!=''){?><h1 class="error"><?=$errorMsg?></h1><? }?>
			<table border="0" cellpadding="5" cellspacing="0" width="100%">
				<?
				for($i = 0; $i < count($arrayField); $i++){
				?>
				<tr <?=($i%2==0) ? 'bgcolor="#FFF"' : 'bgcolor="#EEE"' ?>>
					<td width="30%" nowrap="nowrap">
					<b><?=$arrayField[$i][4]?> : </b>
					<td>
						<?
						if($arrayField[$i][5]=="text"){?>
						<input type="text" size="<?=$arrayField[$i][3]?>" class="form" name="<?=$arrayField[$i][0]?>" id="<?=$arrayField[$i][0]?>" value="<?=$row[$arrayField[$i][0]];?>">
						<?
						}
						?>
						<?
						if($arrayField[$i][5]=="textarea"){?>
						<textarea class="form" name="<?=$arrayField[$i][0]?>" id="<?=$arrayField[$i][0]?>" rows="7" cols="<?=$arrayField[$i][3]?>"><?=$row[$arrayField[$i][0]];?></textarea>
						<?
						}
						?>

					</td>
				</tr>
				<?
				}
				?>
            <tr>
            	<td>&nbsp;</td>
               <td>
                  <input type="button" class="bottom" value="<?=translate_text("Cập nhật")?>" style="cursor:hand; width:100px" onClick="validateForm();">&nbsp;
                  <input type="reset" class="bottom" value="<?=translate_text("Làm lại")?>" style="cursor:hand; width:100px">
                  <input type="hidden" name="action" value="update">
               </td>
            </tr>
			</table>
			<? /*---------------------------------*/ ?>
	</form>
<?=template_bottom() ?>
</body>
</html>