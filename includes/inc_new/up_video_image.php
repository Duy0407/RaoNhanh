<div class="ctn_ct_box2 ctn_ct_b2_media">
    <div class="ctn_ct_b2_fr d_flex fl_row">
        <div class="container_b2_fr_media d_flex fl_row <?= (isset($avt_dangtin) && $avt_dangtin != '') ? 'active_anhdd' : '' ?>">
            <!-- truoc khi dang anh -->
            <? if ((!isset($avt_dangtin) && $avt_dangtin == "") || (isset($avt_dangtin) && $avt_dangtin == "")) { ?>
                <div class="before_upload_picture">
                    <div class="b2_fr_media d_flex fl_row jtf_ct cursor_Pt" onclick="anh_chon(this)" data="<?= $_COOKIE['UID'] ?>">
                        <div class="b2_fr_picture_add d_flex fl_cl al_ct jtf_ct">
                            <img src="/images/m_raonhanh_imgnew/Gallery_Add.png" alt="Icon thêm ảnh" class="picture_add_img img32">
                            <p class="picture_add_txt p_600_s11_l13 cl_cam pdt_10 txt_al_ct">TỐI ĐA 10 HÌNH</p>
                        </div>
                    </div>
                </div>
                <!-- sau khi dang anh -->
                <div class="after_upload_picture d_none" data="">
                    <div class="d_flex fl_row gap_20 ">
                        <div class="b2_fr_picture_content d_flex fl_row al_ct gap_20">
                            <div class="b2_fr_media d_flex fl_row al_ct jtf_ct cursor_Pt" onclick="anh_chon(this)" data="<?= $_COOKIE['UID'] ?>">
                                <div class="b2_fr_picture_add d_flex fl_cl al_ct jtf_ct">
                                    <img src="/images/m_raonhanh_imgnew/Gallery_Add.png" alt="Icon thêm ảnh" class="picture_add_img img32">
                                    <p class="picture_add_txt p_600_s11_l13 cl_cam pdt_10 txt_al_ct">TỐI ĐA 10 HÌNH</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <? } else if (isset($avt_dangtin) && $avt_dangtin != "") {
                $anh_dangtin = explode(';', $avt_dangtin); ?>
                <div class="after_upload_picture" data="<?= count($anh_dangtin) ?>">
                    <div class="d_flex fl_row gap_20 ">
                        <div class="b2_fr_picture_content d_flex fl_row al_ct gap_20" data="<?= $anh_dangtin[$i] ?>">
                            <div class="b2_fr_media d_flex fl_row al_ct jtf_ct cursor_Pt" onclick="anh_chon(this)" data="<?= $_COOKIE['UID'] ?>">
                                <div class="b2_fr_picture_add d_flex fl_cl al_ct jtf_ct">
                                    <img src="/images/m_raonhanh_imgnew/Gallery_Add.png" alt="Icon thêm ảnh" class="picture_add_img img32">
                                    <p class="picture_add_txt p_600_s11_l13 cl_cam pdt_10 txt_al_ct">TỐI ĐA 10 HÌNH</p>
                                </div>
                            </div>
                            <? $st = 1;
                            for ($i = 0; $i < count($anh_dangtin); $i++) { ?>
                                <div class="b2_fr_picture_show">
                                    <span class="close xoa_bocu" onclick="del_img_anh(this)"><img src="/images/img_new/exp_del_avt.png" alt="close this image" /></span>
                                    <img src="<?= $anh_dangtin[$i] ?>" onerror="this.closest('div').remove();" class="m_anh_dangtin m_anh_dangtin_chung" data='1' alt="ảnh tin đăng" />
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
            <? } ?>
        </div>
        <div class="m_dang_video <?= (isset($avt_dangtin) && $avt_dangtin != '') ? 'active_anhdd' : '' ?>">
            <label for="cl-upload-video-file" class="before-upload-video" <?= ($video_dangtin == "") ? "" : "style='display:none;'"  ?>>
                <div class="dang-tin-video hd-textalign hd_cspointer">
                    <div class="upload-media-cont">
                        <picture>
                            <source media="(max-width:480px)" srcset="../images/hd_video_upload_tin_dang_480.svg">
                            <img src="/images/m_raonhanh_imgnew/Videocamera_Add.png" alt="tải video sản phẩm cần bán">
                        </picture>
                        <p class="video_add_txt p_600_s11_l13 cl_cam pdt_10 txt_al_ct">TỐI ĐA 1 VIDEO 20MB</p>
                        <input type="file" name="upload-video-file" id="cl-upload-video-file" hidden accept="video/*" onchange="upload_video(this)">
                    </div>
                </div>
            </label>

            <div class="after-upload-video <?= ($video_dangtin == "") ? "" : "d_block"  ?>">
                <div class="dang-tin-video-after hd-textalign hd_cspointer hd-disflex">
                    <label class="hd_cspointer video-upload-after position-relative hd-disflex hd-align-center hd-jtify-center">
                        <div class="continue_upload_video">
                            <img src="/images/m_raonhanh_imgnew/Videocamera_Add.png" alt="tiếp tục đăng ảnh cần bán">
                            <p class="video_add_txt p_600_s11_l13 cl_cam pdt_10 txt_al_ct">TỐI ĐA 1 VIDEO 20MB</p>
                        </div>
                    </label>
                    <div class="avt_xoavideo" data="<?= ($video_dangtin == "") ? "" : $video_dangtin  ?>">
                        <? if ($video_dangtin != "") {
                            $video_lay = 'src=' . $video_dangtin;
                        } ?>
                        <video width="86px" height="86px" style="border-radius:5px" id="video_chon" controls class="continue_upload_video <?= ($video_dangtin == "") ? "d_none" : ""  ?>" <?= ($video_dangtin != "") ?  $video_lay : "" ?>>
                            <!-------video preview here------------------------>
                        </video>
                        <span class="close_vdeo"><img src="../images/hd_delete_icon.svg" alt="close this image" /></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>