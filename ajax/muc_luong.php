<?
include("config.php");
$type = getValue('type', 'int', 'POST', '');
?>
<?if($type == 1){?>
    <input class="input_infor_tag error" type="text" name="" disabled placeholder="Thỏa thuận">
<?}elseif($type == 2){?>
    <input class="input_infor_tag error" type="text" name="" placeholder="Nhập số tiền">
<?}?>