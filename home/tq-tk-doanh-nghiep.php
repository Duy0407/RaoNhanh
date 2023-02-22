<? include("config.php"); ?>
<!DOCTYPE html>
<style>
    .noti-error {
        float: left;
        color: red;
    }

    .noti-error_map {
        color: red;
        left: 375px;
        width: 300px;
    }

    .noti-ok-map {
        color: #4cae4c;
        left: 375px;
        width: 300px;
        margin-top: 2px;
        float: left;
        margin-left: 117px;
    }

    .noti-ok {
        color: #4cae4c;
        float: left;
        padding-top: 10px;
        padding-left: 32px;
    }

    .error {
        border: 1px solid red !important;
    }

    #maps_mapcanvas {
        height: 237px !important;
    }

    .update_add {
        margin-top: 10px !important;
        margin-bottom: 40px !important;
    }

    .tit_gh {
        margin: 10px;
        color: #F26222;
        font-size: 13px;
        font-weight: bold;
    }
</style>
<html>
<head><title>Rao vặt|Rao vặt miễn phí|Mạng xã hội rao vặt lớn nhất Việt Nam</title>
    <meta name="keywords" content="rao vặt, rao vặt miễn phí, rao vat, rao vat mien phi"/>
    <meta name="description"
          content="Mạng xã hội rao vặt, rao vặt miễn phí trên mọi lĩnh vực. Cập nhật hàng ngàn tin tức rao vặt mỗi ngày tại Raonhanh365.vn"/>
    <meta property="og:title" content="Rao vặt|Rao vặt miễn phí|Mạng xã hội rao vặt lớn nhất Việt Nam"/>
    <meta property="og:description"
          content="Mạng xã hội rao vặt, rao vặt miễn phí trên mọi lĩnh vực. Cập nhật hàng ngàn tin tức rao vặt mỗi ngày tại Raonhanh365.vn"/>
    <meta property="og:url" content="http://raonhanh365.vn/"/>
    <meta name="language" content="vietnamese"/>
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn"/>
    <meta name="abstract" content="raonhanh365.vn Mạng xã hội mua bán rao vặt lớn nhất Việt Nam<"/>
    <meta name="author" itemprop="author" content="raonhanh365.vn"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="viewport"
          content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
    <meta property="og:image:url" content="/"/>
    <meta property="og:image:width" content="476"/>
    <meta property="og:image:height" content="249"/>
    <meta property="og:type" content="website"/>
    <meta property="og:locale" content="vi_VN"/>
    <meta name="revisit-after" content="1 days"/>
    <meta name="page-topic" content="Mua bán rao vặt"/>
    <meta name="resource-type" content="Document"/>
    <meta name="distribution" content="Global"/>
<!----------------->
    <link rel="preload" type="text/css" href="/css/detail-slider.css"/>
    <link rel="preload" href="/css/style.min.css?v=<?=$version?>" as="style">
    <link href="/css/dung.css?v=1" rel="preload" type="text/css"/>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
<!------------------------>
    <link rel="canonical" href="http://raonhanh365.vn"/>
    <link rel="stylesheet" type="text/css" href="/css/detail-slider.css"/>
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/js/jssor.slider-26.3.0.min.js" type="text/javascript"></script>
    <script src="/js/info.js" type="text/javascript"></script>
    <link href="/css/dung.css?v=1" rel="stylesheet" type="text/css"/>
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA"/>

    <script src="/js/lazysizes.min.js"></script>


    <style>
        .form-control {
            padding-right: 0px !important;
        }
    </style>
