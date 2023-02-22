<? include("config.php"); 

if(isset($_COOKIE['UID']))
{
 $userid   = $_COOKIE['UID'];
 $userpass = $_COOKIE['PHPSESPASS'];
 $usertype = $_COOKIE['UT'];
}
    $title = getValue("title","str","POST","");
    $title = str_replace("     ", " ", $title);
    $title = str_replace("    ", " ", $title);
    $title = str_replace("   ", " ", $title);
    $title = str_replace("  ", " ", $title);
    $title = removeAccent(trim($title));
    
    $db_title = new db_query("SELECT new_title FROM new WHERE new_user_id =".$userid);
    while ($row_title = mysql_fetch_assoc($db_title->result)){
        $name = $row_title['new_title'];
        $name = removeAccent(trim($name));
        if($title == $name){
            echo 1;
            exit();
        }else{
           $data = 0;
        }
    }
    unset($title,$db_title,$name,$row_title);
    echo $data;
    
?>