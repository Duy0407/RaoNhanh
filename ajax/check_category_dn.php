<?php
include("config.php");
$cat_id       = getValue("cat_id","int","POST",0);
$cat_id        = (int)$cat_id;

if($cat_id !=0){
    echo "<ul>";
//    echo "<div class='menu_key_cate'></div>";
    $db_cate = new db_query("SELECT dm_id,dm_name,dm_cate FROM danhmuc_dn WHERE dm_parent_id=".$cat_id." ORDER BY dm_id ASC");
    While($row_cate = mysql_fetch_assoc($db_cate->result)){?>
        
    <li class="cate_con" dm_cate="<?=$row_cate['dm_cate']?>"  cat_id="<?=$row_cate['dm_id']?>"><i id="i_cat_<?=$row_cate['dm_id']?>" class="fa fa-dot-circle-o hidden"></i><span id="span_cat_<?=$row_cate['dm_id']?>"><?=$row_cate['dm_name']?></span></li>
   <? 
    }
    echo "</ul>";
    }
?>