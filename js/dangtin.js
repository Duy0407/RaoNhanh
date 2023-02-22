$("#slider").slider({
    range: true,
    values: [ 0, 24 ],
    min:0,
    max:24
 });
 CKEDITOR.replace( 'editor1' );


 // Default carousel
 //var carousel = $('div.carousel-default').floatingCarousel({ autoScroll : true, touchOverflowHidden : false });
 var carouselDefault = new floatingCarousel('#carousel-default');

 // Autoscroll
 var carouselAutoscroll = new floatingCarousel('#carousel-autoscroll', {
                             autoScroll : true,
                             autoScrollDirection : 'right',
                             autoScrollSpeed : 20000,
                             scrollSpeed : 'fast'
                         });

 // vertical
 var carouselVertical = new floatingCarousel('#carousel-vertical', {
                             scrollerAlignment : 'vertical'
                         });

 //responsive
 var opts = {
         autoScroll : true,
         autoScrollSpeed : 20000
     }

 $(document).ready(function(){

// jQuery methods go here...$
//$("#upload_btn").click(function(){
//   $("input[name = image_dialog]").trigger("click");
//})

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var url = "";
        reader.onload = function (e) {
          url = e.target.result;
          console.log(url);
          $(".product_img").each(function(){
             var src = $(this).attr('src');
             console.log("-------------------------");
             console.log(src);
             if(src == ""){
               console.log(url);
               $(this).attr('src', url);
                return false;
             }

          });
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("input[name = image_dialog]").change(function(){
    readURL(this);
});


$(".collapsed_menu").click(function(){
     // console.log("pick_vip");
     $(this).nextAll("ul").toggle();
});
});
//slider slider slider

$("#upload_btn").click(function(){
    $("#img_select").click();
});
$(".product_img").click(function(){
    $("#img_select").click();
});

function keytitle(e)
{
    var counttitle = $(e).val().length;
    $("#countTitle").text(""+counttitle+"/100");
}
function keyprice(e)
{
    var counttitle = $(e).val().length;
    $("#countPrice").text(""+counttitle+"/30");
}
function keymota(e)
{
    var counttitle = $(e).val().length;
    $("#countDesc").text(""+counttitle+"/2000");
}
function keyphone(e)
{
    var counttitle = $(e).val().length;
    $("#countPhone").text(""+counttitle+"/15");
}
//Kiểm tra số điện thoại
jQuery(".numbersOnly").keyup(function () {
  this.value = this.value.replace(/[^0-9]/g, '');
  $('.numbersOnly').val( $('.numbersOnly').val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") );
});
jQuery(".numbersOnly2").keyup(function () {
  this.value = this.value.replace(/[^0-9]/g, '');
});

function deleteimage(e){
	$(e).parent(".imgdiv").next(".imgremo").remove();
	$(e).parent(".imgdiv").remove();
	var iddel = $(e).attr("data-id");
	arrayB.push(iddel);
}
function checkpostdt()
{
    var captcha = $("#captcha_new").val();
    $("#cke_editor1").removeClass('error');
    $(".noti-error").remove();
    $("#Title").removeClass('error');
    $("#Price").removeClass('error');
    $(".box1_1").removeClass('error');
    $("#select_category").removeClass('error');
    $("#select_city").removeClass('error');
    $("#Description").removeClass('error');
    $(".tree_menu").removeClass('error');
    $(".pickma .upload-item").removeClass('error');
    if($(".box1_1 .imgdiv").length == 0)
    {
        $(".box1_1").addClass('error');
        $(".image_list").after("<div class='noti-error' style='width: 100%;text-align: center;'>Vui lòng đăng ảnh để tin chất lượng hơn<br/></div>");
        $('html, body').animate({
            scrollTop: $(".ct_title").offset().top
        }, 500);
    }
    else if($(".input_cate_id").val() == "")
    {
        $(".tree_menu").removeClass("hidden");
        $('html, body').animate({
            scrollTop: $(".ct_title").offset().top
        }, 500);
        $(".tree_menu").addClass('error');
        $("#sitemap").after("<div class='noti-error' style='width: 100%;text-align: center;'>BẠN CHƯA CHỌN DANH MỤC</div>");
    }
//    else if($("#new_city").val() == '0')
//    {
//        $("#new_city").focus();
//        $("#new_city").addClass('error');
//        $(".div_error").after("<span class='noti-error'style='width: 100%;text-align: center;'>Bạn chưa nhập tỉnh thành</span>");
//    }
    else if($("#Price").val() == '')
    {
        $('html, body').animate({
            scrollTop: $("#new_city").offset().top
        }, 500);
        $("#Price").addClass('error');
        $(".div_error").after("<span class='noti-error' style='width: 100%;text-align: center;'>Bạn chưa nhập giá</span>");
    }
    else if($("#Title").val() == '')
    {
        $('html, body').animate({
            scrollTop: $("#Price").offset().top
        }, 500);
        $("#Title").addClass('error');
        $(".title_sell_box tr:first").after("<tr><td></td><td  class='noti-error'>Bạn chưa nhập tiêu đề</td></tr>");
    }
    else if($("#Title").val().length < 10)
    {
        $("#Title").addClass('error');
        $(".title_sell_box tr:first").after("<tr><td></td><td  class='noti-error'>Tiêu đề phải lớn hơn 10 ký tự</div>");
        $('html, body').animate({
            scrollTop: $("#Price").offset().top
        }, 500);
    }
    else if($(CKEDITOR.instances.editor1.getData()).text() == '')
    {
        $('html, body').animate({
            scrollTop: $("#Title").offset().top
        }, 500);
        $("#cke_editor1").addClass('error');
        $(".cke_inner").after("<div class='noti-error' style='width: 100%;text-align: center;'>Vui lòng thêm thông tin sản phẩm</div>");
    }
    else if($(".pack_vip").val() == "")
    {
        $(".open_vip").addClass("active");
//      $("#captcha_new").focus();
//      $("#captcha_new").addClass('error');
//      $(".dangtin_submit").after("<div class='control2 noti-error'>Xin vui lòng nhập mã captcha!</div>");
    }
    else if(captcha ==="")
    {
      $("#captcha_new").focus();
      $("#captcha_new").addClass('error');
      $(".dangtin_submit").after("<div class='control2 noti-error'>Xin vui lòng nhập mã captcha!</div>");
    }
    else if(captcha.length < 5)
    {
      $("#captcha_new").focus();
      $("#captcha_new").addClass('error');
      $(".dangtin_submit").after("<div class='control2 noti-error'>Mã captcha phải đủ 5 ký tự!</div>");
    }
    else if(captcha < 5)
    {
      $("#captcha_new").focus();
      $("#captcha_new").addClass('error');
      $(".dangtin_submit").after("<div class='control2 noti-error'>Mã captcha phải đủ 5 ký tự!</div>");
    }
   else
   {
      $.ajax({
         url: "../ajax/getcode.php",
         type: "POST",
         data: {
         'code': captcha
         },
         success: function(data){
            if(data == 0)
            {
                   if($("#captcha_new").hasClass("error") == false)
                   {
                      $("#captcha_new").addClass('error');
                      $(".reset-icon").click();
                   }
                   $("#captcha_new").focus();
                   $(".reset-icon").click();
                   $(".dangtin_submit").after("<div class='noti-error'>Mã bảo mật bạn nhập không chính xác. Xin vui lòng nhập lại</div>");
            }
            else if(data == 1){ 
               $("#captcha_new").removeClass('error');
               $(".noti-error").remove();
              // $(".div_dangtin").attr("onsubmit","return true;");
//               $("#postok").click();
               check_title();
           }  
            
         }
      });
   }

}

 $("#tongtin_cu").click(function(){
    $('.check_box_user').prop('checked', true)
   if($(this).hasClass("contact_info") == false)
   {
      $("#thongtin_moi").removeClass("contact_info");
      $(this).removeClass("user_info");
      $(this).addClass("contact_info");
      $("#thongtin_moi").addClass("user_info");
      $("#thongtin_moi input").attr("disabled",'true');
   }
});
$("#thongtin_moi").click(function(){
    $('.check_box_user').prop('checked', false)
   if($(this).hasClass("contact_info") == false)
   {
      $("#tongtin_cu").removeClass("contact_info");
      $(this).removeClass("user_info");
      $(this).addClass("contact_info");
      $("#tongtin_cu").addClass("user_info");
      $("#thongtin_moi input").removeAttr("disabled");
      $("#thongtin_cu input[type='text']:disabled ").css('background','#fff');
   }
});
$('.check_box_user').click(function (){
    if($(this).prop("checked") == true){
        if($("#tongtin_cu").hasClass("contact_info") == false)
            {
               $("#thongtin_moi").removeClass("contact_info");
               $("#tongtin_cu").removeClass("user_info");
               $("#tongtin_cu").addClass("contact_info");
               $("#thongtin_moi").addClass("user_info");
               $("#thongtin_moi input").attr("disabled",'true');
               $("#tongtin_cu").addClass("active");
               $("#thongtin_moi").removeClass("active");
            }
    }
    else if($(this).prop("checked") == false){
        if($('#thongtin_moi').hasClass("contact_info") == false)
            {
               $("#tongtin_cu").removeClass("contact_info");
               $('#thongtin_moi').removeClass("user_info");
               $('#thongtin_moi').addClass("contact_info");
               $("#tongtin_cu").addClass("user_info");
               $("#thongtin_moi input").removeAttr("disabled");
               $("#thongtin_cu input[type='text']:disabled ").css('background','#fff');
               $("#thongtin_moi").addClass("active");
               $("#tongtin_cu").removeClass("active");
            }
    }
});

//pick giá liên hệ
    $(".click_check_gia").click(function (){
        var  a = $(this).val();
        if(a == 2){
            $('.check_gia_1').attr('disabled','true');
            $('.check_gia_2').removeAttr('disabled');
            $('.check_gia_1').removeClass('numbersOnly');
            $('.check_gia_1').val('Liên hệ');
        }else if(a == 1){
            $('.check_gia_2').attr('disabled','true');
            $('.check_gia_1').removeAttr('disabled');
            $('.check_gia_1').addClass('numbersOnly');
            $('.check_gia_1').val('');
        }
    });
//end

$(".close_btn").click(function (){
   $(".open_vip").removeClass("active");
   $(".div_nangcap").removeClass("active");
});
$(".btn_thoat").click(function (){
   $(".div_nangcap").removeClass("active");
});
// $(".chon_goi_vip").click(function (){
  
//    $(".open_vip").addClass("active");
// });
// $(".pick_vip").click(function ()
// {
//    var a = $(this).attr("chon_vip");
//    var b = $(this).attr("goi_tin");
//    var c = $(this).attr("pri_price"); 
//    var id = $(this).attr("usc_id");
//    $.ajax({
//          url: "../ajax/check_price.php",
//          type: "POST",
//          data: {
//          'price': c,
//          'usc_id':id
//          },
//          success: function(data){
//             if(data == 0){
//                 $(".thongbao_thatbai").addClass("active");
//             }
//             else if(data == 1){
//                    $("#upload_product_btn a").text(b);
//                    $(".chon_goi_vip").text(b);
//                    $(".chon_goi_vip").removeClass("bg_mienphi");
//                    $(".chon_goi_vip").removeClass("bg_vip1");
//                    $(".chon_goi_vip").removeClass("bg_vip2");
//                    $(".chon_goi_vip").removeClass("bg_vip3");
//                         if(a == 1){
//                            $(".chon_goi_vip").addClass("bg_mienphi");
//                         }else if(a == 2){
//                            $(".chon_goi_vip").addClass("bg_vip1"); 
//                         }
//                         else if(a == 3){
//                            $(".chon_goi_vip").addClass("bg_vip2"); 
//                         }
//                         else if(a == 4){
//                            $(".chon_goi_vip").addClass("bg_vip3"); 
//                         }
//                    $(".pack_vip").val(a);
// //                   $('html, body').animate({
// //                        scrollTop: $(".dif_info").offset().top
// //                    }, 500);
//             }  
            
//          }
//       });

//    $(".open_vip").removeClass("active");
// });
      function check_title(){
       var store_name = $("#Title");
       $(".noti-error").remove();
       if(store_name.val().length > 0)
       {
        $("#Title").removeClass('error');
        $(".noti-error").remove();
          $.ajax({
             type: "POST",
             url: '/ajax/check_title.php',
             data: {title:$("#Title").val()},
             success: function(data) {
                if(data == 1)
                {
                   if($("#Title").hasClass("error") == false)
                   {
                      $("#Title").addClass('error');
                      $(".title_sell_box tr:first").after("<tr><td></td><td  class='noti-error'>Tiêu đề trùng với một bài đăng trước đó.</div>");
                      $('html, body').animate({
                            scrollTop: $("#Price").offset().top
                      }, 500);
                   }
                   $("#Title").focus();
                }else if(data == 0){ 
                   $(".title_sell_box tr:first").removeClass('error');
                   $(".noti-error").remove();
                   $(".div_dangtin").attr("onsubmit","return true;");
                   $("#postok").click();
                }
             }
          }); 
       }
       else{
        $("#Title").addClass('error');
        $(".title_sell_box tr:first").after("<tr><td></td><td  class='noti-error'>Tiêu đề không được để trống</div>");
        $('html, body').animate({
            scrollTop: $("#Price").offset().top
        }, 500);
       }
    };