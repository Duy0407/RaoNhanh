<? include("config.php");
$usc_id        = getValue("id","int","POST",0);
$usc_id        = (int)$usc_id;
$new_id        = getValue("new_id","int","POST",0);
$new_id        = (int)$new_id;
$refreshHome        = getValue("refreshHome","int","POST",0);
$refreshHome        = (int)$refreshHome;

$refreshCate        = getValue("refreshCate","int","POST",0);
$refreshCate        = (int)$refreshCate;

$refreshCity        = getValue("refreshCity","int","POST",0);
$refreshCity        = (int)$refreshCity;

$refreshCateCity        = getValue("refreshCateCity","int","POST",0);
$refreshCateCity        = (int)$refreshCateCity;

$refreshFree        = getValue("refreshFree","int","POST",0);
$refreshFree        = (int)$refreshFree;
$price = 0;
$sql = '';
$time = time() + 604800;
if($refreshHome == 1){
    $price += 1500;
    $sql .= ",refresh_new_home = 1 ";
}
if($refreshCate == 1){
    $price += 1000;
    $sql .= ",refresh_new_cate = 1 ";
}
if($refreshCity == 1){
    $price += 500;
    $sql .= ",refresh_new_city = 1 ";
}
if($refreshCateCity == 1){
    $price += 300;
    $sql .= ",refresh_new_cate_city = 1 ";
}
$sql = trim($sql, ',');

if($refreshFree == 1 && $usc_id !=0 && $new_id != 0){
    $sl = new db_query("SELECT new_update_time FROM new WHERE new_user_id = '".$usc_id."' AND new_count_refresh = 1");
    if(mysql_num_rows($sl->result) == 0){
        $db_new = new db_execute("UPDATE new SET new_update_time = ".time().",new_count_refresh = 1  WHERE new_id = ".$new_id."");
        $data = [
            'result'=>true,
            'type'=>4,
            'message'=>'Thành công'
        ];
    }else{
        $row_sl = mysql_fetch_assoc($sl->result);
        $time_back = strtotime("+4 hours",strtotime(date("H:i",$row_sl['new_update_time'])));
        $time = strtotime(date('H:i',time()));
        if($time < $time_back)
        {
            $data = [
            'result'=>false,
            'type'=>5,
            'message'=>'Đã có sản phẩm được làm mới, lần làm mới tiếp theo của bạn vào lúc '.date('H:i',$time_back)
        ];
        }

    }
}else if($price != 0 && $usc_id !=0 && $new_id != 0){
    $db_usc    = new db_query("SELECT usc_money FROM user WHERE usc_id = ".$usc_id);
    $row_usc    = mysql_fetch_assoc($db_usc->result);

    if($row_usc['usc_money'] >= $price){
        $db_ex9 = new db_execute("UPDATE new SET $sql  WHERE new_id = ".$new_id."");
        $db_ex10 = new db_execute("UPDATE user SET usc_money = usc_money - ".$price." WHERE usc_id = ".$usc_id."");
        $data = [
            'result'=>true,
            'type'=>1,
            'price'=>$price,
            'message'=>'Thành công'
        ];
    } else {
        $data = [
            'result'=>false,
            'type'=>2,
            'message'=>'Bạn không đủ tiền để kích hoạt, vui lòng nạp thêm tiền'
        ];
    }
}else{
    $data = [
        'result'=>false,
        'type'=>3,
        'message'=>'Có lỗi xảy ra'
    ];

}
echo json_encode($data, JSON_UNESCAPED_UNICODE);



?>
