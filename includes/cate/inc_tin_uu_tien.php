<div>
<h2>
   TIN ĐƯỢC ƯU TIÊN
</h2>
</div>
<div class="gallery">
   <?
   $db_ut_new = new db_count("SELECT count(new_id) as count FROM new JOIN category ON new.new_cate_id = category.cat_id JOIN user ON new.new_user_id = user.usc_id WHERE new_active =1 AND new_type = 3");
   if ($db_ut_new->total == 0) {
      $db_qritem = new db_query("SELECT * FROM new JOIN category ON new.new_cate_id = category.cat_id JOIN user ON new.new_user_id = user.usc_id WHERE new_active =1 ORDER BY new_update_time DESC LIMIT 10");
   }else{
      $db_qritem = new db_query("SELECT * FROM new JOIN category ON new.new_cate_id = category.cat_id JOIN user ON new.new_user_id = user.usc_id WHERE new_active =1 AND new_type = 3 ORDER BY new_update_time DESC LIMIT 10");
   }

   While($item = mysql_fetch_assoc($db_qritem->result))
   {
   $image = explode(";",$item['new_image']);
   $nameimg = explode("/",$image[0]);
   $nameimg = $nameimg[count($nameimg) - 1];
   ?>
   <div class="uutien-main">
      <div class="uutien-main-top img_qt">
         <img class="img1 lazyload" src="/images/loading.gif" data-src="<?= str_replace("..","",gethumbnail($image[0],$nameimg,$item['new_create_time'],194,143,85)) ?>" width="194" height="143" alt="<?= $item['new_title'] ?>" />
         <span>ĐÃ CHỨNG THỰC</span>
      </div>
      <div class="cate_qt">
         <a href="<?= rewrite_cate($item['cat_id'],$item['cat_name']) ?>" title="<?= $item['cat_name'] ?>"><?= $item['cat_name'] ?></a>
         <span style="float: right;"><?= $item['new_view_count'] ?> Views</span>
      </div>
      <h4><a href="<?= rewriteNews($item['new_id'],$item['new_title']) ?>" title="<?= $item['new_title'] ?>"><?= $item['new_title'] ?></a></h4>
      <i class="time_qt">Cập nhật cách đây <?= time_elapsed_string($item['new_update_time']) ?></i>
      <p class="price_qt">$ <?= format_number($item['new_money'])?> đ</p>
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