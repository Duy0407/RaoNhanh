<?
    include("config.php");
    require_once("../functions/send_mail.php");
    if (isset($_COOKIE['UID'])){
        $userid = $_COOKIE['UID'];
        $bid_id = getValue('bid_id', 'int', 'POST', 0);
        $bid_result = getValue('bid_result', 'int', 'POST', 0);
        $bid_note = getValue('bid_note', 'str', 'POST', '');
        $bid_note = sql_injection_rp($bid_note);
        $bid_note = removeEmoji($bid_note);

        $result = new db_query("SELECT dau_thau.*,
        new_cate_id, dia_chi, phi_duthau, donvi_thau, new_title, link_title, new_address,
        a.usc_type, a.usc_name, a.usc_store_name, a.usc_phone, a.usc_logo, a.chat365_id, a.usc_email,
        b.usc_type AS bidder_type, b.usc_name AS bidder_name, b.usc_store_name AS bidder_store, b.usc_phone AS bidder_phone, b.usc_logo AS bidder_logo, b.chat365_id AS bidder_chat, b.usc_email AS bidder_email
        FROM dau_thau LEFT JOIN new ON dau_thau.new_id = new.new_id
        LEFT JOIN new_description ON dau_thau.new_id = new_description.new_id
        LEFT JOIN user AS a ON a.usc_id = new_user_id
        LEFT JOIN user AS b ON b.usc_id = user_id
        WHERE id = $bid_id AND new_user_id = $userid AND status = 0");

        if (mysql_num_rows($result->result) > 0){
            if ($bid_result == 1 || $bid_result == 2){
                $result = mysql_fetch_assoc($result->result);

                // update dau_thau
                $update = new db_query("UPDATE dau_thau
                SET `status` = $bid_result, `note` = '".$bid_note."'
                WHERE id = $bid_id");

                if ($update->result == true){
                    // insert notify
                    $insert_notify = new db_query("INSERT INTO notify(notify_from,new_id,notify_to,type,create_time,notify_content)
                    VALUE(".$userid.",".$result['new_id'].",".$result['user_id'].",".$bid_result.",".time().",'Thông báo kết quả đấu thầu')");

                    // gửi tin nhắn qua chat365
                    $curl = curl_init();
                    $data = [
                        'UserId' => $result['bidder_chat'],
                        'SenderId' => $result['chat365_id'],
                        'Message' => ($bid_result == 1)?"Xin chúc mừng bạn đã trúng thầu tin ".$result['new_title']:"Rất tiếc bạn đã trượt thầu tin: ".$result['new_title'],
                    ];
                    curl_setopt($curl, CURLOPT_POST, 1);
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:3005/Notification/SendNewNotification');
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

                    $response = curl_exec($curl);
                    curl_close($curl);

                    // gửi mail
                    if ($result['bidder_email'] != ''){
                        SendBidResult("Thông báo kết quả đấu thầu",($result['bidder_type']==1)?$result['bidder_name']:$result['bidder_store'],$result['bidder_email'],$result,$bid_result);
                    }

                    $kq = [
                        'result' => true,
                        'msg' => "Cập nhật kết quả đấu thầu thành công",
                    ];
                }else{
                    $kq = [
                        'result' => false,
                        'msg' => 'Có lỗi xảy ra'
                    ];
                }
            }else{
                $kq = [
                    'result' => false,
                    'msg' => 'Thông tin không hợp lệ'
                ];
            }
        }else{
            $kq = [
                'result' => false,
                'msg' => 'Chi tiết đấu thầu không tồn tại'
            ];
        }


        echo json_encode($kq);
    }
?>