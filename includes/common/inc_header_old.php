<?php
if(isset($css_new) && $css_new == true){
    echo '
        <link rel="preload" href="/css/restyle.css" as="style">
        <link rel="preload" href="/css/home/header.css?v='.$version.'" as="style">
        <link rel="preload" href="/css/'.$link.'.css" as="style">        
        <link rel="stylesheet" href="/css/restyle.css" type="text/css">
        <link href ="/css/home/header.css?v='.$version.'" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="/css/'.$link.'.css" type="text/css">';
}else{
    echo '<link rel="preload" href="/css/style.min.css?v='.$version.'" as="style">
            <link href ="/css/style.min.css?v='.$version.'" rel="stylesheet" type="text/css"/>';
}
?>
<?
$dk_ok = 0;
if(isset($_COOKIE['dk_ok'])){
    $dk_ok    = $_COOKIE['dk_ok'];
}
if(isset($_COOKIE['UID']))
{
    $userid   = $_COOKIE['UID'];
    $userpass = $_COOKIE['PHPSESPASS'];
    $usertype = $_COOKIE['UT'];

    $db_qr4    = new db_query("
SELECT * FROM user WHERE usc_id = ".$userid." AND usc_pass  = '".$userpass."'");
    $login = mysql_num_rows($db_qr4->result);
    if($login > 0){
        $row4 = mysql_fetch_assoc($db_qr4->result);
    }

}
if($dk_ok ==1)
{
    ?>
    <div class="thongbao_lammoi popup_dt_thanhcong dk_thanhcong">
        <div class="popup_delete">
            <span>ĐĂNG KÝ THÀNH CÔNG</span>
            <div class="clear"></div>
            <div class="popup_dangtin_main">
                <h3>
                    <span>Chào mừng bạn đã đến với Raonhanh365</span><br/>
                    <span>Nhấn <a>OK</a> đề vào trang quản lý tài khoản</span>
                </h3>
                <div class="div_btn_thongbao">
                    <div class="btn_lammoi" style="margin-left: 200px;"><a href="/ca-nhan/cap-nhap-thong-tin">OK</a></div>
                    <div class="btn_thoat"><a href="javascript:;">THOÁT</a></div>
                </div>
            </div>
        </div>
    </div>
<? }
setcookie('dk_ok', 1 ,time() - 3600,'/');
?>
<header>
    <div class="top_header">
        <div class="container">
            <span class="time_header"><?= getday() ?> Ngày <?= date("d/m/Y",time()) ?></span>

            <a class="rv_new">Rao vặt mới <i>10</i></a>
            <div class="box_thong_bao box_show_new">
                <span>Danh sách tin mới đăng</span>
                <ul>

                    <?
                    $db_box_tb2  = new db_query("SELECT new_id,new_title FROM new WHERE new_active = 1 AND new_type in(1,2,3,4) ORDER BY  new_id DESC LIMIT 10");
                    While($row_box_tb2 = mysql_fetch_assoc($db_box_tb2->result))
                    {

                        ?>
                        <li>
                            <a class="item_thong_bao"  href="<?=rewriteNews($row_box_tb2['new_id'],$row_box_tb2['new_title']) ?>" >
                                <?= $row_box_tb2['new_title']?>
                            </a>
                        </li>
                        <?
                    }
                    unset($row_box_tb2,$db_box_tb2);
                    ?>
                </ul>
                <div class="btn_xemtiep"></div>

            </div>
            <!--div thong báo end-->
            <?
            if(empty($row4)){?>
                <a class="social btn_login_2"><i></i><span>ĐĂNG TIN MIỄN PHÍ</span></a>
            <?}else{
                if($row4['usc_type']==5){?>
                    <a class="social" href="/doanh-nghiep/dang-san-pham"><i></i><span>ĐĂNG TIN MIỄN PHÍ</span></a>
                    <?
                }else{ ?>
                    <a class="social" href="/ca-nhan/dang_tin_rao_vat"><i></i><span id="social_mobile">ĐĂNG TIN MIỄN PHÍ</span></a>
                    <?
                }
            }
            ?>
            <span class="hotline">Hỗ trợ trực tuyến</span>
            <div class="box_hotline">
                <span>HOTLINE</span>
                <div class="hotline_1">
                    <div class="hotline_logo"></div>
                    <div class="hotline_sdt">1900633682</div>
                </div>
            </div>
            <?
            $row_count_cm = 0;
            if(isset($row4)){
                $count_cm = new db_query("SELECT COUNT(eva_id) FROM evaluate WHERE eva_active = 0 AND eva_show_usc = ".$row4['usc_id']);
                $row_count_cm = mysql_fetch_assoc($count_cm->result);
                $row_count_cm = $row_count_cm['COUNT(eva_id)'];
            }
            ?>
            <span class="notifice"><?if($row_count_cm > 0){?><span class="count_cm"><?=$row_count_cm?></span><?}?><span class="hidden_mobi">Thông báo</span></span>
            <div class="box_thong_bao box_show_commen">
                <span>THÔNG BÁO</span>
                <ul>
                    <?
                    if(isset($row4))
                    {
                        $db_box_tb2  = new db_query("SELECT eva_id,evaluate.new_id,eva_comment_time,eva_comment,eva_active,new.new_title FROM evaluate LEFT JOIN new ON evaluate.new_id = new.new_id WHERE eva_show_usc = ".$row4['usc_id']." ORDER BY  eva_active ASC,eva_comment_time DESC LIMIT 7");
                        While($row_box_tb2 = mysql_fetch_assoc($db_box_tb2->result))
                        {
                            $class="noactive";
                            if($row_box_tb2['eva_active']==1)
                            {
                                $class="liactive";
                            }
                            ?>
                            <li>
                                <a class="item_thong_bao <?=$class?>"  href="<?=rewriteNews($row_box_tb2['new_id'],$row_box_tb2['new_title']) ?>" eva_id ="<? echo $row_box_tb2['eva_id']?>" >
                                    <span><?= date("d/m/Y",time($row_box_tb2['eva_comment_time']))?></span> <?= $row_box_tb2['eva_comment']?>
                                </a>
                            </li>
                            <?
                        }
                        unset($row_box_tb2,$class,$db_box_tb2);
                    }
                    ?>
                </ul>
                <div class="btn_xemtiep"></div>
            </div>
            <?
            if(empty($row4['usc_id'])){
                ?>
                <a href="/doanh-nghiep/dang-ky-tai-khoan-doanh-nghiep" class="reg_gianhang">Đăng ký mở gian hàng tại Raonhanh365</a>
            <?}else{
                if($row4['usc_type']==5){?>
                    <a href="<?= rewrite_home_dn($row4['usc_id'],$row4['usc_store_name']) ?> " title="Gian hang <?= $row4['usc_store_name'] ?>" class="giaodien_gianhang">Quản lý giao diện trang gian hàng</a>
                    <?
                }else{
                    $db_new =  new db_query("SELECT COUNT(new_id) FROM new WHERE new_user_id = ".$row4['usc_id']);
                    $row_new   = mysql_fetch_assoc($db_new->result);
                    $nangcap_out = "";
                    ?>
                    <a <? if($row_new['COUNT(new_id)'] < 3){$nangcap_out = 'nangcap_out';}else{echo "href='/ca-nhan/nang-cap'";}?> class="nangcap_gianhang <?=$nangcap_out?>">Nâng cấp tài khoản lên gian hàng</a>
                    <?
                }
            }
            ?>
            <div class="box_nangcap">
                <div class="popup_nangcap">
                    <span>THÔNG BÁO</span>
                    <i class="close_btn"></i>
                    <div class="clear"></div>
                    <div class="popup_nangcap_main">
                        <span>Số lượng bài đăng của bạn quá it.</span><br/>
                        <span>Vui lòng đăng nhiều hơn 3 tin để được nâng cấp.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="fix_box_dangtin">
        <?
        if(empty($row4)){
            $href = "class='click_login_nav'";
        }else{
            if($row4['usc_type']==5){
                $href = "href='/doanh-nghiep/dang-san-pham'";
            }else{
                $href = "href='/ca-nhan/dang_tin_rao_vat'";
            }
        }
        $userinfourl=$_SERVER['REQUEST_URI'];
        if($userinfourl=='/'){
            $nofollw="dofollow";
        }else{
            $nofollw="nofollow";
        }
        ?>
        <a <?=$href?> >
          <span class="nav_menu_btn_dt">
              <p id="nav_dangtin_mobile">ĐĂNG TIN RAO VẶT MIỄN PHÍ</p>
          </span>
        </a>
        <!-- <div>
            <a target="_blank" href="/" rel="<?=$nofollw?>" title="">
                <span class="nav_menu_btn_dt nav_menu_btn_dt_timviec">
                    ĐĂNG TIN TUYỂN DỤNG,<p>TÌM VIỆC LÀM MIỄN PHÍ</p>
                </span>
            </a>
        </div> -->
    </div>
    <div class="bot_header">
        <div class="container">
            <div class="hd1">
                <div class="nav_mobile">
                    <div></div>
                </div>
                <div class="logo">
                    <a href="/" title="Chợ mua bán, quảng cáo, rao vặt miễn phí"><img src="/images/loading.gif" class = "lazyload" data-src="/images/logo.png" alt="Chợ mua bán, quảng cáo, rao vặt miễn phí" /></a>
                </div>
                <div class="nav_login_mobile"></div>
                <div class="box_search">
                    <div class="s1">
                        <form action="/home/quicksearch_2.php" method="POST">
                            <?
                            $tit_sp  = getValue("sp","str","GET","");
                            $tit_sp   = replaceMQ($tit_sp);
                            $tit_sp   = strip_tags($tit_sp);
                            $tit_sp   = str_replace("-"," ",$tit_sp);
                            $tit_sp = trim($tit_sp);
                            ?>
                            <input type="text" class="s11" value="<?=$tit_sp?>" placeholder="Tìm kiếm sản phẩm ..." name="new_name"/>
                            <div class="s12">
                                <select id="select_city_header" name="name_city">
                                    <option value="0">Toàn quốc</option>
                                    <?
                                    foreach($arrcity as $item=>$type)
                                    {
                                        ?>
                                        <option <?= isset($citid)?($citid == $type['cit_id']?"selected":""):"" ?> value="<?= $type['cit_id'] ?>"><?= $type['cit_name'] ?></option>
                                        <?
                                    }unset($item,$type);
                                    ?>
                                </select>
                            </div>
                            <div class="s13">
                                <select id="select_cate_header" name="name_cate">
                                    <option value="0">Chọn danh mục</option>
                                    <?
                                    foreach($db_cat as $item=>$type)
                                    {
                                        ?>
                                        <option <?= isset($catid)?($catid == $type['cat_id']?"selected":""):"" ?> value="<?= $type['cat_id'] ?>"><?= $type['cat_name'] ?></option>
                                        <?
                                    }unset($item,$type);
                                    ?>
                                </select>
                            </div>
                            <input type="submit" class="btn_timkiem" value="TÌM KIẾM" />
                        </form>
                    </div>
                    <div class="s2">
                        <ul class="hot_tag">
                            <li><a href="/s/g63.html" title="G63">G63  | </a></li>
                            <li><a href="/s/iphone-12-promax.html" title="Iphone 13 Promax">Iphone 13 Promax  | </a></li>
                            <li><a href="/s/xe-vision.html" title="xe vision">xe vision  | </a></li>
                            <li><a href="/s/samsung-note-10.html" title="samsung note 10">samsung note 10  | </a></li>
                            <li><a href="/s/máy-in.html" title="máy in">máy in  | </a></li>
                            <li><a href="/s/dell-inspiron.html" title="dell inspiron">dell inspiron  | </a></li>
                            <li><a href="/s/nhà-đất.html" title="nhà đất">nhà đất ...</a></li>
                        </ul>
                    </div>
                </div>
                <?
                if(!empty($row4)){
                    if( $row4['usc_authentic'] == 1){
                        ?>
                        <div class="box_logout">
                            <div class="box_user">
                                <img src="/images/loading.gif" class = "lazyload"  data-src="<?=($row4['usc_logo']!= '')?str_replace('../pictures', '/pictures', $row4['usc_logo']):'/images/detai-avata.png';?>" alt="<?=$row4['usc_name']?>" <?=$row4['usc_name']?>/>
                                <div class="box_user_main">
                                    <h4><?=$row4['usc_name']?></h4>
                                    <i>Ngày tham gia: <?= date('d-m-Y',$row4['usc_time'])?></i>
                                    <p>
                                        Tài khoản: <span> <?= number_format($row4['usc_money'],'0',',','.')?> VNĐ</span>
                                    </p>
                                </div>
                            </div>
                            <div class="box_user_out box_user_out_1">
                                <span>TÙY CHỈNH</span>
                                <ul>
                                    <li>
                                        <?
                                        if($row4['usc_type'] == 5){ ?>
                                            <a href="/doanh-nghiep/tong-quan-tai-khoai">Quản lý gian hàng</a>
                                        <? }else{?>
                                            <a href="/ca-nhan/cap-nhap-thong-tin">Quản lý tài khoản</a>
                                        <?}?>
                                    </li>
                                    <?if($row4['usc_type'] == 5){?>
                                        <li><a href="<?= rewrite_home_dn($row4['usc_id'],$row4['usc_store_name']) ?> " title="Gian hang <?= $row4['usc_store_name'] ?>">Quản lý giao diện</a></li>
                                    <?} else {?>
                                        <li style="display: none;"></li>
                                    <?}?>
                                    <li>
                                        <?
                                        if($row4['usc_type'] == 5){ ?>
                                            <a href="/doanh-nghiep/dang-san-pham">Đăng sản phẩm</a>
                                        <? }else{?>
                                            <a href="/ca-nhan/dang_tin_rao_vat">Đăng tin rao vặt</a>
                                        <?}?>
                                    </li>
                                    <li><a href="/nap-tien/nap-tien">Nạp tiền vào tài khoản</a></li>
                                    <li><a href="/tai-khoan/doi-mat-khau">Đổi mật khẩu</a></li>
                                    <?if($row4['usc_type'] == 1){?>
                                        <li><a <? if($row_new['COUNT(new_id)'] < 3){$nangcap_out = 'nangcap_out';}else{echo "href='/ca-nhan/nang-cap'";}?> class="<?=$nangcap_out?>">Nâng cấp tài khoản</a></li>
                                    <?} ?>
                                </ul>
                                <div class="btn_logout"><a href="/home/dangxuat.php">Đăng xuất</a></div>
                            </div>
                        </div>
                        <?
                    }
                    //Nếu tài khoản chưa xác thực
                    else if($row4['usc_authentic'] == 0)
                    {
                        if(!isset($xt)) redirect('/xac-thuc-tai-khoan.html');
                        ?>
                        <div class="box_logout">
                            <div class="box_user">
                                <img src="/images/loading.gif" class = "lazyload" data-src="<?=($row4['usc_logo']!= '')?str_replace('../pictures', '/pictures', $row4['usc_logo']):'/images/detai-avata.png';?>" alt="<?=$row4['usc_name']?>" <?=$row4['usc_name']?>/>
                                <div id="box_user_xn" class="box_user_main">
                                    <h4><?=$row4['usc_name']?></h4>
                                    <i>Ngày tham gia: <?= date('d-m-Y',$row4['usc_time'])?></i>
                                    <p>
                                        Tài khoản: <span> <?= number_format($row4['usc_money'],'0',',','.')?> VNĐ</span>
                                    </p>
                                    <div id="btn_logout_xn" class="btn_logout"><a href="/home/dangxuat.php">Đăng xuất</a></div>
                                </div>
                            </div>
                        </div>
                        <?
                    }
                }
                else {
                    ?>
                    <div class="box_login">
                        <div class="lg1">
                            <div class="logo_lg">
                                <img src="/images/loading.gif" class = "lazyload" data-src="/images/logo_lg.png" alt="Tài khoản" />
                            </div>
                            <div class="text_lg">
                                <span>Tài khoản: <i>Guest</i></span>
                                <p>Đăng ký tài khoản RaoNhanh365 để sử dụng đầy đủ các chức năng</p>
                            </div>
                        </div>
                        <div class="lg2">
                            <span class="btn_login"><i class="ic_lg"></i>ĐĂNG NHẬP</span>
                            <span class="btn_register"><i class="ic_lg"></i>ĐĂNG KÝ</span>
                            <div class="box_login_con">
                                <form id="loginForm_1" method="POST" action="/home/dangnhap.php" enctype="multipart/form-data" onsubmit="return checklogin();">
                                    <h5>ĐĂNG NHẬP TÀI KHOẢN</h5>
                                    <div class="main_login">
                                        <div class="p_username">
                                            <i><img src="/images/loading.gif" class = "lazyload" data-src="/images/ic_us.png"></i>
                                            <input type="text" class="input_acc" placeholder="Tên đăng nhập / email" id="user" name="user" value=""/>
                                        </div>
                                        <div class="clear"></div>
                                        <div class="p_password">
                                            <i><img src="/images/loading.gif" class = "lazyload" data-src="/images/ic_pass.png"></i>
                                            <input type="password" class="input_pass" placeholder="Mật khẩu" id="Password5" name="Password5" value=""/>
                                        </div>
                                        <div class="save_login check_cb">
                                            <label class="btn_register_2">Đăng ký tài khoản</label>
                                            <a href="/quen-mat-khau.html" title="Quên mật khẩu" rel="nofollow">Quên mật khẩu?</a>
                                        </div>
                                        <div class="btn_sub_login">
                                            <input type="submit" id="signin_submit" value="Đăng nhập" tabindex="6"/>
                                        </div>
                                        <!-- <a href="https://www.facebook.com/dialog/oauth?client_id=490184768038686&redirect_uri=https://raonhanh365.vn/home/callback.php&scope=email,user_birthday" rel="nofollow" class="btn_social_facebook">
                                            Đăng nhập bằng tài khoản Facebook
                                        </a>
                                        <a href="https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=https://raonhanh365.vn/home/callback_google.php&client_id=322341252564-acgevfs138crih9gpvik2m0fmt6j1cd7.apps.googleusercontent.com&scope=profile+email&access_type=online&approval_prompt=auto" rel="nofollow" class="btn_social_google">
                                            Đăng nhập bằng tài khoản Google+
                                        </a> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <?  } ?>
            </div>

            <div class="head_nav">
                <div class="head_nav_a hidden">
                    <div class="nav_menu">
                        <div class="nav_menu_logo"><a href="/" title="Chợ mua bán, quảng cáo, rao vặt miễn phí"></a></div>
                        <form action="/home/quicksearch.php" method="POST">
                            <div class="nav_menu_main">
                                <input class="nav_menu_loc" placeholder="Tìm kiếm sản phẩm" value="<?=$tit_sp?>" name="new_name">
                                <div class="nav_menu_city">
                                    <select id="nav_menu_city_s" name="name_city">
                                        <option value="0">Toàn quốc</option>
                                        <?
                                        foreach($arrcity as $item=>$type)
                                        {
                                            ?>
                                            <option <?= isset($citid)?($citid == $type['cit_id']?"selected":""):"" ?> value="<?= $type['cit_id'] ?>"><?= $type['cit_name'] ?></option>
                                            <?
                                        }
                                        unset($db_city,$rowcit);
                                        ?>
                                    </select>
                                </div>
                                <div class="nav_menu_cate s13">
                                    <select id="nav_menu_cate_s" name="name_cate">
                                        <option value="0">Chọn danh mục</option>
                                        <?
                                        foreach($db_cat as $item=>$type)
                                        {
                                            ?>
                                            <option <?= isset($catid)?($catid == $type['cat_id']?"selected":""):"" ?> value="<?= $type['cat_id'] ?>"><?= $type['cat_name'] ?></option>
                                            <?
                                        }unset($item,$type);
                                        ?>
                                    </select>
                                </div>
                                <input value="TÌM KIẾM" type="submit" class="nav_menu_btn">
                            </div>
                        </form>

                        <span class="nav_menu_btn_gh">
                          <?
                          if(empty($row4)){?>
                              <a href="/doanh-nghiep/dang-ky-tai-khoan-doanh-nghiep">MỞ GIAN HÀNG</a>
                          <?}else{
                              if($row4['usc_type']==5){?>
                                  <a href="<?= rewrite_home_dn($row4['usc_id'],$row4['usc_store_name']) ?> " title="Gian hang <?= $row4['usc_store_name'] ?>">VÀO GIAN HÀNG</a>
                                  <?
                              }else{ ?>
                                  <a <? if($row_new['COUNT(new_id)'] < 3){$nangcap_out = 'nangcap_out';}else{echo "href='/ca-nhan/nang-cap'";}?> class="<?=$nangcap_out?>">MỞ GIAN HÀNG</a>
                                  <?
                              }
                          }unset($nangcap_out,$row_new,$db_new);
                          ?>
                      </span>
                        <div class="nav_menu_btn_user <?=(empty($row4['usc_id']))?'click_show_login':'click_show_logout'?>">
                            <img width="37" height="37" style="margin: 3px 10px 0 7px;float: left;" src="/images/loading.gif" class = "lazyload" data-src="<?=(!empty($row4))?(($row4['usc_logo']!="")?str_replace('../pictures', '/pictures', $row4['usc_logo']):'/images/ava_default.png'):'/images/icon_user.png'; ?>">
                            <?
                            if(empty($row4)){?>
                                <span class="btn_login_nav"><i class="ic_lg"></i>ĐĂNG NHẬP</span>
                            <?}else{?>
                                <span class="btn_show_logout"><?=$row4['usc_name']?></span>
                                <p>
                                    Số dư: <span> <?= number_format($row4['usc_money'],'0',',','.')?> VNĐ</span>
                                </p>
                            <?}?>
                            <div class="box_user_out box_user_out_2">
                                <span>TÙY CHỈNH</span>
                                <ul>
                                    <li>
                                        <?
                                        if($row4['usc_type'] == 5){ ?>
                                            <a href="/doanh-nghiep/tong-quan-tai-khoai">Quản lý gian hàng</a>
                                        <? }else{?>
                                            <a href="/ca-nhan/cap-nhap-thong-tin">Quản lý tài khoản</a>
                                        <?}?>
                                    </li>
                                    <?if($row4['usc_type'] == 5){?>
                                        <li><a href="<?= rewrite_home_dn($row4['usc_id'],$row4['usc_store_name']) ?> " title="Gian hang <?= $row4['usc_store_name'] ?>">Quản lý giao diện</a></li>
                                    <?} else {?>
                                        <li style="display: none;"></li>
                                    <?}?>
                                    <li>
                                        <?
                                        if($row4['usc_type'] == 5){ ?>
                                            <a href="/doanh-nghiep/dang-san-pham">Đăng sản phẩm</a>
                                        <? }else{?>
                                            <a href="/ca-nhan/dang_tin_rao_vat">Đăng tin rao vặt</a>
                                        <?}?>
                                    </li>
                                    <li><a href="/nap-tien/nap-tien">Nạp tiền vào tài khoản</a></li>
                                    <li><a href="/tai-khoan/doi-mat-khau">Đổi mật khẩu</a></li>
                                    <?if($row4['usc_type'] == 1){?>
                                        <li><a href="/ca-nhan/nang-cap">Nâng cấp tài khoản</a></li>
                                    <?}?>
                                </ul>
                                <div class="btn_logout"><a href="/home/dangxuat.php">Đăng xuất</a></div>
                            </div>
                        </div>
                        <div class="box_login_con_2">
                            <form id="loginForm_2" method="POST" action="/home/dangnhap.php" enctype="multipart/form-data" onsubmit="return checkloginnav();">
                                <h5>ĐĂNG NHẬP TÀI KHOẢN</h5>
                                <div class="main_login">
                                    <div class="p_username">
                                        <i><img src="/images/loading.gif" class = "lazyload" data-src="/images/ic_us.png"></i>
                                        <input type="text" class="input_acc" placeholder="Tên đăng nhập" id="user_2" name="user" value=""/>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="p_password">
                                        <i><img src="/images/loading.gif" class = "lazyload" data-src="/images/ic_pass.png"></i>
                                        <input type="password" class="input_pass" placeholder="Mật khẩu" id="Password5_2" name="Password5" value=""/>
                                    </div>
                                    <div class="save_login check_cb">
                                        <label class="btn_register_2">Đăng ký tài khoản</label>
                                        <a href="#" title="Quên mật khẩu" rel="nofollow">Quên mật khẩu?</a>
                                    </div>
                                    <div class="btn_sub_login">
                                        <input type="submit" id="submit_nav" value="Đăng nhập" tabindex="6"/>
                                    </div>
                                    <!-- a rel="nofollow" href="https://www.facebook.com/dialog/oauth?client_id=490184768038686&redirect_uri=https://raonhanh365.vn/home/callback.php&scope=email,user_birthday" rel="nofollow" class="btn_social_facebook">
                                        Đăng nhập bằng tài khoản Facebook
                                    </a> -->
                                    <!--  <a rel="nofollow" href="https://accounts.google.com/o/oauth2/auth?response_type=code&redirect_uri=https://raonhanh365.vn/home/callback_google.php&client_id=322341252564-acgevfs138crih9gpvik2m0fmt6j1cd7.apps.googleusercontent.com&scope=profile+email&access_type=online&approval_prompt=auto" rel="nofollow" class="btn_social_google">
                                         Đăng nhập bằng tài khoản Google+
                                     </a> -->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="hd2">
                <div class="menu">
                    <span class="menu_text">DANH MỤC SẢN PHẨM <i class="arrow"></i></span>
                    <ul class="ulmenu">
                        <?
                        foreach($db_cat as $item => $type)
                        {
                            if($type['cat_parent_id'] == 0)
                            {
                                ?>
                                <li class="">
                                    <a href="<?= rewrite_cate($type['cat_id'],$type['cat_name']) ?>" title="<?= $type['cat_name'] ?>"><img src="/images/loading.gif" class = "lazyload" data-src="<?= $type['cat_img1'] ?>"/><?= $type['cat_name'] ?>
                                    </a>
                                    <div class="icon_next"><img src="/images/loading.gif" class = "lazyload" data-src="/images/icon_next.png"/></div>
                                    <ul class="submenu">
                                        <?
                                        foreach($db_cat as $item2 => $type2)
                                        {
                                            if($type2['cat_parent_id'] == $type['cat_id'])
                                            {
                                                ?>
                                                <li><a href="<?= rewrite_cate($type2['cat_id'],$type2['cat_name']) ?>" title="<?= $type2['cat_name'] ?>"><?=$type2['cat_name']?></a></li>
                                                <?
                                            }
                                        }
                                        unset($item2,$type2);
                                        ?>
                                    </ul>
                                </li>
                                <?
                            }
                        }
                        unset($item,$type);
                        ?>
                        <!-- <li style="background:none"><a href="https://raonhanh365.vn/viec-lam.html">Việc làm</a></li> -->
                    </ul>
                </div>

                <a href="/viec-lam.html" class="mm_top" title="Việc làm">Việc làm</a>
                <a href="/tin-tuc" class="mm_top" title="Tin tức">Tin tức</a>
                <!-- <a href="#" class="mm_top" title="Khuyến mại">Khuyến mại<i class="arrow_den"></i></a> -->
                <a href="/huong-dan" class="mm_top" title="Hướng dẫn">Hướng dẫn</a>
                <a href="#" class="mm_top" title="Sản phẩm nổi bật">Sản phẩm nổi bật</a>
                <a href="/lien-he" class="mm_top" title="Liên hệ">Liên hệ</a>
                <div class="right_hd">
                    <span class="new_view">Tin đã xem</span>
                    <span class="new_like">Tin yêu thích</span>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="overlay">
    <div class="popup_register">
        <span>ĐĂNG KÝ TÀI KHOẢN CÁ NHÂN</span>
        <i class="close_btn"></i>
        <div class="main_register">
            <form  method="POST" action="/home/dangky.php" onsubmit="return false;">
                <div class="form_control">
                    <div class="control1"><i class="sao">*</i>Email:</div>
                    <div class="control2"><input type="text" placeholder="Nhập email"  id="Email" name="Email" value=""/></div>
                </div>
                <div class="form_control">
                    <div class="control1"><i class="sao">*</i>Mật khẩu:</div>
                    <div class="control2"><input placeholder="**********" maxlength="16" id="password" name="password" type="password" /></div>
                </div>
                <div class="form_control">
                    <div class="control1"><i class="sao">*</i>Nhập lại mật khẩu:</div>
                    <div class="control2"><input placeholder="**********" maxlength="16"  id="repassword" name="repassword" type="password"/></div>
                </div>
                <div class="form_control">
                    <div class="control1"><i class="sao">*</i>Họ và tên:</div>
                    <div class="control2"><input type="text" placeholder="Nhập họ tên" maxlength="20"  id="Hoten" name="Hoten" value=""/></div>
                </div>
                <div class="form_control">
                    <div class="control1">Giới tính:</div>
                    <div class="control2">
                        <select id="gender" name="gender">
                            <option value="2">Giới tính</option>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="form_control">
                    <div class="control1">Ngày sinh:</div>
                    <div class="control2">
                        <select id="slngay" name="slngay">
                            <option value='00'>Ngày</option>
                            <? $i=1; while($i<=31){
                                echo "<option value='$i'>$i</option>";
                                $i++;}?>
                        </select>
                        <select id="slthang" name="slthang">
                            <option value='00'>Tháng</option>
                            <? $j=1; while($j<=12){
                                echo "<option value='$j'>$j</option>";
                                $j++;}?>
                        </select>
                        <select id="slnam" name="slnam">
                            <option value='0000'>Năm</option>
                            <? $h= date("Y"); while($h>=1912){
                                echo "<option value='$h'>$h</option>";
                                $h--;}?>
                        </select>
                    </div>
                </div>
                <div class="form_control">
                    <div class="control1"><i class="sao">*</i>Số điện thoại:</div>
                    <div class="control2"><input class="numbersOnly2" type="text" placeholder="Nhập số điện thoại" id="Phone"name="Phone" value=""/></div>
                </div>
                <div class="form_control">
                    <div class="control1"><i class="sao">*</i>Khu vực:</div>
                    <div class="control2">
                        <select id="city" name="city">
                            <option value="0">Chọn thành phố</option>
                            <?
                            foreach ($arrcity as $key => $value_ci) {
                                echo "<option value='".$value_ci['cit_id']."'>".$value_ci['cit_name']."</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form_control">
                    <div class="control1"><i class="sao">*</i>Địa chỉ liên hệ:</div>
                    <div class="control2"><input type="text" placeholder="Nhập địa chỉ" id="address" name="address" value=""/></div>
                </div>
                <div class="form_control">
                    <div class="control1"><i class="sao">*</i>Mã xác nhận:</div>
                    <div class="control2" style="position: relative;">
                        <div id="div_captcha">
                            <input type="text" class="bnmxn" id="captcha" name="captcha"/>
                            <p class="captcha">
                                <img src="/images/loading.gif" class = "lazyload" data-src="/classes/securitycode.php"/>
                            <p href="javascript:;" onclick="reloadSecurityCode(this)" class="reset-icon"></p>
                            </p>
                        </div>
                    </div>
                </div>
                <input type="submit" onclick="checkpostdt();" class="btn_dangky" value="Đăng ký" name="postok"/>
            </form>
        </div>
    </div>

</div>

