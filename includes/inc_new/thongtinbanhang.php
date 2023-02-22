<? if ($xacthuc_lket == 1 && !isset($id_nd) && $id_nd == 0) { ?>
    <div class="m_thongtinbanhang d_flex fl_cl">
        <p class="ttbh_title p_600_s16_l19 cl_cam">
            Thông tin bán hàng
        </p>

        <div class="m_phannhomloaisp">
            <p class="pnlsp_title p_400_s15_l18">
                Phân nhóm loại sản phẩm
            </p>
            <div class="box_add_pnlsp">
                <div class="txt_add_pnlsp cursor_Pt d_flex fl_row al_ct jtf_spb">
                    <img src="/images/m_raonhanh_imgnew/add.svg" class="img20 icon_add_pnlsp">
                    <p class="p_add_pnlsp p_400_s16_l19 cl_cam">Thêm nhóm phân loại sản phẩm</p>
                </div>
            </div>
        </div>
        <div class="container_ttbh">
            <div class="m_bangphannhomloaisp">
                <div class="box_share_bnplsp">

                </div>
                <div class="box_add_bpnlsp d_flex fl_cl gap20">
                    <div class="txt_add_bpnlsp cursor_Pt d_flex fl_row al_ct jtf_spb">
                        <img src="/images/m_raonhanh_imgnew/add.svg" class="img20 icon_add_bpnlsp">
                        <p class="p_add_bpnlsp p_400_s16_l19 cl_cam">Thêm nhóm phân loại sản phẩm</p>
                    </div>
                    <div class="txt_update_bpnlsp cursor_Pt d_flex fl_row al_ct">
                        <img src="/images/m_raonhanh_imgnew/add.svg" class="img20 icon_add_bpnlsp">
                        <p class="cap_nhat p_400_s16_l19 cl_cam">Cập nhật thuộc tính</p>
                    </div>
                </div>
                <!--  -->
                <div class="m_bangphanloai">
                    <p class="bangphanloai_title p_400_s16_l19">Bảng phân loại</p>
                    <div class="box_bangphanloai d_flex al_ct fl_row">
                        <div class="box_bpl_loai p_400_s16_l19">
                            Loại
                        </div>
                        <div class="box_bpl_soluongkho">
                            <p class="bpl_slk_title p_400_s16_l19">Số lượng trong kho <span class="cl_red">*</span></p>
                            <div class="bpl_slk_frame  p_400_s14_l16 cl_99999">
                                Nhập
                            </div>
                        </div>
                        <div class="box_bpl_giaban">
                            <p class="bpl_gb_title p_400_s16_l19">Giá bán <span class="cl_red">*</span></p>
                            <div class="bpl_gb_frame d_flex fl_row al_ct p_400_s14_l16 cl_99999">
                                <p class="gia_bpl p_400_s14_l16 cl_99999">Giá</p>
                                <p class="show_donvi p_400_s14_l16">VNĐ</p>
                            </div>
                        </div>
                        <div class="box_bpl_xoa p_400_s16_l19">
                            Xóa
                        </div>
                    </div>
                    <!--  -->
                    <div class="container_ft_bpl">
                    </div>
                </div>
            </div>
        </div>
        <!-- -----------------------giá số lượng kho----------------------------- -->
        <div class="m_gia_slkho d_flex fl_row gap20">
            <div class="b3_fr2_gia box_input_infor">
                <p class="b3_fr2_gia_tt p_400_s15_l18">Giá <span class="cl_red">*</span></p>
                <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                    <input type="text" onkeyup="format_gtri(this)" name="td_gia_spham" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Giá" autocomplete="off">
                    <div class="donvitien p_400_s14_l17">
                        <select class="dt-money-up donvi_ban" name="dvi_tien">
                            <option value="1">VNĐ</option>
                            <option value="2">USD</option>
                            <option value="3">EURO</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="m_soluongkho cursor_Pt box_input_infor">
                <p class="title_slk p_400_s15_l18">Số lượng trong kho <span class="cl_red">*</span></p>
                <input type="text" name="so_luong_kho" value="" class="btn_slk ft_bpl_slk p_400_s14_l16 cl_99999 w100" placeholder="Số lượng trong kho">
            </div>
        </div>
        <!-- -----------------------khuyen mai----------------------------- -->
        <div class="m_khuyemmai">
            <div class="khuyemai_add_khuyemmai">
                <div class="txt_add_km cursor_Pt d_flex fl_row al_ct">
                    <img src="/images/m_raonhanh_imgnew/add.svg" class="img20 icon_add_km">
                    <p class="p_add_km p_400_s16_l19 cl_cam">Thêm khuyến mãi</p>
                </div>
            </div>
            <div class="khuyenmai_bangkm">
                <div class="container_km_bangkm d_flex fl_cl gap20">
                    <div class="bkm_xoa_km w100 d_flex jtf_end">
                        <img src="/images/m_raonhanh_imgnew/delete_red.png" class="icon_xoa_km img20 cursor_Pt">
                    </div>
                    <div class="bkm_loai_giatri_km d_flex fl_row gap20">
                        <div class="box_loai_km box_input_infor">
                            <p class="loai_km_txt p_400_s15_l18 mg_bt5">Loại khuyến mãi <span class="cl_red">*</span></p>
                            <select class="loai_km slect-hang out-Line p_400_s14_l16 cursor_Pt" name="loai_khuyenmai">
                                <option value="">Chọn</option>
                                <option value="1">Giảm %</option>
                                <option value="2">Giảm số tiền</option>
                            </select>
                        </div>
                        <div class="box_giatri_km box_input_infor">
                            <p class="giatri_km_txt p_400_s15_l18 mg_bt5">Giá trị <span class="cl_red">*</span></p>
                            <div class="giatri_km d_flex fl_row al_ct">
                                <input type="text" name="giatri_khuyenmai" class="giatri_km_input p_400_s14_l16" disabled onkeyup="format_gtri(this)" placeholder="Nhập giá trị giảm" oninput="<?= $oninput ?>">
                                <p class="show_dv_km p_400_s14_l16">%</p>
                            </div>
                        </div>
                    </div>
                    <div class="bkm_ngaybd_ngaykt_km d_flex fl_row gap20">
                        <div class="box_bkm_ngaybd box_input_infor">
                            <p class="bkm_nbd_txt p_400_s15_l18 mg_bt5">Ngày bắt đầu <span class="cl_red">*</span></p>
                            <input type="date" name="ngay_bat_dau" placeholder="bkm_ngaybd_input">
                        </div>
                        <div class="box_bkm_ngaykt box_input_infor">
                            <p class="bkm_nkt_txt p_400_s15_l18 mg_bt5">Ngày kết thúc <span class="cl_red">*</span></p>
                            <input type="date" name="ngay_ket_thuc" placeholder="bkm_ngaykt_input">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- --------------------------------------------so luong dat hang-------------------------------------------------------- -->
        <div class="m_soluongdathang d_flex fl_row gap20">
            <div class="sldh_toithieu box_input_infor">
                <p class="sldh_toithieu_txt mg_bt5 p_400_s15_l18 d_flex fl_row al_ct gap5">Số lượng đặt hàng tối thiểu <span class="cl_red">*</span>
                    <img src="/images/m_raonhanh_imgnew/Question Circle.png" class="img16 cursor_Pt question_cirlce question_cirlce_tt">
                </p>
                <input type="text" name="soluong_min" class="sldh_toithieu_input p_400_s14_l16" placeholder="1">
                <p class="thongbao_sltt">Số lượng khách hàng phải đặt hàng tối thiểu trong đơn</p>
            </div>
            <div class="sldh_toida box_input_infor">
                <p class="sldh_toida_txt mg_bt5 p_400_s15_l18">Số lượng đặt hàng tối đa</p>
                <div class="sldh_toida_add d_flex fl_row al_ct">
                    <img src="/images/m_raonhanh_imgnew/add.svg" class="img20 icon_add_sldhtd">
                    <p class="p_add_sldhtd p_400_s16_l19 cl_cam">Thêm số lượng đặt hàng tối đa</p>
                </div>
                <div class="sldh_toida_show">
                    <div class="d_flex fl_row al_ct gap30">
                        <input type="text" name="soluong_max" class="sldh_toida_input p_400_s14_l16" placeholder="1">
                        <img src="/images/m_raonhanh_imgnew/minus-cirlce.png" class="img20 cursor_Pt xoa_dhtd">
                    </div>
                </div>
            </div>
        </div>
        <!-- --------------------------------------------so luong dat hang--------------------------------------------------------- -->
        <div class="m_vanchuyen box_input_infor">
            <p class="vanchuyen_title mg_bt5 p_400_s15_l18">Vận chuyển <span class="cl_red">*</span></p>
            <div class="container_vanchuyen d_flex fl_row">
                <div class="vc_mienphi_vanchuyen d_flex fl_row al_ct">
                    <input type="radio" name="van_chuyen" value="1" class="mienphi_vanchuyen_input vanchuyen_input img20 cursor_Pt" checked>
                    <p class="mienphi_vanchuyen_txt p_400_s14_l16">Miễn phí vận chuyển</p>
                </div>
                <!-- -------------------------- -->
                <div class="box_phivanchuyen d_flex fl_row al_ct">
                    <div class="vc_phi_vanchuyen d_flex fl_row al_ct">
                        <input type="radio" name="van_chuyen" value="2" class="phi_vanchuyen_input vanchuyen_input img20 cursor_Pt">
                        <p class="phi_vanchuyen_txt p_400_s14_l16">Phí vận chuyển</p>
                    </div>
                    <div class="nhapphivanchuyen">
                        <div class="npvc_box d_flex fl_row al_ct p_400_s14_l16 cl_99999">
                            <input type="text" onkeyup="format_gtri(this)" name="phi_van_chuyen" class="npvc_box_input b3_fr2_gia_input p_400_s14_l16" placeholder="Nhập phí vận chuyển" autocomplete="off">
                            <div class="donvitien_vanchuyen donvitien p_400_s14_l17">
                                <select class="dt-money-up donvi_ban p_400_s14_l16 out-Line" name="dvi_tien_vc">
                                    <option value="1">VNĐ</option>
                                    <option value="2">USD</option>
                                    <option value="3">EURO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ------------------------ -->
            </div>
        </div>
    </div>
<? } else if ($xacthuc_lket == 1 && isset($id_nd) && $id_nd != 0) {
    $list_tin_xt = new db_query("SELECT `id_new`,`nhom_phan_loai`,`phan_loai`,`loai`,`so_luong_kho`,`loai_khuyenmai`,
                                        `giatri_khuyenmai`,`van_chuyen`,`phi_van_chuyen`,`gia_sanpham_xt`,`donvi_tien_xt`,donvi_tien_vc  
                                    FROM `thongtin_banhang` WHERE `id_new` = $id_nd");
    $numrows = mysql_num_rows($list_tin_xt->result);
    $query_xttin = mysql_fetch_assoc($list_tin_xt->result);

?>
    <div class="m_thongtinbanhang d_flex fl_cl">
        <p class="ttbh_title p_600_s16_l19 cl_cam">
            Thông tin bán hàng
        </p>
        <div class="m_phannhomloaisp" <?= ($numrows > 0 && $query_xttin['nhom_phan_loai'] != "" && $query_xttin['phan_loai'] != "") ? 'style="display: none;"' : 'style="display: block;"' ?>>
            <p class="pnlsp_title p_400_s15_l18">
                Phân nhóm loại sản phẩm
            </p>
            <div class="box_add_pnlsp">
                <div class="txt_add_pnlsp cursor_Pt d_flex fl_row al_ct jtf_spb">
                    <img src="/images/m_raonhanh_imgnew/add.svg" class="img20 icon_add_pnlsp">
                    <p class="p_add_pnlsp p_400_s16_l19 cl_cam">Thêm nhóm phân loại sản phẩm</p>
                </div>
            </div>
        </div>
        <div class="container_ttbh" <?= ($numrows > 0 && $query_xttin['nhom_phan_loai'] != "" || $query_xttin['phan_loai'] != "") ? 'style="display: block;"' : "" ?>>
            <div class="m_bangphannhomloaisp">
                <div class="box_share_bnplsp">

                    <?
                    $nhomphanloai = $query_xttin['nhom_phan_loai'];
                    $phanloai = $query_xttin['phan_loai'];
                    if ($nhomphanloai != "" && $phanloai != "") {
                        $nhomphanloai = explode(";", $nhomphanloai);
                        $phanloai = explode(";", $phanloai);
                        foreach ($nhomphanloai as $key => $npl) {

                    ?>
                            <div class="frame_share_bnplsp d_flex fl_row gap20 al_ct mg_t15">
                                <div class="fr_share_nhomphanloaisp">
                                    <div class="nhomphanloaisp_text p_400_s15_l18 mg_bt5">Nhóm phân loại sản phẩm <span class="cl_red">*</span></div>
                                    <input type="text" value="<?= ltrim($npl, ",") ?>" class="nhomphanloaisp_select p_400_s14_l16" name="nhom_phan_loai" maxlength="20" onKeyUp="dem_kitu(this)" placeholder="Nhập nhóm phân loại sản phẩm (cách nhau bằng dấu , )">
                                    <div class="nplsp_note p_400_s12_l14 cl_99999">
                                        <input type="text" name="count_kitu" class="count_kitu" value="0"> / 20 ký tự
                                    </div>
                                </div>
                                <div class="fr_share_cacphanloai">
                                    <div class="phanloaisp_text p_400_s15_l18 mg_bt5">Các phân loại</div>
                                    <input type="text" value="<?= ltrim($phanloai[$key], ",") ?>" class="phanloaisp_select p_400_s14_l16" name="phan_loai" placeholder="Nhập phân loại (cách nhau bằng dấu , )">
                                </div>
                                <div class="delete_nplsp cursor_Pt mgt_20" onclick="delete_nplsp(this)">
                                    <img src="/images/m_raonhanh_imgnew/delete_red.png" class="icon_delete_nplsp img20">
                                </div>
                            </div>
                    <? }
                    } ?>

                </div>
                <div class="box_add_bpnlsp d_flex fl_cl gap20">
                    <div class="txt_add_bpnlsp cursor_Pt d_flex fl_row al_ct jtf_spb">
                        <img src="/images/m_raonhanh_imgnew/add.svg" class="img20 icon_add_bpnlsp">
                        <p class="p_add_bpnlsp p_400_s16_l19 cl_cam">Thêm nhóm phân loại sản phẩm</p>
                    </div>
                    <div class="txt_update_bpnlsp cursor_Pt d_flex fl_row al_ct">
                        <img src="/images/m_raonhanh_imgnew/add.svg" class="img20 icon_add_bpnlsp">
                        <p class="cap_nhat p_400_s16_l19 cl_cam">Cập nhật thuộc tính</p>
                    </div>
                </div>
                <!--  -->
                <div class="m_bangphanloai" <?= ($numrows > 0 && $query_xttin['loai'] != "" && $query_xttin['so_luong_kho'] != "") ? 'style="display: block;"' : 'style="display: none;"' ?>>
                    <p class="bangphanloai_title p_400_s16_l19">Bảng phân loại</p>
                    <div class="box_bangphanloai d_flex al_ct fl_row">
                        <div class="box_bpl_loai p_400_s16_l19">
                            Loại
                        </div>
                        <div class="box_bpl_soluongkho">
                            <p class="bpl_slk_title p_400_s16_l19">Số lượng trong kho <span class="cl_red">*</span></p>
                            <div class="bpl_slk_frame  p_400_s14_l16 cl_99999">
                                Nhập
                            </div>
                        </div>
                        <div class="box_bpl_giaban">
                            <p class="bpl_gb_title p_400_s16_l19">Giá bán <span class="cl_red">*</span></p>
                            <div class="bpl_gb_frame d_flex fl_row al_ct p_400_s14_l16 cl_99999">
                                <p class="gia_bpl p_400_s14_l16 cl_99999">Giá</p>
                                <p class="show_donvi p_400_s14_l16">VNĐ</p>
                            </div>
                        </div>
                        <div class="box_bpl_xoa p_400_s16_l19">
                            Xóa
                        </div>
                    </div>
                    <!--  -->
                    <div class="container_ft_bpl">
                        <?
                        $loai = $query_xttin['loai'];
                        // echo "<pre>";
                        // print_r($loai);
                        // echo "</pre>";
                        $soluongkho = $query_xttin['so_luong_kho'];
                        // echo "<pre>";
                        // print_r($soluongkho);
                        // echo "</pre>";
                        $giasp_xt = $query_xttin['gia_sanpham_xt'];
                        // echo "<pre>";
                        // print_r($giasp_xt);
                        // echo "</pre>";
                        $dvitien = $query_xttin['donvi_tien_xt'];
                        if ($loai != "" && $soluongkho != "" && $giasp_xt != "" && $dvitien != "") {
                            $loai = explode(";", $loai);
                            $soluongkho = explode(";", $soluongkho);
                            $giasp_xt = explode(";", $giasp_xt);
                            $dvitien = explode(";", $dvitien);
                            foreach ($loai as $key => $loai) {
                        ?>
                                <div class="footer_bangphanloai d_flex al_ct fl_row pd_t_20">
                                    <div class="footer_bpl_loai p_400_s16_l19"><?= ltrim($loai, ',') ?></div>
                                    <div class="footer_bpl_soluongkho">
                                        <input type="text" name="so_luong_kho" value="<?= ltrim($soluongkho[$key], ',') ?>" placeholder="Nhập" class="ft_bpl_slk  p_400_s14_l16 cl_99999">
                                    </div>
                                    <div class="footer_bpl_giaban">
                                        <div class="ft_bpl_gb d_flex fl_row al_ct p_400_s14_l16 cl_99999">
                                            <input type="text" onkeyup="format_gtri(this)" value="<?= number_format($giasp_xt[$key]) ?>" name="gia_spham_xt" class="txt_gia_bpl b3_fr2_gia_input p_400_s14_l16" placeholder="Giá" autocomplete="off">
                                            <div class="donvitien p_400_s14_l17">
                                                <select class="dt-money-up donvi_ban donvitien_xt p_400_s14_l16" name="dvi_tien_xt">
                                                    <option value="1" <?= (ltrim($dvitien[$key], ",") == 1) ? "selected" : "" ?>>VNĐ</option>
                                                    <option value="2" <?= (ltrim($dvitien[$key], ",") == 2) ? "selected" : "" ?>>USD</option>
                                                    <option value="3" <?= (ltrim($dvitien[$key], ",") == 3) ? "selected" : "" ?>>EURO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer_bpl_xoa p_400_s16_l19">
                                        <img src="/images/m_raonhanh_imgnew/delete_red.png" class="icon_delete_loai img20 cursor_Pt" onclick="delete_bangplsp(this)">
                                    </div>
                                </div>
                        <? }
                        } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- -----------------------giá số lượng kho----------------------------- -->
        <div class="m_gia_slkho d_flex fl_row gap20">
            <div class="b3_fr2_gia box_input_infor <?= ($numrows > 0 && $query_xttin['nhom_phan_loai'] != "") ? 'op7' : "rm_op7" ?>">
                <p class="b3_fr2_gia_tt p_400_s15_l18">Giá <span class="cl_red">*</span></p>
                <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                    <input type="text" onkeyup="format_gtri(this)" value="<?= ($query_xttin['nhom_phan_loai'] != "") ? "" : number_format($item_td['new_money']) ?>" name="td_gia_spham" <?= ($query_xttin['nhom_phan_loai'] != "") ? 'disabled' : "" ?> class="b3_fr2_gia_input p_400_s14_l17" placeholder="Giá" autocomplete="off">
                    <div class="donvitien p_400_s14_l17">
                        <select class="dt-money-up donvi_ban" name="dvi_tien" <?= ($query_xttin['nhom_phan_loai'] != "") ? 'disabled' : "" ?>>
                            <option value="1" <?= ($item_td['new_unit'] == 1) ? "selected" : "" ?>>VNĐ</option>
                            <option value="2" <?= ($item_td['new_unit'] == 2) ? "selected" : "" ?>>USD</option>
                            <option value="3" <?= ($item_td['new_unit'] == 3) ? "selected" : "" ?>>EURO</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="m_soluongkho cursor_Pt box_input_infor <?= ($numrows > 0 && $query_xttin['nhom_phan_loai'] != "") ? 'op7' : "rm_op7" ?>">
                <p class="title_slk p_400_s15_l18">Số lượng trong kho <span class="cl_red">*</span></p>
                <input type="text" name="sl_kho_don" placeholder="Số lượng trong kho" value="<?= ($query_xttin['nhom_phan_loai'] != "") ? "" :  $query_xttin['so_luong_kho'] ?>" <?= ($numrows > 0 && $query_xttin['nhom_phan_loai'] != "") ? 'disabled' : "" ?> class="btn_slk ft_bpl_slk p_400_s14_l16 cl_99999 w100">
            </div>
        </div>
        <!-- -----------------------khuyen mai----------------------------- -->
        <div class="m_khuyemmai">
            <div class="khuyemai_add_khuyemmai" <?= ($numrows > 0 && $query_xttin['loai_khuyenmai'] != "" && $query_xttin['loai_khuyenmai'] != 0 || $query_xttin['giatri_khuyenmai'] != "" && $query_xttin['giatri_khuyenmai'] != 0) ? 'style = "display: none;"' : "" ?>>
                <div class="txt_add_km cursor_Pt d_flex fl_row al_ct">
                    <img src="/images/m_raonhanh_imgnew/add.svg" class="img20 icon_add_km">
                    <p class="p_add_km p_400_s16_l19 cl_cam">Thêm khuyến mãi</p>
                </div>
            </div>
            <div class="khuyenmai_bangkm" <?= ($numrows > 0 && $query_xttin['loai_khuyenmai'] != "" && $query_xttin['loai_khuyenmai'] != 0 || $query_xttin['giatri_khuyenmai'] != "" && $query_xttin['giatri_khuyenmai'] != 0) ? 'style = "display: block;"' : "" ?>>
                <div class="container_km_bangkm d_flex fl_cl gap20">
                    <div class="bkm_xoa_km w100 d_flex jtf_end">
                        <img src="/images/m_raonhanh_imgnew/delete_red.png" class="icon_xoa_km img20 cursor_Pt">
                    </div>
                    <div class="bkm_loai_giatri_km d_flex fl_row gap20">
                        <div class="box_loai_km box_input_infor">
                            <p class="loai_km_txt p_400_s15_l18 mg_bt5">Loại khuyến mãi <span class="cl_red">*</span></p>
                            <select class="loai_km slect-hang out-Line p_400_s14_l16 cursor_Pt" name="loai_khuyenmai">
                                <option value="" selected disabled>Chọn</option>
                                <option value="1" <?= ($query_xttin['loai_khuyenmai'] == 1) ? "selected" : "" ?>>Giảm %</option>
                                <option value="2" <?= ($query_xttin['loai_khuyenmai'] == 2) ? "selected" : "" ?>>Giảm số tiền</option>
                            </select>
                        </div>
                        <div class="box_giatri_km box_input_infor">
                            <p class="giatri_km_txt p_400_s15_l18 mg_bt5">Giá trị <span class="cl_red">*</span></p>
                            <div class="giatri_km d_flex fl_row al_ct">
                                <input type="text" name="giatri_khuyenmai" value="<?= number_format($query_xttin['giatri_khuyenmai']) ?>" <?= ($numrows > 0 && $query_xttin['giatri_khuyenmai'] != "" && $query_xttin['giatri_khuyenmai'] != 0) ? "" : "disabled" ?> class="giatri_km_input p_400_s14_l16" onkeyup="format_gtri(this)" placeholder="Nhập giá trị giảm" oninput="<?= $oninput ?>">
                                <p class="show_dv_km p_400_s14_l16"><?= ($query_xttin['loai_khuyenmai'] == 1)?"%":"VNĐ" ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="bkm_ngaybd_ngaykt_km d_flex fl_row gap20">
                        <div class="box_bkm_ngaybd box_input_infor">
                            <p class="bkm_nbd_txt p_400_s15_l18 mg_bt5" <? echo $item_td['thoigian_kmbd'] ?>>Ngày bắt đầu <span class="cl_red">*</span></p>
                            <input type="date" value="<?=($item_td['thoigian_kmbd'] != "" && $item_td['thoigian_kmbd'] != 0) ? date('Y-m-d', $item_td['thoigian_kmbd']) : '' ?>" name="ngay_bat_dau" placeholder="bkm_ngaybd_input">
                        </div>
                        <div class="box_bkm_ngaykt box_input_infor">
                            <p class="bkm_nkt_txt p_400_s15_l18 mg_bt5">Ngày kết thúc <span class="cl_red">*</span></p>
                            <input type="date" value="<?=($item_td['thoigian_kmkt'] != "" && $item_td['thoigian_kmbd'] != 0) ? date('Y-m-d', $item_td['thoigian_kmkt']) : "" ?>" name="ngay_ket_thuc" placeholder="bkm_ngaykt_input">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- --------------------------------------------so luong dat hang-------------------------------------------------------- -->
        <div class="m_soluongdathang d_flex fl_row gap20">
            <div class="sldh_toithieu box_input_infor">
                <p class="sldh_toithieu_txt mg_bt5 p_400_s15_l18 d_flex fl_row al_ct gap5">Số lượng đặt hàng tối thiểu <span class="cl_red">*</span>
                    <img src="/images/m_raonhanh_imgnew/Question Circle.png" class="img16 cursor_Pt question_cirlce question_cirlce_tt">
                </p>
                <input type="text" name="soluong_min" value="<?= $item_td['soluong_min'] ?>" class="sldh_toithieu_input p_400_s14_l16" placeholder="1">
                <p class="thongbao_sltt">Số lượng khách hàng phải đặt hàng tối thiểu trong đơn</p>
            </div>
            <div class="sldh_toida box_input_infor">
                <? if (($item_td['soluong_max'] != "" && $item_td['soluong_max'] != 0)) { ?>
                    <p class="sldh_toida_txt_khac mg_bt5 p_400_s15_l18 d_flex fl_row al_ct gap5">Số lượng đặt hàng tối đa <span class="cl_red">*</span>
                        <img src="/images/m_raonhanh_imgnew/Question Circle.png" class="img16 cursor_Pt question_cirlce question_cirlce_td" onclick="tbtd(this)">
                    </p>
                    <p class="thongbao_sltd">Số lượng khách hàng đặt hàng tối đa trong đơn</p>
                <? } else { ?>
                    <p class="sldh_toida_txt mg_bt5 p_400_s15_l18">Số lượng đặt hàng tối đa</p>
                <? } ?>
                <div class="sldh_toida_add d_flex fl_row al_ct" <?= ($numrows > 0 && $item_td['soluong_max'] != "" && $item_td['soluong_max'] != 0) ? 'style="display: none;"' : '' ?>>
                    <img src="/images/m_raonhanh_imgnew/add.svg" class="img20 icon_add_sldhtd">
                    <p class="p_add_sldhtd p_400_s16_l19 cl_cam">Thêm số lượng đặt hàng tối đa</p>
                </div>
                <div class="sldh_toida_show" <?= ($numrows > 0 && $item_td['soluong_max'] != "" && $item_td['soluong_max'] != 0) ? 'style="display: block;"' : '' ?>>
                    <div class="d_flex fl_row al_ct gap30">
                        <input type="text" value="<?= $item_td['soluong_max'] ?>" name="soluong_max" class="sldh_toida_input p_400_s14_l16" placeholder="1">
                        <img src="/images/m_raonhanh_imgnew/minus-cirlce.png" class="img20 cursor_Pt xoa_dhtd">
                    </div>
                </div>
            </div>
        </div>
        <!-- --------------------------------------------so luong dat hang--------------------------------------------------------- -->
        <div class="m_vanchuyen box_input_infor">
            <p class="vanchuyen_title mg_bt5 p_400_s15_l18">Vận chuyển <span class="cl_red">*</span></p>
            <div class="container_vanchuyen d_flex fl_row">
                <div class="vc_mienphi_vanchuyen d_flex fl_row al_ct">
                    <input type="radio" name="van_chuyen" value="1" <?= ($query_xttin['van_chuyen'] == 1) ? "checked" : "" ?> class="mienphi_vanchuyen_input vanchuyen_input img20 cursor_Pt">
                    <p class="mienphi_vanchuyen_txt p_400_s14_l16">Miễn phí vận chuyển</p>
                </div>
                <!-- -------------------------- -->
                <div class="box_phivanchuyen d_flex fl_row al_ct">
                    <div class="vc_phi_vanchuyen d_flex fl_row al_ct">
                        <input type="radio" name="van_chuyen" value="2" <?= ($query_xttin['van_chuyen'] == 2) ? "checked" : "" ?> class="phi_vanchuyen_input vanchuyen_input img20 cursor_Pt">
                        <p class="phi_vanchuyen_txt p_400_s14_l16">Phí vận chuyển</p>
                    </div>
                    <div class="nhapphivanchuyen" <?= ($query_xttin['van_chuyen'] == 2) ? 'style="display: block;"' : "" ?>>
                        <div class="npvc_box d_flex fl_row al_ct p_400_s14_l16 cl_99999">
                            <input type="text" onkeyup="format_gtri(this)" value="<?= number_format($query_xttin['phi_van_chuyen']) ?>" name="phi_van_chuyen" class="npvc_box_input b3_fr2_gia_input p_400_s14_l16" placeholder="Nhập phí vận chuyển" autocomplete="off">
                            <div class="donvitien_vanchuyen donvitien p_400_s14_l17">
                                <select class="dt-money-up donvi_ban p_400_s14_l16 out-Line" name="dvi_tien_vc">
                                    <option value="1" <?= ($query_xttin['donvi_tien_vc'] == 1) ? "selected" : "" ?>>VNĐ</option>
                                    <option value="2" <?= ($query_xttin['donvi_tien_vc'] == 2) ? "selected" : "" ?>>USD</option>
                                    <option value="3" <?= ($query_xttin['donvi_tien_vc'] == 3) ? "selected" : "" ?>>EURO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ------------------------ -->
            </div>
        </div>
    </div>
<? }  ?>