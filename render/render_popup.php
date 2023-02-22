<?
include("config.php");
$id = getValue('id', 'int', 'POST', '');
$id_dm = getValue('id_dm', 'int', 'POST', '');
$id_type = getvalue('id_type', 'int', 'POST', '');
$id_nhomsp = getvalue('id_nhomsp', 'int', 'POST', '');
$id_user = getvalue('id_user', 'int', 'POST', '');
$id_loai = getvalue('id_loai', 'int', 'POST', '');
$page = getvalue('page', 'int', 'POST', 1);
// echo $id_loai;
// $query = new db_query("SELECT `id`, `new_id`, `new_type`, `user_id`, `type`, `cat_id`, `loai_sp`, `nhom_sp` FROM `bang_so_sanh` WHERE cat_id = $id_dm AND new_id != '$id' AND new_type = $id_type AND loai_sp = $id_loai AND nhom_sp = $id_nhomsp ");
// $result = $query->result_array();
// foreach ($result as $val) {
//     // $arrId[] = $val['new_id'];
//     $arr_item = [];
//     $arr_item['new_id'] = $val['new_id'];
//     $arr_item['loai_sp'] = $val['loai_sp'];
//     $arr_item['nhom_sp'] = $val['nhom_sp'];
//     $arr_item['new_type'] = $val['new_type'];
//     $arr_sp[] = $arr_item;
// }
// // echo '<pre>';
// // print_r($arr_sp);
// // echo '</pre>';

// $arrSoSanh = [];
// foreach ($arr_sp as $val) {
//     $querySp = new db_query("SELECT `new_id`, `new_title`, `new_money`, `gia_kt`, `new_user_id`, `new_image`, `new_cate_id`, `new_create_time`, `new_unit`, `new_type`, `dia_chi`,`chotang_mphi` FROM `new` WHERE new_id = ".$val['new_id']);
//     $resultSp = mysql_fetch_assoc($querySp->result);
//     $arrSoSanh[] = $resultSp;
// }

// $resultSp = mysql_fetch_assoc($querySp->result);
$arr = array(
    1 => 'VNĐ',
    2 => 'USD',
    3 => 'EURO'
);
$arrSoSanh = [];
$sql = "SELECT new.`new_id`, `new_title`, `new_money`, `gia_kt`, `new_user_id`, `new_image`, `new_cate_id`, `new_create_time`, `new_unit`, `new_type`, `dia_chi`,`chotang_mphi`,
CASE 
    WHEN `new_cate_id` = 6 OR `new_cate_id` = 7 OR `new_cate_id` = 35 OR `new_cate_id` = 36 OR `new_cate_id` = 99 THEN thiet_bi
    WHEN `new_cate_id` = 37 THEN link_kien_phu_kien
    WHEN `new_cate_id` = 110 OR `new_cate_id` = 111 OR `new_cate_id` = 112 OR `new_cate_id` = 113 THEN giong_thu_cung
    WHEN `new_cate_id` = 94 OR `new_cate_id` = 95 OR `new_cate_id` = 100 OR `new_cate_id` = 102 OR `new_cate_id` = 47 OR `new_cate_id` = 48 OR `new_cate_id` = 49 OR `new_cate_id` = 50 OR `new_cate_id` = 106 THEN loai_chung
    WHEN `new_cate_id` = 40 OR `new_cate_id` = 41 OR `new_cate_id` = 8 OR `new_cate_id` = 9 THEN loai_xe
    WHEN `new_cate_id` = 75 OR `new_cate_id` = 104 OR `new_cate_id` = 105 THEN mon_the_thao
    WHEN `new_cate_id` = 42 THEN loai_noithat
    WHEN `new_cate_id` = 39 THEN loai_phu_tung
    WHEN `new_cate_id` = 11 OR `new_cate_id` = 12 OR `new_cate_id` = 26 OR `new_cate_id` = 27 OR `new_cate_id` = 28 OR `new_cate_id` = 29 OR `new_cate_id` = 33 OR `new_cate_id` = 34 THEN can_ban_mua
    WHEN `new_cate_id` = 78 OR `new_cate_id` = 79 OR `new_cate_id` = 80 OR `new_cate_id` = 82 OR `new_cate_id` = 114 THEN nhom_sanpham
    WHEN `new_cate_id` = 118 OR `new_cate_id` = 81 OR `new_cate_id` = 108 OR `new_cate_id` = 109 OR `new_cate_id` = 63 THEN loai_sanpham
    WHEN `new_cate_id` = 57 OR `new_cate_id` = 56 OR `new_cate_id` = 59 OR `new_cate_id` = 58 THEN loai_thiet_bi
    WHEN `new_cate_id` = 61 THEN loai_hinh_sp
    ELSE 0
