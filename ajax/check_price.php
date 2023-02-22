<?
include("config.php");
    $usc_id = getValue("usc_id","int","POST",0);
    $usc_id = (int)$usc_id;

    $price = getValue("price","int","POST",0);
    $price = (int)$price;
    
    $db_price = new db_query("SELECT usc_money FROM user WHERE usc_id = '".$usc_id."' LIMIT 1");
    $data  = mysql_fetch_assoc($db_price->result);
    if($data['usc_money'] >= $price){
        echo 1;
    } else {
       echo 0; 
    }
?>
