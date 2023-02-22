<!------------------------MODAL tin đăng danh mục-------------------------------------->
<div class="hd_modal_rn hd_modal_tindang hd_modal_danhmuc_td">
    <div class="hd_content_rn hd_content_curspoint font-16 liheght-18">
        <div class="hd_modal_header hd-disflex hd-align-center">
            <p class="modal_p_header font-16 liheght-18 hd-clor-white">Chọn danh mục tin đăng</p>
            <div class="tat-dang-tin-md hd_cspointer">
                <img src="../images/hd-x-icon.svg" alt="tắt đang tin danh mục" />
            </div>
        </div>
        <ul class="ul_hd_modal_danhmuc_td hd-padding-20">
            <? foreach ($db_cat1 as $key => $row_dtd) {
                if (in_array($row_dtd['cat_id'], $bo_dtinmua) == false) { ?>
                    <li class="hd-disflex hd-align-center <?= ($row_dtd['cat_id'] == 76) ? '' : "md-do-dien-tu" ?>" data="<?= $row_dtd['cat_id'] ?>" data1="1" <?= ($row_dtd['cat_id'] == 76) ? 'onclick="clk_ddan_dlich(this)"' : "" ?> <?= ($row_dtd['cat_id'] != 76) ? 'onclick="dmuc_con_muaban(this)"' : "" ?>>
                        <span><img src="<?= $row_dtd['cat_img3'] ?>"></span>
                        <span><?= $row_dtd['cat_name'] ?></span>
                        <span><img src="../images/hd_arrow_down.svg"></span>
                    </li>
            <? }
            };unset($key, $row_dtd); ?>
        </ul>
    </div>
</div>
<? include 'md_do_dien_tu.php' ?>