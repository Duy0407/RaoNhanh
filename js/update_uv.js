$(document).ready(function() {
    var url = window.location.pathname;
    $('a[href="' + url + '"]').parent().addClass('active');
    $('a[href="' + url + '"]').parent().parent().addClass('in');
    $('.main .left .top #change_avt img').on('click', function() {
        $('#avt_file').click();
    });

    $('#avt_file').change(function() {
        $('#change_avt #submit').click();
    });
    $('.main .left .top #refresh').click(function() {
        $.ajax({
            type: 'POST',
            url: '../ajax/refresh_uv.php',
            data: {
                id: "<?=$_COOKIE['UID']?>"
            },
            success: function(data) {
                alert(data);
            }
        });
    });
    $('.allow_search label input[type=checkbox]').change(function() {
        checkbox = $(this);
        $.ajax({
            type: "POST",
            url: "../ajax/updateNTDtimkiem.php",
            data: {
                val: checkbox.val()
            },
            success: function() {

            }
        });
    });
});