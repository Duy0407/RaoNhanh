<?
function generate_cate_url($row)
{
   $url   =   "/blog/" . replaceTitle($row['cat_name']) . "-c" . $row["cat_id"] . "/";
   return $url;
}
function rewrite_news($cat_name, $row)
{
   $url   =   "/blog/" . replaceTitle($cat_name) . "/" . replaceTitle($row['new_title'])  . "-" . $row["new_id"] . ".html";
   return $url;
}
function rewrite_cate($catid, $cat_name)
{
   $url   =   "/mua-ban/" . $catid . "/" . replaceTitle($cat_name) . ".html";
   return $url;
}
function rewrite_home_dn($uscid, $store)
{
   $url   =   "/gian-hang/" . $uscid . "/" . replaceTitle($store) . ".html";
   return $url;
}
function rewriteNews($id, $title)
{
   return  "/" . replaceTitle($title) . "-c" . $id . ".html";
}
function list_cate_par($catid)
{
   $result = $catid . ',';
   $db_sel = new db_query("SELECT * FROM categories_multi WHERE cat_parent_id = " . $catid . " AND cat_active = 1");
   if (mysql_num_rows($db_sel->result) > 0) {
      while ($row = mysql_fetch_assoc($db_sel->result)) {
         $result .= $row['cat_id'] . ',';
      }
   }
   return substr($result, 0, -1);
}
function rewriteCate($catid, $catname, $city, $cityname)
{
   $linkrt = "";
   if ($catid == 0 && $city == 0) {
      $linkrt = "/viec-lam-moi.html";
   } else if ($catid != 0 && $city == 0) {
      $linkrt = "/viec-lam-" . replaceTitle($catname) . "-c" . $catid . "v" . $city . ".html";
   } else if ($catid == 0 && $city != 0) {
      $linkrt = "/viec-lam-tai-" . replaceTitle($cityname) . "-c" . $catid . "v" . $city . ".html";
   } else if ($catid != 0 && $city != 0) {
      $linkrt = "/viec-lam-" . replaceTitle($catname) . "-tai-" . replaceTitle($cityname) . "-c" . $catid . "v" . $city . ".html";
   }
   return  $linkrt;
}
function rewriteCate1($catid, $catname, $city, $cityname)
{
   $linkrt = "";
   if ($catid == 0 && $city == 0) {
      $linkrt = "/viec-lam-moi.html";
   } else if ($catid != 0 && $city == 0) {
      $linkrt = "/viec-lam-" . replaceTitle($catname) . "-n" . $catid . "t" . $city . "";
   } else if ($catid == 0 && $city != 0) {
      $linkrt = "/viec-lam-tai-" . replaceTitle($cityname) . "-n" . $catid . "t" . $city . "";
   } else if ($catid != 0 && $city != 0) {
      $linkrt = "/viec-lam-" . replaceTitle($catname) . "-tai-" . replaceTitle($cityname) . "-n" . $catid . "t" . $city . "";
   }
   return  $linkrt;
}
function rewriteKey1($catid, $catname, $city, $cit_name, $keyid, $keyname)
{
   $linkrt = "";
   if ($keyid == 0 && $city == 0) {
      $linkrt = "/";
   } else if ($keyid != 0 && $city == 0) {
      $linkrt = "/tim-viec-lam-" . replaceTitle($keyname) . "-r" . $keyid . "t" . $city . ".html";
   } else if ($keyid != 0 && $city != 0) {
      $linkrt = "/tim-viec-lam-" . replaceTitle($keyname) . "-tai-" . replaceTitle($cit_name) . "-r" . $keyid . "t" . $city . ".html";
   }
   return  $linkrt;
}
function rewritemoney($catid, $catname, $city, $cityname)
{
   $linkrt = "";
   if ($catid == 0 && $city == 0) {
      $linkrt = "/viec-lam-luong-cao.html";
   } else if ($catid != 0 && $city == 0) {
      $linkrt = "/viec-lam-" . replaceTitle($catname) . "-luong-cao-i" . $catid . "v" . $city . ".html";
   } else if ($catid == 0 && $city != 0) {
      $linkrt = "/viec-lam-luong-cao-tai-" . replaceTitle($cityname) . "-i" . $catid . "v" . $city . ".html";
   } else if ($catid != 0 && $city != 0) {
      $linkrt = "/viec-lam-" . replaceTitle($catname) . "-luong-cao-tai-" . replaceTitle($cityname) . "-i" . $catid . "v" . $city . ".html";
   }
   return  $linkrt;
}
function rewrite_page($catid, $catname, $city, $citname, $usc_canhan, $usc_name, $s_tit)
{
   $linkrt = "";
   if ($s_tit != "" && $city == 0 && $catid == 0) {
      $linkrt = "/search/" . $s_tit . ".html";
   } else if ($usc_canhan != "") {
      $linkrt = "/ca-nhan/" . $usc_canhan . "/" . replaceTitle($usc_name) . ".html";
   } else if ($s_tit != "" && $city != 0 && $catid == 0) {
      $linkrt = "/mua-ban/search/" . $s_tit . "-tai-" . replaceTitle($citname) . "-c" . $city . ".html";
   } else if ($s_tit != "" && $city == 0 && $catid != 0) {
      $linkrt = "/mua-ban/search/" . $s_tit . "-thuoc-" . replaceTitle($catname) . "-w" . $catid . ".html";
   } else if ($s_tit != "" && $city != 0 && $catid != 0) {
      $linkrt = "/mua-ban/search/" . $s_tit . "-thuoc-" . replaceTitle($catname) . "-tai-" . replaceTitle($citname) . "-e" . $city . "-h" . $catid . ".html";
   } else if ($catid == 0 && $city == 0) {
      $linkrt = "/rao-vat-mien-phi.html";
   } else if ($catid != 0 && $city == 0) {
      $linkrt = "/mua-ban/" . $catid . "/" . replaceTitle($catname) . ".html";
   } else if ($catid == 0 && $city != 0) {
      $linkrt = "/mua-ban/rao-vat/" . $city . "/" . replaceTitle($citname) . ".html";
   } else if ($catid != 0 && $city != 0) {
      $linkrt = "/mua-ban/rao-vat/" . replaceTitle($catname) . "-tai-" . replaceTitle($citname) . "-c" . $city . "-w" . $catid . ".html";
   }
   return  $linkrt;
}

