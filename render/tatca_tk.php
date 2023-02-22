<?
include('config.php');
$id = getValue('id', 'str', 'POST', '');
if ($id != "") {
    $bank = bank($id);
    if (!empty($bank)) { ?>
        <div class="div_bank_2_tt_hd">
            <div class="div_bank_2_tt_hd_tex">Thông tin tài khoản BIDV</div>
            <div class="div_bank_2_tt_hd_img">
                <img src="<?= $bank['img'] ?>" alt="">
            </div>
        </div>
        <div class="div_bank_2_tt_tk">
            <div class="div_bank_2_tt_tk_sub">
                <div class="div_bank_2_tt_tk1">
                    <span class="span_tk">Số tài khoản:</span><span class="color_tk"><?= $bank['stk'] ?></span>
                </div>
                <div class="div_bank_2_tt_tk1">
                    <span class="span_tk">Chủ tài khoản:</span><span class="color_tk"><?= $bank['name'] ?></span>
                </div>
                <div class="div_bank_2_tt_tk1">
                    <span class="span_tk">Chi nhánh:</span><span class="color_tk"><?= $bank['address'] ?></span>
                </div>
                <div class="div_bank_2_tt_tk1">
                    <span class="span_tk">Nội dung chuyển khoản:</span><span class="color_tk">[
                        Tài khoản email ] Nap tien tai khoan </span>
                </div>
            </div>
        </div>
<? }
} ?>