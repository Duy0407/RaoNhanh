<? include("config.php");   
    $store_name= getValue("store_name","str","POST","0");
    $store_name = str_replace("     ", " ", $store_name);
    $store_name = str_replace("    ", " ", $store_name);
    $store_name = str_replace("   ", " ", $store_name);
    $store_name = str_replace("  ", " ", $store_name);
    $store_name = removeAccent(trim($store_name));
    
    $db_name = new db_query("SELECT usc_store_name FROM user ");
    while ($row_name = mysql_fetch_assoc($db_name->result)){
        $name = $row_name['usc_store_name'];
        $name = removeAccent(trim($name));
        if($store_name == $name){
            echo 1;
            exit();
        }else{
           $data = 0;
        }
    }
    unset($store_name,$db_name,$row_name);
    echo $data;
    
?>