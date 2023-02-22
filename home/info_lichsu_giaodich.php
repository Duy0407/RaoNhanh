<? include("config.php"); 
    

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

        $user = $row4['usc_id'];
        
        $curentPage  = getValue('new_sodong','int','GET',10);
        $curentPage  = intval(@$curentPage);
        
        $danhmuc = getValue('danhmuc','int','GET',0);
        $danhmuc = intval(@$danhmuc);
        
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
        
        if(isset($_GET['new_godate'])){
        $new_godate  = $_GET['new_godate']; 
        } else {
           $new_godate = "11/11/1970";
        }
        if(isset($_GET['new_todate'])){
           $new_todate  = $_GET['new_todate']; 
        } else {
           $new_todate = time();
           $new_todate = date("d/m/Y",$new_todate);
        }
        $new_todate = str_replace('/','-',$new_todate);
        $new_todate = strtotime($new_todate);

        $new_godate = str_replace('/','-',$new_godate);
        $new_godate = strtotime($new_godate);
        
        if($danhmuc == 0){
            $db_new  = new db_query("SELECT * FROM new WHERE new_create_time <= '".$new_todate."' AND new_create_time >= '".$new_godate."' AND new_user_id = ".$user." LIMIT ".$start.",".$curentPage);
            $numrow = new db_query("SELECT count(1) FROM new WHERE new_create_time <= '".$new_todate."' AND new_create_time >= '".$new_godate."' AND new_user_id = ".$user);
        }else{
            $db_new  = new db_query("SELECT * FROM new WHERE new_cate_id = ".$danhmuc." AND new_create_time <= '".$new_todate."' AND new_create_time >= '".$new_godate."' AND new_user_id = ".$user." LIMIT ".$start.",".$curentPage);
            $numrow = new db_query("SELECT count(1) FROM new WHERE new_cate_id = ".$danhmuc." AND new_create_time <= '".$new_todate."' AND new_create_time >= '".$new_godate."' AND new_user_id = ".$user);
        }
        $count = mysql_fetch_assoc($numrow->result);
        $count = $count['count(1)'];

      ?>
      <div class="detail-main">
         <h1>LỊCH SỬ GIAO DỊCH</h1>
         <div class="main_info">
            <div class="box_lich_su box_gg">
               <div class="top_lich_su">
                   <form method="GET" action=""> 
<!--                        <select class="nt_sl" name="danhmuc">
                            <option value="0">Dịch vụ</option>-->
                            <select id="select_category" name="danhmuc" class="nt_sl" aria-invalid="true">
                                <option value="0">Chọn danh mục</option>
                                <?
                                $db_qr = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = 0 ORDER BY cat_id ASC");
                                While($row = mysql_fetch_assoc($db_qr->result))
                                {
                                ?>
                                <option  value="<?= $row['cat_id'] ?>"<?if($row['cat_id'] == $danhmuc){echo "selected='selected'";}?> ><?= $row['cat_name'] ?></option>
                                <?
                                $db_qrs = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = ".$row['cat_id']." ORDER BY cat_id ASC");
                                While($rows = mysql_fetch_assoc($db_qrs->result))
                                {
                                ?>
                                <option value="<?= $rows['cat_id'] ?>" <?if($rows['cat_id'] == $danhmuc){echo "selected='selected'";}?>>--- <?= $rows['cat_name'] ?></option>
                                <?
                                }
                                unset($db_qrs,$rows);
                                }
                                unset($db_qr,$row);
                                ?>
                            </select>
                        <!--</select>-->
                          <div id="div_datepicker1">
                              <input type="text" class="nt_stdate" value="<?=date('d/m/Y',$new_godate);?>" id="datepicker1"  id="new_godate" name="new_godate"/>
                          </div>
                          <div id="div_datepicker2">
                              <input type="text" class="nt_enddate" value="<?=date('d/m/Y',$new_todate)?>" id="datepicker2"  id="new_todate" name="new_todate"/>
                          </div>
                        <span class="htt">Hiển thị</span>
                        <input type="text" value="<?= $curentPage?>" class="nt_sls" name="new_sodong"/>
                        <input type="submit" name="timkiem" value="TÌM KIẾM" id="clickok"/>
      <!--                  <div class="nt_sdtk"><span>SỐ DƯ TÀI KHOẢN</span><i><?=$row4['usc_money']; ?> <b>Tcoin</b></i></div>-->
                    </form>
               </div>
               <div class="main_lich_su">
                  <div class="header_ls">
                     <span class="td1">Trạng thái</span>
                     <span class="td2">Thanh toán</span>
                     <span class="td3">Dịch vụ</span>
                     <span class="td4">Chi tiết</span>
                     <span class="td5">Thời gian</span>
                  </div>
                  <div class="main_ls">
                    <?
                        while($row_new = mysql_fetch_assoc($db_new->result)){
                    ?>  
                     <div class="iteam_ls">
                        <span class="td1"><?=($row_new['new_active']==1)?"Thành công":"Hết hạn"?></span>
                        <span class="td2"><?=$row_new['new_money']?></span>
                        <span class="td3">
                            <? if($row_new['new_type'] == 2){
                                echo 'Up vip 1';
                            }else if($row_new['new_type'] == 3){
                                echo 'Up vip 2';
                            }else if($row_new['new_type'] == 4){
                                echo 'Up vip 3';
                            }else if($row_new['new_type'] == 1){
                                echo 'Up miễn phí';
                            }
                            ?>
                        </span>
                        <span class="td4">
                              <?
                                $db_his  = new db_query("SELECT cat_id,cat_name  FROM category WHERE cat_id = ".$row_new['new_cate_id']);
                                $cate = mysql_fetch_assoc($db_his->result);
                              ?>  
                           Danh mục sp: <b><?=$cate['cat_name']?></b><br />
                           Link tin rao vặt: <a href="<?echo $urldt = "/".replaceTitle($row_new['new_title'])."-c".$row_new['new_id'].".html";?>" title="<?=$row_new['new_title']?>">
                               <?echo $urldt = "http://".$_SERVER['SERVER_NAME']."/".replaceTitle($row_new['new_title'])."-c".$row_new['new_id'].".html";?>
                           </a>
                        </span>
                        <span class="td5"><?=date('d/m/Y',$row_new['new_create_time'])?><br />
                        <?=date('H:i:s',$row_new['new_create_time'])?></span>
                     </div>
                     <?
                        }
                     ?>
                  </div>
               </div>
               <div class="pagination_wrap clr lich_su_page">
<!--                  <div class="clr">
                   <a class="jp-current">1</a>  <a href="/tuyen-dung?page=2" class="">2</a>  <a href="/tuyen-dung?page=3" class="">3</a>  <a href="/tuyen-dung?page=4" class="">4</a>  <a href="/tuyen-dung?page=2" class=" next" title="Next page">&gt;</a> <a href="/tuyen-dung?page=5" class=" notUndeline">...</a>  <a href="/tuyen-dung?page=601" class=" last" title="Last page">Cuối</a></div>-->
                    <div class="clr">
                      <?
                        $url_link = "?&new_sodong=".$curentPage."&danhmuc=".$danhmuc."&new_godate=".date('d/m/Y',$new_godate)."&new_todate=".date('d/m/Y',$new_todate)."&";
                        echo generatePageBar('',$page,$curentPage,$count," ",$url_link,'','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
                      ?>
                    </div>
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
    
   $(".ntvtk .lsgd").addClass("open_menu");
   $(".ntvtk").addClass("selected");
   $(".ntvtk a:first").addClass("menu-a");
   
</script>