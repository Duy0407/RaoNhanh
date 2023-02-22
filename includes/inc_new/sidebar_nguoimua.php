<?
$arr_ddan = ['/nguoi-mua-thong-tin-tai-khoan.html', '/chinh-sua-thong-tin-nguoi-mua.html'];

?>
<ul class="danhmuc_tt">
    <li>
        <a href="/nguoi-mua-thong-tin-tai-khoan.html" class="item d_flex <?= (in_array($_SERVER['REDIRECT_URL'], $arr_ddan)) ? "active" : "" ?>">
            <span class=" item-icf"><?= $icon_tongq ?></span>
            <p class="text_info">Tổng quan</p>
        </a>
    </li>
    <li>
        <a href="/nguoi-mua-quan-ly-tin.html" class="item d_flex the_a <?= ($_SERVER['REDIRECT_URL'] == '/nguoi-mua-quan-ly-tin.html') ? "active" : "" ?>">
            <span class=" item-icf-fill"><?= $icon_quanlytin ?></span>
            <p class="text_info">Quản lý tin</p>
        </a>
    </li>
    <li>
        <a href="/nguoi-mua-tin-da-yeu-thich.html" class="item d_flex <?= ($_SERVER['REDIRECT_URL'] == '/nguoi-mua-tin-da-yeu-thich.html') ? "active" : "" ?>">
            <span class=" item-icf"><?= $icon_tinyt ?></span>
            <p class="text_info">Tin đã yêu thích</p>
        </a>
    </li>
    <li>
        <a href="/nguoi-mua-rieng-tu-va-bao-mat.html" class="item d_flex <?= ($_SERVER['REDIRECT_URL'] == '/nguoi-mua-rieng-tu-va-bao-mat.html') ? "active" : "" ?>">
            <span class=" item-icf"><?= $icon_rtvbm ?></span>
            <p class="text_info">Riêng tư và bảo mật</p>
        </a>
    </li>
    <li>
        <a class="item d_flex">
            <span class="item-icf-fill"><?= $icon_cdoi365 ?></span>
            <p class="text_info">Chuyển đổi số 365</p>
        </a>
    </li>
</ul>