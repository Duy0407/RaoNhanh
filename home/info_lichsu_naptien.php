<? include("config.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');

?>
<!DOCTYPE html>
<html>
<head><title>Rao vặt|Rao vặt miễn phí|Mạng xã hội rao vặt lớn nhất Việt Nam</title>
   <meta name="keywords" content="rao vặt, rao vặt miễn phí, rao vat, rao vat mien phi"/>
   <meta name="description" content="Mạng xã hội rao vặt, rao vặt miễn phí trên mọi lĩnh vực. Cập nhật hàng ngàn tin tức rao vặt mỗi ngày tại Raonhanh365.vn"/>
   <meta property="og:title" content="Rao vặt|Rao vặt miễn phí|Mạng xã hội rao vặt lớn nhất Việt Nam"/>
   <meta property="og:description" content="Mạng xã hội rao vặt, rao vặt miễn phí trên mọi lĩnh vực. Cập nhật hàng ngàn tin tức rao vặt mỗi ngày tại Raonhanh365.vn"/>
   <meta property="og:url" content="http://raonhanh365.vn/"/>
   <meta name="language" content="vietnamese"/>
   <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn"/>
   <meta name="abstract" content="raonhanh365.vn Mạng xã hội mua bán rao vặt lớn nhất Việt Nam<"/>
   <meta name="author" itemprop="author" content="raonhanh365.vn"/>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
   <meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>
   <meta name="robots" content="noindex,nofollow"/>
   <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
   <meta property="og:image:url" content="/"/>
   <meta property="og:image:width" content="476"/>
   <meta property="og:image:height" content="249"/>
   <meta property="og:type" content="website"/>
   <meta property="og:locale" content="vi_VN"/>
   <meta name="revisit-after" content="1 days"/>
   <meta name="page-topic" content="Mua bán rao vặt"/>
   <meta name="resource-type" content="Document"/>
   <meta name="distribution" content="Global"/>
   <link rel="canonical" href="http://raonhanh365.vn"/>
   <link rel="stylesheet" type="text/css" href="/css/detail-slider.css"/>
   <link rel="stylesheet" type="text/css" href="/css/jquery-date.css"/>
   <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
   <script src="/js/jssor.slider-26.3.0.min.js" type="text/javascript"></script>
   <script src="/js/jquery-ui.js" type="text/javascript"></script>
   <script src="/js/info.js" type="text/javascript"></script>
   <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
   <style>
       .iteam_ls .p{
           font-weight: 500;
       }
       .nt_sl{
           -moz-appearance: none;
           -webkit-appearance: none;
           background: url(../images/icrow_den.png)no-repeat;
           background-position: 120px 10px!important;
           text-indent: 1px;
       }
       #div_datepicker1,#div_datepicker2{
           position: relative;
       }
       #div_datepicker1 img{
           position: absolute;
           top: 10px;
           left: 260px;
           cursor: pointer;
       }
       #div_datepicker2 img{
           position: absolute;
           top: 10px;
           right: 351px;
           cursor: pointer;
       }
   </style>
