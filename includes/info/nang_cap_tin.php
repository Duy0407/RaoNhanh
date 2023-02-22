<!--nang cap tin tu mien phi-->

    <?
        $db_vip3 = new db_query("SELECT pri_price FROM price WHERE pri_id = 1");
        $row_vip3 = mysql_fetch_assoc($db_vip3->result);
        $vip_3 = $row_vip3['pri_price'];
        
        $db_vip2 = new db_query("SELECT pri_price FROM price WHERE pri_id = 2");
        $row_vip2 = mysql_fetch_assoc($db_vip2->result);
        $vip_2 = $row_vip2['pri_price'];
        
        $db_vip1 = new db_query("SELECT pri_price FROM price WHERE pri_id = 3");
        $row_vip1 = mysql_fetch_assoc($db_vip1->result);
        $vip_1= $row_vip1['pri_price'];
    ?>


<div class="nangcap_mienphi div_nangcap">
    <div class="popup_mienphi">
        <span>NÂNG CẤP TIN VIP</span>
        <i class="fa fa-times close_btn"></i>
        <div class="clear"></div>
        <div class="popup_dangtin_main">
            <table>
                <ul>
                    <li class="click_li_vip" data_vip ='1'><i></i>VIP 1</li>
                    <li class="click_li_vip" data_vip ='2'><i></i>VIP 2</li>
                    <li class="click_li_vip" data_vip ='3'><i></i>VIP 3</li>
                </ul>
                <ul>

                    <li class="active data_vip_1">
                        <ul>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đấu giá trên trang chủ</li>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đấu giá trên danh mục</li>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đấu giá tin ưu tiên</li>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đăng tin vào khu vực rao vặt</li>
                        </ul>
                        <div class="dt_vip1">
                            <h2><?=format_number($vip_1);?>Đ/</h2>
                            <p>Lượt nâng cấp</p>
                            <div class="bg_vip1 pick_vip" usc_id="<?=$row4['usc_id']?>" pri_price="<?=$vip_1?>" chon_vip="2" goi_tin="ĐĂNG TIN VIP 1">CHỌN</div>
                        </div>
                    </li>
                    <li class="data_vip_2">
                        <ul>
                            <li><i class="fa fa-times"></i>Đấu giá trên trang chủ</li>
                            <li class="dt_vip2"><i class="fa fa-check"></i>Đấu giá trên danh mục</li>
                            <li class="dt_vip2"><i class="fa fa-check"></i>Đấu giá tin ưu tiên</li>
                            <li class="dt_vip2"><i class="fa fa-check"></i>Đăng tin vào khu vực rao vặt</li>
                        </ul>
                        <div class="dt_vip2">
                            <h2><?=format_number($vip_2)?>Đ/</h2>
                            <p>Lượt nâng cấp</p>
                            <div class="bg_vip2 pick_vip" usc_id="<?=$row4['usc_id']?>" chon_vip="3" pri_price="<?=$vip_2?>" goi_tin="ĐĂNG TIN VIP 2">CHỌN</div>
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
                            <h2><?= format_number($vip_3)?>Đ/</h2>
                            <p>Lượt nâng cấp</p>
                            <div class="bg_vip3 pick_vip" usc_id="<?=$row4['usc_id']?>" chon_vip="4" pri_price="<?=$vip_3?>" goi_tin="ĐĂNG TIN VIP 3">CHỌN</div>
                        </div>
                    </li>
                </ul>
            </table>
        </div>
    </div>  
