<?
include("config.php");
$response=['name'=>''];
$cate_con = getValue('cate_con', 'int', 'POST', '');

$thanhpho  = getValue("thanhpho","int","POST","");
$thanhpho  = (int)$thanhpho;

$quanhuyen  = getValue("quanhuyen","int","POST","");
$quanhuyen  = (int)$quanhuyen;

$loai_xe  = getValue("loai_xe","int","POST","");
$loai_xe  = (int)$loai_xe;

$loai_hang_hoa  = getValue("loai_hang_hoa","int","POST","");
$loai_hang_hoa  = (int)$loai_hang_hoa;



if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];
}else $acc_type = 0;

?>
    <?php if ($cate_con == 19): ?>
        
        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Khu vực nhận giao hàng</p>
            <select name="thanhpho" onchange="tinh_tp(this)" class="form-control share_select2 w_100">
                <option value="">Tỉnh/thành phố</option>
                 <? foreach ($arrcity as $row_cty) { ?>
                    <option <?if($thanhpho==$row_cty['cit_id']) echo "selected";?> value="<?= $row_cty['cit_id'] ?>"><?= $row_cty['cit_name'] ?></option>
                <? } ?>
            </select>
        </div>

        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Khu vực nhận giao hàng</p>
            <select name="quanhuyen" class="form-control share_select2 w_100 md_quan_huyen">
                <option value="">Quận/huyện</option>
                <?php if (isset($thanhpho)&&$thanhpho>0): ?>
                    <? if ($thanhpho != "") {
                        $ds_quanhuyen = new db_query("SELECT `cit_id`, `cit_name` FROM `city2` WHERE `cit_parent` = $thanhpho ");
                        while ($row_qh = mysql_fetch_assoc($ds_quanhuyen->result)) { ?>
                            <option <?if($quanhuyen==$row_qh['cit_id']) echo "selected";?>  value="<?= $row_qh['cit_id'] ?>"><?= $row_qh['cit_name'] ?></option>

                    <? }}?>
                <?php endif ?>
            </select>
        </div>

        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại xe</p>
            <select name="loai_xe" onchange="tinh_tp(this)" class="form-control share_select2 w_100">
                <option value="">Loại xe</option>
                <?
                $sql_lx = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = 52");
                $result_lx = $sql_lx->result_array();
                ?>
                <? foreach ($result_lx as $lx) : ?>
                    <option <?if($loai_xe==$lx['id']) echo "selected";?> value="<?= $lx['id'] ?>"><?= $lx['ten_loai'] ?></option>
                <? endforeach ?>
            </select>
        </div>

        <div class="thuoc_tinh w_100 mb_20">
            <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Loại hàng hoá giao</p>
            <select name="loai_hang_hoa" onchange="tinh_tp(this)" class="form-control share_select2 w_100">
                <option value="">Loại hàng hoá giao</option>
                <?
                $query_lhh = new db_query("SELECT `id`, `ten_loai`, `id_cha` FROM `loai_chung` WHERE id_cha= 0 AND id_danhmuc = 19");
                $result_lhh = $query_lhh->result_array();
                ?>
                <? foreach ($result_lhh as $lhh) : ?>
                    <option <?if($loai_hang_hoa==$lhh['id']) echo "selected";?> value="<?= $lhh['id'] ?>"><?= $lhh['ten_loai'] ?></option>
                <? endforeach ?>
            </select>
        </div>

    <?php endif ?>
        

        
