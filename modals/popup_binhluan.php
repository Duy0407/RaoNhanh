<link rel="stylesheet" type="text/css" href="/css/newCss/style_popup_binhluan.css?v=<?= $version ?>">



<!-- popup chia sẻ/ share -->
<div class="popup-share d_none share-vitri">
    <div class="popup-share-top">
        <p class="share-title">Gửi bằng Chat 365</p>
        <span class="close">+</span>
    </div>
    <form action="">
        <div class="popup-share-c">
            <div class="avt-user">
                <img src="/images/binh-luan/ava3.svg" alt="">
            </div>
            <div class="inp-share">
                <input class="input-share" type="text" placeholder="Hãy nói gì đó về nội dung này">
            </div>
        </div>
        <div class="popup-share-bot scroll-doc">
            <div class="ds-share">
                <?php for ($i = 0; $i < 9; $i++) : ?>
                    <div class="share-friends">
                        <div class="avt-name-share">
                            <div class="avt-friends">
                                <img src="/images/binh-luan/ava3.svg" alt="">
                            </div>
                            <div class="name-friends">
                                <p class="name-fr">Văn Mai Hương</p>
                            </div>
                        </div>
                        <div class="sent-share" onclick="sent_share(this)">
                            <p class="sent-txt">Gửi</p>
                        </div>
                    </div>
                <?php endfor ?>
            </div>
        </div>
    </form>
</div>

