<?
include("config.php");
$id_city = getValue('id_city', 'int', 'POST', 0);
$id_cate = getValue('id_cate', 'int', 'POST', 0);
$cl_sql = getValue('cl_sql', 'str', 'POST', '');
$cl_cauqr = getValue('cl_cauqr', 'str', 'POST', '');
$cl_sql1 = getValue('cl_sql1', 'str', 'POST', '');
$page = getValue('page', 'int', 'POST', 0);
$curr = getValue('is_loadh', 'int', 'POST', 0);

$start = ($page - 1) * $curr;
$limit = " LIMIT $start,$curr ";

if ($id_cate == 0 && $id_city == 0) {

    $db_qra = new db_query("SELECT new.`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_city`, `dia_chi`, `new_money`, `gia_kt`, `new_view_count`,
                            `new_unit`, `new_image`, `chotang_mphi`, `new_update_time`, new_description, new_user_id, usc_name
                            FROM new LEFT JOIN new_description ON new.new_id = new_description.new_id
                            LEFT JOIN user ON new.new_user_id = user.usc_id
                            WHERE new_buy_sell = 2 and new_active = 1 " . $cl_sql . " " . $cl_sql1 . " " . $limit);
} else if ($id_cate != 0 && $id_city == 0) {

    $db_qra = new db_query("SELECT new.`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_city`, `dia_chi`, `new_money`, `gia_kt`, `new_view_count`,
                            `new_unit`, `new_image`, `chotang_mphi`, `new_update_time`, new_description, new_user_id, usc_name  FROM new
                            LEFT JOIN new_description ON new.new_id = new_description.new_id
                            LEFT JOIN category ON new.new_cate_id = category.cat_id
                            LEFT JOIN user ON new.new_user_id = user.usc_id
                            WHERE new_buy_sell = 2 AND new_active = 1 " . $cl_sql . "  AND " . $cl_cauqr . " " . $cl_sql1 . " " . $limit);
} else if ($id_cate == 0 && $id_city != 0) {

    $db_qra = new db_query("SELECT new.`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_city`, `dia_chi`, `new_money`, `gia_kt`, `new_view_count`,
                            `new_unit`, `new_image`, `chotang_mphi`, `new_update_time`, new_description, new_user_id, usc_name  FROM new
                            LEFT JOIN new_description ON new.new_id = new_description.new_id
                            LEFT JOIN user ON new.new_user_id = user.usc_id
                            WHERE new_buy_sell = 2 AND new_active = 1 AND new_city = " . $id_city . " " . $cl_sql . " " . $cl_sql1 . " " . $limit);
} else if ($id_cate != 0 && $id_city != 0) {

    $db_qra = new db_query("SELECT new.`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_city`, `dia_chi`, `new_money`, `gia_kt`, `new_view_count`,
                            `new_unit`, `new_image`, `chotang_mphi`, `new_update_time`, new_description, new_user_id, usc_name  FROM new
                            LEFT JOIN new_description ON new.new_id = new_description.new_id
                            LEFT JOIN category ON new.new_cate_id = category.cat_id
                            LEFT JOIN user ON new.new_user_id = user.usc_id
                            WHERE new_buy_sell = 2 AND new_active = 1 " . $cl_sql . " AND new_city = " . $id_city . "  AND " . $cl_cauqr . " " . $cl_sql1 . " " . $limit);
}

while ($row_db = mysql_fetch_assoc($db_qra->result)) {
    $link_url = ($row_db['link_title'] != '') ? replaceTitle($row_db['link_title']) : replaceTitle($row_db['new_title']);  ?>
    <div class="content_td">
        <div class="tin">
            <div class="chitiet_tin d_flex">
                <div class="img_tin">
                    <img class="img_tin_2" onerror="this.onerror=null;this.src='/images/img_new/avt_daidien3.png'" src="<?= explode(';', $row_db['new_image'])[0] ?>">
                    <div class="d_flex j_bw">
                        <a class="btn_chat item_chat" id-chat="<?= $row_db['chat365_id'] ?>">
                            <img src="/images/anh_moi/chat365.svg">
                            <span>Chat</span>
                        </a>
                        <p class="favo"></p>
                    </div>
                </div>
                <div class="info">
                    <div class="title">
                        <div class="title-1">
                            <span class="font_w500 font_s16">
                                <a href="/<?= $link_url . '-c' . $row_db['new_id'] . '.html' ?>">
                                    <?= $row_db['new_title'] ?>
                                </a></span>
                            <button class="favo"></button>
                        </div>
                        <div class="people">
                            <span><?= $row_db['usc_name'] ?></span>
                        </div>
                    </div>
                    <div class="info-2">
                        <div class="info-2-child cost">
                            <span>
                                <? if ($row_db['new_cate_id'] != 120) {
                                    if ($row_db['chotang_mphi'] == 1) {
                                        echo "Cho tặng miễn phí";
                                    } else if ($row_db['new_money'] > 0) {
                                        echo number_format($row_db['new_money']) . ' ' . $arr_dvtien[$row_db['new_unit']];
                                    } else if ($row_db['new_money'] == 0 || $row_db['new_money'] == "") {
                                        echo "Liên hệ người bán";
                                    }
                                } else {
                                    if ($row_db['new_money'] != 0 && $row_db['gia_kt'] != 0) {
                                        echo number_format($row_db['new_money']) . ' - ' . number_format($row_db['gia_kt']) . ' ' . $arr_dvtien[$row_db['new_unit']];
                                    } else if ($row_db['new_money'] != 0 && $row_db['gia_kt'] == 0) {
                                        echo 'Từ ' . number_format($row_db['new_money']) . ' ' . $arr_dvtien[$row_db['new_unit']];
                                    } else if ($row_db['new_money'] == 0 && $row_db['gia_kt'] != 0) {
                                        echo 'Đến ' . number_format($row_db['gia_kt']) . ' ' . $arr_dvtien[$row_db['new_unit']];
                                    } else {
                                        echo "Thỏa thuận";
                                    }
                                } ?>
                            </span>
                        </div>
                        <div class="info-2-child add">
                            <span><?= $row_db['dia_chi'] ?></span>
                        </div>
                        <div class="info-2-child time">
                            <span>Đăng: <?= lay_tgian($row_db['new_update_time']) ?></span>
                        </div>
                        <div class="info-2-child pay">
                            <span>Đảm bảo thanh toán: có</span>
                        </div>
                    </div>
                    <div class="mota">
                        <p class="mota_child"><?= $row_db['new_description'] ?></p>
                    </div>
                </div>
            </div>
            <? include('../includes/comment_tk/inc_comment.php') ?>
        </div>
    </div>
<? }
