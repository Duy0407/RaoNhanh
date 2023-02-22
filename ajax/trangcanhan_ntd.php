<?
include("config_vl.php");
include("version.php");
$ntd = getValue("ntd","int","GET",0);
$ntd = (int)$ntd;
$urlSite = $_SERVER['REQUEST_URI'];
//user
$db_ui = new db_query("SELECT usc_id,usc_name,usc_address,usc_phone,usc_gender,usc_des,usc_anhbia,usc_time ,usc_logo FROM user WHERE usc_id = '".$ntd."' LIMIT 1");
$rowui = mysql_fetch_assoc($db_ui->result);
//list việc làm
$db_qrvl = new db_query("SELECT usc_phone,new_phone,save_time_vl,new_city,new_id,new_user_id,new_title,new_address,new_job_type,new_job_kind,new_end_date,new_desc,new_money_min,new_money_max,new_type,usc_name,cit_name,new_view_count,numrate,new_picture
 from vieclam 
 join user on vieclam.new_user_id = user.usc_id 
 join city2 on vieclam.new_city = city2.cit_id where new_type=1 AND new_user_id = '".$ntd."' ORDER BY new_id DESC");
//list ứng viên
$db_qruv = new db_query("SELECT usc_phone,new_phone,save_time_vl,new_city,new_id,new_user_id,new_title,new_address,new_job_type,new_job_kind,new_end_date,new_desc,new_money_min,new_money_max,new_type,usc_name,cit_name,new_view_count,numrate,new_picture
 from vieclam 
 join user on vieclam.new_user_id = user.usc_id 
 join city2 on vieclam.new_city = city2.cit_id where new_type=2 AND new_user_id = '".$ntd."' ORDER BY new_id DESC");
 if(isset($_POST['btn_rating'])){
    $userid   = $_COOKIE['UID'];
    $rate = (int)$_POST['rating'];
    $id_rate = (int)$_POST['id_rate'];
    $danhgia = $_POST['danhgia'];
    if ($rate != '') {
        $insert = new db_query("INSERT INTO comment (content,cmt_user_id,cmt_vl_id,rating) VALUES ('".$danhgia."','".$userid."','".$id_rate."','".$rate."')");
    header("Location:$urlSite");
    }else{
        redirect('$urlSite');
    }
}

$db_count_viec = new db_query("SELECT count(new_id) as id from vieclam WHERE  new_user_id = '".$_COOKIE['UID']."'");
$rowcountviec=mysql_fetch_assoc($db_count_viec->result);

$db_count_sao = new db_query("SELECT count(cmt_id) as id from comment WHERE  cmt_user_id = '".$_COOKIE['UID']."'");
$rowcountsao=mysql_fetch_assoc($db_count_sao->result);
//học vấn
$db_hv = new db_query("SELECT id,time_min,time_max,name_sch FROM hocvan_kinhnghiem 
join user on hocvan_kinhnghiem.usr_id = user.usc_id WHERE type=1 AND usr_id='".$ntd."'");
//kinh nghiệm
$db_kn = new db_query("SELECT id,time_min,time_max,name_sch,des,position FROM hocvan_kinhnghiem 
join user on hocvan_kinhnghiem.usr_id = user.usc_id WHERE type=2 AND usr_id='".$ntd."'");
//tin liên quan
$qrnew = new db_query("SELECT new_title,new_money_min,new_money_max,new_picture,new_address,new_user_id FROM vieclam WHERE new_id <> $ntd ORDER BY new_id DESC LIMIT 5");

//lưu việc làm
$db_savevl = new db_query("SELECT * FROM vieclam 
JOIN city2 ON vieclam.new_city = city2.cit_id 
join user on vieclam.new_user_id = user.usc_id 
JOIN luu_vl ON vieclam.new_id = luu_vl.vieclam_id 
WHERE luu_type=1 AND luu_vl.use_id = '".$ntd."' ORDER BY luu_vl.id ");
$db_count = new db_query("SELECT count(id) as id from luu_vl WHERE luu_type=1 AND use_id = '".$ntd."'");
// echo $db_count;
$rowcount=mysql_fetch_assoc($db_count->result);

//lưu ứng viên
$db_savetv = new db_query("SELECT * FROM vieclam 
JOIN city2 ON vieclam.new_city = city2.cit_id 
join user on vieclam.new_user_id = user.usc_id 
JOIN luu_vl ON vieclam.new_id = luu_vl.vieclam_id 
WHERE luu_type=2 AND luu_vl.use_id = '".$ntd."' ORDER BY luu_vl.id ");
$db_counttv = new db_query("SELECT count(id) as id from luu_vl WHERE luu_type=2 AND use_id = '".$ntd."'");
$rowcountv=mysql_fetch_assoc($db_counttv->result);

$dr_danhgia = new db_query("SELECT * FROM comment 
    join user on comment.cmt_user_id = user.usc_id 
    join vieclam on comment.cmt_vl_id = vieclam.new_id where cmt_vl_id ORDER BY usc_id= '".$ntd."'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://www.googletagmanager.com">  
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">

    <link rel="preload" href="/fonts/OpenSans-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/fonts/OpenSans-Regular.ttf" as="font" crossorigin="anonymous">
    <link rel="preload" href="/fonts/OpenSans-Light.ttf" as="font" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang cá nhân</title>
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="preload" as="style" href="/css/vieclam/style.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/style.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'"> 
    <!-- <link rel="preload" as="style" href="/css/vieclam/vieclamraonhanh.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/vieclamraonhanh.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'">  -->
</head>
<body>
    <? include("../includes/vieclam/header1.php"); ?>
    <div class="Trang_ca_nhan">
        <div class="row">
            <div class="dumb">
                <a href="#">Trang chủ</a>
                <span class="line">/</span>
                <a href="#" class="name"><?= $rowui['usc_name'] ?></a>
            </div>
            <div class="avarta">
                <div class="banner">
                <img id="preview_logo" class="" onerror="this.src='/images/vieclam/anhbia.png'" src="<?= $rowui['usc_anhbia'] ?>" />
                </div>
                <div class="images img_soma ">
                    <img id="imgch" src="/images/load.gif" class="lazyload" onerror="this.src='/images/vieclam/no-avatar1.png'" data-src="<?= $rowui['usc_logo'] ?>" alt="">
                </div>
                <div class="name trc-ntd"><?= $rowui['usc_name'] ?></div>
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'dongthoigian')">Dòng thời gian</button>
                    <button class="tablinks" onclick="openCity(event, 'thongtincanhan')">Thông tin cá nhân</button>
                    <button class="tablinks" onclick="openCity(event, 'viecdaluu')">Việc làm đã lưu(<?= $rowcount['id']?>)</button>
                    <button class="tablinks" onclick="openCity(event, 'ungvien')">Ứng viên đã lưu(<?= $rowcountv['id']?>)</button>
                </div>
            </div>
            <div class="tabcontent" id="dongthoigian">
                    <div class="gioithieu_mb">
                        <h1 class="tt-gioithieu">Giới thiệu</h1>
                        <p class="dg">Đánh giá: <span><?= $rowcountsao['id']?></span></p>
                        <p class="name name_s1" >Họ tên: <span><?= $rowui['usc_name'] ?></span></p>   
                        <p class="dgmb">Đánh giá: <span><?= $rowcountsao['id']?></span></p>                     
                        <p class="vl">Việc làm đã đăng: <span><?= $rowcountviec['id']?></span></p>
                        <p class="dc">Địa chỉ: <span><?= $rowui['usc_address'] ?> - <?= $name_type_tp_1 ?></span></p>
                        <div class="lhmb">
                            <div id="lienhe-tt">
                                <div class="showname_lh">
                                    <span class="hotline"> 0386796*** </span><span class="au-r">Bấm để hiện số</span>
                                </div>
                                <div class="hidename_lh" style="display: none;">
                                    <span><?=$rowui['usc_phone']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="stutus">
                    <?
                        // $row = mysql_fetch_assoc($db_qrvl->result);
                        // var_dump($row);die();
                        while ($row = mysql_fetch_assoc($db_qrvl->result)) {
                        $arr_type = explode(",",$row['new_job_type']);//tách chuỗi new_job_type
                        $name_type = array();
                        foreach ($arr_type as $key => $value) { //vòng lặp foreach
                            $name_type[] = '<span class="cv">'.$arr_cate[$value].'</span>';//mảng name_type bằng mảng $arr_cate ($value=$row['new_job_type'])
                            //vd: array(1=> 'a', 2=> 'b') => array[1] == xây dựng
                        }
                        $name_type = implode(' ',$name_type);

                        // show nn ct
                        $arr_type_ct = explode(",",$row['new_job_detail']);//tách chuỗi new_job_type
                        $name_type_ct = array();
                        foreach ($arr_type_ct as $key => $value) { //vòng lặp foreach
                            $name_type_ct[] = '<span class="cv">'.$arr_tag_ct[$value].'</span>';//mảng name_type bằng mảng $arr_cate ($value=$row['new_job_type'])
                            //vd: array(1=> 'a', 2=> 'b') => array[1] == xây dựng
                        }
                        $name_type_ct = implode(' ',$name_type_ct);
                    ?>
                    <div class="item">
                        <div class="item-01">
                            <div class="group">
                                <input type="hidden" data-id="<?php echo $row['new_id'] ?>">
                                <a href="/viec-lam/<?= replaceTitle($row['new_title']) ?>-p<?= $row['new_id'] ?>.html">
                                    <div class="images images_s1">
                                        <img onerror='this.onerror=null;this.src="/images/vieclam/no_img.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $row['new_picture'] ?>" alt="avata">
                                    </div>
                                </a>
                                <div class="info">
                                    <div class="cty">
                                        <a href="/viec-lam/<?= replaceTitle($row['new_title']) ?>-p<?= $row['new_id'] ?>.html"><h3><?= $row['new_title'] ?></h3></a>
                                        <?
                                        if(isset($_COOKIE['UID']) && !empty($_COOKIE['UID']))
                                        {
                                            $check = new db_query("SELECT * FROM luu_vl WHERE use_id= '".$_COOKIE['UID']."' AND vieclam_id = '".$row['new_id']."'");
                                            if ($check = mysql_num_rows($check->result)>0):?> 
                                    
                                        <span class="save_vl">
                                            <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/save.png" alt="save">
                                        </span>

                                        <?else:?>

                                        <span class="save_vl" data-ide="<?= $row['new_id'] ?>" data_city="<?= $row['new_city'] ?>">
                                            <img class="btn_save" src="/images/vieclam/luu.png" alt="save">
                                        </span>

                                        <?endif;}
                                        else{
                                        ?>
                                        <span class="save_vl">
                                            <a class="show_reg" href="javascript:void(0)" onclick="show_reg(this,'box_singup')"><img src="/images/vieclam/luu.png" alt="save"></a>
                                        </span>
                                        <?
                                        }
                                        ?>
                                    </div>
                                    <div class="auth">
                                        <div class="name">
                                            <a href="/viec-lam/<?= replaceTitle($row['new_title']) ?>-p<?= $row['new_id'] ?>.html"><img onerror='this.onerror=null;this.src="/images/vieclam/no_img.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $row['new_picture'] ?>" alt="avata"><?= $row['usc_name'] ?></a>
                                        </div>
                                        <div class="time"><?= time_elapsed_string($row['save_time_vl']) ?></div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="group1">
                                <div class="diadiem gr">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/diachi.png" alt="địa điểm"></div><span class="bold dd"><?= $row['cit_name'] ?></span> | <?= $row['new_address'] ?>
                                </div>
                                <div class="mucluong gr">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/money.png" alt="mức lương"></div>Mức lương: <span class="bold"><?= $row['new_money_min'] ?>đ - <?= $row['new_money_max'] ?>đ</span>
                                </div>
                                <div class="lhcv gr">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/job.png" alt="Công việc"></div><span class="bold">Công việc:</span> <?= $name_type ?>
                                </div>
                                <div class="lhcv gr">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/job.png" alt="Công việc chi tiết"></div><span class="bold">Công việc chi tiết:</span> <?= $name_type_ct ?>
                                </div>
                                <div class="htvl gr">
                                    <div class="images">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/laptop.png" alt="Hình thức việc làm">
                                    </div>
                                    <span class="bold">Hình thức việc làm:</span>
                                    <span>
                                        <?
                                            if ($row['new_job_kind']==1) {
                                                echo "Toàn thời gian";
                                            }
                                            elseif($row['new_job_kind']==2){
                                                echo "Bán thời gian";
                                            }
                                            elseif($row['new_job_kind']==3){
                                                echo "Giờ hành chính";
                                            }
                                            elseif($row['new_job_kind']==4){
                                                echo "Ca sáng";
                                            }
                                            elseif($row['new_job_kind']==5){
                                                echo "Ca chiều";
                                            }
                                            else{
                                                echo "Ca đêm";
                                            }
                                        ?>
                                    </span>
                                </div>
                                <div class="thoihan gr">
                                    <div class="images">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/alarm-clock.png" alt="Hạn tuyển">
                                    </div>
                                    <span class="bold">Hạn tuyển:</span>
                                    <span>
                                        <? if($row['new_end_date']>=time()){ 
                                            echo date('d/m/Y',$row['new_end_date']);
                                        }else{ echo 'Đã hết hạn tuyển dụng'; } ?>
                                    </span>
                                </div>
                                <div class="gr-mt">
                                    <p class="title_mo_ta">Mô tả chi tiết:</p>
                                    <div class="mota gr hidden_bv">
                                        <p class="mt"><?= nl2br($row['new_desc']) ?></p>
                                        <span class="see" style="">Xem thêm >> </span>
                                        <span class="hide" style="display: none;">Rút gọn </span>
                                    </div>
                                </div>
                            </div>
                            <div class="danh_gia_s">
                                <div class="danhgia">
                                    <a class="showpopup" href="javascript:void(0)" onclick="show_popup(this,'popup1')" data-id="<?= $row['new_id'] ?>">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/like.png" alt="like">
                                        <?
                                        $db_rat = new db_query("SELECT count(cmt_id) as id from comment where cmt_vl_id ='".$row['new_id']."'");
                                        while ($rowrat = mysql_fetch_assoc($db_rat->result)) {
                                        ?>
                                        <span class="bold">
                                        <?= $rowrat['id']?>
                                        </span>
                                        <?}?>
                                        <span class="dg">Đánh giá</span>
                                    </a>
                                    <span class="line">|</span>
                                    <div class="view">
                                        <span class="bold view"><?= $row['new_view_count'] ?></span>Lượt xem
                                    </div>
                                </div>
                                <!-- <span class="line">|</span>
                                <div class="view">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/eye.png" alt="view"></div><span class="bold"><?= $row['new_view_count'] ?></span>Lượt xem
                                </div> -->
                            </div>
                            <?
                            if(!isset($_COOKIE['UID']) && empty($_COOKIE['UID'])) 
                            {
                            ?>
                            <a class="showpp" href="javascript:void(0)" onclick="show_pp(this,'popupvl')">
                                <div class="box-lh">
                                    <input type="checkbox" id="checkbox" />
                                    <div class="lienhe" for="checkbox">
                                        <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/lienhe1.png" alt="Nhấn để xem liên hệ"></div>Nhấn để xem liên hệ
                                    </div>
                                </div>
                            </a>
                            <?
                            }else{
                            ?>
                            <div class="group-lh">
                                <div class="lienhevl">
                                    <div class="showname">
                                        <div class="images">
                                            <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/lienhe1.png" alt="Nhấn để xem liên hệ">
                                        </div>
                                        <span>Nhấn để xem liên hệ</span>
                                    </div>
                                    <div class="hidename" style="display: none;">
                                        <div class="images">
                                            <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/showname.png" alt="số điện thoại liên hệ">
                                        </div>
                                        <span><?=$row['usc_name']?>:<?=$row['new_phone']?></span>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            <?}?>  
                        </div>  
                    </div>
                    <?}?>
                    <?
                        while ($rowuv = mysql_fetch_assoc($db_qruv->result)) {
                        $arr_type = explode(",",$rowuv['new_job_type']);//tách chuỗi new_job_type
                        $name_type = array();
                        foreach ($arr_type as $key => $value) { //vòng lặp foreach
                            $name_type[] = '<span class="cv">'.$arr_cate[$value].'</span>';//mảng name_type bằng mảng $arr_cate ($value=$row['new_job_type'])
                            //vd: array(1=> 'a', 2=> 'b') => array[1] == xây dựng
                        }
                        $name_type = implode(' ',$name_type);


                        $arr_type_ct = explode(",",$rowuv['new_job_detail']);//tách chuỗi new_job_type
                        $name_type_ct = array();
                        foreach ($arr_type_ct as $key => $value) { //vòng lặp foreach
                            $name_type_ct[] = '<span class="cv">'.$arr_tag_ct[$value].'</span>';//mảng name_type bằng mảng $arr_cate ($value=$row['new_job_type'])
                            //vd: array(1=> 'a', 2=> 'b') => array[1] == xây dựng
                        }
                        $name_type_ct = implode(' ',$name_type_ct);
                    ?>
                    <div class="item">
                        <div class="item-01">
                            <div class="group">
                                <a href="/viec-lam/<?= replaceTitle($rowuv['new_title']) ?>-p<?= $rowuv['new_id'] ?>.html">
                                    <div class="images images_s1">
                                        <img onerror='this.onerror=null;this.src="/images/vieclam/no_img.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $rowuv['new_picture'] ?>" alt="avata">
                                    </div>
                                </a>
                                <div class="info">
                                    <div class="cty">
                                        <a href="/viec-lam/<?= replaceTitle($rowuv['new_title']) ?>-p<?= $rowuv['new_id'] ?>.html"><h3><?= $rowuv['new_title'] ?></h3></a>

                                        <?
                                        if(isset($_COOKIE['UID']) && !empty($_COOKIE['UID']))
                                        {
                                            $check = new db_query("SELECT * FROM luu_vl WHERE use_id= '".$_COOKIE['UID']."' AND vieclam_id = '".$row['new_id']."'");
                                            if ($check = mysql_num_rows($check->result)>0):?> 
                                    
                                        <span class="save_tv">
                                            <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/save.png" alt="save">
                                        </span>

                                        <?else:?>

                                        <span class="save_tv" data-idv="<?= $rowuv['new_id'] ?>" data-cit="<?= $rowuv['new_city'] ?>">
                                            <img class="btn_save" src="/images/vieclam/luu.png" alt="save">
                                        </span>

                                        <?endif;}
                                        else{
                                        ?>
                                        <span class="save_tv">
                                            <a class="show_reg" href="javascript:void(0)" onclick="show_reg(this,'box_singup')"><img src="/images/vieclam/luu.png" alt="save"></a>
                                        </span>
                                        <?
                                        }
                                        ?>
                                    </div>
                                    <!-- son ne -->
                                    <div class="auth">
                                        <div class="name">
                                            <a href="/viec-lam/<?= replaceTitle($rowuv['new_title']) ?>-p<?= $rowuv['new_id'] ?>.html"><img onerror='this.onerror=null;this.src="/images/vieclam/no_img.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $rowuv['new_picture'] ?>" alt="avata"><?= $rowuv['usc_name'] ?></a>
                                        </div>
                                        <div class="time"><?= time_elapsed_string($rowuv['save_time_vl']) ?></div>
                                    </div>
                                    <!-- <div class="name">
                                        <a href="trang-ca-nhan-<?= replaceTitle($rowuv['usc_name']) ?>-ntd<?= $rowuv['new_user_id'] ?>.html"><?= $rowuv['usc_name'] ?></a>
                                        <div class="time"><?= time_elapsed_string($rowuv['save_time_vl']) ?></div>
                                    </div> -->
                                    
                                </div>
                            </div>
                            <div class="group1">
                                <div class="diadiem gr">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/diachi.png" alt="địa điểm"></div><span class="bold dd"><?= $rowuv['cit_name'] ?></span> | <?= $rowuv['new_address'] ?>
                                </div>
                                <div class="mucluong gr">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/money.png" alt="mức lương"></div><span class="bold">Mức lương: </span><?= $rowuv['new_money_min'] ?>đ - <?= $rowuv['new_money_max'] ?>đ
                                </div>
                                <div class="lhcv gr">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/job.png" alt="Công việc"></div><span class="bold">Công việc:</span> <?= $name_type ?>
                                </div>
                                <div class="lhcv gr">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/job.png" alt="Công việc chi tiết"></div><span class="bold">Công việc chi tiết:</span> <?= $name_type_ct ?>
                                </div>
                                <div class="htvl gr">
                                    <div class="images">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/laptop.png" alt="Hình thức việc làm">
                                    </div>
                                    <span class="bold">Hình thức việc làm:</span>
                                    <span>
                                        <?
                                            if ($rowuv['new_job_kind']==1) {
                                                echo "Toàn thời gian";
                                            }
                                            elseif($rowuv['new_job_kind']==2){
                                                echo "Bán thời gian";
                                            }
                                            elseif($rowuv['new_job_kind']==3){
                                                echo "Giờ hành chính";
                                            }
                                            elseif($rowuv['new_job_kind']==4){
                                                echo "Ca sáng";
                                            }
                                            elseif($rowuv['new_job_kind']==5){
                                                echo "Ca chiều";
                                            }
                                            else{
                                                echo "Ca đêm";
                                            }
                                        ?>
                                    </span>
                                </div>
                                <div class="thoihan gr">
                                    <div class="images">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/alarm-clock.png" alt="Hạn tuyển">
                                    </div>
                                    <span class="bold">Hạn tuyển:</span>
                                    <span>
                                        <? if($rowuv['new_end_date']>=time()){ 
                                            echo date('d/m/Y',$rowuv['new_end_date']);
                                        }else{ echo 'Đã hết hạn tuyển dụng'; } ?>
                                    </span>
                                </div>
                                <div class="gr-mt">
                                    <p class="title_mo_ta">Mô tả chi tiết:</p>
                                    <div class="mota gr hidden_bv">
                                        <p class="mt"><?= nl2br($rowuv['new_desc']) ?></p>
                                        <span class="see" style="">Xem thêm >> </span>
                                        <span class="hide" style="display: none;">Rút gọn </span>
                                    </div>
                                </div>
                                <!-- <div class="gr-mt">
                                    <div class="mota content_tg gr">
                                        <p class="mt"><?= nl2br($rowuv['new_desc']) ?></p>
                                    </div>
                                    <div class="box_see" style="">
                                        <a class="see_more">Xem thêm >> </a>
                                        <a class="hide_text">Rút gọn </a>
                                    </div>
                                </div> -->
                            </div>
                            <div class="danh_gia_s">
                                <div class="danhgia">
                                    <a class="showpopup" href="javascript:void(0)" onclick="show_popup(this,'popup1')" data-id="<?= $rowuv['new_id'] ?>">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/like.png" alt="like">
                                        <?
                                        $db_rat = new db_query("SELECT count(cmt_id) as id from comment where cmt_vl_id ='".$rowuv['new_id']."'");
                                        while ($rowrat = mysql_fetch_assoc($db_rat->result)) {
                                        ?>
                                        <span class="bold">
                                        <?= $rowrat['id']?>
                                        </span>
                                        <?}?>
                                        <span class="dg">Đánh giá</span>
                                    </a>
                                    <span class="line">|</span>
                                    <div class="view">
                                        <span class="bold view"><?= $rowuv['new_view_count'] ?></span>Lượt xem
                                    </div>
                                    <!-- <span class="line">|</span>
                                    <div class="view">
                                        <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/eye.png" alt="view"></div><span class="bold"><?= $rowuv['new_view_count'] ?></span>Lượt xem
                                    </div> -->
                                </div>
                            </div>
                            <?
                            if(!isset($_COOKIE['UID']) && empty($_COOKIE['UID'])) 
                            {
                            ?>
                            <a class="showpp" href="javascript:void(0)" onclick="show_pp(this,'popupvl')">
                                <div class="box-lh">
                                    <input type="checkbox" id="checkbox" />
                                    <div class="lienhe" for="checkbox">
                                        <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/lienhe1.png" alt="Nhấn để xem liên hệ"></div>Nhấn để xem liên hệ
                                    </div>
                                </div>
                            </a>
                            <?
                            }else{
                            ?>
                            <div class="group-lh">
                                <div class="lienhevl">
                                    <div class="showname">
                                        <div class="images">
                                            <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/lienhe1.png" alt="Nhấn để xem liên hệ">
                                        </div>
                                        <span>Nhấn để xem liên hệ</span>
                                    </div>
                                    <div class="hidename" style="display: none;">
                                        <div class="images">
                                            <img class="lazyload " src="/images/loading.gif" data-src="/images/vieclam/showname.png" alt="số điện thoại liên hệ">
                                        </div>
                                        <span><?=$rowuv['usc_name']?>:<?=$rowuv['new_phone']?></span>
                                    </div>
                                    <a class="showpopupuv" href="javascript:void(0)" onclick="show_popupuv(this,'suatimviec')" data-id="<?= $rowuv['new_id'] ?>">
                                        <div class="images"><img class="lazyload sua_tin_tv" src="/images/loading.gif" data-src="/images/vieclam/sua.png" alt="sửa bài đăng"></div>
                                    </a>
                                </div>
                            </div>
                            <?}?> 
                        </div>   
                    </div>
                    <?}?>
                </div>
                <div class="tcn-right">
                    <div class="gioithieu">
                        <h1 class="tt-gioithieu">Giới thiệu</h1>
                        <p class="name">Họ tên: <span><?= $rowui['usc_name'] ?></span></p>
                        <p class="dg">Đánh giá: <span><?= $rowcountsao['id']?></span></p>
                        <p class="vl">Việc làm đã đăng: <span><?= $rowcountviec['id']?></span></p>
                        <p class="dc">Địa chỉ: <span><?= $rowui['usc_address'] ?> - <?= $name_type_tp_1 ?></span></p>
                        <div class="lhmb">
                            <div id="lienhe-tt">
                                <div class="showname_lh">
                                    <span class="hotline"> 0386796*** </span><span class="au-r">Bấm để hiện số</span>
                                </div>
                                <div class="hidename_lh" style="display: none;">
                                    <span><?=$rowui['usc_phone']?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="vieclamtuongtu">
                        <h2 class="vltt">Việc làm tương tự</h2>
                        <?
                            while ($rownew = mysql_fetch_assoc($qrnew->result)) {
                            
                        ?>
                        <div class="gr-vltt">
                            <div class="vl-01">
                                <div class="cty"><a href="/viec-lam/<?= replaceTitle($rownew['new_title']) ?>-p<?= $rownew['new_id'] ?>.html"><?= $rownew['new_title']?></a></div>
                                <div class="money"><?= $rownew['new_money_min']?>vnđ - <?= $rownew['new_money_max']?>vnđ</div>
                                <div class="diachi"><?= $rownew['new_address']?></div>
                            </div>
                        </div>
                        <?}?>
                        <div id="suakinhnghiem-<?=$rowkn['id'] ?>" class="suatin suakinhnghiem">
                            <div class="suatin-content">
                                <p class="tt_hv">Sửa tin tuyển dụng</p>
                                <span class="close " onclick="hide_popup('suakinhnghiem-<?=$rowkn['id'] ?>')">&times;</span>
                                <div class="hoc-van">
                                    <form action="" method="post">
                                        <input type="hidden" name="id_hv" value="<?=$rowkn['id'] ?>" >
                                        <label for="">Tên công việc *</label>
                                        <input type="text" name="cviec" placeholder="Cửa hàng đồ chơi trẻ em Mai Hoa">
                                        <label for="">Chức vụ/vị trí *</label>
                                        <input type="text" name="chucvu" placeholder="Nhân viên bán hàng">
                                        <div class="gr1">
                                            <div class="start">
                                                <label for="">Thời gian bắt đầu *</label>
                                                <input type="text" name="tgbd">
                                                <!-- <select name="tgbd" id="tgbd">
                                                    <option value="0">2015</option>
                                                </select> -->
                                            </div>
                                            <div class="finish">
                                                <label for="">Thời gian kết thúc *</label>
                                                <input type="text" name="tgkt">
                                                <!-- <select name="tgkt" id="tgkt">
                                                    <option value="0">2019</option>
                                                </select> -->
                                            </div>
                                        </div>
                                        <label for="">Mô tả công việc *</label>
                                        <textarea name="mota" cols="30" rows="10" placeholder="- Tư vấn bán hàng với sản phẩm thực phẩm nhập khẩu: cá hồi tươi Nauy, thịt bò Mỹ- Úc, trái cây nhập khẩu và các sản phẩm khác…- Giải đáp thắc mắc của khách hàng về sản phẩm- Sắp xếp, kiểm kê, vệ sinh hàng hóa hàng ngày.- Sơ chế/ pha cắt thực phẩm- Trao đổi chi tiết tại buổi phỏng vấn"></textarea>
                                        <div class="btn">
                                            <button type="submit" name="btn_kinhnghiem" class="luu btn_kinhnghiem">Lưu thông tin</button>
                                            <button type="submit" class="huy">X Hủy</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tabcontent" id="thongtincanhan">
                <div class="mucluc">
                    <ul>
                        <li><button class="tablink" onclick="openPage('gioithieu', this, '#FFF1EA')">Giới thiệu</button></li>
                        <li><button class="tablink" onclick="openPage('thongtinlienhe', this, '#FFF1EA')">Thông tin liên hệ cơ bản</button></li>
                        <li><button class="tablink" onclick="openPage('hocvan', this, '#FFF1EA')">Học vấn - Kinh nghiệm làm việc</button></li>
                        <li><button class="tablink" onclick="openPage('Danhgia', this, '#FFF1EA')">Đánh giá</button></li>
                    </ul>
                </div>
                <button class="accordion">Giới thiệu</button>
                <div class="thongtin panel" id="gioithieu">
                    <div class="content gthieu">
                        <h1 class="tt-ttcn">Giới thiệu</h1>
                        
                        <div id="suagioithieu" class="suatin popup-login">
                            <div class="suatin-content">
                                <p>Sửa giới thiệu
                                <span class="close" onclick="hide_popup('suagioithieu')">&times;</span>
                                </p>
                                
                                <form method="post">
                                    <div class="nd">
                                        <label>Giới thiệu</label>
                                        <textarea name="edit" id="edit" cols="30" rows="10" ><?= $rowui['usc_des']?></textarea>
                                    </div>
                                    <div class="mybtn">
                                        <button type="submit" name="btn_luuthongtin" id="btn_luuthongtin" class="luu">Lưu thông tin</button>
                                        <span type="submit" onclick="hide_popup('suagioithieu')" class="huy">X Hủy</span>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <p class="content-gt"><?= $rowui['usc_des']?></p>
                    </div>
                </div>
                <button class="accordion">Thông tin liên hệ cơ bản</button>
                <div class="thongtin panel" id="thongtinlienhe">
                    <div class="content ttlh">
                        <h1 class="tt-ttcn">Thông tin liên hệ cơ bản</h1>
                        <div id="suathongtin" class="suatin popup-login">
                            <div class="suatin-content">
                                <p>Sửa thông tin liên hệ
                                    <span class="close" onclick="hide_popup('suathongtin')">&times;</span>
                                </p>
                                
                                <div class="Mypopup">
                                <form action="" method="post">
                                    <fieldset>
                                        <label class="col-01">Họ và tên <span>*</span></label>
                                        <input type="text" name="username" id="username" value="<?= $rowui['usc_name']?>" >
                                        <div class="gr1 gr1_s1">
                                            <div class="col-02 gr1_s1_1">
                                                <label class="sdt sdt_s1">Số điện thoại <span>*</span></label>
                                                <input type="number" name="tel" id="tel" value="<?= $rowui['usc_phone']?>" >
                                            </div>
                                            <div class="gtinh">
                                                <label class="col-02">Giới tính <span>*</span> </label>
                                                <select name="gender" id="gender" class="select-seach form-control">
                                                    <? $gender = $rowui['usc_gender']?>
                                                    <option value="2" <?if($gender==2){echo "selected='selected'";}?> >Nữ   </option>
                                                    <option value="0" <?if($gender==0){echo "selected='selected'";}?> >Không muốn tiết lộ</option>
                                                    <option value="1" <?if($gender==1){echo "selected='selected'";}?> >Nam</option>
                                                </select>
                                                <!-- <input type="radio" name="gender" id="gen">
                                                <label for="male">Nam</label>
                                                <input type="radio" name="gender" id="gen">
                                                <label for="female">Nữ</label>
                                                <input type="radio" name="gender" id="gen">
                                                <label for="normal">Không muốn tiết lộ</label> -->
                                            </div>
                                        </div>
                                        <label class="col-01">Địa chỉ <span>*</span></label>
                                        <input type="text" name="address" id="address"  value="<?= $rowui['usc_address']?>">
                                        <div class="btn">
                                            <button type="submit" name="btn_ttlienhe" id="btn_ttlienhe" class="luu">Lưu thông tin</button>
                                            <span type="submit" onclick="hide_popup('suathongtin')" class="huy">X Hủy</span>
                                        </div>
                                    </fieldset>
                                </form>
                                </div>
                            </div>
                        </div>
                        <p>Họ và tên: <span> <?= $rowui['usc_name']?></span></p>
                        <p>Giới tính: 
                            <span>
                                <? 
                                if ($rowui['usc_gender'] == 1) {
                                    echo "Nam";
                                }
                                elseif ($rowui['usc_gender'] == 2) {
                                    echo "Nữ";
                                }
                                else{
                                    echo "Không muốn tiết lộ";
                                }
                                ?>
                            </span>
                        </p>
                        <p>Số điện thoại: <span><?= $rowui['usc_phone']?></span></p>
                        <p>Địa chỉ: <span><?= $rowui['usc_address']?></span></p>
                    </div>
                </div>
                <button class="accordion">Học vấn - Kinh nghiệm làm việc</button>
                <div class="thongtin panel" id="hocvan">
                    <div class="content hvan">
                        <div class="hocvan">
                            <div class="title">
                                <h1 class="tt-ttcn">Học vấn</h1>
                            </div>
                            <div id="themtrinhdo" class="suatin suahocvan popup-login">
                                <div class="suatin-content">
                                    <p class="tt_hv">Thêm trình độ học vấn
                                    <span class="close s_close" onclick="hide_popup('themtrinhdo')">&times;</span>

                                    </p>
                                    <div class="hoc-van hoc_van_s1">
                                        <form action="" method="post">
                                            <label for="">Tên trường học <span> *</span></label>
                                            <input type="text" name="school" placeholder="Nhập trường học........">
                                            <input type="hidden" name="id_hv" value="<?=$rowhv['id'] ?>" >
                                            <div class="gr1">
                                                <div class="start">
                                                    <label for="">Thời gian bắt đầu <span>*</span></label>
                                                    <input type="date" name="tgbd">
                                                </div>
                                                <div class="finish">
                                                    <label for="">Thời gian kết thúc <span>*</span></label>
                                                    <input type="date" name="tgkt">
                                                </div>
                                            </div>
                                            <div class="btn">
                                                <button type="submit" name="btn_trinhdo" class="luu btn_trinhdo">Lưu thông tin</button>
                                                <span type="submit" class="huy" onclick="hide_popup('themtrinhdo')">X Hủy</span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <? while ($rowhv = mysql_fetch_assoc($db_hv->result)) {
                            ?>
                            <div class="noidung noi_dung_s1">
                                <p class="them_hoc_van_s1"><span class="thoigian"><?= date('d/m/Y',$rowhv['time_min']) ?> - <?= date('d/m/Y',$rowhv['time_max']) ?></span><span data-hv="<?=$rowhv['id'] ?>"><?= $rowhv['name_sch'] ?></span></p>
                                <div class="update">
                                    
                                </div>
                                <div id="suahocvan-<?=$rowhv['id'] ?>" class="suatin suahocvan popup-login">
                                    <div class="suatin-content">
                                        <p class="tt_hv">Sửa trình độ học vấn
                                        <span class="close" onclick="hide_popup('suahocvan-<?=$rowhv['id'] ?>')">&times;</span>

                                        </p>
                                        <div class="hoc-van">
                                            <form action="" method="post">
                                                <label for="">Tên trường học <span>*</span></label>
                                                <input type="text" name="school" value="<?=$rowhv['name_sch']?>">
                                                <input type="hidden" name="id_hv" value="<?=$rowhv['id'] ?>" >
                                                <div class="gr1">
                                                    <div class="start">
                                                        <label for="">Thời gian bắt đầu <span>*</span></label>
                                                        <input type="text" name="tgbd" value="<?=date('d/m/Y',$rowhv['time_min'])?>">
                                                        <!-- <select name="tgbd" id="tgbd">
                                                            <option value="0">Thời gian bắt đầu</option>
                                                        </select> -->
                                                    </div>
                                                    <div class="finish">
                                                        <label for="">Thời gian kết thúc <span>*</span></label>
                                                        <input type="text" name="tgkt" value="<?=date('d/m/Y',$rowhv['time_max'])?>">
                                                        <!-- <select name="tgkt" id="tgkt">
                                                            <option value="0">Thời gian kết thúc</option>
                                                        </select> -->
                                                    </div>
                                                </div>
                                                <div class="btn">
                                                    <button type="submit" name="btn_hocvan" class="luu btn_hocvan">Lưu thông tin</button>
                                                    <span type="submit" onclick="hide_popup('suahocvan-<?=$rowhv['id'] ?>')" class="huy">X Hủy</span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?}?>
                            
                        </div>
                        <div class="kinhnghiem">
                            <div class="title">
                                <h1 class="tt-ttcn">Kinh nghiệm làm việc</h1>
                            </div>
                            <div id="themkinhnghiem" class="suatin suakinhnghiem popup-login">
                                <div class="suatin-content">
                                    <p class="tt_hv">Thêm kinh nghiệm làm việc
                                    <span class="close" onclick="hide_popup('themkinhnghiem')">&times;</span>
                                    </p>
                                    <div class="hoc-van">
                                        <form action="" method="post">
                                            <input type="hidden" name="id_hv" value="<?=$rowkn['id'] ?>" >
                                            <label for="">Tên công việc <span>*</span></label>
                                            <input type="text" name="cviec" placeholder="Nhập tên công việc">
                                            <label for="">Chức vụ/vị trí <span>*</span></label>
                                            <input type="text" name="chucvu" placeholder="Nhập chức vụ/vị trí">
                                            <div class="gr1">
                                                <div class="start">
                                                    <label for="">Thời gian bắt đầu <span>*</span></label>
                                                    <input type="date" name="tgbd">
                                                </div>
                                                <div class="finish">
                                                    <label for="">Thời gian kết thúc <span>*</span></label>
                                                    <input type="date" name="tgkt">
                                                </div>
                                            </div>
                                            <label for="">Mô tả công việc <span>*</span></label>
                                            <textarea name="mota" cols="30" rows="10" placeholder="Nhập mô tả công việc"></textarea>
                                            <div class="btn">
                                                <button type="submit" name="btn_kn" class="luu btn_kn">Lưu thông tin</button>
                                                <span type="submit" onclick="hide_popup('themkinhnghiem')" class="huy">X Hủy</span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <? while ($rowkn = mysql_fetch_assoc($db_kn->result)) {
                            ?>
                            <div class="noidung">
                                <p class="name"><span class="thoigian"><?= date('d/m/Y',$rowkn['time_min'])?> - <?= date('d/m/Y',$rowkn['time_max'])?></span><span class="cuahang" data-kn="<?=$rowkn['id'] ?>"><?= $rowkn['name_sch']?></span></p>
                                <div class="update">
                                    
                                </div>
                                <div id="suakinhnghiem-<?=$rowkn['id'] ?>" class="suatin suakinhnghiem popup-login">
                                    <div class="suatin-content">
                                        <p class="tt_hv">Sửa kinh nghiệm làm việc
                                        <span class="close" onclick="hide_popup('suakinhnghiem-<?=$rowkn['id'] ?>')">&times;</span>

                                        </p>
                                        <div class="hoc-van">
                                            <form action="" method="post">
                                                <input type="hidden" name="id_hv" value="<?=$rowkn['id'] ?>" >
                                                <label for="">Tên công việc <span>*</span></label>
                                                <input type="text" name="cviec" value="<?=$rowkn['name_sch']?>">
                                                <label for="">Chức vụ/vị trí <span>*</span></label>
                                                <input type="text" name="chucvu" value="<?=$rowkn['position']?>">
                                                <div class="gr1">
                                                    <div class="start">
                                                        <label for="">Thời gian bắt đầu <span>*</span></label>
                                                        <input type="text" name="tgbd" value="<?=date('d/m/Y',$rowkn['time_min'])?>">
                                                        <!-- <select name="tgbd" id="tgbd">
                                                            <option value="0">2015</option>
                                                        </select> -->
                                                    </div>
                                                    <div class="finish">
                                                        <label for="">Thời gian kết thúc <span>*</span></label>
                                                        <input type="text" name="tgkt" value="<?=date('d/m/Y',$rowkn['time_max'])?>">
                                                        <!-- <select name="tgkt" id="tgkt">
                                                            <option value="0">2019</option>
                                                        </select> -->
                                                    </div>
                                                </div>
                                                <label for="">Mô tả công việc <span>*</span></label>
                                                <textarea type="text" name="mota" cols="30" rows="10" ><?=$rowkn['des']?></textarea>
                                                <div class="btn">
                                                    <button type="submit" name="btn_kinhnghiem" class="luu btn_kinhnghiem">Lưu thông tin</button>
                                                    <span type="submit" onclick="hide_popup('suakinhnghiem-<?=$rowkn['id'] ?>')" class="huy">X Hủy</span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vtcv">
                                <p><span>Vị trí: <?= $rowkn['position']?></span> </p>
                                <p><span>Mô tả công việc: </span></p>
                                <p><?= nl2br($rowkn['des'])?></p>
                            </div>
                            <?}?>
                        </div>
                    </div>
                </div>
                <button class="accordion">Đánh giá</button>
                <div class="thongtin panel" id="Danhgia">
                    <div class="content dgia">
                        <h1 class="tt-ttcn">Đánh giá</h1>
                        <?
                            while ($rowdg = mysql_fetch_assoc($dr_danhgia->result)) {
                            
                        ?>
                        <div class="danh_gia">
                            <div class="images">
                                <img onerror='this.onerror=null;this.src="/images/vieclam/no_img.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $rowdg['usc_logo']?>" alt="avarta">
                            </div>
                            <div class="name"><?=$rowdg['usc_name']?></div>
                            <div class="wp_rate">
                                <div class="bg_rate">
                                    <div class="rate_range" style="width: <?= $rowdg['rating'] ?>"></div>
                                    <div class="fake_rate"></div>
                                </div>
                            </div>
                            <p class="cont-dg"><?= $rowdg['content'] ?></p>
                        </div>
                        <?}?>
                    </div>
                </div>
            </div>
            <div class="tabcontent" id="viecdaluu">
                <?
                while ($rowsave = mysql_fetch_assoc($db_savevl->result)) {
                    $arr_type = explode(",",$rowsave['new_job_type']);//tách chuỗi new_job_type
                    $name_type = array();
                    foreach ($arr_type as $key => $value) { //vòng lặp foreach
                        $name_type[] = '<span class="cv">'.$arr_cate[$value].'</span>';//mảng name_type bằng mảng $arr_cate ($value=$row['new_job_type'])
                        //vd: array(1=> 'a', 2=> 'b') => array[1] == xây dựng
                    }
                    $name_type = implode(' ',$name_type);
                ?>
                <div class="item">
                    <div class="item-01">
                        <div class="group">
                            <div class="images images_s2">
                                <img onerror='this.onerror=null;this.src="/images/vieclam/no_img.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $rowsave['new_picture'] ?>" alt="avata">
                            </div>
                            <div class="info">
                                <div class="cty">
                                    <a href="/viec-lam/<?= replaceTitle($rowsave['new_title']) ?>-p<?= $rowsave['new_id'] ?>.html"><h3><?= $rowsave['new_title'] ?></h3></a>
                                    <span class="delete" ></span>
                                </div>
                                <div class="gr-luu gr_luu_s2">
                                    <div class="name">
                                        <a href="/trang-ca-nhan-<?= replaceTitle($rowsave['usc_name']) ?>-ntd<?= $rowsave['new_user_id'] ?>.html">
                                            <img onerror='this.onerror=null;this.src="/images/vieclam/no_img.png";' class="lazyload" src="/images/loading.gif"  data-src="<?= $rowsave['new_picture'] ?>" alt="avata"><?= $rowsave['usc_name'] ?>
                                        </a>
                                        </div>
                                    <div class="time"><?= time_elapsed_string($rowsave['save_time_vl']) ?></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="group1">
                            <div class="gr-gr gr_s1_ss">
                                <div class="diadiem gr"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/diachi.png" alt="địa điểm"></div><span class="bold"><?= $rowsave['cit_name'] ?></span> | Địa chỉ: <?= $rowsave['new_address'] ?></div>
                                <div class="mucluong gr"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/money.png" alt="mức lương"></div>Mức lương:<span class="bold"><?= $rowsave['new_money_min'] ?> - <?= $rowsave['new_money_max'] ?></span></div>
                                <div class="lhcv gr"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/job.png" alt="Loại hình công việc"></div><span class="bold">Loại hình công việc:</span> <?= $name_type ?></div>
                            </div>
                            <div class="gr-gr1 gr_s1_ss">
                                <div class="htvl gr">
                                    <div class="images">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/laptop.png" alt="Hình thức việc làm">
                                    </div>
                                    <span class="bold">Hình thức việc làm:</span> 
                                    <span>
                                    <?
                                            if ($rowsave['new_job_kind']==1) {
                                                echo "Toàn thời gian";
                                            }
                                            elseif($rowsave['new_job_kind']==2){
                                                echo "Bán thời gian";
                                            }
                                            elseif($rowsave['new_job_kind']==3){
                                                echo "Giờ hành chính";
                                            }
                                            elseif($rowsave['new_job_kind']==4){
                                                echo "Ca sáng";
                                            }
                                            elseif($rowsave['new_job_kind']==5){
                                                echo "Ca chiều";
                                            }
                                            else{
                                                echo "Ca đêm";
                                            }
                                        ?>
                                    </span>
                                </div>
                                <div class="thoihan gr">
                                    <div class="images">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/alarm-clock.png" alt="Hạn tuyển">
                                    </div>
                                    <span class="bold">Hạn tuyển:</span>
                                    <? if($rowsave['new_end_date']>=time()){ 
                                            echo date('d/m/Y',$rowsave['new_end_date']);
                                        }else{ echo 'Đã hết hạn tuyển dụng'; } ?>
                                </div>
                            </div>
                            <div class="gr-mt">
                                    <p class="title_mo_ta">Mô tả chi tiết:</p>
                                    <div class="mota gr hidden_bv">
                                        <p class="mt"><?= nl2br($rowsave['new_desc']) ?></p>
                                        <span class="see" style="">Xem thêm >> </span>
                                        <span class="hide" style="display: none;">Rút gọn </span>
                                    </div>
                                </div>
                            <!-- <div class="gr-mt">
                                <div class="mota content_tg gr">
                                    <p class="mt"><?= nl2br($rowsave['new_desc']) ?></p>
                                </div>
                                <div class="box_see" style="">
                                    <a class="see_more">Xem thêm >> </a>
                                    <a class="hide_text">Rút gọn </a>
                                </div>
                            </div> -->
                        </div>
                        <div class="danh_gia_s">
                            <div class="danhgia">
                                <a class="showpopup" href="javascript:void(0)" onclick="show_popup(this,'popup1')" data-id="<?= $row['new_id'] ?>">
                                    <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/like.png" alt="like">
                                    <?
                                    $db_rat = new db_query("SELECT count(cmt_id) as id from comment where cmt_vl_id ='".$row['new_id']."'");
                                    while ($rowrat = mysql_fetch_assoc($db_rat->result)) {
                                    ?>
                                    <span class="bold">
                                    <?= $rowrat['id']?>
                                    </span>
                                    <?}?>
                                    <span class="dg">Đánh giá</span>
                                </a>
                                <span class="line">|</span>
                                <div class="view">
                                    <span class="bold view"><?= $rowsave['new_view_count'] ?></span>Lượt xem
                                </div>
                                <!-- <span class="line">|</span>
                                <div class="view">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/eye.png" alt="view"></div><span class="bold"><?= $rowsave['new_view_count'] ?></span>Lượt xem
                                </div> -->
                            </div>
                        </div>
                        <?
                        if(!isset($_COOKIE['UID']) && empty($_COOKIE['UID'])) 
                        {
                        ?>
                        <a class="showpp" href="javascript:void(0)" onclick="show_pp(this,'popupvl')">
                            <div class="box-lh">
                                <input type="checkbox" id="checkbox" />
                                <div class="lienhe" for="checkbox">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/lienhe1.png" alt="Nhấn để xem liên hệ"></div>Nhấn để xem liên hệ
                                </div>
                            </div>
                        </a>
                        <?
                        }else{
                        ?>
                        <div class="group-lh">
                            <div class="lienhevl">
                                <div class="showname">
                                    <div class="images">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/lienhe1.png" alt="Nhấn để xem liên hệ">
                                    </div>
                                    <span>Nhấn để xem liên hệ</span>
                                </div>
                                <div class="hidename" style="display: none;">
                                    <div class="images">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/showname.png" alt="số điện thoại liên hệ">
                                    </div>
                                    <span><?=$rowsave['usc_name']?>:<?=$rowsave['new_phone']?></span>
                                </div>
                            </div>
                            
                        </div>
                        <?}?>
                    </div>
                </div>
                <!-- popup_xóa -->
                <div class="popup_thanh_cong_1 popup-login-1" id="s_del_xoa">
                    <div class="pop_tc">
                        <p class="tt_tc">BẠN CHẮC CHẮN MUỐN XÓA !!!</p>
                        <div class="s_2_nut">
                            <div class="nut_ok">
                                <a href="/delete?id=<?= $rowsave["id"]; ?>" class="ok_tt_tc">Xóa</a>
                            </div>
                            <span class="huy">Hủy</span>
                        </div>
                    </div>
                </div>
                <!--end popup_xóa -->
                <?}?>
            </div>
            <div class="tabcontent" id="ungvien">
                <?
                while ($rowsavetv = mysql_fetch_assoc($db_savetv->result)) {
                    $arr_type = explode(",",$rowsavetv['new_job_type']);//tách chuỗi new_job_type
                    $name_type = array();
                    foreach ($arr_type as $key => $value) { //vòng lặp foreach
                        $name_type[] = '<span class="cv">'.$arr_cate[$value].'</span>';//mảng name_type bằng mảng $arr_cate ($value=$row['new_job_type'])
                        //vd: array(1=> 'a', 2=> 'b') => array[1] == xây dựng
                    }
                    $name_type = implode(' ',$name_type);
                ?>
                <div class="item">
                    <div class="item-01">
                        <div class="group">
                            <div class="avata"><img onerror='this.onerror=null;this.src="/images/vieclam/no_img.png";' class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/no_img.png" alt="avata"></div>
                            <div class="info">
                                <div class="timviec">
                                <a href="/viec-lam/<?= replaceTitle($rowsavetv['new_title']) ?>-p<?= $rowsavetv['new_id'] ?>.html"><h3><?= $rowsavetv['new_title']?></h3></a>
                                <span class="delete"></span>
                                <!-- popup_xóa -->
                                <div class="popup_thanh_cong popup-login" id="s_del_xoa">
                                    <div class="pop_tc">
                                        <p class="tt_tc">BẠN CHẮC CHẮN MUỐN XÓA !!!</p>
                                        <div class="s_2_nut">
                                            <div class="nut_ok">
                                                <a href="/delete?id=<?= $rowsavetv["id"]; ?>" class="ok_tt_tc">Xóa</a>
                                            </div>
                                            <span class="huy">Hủy</span>
                                        </div>
                                    </div>
                                </div>
                                <!--end popup_xóa -->
                                </div>
                                <div class="gr-luu gr_luu_s2">
                                    <div class="name">
                                        <a href="/trang-ca-nhan-<?= replaceTitle($rowsavetv['usc_name']) ?>-ntd<?= $rowsavetv['new_user_id'] ?>.html">
                                            <img onerror='this.onerror=null;this.src="/images/vieclam/no-avatar1.png";' src="/images/load.gif" class="lazyload" data-src="<?= $rowsavetv['usc_logo'] ?>" alt="avata"><?= $rowsavetv['usc_name']?>
                                            </a>
                                        </div>
                                    <div class="time"><?= time_elapsed_string($rowsavetv['save_time_vl']) ?></div>
                                </div>
                            </div>
                        </div>
                        <div class="group1">
                            <div class="gr-gr gr_s1_ss">
                                <div class="diadiem gr"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/icon-tv-1.png" alt="địa điểm"></div><span class="bold"><?= $rowsavetv['cit_name'] ?></span> | Địa chỉ: <?= $rowsavetv['new_address'] ?></div>
                                <div class="htvl gr">
                                    <div class="images">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/icon-tv-5.png" alt="Hình thức việc làm">
                                    </div>
                                    <span class="bold">Hình thức việc làm:</span> 
                                    <span>
                                    <?
                                            if ($rowsavetv['new_job_kind']==1) {
                                                echo "Toàn thời gian";
                                            }
                                            elseif($rowsavetv['new_job_kind']==2){
                                                echo "Bán thời gian";
                                            }
                                            elseif($rowsavetv['new_job_kind']==3){
                                                echo "Giờ hành chính";
                                            }
                                            elseif($rowsavetv['new_job_kind']==4){
                                                echo "Ca sáng";
                                            }
                                            elseif($rowsavetv['new_job_kind']==5){
                                                echo "Ca chiều";
                                            }
                                            else{
                                                echo "Ca đêm";
                                            }
                                        ?>
                                    </span>
                                </div>
                                <div class="lhcv gr"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/icon-tv-4.png" alt="Loại hình công việc"></div><span class="bold">Loại hình công việc:</span> <?= $name_type ?></div>
                            </div>
                            <div class="gr-gr1 gr_s1_ss">
                                <div class="mucluong gr"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/icon-tv-2.png" alt="mức lương"></div>Mức lương: <span class="bold"><?= $rowsavetv['new_money_min'] ?> - <?= $rowsavetv['new_money_max'] ?></span></div>
                                <div class="kinhnghiem gr">
                                    <div class="images">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/icon-tv-3.png" alt="Kinh nghiệm làm việc:">
                                    </div>
                                    <span class="bold">Kinh nghiệm làm việc:</span>
                                    <span>
                                        <?
                                            if ($rowsavetv['new_exp']==1) {
                                                echo "Chưa có kinh nghiệm";
                                            }
                                            elseif($rowsavetv['new_exp']==2){
                                                echo "Trên 1 năm kinh nghiệm";
                                            }
                                            else{
                                                echo "Trên 2 năm kinh nghiệm";
                                            }
                                        ?>
                                    </span>
                                </div> 
                            </div>
                            <div class="gr-mt">
                                <p class="title_mo_ta">Mô tả chi tiết:</p>
                                <div class="mota gr hidden_bv">
                                    <p class="mt"><?= nl2br($rowsavetv['new_desc']) ?></p>
                                    <span class="see" style="">Xem thêm >> </span>
                                    <span class="hide" style="display: none;">Rút gọn </span>
                                </div>
                            </div>
                            <!-- <div class="gr-mt">
                                <div class="mota content_tg gr">
                                    <p class="mt"><?= nl2br($rowsavetv['new_desc']) ?></p>
                                </div>
                                <div class="box_see" style="">
                                    <a class="see_more">Xem thêm >> </a>
                                    <a class="hide_text">Rút gọn </a>
                                </div>
                            </div> -->
                        </div>
                        <div class="danh_gia_s">
                            <div class="danhgia">
                                <a class="showpopup" href="javascript:void(0)" onclick="show_popup(this,'popup1')" data-id="<?= $row['new_id'] ?>">
                                    <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/like.png" alt="like">
                                    <?
                                    $db_rat = new db_query("SELECT count(cmt_id) as id from comment where cmt_vl_id ='".$row['new_id']."'");
                                    while ($rowrat = mysql_fetch_assoc($db_rat->result)) {
                                    ?>
                                    <span class="bold">
                                    <?= $rowrat['id']?>
                                    </span>
                                    <?}?>
                                    <span class="dg">Đánh giá</span>
                                </a>
                                <span class="line">|</span>
                                <div class="view">
                                    <span class="bold view"><?= $rowsavetv['new_view_count'] ?></span>Lượt xem
                                </div>
                                <!-- <span class="line">|</span>
                                <div class="view">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/eye.png" alt="view"></div><span class="bold"><?= $rowsavetv['new_view_count'] ?></span>Lượt xem
                                </div> -->
                            </div>
                        </div>
                        <?
                        if(!isset($_COOKIE['UID']) && empty($_COOKIE['UID'])) 
                        {
                        ?>
                        <a class="showpp" href="javascript:void(0)" onclick="show_pp(this,'popupvl')">
                            <div class="box-lh">
                                <input type="checkbox" id="checkbox" />
                                <div class="lienhe" for="checkbox">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/lienhe1.png" alt="Nhấn để xem liên hệ"></div>Nhấn để xem liên hệ
                                </div>
                            </div>
                        </a>
                        <?
                        }else{
                        ?>
                        <div class="group-lh">
                            <div class="lienhevl">
                                <div class="showname">
                                    <div class="images">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/lienhe1.png" alt="Nhấn để xem liên hệ">
                                    </div>
                                    <span>Nhấn để xem liên hệ</span>
                                </div>
                                <div class="hidename" style="display: none;">
                                    <div class="images">
                                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/showname.png" alt="số điện thoại liên hệ">
                                    </div>
                                    <span><?=$rowsavetv['usc_name']?>:<?=$rowsavetv['new_phone']?></span>
                                </div>
                            </div>
                            
                        </div>
                        <?}?>
                    </div>
                </div>
                <?}?>
            </div>
        </div>
    </div>
    <? include("../includes/vieclam/inc_footer.php"); ?>
    <div class="popup" id="popup1" style="display: none;">
        <div class="modal-content">
            <a href="javascript:void(0)" class="close" onclick="hide_popup('popup1')">X</a>
            <div id="status">Đánh giá tin đăng</div>
            <form id="ratingForm" method="post">
                <fieldset class="rating">
                    <legend>Chất lượng tin đăng:</legend>
                    <input type="hidden" id="id_rate" name="id_rate" value="" />
                    <span class="rating_stars">
                        <input class="icon_star" type="radio" name="rating" value="5"><span class="star"></span>
                        <input class="icon_star" type="radio" name="rating" value="4"><span class="star"></span>
                        <input class="icon_star" type="radio" name="rating" value="3"><span class="star"></span>
                        <input class="icon_star" type="radio" name="rating" value="2"><span class="star"></span>
                        <input class="icon_star" type="radio" name="rating" value="1"><span class="star"></span>
                    </span>
                    <div class="dgcb">
                        <label>Đánh giá của bạn:</label>
                        <textarea name="danhgia" id="danhgia" cols="30" rows="10" placeholder="Ví dụ: Tin chính xác, đáng tin cậy..."></textarea>
                    </div>
                </fieldset>
                <div class="clearfix"></div>
                <div class="btn-rate">
                    <button type="submit" name="btn_rating" id="btn_rating" class="submit clearfix" name="postok">Đánh giá</button>
                    <span class="submit huy" onclick="hide_popup('popup1')">Hủy</span>
                </div>
            </form>
        </div>
    </div>
    <div class="popup popuplh" id="popupvl" style="display:none;">
        <div class="popupvl">
            <a href="javascript:void(0)" class="close" onclick="hide_pp('popupvl')">X</a>
            <div>Bạn phải đăng nhập để xem liên hệ</div>
        </div>
    </div>
    <script defer>
        //luu việc làm
        $(".btn_save").on("click", function () {
        var id_vl = $(this).parents('.save_vl').attr("data-ide");
        var id_city = $(this).parents('.save_vl').attr("data_city");
        var tim = $(this).parent('.save_vl');
        $.ajax({
            cache:false,
            type:"POST",
            // method:"POST",
            url:"../ajax/save_vl.php",
            data:{
                id_vl:id_vl,
                id_city:id_city
            },
            success: function (data) {
                alert("Bạn đã lưu tin thành công");
                tim.html("<img src=\"/images/vieclam/save.png\" alt=\"\">");
            }
        })

    });
        //lưu ứng viên
        $(".btn_save").on("click", function () {
        var id_tv = $(this).parents('.save_tv').attr("data-idv");
        var id_cit = $(this).parents('.save_tv').attr("data-cit");
        var tim = $(this).parent('.save_tv');
        $.ajax({
            cache:false,
            type:"POST",
            // method:"POST",
            url:"../ajax/save_vl.php",
            data:{
                id_tv:id_tv,
                id_cit:id_cit
            },
            success: function (data) {
                alert("Bạn đã lưu tin thành công");
                tim.html("<img src=\"/images/vieclam/save.png\" alt=\"\">");
            }
        })

    });
            //ttlh
        $('.showname_lh').click(function(){
            $(this).hide();
            $(this).parent("#lienhe-tt").find(".hidename_lh").show();
        });
        $('.hidename_lh').click(function(){
            $(this).hide();
            $(this).parent("#lienhe-tt").find(".showname_lh").show();
        });
        //show popup
        // $ = function(popup1) {
        //     return document.getElementById(popup1);
        // };
        $("#thanhpho").select2({
            placeholder: " Chọn tỉnh / thành phố"
        });

        function show_popup(t,id) {
            var t_id = $(t).attr('data-id');
            $('#id_rate').val(t_id);
            document.getElementById(id).style.display = 'block';
            return false;
        };
        $('#btn_rating').click(function (e) { 
            console.log($('#id_rate').val());
            $(this).submit();
        });
        function hide_popup(id) {
            document.getElementById(id).style.display = 'none';
            return false;
        };

        //popup lh
        function show_pp(t,id) {
            document.getElementById(id).style.display = 'block';
            return false;
        };
        function hide_pp(id) {
            document.getElementById(id).style.display = 'none';
            return false;
        };
        //show sdt
        // $('.lienhe').click(function(){
        //     var title = $(this).attr("title");
        //     $(this).children('span').html(title);
        // });
        $('.showname').click(function(){
            $(this).hide();
            $(this).parent(".lienhevl").find(".hidename").show();
        });
        $('.hidename').click(function(){
            $(this).hide();
            $(this).parent(".lienhevl").find(".showname").show();
        });
        //rating
        $(".rating_title").hide();
        var ratingLevel = "";
        $(".icon_star").hover(function() {
            var numStar = $(this).attr("value");
            if (numStar == 1) {
                ratingLevel = "Không thích";
            }
            if (numStar == 2) {
                ratingLevel = "Tạm được";
            }
            if (numStar == 3) {
                ratingLevel = "Bình thường";
            }
            if (numStar == 4) {
                ratingLevel = "Rất tốt";
            }
            if (numStar == 5) {
                ratingLevel = "Tuyệt vời";
            }
            $(".rating_title").text(ratingLevel);
            $(".rating_title").stop().fadeIn("slow");
        }, function() {
            $(".rating_title").stop().fadeOut(3000);
        });
        $(".icon_star").click(function() {
            var numStar = $(this).attr("value");
            if (numStar == 1) {
                ratingLevel = "Không thích";
            }
            if (numStar == 2) {
                ratingLevel = "Tạm được";
            }
            if (numStar == 3) {
                ratingLevel = "Bình thường";
            }
            if (numStar == 4) {
                ratingLevel = "Rất tốt";
            }
            if (numStar == 5) {
                ratingLevel = "Tuyệt vời";
            }
            $(".rating_title").text(ratingLevel);
            $(".rating_title").stop().fadeIn("slow");
        });
        $("#show_post").click(function() {
            $(this).fadeOut("slow");
            $(".box_article").addClass("article_full");
        });
        // function put_district(t) {
        //     var id = $(t).val();
        //     $.ajax({
        //         url: '/ajax/get_district_byid.php',
        //         data: {
        //             id: id
        //         },
        //         success: function(data) {
        //             $("#quanhuyen_ft").html(data);
        //         }
        //     })
        // }
        // console.log('ok');
        //show quận huyện
        $("#thanhpho_ft").change(function() {
            var id = $(this).val();
            $.ajax({
                url: '/ajax/get_district_byid.php',
                data: {
                    id: id
                },
                success: function(t) {
                    $("#quanhuyen_ft").html(t);
                }
            })
        });
        $(document).ready(function() {
        if ($('.mota').height() < 50){
            $('.box').hide();
        }
        $(".see").click(function(){
            $(this).hide();
            $(this).next().show();
            $(this).parent().removeClass("hidden_bv");
        });
        $(".hide").click(function(){
            $(this).hide();
            $(this).prev().show();
            $(this).parent().addClass("hidden_bv");
        });
    });
    </script>
    <script>
        $("#lienhe").on("click", function() {
        $(this).toggleClass("on");
        });
    </script>
    <!-- <script>
        // Get the modal
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function() {
        modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
        modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
        }
    </script> -->
    <script>
        $(document).ready(function() {
        $("form#ratingForm").submit(function(e) 
        {
            e.preventDefault(); // prevent the default click action from being performed
            if ($("#ratingForm :radio:checked").length == 0) {
                $('#status').html("nothing checked");
                return false;
            } else {
                $('#status').html( 'You picked ' + $('input:radio[name=rating]:checked').val() );
            }
        });
        });
    </script>
    <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
            panel.style.display = "none";
            } else {
            panel.style.display = "block";
            }
        });
        }
        function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        }
    </script>
    <script>
        function openPage(pageName,elmnt,color) {
        var i, thongtin, tablinks;
        thongtin = document.getElementsByClassName("thongtin");
        for (i = 0; i < thongtin.length; i++) {
            thongtin[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablink");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].style.backgroundColor = "";
        }
        document.getElementById(pageName).style.display = "block";
        elmnt.style.backgroundColor = color;
        }

        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>
    <!-- <script>
        function myFunction() {
        var x = document.getElementById("myDIV");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
        }
    </script> -->
</body>
</html>