<?
    include("config.php");
    if (isset($_COOKIE['UID'])){
        $userid = $_COOKIE['UID'];
        $id_vl = getValue('id_vl', 'int', 'POST', 0);
        $id_dm = getValue('id_dm', 'int', 'POST', 120);
        
        $kq = [
            'result' => true,
        ];
        
        if (isset($_POST['title'])){
            $title = getValue('title', 'str', 'POST', '');
            $title = preg_replace('/\s+/', ' ', trim($title));
    
            $sql = "SELECT new_id,new_title FROM new WHERE new_user_id = $userid AND new_cate_id = $id_dm AND new_title = '$title'";
            if ($id_vl != 0){
                $sql .= " AND new_id != $id_vl";
            }
    
            $result = new db_query($sql);
            if (mysql_num_rows($result->result) == 0){
                $kq = [
                    'result' => true,
                ];
            }else{
                $kq = [
                    'result' => false,
                    'data' => $result->result_array(),
                ];
            }
        }elseif (isset($_POST['mota'])){
            $mota = getValue('mota', 'str', 'POST', '');
            $mota = sql_injection_rp($mota);
            $mota = removeEmoji($mota);
    
            $sql = "SELECT new_description FROM new_description WHERE new_description = '$mota'";
            if ($id_vl != 0){
                $sql .= " AND new_id != $id_vl";
            }
    
            $result = new db_query($sql);
            if (mysql_num_rows($result->result) == 0){
                $kq = [
                    'result' => true,
                ];
            }else{
                $kq = [
                    'result' => false,
                    'data' => $result->result_array(),
                ];
            }            
        }
        echo json_encode($kq);
    }
?>