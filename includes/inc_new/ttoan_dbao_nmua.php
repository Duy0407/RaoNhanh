<div class="box-right-menu scroll-ngang">
    <div class="right-menu-ql">
        <div class="<?= ($_SERVER["REDIRECT_URL"] == '/quan-ly-don-hang-mua.html') ? 'menu-1' : 'menu-2' ?>">
            <a href="/quan-ly-don-hang-mua.html">
                <p>Chờ xác nhận (<?= $cou_cxnm ?>)</p>
            </a>
        </div>
        <div class="<?= ($_SERVER["REDIRECT_URL"] == '/quan-ly-don-hang-dang-xu-ly-nguoi-mua.html') ? 'menu-1' : 'menu-2' ?>">
            <a href="/quan-ly-don-hang-dang-xu-ly-nguoi-mua.html">
                <p>Đang xử lý (<?= $cou_dxlm ?>)</p>
            </a>
        </div>
        <div class="<?= ($_SERVER["REDIRECT_URL"] == '/quan-ly-don-hang-dang-giao-nguoi-mua.html') ? 'menu-1' : 'menu-2' ?>">
            <a href="/quan-ly-don-hang-dang-giao-nguoi-mua.html">
                <p>Đang giao (<?= $cou_dgm ?>)</p>
            </a>
        </div>
        <div class="<?= ($_SERVER["REDIRECT_URL"] == '/quan-ly-don-hang-da-giao-nguoi-mua.html') ? 'menu-1' : 'menu-2' ?>">
            <a href="/quan-ly-don-hang-da-giao-nguoi-mua.html">
                <p>Đã giao (<?= $cou_dagm ?>)</p>
            </a>
        </div>
        <div class="<?= ($_SERVER["REDIRECT_URL"] == '/quan-ly-don-hang-da-huy-nguoi-mua.html') ? 'menu-1' : 'menu-2' ?>">
            <a href="/quan-ly-don-hang-da-huy-nguoi-mua.html">
                <p>Đã hủy (<?= $cou_hdhm ?>)</p>
            </a>
        </div>
        <div class="<?= ($_SERVER["REDIRECT_URL"] == '/quan-ly-don-hang-hoan-tat-nguoi-mua.html') ? 'menu-1' : 'menu-2' ?>">
            <a href="/quan-ly-don-hang-hoan-tat-nguoi-mua.html">
                <p>Hoàn tất (<?= $cou_htm ?>)</p>
            </a>
        </div>
    </div>
</div>