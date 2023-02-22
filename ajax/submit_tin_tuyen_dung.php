<?
include("../home/config_vl.php");
if(isset($_COOKIE['UID']))
{
 $userid   = $_COOKIE['UID'];
 $userpass = $_COOKIE['PHPSESPASS'];
 $usertype = $_COOKIE['UT'];
 if (isset($_POST["tieude"])){
    $title = $_POST["tieude"];
    $city = $_POST["thanhpho"];
    $district = $_POST["quanhuyen"];
    $address = $_POST["diachi"];
    $phone = $_POST["phone"];
    $jobkind = $_POST["htlv"];
    $jobtype = implode(',',$_POST["lhlv"]);
    $level = $_POST["trinhdo"];
    $exp = $_POST["kinhnghiem"];
    $skill = $_POST["chungchi"];
    $jobdetail = $_POST["ctcv"];
    $enddate = $_POST["hantuyen"];
    $quantity = $_POST["soluong"];
    $moneymin = $_POST["luongmin"];
    $moneymax = $_POST["luongmax"];
    $paytype = $_POST["thang"];
    $desc = $_POST["mota"];
    if (!empty($_FILES['image'])) {
        //Tạo đường dẫn 
            $upload_dir = "../thumb/" . date('Y/m/d', time());
            // check đuôi file 
            $img_ext = strtolower(end(explode('.', $_FILES['image']['name'])));
            $expensions = array("jpeg", "jpg", "png", "gif", "svg");
            //Check size ảnh 
            if (in_array($img_ext, $expensions) == true && $_FILES['image']['size'] <= 2100000) {

                $image =   '/job-' . time() . '.' . $img_ext; // Tạo tên ảnh 
                $image_u =  date('Y/m/d', time()) . '/job-' . time() . '.' . $img_ext; // tạo đường dẫn đẩy vào base 
                if (!is_dir($upload_dir)) { // check xem đường dẫn đẩy ảnh vào tồn tại hay chưa 
                    if (!is_dir("../thumb/" . date('Y/m/d', time()))) mkdir("../thumb/" . date('Y/m/d', time()), 0777, TRUE); // Chưa tồn tại thì tạo đường dẫn đó 
                }
                move_uploaded_file($_FILES['image']['tmp_name'], $upload_dir . $image); //đẩy ảnh vào folder đã tạo 
            }
        } else {
            $image = NULL;
        }
        if ($title != '') {
            $db_qr = new db_query ("INSERT INTO vieclam (new_title,new_city,new_district,new_phone,new_address,new_job_type,new_job_kind,new_level,new_exp,new_skill,new_job_detail,new_end_date,new_money_min,new_money_max,new_picture,new_desc,new_pay_type,new_quantity,new_type,new_user_id,save_time_vl)
            VALUES ('".$title."','".$city."','".$district."','".$phone."','".$address."','".$jobtype."','".$jobkind."','".$level."','".$exp."','".$skill."','".$jobdetail."','".strtotime($enddate)."','".$moneymin."','".$moneymax."','".$upload_dir.$image."','".$desc."','".$paytype."','".$quantity."','1','".$userid."','".time()."')");
        }
        else{
            redirect('/viec-lam.html');
        }
// $db_qr =  ("INSERT INTO vieclam(new_title,new_city,new_district,new_phone,new_address,new_job_type,new_job_kind,new_job_detail,new_end_date,new_money_min,new_money_max,new_picture,new_desc,new_pay_type,new_quantity,new_type,new_user_id)
// VALUES ('".$title."','".$city."','".$district."','".$phone."','".$address."','.$jobtype.','".implode(",",$jobkind)."','".$jobdetail."','".strtotime($enddate)."','".$moneymin."','".$moneymax."','".$image."','".$desc."','".$paytype."','".$quantity."','1','".$userid."')"); 
// echo $db_qr;
}

}
?>