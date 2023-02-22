<?
if($_POST['gia_tri'] > 0){
    $gia_tri = str_replace(',', '', $_POST['gia_tri']);
    echo number_format($gia_tri);
}else{
    $gia_tri = '';
    echo $gia_tri;
}

?>