<!-- click vào lượt like -->
<div class="popup-luot-like d_none like-vitri">
    <div class="luot-like-top">
        <p class="sum-all">Tất cả</p>
        <div class="sum-like">
            <div class="svg-like">
                <img src="/images/binh-luan/ic-like.svg" alt="">
            </div>
            <p>191</p>
        </div>
        <div class="sum-love">
            <div class="svg-love">
                <img src="/images/binh-luan/ic-tym.svg" alt="">
            </div>
            <p>129</p>
        </div>
        <div class="sum-wow">
            <div class="svg-wow">
                <img src="/images/binh-luan/ic-wow.svg" alt="">
            </div>
            <p>121</p>
        </div>
        <div class="sum-love2">
            <div class="svg-love2">
                <img src="/images/binh-luan/ic-love2.svg" alt="">
            </div>
            <p>10</p>
        </div>
        <div class="sum-haha">
            <div class="svg-haha">
                <img src="/images/binh-luan/ic-haha.svg" alt="">
            </div>
            <p>9</p>
        </div>
        <div class="read-more-like" onclick="see_more(this)">
            <p>Xem thêm
                <span>
                    <svg width="11" height="9" viewBox="0 0 11 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.79904 7.75C6.22169 8.75 4.77831 8.75 4.20096 7.75L1.16987 2.5C0.592523 1.5 1.31421 0.25 2.46891 0.25L8.53109 0.250001C9.68579 0.250001 10.4075 1.5 9.83013 2.5L6.79904 7.75Z" fill="#474747" />
                    </svg>
                </span>
            </p>
        </div>
        <div class="box-read-more d_none">
            <p class="box-rm-title">Xem thêm</p>
            <div class="sum-angry mt-17">
                <div class="svg-angry">
                    <img src="/images/binh-luan/ic-angry.svg" alt="">
                </div>
                <p>4</p>
            </div>
            <div class="sum-sad mt-17">
                <div class="svg-sad">
                    <img src="/images/binh-luan/ic-sad.svg" alt="">
                </div>
                <p>5</p>
            </div>
        </div>
    </div>
    <form action="">
        <div class="scroll-doc list-1">
            <div class="list-person">
                <?php for ($i = 0; $i < 9; $i++) : ?>
                    <div class="like-person">
                        <div class="avt-name-person">
                            <div class="avt-person">
                                <img src="/images/binh-luan/ava3.svg" alt="">
                                <div class="emotion">
                                    <!-- <img src="/images/binh-luan/ic-like.svg" alt=""> -->
                                    <img src="/images/binh-luan/ic-tym.svg" alt="">
                                    <!-- <img src="/images/binh-luan/ic-wow.svg" alt="">
                            <img src="/images/binh-luan/ic-love2.svg" alt="">
                            <img src="/images/binh-luan/ic-haha.svg" alt="">
                            <img src="/images/binh-luan/ic-angry.svg" alt="">
                            <img src="/images/binh-luan/ic-sad.svg" alt=""> -->
                                </div>
                            </div>
                            <div class="name-person">
                                <p class="name-ps">Văn Mai Hương</p>
                            </div>
                        </div>
                        <div class="interact-like-person">
                            <!-- 'bgxam' -> nền màu xám ( không chat được ) -->
                            <div class="chat-person">
                                <div class="chat-svg">
                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 8C18 12.3492 13.9703 15.875 9 15.875C8.10861 15.8762 7.22091 15.7605 6.35962 15.5308C5.70262 15.8638 4.194 16.5028 1.656 16.919C1.431 16.955 1.26 16.721 1.34888 16.5117C1.74713 15.5712 2.10713 14.318 2.21513 13.175C0.837 11.7913 0 9.98 0 8C0 3.65075 4.02975 0.125 9 0.125C13.9703 0.125 18 3.65075 18 8ZM5.625 8C5.625 7.70163 5.50647 7.41548 5.2955 7.2045C5.08452 6.99353 4.79837 6.875 4.5 6.875C4.20163 6.875 3.91548 6.99353 3.7045 7.2045C3.49353 7.41548 3.375 7.70163 3.375 8C3.375 8.29837 3.49353 8.58452 3.7045 8.7955C3.91548 9.00647 4.20163 9.125 4.5 9.125C4.79837 9.125 5.08452 9.00647 5.2955 8.7955C5.50647 8.58452 5.625 8.29837 5.625 8ZM10.125 8C10.125 7.70163 10.0065 7.41548 9.7955 7.2045C9.58452 6.99353 9.29837 6.875 9 6.875C8.70163 6.875 8.41548 6.99353 8.2045 7.2045C7.99353 7.41548 7.875 7.70163 7.875 8C7.875 8.29837 7.99353 8.58452 8.2045 8.7955C8.41548 9.00647 8.70163 9.125 9 9.125C9.29837 9.125 9.58452 9.00647 9.7955 8.7955C10.0065 8.58452 10.125 8.29837 10.125 8ZM13.5 9.125C13.7984 9.125 14.0845 9.00647 14.2955 8.7955C14.5065 8.58452 14.625 8.29837 14.625 8C14.625 7.70163 14.5065 7.41548 14.2955 7.2045C14.0845 6.99353 13.7984 6.875 13.5 6.875C13.2016 6.875 12.9155 6.99353 12.7045 7.2045C12.4935 7.41548 12.375 7.70163 12.375 8C12.375 8.29837 12.4935 8.58452 12.7045 8.7955C12.9155 9.00647 13.2016 9.125 13.5 9.125Z" fill="white" />
                                    </svg>
                                </div>
                                <p class="chat-txt">Chat</p>
                            </div>
                            <!-- thêm bạn -->
                            <div class="add-fr d_none">
                                <div class="add-friends kb" onclick="add_fr(this)">
                                    <div class="add-fr-svg">
                                        <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.0026 7.00008C7.61344 7.00008 8.91927 5.69425 8.91927 4.08342C8.91927 2.47258 7.61344 1.16675 6.0026 1.16675C4.39177 1.16675 3.08594 2.47258 3.08594 4.08342C3.08594 5.69425 4.39177 7.00008 6.0026 7.00008Z" stroke="white" stroke-width="1.5" />
                                            <path d="M8.918 12.8335H2.07317C1.90773 12.8335 1.74417 12.7984 1.59335 12.7304C1.44253 12.6624 1.3079 12.5631 1.19839 12.439C1.08888 12.315 1.00701 12.1691 0.95819 12.0111C0.909375 11.853 0.894739 11.6863 0.915254 11.5222L1.14275 9.69983C1.19566 9.27646 1.40141 8.887 1.72132 8.60469C2.04123 8.32238 2.45326 8.16667 2.87992 8.16683H3.08467M10.0847 7.5835V11.0835M8.33467 9.3335H11.8347" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <p class="add-fr-txt">Kết bạn</p>
                                </div>
                                <!-- <div class="huykb d_none" onclick="un_fr(this)">
                            <div class="un-friends" >
                                <div class="add-fr-svg">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.0026 7.00008C8.61344 7.00008 9.91927 5.69425 9.91927 4.08342C9.91927 2.47258 8.61344 1.16675 7.0026 1.16675C5.39177 1.16675 4.08594 2.47258 4.08594 4.08342C4.08594 5.69425 5.39177 7.00008 7.0026 7.00008Z" stroke="white" stroke-width="1.5" />
                                        <path d="M9.918 12.8334H3.07317C2.90773 12.8334 2.74417 12.7983 2.59335 12.7302C2.44253 12.6622 2.3079 12.5629 2.19839 12.4389C2.08888 12.3149 2.00701 12.169 1.95819 12.0109C1.90937 11.8529 1.89474 11.6862 1.91525 11.522L2.14275 9.6997C2.19566 9.27633 2.40141 8.88687 2.72132 8.60456C3.04123 8.32225 3.45326 8.16654 3.87992 8.1667H4.08467M13.001 7.5L11.501 9M9.918 10.5L11.501 9M10.001 7.5L11.501 9M13.001 10.5L11.501 9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <p class="un-friends-txt">Hủy kết bạn</p>
                            </div>
                        </div> -->
                            </div>
                        </div>
                    </div>
                <?php endfor ?>
            </div>
        </div>
    </form>
