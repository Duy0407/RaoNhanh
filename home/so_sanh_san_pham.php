<?
include("config.php");
$arr = array(
    1 => 'VNĐ',
    2 => 'USD',
    3 => 'EURO'
);
$id_new = getValue('new_id', 'int', 'GET', 0);
$ressult = [];
$new_cate_id = 0;
$loai_sp = 0;
$nhom_sp = 0;
if ($id_new > 0){
    $query = new db_query("SELECT new.`new_id`, `new_title`, `new_money`, `gia_kt`, `new_cate_id`, `new_image`, `new_unit`, `new_type`, `chotang_mphi`,
    CASE
        WHEN `new_cate_id` = 6 OR `new_cate_id` = 7 OR `new_cate_id` = 35 OR `new_cate_id` = 36 OR `new_cate_id` = 99 THEN thiet_bi
        WHEN `new_cate_id` = 37 THEN link_kien_phu_kien
        WHEN `new_cate_id` = 110 OR `new_cate_id` = 111 OR `new_cate_id` = 112 OR `new_cate_id` = 113 THEN giong_thu_cung
        WHEN `new_cate_id` = 94 OR `new_cate_id` = 95 OR `new_cate_id` = 100 OR `new_cate_id` = 102 OR `new_cate_id` = 47 OR `new_cate_id` = 48 OR `new_cate_id` = 49 OR `new_cate_id` = 50 OR `new_cate_id` = 106 THEN loai_chung
        WHEN `new_cate_id` = 40 OR `new_cate_id` = 41 OR `new_cate_id` = 8 OR `new_cate_id` = 9 THEN loai_xe
        WHEN `new_cate_id` = 75 OR `new_cate_id` = 104 OR `new_cate_id` = 105 THEN mon_the_thao
        WHEN `new_cate_id` = 42 THEN loai_noithat
        WHEN `new_cate_id` = 39 THEN loai_phu_tung
        WHEN `new_cate_id` = 11 OR `new_cate_id` = 12 OR `new_cate_id` = 26 OR `new_cate_id` = 27 OR `new_cate_id` = 28 OR `new_cate_id` = 29 OR `new_cate_id` = 33 OR `new_cate_id` = 34 THEN can_ban_mua
        WHEN `new_cate_id` = 78 OR `new_cate_id` = 79 OR `new_cate_id` = 80 OR `new_cate_id` = 82 OR `new_cate_id` = 114 THEN nhom_sanpham
        WHEN `new_cate_id` = 118 OR `new_cate_id` = 81 OR `new_cate_id` = 108 OR `new_cate_id` = 109 OR `new_cate_id` = 63 THEN loai_sanpham
        WHEN `new_cate_id` = 57 OR `new_cate_id` = 56 OR `new_cate_id` = 59 OR `new_cate_id` = 58 THEN loai_thiet_bi
        WHEN `new_cate_id` = 61 THEN loai_hinh_sp
        ELSE 0
    END AS loai_sp,
    CASE
        WHEN `new_cate_id` = 37 THEN loai_linhphu_kien
        WHEN ((`new_cate_id` = 75  OR `new_cate_id` = 105) AND mon_the_thao != 8) OR `new_cate_id` = 104 THEN loai_chung
        WHEN ((`new_cate_id` = 78 OR `new_cate_id` = 79 OR `new_cate_id` = 80 OR `new_cate_id` = 82) AND `nhom_sanpham` != 7 AND `nhom_sanpham` != 16 AND `nhom_sanpham` != 20 AND `nhom_sanpham` != 30) OR (`new_cate_id` = 57 AND loai_thiet_bi != 20) OR `new_cate_id` = 61 THEN loai_sanpham
        WHEN `new_cate_id` = 114 THEN giong_thu_cung
        ELSE 0
    END AS nhom_sp
    FROM `new` LEFT JOIN `new_description` ON new.new_id = new_description.new_id
    WHERE new.`new_id` = $id_new AND new_buy_sell = 2 AND new_cate_id != 120 AND new_cate_id != 121 ");
    if (mysql_num_rows($query->result) > 0){
        $ressult = mysql_fetch_assoc($query->result);
        $img_tdnb = $ressult['new_image'];
        $img_tdnb1 = explode(',', $img_tdnb);
        $new_cate_id = $ressult['new_cate_id'];
        $loai_sp = $ressult['loai_sp'];
        $nhom_sp = $ressult['nhom_sp'];
    }else{
        $id_new = 0;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>So sánh giá sản phẩm</title>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link href="/css/select2.min.css?v='<?= $version ?>'" rel="stylesheet" type="text/css" />
    <link rel="preload" href="/css/select2.min.css?v='<?= $version ?>'" as="style">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_chien.css">
    <link rel="stylesheet" href="../css/style_new/style.css">
</head>

<body>
    <?php include("../includes/common/inc_header.php"); ?>
    <div data-id="" class="popup_parents" hidden>
        <div class="popup_bg"></div>
        <div class="container_choose">
            <div class="popup_content">
                <div class="popup_title ">
                    Chọn sản phẩm
                    <div class="img_close"><img src="/images/anh_moi/close_popup.png" alt=""></div>
                </div>
                <div class="search">
                    <div class="input_search">
                        <input id="id_search_address_show" type="text" placeholder="Nhập tên sản phẩm để tìm kiếm">
                    </div>
                    <div class="icon_search"><img src="/images/anh_moi/icon_search.png" alt=""></div>
                </div>
                <div class="item_scroll">
                    <div class="popup_scroll">

                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container_header">
            <div class="sosanh_header">
                <div class="sosanh_title">
                    SO SÁNH GIÁ
                </div>
            </div>
            <!-- <div class="khoi_trang"></div> -->
            <div class="box_sosanh">
                <div class="sosanh_tb d_flex">
                    <div class="container_chitiet">
                        <div class="text_choose">SẢN PHẨM</div>
                    </div>
                    <div class="choose d_flex">
                        <div class="item_choose pd_r_20 ben_trai" data="">
                            <div id="1" class="append_img">
                                <?php if ($ressult != []){
                                    $query = new db_query("SELECT n.`new_id`, n.`new_title`, n.`new_money`, n.`gia_kt`, n.`new_cate_id`, n.`new_image`, n.`new_unit`, n.`new_type`, n.`chotang_mphi` FROM `new` AS n WHERE n.`new_id` = '$id_new' ");
                                    $ressult = mysql_fetch_assoc($query->result);
                                    $img_tdnb = $ressult['new_image'];
                                    $img_tdnb1 = explode(',', $img_tdnb); ?>

                                    <div class="product_sp product_ss" data="<?= $id_stt ?>" data-id="<?=$ressult['new_id']?>" data-dm="<?=$ressult['new_cate_id']?>" data-type="<?=$ressult['new_type']?>" data-loai="<?=$loai_sp?>" data-nhom="<?=$nhom_sp?>">
                                        <div class=" img_product">
                                            <div class="img_sp"><img src="/pictures/<?= $img_tdnb1[0] ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`"></div>
                                            <div onclick="close_product(this, <?= $id ?>)" class="icon_close"><img src="/images/anh_moi/icon-delete.png" alt=""></div>
                                        </div>
                                        <a href="/<?= replaceTitle($ressult['new_title']) ?>-c<?= $ressult['new_id'] ?>.html" class="text_product">
                                            <?= $ressult['new_title'] ?>
                                        </a>
                                        <? if ($ressult['new_type'] != 2) { ?>
                                            <? if ($ressult['chotang_mphi'] == 1) { ?>
                                                <div class="price_product">Cho tặng miễn phí</div>
                                            <? } else { ?>
                                                <? if ($ressult['new_money'] == 0) { ?>
                                                    <div class="price_product">Liên hệ người bán</div>
                                                <? } else { ?>
                                                    <div class="price_product"><?= number_format($ressult['new_money']) ?> <?= $arr[$ressult['new_unit']] ?></div>
                                            <? }
                                            } ?>
                                        <? } else { ?>
                                            <div class="price_product"><?= number_format($ressult['new_money']) ?> <?= $arr[$ressult['new_unit']] ?> - <?= number_format($ressult['gia_kt']) ?> <?= $arr[$ressult['new_unit']] ?></div>
                                        <? } ?>
                                    </div>
                                <?php }else{ ?>
                                    <div class="box_choose_sp" onclick="hien_popup(1)">
                                        <div class="img_choose"><img src="/images/anh_moi/plus.png" alt=""></div>
                                        <div class="title_choose">Chọn sản phẩm</div>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="title_mid"<?=($ressult != [])?" style='display:none;'":""?>>Đã xem gần đây</div>
                            <div class="product_child">

                            </div>
                        </div>
                        <div class="text_choose_1024">SẢN PHẨM</div>
                        <div class="item_choose pd_r_20 ben_phai" data="">
                            <div id='2' class="append_img mg_l30">
                                <div class="box_choose_sp" onclick="hien_popup(2)">
                                    <div class="img_choose"><img src="/images/anh_moi/plus.png" alt=""></div>
                                    <div class="title_choose">Chọn sản phẩm</div>
                                </div>
                            </div>
                            <div class="title_mid">Đã xem gần đây</div>
                            <div class="product_child">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="table_chitiet" hidden>

                </div>
                <div class="table_chitiet2" hidden>

                </div>
    </section>
    <div class="footer">
        <?php include("../includes/inc_new/inc_footer.php") ?>
    </div>
    <script src="/js/lazysizes.min.js"></script>
    <script src="/js/jquery-3.4.1.min.js"></script>
</body>
<script>
    var new_id = <?=$id_new?>;
    var page = 1;
    var stop = false;
    getdataPopup(new_id, <?=$new_cate_id?>, 0, <?=$loai_sp?>, <?=$nhom_sp?>);

    function hien_popup(i) {
        $('.popup_parents').show();
        $('.popup_parents').attr('data-id', i);
    }

    $('.img_close, .popup_bg').click(function() {
        $('.popup_parents').removeAttr('data-id')
        $('.popup_parents').hide();
    })

    $("#id_search_address_show").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".popup_scroll .box_item_product").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });

        if ($('.popup_scroll').height() < $('.item_scroll').height() && stop == false){
            page++;
            console.log("filtering");
            var id = $('.popup_scroll').data('');
            var id_dm = $('.popup_scroll').data('dm');
            var id_type = $('.popup_scroll').data('type');
            var id_loai = $('.popup_scroll').data('loai');
            var id_nhomsp = $('.popup_scroll').data('nhomsp');
            getdataPopup(id, id_dm, id_type, id_loai, id_nhomsp);
        }
    });

    $('.item_scroll').on('scroll', function(e){
        // $('.item_scroll').bind('mousewheel', function(e){
        // if(e.originalEvent.wheelDelta < 0) {
            var bottom_content_scroll = $('.popup_scroll').offset().top + $('.popup_scroll').height();
            var bottom_border_scroll = $('.item_scroll').offset().top + $('.item_scroll').height();
            if ((bottom_content_scroll - bottom_border_scroll) < 200 && stop == false){
                page++;
                var id = $('.popup_scroll').data('');
                var id_dm = $('.popup_scroll').data('dm');
                var id_type = $('.popup_scroll').data('type');
                var id_loai = $('.popup_scroll').data('loai');
                var id_nhomsp = $('.popup_scroll').data('nhomsp');
                getdataPopup(id, id_dm, id_type, id_loai, id_nhomsp);
            }
        // }
    });

    function soSanhSP(ele) {
        var id = $(ele).parents('.product_sp').attr('data-id');
        var id_stt = $(ele).parents(".item_choose").find(".append_img").attr('id');
        var id_dm = $(ele).parents('.product_sp').attr('data2');
        var id_type = $(ele).parents('.product_sp').attr('data1');
        var id_loai = $(ele).parents('.product_sp').attr('data3');
        var id_user = $(ele).parents('.product_sp').attr('data4');
        var id_nhomsp = $(ele).parents('.product_sp').attr('data5');

        var ele = $(ele);
        // alert(id_nhomsp);
        $.ajax({
            type: 'POST',
            url: '../ajax/choose_sp.php',
            data: {
                id: id,
            },
            success: function(data) {
                ele.parents('.item_choose').find('.append_img').html(data);
                ele.parents('.item_choose').find('.title_mid').hide();
                ele.parents('.item_choose').find('.product_child').hide();
                var count = $('.box_choose_sp').length;
                if (count == 0) {
                    if ($(window).width() >= 1025) {
                        $('.table_chitiet').show();
                        $('.table_chitiet2').hide();
                    } else if ($(window).width() <= 1024) {
                        $('.table_chitiet2').show();
                        $('.table_chitiet').hide();
                    }
                }
                if ($('.img_choose').length == 0) {
                    var arrId = [];
                    $('.product_ss').each(function() {
                        arrId.push($(this).data('id'));

                    })
                    getDetail(id_dm, arrId)

                }else{
                    page = 1;
                    stop = false;
                    getdataPopup(id, id_dm, id_type, id_loai, id_nhomsp);
                }
            }
        });
        // $.ajax({
        //     type: 'POST',
        //     url: '../render/render_danhmucsp.php',
        //     data: {
        //         id_dm: id_dm,
        //         id_type: id_type,
        //         id_loai: id_loai,
        //         id_user: id_user,
        //         id_nhomsp: id_nhomsp,
        //         id: id,
        //     },
        //     success: function(data) {
        //         if (id_stt == 1) {
        //             $(".ben_phai").find('.product_child > div').hide();
        //             $(".ben_phai").find('.product_child').append(data);
        //             $(".ben_trai").attr("data", 1);
        //         } else if (id_stt == 2) {
        //             $(".ben_trai").find('.product_child > div').hide();
        //             $(".ben_trai").find('.product_child').append(data);
        //             $(".ben_phai").attr("data", 2);
        //         }
        //         // console.log($('.product_sp').length);
        //         if ($('.img_choose').length == 0) {
        //             var arrId = [];
        //             $('.product_ss').each(function() {
        //                 arrId.push($(this).data('id'));

        //             })
        //             getDetail(id_dm, arrId)

        //         }
        //     }
        // });
        // getdataPopup(id, id_dm, id_type, id_loai, id_nhomsp);
    }

    function getDetail(id_dm, id) {
        var screen = $(window).width();
        $.ajax({
            type: 'POST',
            url: '../render/render_chitiet.php',
            data: {
                id_dm: id_dm,
                id: id,
                screen: screen,
            },
            success: function(data) {
                // console.log(data);
                if (screen >= 1025) {
                    $('.table_chitiet').html(data);
                } else {
                    $('.table_chitiet2').html(data);
                }
            }
        })
    }

    function popup_ss(ele) {
        var ele = $(ele);

        var id = ele.attr('data-id');
        var id_dm = ele.attr('data2');
        var sp = ele.parents(".popup_parents").attr('data-id');
        var id_type = ele.attr('data1');
        var id_loai = ele.attr('data3');
        var id_user = ele.attr('data4');
        var id_nhomsp = ele.attr('data5');
        console.log(id);
        $.ajax({
            type: 'POST',
            url: '../ajax/choose_product.php',
            data: {
                id: id,
                id_stt: sp,
                id_loai: id_loai,
                id_nhomsp: id_nhomsp,

            },
            success: function(data) {
                var spSS = $('#' + sp)
                spSS.html(data);
                ele.parents('.item_choose').find('.append_img').html(data);
                spSS.parents('.item_choose').find('.title_mid').hide();
                // console.log(data);
                spSS.parents('.item_choose').find('.product_child').hide();
                $('.popup_parents').hide();
                var count = $('.box_choose_sp').length;
                // console.log(count)
                if (count == 0) {
                    if ($(window).width() >= 1025) {
                        $('.table_chitiet').show();
                        $('.table_chitiet2').hide();
                    } else if ($(window).width() <= 1024) {
                        $('.table_chitiet2').show();
                        $('.table_chitiet').hide();
                    }
                }
                if ($('.img_choose').length == 1) {

                    page = 1;
                    stop = false;
                    getdataPopup(id, id_dm, id_type, id_loai, id_nhomsp);

                }else if ($('.img_choose').length == 0) {
                    var arrId = [];
                    $('.product_ss').each(function() {
                        arrId.push($(this).data('id'));
                    });
                    getDetail(id_dm, arrId);
                }
            }
        });
        // $.ajax({
        //     type: 'POST',
        //     url: '../render/render_danhmucsp.php',
        //     data: {
        //         id_dm: id_dm,
        //         id_type: id_type,
        //         id_loai: id_loai,
        //         id_user: id_user,
        //         id_nhomsp: id_nhomsp,
        //         id: id,
        //     },
        //     success: function(data) {
        //         // console.log(data);

        //         if (sp == 1) {
        //             $(".ben_phai").find('.product_child > div').hide();
        //             $(".ben_phai").find('.product_child').append(data);
        //             $(".ben_trai").attr("data", 1);
        //         } else if (sp == 2) {
        //             $(".ben_trai").find('.product_child > div').hide();
        //             $(".ben_trai").find('.product_child').append(data);
        //             $(".ben_phai").attr("data", 2);
        //         }
        //         if ($('.img_choose').length == 0) {
        //             var arrId = [];
        //             $('.product_ss').each(function() {
        //                 arrId.push($(this).data('id'));

        //             })
        //             getDetail(id_dm, arrId)

        //         }
        //     }
        // });


        // getdataPopup(id, id_dm, id_type, id_loai, id_nhomsp);

    };
    $('.icon_close').click(function() {
        var count = $('.box_choose_sp').length;
        // console.log(count);
    });

    function close_product(ele, id) {
        if ($(window).width() >= 1025) {
            $('.table_chitiet2').hide();
        } else if ($(window).width() <= 1024) {
            $('.table_chitiet').hide();
        }

        $(ele).parents('.item_choose').find('.product_child').show();
        $(ele).parents('.item_choose').find('.title_mid').show();

        $(ele).parents('.item_choose').attr('data', '');

        var id = $(ele).parents('.append_img').attr('id');

        var data = '<div class="box_choose_sp" onclick="hien_popup(' + id + ')"><div class="img_choose"><img src="/images/anh_moi/plus.png" alt=""></div><div class="title_choose">Chọn sản phẩm</div></div>'
        $(ele).parents('.item_choose').find('.append_img').html(data);

        if ($('.img_choose').length == 2) {
            $('.table_chitiet2').hide();
            $('.table_chitiet').hide();
            renderPopupSS()
            $('.product_sp').each(function() {
                $(this).show();
            });
            $('.product_render').each(function() {
                $(this).remove()

            })
        } else if ($('.img_choose').length == 1) {
            $('.table_chitiet2').hide();
            $('.table_chitiet').hide();
            var pr_ss = $('.append_img').children('.product_sp');
            var id_sp = pr_ss.data('id');
            var id_dm = pr_ss.data('dm');
            var id_type = pr_ss.data('type');
            var id_loai = pr_ss.data('loai');
            var id_nhomsp = pr_ss.data('nhom');
            page = 1;
            stop = false;
            getdataPopup(id_sp, id_dm, id_type, id_loai, id_nhomsp);
        }
    }

    function renderPopupSS() {

        page = 1;
        stop = false;
        $.ajax({
            type: 'POST',
            url: '../render/render_popup.php',
            data: {},
            success: function(data) {
                $('.popup_scroll').html(data);
                $('.popup_scroll').data('',0);
                $('.popup_scroll').data('dm',0);
                $('.popup_scroll').data('type',0);
                $('.popup_scroll').data('loai',0);
                $('.popup_scroll').data('nhomsp',0);
            }

        })
    }

    function getdataPopup(id, id_dm, id_type, id_loai, id_nhomsp) {
        $.ajax({
            type: 'POST',
            url: '../render/render_popup.php',
            async: false,
            data: {
                id_dm: id_dm,
                id_type: id_type,
                id: id,
                id_nhomsp: id_nhomsp,
                id_loai: id_loai,
                page: page,
            },
            success: function(data) {
                // console.log(data);
                if ($.trim(data) == ''){
                    console.log('stop');
                    stop = true;
                }
                if (page == 1){
                    $('#id_search_address_show').val('');
                    $('.popup_scroll').html(data);
                    $('.item_scroll').animate({scrollTop:0},500);
                }else{
                    $('.popup_scroll').append(data);
                }
                if ($('#id_search_address_show').val() != ''){
                    $('#id_search_address_show').keyup();
                }
                $('.popup_scroll').data('',id);
                $('.popup_scroll').data('dm',id_dm);
                $('.popup_scroll').data('type',id_type);
                $('.popup_scroll').data('loai',id_loai);
                $('.popup_scroll').data('nhomsp',id_nhomsp);
            }
        })
    }
</script>

</html>