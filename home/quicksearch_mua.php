<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
include("config.php");
$link = '';
$sq = '';
$new_name = getValue('tukhoa_dacbiet', 'str', 'POST', '');
$new_name = trim($new_name);
$new_name = replaceMQ($new_name);
$new_name = strip_tags($new_name);
$new_name = str_replace(" ", "-", $new_name);
$new_name = str_replace("%", " ", $new_name);

$city        = getValue("name_city", "int", "POST", 0);
$city        = (int)$city;

$name_cate   = getValue("name_cate", "int", "POST", 0);
$name_cate   = (int)$name_cate;

$quan  = getValue("quan_huyen", "int", "POST", 0);
$quan  = (int)$quan;

$xa  = getValue("phuong_xa", "int", "POST", 0);
$xa  = (int)$xa;

$price  = getValue("price_m", "int", "POST", "");
$price  = (int)$price;

$price_den  = getValue("price_den", "int", "POST", "");
$price_den  = (int)$price_den;


if ($quan > 0 || $xa > 0 || $price > 0 || $price_den > 0) {
    $sq = "?fill=1";
} else {
    $sq = "";
}

if ($quan > 0) $sq .= "&district=" . $quan;

if ($xa > 0) $sq .= "&ward=" . $xa;

if ($price > 0) $sq .= "&gia_bd=" . $price;

if ($price_den > 0) $sq .= "&gia_kt=" . $price_den;


if ($new_name != "" && $city == 0 && $name_cate == 0) {
    $link = "/sm/" . str_replace(" ", "-", $new_name) . ".html". $sq;
    if (array_search(mb_strtolower($new_name), $db_tkcatvl_col) > 0) {
        $link = "/ung-vien-" . str_replace("---", "-", str_replace(" ", "-", $new_name)) . "-n" . array_search(mb_strtolower($new_name), $db_tkcatvl_col) . ".html". $sq;
    };

    if (array_search(mb_strtolower($new_name), $db_tkcat_col) > 0) {
        if (array_search(mb_strtolower($new_name), $db_tkcat_col) == 121) {
            $link = "/tim-mua-tim-ung-vien-d121.html". $sq;
        } else {
            $link = "/tim-mua-" . replaceTitle($new_name) . "-d" . array_search(mb_strtolower($new_name), $db_tkcat_col)  . ".html". $sq;
        }
    }
}
// tu khoa + tinh thành
else if ($new_name != "" && $city != 0 && $name_cate == 0) {
    $link = "/tim-mua-" . $new_name . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-t" . $city . ".html". $sq;
    if (array_search(mb_strtolower($new_name), $db_tkcatvl_col) > 0) {
        $link = "/ung-vien-" . str_replace("---", "-", str_replace(" ", "-", $new_name)) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "n" . array_search(mb_strtolower($new_name), $db_tkcatvl_col) . ".html". $sq;
    }

    if (array_search(mb_strtolower($new_name), $db_tkcat_col) > 0) {
        if (array_search(mb_strtolower($new_name), $db_tkcat_col) == 121) {
            $link = "/tim-mua-tim-ung-vien-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "w121.html". $sq;
        } else {
            $link = "/tim-mua-" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "w" . array_search(strtolower($new_name), $db_tkcat_col) . ".html". $sq;
        }
    }
}
// tu khoa + danh mục
else if ($new_name != "" && $city == 0 && $name_cate != 0) {
    $link = "/tim-mua-" . str_replace(" ", "-", $new_name) . "-tai-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-w" . $name_cate . ".html". $sq;
}
//  tu khoa + danh mục + tỉnh thành
else if ($new_name != "" && $city != 0 && $name_cate != 0) {
    $link = "/tim-mua-" . str_replace("---", "-", str_replace(" ", "-", $new_name)) . "-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "d" . $name_cate . ".html" . $sq;
} else if ($city != 0 && $name_cate == 0) {
    $link = "/tin-mua-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . ".html". $sq;
} else if ($city == 0 && $name_cate != 0) {
    if($name_cate == 121){
        $link = "/tim-mua-tim-ung-vien-d121.html" . $sq;
    }else{
        $link = "/tim-mua-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-d" . $name_cate  . ".html" . $sq;
    }
} else if ($city != 0 && $name_cate != 0) {
    if($name_cate == 121){
        $link = "/tim-mua-tim-ung-vien-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "w121.html" . $sq;
    }else{
        $link = "/tim-mua-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "w" . $name_cate . ".html" . $sq;
    }

} else {
    $link = "/tat-ca-tin-dang-mua.html";
}
header("Location: $link");
die();

?>