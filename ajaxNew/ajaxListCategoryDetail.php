<?php
include("../home/config.php");
$cat_id       = getValue("cat_id","int","POST",0);
$cat_id        = (int)$cat_id;

$db_cate = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id=".$cat_id." ORDER BY cat_id ASC");
$list = [];
if(mysql_num_rows($db_cate->result) > 0){
    while ($row_cat = mysql_fetch_assoc($db_cate->result)) {
        $list[]=[
            'cat_id'=>$row_cat['cat_id'],
            'cat_name'=>$row_cat['cat_name'],
        ];
    }
}
echo json_encode($list, JSON_UNESCAPED_UNICODE);