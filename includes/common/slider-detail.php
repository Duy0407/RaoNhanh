<script src="/js/jssor.slider-26.3.0.min.js" type="text/javascript"></script>
<?
$image = explode(";", str_replace("detail", "fullsize", $row9['new_image']));
?>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        var jssor_1_SlideshowTransitions = [{
            $Duration: 1200,
            $Zoom: 1,
            $Easing: {
                $Zoom: $Jease$.$InCubic,
                $Opacity: $Jease$.$OutQuad
            },
            $Opacity: 2
        },
            {
                $Duration: 1000,
                $Zoom: 11,
                $SlideOut: true,
                $Easing: {
                    $Zoom: $Jease$.$InExpo,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            },
            {
                $Duration: 1200,
                $Zoom: 1,
                $Rotate: 1,
                $During: {
                    $Zoom: [0.2, 0.8],
                    $Rotate: [0.2, 0.8]
                },
                $Easing: {
                    $Zoom: $Jease$.$Swing,
                    $Opacity: $Jease$.$Linear,
                    $Rotate: $Jease$.$Swing
                },
                $Opacity: 2,
                $Round: {
                    $Rotate: 0.5
                }
            },
            {
                $Duration: 1000,
                $Zoom: 11,
                $Rotate: 1,
                $SlideOut: true,
                $Easing: {
                    $Zoom: $Jease$.$InQuint,
                    $Opacity: $Jease$.$Linear,
                    $Rotate: $Jease$.$InQuint
                },
                $Opacity: 2,
                $Round: {
                    $Rotate: 0.8
                }
            },
            {
                $Duration: 1200,
                x: 0.5,
                $Cols: 2,
                $Zoom: 1,
                $Assembly: 2049,
                $ChessMode: {
                    $Column: 15
                },
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Zoom: $Jease$.$InCubic,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            },
            {
                $Duration: 1200,
                x: 4,
                $Cols: 2,
                $Zoom: 11,
                $SlideOut: true,
                $Assembly: 2049,
                $ChessMode: {
                    $Column: 15
                },
                $Easing: {
                    $Left: $Jease$.$InExpo,
                    $Zoom: $Jease$.$InExpo,
                    $Opacity: $Jease$.$Linear
                },
                $Opacity: 2
            },
            {
                $Duration: 1200,
                x: 0.6,
                $Zoom: 1,
                $Rotate: 1,
                $During: {
                    $Left: [0.2, 0.8],
                    $Zoom: [0.2, 0.8],
                    $Rotate: [0.2, 0.8]
                },
                $Opacity: 2,
                $Round: {
                    $Rotate: 0.5
                }
            },
            {
                $Duration: 1000,
                x: -4,
                $Zoom: 11,
                $Rotate: 1,
                $SlideOut: true,
                $Easing: {
                    $Left: $Jease$.$InQuint,
                    $Zoom: $Jease$.$InQuart,
                    $Opacity: $Jease$.$Linear,
                    $Rotate: $Jease$.$InQuint
                },
                $Opacity: 2,
                $Round: {
                    $Rotate: 0.8
                }
            },
            {
                $Duration: 1200,
                x: -0.6,
                $Zoom: 1,
                $Rotate: 1,
                $During: {
                    $Left: [0.2, 0.8],
                    $Zoom: [0.2, 0.8],
                    $Rotate: [0.2, 0.8]
                },
                $Opacity: 2,
                $Round: {
                    $Rotate: 0.5
                }
            },
            {
                $Duration: 1000,
                x: 4,
                $Zoom: 11,
                $Rotate: 1,
                $SlideOut: true,
                $Easing: {
                    $Left: $Jease$.$InQuint,
                    $Zoom: $Jease$.$InQuart,
                    $Opacity: $Jease$.$Linear,
                    $Rotate: $Jease$.$InQuint
                },
                $Opacity: 2,
                $Round: {
                    $Rotate: 0.8
                }
            },
            {
                $Duration: 1200,
                x: 0.5,
                y: 0.3,
                $Cols: 2,
                $Zoom: 1,
                $Rotate: 1,
                $Assembly: 2049,
                $ChessMode: {
                    $Column: 15
                },
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Top: $Jease$.$InCubic,
                    $Zoom: $Jease$.$InCubic,
                    $Opacity: $Jease$.$OutQuad,
                    $Rotate: $Jease$.$InCubic
                },
                $Opacity: 2,
                $Round: {
                    $Rotate: 0.7
                }
            },
            {
                $Duration: 1000,
                x: 0.5,
                y: 0.3,
                $Cols: 2,
                $Zoom: 1,
                $Rotate: 1,
                $SlideOut: true,
                $Assembly: 2049,
                $ChessMode: {
                    $Column: 15
                },
                $Easing: {
                    $Left: $Jease$.$InExpo,
                    $Top: $Jease$.$InExpo,
                    $Zoom: $Jease$.$InExpo,
                    $Opacity: $Jease$.$Linear,
                    $Rotate: $Jease$.$InExpo
                },
                $Opacity: 2,
                $Round: {
                    $Rotate: 0.7
                }
            },
            {
                $Duration: 1200,
                x: -4,
                y: 2,
                $Rows: 2,
                $Zoom: 11,
                $Rotate: 1,
                $Assembly: 2049,
                $ChessMode: {
                    $Row: 28
                },
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Top: $Jease$.$InCubic,
                    $Zoom: $Jease$.$InCubic,
                    $Opacity: $Jease$.$OutQuad,
                    $Rotate: $Jease$.$InCubic
                },
                $Opacity: 2,
                $Round: {
                    $Rotate: 0.7
                }
            },
            {
                $Duration: 1200,
                x: 1,
                y: 2,
                $Cols: 2,
                $Zoom: 11,
                $Rotate: 1,
                $Assembly: 2049,
                $ChessMode: {
                    $Column: 19
                },
                $Easing: {
                    $Left: $Jease$.$InCubic,
                    $Top: $Jease$.$InCubic,
                    $Zoom: $Jease$.$InCubic,
                    $Opacity: $Jease$.$OutQuad,
                    $Rotate: $Jease$.$InCubic
                },
                $Opacity: 2,
                $Round: {
                    $Rotate: 0.8
                }
            }

        ];

        var jssor_1_options = {
            $AutoPlay: 0,
            $Align: 1,
            $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
            },
            $ThumbnailNavigatorOptions: {
                $Class: $JssorThumbnailNavigator$,
                $Rows: <?= (count($image) == 2) ? '1' : '2' ?>,
                $Cols: 6,
                $SpacingX: 8,
                $SpacingY: 8,
                $Orientation: 2,
                $Align: 156
            }
        };
        var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);
        /*#region responsive code begin*/
        var MAX_WIDTH = 960;
        /*#endregion responsive code end*/
    });
