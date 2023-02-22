<?php
include("config.php");
 $new_id_tin = getValue("new_id_tin","int","POST",0);
 $new_active = getValue("new_active","int","POST",0);

 if(isset($_COOKIE['UID'])){
    if($new_id_tin != 0){
       if($new_active ==1 ){
        $check_hienthitin = new db_query("UPDATE new SET new_active = 0 WHERE new_id ='$new_id_tin'");
       }else{
        $check_hienthitin = new db_query("UPDATE new SET new_active = 1 WHERE new_id ='$new_id_tin'");
       }
    }else{
        echo "Thông tin không đầy đủ";
    }
 }else{
    echo "Vui lòng đăng nhập";
 }
?>