$(document).ready(function() {
    $("#info-left-menu-ul > li > a").click(function() 
    {
        var li = $(this).parent();
        // Kiểm tra có phải click vào menu đã active ko
        // nếu phải thì ko làm gì, ngược lại sẽ xử lý xổ menu con ra
        if (li.hasClass("selected")) {
            li.removeClass('selected');
            $(this).removeClass('menu-a');
        } 
        else {
            // Xóa class selected khỏi các thẻ li khác
            // Thêm class selected vào thẻ li hiện tại
            li.addClass("selected");
            $(this).addClass('menu-a');
        }
        // return false nghĩa là cho trang đứng im

    });
});