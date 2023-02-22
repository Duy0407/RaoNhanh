<script type="text/javascript" src="/js/select2.min.js"></script>
<script src="/js/slickslider/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="/js/slickslider/slick.min.js" type="text/javascript"></script>
<script src="/js/lazysizes.min.js"></script>
<script type="text/javascript">
  $('#select_city,#select_cate,#select_price,#select_view,#select_cate_header,#select_city_header,#nav_menu_city_s,#nav_menu_cate_s').select2();
  $(document).ready(function(e) {
    $('.item_thong_bao').click(function() {
      var id_tb = $(this).attr('eva_id');
      var href = $(this).attr('href');
      $.ajax({
        type: "POST",
        url: "../ajax/box_thong_bao.php",
        data: {
          box_tb: id_tb,
          box_href: href
        },
        success: function(data) {}
      });

    });
  });
  $(document).ready(function() {
    $('.navbar-fostrap').click(function() {
      $('.nav-fostrap').toggleClass('visible');
      $('body').toggleClass('cover-bg');
    });
    $('.dk_thanhcong .btn_thoat').click(function() {
      $('.dk_thanhcong').addClass('hidden');
    });
    if ($(window).width() > 767) {
      $(window).bind("scroll", function(e) {
        var top = $(window).scrollTop();
        var $filter = $('.head_nav');
        if (top > 130) { //Khoảng cách đã đo được
          $(".fix_box_dangtin").addClass("fix_box_dt");
        } else {
          $(".fix_box_dangtin").removeClass("fix_box_dt");
        }
        if (top > 100) {
          $(".head_nav_a").addClass("fix");
          $(".head_nav_a").removeClass("hidden");
          $filter.addClass("active");
        } else {
          $(".head_nav_a").removeClass("fix");
          $(".head_nav_a").addClass("hidden");
          $filter.removeClass("active");
        }
      });
    } else {
      $(window).bind("scroll", function(e) {
        var top = $(window).scrollTop();
        if (top > 35) { //Khoảng cách đã đo được
          $(".fix_box_dangtin").addClass("fix_box_dt");
        } else {
          $(".fix_box_dangtin").removeClass("fix_box_dt");
        }
      });
      $('.nav_menu_btn_dt').click(function() {
        if ($(".box_login").hasClass('active')) {
          $('.box_login').removeClass('active');
        } else {
          $('.box_login').addClass('active');
          $('.box_login_con').addClass('active');
          $('html, body').animate({
            scrollTop: 0
          }, 500);
        }
      });
    }
  });
