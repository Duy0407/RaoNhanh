<?
include("config.php");
$id_dm = getValue('id', 'int', 'POST', 0);
$pbiet = getValue('pbiet', 'int', 'POST', 0);
if ($id_dm != 0 && $pbiet != 0) {
    $list_dmc = new db_query("SELECT `cat_id`, `cat_name`, `cat_parent_id` FROM `category` WHERE `cat_parent_id` = $id_dm AND `cat_active` = 1 ");
    $row_dmc = $list_dmc->result_array(); ?>
    <? if ($pbiet == 2) { ?>
        <div class="hd_modal_header hd-disflex hd-align-center">
            <div class="tro-ve-dmuc-tdang hd_cspointer" onclick="close_dmuctin()">
                <img src="../images/hd-mui-ten-tro-ve.svg" alt="tắt đang tin danh mục" />
            </div>
            <p class="modal_p_header font-16 liheght-18 hd-clor-white">
                <? if ($id_dm != 119) { ?>
                    Tin đăng <?= $db_cat1[$id_dm]['cat_name'] ?>
                <? } else { ?>
                    Bạn đang muốn?
                <? } ?>
            </p>
            <div class="tat-dang-tin-md hd_cspointer" onclick="close_dmuctin()">
                <img src="../images/hd-x-icon.svg" alt="tắt đang tin danh mục" />
            </div>
        </div>
        <ul class="ul_hd_modal_do_dt hd-padding-20">
            <? foreach ($row_dmc as $key => $row1) { ?>
                <li class="hd-disflex hd-align-center" onclick="window.location.href='/<?= check_ddan($row1['cat_id']) ?>'">
                    <span><?= $row1['cat_name'] ?></span>
                    <span><img src="../images/hd_arrow_down.svg"></span>
                </li>
            <? };
            unset($key, $row1); ?>
        </ul>
    <? } else if ($pbiet == 1) { ?>
        <div class="hd_modal_header hd-disflex hd-align-center">
            <div class="tro-ve-dmuc-tdang hd_cspointer" onclick="close_dmuctin()">
                <img src="../images/hd-mui-ten-tro-ve.svg" alt="tắt đang tin danh mục" />
            </div>
            <p class="modal_p_header font-16 liheght-18 hd-clor-white">Tin đăng <?= $db_cat1[$id_dm]['cat_name'] ?></p>
            <div class="tat-dang-tin-md hd_cspointer" onclick="close_dmuctin()">
                <img src="../images/hd-x-icon.svg" alt="tắt đang tin danh mục" />
            </div>
        </div>
        <ul class="ul_hd_modal_do_dt hd-padding-20">
            <? foreach ($row_dmc as $key => $row1) { ?>
                <li class="hd-disflex hd-align-center" onclick="window.location.href='/dang-tin-mua-d<?= $row1['cat_id'] ?>.html'">
                    <span><?= $row1['cat_name'] ?></span>
                    <span><img src="../images/hd_arrow_down.svg"></span>
                </li>
            <? };
            unset($key, $row1); ?>
        </ul>
    <? } ?>
<? } ?>