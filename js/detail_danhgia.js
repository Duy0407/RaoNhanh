$(function(){var width=0;$('.votes_buttons span').hover(function(){width=$(this).attr('te_id');$('.votes_buttons span').removeClass('danh_gia_sta');for(var i=1;i<=width;i++){$('.votes_buttons #te_'+i).addClass('danh_gia_sta')}},function(){width=$(this).parent().attr('val');$('.votes_buttons span').removeClass('danh_gia_sta');for(var i=0;i<=width;i++){$('.votes_buttons #te_'+i).addClass('danh_gia_sta')}});$('.votes_buttons span').click(function(){var vote_sta=$(this).attr('te_id');$(".votes_buttons").attr('val',vote_sta)})})