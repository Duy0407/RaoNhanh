<script src="/js/jquery-3.2.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<script type="text/javascript" src="/js/select2.min.js"></script>
<script src="/js/slickslider/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
<script src="/js/slickslider/slick.min.js" type="text/javascript"></script>
<script src="/js/lazysizes.min.js"></script>
<script src="/js/home.js"></script>
<script src="/js/newJs/common.js"></script>
<script src="/js/newJs/search.js"></script>





<script type="text/javascript">
  $(document).ready(function() {
    $('#city_search, .cate_search').select2();
    $('.ic_menu').click(function() {
      $('.nav-menu-tab').toggle(500);
    });
    $('.tttk>.logo_u').click(function() {
      $('.tttk .box-info,.box_login_regis').toggle(500);
    });
    // $('.city_search,.cate_search').select2();
      $('#btn-top').click(function() {
          $('body,html').animate({
              scrollTop: 0
          }, 800);
      });
  });
  jQuery(document).ready(function($) {
      jQuery(window).scroll(function() {
          if (jQuery(this).scrollTop() > 50 && !$("#box-chat").hasClass('chat')) {
              $("#box-chat").addClass('chat').html('<script type="text/javascript">var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0]; s1.async=true; s1.src="https://embed.tawk.to/5978135a5dfc8255d623ef25/default"; s1.charset="UTF-8"; s1.setAttribute("crossorigin","*"); s0.parentNode.insertBefore(s1,s0);})();<\/script>');

          }
          if(jQuery(this).scrollTop()>300){
              jQuery('#btn-top').fadeIn(800);
          }else{
              jQuery('#btn-top').fadeOut(800);
          }
      });

  });
</script>