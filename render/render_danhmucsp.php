<?
include("config.php");
$id_dm = getvalue('id_dm', 'int', 'POST', '');
$id_type = getvalue('id_type', 'int', 'POST', '');
$id_loai = getvalue('id_loai', 'int', 'POST', '');
$id_user = getvalue('id_user', 'int', 'POST', '');
$id_nhomsp = getvalue('id_nhomsp', 'int', 'POST', '');
$id = getvalue('id', 'int', 'POST', '');
// echo $id_type;
$arr = array(
    1 => 'VNĐ',
    2 => 'USD',
    3 => 'EURO'
);

$sql_ss1 = "SELECT b.`id`, b.`new_id`, b.`new_type`, b.`cat_id`, b.`loai_sp`, b.`nhom_sp`, n.`new_title`, n.`new_money`, n.`gia_kt`,
                        n.`new_cate_id`, n.`new_image`, n.`new_unit`, n.`new_type`, n.`new_user_id`, n.`chotang_mphi` FROM `bang_so_sanh` AS b 
                        INNER JOIN `new` AS n ON b.`new_id` = n.`new_id` WHERE b.`cat_id` = $id_dm AND  b.`new_id` != $id 
                        AND  b.`loai_sp` = $id_loai AND n.`new_user_id` = $id_user AND b.`nhom_sp` = $id_nhomsp ";
if($id_type == 1 || $id_type == 3){
    $sql = 'AND (b.`new_type` = 1 OR b.`new_type` = 3)';

}elseif($id_type == 2){
    $sql = 'AND b.`new_type` = 2';
}
$sql_ss1 .= $sql;
$sql_ss = new db_query($sql_ss1);
// echo $sql_ss1;


$vals = $sql_ss->result_array();
foreach ($vals as $val) {

    $img_tdnb = $val['new_image'];
    $img_tdnb1 = explode(',', $img_tdnb);
?>

    <div data-id="<?= $val['new_id'] ?>" data5="<?= $val['nhom_sp'] ?>" data4="<?= $val['new_user_id'] ?>" data3="<?= $val['loai_sp'] ?>" data2="<?= $val['new_cate_id'] ?>" data1="<?= $val['new_type'] ?>" class="product_sp pd_t_50 product_render">
        <div class="img_product mg_l30" onclick="soSanhSP(this)"><img src="/pictures/<?= $img_tdnb1[0] ?>" alt=""></div>
        <a href="/<?= replaceTitle($val['new_title']) ?>-c<?= $val['new_id'] ?>.html" class="text_product">
            <?= $val['new_title'] ?>
        </a>
        <? if ($val['new_type'] == 1 || $val['new_type'] == 3) { ?>
            <? if ($val['chotang_mphi'] == 1) { ?>
                <div class="price_product">Cho tặng miễn phí</div>
            <? } else { ?>
                <? if ($val['new_money'] == 0) { ?>
                    <div class="price_product">Liên hệ người bán</div>
                <? } else { ?>
                    <div class="price_product"><?= number_format($val['new_money']) ?> <?= $arr[$val['new_unit']] ?></div>
            <? }
            } ?>
        <? } elseif ($val['new_type'] == 2) { ?>
            <div class="price_product"><?= number_format($val['new_money']) ?> <?= $arr[$val['new_unit']] ?> - <?= number_format($val['gia_kt']) ?> <?= $arr[$val['new_unit']] ?></div>
        <? } ?>
    </div>
<?
}
?>