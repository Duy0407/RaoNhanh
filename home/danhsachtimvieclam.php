<?
include("config.php");
include("version.php");
$db_qr = new db_query("SELECT new_city,save_time_vl,new_phone,usc_phone,new_id,new_user_id,new_title,new_address,new_job_type,new_job_kind,new_end_date,new_desc,new_money_min,new_money_max,new_type,usc_name,cit_name,new_view_count,numrate,new_picture,new_exp
from vieclam 
join user on vieclam.new_user_id = user.usc_id 
join category_vl on vieclam.new_job_type = category_vl.cat_id 
join city2 on vieclam.new_city = city2.cit_id  where new_type=2 ORDER BY new_id DESC");
    if(isset($_POST['btn_rating'])){
        $userid   = $_COOKIE['UID'];
        $rate = (int)$_POST['rating'];
        $id_rate = (int)$_POST['id_rate'];
        $danhgia = $_POST['danhgia'];
        // $update = new db_query("UPDATE vieclam SET `rating` = 'rating' + '$rate' ,`numrate` = 'numrate' + 1 where new_id='".$id_rate."'");
        if ($danhgia != '') {
            $insert = ("INSERT INTO comment (content,cmt_user_id,cmt_vl_id,rating) VALUES ('".$danhgia."','".$userid."','".$id_rate."','".$rate."')");
        }
        else{
            redirect('/viec-lam.html');
        }
    }
    $db_save = new db_query("SELECT id FROM luu_vl");
    $rowsave = mysql_fetch_assoc($db_save->result);
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
    <title>Danh sách tìm việc làm</title>
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
    <link rel="preload" as="style" href="/css/vieclam/style.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/style.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'"> 
    <!-- <link rel="preload" as="style" href="/css/vieclam/vieclamraonhanh.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/vieclamraonhanh.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'">  -->
</head>
<body>

    <? include("../includes/vieclam/header1.php"); ?>
    <div class="container-vieclam">
        <div class="row">
            <div class="dumb">
                <a href="/viec-lam.html">Trang chủ</a>
                <span>/</span>
                <a class="name-dumb" href="/danh-sach-tin-dang-tim-viec-lam.html">Tìm việc</a>
            </div>
            <div class="group-main">
                <div id="main">
                    <?
                    while ($row = mysql_fetch_assoc($db_qr->result)) {
                        $arr_type = explode(",",$row['new_job_type']);
                        $name_type = array();
                        foreach ($arr_type as $key => $value) {
                            $name_type[] = '<span class="cv">'.$arr_cate[$value].'</span>';
                        }
                        $name_type = implode(' ',$name_type);
                    ?>
                    <div class="item">
                        <div class="item-01">
                            <div class="group">
                                <div class="avata"><img onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $row['new_picture'] ?>" alt="avata"></div>
                                <div class="info">
                                    <div class="cty">
                                        <a class="title" href="/tim-viec/<?= replaceTitle($row['new_title']) ?>-p<?= $row['new_id'] ?>.html"><h3><?= $row['new_title'] ?></h3>
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

                                        <span class="save_vl" data-idv="<?= $row['new_id'] ?>" data_cit="<?= $row['new_city'] ?>">
                                            <img class="btn_save" src="/images/vieclam/luu.png" alt="save">
                                        </span>

                                        <?endif;}
                                        else{
                                        ?>
                                        <span class="save_vl">
                                            <a class="show_reg" href="javascript:void(0)" onclick="show_reg(this,'popup-login')"><img src="/images/vieclam/luu.png" alt="save"></a>
                                        </span>
                                        <?
                                        }
                                        ?>
                                    </div>
                                    <div class="auth">
                                        <div class="name"><a href="trang-ca-nhan-<?= replaceTitle($row['usc_name']) ?>-ntd<?= $row['new_user_id'] ?>.html"><img onerror='this.onerror=null;this.src="/images/icon_raonhanh.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $row['new_picture'] ?>" alt="avata"><?= $row['usc_name'] ?></a></div>
                                        <div class="time"><?= time_elapsed_string($row['save_time_vl']) ?></div>
                                    </div>
                                </div>
                            </div>
                            <div class="group1">
                                <div class="diadiem gr"><div class="images"><img  class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/diachi.png" alt="địa điểm"></div><span class="bold dd"><?= $row['cit_name'] ?></span> | Địa chỉ: <?= $row['new_address'] ?></div>
                                <div class="mucluong gr"><div class="images"><img  class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/money.png" alt="mức lương"></div>Mức lương mong muốn: <span class="bold"><?= $row['new_money_min'] ?> - <?= $row['new_money_max'] ?> (Vnđ)</span></div>
                                <div class="lhcv gr"><div class="images"><img  class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/job.png" alt="Loại hình công việc"></div><span class="bold">Công việc:</span> <?= $name_type ?></div>
                                <div class="htvl gr">
                                    <div class="images">
                                        <img  class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/laptop.png" alt="Hình thức việc làm">
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
                                        <img  class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/alarm-clock.png" alt="Hạn tuyển">
                                    </div>
                                    <span class="bold">Kinh nghiệm làm việc:</span>
                                        <?
                                            if ($row['new_exp']==1) {
                                                echo "Chưa có kinh nghiệm";
                                            }
                                            elseif($row['new_exp']==2){
                                                echo "Trên 1 năm kinh nghiệm";
                                            }
                                            else{
                                                echo "Trên 2 năm kinh nghiệm";
                                            }
                                        ?>
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
                                    <a class="showpopup" href="javascript:void(0)" onclick="show_popup(this,'popup1')" data-id="<?= $row['new_id'] ?>">
                                        <?
                                            $db_rat = new db_query("SELECT count(cmt_id) as id from comment where cmt_vl_id ='".$row['new_id']."'");
                                            $nr_danh_gia = mysql_num_rows($db_rat->result);
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
                                <a class="showpopup" href="javascript:void(0)" onclick="show_reg(this,'popup-login')" >
                                    <?
                                        $db_rat = new db_query("SELECT count(cmt_id) as id from comment where cmt_vl_id ='".$row['new_id']."'");
                                        while ($rowrat = mysql_fetch_assoc($db_rat->result)) {
                                    ?>
                                    <span class="bold dg">
                                    <?= $rowrat['id']?>
                                    </span>
                                    <?}?>
                                    <span class="dg"> Đánh giá</span>
                                </a>
                                <span class="line">|</span>
                                <div class="view">
                                    <span class="bold view"><?= $row['new_view_count'] ?></span>Lượt xem
                                </div>
                            </div>
                            <?
                            }
                            ?>
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
                    </div>
                    <?}?>
                </div>
                <? include("../includes/vieclam/inc_right.php"); ?>
            </div>
        </div>
    </div>
    <? include("../includes/vieclam/inc_footer.php"); ?> 
    <div class="popup" id="popup1" style="display: none;">
        <div class="modal-content">
            <a href="javascript:void(0)" class="close" onclick="hide_popup('popup1')">X</a>
            <div id="status">Đánh giá tin đăng</div>
            <form id="ratingForm" method="POST">
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
    <script defer src="/js/dangky.js?v=1"></script>
    <script defer src="/js/dangnhap_2.js?v=1" type="text/javascript"></script>
    <script defer src="/js/dangnhap.js?v=1"></script>
    <script defer>
            //filter
            function home_filter_tv() {
            var a = $("#thanhpho_ft").val();
            // console.log(a);
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
            url: "../ajax/filter_vl.php",
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
                new home_filter_tv;
            })
        });
        //liên hệ
        $('.showname').click(function(){
            $(this).hide();
            $(this).parent(".lienhevl").find(".hidename").show();
        });
        $('.hidename').click(function(){
            $(this).hide();
            $(this).parent(".lienhevl").find(".showname").show();
        });
        //see more
        // $(document).ready(function(){ 
        //     if ($(".content_tg").height() > 30) {
        //      $(".content_tg").css({"height": "50px", "overflow": "hidden"});
        //    }else{
        //     $('.box_see').hide();
        //   }
        //   $('.hide_text').hide();
        //   $(".hide_text").click(function(){
        //    $(this).hide();
        //    $('.see_more').show();
        //    $(".content_tg").css("height","50px");
        //  });

        //   $(".see_more").click(function(){
        //    $(this).hide();
        //    $('.hide_text').show();
        //    $(".content_tg").css("height","unset");
        //  });
        // });
        //luu
        $(".btn_save").on("click", function () {
        var id_tv = $(this).parents('.save_vl').attr("data-idv");
        var id_cit = $(this).parents('.save_vl').attr("data-cit");
        var tim = $(this).parent('.save_vl');
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
        });
        });
        //show popup

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
        // $("#nganhnghe").on("change", function() {
        //     var id_ct = $(this).val();
        //     $.ajax({
        //         url: '/ajax/nn_get_nn_chi_tiet.php',
        //         data: {
        //             id_ct: id_ct
        //         },
        //         success: function(t) {
        //             $("#chitietnn").html(t);
        //         }
        //     })
        // })
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
    </script> 

</body>
</html>