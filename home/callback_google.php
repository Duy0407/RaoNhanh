<?php
session_start();
include("config.php");
$google_client_id 		= '322341252564-acgevfs138crih9gpvik2m0fmt6j1cd7.apps.googleusercontent.com';
$google_client_secret 	= 'tcWMIydCgcH3o6Jdc6YXTxhm';
$google_redirect_url 	= 'https://raonhanh365.vn/home/callback_google.php'; //path to your script
$google_developer_key 	= 'AIzaSyCponlaVwUaFuZhCdYOoThLa1-JqFi6ELw';
require_once 'Google/Google_Client.php';
require_once 'Google/contrib/Google_Oauth2Service.php';

$gClient = new Google_Client();
$gClient->setApplicationName('Raonhanh365');
$gClient->setClientId($google_client_id);
$gClient->setClientSecret($google_client_secret);
$gClient->setRedirectUri($google_redirect_url);
$gClient->setDeveloperKey($google_developer_key);
$google_oauthV2 = new Google_Oauth2Service($gClient);

//If user wish to log out, we just unset Session variable
if (isset($_REQUEST['reset'])) 
{
  unset($_SESSION['token']);
  $gClient->revokeToken();
  header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL)); //redirect user back to page
}

//If code is empty, redirect user to google authentication page for code.
//Code is required to aquire Access Token from google
//Once we have access token, assign token to session variable
//and we can redirect user back to page and login.
if (isset($_GET['code'])) 
{ 
	$gClient->authenticate($_GET['code']);
	$_SESSION['token'] = $gClient->getAccessToken();
	header('Location: ' . filter_var($google_redirect_url, FILTER_SANITIZE_URL));
	return;
}


if (isset($_SESSION['token'])) 
{ 
	$gClient->setAccessToken($_SESSION['token']);
}


if ($gClient->getAccessToken()) 
{
	  //For logged in user, get details from google using access token
	  $user 				   = $google_oauthV2->userinfo->get();
	  $user_id 				= $user['id'];
	  $user_name 			= isset($user['name'])?filter_var($user['name'], FILTER_SANITIZE_SPECIAL_CHARS):'';
	  $email 				= isset($user['email'])?filter_var($user['email'], FILTER_SANITIZE_EMAIL):'';
	  $profile_url 		= isset($user['link'])?filter_var($user['link'], FILTER_VALIDATE_URL):'';
	  $profile_image_url = filter_var($user['picture'], FILTER_VALIDATE_URL);
     $icon_logo         = $profile_image_url."?sz=36";
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
         $logo  = $icon_logo;
         $dir = getimagemeta2(time());
         file_put_contents($dir.$user_id.".png", file_get_contents($logo));
         $query = "INSERT INTO user(usc_name,usc_pass,usc_fb_id,usc_logo,usc_email,usc_type,usc_time) 
                   VALUES('".$user_name."','".md5($user_name.$user_id."123viec")."','".$user_id."','".$dir.$user_id.".png','".$email."',1,'".time()."')";
         $db_ex = new db_execute_return();
         $last_id = $db_ex->db_execute($query);
         setcookie('UT', 1 ,time() + 7*6000,'/');
         setcookie('UID', $last_id ,time() + 7*6000,'/');
         setcookie('PHPSESPASS', md5($user_name.$user_id."123viec") ,time() + 7*6000,'/');
         redirect('/');
      }
	  //$_SESSION['token'] 	= $gClient->getAccessToken();
     unset($user,$user_id,$user_name,$email);
}
else {
	//For Guest user, get google login url
	$authUrl = $gClient->createAuthUrl();
}
?>