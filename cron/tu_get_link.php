<meta http-equiv="refresh" content="10"/>
<?
include("config.php"); 
set_time_limit(0);
$db_qr = new db_query("SELECT * FROM linkcra WHERE lin_active = 0 ORDER BY rand() LIMIT 1");
if(mysql_num_rows($db_qr->result) > 0)
{
   $row = mysql_fetch_assoc($db_qr->result);
   $link = $row['lin_link'];
   $html   = file_get_html($link);
   if(count($html->find("#home .wrap_post .top_block a.links")) != 0)
   {
       foreach($html->find("#home .wrap_post .top_block a.links") as $value){
           $catname = str_replace("./","http://muabanhay.com/",$value->href);
           echo $catname = str_replace("https://www.facebook.com/sharer.php?u=","",$catname);
           echo "<hr>";
           $db_ex = new db_execute("INSERT INTO crawler(cra_link,cra_active,cra_cate,cra_luat) VALUES('".replaceMQ($catname)."','0','".$row['lin_cate']."','".$row['lin_id']."')");  
           unset($db_ex);
       }
   }
   $db_ex2 = new db_execute("UPDATE linkcra SET lin_active = 1 WHERE lin_id = ".$row['lin_id']."");
}
else
{
   header("Location:tu_boc_du_lieu.php");
   echo "Ðã lấy xong link";
}
?>