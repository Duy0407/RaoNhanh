 <?
    include("config.php");
    $id_nd = getValue('id', 'int', 'GET', 0);
    if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_nd != 0) {
        $acc_id = $_COOKIE['UID'];
        $acc_type = $_COOKIE['UT'];
        $query = new db_query("SELECT `new_id`, `new_title`,`link_title`,`new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                            `new_unit`, `new_name`, `new_phone`, `new_email`, `new_address`,
                            `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc` FROM `new` WHERE new_id = $id_nd
                            AND `new_user_id` = $acc_id ");
        if (mysql_num_rows($query->result) > 0) {
            $sql_nd = mysql_fetch_assoc($query->result);

            $query_des = new db_query("SELECT `new_des_id`, `new_id`, `new_description`,`can_ban_mua`, `ten_toa_nha`, `tong_so_tang`, `so_pve_sinh`, `so_pngu`,
                                `huong_chinh`, `giay_to_phap_ly`, `tinh_trang_noi_that`, `dac_diem`, `dien_tich`, `chieu_dai`,
                                `chieu_rong` FROM `new_description` WHERE new_id = $id_nd ");

            $sql_des = mysql_fetch_assoc($query_des->result);
            $query_dm = new db_query("SELECT `tags_id`, `ten_tags`, `id_danhmuc`, `type_tags`, `id_parent` FROM `key_tags` WHERE id_danhmuc = 11");
            $avt_dangtin = $sql_nd['new_image'];
            $video_dangtin = $sql_nd['new_video'];
            $tinh_thanh = $sql_nd['new_city'];
            $quan_huyen = $sql_nd['quan_huyen'];
            $phuong_xa = $sql_nd['phuong_xa'];
            $so_nha = $sql_nd['new_sonha'];

            $sql_tang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE  type_zoom = 1");
            $sql_n = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 2");
            $sql_vs = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 3");
        } else {
            header('Location: /');
        }
    } else {
        header('Location: /');
    }
    ?>
 <!DOCTYPE html>
 <html lang="vi">
 <!--link meta seo-->

 <head>
     <meta charset="UTF-8">
     <meta name="robots" content="noindex, nofollow" />
     <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
     <title>Ch???nh s???a tin b???t ?????ng s???n nh?? ?????t</title>
     <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
     <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
     <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

     <!-- select 2 -->
     <link rel="stylesheet" href="/css/slick.css">
     <link rel="stylesheet" href="/css/slick-theme.css">
     <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

     <link rel="stylesheet" type="text/css" href="/css/style_new/style_chien.css?v=<?= $version ?>">
     <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?v=<?= $version ?>">
     <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
     <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
     <link rel="stylesheet" href="/css/style_new/app.css?v=<?= $version ?>">
 </head>

 <body>
     <?php include "../includes/common/inc_header.php"; ?>
     <section>
         <div class="tindang-container">
             <div class="tindang-header hd-disflex hd-align-center ">
                 <p class="font-18-24 font-dam">Ch???nh s???a tin</p>
             </div>
             <div class="tindang-content-cont hd-disflex">
                 <div class="tindang-col-left">
                     <? include "../includes/inc_new/up-media-dang-tin.php"; ?>
                 </div>
                 <div class="tindang-col-right">
                     <form class="form-dtin-cont" id="form_bds_nhadat" data="<?= $acc_id ?>" data1="<?= $acc_type ?>" data2="<?= $id_nd ?>">
                         <div class="row-tin-dang danhmuc_tt">
                             <p class="font-dam hd_font15-17">Danh m???c s???n ph???m <span class="color_red">*</span></p>
                             <input type="text" class="dmuc-spham" readonly name="san-pham-laptop" placeholder="B???t ?????ng s???n >> Nh?? ?????t">
                         </div>
                         <div class="row-tin-dang box_input_infor">
                             <p class="font-dam hd_font15-17">C???n b??n/Cho thu?? <span class="color_red">*</span></p>
                             <select class="slect-hang banthue hd_height36" name="ban_thue">
                                 <option disabled selected value="">C???n b??n/Cho thu??</option>
                                 <option value="1" <? if ($sql_des['can_ban_mua'] == 1) echo 'selected' ?>>C???n b??n
                                 </option>
                                 <option value="2" <? if ($sql_des['can_ban_mua'] == 2) echo 'selected' ?>>Cho thu??
                                 </option>
                             </select>
                         </div>
                         <div class="row-tin-dang box_input_infor">
                             <p class="font-dam hd_font15-17">Ti??u ????? <span class="color_red">*</span></p>
                             <input class="input_infor_tag" type="text" name="tieu_de" autocomplete="off" placeholder="Nh???p ti??u ?????" value="<?= $sql_nd['new_title'] ?>">
                         </div>
                         <div class="nhadatnguoiban_show">
                             <div class="row-dang-tin-nd">
                                 <div class="row-tin-dang">
                                     <p class="font-dam hd_font15-17">T??n to?? nh??/Khu d??n c??</p>
                                     <input type="text" name="ten_toanha" placeholder="T??n to?? nh??/Khu d??n c??" value="<?= $sql_des['ten_toa_nha'] ?>">
                                 </div>
                                 <div class="d_flex j_between d_so_sl_sotang">
                                     <div class="row-tin-dang rowflex2">
                                         <p class="font-dam hd_font15-17">T???ng s??? t???ng</p>
                                         <select class="slect-hang  hd_height36" name="so_tang">
                                             <option disabled selected value="">T???ng s??? t???ng</option>
                                             <? while ($tang = mysql_fetch_assoc($sql_tang->result)) { ?>
                                                 <option value="<?= $tang['id'] ?>" <?= ($tang['id'] == $sql_des['tong_so_tang']) ? 'selected' : "" ?>>
                                                     <?= $tang['so_luong'] ?>
                                                 </option>
                                             <? } ?>
                                         </select>
                                     </div>
                                     <div class="row-tin-dang rowflex2">
                                         <p class="font-dam hd_font15-17">H?????ng c???a ch??nh</p>
                                         <select class="slect-hang  hd_height36" name="huong_cua">
                                             <option disabled selected value="">H?????ng c???a ch??nh</option>
                                             <option value="1" <? if ($sql_des['huong_chinh'] == 1) echo 'selected' ?>>????ng</option>
                                             <option value="2" <? if ($sql_des['huong_chinh'] == 2) echo 'selected' ?>>T??y
                                             </option>
                                             <option value="3" <? if ($sql_des['huong_chinh'] == 3) echo 'selected' ?>>Nam
                                             </option>
                                             <option value="4" <? if ($sql_des['huong_chinh'] == 4) echo 'selected' ?>>B???c
                                             </option>
                                             <option value="5" <? if ($sql_des['huong_chinh'] == 5) echo 'selected' ?>>????ng b???c </option>
                                             <option value="6" <? if ($sql_des['huong_chinh'] == 6) echo 'selected' ?>>????ng nam </option>
                                             <option value="7" <? if ($sql_des['huong_chinh'] == 7) echo 'selected' ?>>T??y
                                                 b???c </option>
                                             <option value="8" <? if ($sql_des['huong_chinh'] == 8) echo 'selected' ?>>T??y
                                                 nam </option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="d_flex j_between d_so_sl_sotang">
                                     <div class="row-tin-dang rowflex2 box_input_infor">
                                         <p class="font-dam hd_font15-17">S??? ph??ng ng??? <span class="color_red">*</span>
                                         </p>
                                         <select name="so_phongngu" class="slect-hang  hd_height36">
                                             <option disabled selected value="">S??? ph??ng ng???</option>
                                             <? while ($pn = mysql_fetch_assoc($sql_n->result)) { ?>
                                                 <option value="<?= $pn['id'] ?>" <?= ($pn['id'] == $sql_des['so_pngu']) ? 'selected' : "" ?>>
                                                     <?= $pn['so_luong'] ?>
                                                 </option>
                                             <? } ?>
                                         </select>
                                     </div>
                                     <div class="row-tin-dang rowflex2">
                                         <p class="font-dam hd_font15-17">S??? ph??ng v??? sinh </p>
                                         <select name="so_nhavs" class="slect-hang  hd_height36">
                                             <option value="">S??? ph??ng v??? sinh</option>
                                             <? while ($vs = mysql_fetch_assoc($sql_vs->result)) { ?>
                                                 <option value="<?= $vs['id'] ?>" <?= ($vs['id'] == $sql_des['so_pve_sinh']) ? 'selected' : "" ?>>
                                                     <?= $vs['so_luong'] ?>
                                                 </option>
                                             <? } ?>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="d_flex j_between d_so_sl_sotang">
                                     <div class="row-tin-dang rowflex2">
                                         <p class="font-dam hd_font15-17">Gi???y t??? ph??p l??</p>
                                         <select class="slect-hang  hd_height36" name="giayto">
                                             <option disabled selected value="">Gi???y t??? ph??p l??</option>
                                             <option value="1" <? if ($sql_des['giay_to_phap_ly'] == 1) echo 'selected' ?>>???? c?? s???</option>
                                             <option value="2" <? if ($sql_des['giay_to_phap_ly'] == 2) echo 'selected' ?>>??ang ch??? s???</option>
                                             <option value="3" <? if ($sql_des['giay_to_phap_ly'] == 3) echo 'selected' ?>>Gi???y t??? kh??c</option>
                                         </select>
                                     </div>
                                     <div class="row-tin-dang rowflex2">
                                         <p class="font-dam hd_font15-17">T??nh tr???ng n???i th???t</p>
                                         <select class="slect-hang  hd_height36" name="tinhtrangnt">
                                             <option disabled selected value="">T??nh tr???ng n???i th???t</option>
                                             <option value="1" <? if ($sql_des['tinh_trang_noi_that'] == 1)
                                                                    echo 'selected' ?>>N???i th???t cao c???p</option>
                                             <option value="2" <? if ($sql_des['tinh_trang_noi_that'] == 2)
                                                                    echo 'selected' ?>>N???i th???t ?????y ?????</option>
                                             <option value="3" <? if ($sql_des['tinh_trang_noi_that'] == 3)
                                                                    echo 'selected' ?>>Ho??n thi???n c?? b???n</option>
                                             <option value="4" <? if ($sql_des['tinh_trang_noi_that'] == 4)
                                                                    echo 'selected' ?>>B??n giao th??</option>
                                         </select>
                                     </div>
                                 </div>
                                 <div class="row-tin-dang box_input_infor">
                                     <p class="font-dam hd_font15-17">?????c ??i???m nh?? ?????t</p>
                                     <div class="d_flex top15 space_b">
                                         <div class="checkbox1 w50 d_flex">
                                             <input type="checkbox" class="checkbox_dacdiem dacdiem1" name="dacdiem1" <?= $sql_des['dac_diem'] == 1 || $sql_des['dac_diem'] == 3 ? 'checked' : '' ?>>
                                             <label class="color-blk">H???m xe h??i</label>
                                         </div>
                                         <div class="checkbox1 w50 d_flex">
                                             <input type="checkbox" class="checkbox_dacdiem dacdiem2" name="dacdiem2" <?= $sql_des['dac_diem'] == 2 || $sql_des['dac_diem'] == 3 ? 'checked' : '' ?>>
                                             <label class="color-blk">N??? h???u</label>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row-tin-dang position_ral box_input_infor d0407">
                                     <p class="font-dam hd_font15-17">Di???n t??ch <span class="color_red">*</span></p>
                                     <input class="input_infor_tag" type="text" name="dientich" placeholder="Di???n t??ch" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" value="<?= $sql_des['dien_tich'] ?>">
                                     <span class="donvi_dt font-14" style="color:#666666">m<sup>2</sup></span>
                                 </div>
                                 <div class="d_flex j_between d_so_sl_sotang">
                                     <div class="row-tin-dang rowflex2 position_ral">
                                         <p class="font-dam hd_font15-17">Chi???u d??i</p>
                                         <input type="text" name="chieudai" value="<?= ($sql_des['chieu_dai'] != 0) ? $sql_des['chieu_dai'] : "" ?>" placeholder="Chi???u d??i" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                         <span class="donvi_dt font-14" style="color:#666666">m</span>
                                     </div>
                                     <div class="row-tin-dang rowflex2 position_ral">
                                         <p class="font-dam hd_font15-17">Chi???u ngang</p>
                                         <input type="text" name="chieungang" placeholder="Chi???u ngang" value="<?= ($sql_des['chieu_rong'] != 0) ? $sql_des['chieu_rong'] : "" ?>" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                         <span class="donvi_dt font-14" style="color:#666666">m</span>
                                     </div>
                                 </div>

                                 <div class="row-tin-dang d_8-7_tclass1">
                                     <p class="font-dam hd_font15-17 d_8-7_tclass2">Gi?? <span style="color:#ff0000">*</span></p>
                                     <div class="d_themdiv_gia_7_8">
                                         <div class="input-gia-cont d_8-7_tclass3">
                                             <div class="box_input_infor">
                                                 <input class="input_infor_tag error price" type="text" value="<?= ($sql_nd['new_money'] != 0) ? number_format($sql_nd['new_money']) : "" ?>" <?= ($sql_nd['new_money'] == 0) ? 'disabled' : "" ?> onkeyup="format_gtri(this)" name="td_gia_spham" id="gia-ban-sp" autocomplete="off" oninput="<?php echo $oninput; ?>">
                                             </div>
                                             <div class="money_div d_8-7_tclass5">
                                                 <select name="dvi_tien" class="dt-money-up">
                                                     <option value="1" <? if ($sql_nd['new_unit'] == 1) echo 'selected' ?>>VN??</option>
                                                     <option value="2" <? if ($sql_nd['new_unit'] == 2) echo 'selected' ?>>USD</option>
                                                     <option value="3" <? if ($sql_nd['new_unit'] == 3) echo 'selected' ?>>EURO</option>
                                                 </select>
                                             </div>
                                         </div>
                                         <span class="sp-lienhe-nban d_8-7_tclass4">
                                             <? if ($sql_nd['new_money'] == 0) { ?>
                                                 <input type="checkbox" name="td-lienhe_ngban" placeholder="" class="lien-he-ngban" checked>
                                             <? } else { ?>
                                                 <input type="checkbox" name="td-lienhe_ngban" placeholder="" class="lien-he-ngban">
                                             <? } ?>
                                             <label class="color-blk">Li??n h??? ng?????i b??n ????? h???i gi??</label>
                                         </span>
                                     </div>
                                 </div>

                             </div>
                         </div>

                         <!--  hetnguoimua-->

                         <div class="row-tin-dang box_input_infor">
                             <p class="font-dam hd_font15-17">M?? t??? <span class="color_red">*</span></p>
                             <textarea class="texa-mo-ta input_infor_tag" placeholder="Nh???p m?? t???" name="mota"><?= $sql_des['new_description'] ?></textarea>
                         </div>
                         <div class="box_input_infor">
                             <p class="font-dam hd_font15-17">Chi ti???t danh m???c <span class="color_red">*</span></p>
                             <select id="chitiet_dm" name="chitiet_dm" class="slect-chitiet_dm hd_height36" style="width:100%">
                                 <option disabled selected value="">Th??m chi ti???t danh m???c</option>
                                 <? while ($ctiet = mysql_fetch_assoc($query_dm->result)) { ?>
                                     <option value="<?= $ctiet['tags_id'] ?>" <?= ($ctiet['tags_id'] == $sql_nd['new_ctiet_dmuc']) ? 'selected' : "" ?>>
                                         <?= $ctiet['ten_tags'] ?>
                                     </option>
                                 <? } ?>
                             </select>
                         </div>
                         <div class="row-tin-dang box_input_infor">
                             <p class="font-dam hd_font15-17">?????a ch??? <span class="color_red">*</span></p>
                             <input readonly type="text" name="td_dia_chi" class="td_ttin_diachi input_infor_tag error" placeholder="?????a ch???" value="<?= $sql_nd['dia_chi'] ?>">
                         </div>
                         <div class="row-tin-dang box_input_infor">
                             <p class="font-dam hd_font15-17">S??? ??i???n tho???i li??n h??? <span class="color_red">*</span></p>
                             <input class="input_infor_tag error" type="text" name="sdt_lienhe" value="<?= $sql_nd['new_phone'] ?>" placeholder="Nh???p s??? ??i???n tho???i li??n h???" autocomplete="off">
                         </div>
                         <div class="row-tin-dang box_input_infor">
                             <p class="font-dam hd_font15-17">Email li???n h??? <span class="color_red">*</span></p>
                             <input class="input_infor_tag error" type="text" name="email_lienhe" value="<?= $sql_nd['new_email'] ?>" placeholder="Nh???p email li??n h???" autocomplete="off">
                         </div>
                         <div class="row-tin-dang div-ma-xac-nhan box_input_infor">
                             <p class="font-dam hd_font15-17">M?? x??c nh???n <span style="color:#ff0000">*</span></p>
                             <div class="khung_input_capcha">
                                 <div class="div_bao_ma_xacnhan">
                                     <input id="captcha_input" type="text" name="captcha_confirm" class="input_infor_tag" placeholder="M?? x??c nh???n" autocomplete="off" oninput="<?= $oninput ?>" class="ma_capcha">
                                 </div>
                                 <div class="bao_p_capcha">
                                     <input readonly type="text" class="ma_dcap_2 ma_dcap_2_df sh_clr_five sh_size_five b_radius_5 background-none" id="captcha"></input>
                                     <div class="img_df">
                                         <img src="../images/anh_moi/new_capcha.svg" class="xoay360">
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row-tin-dang-btn cont-btn-sb hd-disflex">
                             <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold" onclick="xem_trc_tin()">XEM
                                 TR?????C</button>
                             <button type="button" class="btn-submit dang_tin td-dang-tin hd_cspointer font-bold">CH???NH
                                 S???A</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
         <div class="v_container d_none"></div>
         <?php include '../modals/md_danh_muc_tin_dang.php' ?>
         <?php include '../modals/md_dia_chi.php' ?>
         <? include '../modals/tbao_tcong.php' ?>
     </section>
     <?php
        include '../includes/inc_new/inc_footer.php';
        ?>
     <script type="text/javascript" src="../js/newJs/admin.main.js"></script>

 </body>
 <script>
     $('.banthue').on('change', function() {
         var id_nhucau = $("select[name='ban_thue']").val();
         $.ajax({
             type: 'POST',
             url: '/render/render_bds_tag.php',
             data: {
                 id_nhucau: id_nhucau,
             },
             success: function(data) {
                 $("#chitiet_dm").html(data);
             }
         })
     });

     $(".dang_tin").click(function() {
         var form_bds_nhadat = $("#form_bds_nhadat");
         form_bds_nhadat.validate({
             errorPlacement: function(error, element) {
                 error.appendTo(element.parents(".box_input_infor"));
                 error.wrap("<span class='error'>");
                 element.parents('.box_input_infor').addClass('validate_input');
             },
             rules: {
                 ban_thue: "required",
                 tieu_de: {
                     required: true,
                     minlength: 40,
                     maxlength: 70,
                 },
                 dientich: "required",
                 td_gia_spham: "required",
                 chitiet_dm: "required",
                 td_dia_chi: "required",
                 mota: {
                     required: true,
                     minlength: 10,
                     maxlength: 10000,
                 },
                 so_phongngu: "required",
                 captcha_confirm: {
                     required: true,
                     equalTo: "#captcha",
                 },
                 sdt_lienhe: {
                     required: true,
                     vali_phone: true,
                 },
                 email_lienhe: {
                     required: true,
                     vali_email: true,
                 },
             },
             messages: {
                 ban_thue: "Vui l??ng ch???n nhu c???u",
                 tieu_de: {
                     required: "Vui l??ng nh???p ti??u ?????",
                     minlength: "ti??u ????? ??t nh???t 40 k?? t???",
                     maxlength: "ti??u ????? nhi???u nh???t 70 k?? t???",
                 },
                 dientich: "Vui l??ng nh???p di???n t??ch",
                 td_gia_spham: "Vui l??ng nh???p ????? gi?? s???n ph???m",
                 chitiet_dm: "Vui l??ng ch???n chi ti???t danh m???c",
                 td_dia_chi: "Vui l??ng nh???p ?????a ch???",
                 mota: {
                     required: "Vui l??ng nh???p m?? t???",
                     minlength: "M?? t??? ??t nh???t 10 k?? t???",
                     maxlength: "M?? t??? nhi???u nh???t 10000 k?? t???",
                 },
                 so_phongngu: "Vui l??ng ch???n s??? ph??ng ng???",
                 captcha_confirm: {
                     required: "Vui l??ng nh???p m?? x??c nh???n",
                     equalTo: 'M?? x??c nh???n sai! Vui l??ng nh???p l???i',
                 },
                 sdt_lienhe: {
                     required: "Nh???p s??? ??i???n tho???i li??n h???",
                 },
                 email_lienhe: {
                     required: "Nh???p email li??n h???",
                 },
             },
         });
         if (form_bds_nhadat.valid() === true) {
             var user_id = $("#form_bds_nhadat").attr("data");
             var user_type = $("#form_bds_nhadat").attr("data1");
             var id_nd = $("#form_bds_nhadat").attr("data2");
             var ban_thue = $("select[name='ban_thue']").val();
             var tieu_de = $("input[name='tieu_de']").val();
             var ten_toanha = $("input[name='ten_toanha']").val();
             var kv_thanhpho = $("select[name='kv_thanhpho']").val();
             var kv_quanhuyen = $("select[name='kv_quanhuyen']").val();
             var kv_phuongxa = $("select[name='kv_phuongxa']").val();
             var so_tang = $("select[name='so_tang']").val();
             var so_nhavs = $("select[name='so_nhavs']").val();
             var so_phongngu = $("select[name='so_phongngu']").val();
             var huong_cua = $("select[name='huong_cua']").val();
             var giayto = $("select[name='giayto']").val();
             var tinhtrangnt = $("select[name='tinhtrangnt']").val();
             var dacdiem = 0;
             var count = $('.checkbox_dacdiem:checked').length
             if (count != 0) {
                 var checkBox = $('.checkbox_dacdiem');
                 dacdiem = (count == 1) ? ($(checkBox[0]).is(':checked') ? 1 : 2) : 3;
             }
             var dientich = $("input[name='dientich']").val();
             var chieudai = $("input[name='chieudai']").val();
             var chieungang = $("input[name='chieungang']").val();
             if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                 var td_gia_spham = 0;
             } else {
                 var td_gia_spham = $("input[name='td_gia_spham']").val();
             };
             var dvi_tien = $("select[name='dvi_tien']").val();
             var mo_ta = $("textarea[name='mota']").val();
             var ctiet_dmuc = $("select[name='chitiet_dm']").val();
             var tinh_thanh = $("select[name='thanhpho']").val();
             var quan_huyen = $("select[name='quanhuyen']").val();
             var phuong_xa = $("select[name='phuongxa']").val();
             var so_nha = $("input[name='md_so_nha']").val();
             var dia_chi = $("input[name='td_dia_chi']").val();
             //  alert(user_type);
             var anh_dd = [];
             $(".anh_dadang").each(function() {
                 var anh_dang = $(this).children('img').attr("src");
                 if (anh_dang != "") {
                     anh_dd.push(anh_dang);
                 }
             });
             var fd = new FormData();
             fd.append('user_id', user_id);
             fd.append('user_type', user_type);
             fd.append('id_nd', id_nd);
             fd.append('ban_thue', ban_thue);
             fd.append('tieu_de', tieu_de);
             fd.append('ten_toanha', ten_toanha);
             fd.append('so_tang', so_tang);
             fd.append('so_nhavs', so_nhavs);
             fd.append('so_phongngu', so_phongngu);
             fd.append('huong_cua', huong_cua);
             fd.append('giayto', giayto);
             fd.append('tinhtrangnt', tinhtrangnt);
             fd.append('dac_diem', dacdiem);
             fd.append('dientich', dientich);
             fd.append('chieudai', chieudai);
             fd.append('chieungang', chieungang);
             fd.append('td_gia_spham', td_gia_spham);
             fd.append('dvi_tien', dvi_tien);
             fd.append('mo_ta', mo_ta);
             fd.append('ctiet_dmuc', ctiet_dmuc);
             fd.append('tinh_thanh', tinh_thanh);
             fd.append('quan_huyen', quan_huyen);
             fd.append('phuong_xa', phuong_xa);
             fd.append('so_nha', so_nha);
             fd.append('dia_chi', dia_chi);
             // l???y ???nh c??
             fd.append('anh_dd', anh_dd);
             // end
             fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
             fd.append('email_lhe', $("input[name='email_lienhe']").val());
             for (var i = 0; i < arr_anh.length; i++) {
                 if (arr_anh[i] != 'undefined') {
                     fd.append('files[]', arr_anh[i]);
                 }
             }
             // lay video cu
             var video_cu = $(".avt_xoavideo").attr("data");
             fd.append('video_cu', video_cu);
             // end
             var video = $("#cl-upload-video-file")[0].files;
             fd.append('file', video[0]);
             $.ajax({
                 url: '/ajax_bds/chinhsua_bdsnhadat.php',
                 type: 'POST',
                 data: fd,
                 contentType: false,
                 processData: false,
                 success: function(data) {
                     if (data == "") {
                         tbao_csdtin_tcong();
                     } else {
                         alert(data);
                     }
                 }
             })
         }
     });

     function xem_trc_tin() {
         var form_bds_nhadat = $(".form-dtin-cont");
         form_bds_nhadat.validate({
             errorPlacement: function(error, element) {
                 error.appendTo(element.parents(".box_input_infor"));
                 error.wrap("<span class='error'>");
                 element.parents('.box_input_infor').addClass('validate_input');
             },
             rules: {
                 ban_thue: "required",
                 tieu_de: {
                     required: true,
                     minlength: 40,
                     maxlength: 70,
                 },
                 dientich: "required",
                 td_gia_spham: "required",
                 chitiet_dm: "required",
                 td_dia_chi: "required",
                 mota: {
                     required: true,
                     minlength: 50,
                     maxlength: 1500,
                 },
                 so_phongngu: "required",
                 captcha_confirm: {
                     required: true,
                     equalTo: "#captcha",
                 },
                 sdt_lienhe: {
                     required: true,
                     vali_phone: true,
                 },
                 email_lienhe: {
                     required: true,
                     vali_email: true,
                 },
             },
             messages: {
                 ban_thue: "Vui l??ng ch???n nhu c???u",
                 tieu_de: {
                     required: "Vui l??ng nh???p ti??u ?????",
                     minlength: "ti??u ????? ??t nh???t 40 k?? t???",
                     maxlength: "ti??u ????? nhi???u nh???t 70 k?? t???",
                 },
                 dientich: "Vui l??ng nh???p di???n t??ch",
                 td_gia_spham: "Vui l??ng nh???p ????? gi?? s???n ph???m",
                 chitiet_dm: "Vui l??ng ch???n chi ti???t danh m???c",
                 td_dia_chi: "Vui l??ng nh???p ?????a ch???",
                 mota: {
                     required: "Vui l??ng nh???p m?? t???",
                     minlength: "M?? t??? ??t nh???t 50 k?? t???",
                     maxlength: "M?? t??? nhi???u nh???t 1500 k?? t???",
                 },
                 so_phongngu: "Vui l??ng ch???n s??? ph??ng ng???",
                 captcha_confirm: {
                     required: "Vui l??ng nh???p m?? x??c nh???n",
                     equalTo: 'M?? x??c nh???n sai! Vui l??ng nh???p l???i',
                 },
                 sdt_lienhe: {
                     required: "Nh???p s??? ??i???n tho???i li??n h???",
                 },
                 email_lienhe: {
                     required: "Nh???p email li??n h???",
                 },
             },
         });
         if (form_bds_nhadat.valid() === false) {
             event.preventDefault();
             event.stopPropagation();
             var errorElements = $("span.error");
             for (let index = 0; index < errorElements.length; index++) {
                 if ($(errorElements[index]).find("label").text() != "") {
                     const element = errorElements[index];
                     $('html, body').animate({
                         scrollTop: $(errorElements[index]).offset().top - 80
                     }, 1000);
                     return false;
                 }
             }
         };
         if (form_bds_nhadat.valid() === true) {
             var ban_thue = $("select[name='ban_thue']").val();
             var tieu_de = $("input[name='tieu_de']").val();
             var id_dm = $(".dmuc-spham").attr('data');
             var ten_toanha = $("input[name='ten_toanha']").val();

             var so_tang = $("select[name='so_tang']").val();
             var so_nhavs = $("select[name='so_nhavs']").val();
             var so_phongngu = $("select[name='so_phongngu']").val();
             var huong_cua = $("select[name='huong_cua']").val();
             var giayto = $("select[name='giayto']").val();
             var tinhtrangnt = $("select[name='tinhtrangnt']").val();
             var dacdiem = 0;
             var count = $('.checkbox_dacdiem:checked').length
             if (count != 0) {
                 var checkBox = $('.checkbox_dacdiem');
                 dacdiem = (count == 1) ? ($(checkBox[0]).is(':checked') ? 1 : 2) : 3;
             }
             var dientich = $("input[name='dientich']").val();
             var chieudai = $("input[name='chieudai']").val();
             var chieungang = $("input[name='chieungang']").val();
             var td_gia_spham = $("input[name='td_gia_spham']").val();
             if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                 var td_gia_spham = 0;
             };
             var mo_ta = $("textarea[name='mota']").val();
             var ctiet_dmuc = $("select[name='chitiet_dm']").val();
             var tinh_thanh = $("select[name='thanhpho']").val();
             var quan_huyen = $("select[name='quanhuyen']").val();
             var phuong_xa = $("select[name='phuongxa']").val();
             var so_nha = $("input[name='md_so_nha']").val();
             var dia_chi = $("input[name='td_dia_chi']").val();
             //  alert(user_type);
             var phan_biet = 2;
             var anh_dd = [];
             $(".anh_dadang").each(function() {
                 var anh_dang = $(this).children('img').attr("src");
                 if (anh_dang != "") {
                     anh_dd.push(anh_dang);
                 }
             });
             var donvi_ban = $(".donvi_ban").val();

             var fd = new FormData();
             fd.append("id_dmuc", id_dm);
             fd.append('loai_sp', ban_thue);
             fd.append('tieu_de', tieu_de);
             fd.append('loai_sp3', ten_toanha);
             fd.append('loai_sp5', so_tang);
             fd.append('loai_sp6', so_nhavs);
             fd.append('loai_sp7', so_phongngu);
             fd.append('loai_sp8', huong_cua);
             fd.append('loai_sp9', giayto);
             fd.append('loai_sp10', tinhtrangnt);
             fd.append('loai_sp11', dientich);
             fd.append('loai_sp12', chieudai);
             fd.append('loai_sp13', chieungang);
             fd.append('loai_sp14', dacdiem);
             fd.append('gia_spham', td_gia_spham);
             fd.append('mo_ta', mo_ta);
             fd.append('ctiet_dmuc', ctiet_dmuc);
             fd.append('tinh_thanh', tinh_thanh);
             fd.append('quan_huyen', quan_huyen);
             fd.append('phuong_xa', phuong_xa);
             fd.append('so_nha', so_nha);
             fd.append('dia_chi', dia_chi);
             fd.append('avt_anh', arr_src.concat(anh_dd));
             fd.append('phan_biet', phan_biet);
             fd.append('donvi_ban', donvi_ban);

             $.ajax({
                 url: '/render/xemtrc_tdang.php',
                 type: 'POST',
                 data: fd,
                 contentType: false,
                 processData: false,
                 success: function(data) {
                     $(".v_container").removeClass("d_none");
                     $(".v_container").html(data);
                     $(".tindang-container").addClass("d_none");
                 }
             })
         }
     }
 </script>

 </html>