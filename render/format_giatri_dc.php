<?
require_once('../functions/functions.php');
$gia_tri = getValue('gia_tri', 'str', 'POST', '');

    $gia_tri = str_replace(';',',', $gia_tri);
    echo $gia_tri;
?>