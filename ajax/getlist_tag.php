<option value="">Chọn ngành nghề chi tiết</option>
<?
include("../home/config_vl.php");

$id_ct = getValue('id_ct', 'int', 'GET', 0);

if ($id_ct != '') {
    $query = new db_query("SELECT key_id,key_name FROM keyword where key_cate_lq = $id_ct");
    while ($rownnct = mysql_fetch_assoc($query->result)) { ?>
        <option class="nn_chi_tiet" value="<? echo $rownnct['key_id']; ?>">
            <? echo $rownnct['key_name']; ?>
        </option>
<?  }
}
?>