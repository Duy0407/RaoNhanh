<?
include("config.php");
$id_new = getValue('id_new', 'int', 'POST', 0);
if ($id_new != 0) {
    $list_anh = new db_query("SELECT `new_image`, `new_video` FROM `new` WHERE `new_id` = $id_new ");
    $row_anh = mysql_fetch_assoc($list_anh->result);
    $new_image = $row_anh['new_image'];
    $new_image = explode(';', $new_image);
    $new_video = $row_anh['new_video']; ?>
    <? if ($new_video != "" && $new_video != 0) { ?>
        <div class="avt_spham_ban">
            <video controls src="<?= $new_video ?>"></video>
        </div>
    <? };
    for ($i = 0; $i < count($new_image); $i++) { ?>
        <div class="avt_spham_ban">
            <img style="object-fit: contain;" onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= $new_image[$i] ?>" alt="">
        </div>
    <? } ?>
<? } ?>