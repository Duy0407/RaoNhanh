<?
include("config.php");
require_once("../cache_file/top-cache.php");
$online_arr1 = getValue("online_arr", "arr", "POST", array());
$online_arr = [];
for ($i = 0; $i < count($online_arr1); $i++) {
    if (is_numeric($online_arr1[$i])) {
        $online_arr[] = $online_arr1[$i];
    }
}

$online_id = getValue("online_id", "int", "POST", 0);

if ($online_id > 0) {
    $db_online = new db_query("SELECT usc_id, usc_time, usc_city, usc_store_name, usc_logo, usc_name, chat365_id, usc_type FROM user WHERE chat365_id = " . $online_id . "");
    if (mysql_num_rows($db_online->result) > 0) {
        $row = mysql_fetch_assoc($db_online->result);

        $db_new = new db_query("SELECT new_title FROM new WHERE new_user_id = " . $row['usc_id'] . " ORDER BY new_id DESC LIMIT 1");
        $rows = mysql_fetch_assoc($db_new->result);
        $name_tt = ($rows["new_title"] != '') ? $rows["new_title"] : '';


        if ($row['usc_logo'] != '') {
            $log_img = $row['usc_logo'];
        } else {
            $log_img = "/images/img_new/chat_daidien.png";
        }

        $name = ($row['usc_store_name'] != '') ? $row['usc_store_name'] : $row['usc_name'];
        if ($row['usc_type'] == 1) {
            $link = '/ca-nhan/' . $row['usc_id'] . '/' . replaceTitle($row['usc_name']) . '.html';
        } else {
            $link = '/gian-hang/' . $row['usc_id'] . '/' . replaceTitle($row['usc_store_name']) . '.html';
        }
        // $link = rewrite_home_dn($row['usc_id'], $name);
        $city = (isset($arrcity[$row['usc_city']]['cit_name'])) ? $arrcity[$row['usc_city']]['cit_name'] : "Chưa cập nhật";

        echo '<div class="nguoi_onli item_gh box_chat" id-chat="' . $row['chat365_id'] . '">
                        <a class="avt_onli img_gh" rel="nofollow" href="' . $link . '" title="' . $name . '">
                            <img class="lazyload anhdd_onli" src="/images/loading.gif" data-src="' . $log_img . '" onerror="this.onerror=null; this.src=' . $log_img . '" alt="' . $name . '">
                            <span></span>
                        </a>
                        <div class="ten_ngonli">
                            <p class="ten_nguoi_oni cr_weight sh_size_one"><a class="ten_banghang" rel="nofollow" href="' . $link . '" title="' . $name . '">' . $name . '</a></p>
                            <p class="tpho_ngonli sh_size_five"><a class="sh_size_five" rel="nofollow" href="' . $link . '">' . $city . '</a></p>' .
            (($name_tt != '') ? '<p class="tinmoi_nhatdang sh_size_five sh_clr_two"><a class="sh_size_five sh_clr_two" rel="nofollow" href="' . $link . '">' . $name_tt . '</a></p>' : '')
            . '</div>
                    </div>';

        // echo '<div class="item_gh box_chat" id-chat="' . $row['chat365_id'] . '">
        // 		<a rel="nofollow" href="' . $link . '" title="' . $name . '" class="img_gh">
        // 		<img class="lazyload" src="/images/loading.gif" data-src="' . $log_img . '" alt="' . $name . '" />
        // 		</a>
        // 		<div class="right_gh">
        // 		<h4><a rel="nofollow" href="' . $link . '" title="' . $name . '">' . $name . '</a></h4>
        // 		<span class="location">' . $city . '</span>' . $name_tt . '
        // 		</div>
        // 	</div>';
        unset($name, $log_img, $city);
    }
}


if (count($online_arr) > 0) {

    $arr_kq = array();
    $online_arr = array_filter($online_arr);
    $check_c = count($online_arr);
    $arr_vlue = $online_arr;
    $str_online = @implode(',', @array_unique($online_arr));

    $db_online = new db_query("SELECT usc_id, usc_time, usc_city, usc_store_name, usc_logo, usc_name, chat365_id, usc_type FROM user WHERE chat365_id IN (" . $str_online . ")");

    $count = mysql_num_rows($db_online->result);

    if ($count > 0) {
        while ($row = mysql_fetch_assoc($db_online->result)) {

            $arr_kq[] = $row['chat365_id'];

            $db_new = new db_query("SELECT new_title FROM new WHERE new_user_id = " . $row['usc_id'] . " ORDER BY new_id DESC LIMIT 1");
            $rows = mysql_fetch_assoc($db_new->result);
            $name_tt = ($rows["new_title"] != '') ? $rows["new_title"] : '';

            if ($row['usc_logo'] != '') {
                $log_img = $row['usc_logo'];
            } else {
                $log_img = "/images/img_new/chat_daidien.png";
            }
            $name = ($row['usc_store_name'] != '') ? $row['usc_store_name'] : $row['usc_name'];
            // $link = rewrite_home_dn($row['usc_id'], $name);
            if ($row['usc_type'] == 1) {
                $link = '/ca-nhan/' . $row['usc_id'] . '/' . replaceTitle($row['usc_name']) . '.html';
            } else {
                $link = '/gian-hang/' . $row['usc_id'] . '/' . replaceTitle($row['usc_store_name']) . '.html';
            }
            $city = (isset($arrcity[$row['usc_city']]['cit_name'])) ? $arrcity[$row['usc_city']]['cit_name'] : "Chưa cập nhật";

            echo '<div class="nguoi_onli item_gh box_chat" id-chat="' . $row['chat365_id'] . '">
                        <a class="avt_onli img_gh" rel="nofollow" href="' . $link . '" title="' . $name . '">
                            <img class="lazyload anhdd_onli" src="/images/loading.gif" data-src="' . $log_img . '" onerror="this.onerror=null; this.src=' . $log_img . '" alt="' . $name . '">
                            <span></span>
                        </a>
                        <div class="ten_ngonli">
                            <p class="ten_nguoi_oni cr_weight sh_size_one"><a class="ten_banghang" rel="nofollow" href="' . $link . '" title="' . $name . '">' . $name . '</a></p>
                            <p class="tpho_ngonli sh_size_five"><a class="sh_size_five" rel="nofollow" href="' . $link . '">' . $city . '</a></p>' .
                (($name_tt != '') ? '<p class="tinmoi_nhatdang sh_size_five sh_clr_two"><a class="sh_size_five sh_clr_two" rel="nofollow" href="' . $link . '">' . $name_tt . '</a></p>' : '')
                . '</div>
                    </div>';
            // echo '<div class="item_gh box_chat" id-chat="' . $row['chat365_id'] . '">
            // 		<a rel="nofollow" href="' . $link . '" title="' . $name . '" class="img_gh">
            // 		<img class="lazyload" src="/images/loading.gif" data-src="' . $log_img . '" alt="' . $name . '" />
            // 		</a>
            // 		<div class="right_gh">
            // 		<h4><a rel="nofollow" href="' . $link . '" title="' . $name . '">' . $name . '</a></h4>
            // 		<span class="location">' . $city . '</span>' . $name_tt . '
            // 		</div>
            // 	</div>';
            unset($name, $log_img, $city);
        }
    }

    if ($count > 0 && $count < $check_c) {
        $c_arr = array_udiff($arr_vlue, $arr_kq, 'strcasecmp');
        foreach ($c_arr as $key => $value) {
            echo '<div class="item_gh box_chat false_div" id-chat="' . $value . '"></div>';
        }
    }
}
