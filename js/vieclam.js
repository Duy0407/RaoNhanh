function openNav(){document.getElementById("mySidenav").style.width="100%"}function closeNav(){document.getElementById("mySidenav").style.width="0"}function show(e,t){document.getElementById(t).style.display="block"}function hide(e){document.getElementById(e).style.display="none"}function myFunction(){var e=document.getElementById("navDemo");-1==e.className.indexOf("w3-show")?e.className+=" w3-show":e.className=e.className.replace(" w3-show","")}var modal=document.getElementById("ticketModal");function show_reg(e,t){return document.getElementById(t).style.display="block",!1}function hide_reg(e){return document.getElementById(e).style.display="none",!1}function showft_popup(e,t){return document.getElementById(t).style.display="block",!1}function hideft_popup(e){return document.getElementById(e).style.display="none",!1}function home_filter_mb(){var e=$("#thanhpho_mb").val(),t=$("#quanhuyen_mb").val(),n=$("#nganhnghe_mb").val(),h=$("#chitietnn_mb").val(),i=$("#thoigian_mb").val(),o=$("#tukhoa_mb").val(),l=$("#money_min_mb").val(),c=$("#money_max_mb").val();$.ajax({type:"POST",url:"../ajax/filter.php",data:{a:e,b:t,c:n,d:h,e:i,f:o,g:l,h:c},success:function(e){$("#main").html(e)}})}window.onclick=function(e){e.target==modal&&(modal.style.display="none")},$(".btn_login").click(function(){$(".box_login_con").hasClass("active")?($(".box_login_con").removeClass("active"),$(".box_login_con").next().hide()):$(".box_login_con").addClass("active")}),$(document).ready(function(){$(".content_tg").height()>30?$(".content_tg").css({height:"50px",overflow:"hidden"}):$(".box_see").hide(),$(".hide_text").hide(),$(".hide_text").click(function(){$(this).hide(),$(".see_more").show(),$(".content_tg").css("height","50px")}),$(".see_more").click(function(){$(this).hide(),$(".hide_text").show(),$(".content_tg").css("height","unset")})}),$("#thanhpho_ft").select2({placeholder:" Chọn tỉnh / thành phố"}),$("#quanhuyen_ft").select2({placeholder:" Chọn quận / huyện"}),$("#nganhnghe_ft").select2({placeholder:" Chọn ngành nghề"}),$("#chitietnn_ft").select2({placeholder:" Chọn ngành nghề chi tiết"}),$("#thoigian").select2({placeholder:" Chọn thời gian làm việc"}),$("#luong").select2({placeholder:" Chọn hình thức trả lương"}),$("#thanhpho_mb").select2({placeholder:" Chọn tỉnh / thành phố"}),$("#quanhuyen_mb").select2({placeholder:" Chọn quận / huyện"}),$("#nganhnghe_mb").select2({placeholder:" Chọn ngành nghề"}),$("#chitietnn_mb").select2({placeholder:" Chọn ngành nghề chi tiết"}),$("#thoigian_mb").select2({placeholder:" Chọn thời gian làm việc"}),$("#luong_mb").select2({placeholder:" Chọn hình thức trả lương"}),$(document).ready(function(){$(".form_filter .city_mb_filter,.form_filter .district_mb_filter,.form_filter .career_mb_filter,.form_filter .job_detail_mb_filter,.form_filter .job_type_mb_filter,.form_filter .pay_mb_filter,.form_filter .keyword_mb_filter,.form_filter .money_min_mb_filter,.form_filter .money_max_mb_filter").change(function(){new home_filter_mb})}),$(document).ready(function(){$(".content_tg").height()>30?$(".content_tg").css({height:"50px",overflow:"hidden"}):$(".box_see").hide(),$(".hide_text").hide(),$(".hide_text").click(function(){$(this).hide(),$(".see_more").show(),$(".content_tg").css("height","50px")}),$(".see_more").click(function(){$(this).hide(),$(".hide_text").show(),$(".content_tg").css("height","unset")})}),$("#thanhpho_ft").change(function(){var e=$(this).val();$.ajax({url:"/ajax/get_district_byid.php",data:{id:e},success:function(e){$("#quanhuyen_ft").html(e)}})}),$("#nganhnghe_ft").change(function(){var e=$(this).val();$.ajax({url:"/ajax/nganhnghe.php",data:{id:e},success:function(e){$("#chitietnn_ft").html(e)}})});