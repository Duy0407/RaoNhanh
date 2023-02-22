<?
    include("config.php");
    if (isset($_COOKIE['UID'])){
        $userid = $_COOKIE['UID'];
        $bid_id = getValue('bid_id', 'int', 'POST', 0);
        
        $result = new db_query("SELECT dau_thau.*,
            new_cate_id, dia_chi, phi_duthau, donvi_thau, new_title, link_title,
            a.usc_type, a.usc_name, a.usc_store_name, a.usc_phone, a.usc_logo, a.chat365_id,
            b.usc_type AS bidder_type, b.usc_name AS bidder_name, b.usc_store_name AS bidder_store, b.usc_phone AS bidder_phone, b.usc_logo AS bidder_logo, b.chat365_id AS bidder_chat
        FROM dau_thau LEFT JOIN new ON dau_thau.new_id = new.new_id 
            LEFT JOIN new_description ON dau_thau.new_id = new_description.new_id
            LEFT JOIN user AS a ON a.usc_id = new_user_id
            LEFT JOIN user AS b ON b.usc_id = user_id
        WHERE id = $bid_id AND (new_user_id = $userid OR user_id = $userid)");

        if (mysql_num_rows($result->result) > 0){
            $result = mysql_fetch_assoc($result->result);
            
            $result['usc_name'] = ($result['usc_type'] == 1)?$result['usc_name']:$result['usc_store_name'];
            $result['usc_link'] = (($result['usc_type'] == 1)?"/ca-nhan/":"/gian-hang/").$result['new_user_id']."/".replaceTitle($result['usc_name']).".html";
            $result['bidder_name'] = ($result['bidder_type'] == 1)?$result['bidder_name']:$result['bidder_store'];
            $result['bidder_link'] = (($result['bidder_type'] == 1)?"/ca-nhan/":"/gian-hang/").$result['user_id']."/".replaceTitle($result['bidder_name']).".html";
            $result['price'] = number_format($result['price']);
            $result['phi_duthau'] = ($result['phi_duthau']!='')?number_format($result['phi_duthau']):$result['phi_duthau'];
            $result['user_intro'] = nl2br($result['user_intro']);
            $result['user_profile'] = nl2br($result['user_profile']);
            $result['product_desc'] = nl2br($result['product_desc']);
            $result['promotion'] = nl2br($result['promotion']);
            $result['note'] = nl2br($result['note']);
            $kq = [
                'result' => true,
                'data' => $result
            ];
        }else{
            $kq = [
                'result' => false,
                'msg' => 'Chi tiết đấu thầu không tồn tại'
            ];
        }
        
        
        echo json_encode($kq);
    }
?>