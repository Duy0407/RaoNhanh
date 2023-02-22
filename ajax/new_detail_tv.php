<?php
    include("config.php");
    $newid      = getValue("new_id",'int',"POST",0);
    $user_id    = getValue("user_id",'int',"POST",0);
    $result     = ['status' => false, 'messages' => '', 'result' => []];
    if ($newid > 0 && $user_id > 0) {
        $sql    = "SELECT * FROM vieclam WHERE new_id = $newid AND new_user_id = $user_id";
        $qr     = new db_query($sql);
        $info   = mysql_fetch_assoc($qr->result);
        $info['new_end_date'] = date('Y-m-d',$info['new_end_date']);
        $info['birthday'] = date('Y-m-d',$info['birthday']);

        if (count($info) > 0) {
            $result     = ['status' => true, 'messages' => 'Chi tiết tin đăng', 'result' => $info];
        }
    }
    echo json_encode($result);
?>