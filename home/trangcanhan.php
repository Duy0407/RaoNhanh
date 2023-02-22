<?
include("config_vl.php");
include("version.php");
require_once("../classes/resize-class.php");
$tk = getValue("tk","int","GET",0);
$tk = (int)$tk;
$urlSite = $_SERVER['REQUEST_URI'];
if(isset($_COOKIE['UT']) && isset($_COOKIE['UID']) && isset($_COOKIE['PHPSESPASS'])){
    $userid   = $_COOKIE['UID'];
    $userpass = $_COOKIE['PHPSESPASS'];

    $db_ui = new db_query("SELECT * FROM user WHERE usc_id = '".$tk."' LIMIT 1");
    $rowui = mysql_fetch_assoc($db_ui->result);

    $db_tin = new db_query("SELECT usc_phone,new_phone,save_time_vl,new_city,new_id,new_user_id,new_title,new_address,new_job_type,new_job_kind,new_end_date,new_desc,new_money_min,new_money_max,new_type,usc_name,cit_name,new_view_count,numrate,new_picture
    from vieclam 
    join user on vieclam.new_user_id = user.usc_id 
    join city2 on vieclam.new_city = city2.cit_id where new_user_id = '".$tk."'");
    $rowtin = mysql_fetch_assoc($db_tin->result);
//  soma
    $db_qrvl = new db_query("SELECT usc_phone,new_phone,save_time_vl,new_city,new_id,new_user_id,new_title,new_address,new_job_type,new_job_kind,new_end_date,new_desc,new_money_min,new_money_max,new_type,usc_name,cit_name,new_view_count,numrate,new_picture,new_job_detail
    from vieclam 
    join user on vieclam.new_user_id = user.usc_id 
    join city2 on vieclam.new_city = city2.cit_id where new_type=1 AND new_user_id = '".$tk."' ORDER BY new_id DESC");

    $db_qruv = new db_query("SELECT usc_phone,new_phone,save_time_vl,new_city,new_id,new_user_id,new_title,new_address,new_job_type,new_job_kind,new_end_date,new_desc,new_money_min,new_money_max,new_type,usc_name,cit_name,new_view_count,numrate,new_picture,new_job_detail
    from vieclam 
    join user on vieclam.new_user_id = user.usc_id 
    join city2 on vieclam.new_city = city2.cit_id where new_type=2 AND new_user_id = '".$tk."' ORDER BY new_id DESC");

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

    $qrnew = new db_query("SELECT new_title,new_money_min,new_money_max,new_picture,new_address,new_user_id,new_id FROM vieclam WHERE new_id <> $tk ORDER BY new_id DESC LIMIT 5");

    if (isset($_POST['btn_luuthongtin'])) {
        $edit     = $_POST['edit'];
        $update = new db_query("UPDATE user SET `usc_des`='".$edit."' WHERE usc_id = '".$tk."'");
    }
    if (isset($_POST['btn_ttlienhe'])) {
        $name     = $_POST['username'];
        $phone    = $_POST['tel'];
        $gender   = $_POST['gender'];
        $address  = $_POST['address'];
        $update = new db_query("UPDATE user SET `usc_name`='".$name."', `usc_phone`='".$phone."', `usc_address`='".$address."', `usc_gender`='".$gender."' WHERE usc_id = '".$tk."'");
    }
    $db_hv = new db_query("SELECT id,time_min,time_max,name_sch FROM hocvan_kinhnghiem 
    join user on hocvan_kinhnghiem.usr_id = user.usc_id WHERE type=1 AND usr_id='".$tk."'");
    $db_kn = new db_query("SELECT id,time_min,time_max,name_sch,des,position FROM hocvan_kinhnghiem 
    join user on hocvan_kinhnghiem.usr_id = user.usc_id WHERE type=2 AND usr_id='".$tk."'");
    if (isset($_POST['btn_hocvan'])) {
        $userid   = $_COOKIE['UID'];
        $school     = $_POST['school'];
        $tgbd       = $_POST['tgbd'];
        $tgkt       = $_POST['tgkt'];
        $id         = $_POST['id_hv'];
        $update_hv = new db_query("UPDATE hocvan_kinhnghiem SET `time_min`='".strtotime($tgbd)."',`time_max`='".strtotime($tgkt)."',`name_sch`='".$school."', `usr_id` = '".$tk."' WHERE id = '".$id."'");
        // echo $update_hv;
        // echo "<pre>";
        // print_r($_POST);
        // echo "</pre>";
    }
    if (isset($_POST['btn_trinhdo'])) {
        $userid   = $_COOKIE['UID'];
        $school     = $_POST['school'];
        $tgbd       = $_POST['tgbd'];
        $tgkt       = $_POST['tgkt'];
        $insert_td = new db_query("INSERT INTO hocvan_kinhnghiem (time_min,time_max,name_sch,type,usr_id) VALUES ('".strtotime($tgbd)."','".strtotime($tgkt)."','".$school."',1,'".$userid."')");
    }
    if (isset($_POST['btn_kn'])) {
        $userid   = $_COOKIE['UID'];
        $cviec    = $_POST['cviec'];
        $chucvu   = $_POST['chucvu'];
        $tgbd     = $_POST['tgbd'];
        $tgkt     = $_POST['tgkt'];
        $mota     = $_POST['mota'];
        $insert_kn = new db_query("INSERT INTO hocvan_kinhnghiem (time_min,time_max,name_sch,des,position,type,usr_id) VALUES ('".strtotime($tgbd)."','".strtotime($tgkt)."','".$cviec."','".$mota."','".$chucvu."',2,'".$userid."')");
    }
    if (isset($_POST['btn_kinhnghiem'])) {
        $userid   = $_COOKIE['UID'];
        $cviec    = $_POST['cviec'];
        $chucvu   = $_POST['chucvu'];
        $tgbd     = $_POST['tgbd'];
        $tgkt     = $_POST['tgkt'];
        $mota     = $_POST['mota'];
        $id       = (int)$_POST['id_hv'];
        $update_kn = new db_query("UPDATE `hocvan_kinhnghiem` SET `time_min`='".strtotime($tgbd)."',`time_max`='".strtotime($tgkt)."',`name_sch`='".$cviec."',`des`='".$mota."',`position`='".$chucvu."',`usr_id`='".$tk."' WHERE id = '".$id."'");
        // echo $update_kn;
    }

    $db_savevl = new db_query("SELECT * FROM vieclam 
    JOIN city2 ON vieclam.new_city = city2.cit_id 
    join user on vieclam.new_user_id = user.usc_id 
    JOIN luu_vl ON vieclam.new_id = luu_vl.vieclam_id 
    WHERE luu_type=1 AND luu_vl.use_id = '".$userid."' ORDER BY luu_vl.id DESC");

    $db_count = new db_query("SELECT count(id) as id from luu_vl WHERE luu_type=1 AND use_id = '".$_COOKIE['UID']."'");
    $rowcount=mysql_fetch_assoc($db_count->result);

    $db_count_viec = new db_query("SELECT new_id from vieclam WHERE  new_user_id = '".$_COOKIE['UID']."'");
    // echo("SELECT new_id  from vieclam WHERE  new_user_id = '".$_COOKIE['UID']."'");
    // die();
    $rowcountviec = mysql_num_rows($db_count_viec->result);
    // $rowcountviec =mysql_num_rows($db_count_viec->result);

    $db_count_sao = new db_query("SELECT count(cmt_id) as id from comment WHERE  cmt_user_id = '".$_COOKIE['UID']."'");
    $rowcountsao=mysql_fetch_assoc($db_count_sao->result);

    $db_savetv = new db_query("SELECT * FROM vieclam 
    JOIN city2 ON vieclam.new_city = city2.cit_id 
    join user on vieclam.new_user_id = user.usc_id 
    JOIN luu_vl ON vieclam.new_id = luu_vl.vieclam_id 
    WHERE luu_type=2 AND luu_vl.use_id = '".$userid."' ORDER BY luu_vl.id DESC");
    $db_counttv = new db_query("SELECT count(id) as id from luu_vl WHERE luu_type=2 AND use_id = '".$_COOKIE['UID']."'");
    $rowcountv=mysql_fetch_assoc($db_counttv->result);



    // thanh-kudo soma
    if (isset($_POST['btn_tuyendung'])) {
        $id_td =$_POST['id_vieclam'];
        $userid   = $_COOKIE['UID'];
        $tieude   = $_POST['tieude'];
        $thanhpho = $_POST['thanhpho'];
        $quanhuyen = $_POST['quanhuyen'];
        $diachi   = $_POST['diachi'];
        $phone    = $_POST['phone'];
        $htlv     = $_POST['htlv'];
        $lhlv     = implode(',',$_POST["lhlv"]);
        $trinhdo  = $_POST['trinhdo'];
        $kinhnghiem = $_POST['kinhnghiem'];
        $chungchi = $_POST['chungchi'];
        $ctcv     = $_POST['ctcv'];
        $hantuyen = $_POST['hantuyen'];
        $soluong  = $_POST['soluong'];
        $luongmin = $_POST['luongmin'];
        $luongmax = $_POST['luongmax'];
        $thang    = $_POST['thang'];
        $mota     = $_POST['mota'];
        $id       = (int)$_POST['id_vieclam'];
        if ($_FILES['image']['size'] > 0) {
        //Tạo đường dẫn 
            $upload_dir = "../thumb/" . date('Y/m/d', time());
            // check đuôi file 
            $img_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
            $expensions = array("jpeg", "jpg", "png", "gif", "svg");
            //Check size ảnh 
            if (in_array($img_ext, $expensions) == true && $_FILES['image']['size'] <= 2100000) {

                $image =   '/job-' . time() . '.' . $img_ext; // Tạo tên ảnh 
                $image_u =  date('Y/m/d', time()) . '/job-' . time() . '.' . $img_ext; // tạo đường dẫn đẩy vào base 
                if (!is_dir($upload_dir)) { // check xem đường dẫn đẩy ảnh vào tồn tại hay chưa 
                    if (!is_dir("../thumb/" . date('Y/m/d', time()))) mkdir("../thumb/" . date('Y/m/d', time()), 0777, TRUE); // Chưa tồn tại thì tạo đường dẫn đó 
                }
                move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $image); //đẩy ảnh vào folder đã tạo 
            }
        } else {

            $qr_image = new db_query("SELECT new_picture FROM vieclam WHERE new_id = ".$id_td);
            $db_image=mysql_fetch_assoc($qr_image->result);
            $image = $db_image['new_picture'];
        }
        $update_vieclam = new db_query("UPDATE vieclam SET `new_user_id`='".$tk."',`new_title`='".$tieude."',`new_city`='".$thanhpho."',`new_district`='".$quanhuyen."',`new_phone`='".$phone."',`new_address`='".$diachi."',`new_job_type`='".$lhlv."',`new_job_kind`='".$htlv."',`new_job_detail`='".$ctcv."',`new_end_date`='".strtotime($hantuyen)."',`new_money_min`='".$luongmin."',`new_money_max`='".$luongmax."',`new_picture`='".$upload_dir.$image."',`new_desc`='".$mota."',`new_exp`='".$kinhnghiem."',`new_level`='".$trinhdo."',`new_skill`='".$chungchi."',`new_pay_type`='".$thang."',`new_quantity`='".$soluong."',`save_time_vl`='".time()."'
        WHERE new_id = '".$id_td."'");
    }



    if (isset($_POST['btn_timviec'])) {
        $userid   = $_COOKIE['UID'];
        $id       = (int)$_POST['id_timviec'];
        $title = $_POST["tieude"];
        $birth = $_POST["ngaysinh"];
        $gender = $_POST["gioitinh"];
        $phone = $_POST["phone"];
        $level = $_POST["trinhdo"];
        $exp = $_POST["kinhnghiem"];
        $skill = $_POST["chungchi"];
        $city = $_POST["thanhpho"];
        $district = $_POST["quanhuyen"];
        $address = $_POST["diachi"];
        $jobkind = $_POST["htlv"];
        $enddate = $_POST["hantuyen"];
        $jobtype = implode(',',$_POST["lhlv"]);
        $detailjob = $_POST["ctcv"];
        $moneymin = $_POST["luongmin"];
        $moneymax = $_POST["luongmax"];
        $paytype = $_POST["thang"];
        $desc = $_POST["mota"];
        if (!empty($_FILES['image'])) {
        //Tạo đường dẫn 
            $upload_dir = "../thumb/" . date('Y/m/d', time());
            // check đuôi file 
            $img_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
            $expensions = array("jpeg", "jpg", "png", "gif", "svg");
            //Check size ảnh 
            if (in_array($img_ext, $expensions) == true && $_FILES['image']['size'] <= 2100000) {

                $image =   '/job-' . time() . '.' . $img_ext; // Tạo tên ảnh 
                $image_u =  date('Y/m/d', time()) . '/job-' . time() . '.' . $img_ext; // tạo đường dẫn đẩy vào base 
                if (!is_dir($upload_dir)) { // check xem đường dẫn đẩy ảnh vào tồn tại hay chưa 
                    if (!is_dir("../thumb/" . date('Y/m/d', time()))) mkdir("../thumb/" . date('Y/m/d', time()), 0777, TRUE); // Chưa tồn tại thì tạo đường dẫn đó 
                }
                move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $image); //đẩy ảnh vào folder đã tạo 
            }
        } else {
            $qr_image = new db_query("SELECT new_picture FROM vieclam WHERE new_id = ".$id_td);
            $db_image=mysql_fetch_assoc($qr_image->result);
            $image = $db_image['new_picture'];
        }
        $update_tv = new db_query("UPDATE vieclam SET 
        `new_user_id`='".$tk."',
        `new_title`='".$title."',
        `new_city`='".$city."',
        `new_district`='".$district."',
        `new_phone`='".$phone."',
        `new_address`='".$address."',
        `new_job_type`='".$jobtype."',
        `new_job_kind`='".$jobkind."',
        `new_job_detail`='".$detailjob."',
        `new_end_date`='".strtotime($enddate)."',
        `new_money_min`='".$moneymin."',
        `new_money_max`='".$moneymax."',
        `new_picture`='".$upload_dir.$image."',
        `new_desc`='".$desc."',
        `new_exp`='".$exp."',
        `new_level`='".$level."',
        `new_skill`='".$skill."',
        `new_pay_type`='".$paytype."',
        `save_time_vl`='".time()."'
        WHERE new_id = '".$id."'");
    }
    // son1
    if (isset($_POST['btn_anhbia'])) {
            $urlimg='';
             $userid = $_COOKIE["UID"];
             $dir = getimageuv(time());
             if($_FILES['images']['type'] == 'image/png')
                {  $images = 'avatar'.$userid.".png"; }
             if($_FILES['images']['type'] == 'image/jpeg')
                {  $images = 'avatar'.$userid.".jpg"; }
             if($_FILES['images']['type'] == 'image/gif')
                {  $images = 'avatar'.$userid.".gif"; }
             file_put_contents($dir.$images, file_get_contents($_FILES['images']['tmp_name']));  
             $resizeObj = new resize($dir.$images);
             $resizeObj -> resizeImage(177, 130, 'auto');
             $resizeObj -> saveImage($dir.$images, 100);
             $db_exx = new db_query("UPDATE user SET usc_anhbia = '".$dir.$images."' WHERE usc_id = ".$userid);
            //  echo ($db_exx);
    }




    if(isset($_FILES) and $_SERVER['REQUEST_METHOD'] == "POST"){
    	$userid = $_COOKIE["UID"];
    	$userid = (int)$userid;
    	$url = getValue('url','str','POST','');

    	$db_qrcheck = new db_query("SELECT usc_id,usc_time,usc_logo FROM user WHERE usc_id = '".$userid."' LIMIT 1");
    	if(mysql_num_rows($db_qrcheck->result) > 0)
    		{
    			$_SESSION['error'] = '';
    			$path = "../pictures/";

    			// $sl = new db_query("SELECT usc_time,usc_logo FROM user WHERE usc_id = ".$_COOKIE['UID']);
    			// $row = mysql_fetch_assoc($sl->result);

    			$allowTypes = array('jpg','png','jpeg','gif','jfif');
    			$type = pathinfo($_FILES["avatar"]["name"],PATHINFO_EXTENSION);

    			$path_tmp = $_FILES['avatar']['tmp_name'];

    			$file_name = $_FILES['avatar']['name'];
    			$file_name = reset(explode('.', $file_name));		
    			
    			if(in_array($type, $allowTypes))
    			{
    				$year = date('Y',$rowui['usc_time']);
    				$month =  date('m',$rowui['usc_time']);
    				$day = date('d',$rowui['usc_time']);

    				if(!file_exists($path.$year))
    				{
    					mkdir($path.$year);
    				}
    				if(!file_exists($path.$year.'/'.$month))
    				{
    					mkdir($path.$year.'/'.$month);
    				}
    				if(!file_exists($path.$year.'/'.$month.'/'.$day))
    				{
    					mkdir($path.$year.'/'.$month.'/'.$day);
    				}
    				$file_name = $_FILES['avatar']['name'];
    				$file_name = reset(explode('.', $file_name));
    				$file_name = replaceTitle(urldecode($file_name));
    				
    				$pathfull = geturlimageAvatar(time());
    				if(move_uploaded_file($path_tmp, $pathfull.$_FILES['avatar']['name']))
    				{
    					$filename = $_FILES['avatar']['name'];
    					rename($pathfull.$filename,$pathfull.$file_name.'.'.$type);
    					if(is_file(geturlimageAvatar($rowui['usc_time']).$rowui['usc_logo']))
    					{
    						unlink(geturlimageAvatar($rowui['usc_time']).$rowui['usc_logo']);
    					}
    					$db_upload = new db_query(" UPDATE user
    												SET usc_logo = '".$pathfull.$file_name.'.'.$type."' 
    												WHERE usc_id = ".$_COOKIE['UID']);
    					
    					redirect($url);
    				}
    				else
    				{
    					$_SESSION['error'] = "Có lỗi xảy ra khi upload ảnh đại diện, vui lòng thử lại";
    					redirect($url);
    				}
    				if($_FILES['avatar'] > 0)
    				{
    					$_SESSION['error'] = "Có lỗi xảy ra, vui lòng thử lại";
    					redirect($url);
    				}
    			}
    			else
    			{
    				$_SESSION['error'] =  "Ảnh đại diện của bạn không đúng định dạng";
    				redirect($url);
    			}
    	}
    }

$dr_danhgia = new db_query("SELECT * FROM comment 
    join user on comment.cmt_user_id = user.usc_id 
    join vieclam on comment.cmt_vl_id = vieclam.new_id where comment.cmt_user_id='".$tk."' ORDER BY cmt_id DESC");
    // show thành phố
$arr_type_tp = explode(",",$rowui['new_city']);
$name_type_tp = array();
foreach ($arr_type_tp as $key => $value) {
    $name_type_tp[] = $arr_tp[$value];
}
$name_type_tp = implode(' ',$name_type_tp);

// show thành phố
$arr_type_tp_1 = explode(",",$rowui['usc_city']);
$name_type_tp_1 = array();
foreach ($arr_type_tp_1 as $key => $value) {
    $name_type_tp_1[] = $arr_tp[$value];
}
$name_type_tp_1 = implode(' ',$name_type_tp_1);

// quận huyên 
$arr_type_qh = explode(",",$rowui['new_district']);
$name_type_qh = array();
foreach ($arr_type_qh as $key => $value_1) { 
    $name_type_qh[] = $arr_qh[$value_1];
}
$name_type_qh = implode(' ',$name_type_qh);
}
else{
    redirect("/");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang cá nhân</title>
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="stylesheet" href="/css/vieclam/select2.min.css">
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
    <link rel="preload" as="style" href="/css/vieclam/style.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/style.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'">
</head>
<body>
    <? include("../includes/vieclam/header1.php"); ?>
    <div class="Trang_ca_nhan">
        <input type="hidden" class="user-id-login" data-id="<?php (isset($userid)) ? $userid : 0; ?>">
        <div class="row">
            <div class="dumb">
                <a href="/viec-lam.html">Trang chủ</a>
                <span class="line"> / </span>
                <a href="#" class="name"><?= $rowui['usc_name'] ?></a>
            </div>
            <div class="avarta">
                <div class="banner" id="banner">
                    <form action="" method="post" enctype="multipart/form-data">
                        <img id="preview_logo" src="/images/load.gif" class="lazyload" onerror="this.src='/images/vieclam/anhbia.png'" data-src="<?= $rowui['usc_anhbia'] ?>" />
                        <input type="file" name="images" id="images" onchange="loadFile(event)">
                        <button type="submit" name="btn_anhbia" class="btn_anhbia"><img src="/images/vieclam/anh5.png" alt="">Cập nhật ảnh bìa</button>
                    </form>
                </div>
                <!-- son1 -->
                    <!-- <div class="banner" id="banner">
                        <img id="preview_logo" src="/images/load.gif" class="lazyload" onerror="this.src='/images/vieclam/anhbia.png'" data-src="<?= $rowui['usc_anhbia'] ?>" />
                        <input type="file" name="images" id="images">
                    </div> -->
                
                <div id="change_avt" title="Click để đổi ảnh đại diện">
                    <img id="imgch" src="/images/load.gif" class="lazyload" onerror="this.src='/images/vieclam/no-avatar1.png'" data-src="<?= $rowui['usc_logo'] ?>" alt="">
                    <img id="ico_camera" src="/images/vieclam/anh4.png" alt="">
                    <form action="" method="POST" enctype="multipart/form-data" class=" form_ava hidden">
                        <input name="url" type="text" value="<?= $_SERVER['REQUEST_URI'] ?>">
                        <input type="file" name="avatar" id="avt_file">
                        <input type="submit" name="Submit" id="submit">
                    </form>
                </div>
                <div class="name"><?= $rowui['usc_name'] ?></div>
                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'dongthoigian')">Dòng thời gian</button>
                    <button class="tablinks" onclick="openCity(event, 'thongtincanhan')">Thông tin cá nhân</button>
                    <button class="tablinks" onclick="openCity(event, 'viecdaluu')">Việc làm đã lưu(<?= $rowcount['id'] ?>)</button>
                    <button class="tablinks" onclick="openCity(event, 'ungvien')">Ứng viên đã lưu(<?= $rowcountv['id'] ?>)</button>
                </div>
            </div>
            <div class="tabcontent" id="dongthoigian">
                    <div class="gioithieu_mb">
                        <h1 class="tt-gioithieu">Giới thiệu</h1>
                        <p class="dg">Đánh giá: <span><?= $rowcountsao['id']?></span></p>
                        <p class="name name_s1" >Họ tên: <span><?= $rowui['usc_name'] ?></span></p>   
                        <p class="dgmb">Đánh giá: <span><?= $rowcountsao['id']?></span></p>                     
                        <p class="vl">Việc làm đã đăng: <span><? echo $rowcountviec;?></span></p>
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
                                        <img onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $row['new_picture'] ?>" alt="avata">
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
                                            <img class="btn_save_vl" src="/images/vieclam/luu.png" alt="save">
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
                                            <a href="/viec-lam/<?= replaceTitle($row['new_title']) ?>-p<?= $row['new_id'] ?>.html"><img onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $row['new_picture'] ?>" alt="avata"><?= $row['usc_name'] ?></a>
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
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/money.png" alt="mức lương"></div>Mức lương: <span class="bold" style="margin-left: 5px;" > <?= $row['new_money_min'] ?>đ - <?= $row['new_money_max'] ?>đ</span>
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
                                        <span><?=$row['usc_name']?>: <?=$row['new_phone']?></span>
                                    </div>
                                    <!-- onclick="show_popupvl(this,'suatuyendung')" -->
                                    <a class="showpopupvl" href="javascript:void(0)"  data-id="<?= $row['new_id'] ?>">
                                        <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/sua.png" alt="sửa bài đăng"></div>
                                    </a>
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
                                        <img onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $rowuv['new_picture'] ?>" alt="avata">
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
                                            <a href="/viec-lam/<?= replaceTitle($rowuv['new_title']) ?>-p<?= $rowuv['new_id'] ?>.html"><img onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $rowuv['new_picture'] ?>" alt="avata"><?= $rowuv['usc_name'] ?></a>
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
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/money.png" alt="mức lương"></div><span class="bold"  style="margin-left: 5px;">Mức lương: </span><?= $rowuv['new_money_min'] ?>đ - <?= $rowuv['new_money_max'] ?>đ
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
                                        <span><?=$rowuv['usc_name']?>: <?=$rowuv['new_phone']?></span>
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
                        <p class="vl">Việc làm đã đăng: <span><? echo $rowcountviec;?></span></p>
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
                        
                        <button id="Btn" onclick="popup('suagioithieu')"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/sua1.png" alt="sửa giới thiệu"></div></button>
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
                        <button id="Btn" onclick="popup('suathongtin')"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/sua1.png" alt="sửa bài đăng"></div></button>
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
                                <button id="Btn_hv" onclick="popup('themtrinhdo')"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/them.png" alt="thêm học vấn"></div></button>
                            </div>
                            <div id="themtrinhdo" class="suatin suahocvan popup-login">
                                <div class="suatin-content">
                                    <p class="tt_hv">Thêm trình độ học vấn
                                    <span class="close s_close" onclick="hide_popup('themtrinhdo')">&times;</span>

                                    </p>
                                    <div class="hoc-van hoc_van_s1">
                                        <form action="" method="post">
                                            <label for="">Tên trường học <span> *</span></label>
                                            <input type="text" name="school" id="school" placeholder="Nhập trường học........">
                                            <input type="hidden" name="id_hv"  value="<?=$rowhv['id'] ?>" >
                                            <div class="gr1">
                                                <div class="start">
                                                    <label for="">Thời gian bắt đầu <span>*</span></label>
                                                    <input type="date" name="tgbd" id="tgbd">
                                                </div>
                                                <div class="finish">
                                                    <label for="">Thời gian kết thúc <span>*</span></label>
                                                    <input type="date" name="tgkt" id="tgkt">
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
                                <p class="them_hoc_van_s1"><span class="thoigian"><?= date('d/m/Y',$rowhv['time_min']) ?> - <?= date('d/m/Y',$rowhv['time_max']) ?></span><span data-hv="<?=$rowhv['id'] ?>" style="line-height: 32px;"><?= $rowhv['name_sch'] ?></span></p>
                                <div class="update">
                                    <button class="btn_s11" id="Btn" onclick="popup('suahocvan-<?=$rowhv['id'] ?>')">
                                        <div class="images">
                                            <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/sua2.png" alt="sửa bài đăng">
                                        </div>
                                    </button>
                                    <span class="delete" id_del=<?=$rowhv['id']?>>
                                        <a href="/delete?id=<?= $rowhv["id"]; ?>">
                                            <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/xoa.png" alt="save">
                                        </a>
                                    </span>
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
                                <button  id="Btn_hv" onclick="popup('themkinhnghiem')"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/them.png" alt="thêm kinh nghiệm"></div></button>
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
                                    <button class="btn_s11" id="Btn" onclick="popup('suakinhnghiem-<?=$rowkn['id'] ?>')">
                                        <div class="images">
                                            <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/sua2.png" alt="sửa bài đăng">
                                        </div>
                                    </button>
                                    <span class="delete" id_del=<?=$rowkn['id']?>>
                                        <a href="/delete?id=<?= $rowkn["id"]; ?>">
                                            <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/xoa.png" alt="save">
                                        </a>
                                    </span>
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
                                <img style="margin-right: 10px;" onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $rowdg['usc_logo']?>" alt="avarta">
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
                                <img onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $rowsave['new_picture'] ?>" alt="avata">
                            </div>
                            <div class="info">
                                <div class="cty">
                                    <a href="/viec-lam/<?= replaceTitle($rowsave['new_title']) ?>-p<?= $rowsave['new_id'] ?>.html"><h3><?= $rowsave['new_title'] ?></h3></a>
                                    <span class="delete" ><a class="ss_delete" href="/delete?id=<?= $rowsave["id"]; ?>" ><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/xoa.png" alt="save"></a></span>
                                </div>
                                <div class="gr-luu gr_luu_s2">
                                    <div class="name">
                                        <a href="/trang-ca-nhan-<?= replaceTitle($rowsave['usc_name']) ?>-ntd<?= $rowsave['new_user_id'] ?>.html">
                                            <img onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif"  data-src="<?= $rowsave['new_picture'] ?>" alt="avata"><?= $rowsave['usc_name'] ?>
                                        </a>
                                        </div>
                                    <div class="time"><?= time_elapsed_string($rowsave['save_time_vl']) ?></div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="group1">
                            <div class="gr-gr gr_s1_ss">
                                <div class="diadiem gr"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/diachi.png" alt="địa điểm"></div><span class="bold"><?= $rowsave['cit_name'] ?></span> | Địa chỉ: <?= $rowsave['new_address'] ?></div>
                                <div class="mucluong gr"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/money.png" alt="mức lương"></div>Mức lương:<span class="bold"  style="margin-left: 5px;"><?= $rowsave['new_money_min'] ?> - <?= $rowsave['new_money_max'] ?></span></div>
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
                                    <span><?=$rowsave['usc_name']?>: <?=$rowsave['new_phone']?></span>
                                </div>
                            </div>
                            
                        </div>
                        <?}?>
                    </div>
                </div>
                <!-- popup_xóa -->
                <!-- <div class="popup_thanh_cong_1 popup-login-1" id="s_del_xoa">
                    <div class="pop_tc">
                        <p class="tt_tc">BẠN CHẮC CHẮN MUỐN XÓA !!!</p>
                        <div class="s_2_nut">
                            <div class="nut_ok">
                                <a  class="ok_tt_tc">Xóa</a>
                            </div>
                            <span class="huy">Hủy</span>
                        </div>
                    </div>
                </div> -->
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
                            <div class="avata"><img onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif" data-src="/images/icon_raonhanh.png" alt="avata"></div>
                            <div class="info">
                                <div class="timviec">
                                <a href="/viec-lam/<?= replaceTitle($rowsavetv['new_title']) ?>-p<?= $rowsavetv['new_id'] ?>.html"><h3><?= $rowsavetv['new_title']?></h3></a>
                                <span class="delete"><a href="/delete?id=<?= $rowsavetv["id"]; ?>" class="s_delete" ><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/xoa.png" alt="save"></a></span>
                                <!-- popup_xóa -->
                                <!-- <div class="popup_thanh_cong popup-login" id="s_del_xoa">
                                    <div class="pop_tc">
                                        <p class="tt_tc">BẠN CHẮC CHẮN MUỐN XÓA !!!</p>
                                        <div class="s_2_nut">
                                            <div class="nut_ok">
                                                <a  class="ok_tt_tc">Xóa</a>
                                            </div>
                                            <span class="huy">Hủy</span>
                                        </div>
                                    </div>
                                </div> -->
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
                                <div class="mucluong gr"><div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/icon-tv-2.png" alt="mức lương"></div>Mức lương: <span class="bold"  style="margin-left: 5px;"><?= $rowsavetv['new_money_min'] ?> - <?= $rowsavetv['new_money_max'] ?></span></div>
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
                                    <span><?=$rowsavetv['usc_name']?>: <?=$rowsavetv['new_phone']?></span>
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
    <div id="suatuyendung" class="suatin suatuyendung popup-login" style="display:none;">
        <div class="suatin-content-1">
            <p class="tt_hv">Sửa tin tuyển dụng
                <span class="close_1" onclick="hide_popup('suatuyendung')">&times;</span>
            </p>
            <div class="tuyen-dung">
            <form action="" method="post" enctype="multipart/form-data">
                <fieldset>
                    <input type="hidden" id="id_vieclam" name="id_vieclam" value="" /> 
                    <div class="dang_tin_s">
                        <label class="col col-1 title_dttd_s">Tiêu đề <span>*</span></label>
                        <input type="text" name="tieude" id="tieude" placeholder="Nhập tiêu đề...">
                    </div>
                    <div class="gr gr-01 dang_tin_s_1 dang_tin_s_2">
                        <label class="col col-2 title_dttd_s">Tỉnh/thành phố <span>*</span></label>
                        <select class="dang_tin_right_s style_select" name="thanhpho" id="thanhpho_ft">
                            <option value="">Chọn tỉnh / thành phố</option>
                                <?
                                $query = new db_query("SELECT cit_id,cit_name FROM city2 where cit_parent = 0");
                                while($rowcty= mysql_fetch_assoc($query->result)) {
                                ?>
                                <option class="thanhpho_<? echo $rowcty['cit_id']; ?>"   value="<? echo $rowcty['cit_id']; ?>"  >
                                    <? echo $rowcty['cit_name']; ?>
                                </option>
                                <?
                            }
                            ?>
                        </select>
                    </div>
                    <div class=" dang_tin_s_1 dang_tin_s_3">
                        <label class="col col-2 title_dttd_s">Quận/huyện <span>*</span></label>
                        <select name="quanhuyen" id="quanhuyen_ft" value="" class="style_select">
                            <option value="">Chọn quận /huyện</option>
                        </select>
                    </div>
                    <div class="dang_tin_s">
                        <label class="col col-1 title_dttd_s">Địa chỉ cụ thể <span>*</span></label>
                        <input type="text" name="diachi" id="diachi" placeholder="Nhập địa chỉ cụ thể...">
                    </div>
                    <div class="tong_s_1">
                        <div class="  dang_tin_s_1 ">
                            <label class="col col-2 title_dttd_s">Số điện thoại <span>*</span></label>
                            <input class="dang_tin_right_s" type="tel" name="phone" id="phone" placeholder="Nhập số điện thoại...">
                        </div>
                        <div class=" dang_tin_s_1">
                            <label class="col col-2 title_dttd_s">Hình thức làm việc <span>*</span></label>
                            <select  name="htlv" id="htlv">
                                <option value="">Chọn hình thức làm việc</option>
                                <option value="1">Toàn thời gian</option>
                                <option value="2">Bán thời gian</option>
                                <option value="3">Giờ hành chính</option>
                                <option value="4">Ca sáng</option>
                                <option value="5">Ca chiều</option>
                                <option value="6">Ca đêm</option>
                            </select>
                        </div>
                    </div>
                    <!-- soma -->
                    <div class="tong_s_1">
                        <div class="dang_tin_s_1 ">
                            <label class="col col-1 title_dttd_s">Ngành nghề <span>*</span></label>
                            <select class="dang_tin_right_s style_select" name="lhlv[]" id="lhlv"  >
                                <option value="">Chọn Ngành nghề </option>
                                <? 
                                $db_qra = new db_query("SELECT cat_id, cat_name FROM category_vl ");
                                While($rowa = mysql_fetch_assoc($db_qra->result))
                                { ?>
                                <option class="nganh_nghe_<?=$rowa['cat_id'] ?>" value="<?=$rowa['cat_id'] ?>" ><?=$rowa['cat_name'] ?></option>
                                <?
                                }
                                ?>
                            </select>
                        </div>
                        <div class=" dang_tin_s_1">
                            <label class="col col-2 title_dttd_s">Trình độ học vấn<span>*</span></label>
                            <select name="trinhdo" id="trinhdo">
                                <option value="">Trình độ học vấn</option>
                                <option value="1">Đại học</option>
                                <option value="2">Cao đẳng</option>
                                <option value="3">Lao động phổ thông</option>
                            </select>
                        </div>
                    </div>
                    <div class="tong_s_1">
                        <div class="  dang_tin_s_1">
                            <label class="col col-2 title_dttd_s">Kinh nghiệm làm việc<span>*</span></label>
                            <select class="dang_tin_right_s" name="kinhnghiem" id="kinhnghiem">
                                <option value="">Kinh nghiệm làm việc</option>
                                <option value="1">Chưa có kinh nghiệm</option>
                                <option value="2">Kinh nghiệm từ 1-2 năm</option>
                                <option value="3">Kinh nghiệm trên 2 năm</option>
                            </select>
                        </div>
                        <div class=" dang_tin_s_1">
                            <label class="col col-2 title_dttd_s">Chứng chỉ / Kỹ năng<span>*</span> </label>
                            <input type="text" name="chungchi" id="chungchi" placeholder="Nhập chứng chỉ / kỹ năng...">
                        </div>
                        <div class="dang_tin_s dang_tin_s_3">
                            <label class="col col-1 title_dttd_s">Công việc chi tiết <span>*</span></label>
                            <select class="form-control style_select" name="ctcv"  id="ctcv"  >
                                <option value="">Chọn công việc chi tiết</option>
                            </select>
                        </div>
                    </div>
                    <div class="tong_s_1">
                        <div class="  dang_tin_s_1">
                            <label class="col col-2 title_dttd_s">Hạn tuyển <span>*</span></label>
                            <input type="date"  class="dang_tin_right_s" name="hantuyen" id="hantuyen" placeholder="Chọn ngày hết hạn">
                        </div>
                        <div class=" dang_tin_s_1">
                            <label class="col col-2 title_dttd_s">Số lượng tuyển dụng <span>*</span></label>
                            <input type="number" name="soluong" id="soluong" placeholder="Nhập số lượng tuyển dụng...">
                        </div>
                    </div>
                    <div class=" dang_tin_s">
                        <label class="col col-1 title_dttd_s">Mức lương <span>*</span></label>
                        <div class="aaa aaaa">
                            <input type="number" name="luongmin" id="luongmin" placeholder="0" min="0">
                        </div>
                        <span class="kytu">-</span>
                        <div class="aaa aaaa">
                            <input type="number" name="luongmax" id="luongmax" placeholder="0" min="0">
                        </div>
                        <span class="kytu divided">/</span>
                        <div class="aaa ml_theo_time ">
                            <select name="thang" id="thang">
                                <option value="">Hình thức trả lương</option>
                                <option value="1">Theo giờ</option>
                                <option value="2">Theo ngày</option>
                                <option value="3">Theo tuần</option>
                                <option value="4">Theo tháng</option>
                                <option value="5">Theo năm</option>
                            </select>
                        </div>
                    </div>
                    <div class="dang_tin_s">
                        <label class="col col-1 title_dttd_s">Mô tả công việc <span>*</span></label>
                        <textarea  name="mota" id="mota" cols="30" rows="10" ></textarea>
                    </div>
                    <div class="img_avatar">
                        <img class="avatar" id="image" alt="">
                    </div>
                    <div class="upload">
                        <label class="images title_dttd_s">Hình ảnh</label>
                        <input type="file" name="image" accept="image/*" style="display: block;"> 
                    </div>
                    <div class="btn-gr-02 dang_tin_s dang_tin_s_submit">
                        <button class="btn-dangtin" name="btn_tuyendung">Lưu thông tin</button>
                        <div class="btn-huy"  onclick="hide_popup('suatuyendung')"><span> X </span>Hủy</div>
                    </div>
                </fieldset>
            </form>
            </div>
        </div>
    </div>
<!-- soma -->
    <div id="suatimviec" class="suatin suatimviec popup-login" style="display:none;">
        <div class="suatin-content-1">
            <p class="tt_hv">Sửa tin tìm việc
                <span class="close_1" onclick="hide_popup('suatimviec')">&times;</span>
            </p>
            <div class="tim-viec">
                <form id="timvieclam" method="post"  enctype="multipart/form-data">
                    <fieldset>
                        <input type="hidden" id="id_timviec" name="id_timviec" value="" />
                        <div class="dang_tin_s">
                            <label class="col col-1 title_dttd_s">Tên công việc mong muốn  <span>*</span></label>
                            <input type="text" name="tieude" id="tieude_tv" placeholder="Nhập tên công việc mong muốn">
                        </div>
                        <div class="tong_s_1">
                            <div class=" dang_tin_s_1">
                                <label class="title_dttd_s">Ngày sinh<span>*</span></label>
                                <input class="dang_tin_right_s" type="date" name="ngaysinh" id="ngaysinh_tv" placeholder="Chọn ngày sinh">
                            </div>
                            <div class="dang_tin_s_1">
                                <label class="col col-2 title_dttd_s">Giới tính<span>*</span></label>
                                <select name="gioitinh" id="gioitinh_tv">
                                    <option value="">Giới tính</option>
                                    <option value="0">Không muốn tiết lộ</option>
                                    <option value="1">Nam</option>
                                    <option value="2">Nữ</option>
                                </select>
                            </div>
                        </div>
                        <div class="tong_s_1">
                            <div class="gr gr-01 dang_tin_s_1">
                                <label class="col col-2 title_dttd_s" >Số điện thoại <span>*</span></label>
                                <input class="dang_tin_right_s" type="number" name="phone" id="phone_tv" placeholder="Nhập số điện thoại..." min="0">
                            </div>
                            <div class="gr-01 dang_tin_s_1">
                                <label class="col col-2 title_dttd_s">Trình độ học vấn<span>*</span></label>
                                <!-- <input type="text" name="trinhdo" id="trinhdo" placeholder="Chọn trình độ học vấn cao nhất"> -->
                                <select name="trinhdo" id="trinhdo_tv">
                                    <option value="">Trình độ học vấn</option>
                                    <option value="1">Đại học</option>
                                    <option value="2">Cao đẳng</option>
                                    <option value="3">lao động phổ thông</option>
                                </select>
                            </div>
                        </div>
                        <div class="tong_s_1">
                            <div class="gr gr-01 dang_tin_s_1">
                                <label class="col col-2 title_dttd_s">Kinh nghiệm làm việc<span>*</span></label>
                                <select class="dang_tin_right_s" name="kinhnghiem" id="kinhnghiem_tv">
                                    <option value="">Kinh nghiệm làm việc</option>
                                    <option value="1">Chưa có kinh nghiệm</option>
                                    <option value="2">Trên 1 năm kinh nghiệm</option>
                                    <option value="3">Trên 2 năm kinh nghiệm</option>
                                </select>
                            </div>
                            <div class="gr-01 dang_tin_s_1">
                                <label class="col col-2 title_dttd_s">Chứng chỉ / kỹ năng<span>*</span></label>
                                <input type="text" name="chungchi" id="chungchi_tv" placeholder="Nhập địa chỉ cụ thể...">
                            </div>
                        </div>
                        <div class="tong_s_1">
                            <div class="gr gr-01 dang_tin_s_1">
                                <label class="col col-2 title_dttd_s">Tỉnh/thành phố <span>*</span></label>
                                <select class="dang_tin_right_s style_select" name="thanhpho" id="thanhpho_tv">
                                    <option value="">Chọn tỉnh / thành phố</option>
                                        <?
                                        $query = new db_query("SELECT cit_id,cit_name FROM city2 where cit_parent = 0");
                                        while($rowcty= mysql_fetch_assoc($query->result)) {
                                        ?>
                                    <option class="thanhpho_<? echo $rowcty['cit_id']; ?>" value="<?= $rowcty['cit_id']; ?>">
                                        <?= $rowcty['cit_name']; ?>
                                    </option>
                                    <?
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="gr-01 dang_tin_s_1 dang_tin_s_3">
                                <p></p>
                                <label class="col col-2 title_dttd_s">Quận/huyện <span>*</span></label>
                                <select name="quanhuyen" id="quanhuyen_tv" value="" class="style_select">
                                    <option value="">Chọn quận /huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="dang_tin_s">
                            <label class="col col-1 title_dttd_s">Địa chỉ cụ thể <span>*</span></label>
                            <input type="text" name="diachi" id="diachi_tv" placeholder="Nhập địa chỉ cụ thể...">
                        </div>
                        <div class="tong_s_1">
                            <div class="gr gr-01 dang_tin_s_1">
                                <label class="col col-2 title_dttd_s">Hình thức làm việc <span>*</span></label>
                                <select class="dang_tin_right_s" name="htlv" id="htlv_tv">
                                    <option value="">Chọn hình thức làm việc</option>
                                    <option value="1">Toàn thời gian</option>
                                    <option value="2">Bán thời gian</option>
                                    <option value="3">Giờ hành chính</option>
                                    <option value="4">Ca sáng</option>
                                    <option value="5">Ca chiều</option>
                                    <option value="6">Ca đêm</option>
                                </select>
                            </div>
                            <div class="gr-01 dang_tin_s_1">
                                <label class="col col-2 title_dttd_s">Hạn nhận việc <span>*</span></label>
                                <input type="date" name="hantuyen" id="hantuyen_tv" placeholder="Chọn ngày hết hạn">
                            </div>
                        </div>
                        <div class="nn_to dang_tin_s">
                            <label class="col col-1 title_dttd_s">Ngành nghề <span>*</span></label>
                            <select class="form-control style_select" name="lhlv[]" id="lhlv_tv" style="width:100%" >
                                <option value="">Ngành nghề </option>
                                    <? 
                                    $db_qra = new db_query("SELECT cat_id, cat_name FROM category_vl ");
                                    While($rowa = mysql_fetch_assoc($db_qra->result))
                                    { ?>
                                    <option class="nganh_nghe_<?=$rowa['cat_id'] ?>" value="<?=$rowa['cat_id'] ?>"><?=$rowa['cat_name'] ?></option>
                                    <?
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="nn_to dang_tin_s dang_tin_s_3">
                            <label class="col col-1 title_dttd_s" >Công việc chi tiết <span>*</span></label>
                            <select class="nn_ct style_select" name="ctcv" id="ctcv_tv" value="">
                            </select>
                        </div>
                        <div class=" dang_tin_s">
                            <label class="title_dttd_s title_dttd_s">Mức lương <span>*</span></label>
                            <div class="aaa aaaa">
                                <input type="number" name="luongmin" id="luongmin_tv" placeholder="0" min="0">
                            </div>
                            <span class="kytu">-</span>
                            <div class="aaa aaaa">
                                <input type="number" name="luongmax" id="luongmax_tv" placeholder="0" min="0">
                            </div>
                            <span class="kytu divided">/</span>
                            <div class="aaa ml_theo_time ">
                                <select name="thang" id="thang_tv">
                                    <option value="">Hình thức trả lương</option>
                                    <option value="1">Theo giờ</option>
                                    <option value="2">Theo ngày</option>
                                    <option value="3">Theo tuần</option>
                                    <option value="4">Theo tháng</option>
                                    <option value="5">Theo năm</option>
                                </select>
                            </div>
                        </div>
                        <!-- <label class="col col-1" >Mức lương mong muốn<span>*</span></label>
                        <input type="number" name="luongmin" id="luongmin_tv" placeholder="0">
                        <span class="kytu">-</span>
                        <input type="number" name="luongmax" id="luongmax_tv" placeholder="0">
                        <span class="kytu divided">/</span>
                        <select name="thang" id="thang_tv">
                            <option value="">Hình thức trả lương</option>
                            <option value="1">Theo giờ</option>
                            <option value="2">Theo ngày</option>
                            <option value="3">Theo tuần</option>
                            <option value="4">Theo tháng</option>
                            <option value="5">Theo năm</option>
                        </select> -->
                        <div class="nn_to dang_tin_s">
                            <label class="col col-1 title_dttd_s">Giới thiệu chung<span>*</span></label>
                            <textarea name="mota" id="mota_tv" cols="30" rows="10" placeholder="Ví dụ: Yêu cầu công việc, quyền lợi được hưởng..."></textarea>
                        </div>
                        <div class="upload title_dttd_s">
                            <label class="images title_dttd_s">Hình ảnh</label>
                            <input type="file" name="image" style="display: block;" accept="image/*" class="up_anh_1"> 
                        </div>
                        <div class="btn-gr-02 dang_tin_s dang_tin_s_submit">
                        <button type="submit" class="btn-timviec" name="btn_timviec">Lưu thông tin</button>
                            <div class="btn-huy"  onclick="hide_popup('suatimviec')"><span> X </span>Hủy</div>
                        </div>
                        
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <div class="popup popup-login-1" id="popup1" style="display: none;">
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
                    <button type="submit" name="btn_rating" id="btn_rating" class="clearfix">Đánh giá</button>
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
    //ttlh

    
        $('.showname_lh').click(function(){
            $(this).hide();
            $(this).parent("#lienhe-tt").find(".hidename_lh").show();
        });
        $('.hidename_lh').click(function(){
            $(this).hide();
            $(this).parent("#lienhe-tt").find(".showname_lh").show();
        });
        //thông tin cơ bản
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.display === "block") {
            panel.style.display = "none";
            } else  {
            panel.style.display = "block";
            }
        });
        }
        //ảnh bìa
        $("#preview_logo").click(function(){
            $("#images").click();
        });
        $(".btn_save").on("click", function (){

        });
        // xulyanhbia

        // son1
        $(document).ready(function() {
            var url = window.location.pathname;
            $('a[href="' + url + '"]').parent().addClass('active');
            $('a[href="' + url + '"]').parent().parent().addClass('in');
            $('.main .left .top #change_avt img').on('click', function() {
                $('#avt_file').click();
            });

            $('#avt_file').change(function() {
                $('#change_avt #submit').click();
            });
        });


        //update avarta
        $(document).ready(function() {
            var url = window.location.pathname;
            $('a[href="' + url + '"]').parent().addClass('active');
            $('a[href="' + url + '"]').parent().parent().addClass('in');
            $('.main .left .top #change_avt img').on('click', function() {
                $('#avt_file').click();
            });

            $('#avt_file').change(function() {
                $('#change_avt #submit').click();
            });
        });
        $("#imgch").click(function(){
            $("#avt_file").click();
        });
        //popup tìm việc
        function show_popupuv(t,id) {
            var t_id = $(t).attr('data-id');
            $('#id_timviec').val(t_id);
            document.getElementById(id).style.display = 'block';
            return false;
        };
        $('#btn_rating').click(function (e) { 
            console.log($('#id_timviec').val());
            $(this).submit();
        });
        function hide_popup(id) {
            document.getElementById(id).style.display = 'none';
            return false;
        };
        //sửa việc làm
        function show_popupvl(t,id) {
            var t_id = $(t).attr('data-id');
            $('#id_vieclam').val(t_id);
            document.getElementById(id).style.display = 'block';
            return false;
        };
        $('#btn_rating').click(function (e) { 
            console.log($('#id_vieclam').val());
            $(this).submit();
        });
        function hide_popup(id) {
            document.getElementById(id).style.display = 'none';
            return false;
        };
        //update việc làm
        // $("#lhlv").select2({
        //     maximumSelectionLength: 3,
        //     placeholder: " Chọn loại hình công việc"
        // });
        //select timviec
        // $("#lhlv_tv").select2({
        //     maximumSelectionLength: 3,
        //     placeholder: " Chọn loại hình công việc"
        // });
        
        $("#tieude,#diachi,#phone,#chungchi,#ctcv,#hantuyen,#soluong,#luongmin,#luongmax,#mota").keyup(function() {
            $(this).prev('p').text('');
            $(this).removeClass('error');
        })
        $("#thanhpho,#quanhuyen,#htlv,#lhlv,#trinhdo,#thang,#kinhnghiem").change(function() {
            $(this).prev('p').remove();
            $(this).removeClass('error');
        })
        //luu việc làm
        $(".btn_save_vl").on("click", function () {
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
        // $('.delete').click(function(){
        //     var id_del = $(this).attr("data-del");
        //     // console.log(id_del);
        //     $.ajax({
        //         cache:false,
        //         type:"POST",
        //         // method:"POST",
        //         url:"../ajax/delete.php",
        //         data:{
        //             id_del:id_del
        //         },
        //         success: function(data){}
        //     });
        // });
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

        $("#thanhpho").select2({
            placeholder: " Chọn tỉnh / thành phố"
        });

        function show_popup(t,id) {
            var t_id = $(t).attr('data-id');
            $('#id_rate').val(t_id);
            document.getElementById(id).style.display = 'block';
            return false;
        };
        $('.showpopupvl').on('click', function(e) {
            var new_id  = $(this).attr('data-id'); //  
            var user_id = <?php echo (isset($userid)) ? $userid : 0;  ?>;
            $.ajax({
                url: '../ajax/newDetail.php',
                type: 'POST',
                dataType: 'json',
                data: {new_id: new_id,user_id: user_id},
                async: false,
                success: function(data) {
                    if (data.status == true) {
                        var result = data.result;
                        var cit_id       = result.new_city;
                        var district_id = result.new_district;
                        var nn_id       = result.new_job_type;
                        var nn_ct_id = result.new_job_detail;
                        // DOM Popup chi tiết tin.
                        $("#id_vieclam").val(result.new_id);
                        $("#tieude").val(result.new_title);
                        $("#thanhpho_ft").val(result.new_city);
                        $("#quanhuyen_ft").val(result.new_district);
                        $("#phone").val(result.new_phone);
                        $("#diachi").val(result.new_address	);
                        $("#htlv").val(result.new_job_kind);
                        $("#lhlv").val(result.new_job_type);
                        $("#trinhdo").val(result.new_level);
                        $("#kinhnghiem").val(result.new_exp);
                        $("#chungchi").val(result.new_skill);
                        $("#ctcv").val(result.new_job_detail);
                        $("#hantuyen").val(result.new_end_date);
                        $("#soluong").val(result.new_quantity);
                        $("#luongmin").val(result.new_money_min);
                        $("#luongmax").val(result.new_money_max);
                        $("#thang").val(result.new_pay_type);
                        $("#mota").val(result.new_desc);
                        $("#image").val(result.new_picture);
                        $('.thanhpho_'+result.new_city).attr('selected', true);
                        $('#thanhpho_ft').select2();
                        $('.nganh_nghe_'+result.new_job_type).attr('selected', true);
                        $('#lhlv').select2();
                        $("#trinhdo").attr('selected', true);
                        $("#kinhnghiem").attr('selected', true);
                        $("#thang").attr('selected', true);
                        $('#suatuyendung').css('display', 'block');
                        // Ajax dom district
                        $.ajax({
                            url: '/ajax/ajax_get_list_district.php',
                            type: 'POST',
                            // dataType: 'json',
                            async: false,
                            data: {
                                cit_id: cit_id,
                                district_id:district_id
                            },
                            success: function(t) {
                                $("#quanhuyen_ft").html(t);
                            }
                        })
                        $.ajax({
                            url: '/ajax/ajax_get_list_nn_ct.php',
                            type: 'POST',
                            // dataType: 'json',
                            async: false,
                            data: {
                                nn_id: nn_id,
                                nn_ct_id:nn_ct_id
                            },
                            success: function(t) {
                                $("#ctcv").html(t);
                            }
                        })

                    } else {
                        alert('error');
                    }
                },
                error: function(xhr) {
                    alert('error');
                }
            });
        });
        // soma
        $('.showpopupuv').on('click', function(e) {
            var new_id  = $(this).attr('data-id'); //  
            var user_id = <?php echo (isset($userid)) ? $userid : 0;  ?>;
            $.ajax({
                url: '../ajax/new_detail_tv.php',
                type: 'POST',
                dataType: 'json',
                data: {new_id: new_id,user_id: user_id},
                async: false,
                success: function(data) {
                    if (data.status == true) {
                        var result = data.result;
                        var cit_id       = result.new_city;
                        var district_id = result.new_district;
                        var nn_id       = result.new_job_type;
                        var nn_ct_id = result.new_job_detail;
                        // DOM Popup chi tiết tin.
                        $("#id_vieclam").val(result.new_id);
                        $("#tieude_tv").val(result.new_title);
                        $("#ngaysinh_tv").val(result.birthday);
                        $("#gioitinh_tv").val(result.new_sex);
                        $("#phone_tv").val(result.new_phone);
                        $("#trinhdo_tv").val(result.new_level);
                        $("#kinhnghiem_tv").val(result.new_exp);
                        $("#chungchi_tv").val(result.new_skill);
                        $("#thanhpho_tv").val(result.new_city);
                        $("#quanhuyen_tv").val(result.new_district);
                        $("#diachi_tv").val(result.new_address);
                        $("#lhlv_tv").val(result.new_job_type);
                        $("#ctcv_tv").val(result.new_job_detail);
                        $("#htlv_tv").val(result.new_job_kind);
                        $("#hantuyen_tv").val(result.new_end_date);
                        $("#luongmin_tv").val(result.new_money_min);
                        $("#luongmax_tv").val(result.new_money_max);
                        $("#thang_tv").val(result.new_pay_type);
                        $("#mota_tv").val(result.new_desc);
                        $("#image").val(result.new_picture);
                        $('.thanhpho_'+result.new_city).attr('selected', true);
                        $('#thanhpho_tv').select2();
                        $('.nganh_nghe_'+result.new_job_type).attr('selected', true);
                        $('#lhlv_tv').select2();
                        $("#trinhdo").attr('selected', true);
                        $("#kinhnghiem").attr('selected', true);
                        $("#thang").attr('selected', true);
                        $('#suatimviec').css('display', 'block');
                        // Ajax dom district
                        $.ajax({
                            url: '/ajax/ajax_get_list_district.php',
                            type: 'POST',
                            // dataType: 'json',
                            async: false,
                            data: {
                                cit_id: cit_id,
                                district_id:district_id
                            },
                            success: function(t) {
                                $("#quanhuyen_tv").html(t);
                            }
                        })
                        $.ajax({
                            url: '/ajax/ajax_get_list_nn_ct.php',
                            type: 'POST',
                            // dataType: 'json',
                            async: false,
                            data: {
                                nn_id: nn_id,
                                nn_ct_id:nn_ct_id
                            },
                            success: function(t) {
                                $("#ctcv_tv").html(t);
                            }
                        })

                    } else {
                        alert('error');
                    }
                },
                error: function(xhr) {
                    alert('error');
                }
            });
        });

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

        $("#thanhpho_tv").change(function() {
            var id = $(this).val();
            $.ajax({
                url: '/ajax/get_district_byid.php',
                data: {
                    id: id
                },
                success: function(t) {
                    $("#quanhuyen_tv").html(t);
                }
            })
        });
        $("#lhlv").on("change", function() {
            var id_ct = $(this).val();
            $.ajax({
                url: '/ajax/nn_get_nn_chi_tiet.php',
                data: {
                    id_ct: id_ct
                },
                success: function(t) {
                    $("#ctcv").html(t);
                }
            })
        })
        $("#lhlv_tv").on("change", function() {
            var id_ct = $(this).val();
            $.ajax({
                url: '/ajax/nn_get_nn_chi_tiet.php',
                data: {
                    id_ct: id_ct
                },
                success: function(t) {
                    $("#ctcv_tv").html(t);
                }
            })
        })
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
        // document.getElementById("defaultOpen").click();
    </script>
<!-- <script>
    const UPLOAD_BUTTON = document.getElementById("upload-button");
    const FILE_INPUT = document.querySelector("input[type=file]");
    const AVATAR = document.getElementById("avatar");

    UPLOAD_BUTTON.addEventListener("click", () => FILE_INPUT.click());

    FILE_INPUT.addEventListener("change", event => {
    const file = event.target.files[0];

    const reader = new FileReader();
    reader.readAsDataURL(file);

    reader.onloadend = () => {
        AVATAR.setAttribute("aria-label", file.name);
        AVATAR.style.background = `url(${reader.result}) center center/cover`;
    };
    });
</script> -->
<script>
    // var suatin = document.getElementById("sua");
    // var btn = document.getElementById("Btn");
    // var span = document.getElementsByClassName("myclose")[0];
    // span.onclick = function() {
    // suatin.style.display = "none";
    // }
    // window.onclick = function(event) {
    // if (event.target == suatin) {
    //     suatin.style.display = "none";
    // }
    // }

    function popup(x){
        document.getElementById(x).style.display = "block";
    }
    function hide_popup(x){
        document.getElementById(x).style.display = "none";
    }
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
    $(".s_delete").click(function(){
        $('.popup_thanh_cong').css('display','block');
    });
    $(".huy").click(function(){
        $('.popup_thanh_cong').css('display','none');
    });
    $(window).click(function(event){
        if($(event.target).hasClass('popup-login')){
            $(event.target).hide();
        }
    });
</script>
<script>
    $(".ss_delete").click(function(){
        $('.popup_thanh_cong_1').css('display','block');
    });
    $(".huy").click(function(){
        $('.popup_thanh_cong_1').css('display','none');
    });
    $(window).click(function(event){
        if($(event.target).hasClass('popup-login-1')){
            $(event.target).hide();
        }
    });
    $(window).click(function(event){
        if($(event.target).hasClass('popup-login')){
            $(event.target).hide();
        }
    });
    $(document).ready(function() {
        $('.style_select').select2();
    });
    var number = document.getElementById('phone');
    number.onkeydown = function(e) {
        if(!((e.keyCode > 95 && e.keyCode < 106)
        || (e.keyCode > 47 && e.keyCode < 58) 
        || e.keyCode == 8)) {
            return false;
        }
    }
    var number = document.getElementById('luongmin_tv');
    number.onkeydown = function(e) {
        if(!((e.keyCode > 95 && e.keyCode < 106)
        || (e.keyCode > 47 && e.keyCode < 58) 
        || e.keyCode == 8)) {
            return false;
        }
    }
    var number = document.getElementById('luongmax_tv');
    number.onkeydown = function(e) {
        if(!((e.keyCode > 95 && e.keyCode < 106)
        || (e.keyCode > 47 && e.keyCode < 58) 
        || e.keyCode == 8)) {
            return false;
        }
    }
    var number = document.getElementById('luongmin');
        number.onkeydown = function(e) {
            if(!((e.keyCode > 95 && e.keyCode < 106)
            || (e.keyCode > 47 && e.keyCode < 58) 
            || e.keyCode == 8)) {
                return false;
            }
        }
        var number = document.getElementById('luongmax');
        number.onkeydown = function(e) {
            if(!((e.keyCode > 95 && e.keyCode < 106)
            || (e.keyCode > 47 && e.keyCode < 58) 
            || e.keyCode == 8)) {
                return false;
            }
        }
        $(".btn_trinhdo").click(function() {
            $(".noti-error").remove();
            $("#school").removeClass("error");
            $("#tgbd").removeClass("error");
            $("#tgkt").removeClass("error");
            var school = $("#school");
            var tgbd = $("#tgbd");
            var tgkt = $("#tgkt");

            if (school.val() == '' && school.hasClass('error') == false) {
                school.focus();
                school.addClass('error');
                school.after("<span style='float:none;' class='noti-error'>Bạn chưa điền trường học</span>");
            }
            if (tgbd.val() == '' && tgbd.hasClass('error') == false) {
                tgbd.focus();
                tgbd.addClass('error');
                tgbd.after("<span style='float:none;' class='noti-error'>Bạn chưa điền thời gian bắt đầu</span>");
            }
            if (tgkt.val() == '' && tgkt.hasClass('error') == false) {
                tgkt.focus();
                tgkt.addClass('error');
                tgkt.after("<span style='float:none;' class='noti-error'>Bạn chưa điền thời gian kết thúc</span>");
            }
            
            if ($("form").find('.error').length == 0) {
                $(this).submit();
                // $('.popup_thanh_cong').css('display', 'block'); 
            } else {
                return false;
            }
        });
</script>
<script>
    // $(document).ready(function () {
    //     $('#images').change(function () {
    //         var user_id = <?php echo (isset($userid)) ? $userid : 0;  ?>;
    //         var background 	= $('#images')[0].files[0];
    //         var data = new FormData();
    //         data.append('background', background);
    //         data.append('user_id',user_id);
    //         $.ajax({
	// 			url: '/ajax/update_anh_bia.php',
	// 			type: 'POST',
    //             contentType: false,
    //             processData: false,
    //             data: data,
    //             dataType: 'json',
    //             enctype: 'multipart/form-data',
    //             success: function(response) {
    //                 if (response.status == 1) {
    //                     alert(response.msg);
    //                 } else {
    //                     alert(response.msg);
    //                 }
    //             },
    //             error: function(xhr) {
    //                 alert('Error');
    //             }
    //         })
    //     })
    // })
    // son1 soma
    
</script>
</body>
</html>