<?php
    include("config.php");
    $newid       = getValue("new_id",'int',"POST",0);
    $user_id     = getValue("user_id",'int',"POST",0);
    $tieude      = getValue("new_title",'int',"POST","");
    $thanhpho    = getValue("new_city",'int',"POST",0);
    $quanhuyen   = getValue("new_district",'int',"POST",0);
    $phone       = getValue("new_phone",'int',"POST",0);
    $diachi      = getValue("new_address",'int',"POST","");
    $lhlv        = getValue("new_job_type",'int',"POST",0);
    $htlv        = getValue("new_job_kind",'int',"POST",0);
    $ctcv        = getValue("new_job_detail",'int',"POST",0);
    $luongmin    = getValue("new_money_min",'int',"POST",0);
    $hantuyen    = getValue("new_end_date",'int',"POST","");
    $luongmax    = getValue("new_money_max",'int',"POST",0);
    $image       = getValue("new_picture",'int',"POST","");
    $mota        = getValue("new_desc",'int',"POST","");
    $kinhnghiem  = getValue("new_exp",'int',"POST",0);
    $trinhdo     = getValue("new_level",'int',"POST",0);
    $chungchi    = getValue("new_skill",'int',"POST",0);
    $thang       = getValue("new_pay_type",'int',"POST",0);
    $soluong     = getValue("new_quantity",'int',"POST",0);
    if ($newid > 0 && $user_id > 0) {
        $update_vieclam = new db_query("UPDATE vieclam SET `new_title`='".$tieude."',`new_city`='".$thanhpho."',`new_district`='".$quanhuyen."',`new_phone`='".$phone."',`new_address`='".$diachi."',`new_job_type`='".$lhlv."',`new_job_kind`='".$htlv."',`new_job_detail`='".$ctcv."',`new_end_date`='".strtotime($hantuyen)."',`new_money_min`='".$luongmin."',`new_money_max`='".$luongmax."',`new_picture`='".$upload_dir.$image."',`new_desc`='".$mota."',`new_exp`='".$kinhnghiem."',`new_level`='".$trinhdo."',`new_skill`='".$chungchi."',`new_pay_type`='".$thang."',`new_quantity`='".$soluong."',`save_time_vl`='".time()."'
        WHERE new_id = $newid AND new_user_id = $user_id");
        
    }
?>