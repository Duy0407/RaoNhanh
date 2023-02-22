<? 
include ("inc_security.php"); 
//check quyền them sua xoa
checkAddEdit("edit");

$record_id		=	getValue("record_id");
$sql				=	"";
$value			=	getValue("value");
$filed			=	"pro_hot";
$ajax = 0;

$url				=	base64_decode(getValue("url","str","GET",base64_encode("listing.php")));
$db_category	= new db_execute("UPDATE " . $fs_table . " SET " . $filed . " = " . $value . " WHERE pro_id=" . $record_id);
unset($db_category);
if($ajax!=1){
	redirect($url);
}else{
?>
<img border="0" src="<?=$fs_imagepath?>check_<?=$value?>.gif">
<?
}
?>