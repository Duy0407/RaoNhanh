<?
include('config.php');

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 1 || $type_user == 5) {
        $time = time();

        // ds tin show
        $all_tin = new db_query("SELECT new.`new_id`,`new_title`,`han_su_dung`,`new_name`,`link_title`,`chat365_id`,
                                `usc_id`,`usc_name`,`usc_store_name`,`usc_type`, `chat365_secret`, `usc_phone`,
                                `id`,`status`,`apply_time`,`note`
                                FROM `apply_new` LEFT JOIN `new` ON `new`.`new_id`=`apply_new`.`new_id`
                                LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                                LEFT JOIN `user` ON `uv_id` = `user`.`usc_id`
                                WHERE `new_user_id` = $id_user AND is_delete = 0 ORDER BY `apply_time` DESC");

        $donvitien = array(1 => 'VNĐ', 2 => 'USD', 3 => 'EURO');
        $trangthai = array(0 => 'Trạng thái', 1 => 'Đạt yêu cầu', 2 => 'Không đạt yêu cầu');

        $my_id = intval(@$_COOKIE['id_chat365']);
        if ($my_id > 0) {
            $qr_sc = new db_query("SELECT chat365_secret FROM user WHERE chat365_id = '$my_id'");
            $row_sc = mysql_fetch_assoc($qr_sc->result);
            $chat365_secret = $row_sc['chat365_secret'];
        } else {
            $chat365_secret = '';
        }
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>

    <link rel="dns-prefetch" href="https://www.google.com.vn">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://www.google.com.vn">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <!--    -----tvt them  27/05--->
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" as="image" href="/images/banner.webp">
    <link rel="preload" as="image" href="/images/cv_trangchu1.webp">

    <!--------------->

    <title>Ứng viên ứng tuyển | Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN</title>
    <meta name="keywords" content="Raonhanh365, rao vặt miễn phí, trang rao vặt, kênh mua bán, quảng cáo, mua ban, quang cao, rao vat, đăng tin miễn phí" />
    <meta name="description" content="Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn, là cầu nối tốt nhất giữa người mua và người bán." />
    <meta property="og:title" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN" />
    <meta property="og:description" content="Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn. Raonhanh365 'đăng tin miễn phí - mua bán tức thì, nơi kết nối giữa người mua kẻ bán.'" />
    <meta property="og:url" content="https://raonhanh365.vn/" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN<" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="index, follow,noodp" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="https://raonhanh365.vn/images/banner_raonhanh365.jpg" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <link rel="canonical" href="https://raonhanh365.vn" />
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/popup.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/news_management.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien3.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_raonhanhcssnew.css?v=<?= $version ?>" />


</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <section class="news_managenment_post d_flex tca_tdang_cnhan repon">
        <?php if ($type_user == 1) {
            include "../includes/person_sell/inc_sidebar_left.php";
        } else {
            include "../includes/common/inc_container_box_left_dn_new.php";
        }
        ?>
        <div class="box-right tindang-ut-mua">
            <p class="br-title color_47 mb15">Ứng viên ứng tuyển</p>

            <div class="ds-tin-ut">
                <table class="tindangut">
                    <thead>
                        <tr class="tindangut-colname">
                            <th class="tb-title color_33 stt">STT</th>
                            <th class="tb-title color_33 tnb">Tên ứng viên</th>
                            <th class="tb-title color_33 tb">Tin ứng tuyển</th>
                            <th class="tb-title color_33 tgn">Thời gian nộp</th>
                            <th class="tb-title color_33 hn">Ghi chú</th>
                            <th class="tb-title color_33 tt">Kết quả</th>
                            <th class="tb-title color_33 hd">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0 ?>
                        <?php while ($showtin_nguoiban = (mysql_fetch_assoc($all_tin->result))) { ?>
                            <? if ($showtin_nguoiban['usc_type'] == 5) {
                                $link_chat = get_link_chat365($my_id, $showtin_nguoiban['chat365_id'], $showtin_nguoiban['usc_id'], $showtin_nguoiban['usc_store_name'], $showtin_nguoiban['usc_phone'], '', $chat365_secret);
                            } else {
                                $link_chat = get_link_chat365($my_id, $showtin_nguoiban['chat365_id'], $showtin_nguoiban['usc_id'], $showtin_nguoiban['usc_name'], $showtin_nguoiban['usc_phone'], '', $chat365_secret);
                            }

                            ?>
                            <tr>
                                <td>
                                    <p class="tb-txt color_33"><?= ++$i ?></p>
                                </td>
                                <td>
                                    <?php if ($showtin_nguoiban['usc_type'] == 5) { ?>
                                        <a class="tb-txt color_blue" href="/gian-hang/<?= $showtin_nguoiban['usc_id'] ?>/<?= replaceTitle($showtin_nguoiban['usc_store_name']) ?>.html">
                                            <?= $showtin_nguoiban['usc_store_name'] ?>
                                        </a>
                                    <?php } else { ?>
                                        <a class="tb-txt color_blue" href="/ca-nhan/<?= $showtin_nguoiban['usc_id'] ?>/<?= replaceTitle($showtin_nguoiban['usc_name']) ?>.html">
                                            <?= $showtin_nguoiban['usc_name'] ?>
                                        </a>
                                    <?php } ?>
                                </td>
                                <td>
                                    <div class="tinban">
                                        <p class="tb-txt color_33"><?= $showtin_nguoiban['new_title'] ?></p>
                                        <a href="/<?= replaceTitle($showtin_nguoiban['link_title']) ?>-c<?= $showtin_nguoiban['new_id'] ?>.html" class="tb-txt color_36 mt5 cursor">(Xem chi tiêt)</a>
                                    </div>
                                </td>
                                <td>
                                    <p class="tb-txt color_33"><?= date('d/m/Y', $showtin_nguoiban['apply_time']) ?></p>
                                </td>
                                <td>
                                    <div class="tinban">
                                        <?php if ($showtin_nguoiban['note'] == '') { ?>
                                            <p class="tb-txt color_33">Chưa có ghi chú</p>
                                        <?php } else { ?>
                                            <p class="tb-txt color_33 note_content text_ellipsis"><?= $showtin_nguoiban['note'] ?></p>
                                        <?php } ?>
                                        <!-- <p class="tb-txt color_36 mt5 cursor themghichu">(Thêm ghi chú)</p> -->
                                        <p class="tb-txt color_36 mt5 cursor xemghichu" onclick="xemghichu(this,<?= $showtin_nguoiban['id'] ?>)">(Xem ghi chú)</p>
                                    </div>
                                </td>
                                <td>
                                    <?php if ($showtin_nguoiban['status'] == 1) { ?>
                                        <p class="tb-txt color_green">Đạt yêu cầu</p>
                                    <?php } elseif ($showtin_nguoiban['status'] == 2) { ?>
                                        <p class="tb-txt color_red">Không đạt yêu cầu</p>
                                    <?php } else { ?>
                                        <select class="trangthai cursor" name="trangthai" data-id="<?= $showtin_nguoiban['id'] ?>">
                                            <option value="0">Trạng thái</option>
                                            <option value="1">Đạt yêu cầu</option>
                                            <option value="2">Không đạt yêu cầu</option>
                                        </select>
                                    <?php } ?>
                                </td>
                                <td>
                                    <div class="h-dong d_flex gap10 j_content-c">
                                        <!-- chat-xam.svg -->
                                        <a href="<?= $link_chat ?>" target="_blank">
                                            <img class="cursor chat_btn" id-chat="<?= $showtin_nguoiban['chat365_id'] ?>" src="/images/dang-tin-mua/chat-xanh.svg" alt="">
                                        </a>

                                        <img class="cursor" src="/images/dang-tin-mua/delete-do.svg" onclick="del(<?= $showtin_nguoiban['id'] ?>)" alt="">

                                    </div>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>

            </div>
        </div>

    </section>


    <?
    include("../modals/tbao_tcong.php");
    include("../includes/common_new/popup.php");
    include("../includes/inc_new/inc_footer.php");
    ?>

    <div class="modal xacnhanxoa">
        <div class="md-body">
            <div class="md-body-header">
                <p class="color_white">Xác nhận</p>
                <span class="close color_white cus_poi" data-dimiss="modal">×</span>
            </div>
            <div class="md-body-content">
                <p>Bạn muốn xóa tin ứng tuyển này</p>
            </div>
            <div class="md-body-footer">
                <button class="md-btn-huy">
                    <p class="color_red" data-dimiss="modal">Hủy bỏ</p>
                </button>
                <button class="md-btn-dongy">
                    <p class="color_white">Đồng ý</p>
                </button>
            </div>
        </div>
    </div>
    <div class="modal xacnhanupdate">
        <div class="md-body">
            <div class="md-body-header">
                <p class="color_white">Xác nhận</p>
                <span class="close color_white cus_poi" data-dimiss="modal">×</span>
            </div>
            <div class="md-body-content">
                <p>Bạn muốn cập nhật trạng thái cho tin ứng tuyển này</p>
            </div>
            <div class="md-body-footer">
                <button class="md-btn-huy">
                    <p class="color_red" data-dimiss="modal">Hủy bỏ</p>
                </button>
                <button class="md-btn-dongy">
                    <p class="color_white">Đồng ý</p>
                </button>
            </div>
        </div>
    </div>
    <div class="modal xem_ghichu">
        <div class="md-body">
            <div class="md-body-header">
                <p class="color_white">Ghi chú</p>
                <span class="close color_white cus_poi" data-dimiss="modal">×</span>
            </div>
            <div class="md-body-content">
                <textarea class="bd-gc note_content" placeholder="Mời bạn đến phỏng vấn tại công ty vào hồi 9h ngày 25/09/2022 tại số 1 Trần Nguyên Đán, Định Công, Hoàng Mai, Hà Nội"></textarea>
            </div>
            <div class="md-body-footer pad_b15">
                <button class="md-btn-huy" data-dimiss="modal">
                    <p class="color_red">Hủy bỏ</p>
                </button>
                <button class="md-btn-dongy">
                    <p class="color_white">Đồng ý</p>
                </button>
            </div>
        </div>
    </div>
</body>

</html>
<script type="text/javascript" src="/js/style_new/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/personal_seller_profile.js"></script>
<script type="text/javascript">
    $("[data-dimiss=modal]").click(function() {
        $(this).parents(".modal").hide();
    });

    function del(apply_id) {
        // $(el).click(el);
        $(".xacnhanxoa").show();
        $(".xacnhanxoa .md-btn-dongy").click(function() {
            $(".xacnhanxoa").hide();
            $.ajax({
                type: 'POST',
                url: '/ajax/del_apply_new.php',
                data: {
                    apply_id: apply_id
                },
                dataType: 'json',
                beforeSend: function() {},
                success: function(data) {
                    alert(data.msg);
                    if (data.result == true) {
                        window.location.reload();
                    }
                }
            });
        });
    }

    function xemghichu(el, apply_id) {
        var note_content = $(el).prev('.note_content').html();
        if (note_content != undefined) {
            $(".xem_ghichu .note_content").html(note_content);
        } else {
            $(".xem_ghichu .note_content").html('');
        }
        $(".xem_ghichu").show();
        $(".xem_ghichu .md-btn-dongy").click(function() {
            $.ajax({
                type: 'POST',
                url: '/ajax/update_apply_new.php',
                data: {
                    apply_id: apply_id,
                    note: $(".xem_ghichu .note_content").val(),
                },
                dataType: 'json',
                beforeSend: function() {},
                success: function(data) {
                    alert(data.msg);
                    if (data.result == true) {
                        window.location.reload();
                    }
                }
            });
        });
    }
    $("[name=trangthai]").change(function() {
        $(".xacnhanupdate").show();
        $(".xacnhanupdate .md-btn-dongy").click(function() {
            $(".xacnhanupdate").hide();
            $.ajax({
                type: 'POST',
                url: '/ajax/update_apply_new.php',
                data: {
                    apply_id: $("[name=trangthai]").data('id'),
                    status: $("[name=trangthai]").val(),
                },
                dataType: 'json',
                beforeSend: function() {},
                success: function(data) {
                    alert(data.msg);
                    if (data.result == true) {
                        window.location.reload();
                    }
                }
            });
        });
    });
</script>