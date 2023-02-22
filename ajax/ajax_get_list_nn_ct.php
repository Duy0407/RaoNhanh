<?php 
include("config.php");
$nn_id = (isset($_POST['nn_id'])) ? $_POST['nn_id'] : '';
$nn_ct_id = (isset($_POST['nn_ct_id'])) ? $_POST['nn_ct_id'] : '';
if($nn_ct_id != '') {
    $query = new db_query("SELECT key_name,key_id,key_cate_lq from keyword 
    join category_vl on keyword.key_cate_lq = category_vl.cat_id where key_cate_lq = $nn_id");
    while($rownn= mysql_fetch_assoc($query->result)){
    ?>
    <option class="nnct" value="<? echo $rownn['key_id']; ?>" <?if($nn_ct_id == $rownn['key_id']){echo "selected";}?>>
        <? echo $rownn['key_name']; ?>
    </option>
    
    <?
    } 
}
?>