<?
include("config.php");

$user_id = $_COOKIE['UID'];
$user_type = $_COOKIE['UT'];

$nha_mang = getValue('nha_mang', 'int', 'POST', 0);
$ma_the = mysql_escape_string($_POST['ma_the']);
$so_seri = mysql_escape_string($_POST['so_seri']);
$ngay_nap = strtotime(date('Y-m-d H:i:s', time()));
if ($nha_mang != 0 && $ma_the != "" && $so_seri != "" && $user_id != "" && $user_type != "") {
    switch ($nha_mang) {
        case 1:
            $TxtType = 'VTT';
            break;
        case 2:
            $TxtType = 'VMS';
            break;
        case 3:
            $TxtType = 'VNP';
            break;
        case 4:
            $TxtType = 'FPT';
            break;
        case 5:
            $TxtType = 'VTC';
            break;
        case 6:
            $TxtType = 'VNM';
            break;
        case 7:
            $TxtType = 'MGC';
            break;
        case 8:
            $TxtType = 'ONC';
            break;
    }
    require_once('../classes/VDCO_SOAPClient.class.php');

    $username = "raonhanh365";
    $password = "raonhanh365@12354";
    $partnerId = 179;
    $mpin = "raonh365.vn.mpin";
    $TxtTransID = $username . rand() . rand();
    $Client = new VMS_Soap_Client('http://telco.paycard999.com:8080/webservice/TelcoAPI?wsdl', $username, $password, $partnerId, $mpin);
    //$target ten member nap card cua doi tac
    $target = $username . '_' . rand() . rand();

    //$email cua member cua doi tac
    $email = "loan@gmail.com";
    //phone
    $phone = '01666779774';
    // serial:mathe:nhamangLog request transId: 201603160700_MB50_50 - telco: VMS - Amount: 50000 - quantity: 10- source: IOM- pass: AB5B0COY53AZ3AP
    $dataCard = $so_seri . ':' . $ma_the . '::' . $TxtType;
    $return = $Client->doCardCharge($target, $dataCard, $email, $phone);

    $status_paycard = intval($return['status']);

    /*if($status_paycard ==2){
			$Client = new VMS_Soap_Client('http://telco.paycard999.com:8080/webservice/TelcoAPI?wsdl', $username, $password, $partnerId, $mpin);
			$return = $Client->doCardCharge($target, $dataCard, $email, $phone);

		$status_paycard = intval($return['status']);
		var_dump($status_paycard);
		}else*/
    if ($status_paycard == 1) {
        $check = true; //chinh lai cai font vs no bi loi mat roi phai sua tay
        $amount = intval($return['DRemainAmount']);
        if ($user_id != 0 && $amount > 0) {
            $db_ex10 = new db_execute("INSERT INTO `history`(`his_id`, `his_user_id`, `his_seri`, `his_mathe`, `his_tranid`, `his_price`, `his_price_suc`,
                                    `his_time`, `his_type`) VALUES('" . $user_id . "','" . $so_seri . "','" . $ma_the . "','" . $TxtTransID . "',
                                    '" . $amount . "','" . $amount . "','" . $ngay_nap . "','" . $user_type . "')");

            $db_ex9 = new db_execute("UPDATE `user` SET `usc_money` = usc_money + " . $amount . " WHERE `usc_id` = " . $user_id . "");
        }
        $status = "Bạn đã nạp thẻ thành công với mệnh giá thẻ: " . $amount;
    } elseif ($status_paycard == 50) {
        $status = 'Thẻ đã được sử dụng.';
    } elseif ($status_paycard == 11 || $status_paycard == -11) {
        $status = 'Nhà mạng bảo trì, vui lòng nhập lại sau.';
    } elseif ($status_paycard == 53 || $status_paycard == 4) {
        $status = 'Số serial hoặc mã thẻ không đúng';
    } else {
        $status = 'Có lỗi xảy ra trong quá trình nạp thẻ, vui lòng quay lại sau.' . $status_paycard;
    }
    echo $status;
}
