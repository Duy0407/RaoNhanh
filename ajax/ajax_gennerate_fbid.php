<?
include("config.php");
$idfb = getValue("uid","int","POST",0);
$idfb = (int)$idfb;
if($idfb != 0)
{
    $idfbthat = getfacebookid($idfb);
    $db_ex = new db_execute("UPDATE user SET usc_fb_id_that = '".$idfbthat."' WHERE usc_fb_id = '".$idfb."'");
}
else
{
    $idfbthat = 0;
}
echo $idfbthat;
?>