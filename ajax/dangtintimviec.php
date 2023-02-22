<?
include("config.php");
include("version.php");
if(isset($_COOKIE['UID']))
{
 $userid   = $_COOKIE['UID'];
 $userpass = $_COOKIE['PHPSESPASS'];
 $usertype = $_COOKIE['UT'];
 if (isset($_POST["postok"])) {
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
    $detailjob = implode(',',$_POST["ctcv"]);
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
            $image = NULL;
        }
    if ($title != '') {
        $db_qr = new db_query ("INSERT INTO vieclam(new_title,birthday,new_sex,new_phone,new_picture,new_level,new_exp,new_skill,new_city,new_district,new_address,new_job_kind,new_end_date,new_job_type,new_job_detail,new_money_min,new_money_max,new_pay_type,new_desc,new_type,new_user_id,save_time_vl)
        VALUES('".$title."','".strtotime($birth)."','".$gender."','".$phone."','".$upload_dir.$image."','".$level."','".$exp."','".$skill."','".$city."','".$district."','".$address."','".$jobkind."','".strtotime($enddate)."','".$jobtype."','".$detailjob."','".$moneymin."','".$moneymax."','".$paytype."','".$desc."','2','".$userid."','".time()."')");
        if($db_qr){
            setcookie('aa','aa',time()+3);
            header("Location:/dang-tin-tim-viec.html");
            exit();
        }    
}
    else{
        redirect('/viec-lam.html');
    }
// echo $db_qr;
 }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng tin tìm việc</title>
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="preload" as="style" href="/css/vieclam/style.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/style.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'"> 
    
    
    <!-- <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet"> -->
</head>
<body>
<?php if(isset($_COOKIE['aa'])):?>  
<div class="popup_thanh_cong" id="popup_thanh_cong" style="display:block;">
    <div class="pop_tc">
        <p class="tt_tc">BẠN ĐÃ ĐĂNG TIN THÀNH CÔNG !!!</p>
        <div class="nut_ok"><a href="/danh-sach-tin-dang-tim-viec-lam.html" class="ok_tt_tc">OK</a></div>
    </div>
</div>
<?php  endif;?>
<?
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
                <h1 class="tt-tin">Đăng tin tìm việc miễn phí</h1>
                <div class="elipmin"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/elipsmall.png" alt="ảnh"></div>
                <div class="elipmax"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/elipbig.png" alt="ảnh"></div>
                <form action="" method="post"  enctype="multipart/form-data" on>
                    <fieldset>
                        <div class="dang_tin_s">
                            <label class="title_dttd_s">Tên công việc mong muốn  <span>*</span></label>
                            <input type="text" name="tieude" id="tieude" placeholder="Nhập tên công việc mong muốn">
                        </div>
                        <div class="tong_s_1">
                            <div class=" dang_tin_s_1">
                                <label class="title_dttd_s ">Ngày sinh<span>*</span></label>
                                <input class="dang_tin_right_s" type="date" name="ngaysinh" id="ngaysinh" placeholder="Chọn ngày sinh">
                            </div>
                            <div class="dang_tin_s_1">
                                <label class="title_dttd_s" style="margin-bottom: 9px;">Giới tính<span>*</span></label>
                                <div class="sex_gt">
                                    <input type="radio" value="0" checked="checked" name="gioitinh" id="male">
                                    <label for="male">Nam</label>
                                </div>
                                <div class="sex_gt">
                                    <input type="radio" value="1" name="gioitinh" id="female" >
                                    <label for="female">Nữ</label>
                                </div>
                                <div class=" sex_gt_1">
                                    <input type="radio" value="2" name="gioitinh" id="Unknown" >
                                    <label for="Unknown">Không muốn tiết lộ</label>
                                </div>
                            </div>
                        </div>
                        <div class="tong_s_1">
                            <div class=" dang_tin_s_1">
                                <label class="title_dttd_s">Số điện thoại <span>*</span></label>
                                <input class="dang_tin_right_s" type="tel" name="phone" id="phone" placeholder="Nhập số điện thoại...">
                            </div>
                            <div class="gr-01 dang_tin_s_1">
                                <label class="title_dttd_s">Trình độ học vấn<span>*</span></label>
                                <select name="trinhdo" id="trinhdo">
                                    <option value="">Trình độ học vấn</option>
                                    <option value="1">Đại học</option>
                                    <option value="2">Cao đẳng</option>
                                    <option value="3">Lao động phổ thông</option>
                                </select>
                            </div>
                        </div>
                        <div class="tong_s_1">
                            <div class=" dang_tin_s_1">
                                <label class="title_dttd_s">Kinh nghiệm làm việc<span>*</span></label>
                                <select class="dang_tin_right_s" name="kinhnghiem" id="kinhnghiem">
                                    <option value="">Kinh nghiệm làm việc</option>
                                    <option value="1">Chưa có kinh nghiệm</option>
                                    <option value="2">Trên 1 năm kinh nghiệm</option>
                                    <option value="3">Trên 2 năm kinh nghiệm</option>
                                </select>
                            </div>
                            <div class="gr-01 dang_tin_s_1">
                                <label class="title_dttd_s">Chứng chỉ / kỹ năng</label>
                                <input type="text" name="chungchi" id="chungchi" placeholder="Nhập chứng chỉ / kỹ năng">
                            </div>
                        </div>
                        <div class="tong_s_1">
                            <div class="dang_tin_s_1">
                                <label class="title_dttd_s">Tỉnh/thành phố <span>*</span></label>
                                <select class="dang_tin_right_s" name="thanhpho" id="thanhpho">
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
                            <div class="dang_tin_s_1">
                                <p></p>
                                <label class="title_dttd_s">Quận/huyện <span>*</span></label>
                                <select name="quanhuyen" id="quanhuyen" value="">
                                    <option value="">Chọn quận / huyện</option>
                                </select>
                            </div>
                        </div>
                        <div class="dang_tin_s">
                            <label class="title_dttd_s">Địa chỉ cụ thể <span>*</span></label>
                            <input type="text" name="diachi" id="diachi" placeholder="Nhập địa chỉ cụ thể...">
                        </div>
                        <div class="tong_s_1">
                            <div class="dang_tin_s_1">
                                <label class="title_dttd_s">Hình thức làm việc <span>*</span></label>
                                <select class="dang_tin_right_s" name="htlv" id="htlv">
                                    <option value="">Chọn hình thức làm việc</option>
                                    <option value="1">Toàn thời gian</option>
                                    <option value="2">Bán thời gian</option>
                                    <option value="3">Giờ hành chính</option>
                                    <option value="4">Ca sáng</option>
                                    <option value="5">Ca chiều</option>
                                    <option value="6">Ca đêm</option>
                                </select>
                            </div>
                            <div class="dang_tin_s_1">
                                <label class="title_dttd_s">Hạn nhận việc <span>*</span></label>
                                <input type="date" name="hantuyen" id="hantuyen" placeholder="Chọn ngày hết hạn">
                            </div>
                        </div>
                        <div class="nn_to dang_tin_s">
                            <label class="title_dttd_s">Ngành nghề <span>*</span></label>
                            <select class="form-control" name="lhlv[]" id="lhlv"  style="width:100%" >
                                <option value="">Chọn loại ngành nghề</option>
                                    <? 
                                    $db_qra = new db_query("SELECT cat_id, cat_name FROM category_vl ");
                                    While($rowa = mysql_fetch_assoc($db_qra->result))
                                    { ?>
                                    <option value="<?=$rowa['cat_id'] ?>"><?=$rowa['cat_name'] ?></option>
                                    <?
                                    }
                                    ?>
                            </select>
                        </div>
                        <div class="nn_to dang_tin_s">
                            <label class="title_dttd_s" >Công việc chi tiết <span>*</span></label>
                            <select class="form-control" name="ctcv[]"  id="ctcv"  style="width:100%" >
                                <option value="">Chọn công việc chi tiết</option>
                            </select>
                        </div>
                        <div class=" dang_tin_s">
                            <label class="title_dttd_s title_dttd_s">Mức lương <span>*</span></label>
                            <div class="aaa aaaa">
                                <input type="text" name="luongmin" id="luongmin" placeholder="0">
                            </div>
                            <span class="kytu">-</span>
                            <div class="aaa aaaa">
                                <input type="text" name="luongmax" id="luongmax" placeholder="0">
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
                        <div class="nn_to dang_tin_s">
                            <label class="title_dttd_s" >Giới thiệu chung<span>*</span></label>
                            <textarea name="mota" id="mota" cols="30" rows="10" placeholder="Ví dụ: Yêu cầu công việc, quyền lợi được hưởng..."></textarea>
                        </div>
                        <div class="upload ">
                            <label class="images title_dttd_s">Hình ảnh</label>
                            <input type="file" name="image" style="display: block;width: 218px;" class="up_anh_1"> 
                        </div>
                        <div class="btn-02 dang_tin_s_submit">
                            <button class="btn-dangtin" type="submit" name="postok">Đăng tin tìm việc làm</button>
                            <div class="nut_quay_ve_tc"><a href="/viec-lam.html">X Hủy</a></div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <?}?>
    <? include("../includes/vieclam/inc_footer.php"); ?>  
    <script>
        // $("#lhlv").select2({
        //     maximumSelectionLength: 1,
        //     placeholder: " Chọn ngành nghề"
        // });
        // $("#ctcv").select2({
        //     maximumSelectionLength: 1,
        //     placeholder: " Chọn ngành nghề chi tiết"
        // });
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
        $(".btn-dangtin").click(function() {
            $(".noti-error").remove();
            $("#tieude").removeClass("error");
            $("#ngaysinh").removeClass("error");
            $("#gioitinh").removeClass("error");
            $("#phone").removeClass("error");
            $("#trinhdo").removeClass("error");
            $("#kinhnghiem").removeClass("error");
            $("#thanhpho").removeClass("error");
            $("#quanhuyen").removeClass("error");
            $("#diachi").removeClass("error");
            $("#htlv").removeClass("error");
            $("#hantuyen").removeClass("error");
            $("#lhlv").removeClass("error");
            $("#ctcv").removeClass("error");
            $("#luongmin").removeClass("error");
            $("#luongmax").removeClass("error");
            $("#thang").removeClass("error");
            $("#mota").removeClass("error");
            $("#chungchi").removeClass("error");
            var tieude = $("#tieude");
            var ngaysinh = $("#ngaysinh");
            var gioitinh = $("#gioitinh");
            var phone = $("#phone");
            var trinhdo = $("#trinhdo");
            var kinhnghiem = $("#kinhnghiem");
            var thanhpho = $("#thanhpho");
            var quanhuyen = $("#quanhuyen");
            var diachi = $("#diachi");
            var htlv = $("#htlv");
            var hantuyen = $("#hantuyen");
            var lhlv = $("#lhlv");
            var ctcv = $("#ctcv");
            var luongmin = $("#luongmin");
            var luongmax = $("#luongmax");
            var thang = $("#thang");
            var mota = $("#mota");
            var chungchi = $("#chungchi");
            if(tieude.val() == '' && tieude.hasClass('error') == false)
            {
                tieude.focus();
                tieude.addClass('error');
                tieude.after("<p class='noti-error'>Bạn chưa nhập tiêu đề</p>");
            }
            if (ngaysinh.val() == '' && ngaysinh.hasClass('error') == false) {
                ngaysinh.focus();
                ngaysinh.addClass('error');
                ngaysinh.after("<p class='noti-error'>Bạn chưa chọn ngày sinh</p>")
            }
            if (phone.val() == '' && phone.hasClass('error') == false) {
                phone.focus();
                phone.addClass('error');
                phone.after("<p class='noti-error'>Bạn chưa nhập số điện thoại</p>")
            }
            if (trinhdo.val() == '' && trinhdo.hasClass('error') == false) {
                trinhdo.focus();
                trinhdo.addClass('error');
                trinhdo.after("<p class='noti-error'>Bạn chưa chọn trình độ</p>")
            }
            if (kinhnghiem.val() == '' && kinhnghiem.hasClass('error') == false) {
                kinhnghiem.focus();
                kinhnghiem.addClass('error');
                kinhnghiem.after("<p class='noti-error'>Bạn chưa chọn kinh nghiệm</p>")
            }
            if (thanhpho.val() == '' && thanhpho.hasClass('error') == false) {
                thanhpho.focus();
                thanhpho.addClass('error');
                thanhpho.after("<p class='noti-error'>Bạn chưa chọn thành phố</p>")
            }
            if (quanhuyen.val() == '' && quanhuyen.hasClass('error') == false) {
                quanhuyen.focus();
                quanhuyen.addClass('error');
                quanhuyen.after("<p class='noti-error'>Bạn chưa chọn quận huyện</p>")
            }
            if (hantuyen.val() == '' && hantuyen.hasClass('error') == false) {
                hantuyen.focus();
                hantuyen.addClass('error');
                hantuyen.after("<p class='noti-error'>Bạn chưa chọn hạn nhận</p>")
            }
            if (lhlv.val() == '' && lhlv.hasClass('error') == false) {
                lhlv.focus();
                lhlv.addClass('error');
                lhlv.after("<p class='noti-error'>Bạn chưa chọn ngành nghề</p>");
            }
            if (ctcv.val() == '' && ctcv.hasClass('error') == false) {
                ctcv.focus();
                ctcv.addClass('error');
                ctcv.after("<p class='noti-error er-cv'>Bạn chưa nhập công việc chi tiết</p>")
            }
            if (luongmin.val() == '' && luongmin.hasClass('error') == false) {
                luongmin.focus();
                luongmin.addClass('error');
                luongmin.after("<p class='noti-error'>Bạn chưa nhập mức lương thấp nhất</p>")
            }
            if (luongmax.val() == '' && luongmax.hasClass('error') == false) {
                luongmax.focus();
                luongmax.addClass('error');
                luongmax.after("<p class='noti-error'>Bạn chưa nhập mức lương cao nhất</p>")
            }
            if (thang.val() == '' && thang.hasClass('error') == false) {
                thang.focus();
                thang.addClass('error');
                thang.after("<p class='noti-error'>Bạn chưa chọn hình thức trả lương</p>")
            }
            if (mota.val() == '' && mota.hasClass('error') == false) {
                mota.focus();
                mota.addClass('error');
                mota.after("<p class='noti-error'>Bạn chưa nhập giới thiệu chung</p>")
            }
            if (htlv.val() == '' && htlv.hasClass('error') == false) {
                htlv.focus();
                htlv.addClass('error');
                htlv.after("<p class='noti-error'>Bạn chưa chọn hình thức làm việc</p>")
            }
            if (diachi.val() == '' && diachi.hasClass('error') == false) {
                diachi.focus();
                diachi.addClass('error');
                diachi.after("<p class='noti-error er-dc'>Bạn chưa nhập địa chỉ</p>")
            }
            if (chungchi.val() == '' && chungchi.hasClass('error') == false) {
                chungchi.focus();
                chungchi.addClass('error');
                chungchi.after("<p class='noti-error er-cv'>Bạn chưa nhập chứng chỉ</p>")
            }
            if ($("form").find('.error').length == 0) {
                $(this).submit();
            } else {
                return false;
            }
        });
        $("#tieude,#diachi,#phone,#ctcv,#hantuyen,#diachi,#luongmin,#luongmax,#mota").keyup(function() {
            $(this).prev('p').text('');
            $(this).removeClass('error');
        })
        $("#thanhpho,#quanhuyen,#htlv,#lhlv,#trinhdo,#thang,#kinhnghiem").change(function() {
            $(this).prev('p').remove();
            $(this).removeClass('error');
        })
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
        
    </script>
    <div class="popup_thanh_cong">
        <div class="pop_tc">
            <p class="tt_tc">BẠN ĐÃ ĐĂNG TIN THÀNH CÔNG !!!</p>
            <div class="nut_ok"><a href="/danh-sach-tin-dang-tim-viec-lam.html" class="ok_tt_tc">OK</a></div>
        </div>
    </div>
</body>
</html>