</div>
<!--end-->
<div class="lam_moi div_nangcap">
    <div class="popup_mienphi">
        <span>LÀM MỚI TIN</span>
        <i class="fa fa-times close_btn"></i>
        <div class="clear"></div>
        <div class="popup_dangtin_main">
            <div class="choose">
                <input type="checkbox" class="checkboxRefresh refreshHome" value="1">
                <label for="">Trang chủ <b class="priceRefresh">(1.500đ)</b></label>
            </div>
            <div class="choose">
                <input type="checkbox" class="checkboxRefresh refreshCate" value="1">
                <label for="">Trang ngành nghề <b class="priceRefresh">(1.000đ)</b></label>
            </div>
            <div class="choose">
                <input type="checkbox" class="checkboxRefresh refreshCity" value="1">
                <label for="">Trang tỉnh thành <b class="priceRefresh">(500đ)</b></label>
            </div>
            <div class="choose">
                <input type="checkbox" class="checkboxRefresh refreshCateCity" value="1">
                <label for="">Trang ngành nghề tại tỉnh thành <b class="priceRefresh">(300đ)</b></label>
            </div>
            <div class="choose">
                <input type="checkbox" class="checkboxRefresh refreshFree" value="1">
                <label for=""><b class="priceRefresh">Miễn phí</b></label>
            </div>
            <div class="choose">
                <button class="activeRefresh" usc_id="<?=$row4['usc_id']?>" >Kích hoạt</button>
            </div>
        </div>
    </div>
</div>
<!--nang cap tin tu vip 3-->
<div class="nangcap_tinvip3 div_nangcap">
    <div class="popup_tinvip3">
        <span>NÂNG CẤP TIN VIP</span>
        <i class="fa fa-times close_btn"></i>
        <div class="clear"></div>
        <div class="popup_dangtin_main">
            <table>
                <ul>
                    <li class="click_li_vip" data_vip ='1'><i></i>VIP 1</li>
                    <li class="click_li_vip" data_vip ='2'><i></i>VIP 2</li>
                </ul>
                <ul>

                    <li class="active data_vip_1">
                        <ul>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đấu giá trên trang chủ</li>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đấu giá trên danh mục</li>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đấu giá tin ưu tiên</li>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đăng tin vào khu vực rao vặt</li>
                        </ul>
                        <div class="dt_vip1">
                            <h2><?=format_number($vip_1 - $vip_3);?>Đ/</h2>
                            <p>Lượt nâng cấp</p>
                            <div class="bg_vip1 pick_vip" usc_id="<?=$row4['usc_id']?>" pri_price="<?=($vip_1 - $vip_3)?>" chon_vip="2" goi_tin="ĐĂNG TIN VIP 1">CHỌN</div>
                        </div>
                    </li>
                    <li class="data_vip_2">
                        <ul>
                            <li><i class="fa fa-times"></i>Đấu giá trên trang chủ</li>
                            <li class="dt_vip2"><i class="fa fa-check"></i>Đấu giá trên danh mục</li>
                            <li class="dt_vip2"><i class="fa fa-check"></i>Đấu giá tin ưu tiên</li>
                            <li class="dt_vip2"><i class="fa fa-check"></i>Đăng tin vào khu vực rao vặt</li>
                        </ul>
                        <div class="dt_vip2">
                            <h2><?=format_number($vip_2 - $vip_3)?>Đ/</h2>
                            <p>Lượt nâng cấp</p>
                            <div class="bg_vip2 pick_vip" usc_id="<?=$row4['usc_id']?>" chon_vip="3" pri_price="<?=($vip_2 - $vip_3)?>" goi_tin="ĐĂNG TIN VIP 2">CHỌN</div>
                        </div>
                    </li>
                </ul>
            </table>
        </div>
    </div>  
</div>
<!--end-->

<!--nang cap tin tu vip 2 leen--> 
<div class="nangcap_tinvip2 div_nangcap">
    <div class="popup_tinvip2">
        <span>NÂNG CẤP TIN VIP</span>
        <i class="fa fa-times close_btn"></i>
        <div class="clear"></div>
        <div class="popup_dangtin_main">
            <table>
                <ul>
                    <li class="click_li_vip" data_vip ='1'><i></i>VIP 1</li>
                </ul>
                <ul>

                    <li class="active data_vip_1">
                        <ul>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đấu giá trên trang chủ</li>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đấu giá trên danh mục</li>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đấu giá tin ưu tiên</li>
                            <li class="dt_vip1"><i class="fa fa-check"></i>Đăng tin vào khu vực rao vặt</li>
                        </ul>
                        <div class="dt_vip1">
                            <h2><?=format_number($vip_1 - $vip_2);?>Đ/</h2>
                            <p>Lượt nâng cấp</p>
                            <div class="bg_vip1 pick_vip" usc_id="<?=$row4['usc_id']?>" pri_price="<?=($vip_1 - $vip_2);?>" chon_vip="2" goi_tin="ĐĂNG TIN VIP 1">CHỌN</div>
                        </div>
                    </li>
                </ul>
            </table>
        </div>
    </div>  
