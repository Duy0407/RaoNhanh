<?
include("config.php");
$nhom = getValue("nhom", "int", "GET", '');
$nhom = (int)$nhom;

$id_dm = getValue("id_dm", "int", "GET", '');
$id_dm = (int)$id_dm;

if ($nhom != 37) {
    $query= new db_query("SELECT * FROM loai_chung where id_cha=".$nhom." and id_danhmuc= ".$id_dm." ");
    $loai = $query->result_array();
?>
    <div class="row-tin-dang box_input_infor">
        <p class="font-dam hd_font15-17">Loại sản phẩm<span class="color_red">*</span></p>
        <select class="slect-hang  hd_height36 loai_sanpham" name="loai_sanpham">
            <option value="">Chọn loại sản phẩm</option>
            <?php foreach ($loai as $key => $value): ?>
                <option value="<?=$value['id']?>"><?=$value['ten_loai']?></option>    
            <?php endforeach ?>
        </select>
    </div>

<? } ?>