</head>
<body>
<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01"/>
</div>
<? include("../includes/common/inc_header.php") ?>
<section>
    <? include("../includes/info/inc_bread_crumb.php") ?>

    <div class="main_cate">
        <div class="container">
            <?
            if (empty($row4)) {
                redirect("/");
            } else if ($row4['usc_type'] == 5) {
                include("../includes/info/inc_left_info_doanhnghiep.php");
            } else {
                redirect("/");
            }
            ?>
            <div class="detail-main">
                <h1>TỔNG QUAN TÀI KHOẢN</h1>
                <div class="tq_top">
                    <div class="tq_top_hea tq_top_left">
                        <?
                        $db_dg = new db_query("SELECT COUNT(eva_id),SUM(eva_stars) FROM new LEFT JOIN evaluate ON new.new_id = evaluate.new_id WHERE eva_stars > 0 AND new_user_id = " . $row4['usc_id']);
                        $row_dg = mysql_fetch_assoc($db_dg->result);
                        if ($row_dg['COUNT(eva_id)'] == 0) {
                            $dat_sta = 1;
                        } else {
                            $dat_sta = $row_dg['COUNT(eva_id)'];
                        }
                        ?>
                        <div class="tq-danhgia">
                            <span style="color: #fff;position: absolute;top:47px;left: 33px;"><?= round(($row_dg['SUM(eva_stars)'] / $dat_sta), 1) ?></span>
                            <p>
                                <span style="color: #444545;position: absolute;top: 90px;left: 35px;"><?= $dat_sta ?></span>
                            </p>
                            <p style="position: absolute;top: 105px;left: 7px;">lượt đánh giá</p>
                        </div>
                        <div class="tq-count-danhgia">
                            <ul>
                                <?
                                for ($i = 5; $i >= 1; $i--) {
                                    $db_stars = new db_query("SELECT COUNT(eva_id) FROM new LEFT JOIN evaluate ON new.new_id = evaluate.new_id WHERE eva_stars =" . $i . " AND new_user_id = " . $row4['usc_id']);
                                    $row_stars = mysql_fetch_assoc($db_stars->result);
                                    $sta_tl = $row_stars['COUNT(eva_id)'] / $dat_sta * 100;
                                    ?>
                                    <li>
                                        <div><?= $i ?> sao</div>
                                        <div class="bl-dg-dg-main-div">
                                            <div style="background-color: #f36e21;width: <?= $sta_tl ?>%;height: 100%"></div>
                                        </div>
                                        <div><?= round($sta_tl, 1) ?>%</div>
                                        <div class="clear"></div>
                                    </li>
                                    <?
                                }
                                unset($db_stars, $row_stars, $sta_tl, $row_dg, $db_dg, $dat_sta);
                                ?>


                                <!--                            <li>
                                                                <div class="clear"></div>
                                                                <div>5 sao</div>
                                                                <div class="bl-dg-dg-main-div">
                                                                    <div style="background-color: #f36e21;width: 7.8%;height: 100%"></div>
                                                                </div>
                                                                <div>7.8%</div>
                                                                <div class="clear"></div>
                                                            </li>

                                                            <li>
                                                                <div>4 sao</div>
                                                                <div class="bl-dg-dg-main-div">
                                                                    <div style="background-color: #f36e21;width: 72.3%;height: 100%"></div>
                                                                </div>
                                                                <div>72.3%</div>
                                                                <div class="clear"></div>
                                                            </li>

                                                            <li>
                                                                <div>3 sao</div>
                                                                <div class="bl-dg-dg-main-div">
                                                                    <div style="background-color: #f36e21;width: 16.8%;height: 100%"></div>
                                                                </div>
                                                                <div>16.8%</div>
                                                                <div class="clear"></div>
                                                            </li>

                                                            <li>
                                                                <div>2 sao</div>
                                                                <div class="bl-dg-dg-main-div">
                                                                    <div style="background-color: #f36e21;width: 2%;height: 100%"></div>
                                                                </div>
                                                                <div>2%</div>
                                                                <div class="clear"></div>
                                                            </li>

                                                            <li>
                                                                <div>1 sao</div>
                                                                <div class="bl-dg-dg-main-div">
                                                                    <div style="background-color: #f36e21;width: 1%;height: 100%"></div>
                                                                </div>
                                                                <div>1%</div>
                                                                <div class="clear"></div>
                                                            </li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="tq_top_hea tq_top_center">
                        <div class="tq_hea_like">
                            <div class="tq-like-view">
                                <p>Tổng số lượt like: <span>0 like</span></p>
                                <p>Sản phẩm có lượt like cao nhất: <a><i>...</i></a></p>
                            </div>
                        </div>
                        <div class="tq_hea_view">
                            <div class="tq-like-view">
                                <?
                                $db_tq_dn_1 = new db_query("SELECT new_id,new_title FROM new LEFT JOIN user ON new.new_user_id = user.usc_id
                                                                        WHERE new_user_id = " . $row4['usc_id'] . " ORDER BY new_view_count DESC LIMIT 1");
                                $row_tq_dn_1 = mysql_fetch_assoc($db_tq_dn_1->result);
                                $db_tq_dn_1_2 = new db_query("SELECT SUM(new_view_count) FROM new LEFT JOIN user ON new.new_user_id = user.usc_id WHERE new_user_id = " . $row4['usc_id']);
                                $row_tq_dn_1_2 = mysql_fetch_assoc($db_tq_dn_1_2->result);
                                ?>
                                <p>Tổng số lượt view:
                                    <span><?= format_number(($row_tq_dn_1_2['SUM(new_view_count)'])) ?> like</span></p>
                                <p>Sản phẩm có lượt view cao nhất: <a
                                            href="<?= rewriteNews($row_tq_dn_1['new_id'], $row_tq_dn_1['new_title']) ?>"
                                            title="<?= $row_tq_dn_1['new_title'] ?>"><i><?= cut_string($row_tq_dn_1['new_title'], 30, '...') ?></i></a>
                                </p>
                            </div>
                            <? unset($row_tq_dn_1_2, $db_tq_dn_1_2, $row_tq_dn_1, $db_tq_dn_1); ?>
                        </div>
                    </div>
                    <div class="tq_top_hea tq_top_right">
                        <div class="tq_hea_commen">
                            <div class="tq-like-view">
                                <?
                                $db_tq_dn_2 = new db_query("SELECT usc_count_comment, new_id, new_title FROM new LEFT JOIN user ON new.new_user_id = user.usc_id
                                                                        WHERE new_user_id = " . $row4['usc_id'] . " ORDER BY new_count_comment DESC LIMIT 1");
                                $row_tq_dn_2 = mysql_fetch_assoc($db_tq_dn_2->result);
                                ?>
                                <p>Tổng số bình luật: <span><?= format_number(($row_tq_dn_2['usc_count_comment'])) ?> bình luận</span>
                                </p>
                                <p>Sản phẩm có bình luận cao nhất: <a
                                            href="<?= rewriteNews($row_tq_dn_2['new_id'], $row_tq_dn_2['new_title']) ?>"
                                            title="<?= $row_tq_dn_2['new_title'] ?>"><i><?= cut_string($row_tq_dn_2['new_title'], 30, '...') ?></i></a>
                                </p>
                            </div>
                        </div>
                        <div class="tq_hea_date">
                            <div class="tq-like-view">
                                <?
                                $db_tq_dn_3_1 = new db_query("SELECT COUNT(new_id) FROM new WHERE new_user_id = " . $row4['usc_id']);
                                $row_tq_dn_3_1 = mysql_fetch_assoc($db_tq_dn_3_1->result);

                                $db_tq_dn_3_2 = new db_query("SELECT COUNT(new_id) FROM new WHERE new_active = 1 AND new_user_id = " . $row4['usc_id']);
                                $row_tq_dn_3_2 = mysql_fetch_assoc($db_tq_dn_3_2->result);

                                $db_tq_dn_3_3 = new db_query("SELECT COUNT(new_id) FROM new WHERE new_type IN (2,3,4) AND new_user_id = " . $row4['usc_id']);
                                $row_tq_dn_3_3 = mysql_fetch_assoc($db_tq_dn_3_3->result);
                                ?>
                                <p>Sản phẩm đã đăng: <span><?= format_number($row_tq_dn_3_1['COUNT(new_id)']) ?> </span>
                                </p>
                                <p>Sản phẩm đang hiện thị:
                                    <span><?= format_number($row_tq_dn_3_2['COUNT(new_id)']) ?></span></p>
                                <p>Sản phẩm VIP: <span><?= format_number($row_tq_dn_3_3['COUNT(new_id)']) ?></span></p>
                            </div>
                        </div>
                    </div>
                </div>

                <!--         <div class="tq_main">
                             <div class="tq_main-cate tq_mail_left">
                                 <ul>
                                     <li><a>DANH MỤC SẢN PHẨM</a>
                                         <ul>
                                             <li><div class="menu_key"></div><a href="#">MÁY TÍNH BẢNG</a></li>
                                             <li><div class="menu_key"></div><a href="#">MÁY IN LASER ĐEN TRẮNG</a></li>
                                             <li><div class="menu_key"></div><a href="#">ASUS</a></li>
                                             <li><div class="menu_key"></div><a href="#">DELL</a></li>
                                             <li><div class="menu_key"></div><a href="#">HP</a></li>
                                             <li><div class="menu_key"></div><a href="#">LENNOVO-IBM</a></li>
                                             <li><div class="menu_key"></div><a href="#">MACBOOK</a></li>
                                             <li><div class="menu_key"></div><a href="#">MACBOOK PRO</a></li>
                                             <li><div class="menu_key"></div><a href="#">MACBOOK AIR</a></li>
                                         </ul>
                                     </li>
                                 </ul>
                                 <div class="update-danhmuc-dn"><a href="/doanh-nghiep/quan-ly-danh-muc">Sửa danh mục</a></div>
                             </div>
                             <div class="tq_main-cate tq_mail_center tq-main-table">
                                 <span>TỐP 10 SẢN PHẨM ĐƯỢC QUAN TÂM</span>
                                 <table>
                                     <tr>
                                         <td>1.</td>
                                         <td>Macbook air 2015...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>2.</td>
                                         <td>Apple Macbook pro...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>3.</td>
                                         <td>Dell Latitude E6430 ... </td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>4.</td>
                                         <td>Mimaki JV33 160A ...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>5.</td>
                                         <td>ASUS X541UA-... </td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>6.</td>
                                         <td>HP Pavilion X360... </td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>7.</td>
                                         <td>Dell Inspiron N7460...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>8.</td>
                                         <td>Dell Inspiron 7460...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>9.</td>
                                         <td>Epson L300... </td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>10.</td>
                                         <td>Máy in HP 402D </td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                 </table>
                             </div>
                             <div class="tq_main-cate tq_mail_right tq-main-table">
                                 <span>CÁC SP VIP SẮP HẾT HẠN UY TÍN</span>
                                 <table>
                                     <tr>
                                         <td>1.</td>
                                         <td>Macbook air 2015...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>2.</td>
                                         <td>Apple Macbook pro...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>3.</td>
                                         <td>Apple Macbook pro...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>4.</td>
                                         <td>Apple Macbook pro...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>5.</td>
                                         <td>Apple Macbook pro...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>6.</td>
                                         <td>Apple Macbook pro...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>7.</td>
                                         <td>Apple Macbook pro...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>8.</td>
                                         <td>Apple Macbook pro...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>9.</td>
                                         <td>Apple Macbook pro...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                     <tr>
                                         <td>10.</td>
                                         <td>Apple Macbook pro...</td>
                                         <td><a href="#"><i>link</i></a></td>
                                     </tr>
                                 </table>
                             </div>
                         </div>-->

                <div class="main_info">
                    <div class="tq-dn-left">
                        <div class="tq-dn-left-top">
                            <img width="61" height="61" class="lazyload" src = "/images/loading.gif"
                                 data-src="<?= ($row4['usc_logo'] != '') ? $row4['usc_logo'] : '/images/detai-avata.png' ?>">
                            <table>
                                <tr>
                                    <td>Tên gian hàng:</td>
                                    <td><?= $row4['usc_store_name'] ?></td>
                                </tr>
                                <tr>
                                    <td>Loại tài khoản:</td>
                                    <td>Tài khoản doanh nghiệp</td>
                                </tr>
                                <tr>
                                    <td>Ngày đăng ký:</td>
                                    <td><?= date('d/m/Y', $row4['usc_time']) ?></td>
                                </tr>
                                <tr>
                                    <td>Số dư tài khoản:</td>
                                    <td><?= format_number($row4['usc_money'], '0', ',', '.') ?> tcoin</td>
                                </tr>
                            </table>
                        </div>
                        <form action="#" method="#" onsubmit="return false">
                            <div class="tit_gh form_control" style="margin-top:10px;">Thông tin chủ gian hàng</div>
                            <div class="form_control">
                                <div class="control1">Họ và tên:</div>
                                <div class="control2">
                                    <input disabled type="text" placeholder="Nguyễn Văn A"
                                                             value="<?= $row4['usc_name'] ?>" id="Hoten_info"
                                                             name="Hoten"/>
                                </div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Giới tính:</div>
                                <div class="control2">
                                    <input disabled type="text"
                                           value="<?= ($row4['usc_gender'] == 0) ? 'Nam' : 'Nữ' ?>">
                                </div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Ngày sinh:</div>
                                <div class="control2">
                                    <input disabled type="text" value="<?= date('d/m/Y', $row4['usc_birth_day']) ?>">
                                </div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Email:</div>
                                <div class="control2"><input disabled type="text" placeholder="mail"
                                                             value="<?= $row4['usc_email'] ?>" id="Email_info"
                                                             name="Email"></div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Số điện thoại:</div>
                                <div class="control2"><input disabled class="numbersOnly2" type="text"
                                                             placeholder="phone" value="<?= $row4['usc_phone'] ?>"
                                                             id="Phone_info" name="Phone"></div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Chứng minh thư:</div>
                                <div class="control2">
                                    <input type="text" disabled value="<?= $row4['usc_cmt'] ?>">
                                </div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Ngày cấp:</div>
                                <div class="control2">
                                    <input type="text" disabled id="Jop_info"
                                           value="<?= date('d/m/Y', $row4['usc_date_cmt']) ?>">
                                </div>
                            </div>
                            <div class="tit_gh form_control">Thông tin gian hàng</div>
                            <div class="form_control">
                                <div class="control1">Tên gian hàng</div>
                                <div class="control2">
                                    <input type="text" disabled id="Jop_info" placeholder="Doanh nghiệp tự do"
                                           value="<?= $row4['usc_store_name'] ?>">
                                </div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Lĩnh vực kinh doanh:</div>
                                <div class="control2">
                                    <?
                                    $data = new db_query("SELECT cat_id,cat_name FROM category where cat_id = " . $row4['usc_category']);
                                    $row_cat = mysql_fetch_array($data->result);

                                    ?>
                                    <input type="text" disabled value="<?= $row_cat['cat_name'];
                                    unset($data, $row_cat) ?>">
                                </div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Website cá nhân:</div>
                                <div class="control2"><input disabled id="web_info" type="text"
                                                             value="<?= $row4['usc_website'] ?>"/></div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Facebook cá nhân:</div>
                                <div class="control2"><input disabled id="face_info" type="text"
                                                             value="<?= $row4['usc_facename'] ?>"/></div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Số điện thoại:</div>
                                <div class="control2"><input disabled id="sky_info" type="text"
                                                             value="<?= $row4['usc_store_phone'] ?>"/></div>
                            </div>
                            <!--<input type="submit" onclick="checkpostdt();" class="btn_dangky btn_update_left btn_update_2" value="Cập nhật"/>-->

                        </form>
                        <div class="update-tq-dn"><a href="/doanh-nghiep/thay-doi-thong-tin">Sửa thông tin</a></div>
                    </div>
                    <div class="tq-dn-right">
                        <div>
                            <div class="map">
                                <div id="maps_maparea">
                                    <div id="maps_mapcanvas" style="margin-top:10px;" class="form-group"
                                         style="height:250px;"></div>
                                </div>
                            </div>
                            <?
                            $map = new db_query("SELECT maps_mapcenterlat,maps_mapcenterlng,maps_maplat,maps_maplng,maps_mapzoom FROM map WHERE usc_id = '" . $row4['usc_id'] . "'");
                            $map_cou = mysql_num_rows($map->result);
                            $map_data = mysql_fetch_assoc($map->result);
                            ?>
                            <div class="update_add">
                                <p style="font-size: 12px;color: #666766;float: left;width: 100%;text-align: center;">
                                    Địa chỉ liên hệ: <span
                                            style="float: none;color:#0e83be;"><?= $row4['usc_address'] ?></span></p>
                                <input type="text" class="form-control" name="maps[maps_mapcenterlat]"
                                       id="maps_mapcenterlat" value="<? if ($map_cou > 0) {
                                    echo $map_data['maps_mapcenterlat'];
                                } else {
                                    echo '20.871571500000005';
                                } ?>" style="display:none;" readonly="readonly">
                                <input type="text" class="form-control" name="maps[maps_mapcenterlng]"
                                       id="maps_mapcenterlng" value="<? if ($map_cou > 0) {
                                    echo $map_data['maps_mapcenterlng'];
                                } else {
                                    echo '105.79547500000001';
                                } ?>" style="display:none;" readonly="readonly">
                                <input type="text" class="form-control" name="maps[maps_maplat]" id="maps_maplat"
                                       value="<? if ($map_cou > 0) {
                                           echo $map_data['maps_maplat'];
                                       } else {
                                           echo '20.984826535048562';
                                       } ?>" style="display:none;" readonly="readonly">
                                <input type="text" class="form-control" name="maps[maps_maplng]" id="maps_maplng"
                                       value="<? if ($map_cou > 0) {
                                           echo $map_data['maps_maplng'];
                                       } else {
                                           echo '105.79892968521119';
                                       } ?>" readonly="readonly" style="display:none;">
                                <input type="text" class="form-control" name="maps[maps_mapzoom]" id="maps_mapzoom"
                                       style="display:none;" value="<? if ($map_cou > 0) {
                                    echo $map_data['maps_mapzoom'];
                                } else {
                                    echo '14';
                                } ?>" readonly="readonly">
                            </div>
                        </div>
                        <? unset($map, $map_cou, $map_data) ?>
                        <div class="main_edit">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include("../includes/common/inc_footer.php") ?>
</body>
</html>
<script src="/js/map.js" type="text/javascript"></script>
<script src="/js/info_update.js" type="text/javascript"></script>
<script src="/js/script_img.js" type="text/javascript"></script>
<script>
    $("#tqtkdn").addClass("open_menu");
    $(".tttk").addClass("selected");
    $(".tttk a:first").addClass("menu-a");
</script>