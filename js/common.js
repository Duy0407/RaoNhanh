var height_to_fixed=$("header").outerHeight()+$(".hot_col_info").outerHeight()-14;$(window).scroll(function(event){var scroll=$(window).scrollTop();if(scroll>height_to_fixed){$('.hot_col').css({position:'fixed',top:61});$('.contentinfo').css({position:'fixed',top:493})}else{$('.hot_col').removeAttr('style');$('.contentinfo').removeAttr('style')}});$(".rn-nav-name").click(function(e){if($(".foody-location").hasClass("active")==!1){$(".foody-location").addClass("active")}else{$(".foody-location").removeClass("active")}
    e.stopPropagation()});$(".acemail").click(function(e){e.stopPropagation();if($(".dang_xuat").hasClass("active")==!1){$(".dang_xuat").addClass("active")}else{$(".dang_xuat").removeClass("active")}});$("html, body").click(function(){if($(".foody-location").hasClass("active")==!0){$(".foody-location").removeClass("active")}
    if($("#pop_login").hasClass("active")==!0){$("#pop_login").removeClass("active");$("body").removeClass("modal-open")}
    if($(".dang_xuat").hasClass("active")==!0){$(".dang_xuat").removeClass("active")}});$(".foody-location").click(function(e){e.stopPropagation()});$("#phone").click(function(){if($(this).hasClass("phone_active")==!1){$(this).addClass("phone_active");$(this).html($(this).attr("ph"))}});function showboxlogin(e){$("body").addClass("modal-open");$("#pop_login").addClass("active");event.stopPropagation()}
$(".modal-content").click(function(e){e.stopPropagation()});function showBoxChatFb(idfb,e){if(idfb!=0){var url='https://www.messenger.com/t/'+idfb+'/';if(url!=''){window.open(url,'Chat Facebook',"height=500,width=400,modal=yes,alwaysRaised=yes")}else{alert('Tài khooản facebook của người đăng không khả dụng!')}}else{var fbid=$(e).attr("data-id");$.ajax({url:"/ajax/ajax_gennerate_fbid.php",type:"POST",data:{'uid':fbid},success:function(data){if(data!=0){var url='https://www.messenger.com/t/'+data+'/';$(e).attr("onclick","showBoxChatFb('"+data+"',this);");window.open(url,'Chat Facebook',"height=500,width=400,modal=yes,alwaysRaised=yes")}else{alert('Tài khooản facebook của người đăng không khả dụng!')}}})}}