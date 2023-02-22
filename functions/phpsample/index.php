<?php
require_once dirname(__FILE__) . '/nusoap/nusoap.php';
$status='';
if(isset($_POST['fnapthe'])){
	$TxtCard = intval($_POST['card_type_id']);
$TxtMaThe = mysql_escape_string($_POST['pin']);
 $TxtSeri= mysql_escape_string($_POST['seri']);
 //echo $TxtCard;
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
        }     
        require_once('VDCO_SOAPClient.class.php');
		$username="test01";
		$password="test@12354";
		$partnerId =20;
		$mpin="test0.vn.mpin";
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
		}else*/if ($status_paycard == 1) {
            $check = true; //chinh lai cai font vs no bi loi mat roi phai sua tay
            $amount = intval($return['DRemainAmount']);
            
            $status = "B&#7841;n &#273;&#227; n&#7841;p th&#7867; th&#224;nh c&#244;ng v&#7899;i m&#7879;nh gi&#225; th&#7867;: " . $amount ;
            
        } elseif ($status_paycard == 50){
            $status = 'Th&#7867; &#273;&#227; &#273;&#432;&#7907;c s&#7917; d&#7909;ng.';
	} elseif ($status_paycard == 11 || $status_paycard == -11) {
            $status = 'Nh&#224; m&#7841;ng b&#7843;o tr&#236;, vui l&#242;ng nh&#7853;p l&#7841;i sau.';
        } elseif ($status_paycard == 53 || $status_paycard == 4) {
            $status = 'S&#7889; serial ho&#7863;c m&#227; th&#7867; kh&#244;ng &#273;&#250;ng';
        } else {
        	
            $status = 'C&#243; l&#7895;i x&#7843;y ra trong qu&#225; tr&#236;nh n&#7841;p th&#7867;, vui l&#242;ng quay l&#7841;i sau.'.$status_paycard;
        }
        //echo $status;
		//echo $status_paycard;
		//$amount = intval($result['return']['DRemainAmount']);
		 //echo $amount
}else{
	$status='';
}
?>

<html>
    <head>
        <title>Form nạp thẻ PayCard365</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Thanh toán trực tuyến" />
        <!-- css -->
        <link rel="stylesheet" href="css/bootstrap.css" /> 
        <link rel="stylesheet" href="css/bootstrap-responsive.css" /> 
        <link rel="stylesheet" href="css/bootstrap-theme.css" /> 
        
        <!-- Script -->
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/jquery.form.js"></script> 
        <script src="js/bootstrap.min.js"></script>    
       
    </head>
    <body>
        <div style="margin: 0 auto; width: 500px;">
            <fieldset>
            	<legend>Thông tin tài khoản kết nối API và tra cứu sản lượng</legend>
            	<div>
            	<p><b>Tên tài khoản:</b> test01</p>
            	<p><b>Mật khẩu:</b> test@12354</p>
            	<p><b>PartnerId:</b> 20</p>
            	<p><b>Mpin:</b> test0.vn.mpin</p>
            	<p><b>Link tra sản lượng:</b> <a href="http://sanluong.paycard999.com" target="_blank">sanluong.paycard999.com</a></p>
            	<p><b>User đăng nhập tra sản lượng:</b> test01</p>
            	<p><b>Mật khẩu tra sản lượng:</b> test01@132</p>
            </div>
            </fieldset>
            <h3 style="margin-bottom: 20px;"><span class="label label-success">Hệ thống nạp thẻ cào trực tuyến Paycard365</span></h3>
            
            
            <form action="index.php" method="post" id="fnapthe" name="fnapthe">
            	<input  type="hidden" name="fnapthe" value="ok"/>
                <table class="table table-condensed table-bordered">
                    <tbody>                        
                        <tr>
                            <td>Loại thẻ</td>
                            <td>
                                <select name="card_type_id" style="width: 390px;border: 1px solid #ccc;height: 30px;">
                                    <option value="1">Viettel</option>
                                    <option value="2">Mobiphone</option>
                                    <option value="3">Vinaphone</option>
                                    <option value="4">Gate</option>
                                    <option value="6">Vietnammobile</option>
                                    <option value="7">Megacard</option>
                                    <option value="8">OnCash</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Mã thẻ</td>
                            <td><input type="text" value="" name="pin" style="width: 390px;border: 1px solid #ccc;height: 30px;"/></td>
                        </tr>
                        <tr>
                            <td>Seri</td>
                            <td><input type="text" value="" name="seri" style="width: 390px;border: 1px solid #ccc;height: 30px;"/></td>
                        </tr>
						
                    </tbody>
                </table>
				<center>
				<input class="btn btn-info" type="submit" value="Nạp thẻ"/> 
<div id="loading_napthe" style="display: none; float: center"> &nbsp;Xin mời chờ...</div><br>
<div class="label label-success" id="msg_success_napthe"></div><br>
<div class="label label-danger" id="msg_err_napthe"><?php echo $status;?></div><br>
				</center>
            </form>
        </div>
    </body>
</html>