function rewrite_page_1($catid, $catname, $city, $citname, $s_tit, $nn, $tennganhnghe, $tags_id, $ten_tags, $tagsvl, $ten_tags_vl)
{
   $linkrt = "";
   if ($s_tit != "" && $city == 0 && $catid == 0 && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
      $linkrt = "/s/" . $s_tit . ".html";
   } else if ($s_tit != "" && $city != 0 && $catid == 0 && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
      $linkrt = "/s/" . $s_tit . "-tai-" . replaceTitle($citname) . "-c" . $city . ".html";
   } else if ($s_tit != "" && $city == 0 && $catid != 0 && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
      $linkrt = "/s/" . $s_tit . "-thuoc-" . replaceTitle($catname) . "-w" . $catid . ".html";
   } else if ($s_tit != "" && $city != 0 && $catid != 0 && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
      $linkrt = "/s/" . $s_tit . "-thuoc-" . replaceTitle($catname) . "-tai-" . replaceTitle($citname) . "-e" . $city . "-h" . $catid . ".html";
   } else if ($catid != 0 && $city == 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
      $linkrt = "/mua-ban/" . $catid . "/" . replaceTitle($catname) . ".html";
      if ($catid == 120) {
         $linkrt = "/viec-lam.html";
      }
   } else if ($catid == 0 && $city != 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
      $linkrt = "/mua-ban/rao-vat/" . $city . "/" . replaceTitle($citname) . ".html";
   } else if ($catid != 0 && $city != 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $nn == 0) {
      $linkrt = "/mua-ban/rao-vat/" . replaceTitle($catname) . "-tai-" . replaceTitle($citname) . "-c" . $city . "-w" . $catid . ".html";
   } else if ($tags_id != 0 && $city != 0 && $s_tit == "" && $catid == 0 && $tagsvl == 0 && $nn == 0) {
      $linkrt = "/mua-ban-" . replaceTitle($ten_tags) . "-tai-" . replaceTitle($citname) . "-c" . $city . "t" . $tags_id . ".html";
   } else if ($tags_id != 0 && $city == 0 && $s_tit == "" && $catid == 0 && $tagsvl == 0 && $nn == 0) {
      $linkrt = "/mua-ban-" . replaceTitle($ten_tags) . "-t" . $tags_id . ".html";
   } else if ($tagsvl != 0 && $city == 0 && $s_tit == "" && $tags_id == 0 && $catid == 0 && $nn == 0) {
      $linkrt = "/tim-viec-lam-" . replaceTitle($ten_tags_vl) . "-r" . $tagsvl . "t0.html";
   } else if ($tagsvl != 0 && $city != 0 && $s_tit == "" && $tags_id == 0 && $catid == 0 && $nn == 0) {
      $linkrt = "/tim-viec-lam-" . replaceTitle($ten_tags_vl) . "-tai-" . replaceTitle($citname) . "-r" . $tagsvl . "t" . $city . ".html";
   } else if ($nn != 0 && $city == 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $catid == 0) {
      if ($nn == 87) {
         $linkrt = "/viec-lam-them-n" . $nn . "t0.html";
      } else if ($nn == 83 || $nn == 79 || $nn == 10) {
         $linkrt = "/" . replaceTitle($tennganhnghe) . "-n" . $nn . "t0.html";
      } else {
         $linkrt = "/viec-lam-" . replaceTitle($tennganhnghe) . "-n" . $nn . "t0.html";
      }
   } else if ($nn != 0 && $city != 0 && $s_tit == "" && $tags_id == 0 && $tagsvl == 0 && $catid == 0) {
      $linkrt = "/viec-lam-" . replaceTitle($tennganhnghe) . "-tai-" . replaceTitle($citname) . "-n" . $nn . "t" . $city . ".html";
   }
   return  $linkrt;
};
function rewrite_page_tm1($catid, $catname, $citid, $citname, $s_tit, $nn, $tennganhnghe)
{
   $linkrt = "";
   if ($s_tit != "" && $catid == 0 && $citid == 0 && $nn == 0) {
      $linkrt = "/sm/" . $s_tit . ".html";
   } else if ($s_tit != "" && $catid != 0 && $citid == 0 && $nn == 0) {
      $linkrt = "/tim-mua-" . $s_tit . "-thuoc-" . $catname . "-w" . $catid . ".html";
   } else if ($s_tit != "" && $catid == 0 && $citid != 0 && $nn == 0) {
      $linkrt = "/tim-mua-" . $s_tit . "-tai-" . $citname . "-c" . $citid . ".html";
   } else if ($s_tit != "" && $catid != 0 && $citid != 0 && $nn == 0) {
      $linkrt = "/tim-mua-" . $s_tit . "-thuoc-" . replaceTitle($catname) . "-tai-" . replaceTitle($citname) . "-c" . $citid . "d" . $catid . ".html";
   } else if ($s_tit == "" && $catid != 0 && $citid == 0 && $nn == 0) {
      $linkrt = "/tim-mua-" . replaceTitle($catname) . "-d" . $catid . ".html";
   } else if ($s_tit == "" && $catid == 0 && $citid != 0 && $nn == 0) {
      $linkrt = "/tin-mua-tai-" . replaceTitle($citname) . "-c" . $citid . ".html";
   } else if ($s_tit == "" && $catid != 0 && $citid != 0 && $nn == 0) {
      $linkrt = "/tim-mua-" . replaceTitle($catname) . "-tai-" . replaceTitle($citname) . "-c" . $citid . "w" . $catid . ".html";
   } else if ($s_tit == "" && $catid == 0 && $citid == 0 && $nn != 0) {
      $linkrt = "ung-vien-" . replaceTitle($tennganhnghe) . "-n" . $nn . ".html";
   } else if ($s_tit == "" && $catid == 0 && $citid != 0 && $nn != 0) {
      $linkrt = "ung-vien-" . replaceTitle($tennganhnghe) . "-tai-" . replaceTitle($citname) . "-c" . $citid . "n" . $nn . ".html";
   }
   return  $linkrt;
};

