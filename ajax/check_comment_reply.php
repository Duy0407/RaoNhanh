<? include("config.php");

    $usc_id = getValue("usc_id","int","POST",0);
    $usc_id = (int)$usc_id;

    $new_id = getValue("new_id","int","POST",0);
    $new_id = (int)$new_id;
    
    $cm_id = getValue("cm_id","int","POST",0);
    $cm_id = (int)$cm_id;
    
    $commen = getValue("commen","str","POST","");
    $commen = trim($commen);
    $commen = replaceMQ($commen);
    
    if($commen !="" && $new_id !="" && $usc_id !=""){
        $db_usc_2 = new db_query("SELECT new_user_id FROM new WHERE new_id = ".$new_id);
        $row_usc_2 = mysql_fetch_assoc($db_usc_2->result);
        
        $db_cm_3 = new db_query("SELECT user_id FROM evaluate WHERE eva_id =".$cm_id);
        $row_cm_3 = mysql_fetch_assoc($db_cm_3->result);

        if($usc_id == $row_usc_2['new_user_id']){    
            $query = "INSERT INTO evaluate(new_id,user_id,eva_comment,eva_comment_time,eva_parent_id,eva_active,eva_show_usc ) 
                                                         VALUES ('".$new_id."','".$usc_id."','".$commen."','".time()."','".$cm_id."',0,'".$row_cm_3['user_id']."')";
        }else{
            $query = "INSERT INTO evaluate(new_id,user_id,eva_comment,eva_comment_time,eva_parent_id,eva_active,eva_show_usc) 
                                                         VALUES ('".$new_id."','".$usc_id."','".$commen."','".time()."','".$cm_id."',0,'".$row_usc_2['new_user_id']."')";                                                       
        }
       $db_ex = new db_execute_return();
       $last_id = $db_ex->db_execute($query);

       $db_cm_1 = new db_execute("UPDATE user SET usc_count_comment  = usc_count_comment + 1 WHERE usc_id = ".$row_usc_2['new_user_id']."");
       
       $db_usc = new db_query("SELECT usc_name,usc_birth_day,usc_logo FROM user WHERE usc_id = ".$usc_id);
       $row_usc = mysql_fetch_assoc($db_usc->result);
       
    ?>

            <div class="commen_reply">
                <img width="35" height="35" src="<?=($row_usc['usc_logo']!="")?$row_usc['usc_logo']:'/images/detail-bl-dg-bl-avata.png'?>"/>
                <span><?=$commen?></span>
                <div class="clear"></div>
            </div>
    <? }


?>