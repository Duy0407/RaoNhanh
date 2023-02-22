<option value="">Chọn ngành nghề chi tiết</option>
<?
include("../home/config_vl.php");

if (count($_GET['id_ct']) == 1) {
    $id_ct = (int)$_GET['id_ct'];
} else {
    $id_ct = (int)$_GET['id_ct'][0];
}
$qh = (int)$_GET['qh'];
$type = (int)$_GET['tp'];

$db_qr = new db_query("SELECT * FROM vieclam WHERE new_user_id=" . $_COOKIE['UID'] . " AND new_type =" . $type . " AND new_district = " . $qh);

echo "SELECT * FROM vieclam WHERE new_user_id=" . $_COOKIE['UID'] . " AND new_type =" . $type . " AND new_district = " . $qh;
while ($rowc = mysql_fetch_assoc($db_qr->result)) {
    $arr_check = $rowc['new_job_detail'];
}
echo $arr_check;

if ($id_ct != '') {
    $query = new db_query("SELECT key_id,key_name FROM keyword where key_cate_lq = $id_ct");
    while ($rownnct = mysql_fetch_assoc($query->result)) {
        if ($rownnct['key_id'] != $arr_check) {    ?>
            <option class="nn_chi_tiet" value="<? echo $rownnct['key_id']; ?>">
                <? echo $rownnct['key_name']; ?>
            </option>
<?
        }
    }
} ?>