<?php
include("config.php");
$bankId = getValue('bankId','str','POST','');
if($bankId != ''){
    $data_bank = bank($bankId);
    if($data_bank != null){
        $data = [
            'result'=>true,
            'data'=>$data_bank
        ];
    }else{
        $data = [
            'result'=>false,
            'data'=>''
        ];
    }
}else{
    $data = [
        'result'=>false,
        'data'=>''
    ];
}
echo json_encode($data,JSON_UNESCAPED_UNICODE);