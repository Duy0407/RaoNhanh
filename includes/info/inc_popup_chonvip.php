<div class="open_vip">
    <div class="popup_dangtin" style="width: 325px;">
        <span>CHỌN GÓI ĐĂNG TIN</span>
        <i class="fa fa-times close_btn"></i>
        <input class="pack_vip" name="pack" style="display: none" value="">
        <div class="clear"></div>
        <div class="popup_dangtin_main">
            <table>
                <ul>
<!--                     <li class="click_li_vip" data_vip ='1'><i></i>VIP 1</li>
                    <li class="click_li_vip" data_vip ='2'><i></i>VIP 2</li>
                    <li class="click_li_vip" data_vip ='3'><i></i>VIP 3</li> -->
                    <li class="click_li_vip" data_vip ='4'><i></i>MIỄN PHÍ</li>
                </ul>
                <ul>

<!--                     <li class="active data_vip_1">
                        <ul>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đấu giá trên trang chủ</li>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đấu giá trên danh mục</li>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đấu giá tin ưu tiên</li>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đăng tin vào khu vực rao vặt</li>
                        </ul>
                        <div class="dt_vip1">
                            <?
                            $db_price = new db_query("SELECT pri_price FROM price WHERE pri_id = 3");
                            $row_price = mysql_fetch_assoc($db_price->result);
                            ?>
                            <h2><?=format_number($row_price['pri_price']);?> Đ/</h2>
                            <p>Lượt đăng tin</p>
                            <div class="bg_vip1 pick_vip" usc_id="<?=$row4['usc_id']?>" pri_price="<?=$row_price['pri_price'];unset($row_price,$db_price);?>" chon_vip="2" goi_tin="GÓI TIN VIP 1">CHỌN</div>
                        </div>
                    </li> -->
<!--                     <li class="data_vip_2">
                        <ul>
                            <li><i class="fa fa-times"></i>Đấu giá trên trang chủ</li>
                            <li class="dt_vip2"><i class="fa fa-check"></i>Đấu giá trên danh mục</li>
                            <li class="dt_vip2"><i class="fa fa-check"></i>Đấu giá tin ưu tiên</li>
                            <li class="dt_vip2"><i class="fa fa-check"></i>Đăng tin vào khu vực rao vặt</li>
                        </ul>
                        <div class="dt_vip2">
                            <?
                            $db_price = new db_query("SELECT pri_price FROM price WHERE pri_id = 2");
                            $row_price = mysql_fetch_assoc($db_price->result);
                            ?>
                            <h2><?=format_number($row_price['pri_price'])?> Đ/</h2>
                            <p>Lượt đăng tin</p>
                            <div class="bg_vip2 pick_vip" usc_id="<?=$row4['usc_id']?>" chon_vip="3" pri_price="<?=$row_price['pri_price'];unset($row_price,$db_price);?>" goi_tin="GÓI TIN VIP 2">CHỌN</div>
                        </div>
                    </li>
                    <li class="data_vip_3">
                        <ul>
                            <li><i class="fa fa-times"></i>Đấu giá trên trang chủ</li>
                            <li><i class="fa fa-times"></i>Đấu giá trên danh mục</li>
                            <li class="dt_vip3"><i class="fa fa-check"></i>Đấu giá tin ưu tiên</li>
                            <li class="dt_vip3"><i class="fa fa-check"></i>Đăng tin vào khu vực rao vặt</li>
                        </ul>
                        <div class="dt_vip3">
                            <?
                            $db_price = new db_query("SELECT pri_price FROM price WHERE pri_id = 1");
                            $row_price = mysql_fetch_assoc($db_price->result);
                            ?>
                            <h2><?= format_number($row_price['pri_price'])?> Đ/</h2>
                            <p>Lượt đăng tin</p>
                            <div class="bg_vip3 pick_vip" usc_id="<?=$row4['usc_id']?>" chon_vip="4" pri_price="<?=$row_price['pri_price'];unset($row_price,$db_price);?>" goi_tin="GÓI TIN VIP 3">CHỌN</div>
                        </div>
                    </li> -->
                    <li class="data_vip_4">
                        <ul>
                            <li><i class="fa fa-times"></i>Đấu giá trên trang chủ</li>
                            <li><i class="fa fa-times"></i>Đấu giá trên danh mục</li>
                            <li><i class="fa fa-times"></i>Đấu giá tin ưu tiên</li>
                            <li class="dt_mienphi"><i class="fa fa-check"></i>Đăng tin vào khu vực rao vặt</li>
                        </ul>
                        <div class="dt_mienphi">
                            <h2>MIỄN PHÍ</h2>
                            <div class="bg_mienphi pick_vip" usc_id="<?=$row4['usc_id']?>" chon_vip="1" pri_price="0" goi_tin="GÓI TIN MIỄN PHÍ">CHỌN</div>
                        </div>
                    </li>
                </ul>
            </table>
<!--                                    <div class="pick_vip" chon_vip="1"></div>
            <div class="pick_vip" chon_vip="2">Đăng vip 1</div>
            <div class="pick_vip" chon_vip="3">Đăng vip 2</div>
            <div class="pick_vip" chon_vip="4">Đăng vip 3</div>-->
        </div>
        <div style="margin-top: 10px;"></div>
    </div>
</div>

<div class="thongbao_thatbai div_nangcap">
     <div class="popup_thatbai">
         <span>THÔNG BÁO</span>
         <i class="fa fa-times close_btn"></i>
         <div class="clear"></div>
         <div class="popup_dangtin_main"> 
             <h3><span>TÀI KHOẢN CỦA BẠN KHÔNG ĐỦ ĐỂ CHỌN GÓI VIP TRÊN</span></h3>
             <h3><span>Bại vui lòng nạp thêm tiền vào tài khoản để tiếp tục nâng cấp tin</span></h3>
             <div class="show_sotien">Số tiền hiện tại của bạn là: <?= number_format($row4['usc_money'],'0',',','.')?> Đ</div>
             <div class="div_btn_thongbao">
                 <a class="btn_naptien" href="/nap-tien/nap-tien" title="Nạp tiền vào tài khoản">NẠP TIỀN</a>
                 <div class="btn_thoat">THOÁT</div>
             </div>
         </div>
     </div>  
 </div>
<script>
    $('.click_li_vip').click(function (){
        var vip = $(this).attr('data_vip');
       $(".popup_dangtin_main li").removeClass('active');
       $(".data_vip_"+vip).addClass('active');
    });
</script>