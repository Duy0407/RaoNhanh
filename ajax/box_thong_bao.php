<?
include("config.php");
$box_tb = getValue("box_tb","str","POST","");//
$box_tb = trim($box_tb);
$box_tb = replaceMQ($box_tb);

$box_href = getValue("box_href","str","POST","");//
$box_href = trim($box_href);
$box_href = replaceMQ($box_href);


$box_href = sql_injection_rp($box_href);


if($box_tb != '')
{
   $db_qr = new db_query("UPDATE evaluate SET eva_active = 1 WHERE eva_id =".$box_tb);
   echo $box_href;
}

?>