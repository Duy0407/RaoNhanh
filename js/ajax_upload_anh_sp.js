$(document).ready(function () {

  //        chon danh muc
  $("#menu_btn").click(function () {
    $(".popup_cate").removeClass("hidden");
  });
  $(".close_popup").click(function () {
    $(".popup_cate").addClass("hidden");
  });
  $(".cate_bt").click(function () {
    var cat_id = $(this).attr("cat_id");
    var cat_name = $(this).text();
    $("#pick_cate").removeClass("hidden");
    $("#pick_cate_span").removeAttr("class");
    $("#pick_cate_span").addClass("icon_pick_" + cat_id);
    $("#pick_cate_span").text(cat_name);
    $(".input_cate_id").val(cat_id);
    $(".tree_menu").removeClass("hidden");
    $(".show_text_cate").addClass("hidden");
    $(".show_test_cate_0").text($(".icon_cate_" + cat_id).text());
    $('.chon_danhmuc').text($(".icon_cate_" + cat_id).text());
    $("#sitemap").removeClass("hidden");
    $(".noti-error").remove();
    $("#sitemap").removeClass("error");

    $.post("/ajax/check_category.php", { "cat_id": cat_id }, function (data) {
      $(".load_cate").html(data);
      $(".cate_con").click(function () {
        $(".popup_cate").addClass("hidden");
        $(".category_select p").addClass("hidden");
        console.log($(this).find("span").text());
        var id_cat = $(this).attr("cat_id");
        $(".cate_con i").addClass("hidden");
        $(".cate_con").removeClass("coler_text_cate");
        $("#i_cat_" + id_cat).removeClass("hidden");
        $(this).addClass('coler_text_cate');
        $(".input_cate_id").val(id_cat);
        $(".input_cate_id").val();
        $(".show_text_cate").removeClass("hidden");
        $(".show_text_cate a").text($("#span_cat_" + id_cat).text());
        $('.chon_danhmuc').text($("#span_cat_" + id_cat).text());

      });
    });

  });
  //        
  //           end
  //        ajax up load anh
  $('#img_select').change(function () {
    $('#upload_form').submit();
  });
  $('#upload_form').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
      url: "/ajax/upload_anh_sp.php",
      method: "POST",
      data: new FormData(this),
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (data) {
        $('#img_select').val('');
        if (data.result == true) {
          $('.file-list').html(data.output);
          $('.removal-button_1').on('click', function (e) {
            e.preventDefault();
            var scr = $(this).prev().attr("src");
            $.post('/ajax/delete_anh_sp.php', { scr: scr }, function (data) {
            });
            //remove the corresponding hidden input
            //           $('.hidden-inputs input[data-uploadid="'+ $(this).attr('data-uploadid') +'"]').remove(); 

            //           remove the name from file-list that corresponds to the button clicked
            $(this).parent().hide("puff").delay(10).queue(function () { $(this).remove(); });

            //if the list is now empty, change the text back 
            if ($('.file-list div').length === 0) {
              $('.file-uploader__message-area').text(options.MessageAreaText || settings.MessageAreaText);
            }
          });
        } else {
          for (var i = 0; i < data.msg.length; i++) {
            alert(data.msg[i]);
          }
        }
      }
    });
  });

});