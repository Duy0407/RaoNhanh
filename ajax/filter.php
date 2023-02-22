<?
include('config.php');

$a = $_POST['a'];
$b = $_POST['b'];
$c = $_POST['c'];
$d = $_POST['d'];
$e = $_POST['e'];
$f = $_POST['f'];
$z = $_POST['z'];
$g = $_POST['g'];
$h = $_POST['h'];

$db_qrx ="";
if($a != ''){
    $db_qrx .= " AND FIND_IN_SET(vieclam.new_city, '".$a."') ";
}
if($b != ''){
    $db_qrx .= " AND FIND_IN_SET(vieclam.new_district, '".$b."') ";
}

if ($c != '') {
    $db_qrx .= " AND FIND_IN_SET(vieclam.new_job_type, '".$c."') ";
}

if ($d != '') {
    $db_qrx .= " AND FIND_IN_SET(vieclam.new_job_detail, '".$d."') ";
}

if ($e != '') {
    $db_qrx .= " AND FIND_IN_SET(vieclam.new_job_kind, '".$e."') ";
}
if ($f != '') {
    $db_qrx .= " AND new_title LIKE '%".$f."%' OR cit_name LIKE '%".$f."%' OR new_address LIKE '%".$f."%' OR new_job_detail LIKE '%".$f."%' OR cat_name LIKE '%".$f."%' ";
}
if ($z != '') {
    $db_qrx .= " AND FIND_IN_SET(vieclam.new_pay_type, '".$z."') ";
}

if ($g != '') {
    $db_qrx .= " AND FIND_IN_SET(vieclam.new_money_min, '".$g."') ";
}

if ($h != '') {
    $db_qrx .= " AND FIND_IN_SET(vieclam.new_money_max, '".$h."') ";
}

$db_qr = new db_query("SELECT new_city,save_time_vl,usc_phone,new_id,new_user_id,new_title,new_address,new_job_type,new_job_kind,new_end_date,new_desc,new_money_min,new_money_max,new_type,usc_name,cit_name,new_view_count,numrate,new_picture,new_pay_type
from vieclam 
join user on vieclam.new_user_id = user.usc_id 
join category_vl on vieclam.new_job_type = category_vl.cat_id 
join city2 on vieclam.new_city = city2.cit_id   where new_type=1  ".$db_qrx ." ORDER BY new_id DESC");
$numcount = mysql_num_rows($db_qr->result);
// echo $numcount;
if ($numcount == 0) {
	echo "<p style='text-align: center;' class='kqtk'>Không tìm thấy kết quả!</p>";
}
?>
<?
while ($row = mysql_fetch_assoc($db_qr->result)) {
    $arr_type = explode(",",$row['new_job_type']);//tách chuỗi new_job_type
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
			<a href="/viec-lam/<?= replaceTitle($row['new_title']) ?>-p<?= $row['new_id'] ?>.html">
				<div class="avata">
					<img onerror='this.onerror=null;this.src="/images/vieclam/no_img.png";' class="lazyload" src="/images/loading.gif" data-src="<?= $row['new_picture'] ?>" alt="avata">
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
							<img src="/images/vieclam/luu.png" alt="save">
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
				<div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/job.png" alt="Loại hình công việc"></div><span class="bold">Công việc:</span> <?= $name_type ?>
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
			<div class="mucluong gr">
				<div class="images"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/money.png" alt="mức lương"></div>Hình thức trả lương: <span class="bold"> 
				<?
					if ($row['new_pay_type']==1) {
						echo "Theo Giờ";
					}
					elseif($row['new_pay_type']==2){
						echo "Theo Ngày";
					}
					elseif($row['new_pay_type']==3){
						echo "Theo Tuần";
					}
					elseif($row['new_pay_type']==4){
						echo "Theo Tháng";
					}
					else{
						echo "Theo Năm";
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
		<div class="danhgia">
			<a class="showpopup" href="javascript:void(0)" onclick="show_popup(this,'popup1')" data-id="<?= $row['new_id'] ?>">
				<!-- <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/like.png" alt="like"> -->
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
				<span><?=$row['usc_name']?>:<?=$row['usc_phone']?></span>
			</div>
		</div>
    </div>
</div>
<? } ?>
<script type="text/javascript">
//  //seemore
//   $(document).ready(function(){ 
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
//liên hệ
$('.showname').click(function(){
    $(this).hide();
    $(this).parent(".lienhevl").find(".hidename").show();
});
$('.hidename').click(function(){
    $(this).hide();
    $(this).parent(".lienhevl").find(".showname").show();
})
</script>