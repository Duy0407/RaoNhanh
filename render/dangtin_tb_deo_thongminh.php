<?
include("config.php");
$nhom = getValue("nhom", "int", "GET", '');
$nhom = (int)$nhom;

$id_dm = getValue("id_dm", "int", "GET", '');
$id_dm = (int)$id_dm;

?>


<?php if (true):
	$query= new db_query("SELECT * FROM nhom_sanpham_chatlieu where id_cha=".$nhom." and id_danhmuc= ".$id_dm." ");
    $tb = $query->result_array();
?>
	<div class="row-tin-dang box_input_infor">
        <p class="font-dam hd_font15-17">Thiết bị <span style="color:#ff0000">*</span></p>
        <select name="thietbi1" class="slect-thietbi slect-thietbi-m-anh hd_height36">
            <option value="">Thiết bị</option>
            <?php foreach ($tb as $key => $value): ?>
            	<option value="<?=$value['id']?>"><?=$value['name']?></option>	
            <?php endforeach ?>
        </select>
    </div>
<?php endif ?>
