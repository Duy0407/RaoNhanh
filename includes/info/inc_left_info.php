<?
if(empty($row4['usc_id'])){
    redirect('/');
}
?>
<style>
    #info-left-menu-ul > li a{
        cursor: pointer;
    }
    .open_menu{
        color: #f26249!important;
    }
</style>
<div class="info-left">
   <div class="info-left-bg">
       <div class="div_ovacity"></div>
       <div class="div_bg_top"></div>
       <div class="info-left-top">
           <div class="info-left-top-mail">
               <div>
                   <? if(empty($row4['usc_logo'])){ ?>
                   <img src="/images/detai-avata.png" alt="<?=$row4['usc_name']?>" <?=$row4['usc_name']?>/>
                    <? } else { ?>
                   <img src="<?=$row4['usc_logo']?>" onerror='this.onerror=null;this.src="/images/detai-avata.png";' alt="<?=$row4['usc_name']?>" title="<?=$row4['usc_name']?>" />   
                   <?}?>
                   
                   <h4><?=$row4['usc_name']?></h4>
                   <i>Ngày tham gia: <?= date('d-m-Y',$row4['usc_time'])?></i>
                   <p>
                      Tài khoản: <span> <?=$row4['usc_money']?> VNĐ</span> 
                   </p>
               </div>
           </div>
       </div>
   </div>
   <div class="info-left-main">
       <div class="top_dangtin_nc"> 
           <?
            $db_new =  new db_query("SELECT COUNT(new_id) FROM new WHERE new_user_id = ".$row4['usc_id']);
            $row_new   = mysql_fetch_assoc($db_new->result);
            $nangcap_out = "";
           ?>
           <div class="div_nangcap_1"><a <? if($row_new['COUNT(new_id)'] < 3){$nangcap_out = 'nangcap_out';}else{echo "href='/ca-nhan/nang-cap'";}?> class="<?=$nangcap_out?>" ><i></i>NÂNG CẤP TK</a></div>
           <? unset($nangcap_out,$db_new,$row_new);?>
       </div>
       <ul id='info-left-menu-ul'>
           <li class="tttk"><a class="">THÔNG TIN TÀI KHOẢN</a>
               <div class="info-left-submenu">
                   <ul>
                       <li><div class="menu-key"></div><a href="/ca-nhan/cap-nhap-thong-tin" id="tttk">Thay đổi thông tin</a></li>
                       <?
                            if(isset($row4['usc_account'])){
                       ?>
                       <li><div class="menu-key"></div><a href="/tai-khoan/doi-mat-khau" class="dmk" >Đổi mật khẩu</a></li>
                       <?}?>     
                   </ul> 
               </div>
           </li>
<!--            <li class="ntvtk"><a class="">NẠP TIỀN VÀO TÀI KHOẢN</a>
               <div class="info-left-submenu">
                   <ul>
                       <li><div class="menu-key"></div><a href="/nap-tien/nap-tien" class="nap__tien">Nạp tiền</a></li>
                       <li><div class="menu-key"></div><a href="/nap-tien/lich-su-nap-tien" class="lsnt">Lịch sử nạp tiền</a></li>
                       <li><div class="menu-key"></div><a href="/nap-tien/lich-su-giao-dich" class="lsgd">Lịch sử giao dịch</a></li>
                   </ul> 
               </div>
           </li> -->
           <li class="qltrv"><a  class="">QUẢN LÝ TIN RAO VẶT</a>
               <div class="info-left-submenu">
                   <ul>
                       
                       <li><div class="menu-key"></div><a href="/san-pham/lich-su-tin-rao" class="dstdd">Danh sách tin đã đăng</a></li>
                   </ul> 
               </div>
           </li>
           <li class="qltn"><a class="" >QUẢN LÝ TIN NHẮN</a>
               <div class="info-left-submenu">
                   <ul>
                       <li><div class="menu-key"></div><a href="#">Danh sách tin nhắn</a></li>
                       <li><div class="menu-key"></div><a href="#">Tin nhắn từ BQT</a></li>
                   </ul> 
               </div>
           </li>
           <li class="tqt"><a href="/home/dangxuat.php">THOÁT QUẢN TRỊ</a>
           </li>
       </ul>
   </div>
</div>
<script>
    $(".info-left-top").click(function (){
        if($(".info-left-main").hasClass("active")){
                $(".info-left-main").removeClass("active");
            }else{
                $(".info-left-main").addClass("active");
            }
    });
</script>