<?
include("config.php");
$my_id = intval($_COOKIE['id_chat365']);
$u_id = getValue("u_id", "int", "POST", 0);

if ($my_id > 0 && $u_id > 0) {
   $db_qr = new db_query("SELECT chat365_id,usc_id,usc_name,usc_email FROM user WHERE chat365_id = '" . $u_id . "'");
   if (mysql_num_rows($db_qr->result) > 0) {
      $data  = mysql_fetch_assoc($db_qr->result);

      if($data['chat365_id'] != $my_id){
         $db_my = new db_query("SELECT chat365_secret FROM user WHERE chat365_id = '" . $my_id . "'");
         $data_m  = mysql_fetch_assoc($db_my->result);
         $id_chat = (@$data['chat365_id'] != 0) ? @$data['chat365_id'] : @$data_rp['data']['userId'];
         if ($data_m['chat365_secret'] != '') {
            echo 'https://chat365.timviec365.vn/chat-u'.encrypt_decrypt($my_id,'encrypt').'-c'.encrypt_decrypt($id_chat,'encrypt').'-raonhanh365.vn-'.$data_m['chat365_secret'];
         }else{
            echo 'https://chat365.timviec365.vn/chat-u'.encrypt_decrypt($my_id,'encrypt').'-c'.encrypt_decrypt($id_chat,'encrypt').'-raonhanh365.vn';
         }
      }
   }
}