<?
include("config.php");
$id_hang = getValue('id_hang', 'int', 'POST', '');
?>
<?if($id_hang == 1363){?>

<?}else{?>
<option disabled selected value="">Dòng xe</option>
<?
    $query_dx = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = $id_hang");
    $result = $query_dx->result_array();
?>
<? foreach ($result as $dx) : ?>
    <option value="<?= $dx['id'] ?>"><?= $dx['ten_loai'] ?></option>
<? endforeach ?>
<?}?>