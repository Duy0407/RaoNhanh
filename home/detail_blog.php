<?
include("config.php");
$newid = getValue("newid",'int',"GET",0);
$newid = (int)$newid;
if($newid == 0)
{
    redirect("/");
}
$db_qr = new db_query("SELECT new_url,new_title,new_id,new_keyword,new_teaser,new_picture,new_date,new_sapo,new_description,adm_name,adm_id,title_relate,content_relate FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE new_id = ".$newid." LIMIT 1");
$row = mysql_fetch_assoc($db_qr->result);
function insertImage($content){
    if($content != ''){
        require_once '../functions/simple_html_dom.php';
        $html = str_get_html($content);
        $h2 = $html->find("h2")[1];
        $h2->outertext = '<a target="_blank" href="https://timviec365.vn/"><img style="max-width:100%;max-height:100%;" class="lazyload" src="/images/loading.gif" data-src="/images/banner_back_home.webp" alt="Tìm việc làm"></a>'.$h2->outertext;
        $html = $html->save();
        echo $html;
    }
}
//$index = "index, follow,noodp";
$index = "noindex, nofollow";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= removeHTML($row['new_title'])." - ".$row['new_id'] ?></title>
    <meta name="keywords" content="<?= removeHTML($row['new_keyword']) ?>"/>
    <meta name="description" content="<?= removeHTML($row['new_teaser']) ?>"/>
    <meta property="og:title" content="<?= removeHTML($row['new_title'])." - ".$row['new_id'] ?>"/>
    <meta property="og:description" content="<?= removeHTML($row['new_teaser']) ?>"/>
    <?php if($row['new_url'] != ''):?>
        <meta property="og:url" content="https://raonhanh365.vn/tin-tuc/<?= replaceTitle(removeHTML($row['new_url']))."-p".$row['new_id'].".html" ?>"/>
    <?php else:?>
        <meta property="og:url" content="https://raonhanh365.vn/tin-tuc/<?= replaceTitle(removeHTML($row['new_title']))."-p".$row['new_id'].".html" ?>"/>
    <?php endif;?>
    <meta name="language" content="vietnamese"/>
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn"/>
    <meta name="abstract" content="raonhanh365.vn Mạng xã hội mua bán rao vặt lớn nhất Việt Nam<"/>
    <meta name="author" itemprop="author" content="raonhanh365.vn"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>
    <meta name="robots" content="<?=$index?>"/>
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
    <meta property="og:image:url" content="https://raonhanh365.vn/pictures/news/<?=$row['new_picture']?>"/>
    <meta property="og:image:width" content="476"/>
    <meta property="og:image:height" content="249"/>
    <meta property="og:type" content="website"/>
    <meta property="og:locale" content="vi_VN"/>
    <meta name="revisit-after" content="1 days"/>
    <meta name="page-topic" content="Mua bán rao vặt"/>
    <meta name="resource-type" content="Document"/>
    <meta name="distribution" content="Global"/>
    <!--    -----tvt them  02/06--->
    <link rel="preload" href="/css/style.min.css?v=<?=$version?>" as="style">
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" as="image" href="/images/banner_tao_cv.webp">
    <link rel="preload" as="image" href="/images/banner_back_home.webp">
    <!--------------->

    <?php if($row['new_url'] != ''):?>
        <link rel="canonical" href="https://raonhanh365.vn/tin-tuc/<?= replaceTitle(removeHTML($row['new_url']))."-p".$row['new_id'].".html" ?>"/>
        <link rel="amphtml" href="https://raonhanh365.vn/amp-tin-tuc/<?= replaceTitle(removeHTML($row['new_url']))."-p".$row['new_id'].".html" ?>" />
    <?php else:?>
        <link rel="canonical" href="https://raonhanh365.vn/tin-tuc/<?= replaceTitle(removeHTML($row['new_title']))."-p".$row['new_id'].".html" ?>"/>
        <link rel="amphtml" href="https://raonhanh365.vn/amp-tin-tuc/<?= replaceTitle(removeHTML($row['new_title']))."-p".$row['new_id'].".html" ?>" />
    <?php endif;?>

    <!--    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
       <link rel="stylesheet" type="text/css" href="/css/jquery-date.css"/> -->
    <!--<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>-->
    <!-- <script type="text/javascript" src="/js/jquery-ui.js"></script> -->
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
    <style>
        .div_shara_like div{ float: left;margin-right: 5px; }
        .time_news{ margin-bottom: 10px; }
        .author{ float: left;width: 100%;text-align: right;padding-right: 30px;margin: 10px 0px; }
        .author a{ color: #00a787;font-style: italic;font-weight: bold;}
        .sapo{float: left;margin-top: 20px;font-style: italic;}
    </style>
</head>
<body>
<?
$file = '../cache_file/sql_cache.json';
$arraytong       = json_decode(file_get_contents($file),true);
$arrcity         = $arraytong['db_city'];
$db_cat          = $arraytong['db_cat'];

include("../includes/common/inc_header.php"); ?>
<section>
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="/" title="Trang chủ">Trang chủ</a> &#155;</li>
                <li><a href="/tin-tuc" title="Tin tức">Tin tức</a> &#155;</li>
                <li><a title="<?= $row['new_title'] ?>"><?= cut_string($row['new_title'],20,'...') ?></a></li>
            </ul>
        </div>
    </div>
    <div class="main_cate">
        <div class="container">
            <div class="left_box">
                <?
                include ('../includes/cate/inc_left_cate.php');
                ?>
                <div id="filter-left-uutien" class="show_left_uutien">
                    <?
                    include ('../includes/detail/tin_uu_tien.php');
                    ?>
                </div>
                <div id="banner_left">
                    <a style="display:inline-block;margin-top:30px" target="_blank" href="https://timviec365.vn/cv-xin-viec" class="t_banner"><img src="/images/loading.gif" class="lazyload t_banner_img" data-src="/images/banner_tao_cv.webp" alt="Tạo CV online"></a>
                </div>
            </div>
            <div class="right_box">
                <div class="main_r dtblog">
                    <h1><?= $row['new_title'] ?></h1>
                    <span class="time_news"><?= date("h:i d/m/Y",$row['new_date']) ?></span>
                    <div class="div_shara_like" id="div_shara_like">
                        <!--nut like face-->
                        <!--like facebook-->
                    </div>

                    <div class="sapo"><?= $row['new_sapo'] ?></div>
                    <div class="main_dt_blog">
                        <?php $new_description = str_replace('src=', 'class="lazyload" src="/images/loading.gif" data-src=', $row['new_description']);?>
                        <div class="mucluc">

                            <?php echo makeML($new_description);?>
                        </div>

                        <?php echo makeML_content($new_description);?>
                        <?php if($row['title_relate'] != '' && $row['content_relate'] != ''):?>
                            <div class="box_relate">
                                <div class="title_relate"><p><?=$row['title_relate']?></p></div>
                                <div class="content_relate">
                                    <?=$row['content_relate']?>
                                </div>
                            </div>
                        <?php endif;?>
                    </div>

                    <p class="author">Tác giả: <a rel="nofollow" href="/tac-gia/<?=replaceTitle($row['adm_name']).'-tg'.$row['adm_id'].'.html' ?>"><?=$row['adm_name'] ?></a></p>

                </div>
                <div id="face_cm" style="width: 100%;"></div>
                <div class="list_new main_new_dt">
                    <h3>Tin tức liên quan</h3>
                    <div class="main_list_new">
                        <?
                        $db_qrlq = new db_query("SELECT * FROM news WHERE new_id <> $newid ORDER BY new_id DESC LIMIT 4");
                        While($rowlq = mysql_fetch_assoc($db_qrlq->result))
                        {
                            ?>
                            <div class="item_new">
                                <a href="/tin-tuc/<?= replaceTitle($rowlq['new_title']) ?>-p<?= $rowlq['new_id'] ?>.html" title="<?= $rowlq['new_title'] ?>" class="img_new"><img class="lazyload" src="/images/loading.gif" data-src="<?= $rowlq['new_picture'] == ''?"/images/df.png":"/pictures/news/".$rowlq['new_picture'] ?>" alt="<?= $rowlq['new_title'] ?>"/></a>
                                <a href="/tin-tuc" title="Tin tức" class="cate_new">Tin tức</a>
                                <h4><a href="/tin-tuc/<?= replaceTitle($rowlq['new_title']) ?>-p<?= $rowlq['new_id'] ?>.html" title="<?= $rowlq['new_title'] ?>"><?= $rowlq['new_title'] ?></a></h4>
                                <p><?= cut_string(removeHTML($rowlq['new_teaser']),170,'...') ?></p>
                            </div>
                            <?
                        }
                        ?>
                    </div>
                </div>
            </div>
            <? include("../includes/home/inc_tag.php") ?>
        </div>
    </div>

    <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script defer type="text/javascript">
        jQuery(window).scroll(function(){
            if(jQuery(this).scrollTop()> 50 && $('#face_cm').hasClass('face_cm') == false){
                $('#face_cm').append('<fb:comments style="margin-top: 20px;float: left;width: 100%;margin-left: -5px;" data-width="100%" data-numposts="8"></fb:comments><div id="fb-root"></div><script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=240566299768574";fjs.parentNode.insertBefore(js, fjs);}(document, "script","facebook-jssdk"));<\/script>');
                $('#div_shara_like').append('<div class="fb-like" data-href="https://raonhanh365.vn/tin-tuc/<?= replaceTitle(removeHTML($row['new_title']))."-p".$row['new_id'].".html" ?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div><div id="fb-root"></div><script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.11";fjs.parentNode.insertBefore(js, fjs);}(document, "script", "facebook-jssdk"));<\/script>');
                $('#face_cm').addClass('face_cm');
            }
        });
    </script>
</section>
<? include("../includes/common/inc_footer.php") ?>
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/dangky.js?v=1"></script>
<script src="/js/lazysizes.min.js"></script>
</body>
</html>