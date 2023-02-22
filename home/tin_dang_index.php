<?

include('config.php');

if (!isset($_COOKIE['UID']) || !isset($_COOKIE['UT'])) {
    header('Location: /');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Danh mục đăng tin</title>
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="../css/style_new/style.css?=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="tindang-container tindang-container_df">
            <div class="tindang-header hd-disflex hd-align-center ">
                <p class="font-18-24 font-dam">Đăng tin</p>
            </div>
            <div class="tindang-dmspham">
                <p class="font-dam dmsp-p">Danh mục sản phẩm <span class="sh_clr_three">*</span></p>
                <input type="text" name="danhmuc_sanpham" value="Danh mục sản phẩm" id="danh-muc-san-pham" readonly>
            </div>
            <div class="noti-tat-dmuc">
                <div class="image-tin-dang-error">
                    <img src="../images/hd-tat-danh-muc-tin-dang.svg">
                </div>
                <p class="font-32-37 font-dam tieu-de-error">Ôi không, chẳng có gì ở đây cả</p>
                <p class="color-blk">Bạn không chọn nhầm chức năng đâu
                <p>
                <p class="color-blk">Nhưng để đăng được sản phẩm thì trước tiên bạn phải chọn danh mục đã</p>
            </div>
        </div>
        <? include('../modals/md_danh_muc_tin_dang.php') ?>
    </section>
    <? include('../includes/inc_new/inc_footer.php') ?>
</body>

<script type="text/javascript" src="/js/newJs/admin.main.js"></script>

</html>