<?
include("config.php");
$id = getValue('id', 'int', 'POST', 0);

$author = getValue('author', 'int', 'POST', 0);

$cm_id = getValue('cm_id', 'int', 'POST', 0);

$type = getValue('type', 'int', 'POST', 0);

$url = getValue('url', 'str', 'POST', "");
$url = sql_injection_rp($url);

$img = getValue('img', 'str', 'POST', "");
$img = sql_injection_rp($img);

$name = getValue('name', 'str', 'POST', "");
$name = sql_injection_rp(replaceMQ($name));

$ip = client_ip();


if ($id > 0 && $url != "" && $name != "") {

    if ($type == 0) {
        $qr = new db_execute("DELETE FROM cm_like WHERE lk_user_idchat = " . $id . " AND lk_type < 8 AND lk_for_url = '" . mysql_escape_string($url) . "'
                            AND lk_for_comment = " . $cm_id);

        if ($cm_id == 0) {
            $show_t = new db_query("SELECT lk_user_name,lk_user_idchat FROM cm_like WHERE lk_for_url = '" . mysql_escape_string($url) . "'
                                    AND lk_type < 8 AND lk_for_comment = 0");
            $arr_likes_new = $show_t->result_array();
            $s_arr_like = search($arr_likes_new, 'lk_user_idchat', $id);

            if (count($s_arr_like) >= 1 && count($arr_likes_new) > 1 && $id != 0) {
                echo $s_arr_like[0]['lk_user_name'] . ' và ' . (count($arr_likes_new) - 1) . ' người khác';
            } else if (count($arr_likes_new) == 1 && $id != 0) {
                echo $arr_likes_new[0]['lk_user_name'];
            } else if (count($arr_likes_new) > 0) {
                echo count($arr_likes_new);
            }
        }
    } else {
        $check = new db_query("SELECT lk_id,lk_time FROM cm_like WHERE lk_user_idchat = " . $id . " AND lk_type < 8 AND lk_for_url = '" . mysql_escape_string($url) . "'
                            AND lk_for_comment = " . $cm_id);
        if (mysql_num_rows($check->result) > 0) {
            $qr = new db_execute("UPDATE cm_like SET lk_type=" . $type . " ,lk_ip='" . $ip . "',lk_time= '" . time() . "' WHERE lk_user_idchat = " . $id . "
                                AND lk_for_url = '" . mysql_escape_string($url) . "' AND lk_type < 8 AND lk_for_comment = " . $cm_id);

            // tránh spam thông báo
            $row_t = mysql_fetch_assoc($check->result);
            $time = $row_t['lk_time'] - time();
            if ($time < 30) {
                die;
            }
        } else {
            $qr = new db_execute("INSERT INTO cm_like(lk_for_url, lk_type, lk_for_comment, lk_user_name, lk_user_avatar, lk_user_idchat, lk_ip, lk_time) VALUES
            ('" . mysql_escape_string($url) . "','" . $type . "','" . $cm_id . "','" . mysql_escape_string($name) . "','" . mysql_escape_string($img) . "','" . $id . "',
            '" . $ip . "','" . time() . "')");
        }


        if ($cm_id == 0) {
            $show_t = new db_query("SELECT lk_user_name,lk_user_idchat FROM cm_like WHERE lk_for_url = '" . mysql_escape_string($url) . "' AND lk_type < 8
                                    AND lk_for_comment = 0");
            $arr_likes_new = $show_t->result_array();
            $s_arr_like = search($arr_likes_new, 'lk_user_idchat', $id);

            if (count($s_arr_like) >= 1 && count($arr_likes_new) > 1 && $id != 0) {
                echo $s_arr_like[0]['lk_user_name'] . ' và ' . (count($arr_likes_new) - 1) . ' người khác';
            } else if (count($arr_likes_new) == 1 && $id != 0) {
                echo $arr_likes_new[0]['lk_user_name'];
            } else if (count($arr_likes_new) > 0) {
                echo count($arr_likes_new);
            }
        }

        fastcgi_finish_request();


        // if ($author > 0 && $id > 0) {
        //     if ($cm_id == 0 && $author != $id) {
        //         $uid = $author;
        //         $mess = $name . ' đã bày tỏ cảm xúc về bài đăng của bạn';
        //     } elseif ($cm_id != 0) {
        //         $check_cm = new db_query("SELECT cm_sender_idchat FROM cm_comment WHERE cm_id = " . $cm_id);
        //         $row = mysql_fetch_assoc($check_cm->result);
        //         if ($row['cm_sender_idchat'] == 0 || $row['cm_sender_idchat'] == $id) {
        //             die;
        //         }
        //         $uid = $row['cm_sender_idchat'];
        //         $mess = $name . ' đã bày tỏ cảm xúc về bình luận của bạn';
        //     } else {
        //         die();
        //     }

        //     $curl = curl_init();
        //     $data = array(
        //         'UserId'        => $uid,
        //         'SenderId'      => $id,
        //         'Type'          => 'NTD',
        //         'Title'         => 'Thông báo',
        //         'Message'       => $mess,
        //         'Link'          => $url
        //     );
        //     curl_setopt($curl, CURLOPT_POST, 1);
        //     curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        //     curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        //     curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        //     curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:3005/Notification/SendNotification');
        //     curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        //     curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //     curl_exec($curl);
        //     curl_close($curl);
        // }
    }
}
