<? 
include ("inc_security.php"); 

#+
#+ Kiem tra quyen them sua xoa
checkAddEdit("edit");

#+
#+ Khai bao bien
$record_id		=	getValue("record_id");
$sql			=	"";
$type			=	getValue("type","str","GET","",1);
$value			=	getValue("value");
$filed			=	"";
$url			=	base64_decode(getValue("url","str","GET",base64_encode("listing.php")));
$ajax			=	getValue("ajax");

switch($type){
	case "int_active":
		$filed	=	"int_active";
	break;
	default:
		$filed	=	"int_active";
		$value	=	0;
	break;
}

if($ajax==1){
	$query = "SELECT " . $filed . " FROM " . $fs_table . " WHERE int_id=" . $record_id;
	$db_select = new db_query($query);
	if($row=mysql_fetch_assoc($db_select->result)){	
		$value = abs($row[$filed]-1);
	}
}

$query 	= "UPDATE " . $fs_table . " SET " . $filed . " = " . $value . " WHERE lang_id = " . $_SESSION["lang_id"] . " AND mnu_id=" . $record_id;
$db_ex	= new db_execute($query);
unset($db_ex);
//echo $query.'<br>';

if($ajax!=1){
	redirect($url);
}else{
	?><img border="0" src="<?=$fs_imagepath?>check_<?=$value?>.gif"><?
}
?>