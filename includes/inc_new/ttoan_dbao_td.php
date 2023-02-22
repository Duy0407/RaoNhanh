<div class="box-right-menu scroll-ngang">
    <div class="right-menu-ql">
        <div class="<?= ($_SERVER["REDIRECT_URL"] == '/quan-ly-don-hang-ban.html') ? 'menu-1' : 'menu-2' ?>">
            <a href="/quan-ly-don-hang-ban.html">
                <p>Chờ xác nhận (<?= $cou_cxn ?>)</p>
            </a>
        </div>
        <div class="<?= ($_SERVER["REDIRECT_URL"] == '/quan-ly-don-hang-dang-xu-ly.html') ? 'menu-1' : 'menu-2' ?>">
            <a href="/quan-ly-don-hang-dang-xu-ly.html">
                <p>Đang xử lý (<?= $cou_dxl ?>)</p>
            </a>
        </div>
        <div class="<?= ($_SERVER["REDIRECT_URL"] == '/quan-ly-don-hang-dang-giao.html') ? 'menu-1' : 'menu-2' ?>">
            <a href="/quan-ly-don-hang-dang-giao.html">
                <p>Đang giao (<?= $cou_dg ?>)</p>
            </a>
        </div>
        <div class="<?= ($_SERVER["REDIRECT_URL"] == '/quan-ly-don-hang-da-giao.html') ? 'menu-1' : 'menu-2' ?>">
            <a href="/quan-ly-don-hang-da-giao.html">
                <p>Đã giao (<?= $cou_dag ?>)</p>
            </a>
        </div>
        <div class="<?= ($_SERVER["REDIRECT_URL"] == '/quan-ly-don-hang-da-huy.html') ? 'menu-1' : 'menu-2' ?>">
            <a href="/quan-ly-don-hang-da-huy.html">
                <p>Đã hủy (<?= $cou_hdh ?>)</p>
            </a>
        </div>
        <div class="<?= ($_SERVER["REDIRECT_URL"] == '/quan-ly-don-hang-hoan-tat.html') ? 'menu-1' : 'menu-2' ?>">
            <a href="/quan-ly-don-hang-hoan-tat.html">
                <p>Hoàn tất (<?= $cou_ht ?>)</p>
            </a>
        </div>

    </div>
</div>