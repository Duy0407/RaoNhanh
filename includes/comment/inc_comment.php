<?

function search($array, $key, $value)
{
    $results = array();

    if (is_array($array)) {
        if (isset($array[$key]) && $array[$key] == $value) {
            $results[] = $array;
        }

        foreach ($array as $subarray) {
            $results = array_merge($results, search($subarray, $key, $value));
        }
    }

    return $results;
}


$url_index = 'https://'.parse_url($_SERVER['HTTP_HOST'].$_SERVER["REQUEST_URI"], PHP_URL_PATH);

$ID = intval($_COOKIE['id_chat365']);

// phân trang
$cm_page = 1;
$cm_limit = 10;
$cm_start = ($cm_page - 1)*$cm_limit;
//lấy lượt like của tin
$qr_like_news = new db_query("SELECT lk_id, lk_for_url, lk_type, lk_for_comment, lk_user_name, lk_user_avatar, lk_user_idchat, lk_ip, lk_time FROM cm_like WHERE lk_for_url = '".$url_index."' AND lk_for_comment = 0 AND lk_type < 8 ORDER BY lk_type ASC");
$arr_likes_new = $qr_like_news->result_array();
//lấy lượt chia sẻ của tin
$qr_share_news = new db_query("SELECT lk_id, lk_for_url, lk_type, lk_for_comment, lk_user_name, lk_user_avatar, lk_user_idchat, lk_ip, lk_time FROM cm_like WHERE lk_for_url = '".$url_index."' AND lk_for_comment = 0 AND lk_type = 8");
$arr_share_new = $qr_share_news->result_array();

// lấy danh sách bình luận
$qr_count_comments = new  db_query("SELECT cm_id FROM cm_comment WHERE cm_url = '".$url_index."' AND cm_parent_id= 0 ORDER BY cm_time DESC ");
$count_comments = mysql_num_rows($qr_count_comments->result);
$count_page = ceil($count_comments / $cm_limit);

$qr_comments = new  db_query("SELECT * FROM cm_comment WHERE cm_url = '".$url_index."' AND cm_parent_id= 0 ORDER BY cm_time DESC LIMIT $cm_start,$cm_limit");
$arr_comments = $qr_comments->result_array('cm_id');
$arr_cm = array();

$dem_reply=0;
$name_cm=[];
foreach ($arr_comments as $key=>$val_comments){
    $arr_rl = array();
    // lấy lượt like của từng bình luận và gắn vào mảng
    $qr_likes = new db_query("SELECT lk_id, lk_for_url, lk_type, lk_for_comment, lk_user_name, lk_user_avatar, lk_user_idchat, lk_ip, lk_time FROM cm_like WHERE lk_for_url = '".$url_index."' AND lk_type < 8 AND lk_for_comment = ".$val_comments['cm_id']." ORDER BY lk_type ASC");
    $arr_likes = $qr_likes->result_array();
    // lấy nội dung trả lời
    $qr_reply = new db_query("SELECT * FROM cm_comment WHERE cm_url = '".$url_index."' AND cm_parent_id= ".$val_comments['cm_id']." ORDER BY cm_time ASC");
    $arr_reply = $qr_reply->result_array();
    //
    if(!in_array($val_comments['cm_sender_name'],$name_cm)){$name_cm[]=$val_comments['cm_sender_name'];}
    foreach ($arr_reply as $key_r => $val_r){
        // lấy lượt like của từng trả lời
        $qr_like = new db_query("SELECT lk_id, lk_for_url, lk_type, lk_for_comment, lk_user_name, lk_user_avatar, lk_user_idchat, lk_ip, lk_time FROM cm_like WHERE lk_for_url = '".$url_index."' AND lk_type < 8 AND lk_for_comment = ".$val_r['cm_id']." ORDER BY lk_type ASC");
        $arr_like = $qr_like->result_array();
        $arr_rl[$key_r] =$val_r;
        $arr_rl[$key_r]['likes'] = $arr_like;
        if(!in_array($val_r['cm_sender_name'],$name_cm)){$name_cm[]=$val_r['cm_sender_name'];}
    }
    // gán mọi thông tin vào mảng mới
    $arr_cm[$key] = $val_comments;
    $arr_cm[$key]['likes'] = $arr_likes;
    $arr_cm[$key]['reply'] = $arr_rl;
    $dem_reply+= count($arr_reply);
}



$list_user=[];
if ($ID > 0) {
    // api lấy danh sách bạn bè
    $curl = curl_init();
    $data = array(
        'ID'=> $ID,
    );
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:3005/User/GetListFriend');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_tt = json_decode($response,true);
    if ($data_tt['data']['result']== true){
        $list_user = $data_tt['data']['listFriend'];
    }
}

