<div class="box_left">
   <h3>SẢN PHẨM ĐANG ĐƯỢC QUAN TÂM</h3>
   <div class="main_qt">
      <?
      $db_qritem = new db_query("SELECT new_image,new_id,new_title,cat_id,cat_name,new_create_time,new_money,usc_store_phone,new_view_count FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id LEFT JOIN user ON new.new_user_id = user.usc_id WHERE new_authen = 1 ORDER BY new_type DESC LIMIT 4");
      While($item = mysql_fetch_assoc($db_qritem->result))
      {
      $image = explode(";",$item['new_image']);
      ?>
      <div class="item_qt">
         <div class="img_qt">
             <a href="<?= rewriteNews($item['new_id'],$item['new_title']) ?>" title="<?= $item['new_title'] ?>">
               <img class="lazyload" src="/images/loading.gif" data-src="<?= $image[0] ?>" alt="<?= $item['new_title'] ?>" onerror='this.onerror=null;this.src="/images/noimage.webp";' /><span>Đã chứng thực</span>
             </a>
         </div>
         <div class="cate_qt">
            <a href="<?= rewrite_cate($item['cat_id'],$item['cat_name']) ?>" title="<?= $item['cat_name'] ?>"><?= $item['cat_name'] ?></a>
            <span><?= $item['new_view_count'] ?> views</span>
         </div>
         <h4><a href="<?= rewriteNews($item['new_id'],$item['new_title']) ?>" title="<?= $item['new_title'] ?>"><?= $item['new_title'] ?></a></h4>
         <i class="time_qt">Đăng cách đây <?= time_elapsed_string($item['new_create_time']) ?></i>
         <p class="price_qt">$ <?= format_number($item['new_money']) ?> đ</p>
         <div class="lh_qt">
            <a class="address_qt" data_id_user="<?=$item['new_id']?>">ĐỊA CHỈ</a>
            <a class="phone_qt" phon_qt='<?=$item['new_id']?>'>GỌI ĐIỆN</a>
            <div class="div_show_phone hidden div_phone_<?=$item['new_id']?>">
                <p>SỐ ĐIỆN THOẠI GIAN HÀNG</p>
                <span><?=$item['usc_store_phone']?></span>
            </div>
         </div>
      </div>
       
      <?}
      unset($image,$db_qritem,$item);
      ?>
   </div>
</div>