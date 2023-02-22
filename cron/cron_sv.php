<meta http-equiv="refresh" content="10"/>
<?
include("config.php"); 
set_time_limit(0);
$db_qr = new db_query("SELECT * FROM linkcra WHERE lin_active = 0 ORDER BY rand() LIMIT 1");
if(mysql_num_rows($db_qr->result) > 0)
{
   $row = mysql_fetch_assoc($db_qr->result);
   $id_fanpage         =   $row['lin_group_id'];
   echo $id_fanpage;
   $app_id             =   '914775181966322';
   $app_secret         =   '8af80733e7c5d9c548f0c76b1d727e57';
   $access_token       =   $app_id.'|'.$app_secret;
   $data               =   file_get_html('https://graph.facebook.com/'.$id_fanpage.'/feed?access_token='.$access_token.'&format=json');
   echo 'https://graph.facebook.com/'.$id_fanpage.'/feed?access_token='.$access_token.'&format=json';
   $array              =   json_decode($data, true);
   foreach($array['data'] as $value){
      if(isset($value['id']) && isset($value['message'])){
         $db_ex = new db_execute("INSERT IGNORE INTO crawler2(cra_id_facebook,cra_city,cra_cate) VALUES ('".$value['id']."','".$row['lin_city']."','".$row['lin_cate']."')");
      }
   }
   $db_ex2 = new db_execute("UPDATE linkcra SET lin_active = 1 WHERE lin_id = ".$row['lin_id']."");
}
else
{
   header("Location:getsv.php");
   echo "Đã lấy xong link";
}
?>