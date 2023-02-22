<?
include("config_vl.php");
include("version.php");
if(isset($_COOKIE['UID']))
{
 $userid   = $_COOKIE['UID'];
 $userpass = $_COOKIE['PHPSESPASS'];
 $usertype = $_COOKIE['UT'];
 if (isset($_POST["postok"])){
    $title = $_POST["tieude"];
    $title_ali = replaceTitle($_POST["tieude"]);
    $city = $_POST["thanhpho"];
    $district = $_POST["quanhuyen"];
    $address = $_POST["diachi"];
    $phone = $_POST["phone"];
    $jobkind = $_POST["htlv"];
    $jobtype = implode(',',$_POST["lhlv"]);
    $level = $_POST["trinhdo"];
    $exp = $_POST["kinhnghiem"];
    $skill = $_POST["chungchi"];
    $jobdetail = implode(',',$_POST["ctcv"]);
    $enddate = $_POST["hantuyen"];
    $quantity = $_POST["soluong"];
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
                // $company_logo = ('../thumb/'.$y.'/'.$m.'/'.$d.'/'.$image);
            }
        } else {
            $image = NULL;
        }
        if ($title != '') {
            $db_qr = new db_query ("INSERT INTO vieclam (new_title,new_alias,new_city,new_district,new_phone,new_address,new_job_type,new_job_kind,new_level,new_exp,new_skill,new_job_detail,new_end_date,new_money_min,new_money_max,new_picture,new_desc,new_pay_type,new_quantity,new_type,new_user_id,save_time_vl)
            VALUES ('".$title."','".$title_ali."','".$city."','".$district."','".$phone."','".$address."','".$jobtype."','".$jobkind."','".$level."','".$exp."','".$skill."','".$jobdetail."','".strtotime($enddate)."','".$moneymin."','".$moneymax."','".$upload_dir.$image."','".$desc."','".$paytype."','".$quantity."','1','".$userid."','".time()."')");
            
            setcookie('aa','aa',time()+3);
            header("Location:/dang-tin-tuyen-dung.html");
            exit();
        }
        else{
            redirect('/viec-lam.html');
        }
}

}

