<div class="filter">
   <h2 class="loc_sp">LỌC SẢN PHẨM</h2>
   <div class="main_filter">
      <form action="/home/quicksearch.php" method="POST">
         <div class="box">
            <div class="top_box">
               <span class="lbox">Sắp xếp theo tỉnh thành</span>
               <span class="rbox"></span>
            </div>
            <div class="bot_box slcity">
               <select id="select_city" name="name_city">
                  <option value="0">Chọn tỉnh thành</option>
                  <?
                  $db_city = new db_query("SELECT cit_id,cit_name FROM city ORDER BY cit_order DESC");
                  While($rowcit = mysql_fetch_assoc($db_city->result))
                  {
                  ?>
                  <option <?= isset($citid)?($citid == $rowcit['cit_id']?"selected":""):"" ?> value="<?= $rowcit['cit_id'] ?>"><?= $rowcit['cit_name'] ?></option>
                  <?
                  }
                  unset($db_city,$rowcit);
                  ?>
               </select>
            </div>
         </div>
         <div class="box">
            <div class="top_box">
               <span class="lbox">Sắp xếp theo danh mục</span>
               <span class="rbox"></span>
            </div>
            <div class="bot_box slcate">
               <select id="select_cate" name="name_cate">
                  <option value="0">Chọn danh mục</option>
                  <?
                  $db_city = new db_query("SELECT cat_id,cat_name FROM category ORDER BY cat_id ASC");
                  While($rowcit = mysql_fetch_assoc($db_city->result))
                  {
                  ?>
                  <option <?= isset($catid)?($catid == $rowcit['cat_id']?"selected":""):"" ?> value="<?= $rowcit['cat_id'] ?>"><?= $rowcit['cat_name'] ?></option>
                  <?
                  }
                  unset($db_city,$rowcit);
                  ?>
               </select>
            </div>
         </div>
         <div class="box">
            <div class="top_box">
               <span class="lbox">Sắp xếp theo giá</span>
               <span class="rbox"></span>
            </div>
            <div class="bot_box slprice">
               <select id="select_price" name="name_price">
                  <option value="0">Không sắp xếp</option>
                  <option <?= isset($price)?($price == 1?"selected":""):"" ?> value="1">Từ thấp - cao</option>
                  <option <?= isset($price)?($price == 2?"selected":""):"" ?> value="2">Từ cao - thấp</option>
               </select>
            </div>
         </div>
         <div class="box">
            <div class="top_box">
               <span class="lbox">Tin rao vặt</span>
               <span class="rbox"></span>
            </div>
            <div class="bot_box check_cb">
               <label><input type="radio" <?= isset($cb)?($cb == 1?"checked":""):"" ?> name="cb" value="1" /><div class="control__indicator"></div>Cần bán</label>
               <label><input type="radio" <?= isset($cb)?($cb == 2?"checked":""):"" ?> name="cb" value="2" /><div class="control__indicator"></div>Cần mua</label>
            </div>
         </div>
         <div class="box">
            <div class="top_box">
               <span class="lbox">Loại sản phẩm</span>
               <span class="rbox"></span>
            </div>
            <div class="bot_box check_cb">
               <label><input type="radio" <?= isset($spm)?($spm == 1?"checked":""):"" ?> name="spm" value="1"/><div class="control__indicator"></div>SP mới</label>
               <label><input type="radio" <?= isset($spm)?($spm == 2?"checked":""):"" ?> name="spm" value="2"/><div class="control__indicator"></div>SP đã sử dụng</label>
            </div>
         </div>
         <div class="box">
            <div class="top_box">
               <span class="lbox">Sắp xếp theo ngày đăng</span>
               <span class="rbox"></span>
            </div>
            <div class="bot_box datepick">
               <input type="text" id="datepicker" name="st1" value="<?= getValue("st1","str","GET","") ?>"  placeholder="Từ ngày ... (ngày/tháng/năm)"/>
               <input type="text" id="datepicker-2" name="st2" value="<?= getValue("st2","str","GET","") ?>"  placeholder="Đến ngày ... (ngày/tháng/năm)"/>
            </div>
         </div>
         <div class="box">
            <div class="top_box">
               <span class="lbox">Sắp xếp theo top view</span>
               <span class="rbox"></span>
            </div>
            <div class="bot_box slview">
               <select id="select_view" name="view">
                  <option value="0">Không sắp xếp</option>
                  <option <?= isset($view)?($view == 1?"selected":""):"" ?> value="1">Top view từ cao đến thấp</option>
                  <option <?= isset($view)?($view == 2?"selected":""):"" ?> value="2">Top view từ thấp đến cao</option>
               </select>
            </div>
         </div>
         <div class="cuoi_fil">
            <input type="submit" class="btn_button" value="ÁP DỤNG" />
         </div>
      </form>
   </div>
</div>