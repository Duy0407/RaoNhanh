<?
include("config.php");
$new_id = getValue('new_id', 'int', 'POST', 0);
if ($new_id != 0) {
    $list_ghim = new db_query("SELECT `new_id`,`new_title`,`new_money`,`new_unit`,`new_create_time`,`chotang_mphi`,`new_image`,`dia_chi`,
                                    `new_pin_home`, `new_pin_cate`,`da_ban`, `new_day_tin`, `so_ngay_ghim`, `thoigian_bdghim`, `ngay_bdghim` FROM `new` WHERE `new_id` = $new_id ");
    $row_ghim = mysql_fetch_assoc($list_ghim->result);

    $so_ngay_ghim = $row_ghim['so_ngay_ghim'];

    $noi_ghim = '';
    if ($row_ghim['new_pin_home'] != "") {
        $noi_ghim = "trang chủ";
    } else if ($row_ghim['new_pin_cate'] != "") {
        $noi_ghim = "trang danh mục";
    }

    $day = explode(',',$row_ghim['new_day_tin']);

    // if ($ghim_noibat != "") {
    //     $ghim = explode(',', $ghim_noibat);
    //     $count = count($ghim);
    // } else if ($ghim_noibat != "") {
    //     $ghim = explode(',', $ghim_noibat);
    //     $count = count($ghim);
    // } else if ($ghim_danhmuc != "") {
    //     $ghim = explode(',', $ghim_noibat);
    //     $count = count($ghim);
    // } else if ($ghim_dmtthanh != "") {
    //     $ghim = explode(',', $ghim_noibat);
    //     $count = count($ghim);
    // } else if ($ghim_tthanh != "") {
    //     $ghim = explode(',', $ghim_noibat);
    //     $count = count($ghim);
    // };



    // if($count == 24){
    //     $thoigian_ghim = "Cả ngày trong ". $so_ngay_ghim . "ngày";
    // }else{
    //     $ghim_tg = array();
    //     $thoigian_ghim = "";
    //     for($i = 0; $i < $count; $i++){
    //         $ghim_tg[] = ($ghim[$i] - 1).'h-'.$ghim[$i].'h, ';
    //     }

    //     $thoigian_ghim = implode(',', $ghim_tg) ."trong ". $so_ngay_ghim . "ngày";
    // };

    // $ghimt = $ghim[0];



?>
    <div class="n_box_top">
        <div class="khoicon_ndban d_flex align_i_c">
            <div class="img_tinban">
                <img src="<?=explode(';',$row_ghim['new_image'])[0]?>" alt="" class="anh_avt_tin" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
            </div>
            <div class="khoi_text_ban">
                <a><h3 class="title_ban color-blk font-16 mb20"><?=$row_ghim['new_title']?></h3></a>
                <p class="font-14 color_a font-bold time_ban"><?= lay_tgian($row_ghim['new_create_time']) ?></p>
                <p class="font-14 color_a address_ban"><?=$row_ghim['dia_chi']?></p>
                <? if ($row_ghim['chotang_mphi'] == 1) { ?>
                    <p class="color_cam tien_ban">Cho tặng miễn phí</p>
                <? } else if ($row_ghim['new_money'] > 0) { ?>
                    <p class="color_cam tien_ban"><?= number_format($row_ghim['new_money']) ?> <?= $donvitien[$row_ghim['new_unit']] ?></p>
                <? } else if ($row_ghim['new_money'] == 0) { ?>
                    <p class="color_cam tien_ban">Liên hệ người bán để hỏi giá</p>
                <? } ?>
            </div>
        </div>
    </div>
    <?php if ($row_ghim['new_day_tin'] != ''){ ?>
    <div class="title">
        <span class="text-title">Ngày giờ đẩy tin</span>
    </div>
    <div class="box-hour">
        <div class="select-hour">
            <label class="hour-day <?= (in_array(1, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st1" value="0" data="1" <?= (in_array(1, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">0h-1h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(2, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st2" value="0" data="2" <?= (in_array(2, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">1-2h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(3, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st3" value="0" data="3" <?= (in_array(3, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">2h-3h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(4, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st4" value="0" data="4" <?= (in_array(4, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">3h-4h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(5, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st5" value="0" data="5" <?= (in_array(5, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">4h-5h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(6, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st6" value="0" data="6" <?= (in_array(6, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">5h-6h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(7, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st7" value="0" data="7" <?= (in_array(7, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">6h-7h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(8, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st8" value="0" data="8" <?= (in_array(8, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">7h-8h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(9, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st9" value="0" data="9" <?= (in_array(9, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">8h-9h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(10, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st10" value="0" data="10" <?= (in_array(10, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">9h-10h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(11, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st10" value="0" data="11" <?= (in_array(11, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">10h-11h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(12, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st12" value="0" data="12" <?= (in_array(12, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">11h-12h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(13, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st13" value="0" data="13" <?= (in_array(13, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">12h-13h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(14, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st14" value="0" data="14" <?= (in_array(14, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">13h-14h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(15, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st15" value="0" data="15" <?= (in_array(15, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">14h-15h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(16, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st16" value="0" data="16" <?= (in_array(16, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">15h-16h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(17, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st17" value="0" data="17" <?= (in_array(17, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">16h-17h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(18, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st18" value="0" data="18" <?= (in_array(18, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">17h-18h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(19, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st19" value="0" data="19" <?= (in_array(19, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">18h-19h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(20, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st20" value="0" data="20" <?= (in_array(20, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">19h-20h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(21, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st21" value="0" data="21" <?= (in_array(21, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">20h-21h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(22, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st22" value="0" data="22" <?= (in_array(22, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">21h-22h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(23, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st23" value="0" data="23" <?= (in_array(23, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">22h-23h</div>
                </div>
            </label>
            <label class="hour-day <?= (in_array(24, $day)) ? "selected" : "" ?>">
                <input type="checkbox" class="checkbox" name="st1" id="st24" value="0" data="24" <?= (in_array(24, $day)) ? "checked" : "" ?>>
                <div class="option_inner">
                    <div class="name">23h-00h</div>
                </div>
            </label>
        </div>
    </div>
    <?php } ?>
    <div class="so-ngay">
        <p class="ngay-ghim">Số ngày <?=($row_ghim['new_day_tin'] != '')?"đẩy":"ghim"?> tin</p>
        <p class="color_cam"><?= $so_ngay_ghim ?></p>
    </div>
    <div class="box-noi-ghim">
        <div class="font slcNoiGhim" data="">Nơi <?=($row_ghim['new_day_tin'] != '')?"đẩy":"ghim"?>: <span><?= $noi_ghim ?></span></div>
        <?php if ($row_ghim['new_day_tin'] != ''){
            if (count($day) == 24){
                $thoigian_ghim = "Cả ngày trong ". $so_ngay_ghim . "ngày";
            }else{
                $ghim_tg = [];
                foreach ($day as $key => $value) {
                    $ghim_tg[] = (intval($value) - 1).'h-'.$value.'h';
                }
        
                $thoigian_ghim = implode(', ', $ghim_tg) ." trong ". $so_ngay_ghim . " ngày";
            }
        ?>
            <div class="font slcHour">Thời gian đẩy: <span><?=$thoigian_ghim?></span></div>
            <div class="font">Thời gian bắt đầu đẩy: <span><?=(intval($day[0]) - 1)?>h-<?=$day[0]?>h ngày <?= date('d/m/Y', $row_ghim['ngay_bdghim']) ?></span></div>
        <?php }else{ ?>
            <div class="font slcHour">Thời gian ghim: <span><?= $so_ngay_ghim ?> ngày</span></div>
            <div class="font">Thời gian bắt đầu ghim: <span><?=date('H:i:s d/m/Y',$row_ghim['thoigian_bdghim'])?></span></div>
        <?php } ?>
    </div>
<? } ?>