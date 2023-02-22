//captcha
function validateCaptcha(r) {
   return /^[0-9]+$/.test(r);
}
function validateDanhGia() {
   var captcha = $('#captcha').val();
   var content = $('#main_content').val();

   check = true;
   // captcha
   if (captcha == '') {
      $('#captcha').addClass("error");
      $('.error_captcha').text('Bạn chưa nhập mã captcha');
      check = false;
   } else if (!validateCaptcha(captcha)) {
      $("#captcha").addClass("error");
      $('.error_captcha').text('Mã captcha phải là ký tự số');
      check = false;
   } else if (captcha.length != 5) {
      $("#captcha").addClass("error");
      $('.error_captcha').text('Mã captcha phải đúng 5 ký tự');
      check = false;
   } else {
      $("#captcha").removeClass("error");
      $(".error_captcha").text('');
   }

   //content
   if (content == '') {
      $('#main_content').addClass("error");
      $('.error_main_content').text('Bạn chưa nhập nội dung đánh giá');
      check = false;
   } else {
      $("#main_content").removeClass("error");
      $(".error_main_content").text('');
   }

   return check;
}

let star = 0;
function rateStar(e) {
   var star = $(e).data('id');
   $('.danh-gia-sao').css('fill', '#FFFFFF');
   for (var i = 1; i <= star; i++) {
      $('.star' + i).css('fill', '#F1C644');
   }
}
// ************* 

// ----------------------
$(document).ready(function () {
   $('.danh-gia-sao').click(function(){
      rateStar(this);
      var star = $(this).data('id');
      $('#btn-add').attr('data-star',star);
   });
   $('#btn-add').click(function () {
      var sao = $(this).attr('data-star');
      if (validateDanhGia()) {
         // lấy dữ liệu 
         var inputCode = $('.input_captcha').val();
         var inputContent = $('#main_content').val();

         var formDanhGia = new FormData();
         formDanhGia.append('code', inputCode);

         let url = "/ajaxNew/checkCaptcha.php";
         var response = callAjax('post', url, formDanhGia, true);
         if (response !== undefined) {
            if (response.result == true) {
               var html = "";
               var id = 'hihi';
               var time = '0 giây';
               var content = inputContent;
               var div_box = '';
               // console.log(sao);
               for(var i = 0; i< 5; i++){
                  if(i<sao){
                     html += `<svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="danh-gia-tk">
                                    <path d="M12.5245 1.08156C12.6741 0.620903 13.3259 0.620905 13.4755 1.08156L15.6677 7.82827C15.8685 8.4463 16.4444 8.86475 17.0943 8.86475H24.1882C24.6725 8.86475 24.8739 9.48455 24.4821 9.76925L18.743 13.9389C18.2172 14.3209 17.9972 14.998 18.1981 15.616L20.3902 22.3627C20.5399 22.8234 20.0126 23.2064 19.6208 22.9217L13.8817 18.752C13.3559 18.3701 12.6441 18.3701 12.1183 18.752L6.37923 22.9217C5.98737 23.2064 5.46013 22.8234 5.60981 22.3627L7.80195 15.616C8.00276 14.998 7.78277 14.3209 7.25704 13.9389L1.51794 9.76925C1.12609 9.48455 1.32747 8.86475 1.81184 8.86475H8.90575C9.55558 8.86475 10.1315 8.44631 10.3323 7.82827L12.5245 1.08156Z" fill="#F1C644" stroke="#F1C644"></path>
                              </svg>`;
                  }else{
                     html += `<svg width="26" height="24" viewBox="0 0 26 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="danh-gia-tk">
                                    <path d="M12.5245 1.08156C12.6741 0.620903 13.3259 0.620905 13.4755 1.08156L15.6677 7.82827C15.8685 8.4463 16.4444 8.86475 17.0943 8.86475H24.1882C24.6725 8.86475 24.8739 9.48455 24.4821 9.76925L18.743 13.9389C18.2172 14.3209 17.9972 14.998 18.1981 15.616L20.3902 22.3627C20.5399 22.8234 20.0126 23.2064 19.6208 22.9217L13.8817 18.752C13.3559 18.3701 12.6441 18.3701 12.1183 18.752L6.37923 22.9217C5.98737 23.2064 5.46013 22.8234 5.60981 22.3627L7.80195 15.616C8.00276 14.998 7.78277 14.3209 7.25704 13.9389L1.51794 9.76925C1.12609 9.48455 1.32747 8.86475 1.81184 8.86475H8.90575C9.55558 8.86475 10.1315 8.44631 10.3323 7.82827L12.5245 1.08156Z" stroke="#F1C644"></path>
                              </svg>`;
                  }
               }
               var div_box = '<div class="content-dgtk"><div class="title-dgtk"><span class="text-title-dgtk">' + id + '</span><span class="time-title-dgtk">' + time + '</span></div><div class="sao">' + html + '</div><p class="cmt-dgtk">' + content + '</p></div>';
               $('.box-content-dgtk').prepend(div_box);
            } else {
               $('.input_captcha').addClass("error");
               $('.error_captcha').text('Sai mã captcha');
            }
         }
      }

   });
});
