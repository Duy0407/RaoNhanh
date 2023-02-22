<?
include("config.php");
?>
    <meta http-equiv="refresh" content="10"/>
<?
set_time_limit(-1);
ini_set('memory_limit',-1);
$db_qr = new db_query("SELECT * FROM crawler  WHERE cra_active = 0 ORDER BY rand() LIMIT 1");
if(mysql_num_rows($db_qr->result) > 0)
{
   //L?y tin
   $row = mysql_fetch_assoc($db_qr->result);
   //$link = file_get_contents($row['cra_link']);
   //echo $link;
   echo $row['cra_link'];
   echo "<hr>";
   $link = file_get_html($row['cra_link']);
   //B?ng lu?t website
   $title = $link->find("h1",0)->plaintext;
   $title = ucfirst($title);
   echo $title."<hr>"; 
   $price = $link->find(".fz20",0)->plaintext;
   $price = str_replace(",","",$price);
   $price = str_replace(",","",$price);
   $price = str_replace("d","",$price);
   $price = trim($price);
   if($price == "Liên hệ")
   {
     $price = 0;
   }
   echo $price."<hr>";
   $content = $link->find(".fz20",0)->next_sibling()->plaintext;
   $content = removeLink($content);
   $content = trim(ucfirst($content));
   echo $content."<hr>";
   $city = $link->find(".wrap_location",0)->plaintext;
   $city = trim($city);
   $location = '';
   if($city == "Hà Nội")
   {
     $location = 1;
   }
   else if($city == "Hồ Chí Minh")
   {
     $location = 45;
   }
   else
   {
     $db_qrcity = new db_query("SELECT * FROM city ORDER BY cit_id ASC");
     While($row9 = mysql_fetch_assoc($db_qrcity->result))
     {
        $citname = $row9['cit_name'];
        $citname = strtolower($citname);
        $timk = strtolower($content);
        if(preg_match("/".$citname."/",$timk))
        {
            $location = $row9['cit_id'];
            break;
        }
     }
     if($location == '')
     {
        $location = 0;
     }
     
   }
   echo $location."<hr>";
   $linkmb = str_replace("muabanhay.com","m.muabanhay.com",$row['cra_link']);
   $getmb = file_get_html($linkmb);
   $listimg = $getmb->find(".box_image_dt .box_img_dt img");
   foreach($listimg as $element)
   {
      $listimg2[] =  $element->src;
   }
   $strimg = implode(";",$listimg2);
   echo $strimg."<hr>";
   if(preg_match("/(\\+84|0)\\d{9,10}/",$content,$matches))
   {
     $phone = $matches[0];
   }
   else
   {
    $phone = 0;
   }
   echo $phone."<hr>";
   $ctfbid = $link->find(".btn-messenger",0)->href;
   $ctfbid = explode("=",$ctfbid);
   if($ctfbid[2] != 0)
   {
        $idfbthat = $ctfbid[2];
   }
   else
   {
        $idfb = $link->find(".img-circle",0)->src;
        $idfb = str_replace("https://graph.facebook.com/","",$idfb);
        $idfb = str_replace("/picture?width=300&height=300","",$idfb);
        $idfbthat = 0;
   }
    echo $idfb."<hr>";
    $logo  = "http://graph.facebook.com/".$idfb."/picture?width=50&height=50&redirect=false&" . time();
    $data = json_decode(file_get_contents($logo), true);
    $url = $data["data"]["url"];
    $dir = getimagemeta2(time());
    file_put_contents($dir.$idfb.".png", file_get_contents($url));  
    echo $dir.$idfb.".png"."<hr>";
    $nameuser = $link->find(".name_author a",0)->plaintext;
    echo $nameuser."<hr>";
    if($title != '' && $content != '')
    {
        $db_qrus = new db_query("SELECT usc_id FROM user WHERE usc_fb_id = '".$idfb."' LIMIT 1");
        if(mysql_num_rows($db_qrus->result) == 0)
        {
            $pass = md5($nameuser.$idfb."123viec"); 
            $query = "INSERT INTO user(usc_name,usc_pass,usc_phone,usc_fb_id,usc_fb_id_that,usc_logo,usc_time)
                VALUES('".$nameuser."','".$pass."','".$phone."','".$idfb."','".$idfbthat."','".$dir.$idfb.".png','".time()."')";
            $db_ex4 = new db_execute_return();
            $last_id4 = $db_ex4->db_execute($query);
          }
          else
          {
            $rowus = mysql_fetch_assoc($db_qrus->result);
            $last_id4 = $rowus['usc_id'];
          }
          $qr = "INSERT INTO new(new_title,new_money,new_cate_id,new_city,new_user_id,new_image,new_create_time,new_update_time,new_type,new_active,new_like)
                                 VALUES('".$title."','".$price."','".$row['cra_cate']."','".$location."','".$last_id4."','".$strimg."','".time()."','".time()."','0','1','0')";
          $db_ex = new db_execute_return();
          $last_id = $db_ex->db_execute($qr);
          $db_ex8 = new db_execute("INSERT INTO new_description(new_id,new_description) VALUES ('".$last_id."','".$content."')");
    }
    $db_ex4 = new db_execute("UPDATE crawler SET cra_active = 1 WHERE cra_id = '".$row['cra_id']."'");
    unset($strimg,$listimg2);
} 
else
{
    $db_ex6 = new db_execute("UPDATE linkcra SET lin_active = 0 ");  
    header("Location:tu_get_link.php"); 
}
?>