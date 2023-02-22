<? include("config.php");
    $usc_id = getValue("usc_id","int","POST",0);
    $usc_id = (int)$usc_id;

    $new_id = getValue("new_id","int","POST",0);
    $new_id = (int)$new_id;
    
    $sta = getValue("sta","int","POST",0);
    $sta = (int)$sta;
    
    $commen = getValue("commen","str","POST","");
    $commen = trim($commen);
    $commen = replaceMQ($commen);
    
    if($commen !="" && $new_id !="" && $usc_id !=""){
        
       $db_usc_2 = new db_query("SELECT new_user_id FROM new WHERE new_id = ".$new_id);
       $row_usc_2 = mysql_fetch_assoc($db_usc_2->result);
       if($usc_id == $row_usc_2['new_user_id']){
            $query = "INSERT INTO evaluate(new_id,user_id,eva_comment,eva_comment_time,eva_stars,eva_active) 
                                                        VALUES ('".$new_id."','".$usc_id."','".$commen."','".time()."','".$sta."',0)";
       }else{
            $query = "INSERT INTO evaluate(new_id,user_id,eva_comment,eva_comment_time,eva_stars,eva_show_usc) 
                                                        VALUES ('".$new_id."','".$usc_id."','".$commen."','".time()."','".$sta."','".$row_usc_2['new_user_id']."')";
       }
       $db_ex = new db_execute_return();
       $last_id = $db_ex->db_execute($query);
       
       $db_usc_2 = new db_query("SELECT new_user_id FROM new WHERE new_id = ".$new_id);
       $row_usc_2 = mysql_fetch_assoc($db_usc_2->result);
       $db_cm_1 = new db_execute("UPDATE user SET usc_count_comment  = usc_count_comment + 1 WHERE usc_id = ".$row_usc_2['new_user_id']."");
       
       $db_usc = new db_query("SELECT usc_name,usc_birth_day,usc_logo FROM user WHERE usc_id = ".$usc_id);
       $row_usc = mysql_fetch_assoc($db_usc->result);
       
    ?>
    <div class="bl-dg-bl-main">
            <div class="bl-dg-bl-left">
                <span class="bl-dg-bl-name"><?=$row_usc['usc_name']?></span>
                <p><span class="bl-dg-bl-birthday"><?=date('d/m/Y',$row_usc['usc_birth_day'])?></span></p>
                <div class="avata_user_bl">
                    <?
                        if($row_usc['usc_logo'] == ""){?>
                        <img src="/images/detai-avata.png"/>
                        <?}else{ ?>
                        <img src="<?=$row_usc['usc_logo']?>" width="56" height="56"/>
                    <?}?>    
                </div>
            </div>
            <div class="bl-dg-bl-right">
                <div class="votes_gray" style="width: 100px;">
                    <div class="votes_buttons" val="<?=$sta?>">
                        <? for($i=1; $i<= $sta ;$i++){?>
                        <span class="danh_gia_sta_2"><img class="votes_button" src="images/empty.gif" alt=""></span>
                        <?}
                        for($k = 1; $k<= (5-$sta);$k++){?>
                            <span ><img class="votes_button" src="images/empty.gif" alt=""></span>
                        <?}
                        ?>
                    </div>
                </div>
                <div class="bl-dg-bl-right-top">
                    <p><?=$commen?></p>
<!--                    <p>
                        <i>Trả lời</i>
                    </p>
                    <hr>-->
                    <!--<span class="commen_reply"><img src="../images/detail-bl-dg-bl-avata.png"/>Cũng được</span>-->
                </div>
<!--                <div class="bl-dg-bl-right-bottom">
                    <div class="bl-dg-bl-right-avata">
                        <img src="../images/detail-bl-dg-bl-avata.png"/>
                    </div>
                    <div class="bl-dg-bl-text">
                        <textarea cols="72" rows="3" text_cm_="<?=$last_id;?>" style="border-radius: 3px;border: 1px solid #cccccc" ></textarea>
                        <p style="padding-top: 10px;">Bạn cần <span class="btn-top-login">ĐĂNG NHẬP</span> để gửi bình luận và nhận thông báo mới</p>
                        <input type="submit" value="Đăng bình luận" class="hidden input_cm_<?=$last_id?>" onclick="comment_new(<?=$usc_id.','.$new_id.','.$last_id?>)"/>
                    </div>
                </div>-->
            </div>
            <div class="clear"></div>
        </div>
    <?}


?>