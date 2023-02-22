<div class="right">
    <div class="loc-timkiem">
        <div class="filter form_filter box_sbl sbl_list_form">
            <h2 class="title">
                Lọc tìm kiếm
            </h2>
            <div class="loc filter_group box_sbl" id="myFilter">
                <form class="job-tp" method="post">
                    <input type="text" name="keyword" id="tukhoa" class="keyword_filter" placeholder="Nhập từ khóa tìm kiếm...">
                    
                        <select name="thanhpho" id="thanhpho_ft" data-select2-id="1" tabindex="-1" aria-hidden="true" class="city_filter">
                            <option value="">Chọn tỉnh / thành phố</option>
                            <?
                                $query = new db_query("SELECT cit_id,cit_name FROM city2 where cit_parent = 0");
                                while($rowcty= mysql_fetch_assoc($query->result)) {
                                ?>
                            <option class="thanhpho" value="<? echo $rowcty['cit_id']; ?>" <?if ($city == $rowcty['cit_id']) {echo 'selected';} ?>>
                                <? echo $rowcty['cit_name']; ?>
                            </option>
                            <?
                            }
                            ?>
                        </select>
                        <select name="quanhuyen" id="quanhuyen_ft" value="" data-select2-id="1" tabindex="-1" aria-hidden="true" class="district_filter">
                            <option value="">Chọn quận /huyện</option>
                            <? if(isset($_GET['city'])):
                                $query = new db_query("SELECT cit_id,cit_name FROM city2 where cit_parent = '".$_GET['city']."'");
                                while($rowcty= mysql_fetch_assoc($query->result)):?>
                                <option class="quanhuyen" value="<? echo $rowcty['cit_id']; ?>">
                                    <? echo $rowcty['cit_name']; ?>
                                </option>
                            <?php endwhile;endif?>
                            
                        </select>
                        <select name="nn" id="nganhnghe_ft" class="career_filter">
                            <option value="">Chọn ngành nghề</option>
                            <? 
                            $db_qra = new db_query("SELECT cat_id, cat_name FROM category_vl ");
                            While($rowa = mysql_fetch_assoc($db_qra->result))
                            { ?>
                            <option value="<?= $rowa['cat_id'] ?>" <?if ($catid == $rowa['cat_id']) {echo 'selected';} ?> ><?= $rowa['cat_name'] ?></option>
                            <?
                            }
                            ?>
                        </select>
                    <select name="ctnn" id="chitietnn_ft" data-select2-id="1" tabindex="-1" aria-hidden="true" class="job_detail_filter">
                        <option value="">Ngành nghề chi tiết</option>
                        <? if(isset($_GET['catid'])):
                            $query_cat = new db_query("SELECT key_id,key_name FROM keyword where key_cate_lq = '".$_GET['catid']."'");
                            while($rowtag= mysql_fetch_assoc($query_cat->result)):?>
                            <option class="nnct" value="<? echo $rowtag['key_id']; ?>">
                                <? echo $rowtag['key_name']; ?>
                            </option>
                        <?php endwhile;endif?>
                    </select>
                    <select name="tg" id="thoigian" data-select2-id="1" tabindex="-1" aria-hidden="true" class="job_type_filter">
                        <option value="">Chọn thời gian làm việc</option>
                        <option value="1">Toàn thời gian</option>
                        <option value="2">Bán thời gian</option>
                        <option value="3">Giờ hành chính</option>
                        <option value="4">Ca sáng</option>
                        <option value="5">Ca chiều</option>
                        <option value="6">Ca đêm</option>
                    </select>
                    <select name="luong" id="luong" data-select2-id="1" tabindex="-1" aria-hidden="true" class="pay_filter">
                        <option value="">Hình thức trả lương</option>
                        <option value="1">Theo giờ</option>
                        <option value="2">Theo ngày</option>
                        <option value="3">Theo tuần</option>
                        <option value="4">Theo tháng</option>
                        <option value="5">Theo năm</option>
                    </select>
                    <div class="money">
                        <p class="luongmm">Mức lương :</p>
                        <div class="maxmin">
                            <input type="text" name="money_min" id="money_min" class="money_min_filter" placeholder="Từ (VNĐ)">
                            <input type="text" name="money_max" id="money_max" class="money_max_filter" placeholder="Đến (VNĐ)">
                        </div>
                    </div>
                    <!-- <div class="range-slide">
                    <div class="slide">
                        <div class="line" id="line" style="left: 0%; right: 0%;"></div>
                        <span class="thumb" id="thumbMin" style="left: 0%;"></span>
                        <span class="thumb" id="thumbMax" style="left: 100%;"></span>
                    </div>
                    <input id="rangeMin" type="range" max="50" min="0" step="1" value="0">
                    <input id="rangeMax" type="range" max="50" min="0" step="1" value="50">
                    </div>
                    <div class="display">
                        Mức lương : từ
                        <span id="min">0</span>
                        đến
                        <span id="max">50</span>
                        triệu
                    </div> -->
                </form>
            </div>
            <div class="hotline">Hotline: 1900633682</div>
            <div class="mail">Email: Info@24hpay.vn</div>
        </div>
    </div>
</div>