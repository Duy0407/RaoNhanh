<?php
    include("config.php");
    $val1      = getValue("val1",'int',"POST",0);
    $result_1     = ['status' => false, 'messages' => '', 'result' => []];
    if ($val1 > 0 ) {
        $sql    = "SELECT cit_id,cit_name,cit_parent FROM city2 WHERE cit_id = $val1 ";
        $qr     = new db_query($sql);
        $info   = mysql_fetch_assoc($qr->result);
        if (count($info) > 0) {
            $result_1     = ['status' => true, 'messages' => 'Chi tiết tin đăng', 'result' => $info];
        }
    }
    echo json_encode($result_1);
?>