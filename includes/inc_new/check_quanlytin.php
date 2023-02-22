<div class="scroll themvao">
    <div class="title-qlt">
        <span class="all-posts">
            <a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin.html" class="text-title-qlt <?= ($url == "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin.html") ? "active" : "aaa" ?> ">Tất cả tin đăng (<?= $result_tongin; ?>)</a>
        </span>
        <!-- tin dang hoat dong || tin dang dang -->
        <? if ($xacthuc_lket == 0) { ?>
            <span class="postting">
                <a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-dang-dang.html" class="text-title-qlt <?= ($url == "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-dang-dang.html") ? "active" : "aaa" ?>">Tin đang đăng (<?= $result_tongtinhoatdong ?>)</a>
            </span>
        <? } else { ?>
            <span class="postting">
                <a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-dang-hoat-dong.html" class="text-title-qlt <?= ($url == "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-dang-hoat-dong.html") ? "active" : "aaa" ?>">Đang hoạt động (<?= $result_tongtinhoatdong ?>)</a>
            </span>
        <? } ?>
        <!-- tin da ban || het hang -->
        <? if ($xacthuc_lket == 0) { ?>
            <span class="news-sold">
                <a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-da-ban.html" class="text-title-qlt <?= ($url == "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-da-ban.html") ? "active" : "aaa" ?>">Tin đã bán (<?= $result_tongtinban ?>)</a>
            </span>
        <? } else { ?>
            <!-- <span class="news-hethang">
                <a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-da-het-hang.html" class="text-title-qlt <?= ($url == "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-da-het-hang.html") ? "active" : "aaa" ?>">Hết hàng (<?= $result_tongsoluong ?>)</a>
            </span> -->
        <? } ?>
        <!-- tin da an || dang an -->
        <? if ($xacthuc_lket == 0) { ?>
            <span class="news-hidden">
                <a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-dang-an.html" class="text-title-qlt <?= ($url == "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-dang-an.html") ? "active" : "aaa" ?>">Tin đang ẩn(<?= $result_tongtindaan ?>)</a>
            </span>
        <? } else { ?>
            <span class="news-hidden">
                <a href="/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-da-an.html" class="text-title-qlt <?= ($url == "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin/tin-da-an.html") ? "active" : "aaa" ?>">Đã ẩn(<?= $result_tongtindaan ?>)</a>
            </span>
        <? } ?>
        <!-- end tin da an || dang an -->
    </div>
    <? if ($xacthuc_lket == 1) { ?>
        <!-- <a class="nbanm_dhang" href="/quan-ly-don-hang-ban.html">Quản lý đơn hàng</a> -->
    <? } ?>
</div>