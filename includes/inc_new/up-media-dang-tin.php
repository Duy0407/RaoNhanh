<div class="upload-media-content">
    <? if (!isset($avt_dangtin) && $avt_dangtin == "") {
    ?>
        <!-- <label for="cl-upload-image-file" class="before-upload-imgage add_img"> -->
        <label for="cl-upload-image-file" class="before-upload-imgage" onclick="anh_chon(this)" data="<?= $_COOKIE['UID'] ?>">
            <div class="dang-tin-image hd-textalign hd_cspointer">
                <div class="upload-media-cont">
                    <picture>
                        <source media="(max-width:480px)" srcset="../images/hd_photo_upload_tin_dang_480.svg" class="">
                        <img src="../images/hd_photo_upload_tin_dang.svg" class="" alt="tải ảnh sản phẩm cần bán">
                    </picture>
                    <p style="color:#F26222;">TỐI ĐA 10 HÌNH</p>
                </div>
            </div>
        </label>
        <div class="after-upload-imgage" data="">
            <div class="form-group hd-disflex">
                <!-- <div class="img position-relative hd-disflex hd-align-center hd-jtify-center hd_cspointer add_img"> -->
                <div class="img position-relative hd-disflex hd-align-center hd-jtify-center hd_cspointer" onclick="anh_chon(this)" data="<?= $_COOKIE['UID'] ?>">
                    <div class="div-image-upload">
                        <img class="" id="xt_img" src="../images/hd_upload_photo_after.svg" alt="" class="add-images-continue">
                    </div>
                    <div class="position-absolute"></div>
                    <!-- <input type="file" id="ip_xt_img" name="ip_xt_img[]" accept="image/*"> -->
                </div>
                <div class="list_img mb-4 show-btn">
                    <ul class="frame_img">
                    </ul>
                </div>
            </div>
        </div>
    <? } else if (isset($avt_dangtin) && $avt_dangtin != "") {
        $anh_dangtin = explode(';', $avt_dangtin);
    ?>
        <div class="after-upload-imgage d_block" data="<?= count($anh_dangtin) ?>">
            <div class="form-group hd-disflex">
                <!-- <div class="img position-relative hd-disflex hd-align-center hd-jtify-center hd_cspointer add_img" > -->
                <div class="img position-relative hd-disflex hd-align-center hd-jtify-center hd_cspointer" onclick="anh_chon(this)" data="<?= $_COOKIE['UID'] ?>">
                    <div class="div-image-upload">
                        <img class="" id="xt_img" src="../images/hd_upload_photo_after.svg" alt="" class="add-images-continue">
                    </div>
                    <div class="position-absolute"></div>
                    <!-- <input type="file" id="ip_xt_img" name="ip_xt_img[]" accept="image/*"> -->
                </div>
                <div class="list_img mb-4 show-btn">
                    <ul class="frame_img">
                        <? $st = 1;
                        for ($i = 0; $i < count($anh_dangtin); $i++) { ?>
                            <li class="li_files1" data="<?= $anh_dangtin[$i] ?>">
                                <div class="img-wrap">
                                    <span class="close xoa_bocu" onclick="del_img(this)"><img src="/images/img_new/exp_del_avt.png" alt="close this image" /></span>
                                    <div class="img-wrap-box anh_dadang">
                                        <img src="<?= $anh_dangtin[$i] ?>" onerror="this.closest('li').remove();" class="m_anh_dangtin" data="1" />
                                    </div>
                                </div>
                                <!-- <div class="anh_<?= $st++ ?>">
                                    <input type="file" onchange="uploadImg(this)" name="files[]" class="avt_files" accept="iamge/*" />
                                </div> -->
                            </li>
                        <? } ?>
                    </ul>
                </div>
            </div>
        </div>
    <? } ?>

    <label for="cl-upload-video-file" class="before-upload-video" <?= ($video_dangtin == "") ? "" : "style='display:none;'"  ?>>
        <div class="dang-tin-video hd-textalign hd_cspointer">
            <div class="upload-media-cont">
                <picture>
                    <source media="(max-width:480px)" srcset="../images/hd_video_upload_tin_dang_480.svg">
                    <img src="../images/hd_video_upload_tin_dang.svg" alt="tải video sản phẩm cần bán">
                </picture>
                <p style="color:#F26222;">TỐI ĐA 1 VIDEO 20MB</p>
                <input type="file" name="upload-video-file" id="cl-upload-video-file" hidden accept="video/*" onchange="upload_video(this)">
            </div>
        </div>
    </label>

    <div class="after-upload-video <?= ($video_dangtin == "") ? "" : "d_block"  ?>">
        <div class="dang-tin-video-after hd-textalign hd_cspointer hd-disflex">
            <label class="hd_cspointer video-upload-after position-relative hd-disflex hd-align-center hd-jtify-center">
                <div class="continue_upload_video">
                    <img src="../images/hd_upload_photo_after.svg" alt="tiếp tục đăng ảnh cần bán">
                </div>
            </label>
            <div class="avt_xoavideo" data="<?= ($video_dangtin == "") ? "" : $video_dangtin  ?>">
                <? if ($video_dangtin != "") {
                    $video_lay = 'src=/pictures/' . $video_dangtin;
                } ?>
                <video width="86px" height="86px" style="border-radius:5px" id="video_chon" controls class="continue_upload_video <?= ($video_dangtin == "") ? "d_none" : ""  ?>" <?= ($video_dangtin != "") ?  $video_lay : "" ?>>
                    <!-------video preview here------------------------>
                </video>
                <span class="close_vdeo"><img src="../images/hd_delete_icon.svg" alt="close this image" /></span>
            </div>
        </div>
    </div>

</div>