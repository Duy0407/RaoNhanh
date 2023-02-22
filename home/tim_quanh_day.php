<?
include("config.php");
// $lat = $_GET['lat'];
// $long = $_GET['long'];
// $query = "SELECT new_id,new_title,new_money,usc_company,usc_logo,usc_create_time,usc_address,new_han_nop,new_hinh_thuc,new_gioi_tinh,new_bang_cap,
//             new_exp,usc_lat,usc_long,( 3959 * acos( cos( radians($lat) ) * cos( radians( usc_lat ) )
//           * cos( radians( usc_long ) - radians($long) ) + sin( radians($lat) ) * sin(radians(usc_lat)) ) ) AS distance FROM new JOIN user_company
//           ON new.new_user_id = user_company.usc_id WHERE new_han_nop >= " . time();
// if (isset($_GET['job']) and $_GET['job'] != '') {
//     $query .= " AND new_title like '%" . $_GET['job'] . "%'";
// }
// if (isset($_GET['cate']) and $_GET['cate'] > 0) {
//     $query .= " AND FIND_IN_SET(" . $_GET['cate'] . ",new_cat_id)";
// }
// $query .= " AND new_title!='' AND usc_name_add!='' AND usc_lat!='' AND usc_long!='' AND FIND_IN_SET(" . $_GET['code'] . ",new_city) GROUP BY new_user_id";
// if (isset($_GET['km']) and $_GET['km'] > 0) {
//     $query .= " HAVING distance <= " . $_GET['km'];
// }
// $query .= " ORDER BY distance ASC, new_update_time DESC LIMIT 50";
// $result = new db_query($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm quanh đây</title>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_chien.css">

</head>

<body>
    <?php include("../includes/common/inc_header.php"); ?>
    <div class="popup_cha" hidden>
        <div class="map_bg"></div>
        <div class="container_location">
            <div class="close_content"><img src="/images/anh_moi/close_orange.png" alt=""></div>
            <div class="container_item d_flex">
                <div class="img_big"><img src="/images/anh_moi/shiba_big.png" alt=""></div>
                <div class="combo_img_smail">
                    <img src="/images/anh_moi/shiba_small.png" alt="">
                    <div class="dem_anh">
                        <div class="bg_img"></div>
                        <div class="anh"><img src="/images/anh_moi/shiba_small.png" alt=""></div>
                        <div class="so_anh">+3</div>
                    </div>
                </div>
            </div>
            <div class="text_popup">
                <div class="name_content">Bán chó Shiba Inu</div>
                <div class="price_content">1.000.000.000 đ</div>
                <div class="adress_content">Toà nhà Thạch Kim, Định Công, Hoàng Mai, Hà Nội</div>
                <div class="time_content">2 giờ trước</div>
            </div>
        </div>
    </div>
    <div class="popup_parents" hidden>
        <div class="popup_bg"></div>
        <div class="container_choose">
            <div class="popup_title">
                Bộ lọc
                <div class="img_close"><img src="/images/anh_moi/close.png" alt=""></div>
            </div>
            <div class="container_select">
                <div class="conten_scroll">
                    <div class="khoi_nhap">
                        <div class="title_input mg_b-5">Danh mục sản phẩm</div>
                        <select class="select_content" name="" id="">
                            <option disabled selected value="0">Danh mục sản phẩm</option>
                        </select>
                    </div>
                    <div class="khoi_nhap top_20">
                        <div class="title_input mg_b-5">Thuộc tính 1</div>
                        <select class="select_content" name="" id="">
                            <option disabled selected value="0">Thuộc tính 1</option>
                        </select>
                    </div>
                    <div class="khoi_nhap top_20">
                        <div class="title_input mg_b-5">Thuộc tính 2</div>
                        <select class="select_content" name="" id="">
                            <option disabled selected value="0">Thuộc tính 2</option>
                        </select>
                    </div>
                    <div class="khoi_nhap top_20">
                        <div class="title_input mg_b-5">Thuộc tính 3</div>
                        <select class="select_content" name="" id="">
                            <option disabled selected value="0">Thuộc tính 3</option>
                        </select>
                    </div>
                    <div class="khoi_nhap top_20">
                        <div class="title_input mg_b-5">Thuộc tính 4</div>
                        <select class="select_content" name="" id="">
                            <option disabled selected value="0">Thuộc tính 4</option>
                        </select>
                    </div>
                    <div class="khoi_nhap top_20">
                        <div class="title_input mg_b-5">Thuộc tính 5</div>
                        <select class="select_content" name="" id="">
                            <option disabled selected value="0">Thuộc tính 5</option>
                        </select>
                    </div>
                    <div class="khoi_nhap top_20 rance_price">
                        <div class="title_input mg_b-20">Giá từ <span class="slider-time">1000 VNĐ</span> đến <span class="slider-time2"> 100000 VNĐ</span>
                        </div>
                        <div id="time-range">
                            <div class="sliders_step1">
                                <div class="flat-slider" id="slider-range"></div>
                            </div>
                        </div>
                    </div>
                    <div class="khoi_nhap top_20">
                        <div class="title_input mg_b-5">Đăng bởi</div>
                        <select class="select_content" name="" id="">
                            <option disabled selected value="0">Đăng bởi</option>
                        </select>
                    </div>
                </div>
                <div class="btn_popup d_flex">
                    <div class="btn_boloc">Bỏ lọc</div>
                    <div class="apdung">Áp dụng</div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container_map d_flex map" id="map">
            <div class="khoi_select_map d_none480">
                <select name="" id="" class="select2_min danhmuc">
                    <option disabled selected value="0">Danh mục sản phẩm</option>
                    <option value="">Danh mục 1</option>
                    <option value="">Danh mục 2</option>
                </select>
            </div>
            <div class="khoi_select_map d_none480">
                <select name="" id="" class="thuocthinh select2_min">
                    <option class="title_select" disabled selected value="0">Thuộc tính 1</option>
                    <option value="">Thuộc tính a</option>
                    <option value="">Thuộc tính b</option>
                </select>
            </div>
            <div class="khoi_select_map d_none480">
                <select name="" id="" class="thuocthinh mg_l-20 select2_min">
                    <option disabled selected value="0">Thuộc tính 2</option>
                    <option value="">Thuộc tính c</option>
                    <option value="">Thuộc tính d</option>
                </select>
            </div>
            <div class="btn_loc d_flex mg_l-20 ">
                <div><img src="/images/anh_moi/icon_loc.png" alt=""></div>
                <div class="text_btn">Bộ Lọc</div>
            </div>
            <div class="bankinh">
                <select name="" id="" class="phamvi select2_min">
                    <option value="0">Bán kính: 1km</option>
                    <option value="1">Bán kính: 2km</option>
                    <option value="2">Bán kính: 5km</option>
                    <option value="3">Bán kính: 10km</option>
                    <option value="4">Bán kính: 20km</option>
                </select>
            </div>
        </div>
        <div class="location_dot">
            <!-- <div class="dot1"><img src="/images/anh_moi/location.png" alt=""></div> -->
        </div>
        <input type="hidden" name="lat" id="lat" value="21.0313">
        <input type="hidden" name="long" id="long" value="105.8516">
    </section>
    <?php include("../includes/inc_new/inc_footer.php") ?>
