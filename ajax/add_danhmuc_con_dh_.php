<?
include("config.php");
$dm_id = getValue("dm_id","str","POST","");
$dm_id = trim($dm_id);
$dm_id = replaceMQ($dm_id);

$dm_name = getValue("dm_name","str","POST","");
$dm_name = trim($dm_name);
$dm_name = replaceMQ($dm_name);

$dm_cate = getValue("dm_cate","str","POST","0");
$dm_cate = trim($dm_cate);
$dm_cate = replaceMQ($dm_cate);

$dm_order = getValue("dm_order","str","POST"," ");
$dm_order = trim($dm_order);
$dm_order = replaceMQ($dm_order);

$dm_active = getValue("dm_active","str","POST","0");
$dm_active = trim($dm_active);
$dm_active = replaceMQ($dm_active);
$dm_active = 1;

$dm_md5 = getValue("dm_name","str","POST","");
$dm_md5 = removeAccent(trim($dm_name));
$dm_md5 = mb_strtolower($dm_md5,'UTF-8');
$dm_md5 = md5($dm_md5);

if($dm_id != '' && $dm_name != '' && $dm_cate != '')
{
   $dat = new db_execute("UPDATE danhmuc_dn SET dm_parent_id='".$dm_cate."',dm_name='".$dm_name."',dm_order='".$dm_order."',dm_active='".$dm_active."',dm_md5='".$dm_md5."' WHERE dm_id ='".$dm_id."'" );
   echo $dm_id;
}

?>