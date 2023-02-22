<?
include("config.php");
if(isset($_COOKIE['UID']) && isset($_COOKIE['UT'])){
    $us_id = getValue('us_id', 'int', 'POST', 0);
    $diachi_moi = getValue('diachi_moi', 'str', 'POST', '');
    $diachi_moi = sql_injection_rp($diachi_moi);

    $inser_dchi = new db_query("INSERT INTO `dchi_nhan_hang`(`id`, `us_id`, `dia_chi`) VALUES ('','$us_id','$diachi_moi') ");
}else{
    echo "1";
}


?>