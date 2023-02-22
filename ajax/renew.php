<?
include("config.php");
$newid = getValue("newid",'int',"POST",0);
if($newid != 0)
{
   $dbex = new db_execute("UPDATE new SET new_update_time = ".time()." WHERE new_id = ".$newid."");
}
?>