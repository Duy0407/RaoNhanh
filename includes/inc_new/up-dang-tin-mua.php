<div class="upload-media-content">
    <? if ($avt_dangtin == "") { ?>
        <label for="cl-upload-image-file" class="before-upload-imgage add_img">
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
                <div class="img position-relative hd-disflex hd-align-center hd-jtify-center hd_cspointer add_img">
                    <div class="div-image-upload">
                        <img class="" id="xt_img" src="../images/hd_upload_photo_after.svg" alt="" class="add-images-continue">
                    </div>
                    <div class="position-absolute"></div>
                    <!-- <input type="file" id="ip_xt_img" name="ip_xt_img[]" accept="image/*"> -->
                </div>
                <div class="list_img mb-4 show-btn">
                    <ul class="frame_img hd-disflex">
                    </ul>
                </div>
            </div>
        </div>
    <? } else if (isset($avt_dangtin) && $avt_dangtin != "") {

        $anh_dangtin = explode(';', $avt_dangtin);
    ?>
        <div class="after-upload-imgage d_block" data="<?= count($anh_dangtin) ?>">
            <div class="form-group hd-disflex">
                <div class="img position-relative hd-disflex hd-align-center hd-jtify-center hd_cspointer add_img">
                    <div class="div-image-upload">
                        <img class="" id="xt_img" src="../images/hd_upload_photo_after.svg" alt="" class="add-images-continue">
                    </div>
                    <div class="position-absolute"></div>
                    <!-- <input type="file" id="ip_xt_img" name="ip_xt_img[]" accept="image/*"> -->
                </div>
                <div class="list_img mb-4 show-btn">
                    <ul class="frame_img hd-disflex">
                        <? $st = 1;
                        for ($i = 0; $i < count($anh_dangtin); $i++) { ?>
                            <li class="li_files" data="<?= $anh_dangtin[$i] ?>">
                                <div class="img-wrap">
                                    <span class="close xoa_bocu" onclick="del_img(this)"><img src="../images/hd_delete_icon.svg" alt="close this image" /></span>
                                    <div class="img-wrap-box anh_dadang">
                                        <img src="<?= $anh_dangtin[$i] ?>" />
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


</div>