$db_name_title = new db_query("SELECT * FROM vieclam WHERE new_user_id = '".$_COOKIE['UID']."'");
if(mysql_num_rows($db_name_title->result) > 0){
    $ar_name_title = $db_name_title->result_array();
    // echo "<pre>";
    // print_r($ar_name_title);
    // echo "</pre>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng tin tuyển dụng</title>
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
    <link rel="stylesheet" href="/css/vieclam/select2.min.css">
    <link rel="preload" as="style" href="/css/vieclam/style.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/style.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'"> 
    <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet"> -->
</head>

<body>
<?php if(isset($_COOKIE['aa'])):?>  
    <div class="popup_thanh_cong" id="popup_thanh_cong" style="display:block;">
        <div class="pop_tc">
            <p class="tt_tc">BẠN ĐÃ ĐĂNG TIN THÀNH CÔNG !!!</p>
            <div class="nut_ok"><a href="/viec-lam.html" class="ok_tt_tc">OK</a></div>
        </div>
    </div>
<?php  endif;?>
<?php
if(!isset($_COOKIE['UID']) && empty($_COOKIE['UID'])) 
{
    redirect('/viec-lam.html');
?>
    <?
}else{
?>
    <div class="dangtintuyendung">
        <div class="row">
            <a class="blog_undo" href="dang-tin-mien-phi-vl.html" rel="nofollow"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/quaylai.png" alt="quay lại"></a>
            <div class="dttd">
                <h1 class="tt-tin">Đăng tin tuyển dụng miễn phí</h1>
                <div class="elipmin"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/elipsmall.png" alt="ảnh"></div>
                <div class="elipmax"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/elipbig.png" alt="ảnh"></div>
                <form action="" method="post" onsubmit="formSubmit(); return false;" enctype="multipart/form-data" id="form_sb" >
                    <fieldset>
                        <div class="dang_tin_s">
                            <label class="col col-1 title_dttd_s">Tiêu đề <span>*</span></label>
                            <input type="text" name="tieude" id="tieude" placeholder="Nhập tiêu đề...">
                        </div>
                        <div class=" dang_tin_s_1">
                            <label class="col col-2 title_dttd_s">Tỉnh/thành phố <span>*</span></label>
                            <select class="dang_tin_right_s style_select" name="thanhpho" id="thanhpho">
                                <option value="">Chọn tỉnh / thành phố</option>
                                    <?
                                    $query = new db_query("SELECT cit_id,cit_name FROM city2 where cit_parent = 0");
                                    while($rowcty= mysql_fetch_assoc($query->result)) {
                                    ?>
                                <option class="thanhpho" value="<? echo $rowcty['cit_id']; ?>">
                                    <? echo $rowcty['cit_name']; ?>
                                </option>
                                <?
                                }
                                ?>
                            </select>
                        </div>
                        <div class=" dang_tin_s_1 dang_tin_s_3">
                            <label class="col col-2 title_dttd_s">Quận/huyện <span>*</span></label>
                            <select name="quanhuyen" id="quanhuyen" value=""  class="style_select">
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
                                <input class="dang_tin_right_s" type="number" name="phone" id="phone" placeholder="Nhập số điện thoại...">
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
                        <div class="tong_s_1">
                            <div class="  dang_tin_s_1">
                                <label class="col col-1 title_dttd_s">Ngành nghề <span>*</span></label>
                                <select class="dang_tin_right_s style_select" name="lhlv[]" id="lhlv"  >
                                    <option value="">Chọn ngành nghề</option>
                                        <? 
                                        $db_qra = new db_query("SELECT cat_id, cat_name FROM category_vl ");
                                        While($rowa = mysql_fetch_assoc($db_qra->result))
                                        { ?>
                                        <option  value="<?echo $rowa['cat_id'] ?>"><?=$rowa['cat_name'] ?></option>
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
                            <div class="dang_tin_s">
                                <label class="col col-1 title_dttd_s">Công việc chi tiết <span>*</span></label>
                                <select class="form-control style_select" name="ctcv[]"  id="ctcv"  >
                                    <option value="">Chọn công việc chi tiết</option>
                                </select>
                            </div>
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
                                <label class="col col-2 title_dttd_s">Chứng chỉ / Kỹ năng<span>*</span></label>
                                <input type="text" name="chungchi" id="chungchi" placeholder="Nhập chứng chỉ / kỹ năng...">
                            </div>
                            
                        </div>
                        <div class="tong_s_1">
                            <div class="  dang_tin_s_1">
                                <label class="col col-2 title_dttd_s">Hạn tuyển <span>*</span></label>
                                <input type="date"  class="dang_tin_right_s" name="hantuyen" id="hantuyen" placeholder="Chọn ngày hết hạn">
                            </div>
                            <div class=" dang_tin_s_1">
                                <label class="col col-2 title_dttd_s">Số lượng tuyển dụng <span>*</span></label>
                                <input type="number" name="soluong" id="soluong" placeholder="Nhập số lượng tuyển dụng..." min="0">
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
                            <textarea name="mota" id="mota" cols="30" rows="10" placeholder="Ví dụ: Yêu cầu công việc,  giới tính cần tuyển, quyền lợi được hưởng, hồ sơ bao gồm..."></textarea>
                        </div>
                        <div class="upload">
                            <label class="images title_dttd_s">Hình ảnh</label>
                            <input type="file" name="image" accept="image/*" id="image" style="display: block;">
                        </div>
                        <div class=" dang_tin_s dang_tin_s_submit">
                            <button type="submit" class="btn-dangtin" id="submit" name="postok">Đăng tin tuyển dụng</button>
                            <div class="nut_quay_ve_tc"><a href="/viec-lam.html">X Hủy</a></div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <?}?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="/css/select2.min.css" >

    <script src="/js/lazysizes.min.js"></script>
    <script src="/js/select2.min.js"></script>

    
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
                AVATAR.style.backound = `url(${reader.result}) center center/cover`;
            };
        });
    </script> -->
    <script>

        // $("#lhlv").select2({
        //     maximumSelectionLength: 1,
        //     placeholder: " Chọn ngành nghề"
        // });
        // $("#ctcv").select2({
        //     maximumSelectionLength: 1,
        //     placeholder: " Chọn ngành nghề chi tiết"
        // });

        var ar_name_title = <?=mb_strtolower(json_encode(array_column($ar_name_title, 'new_title'),JSON_UNESCAPED_UNICODE),'UTF-8');?>;

        $(".btn-dangtin").click(function() {
            $(".noti-error").remove();
            $("#tieude").removeClass("error");
            $("#thanhpho").removeClass("error");
            $("#quanhuyen").removeClass("error");
            $("#diachi").removeClass("error");
            $("#phone").removeClass("error");
            $("#htlv").removeClass("error");
            $("#lhlv").removeClass("error");
            $("#trinhdo").removeClass("error");
            $("#kinhnghiem").removeClass("error");
            $("#ctcv").removeClass("error");
            $("#hantuyen").removeClass("error");
            $("#soluong").removeClass("error");
            $("#luongmin").removeClass("error");
            $("#luongmax").removeClass("error");
            $("#thang").removeClass("error");
            $("#mota").removeClass("error");
            $("#chungchi").removeClass("error");
            var tieude = $("#tieude");
            var thanhpho = $("#thanhpho");
            var quanhuyen = $("#quanhuyen");
            var diachi = $("#diachi");
            var phone = $("#phone");
            var htlv = $("#htlv");
            var lhlv = $("#lhlv");
            var trinhdo = $("#trinhdo");
            var kinhnghiem = $("#kinhnghiem");
            var ctcv = $("#ctcv");
            var hantuyen = $("#hantuyen");
            var soluong = $("#soluong");
            var luongmin = $("#luongmin");
            var luongmax = $("#luongmax");
            var thang = $("#thang");
            var mota = $("#mota");
            var chungchi = $("#chungchi");

            var text = $("#tieude").val().toLowerCase();
            if (Object.values(ar_name_title).indexOf(text) > -1) {
               $("#tieude").after('<span class="noti-error" style="display: block;color: red">Bạn đã đăng tin này trước đó</span>');
               $("#tieude").focus();
               tieude.addClass('error');
               returnform = false; 
            }
            
            if (tieude.val() == '' && tieude.hasClass('error') == false) {
                tieude.focus();
                tieude.addClass('error');
                tieude.after("<p class='noti-error'>Bạn chưa điền tiêu đề</p>");
            }
            if (thanhpho.val() == '' && thanhpho.hasClass('error') == false) {
                thanhpho.focus();
                thanhpho.addClass('error');
                thanhpho.after("<p class='noti-error'>Bạn chưa chọn thành phố</p>");
            }
            if (quanhuyen.val() == '' && quanhuyen.hasClass('error') == false) {
                quanhuyen.focus();
                quanhuyen.addClass('error');
                quanhuyen.after("<p class='noti-error'>Bạn chưa chọn quận huyện</p>");
            }
            if (diachi.val() == '' && diachi.hasClass('error') == false) {
                diachi.focus();
                diachi.addClass('error');
                diachi.after("<p class='noti-error'>Bạn chưa nhập địa chỉ</p>");
            }
            if (phone.val() == '' && phone.hasClass('error') == false) {
                phone.focus();
                phone.addClass('error');
                phone.after("<p class='noti-error'>Bạn chưa nhập số diện thoại</p>");
            }
            if (htlv.val() == '' && htlv.hasClass('error') == false) {
                htlv.focus();
                htlv.addClass('error');
                htlv.after("<p class='noti-error'>Bạn chưa chọn hình thức việc làm</p>");
            }
            if (lhlv.val() == '' && lhlv.hasClass('error') == false) {
                lhlv.focus();
                lhlv.addClass('error');
                lhlv.after("<p class='noti-error'>Bạn chưa chọn ngành nghề</p>");
            }
            if (trinhdo.val() == '' && trinhdo.hasClass('error') == false) {
                trinhdo.focus();
                trinhdo.addClass('error');
                trinhdo.after("<p class='noti-error'>Bạn chưa chọn trình độ</p>");
            }
            if (kinhnghiem.val() == '' && kinhnghiem.hasClass('error') == false) {
                kinhnghiem.focus();
                kinhnghiem.addClass('error');
                kinhnghiem.after("<p class='noti-error'>Bạn chưa chọn kinh nghiệm</p>");
            }
            if (chungchi.val() == '' && chungchi.hasClass('error') == false) {
                chungchi.focus();
                chungchi.addClass('error');
                chungchi.after("<p class='noti-error'>Bạn chưa nhập chứng chỉ kĩ năng</p>");
            }
            if (ctcv.val() == '' && ctcv.hasClass('error') == false) {
                ctcv.focus();
                ctcv.addClass('error');
                ctcv.after("<p class='noti-error'>Bạn chưa chọn công việc chi tiết</p>");
            }
            if (hantuyen.val() == '' && hantuyen.hasClass('error') == false) {
                hantuyen.focus();
                hantuyen.addClass('error');
                hantuyen.after("<p class='noti-error'>Bạn chưa nhập hạn tuyển</p>");
            }
            if (soluong.val() == '' && soluong.hasClass('error') == false) {
                soluong.focus();
                soluong.addClass('error');
                soluong.after("<p class='noti-error'>Bạn chưa nhập số lượng</p>");
            }
            if (luongmin.val() == '' && luongmin.hasClass('error') == false) {
                luongmin.focus();
                luongmin.addClass('error');
                luongmin.after("<p class='noti-error'>Bạn chưa nhập mức lương</p>");
            }
            if (luongmax.val() == '' && luongmax.hasClass('error') == false) {
                luongmax.focus();
                luongmax.addClass('error');
                luongmax.after("<p class='noti-error'>Bạn chưa nhập mức lương</p>");
            }
            if (thang.val() == '' && thang.hasClass('error') == false) {
                thang.focus();
                thang.addClass('error');
                thang.after("<p class='noti-error'>Bạn chưa chọn hình thức trả lương</p>");
            }
            if (mota.val() == '' && mota.hasClass('error') == false) {
                mota.focus();
                mota.addClass('error');
                mota.after("<p class='noti-error'>Bạn chưa nhập mô tả</p>");
            }
            if ($("form").find('.error').length == 0) {
                $(this).submit();
                // $('.popup_thanh_cong').css('display', 'block'); 
            } else {
                return false;
            }
        });
        $("#tieude,#diachi,#phone,#ctcv,#hantuyen,#soluong,#luongmin,#luongmax,#mota").keyup(function() {
            $(this).prev('p').text('');
            $(this).removeClass('error');
        })
        $("#thanhpho,#quanhuyen,#htlv,#lhlv,#trinhdo,#thang,#kinhnghiem").change(function() {
            $(this).prev('p').remove();
            $(this).removeClass('error');
        })
        $("#thanhpho").on("change", function() {
            var id = $(this).val();
            $.ajax({
                url: '/ajax/get_district_byid.php',
                data: {
                    id: id
                },
                success: function(t) {
                    $("#quanhuyen").html(t);
                }
            })
        })
        // soma
        $("#lhlv").on("change", function() {
            var id_ct = $(this).val();
            var qh = $('#quanhuyen').val();
            var tp = 1;
            $.ajax({
                url: '/ajax/nn_get_nn_chi_tiet.php',
                data: {
                    id_ct: id_ct,
                    qh: qh,
                    tp: tp
                },
                success: function(t) {
                    $("#ctcv").html(t);
                }
            })
        })
        // function formSubmit() {

        //     var tieude = $('#tieude').val();
        //     var thanhpho = $('#thanhpho').val();
        //     var quanhuyen = $('#quanhuyen').val();
        //     var diachi = $('#diachi').val();
        //     var phone = $('#phone').val();
        //     var htlv = $('#htlv').val();
        //     var lhlv = $('#lhlv').val();
        //     var trinhdo = $('#trinhdo').val();
        //     var kinhnghiem = $('#kinhnghiem').val();
        //     var chungchi = $('#chungchi').val();
        //     var ctcv = $('#ctcv').val();
        //     var hantuyen = $('#hantuyen').val();
        //     var soluong = $('#soluong').val();
        //     var luongmin = $('#luongmin').val();
        //     var luongmax = $('#luongmax').val();
        //     var thang = $('#thang').val();
        //     var mota = $('#mota').val();
        //     var image = $('#image').val();
        //     $.ajax({
        //         url: '/ajax/submit_tin_tuyen_dung.php',
        //         type:"POST",
        //         data: {
        //             tieude: tieude,
        //             thanhpho:thanhpho,
        //             quanhuyen:quanhuyen,
        //             diachi:diachi,
        //             phone:phone,
        //             htlv:htlv,
        //             lhlv:lhlv,
        //             trinhdo:trinhdo,
        //             kinhnghiem:kinhnghiem,
        //             chungchi:chungchi,
        //             ctcv:ctcv,
        //             hantuyen:hantuyen,
        //             soluong:soluong,
        //             luongmin:luongmin,
        //             luongmax:luongmax,
        //             thang:thang,
        //             mota:mota,
        //             image:image
        //         },
        //         success: function(tt) {
        //             $('#popup_thanh_cong').css('display','block');
        //         }
        //     })
        // }
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
        var number = document.getElementById('phone');
        number.onkeydown = function(e) {
            if(!((e.keyCode > 95 && e.keyCode < 106)
            || (e.keyCode > 47 && e.keyCode < 58) 
            || e.keyCode == 8)) {
                return false;
            }
        }
        $(document).ready(function() {
        $('.style_select').select2();
    });
    </script>
    <div class="popup_thanh_cong" id="popup_thanh_cong">
            <div class="pop_tc">
                <p class="tt_tc">BẠN ĐÃ ĐĂNG TIN THÀNH CÔNG !!!</p>
                <div class="nut_ok"><a href="/viec-lam.html" class="ok_tt_tc">OK</a></div>
            </div>
        </div>
</body>

</html>