<?
include("config.php");
session_start();
$code  = getValue("code","int","POST",0);
$code  = (int)$code;
$userid = getValue("user","int","POST",0);
if(!isset($_SESSION["code"]))
{
  $_SESSION['code'] = '';
}
if($code == 0 )
{
   echo 0;
}
else if($_SESSION['code'] == '')
{
   echo 0;
}
else if($code == $_SESSION["code"])
{
   $TxtCard = getValue("TxtCard","int","POST",0);
   $TxtCard = (int)$TxtCard;
   $TxtMaThe = mysql_escape_string($_POST['TxtMaThe']);
   $TxtSeri= mysql_escape_string($_POST['TxtSeri']);
   if($TxtCard != 0 && $TxtMaThe != '' && $TxtSeri != '')
   {
      switch ($TxtCard) {
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
     $username="raonhanh365";
     $password="raonhanh365@12354";
     $partnerId =179;
     $mpin="raonh365.vn.mpin";
     $TxtTransID = $username. rand() . rand();
     $Client = new VMS_Soap_Client('http://telco.paycard999.com:8080/webservice/TelcoAPI?wsdl', $username, $password, $partnerId, $mpin);
     //$target ten member nap card cua doi tac
      $target = $username.'_'. rand() . rand();
      //$email cua member cua doi tac
      $email = "loan@gmail.com";
      //phone 
      $phone = '01666779774';
      // serial:mathe:nhamangLog request transId: 201603160700_MB50_50 - telco: VMS - Amount: 50000 - quantity: 10- source: IOM- pass: AB5B0COY53AZ3AP
      $dataCard = $TxtSeri.':'.$TxtMaThe.'::'.$TxtType;
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
      if($userid != 0 && $amount > 0)
      {
         $db_ex10 = new db_execute("INSERT INTO history(his_user_id,his_seri,his_mathe,his_tranid,his_price,his_price_suc,his_time)
                                    VALUES('".$userid."','".$TxtSeri."','".$TxtMaThe."','".$TxtTransID."','".$amount."','".$amount."','".time()."')");
         $db_ex9 = new db_execute("UPDATE user SET usc_money = usc_money + ".$amount." WHERE usc_id = ".$userid."");
      }
      $status = "Bạn đã nạp thẻ thành công với mệnh giá thẻ: " . $amount ;
      } elseif ($status_paycard == 50){
      $status = 'Thẻ đã được sử dụng.';
      } elseif ($status_paycard == 11 || $status_paycard == -11) {
      $status = 'Nhà mạng bảo trì, vui lòng nhập lại sau.';
      } elseif ($status_paycard == 53 || $status_paycard == 4) {
      $status = 'Số serial hoặc mã thẻ không đúng';
      } else {
      $status = 'Có lỗi xảy ra trong quá trình nạp thẻ, vui lòng quay lại sau.'.$status_paycard;
      }
      echo $status;
   }
   else
   {
      echo 2;   
   }
}
else
{
   echo 0;
}
?>