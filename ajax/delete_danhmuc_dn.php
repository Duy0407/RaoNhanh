<?
include("config.php");
$dm_id = getValue("dm_id","str","POST","");
$dm_id = trim($dm_id);
$dm_id = replaceMQ($dm_id);

if($dm_id != ""){
    $data = new db_execute("DELETE FROM danhmuc_dn WHERE dm_id ='".$dm_id."'" );
    if($data){
        $data2 = new db_execute("DELETE FROM danhmuc_dn WHERE dm_parent_id ='".$dm_id."'" );
        echo $dm_id; 
    }    
}



?>