// api lấy danh sách nhóm đang tham gia
$list_gr=[];
if ($ID > 0) {
    $curl = curl_init();
    $data = array(
        'userId'=> $ID,
    );
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:3005/Conversation/GetListGroup');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    $response = curl_exec($curl);
    curl_close($curl);
    $data_tt = json_decode($response,true);
    if ($data_tt['data']['result']== true){
        $list_gr = $data_tt['data']['listCoversation'];
    }
}

$s_arr_like = search($arr_likes_new,'lk_user_idchat',$ID);

// check user like news
$check_like_new = (count($arr_likes_new)>0 && count($s_arr_like)) ? $s_arr_like[0] : [];

?>
<link rel="stylesheet" href="/css/style_cm.css?v=<?=$version;?>">
<div id="box_comment_chat" <?=($ID == 0) ? 'class="btn_login_do"' : ''; ?>>

    <div style="clear: both;"></div>
    <div class="box_link_comment">
        <div class="box_cm_head">
            <span class="text_cm_hed">Bình luận</span>
<!--             <span class="chat_cm_hed">
                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M18.5 8.5C18.5 12.8492 14.4703 16.375 9.5 16.375C8.60861 16.3762 7.72091 16.2605 6.85962 16.0308C6.20262 16.3638 4.694 17.0028 2.156 17.419C1.931 17.455 1.76 17.221 1.84888 17.0117C2.24713 16.0712 2.60713 14.818 2.71513 13.675C1.337 12.2913 0.5 10.48 0.5 8.5C0.5 4.15075 4.52975 0.625 9.5 0.625C14.4703 0.625 18.5 4.15075 18.5 8.5ZM6.125 8.5C6.125 8.20163 6.00647 7.91548 5.7955 7.7045C5.58452 7.49353 5.29837 7.375 5 7.375C4.70163 7.375 4.41548 7.49353 4.2045 7.7045C3.99353 7.91548 3.875 8.20163 3.875 8.5C3.875 8.79837 3.99353 9.08452 4.2045 9.2955C4.41548 9.50647 4.70163 9.625 5 9.625C5.29837 9.625 5.58452 9.50647 5.7955 9.2955C6.00647 9.08452 6.125 8.79837 6.125 8.5ZM10.625 8.5C10.625 8.20163 10.5065 7.91548 10.2955 7.7045C10.0845 7.49353 9.79837 7.375 9.5 7.375C9.20163 7.375 8.91548 7.49353 8.7045 7.7045C8.49353 7.91548 8.375 8.20163 8.375 8.5C8.375 8.79837 8.49353 9.08452 8.7045 9.2955C8.91548 9.50647 9.20163 9.625 9.5 9.625C9.79837 9.625 10.0845 9.50647 10.2955 9.2955C10.5065 9.08452 10.625 8.79837 10.625 8.5ZM14 9.625C14.2984 9.625 14.5845 9.50647 14.7955 9.2955C15.0065 9.08452 15.125 8.79837 15.125 8.5C15.125 8.20163 15.0065 7.91548 14.7955 7.7045C14.5845 7.49353 14.2984 7.375 14 7.375C13.7016 7.375 13.4155 7.49353 13.2045 7.7045C12.9935 7.91548 12.875 8.20163 12.875 8.5C12.875 8.79837 12.9935 9.08452 13.2045 9.2955C13.4155 9.50647 13.7016 9.625 14 9.625Z" fill="white"/>
                </svg>
                Chat ngay
            </span> -->
        </div>
        <div class="box_cm_body">
            <div class="cm_like">
                <div class="frame_cm_like">
                    <div class="box_items_like_ic">
                        <?for($i=1;$i<=7;$i++):?>
                        <span class="cm_like_ic">
                            <img class="item_like_ic <?=(count($check_like_new)>0 && count(search($check_like_new,'lk_type',$i))==1)?"icon_new":""?> <?=(count($arr_likes_new)>0 && count(search($arr_likes_new,'lk_type',$i)) > 1 )?"show_vip":((count($arr_likes_new)>0 && count(search($arr_likes_new,'lk_type',$i))>0)?"show":"")?> ic<?=$i?>"  src="/images/img_comment/Ic_<?=$i?>.png" alt="<?=$icon_name[$i]?>" >
                        </span>
                        <?endfor;?>
                    </div>
                    <span class="count_ic" data-like="<?=count($arr_likes_new);?>">
                        <?
                        if (count($s_arr_like) >= 1 && count($arr_likes_new) > 1 && $ID != 0) {
                            echo $s_arr_like[0]['lk_user_name'].' và '.(count($arr_likes_new)-1).' người khác';
                        }else if(count($arr_likes_new) == 1 && $ID != 0){
                            echo $arr_likes_new[0]['lk_user_name'];
                        }else if(count($arr_likes_new) > 0){
                            echo count($arr_likes_new);
                        }
                        ?>
                    </span>
                </div>
                <span class="cm_sh_ic"><?='<b>&#149;</b> '.count($arr_share_new)." chia sẻ";?> </span>
                <span class="cm_cm_ic"><?='<b>&#149;</b> <span>'.$count_comments."</span> bình luận";?> </span>
                <span class="cm_view_ic <?=(count($arr_likes_new) > 0) ? 'hide_mobi' : ''?>"><?=$count_view_page." lượt xem";?></span>

                <div class="box_sh_ic">
                    <div class="frame">
                        <p class="sh_title">Chia sẻ</p>
                        <?
                        $count_sh = count($arr_share_new);
                        for ($sh=0; $sh < $count_sh;$sh++):if($sh==5){break;}?>
                            <p class="sh_items"><?=$arr_share_new[$sh]['lk_user_name']?></p>
                        <? endfor;
                        if($count_sh >5):?>
                            <p class="cm_items">Và <?=($count_sh -5) ?> người khác </p>
                        <? endif; ?>
                    </div>
                </div>
                <div class="box_cm_ic">
                    <div class="frame">
                        <p class="cm_title">Bình luận</p>
                        <?
                        $count_bl = count($name_cm);
                        for ($sh=0; $sh<$count_bl;$sh++):if($sh==5){break;}?>
                            <p class="cm_items"><?=$name_cm[$sh]?></p>
                        <? endfor;
                        if($count_bl >5):?>
                            <p class="cm_items">Và <?=($count_bl -5) ?> người khác </p>
                        <? endif;?>

                    </div>
                </div>
            </div>
            <div class="cm_event">
                <div class="cm_ev_div">
                    <span class="like_event <?=(count($check_like_new)>0)?"active":""?>" onclick="like_url(0,'like_event','frame_cm_like')" onmousemove="show_ic(this,'cm_ev_div')" ontaphold="show_ic(this,'cm_list_ev')">
                        <img class="like_event_img" src="/images/img_comment/Ic_<?=(count($check_like_new)>0 && $check_like_new['lk_type']==1)?"color_1":((count($check_like_new)>0 && $check_like_new['lk_type'] > 1)?$check_like_new['lk_type']:"color_2")?>.png" alt="Icon">
                        <span class="like_event_txt <?=(count($check_like_new)>0 && $check_like_new['lk_type']==1)?"liked":((count($check_like_new)>0 && in_array($check_like_new['lk_type'],[3,4,6,7]))?"yll":((count($check_like_new)>0 && in_array($check_like_new['lk_type'],[2,5]))?"red":""))?>"><?=(count($check_like_new)>0)?$icon_name[$check_like_new['lk_type']]:"Thích"?></span>
                    </span>
                    <div class="show_ic" onmousemove="show_ic(this,'cm_ev_div')" onmouseleave="hide_ic(this,'cm_ev_div')">
                        <?for ($i=1;$i<=7;$i++):?>
                        <span class="cm_like_ic" data="<?=$i?>" onclick="like_url(<?=$i?>,'like_event','frame_cm_like')">
                            <img src="/images/img_comment/Ic_<?=$i?>.png" alt="icon<?=$i?>">
                        </span>
                        <?endfor;?>
                    </div>
                </div>
                <div class="cm_ev_div">
                    <span class="comment_event">
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 9.33214C0.5 4.1332 4.99145 0 10.4314 0C15.8682 0 20.3627 4.13306 20.3627 9.33214C20.3627 14.5311 15.8713 18.6643 10.4314 18.6643C9.55178 18.6643 8.6952 18.5573 7.87958 18.3536L5.09363 19.8999C4.56865 20.1913 3.92375 19.8117 3.92375 19.2112V16.3821C1.83534 14.6788 0.5 12.1588 0.5 9.33214ZM10.4314 1.43206C5.6902 1.43206 1.93206 5.01322 1.93206 9.33214C1.93206 11.7956 3.1452 14.0062 5.07169 15.4631L5.35582 15.678V18.1165L7.69446 16.8185L7.97815 16.8983C8.75226 17.116 9.57712 17.2322 10.4314 17.2322C15.1725 17.2322 18.9307 13.6511 18.9307 9.33214C18.9307 5.01336 15.1698 1.43206 10.4314 1.43206Z" fill="#474747"/>
                        </svg>
                        Bình luận
                    </span>
                </div>
                <div class="cm_ev_div">
                    <span class="share_event" onclick="add_show('box_share')">
                        <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.9956 12.4056L18.392 7.09795L18.4604 7.01995C18.5617 6.88399 18.6105 6.71606 18.5979 6.54699C18.5854 6.37792 18.5123 6.21906 18.392 6.09955L12.9956 0.794353L12.9212 0.730753C12.4892 0.406753 11.8532 0.718753 11.8532 1.29355V3.84955L11.5832 3.86755C7.30761 4.20595 4.80321 6.91195 4.20561 11.82C4.12881 12.45 4.85121 12.8448 5.31921 12.4272C7.03641 10.8936 8.81121 9.94075 10.6532 9.55915C10.9484 9.49795 11.2448 9.45115 11.5436 9.41875L11.8532 9.39115V11.9064L11.8592 12.0048C11.9312 12.5484 12.59 12.804 12.9956 12.4056ZM11.6708 5.06395L13.0532 4.97155V2.53195L17.1884 6.59755L13.0532 10.6656V8.07715L11.426 8.22355H11.4164C9.37281 8.44315 7.44441 9.26155 5.62401 10.626C5.98161 9.01915 6.59241 7.81075 7.39521 6.94555C8.39121 5.87155 9.78321 5.21395 11.6708 5.06275V5.06395ZM3.59961 1.79995C2.80396 1.79995 2.0409 2.11602 1.47829 2.67863C0.91568 3.24124 0.599609 4.0043 0.599609 4.79995V14.4C0.599609 15.1956 0.91568 15.9587 1.47829 16.5213C2.0409 17.0839 2.80396 17.4 3.59961 17.4H13.1996C13.9953 17.4 14.7583 17.0839 15.3209 16.5213C15.8835 15.9587 16.1996 15.1956 16.1996 14.4V13.2C16.1996 13.0408 16.1364 12.8882 16.0239 12.7757C15.9114 12.6632 15.7587 12.6 15.5996 12.6C15.4405 12.6 15.2879 12.6632 15.1753 12.7757C15.0628 12.8882 14.9996 13.0408 14.9996 13.2V14.4C14.9996 14.8773 14.81 15.3352 14.4724 15.6727C14.1348 16.0103 13.677 16.2 13.1996 16.2H3.59961C3.12222 16.2 2.66438 16.0103 2.32682 15.6727C1.98925 15.3352 1.79961 14.8773 1.79961 14.4V4.79995C1.79961 4.32256 1.98925 3.86473 2.32682 3.52716C2.66438 3.18959 3.12222 2.99995 3.59961 2.99995H7.19961C7.35874 2.99995 7.51135 2.93674 7.62387 2.82422C7.7364 2.71169 7.79961 2.55908 7.79961 2.39995C7.79961 2.24082 7.7364 2.08821 7.62387 1.97569C7.51135 1.86317 7.35874 1.79995 7.19961 1.79995H3.59961Z" fill="black"/>
                        </svg>
                        Chia sẻ
                    </span>
                    <div class="box_share">
                        <div class="box_share_items" style="display: none!important;">
                            <img src="/images/img_comment/sh_ic1.png" alt="Chia sẻ trang cá nhân của bạn">
                            Chia sẻ lên trang cá nhân (Của bạn)
                        </div>
                        <div class="box_share_items" style="display: none!important;">
                            <img src="/images/img_comment/sh_ic2.png" alt="Chia sẻ trang cá nhân bạn bè">
                            Chia sẻ lên trang cá nhân (Bạn bè)
                        </div>
                        <div class="box_share_items share_items_chat365 ">
                            <img src="/images/img_comment/sh_ic3.png" alt="Gửi bằng Chat365">
                            Gửi bằng Chat365
                        </div>
                        <div class="box_share_items share_group_chat365">
                            <img src="/images/img_comment/sh_ic4.png" alt="Gửi lên nhóm Chat365">
                            Gửi lên nhóm Chat365
                        </div>
                        <div class="box_share_items share_items_mxh" onclick="add_show('box_share_mxh')">
                            <img src="/images/img_comment/sh_ic5.png" alt="Khác">
                            Khác
                        </div>
                    </div>
                    <div class="box_share_mxh">
                        <div class="box_share_items" onclick="share_fb('<?=$url_index;?>');return false;">
                            <img src="/images/img_comment/iic_f.png" alt="Facebook">
                            Facebook
                        </div>
                        <div class="box_share_items" onclick="share_tw('<?=$url_index;?>');return false;">
                            <img src="/images/img_comment/iic_t.png" alt="Twitter">
                            Twitter
                        </div>
                        <div class="box_share_items" onclick="share_vk('<?=$url_index;?>');return false;">
                            <img src="/images/img_comment/iic_v.png" alt="Vkontakte">
                            Vkontakte
                        </div>
                        <div class="box_share_items" onclick="share_in('<?=$url_index;?>');return false;">
                            <img src="/images/img_comment/iic_l.png" alt="Linked In">
                            Linked In
                        </div>
                    </div>
                </div>
            </div>
            <div class="order_cm">
                <? if($ID > 0) { ?>
                    <select class="new_old" onchange="cm_loadmore(<?=$ID?>,'<?=$url_index?>')">
                        <option value="1" selected> Mới nhất</option>
                        <option value="2">Cũ nhất</option>
                    </select>
                <? } ?>
                <div class="cm_input input_comment">
                    <img class="img_user" src="https://timviec365.vn/images/user_no.png" alt="bình luận">
                    <textarea class="ct_cm" id="ct_cm" oninput="check_data(this)" maxlength="250" placeholder="Viết bình luận"></textarea>
                    <svg class="ic_send_cm" width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="32" height="32" rx="16" fill="#4C5BD4"/>
                        <path d="M24.7922 8.21841C24.6908 8.11767 24.5628 8.04793 24.4231 8.01737C24.2835 7.98681 24.138 7.99672 24.0037 8.04592L7.48458 14.0456C7.34211 14.0996 7.21946 14.1956 7.13291 14.3208C7.04635 14.4461 7 14.5946 7 14.7468C7 14.899 7.04635 15.0476 7.13291 15.1728C7.21946 15.2981 7.34211 15.3941 7.48458 15.448L13.9346 18.0204L18.6951 13.2507L19.7538 14.3081L14.9708 19.0854L17.5538 25.5275C17.6094 25.6671 17.7057 25.7867 17.8302 25.8709C17.9547 25.9552 18.1017 26.0001 18.2521 26C18.4038 25.9969 18.551 25.9479 18.6744 25.8596C18.7977 25.7712 18.8913 25.6476 18.9429 25.505L24.9498 9.00587C25.001 8.87319 25.0133 8.72871 24.9854 8.58929C24.9575 8.44987 24.8905 8.32124 24.7922 8.21841Z" fill="white"/>
                    </svg>
                    <svg class="cm_img_ct" id="cm_img_ct" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.76017 22H17.2402C20.0002 22 21.1002 20.31 21.2302 18.25L21.7502 9.99C21.8902 7.83 20.1702 6 18.0002 6C17.3902 6 16.8302 5.65 16.5502 5.11L15.8302 3.66C15.3702 2.75 14.1702 2 13.1502 2H10.8602C9.83017 2 8.63017 2.75 8.17017 3.66L7.45017 5.11C7.17017 5.65 6.61017 6 6.00017 6C3.83017 6 2.11017 7.83 2.25017 9.99L2.77017 18.25C2.89017 20.31 4.00017 22 6.76017 22Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.5 8H13.5" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 18C13.79 18 15.25 16.54 15.25 14.75C15.25 12.96 13.79 11.5 12 11.5C10.21 11.5 8.75 12.96 8.75 14.75C8.75 16.54 10.21 18 12 18Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <input style="display: none;" id="secleimg" name="listimg" onchange="preview_image(event, this);" class="fileupload" type="file">
                    <div id="tag_friend"></div>
                </div>
            </div>
            <div class="cm_list" data="<?=$cm_page +1?>" data-count="<?=$count_page?>">
                <div class="box_cm_list">
                    <?foreach ($arr_cm as $val_cm):
                    $check_like_cm = (count($val_cm['likes'])>0 && count(search($val_cm['likes'],'lk_user_idchat',$ID)) > 0)?search($val_cm['likes'],'lk_user_idchat',$ID)[0]:[];
                    $val_cm['cm_tag'] = json_decode($val_cm['cm_tag'],true);
                    if (is_array($val_cm['cm_tag'])) {
                        foreach ($val_cm['cm_tag'] as $key => $value) {
                            $link_cm = 'https://chat365.timviec365.vn/chat-'.base64_encode($value[0]);
                            $val_cm['cm_comment'] = str_replace($value[1],'<a target="_blank" rel="nofollow" href="'.$link_cm.'">'.str_replace('@','',$value[1]).'</a>',$val_cm['cm_comment']);
                        }
                    }
                    ?>
                    <div class="cm_comment <?=(count($val_cm['reply'])>0)?"cm_has_reply":""?>">
                        <div class="cm_content cm_<?=$val_cm['cm_id']?>" data="<?=$val_cm['cm_id']?>" data-pr="<?=$val_cm['cm_id']?>">
                            <img class="ava_cm" src="<?=$val_cm['cm_sender_avatar']?>" alt="<?=$val_cm['cm_sender_name']?>n" onerror="this.onerror=null;this.src='https://timviec365.vn/images/user_no.png';">
                            <div class="cm_box frame_cm_box">
                                <div class="cm_cm_ct">
                                    <p class="cm_content_user">
                                        <?
                                        if ($val_cm['cm_sender_idchat'] == $ID || $ID == 0) {
                                            echo $val_cm['cm_sender_name'];
                                        }else{
                                            echo '<a target="_blank" rel="nofollow" href="https://chat365.timviec365.vn/chat-'.base64_encode($val_cm['cm_sender_idchat']).'">'.$val_cm['cm_sender_name'].'</a>';
                                        }
                                        ?>
                                    </p>
                                    <? if ($val_cm['cm_comment'] != '') { ?>
                                    <p class="cm_nd"><?=nl2br($val_cm['cm_comment'])?></p>
                                    <? } ?>
                                    <? if ($val_cm['cm_img'] != '') { ?>
                                     <a target="_blank" rel="nofollow" href="<?=$val_cm['cm_img'];?>"><img src="<?=$val_cm['cm_img'];?>" alt="ảnh bình luận" class="comment_img"></a>
                                    <? } ?>
                                </div>
                                <div class="cm_cm_ev">
                                    <div class="cm_list_ev">
                                        <span class="like_cm <?=(count($check_like_cm)>0)?"active":""?>" onclick="like_url_cm(this,0,'like_cm','cm_cm_ev')" onmousemove="show_ic(this,'cm_list_ev')" ontaphold="show_ic(this,'cm_list_ev')"><span class="like_cm_txt <?=(count($check_like_cm)>0 && $check_like_cm['lk_type']==1)?"liked":((count($check_like_cm)>0 && in_array($check_like_cm['lk_type'],[3,4,6,7]))?"yll":((count($check_like_cm)>0 && in_array($check_like_cm['lk_type'],[2,5]))?"red":""))?>"><?=(count($check_like_cm)>0)?$icon_name[$check_like_cm['lk_type']]:"Thích"?></span> |</span>
                                        <span class="reply_cm" onclick="reply_cm(this)">Phản hồi |</span>
                                        <? if ($id_ch_user == $ID || $ID == $val_cm['cm_sender_idchat']) { ?>
                                            <span class="delete_cm" onclick="delete_cm(<?=$val_cm['cm_id']?>)">Xóa <span class="span_del">|</span></span>
                                        <? } ?>
                                        <span class="time_cm" title="<?=time_comment_string($val_cm['cm_time']);?>"><?=time_elapsed_string_cm($val_cm['cm_time'])?></span>
                                        <div class="show_ic" onmouseleave="hide_ic(this,'cm_list_ev')">
                                            <?for ($i=1;$i<=7;$i++):?>
                                            <span class="cm_like_ic" data="<?=$i?>" onclick="like_url_cm(this,<?=$i?>,'like_cm','cm_cm_ev')">
                                                <img src="/images/img_comment/Ic_<?=$i?>.png" alt="icon<?=$i?>">
                                            </span>
                                            <?endfor;?>
                                        </div>
                                    </div>

                                    <span class="cm_list_like">
                                        <span class="cm_count_like count_ic" data-like="<?=count($val_cm['likes']);?>">
                                            <?=(count($val_cm['likes'])>0)?count($val_cm['likes']):""?>
                                        </span>
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
                                $check_like_rl = (count($val_reply['likes'])>0 && count(search($val_reply['likes'],'lk_user_idchat',$ID)) > 0)?search($val_reply['likes'],'lk_user_idchat',$ID)[0]:[];
                                $val_reply['cm_tag'] = json_decode($val_reply['cm_tag'],true);
                                if (is_array($val_cm['cm_tag'])) {
                                    foreach (@$val_reply['cm_tag'] as $key => $value) {
                                        $link_rl = 'https://chat365.timviec365.vn/chat-'.base64_encode($value[0]);
                                        $val_reply['cm_comment'] = str_replace($value[1],'<a target="_blank" rel="nofollow" href="'.$link_rl.'">'.str_replace('@','',$value[1]).'</a>',$val_reply['cm_comment']);
                                    }
                                }

                                ?>
                                <div class="cm_content cm_<?=$val_reply['cm_id']?> cm_reply_box" data="<?=$val_reply['cm_id']?>" data-pr="<?=$val_cm['cm_id']?>">
                                    <?if($rl == count($val_cm['reply'])):?>
                                    <span class="line_reply1"></span>
                                    <?endif;?>
                                    <span class="line_reply2"></span>
                                    <img class="ava_cm" src="<?=$val_reply['cm_sender_avatar']?>" alt="<?=$val_reply['cm_sender_name']?>" onerror="this.onerror=null;this.src='https://timviec365.vn/images/user_no.png';">
                                    <div class="cm_box ">
                                        <div class="cm_cm_ct">
                                            <p class="cm_content_user"><?=$val_reply['cm_sender_name']?></p>
                                            <? if ($val_reply['cm_comment'] != '') { ?>
                                                <p class="cm_nd"><?=nl2br($val_reply['cm_comment'])?></p>
                                            <? } ?>
                                            <? if ($val_reply['cm_img'] != '') { ?>
                                                <a target="_blank" rel="nofollow" href="<?=$val_reply['cm_img'];?>"><img src="<?=$val_reply['cm_img'];?>" alt="ảnh bình luận" class="comment_img"></a>
                                            <? } ?>
                                        </div>
                                        <div class="cm_cm_ev">
                                            <div class="cm_list_ev">
                                                <span class="like_cm <?=(count($check_like_cm)>0)?"active":""?>"  onclick="like_url_cm(this,0,'like_cm','cm_cm_ev')" onmousemove="show_ic(this,'cm_list_ev')" ontaphold="show_ic(this,'cm_list_ev')"><span class="like_cm_txt <?=(count($check_like_rl)>0 && $check_like_rl['lk_type']==1)?"liked":((count($check_like_rl)>0 && in_array($check_like_rl['lk_type'],[3,4,6,7]))?"yll":((count($check_like_rl)>0 && in_array($check_like_rl['lk_type'],[2,5]))?"red":""))?>"><?=(count($check_like_rl)>0)?$icon_name[$check_like_rl['lk_type']]:"Thích"?></span> |</span>
                                                <span class="reply_cm" onclick="reply_cm(this)">Phản hồi |</span>
                                                <? if ($id_ch_user == $ID || $ID == $val_reply['cm_sender_idchat']) { ?>
                                                    <span class="delete_cm" onclick="delete_cm(<?=$val_reply['cm_id']?>)">Xóa <span class="span_del">|</span></span>
                                                <? } ?>
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
                                                <span class="cm_count_like count_ic" data-like="<?=count($val_reply['likes']);?>">
                                                    <?=(count($val_reply['likes']) >0)?count($val_reply['likes']):""?>
                                                </span>
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
                    <?endforeach;?>
                </div>
                <? if ($count_page > 1) { ?>
                    <div class="cm_loadmore" onclick="cm_loadmore(<?=$ID?>,'<?=$url_index?>',1)">Xem Thêm</div>
                <? } ?>
            </div>
        </div>
    </div>

    <div class="popup_comment" id="popup_items_sh">
        <div class="popup_items_sh">
            <div class="box_header">
                <div class="title">Những người đã chia sẻ tin này</div>
                <img src="/images/img_comment/close.png" alt="close" class="close_cm">
            </div>
            <div class="frame_items">
                <?foreach($arr_share_new as $val_sh):?>
                <div class="items" share-id="<?=$val_sh['lk_user_idchat'];?>">
                    <div class="items_u">
                        <img src="<?=$val_sh['lk_user_avatar']?>" alt="<?=$val_sh['lk_user_name']?>" onerror="this.onerror=null;this.src='https://timviec365.vn/images/user_no.png';">
                        <span class="name"><?=$val_sh['lk_user_name']?></span>
                    </div>
                    <? if ($val_sh['lk_user_idchat'] != 0 && $val_sh['lk_user_idchat'] != $ID && $ID > 0) { ?>
                        <a class="btn_buttom bg_green" target="_blank" rel="nofollow" href="<?='https://chat365.timviec365.vn/chat-'.base64_encode($val_sh['lk_user_idchat']);?>">
                            <img src="/images/img_comment/ic_chat.png" alt="Chat">
                            Chat
                        </a>
                    <? } ?>
                </div>
                <?endforeach;?>
            </div>
        </div>
    </div>

    <div class="popup_comment" id="popup_items_icon">
        <div class="popup_items_icon">
            <div class="box_header">
                <div class="title">
                    <span class="items_ic all active" onclick="show_icon(this,0)">Tất cả</span>
                    <span class="items_ic icon ic1" onclick="show_icon(this,1)"><img src="/images/img_comment/Ic_1.png" alt="Icon"><?=count(search($arr_likes_new,'lk_type',1))?></span>
                    <span class="items_ic icon ic2" onclick="show_icon(this,2)"><img src="/images/img_comment/Ic_2.png" alt="Icon"><?=count(search($arr_likes_new,'lk_type',2))?></span>
                    <span class="items_ic icon ic3" onclick="show_icon(this,3)"><img src="/images/img_comment/Ic_3.png" alt="Icon"><?=count(search($arr_likes_new,'lk_type',3))?></span>
                    <span class="items_ic icon ic4" onclick="show_icon(this,4)"><img src="/images/img_comment/Ic_4.png" alt="Icon"><?=count(search($arr_likes_new,'lk_type',4))?></span>
                    <span class="items_ic icon ic5" onclick="show_icon(this,5)"><img src="/images/img_comment/Ic_5.png" alt="Icon"><?=count(search($arr_likes_new,'lk_type',5))?></span>
                    <span class="more" onclick="add_show('more_icon')">Xem thêm <img src="/images/img_comment/ic_down.png" alt="Xem thêm"></span>
                    <div class="more_icon">
                        <div class="title">Xem thêm</div>
                        <div class="items_ic icon ic4" onclick="show_icon(this,4)"><img src="/images/img_comment/Ic_4.png" alt="Icon"><?=count(search($arr_likes_new,'lk_type',4))?></div>
                        <div class="items_ic icon ic5" onclick="show_icon(this,5)"><img src="/images/img_comment/Ic_5.png" alt="Icon"><?=count(search($arr_likes_new,'lk_type',5))?></div>
                        <div class="items_ic icon ic6" onclick="show_icon(this,6)"><img src="/images/img_comment/Ic_6.png" alt="Icon"><?=count(search($arr_likes_new,'lk_type',6))?></div>
                        <div class="items_ic icon ic7" onclick="show_icon(this,7)"><img src="/images/img_comment/Ic_7.png" alt="Icon"><?=count(search($arr_likes_new,'lk_type',7))?></div>
                    </div>
                </div>
            </div>
            <?for ($show=0;$show<8;$show++):?>
            <div class="box_icon icon_show_<?=$show?> <?=($show==0)?"show":""?>">
                <div class="frame_items">
                    <?foreach ($arr_likes_new as $val_lk):if ($show!=0 && $val_lk['lk_type']!= $show){continue;}?>
                    <div class="items" data="<?=$val_lk['lk_user_idchat']?>">
                        <div class="items_u">
                            <img src="<?=$val_lk['lk_user_avatar']?>" alt="<?=$val_lk['lk_user_name']?>">
                            <span class="name"><?=$val_lk['lk_user_name']?></span>
                        </div>
                        <a class="btn_buttom bg_green" href="<?='https://chat365.timviec365.vn/chat-'.base64_encode($val_lk['lk_user_idchat']);?>" target="_blank" rel="nofollow">
                            <img src="/images/img_comment/ic_chat.png" alt="Chat">
                            Chat
                        </a>
                    </div>
                    <?endforeach;?>
                </div>
            </div>
            <?endfor;?>

        </div>
    </div>

    <div class="popup_comment" id="popup_share_chat365">
        <div class="popup_share_chat365">
            <div class="box_header">
                <div class="title">Gửi bằng chat365</div>
                <img src="/images/img_comment/close.png" alt="close" class="close_cm">
            </div>
            <div class="box_header cm_input">
                <img class="img_user" src="https://timviec365.vn/images/user_no.png" alt="Logo">
                <textarea class="ct_cm" maxlength="100" id="nd_share" placeholder="Hãy nói gì đó về nội dung này"></textarea>
            </div>
            <div class="frame_items" id="list_friend_chat">
                <? if (count($list_user) == 0) { ?> <div class="items"><p>Bạn chưa có bạn bè để chia sẻ</p></div> <? } ?>
                <? foreach ($list_user as $val):
                if ($val['id'] == $ID) {
                    $logo_v = $val['avatarUser'];
                    $name_v = $val['userName'];
                    continue;
                }
                ?>
                <div class="items">
                    <div class="items_u">
                        <img onerror="this.onerror=null;this.src='https://timviec365.vn/images/user_no.png';" data-id="<?=$val['id']?>" src="<?=$val['avatarUser']?>" alt="<?=$val['userName']?>">
                        <span class="name"><?=$val['userName']?></span>
                    </div>
                    <div class="btn_buttom_send bg_send" data-id="<?=$val['id'];?>">
                        Gửi
                    </div>
                </div>
                <?endforeach;?>
            </div>
        </div>
    </div>


    <div class="popup_comment" id="popup_share_gr">
        <div class="popup_share_chat365">
            <div class="box_header">
                <div class="title">Gửi cho nhóm tại chat365</div>
                <img src="/images/img_comment/close.png" alt="close" class="close_cm">
            </div>
            <div class="box_header cm_input">
                <img class="img_user" src="https://timviec365.vn/images/user_no.png" alt="Logo">
                <textarea class="ct_cm" maxlength="100" id="nd_gr_share" placeholder="Hãy nói gì đó về nội dung này"></textarea>
            </div>
            <div class="frame_items">
                <? if (count($list_gr) == 0) { ?> <div class="items"><p>Bạn chưa có nhóm để chia sẻ</p></div> <? } ?>
                <?foreach ($list_gr as $val):?>
                <div class="items">
                    <div class="items_u">
                        <img onerror="this.onerror=null;this.src='https://timviec365.vn/images/user_no.png';" src="<?=$val['avatarConversation']?>" alt="<?=$val['conversationName']?>">
                        <span class="name"><?=$val['conversationName']?></span>
                    </div>
                    <div class="btn_buttom_send bg_send send_gr" data-gr="<?=$val['conversationId'];?>">
                        Gửi
                    </div>
                </div>
                <?endforeach;?>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    const url_cm = '<?=$url_index;?>';
    // id người xem
    const uid_view = '<?=$_COOKIE["id_chat365"];?>';
    // avatar người xem
    const uid_ava = '<?=$logo_v;?>';
    // tên người xem
    const uid_name = '<?=$name_v;?>';

    // id người tạo
    const uid_author = <?=$id_ch_user;?>;
    // const uid_author = 20;

    var hastag_cm = [];

    if (uid_ava != '' && uid_view > 0) {
        $('.img_user').attr('src',uid_ava);
    }

</script>
<script src="/js/socket_cm.js?v=<?=$version;?>"></script>

<? if (isset($is_blog) && $is_blog == 1) { ?>
    <script>
        $('.btn_login_do').click(function() {
            if (document.cookie.indexOf('id_chat365=') == -1) {
                $('.ct_cm').blur();
                window.open('https://timviec365.vn/dang-nhap.html', '_blank').focus();
            }else{
                window.location.reload();
            }
        })
    </script>
<? } ?>
