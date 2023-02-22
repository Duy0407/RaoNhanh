<? if ($acc_type == 1) { ?>
    <div class="row-tin-dang box_input_infor">
        <p class="font-dam hd_font15-17">Cần mua/Cần thuê <span class="color_red">*</span></p>
        <select class="slect-hang muathue hd_height36" name="mua_thue">
            <option disabled selected value="">Cần mua/Cần thuê</option>
            <option value="3">Cần mua</option>
            <option value="4">Cần thuê</option>
        </select>
    </div>
<? } elseif ($acc_type == 2) { ?>
    <div class="row-tin-dang box_input_infor">
        <p class="font-dam hd_font15-17">Cần bán/Cho thuê <span class="color_red">*</span></p>
        <select class="slect-hang banthue hd_height36" name="ban_thue">
            <option disabled selected value="">Cần bán/Cho thuê</option>
            <option value="1">Cần bán</option>
            <option value="2">Cho thuê</option>
        </select>
    </div>
<? } ?>