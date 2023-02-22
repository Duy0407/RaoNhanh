<?
include("config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/style_new/tin_mua.css">
    <link rel="stylesheet" href="/css/style_new/style.css">
</head>

<body>
    <div class="header_loc">
        <div class="content_loc">
            <div class="d_flex w_100">
                <a href="#first" class="goleft"></a>
                <div class="boloc">
                    <div style="display:flex">
                        <div class="scroll">
                            <button class="huy_loc" id="first">Xóa lọc</button>
                            <div class="select_seach location">
                                <select class="select">
                                    <option value="">Toàn quốc</option>
                                    <option value="">IT phần mềm</option>
                                    <option value="">IT phần mềm/option>
                                    <option value="">IT phần mềm</option>
                                    <option value="">IT phần mềm</option>
                                </select>
                            </div>
                            <div class="select_seach">
                                <select class="select slect-hang" name="tkiem_dmuc">
                                    <option value="">Danh mục sản phẩm</option>
                                    <? foreach ($db_cat as $item_dm) {
                                        if (in_array($item_dm['cat_id'], $bodmuc_ban) == false) { ?>
                                            <option value="<?= $item_dm['cat_id'] ?>"><?= ($item_dm['cat_id'] != 120) ? $item_dm['cat_name'] : 'Tìm việc làm' ?></option>
                                    <? };
                                        unset($item_dm);
                                    } ?>
                                </select>
                            </div>
                            <div class="select_seach d_flex price" id="last">
                                <p>Giá:</p>
                                <input class="b0 bg_none pl_10" type="text" placeholder="Từ">
                                <p style="padding-right:10px;padding-top: 3px;"> _ </p>
                                <input class="b0 bg_none" type="text" placeholder="Đến">
                            </div>
                        </div>
                    </div>
                </div>
                <a href="#last" class="goright"></a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="chat">
            <div class="content_chat">
                <div class="content_chat_header">
                    <img src="icon_chat.svg" alt="">
                    <p class="cl_r font_w500 font_s16 lh_25 pl_10">CHAT KHÁCH HÀNG ONLINE</p>
                </div>
                <div class="d_flex flex_w pt_20">
                    <?php for ($i = 0; $i < 10; $i++) { ?>
                        <div class="list_item_chat">
                            <div class="in_vl">
                                <div class="img_item_on">
                                    <a>
                                        <img class="ava_kh" src="https://timviec365.vn/pictures/2021/06/17/edh1666946368.png" alt="no image">
                                    </a>
                                </div>
                                <div class="right_item_vl">
                                    <h3 style="margin:0;">
                                        <a class="name_com font_s16">CONG TY TNHH BEST SUN TECHNOLOGY
                                            <span class="tooltip ">
                                                <span>CONG TY TNHH BEST SUN TECHNOLOGY</span>
                                            </span>
                                        </a>
                                    </h3>
                                    <div class="pt_5 mb_5">
                                        <span class="address">Hà Nội</span>
                                    </div>
                                    <a class="tit_com">Tuyển trợ lý kiêm phiên dịch tiếng Trung
                                        <span class="tooltip ">
                                            <span>Tuyển trợ lý kiêm phiên dịch tiếng Trung</span>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="banner1">
                <div class="detail_banner1">
                    <a>
                        <img src="download.png" alt="">
                    </a>
                </div>
            </div>
            <div class="banner2">
                <div class="banner_tit">
                    <span>TẢI APP CHAT365 BẢN PC ĐỂ<br>CHAT VỚI KHÁCH HÀNG</span>
                </div>
                <div class="detail_banner2">
                    <a>
                        <img src="downchat.png" alt="" class="transparent">
                    </a>
                </div>
            </div>
            <div class="button_chat">
                <button class="button_chat_2"><span>CHAT NGAY</span></button>
            </div>
        </div>
        <div class="tin_dang">
            <div class="check_ut">
                <div class="check_ut_2">
                    <p>Ưu tiên hiển thị:</p>
                    <div class="d_flex">
                        <input type="radio" name="check_pb" class="check_pb" id="check_pb1">
                        <label for="check_pb1" class="input_pb"></label>
                        <label for="check_pb1" class="input_pb_t">Phổ biến nhất</label>
                    </div>
                    <div class="d_flex">
                        <input type="radio" name="check_pb" class="check_pb" id="check_pb2">
                        <label for="check_pb2" class="input_pb"></label>
                        <label for="check_pb2" class="input_pb_t">Mới nhất</label>
                    </div>
                    <div class="d_flex">
                        <input type="radio" name="check_pb" class="check_pb" id="check_pb3">
                        <label for="check_pb3" class="input_pb"></label>
                        <label for="check_pb3" class="input_pb_t">Doanh nghiêp</label>
                    </div>
                    <div class="d_flex">
                        <input type="radio" name="check_pb" class="check_pb" id="check_pb4">
                        <label for="check_pb4" class="input_pb"></label>
                        <label for="check_pb4" class="input_pb_t">Cá nhân</label>
                    </div>
                </div>
            </div>
            <?php
            $post_num = 0;
            for ($i = 0; $i < 10; $i++) { ?>
                <div class="content_td">
                    <div class="tin">
                        <div class="chitiet_tin d_flex">
                            <div class="img_tin">
                                <img class="img_tin_2" src="http://dev5.tinnhanh365.vn/pictures/news/2022/10/05/lge1664960394.jpg">
                                <div class="d_flex j_bw">
                                    <button class="btn_chat"><img src="chat365.svg"><span>Chat</span></button>
                                    <button class="favo"></button>
                                </div>
                            </div>
                            <div class="info">
                                <div class="title">
                                    <div class="title-1">
                                        <span class="font_w500 font_s16">Ốp điện thoại silicon mềm phi hành gia dành cho Realme 8 7 5 6 Pro 6i 7i 8i v13 C17 A16K</span>
                                        <button class="favo"></button>
                                    </div>
                                    <div class="people">
                                        <span>Darlene Robertson</span>
                                    </div>
                                </div>
                                <div class="info-2">
                                    <div class="info-2-child cost">
                                        <span>Tặng miễn phí</span>
                                    </div>
                                    <div class="info-2-child add">
                                        <span>Hà Nội và 2 tỉnh khác</span>
                                    </div>
                                    <div class="info-2-child time">
                                        <span>Bắt đầu: 20/10/2022</span>
                                    </div>
                                    <div class="info-2-child time_end">
                                        <span>Kết thúc: 20/10/2023</span>
                                    </div>
                                </div>
                                <div class="mota">
                                    <p class="mota_child">Siêu phẩm điện thoại tầm trung Realme Q3 Pro 5G, Đổi trả trong 7 ngày đầu (Hoàn tiền sản phẩm...</p>
                                </div>
                            </div>
                        </div>
                        <div class="tuong_tac">
                            <div class="tt_left">
                                <img src="like.svg" class="icon">
                                <img src="haha.svg" class="icon">
                                <img src="love.svg" class="icon">
                                <!-- <img src="sad.svg" class="icon">
                            <img src="love2.svg" class="icon">
                            <img src="wow.svg" class="icon">
                            <img src="angry.svg" class="icon"> -->
                                <span class="count_tt">Bạn và 12 người khác</span>
                            </div>
                            <div class="tt_right">
                                <span class="tt_right_count">25 bình luận</span>
                                <span class="tt_right_count">10 lượt chia sẻ</span>
                                <span class="tt_right_count count_seen">10 lượt xem</span>
                            </div>
                        </div>
                        <div class="action">
                            <div class="like">
                                <div class="list_tt" data-id="<?= $i ?>">
                                    <img src="like.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_like')">
                                    <img src="haha.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_haha')">
                                    <img src="love.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_love')">
                                    <img src="sad.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_sad')">
                                    <img src="love2.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_love2')">
                                    <img src="wow.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_wow')">
                                    <img src="angry.svg" class="icon_tt" onclick="like(<?= $i ?>,'ic_angry')">
                                </div>
                                <span id="liked-<?= $i ?>" onclick="like(<?= $i ?>,'ic_liked')">Thích</span>
                            </div>
                            <div class="comment" onclick="comment(<?= $i ?>)">
                                <span>Bình luận</span>
                            </div>
                            <div class="share">
                                <span>Chia sẻ</span>
                            </div>
                        </div>
                        <div class="comment_act d_none" id="comment_act-<?= $i ?>">
                            <div class="avata">
                                <img src="avata.png">
                            </div>
                            <div class="my_cmt">
                                <input type="text" class="cmt" placeholder="Viết bình luận">
                                <div class="my_cmt_child">
                                    <button class="emoji"></button>
                                    <button class="camera"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="more">
                <button class="xemthem"><span>Xem thêm</span></button>
            </div>
        </div>
    </div>
    <div class="key_popular">
        <h2>CÁC TỪ KHÓA PHỔ BIẾN</h2>
        <div class="key">
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <div class="tk">
                    <span>shiba inu</span>
                </div>
            <?php } ?>
        </div>
    </div>
    <? include('../includes/inc_new/inc_footer.php') ?>
</body>
<script language="javascript">
    function like(i, t) {
        var icon = document.getElementById("liked-" + i)
        if (icon.classList.contains(t) == true) {
            icon.removeAttribute('class');
            icon.parentElement.style.background = "url(like2.svg) no-repeat";
            icon.parentElement.style.backgroundPosition = "0px 10px";
            icon.style.color = 'black';
            icon.innerHTML = "Thích";
        } else {
            if (t == "ic_liked") {
                if (icon.classList.contains("ic_like") == true || icon.classList.contains("ic_haha") == true || icon.classList.contains("ic_love") == true || icon.classList.contains("ic_sad") == true || icon.classList.contains("ic_love2") == true || icon.classList.contains("ic_wow") == true || icon.classList.contains("ic_angry") == true) {
                    icon.removeAttribute('class');
                    bg = "url(like2.svg) 0px 10px no-repeat";
                    col = 'black';
                    text = "Thích"
                } else {
                    icon.removeAttribute('class');
                    icon.classList.add("ic_like");
                    bg = "url(like.svg) 0% 50% / 26px no-repeat";
                    col = 'red';
                    text = "Thích"
                }
                icon.parentElement.style.background = bg;
                icon.style.color = col;
                icon.innerHTML = text;
            } else {
                icon.removeAttribute('class');
                icon.classList.add(t);
                if (t == "ic_like") {
                    bg = "url(like.svg) 0% 50% / 26px no-repeat";
                    col = 'red';
                    text = "Thích"
                } else if (t == "ic_haha") {
                    bg = "url(haha.svg) 0% 50% / 26px no-repeat";
                    col = '#ffc531';
                    text = "Haha"
                } else if (t == "ic_love") {
                    bg = "url(love.svg) 0% 50% / 26px no-repeat";
                    col = 'red';
                    text = "Yêu thích"
                } else if (t == "ic_sad") {
                    bg = "url(sad.svg) 0% 50% / 26px no-repeat";
                    col = '#ffc531';
                    text = "Buồn"
                } else if (t == "ic_love2") {
                    bg = "url(love2.svg) 0% 50% / 26px no-repeat";
                    col = '#ffc531';
                    text = "Yêu thích"
                } else if (t == "ic_wow") {
                    bg = "url(wow.svg) 0% 50% / 26px no-repeat";
                    col = '#ffc531';
                    text = "Wow"
                } else if (t == "ic_angry") {
                    bg = "url(angry.svg) 0% 50% / 26px no-repeat";
                    col = 'red';
                    text = "Phẫn nộ"
                }
                icon.parentElement.style.background = bg;
                icon.style.color = col;
                icon.innerHTML = text;
            }
        }
    }

    function comment(i) {
        document.getElementById("comment_act-" + i).classList.toggle("d_none")
    }
</script>

</html>