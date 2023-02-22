<?php
   ob_start();
	include("config.php");
    session_start();
    
    $app_id = "490184768038686";
    $app_secret = "434bb7d610fd99c8b4f315c2410fe533";
    $redirect_uri = urlencode("https://raonhanh365.vn/home/callback.php");    
    $userid=0;
    // Get code value
    $code = $_GET['code'];
    
    // Get access token info
    $facebook_access_token_uri = "https://graph.facebook.com/v2.8/oauth/access_token?client_id=$app_id&redirect_uri=$redirect_uri&client_secret=$app_secret&code=$code";    
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, $facebook_access_token_uri);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
        
    $response = curl_exec($ch); 
    curl_close($ch);
    
    // Get access token
    $aResponse = explode("&", $response);
    $access_token = json_decode($aResponse[0]);
    $access_token = $access_token->access_token;
    // Get user infomation
    $ch = curl_init(); 
    curl_setopt($ch, CURLOPT_URL, "https://graph.facebook.com/me?access_token=$access_token");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);    
    
    $response = curl_exec($ch); 
    curl_close($ch);
    $user = json_decode($response);
    $user_name  =  isset($user->name)?$user->name:'';
	$user_login =  isset($user->email)?$user->email:'';
	$user_id    =  isset($user->id)?$user->id:'';
	$imgsrc = "https://graph.facebook.com/$user_id/picture?width=36&height=36";
   if(isset($user_id))
   {
   if($user_id != '')
   {
    $db_qr = new db_query("SELECT usc_id
                           FROM user
                           WHERE usc_fb_id = $user_id
                           LIMIT 1");  
   }
   } 
 	if(mysql_num_rows($db_qr->result) == 1)
 	{
        $row = mysql_fetch_assoc($db_qr->result);
        setcookie('UT', 1 ,time() + 7*6000,'/');
        setcookie('UID', $row['usc_id'] ,time() + 7*6000,'/');
        setcookie('PHPSESPASS', md5($user_name.$user_id."123viec"),time() + 7*6000,'/');
        redirect('/');
 	}
 	else
 	{ 	
 	  $logo  = "http://graph.facebook.com/".$user_id."/picture?width=50&height=50&redirect=false&" . time();
      $data = json_decode(file_get_contents($logo), true);
      $url = $data["data"]["url"];
      $dir = getimagemeta2(time());
      file_put_contents($dir.$user_id.".png", file_get_contents($url));
 	   $query = "INSERT INTO user(usc_name,usc_pass,usc_fb_id,usc_logo,usc_type,usc_time) 
                VALUES('".$user_name."','".md5($user_name.$user_id."123viec")."','".$user_id."','".$dir.$user_id.".png',1,'".time()."')";
      $db_ex = new db_execute_return();
      $last_id = $db_ex->db_execute($query);
      setcookie('UT', 1 ,time() + 7*6000,'/');
      setcookie('UID', $last_id ,time() + 7*6000,'/');
      setcookie('PHPSESPASS', md5($user_name.$user_id."123viec") ,time() + 7*6000,'/');
      redirect('/');
 	}
ob_end_flush();
?>