END AS loai_sp,
CASE 
    WHEN `new_cate_id` = 37 THEN loai_linhphu_kien
    WHEN ((`new_cate_id` = 75  OR `new_cate_id` = 105) AND mon_the_thao != 8) OR `new_cate_id` = 104 THEN loai_chung
    WHEN ((`new_cate_id` = 78 OR `new_cate_id` = 79 OR `new_cate_id` = 80 OR `new_cate_id` = 82) AND `nhom_sanpham` != 7 AND `nhom_sanpham` != 16 AND `nhom_sanpham` != 20 AND `nhom_sanpham` != 30) OR (`new_cate_id` = 57 AND loai_thiet_bi != 20) OR `new_cate_id` = 61 THEN loai_sanpham
    WHEN `new_cate_id` = 114 THEN giong_thu_cung
    ELSE 0
END AS nhom_sp
FROM `new` LEFT JOIN `new_description` ON new.new_id = new_description.new_id
WHERE new_buy_sell = 2 AND new_cate_id != 120 AND new_cate_id != 121";
if ($id > 0){
    $sql .= " AND new.new_id != $id AND new_cate_id = $id_dm
    HAVING loai_sp = $id_loai AND nhom_sp = $id_nhomsp";
}
$sql .= " ORDER BY new_update_time DESC";
$perpage = 10;
$start = ($page - 1)*$perpage;
$sql .= " LIMIT ".$start.", ".$perpage;
$querySp = new db_query($sql);

$arrSoSanh = $querySp->result_array();

?>

<? foreach ($arrSoSanh as $rows) :
    $img_tdnb = $rows['new_image'];
    $img_tdnb1 = explode(';', $img_tdnb);
    $img_tdnb2 = count($img_tdnb1); ?>
    <div data="<?= $rows['new_id'] ?>" class="box_item_product d_flex">
        <div class="img_content">
            <div class="img_item">
                <img src="<?= $img_tdnb1[0] ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
            </div>
            <div class="num_img">
                <? if ($img_tdnb2 > 1) { ?>
                    <img src="/images/anh_moi/may_anh.png" alt="">
                    <p class="count_img"><?= $img_tdnb2 ?></p>
                <? } ?>
            </div>
        </div>
        <div class="text_content">
            <a href="/<?= replaceTitle($rows['new_title']) ?>-c<?= $rows['new_id'] ?>.html" class="text_top"><?= $rows['new_title'] ?></a>
            <div class="time_text"> <?
                                    $kc = time() - $rows['new_create_time'];
                                    ?>
                <?php if ($kc < 60) : ?><?= $kc ?> giây trước<?php endif ?>
                <?php if ($kc >= 60 && $kc < 3600) : $minute = floor($kc / 60) ?><?= $minute ?> phút trước<?php endif ?>
                <?php if ($kc >= 3600 && $kc < 86400) : $hour = floor($kc / 3600) ?><?= $hour ?> giờ trước<?php endif ?>
                <?php if ($kc >= 86400 && $kc < 2592000) : $day = floor($kc / 86400) ?><?= $day ?> ngày trước<?php endif ?>
                <?php if ($kc >= 2592000 && $kc < 77760000) : $month = floor($kc / 2592000) ?><?= $month ?> tháng trước<?php endif ?>
                <?php if ($kc >= 77760000 && $kc < 933120000) : $year = floor($kc / 77760000) ?><?= $year ?> năm trước<?php endif ?></div>
            <div class="adress_text"><?= $rows['dia_chi'] ?></div>
            <div class="combo_price d_flex">
                <? if ($rows['new_type'] != 2) { ?>
                    <? if ($rows['chotang_mphi'] == 1) { ?>
                        <div class="price_product">Cho tặng miễn phí</div>
                    <? } else { ?>
                        <? if ($rows['new_money'] == 0) { ?>
                            <div class="price_product">Liên hệ người bán</div>
                        <? } else { ?>
                            <div class="price_product"><?= number_format($rows['new_money']) ?> <?= $arr[$rows['new_unit']] ?></div>
                    <? }
                    } ?>
                <? } else { ?>
                    <span><?= number_format($rows['new_money']) ?> <?= $arr[$rows['new_unit']] ?> - <?= number_format($rows['gia_kt']) ?> <?= $arr[$rows['new_unit']] ?></span>
                <? } ?>
                <div class="sosanh_item d_flex" data-id="<?= $rows['new_id'] ?>" data5="<?= $rows['nhom_sp'] ?>" data4="<?= $rows['new_user_id'] ?>" data3="<?= $rows['loai_sp'] ?>" data1="<?= $rows['new_type']  ?>" data2="<?= $rows['new_cate_id'] ?>" onclick="popup_ss(this)">
                    <img src="/images/anh_moi/icon_add.png" alt="">
                    <p class="text_xanh">So sánh</p>
                </div>
            </div>
        </div>
    </div>
    <div class="mg_20"></div>
<? endforeach ?>