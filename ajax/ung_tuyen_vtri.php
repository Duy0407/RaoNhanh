<?
include("config.php");
if(isset($_COOKIE['UID']) && isset($_COOKIE['UT'])){
    $new_id = getValue('new_id', 'int', 'POST', 0);
    $id_utuyen = getValue('id_utuyen', 'int', 'POST', 0);
    $nha_tdung = getValue('nha_tdung', 'int', 'POST', 0);
    $tgian_ut = time();
    $noi_dung = "Thông báo ứng tuyển";
    if($new_id != 0 && $id_utuyen != 0 && $nha_tdung != 0){
        $check_tt = new db_query("SELECT `id` FROM `apply_new` WHERE `new_id` = '".$new_id. "' AND `uv_id` = '".$id_utuyen. "'
                                AND `status` = 0 ");
        if(mysql_num_rows($check_tt -> result) > 0){
            $data = [
                'result' => false,
                'msg' => 'Bạn đã ứng tuyển tin này',
            ];
        }else{
            $inser_ut = new db_query("INSERT INTO `apply_new`(`id`, `uv_id`, `new_id`, `apply_time`, `status`) VALUES ('','$id_utuyen','$new_id','$tgian_ut','0')");

            $iner_tbao = new db_query("INSERT INTO `notify`(`id`, `notify_from`, `new_id`, `notify_to`, `type`, `create_time`, `notify_content`)
                                VALUES ('','$id_utuyen','$new_id','$nha_tdung','3','$tgian_ut','$noi_dung')");

            $data = [
                'result' => true,
                'msg' => null,
            ];
        }

    }else{
        $data = [
            'result' => false,
            'msg' => 'Thông tin không đầy đủ',
        ];
    }
}else{
    $data = [
        'result' => false,
        'msg' => 'Thông tin không đầy đủ',
    ];
}
echo json_encode($data, true);



?>