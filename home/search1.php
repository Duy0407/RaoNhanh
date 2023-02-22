<?
include("config.php");
$link = '';
$sq = '';
$keyword   = getValue("keyword","str","POST","");
$catid = getValue("catid","int","GET",0);
$catid = (int)$catid;
if($keyword != "")
{
   $link = "/search?keyword=".$keyword;
}
header("Location: $link");
die();
?>