</script>
<footer>
  <div class="menu_footer">
    <div class="container">
      <ul>
        <li><a rel="nofollow" href="/co-che-hoat-dong-e1.html" title="Cơ chế hoạt động">CƠ CHẾ HOẠT ĐỘNG</a></li>
        <li><a rel="nofollow" href="/quy-dinh-chung-e2.html" title="Quy định chung">QUY ĐỊNH CHUNG</a></li>
        <li><a rel="nofollow" href="/quy-trinh-thanh-toan-e3.html" title="Quy trình thanh toán">QUY TRÌNH THANH TOÁN</a></li>
        <li><a rel="nofollow" href="/quy-trinh-giao-dich-e4.html" title="Quy trình giao dịch">QUY TRÌNH GIAO DỊCH</a></li>
        <li><a rel="nofollow" href="/chinh-sach-bao-mat-e5.html" title="Chính sách bảo mật">CHÍNH SÁCH BẢO MẬT</a></li>
        <li><a rel="nofollow" href="/giai-quyet-tranh-chap-e6.html" title="Giải quyết tranh chấp">GIẢI QUYẾT TRANH CHẤP</a></li>
      </ul>
    </div>
  </div>
  <div class="b_footer">
    <div class="container">
      <div class="top_footer">
        <?
        $db_qrc = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = 0 AND cat_type <> '' ORDER BY cat_type ASC LIMIT 5");
        while ($rowc = mysql_fetch_assoc($db_qrc->result)) {
        ?>
          <!-- <div class="item_mn">
               <a title="Tìm việc làm"><span>Tìm việc làm</span></a>
               <div class="main_mn">
                  <a target="_blank" href="https://timviec365.vn/tim-viec-lam.html#viec-lam-moi-nhat" rel="dofollow" title="Tìm việc làm mới nhất">Tìm việc làm mới nhất</a>
                  <a target="_blank" href="https://timviec365.vn/cv365/mau-cv-xin-viec-online#top-cv-xin-viec-online" rel="dofollow" title="Top CV Xin Việc Online">Top CV Xin Việc Online</a>
                  <a target="_blank" href="https://timviec365.vn" rel="dofollow" title="Tin tuyển dụng mới nhất">Timviec365.vn</a>
               </div>
            </div> -->
          <?
          // }
          // else
          // {
          ?>
          <div class="item_mn">
            <a href="<?= rewrite_cate($rowc['cat_id'], $rowc['cat_name']) ?>" title="<?= $rowc['cat_name'] ?>"><span><?= mb_strtoupper($rowc['cat_name'], 'UTF-8') ?></span></a>
            <div class="main_mn">
              <?
              $db_catcon = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = " . $rowc['cat_id'] . " LIMIT 3");
              while ($rowcon = mysql_fetch_assoc($db_catcon->result)) {
              ?>
                <a href="<?= rewrite_cate($rowcon['cat_id'], $rowcon['cat_name']) ?>" title="<?= $rowcon['cat_name'] ?>"><?= $rowcon['cat_name'] ?></a>
              <?
              }
              unset($db_catcon, $rowcon);
              ?>
            </div>
          </div>
        <?
          // }
          // $i++;
        }
        unset($db_qrc, $rowc);
        ?>
        <!-- <div class="item_mn">
          <a><span>Thông tin việc làm</span></a>
          <div class="main_mn">
            <a target="_blank" href="https://vnx.com.vn/" title="">Vnx.com.vn</a>
          </div>
        </div> -->
      </div>
      <span class="arr_footer"></span>
      <div class="bot_footer">
        <div class="col1">
          <!-- <div class="logo_ft">
                <a href="/" title="Chợ mua bán, quảng cáo, rao vặt miễn phí"><img src="/images/logo_footer.png" alt="Chợ mua bán, quảng cáo, rao vặt miễn phí"/></a>
              </div> -->
          <table border="0" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse;">
            <tr>
              <td style="">
                <table border="0" width="280" cellspacing="0" cellpadding="0" style="border-collapse:separate;background-color:#ffffff;border:1px solid #dddfe2;border-radius:3px;font-family:Helvetica, Arial, sans-serif;width: 100%">
                  <tr style="padding-bottom: 8px;">
                    <td style="">
                      <img class="img lazyload" style="width: 100%;" src="/images/loading.gif" data-src="https://scontent.fhan4-1.fna.fbcdn.net/v/t1.6435-9/102907519_932733947174454_5999736836864491611_n.jpg?_nc_cat=105&ccb=1-5&_nc_sid=8631f5&_nc_ohc=f8zfZJ-0OgcAX8ECv1N&_nc_ht=scontent.fhan4-1.fna&oh=00_AT9zpk-vqEt8kv-LkrlIvdCRRqW-lDmfQnM8vMK4mZerAw&oe=625C87EF" width="280" height="110" alt="" />
                    </td>
                  </tr>
                  <tr>
                    <td style="font-size:14px;font-weight:bold;padding:8px 8px 0px 8px;text-align:center;">CHỢ MUA BÁN RAO VẶT - RAONHANH365</td>
                  </tr>
                  <tr>
                    <td style="color:#90949c;font-size:12px;font-weight:normal;text-align:center;">Nhóm Riêng tư · 126.800 thành viên</td>
                  </tr>
                  <tr>
                    <td style="padding:8px 12px 12px 12px;">
                      <table border="0" cellspacing="0" cellpadding="0" style="border-collapse:collapse;width:100%;">
                        <tr>
                          <td style="background-color:#4267b2;border-radius:3px;text-align:center;">
                            <a style="color:#3b5998;text-decoration:none;cursor:pointer;width:100%;" href="https://www.facebook.com/plugins/group/join/popup/?group_id=544992575515172&amp;source=email_campaign_plugin" target="_blank" rel="nofollow">
                              <table border="0" cellspacing="0" cellpadding="3" align="center" style="border-collapse:collapse;width: 100%">
                                <tr>
                                  <td class="facebook">Tham gia nhóm</td>
                                </tr>
                              </table>
                            </a>
                          </td>
                        </tr>
                      </table>
                    </td>
                  </tr>
                </table>
              </td>
            </tr>
          </table>
          <span>LIÊN HỆ QUẢNG CÁO</span>
          <!-- ads@tinnhanh365.vn -->
          <p><img src="/images/loading.gif" class="lazyload" data-src="/images/ic_mail_ft.png" /><b>Email:</b> timviec365.vn@gmail.com</p>
          <p><img src="/images/loading.gif" class="lazyload" data-src="/images/ic_phone_ft.png" /><b>Hotline:</b> 1900633682</p>
        </div>
        <div class="col2">
          <p>ĐƠN VỊ QUẢN LÝ NỘI DUNG</p>
          <div><span class="trang congty"><b>Công ty Cổ phần Thanh toán Hưng Hà</b></span></div>
          <div><span class="trang diachi"><b>Địa chỉ văn phòng: </b>Tầng 2, Số 1 đường Trần Nguyên Đán, Khu Đô Thị Định Công, Hoàng Mai, Hà Nội </span></div>
          <div><span class="trang emaillienhe"><b>Email:</b> timviec365.vn@gmail.com</span></div>
          <div><span class="trang dienthoai"><b>Hotline:</b> 1900633682</span></div>
          <div><span class="trang giayphep"><b>Giấy phép số:</b> 4150/GP-TTĐT</span></div>
          <div><span class="trang"><b>Ngày cấp:</b> 24/08/2016</span></div>
        </div>
        <div class="col3">
          <div class="box_sub">
            <div class="sub_email">
              <div style="float: left;">
                <a rel="nofollow" href="http://online.gov.vn/Home/WebDetails/35979?AspxAutoDetectCookieSupport=1"><img style="margin:auto;margin-left: 120px;" src="/images/loading.gif" class="lazyload" data-src="/images/bct.png" alt="Đã đăng ký Bộ Công Thương" height="60" /></a>
                <p style="margin:auto;width: 100%;text-align: center;margin-top: 10px;">Copyright © 2017 <b>Công ty Cổ phần Thanh toán Hưng Hà</b></p>
              </div>
              <div class="input_email">
                <input type="text" placeholder="Nhập địa chỉ email của bạn ..." />
                <input type="submit" value="ĐĂNG KÝ NGAY" />
              </div>
            </div>
          </div>
        </div>
        <div class="clear"></div>
      </div>
    </div>
  </div>
