<?
include("config.php");
$id = getValue('id', 'int', 'POST', 0);
$id_stt = getValue('id_stt', 'int', 'POST', 0);
$id_loai = getValue('id_loai', 'int', 'POST', 0);
$id_nhomsp = getValue('id_nhomsp', 'int', 'POST', 0);
$query = new db_query("SELECT new.`new_id`, `new_title`, `new_money`, `gia_kt`, `new_cate_id`, `new_image`, `new_unit`, `new_type`, `chotang_mphi`,
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
WHERE new.`new_id` = '$id' ");
$ressult = mysql_fetch_assoc($query->result);



$img_tdnb = $ressult['new_image'];
$img_tdnb1 = explode(';', $img_tdnb);
$arr = array(
    1 => 'VNĐ',
    2 => 'USD',
    3 => 'EURO'
);
?>
<div class="product_sp product_ss" data="<?= $id_stt ?>" data-id="<?= $id ?>" data-dm="<?= $ressult['new_cate_id'] ?>" data-type="<?= $ressult['new_type'] ?>" data-loai="<?= $ressult['loai_sp'] ?>" data-nhom="<?= $ressult['nhom_sp'] ?>">
    <div class=" img_product">
        <div class="img_sp"><img src="<?= $img_tdnb1[0] ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`"></div>
        <div onclick="close_product(this)" class="icon_close"><img src="/images/anh_moi/icon-delete.png" alt=""></div>
    </div>
    <a href="/<?= replaceTitle($ressult['new_title']) ?>-c<?= $ressult['new_id'] ?>.html" class="text_product">
        <?= $ressult['new_title'] ?>
    </a>
    <? if ($ressult['new_type'] == 1 || $ressult['new_type'] == 3) { ?>
        <? if ($ressult['chotang_mphi'] == 1) { ?>
            <div class="price_product">Cho tặng miễn phí</div>
        <? } else { ?>
            <? if ($ressult['new_money'] == 0) { ?>
                <div class="price_product">Liên hệ người bán</div>
            <? } else { ?>
                <div class="price_product"><?= number_format($ressult['new_money']) ?> <?= $arr[$ressult['new_unit']] ?></div>
        <? }
        } ?>
    <? } elseif ($ressult['new_type'] == 2) { ?>
        <div class="price_product"><?= number_format($ressult['new_money']) ?> <?= $arr[$ressult['new_unit']] ?> - <?= number_format($ressult['gia_kt']) ?> <?= $arr[$ressult['new_unit']] ?></div>
    <? } ?>
</div>