</div>
<!--end-->
<!--div thong bao thanh cong-->
<div class="thongbao_thanhcong div_nangcap">
    <div class="popup_thongbao">
        <span>NÂNG CẤP THÀNH CÔNG</span>
        <!--<i class="fa fa-times close_btn"></i>-->
        <div class="clear"></div>
        <div class="popup_dangtin_main"> 
            <h3>TÀI KHOẢN CỦA BẠN VỪA BỊ  </h3>
        </div>
    </div>  
</div>
<!--div thong bao làm mới thành công thanh cong-->
<div class="refreshSuccess div_nangcap">
    <div class="popup_thongbao">
        <span>LÀM MỚI TIN THÀNH CÔNG</span>
        <!--<i class="fa fa-times close_btn"></i>-->
        <div class="clear"></div>
        <div class="popup_dangtin_main">
            <h3>TÀI KHOẢN CỦA BẠN VỪA BỊ  </h3>
        </div>
    </div>
</div>
<!--end-->
<div class="thongbao_thatbai div_nangcap">
    <div class="popup_thatbai">
        <span>NÂNG CẤP THẤT BẠI</span>
        <i class="fa fa-times close_btn"></i>
        <div class="clear"></div>
        <div class="popup_dangtin_main"> 
            <h3><span>TÀI KHOẢN CỦA BẠN KHÔNG ĐỦ ĐỂ NÂNG CẤP GÓI VIP TRÊN</span></h3>
            <h3><span>Bại vui lòng nạp thêm tiền vào tài khoản để tiếp tục nâng cấp tin</span></h3>
            <div class="div_btn_thongbao">
                <a class="btn_naptien" href="/nap-tien/nap-tien" title="Nạp tiền vào tài khoản">NẠP TIỀN</a>
                <div class="btn_thoat">THOÁT</div>
            </div>
        </div>
    </div>  
</div>
<!--Tiền không đủ-->
<div class="refreshFail div_nangcap">
    <div class="popup_thatbai">
        <span>LÀM MỚI TIN THẤT BẠI</span>
        <i class="fa fa-times close_btn"></i>
        <div class="clear"></div>
        <div class="popup_dangtin_main">
            <h3><span class="titleRefresh">TÀI KHOẢN CỦA BẠN KHÔNG ĐỦ ĐỂ LÀM MỚI TIN</span></h3>
            <h3><span class="titleRefresh">Bại vui lòng nạp thêm tiền vào tài khoản để làm mới tin</span></h3>
            <div class="div_btn_thongbao">
                <a class="btn_naptien" href="/nap-tien/nap-tien" title="Nạp tiền vào tài khoản">NẠP TIỀN</a>
                <div class="btn_thoat">THOÁT</div>
            </div>
        </div>
    </div>
</div>
<!--Tiền không đủ-->
<!--end-->

<!--thong báo làm mới-->
<div class="thongbao_lammoi div_nangcap">
    <div class="popup_delete">
        <span>THÔNG BÁO</span>
        <i class="fa fa-times close_btn"></i>
        <div class="clear"></div>
        <div class="popup_dangtin_main"> 
            <h3><span>PHÍ LÀM MỚI : 500 (Đ)/LƯỢT</span></h3>
            <div class="div_btn_thongbao">
                <div class="btn_lammoi">LÀM MỚI</div>
                <div class="btn_thoat">THOÁT</div>
            </div>
        </div>
    </div>  
</div>
<!--lam mói end-->
<!--lam moi that bai-->
<div class="thongbao_lammoi_thatbai div_nangcap">
    <div class="popup_thatbai">
        <span>LÀM MỚI THẤT BẠI</span>
        <i class="fa fa-times close_btn"></i>
        <div class="clear"></div>
        <div class="popup_dangtin_main"> 
            <h3><span>TÀI KHOẢN CỦA BẠN KHÔNG ĐỦ ĐỂ LÀM MỚI TIN</span></h3>
            <h3><span>Bại vui lòng nạp thêm tiền vào tài khoản</span></h3>
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