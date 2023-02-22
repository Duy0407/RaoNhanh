<?
include("config.php");
$nhom = getValue("nhom", "int", "POST", '');
$nhom = (int)$nhom;
$id_type = getValue("id_type", "int", "POST", '');
if ($nhom == 58) {
?>
    <? if ($id_type == 1 || $id_type == 3) { ?>
        <div class="m_input_chung d_flex fl_cl box_input_infor">
            <p class="font-dam hd_font15-17">Hạn sử dụng <span class="color_red">*</span></p>
            <input type="date" class="input_date input_infor_tag error" name="han_sd" id="date">
        </div>
    <? } ?>
    <div class=" m_input_chung d_flex fl_cl box_input_infor">
        <p class="font-dam hd_font15-17">Trọng lượng <span class="color_red">*</span></p>
        <input class="input_infor_tag error" type="text" name="trong_luong" placeholder="Trọng lượng ">
    </div>
    <div class=" m_input_chung d_flex fl_cl box_input_infor">
        <p class="font-dam hd_font15-17">Thể tích <span class="color_red">*</span></p>
        <input class="input_infor_tag error" type="text" name="thetich" placeholder="Thể tích ">
    </div>
<? } ?>