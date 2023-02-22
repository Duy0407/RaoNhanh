<? 
include("config.php");
$check = getValue("postok","str","POST","");
$show = 0;
if($check != '')
{
    if(isset($_COOKIE['UID']))
    {
     $userid   = $_COOKIE['UID'];
     $userpass = $_COOKIE['PHPSESPASS'];
    }
    $account = getValue("usernamedk","str","POST","");
    $account = trim($account);
    $account = replaceMQ($account);
    
    $pass = getValue("mkcu","str","POST","");
    $pass = trim($pass);
    $pass = replaceMQ($pass);
    $pass = md5($pass."raonhanh365");
    
    $passnew = getValue("mkmoi1","str","POST","");
    $passnew = trim($passnew);
    $passnew = replaceMQ($passnew);
    $passnew = md5($passnew."raonhanh365");
   if($userid != '' && $pass != '' && $passnew != '')
    {
       $db_qr = new db_query("SELECT COUNT(*) as total FROM user WHERE usc_id = '".$userid."' AND usc_pass = '".$pass."'");
       $data  = mysql_fetch_assoc($db_qr->result);
       if($data['total'] > 0)
       {
          $dat = new db_execute("UPDATE user SET usc_pass='".$passnew."' WHERE usc_id ='".$userid."'" );
          $db_qq = new db_query("SELECT COUNT(*) as total FROM user WHERE usc_id = '".$userid."' AND usc_pass = '".$passnew."'");
          $dat_a  = mysql_fetch_assoc($db_qq->result);
          if($dat_a['total'] == 1){
              setcookie('PHPSESPASS','',time() -3600);
              setcookie('PHPSESPASS',$passnew,time() + 48*3600,'/');
              setcookie('show','1', time() + 5,'/');
              redirect("/tai-khoan/doi-mat-khau");
          }
       }
       else
       {
           redirect("/") ;
       }
    }
}
?>