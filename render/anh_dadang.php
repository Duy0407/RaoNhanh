<?
include("config.php");
$us_id = getValue('us_id', 'int', 'POST', 0);
$dbanhdd = new db_query("SELECT `new_id`, `new_image`, `new_video` FROM `new` WHERE `new_user_id` = '" . $us_id . "' ORDER BY new_id DESC LIMIT 10 ");
$db_anhdd = $dbanhdd->result_array();

$db_cloum = array_column($db_anhdd, 'new_image');
$arr_new = '';
foreach ($db_cloum as $item_im) {
    $str_arr = explode(';', $item_im);
    for ($i = 0; $i < count($str_arr); $i++) {
        $arr_new .= $str_arr[$i] . ',';
    }
};

$arr_new = rtrim($arr_new, ',');
$avt_img = explode(',', $arr_new);
$avt_img = array_unique($avt_img);

$arr_avt_new = [];
foreach ($avt_img as $item_avt) {
    $arr_avt_new[] = $item_avt;
};

for ($j = 0; $j < count($arr_avt_new); $j++) {
    if ($arr_avt_new[$j] != '') {
?>
        <label class="form_anhchon">
            <input type="checkbox" name="anhchon" class="anhdachon" value="<?= $arr_avt_new[$j] ?>" data="" onclick="css_bor(this)">
            <img src="<?= $arr_avt_new[$j] ?>" class="anh_chond">
        </label>
<? }
} ?>