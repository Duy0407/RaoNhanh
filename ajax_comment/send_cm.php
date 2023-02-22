<?
include("config.php");
require_once("../classes/resize-class.php");
$id = getValue('id', 'int', 'POST', 0);
$id = (int)$id;
echo $id;
die;

$cm_id = getValue('cm_id', 'int', 'POST', 0);
$cm_id = (int)$cm_id;

$author_id = getValue('author', 'int', 'POST', 0);

$url = getValue('url', 'str', 'POST', "");
$url = sql_injection_rp($url);

$img = getValue('img', 'str', 'POST', "");
$img = sql_injection_rp($img);

$name = getValue('name', 'str', 'POST', "");
$name = sql_injection_rp(replaceMQ($name));

$comment = getValue('comment', 'str', 'POST', "");
$comment = replaceMQ(trim($comment));
$comment = strip_tags($comment);

$comment2 = sql_injection_rp($comment);

$hastag_cm = getValue('cm_hastag', 'str', 'POST', '');
$hastag_cm = json_decode($hastag_cm);

$name_file = '';


$ip = client_ip();
if ($img == "") {
    $img = "https://timviec365.vn/images/user_no.png";
}


if ($id > 0 && $url != "" && $name != "" && ($comment != "" or isset($_FILES))) {

    // set thời gian trước đó 30s có bao nhiêu bình luận được gửi
    $time_check = time() - 30;

    $check = new db_query("SELECT cm_id FROM cm_comment WHERE cm_sender_idchat = " . $id . " AND cm_url = '" . mysql_escape_string($url) . "'
                    AND cm_ip = '" . $ip . "' AND cm_time >= " . $time_check);
    // tối đa 10 bình luận trong 30s
    if (mysql_num_rows($check->result) > 10) {
        echo 'error';
        die;
    }

    $id_rand = rand(10000000, 90000000);

    if (isset($_FILES) && $_FILES['file']['size'] > 0 && $_FILES['file']['size'] < 3145728) {
        if ($_FILES['file']['type'] == 'image/png') {
            $name_file = 'cm_' . $id_rand . ".png";
        }
        if ($_FILES['file']['type'] == 'image/jpeg') {
            $name_file = 'cm_' . $id_rand . ".jpg";
        }
        if ($_FILES['file']['type'] == 'image/gif') {
            $name_file = 'cm_' . $id_rand . ".gif";
        }
    }

    if ($name_file != '') {
        $dir = getimg_cmt(time());
        file_put_contents($dir . $name_file, file_get_contents($_FILES['file']['tmp_name']));
        $name_file = str_replace('..', '', $dir . $name_file);
    }



    foreach ($hastag_cm as $key => $value) {
        if (strpos($comment, $value[1]) !== false) {
            $link = 'https://chat365.timviec365.vn/chat-' . base64_encode($value[0]);
            $comment = str_replace($value[1], '<a target="_blank" rel="nofollow" href="' . $link . '">' . str_replace('@', '', $value[1]) . '</a>', $comment);
        } else {
            unset($hastag_cm[$key]);
        }
    }

    $hastag_js = json_encode($hastag_cm, JSON_UNESCAPED_UNICODE);

    if ($name_file == '') {
        $query = "INSERT INTO cm_comment( cm_url, cm_parent_id, cm_comment, cm_sender_idchat, cm_sender_name, cm_sender_avatar, cm_ip, cm_time, cm_tag)
        VALUES ('" . mysql_escape_string($url) . "','" . $cm_id . "','" . mysql_escape_string($comment2) . "','" . $id . "','"
            . mysql_escape_string($name) . "','" . mysql_escape_string($img) . "','" . $ip . "','" . time() . "', '" . $hastag_js . "')";
    } else {
        $query = "INSERT INTO cm_comment( cm_url, cm_parent_id, cm_comment, cm_sender_idchat, cm_sender_name, cm_sender_avatar, cm_ip, cm_time, cm_tag, cm_img)
        VALUES ('" . mysql_escape_string($url) . "','" . $cm_id . "','" . mysql_escape_string($comment2) . "','" . $id . "','"
            . mysql_escape_string($name) . "','" . mysql_escape_string($img) . "','" . $ip . "','" . time() . "', '" . $hastag_js . "','" . $name_file . "' )";
    }



    $db_ex = new db_execute_return();
    $last_id = $db_ex->db_execute($query);


    if ($cm_id == 0) : ?>
        <div class="cm_comment">
            <div class="cm_content cm_<?= $last_id ?>" data="<?= $last_id ?>" data-pr="<?= $last_id ?>">
                <img class="ava_cm" src="<?= $img ?>" alt="<?= $name ?>n" onerror="this.onerror=null;this.src='https://timviec365.vn/images/user_no.png';">
                <div class="cm_box frame_cm_box">
                    <div class="cm_cm_ct">
                        <p class="cm_content_user"><?= $name ?></p>
                        <? if ($comment != '') { ?>
                            <p class="cm_nd"><?= nl2br($comment) ?></p>
                        <? } ?>
                        <? if ($name_file != '') { ?>
                            <a target="_blank" rel="nofollow" href="<?= $name_file; ?>"><img src="<?= $name_file; ?>" alt="ảnh bình luận" class="comment_img"></a>
                        <? } ?>
                    </div>
                    <div class="cm_cm_ev">
                        <div class="cm_list_ev">
                            <span class="like_cm" onclick="like_url_cm(this,0,'like_cm','cm_cm_ev')" onmousemove="show_ic(this,'cm_list_ev')"><span class="like_cm_txt">Thích</span> |</span>
                            <span class="reply_cm" onclick="reply_cm(this)">Phản hồi |</span>
                            <span class="delete_cm" onclick="delete_cm(<?= $last_id; ?>)">Xóa <span class="span_del">|</span></span>
                            <span class="time_cm">Vừa xong</span>
                            <div class="show_ic" onmouseleave="hide_ic(this,'cm_list_ev')">
                                <? for ($i = 1; $i <= 7; $i++) : ?>
                                    <span class="cm_like_ic" data="<?= $i ?>" onclick="like_url_cm(this,<?= $i ?>,'like_cm','cm_cm_ev')">
                                        <img src="../images/img_comment/Ic_<?= $i ?>.png" alt="icon<?= $i ?>">
                                    </span>
                                <? endfor; ?>
                            </div>
                        </div>
                        <span class="cm_list_like">
                            <span class="cm_count_like count_ic"></span>
                            <span class="box_items_like_ic">
                                <? for ($i = 1; $i <= 7; $i++) : ?>
                                    <span class="cm_like_ic">
                                        <img class="item_like_ic ic<?= $i ?>" src="../images/img_comment/Ic_<?= $i ?>.png" alt="<?= $icon_name[$i] ?>">
                                    </span>
                                <? endfor; ?>
                            </span>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    <? else : ?>
        <div class="cm_content cm_<?= $last_id ?> cm_reply_box" data="<?= $last_id ?>" data-pr="<?= $cm_id ?>">
            <span class="line_reply1"></span>
            <span class="line_reply2"></span>
            <img class="ava_cm" src="<?= $img ?>" alt="<?= $name ?>" onerror="this.onerror=null;this.src='https://timviec365.vn/images/user_no.png';">
            <div class="cm_box ">
                <div class="cm_cm_ct">
                    <p class="cm_content_user"><?= $name ?></p>
                    <? if ($comment != '') { ?>
                        <p class="cm_nd"><?= nl2br($comment) ?></p>
                    <? } ?>
                    <? if ($name_file != '') { ?>
                        <a target="_blank" rel="nofollow" href="<?= $name_file; ?>"><img src="<?= $name_file; ?>" alt="ảnh bình luận" class="comment_img"></a>
                    <? } ?>
                </div>
                <div class="cm_cm_ev">
                    <div class="cm_list_ev">
                        <span class="like_cm" onclick="like_url_cm(this,0,'like_cm','cm_cm_ev')" onmousemove="show_ic(this,'cm_list_ev')"><span class="like_cm_txt">Thích</span> |</span>
                        <span class="reply_cm" onclick="reply_cm(this)">Phản hồi |</span>
                        <span class="delete_cm" onclick="delete_cm(<?= $last_id; ?>)">Xóa <span class="span_del">|</span></span>

                        <span class="time_cm">Vừa xong</span>
                        <div class="show_ic" onmouseleave="hide_ic(this,'cm_list_ev')">
                            <? for ($i = 1; $i <= 7; $i++) : ?>
                                <span class="cm_like_ic" data="<?= $i ?>" onclick="like_url_cm(this,<?= $i ?>,'like_cm','cm_cm_ev')">
                                    <img src="../images/img_comment/Ic_<?= $i ?>.png" alt="icon<?= $i ?>">
                                </span>
                            <? endfor; ?>
                        </div>
                    </div>

                    <span class="cm_list_like">
                        <span class="cm_count_like count_ic"></span>
                        <span class="box_items_like_ic">
                            <? for ($i = 1; $i <= 7; $i++) : ?>
                                <span class="cm_like_ic">
                                    <img class="item_like_ic ic<?= $i ?>" src="../images/img_comment/Ic_<?= $i ?>.png" alt="<?= $icon_name[$i] ?>">
                                </span>
                            <? endfor; ?>
                        </span>
                    </span>
                </div>
            </div>
        </div>
<? endif;

    fastcgi_finish_request();

    if ($ip == '123.24.206.25') {
        die;
    }

    foreach ($hastag_cm as $key => $value) {
        if (strpos($comment2, $value[1]) !== false && $id > 0) {
            $curl = curl_init();
            $data = array(
                'UserId'        => $value[0],
                'SenderId'      => $id,
                'Type'          => 'NTD',
                'Title'         => 'Thông báo',
                'Message'       => $name . ' đã nhắc đến bạn trong một bình luận',
                'Link'          => $url
            );
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:3005/Notification/SendNotification');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_exec($curl);
            curl_close($curl);
        }
    }



    if ($author_id > 0 && $id > 0) {
        if ($cm_id == 0 && $author_id != $id) {
            $uid = $author_id;
            $mess = $name . ' đã bình luận về một bài đăng của bạn';
        } elseif ($cm_id != 0) {
            $check_cm = new db_query("SELECT cm_sender_idchat FROM cm_comment WHERE cm_id = " . $cm_id);
            $row = mysql_fetch_assoc($check->result);
            if ($row['cm_sender_idchat'] == 0 || $row['cm_sender_idchat'] == $id) {
                die;
            }
            $uid = $row['cm_sender_idchat'];
            $mess = $name . ' đã phản hồi về một bình luận của bạn';
        } else {
            die();
        }

        $curl = curl_init();
        $data = array(
            'UserId'        => $uid,
            'SenderId'      => $id,
            'Type'          => 'NTD',
            'Title'         => 'Thông báo',
            'Message'       => $mess,
            'Link'          => $url
        );
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:3005/Notification/SendNotification');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_exec($curl);
        curl_close($curl);
    }
}
?>