function rewrite_page_2($usc_canhan, $usc_name)
{
   $linkrt = "";

   if ($usc_canhan != "") {
      $linkrt = "/ca-nhan/" . $usc_canhan . "/" . replaceTitle($usc_name) . ".html";
   }
   return  $linkrt;
}
function rewriteSearch($keyword, $nganhnghe, $catname, $diadiem, $namediadiem)
{
   $titrw = '';
   if ($keyword != '' && $nganhnghe == 0 && $diadiem == 0) {
      $titrw = str_replace(" ", "-", $keyword) . "+toan-quoc" . "-c" . $nganhnghe . "p" . $diadiem . ".html";
   } else if ($keyword != '' && $nganhnghe != 0 && $diadiem == 0) {
      $titrw = str_replace(" ", "-", $keyword) . "+" . "nganh-" . replaceTitle($catname) . "-c" . $nganhnghe . "p" . $diadiem . ".html";
   } else if ($keyword != '' && $nganhnghe == 0 && $diadiem != 0) {
      $titrw = str_replace(" ", "-", $keyword) . "+" . "tai-" . replaceTitle($namediadiem) . "-c" . $nganhnghe . "p" . $diadiem . ".html";
   } else if ($keyword != '' && $nganhnghe != 0 && $diadiem != 0) {
      $titrw =  str_replace(" ", "-", $keyword) . "+" . "tai-" . replaceTitle($namediadiem) . "-c" . $nganhnghe . "p" . $diadiem . ".html";
   }
   return "/tim-kiem/" . $titrw;
}
function rewrite_company($idcp, $namecp)
{
   $compn = "/" . replaceTitle($namecp) . "-co" . $idcp . ".html";
   return $compn;
}

