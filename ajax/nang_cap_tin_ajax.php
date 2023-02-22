<? include("config.php"); 

$price        = getValue("price","int","POST",0);
$price        = (int)$price;

$usc_id        = getValue("usc_id","int","POST",0);
$usc_id        = (int)$usc_id;

$usc_type        = getValue("usc_type","int","POST",0);
$usc_type       = (int)$usc_type;

$new_id        = getValue("new_id","int","POST",0);
$new_id       = (int)$new_id;

$city        = getValue("name_city","int","POST",0);
$city        = (int)$city;


if($price != 0 && $usc_id !=0 && $new_id !=0 && $usc_type !=0){
   $db_usc    = new db_query("SELECT usc_money FROM user WHERE usc_id = ".$usc_id);
   $row_usc    = mysql_fetch_assoc($db_usc->result);
   
   if($row_usc['usc_money'] >= $price){
        $db_ex9 = new db_execute("UPDATE new SET new_type = ".$usc_type.",new_authen = 1  WHERE new_id = ".$new_id."");
        $db_ex10 = new db_execute("UPDATE user SET usc_money = usc_money - ".$price." WHERE usc_id = ".$usc_id."");
        echo $price;
   } else {
        echo 0;
   }
}else{
    echo 0;
}



?>
