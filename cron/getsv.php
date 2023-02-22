<meta http-equiv="refresh" content="5"/>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8"/>
<?
include("config.php"); 
$app_id             =   '914775181966322';
$app_secret         =   '8af80733e7c5d9c548f0c76b1d727e57';
$access_token       =   $app_id.'|'.$app_secret;
set_time_limit(0);
$db_qr = new db_query("SELECT * FROM crawler2 WHERE cra_active = 0 ORDER BY rand() LIMIT 1");
if(mysql_num_rows($db_qr->result)>0)
{
   $row = mysql_fetch_assoc($db_qr->result);
   $idbai = $row['cra_id_facebook'];
   $link = file_get_html('https://graph.facebook.com/'.$idbai.'/?access_token='.$access_token);
   $link = json_decode($link,true);
   echo "ID tin:".$idbai;
   echo "<hr/>";
   echo "Nội dung: ".$link['message'];
   if(preg_match("/sim/",$link['message']))
   {
      $db_ex4 = new db_execute("UPDATE crawler2 SET cra_active = 1 WHERE cra_id = '".$row['cra_id']."'");
      echo "<meta http-equiv='refresh' content='1'/>";
   }
   echo "<hr>";
   if(preg_match("/-/",$link['message']))
   {
        $arrtit = explode("-",$link['message']);
        if($arrtit[0] != '')
        {
            $titlenotcut = $arrtit[0];
            $title = cut_string($titlenotcut,70,'');
            $title = mb_ucfirst($title,'UTF-8');
        }else
        {
            $title = '';
        }   
   }
   else
   {
    $title = '';
   }
   if(preg_match('/FREE/',$title))
   {
    $title = str_replace("FREE","",$title);
    $price = splitPrice($link['message']);
   }
   else
   {
        $price = explode("₫",$titlenotcut);
        $price = $price[1];
        if($price != '')
        {
         $title = str_replace("₫".$price,"",$title);
         $title = trim($title);
         $price = getpricefb($price);
        }
   }
   if($price == '')
   {
      $price = splitPrice($link['message']);
   }
   $title = htmlspecialbo($title);
   $phone = preg_match("/(\\+84|0)\\d{9,10}/",$link['message'],$maches);
   if($maches[0])
   {
    $phone = $maches[0];
   }
   else
   {
    $phone = 0;
   }
   echo "Số điện thoại: ".$maches[0];
   echo "<hr>";
   echo "Giá: ".$price;
   echo "<hr/>";
   echo "Tiêu đề: ".$title;
   echo "<hr>";
   echo "Thời gian đăng: ".$link['created_time'];
   echo "<hr>";
   $link2 = file_get_html('https://graph.facebook.com/'.$idbai."?fields=from&access_token=$access_token&format=json");
   $link2 = json_decode($link2,true);
   echo "Tên người đăng :".$link2['from']['name'];
   echo "<hr>";
   echo "ID facebook người đăng :".$link2['from']['id'];
   echo "<hr>";
   $image = file_get_html('https://graph.facebook.com/v2.7/'.$idbai.'/attachments?access_token='.$access_token.'&format=json');
   $image = json_decode($image,true);
   if(isset($image['data'][0]['subattachments']['data']))
   {
      foreach($image['data'][0]['subattachments']['data'] as $vimg){
          $arr_img[]    =   $vimg['media']['image']['src'];
      }
      $list_img = implode(";",$arr_img);
   }
   else if(isset($image['data'][0]['media']['image']['src']))
   {
      $list_img = $image['data'][0]['media']['image']['src'];
   }
   else
   {
      $list_img = '';
   }
   if($link['message'] != '' && $title != '' && $price != '')
   {
      $db_qrus = new db_query("SELECT usc_id FROM user WHERE usc_fb_id = '".$link2['from']['id']."' LIMIT 1");
      if(mysql_num_rows($db_qrus->result) == 0)
      {
        $pass = md5($link2['from']['name'].$link2['from']['id']."123viec");
        $namelogo = generate_name($link2['from']['id']).".png";
        $logo  = "http://graph.facebook.com/".$link2['from']['id']."/picture?width=50&height=50&redirect=false&" . time();
        $data = json_decode(file_get_contents($logo), true);
        $url = $data["data"]["url"];
        $dir = getimagemeta2(time());
        file_put_contents($dir.$link2['from']['id'].".png", file_get_contents($url));  
        $query = "INSERT INTO user(usc_name,usc_pass,usc_phone,usc_fb_id,usc_fb_id_that,usc_logo)
            VALUES('".$link2['from']['name']."','".$pass."','".$phone."','".$link2['from']['id']."','".$link2['from']['id']."','".$dir.$link2['from']['id'].".png')";
        $db_ex4 = new db_execute_return();
        $last_id4 = $db_ex4->db_execute($query);
      }
      else
      {
        $rowus = mysql_fetch_assoc($db_qrus->result);
        $last_id4 = $rowus['usc_id'];
      }
      $qr = "INSERT INTO new(new_title,new_money,new_cate_id,new_city,new_user_id,new_image,new_create_time,new_update_time,new_type,new_active)
                             VALUES('".$title."','".$price."','".$row['cra_cate']."','".$row['cra_city']."','".$last_id4."','".$list_img."','".time()."','".time()."','0','1')";
      $db_ex = new db_execute_return();
      $last_id = $db_ex->db_execute($qr);
      $db_ex8 = new db_execute("INSERT INTO new_description(new_id,new_description) VALUES ('".$last_id."','".$link['message']."')");
      //if($comment > 0)
//      {
//         
//         foreach($link['comments']['data'] as $type => $item)
//         {
//            if($item['message'] != '')
//            {
//               
//               echo "INSERT INTO new_comment(cm_id,cm_content,cm_id_user,cm_name_user,cm_time) VALUES ('".$last_id."','".$item['message']."','".$item['from']['id']."','".$item['from']['name']."','".strtotime($item['created_time'])."')"."<br/>";
//               $db_ex2 = new db_execute("INSERT INTO new_comment(cm_id,cm_content,cm_id_user,cm_name_user,cm_time) VALUES ('".$last_id."','".replaceMQ($item['message'])."','".$item['from']['id']."','".replaceMQ($item['from']['name'])."','".strtotime($item['created_time'])."')");
//            }        
//         }
//      }
//      else
//      {
//         $db_ex2 = new db_execute("INSERT INTO new_comment(cm_id,cm_content,cm_id_user,cm_name_user,cm_time) VALUES ('".$last_id."','','','','')");
//      }
   }
   $db_ex4 = new db_execute("UPDATE crawler2 SET cra_active = 1 WHERE cra_id = '".$row['cra_id']."'");
}
else
{
   $db_ex6 = new db_execute("UPDATE linkcra SET lin_active = 0 ");  
   header("Location:cron_sv.php");
}
?>