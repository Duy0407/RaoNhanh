<?
include('config.php');
$ngay_ss = '1970-01-01';
$tgian = getValue('tgian', 'int', 'POST', 0);
if($tgian > time()){
    $so_ngay = date_diff(date_create(date('Y-m-d H:i:s', time())), date_create((date('Y-m-d H:i:s', $tgian))));
    $ngay = $so_ngay->format("%a");
    $gio = $so_ngay->format("%H");
    $phut = $so_ngay->format("%I");
    $giay = $so_ngay->format("%S");
    $data= [
        'ngay' => $ngay,
        'gio' => $gio,
        'phut' => $phut,
        'giay' => $giay,
    ];
}else{
    $data = [
        'ngay' => 0,
        'gio' => 00,
        'phut' => 00,
        'giay' => 00,
    ];
}
echo json_encode($data, true);



?>