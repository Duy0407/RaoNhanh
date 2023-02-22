// scrollSelector(
//     ".next_category",
//     ".prev_category",
//     ".header_category_content_container"
// );

// function scrollSelector(nextArrow, prevArrow, scrollElement) {
//     let elNext = document.querySelector(nextArrow);
//     let elPrev = document.querySelector(prevArrow);
//     let elementScroll = document.querySelector(scrollElement);

//     if (elNext && elPrev && elementScroll) {
//         let oneChild = [...elementScroll.children][0];
//         let widthEl = [...oneChild.children];
//         let isClick = true;
//         let widthChild = widthEl[0].clientWidth;
//         let maxScroll = widthEl.length * widthChild;
//         let scrollX = 0;

//         elPrev.classList.add("hidden");

//         function handelScroll() {
//             let x = elementScroll.scrollLeft;
//             if (x <= maxScroll) {
//                 if (isClick === true) {
//                     scrollX = x + widthChild + 10;
//                 } else {
//                     scrollX = x - widthChild - 10;
//                 }
//             } else {
//                 scrollX = elementScroll.scrollLeftMax;
//             }

//             $(elementScroll).animate(
//                 {
//                     scrollLeft: scrollX,
//                 },
//                 300
//             );
//         }

//         elNext.onclick = function () {
//             elPrev.classList.remove("hidden");
//             elNext.classList.add("hidden");

//             isClick = true;
//             handelScroll();
//         };

//         elPrev.onclick = function () {
//             elPrev.classList.add("hidden");
//             elNext.classList.remove("hidden");

//             isClick = false;
//             handelScroll();
//         };
//     }
// }

$('.next_category').click(function (e) {
    e.preventDefault();
    $('.header_category_content_container').animate({
        scrollLeft: "+=300px"
    }, "slow");
});

$('.prev_category').click(function (e) {
    e.preventDefault();
    $('.header_category_content_container').animate({
        scrollLeft: "-=300px"
    }, "slow");
});
