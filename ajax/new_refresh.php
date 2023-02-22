<?
include("config.php");
$newid  = getValue("newid",'int',"POST",0);
$newid  = (int)$newid;

// $cout_refresh = new db_query("SELECT new_count_refresh FROM new WHERE new_user_id = ".$_COOKIE['UID']." AND new_count_refresh = 1");
// $row_cout = mysql_num_rows($cout_refresh->result);
// if($row_cout < 6)
// {
  if($newid != 0)
  {
     $db_usc    = new db_query("SELECT usc_money,usc_id FROM new LEFT JOIN user ON new.new_user_id = user.usc_id WHERE new_id = ".$newid);
     $row_usc    = mysql_fetch_assoc($db_usc->result);
     $db_new = new db_execute("UPDATE new SET new_update_time = ".time().",new_count_refresh = 1  WHERE new_id = ".$newid."");
     echo 1;
  }
// }
// else
// {
//     if($newid != 0){
//      $db_usc    = new db_query("SELECT usc_money,usc_id FROM new LEFT JOIN user ON new.new_user_id = user.usc_id WHERE new_id = ".$newid);
//      $row_usc    = mysql_fetch_assoc($db_usc->result);
//      if($row_usc['usc_money'] >= 500){
//          $db_new = new db_execute("UPDATE new SET new_update_time = ".time().",new_count_refresh = 2  WHERE new_id = ".$newid."");
//          $db_ex10 = new db_execute("UPDATE user SET usc_money = usc_money - 500 WHERE usc_id = ".$row_usc['usc_id']);
//          echo 1;
//      }else{
//          echo 0;
//      }
//   }
// }

//if(isset ($_POST['check_all'])){
//    $check_all = $_POST['check_all'];
//    foreach ($check_all as $key => $value) {
//        $db_new = new db_execute("UPDATE new SET new_update_time = ".time()."  WHERE new_id = ".$value."");
//    }
//}else{
//    if($newid != 0){
//        $db_new = new db_execute("UPDATE new SET new_update_time = ".time()."  WHERE new_id = ".$newid."");  
//        echo 'aa';
//    }
//}
?>