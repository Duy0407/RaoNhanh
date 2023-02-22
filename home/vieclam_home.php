<?
include("config_vl.php");
include("version.php");
$urlSite = $_SERVER['REQUEST_URI'];
 $db_qr = new db_query("SELECT save_time_vl,usc_logo,new_phone,usc_phone,new_id,new_user_id,new_title,new_address,new_job_type,new_job_kind,new_end_date,new_desc,new_money_min,new_money_max,new_type,usc_name,cit_name,new_view_count,numrate,new_picture,new_job_detail
 from vieclam 
 join user on vieclam.new_user_id = user.usc_id 
 join city2 on vieclam.new_city = city2.cit_id  where new_type=1 ORDER BY new_id DESC");
    if(isset($_POST['btn_rating'])){
        $userid   = $_COOKIE['UID'];
        $rate = (int)$_POST['rating'];
        $id_rate = (int)$_POST['id_rate'];
        $danhgia = $_POST['danhgia'];
            
            if ($rate != '') {
                $insert = new db_query("INSERT INTO comment (content,cmt_user_id,cmt_vl_id,rating) VALUES ('".$danhgia."','".$userid."','".$id_rate."','".$rate."')");
            header("Location:$urlSite");
            }else{
                header("Location:$urlSite");
            }
    }
    $db_save = new db_query("SELECT id FROM luu_vl");
    $rowsave = mysql_fetch_assoc($db_save->result);
//$index = "index, follow,noodp";
$index = "noindex, nofollow";
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
    <title>Tìm Việc Làm Nhanh & Tuyển Dụng Hiệu Quả | Raonhanh365</title>
    <meta name="robots" content="<?=$index?>"/>
    <link rel="canonical" href="https://raonhanh365.vn/viec-lam.html" />
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
    <meta name="description" content="Tìm việc làm mới nhất lương cao, hấp dẫn từ những nhà tuyển dụng hàng đầu. Danh sách việc làm lương cao từ các công ty được tổng hợp tại Raonhanh365.vn"/>
    <meta name="Keywords" content="việc làm, tìm việc làm, tìm việc, tìm việc làm nhanh, tuyển dụng, tuyển dụng việc làm, việc làm nhanh"/>

    <meta property="og:locale" content="vi_VN" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Tìm Việc Làm Nhanh & Tuyển Dụng Hiệu Quả | Raonhanh365"/>
    <meta property="og:description" content="Tìm việc làm mới nhất lương cao, hấp dẫn từ những nhà tuyển dụng hàng đầu. Danh sách việc làm lương cao từ các công ty được tổng hợp tại Raonhanh365.vn"/>
    <meta property="og:site_name" content="raonhanh365.vn" />
    <meta property="og:image" content="https://raonhanh365.vn/images/logo_vl2.png"/>

    <meta name="twitter:card" content="summary" />
    <meta name="twitter:description" content="Tìm việc làm mới nhất lương cao, hấp dẫn từ những nhà tuyển dụng hàng đầu. Danh sách việc làm lương cao từ các công ty được tổng hợp tại Raonhanh365.vn" />
    <meta name="twitter:title" content="Tìm Việc Làm Nhanh & Tuyển Dụng Hiệu Quả | Raonhanh365" />

    <link rel="preload" as="style" href="/css/vieclam/style.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/style.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'"> 
    
</head>

<body>

    <? include("../includes/vieclam/header1.php"); ?>
    <div class="container-vieclam">
        <div class="row">
            <div class="group-main">
                <div id="main">
                    <?
                    while ($row = mysql_fetch_assoc($db_qr->result)) {
                        $arr_type = explode(",",$row['new_job_type']);//tách chuỗi new_job_type
                        $name_type = array();
                        foreach ($arr_type as $key => $value) { //vòng lặp foreach
                            $name_type[] = '<span class="cv">'.$arr_cate[$value].'</span>';//mảng name_type bằng mảng $arr_cate ($value=$row['new_job_type'])
                            //vd: array(1=> 'a', 2=> 'b') => array[1] == xây dựng
                        }
                        $name_type = implode(' ',$name_type);

                        // nn chi tiết
                        $arr_type_chi_tiet = explode(",",$row['new_job_detail']);
                        $name_type_chi_tiet = array();
                        foreach ($arr_type_chi_tiet as $key => $value_1) { 
                            $name_type_chi_tiet[] = '<span class="cv">'.$arr_tag_ct[$value_1].'</span>';
                        }
                        $name_type_chi_tiet = implode(' ',$name_type_chi_tiet);
                    ?>
                    <div class="item">
                        <div class="item-01">
                            <div class="group">
                                <a href="/viec-lam/<?= replaceTitle($row['new_title']) ?>-p<?= $row['new_id'] ?>.html">
                                    <div class="avata name_so_1">
                                        <img onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $row['new_picture'] ?>" alt="avata">
                                        <!-- onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $row['new_picture'] ?>" -->
                                        <!-- <img src="<?= !empty($row['new_picture'])?$row['new_picture']:'../images/icon_raonhanh.png' ?>" alt="avata"> -->
                                    </div>
                                </a>
                                <div class="info">
                                    <div class="cty">
                                        <a class="title" href="/viec-lam/<?= replaceTitle($row['new_title']) ?>-p<?= $row['new_id'] ?>.html"><h3><?= $row['new_title'] ?></h3>
                                        </a>
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
                                                <a class="show_reg" href="javascript:void(0)" onclick="show_reg(this,'popup-login')"><img src="/images/vieclam/luu.png" alt="save"></a>
                                                <!-- <a class="show_reg"  id="s-save"><img src="/images/vieclam/luu.png" alt="save"></a> -->
                                            </span>
                                            <?
                                            }
                                            ?>
                                            <!-- soma1 -->

                                    </div>
                                    <div class="auth">
                                        <div class="name name_so_2"><a rel="nofollow" href="trang-ca-nhan-<?= replaceTitle($row['usc_name']) ?>-ntd<?= $row['new_user_id'] ?>.html"><img onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $row['new_picture'] ?>"" alt="avata"> <?= $row['usc_name'] ?></a></div>
                                        <div class="time name_so_2"><?= time_elapsed_string($row['save_time_vl']) ?></div>
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
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/job.png" alt="Loại hình công việc"></div><span class="bold">Công việc:</span> <?= $name_type ?>
                                </div>
                                <div class="lhcv gr">
                                    <div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/job.png" alt="Loại hình công việc"></div><span class="bold">Công việc chi tiết:</span> <?= $name_type_chi_tiet ?>
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
                            <?
                            if(isset($_COOKIE['UID']) && !empty($_COOKIE['UID']))
                            {
                            ?>
                                <div class="danhgia">
                                    <a class="showpopup" rel="nofollow" href="javascript:void(0)" onclick="show_popup(this,'popup1')" data-id="<?= $row['new_id'] ?>">
                                        <?
                                            $db_rat = new db_query("SELECT count(cmt_id) as id from comment where cmt_vl_id ='".$row['new_id']."'");
                                            while ($rowrat = mysql_fetch_assoc($db_rat->result)) {
                                        ?>
                                        <span class="bold dg">
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
                            <?
                            }else{
                            ?>
                            <div class="danhgia">
                                <a class="showpopup" rel="nofollow" href="javascript:void(0)" onclick="show_reg(this,'popup-login')" >
                                    <?
                                        $db_rat = new db_query("SELECT count(cmt_id) as id from comment where cmt_vl_id ='".$row['new_id']."'");
                                        while ($rowrat = mysql_fetch_assoc($db_rat->result)) {
                                    ?>
                                    <span class="bold dg">
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
                            <?
                            }
                            ?>

                <!-- soma1 -->
	                        
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
	                        </div>
                        </div>
                    </div>
                    <? } ?>
                </div>
                <? include("../includes/vieclam/inc_right.php"); ?>
            </div>
        </div>
    </div>
    <div id="btn-top"></div>
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
                        <!-- soma1 -->
                        <label>Đánh giá của bạn:</label>
                        <textarea name="danhgia" id="danhgia" cols="30" rows="10" placeholder="Ví dụ: Tin chính xác, đáng tin cậy..."></textarea>
                    </div>
                </fieldset>
                <div class="btn-rate">
                    <button type="submit" name="btn_rating" id="btn_rating" class="btn-danhgia">Đánh giá</button>
                    <span class="submit huy" onclick="hide_popup('popup1')">Hủy</span>
                </div>
            </form>
        </div>
    </div>
    <div class="hidden_modal"></div>
    <style>
        .hidden_modal {
            background: rgba(0,0,0,.4);
            width: 100%;
            height: 100%;
            min-height: 100%;
            position: fixed;
            top: 0;
            z-index: 10000;
            display:none;
        }
        .open_modal{
            display: block;
        }
    </style>
    <script defer>
        $(document).ready(function(){
                $('#btn-top').click(function() {
                $('body,html').animate({
           scrollTop: 0
        }, 800);
     });
    });
    jQuery(window).scroll(function(){
    if(jQuery(this).scrollTop()>300){
      jQuery('#btn-top').fadeIn(800);
    }else{
      jQuery('#btn-top').fadeOut(800);
    }

    if(jQuery(this).scrollTop()>200 && $('#load_tawk').hasClass('tawk_add') == false){
      $('#load_tawk').append("<script>var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();(function(){var s1=document.createElement('script'),s0=document.getElementsByTagName('script')[0];s1.async=true;s1.src='https://embed.tawk.to/597813875dfc8255d623ef26/default';s1.charset='UTF-8';s1.setAttribute('crossorigin','*');s0.parentNode.insertBefore(s1,s0);})();<\/script>");
      $('#load_tawk').addClass('tawk_add');
    }
  });
        $('.showname').click(function(){
            $(this).hide();
            $(this).parent(".lienhevl").find(".hidename").show();
        });
        $('.hidename').click(function(){
            $(this).hide();
            $(this).parent(".lienhevl").find(".showname").show();
        });
        //filter
        function home_filter() {
            var a = $("#thanhpho_ft").val();
            var b = $("#quanhuyen_ft").val();
            var c = $("#nganhnghe_ft").val();
            var d = $("#chitietnn_ft").val();
            var e = $("#thoigian").val();
            var f = $("#tukhoa").val();
            var z = $("#luong").val();
            var g = $("#money_min").val();
            var h = $("#money_max").val();
            $.ajax({
            type: "POST",
            url: "../ajax/filter.php",
            data: {
                a: a,
                b: b,
                c: c,
                d: d,
                e: e,
                f: f,
                z: z,
                g: g,
                h: h,
            },
            success: function(t) {
                $("#main").html(t);
            }
            })
        }
        $(document).ready(function() {
            
            $(".form_filter .city_filter,.form_filter .district_filter,.form_filter .career_filter,.form_filter .job_detail_filter,.form_filter .job_type_filter,.form_filter .pay_filter,.form_filter .keyword_filter,.form_filter .money_min_filter,.form_filter .money_max_filter").change(function() {
                new home_filter;
            })
        });
        function show_popup(t,id) {
            var t_id = $(t).attr('data-id');
            $('#id_rate').val(t_id);
            document.getElementById(id).style.display = 'block';
            return false;
        };
        $('#btn_rating').click(function (e) { 
            $(".noti-error").remove();
            $("#danhgia").removeClass("error");
            
            var danhgia = $("#danhgia");
            if (danhgia.val() == '' && danhgia.hasClass('error') == false) {
                danhgia.focus();
                danhgia.addClass('error');
                danhgia.before("<p class='noti-error'>Bạn chưa nhập đánh giá</p>");
            }
            if ($("form").find('.error').length == 0) {
                console.log($('#id_rate').val());
                $(this).submit();
            } else {
                return false;
            }
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

    
    //see more
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
    var modal1 = document.getElementById("popup1");
    window.onclick = function(event) {
        if (event.target == modal1) {
            modal1.style.display = "none";
        }
    }

    $(window).click(function(event){
        if($(event.target).hasClass('popup-login')){
            $(event.target).hide();
        }
    });
    $(document).ready(function() {
        $('.style_select').select2();
    });
    // $(".btn_rating").click(function() {
        
    //     if ($("form").find('.error').length == 0) {
    //         $(this).submit();
    //         // $('.popup_thanh_cong').css('display', 'block'); 
    //     } else {
    //         return false;
    //     }
    // });
    </script>
</body>

</html>