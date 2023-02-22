<?
include("config.php");
$cate_cha = new db_query("SELECT `cat_id`,`cat_name`,`cat_img3` FROM `category` WHERE `cat_parent_id` = 0");
?>
<!------------------------MODAL tin đăng danh mục-------------------------------------->
<div class="hd_modal_rn hd_modal_tindang hd_modal_danhmuc_td hd_modal_danhmuc_td_df">
    <div class="hd_content_rn hd_content_curspoint font-16 liheght-18">
        <div class="hd_modal_header hd-disflex hd-align-center">
            <p class="modal_p_header font-16 liheght-18 hd-clor-white">Chọn danh mục tin đăng</p>
            <div class="tat-dang-tin-md hd_cspointer click_dong_dm">
                <img src="/images/hd-x-icon.svg" alt="tắt đang tin danh mục" />
            </div>
        </div>
        <ul class="ul_hd_modal_danhmuc_td hd-padding-20">
            <?while ($show_cate = (mysql_fetch_assoc($cate_cha->result))){?>
                <?php if ($show_cate['cat_id']==19 && ($us_type !=2 && $us_type !=0) ):  continue; ?><?php endif ?>
                <?php if ($show_cate['cat_id']==24 && ($us_type !=2 && $us_type !=0) ):  continue; ?><?php endif ?>
                <?php if ($show_cate['cat_id']==76 && ($us_type !=2 && $us_type !=0) ):  continue; ?><?php endif ?>

                <li class="hd-disflex hd-align-center click_parent_<?= $show_cate['cat_id']?>" data="<?= $show_cate['cat_id']?>" data-name='<?= $show_cate['cat_name']?>'  onclick="show_ct_con_int(<?= $show_cate['cat_id']?>)" >
                    <span><img src="<?= $show_cate['cat_img3']?>"></span>
                    <span><?= $show_cate['cat_name']?></span>
                    <span><img src="/images/hd_arrow_down.svg"></span>
                </li>
            <?}?>
        </ul>
    </div>
</div>

<!------------------------MODAL Tin đăng Con-------------------------------------->
<div class="hd_modal_rn hd_modal_tindang modal_con_td hd_modal_do_dt hd_modal_do_dt_df">
    <div class="hd_content_rn hd_content_curspoint font-16 liheght-18">
        <div class="hd_modal_header hd-disflex hd-align-center">
            <div class="tro-ve-dmuc-tdang hd_cspointer cate_con_back">
                <img src="/images/hd-mui-ten-tro-ve.svg" alt="tắt đang tin danh mục" />
            </div>
            <p class="modal_p_header font-16 liheght-18 hd-clor-white doi_ten">Tin đăng Đồ điện tử</p>
            <div class="tat-dang-tin-md hd_cspointer close_catecon">
                <img src="/images/hd-x-icon.svg" alt="tắt đang tin danh mục" />
            </div>
        </div>
        <div class="show_arr"></div>
    </div>
</div>