$(".main_image").slick();
$('.posted').slick({
    infinite: true,
    rows: 3,
    slidesPerRow: 2,
    arrows: true,
    dots: true,

    responsive: [{
        breakpoint: 901,
        settings: {
            slidesPerRow: 1,
            arrows: true,
            dots: true,
        }
    },]
});
$(".tdtt_content").parent().css("display", "flex");
$(".tdtt_content").parent().css("justify-content", "space-around");

function like(t) {
    var icon = document.getElementById("liked")
    if (icon.classList.contains(t) == true) {
        icon.removeAttribute('class');
        icon.parentElement.style.background = "url(../images/chi_tiet_tin_ban//like2.svg) no-repeat";
        icon.style.color = 'black';
        icon.innerHTML = "Thích";
    } else {
        if (t == "ic_liked") {
            if (icon.classList.contains("ic_like") == true || icon.classList.contains("ic_haha") == true || icon.classList.contains("ic_love") == true || icon.classList.contains("ic_sad") == true || icon.classList.contains("ic_love2") == true || icon.classList.contains("ic_wow") == true || icon.classList.contains("ic_angry") == true) {
                icon.removeAttribute('class');
                bg = "url(../images/chi_tiet_tin_ban//like2.svg) no-repeat";
                col = 'black';
                text = "Thích"
            } else {
                icon.removeAttribute('class');
                icon.classList.add("ic_like");
                bg = "url(../images/chi_tiet_tin_ban//like.svg) no-repeat";
                col = 'blue';
                text = "Thích"
            }
            icon.parentElement.style.background = bg;
            icon.style.color = col;
            icon.innerHTML = text;
        } else {
            icon.removeAttribute('class');
            icon.classList.add(t);
            if (t == "ic_like") {
                bg = "url(../images/chi_tiet_tin_ban//like.svg) no-repeat";
                col = 'blue';
                text = "Thích"
            } else if (t == "ic_haha") {
                bg = "url(../images/chi_tiet_tin_ban//haha.svg) no-repeat";
                col = '#ffc531';
                text = "Haha"
            } else if (t == "ic_love") {
                bg = "url(../images/chi_tiet_tin_ban//emo_love.svg) no-repeat";
                col = 'red';
                text = "Yêu thích"
            } else if (t == "ic_sad") {
                bg = "url(../images/chi_tiet_tin_ban//sad.svg) no-repeat";
                col = '#ffc531';
                text = "Buồn"
            } else if (t == "ic_love2") {
                bg = "url(../images/chi_tiet_tin_ban//love2.svg) no-repeat";
                col = '#ffc531';
                text = "Yêu thích"
            } else if (t == "ic_wow") {
                bg = "url(../images/chi_tiet_tin_ban//wow.svg) no-repeat";
                col = '#ffc531';
                text = "Wow"
            } else if (t == "ic_angry") {
                bg = "url(../images/chi_tiet_tin_ban//angry.svg) no-repeat";
                col = 'red';
                text = "Phẫn nộ"
            }
            icon.parentElement.style.background = bg;
            icon.style.color = col;
            icon.innerHTML = text;
        }
    }
    icon.parentElement.style.backgroundPosition = "0px 10px";
    icon.parentElement.style.backgroundSize = "24px";
    icon.parentElement.style.width = "100px";
    icon.parentElement.style.display = "flex";
    if (icon.classList.contains("liked") == false) {
        icon.classList.add("liked");
    }
}

function like_rep(i, t) {
    var icon = document.getElementById("emo_rep_" + i);
    if (icon.classList.contains(t) == true) {
        icon.removeAttribute('class');
        icon.innerHTML = "Thích";
        $("#emo_rep_" + i).css("color", "black")
        icon.classList.add("emo_rep");
    } else {
        if (t == "ic_liked") {
            if (icon.classList.contains("ic_like") == true || icon.classList.contains("ic_haha") == true || icon.classList.contains("ic_love") == true || icon.classList.contains("ic_sad") == true || icon.classList.contains("ic_love2") == true || icon.classList.contains("ic_wow") == true || icon.classList.contains("ic_angry") == true) {
                icon.removeAttribute('class');
                icon.classList.add("emo_rep");
                col = 'black';
                text = "Thích"
            } else {
                icon.removeAttribute('class');
                icon.classList.add("ic_like");
                col = 'blue';
                text = "Thích"
            }
        } else {
            icon.removeAttribute('class');
            icon.classList.add(t);
            if (t == "ic_like") {
                col = 'blue';
                text = "Thích"
            } else if (t == "ic_haha") {
                col = '#ffc531';
                text = "Haha"
            } else if (t == "ic_love") {
                col = 'red';
                text = "Yêu thích"
            } else if (t == "ic_sad") {
                col = '#ffc531';
                text = "Buồn"
            } else if (t == "ic_love2") {
                col = '#ffc531';
                text = "Yêu thích"
            } else if (t == "ic_wow") {
                col = '#ffc531';
                text = "Wow"
            } else if (t == "ic_angry") {
                col = 'red';
                text = "Phẫn nộ"
            }
        }
        icon.innerHTML = text;
        $("#emo_rep_" + i).css("color", col)
    }
}
$(".share_t").click(function () {
    $(".box_share").slideToggle()
    $(".box_share_mxh").slideToggle()
    if ($(".box_share_mxh").hasClass("hidden") == false) {
        $(".box_share_mxh").addClass("hidden");
    }
})
$(".order").click(function () {
    if ($(this).hasClass("newest") == false) {
        $(this).addClass("newest")
        $(".order_span").html("Mới nhất")
        $(".order_vec").css("transform", "rotate(180deg)")
    } else {
        $(this).removeClass("newest")
        $(".order_span").html("Cũ nhất")
        $(".order_vec").css("transform", "rotate(0deg)")
    }
})