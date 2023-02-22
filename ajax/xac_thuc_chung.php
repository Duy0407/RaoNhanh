<?
if ($xac_thuc == 1) {
    // echo ("đăng tin");
    $loai_khuyenmai = getValue('loai_khuyenmai', 'int', 'POST', 0);
    $giatri_khuyenmai = getValue('giatri_khuyenmai', 'str', 'POST', 0);
    $giatri_khuyenmai = str_replace(',', '', $giatri_khuyenmai);
    $van_chuyen = getValue('van_chuyen', 'int', 'POST', 0);
    $phi_van_chuyen = getValue('phi_van_chuyen', 'str', 'POST', 0);
    $phi_van_chuyen = str_replace(',', '', $phi_van_chuyen);

    $dvi_tien_xt = getValue('dvi_tien_xt', 'str', 'POST', 0);
    $dvi_tien_xt = rtrim(trim($dvi_tien_xt), ';');

    $nhom_phan_loai = getValue('nhomphanloaisp_xt', 'str', 'POST', '');
    $nhom_phan_loai = rtrim(trim($nhom_phan_loai), ';');
    $phan_loai = getValue('phanloaisp_xt', 'str', 'POST', '');
    $phan_loai = rtrim(trim($phan_loai), ';');
    $loai_xt = getValue('loaisp_xt', 'str', 'POST', '');
    $loai_xt = rtrim(trim($loai_xt), ';');
    
    $sl_kho_don = getValue('sl_kho_don', 'str', 'POST', '');
    $donvi_gia_vc = getValue('donvi_gia_vc', 'int', 'POST', '');

    $so_luong_kho = getValue('so_luong_kho', 'str', 'POST', '');
    $so_luong_kho = rtrim(trim($so_luong_kho), ';');

    if($so_luong_kho == ""){
        $so_luong_kho = $sl_kho_don;
    }

    $gia_sanpham_xt = getValue('giasp_xt', 'str', 'POST', '');
    $gia_sanpham_xt = str_replace(',', '', $gia_sanpham_xt);
    $gia_sanpham_xt = rtrim(trim($gia_sanpham_xt), ';');

    if($id_nd == ""){
    $query_ttbh = new db_query("INSERT INTO `thongtin_banhang` (`id_new`,`nhom_phan_loai`,`phan_loai`,`loai`,`so_luong_kho`,`loai_khuyenmai`,
                                            `giatri_khuyenmai`,`van_chuyen`,`phi_van_chuyen`,`gia_sanpham_xt`,`donvi_tien_xt`,`donvi_tien_vc`) 
                                            VALUES ('$id_dt','$nhom_phan_loai','$phan_loai','$loai_xt','$so_luong_kho','$loai_khuyenmai','$giatri_khuyenmai','$van_chuyen',
                                            '$phi_van_chuyen','$gia_sanpham_xt','$dvi_tien_xt','$donvi_gia_vc')");

    }else if($id_nd != "" && $id_nd != 0){
        $query_ttbh = new db_query("UPDATE `thongtin_banhang` SET `nhom_phan_loai` = '$nhom_phan_loai',
                                                                `phan_loai`= '$phan_loai',
                                                                `loai` = '$loai_xt',
                                                                `so_luong_kho` = '$so_luong_kho',
                                                                `loai_khuyenmai` = '$loai_khuyenmai',
                                                                `giatri_khuyenmai` = '$giatri_khuyenmai',
                                                                `van_chuyen` = '$van_chuyen',
                                                                `phi_van_chuyen` = '$phi_van_chuyen',
                                                                `gia_sanpham_xt` = '$gia_sanpham_xt',
                                                                `donvi_tien_xt` = '$dvi_tien_xt',
                                                                `donvi_tien_vc` = '$donvi_gia_vc' WHERE `id_new` = $id_nd ");

    }
}