</head>
<body>
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01"/>
</div>
<? include("../includes/common/inc_header.php") ?>
<section>
<? include("../includes/info/inc_bread_crumb.php") ?>
<div class="main_cate">
    <div class="container">
     <?
        if(empty($row4)){
            redirect("/");
        }else if($row4['usc_type']==5){
             include("../includes/info/inc_left_info_doanhnghiep.php") ;    
        } else {
             include("../includes/info/inc_left_info.php") ;
        }
        
     $user =  $row4['usc_id'];
     
     $curentPage  = getValue('his_sodong','int','GET',10);
     $curentPage  = intval(@$curentPage);
        
     $page  = getValue('page','int','GET',1);
     $page  = intval(@$page);
     if($page == 0)
     {
       $page = 1;
     }
     $pageab = abs($page - 1);
     
     $start = $pageab * $curentPage;
     $start = intval(@$start);
     $start = abs($start); 
     
     $his_status  = getValue('his_status','int','GET',2);
     $his_status  = intval(@$his_status);
     
     if(isset($_GET['his_godate'])){
        $his_godate  = $_GET['his_godate']; 
     } else {
        $his_godate = "11/11/1970";
     }
     if(isset($_GET['his_todate'])){
        $his_todate  = $_GET['his_todate']; 
     } else {
        $his_todate = time();
        $his_todate = date("d/m/Y",$his_todate);
     }
     $his_todate = str_replace('/','-',$his_todate);
     $his_todate = strtotime($his_todate);
     
     $his_godate = str_replace('/','-',$his_godate);
     $his_godate = strtotime($his_godate);
 
     
     
        if($his_status == 2 ){
           $db_history  = new db_query("SELECT * FROM history WHERE his_time <= '".$his_todate."' AND his_time >= '".$his_godate."' AND his_user_id = ".$user." LIMIT ".$start.",".$curentPage); 
           $numrow = new db_query("SELECT count(1) FROM history WHERE his_time <= '".$his_todate."' AND his_time >= '".$his_godate."' AND his_user_id = ".$user);
        }else{
           $db_history  = new db_query("SELECT * FROM history WHERE his_time <= '".$his_todate."' AND his_time >= '".$his_godate."' AND his_status = '".$his_status."' AND his_user_id = ".$user." LIMIT ".$start.",".$curentPage); 
           $numrow = new db_query("SELECT count(1) FROM history WHERE his_time <= '".$his_todate."' AND his_time >= '".$his_godate."' AND his_status = '".$his_status."' AND his_user_id = ".$user);
        }
        $count = mysql_fetch_assoc($numrow->result);
        $count = $count['count(1)'];


      
      ?>
      <div class="detail-main">
         <h1>LỊCH SỬ NẠP TIỀN</h1>
         <div class="main_info">
            <div class="box_lich_su">
               <div class="top_lich_su">
                <form method="GET" action="/nap-tien/lich-su-nap-tien">
                   <!--<input type="text" class="nt_key" placeholder="Tìm kiếm ..." value="" id="his_select"/>-->
                   <select class="nt_sl" id="his_status" name="his_status">
                      <option value="2" <? if($his_status ==2){echo "selected='selected'";}?>>Trạng thái</option>
                      <option value="1" <? if($his_status ==1){echo "selected='selected'";}?>>Thành công</option>
                      <option value="0" <? if($his_status ==0){echo "selected='selected'";}?>>Đang xử lý</option>
                  </select>
                  <div id="div_datepicker1">
                      <input type="text" class="nt_stdate" value="<?=date('d/m/Y',$his_godate);?>" id="datepicker1"  id="his_godate" name="his_godate"/>
                  </div>
                  <div id="div_datepicker2">
                      <input type="text" class="nt_enddate" value="<?=date('d/m/Y',$his_todate)?>" id="datepicker2"  id="his_todate" name="his_todate"/>
                  </div>
                  <span class="htt">Hiển thị</span>
                  <input type="text" value="<?= $curentPage?>" class="nt_sls" id="his_sodong" name="his_sodong"/>
                  <input type="submit" value="TÌM KIẾM" name="postok" id="clickok"/>
                </form>
                  <?
                  $db_his    = new db_query("SELECT * FROM history WHERE his_user_id = ".$user);
                  ?>
                  <div class="nt_ttdn"><span>TỔNG TIỀN ĐÃ NẠP</span>
                      <i><?
                            $sun = 0;
                          while($money = mysql_fetch_assoc($db_his->result)){
                              $sun = $sun + $money['his_price'];
                          }
                          echo number_format($sun);
                          unset($db_his,$money,$sun);
                          ?>
                          <b>đ</b>
                      </i>
                  </div>
                  <?
                  $db_his    = new db_query("SELECT his_price FROM history WHERE his_user_id = ".$user." AND his_status  = '1'");
                  ?>
                  <div class="nt_ttnn"><span>TỔNG TIỀN ĐÃ NHẬN</span><i>
                      <?
                              $sun = 0;
                          while($money = mysql_fetch_assoc($db_his->result)){
                              $sun = $sun + $money['his_price'];
                          }
                          echo number_format($sun);
                          unset($db_his,$money,$sun);
                          ?>
                          <b>đ</b>
                      </i>
                  </div>
               </div>
               <div class="main_lich_su">
                  <div class="header_ls">
                     <span class="td1">Trạng thái</span>
                     <span class="td2">Mệnh giá</span>
                     <span class="td3">Hình thức</span>
                     <span class="td4">Chi tiết</span>
                     <span class="td5">Thời gian</span>
                  </div>
                  <div class="main_ls">
                    <? 
                    
                    while ($row_his = mysql_fetch_assoc( $db_history->result)){
                    ?>
                     <div class="iteam_ls">
                         <span class="td1 p">
                             <?
                                if($row_his['his_status'] == 1){
                                    echo "<span style='color:#34a853;'>Thành công</span>";
                                } else {
                                   echo "<span style='color:#f26222;'>Đang xử lý</span>";
                                }   
                             ?>
                         </span>
                        <span class="td2"><?= $row_his['his_price']?></span>
                        <span class="td3">
                            <?
                                if($row_his['his_type'] == 0){
                                    echo 'Nạp Thẻ';
                                }else{
                                    echo "Chuyển khoản";
                                }
                            ?>
                        </span>
                        <span class="td4">
                           <?
                                if($row_his['his_type'] == 0){
                                    echo "Nhà mạng: ".$row_his['his_nhamang']."<br />";
                                    echo "Serial: ".$row_his['his_seri']."<br />";
                                    echo "Mã thẻ: " .$row_his['his_mathe'];
                                }else{
                                    echo "Ngân hàng: ".$row_his['his_bank']."<br />";
                                    echo "Chủ thẻ: ".$row_his['his_cardholder']."<br />";
                                    echo "Số tài khoản: " .$row_his['his_bank_number'];
                                }
                            ?>
                        </span>
                        <span class="td5" style="text-align: center; padding-left:0px"><?= date('d/m/Y',$row_his['his_time'])?><br />
                            <?= date("h:i:s A",$row_his['his_time'])?>
                        </span>
                     </div>
                    <?}?>
                  </div>
               </div>
            <div class="pagination_wrap clr lich_su_page">
               <div class="clr">
                      <?
                      $url_link = "?his_status=".$his_status."&his_sodong=".$curentPage."&his_godate=".date('d/m/Y',$his_godate)."&his_todate=".date('d/m/Y',$his_todate)."&";
                        echo generatePageBar('',$page,$curentPage,$count," ",$url_link,'','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
                      ?>
               </div>
<!--               <div class="btn_xuat">
                  <span class="truyvan">Truy vấn</span>
                  <span class="xuatexcel">Xuất file Excel</span>
               </div>-->
            </div>
         </div>
      </div>
   </div>
</div>
</section>
<? include("../includes/common/inc_footer.php") ?>
</body>
</html>
  <script>
  $( function() {
    $( "#datepicker1" ).datepicker({
      showOn: "button",
      buttonImage: "/images/icon_date.png",
      buttonImageOnly: true,
      buttonText: "Select date",
      dateFormat:"dd/mm/yy"
    });
    $( "#datepicker2" ).datepicker({
      showOn: "button",
      buttonImage: "/images/icon_date.png",
      buttonImageOnly: true,
      buttonText: "Select date",
      dateFormat:"dd/mm/yy"
    });
  });
 
   $(".ntvtk .lsnt").addClass("open_menu");
   $(".ntvtk").addClass("selected");
   $(".ntvtk a:first").addClass("menu-a");
   
   $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
   });
  </script>
  