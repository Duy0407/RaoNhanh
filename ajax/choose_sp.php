<?
include("config.php");
$id = getValue('id', 'int', 'POST', 0);
$id_stt = getValue('id_stt', 'int', 'POST', 0);
$query = new db_query("SELECT n.`new_id`, n.`new_title`, n.`new_money`, n.`gia_kt`, n.`new_cate_id`, n.`new_image`, n.`new_unit`, n.`new_type`, n.`chotang_mphi`, b.`loai_sp`, b.`nhom_sp` FROM `new` AS n INNER JOIN `bang_so_sanh` AS b ON n.`new_id` = b.`new_id` WHERE n.`new_id` = '$id' ");
$ressult = mysql_fetch_assoc($query->result);
$arr = array(
    1 => 'VNĐ',
    2 => 'USD',
    3 => 'EURO'
);
$img_tdnb = $ressult['new_image'];
$img_tdnb1 = explode(';', $img_tdnb);
?>

<div class="product_sp product_ss" data="<?= $id_stt ?>" data-id="<?= $id ?>" data-dm="<?= $ressult['new_cate_id'] ?>" data-type="<?= $ressult['new_type'] ?>" data-loai="<?= $ressult['loai_sp'] ?>" data-nhom="<?= $ressult['nhom_sp'] ?>">
    <div class=" img_product">
        <div class="img_sp"><img src="<?= $img_tdnb1[0] ?>" alt=""></div>
        <div onclick="close_product(this, <?= $id ?>)" class="icon_close"><img src="/images/anh_moi/icon-delete.png" alt=""></div>
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