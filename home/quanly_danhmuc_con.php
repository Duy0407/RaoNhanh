<? include("config.php");
//$index = "index, follow,noodp";
$index = "noindex, nofollow";
$title = "Rao vặt|Rao vặt miễn phí|Mạng xã hội rao vặt lớn nhất Việt Nam";
$keyword = "rao vặt, rao vặt miễn phí, rao vat, rao vat mien phi";
$description = "Mạng xã hội rao vặt, rao vặt miễn phí trên mọi lĩnh vực. Cập nhật hàng ngàn tin tức rao vặt mỗi ngày tại Raonhanh365.vn";
$canonical = "http://raonhanh365.vn/";
$url_image = "/";
?>
<!DOCTYPE html>
<html>
<head>
    <!--link meta seo-->
    <?php include "../includes/common/inc_header_link.php"?>

    <link rel="stylesheet" type="text/css" href="/css/detail-slider.css"/>
    <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/js/jssor.slider-26.3.0.min.js" type="text/javascript"></script>
    <script src="/js/info.js" type="text/javascript"></script>
    <link rel="stylesheet" href="/css/quanly_danhmuc.css">
    <link rel="stylesheet" type="text/css" href="/css/dung.css"/>

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
            if (empty($row4['usc_type'])) {
                redirect("/");
            } else {
                if ($row4['usc_type'] == 5) {
                    include("../includes/info/inc_left_info_doanhnghiep.php");
//             Thêm danh mục sản phẩm
                    $check = getValue("add_menu", "str", "POST", "");
                    if ($check != '') {
                        $dm_name = getValue("name_product", "str", "POST", "");
                        $dm_name = trim($dm_name);
                        $dm_name = replaceMQ($dm_name);

                        $dm_order = getValue("stt", "str", "POST", "");
                        $dm_order = trim($dm_order);
                        $dm_order = replaceMQ($dm_order);

                        $dm_active = getValue("check_tc", "str", "POST", 0);
                        $dm_active = trim($dm_active);
                        $dm_active = replaceMQ($dm_active);

                        $danhmuc_cha = getValue("danhmuc_cha", "str", "POST", "0");
                        $danhmuc_cha = trim($danhmuc_cha);
                        $danhmuc_cha = replaceMQ($danhmuc_cha);

                        $db_cate = new db_query("SELECT dm_cate FROM danhmuc_dn WHERE dm_id = '" . $danhmuc_cha . "'");
                        $row_cate = mysql_fetch_assoc($db_cate->result);

                        $dm_md5 = getValue("dm_name", "str", "POST", "");
                        $dm_md5 = removeAccent(trim($dm_name));
                        $dm_md5 = mb_strtolower($dm_md5, 'UTF-8');
                        $dm_md5 = md5($dm_md5);

                        if ($dm_name != '' && $danhmuc_cha != '') {
                            $db_check_dm = new db_query("SELECT dm_id FROM danhmuc_dn WHERE dm_md5 = '" . $dm_md5 . "'LIMIT 1");
                            if (mysql_num_rows($db_check_dm->result) == 0) {
                                $query5 = new db_execute("INSERT INTO danhmuc_dn(dm_cate,dm_name,dm_md5,dm_usc_id,dm_order,dm_active,dm_parent_id)
                                                 VALUES ('" . $row_cate['dm_cate'] . "','" . $dm_name . "','" . $dm_md5 . "','" . $row4['usc_id'] . "','" . $dm_order . "',1,'" . $danhmuc_cha . "')");
                            }
                        }
                        unset($db_check_dm, $query5, $dm_md5, $row_cate, $db_cate, $danhmuc_cha, $dm_active, $dm_order, $dm_name, $check);
                    }
//            End        
                } else {
                    redirect("/");
                }
            }
            ?>
            <div class="detail-main">
                <h1>QUẢN LÝ DANH MỤC CON</h1>
                <div class="main_cate_con">
                    <div class="add_edit_menu">
                        <form method="POST" action="/doanh-nghiep/quan-ly-danh-muc-con" onsubmit="return checkpost();">
                            <div class="add_cate_con">
                                <table>
                                    <tr>
                                        <td><p>Nhập tên danh mục con:</p></td>
                                        <td><input type="text" name="name_product"
                                                   onblur="myNameDm(<?= $row4['usc_id'] ?>)" id="danhmuc_con" value=""
                                                   placeholder="Microsoft Mouse"></td>
                                    </tr>
                                    <tr>
                                        <td><p>Thứ tự:</p></td>
                                        <td>
                                            <input type="text" name="stt" value=" ">
                                            <!--                         <span class="text_after">Hiển thị lên trang chủ:</span>
                                                                     <div class="check_box_ct" status = "checked">-->

                            </div>
                            <div class="clear">

                            </div>
                            </td>
                            <div class="clear">

                            </div>
                            </tr>
                            <tr>
                                <td><p>Là con của danh mục:</p></td>
                                <td>

                                    <select name="danhmuc_cha" id="danhmuc_cha">
                                        <option value="0">Danh mục cha</option>
                                        <?
                                        $db_dm = new db_query("SELECT * FROM danhmuc_dn WHERE dm_usc_id = " . $row4['usc_id'] . " AND dm_parent_id = 0");
                                        while ($row_dm = mysql_fetch_assoc($db_dm->result)) {
                                            ;
                                            ?>
                                            <option value="<?= $row_dm['dm_id'] ?>"><?= $row_dm['dm_name'] ?></option>
                                            <?
                                        }
                                        unset($db_dm, $row_dm);
                                        ?>
                                    </select>
                                    <!--<input type="text" name="name_product" value="" placeholder="Microsoft Mouse">-->
                                </td>
                            </tr>
                            </table>
                            <div class="btn_">
                                <input type="submit" class="btn_dangky btn btn_submit" name="add_menu"
                                       value="Thêm danh mục con"/>
                                <!--<div class="ql-dm-con-sua">Sửa danh mục con</div>-->
                            </div>
                        </form>
                    </div>
                    <div class="clear">

                    </div>
                    <div class="table_product">
                        <table>
                            <tbody>
                            <tr>
                                <td>Tên danh mục con</td>
                                <td>Thuộc nhóm</td>
                                <td>Thứ tự</td>
                                <td>Link truy cập</td>
                                <td>Thao tác</td>
                            </tr>
                            <?
                            $db_dm = new db_query("SELECT * FROM danhmuc_dn WHERE dm_parent_id > 0 AND dm_usc_id = " . $row4['usc_id'] . " ORDER BY dm_order ASC");
                            While ($row_dm = mysql_fetch_assoc($db_dm->result)) {
                                ?>
                                <tr id="delete_tr_<?= $row_dm['dm_id'] ?>">
                                    <td id="dm_name_<?= $row_dm['dm_id'] ?>">
                                        <span><?= $row_dm['dm_name'] ?></span>
                                        <input class="group_name_product hidden" type="text" name=""
                                               value="<?= $row_dm['dm_name'] ?>" placeholder="">
                                    </td>
                                    <td id="dm_cate_<?= $row_dm['dm_id'] ?>">
                                        <?
                                        $db_dm_cha = new db_query("SELECT dm_name FROM danhmuc_dn WHERE dm_id =" . $row_dm['dm_parent_id']);
                                        $row_dm_cha = mysql_fetch_assoc($db_dm_cha->result);
                                        ?>
                                        <span><?= $row_dm_cha['dm_name'];
                                            unset($db_dm_cha, $row_dm_cha); ?></span>
                                        <select name="danhmuc_cha" class="danhmuc_cha hidden">
                                            <option value="0">Danh mục cha</option>
                                            <?
                                            $db_dm_cha = new db_query("SELECT * FROM danhmuc_dn WHERE dm_usc_id = " . $row4['usc_id'] . " AND dm_parent_id = 0");
                                            while ($row_dm_cha = mysql_fetch_assoc($db_dm_cha->result)) {
                                                ;
                                                ?>
                                                <option id="cate_<?= $row_dm['dm_id'] . "_" ?><?= $row_dm_cha['dm_id'] ?>"
                                                        value="<?= $row_dm_cha['dm_id'] ?>" <?= ($row_dm_cha['dm_id'] == $row_dm['dm_parent_id'] ? "selected='selected'" : ''); ?>><?= $row_dm_cha['dm_name'] ?></option>
                                                <?
                                            }
                                            unset($db_dm_cha, $row_dm_cha);
                                            ?>
                                        </select>
                                    </td>
                                    <td id="dm_order_<?= $row_dm['dm_id'] ?>">
                                        <div class="stt_group"><?= $row_dm['dm_order'] ?></div>
                                        <input type="text" value="<?= $row_dm['dm_order'] ?>" class="dm_order hidden">
                                    </td>
                                    <td><a href="#" class="link_to_group">Truy cập</a></td>

                                    <td>
                                        <input type="button" name="" value="Sửa" id="edit_<?= $row_dm['dm_id'] ?>"
                                               edit="<?= $row_dm['dm_id'] ?>" class="edit_dm">
                                        <input type="button" name="" value="Lưu" id="save_<?= $row_dm['dm_id'] ?>"
                                               save="<?= $row_dm['dm_id'] ?>" class="save_dm hidden">
                                        <input type="button" name="" value="Hủy" id="cancel_<?= $row_dm['dm_id'] ?>"
                                               cancel="<?= $row_dm['dm_id'] ?>" class="cancel_dm hidden">
                                        <input type="button" name="" value="Xóa" id="delete_<?= $row_dm['dm_id'] ?>"
                                               delete="<?= $row_dm['dm_id'] ?>" class="delete_danhmuc">
                                    </td>

                                </tr>
                            <? } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<? include("../includes/common/inc_footer.php") ?>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $("div.check_box_ct").click(function () {
            var status = $(this).attr("status");
            if (status == "checked") {
                $(this).css("background-image", "url(/images/check_box.png)");
                $(this).attr("status", "");
            } else {
                $(this).css("background-image", "url(/images/checked_box.png)");
                $(this).attr("status", "checked");
            }
        });
    });

    $(".qltrv .qldmc").addClass("open_menu");
    $(".qltrv").addClass("selected");
    $(".qltrv a:first").addClass("menu-a");

    //   chek thêm danh mục con
    jQuery(".numbersOnly").keyup(function () {
        this.value = this.value.replace(/[^0-9]/g, '');
        $('.numbersOnly').val($('.numbersOnly').val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
    });
    jQuery(".numbersOnly2").keyup(function () {
        this.value = this.value.replace(/[^0-9]/g, '');
    });

    function checkpost() {
        $(".noti-error").remove();
        $("#danhmuc_con").removeClass('error');
        $("#dm_cate").removeClass('error');
        var returndata = false;
        if ($("#danhmuc_con").val() == '') {
            $("#danhmuc_con").focus();
            $("#danhmuc_con").addClass('error');
            $("#danhmuc_con").after("<div class='noti-error'>Bạn chưa nhập tên danh mục</div>");
            returndata = false;
        } else if ($("#danhmuc_cha").val() == '0') {
            $("#danhmuc_cha").focus();
            $("#danhmuc_cha").addClass('error');
            $("#danhmuc_cha").after("<div class='noti-error'>Bạn chưa chọn danh mục cha</div>");
            returndata = false;
        } else {
            returndata = true;
        }
        return returndata;
    }

    //    end check thêm danh mục

    //edit table

    $(".edit_dm").click(function () {
        var id = $(this).attr("edit");
        $(this).addClass("hidden");

        $("#dm_name_" + id + " span").addClass("hidden");
        $("#dm_name_" + id + " input").removeClass("hidden");

        $("#dm_cate_" + id + " span").addClass("hidden");
        $("#dm_cate_" + id + " select").removeClass("hidden");

        $("#dm_order_" + id + " div").addClass("hidden");
        $("#dm_order_" + id + " input").removeClass("hidden");

//        $("#dm_check_2_"+id).addClass("hidden");
//        $("#dm_check_1_"+id).removeClass("hidden");

        $("#save_" + id).removeClass("hidden");
        $("#cancel_" + id).removeClass("hidden");
        $("#delete_" + id).addClass("hidden");
    });
    $(".cancel_dm").click(function () {
        var id = $(this).attr("cancel");
        $(this).addClass("hidden");

        $("#dm_name_" + id + " span").removeClass("hidden");
        $("#dm_name_" + id + " input").addClass("hidden");

        $("#dm_cate_" + id + " span").removeClass("hidden");
        $("#dm_cate_" + id + " select").addClass("hidden");

        $("#dm_order_" + id + " div").removeClass("hidden");
        $("#dm_order_" + id + " input").addClass("hidden");

//        $("#dm_check_1_"+id).addClass("hidden");
//        $("#dm_check_2_"+id).removeClass("hidden");

        $("#edit_" + id).removeClass("hidden");
        $("#save_" + id).addClass("hidden");
        $("#delete_" + id).removeClass("hidden");
    });
    $(".save_dm").click(function () {
        var id = $(this).attr("save");
        $(this).addClass("hidden");

        $("#dm_name_" + id + " span").removeClass("hidden");
        $("#dm_name_" + id + " input").addClass("hidden");

        $("#dm_cate_" + id + " span").removeClass("hidden");
        $("#dm_cate_" + id + " select").addClass("hidden");

        $("#dm_order_" + id + " div").removeClass("hidden");
        $("#dm_order_" + id + " input").addClass("hidden");

//        $("#dm_check_1_"+id).addClass("hidden");
//        $("#dm_check_2_"+id).removeClass("hidden");

        $("#edit_" + id).removeClass("hidden");
        $("#cancel_" + id).addClass("hidden");
        $("#delete_" + id).removeClass("hidden");

        $.ajax({
            url: "../ajax/add_danhmuc_con_dh_.php",
            type: "POST",
            data: {
                'dm_id': id,
                'dm_name': $("#dm_name_" + id + " input").val(),
                'dm_cate': $("#dm_cate_" + id + " select").val(),
                'dm_order': $("#dm_order_" + id + " input").val(),
//            'dm_active':$("#dm_check_1_"+id).attr("dm_active")
            },
            success: function (data) {
                $("#dm_name_" + data + " span").text($("#dm_name_" + data + " input").val());
                $("#dm_order_" + data + " div").text($("#dm_order_" + data + " input").val());
                $("#dm_order_" + data + " div").text($("#dm_order_" + data + " input").val());
                var cate = $("#dm_cate_" + data + " select").val();
                var cate_name = $("#cate_" + data + "_" + cate).text();
//               cate_name = cate_name.replace("--- ","");
                $("#dm_cate_" + data + " span").text(cate_name);

            }
        });
    });
    //    delete
    $(".delete_danhmuc").click(function () {
        var id = $(this).attr("delete");
        var dm_name = $("#dm_name_" + id + " span").text();
        var ok = confirm("Bạn có đồng ý xóa danh mục: " + dm_name);
        if (ok == true) {
            $.ajax({
                url: "../ajax/delete_danhmuc_dn.php",
                type: "POST",
                data: {
                    'dm_id': id
                },
                success: function (data) {
                    $("#delete_tr_" + data).remove();
                }
            });
        }
    });


    function myNameDm(id) {
        valEmail = $("#danhmuc_con");
        $(".noti-error").remove();
        if (valEmail.val().length > 0) {
            $("#danhmuc_con").removeClass('error');
            $(".noti-error").remove();
            $.ajax({
                type: "POST",
                url: '../ajax/check_dm_danhmuc.php',
                data: {
                    dm_name: $("#danhmuc_con").val(),
                    usc_id: id
                },
                success: function (data) {
                    if (data == 1) {
                        $("#danhmuc_con").addClass('error');
                        $("#danhmuc_con").after("<div class='noti-error'>Tên nhóm sản phẩm đã tồn tại</div>");
                    } else if (data == 0) {
                        $("#danhmuc_con").removeClass('error');
                        $(".noti-error").remove();
                    }
                }
            });
        } else {
            $("#danhmuc_con").addClass('error');
            $("#danhmuc_con").after("<div class='noti-error'>Tên nhóm sản phẩm không được để chống</div>");
        }

    };
</script>
</html>
