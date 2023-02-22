<?php 
include("config.php");
$id = (isset($_POST['cit_id'])) ? $_POST['cit_id'] : '';
$district_id = (isset($_POST['district_id'])) ? $_POST['district_id'] : '';
if($id != '') {
    // $list_distrcit = [];
    $query = new db_query("SELECT cit_id,cit_name FROM city2 where cit_parent = $id ");
    while($rowcty= mysql_fetch_assoc($query->result)){
    ?>
    <option class="quanhuyen" value="<? echo $rowcty['cit_id']; ?>" <?if($district_id == $rowcty['cit_id']){echo "selected";}?>>
        <? echo $rowcty['cit_name']; ?>
    </option>
    
    <?
    } 
}
?>