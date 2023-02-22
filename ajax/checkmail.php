<?
    include("config.php");
    $email = getValue("email","str","POST","");
    $email = trim($email);
    $email = replaceMQ($email);
    if($email != '')
    {
       $db_qr = new db_query("SELECT COUNT(*) as total FROM user WHERE usc_email = '".$email."'");
       $data  = mysql_fetch_assoc($db_qr->result);
       if($data['total'] == 0)
       {
          echo 0;
       }
       else
       {
          echo 1;
       }
    }
    else
    {
       redirect('http://google.com.vn');
    }
?>