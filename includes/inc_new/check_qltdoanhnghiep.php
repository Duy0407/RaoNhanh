<div class="d_them_div_qltin_scroll d_flex jus_content align_i_c">
    <div class="modal_dangtin d_flex modal_dangtin_df_qlt">
        <? if ($xacthuc_lket == 0) { ?>
            <div class="hd_cspointer pd_15 m_tatca_tindang <?= ($url == "/ho-so-quan-ly-tin-ban.html") ? "active_tt" : "ERROR" ?>">
                <a href="ho-so-quan-ly-tin-ban.html" class="m_tctd_title m_title_chung <?= ($url == "/ho-so-quan-ly-tin-ban.html") ? "at_title" : "ERROR" ?>">
                    Tất cả tin đăng <span>(<?= $tong ?>)</span>
                </a>
            </div>
            <div class="hd_cspointer pd_15 m_tindang_dang <?= ($url == "/ho-so-quan-ly-tin-dang-hoat-dong.html") ? "active_tt" : "ERROR" ?>">
                <a href="ho-so-quan-ly-tin-dang-hoat-dong.html" class="m_tdd_title m_title_chung <?= ($url == "/ho-so-quan-ly-tin-dang-hoat-dong.html") ? "at_title" : "ERROR" ?>">
                    Tin đang đăng <span>(<?= $result_tinghim ?>)</span>
                </a>
            </div>
            <div class="hd_cspointer pd_15 m_tin_daban <?= ($url == "/ho-so-quan-ly-tin-da-ban.html") ? "active_tt" : "ERROR" ?>">
                <a href="ho-so-quan-ly-tin-da-ban.html" class="m_tdb_title m_title_chung <?= ($url == "/ho-so-quan-ly-tin-da-ban.html") ? "at_title" : "ERROR" ?>">
                    Tin đã bán <span>(<?= $result_tongtinban; ?>)</span>
                </a>
            </div>
            <div class="hd_cspointer pd_15 m_tin_daan <?= ($url == "/ho-so-quan-ly-tin-da-an.html") ? "active_tt" : "ERROR" ?>">
                <a href="ho-so-quan-ly-tin-da-an.html" class="m_tda_title m_title_chung <?= ($url == "/ho-so-quan-ly-tin-da-an.html") ? "at_title" : "ERROR" ?>">
                    Tin đã ẩn <span>(<?= $result_tongtindaan; ?>)</span>
                </a>
            </div>
        <? } else { ?>
            <div class="hd_cspointer pd_15 m_tatca_tindang <?= ($url == "/ho-so-quan-ly-tin-ban.html") ? "active_tt" : "ERROR" ?>">
                <a href="ho-so-quan-ly-tin-ban.html" class="m_tctd_title m_title_chung <?= ($url == "/ho-so-quan-ly-tin-ban.html") ? "at_title" : "ERROR" ?>">
                    Tất cả tin đăng <span>(<?= $tong ?>)</span>
                </a>
            </div>
            <div class="hd_cspointer pd_15 m_tindang_dang <?= ($url == "/ho-so-quan-ly-tin-dang-hoat-dong.html") ? "active_tt" : "ERROR" ?>">
                <a href="ho-so-quan-ly-tin-dang-hoat-dong.html" class="m_tdd_title m_title_chung <?= ($url == "/ho-so-quan-ly-tin-dang-hoat-dong.html") ? "at_title" : "ERROR" ?>">
                    Tin đang hoạt động <span>(<?= $result_tinghim ?>)</span>
                </a>
            </div>
            <!-- <div class="hd_cspointer pd_15 m_tin_daban <?= ($url == "/ho-so-quan-ly-tin-het-hang.html") ? "active_tt" : "ERROR" ?>">
                <a href="ho-so-quan-ly-tin-het-hang.html" class="m_tdb_title m_title_chung <?= ($url == "/ho-so-quan-ly-tin-het-hang.html") ? "at_title" : "ERROR" ?>">
                    Hết hàng <span>(<?= $result_tongtinhethang; ?>)</span>
                </a>
            </div> -->
            <div class="hd_cspointer pd_15 m_tin_daan <?= ($url == "/ho-so-quan-ly-tin-da-an.html") ? "active_tt" : "ERROR" ?>">
                <a href="ho-so-quan-ly-tin-da-an.html" class="m_tda_title m_title_chung <?= ($url == "/ho-so-quan-ly-tin-da-an.html") ? "at_title" : "ERROR" ?>">
                    Tin đã ẩn <span>(<?= $result_tongtindaan; ?>)</span>
                </a>
            </div>

        <? } ?>
    </div>
</div>