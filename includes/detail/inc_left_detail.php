<div class="filter-left pull-left">
        <div class="mobi_detail">
          <div id="filter-left-top" class="t_filter-left-top">
              <img class="lazyload" src="/images/loading.gif" data-src="../images/detai-left-top-logo.png"/>
              <div class="top_dt">
                  <h3>GIÁ:<span> <?= $row9['new_money']!= 0?format_number($row9['new_money'])." đ":"Liên hệ" ?></span></h3>
                <i>Tin đăng cách đây <?= time_elapsed_string($row9['new_create_time']) ?></i>
              </div> 
          </div>
          
          <div class="filter-left-main">
              <div id="filter-left-main-gianhang" class="<?=($row9['usc_type']==5)?"tk_doanhnghiep":"tk_canhan"?>">
                  <div id="gianhang-top">
                      <?if($row9['usc_type']==5){?>
                        <a href="<?= rewrite_home_dn($row9['usc_id'],$row9['usc_store_name']) ?> " title="Gian hang <?= $row9['usc_store_name'] ?>"><h4>TÀI KHOẢN DOANH NGHIỆP</h4></a>
                      <?}else{?>
                        <a href="/ca-nhan/<?=$row9['usc_id']?>/<?=replaceTitle($row9['usc_name'])?>.html"><h4>TÀI KHOẢN CÁ NHÂN</h4></a>
                      <?}?>
                  </div>
                  <div id="gianhang-main">
                      <div id="gianhang-tk">
                          <?if($row9['usc_type']==5){?>
                          <a href="<?= rewrite_home_dn($row9['usc_id'],$row9['usc_store_name']) ?> " title="Gian hang <?= $row9['usc_store_name'] ?>"><img class="lazyload" src="/images/loading.gif" data-src="<?=($row9['usc_logo'] != "")?$row9['usc_logo']:"/images/detai-avata.png"?>" id="avata"/></a>
                          <?}else{?>
                          <img  class="lazyload" src="/images/loading.gif" data-src="<?=($row9['usc_logo'] != "")?$row9['usc_logo']:"/images/detai-avata.png"?>" id="avata"/>
                          <?}?>
                          <div id="gianhang-tk-1">
                            <span><?=($row9['usc_type']==5)?$row9['usc_store_name']:$row9['usc_name'];?></span>
                            <i>Ngày tham gia:<?=date('d/m/Y',$row9['usc_time'])?></i>
                            
                            <?
                            if(!empty($row4['usc_id'])){
                                if($row4['usc_id'] == $row9['usc_id']){?>
                                    <p>Tài khoản:<a href=""> <?= format_number($row9['usc_money'])?> VNĐ</a></p>     
                                <?
                                }
                            }
                            ?>
                          </div>
                      </div>
                    <div class="button_chitiet">
                      <?
                         if($row9['usc_phone'] !=0){
                      ?>
                    
                      <div id="gianhang-dt">
                          <?
                            if($row9['usc_type']==5){
                               $phone_store =  trim($row9['usc_store_phone']);
                               $abc = substr($phone_store,0,1);
                               if($abc != 0){
                                  $phone_store = '0'.$phone_store;
                              }
                            }else{
                              $phone_store = trim($row9['usc_phone']);
                              $abc = substr($phone_store,0,1);
                              if($abc != 0){
                                  $phone_store = '0'.$phone_store;
                              }
                            }
                          ?>
                          <a href="tel:<?=$phone_store?>" id="gianhang-logo-dt">
                              <img class="lazyload" src="/images/loading.gif" data-src="../images/detai-left-dt.png"/>
                          </a>
                          <div id="gianhang-dt-sodt">
                            <h2  class="phone_1">
                                <?
                                    if($row9['usc_type']==5){
                                       $phone_store =  trim($row9['usc_store_phone']);
                                       $abc = substr($phone_store,0,1);
                                       if($abc != 0){
                                          $phone_store = '0'.$phone_store;
                                      }
                                      echo "<a href='tel:".$phone_store."'>".$phone_store."</a>";
                                    }else{
                                      $phone_use = trim($row9['usc_phone']);
                                      $abc = substr($phone_use,0,1);
                                      if($abc != 0){
                                          $phone_use = '0'.$phone_use;
                                      }
                                      echo "<a href='tel:".$phone_use."'>".$phone_use."</a>";
                                    }
                                    unset($phone_store,$phone_use);
                                ?>
                            </h2>
                            <span class="click_show_phone" style="color: #fff"><i>Click để liên hệ người bán</i></span>
                          </div>
                      </div>
                      <?}
                        if($row9['usc_type']==0){?>
                            
                        
                            <div id="gianhang-chat">
                                <div id="gianhang-logo-chat">
                                    <img class="lazyload" src="/images/loading.gif" data-src="../images/detail-logo-chat.png"/>
                                </div>
                                <div id="gianhang-chat-1">
                                    <a target="_blank" class="btn btn-phone btn-messenger" onclick="showBoxChatFb('<?= $row9['usc_fb_id_that'] ?>',this);" data-id="<?= $row9['usc_fb_id'] ?>" data-id-that="<?= $row9['usc_fb_id_that'] ?>" id="messenger"><h2>Chát với người bán</h2></a>
                                </div>
                            </div>
                        <?}?>
                      <div id="gianhang-bd">
                          <div id="gianhang-logo-bd">
                              <img class="lazyload" src="/images/loading.gif" data-src="../images/detai-logo-bd.png"/>
                          </div> 
                      </div>
                      <div id="gianhang-bd-1" data_user_id="<?=$row9['new_id']?>">
                              <a><h2>XEM BẢN ĐỒ</h2></a>
                      </div>
                    </div>
                  </div>
              </div>
          </div>
        </div>
          
        <div id="filter-left-uutien">
              <?
                include ('../includes/detail/tin_uu_tien.php');
              ?>
        </div>
        <!-- <div class="detai-left-banner">            
            <a href="#" target="_blank" title="banner ads"><img class="lazyload" src="/images/loading.gif" data-src="/images/detai-left-banner2.jpg" alt="banner ads" title="banner ads"/></a>
        </div> -->
</div>

<script>
        $("#gianhang-bd-1").click(function (){
            var id = $(this).attr("data_user_id");
            $(".thongbao_diachi").removeClass("hidden");
            $.post("/ajax/load_diachi_new.php",{id:id},function(data) {
                 $(".popup_diachi_main").html(data);
            });
        });
        $(".close_btn").click(function() {
            $(".thongbao_diachi").addClass("hidden");
        });
        $(".popup_diachi").click(function (e){
            e.stopPropagation();
        });
        $(".thongbao_diachi").click(function(){
            $(".thongbao_diachi").addClass("hidden");
        });
</script>
<style>
  @media only screen and (max-width: 480px){
    #gianhang-bd{
      display: none
    }
    .mobi_detail{
      top: 780px;
    }
  }
</style>