</div>

<!-- click vào lượt share -->
<div class="popup-luot-share d_none luot-share-vitri">
    <div class="luot-share-top">
        <p class="share-title">Những người đã chia sẻ tin này</p>
        <span class="close">+</span>
    </div>
    <form action="">
        <div class="scroll-doc list-1">
            <div class="list-person">
                <?php for ($i = 0; $i < 9; $i++) : ?>
                    <div class="like-person">
                        <div class="avt-name-person">
                            <div class="avt-person">
                                <img src="/images/binh-luan/ava3.svg" alt="">
                            </div>
                            <div class="name-person">
                                <p class="name-ps">Văn Mai Hương</p>
                            </div>
                        </div>
                        <div class="interact-like-person">
                            <!-- 'bgxam' -> nền màu xám ( không chat được ) -->
                            <div class="chat-person">
                                <div class="chat-svg">
                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 8C18 12.3492 13.9703 15.875 9 15.875C8.10861 15.8762 7.22091 15.7605 6.35962 15.5308C5.70262 15.8638 4.194 16.5028 1.656 16.919C1.431 16.955 1.26 16.721 1.34888 16.5117C1.74713 15.5712 2.10713 14.318 2.21513 13.175C0.837 11.7913 0 9.98 0 8C0 3.65075 4.02975 0.125 9 0.125C13.9703 0.125 18 3.65075 18 8ZM5.625 8C5.625 7.70163 5.50647 7.41548 5.2955 7.2045C5.08452 6.99353 4.79837 6.875 4.5 6.875C4.20163 6.875 3.91548 6.99353 3.7045 7.2045C3.49353 7.41548 3.375 7.70163 3.375 8C3.375 8.29837 3.49353 8.58452 3.7045 8.7955C3.91548 9.00647 4.20163 9.125 4.5 9.125C4.79837 9.125 5.08452 9.00647 5.2955 8.7955C5.50647 8.58452 5.625 8.29837 5.625 8ZM10.125 8C10.125 7.70163 10.0065 7.41548 9.7955 7.2045C9.58452 6.99353 9.29837 6.875 9 6.875C8.70163 6.875 8.41548 6.99353 8.2045 7.2045C7.99353 7.41548 7.875 7.70163 7.875 8C7.875 8.29837 7.99353 8.58452 8.2045 8.7955C8.41548 9.00647 8.70163 9.125 9 9.125C9.29837 9.125 9.58452 9.00647 9.7955 8.7955C10.0065 8.58452 10.125 8.29837 10.125 8ZM13.5 9.125C13.7984 9.125 14.0845 9.00647 14.2955 8.7955C14.5065 8.58452 14.625 8.29837 14.625 8C14.625 7.70163 14.5065 7.41548 14.2955 7.2045C14.0845 6.99353 13.7984 6.875 13.5 6.875C13.2016 6.875 12.9155 6.99353 12.7045 7.2045C12.4935 7.41548 12.375 7.70163 12.375 8C12.375 8.29837 12.4935 8.58452 12.7045 8.7955C12.9155 9.00647 13.2016 9.125 13.5 9.125Z" fill="white" />
                                    </svg>
                                </div>
                                <p class="chat-txt">Chat</p>
                            </div>
                            <!-- thêm bạn -->
                            <div class="add-fr d_none">
                                <div class="add-friends kb" onclick="add_fr(this)">
                                    <div class="add-fr-svg">
                                        <svg width="13" height="14" viewBox="0 0 13 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.0026 7.00008C7.61344 7.00008 8.91927 5.69425 8.91927 4.08342C8.91927 2.47258 7.61344 1.16675 6.0026 1.16675C4.39177 1.16675 3.08594 2.47258 3.08594 4.08342C3.08594 5.69425 4.39177 7.00008 6.0026 7.00008Z" stroke="white" stroke-width="1.5" />
                                            <path d="M8.918 12.8335H2.07317C1.90773 12.8335 1.74417 12.7984 1.59335 12.7304C1.44253 12.6624 1.3079 12.5631 1.19839 12.439C1.08888 12.315 1.00701 12.1691 0.95819 12.0111C0.909375 11.853 0.894739 11.6863 0.915254 11.5222L1.14275 9.69983C1.19566 9.27646 1.40141 8.887 1.72132 8.60469C2.04123 8.32238 2.45326 8.16667 2.87992 8.16683H3.08467M10.0847 7.5835V11.0835M8.33467 9.3335H11.8347" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <p class="add-fr-txt">Kết bạn</p>
                                </div>
                                <!-- <div class="huykb d_none" onclick="un_fr(this)">
                            <div class="un-friends" >
                                <div class="add-fr-svg">
                                    <svg width="14" height="14" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.0026 7.00008C8.61344 7.00008 9.91927 5.69425 9.91927 4.08342C9.91927 2.47258 8.61344 1.16675 7.0026 1.16675C5.39177 1.16675 4.08594 2.47258 4.08594 4.08342C4.08594 5.69425 5.39177 7.00008 7.0026 7.00008Z" stroke="white" stroke-width="1.5" />
                                        <path d="M9.918 12.8334H3.07317C2.90773 12.8334 2.74417 12.7983 2.59335 12.7302C2.44253 12.6622 2.3079 12.5629 2.19839 12.4389C2.08888 12.3149 2.00701 12.169 1.95819 12.0109C1.90937 11.8529 1.89474 11.6862 1.91525 11.522L2.14275 9.6997C2.19566 9.27633 2.40141 8.88687 2.72132 8.60456C3.04123 8.32225 3.45326 8.16654 3.87992 8.1667H4.08467M13.001 7.5L11.501 9M9.918 10.5L11.501 9M10.001 7.5L11.501 9M13.001 10.5L11.501 9" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <p class="un-friends-txt">Hủy kết bạn</p>
                            </div>
                        </div> -->
                            </div>
                        </div>
                    </div>
                <?php endfor ?>
            </div>
        </div>
    </form>
</div>

<!-- show khi hover -->
<div class="hover-share hide">
    <p>Chia sẻ</p>
    <div class="ds-ten-nguoi-share">
        <p>Nguyễn Văn Mình</p>
        <p>và 5 người khác</p>
    </div>
</div>

<script type="text/javascript" src="../js/newJs/admin.main.js"></script>
<script type="text/javascript" src="/js/style_new/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    function sent_share(el) {
        $(el).click(el);
        $(el).text('Đã gửi');
        $(el).addClass('bgxam');
    }

    function see_more(el) {
        $(el).click(el);
        $('.box-read-more').show();
    }

    function add_fr(el) {

        $(el).click(el);
        $(el).hide();
        $('.huykb').show()
    }
    // function un_fr(el){
    //     $(el).click(el);
    //     $(el).hide();
    //     $('.kb').show()
    // }
</script>