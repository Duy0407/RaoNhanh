<?
include("config.php");
$ID = getValue('id','int','POST',0);
$ID = (int)$ID;

$page = getValue('page','int','POST',1);
$page = (int)$page;
$cm_limit =10;
$cm_start =($page -1)*$cm_limit;
$url = getValue('url','str','POST',"");
$url = sql_injection_rp($url);

$sort = getValue('sort','str','POST',1);
$sort = (int)$sort;

$sql_sort = ($sort==1)?'DESC':'ASC';
if ($url !="" && $page > 0 && $sort > 0) {
    //lấy lượt like của tin
    $qr_like_news = new db_query("SELECT lk_id, lk_for_url, lk_type, lk_for_comment, lk_user_name, lk_user_avatar, lk_user_idchat, lk_ip, lk_time FROM cm_like WHERE lk_for_url = '".$url."' AND lk_for_comment = 0 AND lk_type < 8 ORDER BY lk_type ASC");
    $arr_likes_new = $qr_like_news->result_array();

    // lấy danh sách bình luận
    $qr_comments = new  db_query("SELECT * FROM cm_comment WHERE cm_url = '".mysql_escape_string($url)."' AND cm_parent_id= 0 ORDER BY cm_time ".$sql_sort." LIMIT $cm_start,$cm_limit");
    $arr_comments = $qr_comments->result_array('cm_id');
    $arr_cm = array();


    foreach ($arr_comments as $key=>$val_comments){
        $arr_rl = array();
        // lấy lượt like của từng bình luận và gắn vào mảng
        $qr_likes = new db_query("SELECT lk_id, lk_for_url, lk_type, lk_for_comment, lk_user_name, lk_user_avatar, lk_user_idchat, lk_ip, lk_time FROM cm_like WHERE lk_for_url = '".$url."' AND lk_type < 8 AND lk_for_comment = ".$val_comments['cm_id']." ORDER BY lk_type ASC");
        $arr_likes = $qr_likes->result_array();
        // lấy nội dùng trả lời
        $qr_reply = new db_query("SELECT * FROM cm_comment WHERE cm_url = '".mysql_escape_string($url)."' AND cm_parent_id= ".$val_comments['cm_id']." ORDER BY cm_time ASC");
        $arr_reply = $qr_reply->result_array();

        foreach ($arr_reply as $key_r => $val_r){
            // lấy lượt like của từng trả lời
            $qr_like = new db_query("SELECT lk_id, lk_for_url, lk_type, lk_for_comment, lk_user_name, lk_user_avatar, lk_user_idchat, lk_ip, lk_time FROM cm_like WHERE lk_for_url = '".$url."' AND lk_type < 8 AND lk_for_comment = ".$val_r['cm_id']." ORDER BY lk_type ASC");
            $arr_like = $qr_like->result_array();
            $arr_rl[$key_r] =$val_r;
            $arr_rl[$key_r]['likes'] = $arr_like;
        }
        // gán mọi thông tin vào mảng mới
        $arr_cm[$key] = $val_comments;
        $arr_cm[$key]['likes'] = $arr_likes;
        $arr_cm[$key]['reply'] = $arr_rl;
    }
    foreach ($arr_cm as $val_cm):
        $val_cm['cm_tag'] = json_decode($val_cm['cm_tag'],true);
        if (is_array($val_cm['cm_tag'])) {
            foreach ($val_cm['cm_tag'] as $key => $value) {
                $link_cm = 'https://chat365.timviec365.vn/chat-'.base64_encode($value[0]);
                $val_cm['cm_comment'] = str_replace($value[1],'<a target="_blank" rel="nofollow" href="'.$link_cm.'">'.str_replace('@','',$value[1]).'</a>',$val_cm['cm_comment']);
            }
        }

        $check_like_cm = (count($val_cm['likes'])>0 && count(search($val_cm['likes'],'lk_user_idchat',$ID)) > 0)?search($val_cm['likes'],'lk_user_idchat',$ID)[0]:[];
        ?>
        <div class="cm_comment <?=(count($val_cm['reply'])>0)?"cm_has_reply":""?>">
            <div class="cm_content cm_<?=$val_cm['cm_id']?>" data="<?=$val_cm['cm_id']?>" data-pr="<?=$val_cm['cm_id']?>">
                <img  src="<?=$val_cm['cm_sender_avatar']?>" alt="<?=$val_cm['cm_sender_name']?>n" onerror="this.onerror=null;this.src='https://timviec365.vn/images/user_no.png';">
                <div class="cm_box frame_cm_box">
                    <div class="cm_cm_ct">
                        <p class="cm_content_user"><?=$val_cm['cm_sender_name']?></p>
                        <p class="cm_nd"><?=nl2br($val_cm['cm_comment'])?></p>
                    </div>
                    <div class="cm_cm_ev">
                        <div class="cm_list_ev">
                            <span class="like_cm <?=(count($check_like_cm)>0)?"active":""?>" onclick="like_url_cm(this,0,'like_cm','cm_cm_ev')" onmousemove="show_ic(this,'cm_list_ev')" ontaphold="show_ic(this,'cm_list_ev')"><span class="like_cm_txt <?=($check_like_cm['lk_type']==1)?"liked":((in_array($check_like_cm['lk_type'],[3,4,6,7]))?"yll":((in_array($check_like_cm['lk_type'],[2,5]))?"red":""))?>"><?=(count($check_like_cm)>0)?$icon_name[$check_like_cm['lk_type']]:"Thích"?></span> |</span>
                            <span class="reply_cm" onclick="reply_cm(this)">Phản hồi |</span>
                            <span class="time_cm"><?=time_elapsed_string_cm($val_cm['cm_time'])?></span>
                            <div class="show_ic" onmouseleave="hide_ic(this,'cm_list_ev')">
                                <?for ($i=1;$i<=7;$i++):?>
                                <span class="cm_like_ic" data="<?=$i?>" onclick="like_url_cm(this,<?=$i?>,'like_cm','cm_cm_ev')">
                                    <img src="/images/img_comment/Ic_<?=$i?>.png" alt="icon<?=$i?>">
                                </span>
                                <?endfor;?>
                            </div>
                        </div>

                        <span class="cm_list_like">
                            <span class="cm_count_like count_ic"><?=(count($val_cm['likes'])>0)?count($val_cm['likes']):""?></span>
                            <span class="box_items_like_ic">
                                <?for($i=1;$i<=7;$i++):?>
                                <span class="cm_like_ic">
                                    <img class="item_like_ic <?=(count($check_like_cm)>0 && count(search($check_like_cm,'lk_type',$i))==1)?"icon_new":""?> <?=(count($val_cm['likes'])>0 && count(search($val_cm['likes'],'lk_type',$i)) > 1 )?"show_vip":((count($val_cm['likes'])>0 && count(search($val_cm['likes'],'lk_type',$i))>0)?"show":"")?> ic<?=$i?>" src="/images/img_comment/Ic_<?=$i?>.png" alt="<?=$icon_name[$i]?>">
                                </span>
                                <?endfor;?>
                            </span>
                        </span>

                    </div>
                    <?$rl=1; foreach ($val_cm['reply'] as $val_reply):
                    $val_reply['cm_tag'] = json_decode($val_reply['cm_tag'],true);
                    if (is_array($val_cm['cm_tag'])) {
                        foreach (@$val_reply['cm_tag'] as $key => $value) {
                            $link_rl = 'https://chat365.timviec365.vn/chat-'.base64_encode($value[0]);
                            $val_reply['cm_comment'] = str_replace($value[1],'<a target="_blank" rel="nofollow" href="'.$link_rl.'">'.str_replace('@','',$value[1]).'</a>',$val_reply['cm_comment']);
                        }
                    }                    
                    $check_like_rl = (count($val_reply['likes'])>0 && count(search($val_reply['likes'],'lk_user_idchat',$ID)) > 0)?search($val_reply['likes'],'lk_user_idchat',$ID)[0]:[];
                    ?>
                    <div class="cm_content cm_<?=$val_reply['cm_id']?> cm_reply_box" data="<?=$val_reply['cm_id']?>" data-pr="<?=$val_cm['cm_id']?>">
                        <?if($rl == count($val_cm['reply'])):?>
                        <span class="line_reply1"></span>
                        <?endif;?>
                        <span class="line_reply2"></span>
                        <img src="<?=$val_reply['cm_sender_avatar']?>" alt="<?=$val_reply['cm_sender_name']?>" onerror="this.onerror=null;this.src='https://timviec365.vn/images/user_no.png';">
                        <div class="cm_box ">
                            <div class="cm_cm_ct">
                                <p class="cm_content_user"><?=$val_reply['cm_sender_name']?></p>
                                <p class="cm_nd"><?=nl2br($val_reply['cm_comment'])?></p>
                            </div>
                            <div class="cm_cm_ev">
                                <div class="cm_list_ev">
                                    <span class="like_cm <?=(count($check_like_cm)>0)?"active":""?>"  onclick="like_url_cm(this,0,'like_cm','cm_cm_ev')" onmousemove="show_ic(this,'cm_list_ev')" ontaphold="show_ic(this,'cm_list_ev')"><span class="like_cm_txt <?=($check_like_rl['lk_type']==1)?"liked":((in_array($check_like_rl['lk_type'],[3,4,6,7]))?"yll":((in_array($check_like_rl['lk_type'],[2,5]))?"red":""))?>"><?=(count($check_like_rl)>0)?$icon_name[$check_like_rl['lk_type']]:"Thích"?></span> |</span>
                                    <span class="reply_cm" onclick="reply_cm(this)">Phản hồi |</span>
                                    <span class="time_cm"><?=time_elapsed_string_cm($val_reply['cm_time'])?></span>
                                    <div class="show_ic" onmouseleave="hide_ic(this,'cm_list_ev')">
                                        <?for ($i=1;$i<=7;$i++):?>
                                        <span class="cm_like_ic" data="<?=$i?>" onclick="like_url_cm(this,<?=$i?>,'like_cm','cm_cm_ev')">
                                            <img src="/images/img_comment/Ic_<?=$i?>.png" alt="icon<?=$i?>">
                                        </span>
                                        <?endfor;?>
                                    </div>
                                </div>

                                <span class="cm_list_like">
                                    <span class="cm_count_like count_ic"><?=(count($val_reply['likes']) >0)?count($val_reply['likes']):""?></span>
                                    <span class="box_items_like_ic">
                                        <?for($i=1;$i<=7;$i++):?>
                                        <span class="cm_like_ic">
                                            <img class="item_like_ic <?=(count($check_like_rl)>0 && count(search($check_like_rl,'lk_type',$i))==1)?"icon_new":""?> <?=(count($val_reply['likes'])>0 && count(search($val_reply['likes'],'lk_type',$i)) > 1 )?"show_vip":((count($val_reply['likes'])>0 && count(search($val_reply['likes'],'lk_type',$i))>0)?"show":"")?> ic<?=$i?>" src="/images/img_comment/Ic_<?=$i?>.png" alt="<?=$icon_name[$i]?>">
                                        </span>
                                        <?endfor;?>
                                    </span>
                                </span>

                            </div>
                        </div>
                    </div>
                    <?$rl++;endforeach;?>
                </div>
            </div>
        </div>
        <?endforeach;
    }
    ?>



