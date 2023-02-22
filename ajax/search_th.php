<?
include("config.php");

$link = '';
$sq = '';
$city = getValue("kv_city", "int", "POST", 0);
$city = (int)$city;

$kv_dis = getValue("kv_dis", "int", "POST", 0);
$kv_dis = (int)$kv_dis;

$name_cate = getValue("cat_id", "int", "POST", 0);
$name_cate = (int)$name_cate;

$new_name = getValue("key", "str", "POST", "");
$new_name = trim($new_name);
$new_name = replaceMQ($new_name);
$new_name = strip_tags(mb_strtolower($new_name));
// $new_name = str_replace(" ", "-", $new_name);
$new_name = str_replace("%", " ", $new_name);

$phan_biet = getValue('phan_biet_mb', 'int', 'POST', '');


// thông tin bộ lọc
$txt = getValue("txt", "str", "POST", "");
$txt = sql_injection_rp(replaceMQ($txt));
$txt = str_replace("&&", "&", $txt);

$kv_wards = getValue("kv_wards", "int", "POST", 0);
$gia_tu = getValue("gia_tu", "int", "POST", 0);
$gia_den = getValue("gia_den", "int", "POST", 0);

$giatu_cu = getValue('giatu_cu', 'int', 'POST', 0);
$giaden_cu = getValue('giaden_cu', 'int', 'POST', 0);

$bo_giatu_cu = '&gia_bd=' . $giatu_cu;
$bo_giaden_cu = '&gia_kt=' . $giaden_cu;

$txt = str_replace($bo_giatu_cu, '', $txt);
$txt = str_replace($bo_giaden_cu, '', $txt);

// tạo đuôi link xấu
$search_end = "?fill=1";
if ($kv_wards != "" && strpos($txt, 'ward') == false) {
    $search_end .= "&ward=" . $kv_wards;
}
if ($gia_tu != 0 && strpos($txt, 'gia_bd') == false) {
    $search_end .= "&gia_bd=" . $gia_tu;
}

if ($gia_den != 0 && strpos($txt, 'gia_kt') == false) {
    $search_end .= "&gia_kt=" . $gia_den;
}


if ($txt != "") {
    $search_end .= $txt;
}
$rv_cate = '&catid=' . $name_cate;
$search_end  = str_replace($rv_cate, '', $search_end);
$search_end = str_replace('&fill=1', '', $search_end);


