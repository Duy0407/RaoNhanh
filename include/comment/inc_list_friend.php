<? 
if (isset($_COOKIE['id_chat365']) && $_COOKIE['id_chat365'] > 0) { 
    if(!isset($list_user)){
        echo '<link rel="stylesheet" href="/css/style_cm.css?v='.$version.'">';

        // api lấy danh sách bạn bè
        $curl = curl_init();
        $data = array(
            'ID'=> intval($_COOKIE['id_chat365']),
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

    if(count($list_user) > 0){
        ?>
        <div class="list_fr_user">
            <h3 class="list_fr_chat">Danh sách bạn bè</h3>
            <div class="box_fr_user">
                <? foreach ($list_user as $val): 
                    if ($val['id'] == $ID) { continue; }
                    ?>
                    <div class="items">
                        <a class="items_u" target="_blank" rel="nofollow" href="https://chat365.timviec365.vn/chat-<?=base64_encode($val['id']);?>">
                            <img onerror="this.onerror=null;this.src='https://timviec365.vn/images/user_no.png';" src="<?=$val['avatarUser']?>" alt="<?=$val['userName']?>">
                            <span class="name"><?=$val['userName']?></span>
                        </a>
                    </div>
                <? endforeach; ?>
            </div>
        </div>
        <? 
    }
} 
?>