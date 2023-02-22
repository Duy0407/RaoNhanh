$(document).ready(function(){
    $('.key_search').focus(function(){
        $('.nd_box_key').show();
    });
    $(document).click(function(event) {
        $target = $(event.target);
        if(!$target.closest('.form-search').length && !$target.closest('.nd_box_key').length &&
            $('.nd_box_key').is(":visible")) {
            $('.nd_box_key').hide();
        }
    });
});
function search(){
    var filter = changeSlug($("#keyword").val());
    var box = $("#fts_idautocomplete-list").children();
    for (var i = 0; i < box.length; i++) {
        var txtValue = box[i].textContent;
        txtValue = changeSlug(txtValue);
        if (txtValue.indexOf(filter) > -1) {
            box[i].style.display = "";
        }else{
            box[i].style.display = "none";
        }
    }
}
function tag(e){
    var box = $(e).text();
    var tagId = $(e).data('id');
    $('#cate_search').val(tagId);
    $('#select2-cate_search-container').text(box);
    $('#select2-cate_search-container').attr('title',box);
    $("#keyword").val(box.trim());
    $('.sr-city .select2-container').focus();
}