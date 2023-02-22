<? 
include("config.php");
   $user_id = getValue("user_id","str","POST","");
   $user_id = trim($user_id);
   
   $address = getValue("maps_address","str","POST","");
   $address = trim($address);
   $address = replaceMQ($address);
   
   $maps_mapcenterlat = getValue("maps_mapcenterlat","str","POST","");
   $maps_mapcenterlat = trim($maps_mapcenterlat);
   $maps_mapcenterlat = replaceMQ($maps_mapcenterlat);
   
   $maps_mapcenterlng = getValue("maps_mapcenterlng","str","POST",0);
   $maps_mapcenterlng = trim($maps_mapcenterlng);
   
   $maps_maplat = getValue("maps_maplat","str","POST",0);
   $maps_maplat = trim($maps_maplat);
   $maps_maplat = replaceMQ($maps_maplat);
   
   $maps_maplng = getValue("maps_maplng","str","POST","");
   $maps_maplng = trim($maps_maplng);
   $maps_maplng = replaceMQ($maps_maplng);
   
   $maps_mapzoom = getValue("maps_mapzoom","str","POST","");
   $maps_mapzoom = trim($maps_mapzoom);
   $maps_mapzoom = replaceMQ($maps_mapzoom);
   
   if($user_id != '')
   {
      $map  =  new db_query("SELECT usc_id FROM map WHERE usc_id = '".$user_id."' LIMIT 1");
      if(mysql_num_rows($map->result) == 0){
        $query5 =  "INSERT INTO map(usc_id, usc_address, maps_mapcenterlat, maps_mapcenterlng, maps_maplat, maps_maplng, maps_mapzoom) 
                VALUES ('".$user_id."','".$address."','".$maps_mapcenterlat."','".$maps_mapcenterlng."','".$maps_maplat."','".$maps_maplng."','".$maps_mapzoom."')";
        $update_add = new db_execute("UPDATE user SET usc_address='".$address."' WHERE usc_id ='".$user_id."'" );
        $db_ex = new db_execute_return();
        $last_id5 = $db_ex->db_execute($query5);
            if($query5){
                echo 1;
            } else {
                echo 0;
            }        
      }else{
       $data = new db_execute("UPDATE map SET usc_address='".$address."',maps_mapcenterlat='".$maps_mapcenterlat."',maps_mapcenterlng='".$maps_mapcenterlng."',maps_maplat='".$maps_maplat."',maps_maplng='".$maps_maplng."',maps_mapzoom='".$maps_mapzoom."' WHERE usc_id ='".$user_id."'" );
       $update_add2 = new db_execute("UPDATE user SET usc_address='".$address."' WHERE usc_id ='".$user_id."'" );
       
            if($data){
                echo 1;
            }else {
                echo 0;
            }       
      }
   
   }
   else {
     echo 0;
   }

?>