<?
include ("inc_security.php");

$fs_redirect	= base64_decode(getValue("returnurl","str","GET",base64_encode("listing.php")));
$record_id		= getValue("record_id","int","GET");

$myform 		= new generate_form();
$idNewRecord 	= $myform->copyRecord($fs_table,$field_id,$field_name,$record_id,'',"new_picture",$fs_filepath);
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
if($idNewRecord!=0){
	echo '<script language="javascript">alert("' . translate_text("You have successfully duplicated") . '!");</script>';
}else{
	echo '<script language="javascript">alert("' . str_replace("'","\'",translate_text("You have not successfully duplicated")) . '!");</script>';
}
redirect($fs_redirect);
?>