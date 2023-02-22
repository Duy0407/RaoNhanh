<option value="">Chọn quận /huyện</option>
<?
include("config.php");
$id = (int)$_GET['id'];
if($id != ''){
    $query = new db_query("SELECT cit_id,cit_name FROM city2 where cit_parent = $id");
    while($rowcty= mysql_fetch_assoc($query->result)) {
    ?>
<option class="quanhuyen" value="<? echo $rowcty['cit_id']; ?>">
    <? echo $rowcty['cit_name']; ?>
</option>
<?
    }
}