</footer>
<script>
  $(".phone_qt").click(function() {
    var id = $(this).attr("phon_qt");
    if ($(".div_phone_" + id).hasClass("hidden")) {
      $(".div_show_phone").addClass("hidden");
      $(".div_phone_" + id).removeClass("hidden");
    } else {
      $(".div_phone_" + id).show;
      $(".div_phone_" + id).addClass("hidden");;
    }
  });
  $(document).click(function() {
    $(".div_show_phone").addClass("hidden");
  });
  $(".phone_qt,.div_show_phone").click(function(e) {
    e.stopPropagation();
  });

  $(".nav_mobile").click(function() {
    if ($(".ulmenu").hasClass("active")) {
      $(".ulmenu").removeClass("active");
    } else {
      $(".ulmenu").addClass("active");
    }
  });
  $(".icon_next").click(function() {
    if ($(this).next().hasClass("active")) {
      $(this).next().removeClass("active");
      $(this).next().hide();
    } else {
      $(this).next().addClass("active");
      $(this).next().show();
    }
  });
  $(document).click(function() {
    $(".ulmenu").removeClass("active");
  });
  $(".ulmenu,.nav_mobile").click(function(e) {
    e.stopPropagation();
  });
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-131126445-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-131126445-1');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script>
  // function slick_slider_2() {
  //   if ($(window).width() < 767) {}
  // }
  // $(document).ready(function() {
  //   slick_slider_2();
  // });
  // $(function() {
  //   $(window).resize(function() {
  //     slick_slider_2();
  //   });
  // });