if ($phan_biet == 2) {
    if ($new_name != "" && $city == 0 && $name_cate == 0 && $kv_dis == 0) {
        $link = "/s/" . str_replace(" ", "-", $new_name) . ".html";
        // từ khóa trùng với danh mục
        if (array_search($new_name, $db_tkcat_col) > 0) {
            if (array_search($new_name, $db_tkcat_col) == 121) {
                $link = "/viec-lam.html";
            } else {
                $link = "/mua-ban/" . array_search($new_name, $db_tkcat_col) . "/" . replaceTitle($new_name) . ".html";
            }
        }
        // tim kiem nganh nghe viec lam
        else if (array_search($new_name, $db_tkcatvl_col) > 0 || array_search($new_name, $tkcatvl_col) > 0) {
            if (array_search($new_name, $db_tkcatvl_col) > 0 && array_search($new_name, $tkcatvl_col) == 0) {
                $id_key = array_search($new_name, $db_tkcatvl_col);
                $link = "/viec-lam-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-n" . $id_key . "t0d0.html";
            } else if (array_search($new_name, $tkcatvl_col) > 0 || (array_search($new_name, $db_tkcatvl_col) > 0 && array_search($new_name, $tkcatvl_col) > 0)) {
                $id_key = array_search($new_name, $tkcatvl_col);
                if ($id_key == 87) {
                    $link = "/viec-lam-them-n" . $id_key . "t0d0.html";
                } else {
                    $link = "/" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-n" . $id_key . "t0d0.html";
                }
            }
        }
        // từ khóa trùng với tags đăng tin
        else if (array_search($new_name, $tags_tk1) > 0) {
            $link = "/mua-ban-" . str_replace('mua-ban-', '', replaceTitle($new_name)) . "-t" . array_search($new_name, $tags_tk1) . ".html";
        }
        // từ khóa trùng với tags nganh nghe
        else if (array_search($new_name, $db_tags_vl) > 0 || array_search($new_name, $dbtags_vl) > 0) {
            if (array_search($new_name, $db_tags_vl) > 0) {
                $link = "/tim-viec-lam-" . replaceTitle($new_name) . "-r" . array_search($new_name, $db_tags_vl) . "t0d0.html";
            } else if (array_search($new_name, $dbtags_vl) > 0 || (array_search($new_name, $db_tags_vl) > 0 && array_search($new_name, $dbtags_vl) > 0)) {
                $link = "/tim-" . replaceTitle($new_name) . "-r" . array_search($new_name, $dbtags_vl) . "t0d0.html";
            }
        };
    } else if ($new_name != "" && $city != 0 && $name_cate == 0 && $kv_dis == 0) {
        $link = "/s/" . str_replace(" ", "-", $new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . ".html";
        // từ khóa trùng với danh mục
        if (array_search($new_name, $db_tkcat_col) > 0) {
            if (array_search($new_name, $db_tkcat_col) == 121) {
                $link = "/tim-viec-lam-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-w120c" . $city . ".html";
            } else {
                $link = "/mua-ban/rao-vat/" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w" . array_search($new_name, $db_tkcat_col) . ".html";
            }
        };
        // từ khóa tags + tình thành
        if (array_search($new_name, $tags_tk1) > 0) {
            $link = "/mua-ban-" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "t" . array_search($new_name, $tags_tk1) . "d0.html";
        };
        // tim kiem nganh nghe viec lam
        if (array_search($new_name, $db_tkcatvl_col) > 0 || array_search($new_name, $tkcatvl_col) > 0) {
            if (array_search($new_name, $db_tkcatvl_col) > 0 && array_search($new_name, $tkcatvl_col) == 0) {
                $id_key = array_search($new_name, $db_tkcatvl_col);
                $link = "/viec-lam-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-n" . $id_key . "t" . $city . "d0.html";
            } else if (array_search($new_name, $tkcatvl_col) > 0 || (array_search($new_name, $db_tkcatvl_col) > 0 && array_search($new_name, $tkcatvl_col) > 0)) {
                $id_key = array_search($new_name, $tkcatvl_col);
                if ($id_key == 87) {
                    $link = "/viec-lam-them-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-n" . $id_key . "t" . $city . "d0.html";
                } else {
                    $link = "/" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-n" . $id_key . "t" . $city . "d0.html";
                }
            }
        };

        // từ khóa trùng với tags nganh nghe
        if (array_search($new_name, $db_tags_vl) > 0 || array_search($new_name, $dbtags_vl) > 0) {
            if (array_search($new_name, $db_tags_vl) > 0) {
                $link = "/tim-viec-lam-" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-r" . array_search($new_name, $db_tags_vl) . "t" . $city . "d0.html";
            } else if (array_search($new_name, $dbtags_vl) > 0 || (array_search($new_name, $db_tags_vl) > 0 && array_search($new_name, $dbtags_vl) > 0)) {
                $link = "/tim-" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-r" . array_search($new_name, $dbtags_vl) . "t" . $city . "d0.html";
            }
        };
    } else if ($new_name != "" && $city != 0 && $name_cate == 0 && $kv_dis != 0) {
        $link = "/s/" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-d" . $kv_dis . ".html";
        // từ khóa trùng với danh mục
        if (array_search($new_name, $db_tkcat_col) > 0) {
            if (array_search($new_name, $db_tkcat_col) == 121) {
                $link = "/tim-viec-lam-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-" . replaceTitle($arrcity[$city]['cit_name']) . "-w120c" . $city . "d" . $kv_dis . ".html";
            } else {
                $link = "/mua-ban/rao-vat/" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w" . array_search($new_name, $db_tkcat_col) . "-d" . $kv_dis . ".html";
            }
        };
        // từ khóa tags + tình thành
        if (array_search($new_name, $tags_tk1) > 0) {
            $link = "/mua-ban-" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "t" . array_search($new_name, $tags_tk1) . "d" . $kv_dis . ".html";
        };
        // tim kiem nganh nghe viec lam
        if (array_search($new_name, $db_tkcatvl_col) > 0 || array_search($new_name, $tkcatvl_col) > 0) {
            if (array_search($new_name, $db_tkcatvl_col) > 0 && array_search($new_name, $tkcatvl_col) == 0) {
                $id_key = array_search($new_name, $db_tkcatvl_col);
                $link = "/viec-lam-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-" . replaceTitle($arrcity[$city]['cit_name']) . "-n" . $id_key . "t" . $city . "d" . $kv_dis . ".html";
            } else if (array_search($new_name, $tkcatvl_col) > 0 || (array_search($new_name, $db_tkcatvl_col) > 0 && array_search($new_name, $tkcatvl_col) > 0)) {
                $id_key = array_search($new_name, $tkcatvl_col);
                if ($id_key == 87) {
                    $link = "/viec-lam-them-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-" . replaceTitle($arrcity[$city]['cit_name']) . "-n" . $id_key . "t" . $city . "d" . $kv_dis . ".html";
                } else {
                    $link = "/" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-" . replaceTitle($arrcity[$city]['cit_name']) . "-n" . $id_key . "t" . $city . "d" . $kv_dis . ".html";
                }
            }
        };

        // từ khóa trùng với tags nganh nghe
        if (array_search($new_name, $db_tags_vl) > 0 || array_search($new_name, $dbtags_vl) > 0) {
            if (array_search($new_name, $db_tags_vl) > 0) {
                $link = "/tim-viec-lam-" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-" . replaceTitle($arrcity[$city]['cit_name']) . "-r" . array_search($new_name, $db_tags_vl) . "t" . $city . "d" . $kv_dis . ".html";
            } else if (array_search($new_name, $dbtags_vl) > 0 || (array_search($new_name, $db_tags_vl) > 0 && array_search($new_name, $dbtags_vl) > 0)) {
                $link = "/tim-" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-" . replaceTitle($arrcity[$city]['cit_name']) . "-r" . array_search($new_name, $dbtags_vl) . "t" . $city . "d" . $kv_dis . ".html";
            }
        };
    } else if ($new_name != "" && $city == 0 && $name_cate != 0 && $kv_dis == 0) {
        if ($name_cate == 120) {
            $link = "/s/" . str_replace(" ", "-", $new_name) . "-thuoc-tim-viec-lam-w" . $name_cate . ".html";
        } else {
            $link = "/s/" . str_replace(" ", "-", $new_name) . "-thuoc-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-w" . $name_cate . ".html";
        }
    } else if ($new_name != "" && $city != 0 && $name_cate != 0 && $kv_dis == 0) {
        if ($name_cate == 120) {
            $link = "/s/" . str_replace(" ", "-", $new_name) . "-thuoc-tim-viec-lam-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-e" . $city . "-h" . $name_cate . ".html" . $sq;
        } else {
            $link = "/s/" . str_replace(" ", "-", $new_name) . "-thuoc-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-e" . $city . "-h" . $name_cate . ".html" . $sq;
        }

        // từ khóa trùng với danh mục
        if (array_search($new_name, $db_tkcat_col) > 0) {
            if (array_search($new_name, $db_tkcat_col) == 121) {
                $link = "/mua-ban/rao-vat/tim-viec-lam-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w120.html";
            } else {
                $link = "/mua-ban/rao-vat/" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w" . array_search($new_name, $db_tkcat_col) . ".html";
            }
        }
    } else if ($new_name != "" && $city != 0 && $name_cate != 0 && $kv_dis != 0) {
        if ($name_cate == 120) {
            $link = "/s/" . str_replace(" ", "-", $new_name) . "-thuoc-tim-viec-lam-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-"  . replaceTitle($arrcity[$city]['cit_name']) . "-e" . $city . "-h" . $name_cate . "-d" . $kv_dis . ".html" . $sq;
        } else {
            $link = "/s/" . str_replace(" ", "-", $new_name) . "-thuoc-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-"  . replaceTitle($arrcity[$city]['cit_name']) . "-e" . $city . "-h" . $name_cate . "-d" . $kv_dis . ".html" . $sq;
        }

        // từ khóa trùng với danh mục
        if (array_search($new_name, $db_tkcat_col) > 0) {
            if (array_search($new_name, $db_tkcat_col) == 121) {
                $link = "/mua-ban/rao-vat/tim-viec-lam-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-"  . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w120-d" . $kv_dis . ".html";
            } else {
                $link = "/mua-ban/rao-vat/" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-"  . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w" . array_search($new_name, $db_tkcat_col) . "-d" . $kv_dis . ".html";
            }
        }
    } else if ($city != 0 && $name_cate == 0 && $kv_dis == 0) {
        $link = "/mua-ban/rao-vat/" . $city . "/" . replaceTitle($arrcity[$city]['cit_name']) . ".html";
    } else if ($city != 0 && $name_cate == 0 && $kv_dis != 0) {
        $link = "/mua-ban-rao-vat-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-" . replaceTitle($arrcity[$city]['cit_name']) . "-d" . $kv_dis . "c" . $city . ".html";
    } else if ($city == 0 && $name_cate != 0 && $kv_dis == 0) {
        $link = "/mua-ban/" . $name_cate . "/" . replaceTitle($db_cat[$name_cate]['cat_name']) . ".html";
        if ($name_cate == 120) {
            $link = "/viec-lam.html";
        }
    } else if ($city != 0 && $name_cate != 0 && $kv_dis == 0) {
        if ($name_cate == 120) {
            $link = "/tim-viec-lam-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-w" . $name_cate . "c" . $city . ".html";
        } else {
            $link = "/mua-ban/rao-vat/" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w" . $name_cate . ".html";
        }
    } else if ($city != 0 && $name_cate != 0 && $kv_dis != 0) {
        if ($name_cate == 120) {
            $link = "/tim-viec-lam-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-"  . replaceTitle($arrcity[$city]['cit_name']) . "-w" . $name_cate . "c" . $city . "d" . $kv_dis . ".html";
        } else {
            $link = "/mua-ban-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity2[$kv_dis]['cit_name']) . "-"  . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "-w" . $name_cate . "-d" . $kv_dis . ".html";
        }
    } else {
        $link = "/";
    }
} else if ($phan_biet == 1) {
    if ($new_name != "" && $city == 0 && $name_cate == 0) {
        $link = "/sm/" . str_replace(" ", "-", $new_name) . ".html";
        // tu khoa trung voi nganh nghe
        if (array_search($new_name, $db_tkcatvl_col) > 0) {
            $id_key = array_search($new_name, $db_tkcatvl_col);
            $link = "/ung-vien-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-n" . $id_key . ".html";
        };

        if (array_search($new_name, $tkcatvl_col) > 0) {
            $id_key = array_search($new_name, $tkcatvl_col);
            $link = "/ung-vien-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-n" . $id_key . ".html";
        };
        // end

        if (array_search($new_name, $db_tkcat_col) > 0) {
            if (array_search($new_name, $db_tkcat_col) == 121) {
                $link = "/tin-mua-tim-ung-vien-d121.html";
            } else {
                $link = "/tin-mua-" . replaceTitle($new_name) . "-d" . array_search($new_name, $db_tkcat_col)  . ".html";
            }
        }
    } else if ($new_name != "" && $city != 0 && $name_cate == 0) {
        $link = "/tin-mua-" . $new_name . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . ".html";

        // tu khoa trung voi nganh nghe
        if (array_search($new_name, $db_tkcatvl_col) > 0) {
            $id_key = array_search($new_name, $db_tkcatvl_col);
            $link = "/ung-vien-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "n" . $id_key . ".html";
        };

        if (array_search($new_name, $tkcatvl_col) > 0) {
            $id_key = array_search($new_name, $tkcatvl_col);
            $link = "/ung-vien-" . replaceTitle(str_replace("---", "-", str_replace(" ", "-", $new_name))) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "n" . $id_key . ".html";
        };
        // end

        if (array_search($new_name, $db_tkcat_col) > 0) {
            if (array_search($new_name, $db_tkcat_col) == 120) {
                $link = "/tin-mua-tim-ung-vien-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "w121.html";
            } else {
                $link = "/tin-mua-" . replaceTitle($new_name) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "w" . array_search(strtolower($new_name), $db_tkcat_col) . ".html";
            }
        }
    } else if ($new_name != "" && $city == 0 && $name_cate != 0) {
        $link = "/tin-mua-" . str_replace(" ", "-", $new_name) . "-thuoc-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-w" . $name_cate . ".html";
    } else if ($new_name != "" && $city != 0 && $name_cate != 0) {
        $link = "/tin-mua-" . str_replace("---", "-", str_replace(" ", "-", $new_name)) . "-thuoc-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "d" . $name_cate . ".html" . $sq;
    } else if ($city != 0 && $name_cate == 0) {
        $link = "/tin-mua-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . ".html";
    } else if ($city == 0 && $name_cate != 0) {
        if ($name_cate == 121) {
            $link = "/tin-mua-tim-ung-vien-d121.html";
        } else {
            $link = "/tin-mua-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-d" . $name_cate  . ".html";
        }
    } else if ($city != 0 && $name_cate != 0) {
        if ($name_cate == 121) {
            $link = "/tin-mua-tim-ung-vien-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "w121.html";
        } else {
            $link = "/tin-mua-" . replaceTitle($db_cat[$name_cate]['cat_name']) . "-tai-" . replaceTitle($arrcity[$city]['cit_name']) . "-c" . $city . "w" . $name_cate . ".html";
        }
    } else {
        $link = "/tat-ca-tin-dang-mua.html";
    }
}

if ($search_end != "?fill=1") {
    $link .= $search_end;
}
echo $link;
exit();