</script>
<div id="jssor_1" style="position:relative;top:0px;left:0px;overflow:hidden;visibility:hidden;width: 845px;">
    <!-- Loading Screen -->
    <!--<div id="silder-mil">-->
    <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:580px;height:380px;overflow:hidden;">
        <?
        foreach ($image as $item => $type) {
            if (strpos($type, 'pictures/fullsize/') == true) {
                ?>
                <div class="t_zoom" data-index="<?= $item ?>">
                    <img data-u="image" data-e="thumb" class="lazyload" src="/images/loading.gif" data-src="<?= $type ?>" />
                </div>
                <?
            } else {
                $url = getimagesize($type);
                if (is_array($url)) {
                    ?>
                    <div>
                        <img data-u="image" data-e="thumb" src="/images/loading.gif" data-src="<?= $type ?>" />
                    </div>
                    <?
                }
            }
        }
        ?>
    </div>


    <!--</div>-->
    <!-- Thumbnail Navigator -->
    <div data-u="thumbnavigator" class="jssort101" style="position:absolute;right:0;top:0px;width:257px;height:420px">
        <div data-u="slides" class="g">
            <div data-u="prototype" class="p">
                <div data-u="thumbnailtemplate" class="t lazyload"></div>
            </div>
        </div>
    </div>
    <!-- Arrow Navigator -->
    <div data-u="arrowleft" class="jssora093" style="top:174px;left:23px;">
        <img class="lazyload" src="/images/loading.gif" data-src="/images/btn_left.png" />
    </div>
    <div data-u="arrowright" class="jssora093" style="top:174px;left:527px;">
        <img class="lazyload" src="/images/loading.gif" data-src="/images/btn_right.png" />
    </div>
    <div style="width:33px;height:33px;bottom:2px;left:545px;position: absolute;" id="zoon">
        <img class="lazyload" src="/images/loading.gif" data-src="/images/detail-slider/detail-slider-rum.png" />
    </div>
</div>
<!-- #endregion Jssor Slider End -->


<script>
    var modal = document.getElementById('myModal');
    // Get the image and insert it inside the modal - use its "alt" text as a caption
    var img = document.getElementById('myImg');
    var modalImg = document.getElementById("img01");
    var captionText = document.getElementById("caption");
    zoon.onclick = function() {
        // var img = $('.pav img').attr('src');
        // $('.modal img').attr({
        //   'src': img
        // });
        // $('.modal').css({
        //   'display': 'block'
        // });
        // captionText.innerHTML = this.alt;
    }
    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }
    $().ready(function() {
        $('.t_zoom').click(function() {
            var slideIndex = $(this).data('index');
            $('.t_slick').slick('slickGoTo', slideIndex);
            if (!$('.t_slick').hasClass('resize')) {
                $('.t_slick').resize().addClass('resize');
            }
            var elm = $(this);
            index = elm.attr('data-index');
            $('.modal').css({
                'display': 'block'
            });

            // $('#thumb_img_' + index).focus();

        });
    });
</script>