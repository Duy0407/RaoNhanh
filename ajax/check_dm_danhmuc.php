<?php include ("config.php");
$user_id = getValue("usc_id","str","POST","");
$user_id = trim($user_id);

$dm_name = getValue("dm_name","str","POST","0");
$dm_name = str_replace("     ", " ", $dm_name);
$dm_name = str_replace("    ", " ", $dm_name);
$dm_name = str_replace("   ", " ", $dm_name);
$dm_name = str_replace("  ", " ", $dm_name);
$dm_name = removeAccent(trim($dm_name));
$dm_name = mb_strtolower($dm_name,'UTF-8');
$dm_name = md5($dm_name);

$db_qr = new db_query("SELECT cat_id FROM category WHERE cat_md5 = '".$dm_name."'LIMIT 1");
$db_dm = new db_query("SELECT dm_id FROM danhmuc_dn WHERE dm_usc_id = '".$user_id."' AND dm_md5 = '".$dm_name."'LIMIT 1");
if(mysql_num_rows($db_qr->result) == 0 && mysql_num_rows($db_dm->result) == 0)
{
    echo 0;
}
else
{
    echo 1;
}
?>
