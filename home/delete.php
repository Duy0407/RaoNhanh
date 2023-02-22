<?
include("config_vl.php");
$id=$_GET["id"];

$db_ex = new db_query("DELETE FROM luu_vl WHERE id = '".$id."'");  
$db_ex = new db_query("DELETE FROM hocvan_kinhnghiem WHERE id = '".$id."'");  
if(isset($_SERVER['HTTP_REFERER']))
{
  header("Location: ".$_SERVER['HTTP_REFERER']."");
  die();
}
?>