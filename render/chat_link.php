<?
include("config.php");
$id_chat = getValue('id_chat', 'int', 'POST', 0);
$id_user = getValue('id_user', 'int', 'POST', 0);
$tk_user = getValue('tk_user', 'str', 'POST', '');
$name_user = getValue('name_user', 'str', 'POST', '');
if(isset($_COOKIE['UID']) && isset($_COOKIE['UT'])){
    $my_id = intval(@$_COOKIE['id_chat365']);
    if ($my_id > 0) {
        $qr_sc = new db_query("SELECT chat365_secret FROM user WHERE chat365_id = '$my_id' LIMIT 1 ");
        $row_sc = mysql_fetch_assoc($qr_sc->result);
        $chat365_secret = $row_sc['chat365_secret'];
    } else {
        $chat365_secret = '';
    };

    $link_chat = get_link_chat365($my_id, $id_chat, $id_user, $name_user, $tk_user, '', $chat365_secret);
    echo $link_chat;
}



?>