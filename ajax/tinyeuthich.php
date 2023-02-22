<?
include("config.php");
$new_id = getValue('new_id', 'int', 'POST', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $user_id = $_COOKIE['UID'];
    $user_type = $_COOKIE['UT'];
    $tgian_thich = strtotime(date('Y-m-d H:i:s', time()));

    $tindangdang = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `user_id` = $user_id AND `usc_type` = $user_type AND `new_id` = '$new_id'");

    if (mysql_num_rows($tindangdang->result) > 0) {
        $delete = new db_query("DELETE FROM `tin_yeu_thich` WHERE `user_id` = '$user_id' AND `usc_type` = '$user_type' AND `new_id` = '$new_id' ");
        echo 1;
    } else {
        $insert = new db_query("INSERT INTO `tin_yeu_thich` (`id`, `user_id`, `usc_type`, `new_id`, `tgian_thich`)
                                VALUE('', '$user_id', '$user_type', '$new_id', '$tgian_thich')");
        echo 2;
    }
}
