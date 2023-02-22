<option value="">Ngành nghề chi tiết</option>
<?
include("config.php");
$id = (int)$_GET['id'];
if($id != ''){
    $query = new db_query("SELECT key_id,key_name FROM keyword where key_cate_lq = $id");
    while($rowtag= mysql_fetch_assoc($query->result)) {
    ?>
<option class="nnct" value="<? echo $rowtag['key_id']; ?>">
    <? echo $rowtag['key_name']; ?>
</option>
<?
    }
}