
<?

include("config.php");

$link = '';
$sq = '';
$city = getValue("name_city", "int", "POST", 0);
$city = (int)$city;

 $name_cate = getValue("name_cate", "int", "POST", 0);
 $name_cate = (int)$name_cate;

 $new_name = getValue("new_name", "str", "POST", "");
$new_name = trim($new_name);
$new_name = replaceMQ($new_name);
$new_name = strip_tags($new_name);
// $new_name = str_replace(" ", "-", $new_name);
$new_name = str_replace("%", " ", $new_name);


$phan_biet = getValue('phan_biet_mb', 'int', 'POST', '');

if ($phan_biet == 2) {

    if ($new_name != "" && $city == 0 && $name_cate == 0) {
        $link = "/s/" . str_replace(" ", "-", $new_name) . ".html";
        // từ khóa trùng với danh mục
        if (array_search(mb_strtolower($new_name), $db_tkcat_col) > 0) {
            if (array_search(mb_strtolower($new_name), $db_tkcat_col) == 121) {
                $link = "/viec-lam.html";
            } else {
                $link = "/mua-ban/" . array_search(mb_strtolower($new_name), $db_tkcat_col) . "/" . replaceTitle($new_name) . ".html";
            }
        }
        // tim kiem nganh nghe viec lam
        else if (array_search(mb_strtolower($new_name), $db_tkcatvl_col) > 0 || array_search(mb_strtolower($new_name), $tkcatvl_col) > 0) {
            if (array_search(mb_strtolower($new_name), $db_tkcatvl_col) > 0 && array_search(mb_strtolower($new_name), $tkcatvl_col) == 0) {
                $id_key = array_search(mb_strtolower($new_name), $db_tkcatvl_col);
                $link = "/viec-lam-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", mb_strtolower($new_name)))) . "-n" . $id_key . "t0.html";
            } else if (array_search(mb_strtolower($new_name), $tkcatvl_col) > 0 || (array_search(mb_strtolower($new_name), $db_tkcatvl_col) > 0 && array_search(mb_strtolower($new_name), $tkcatvl_col) > 0)) {
                $id_key = array_search(mb_strtolower($new_name), $tkcatvl_col);
                if ($id_key == 87) {
                    $link = "/viec-lam-them-n" . $id_key . "t0.html";
                } else {
                    $link = "/" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", mb_strtolower($new_name)))) . "-n" . $id_key . "t0.html";
                }
            }
        }
        // từ khóa trùng với tags đăng tin
        else if (array_search(mb_strtolower($new_name), $tags_tk1) > 0) {
            $link = "/mua-ban-" . replaceTitle($new_name) . "-t" . array_search(mb_strtolower($new_name), $tags_tk1) . ".html";
        }
        // từ khóa trùng với tags nganh nghe
        else if (array_search(mb_strtolower($new_name), $db_tags_vl) > 0 || array_search(mb_strtolower($new_name), $dbtags_vl) > 0) {
            if (array_search(mb_strtolower($new_name), $db_tags_vl) > 0) {
                $link = "/tim-viec-lam-" . replaceTitle(mb_strtolower($new_name)) . "-r" . array_search(mb_strtolower($new_name), $db_tags_vl) . "t0.html";
            } else if (array_search(mb_strtolower($new_name), $dbtags_vl) > 0 || (array_search(mb_strtolower($new_name), $db_tags_vl) > 0 && array_search(mb_strtolower($new_name), $dbtags_vl) > 0)) {
                $link = "/tim-" . replaceTitle(mb_strtolower($new_name)) . "-r" . array_search(mb_strtolower($new_name), $dbtags_vl) . "t0.html";
            }
        };
    }
    else if ($new_name != "" && $city != 0 && $name_cate == 0) {
        $link = "/s/" . str_replace(" ", "-", $new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . ".html";
        // từ khóa trùng với danh mục
        if (array_search(mb_strtolower($new_name), $db_tkcat_col) > 0) {
            if (array_search(mb_strtolower($new_name), $db_tkcat_col) == 121) {
                $link = "/mua-ban/rao-vat/tim-viec-lam-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w120.html";
            } else {
                $link = "/mua-ban/rao-vat/" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w" . array_search(mb_strtolower($new_name), $db_tkcat_col) . ".html";
            }
        };
        // từ khóa tags + tình thành
        if (array_search(mb_strtolower($new_name), $tags_tk1) > 0) {
            $link = "/mua-ban-" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "t" . array_search(mb_strtolower($new_name), $tags_tk1) . ".html";
        };
        // tim kiem nganh nghe viec lam
        if (array_search(mb_strtolower($new_name), $db_tkcatvl_col) > 0 || array_search(mb_strtolower($new_name), $tkcatvl_col) > 0) {
            if (array_search(mb_strtolower($new_name), $db_tkcatvl_col) > 0 && array_search(mb_strtolower($new_name), $tkcatvl_col) == 0) {
                $id_key = array_search(mb_strtolower($new_name), $db_tkcatvl_col);
                $link = "/viec-lam-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", mb_strtolower($new_name)))) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-n" . $id_key . "t" . $city . ".html";
            } else if (array_search(mb_strtolower($new_name), $tkcatvl_col) > 0 || (array_search(mb_strtolower($new_name), $db_tkcatvl_col) > 0 && array_search(mb_strtolower($new_name), $tkcatvl_col) > 0)) {
                $id_key = array_search(mb_strtolower($new_name), $tkcatvl_col);
                if ($id_key == 87) {
                    $link = "/viec-lam-them-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-n" . $id_key . "t" . $city . ".html";
                } else {
                    $link = "/" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", mb_strtolower($new_name)))) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-n" . $id_key . "t" . $city . ".html";
                }
            }
        };
        // if (array_search(mb_strtolower($new_name), $db_tkcatvl_col) > 0) {
        //     $link = "/viec-lam-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-tai" . replaceTitle($arrcity[$city]['cit_name']) . "-n" . array_search(mb_strtolower($new_name), $db_tkcatvl_col) . "t" . $city . ".html";
        // };

        // từ khóa trùng với tags nganh nghe
        if (array_search(mb_strtolower($new_name), $db_tags_vl) > 0 || array_search(mb_strtolower($new_name), $dbtags_vl) > 0) {
            if (array_search(mb_strtolower($new_name), $db_tags_vl) > 0) {
                $link = "/tim-viec-lam-" . replaceTitle(mb_strtolower($new_name)) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-r" . array_search(mb_strtolower($new_name), $db_tags_vl) . "t" . $city . ".html";
            } else if (array_search(mb_strtolower($new_name), $dbtags_vl) > 0 || (array_search(mb_strtolower($new_name), $db_tags_vl) > 0 && array_search(mb_strtolower($new_name), $dbtags_vl) > 0)) {
                $link = "/tim-" . replaceTitle(mb_strtolower($new_name)) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-r" . array_search(mb_strtolower($new_name), $dbtags_vl) . "t" . $city . ".html";
            }
        };
    }
    else if ($new_name != "" && $city == 0 && $name_cate != 0) {
        if ($name_cate == 120) {
            $link = "/s/" . str_replace(" ", "-", $new_name) . "-thuoc-tim-viec-lam-w" . $name_cate . ".html";
        }
        else {
            $link = "/s/" . str_replace(" ", "-", $new_name) . "-thuoc-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-w" . $name_cate . ".html";
        }
    } else if ($new_name != "" && $city != 0 && $name_cate != 0) {
        if ($name_cate == 120) {
            $link = "/s/" . str_replace(" ", "-", $new_name) . "-thuoc-tim-viec-lam-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-e" . $city . "-h" . $name_cate . ".html" . $sq;
        } else {
            $link = "/s/" . str_replace(" ", "-", $new_name) . "-thuoc-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-e" . $city . "-h" . $name_cate . ".html" . $sq;
        }

        // từ khóa trùng với danh mục
        if (array_search(mb_strtolower($new_name), $db_tkcat_col) > 0) {
            if (array_search(mb_strtolower($new_name), $db_tkcat_col) == 121) {
                $link = "/mua-ban/rao-vat/tim-viec-lam-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w120.html";
            } else {
                $link = "/mua-ban/rao-vat/" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w" . array_search(mb_strtolower($new_name), $db_tkcat_col) . ".html";
            }
        }
    } else if ($city != 0 && $name_cate == 0) {
        $link = "/mua-ban/rao-vat/" . $city . "/" . replaceTitle($arrcity[$city]['cit_name']) . ".html";
    } else if ($city == 0 && $name_cate != 0) {
        $link = "/mua-ban/" . $name_cate . "/" . replaceTitle($db_cat[$name_cate]['cat_name']) . ".html";
        if ($name_cate == 120) {
            $link = "/viec-lam.html";
        }
    } else if ($city != 0 && $name_cate != 0) {
        $link = "/mua-ban/rao-vat/" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w" . $name_cate . ".html";
    } else {
        $link = "/";
    }
    header("Location: $link");
    die();
}
else if ($phan_biet == 1) {
    if ($new_name != "" && $city == 0 && $name_cate == 0) {
        $link = "/sm/" . str_replace(" ", "-", $new_name) . ".html";
        // tu khoa trung voi nganh nghe
        if (array_search(mb_strtolower($new_name), $db_tkcatvl_col) > 0) {
            $id_key = array_search(mb_strtolower($new_name), $db_tkcatvl_col);
            $link = "/ung-vien-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", mb_strtolower($new_name)))) . "-n" . $id_key . ".html";
        };

        if (array_search(mb_strtolower($new_name), $tkcatvl_col) > 0) {
            $id_key = array_search(mb_strtolower($new_name), $tkcatvl_col);
            $link = "/ung-vien-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", mb_strtolower($new_name)))) . "-n" . $id_key . ".html";
        };
        // end

        if (array_search(mb_strtolower($new_name), $db_tkcat_col) > 0) {
            if (array_search(mb_strtolower($new_name), $db_tkcat_col) == 121) {
                $link = "/tim-mua-tim-ung-vien-d121.html";
            } else {
                $link = "/tim-mua-" . replaceTitle($new_name) . "-d" . array_search(mb_strtolower($new_name), $db_tkcat_col)  . ".html";
            }
        }
    }
    // tu khoa + tinh thành
    else if ($new_name != "" && $city != 0 && $name_cate == 0) {
        $link = "/tim-mua-" . $new_name . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-t" . $city . ".html";

        // tu khoa trung voi nganh nghe
        if (array_search(mb_strtolower($new_name), $db_tkcatvl_col) > 0) {
            $id_key = array_search(mb_strtolower($new_name), $db_tkcatvl_col);
            $link = "/ung-vien-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "n" . $id_key . ".html";
        };

        if (array_search(mb_strtolower($new_name), $tkcatvl_col) > 0) {
            $id_key = array_search(mb_strtolower($new_name), $tkcatvl_col);
            $link = "/ung-vien-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "n" . $id_key . ".html";
        };
        // end

        if (array_search(mb_strtolower($new_name), $db_tkcat_col) > 0) {
            if (array_search(mb_strtolower($new_name), $db_tkcat_col) == 120) {
                $link = "/tim-mua-tim-ung-vien-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "w121.html";
            } else {
                $link = "/tim-mua-" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "w" . array_search(strtolower($new_name), $db_tkcat_col) . ".html";
            }
        }
    }
    // tu khoa + danh mục
    else if ($new_name != "" && $city == 0 && $name_cate != 0) {
        $link = "/tim-mua-" . str_replace(" ", "-", $new_name) . "-thuoc-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-w" . $name_cate . ".html";
    }
    //  tu khoa + danh mục + tỉnh thành
    else if ($new_name != "" && $city != 0 && $name_cate != 0) {
        $link = "/tim-mua-" . str_replace("---", "-", str_replace(" ", "-", $new_name)) . "-thuoc-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "d" . $name_cate . ".html" . $sq;
    } else if ($city != 0 && $name_cate == 0) {
        $link = "/tin-mua-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . ".html";
    } else if ($city == 0 && $name_cate != 0) {
        if ($name_cate == 121) {
            $link = "/tim-mua-tim-ung-vien-d121.html";
        } else {
            $link = "/tim-mua-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-d" . $name_cate  . ".html";
        }
    } else if ($city != 0 && $name_cate != 0) {
        if ($name_cate == 121) {
            $link = "/tim-mua-tim-ung-vien-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "w121.html";
        } else {
            $link = "/tim-mua-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "w" . $name_cate . ".html";
        }
    } else {
        $link = "/tat-ca-tin-dang-mua.html";
    }
    header("Location: $link");
    die();
}


?>