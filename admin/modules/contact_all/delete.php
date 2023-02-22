<?
include("inc_security.php");

//check quyền them sua xoa
checkAddEdit("delete");

// Khai bao bien
$record_id		= getValue("record_id","str","POST","0");
$arr_record 	= explode(",", $record_id);

$total 			= 0;
foreach($arr_record as $i=>$record_id){
	$record_id = intval($record_id);

	//Xóa tin khoa csdl
	$sql_del = "DELETE FROM ". $fs_table ." WHERE " . $field_id . " = " . $record_id;
	$db_del = new db_execute($sql_del);
	if($db_del->total > 0){
		$total +=  $db_del->total;
	}
	unset($db_del);
}
echo "Có " . $total . " bản ghi đã được xóa !";
?>