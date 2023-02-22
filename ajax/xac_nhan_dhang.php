<?
include("config.php");
if(isset($_COOKIE['UID']) && isset($_COOKIE['UT'])){
    $id_nguoi_dh = getValue('id_nguoi_dh', 'int', 'POST', 0);
    $id_nguoi_ban = getValue('id_nguoi_ban', 'int', 'POST', 0);
    $new_id = getValue('new_id', 'int', 'POST', 0);

    $ghi_chu = getValue('ghi_chu', 'str', 'POST', '');
    $ghi_chu = trim($ghi_chu);
    $ghi_chu = replaceMQ($ghi_chu);
    $ghi_chu = sql_injection_rp($ghi_chu);

    $loai_ttoan = getValue('loai_ttoan', 'int', 'POST', '');
    $tien_ttoan = getValue('tien_ttoan', 'str', 'POST', '');
    $tien_ttoan = str_replace(',', '', $tien_ttoan);
    $trang_thai = 0;

    $dchi_nhanhang = getValue('dchi_nhanhang', 'str', 'POST', '');
    $dchi_nhanhang = trim($dchi_nhanhang);
    $dchi_nhanhang = replaceMQ($dchi_nhanhang);
    $dchi_nhanhang = sql_injection_rp($dchi_nhanhang);

    $tgian_xnhan = time();

    $id_nggui = new db_query("SELECT `usc_id`, `chat365_id`, `chat365_secret` FROM `user` WHERE `usc_id` = '".$_COOKIE['UID']."' ");
    $id_chat_ngui = mysql_fetch_assoc($id_nggui -> result)['chat365_id'];

    $id_nnhan = new db_query("SELECT `usc_id`, `chat365_id`, `chat365_secret` FROM `user` WHERE `usc_id` = '" . $id_nguoi_ban . "' ");
    $id_chat_nnhan = mysql_fetch_assoc($id_nnhan->result)['chat365_id'];

    $new_title = mysql_fetch_assoc((new db_query("SELECT `new_title` FROM `new` WHERE `new_id` = $new_id ")) -> result)['new_title'];

    if($new_id != 0){
        $inser_dh = new db_query("INSERT INTO `dat_hang`(`dh_id`, `id_nguoi_dh`, `id_nguoi_ban`, `id_spham`, `ghi_chu`, `loai_ttoan`, `tien_ttoan`, `dia_chi_nhanhang`,
                                `trang_thai`,`tgian_xacnhan`, `dh_active`) VALUES ('','$id_nguoi_dh','$id_nguoi_ban','$new_id','$ghi_chu','$loai_ttoan','$tien_ttoan',
                                '$dchi_nhanhang','$trang_thai','$tgian_xnhan','0')");

    }else{
        echo "Thông tin không đầy đủ";
    }
}

?>