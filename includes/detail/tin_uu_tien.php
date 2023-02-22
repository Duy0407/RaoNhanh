  <div>
      <h2>TIN ĐƯỢC ƯU TIÊN</h2> 
  </div>
  <div class="gallery">
   <?
        $db_qritem = new db_query("SELECT new_image,new_title,cat_id,cat_name,new_view_count,new_id,new_create_time,new_money,usc_store_phone,usc_phone FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id LEFT JOIN user ON new.new_user_id = user.usc_id WHERE new_active = 1 ORDER BY new_id DESC LIMIT 10");
        While($item = mysql_fetch_assoc($db_qritem->result))
        {
        $image = explode(";",$item['new_image']);
   ?>
  <div class="uutien-main">
      <div class="uutien-main-top img_qt">
        <?
        $img=$image[0];
        if ($image[0] == '') {
            $img="/images/raonhanhh.jpg";
        }
        ?>
          <img class="img1 lazyload" src="/images/loading.gif" data-src="<?=$img ?>" width="192" height="143" alt="<?= $item['new_title'] ?>" onerror='this.onerror=null;this.src="/images/noimage.webp";' />
          <span>ĐÃ CHỨNG THỰC</span>
      </div>
      <div class="cate_qt">
        <a href="<?= rewrite_cate($item['cat_id'],$item['cat_name']) ?>" title="<?= $item['cat_name'] ?>"><?= $item['cat_name'] ?></a>
        <span style="float: right;"><?= $item['new_view_count'] ?> Views</span>
      </div>
          <h4 style="height: auto"><a href="<?= rewriteNews($item['new_id'],$item['new_title']) ?>" title="<?= $item['new_title'] ?>"><?= $item['new_title'] ?></a></h4>
          <i class="time_qt">Đăng cách đây <?= time_elapsed_string($item['new_create_time']) ?></i>
          <p class="price_qt">$ <?=($item['new_money']==0)?'Liên hệ':(format_number($item['new_money']).' đ')?> </p>
      <div class="lh_qt">
         <a class="address_qt" data_id_user="<?=$item['new_id']?>">ĐỊA CHỈ</a>
         <a class="phone_qt" phon_qt='<?=$item['new_id']?>'>GỌI ĐIỆN</a>
         <div class="div_show_phone hidden div_phone_<?=$item['new_id']?>">
             <p>SỐ ĐIỆN THOẠI GIAN HÀNG</p>
             <span>
                 <?
                    if($item['usc_store_phone'] != 0){
                        echo (substr($item['usc_store_phone'],0,1)!= 0)?"0".$item['usc_store_phone']:$item['usc_store_phone'];
                    }else{
                        echo (substr($item['usc_phone'],0,1)!= 0)?"0".$item['usc_phone']:$item['usc_phone'];
                    }
                 ?>
             </span>
         </div>
      </div>
  </div>
  <?
  }
  unset($image,$db_qritem,$item);
  ?>
  </div>
  <div class="thongbao_diachi hidden diachi_<?=$item['new_id']?>">
            <div class="popup_diachi">
                <span>ĐỊA CHỈ</span>
                <i class="fa fa-times close_btn"></i>
                <div class="clear"></div>
                <div class="popup_diachi_main">   
                </div>
            </div>  
  </div>
<!--</script>-->
<!--</script>-->