$(document).ready(function(){
    $('#frmIssue').on('submit', function(e){
        e.preventDefault();
        //sử dụng ajax post
        $.ajax({
            url: "/ajax/upload_anhbia.php",     
            type: "POST",
            beforeSend: function(xhr){
                $('.loading').show();
            },
            processData: false,
            contentType: false,                 
            data: new FormData(this),
            success: function(html){
                $('.loading').hide();
                if(html.indexOf('_invalid_type') >= 0){
                    alert('Kiểu file không được phép !');
                } else if(html.indexOf('_invalid_size') >= 0){
                    alert('Kích thước file không được vượt quá 2MB !');
                }else{
                    // upload thành công
                    $("#frmIssue").trigger('reset');
                    $('#image-preview').attr('src', html);
                    $('.message').text('Upload thành công !').fadeIn().delay(2000).fadeOut();
                    $(".btn-default").addClass("hidden");
                }
            }
       });
    });
    $('.media-upload #file').change(function(){
        if (this.files && this.files[0]) {
            //Lấy ra files
            var $_files = this.files[0];
            //lấy ra kiểu file
            var $_ext = $(this).val().substring($(this).val().lastIndexOf('.') + 1).toLowerCase();
            //Xét kiểu file được upload
            var $_validFileExtensions= ["jpeg","png","jpg",'gif'];
            //kiểm tra kiểu file
            if($.inArray($_ext, $_validFileExtensions)==-1){
                alert('Invalid file type (jpg,png,gif) !');
            }else{
                var $_t = window.URL || window.webkitURL;   
                var $_objectURL = $_t.createObjectURL($_files);
                $('#image-preview').attr('src', $_objectURL);
                if ( window.FileReader ) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.media-upload #image-preview').attr('src', e.target.result);
                        $('.btn-default').removeClass("hidden");
                    }
                    reader.readAsDataURL(this.files[0]);
                }
            }
        }
    });
});