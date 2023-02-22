<?

include("config.php");
include("../functions/device_check.php");
$id = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
}
include("../includes/inc_new/inc_sql_detail_post.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/slick.css" />
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/chi_tiet_tin_ban.css" />
</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <div class="all_content_detail_post">
        <div class="post_content_1 d_flex j_s_bw">
            <div class="post_main">
                <div class="illustration bd_r_10 p_20 bg_w">
                    <ul class="illustration_t">
                        <li>Danh mục</li>
                        <? if ($rs_ctsp_new['new_cate_id'] != 120 && $rs_ctsp_new['new_cate_id'] != 121) { ?>
                            <? if ($cate_pas != 0) { ?>
                                <li><a href="/mua-ban/<?= $cate_pas ?>/<?= replaceTitle($arr_cate[$cate_pas]['cat_name']) ?>.html"><?= $arr_cate[$cate_pas]['cat_name'] ?></a></li>
                            <? } ?>
                            <li><a href="/mua-ban/<?= $rs_ctsp_new['new_cate_id'] ?>/<?= replaceTitle($arr_cate[$rs_ctsp_new['new_cate_id']]['cat_name']) ?>.html"><?= $db_cattk[$rs_ctsp_new['new_cate_id']] ?></a></li>
                        <? } else if ($rs_ctsp_new['new_cate_id'] == 120 || $rs_ctsp_new['new_cate_id'] == 121) { ?>
                            <? if ($rs_ctsp_new['new_cate_id'] == 120) { ?>
                                <li><a href="/viec-lam.html">Tìm việc làm</a></li>
                                <li>
                                    <? // có sãn chữ việc làm
                                    if (in_array($rs_ctsp_new_des['new_job_type'], $nganhnghe_cvl)) { ?>
                                        <a href="/<?= replaceTitle($db_cat_vl[$rs_ctsp_new_des['new_job_type']]) ?>-n<?= $rs_ctsp_new_des['new_job_type'] ?>t0.html">
                                            <?= $db_cat_vl[$rs_ctsp_new_des['new_job_type']] ?>
                                        </a>
                                    <? }
                                    // có chữ tìm trước chữ việc làm
                                    else if ($rs_ctsp_new_des['new_job_type'] == 87) { ?>
                                        <a href="/viec-lam-them-n<?= $rs_ctsp_new_des['new_job_type'] ?>t0.html">
                                            <?= $db_cat_vl[$rs_ctsp_new_des['new_job_type']] ?>
                                        </a>
                                    <? } else { ?>
                                        <a href="/viec-lam-<?= replaceTitle($db_cat_vl[$rs_ctsp_new_des['new_job_type']]) ?>-n<?= $rs_ctsp_new_des['new_job_type'] ?>t0.html">
                                            <?= $db_cat_vl[$rs_ctsp_new_des['new_job_type']] ?>
                                        </a>
                                    <? } ?>
                                </li>
                            <? }
                            if ($rs_ctsp_new['new_cate_id'] == 121) { ?>
                                <li><a href="/tim-mua-tim-ung-vien-d121.html">Tìm ứng viên</a></li>
                                <li><a href="/ung-vien-<?= replaceTitle($db_cat_vl[$rs_ctsp_new_des['new_job_type']]) ?>-n<?= $rs_ctsp_new_des['new_job_type'] ?>.html"><?= $db_cat_vl[$rs_ctsp_new_des['new_job_type']] ?></a></li>
                            <? } ?>

                        <? } ?>
                    </ul>
                    <div class="il_image d_flex j_s_bw mt_20">
                        <?
                        $new_image = $rs_ctsp_new['new_image'];
                        $new_image = explode(';', $new_image);
                        ?>
                        <div class="more_image d_flex f_column <?=(count($new_image) > 3) ? "j_s_bw" : "" ?> position_r">
                            <? for ($i = 0; $i < count($new_image); $i++) { 
                                if($i > 3){ break; }
                                ?>
                                <img class="more_img_child bd_r_10 d_flex oj_fit_c <?=(count($new_image) <= 3) ? "mb_10" : "" ?> <?=($i == 3) ? "filter_b" : ""?>" onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= $new_image[$i] ?>" alt="<?= $rs_ctsp_new['new_title'] ?>">
                                <? if($i == 3){?>
                                    <p class="see_more_img position_a">+<?= (count($new_image) - 3) ?></p>
                                <? } ?>
                            <? } ?>
                        </div>
                        <div class="main_image d_flex">
                            <? for ($i = 0; $i < count($new_image); $i++) { ?>
                            <img class="main_img d_flex oj_fit_c w_100 bd_r_10"  onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $new_image[$i])  ?>" alt="<?= $rs_ctsp_new['new_title'] ?>" alt="">
                            <? } ?>
                        </div>
                    </div>
                    <p class="title_post mt_20"><?=$rs_ctsp_new['new_title']?></p>
                    <div class="d_flex j_s_bw flex_nw mt_10">
                        <div class="cost d_flex flex_nw">
                            <span class="cost_num">
                            <? if ($rs_ctsp_new['new_cate_id'] != 120 && $rs_ctsp_new['new_cate_id'] != 121) {
                                if ($chotang_mphi == 1) { 
                                    echo "Cho tặng miễn phí";
                                } else if ($rs_ctsp_new['new_money'] > 0) { 
                                    echo number_format($rs_ctsp_new['new_money']).' '.$arr_dvtien[$rs_ctsp_new['new_unit']];
                                } else if ($rs_ctsp_new['new_money'] <= 0) {
                                    echo "Liên hệ để hỏi giá";
                                }
                            } ?>
                            </span>
                            <!-- <li class="per ml_20">40m2</li> -->
                        </div>
                        <button class="favor_btn d_flex bd_0 bg_w align_i_c color_r"><img class="mr_10" src="../images/chi_tiet_tin_ban/favor.svg" alt="">Yêu thích</button>
                    </div>
                    <p class="name_com d_flex mt_10"><img class="mr_10" src="../images/chi_tiet_tin_ban/City.svg" alt=""><?= $rs_ctsp_new_des['ten_toa_nha'] ?></p>
                    <p class="d_flex mt_10"><img class="mr_10" src="../images/chi_tiet_tin_ban/location.svg" alt="">
                        <?= ($rs_ctsp_new['new_sonha'] != "") ? $rs_ctsp_new['new_sonha'] . ", " : "" ?>
                        <?= ($rs_ctsp_new['phuong_xa'] != 0) ? $db_pxa[$rs_ctsp_new['phuong_xa']]['prefix'] . ' ' . $db_pxa[$rs_ctsp_new['phuong_xa']]['name'] . ", " : "" ?>
                        <a href="/mua-ban/rao-vat/<?= $rs_ctsp_new['new_city'] ?>/<?= replaceTitle($arrcity[$rs_ctsp_new['new_city']]['cit_name']) ?>.html??fill=1&district=<?= $rs_ctsp_new['quan_huyen'] ?>"><?= ($rs_ctsp_new['quan_huyen'] != 0) ? $arrcity2[$rs_ctsp_new['quan_huyen']]['cit_name'] . ", " : "" ?></a>
                        <a href="/mua-ban/rao-vat/<?= $rs_ctsp_new['new_city'] ?>/<?= replaceTitle($arrcity[$rs_ctsp_new['new_city']]['cit_name']) ?>.html"><?= ($rs_ctsp_new['new_city'] != 0) ? $arrcity[$rs_ctsp_new['new_city']]['cit_name'] : "" ?></a>
                        <a class="ml_10 color_blue text_deco">Xem trên bản đồ</a>
                    </p>
                    <p class="d_flex mt_10"><img class="mr_10" src="../images/chi_tiet_tin_ban/timer.svg" alt="">Đăng <?= lay_tgian($rs_ctsp_new['new_create_time']) ?></p>
                    <div class="is_tab j_s_bw">
                        <a class="btn_chat_now d_flex align_i_c mt_10 color_white" href=""><img class="mr_10" src="../images/chi_tiet_tin_ban/chat_w.svg" alt="">Chat ngay</a>
                        <a class="btn_call d_flex align_i_c mt_10" href=""><img class="mr_10" src="../images/chi_tiet_tin_ban/call-calling.svg" alt="">Nhấn để hiện số</a>
                    </div>
                </div>
                <div class="info_post1 mt_20 p_20 bg_w">
                    <p class="detail_info_tit pl_10">Thông tin chi tiết</p>
                    <? include "../includes/chi_tiet_tin_ban/thong_tin_chi_tiet_tin.php" ?>
                </div>
                <div class="info_post2 p_20 bg_w">
                    <p class="detail_info_tit pl_10">Mô tả</p>
                    <p class="mota mt_20"><?=nl2br($rs_ctsp_new_des['new_description'])?></p>
                    <p class="mt_20">Số điện thoại liên hệ: <a class="color_orage text_deco" href=""><?= substr_replace($rs_user['usc_phone'], '*****', -5) ?> Bấm để xem thông tin</a></p>
                    <p class="mt_20">Email liên hệ: <a class="color_orage text_deco" href=""><?= substr_replace($rs_user['usc_email'], '*****', -15) ?> Bấm để xem thông tin</a></p>
                    <p class="mt_20">Địa chỉ liên hệ: <?=$rs_user['usc_address']?></p>
                </div>
                <? if ($rs_ctsp_new['new_ctiet_dmuc'] != '' && $rs_ctsp_new['new_ctiet_dmuc'] != 0) { ?>
                <div class="info_post3 p_20 bg_w">
                    <p class="detail_info_tit pl_10">Chi tiết danh mục</p>
                    <div class="all_tag d_flex flex_w">
                        <a href="/mua-ban-<?= replaceTitle($tags_tk1[$rs_ctsp_new['new_ctiet_dmuc']]) ?>-t<?= $rs_ctsp_new['new_ctiet_dmuc'] ?>.html" class="tag color_orage d_flex p_10 bd_r_10 mr_20 mt_20"><?= $tags_tk1[$rs_ctsp_new['new_ctiet_dmuc']] ?></a>
                    </div>
                </div>
                <? } ?>
            </div>
            <div class="post_sub">
                <div class="rate bd_r_10 bg_w">
                    <div class="p_20 rate_top">
                        <div class="info_user_post d_flex">
                            <div class="ava_rate mr_10">
                                <img class="ava" onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $usc_logo) ?>" alt="<?= $usc_name ?>" alt="no image">
                            </div>
                            <div class="info_rate">
                                <p class="name_user"><?= $usc_name ?></p>
                                <p class="role mt_5 color_grey">Tài khoản <?= $usc_type_ar[$usc_type] ?></p>
                                <p class="time mt_5 mb_5 color_grey">Tham gia: <?= $usc_time ?></p>
                                <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                    <? if ($id_user == $rs_ctsp_new['new_user_id']) { ?>
                                        <a href="<?php if ($rs_ctsp_new['new_type'] == 1) {
                                                    echo "/ho-so-nguoi-ban-ca-nhan.html";
                                                } else if ($rs_ctsp_new['new_type'] == 5) {
                                                    echo "/ho-so-gian-hang-cua-toi-trang-chu.html";
                                                } ?>" class="go_detail_user mt_5 color_r">Xem trang cá nhân</a>
                                    <? } else { ?>
                                        <? if ($rs_ctsp_new['new_type'] == 5) { ?>
                                            <a href="/gian-hang/<?= $rs_ctsp_new['new_user_id'] ?>/<?= replaceTitle($usc_store_name) ?>.html" class="go_detail_user mt_5 color_r">Xem trang cá nhân</a>
                                        <? } else if ($rs_ctsp_new['new_type'] == 1) { ?>
                                            <a href="/ca-nhan/<?= $rs_ctsp_new['new_user_id'] ?>/<?= replaceTitle($usc_name) ?>.html" class="go_detail_user mt_5 color_r">Xem trang cá nhân</a>
                                        <? } ?>
                                        <?
                                    }
                                } else {
                                    if ($rs_ctsp_new['new_type'] == 1) { ?>
                                        <a href="/ca-nhan/<?= $rs_ctsp_new['new_user_id'] ?>/<?= replaceTitle($usc_name) ?>.html" class="go_detail_user mt_5 color_r">Xem trang cá nhân</a>
                                    <? } else if ($rs_ctsp_new['new_type'] == 5) { ?>
                                        <a href="/gian-hang/<?= $rs_ctsp_new['new_user_id'] ?>/<?= replaceTitle($usc_store_name) ?>.html" class="go_detail_user mt_5 color_r">Xem trang cá nhân</a>
                                    <? } ?>
                                    
                                <? } ?>
                                <!-- <a class="go_detail_user mt_5 color_r">Xem trang cá nhân</a> -->
                            </div>
                        </div>
                        <div class="all_rate d_flex flex_nw mt_20">
                            <div class="rated rated1 d_flex f_column">
                                <p class="rated_tit color_grey2 text_c">Đánh giá</p>
                                <div class="df_5sao_to mt_10 ml_10">
                                    <div class="df_5sao position_r" style="width: <?= ($sun_sao / $cou_sao) * 20 ?>%">
                                        <div class="div5sao_df position_a">
                                            <img src="../images/anh_moi/5sao2.svg">
                                        </div>
                                    </div>
                                </div>
                                <!-- <img src="../images/anh_moi/5sao2.svg" height="20px" class="mt_10"> -->
                            </div>
                            <div class="rated1" style="border: 1px solid #999999;height: 35px;align-self: center;"></div>
                            <div class="rated rated2 d_flex f_column">
                                <p class="rated_tit color_grey2 text_c">Phản hồi chat</p>
                                <p class="percent text_c mt_10">87%</p>
                            </div>
                        </div>
                    </div>
                    <div class="p_20 rate_bot d_flex f_column align_i_c">
                        <img src="../images/chi_tiet_tin_ban/ma_qr.svg" alt="">
                        <p class="mt_10">Quét mã QR chat ngay</p>
                        <a href="<?= $link_chat ?>" class="btn_chat_now w_100 d_flex align_i_c mt_10" href=""><img class="mr_10" src="../images/chi_tiet_tin_ban/chat365_black.svg" alt="">Chat ngay</a>
                        <a class="btn_call w_100 d_flex align_i_c mt_10" href=""><img class="mr_10" src="../images/chi_tiet_tin_ban/call-calling.svg" alt="">Nhấn để hiện số</a>
                    </div>
                </div>
                <div class="client bd_r_10 bg_w mt_20">
                    <div class="tit_chat d_flex flex_nw">
                        <div class="tit_chat_left"></div>
                        <div class="tit_chat_mid">
                            <img width="30px" height="30px" src="/images/img_new/chaton.svg" style="margin: 5px;">
                            <p class="color_white align_s_c">KHÁCH HÀNG ONLINE</p>
                        </div>
                        <div class="tit_chat_right"></div>
                    </div>
                    <div class="more d_flex j_end position_r mt_20 mb_20">
                        <a class="color_orage">Xem Thêm<img class="position_a" src="/images/img_new/arrow-right.svg"></a>
                    </div>
                    <div class="w_100 list_client" id="list_chat2">
                    </div>
                </div>
            </div>
        </div>
        <div class="post_content_2 d_flex mt_20 f_column bd_r_10 bg_w">
            <div class="report d_flex p_20 w_100">
                <button class="btn_rp d_flex color_blue align_i_c bd_0 pl_20 pr_20 mr_20"><img class="mr_10" src="../images/chi_tiet_tin_ban/plus.svg" alt=""> So sánh</button>
                <button class="btn_rp d_flex color_blue align_i_c bd_0 pl_20 pr_20"><img class="mr_10" src="../images/chi_tiet_tin_ban/danger.svg" alt=""> Báo cáo tin</button>
            </div>
            <? include('../include/comment/inc_comment.php'); ?>
        </div>
        <div class="client is_tab bd_r_10 bg_w mt_20" style="display:none;">
            <div class="tit_chat d_flex flex_nw">
                <div class="tit_chat_left"></div>
                <div class="tit_chat_mid">
                    <img width="30px" height="30px" src="/images/img_new/chaton.svg" style="margin: 5px;">
                    <p class="color_white align_s_c">KHÁCH HÀNG ONLINE</p>
                </div>
                <div class="tit_chat_right"></div>
            </div>
            <div class="more d_flex j_end position_r mt_20 mb_20">
                <a class="color_orage">Xem Thêm<img class="position_a" src="/images/img_new/arrow-right.svg"></a>
            </div>
            <div class="w_100 list_client" id="list_chat">
            </div>
        </div>
        <div class="post_content_3 d_flex mt_20 f_column bd_r_10 bg_w">
            <p class="tdtt p_20">Tin đăng tương tự</p>
            <div class="posted d_flex flex_w j_s_bw pt_10 pb_20">
            <? if (mysql_num_rows($tindang_tt->result) > 0) {
                foreach ($qr_home as $tindang_tt_ok) {

                    $img = $tindang_tt_ok['new_image'];
                    $img_ok = explode(';', $img);
                    $img_count = count($img_ok);

                    $id_tin = $tindang_tt_ok['new_id'];
                    $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$id_user' AND `usc_type` = '$type_user'");
                    $check_num = mysql_num_rows($check->result); ?>
                    <div class="tdtt_content bd_r_10 mb_10">
                        <div class="ava_td position_r">
                            <? if ($img_count > 1) { ?>
                                <div class="num_ava_td position_a">
                                    <img src="/images/img_new/image.svg" alt="">
                                    <span class="color_white"><?=$img_count?></span>
                                </div>
                            <? } ?>
                            <button class="ava_td_btn"></button>
                            <div class="img_td_2">
                                <a href="/<?= replaceTitle($tindang_tt_ok['link_title']) ?>-c<?= $tindang_tt_ok['new_id'] ?>.html">
                                    <img class="bd_r_10 oj_fit_c" onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $img_ok[0])  ?>" alt="<?= $tindang_tt_ok['new_title'] ?>">
                                </a>
                            </div>
                            <p class="hoatdong_chat item_chat <?= (isset($qr_gtri[$tindang_tt_ok['chat365_id']]) && str_replace($boqua, '', $qr_gtri[$tindang_tt_ok['chat365_id']]) != "") ? "co_ddong" : "" ?>" id-chat="<?= $item_td2['chat365_id'] ?>" >
                                <?= (isset($qr_gtri[$tindang_tt_ok['chat365_id']])) ? str_replace($boqua, '', $qr_gtri[$tindang_tt_ok['chat365_id']]) : "" ?>
                            </p>
                            <div class="dambao d_flex position_a">
                                <img width="16px" height="16px" src="/images/img_new/shield.svg">
                                <span class="dambao_text">Thanh toán đảm bảo</span>
                            </div>
                        </div>
                        <div class="info_td">
                            <a href="/<?= replaceTitle($tindang_tt_ok['link_title']) ?>-c<?= $tindang_tt_ok['new_id'] ?>.html" class="tit_td pt_10 pl_10 pr_10"><?= $tindang_tt_ok['new_title'] ?></a>
                            <div class="user d_flex pt_5 pl_10 pr_10">
                                <img src="/images/img_new/frame.svg" alt="">
                                <p class="tdtt_name_user"><?= $tindang_tt_ok['usc_name'] ?></p>
                            </div>
                            <div class="info_post d_flex pl_10 j_s_bw pr_10 flex_w">
                                <div class="info_post_1 d_flex pt_5">
                                    <img src="/images/img_new/location.svg" alt="">
                                    <p class="text_info"><?= ltrim($tindang_tt_ok['dia_chi'], ', ') ?></p>
                                </div>
                                <div class="info_post_2 d_flex pt_5">
                                    <img src="/images/img_new/timer.svg" alt="">
                                    <p class="text_info"><?= lay_tgian($tindang_tt_ok['new_create_time']) ?></p>
                                </div>
                                <div class="info_post_3 d_flex pt_5">
                                    <p class="text_info">
                                    <? if ($tindang_tt_ok['new_cate_id'] != 120 && $tindang_tt_ok['new_cate_id'] != 121) { 
                                            if ($tindang_tt_ok['chotang_mphi'] == 1) { 
                                                echo "Cho tặng miễn phí";
                                            } else if ($tindang_tt_ok['new_money'] > 0) {
                                                echo number_format($tindang_tt_ok['new_money']) ." ". $arr_dvtien[$tindang_tt_ok['new_unit']];
                                            } else if ($tindang_tt_ok['new_money'] == 0) {
                                                echo "Liên hệ để hỏi giá";
                                            }
                                        } else {
                                            if ($tindang_tt_ok['new_money'] != 0 && $tindang_tt_ok['gia_kt'] != 0) {
                                                echo number_format($tindang_tt_ok['new_money']) ." - ". number_format($tindang_tt_ok['gia_kt']) ." ".$arr_dvtien[$tindang_tt_ok['new_unit']];
                                            } else if ($tindang_tt_ok['new_money'] != 0 && $tindang_tt_ok['gia_kt'] == 0) {
                                                echo "Từ ". number_format($tindang_tt_ok['new_money']) ." ". $arr_dvtien[$tindang_tt_ok['new_unit']];
                                            } else if ($tindang_tt_ok['new_money'] == 0 && $tindang_tt_ok['gia_kt'] != 0) {
                                                echo "Đến ".number_format($tindang_tt_ok['gia_kt']) ." ". $arr_dvtien[$tindang_tt_ok['new_unit']];
                                            } else { 
                                                echo "Thỏa thuận";
                                            }
                                        }
                                    ?>
                                    </p>
                                </div>
                                <div class="info_post_4 d_flex pt_5">
                                    <img src="/images/img_new/chatoff.svg" alt="">
                                    <a class="text_info">Chat</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tdtt_content bd_r_10 mb_10">
                        <div class="ava_td position_r">
                            <div class="num_ava_td position_a">
                                <img src="/images/img_new/image.svg" alt="">
                                <span class="color_white">4</span>
                            </div>
                            <button class="ava_td_btn"></button>
                            <div class="img_td_2">
                                <a><img class="bd_r_10 oj_fit_c" src="/images/img_new/ava_test.png"></a>
                            </div>
                            <p class="hoatdong_chat item_chat co_ddong ">10 phút</p>
                            <div class="dambao d_flex position_a">
                                <img width="16px" height="16px" src="/images/img_new/shield.svg">
                                <span class="dambao_text">Thanh toán đảm bảo</span>
                            </div>
                        </div>
                        <div class="info_td">
                            <a class="tit_td pt_10 pl_10 pr_10">Bán nhà mặt phố ở định công hoàng mai Hà Nội Việt Nam</a>
                            <div class="user d_flex pt_5 pl_10 pr_10">
                                <img src="/images/img_new/frame.svg" alt="">
                                <p class="tdtt_name_user">Esther Howard</p>
                            </div>
                            <div class="info_post d_flex pl_10 j_s_bw pr_10 flex_w">
                                <div class="info_post_1 d_flex pt_5">
                                    <img src="/images/img_new/location.svg" alt="">
                                    <p class="text_info">Hồ Chí Minh</p>
                                </div>
                                <div class="info_post_2 d_flex pt_5">
                                    <img src="/images/img_new/timer.svg" alt="">
                                    <p class="text_info">2 giờ trước</p>
                                </div>
                                <div class="info_post_3 d_flex pt_5">
                                    <p class="text_info">Liên hệ để hỏi giá</p>
                                </div>
                                <div class="info_post_4 d_flex pt_5">
                                    <img src="/images/img_new/chatoff.svg" alt="">
                                    <a class="text_info">Chat</a>
                                </div>
                            </div>
                        </div>
                    </div> -->
                <?php }
                } ?>
            </div>
        </div>
    </div>
    <? include("../includes/inc_new/inc_footer.php"); ?>
</body>
<script type="text/javascript" src="/js/style_new/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/style_new/slick.min.js"></script>
<script type="text/javascript" src="/js/chi_tiet_tin_ban.js"></script>

</html>