</body>
<script>
    $('.select2_min').select2();
    $('.select_content').select2({
        width: '98%',
    });

    $('.dot1').click(function() {
        // alert(2);
        $('.popup_cha').show();
    })
    $('.close_content').click(function() {
        $('.popup_cha').hide();
    })
    $('.map_bg').click(function() {
        $('.popup_cha').hide();
    })
    $('.btn_loc').click(function() {
        // alert(2);
        $('.popup_parents').show();
    })
    $('.img_close').click(function() {
        $('.popup_parents').hide();
    })
    $('.popup_bg').click(function() {
        $('.popup_parents').hide();
    })
    $('.btn_boloc').click(function() {
        $('.popup_parents').hide();
    });
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBcUfsgc9wHs_rvBFSj31ycnDjcXIFsdt0&libraries=places"></script>
<script defer>
    var map;
    var service;
    var infowindow;

    $('.filter_map').on('change', function(event) {
        updateLatLng();
        initMap();
    });

    function initMap() {
        var km = 5;
        if (km == 0) {
            var met = 2000;
            km = 2;
        } else {
            var met = km * 1000;
        }

        var valat = $('#lat').val();
        var valng = $('#long').val();

        var myLatlng = new google.maps.LatLng(valat, valng);
        var mapOptions = {
            zoom: 20,
            center: myLatlng,
            styles: [{
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "poi",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "transit",
                    "stylers": [{
                        "visibility": "off"
                    }]
                }
            ]
        }
        var map = new google.maps.Map(document.getElementById("map"), mapOptions);
        var geocoder = new google.maps.Geocoder();
        geocodeAddress(geocoder, map, met);
        var infoWindow = new google.maps.InfoWindow;

        var tin_id = $('.tin_id').val();
        var city_id = $('.city_id').val();
        var dis_id = $('.dis_id').val();
        var pho_id = $('.pho_id').val();
        var gia_id = $('.gia_id').val();
        var dti_id = $('.dti_id').val();

        var url = "../map/filter_map.php?tin_id=" + tin_id + "&city_id=" + city_id + "&dis_id=" + dis_id + "&gia_id=" + gia_id + "&dti_id=" + dti_id + "&km=" + km + "&lat=" + valat + "&long=" + valng + " ";
        console.log(url);
        downloadUrl(url, function(data) {
            var xml = data.responseXML;
            if (xml != null) {
                var markers = xml.documentElement.getElementsByTagName("marker");
                console.log(markers.length);
                for (var i = 0; i < markers.length; i++) {
                    var tin_title = markers[i].getAttribute("tin_title");
                    var tin_gia = markers[i].getAttribute("tin_gia");
                    var tin_dientich = markers[i].getAttribute("tin_dientich");
                    var image = markers[i].getAttribute("image");
                    var loai_tin = markers[i].getAttribute("loai_tin");
                    var link = markers[i].getAttribute("link");

                    var point = new google.maps.LatLng(
                        parseFloat(markers[i].getAttribute("lat")),
                        parseFloat(markers[i].getAttribute("lng")));
                    var html = '<div class="mkr"><div class="map-img"><div class="img_cate"><img src="' + image + '" alt="' + tin_title + '"></div>';
                    html += '</div><div class="map_if"><p class="title">' + tin_title + '</p><p class="price"><strong>Giá phòng:</strong> <span class="text-red">' + tin_gia + ' VNĐ</span></p>';
                    html += '<p class="hinhthuc"><strong>Diện tích:</strong> ' + tin_dientich + ' m<sup>2</sup></p>';
                    html += '<p class="hp"><strong>Loại tin:</strong> ' + loai_tin + '</p>';
                    html += '<a class="btn-button" href="' + link + '">Xem chi tiết</a></div></div>';

                    var icon = '../images/map/place.svg';
                    var marker = new google.maps.Marker({
                        map: map,
                        position: point,
                        icon: icon.icon
                    });
                    bindInfoWindow(marker, map, infoWindow, html);
                }
            } else {
                // alert('Vui lòng mở rộng phạm vi tìm kiếm!!');
                return false;
            }
        });
    }

    function bindInfoWindow(marker, map, infoWindow, html) {
        google.maps.event.addListener(marker, 'click', function() {
            infoWindow.setContent(html);
            infoWindow.open(map, marker);
        });
    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };

        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}

    function toggleGroup(type) {
        for (var i = 0; i < markerGroups[type].length; i++) {
            var marker = markerGroups[type][i];
            if (!marker.getVisible()) {
                marker.setVisible(true);
            } else {
                marker.setVisible(false);
            }
        }
    }

    function geocodeAddress(geocoder, resultsMap, met) {
        var address = 'Hanoi';
        var citys = document.getElementById('city_id');
        var city = citys.options[citys.selectedIndex].text;
        var district = document.getElementById('dis_id');
        var dis = district.options[district.selectedIndex].text;
        var street = document.getElementById('pho_id');
        var str = street.options[street.selectedIndex].text;
        if (citys.value > 0) {
            address = "Đường " + str + " " + dis + " " + city;
        }
        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status === 'OK') {
                resultsMap.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: resultsMap,
                    position: results[0].geometry.location,
                    icon: '../images/map/local.png'
                });
                // Add circle overlay and bind to marker
                var circle = new google.maps.Circle({
                    map: resultsMap,
                    radius: met,
                    fillColor: '#1abc9c',
                    strokeColor: '#1abc9c',
                    fillColor: '#1abc9c',
                    strokeOpacity: 0.25,
                    strokeWeight: 1,
                    fillOpacity: 0.15
                });
                circle.bindTo('center', marker, 'position');
                resultsMap.fitBounds(circle.getBounds());
            } else {
                console.log('Địa chỉ không chính xác!');
            }
        });
    }

    function updateLatLng() {
        var geocoder = new google.maps.Geocoder();

        var address = 'Hanoi';
        var citys = document.getElementById('city_id');
        var city = citys.options[citys.selectedIndex].text;
        var district = document.getElementById('dis_id');
        var dis = district.options[district.selectedIndex].text;
        // var street = document.getElementById('pho_id');
        // var str = street.options[street.selectedIndex].text;
        if (citys.value > 0) {
            address = dis + " " + city;
        }

        geocoder.geocode({
            'address': address
        }, function(results, status) {
            if (status === 'OK') {
                document.getElementById('lat').value = results[0].geometry.location.lat();
                document.getElementById('long').value = results[0].geometry.location.lng();
            }
        });
    }
</script>

</html>