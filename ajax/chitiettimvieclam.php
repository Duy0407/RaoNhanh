<?
include("config_vl.php");
include("version.php");
$newid = getValue("newid",'int',"GET",0);
$newid = (int)$newid;
if($newid == 0)
{
    redirect("/");
}
$db_qr = new db_query("SELECT new_city,new_picture,new_id,new_user_id,usc_phone,usc_name,usc_address,new_title,new_address,new_job_kind,new_job_detail,new_end_date,new_money_min,new_money_max,new_desc,new_exp,new_level,new_view_count,new_type,new_level,new_exp,new_skill,new_sex,birthday ,usc_city,new_job_type
FROM vieclam JOIN user ON vieclam.new_user_id = user.usc_id WHERE new_id = ".$newid." LIMIT 1");
$row = mysql_fetch_assoc($db_qr->result);
$update = new db_query("UPDATE vieclam set new_view_count = new_view_count + 1 where new_id = '".$newid."'");
$qrnew = new db_query("SELECT new_title,new_money_min,new_money_max,new_picture,new_address,new_id FROM vieclam WHERE new_id != ".$newid." AND new_job_type = '".$row['new_job_type']."' LIMIT 5");
$db_save = new db_query("SELECT id FROM luu_vl");
$rowsave = mysql_fetch_assoc($db_save->result);
// show tên nn
$arr_type = explode(",",$row['new_job_type']);
$name_type = array();
foreach ($arr_type as $key => $value) {
    $name_type[] = $arr_cate[$value];
}
$name_type = implode(' ',$name_type);

// nn chi tiết
$arr_type_chi_tiet = explode(",",$row['new_job_detail']);
$name_type_chi_tiet = array();
foreach ($arr_type_chi_tiet as $key => $value_1) { 
    $name_type_chi_tiet[] = $arr_tag_ct[$value_1];
}
$name_type_chi_tiet = implode(' ',$name_type_chi_tiet);

// show thành phố
$arr_type_tp = explode(",",$row['new_city']);
$name_type_tp = array();
foreach ($arr_type_tp as $key => $value) {
    $name_type_tp[] = $arr_tp[$value];
}
$name_type_tp = implode(' ',$name_type_tp);

// show thành phố
$arr_type_tp_1 = explode(",",$row['usc_city']);
$name_type_tp_1 = array();
foreach ($arr_type_tp_1 as $key => $value) {
    $name_type_tp_1[] = $arr_tp[$value];
}
$name_type_tp_1 = implode(' ',$name_type_tp_1);

// quận huyên 
$arr_type_qh = explode(",",$row['new_district']);
$name_type_qh = array();
foreach ($arr_type_qh as $key => $value_1) { 
    $name_type_qh[] = $arr_qh[$value_1];
}
$name_type_qh = implode(' ',$name_type_qh);


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
    <title>Chi tiết tin đăng tìm việc làm</title>
    <meta name="robots" content="noindex,nofollow"/>

    <link rel="preload" as="style" href="/css/vieclam/style.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/style.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'"> 
    <!-- <link rel="preload" as="style" href="/css/vieclam/vieclamraonhanh.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/vieclamraonhanh.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'">  -->
</head>
<body>
    <? include("../includes/vieclam/header1.php"); ?>
    <div class="detail-tuyendung">
        <div class="row">
            <div class="dumb">
                <a href="/viec-lam.html">Trang chủ</a>
                <span>/</span>
                <a href="/danh-sach-tin-dang-tim-viec-lam.html">Tìm việc</a>
                <span>/</span>
                <a class="name-dumb" href="/tim-viec/<?= replaceTitle($row['new_title']) ?>-p<?= $row['new_id'] ?>.html"><?= $row['new_title'] ?></a>
            </div>
            <div class="author timviec">
                <div class="nguoidang">
                    <div class="images">
                        <img width="58" height="58"  onerror='this.onerror=null;this.src="/images/vieclam/no_img.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $row['usc_logo'] ?>" alt="avatar">
                    </div>
                    <div class="name"><a href="/trang-ca-nhan-<?= replaceTitle($row['usc_name']) ?>-ntd<?= $row['new_user_id'] ?>.html"><?=$row['usc_name']?></a></div>
                    <div class="date">30 phút trước</div>
                </div>
                <div class="gioitinh">
                    <span> Giới tính: </span>
                    <span class="au-r">
                        <? 
                            if ($row['new_sex'] == 0) {
                                echo "Nam";
                            }
                            elseif ($row['new_sex'] == 1) {
                                echo "Nữ";
                            }
                            else{
                                echo "Không muốn tiết lộ";
                            }
                        ?>
                    </span>
                </div>
                <div class="ngaysinh"><span> Ngày sinh: </span><span class="au-r"><?= date('d/m/Y',$row['birthday']) ?></span></div>
                <div class="diachi"><span>Địa chỉ: </span> <span class="au-r"><?= $row['usc_address'] ?> - <?=$name_type_tp_1?></span></div>
                <div class="hannhan">
                    <span>Hạn nhận việc: </span> 
                    <span class="au-r">
                        <? if($row['new_end_date']>=time()){ 
                            echo date('d/m/Y',$row['new_end_date']);
                        }else{ echo 'Đã hết hạn nhận việc'; } ?>
                    </span>
                </div>
                <div id="lienhe">
                        <div class="showname">
                            <span class="hotline"> 0386796*** </span><span class="au-r">Bấm để hiện số</span>
                        </div>
                        <div class="hidename" style="display: none;">
                            <span><?=$row['usc_phone']?></span>
                        </div>
                    </div>
            </div>
            <div class="left">
                <h1 class="tt-detail"><?= $row['new_title'] ?></h1>
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
                <div class="salary">
                    <span><?= $row['new_money_min'] ?>đ - <?= $row['new_money_max'] ?>đ/
                    <?
                        if ($row['new_pay_type']==1) {
                            echo "Giờ";
                        }
                        elseif($row['new_pay_type']==2){
                            echo "Ngày";
                        }
                        elseif($row['new_pay_type']==3){
                            echo "Tuần";
                        }
                        elseif($row['new_pay_type']==4){
                            echo "Tháng";
                        }
                        else{
                            echo "Năm";
                        }
                    ?>
                    </span>
                </div>
                <div class="view"><span><?= $row['new_view_count'] ?></span> lượt xem</div>
                <div class="form-tuyendung">
                    <div class="form-left">
                        <div class="chitietcv gr-tuyendung">
                            <div class="info">
                                <p class="inf-top">Công việc</p>
                                <p class="inf-bottom">
                                    <a href="/viec-lam-<?=replaceTitle($name_type)?>-n<?=$row['new_job_type']?>t0"><?=$name_type?></a>
                                </p>
                            </div>
                        </div>
                        <div class="chitietcv gr-tuyendung">
                            <div class="info">
                                <p class="inf-top">Công việc chi tiết</p>
                                <p class="inf-bottom">
                                    <a href="/tim-viec-lam-<?=replaceTitle($name_type_chi_tiet)?>-r<?=$row['new_job_detail']?>t0.html"><?= $name_type_chi_tiet  ?></a>
                                </p>
                            </div>
                        </div>
                        <div class="kinhnghiem_1 gr-tuyendung">
                            <div class="info">
                                <p class="inf-top">Kinh nghiệm làm việc</p>
                                <p class="inf-bottom">
                                    <?
                                        if ($row['new_exp']==1) {
                                            echo "Chưa có kinh nghiệm";
                                        }
                                        elseif($row['new_exp']==2){
                                            echo "Kinh nghiệm từ 1-2 năm";
                                        }
                                        else{
                                            echo "Kinh nghiệm trên 2 năm";
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                        
                        
                    </div>
                    
                    <div class="form-right">
                        <div class="totnghiep gr-tuyendung">
                            <div class="info">
                                <p class="inf-top">Tốt nghiệp</p>
                                <p class="inf-bottom">
                                    <?
                                        if ($row['new_level']==1) {
                                            echo "Đại học";
                                        }
                                        elseif($row['new_level']==2){
                                            echo "Cao đẳng";
                                        }
                                        else{
                                            echo "Lao động phổ thông";
                                        }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="chungchi gr-tuyendung">
                            <div class="info">
                                <p class="inf-top">Chứng chỉ / kỹ năng</p>
                                <p class="inf-bottom"><?= $row['new_skill']?></p>
                            </div>
                        </div>
                        <div class="hinhthuclv gr-tuyendung">
                            <div class="info">
                                <p class="inf-top">Hình thức làm việc</p>
                                <p class="inf-bottom">
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
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="diachi gr-tuyendung">
                        <div class="info">
                            <p class="inf-top">Địa chỉ</p>
                            <p class="inf-bottom"><?= $row['new_address'] ?> - <?=$name_type_qh?> - <?=$name_type_tp?></p>
                        </div>
                    </div>
                    <div class="mota">
                        <h2 class="tt-mota">Giới thiệu chung</h2>
                        <p><?= nl2br($row['new_desc'])?></p>
                        <div class="anh">
                            <img onerror='this.onerror=null;this.src="/images/vieclam/anhbia.png";' style="width: 100%;padding-top: 37px" class="lazyload" src="/images/loading.gif" data-src="<?= $row['new_picture'] ?>" alt="<?= $row['new_title'] ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="vllq">
                    <h2 class="tt-vlllq">Việc làm liên quan</h2>
                    <?
                        while ($rownew = mysql_fetch_assoc($qrnew->result)) {
                        
                    ?>
                    <div class="group">
                        <div class="vieclam"><a href="/tim-viec/<?= replaceTitle($rownew['new_title']) ?>-p<?= $rownew['new_id'] ?>.html"><?= $rownew['new_title']?></a></div>
                        <div class="mucluong-tv">Mức lương: <span><?= $rownew['new_money_min']?>đ - <?= $rownew['new_money_max']?>đ</span></div>
                        <div class="diachi-tv">Địa chỉ: <span><?= $rownew['new_address']?></span></div>
                    </div>
                    <?}?>
                </div>
            </div>
        </div>
    </div>
    <? include("../includes/vieclam/inc_footer.php"); ?>
    <script defer type="text/javascript">
        $('.showname').click(function(){
            $(this).hide();
            $(this).parent("#lienhe").find(".hidename").show();
        });
        $('.hidename').click(function(){
            $(this).hide();
            $(this).parent("#lienhe").find(".showname").show();
        });
        $(".btn_save").on("click", function () {
        var id_tv = $(this).parents('.save_vl').attr("data-idv");
        var id_cit = $(this).parents('.save_vl').attr("data-cit");
        var tim = $(this).parent('.save_vl');
        $.ajax({
            cache:false,
            type:"POST",
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
    </script>
</body>
</html>