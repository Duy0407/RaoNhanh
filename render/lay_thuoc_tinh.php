<?
include("config.php");
$id_dm = getValue('id_dm', 'int', 'POST', 0);
$gia_tri = getValue('gia_tri', 'int', 'POST', 0);
$id_cha = getValue('id_cha', 'int', 'POST', 0);
$checked = getValue('checked', 'str', 'POST', '');

if ($gia_tri != 0 && $id_dm != 0) {
    // Đồ điện tử
    // máy tính để bàn
    if ($id_dm == 5) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bộ vi xử lý</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `bovi_id`, `bovi_ten` FROM `bovi_xuly` WHERE `bovi_id_danhmuc` = '" . $id_dm . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['bovi_ten'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['bovi_id']) ? "checked" : "" ?> value="<?= $row_hang['bovi_id'] ?>" name="bo_vixuly" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Ram</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = '" . $id_dm . "' AND `phan_loai` = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_dl']) ? "checked" : "" ?> value="<?= $row_hang['id_dl'] ?>" name="ram" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Ổ cứng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = '" . $id_dm . "' AND `phan_loai` = 2");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_dl']) ? "checked" : "" ?> value="<?= $row_hang['id_dl'] ?>" name="o_cung" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại ổ cứng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">HDD</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="loai_ocung" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">SSD</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="loai_ocung" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Card màn hình</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = '" . $id_dm . "' AND `phan_loai` = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_manhinh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_manhinh']) ? "checked" : "" ?> value="<?= $row_hang['id_manhinh'] ?>" name="card_manhinh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Kích cỡ màn hình</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = '" . $id_dm . "' AND `phan_loai` = 2 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_manhinh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_manhinh']) ? "checked" : "" ?> value="<?= $row_hang['id_manhinh'] ?>" name="kichco_manhinh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 7) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 8) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
        // máy ảnh máy quay
    } else if ($id_dm == 6) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Thiết bị</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` = '" . $id_dm . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['name'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="thiet_bi" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? if ($id_cha == 34) { ?>
                        <label class="ten_dulieu nhap_chu">
                            <input type="text" value="<?= $checked ?>" name="hang" class="noi_nhap_chu">
                        </label>
                        <? } else {
                        $hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $thiet_bi AND `id_danhmuc` = '" . $id_dm . "' ");
                        while ($row_hang = mysql_fetch_assoc($hang->result)) {  ?>
                            <label class="ten_dulieu">
                                <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                                <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                            </label>
                    <? }
                    }  ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // điện thoại di động
    else if ($id_dm == 7) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_danhmuc` = '" . $id_dm . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
            <? } else if ($gia_tri == 2) {
            if ($hang != "") { ?>
                <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                    <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                    <h2 class="sh_size_one sh_clr_one">Dòng máy</h2>
                </div>
                <div class="modal-body">
                    <div class="form_thuoctinh">
                        <? if ($id_cha == 1683) { ?>
                            <label class="ten_dulieu dulieutext nhap_chu">
                                <input type="text" value="<?= $checked ?>" name="dong" class="noi_nhap_chu">
                            </label>
                        <? } else { ?>
                            <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = '" . $hang . "' AND `id_danhmuc` = '" . $id_dm . "' ");
                            while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                                <label class="ten_dulieu">
                                    <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                                    <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="dong" class="sh_cursor">
                                </label>
                            <? } ?>
                        <? } ?>
                    </div>
                </div>
            <? } ?>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Màu sắc</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE `id_parents` = 0 AND `id_dm` = '" . $id_dm . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['mau_sac'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_color']) ? "checked" : "" ?> value="<?= $row_hang['id_color'] ?>" name="mau_sac" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Dung lượng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = '" . $id_dm . "' AND `id_cha` = 0 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_dl']) ? "checked" : "" ?> value="<?= $row_hang['id_dl'] ?>" name="dung_luong" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // máy tính bảng
    else if ($id_dm == 35) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_danhmuc` = '" . $id_dm . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Dòng máy</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_cha AND `id_danhmuc` = 35 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="dong" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Sử dụng sim</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Có</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="sudung_sim" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Không</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="sudung_sim" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Dung lượng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = 0");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_dl']) ? "checked" : "" ?> value="<?= $row_hang['id_dl'] ?>" name="dung_luong" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Kích cỡ màn hình</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id_dm AND `phan_loai` = 2 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_manhinh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_manhinh']) ? "checked" : "" ?> value="<?= $row_hang['id_manhinh'] ?>" name="kichco_manhinh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 7) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // tivi, loa, amly
    else if ($id_dm == 36) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Thiết bị</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['name'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="thiet_bi" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $id_cha AND `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Kích thước</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $id_cha ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_manhinh'] ?></p>
                            <input type="radio" value="<?= $row_hang['id_manhinh'] ?>" name="kich_co" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Kết nỗi internet</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">

                    <label class="ten_dulieu">
                        <p class="sh_cursor">Có</p>
                        <input type="radio" value="1" name="ketnoi_internet" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Không</p>
                        <input type="radio" value="2" name="ketnoi_internet" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại tivi</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_cha AND `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="loai" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Độ phân giải</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $id_cha ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" value="<?= $row_hang['id_dl'] ?>" name="dung_luong" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 7) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 8) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 9) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại loa</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_cha AND `id_danhmuc` = 36 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="loai" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 10) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Công suất</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = 36 AND `id_cha` = $id_cha ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" value="<?= $row_hang['id_dl'] ?>" name="cong_suat" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 11) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Công suất ân thanh</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = 36 AND `id_cha` = $id_cha ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" value="<?= $row_hang['id_dl'] ?>" name="cong_suat" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? }
    }
    // phụ kiện linh kiện
    else if ($id_dm == 37) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Linh kiện, phụ kiện</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Phụ kiện</p>
                        <input type="radio" value="1" name="phukien_linhkien" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Linh kiện</p>
                        <input type="radio" value="2" name="phukien_linhkien" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại phụ kiện</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT id, ten_loai  FROM `loai_chung` WHERE `id_danhmuc` = 37 and `id_cha`= 0 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="loai" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <!-- <div class="modal-header tex_center tbao_hd"  data-dm="<?= $id_dm ?>"  data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Thiết bị</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? // $hang = new db_query("SELECT `id`, `ten_hang`, `id_parent`, `id_danhmuc` FROM `hang` WHERE `id_danhmuc` = $id_dm ");
                    //while ($row_hang = mysql_fetch_assoc($hang->result)) {
                    ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><? //= $row_hang['ten_hang']
                                                    ?></p>
                            <input type="radio" value="<//?= $row_hang['id'] ?>" name="tendulieu" class="sh_cursor">
                        </label>
                    <? //}
                    ?>
                </div>
            </div> -->
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // đồ điện tử khác
    else if ($id_dm == 96) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // laptop
    else if ($id_dm == 98) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Dòng máy</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? if ($id_cha != 1378) {
                        $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_cha AND `id_danhmuc` = $id_dm ");
                        while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                            <label class="ten_dulieu">
                                <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                                <input type="radio" value="<?= $row_hang['id'] ?>" name="dong" class="sh_cursor">
                            </label>
                        <? }
                    } else { ?>
                        <label class="ten_dulieu nhap_chu">
                            <input type="text" value="<?= $checked ?>" name="dong" class="noi_nhap_chu">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bộ vi xử lý</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `bovi_id`, `bovi_ten` FROM `bovi_xuly` WHERE `bovi_id_danhmuc` = '" . $id_dm . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['bovi_ten'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['bovi_id']) ? "checked" : "" ?> value="<?= $row_hang['bovi_id'] ?>" name="bo_vixuly" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Ram</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = '" . $id_dm . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_dl']) ? "checked" : "" ?> value="<?= $row_hang['id_dl'] ?>" name="ram" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Ổ cứng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = '" . $id_dm . "' AND `phan_loai` = 2");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_dl']) ? "checked" : "" ?> value="<?= $row_hang['id_dl'] ?>" name="o_cung" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại ổ cứng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">HDD</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="loai_ocung" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">SSD</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="loai_ocung" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 7) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Card màn hình</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = '" . $id_dm . "' AND `phan_loai` = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_manhinh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_manhinh']) ? "checked" : "" ?> value="<?= $row_hang['id_manhinh'] ?>" name="card_manhinh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 8) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Kích cỡ màn hình</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id_dm AND `phan_loai` = 2 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_manhinh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_manhinh']) ? "checked" : "" ?> value="<?= $row_hang['id_manhinh'] ?>" name="kichco_manhinh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 9) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 10) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // thiết bị đeo thông minh
    else if ($id_dm == 99) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Thiết bị</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT id,ten_loai  FROM `loai_chung` WHERE `id_danhmuc` = $id_dm  ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="thiet_bi" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang`  FROM `hang` WHERE `id_danhmuc` = $id_dm and `id_parent`= $id_cha  ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Dòng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? if ($id_cha != 1766 && $id_cha != 1774) {
                        $hang = new db_query("SELECT `id`, `ten_dong` FROM `dong` WHERE `id_hang` = $id_cha AND `id_danhmuc` = 99 ");
                        while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                            <label class="ten_dulieu">
                                <p class="sh_cursor"><?= $row_hang['ten_dong'] ?></p>
                                <input type="radio" <?= ($checked == $row_hang['id']) ? 'checked' : '' ?> value="<?= $row_hang['id'] ?>" name="dong" class="sh_cursor">
                            </label>
                        <? }
                    } else { ?>
                        <label class="ten_dulieu nhap_chu">
                            <input type="text" value="<?= $checked ?>" name="dong" class="noi_nhap_chu">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // xe co
    else if ($id_dm == 8) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng xe</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang`, `id_parent` FROM `hang` WHERE id_parent = 8 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại xe đạp</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = 8 AND id_danhmuc = 2 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="loai_xe" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Xuất xứ</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_xuatxu`, `noi_xuatxu` FROM `xuat_xu` WHERE id_parents = 8");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['noi_xuatxu'] ?></p>
                            <input type="radio" value="<?= $row_hang['id_xuatxu'] ?>" name="xuat_xu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Kích thước khung</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE id_danhmuc = 8 AND phan_loai = 3");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_manhinh'] ?></p>
                            <input type="radio" value="<?= $row_hang['id_manhinh'] ?>" name="kich_co" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Màu sắc</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE id_parents = 8 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['mau_sac'] ?></p>
                            <input type="radio" value="<?= $row_hang['id_color'] ?>" name="mau_sac" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Chất liệu khung</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`name` FROM `nhom_sanpham_chatlieu` WHERE `id_danhmuc` = 8 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['name'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="chat_lieu_khung" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 7) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Dòng xe đạp thể thao</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = 210");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" <?= ($checked == $row_hang['id']) ? 'selected' : '' ?> name="dong_xe" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 8) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh`, `id_parents`, `id_danhmuc` FROM `bao_hanh` WHERE id_parents = 8 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 9) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">tinh_trang</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }

        // xe máy
    } else if ($id_dm == 9) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng xe</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang`, `id_parent`, `id_danhmuc` FROM `hang` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Dòng xe</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? if ($id_cha != 1286) { ?>
                        <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_cha ");
                        while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                            <label class="ten_dulieu">
                                <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                                <input type="radio" <?= ($checked == $row_hang['id']) ? 'checked' : '' ?> value="<?= $row_hang['id'] ?>" name="dong_xe" class="sh_cursor">
                            </label>
                        <? }
                    } else { ?>
                        <label class="ten_dulieu nhap_chu">
                            <input type="text" value="<?= $checked ?>" name="dong_xe" class="noi_nhap_chu">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại xe</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_danhmuc = 9 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($row_hang['id'] == $checked) ? 'checked' : '' ?> value="<?= $row_hang['id'] ?>" name="loai_xe" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Dung tích xe</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE id_danhmuc = 9 AND phan_loai = 3");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" <?= ($row_hang['id_dl'] == $checked) ? 'checked' : '' ?> value="<?= $row_hang['id_dl'] ?>" name="dung_tich" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Năm sản xuất</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `nam_san_xuat` FROM `nam_san_xuat` WHERE id_danhmuc = 2 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['nam_san_xuat'] ?></p>
                            <input type="radio" <?= ($row_hang['id'] == $checked) ? 'checked' : '' ?> value="<?= $row_hang['id'] ?>" name="nam_san_xuat" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh` FROM `bao_hanh` WHERE id_parents = 8 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 7) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // ô tô
    else if ($id_dm == 10) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng xe</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang`, `id_parent` FROM `hang` WHERE id_parent = 10 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Dòng xe</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? if ($id_cha != 1363) { ?>
                        <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_cha ");
                        while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                            <label class="ten_dulieu">
                                <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                                <input type="radio" value="<?= $row_hang['id'] ?>" name="dong_xe" class="sh_cursor">
                            </label>
                    <? }
                    } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Năm sản xuất</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `nam_san_xuat` FROM `nam_san_xuat` WHERE id_danhmuc = 2 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['nam_san_xuat'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="nam_san_xuat" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hộp số</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tự động</p>
                        <input type="radio" value="1" name="hop_so" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Số sàn</p>
                        <input type="radio" value="2" name="hop_so" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Bán tự động</p>
                        <input type="radio" value="3" name="hop_so" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Nhiên liệu</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Xăng</p>
                        <input type="radio" value="1" name="nhien_lieu" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Dầu</p>
                        <input type="radio" value="2" name="nhien_lieu" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Động cơ Hybird</p>
                        <input type="radio" value="3" name="nhien_lieu" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Điện</p>
                        <input type="radio" value="4" name="nhien_lieu" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Xuất xứ</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_xuatxu`, `noi_xuatxu`, `id_parents`, `id_danhmuc` FROM `xuat_xu` WHERE id_parents = 8");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['noi_xuatxu'] ?></p>
                            <input type="radio" value="<?= $row_hang['id_xuatxu'] ?>" name="xuat_xu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 7) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Số chỗ</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `so_luong` FROM `number_content` WHERE id_parents = 10");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['so_luong'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="so_cho" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 8) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Màu sắc</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE id_dm = 2 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['mau_sac'] ?></p>
                            <input type="radio" value="<?= $row_hang['id_color'] ?>" name="mau_sac" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 9) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Kiểu dáng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `name` FROM `nhom_sanpham_hinhdang` WHERE id_cha = 10 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['name'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="kieu_dang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 10) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh`, `id_parents`, `id_danhmuc` FROM `bao_hanh` WHERE id_parents = 8 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 11) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // xe tải khác
    else if ($id_dm == 38) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng xe</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE id_parent = 38 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Trọng tải</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE id_danhmuc =38 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" value="<?= $row_hang['id_dl'] ?>" name="trong_tai" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Nhiên liệu</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Xăng</p>
                        <input type="radio" value="1" name="nhien_lieu" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Dầu</p>
                        <input type="radio" value="2" name="nhien_lieu" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Động cơ Hybird</p>
                        <input type="radio" value="3" name="nhien_lieu" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Màu sắc</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE id_dm = 2 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['mau_sac'] ?></p>
                            <input type="radio" value="<?= $row_hang['id_color'] ?>" name="mau_sac" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // phụ tùng xe
    else if ($id_dm == 39) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại phụ tùng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_danhmuc = 39 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_phu_tung" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // xe đạp điện, xe máy điện
    else if ($id_dm == 40 || $id_dm == 41) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng xe</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_danhmuc` = 40 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Động cơ</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = 40 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_dl']) ? "checked" : "" ?> value="<?= $row_hang['id_dl'] ?>" name="dong_co" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Màu sắc</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE id_parents = 8 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['mau_sac'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_color']) ? "checked" : "" ?> value="<?= $row_hang['id_color'] ?>" name="mau_sac" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Bảo hành</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_baohanh`, `tgian_baohanh` FROM `bao_hanh` WHERE id_parents = 8 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['tgian_baohanh'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_baohanh']) ? "checked" : "" ?> value="<?= $row_hang['id_baohanh'] ?>" name="bao_hanh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // nội thất ô tô
    else if ($id_dm == 42) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại nội thất</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = 42 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_noithat" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // bất động sản
    // mua bán nhà đất, nhà trong ngõ, nhà mặt phố, nhà riêng nguyên căn
    else if ($id_dm == 11 || $id_dm == 26 || $id_dm == 28 || $id_dm == 29) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Cần bán, cho thuê</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Cần bán</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="can_ban_mua" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Cho thuê</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="2" name="can_ban_mua" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tổng số tầng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 1");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['so_luong'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="tong_so_tang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Số phòng ngủ</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 2 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['so_luong'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="so_pngu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Số phòng về sinh</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 3 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['so_luong'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="so_pve_sinh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Giấy tờ pháp lý</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã có sổ</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đang chờ sổ</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Giấy tờ khác</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng nội thất</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nội thất cao cấp</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nội thất đầy đủ</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Hoàn thiện cơ bản</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Bàn giao thô</p>
                        <input type="radio" <?= ($checked == 4) ? "checked" : "" ?> value="4" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 7) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Diện tích</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <input type="taxt" value="<?= $checked ?>" name="dien_tich" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 8) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hướng cửa chính</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nam</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Bắc</p>
                        <input type="radio" <?= ($checked == 4) ? "checked" : "" ?> value="4" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông bắc</p>
                        <input type="radio" <?= ($checked == 5) ? "checked" : "" ?> value="5" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông nam</p>
                        <input type="radio" <?= ($checked == 6) ? "checked" : "" ?> value="6" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây bắc</p>
                        <input type="radio" <?= ($checked == 7) ? "checked" : "" ?> value="7" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây nam</p>
                        <input type="radio" <?= ($checked == 8) ? "checked" : "" ?> value="8" name="huong_chinh" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 9) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tên tòa nhà/Khu dân cư</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu nhap_chu">
                        <input type="text" value="<?= $checked ?>" name="ten_toa_nha" class="noi_nhap_chu">
                    </label>
                </div>
            </div>
        <? }
    }
    // đất
    else if ($id_dm == 12) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Cần bán, cho thuê</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Cần bán</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="can_ban_mua" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Cho thuê</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="2" name="can_ban_mua" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại hình đất</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đất thổ cư</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="loai_hinh_dat" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đất nền dự án</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="loai_hinh_dat" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đất công nghiệp</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="loai_hinh_dat" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đất nông nghiệp</p>
                        <input type="radio" <?= ($checked == 4) ? "checked" : "" ?> value="4" name="loai_hinh_dat" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hướng đất</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nam</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Bắc</p>
                        <input type="radio" <?= ($checked == 4) ? "checked" : "" ?> value="4" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông bắc</p>
                        <input type="radio" <?= ($checked == 5) ? "checked" : "" ?> value="5" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông nam</p>
                        <input type="radio" <?= ($checked == 6) ? "checked" : "" ?> value="6" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây bắc</p>
                        <input type="radio" <?= ($checked == 7) ? "checked" : "" ?> value="7" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây nam</p>
                        <input type="radio" <?= ($checked == 8) ? "checked" : "" ?> value="8" name="huong_chinh" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Giấy tờ pháp lý</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã có sổ</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đang chờ sổ</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Giấy tờ khác</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Diện tích</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu nhap_chu">
                        <input type="text" value="<?= $checked ?>" name="dien_tich" class="noi_nhap_chu">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Chiều dài</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu nhap_chu">
                        <input type="text" value="<?= $checked ?>" name="chieu_dai" class="noi_nhap_chu">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 7) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Chiều rộng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu nhap_chu">
                        <input type="text" value="<?= $checked ?>" name="chieu_rong" class="noi_nhap_chu">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 8) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tên dự án</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <input type="radio" value="<?= $checked ?>" name="ten_toa_nha" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // căn hộ chung cư
    else if ($id_dm == 27) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Cần bán, cho thuê</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Cần bán</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="can_ban_mua" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Cho thuê</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="2" name="can_ban_mua" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại hình căn hộ</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Chung cư</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="loai_hinh_canho" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Duplex</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="loai_hinh_canho" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Penthouse</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="loai_hinh_canho" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Căn hộ dịch vụ, mini</p>
                        <input type="radio" <?= ($checked == 4) ? "checked" : "" ?> value="4" name="loai_hinh_canho" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tập thể, cư xá</p>
                        <input type="radio" <?= ($checked == 5) ? "checked" : "" ?> value="5" name="loai_hinh_canho" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Officetel</p>
                        <input type="radio" <?= ($checked == 6) ? "checked" : "" ?> value="6" name="loai_hinh_canho" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tầng số</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE  type_zoom = 1");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['so_luong'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="tang_so" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Giấy tờ pháp lý</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã có sổ</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đang chờ sổ</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Giấy tờ khác</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Diện tích</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu nhap_chu">
                        <input type="text" value="<?= $checked ?>" name="dien_tich" class="noi_nhap_chu">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng nội thất</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nội thất cao cấp</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nội thất đầy đủ</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Hoàn thiện cơ bản</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Bàn giao thô</p>
                        <input type="radio" <?= ($checked == 4) ? "checked" : "" ?> value="4" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 7) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Số phòng ngủ</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 2 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['so_luong'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="so_pngu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 8) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Số phòng vệ sinh</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE type_zoom = 3 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['so_luong'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="so_pve_sinh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 9) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hướng cửa chính</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nam</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Bắc</p>
                        <input type="radio" <?= ($checked == 4) ? "checked" : "" ?> value="4" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông bắc</p>
                        <input type="radio" <?= ($checked == 5) ? "checked" : "" ?> value="5" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông nam</p>
                        <input type="radio" <?= ($checked == 6) ? "checked" : "" ?> value="6" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây bắc</p>
                        <input type="radio" <?= ($checked == 7) ? "checked" : "" ?> value="7" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây nam</p>
                        <input type="radio" <?= ($checked == 8) ? "checked" : "" ?> value="8" name="huong_chinh" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 10) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tên toà nhà/Khu dân cư</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <input type="radio" value="<?= $checked ?>" name="ten_toa_nha" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // cửa hàng
    else if ($id_dm == 33) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Cần bán, cho thuê</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Cần bán</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="can_ban_mua" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Cho thuê</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="2" name="can_ban_mua" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tổng số tầng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE  type_zoom = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['so_luong'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="tong_so_tang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Giấy tờ pháp lý</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã có sổ</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đang chờ sổ</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Giấy tờ khác</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng nội thất</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nội thất cao cấp</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nội thất đầy đủ</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Hoàn thiện cơ bản</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Bàn giao thô</p>
                        <input type="radio" <?= ($checked == 4) ? "checked" : "" ?> value="4" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Diện tích</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu nhap_chu">
                        <input type="text" value="<?= $checked ?>" name="dien_tich" class="noi_nhap_chu">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hướng cửa chính</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nam</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Bắc</p>
                        <input type="radio" <?= ($checked == 4) ? "checked" : "" ?> value="4" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông bắc</p>
                        <input type="radio" <?= ($checked == 5) ? "checked" : "" ?> value="5" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông nam</p>
                        <input type="radio" <?= ($checked == 6) ? "checked" : "" ?> value="6" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây bắc</p>
                        <input type="radio" <?= ($checked == 7) ? "checked" : "" ?> value="7" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây nam</p>
                        <input type="radio" <?= ($checked == 8) ? "checked" : "" ?> value="8" name="huong_chinh" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 7) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tên toà nhà/Khu dân cư</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu nhap_chu">
                        <input type="text" value="<?= $checked ?>" name="ten_toa_nha" class="noi_nhap_chu">
                    </label>
                </div>
            </div>
        <? }
    }
    // văn phòng
    else if ($id_dm == 34) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Cần bán, cho thuê</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Cần bán</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="can_ban_mua" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Cho thuê</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="2" name="can_ban_mua" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tổng số tầng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE  type_zoom = 1 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['so_luong'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="tong_so_tang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Giấy tờ pháp lý</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã có sổ</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đang chờ sổ</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Giấy tờ khác</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="giay_to_phap_ly" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng nội thất</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nội thất cao cấp</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nội thất đầy đủ</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Hoàn thiện cơ bản</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Bàn giao thô</p>
                        <input type="radio" <?= ($checked == 4) ? "checked" : "" ?> value="4" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Diện tích</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu nhap_chu">
                        <input type="text" value="<?= $checked ?>" name="dien_tich" class="noi_nhap_chu">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hướng cửa chính</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Nam</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Bắc</p>
                        <input type="radio" <?= ($checked == 4) ? "checked" : "" ?> value="4" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông bắc</p>
                        <input type="radio" <?= ($checked == 5) ? "checked" : "" ?> value="5" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đông nam</p>
                        <input type="radio" <?= ($checked == 6) ? "checked" : "" ?> value="6" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây bắc</p>
                        <input type="radio" <?= ($checked == 7) ? "checked" : "" ?> value="7" name="huong_chinh" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Tây nam</p>
                        <input type="radio" <?= ($checked == 8) ? "checked" : "" ?> value="8" name="huong_chinh" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 7) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại hình văn phòng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mặt bằng kinh doanh</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="loai" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Văn phòng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="loai" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Shophouse</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="loai" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Officetel</p>
                        <input type="radio" <?= ($checked == 4) ? "checked" : "" ?> value="4" name="loai" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 8) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tên toà nhà/Khu dân cư</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu nhap_chu">
                        <input type="text" value="<?= $checked ?>" name="ten_toa_nha" class="noi_nhap_chu">
                    </label>
                </div>
            </div>
        <? }
    }
    // ship
    else if ($id_dm == 19) {
        if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại xe</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = 52 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_xe" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại hàng hóa giao</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha= 0 AND id_danhmuc = 19 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_hang_hoa" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? }
    }
    // dịch vụ giải trí
    // nhạc cụ
    else if ($id_dm == 100) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại nhạc cụ</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_fm");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (chưa sửa chữa)</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng (qua sửa chữa)</p>
                        <input type="radio" <?= ($checked == 3) ? "checked" : "" ?> value="3" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    } else if ($id_dm == 101 || $id_dm == 103 || $id_dm == 43 || $id_dm == 44 || $id_dm == 45 || $id_dm == 46 || $id_dm == 53 || $id_dm == 54 || $id_dm == 60 || $id_dm == 83 || $id_dm == 85 || $id_dm == 84 || $id_dm == 87 || $id_dm == 88 || $id_dm == 86 || $id_dm == 116 || $id_dm == 117) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // sưu tầm đồ cổ, giày dép, phụ kiện, túi xách, đồng hồ, nước hoa
    else if ($id_dm == 102 || $id_dm == 47 || $id_dm == 48 || $id_dm == 49 || $id_dm == 50 || $id_dm == 106) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // thời trang
    // mẹ và bé gộp với sách, thời trang nam
    // đồ gia dụng
    // thiết bị điện lạnh
    else if ($id_dm == 56) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại thiết bị</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_thiet_bi" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT id, ten_hang FROM hang WHERE id_parent= '" . $id_cha . "' AND id_danhmuc='" . $id_dm . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Dung tích</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT id_dl, ten_dl FROM dung_luong where id_cha='" . $id_cha . "' AND id_danhmuc= '" . $id_dm . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_dl']) ? "checked" : "" ?> value="<?= $row_hang['id_dl'] ?>" name="dung_tich" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Công suất</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = '" . $id_dm . "' AND `id_cha` = $id_cha ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_dl']) ? "checked" : "" ?> value="<?= $row_hang['id_dl'] ?>" name="cong_suat" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Khối lượng giặt</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = '" . $id_dm . "' AND `id_cha` = $id_cha ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_dl'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id_dl']) ? "checked" : "" ?> value="<?= $row_hang['id_dl'] ?>" name="khoi_luong" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // thiết bị nhà bếp
    else if ($id_dm == 57) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại thiết bị</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_thiet_bi" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` where `id_cha` = $id_cha AND `id_danhmuc` = 57 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // thiết bị theo mùa, thiết bị sức khỏe
    else if ($id_dm == 58 || $id_dm == 59) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại thiết bị</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_thiet_bi" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // đồ gia dụng khác gộp với sách, thời trang nam
    // sức khỏe sắc đẹp
    // mỹ phẩm
    else if ($id_dm == 61) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại hình</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại mỹ phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = '" . $id_cha . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hạn sử dụng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <input type="date" value="<?= $checked ?>" name="han_su_dung" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // vật tư y tế
    else if ($id_dm == 63) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại vật tư</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu nhap_chu">
                        <input type="text" value="<?= $checked ?>" name="hang" class="noi_nhap_chu">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới 100%</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // dụng cụ làm đẹp
    else if ($id_dm == 108) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại phụ kiện</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id_cha` = 209 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hãng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = 209 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới 100%</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // thực phẩm chức năng
    else if ($id_dm == 109) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại thực phẩm chức năng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`ten_loai` FROM `loai_chung` WHERE `id_cha` = 109 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? }
    }
    // nội thất ngoại thất
    // nội thất phòng khách
    else if ($id_dm == 78) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Nhóm sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['name'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="nhom_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Chất liệu</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = $id_cha ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="chat_lieu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = '" . $id_cha . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // nội thất phòng ngủ
    else if ($id_dm == 79) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Nhóm sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` =  $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['name'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="nhom_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = '" . $id_cha . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Chất liệu</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = $id_cha ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="chat_lieu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // nội thất phòng bếp
    else if ($id_dm == 80) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Nhóm sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` =  $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['name'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="nhom_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = '" . $id_cha . "'");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Chất liệu</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = $id_cha ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="chat_lieu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // nội thất phòng tắm
    else if ($id_dm == 81) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Thương hiệu</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = '" . $id_cha . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hình dáng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = '" . $id_cha . "' ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="hinhdang" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? }
    }
    // nội thất văn phòng
    else if ($id_dm == 82) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Nhóm sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['name'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="nhom_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` where `id_cha`= '" . $id_cha . "' AND `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Chất liệu</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `name` FROM `nhom_sanpham_chatlieu` WHERE `id_cha` = '" . $id_cha . "'  AND `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['name'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="chat_lieu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // vườn gộp với sách
    // nội thất khác gộp với sách
    // ngoại thất
    else if ($id_dm == 118) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // thủ công mỹ nghệ quà tặng
    // thiết kế phong thủy gộp với sách
    // hoa, quà tặng, handmande gộp với sách
    // nghệ thuật thủ công gộp với sách
    // thú cưng
    // gà, chó, mèo, chim
    else if ($id_dm == 110 || $id_dm == 111  || $id_dm == 112 || $id_dm == 113) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Giống thú cưng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`giong_thucung` FROM `giong_thu_cung` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['giong_thucung'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="giong_thu_cung" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Độ tuổi</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`contents_name` FROM `thongtin_thucung` WHERE `id_danhmuc` = $id_dm AND `type` = 1");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['contents_name'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="do_tuoi" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Kích cỡ thú cưng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`contents_name` FROM `thongtin_thucung` WHERE `id_danhmuc` = $id_dm AND `type` = 2");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['contents_name'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="kich_co" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Giới tính</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`contents_name` FROM `thongtin_thucung` WHERE `id_danhmuc` = $id_dm AND `type` = 3 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['contents_name'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="gioi_tinh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? }
    }
    // đồ ăn, phụ kiện, dịch vụ
    else if ($id_dm == 114) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Nhóm sản phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`name` FROM `nhom_sanpham` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['name'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="nhom_sanpham" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Giống thú cưng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`giong_thucung` FROM `giong_thu_cung` WHERE `id_danhmuc` != 114 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['giong_thucung'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="giong_thu_cung" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? }
    }
    // thú cưng khác
    else if ($id_dm == 115) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Độ tuổi</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu nhap_chu">
                        <input type="text" value="<?= $checked ?>" name="do_tuoi_thucungkhac" class="noi_nhap_chu">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Kích cỡ thú cưng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu nhap_chu">
                        <input type="text" value="<?= $checked ?>" name="kichco" class="noi_nhap_chu">
                    </label>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Giới tính</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `contents_name` FROM `thongtin_thucung` WHERE `id_danhmuc` = 115 ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['contents_name'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="gioi_tinh" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? }
    }
    // thể thao
    // dụng cụ thể thao
    else if ($id_dm == 75) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Môn thể thao</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`ten_mon` FROM `mon_the_thao`");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_mon'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="mon_the_thao" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại dụng cụ</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? if ($id_cha != 8) { ?>
                        <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_cha AND `id_danhmuc` = $id_dm ");
                        while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                            <label class="ten_dulieu">
                                <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                                <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai75" class="sh_cursor">
                            </label>
                        <? } ?>
                    <? } else { ?>
                        <label class="ten_dulieu nhap_chu">
                            <input type="text" value="<?= $checked ?>" name="loai75" class="noi_nhap_chu">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // thời trang thể thao
    else if ($id_dm == 104) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Môn thể thao</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`ten_mon` FROM `mon_the_thao` ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_mon'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="mon_the_thao" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại thời trang</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai75" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // phụ kiện thể thao
    else if ($id_dm == 105) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Môn thể thao</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`,`ten_mon` FROM `mon_the_thao` ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_mon'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="mon_the_thao" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại phụ kiện</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? if ($id_cha != 8) { ?>
                        <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_cha AND `id_danhmuc` = $id_dm ");
                        while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                            <label class="ten_dulieu">
                                <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                                <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai75" class="sh_cursor">
                            </label>
                        <? } ?>
                    <? } else { ?>
                        <label class="ten_dulieu nhap_chu">
                            <input type="text" value="<?= $checked ?>" name="loai75" class="noi_nhap_chu">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Tình trạng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Mới</p>
                        <input type="radio" <?= ($checked == 1) ? "checked" : "" ?> value="1" name="tinh_trang" class="sh_cursor">
                    </label>
                    <label class="ten_dulieu">
                        <p class="sh_cursor">Đã sử dụng</p>
                        <input type="radio" <?= ($checked == 2) ? "checked" : "" ?> value="2" name="tinh_trang" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // đồ dùng văn phòng, công nông nghiệp
    // thiết bị giáo dục gộp với sách
    // đồ dùng văn phòng gộp với sách
    // đồ chuyên dụng giồng cây trồng gộp với sách
    // thực phẩm đồ uống
    // thực phẩm
    else if ($id_dm == 94) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại thực phẩm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hạn sử dụng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <input type="date" value="<?= $checked ?>" name="han_su_dung" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // đồ uống
    else if ($id_dm == 95) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Loại đồ uống</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_loai'] ?></p>
                            <input type="radio" <?= ($checked == $row_hang['id']) ? "checked" : "" ?> value="<?= $row_hang['id'] ?>" name="loai" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hạn sử dụng</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <label class="ten_dulieu">
                        <input type="date" value="<?= $checked ?>" name="han_su_dung" class="sh_cursor">
                    </label>
                </div>
            </div>
        <? }
    }
    // việc làm
    // tìm ứng viên
    else if ($id_dm == 120) {
        if ($gia_tri == 1) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Vị trí ứng tuyển</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang`, `id_parent`, `id_danhmuc` FROM `hang` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="tendulieu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 2) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Ngành nghề</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang`, `id_parent`, `id_danhmuc` FROM `hang` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="tendulieu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 3) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Chi tiết công việc</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang`, `id_parent`, `id_danhmuc` FROM `hang` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="tendulieu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 4) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Hình thức trả lương</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang`, `id_parent`, `id_danhmuc` FROM `hang` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="tendulieu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 5) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Yêu cầu bằng cấp</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang`, `id_parent`, `id_danhmuc` FROM `hang` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="tendulieu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
        <? } else if ($gia_tri == 6) { ?>
            <div class="modal-header tex_center tbao_hd" data-dm="<?= $id_dm ?>" data-type="<?= $gia_tri ?>">
                <span class="close share_close sh_cursor sh_clr_one" onclick="close_tki()">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Yêu cầu kinh nghiệm</h2>
            </div>
            <div class="modal-body">
                <div class="form_thuoctinh">
                    <? $hang = new db_query("SELECT `id`, `ten_hang`, `id_parent`, `id_danhmuc` FROM `hang` WHERE `id_danhmuc` = $id_dm ");
                    while ($row_hang = mysql_fetch_assoc($hang->result)) { ?>
                        <label class="ten_dulieu">
                            <p class="sh_cursor"><?= $row_hang['ten_hang'] ?></p>
                            <input type="radio" value="<?= $row_hang['id'] ?>" name="tendulieu" class="sh_cursor">
                        </label>
                    <? } ?>
                </div>
            </div>
<? }
    }
}

?>