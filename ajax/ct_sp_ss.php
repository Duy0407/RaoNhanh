<?
include "config.php";
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $user_id = $_COOKIE['UID'];
    $user_type = $_COOKIE['UT'];

    $id_new = getValue('id_new', 'int', 'POST', '');
    $type_new = getValue('type_new', 'int', 'POST', '');
    $cat_new = getValue('cat_new', 'int', 'POST', '');
    $loai_sp1 = getValue('loai_sp1', 'int', 'POST', '');
    $loai_sp2 = getValue('loai_sp2', 'int', 'POST', '');

    $select_ss = new db_query("SELECT `id` FROM `bang_so_sanh` WHERE `new_id` = $id_new AND `new_type` = $type_new AND `user_id` = $user_id
                                AND `loai_sp` = $loai_sp1 AND `nhom_sp` = $loai_sp2 ");
    // echo "SELECT `id` FROM `bang_so_sanh` WHERE `new_id` = $id_new AND `new_type` = $type_new AND `user_id` = $user_id AND `loai_sp` = $loai_sp1 AND `nhom_sp` = $loai_sp2 ";
    // die;
    if (mysql_num_rows($select_ss->result) > 0) {
        $inser_ss = new db_query("DELETE FROM `bang_so_sanh` WHERE `new_id` = $id_new ");
        echo 2;
    } else {
        $inser_ss = new db_query("INSERT INTO `bang_so_sanh`(`id`, `new_id`, `new_type`, `user_id`, `type`, `cat_id`, `loai_sp`, `nhom_sp`)
                                VALUES ('', '$id_new', '$type_new', '$user_id', '$user_type', '$cat_new', '$loai_sp1', '$loai_sp2')");
        echo 1;
    }
}