function replaceTitle($title)
{
   $title = html_entity_decode($title, ENT_COMPAT, 'UTF-8');
   $title  = remove_accent($title);
   $title = str_replace('/', '', $title);
   $title = preg_replace('/[^\00-\255]+/u', '', $title);

   if (preg_match("/[\p{Han}]/simu", $title)) {
      $title = str_replace(' ', '-', $title);
   } else {
      $arr_str  = array("&lt;", "&gt;", "/", " / ", "\\", "&apos;", "&quot;", "&amp;", "lt;", "gt;", "apos;", "quot;", "amp;", "&lt", "&gt", "&apos", "&quot", "&amp", "&#34;", "&#39;", "&#38;", "&#60;", "&#62;");

      $title  = str_replace($arr_str, " ", $title);
      $title  = preg_replace('/\p{P}|\p{S}/u', ' ', $title);
      $title = preg_replace('/[^0-9a-zA-Z\s]+/', ' ', $title);

      //Remove double space
      $array = array(
         '    ' => ' ',
         '   ' => ' ',
         '  ' => ' ',
      );
      $title = trim(strtr($title, $array));
      $title  = str_replace(" ", "-", $title);
      $title  = urlencode($title);
      // remove cac ky tu dac biet sau khi urlencode
      $array_apter = array("%0D%0A", "%", "&");
      $title  = str_replace($array_apter, "-", $title);
      $title  = strtolower($title);
   }
   return $title;
}
//Loại bỏ dấu
function remove_accent($mystring)
{
   $marTViet = array(
      "à", "á", "ạ", "ả", "ã", "â", "ầ", "ấ", "ậ", "ẩ", "ẫ", "ă", "ằ", "ắ", "ặ", "ẳ", "ẵ",
      "è", "é", "ẹ", "ẻ", "ẽ", "ê", "ề", "ế", "ệ", "ể", "ễ",
      "ì", "í", "ị", "ỉ", "ĩ",
      "ò", "ó", "ọ", "ỏ", "õ", "ô", "ồ", "ố", "ộ", "ổ", "ỗ", "ơ", "ờ", "ớ", "ợ", "ở", "ỡ",
      "ù", "ú", "ụ", "ủ", "ũ", "ư", "ừ", "ứ", "ự", "ử", "ữ",
      "ỳ", "ý", "ỵ", "ỷ", "ỹ",
      "đ",
      "À", "Á", "Ạ", "Ả", "Ã", "Â", "Ầ", "Ấ", "Ậ", "Ẩ", "Ẫ", "Ă", "Ằ", "Ắ", "Ặ", "Ẳ", "Ẵ",
      "È", "É", "Ẹ", "Ẻ", "Ẽ", "Ê", "Ề", "Ế", "Ệ", "Ể", "Ễ",
      "Ì", "Í", "Ị", "Ỉ", "Ĩ",
      "Ò", "Ó", "Ọ", "Ỏ", "Õ", "Ô", "Ồ", "Ố", "Ộ", "Ổ", "Ỗ", "Ơ", "Ờ", "Ớ", "Ợ", "Ở", "Ỡ",
      "Ù", "Ú", "Ụ", "Ủ", "Ũ", "Ư", "Ừ", "Ứ", "Ự", "Ử", "Ữ",
      "Ỳ", "Ý", "Ỵ", "Ỷ", "Ỹ",
      "Đ",
      "'"
   );

   $marKoDau = array(
      "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a", "a",
      "e", "e", "e", "e", "e", "e", "e", "e", "e", "e", "e",
      "i", "i", "i", "i", "i",
      "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o", "o",
      "u", "u", "u", "u", "u", "u", "u", "u", "u", "u", "u",
      "y", "y", "y", "y", "y",
      "d",
      "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A", "A",
      "E", "E", "E", "E", "E", "E", "E", "E", "E", "E", "E",
      "I", "I", "I", "I", "I",
      "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O", "O",
      "U", "U", "U", "U", "U", "U", "U", "U", "U", "U", "U",
      "Y", "Y", "Y", "Y", "Y",
      "D",
      ""
   );

   return str_replace($marTViet, $marKoDau, $mystring);
}
//amp
function amp_content($string)
{
   $kq = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $string);
   $kq = strip_tags($kq, '<p><a><div><figure><figcaption><h1><h2><h3><h4><a><img><span><center><table><tbody><tr><th><td><button><blockquote><strong><ul><li><b><u><i><em><br>');
   $dom = new DOMDocument;
   libxml_use_internal_errors(true);
   $dom->loadHTML(mb_convert_encoding($kq, 'HTML-ENTITIES', 'UTF-8'));

   foreach ($dom->getElementsByTagName('img') as $img) {
      list($width, $height) = @getimagesize($img->getAttribute('src'));

      if ((int)$width == 0 || (int)$height == 0) {
         list($width, $height) = @getimagesize($_SERVER["DOCUMENT_ROOT"] . $img->getAttribute('src'));
      }
      if ((int)$width == 0) {
         $width = 900;
      }
      if ((int)$height == 0) {
         $height = 500;
      }
      $img->setAttribute('width', $width);
      $img->setAttribute('height', $height);
   }
   $xpath = new DOMXPath($dom);
   $nodes = $xpath->query('//@*');
   foreach ($nodes as $node) {
      if (!in_array($node->nodeName, array('src', 'href', 'class', 'id', 'alt', 'width', 'height', 'rel'))) {
         $node->parentNode->removeAttribute($node->nodeName);
      }
      if ($node->nodeName == 'alt') {
         $node->value = str_replace('"', "", $node->value);
      }
   }
   $kq = $dom->saveHTML();
   $kq = preg_replace('/^<!DOCTYPE.+?>/', '', str_replace(array('<html>', '</html>', '<body>', '</body>'), array('', '', '', ''), $kq));
   $kq = preg_replace('/<img(.+)>/', '<amp-img layout="intrinsic" $1 ></amp-img>', $kq);
   return $kq;
}