</script>
<script>
  $(".btn_register").click(function() {
    if ($(".overlay").hasClass("active") == false) {
      $(".overlay").addClass("active");
    }
  });
  $(".btn_register_2").click(function() {
    if ($(".overlay").hasClass("active") == false) {
      $(".overlay").addClass("active");
    }
  });
  $(".close_btn").click(function() {
    $(".overlay").removeClass("active");
  });
  $(".btn_login").click(function() {
    if ($(".box_login_con").hasClass('active')) {
      $('.box_login_con').removeClass('active');
    } else {
      $('.box_login_con').addClass('active');
    }
  });
  $(".btn_login_2").click(function() {
    if ($('.box_login').hasClass('active')) {
      $('.box_login').removeClass('active');
    } else {
      $('.box_login').addClass('active');
    }
    $(".box_login_con").toggle();
  });
  $(".btn_login_nav").click(function() {
    $(".box_login_con_2").toggle();
  });
  $(".click_login_nav").click(function() {
    $(".box_login_con_2").toggle();
  });
  $(".notifice").click(function() {
    $(".box_show_commen").toggle();
  });
  $(".rv_new").click(function() {
    $(".box_show_new").toggle();
  });
  $(".box_logout").click(function() {
    $(".box_user_out_1").toggle();
  });
  $(".box_logout").click(function() {
    $("#btn_logout_xn").toggle();
  });
  $(".click_show_logout").click(function() {
    $(".box_user_out_2").toggle();
  });
  $(".hotline").click(function() {
    $(".box_hotline").toggle();
  });
  $(".nangcap_out").click(function() {
    $(".box_nangcap").addClass("active");
  });
  $(".close_btn").click(function() {
    $(".box_nangcap").removeClass("active");
  });
  $(".box_nangcap").click(function() {
    $(".box_nangcap").removeClass("active");
  });
  $('.box_search .s11').click(function() {
    $('.s2 .hot_tag').toggle();
  })
  $('.box_search .s11').keydown(function() {
    $('.s2 .hot_tag').hide();
  })


  $(document).click(function() {
    // $(".box_login_con").hide();
    $(".box_user_out").hide();
    $(".box_login_con_2").hide();
    $(".box_show_commen").hide();
    $(".box_hotline").hide();
  });
  $(".box_show_new,.box_show_commen,.btn_login_2,.popup_nangcap,.click_show_logout,.btn_login,.box_logout,.box_user_out,.box_login_con_2,.btn_login_nav,.click_login_nav,.notifice,.box_thong_bao,.hotline,.box_hotline,.nav_menu_btn_user,.box_user_out_2,.box_user_out_1").click(function(e) {
    e.stopPropagation();
  });

  $(document).ready(function() {
    $("#datepicker,#datepicker-2").datepicker({
      dateFormat: 'dd/mm/yy'
    });

    $(".loc_sp").click(function() {
      $(".filter").addClass("filter_full");
      $(".main_filter").addClass("active");
    });
    $(document).click(function() {
      $(".filter").removeClass("filter_full");
      $(".main_filter").removeClass("active");
    });
    $(".loc_sp,.filter").click(function(e) {
      e.stopPropagation();
    });

    $(".address_qt").click(function() {
      var id = $(this).attr("data_id_user");
      $(".thongbao_diachi").removeClass("hidden");
      $.post("/ajax/load_diachi_new.php", {
        id: id
      }, function(data) {
        $(".popup_diachi_main").html(data);
      });
    });
    $(".close_btn").click(function() {
      $(".thongbao_diachi").addClass("hidden");
    });
    $(".popup_diachi").click(function(e) {
      e.stopPropagation();
    });
    $(".thongbao_diachi").click(function() {
      $(".thongbao_diachi").addClass("hidden");
    });

  });
</script>
<script>
  <?
  if (empty($row4['usc_id'])) { ?>

    $(".nav_login_mobile").click(function() {
      if ($(".box_login").hasClass("active")) {
        $(".box_login").removeClass("active");
      } else {
        $(".box_login").addClass("active");
      }
    });
  <?    } else { ?>
    $(".nav_login_mobile").click(function() {
      if ($(".box_logout").hasClass("active")) {
        $(".box_logout").removeClass("active");
      } else {
        $(".box_logout").addClass("active");
      }
    });
  <? } ?>
  $(document).click(function() {
    $(".box_logout").removeClass("active");
    $(".box_login").removeClass("active");
    // $(".box_login_con").removeClass("active");
  });
  $(".nav_login_mobile,.box_logout,.box_login").click(function(e) {
    e.stopPropagation();
  });
</script>
<div id="btn-top" style=""></div>
<!--Start of Tawk.to Script-->
<div id="box-chat"></div>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    jQuery(window).scroll(function() {
      if (jQuery(this).scrollTop() > 50 && !$("#box-chat").hasClass('chat')) {
        $("#box-chat").addClass('chat').html('<script type="text/javascript">var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0]; s1.async=true; s1.src="https://embed.tawk.to/5978135a5dfc8255d623ef25/default"; s1.charset="UTF-8"; s1.setAttribute("crossorigin","*"); s0.parentNode.insertBefore(s1,s0);})();<\/script>');

      }
    });
  });
</script>
<!--End of Tawk.to Script-->
<script>
  window.onscroll = function() {
    scrollFunction()
  }, {
    passive: true
  };
  // $(document).ready(function() {
  //   slick_slider();
  // });

  function scrollFunction() {
    if (document.body.scrollTop > 10 || document.documentElement.scrollTop > 10) {
      $(document).ready(function() {
        slick_slider();
      });
    }
  };

  $('.gallery').slick({
    dots: false,
    infinite: true,
    speed: 600,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    responsive: [{
        breakpoint: 768,
        settings: {
          dots: false,
          slidesToShow: 2,
          variableWidth: true,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 480,
        settings: {
          dots: false,
          variableWidth: true,
          slidesToShow: 2,
          slidesToScroll: 1
        }
      },
      {
        breakpoint: 320,
        settings: {
          variableWidth: true,
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }
    ]
  });
  // -----------------------
  $('.ic_menu').click(function() {
    $('.nav-menu-tab').toggle(500);
  });
  $('.tttk>.logo_u').click(function() {
    $('.tttk .box-info,.box_login_regis').toggle(500);
  });
  $('.city_search,.cate_search').select2();

</script>
