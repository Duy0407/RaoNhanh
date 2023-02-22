<?php
include("../functions/simple_html_dom.php");
$status=''; 
if(isset($_POST['fnapthe'])){
	/*require_once dirname(__FILE__) . '/nusoap/nusoap.php';
	$apiauth =array('HeaderUser'=>'airws','HeaderPassword'=>'airws@12031986');
	$wsdl = 'https://api.datacom.vn/AirlineWS.asmx?WSDL';
$header = new SoapHeader('http://tempuri.org/', 'Authentication', $apiauth);
$soap = new SoapClient($wsdl); 
$soap->__setSoapHeaders($header);       
$data = $soap->methodname($header); 
*/ 
$bk = 'https://api.datacom.vn/AirlineWS.asmx?wdsl';
$xmlRequest = "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
$xmlRequest.="<soap:Envelope xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\" xmlns:soap=\"http://schemas.xmlsoap.org/soap/envelope/\">";
$xmlRequest.= "<soap:Header>";
$xmlRequest.="<Authentication xmlns=\"http://tempuri.org/\">";
$xmlRequest.="<HeaderUser>airws</HeaderUser>";
$xmlRequest.="<HeaderPassword>airws@12031986</HeaderPassword>";
$xmlRequest.="</Authentication>";
$xmlRequest.="</soap:Header>";
$xmlRequest.="<soap:Body>";
$xmlRequest.="<SearchDomesticFlight xmlns=\"http://tempuri.org/\">";

$xmlRequest.="<User>demo@datacom.vn</User>";
$xmlRequest.="<Password>demo@1234</Password>";
$xmlRequest.="<AirlineCode></AirlineCode>";
//$xmlRequest.="<ItineraryType>1</ItineraryType>";
$xmlRequest.="<DepartureAirportCode>HAN</DepartureAirportCode>";
$xmlRequest.="<DestinationAirportCode>DAD</DestinationAirportCode>";
$xmlRequest.="<DepartureDate>04/11/2017</DepartureDate>";
$xmlRequest.="<ReturnDate>07/11/2017</ReturnDate>";
$xmlRequest.="<Adult>1</Adult>";
$xmlRequest.="<Children>0</Children>";
$xmlRequest.="<Infant>0</Infant>";
$xmlRequest.="</SearchDomesticFlight>";
$xmlRequest.="</soap:Body>";
$xmlRequest.="</soap:Envelope>";
$header = array(
    "Content-type: text/xml;charset=\"utf-8\"",
    
    "Content-length: ".strlen($xmlRequest)
  );
  $curl = curl_init($bk);
  curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 100);
  curl_setopt($curl, CURLOPT_TIMEOUT,        100);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true );
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
  curl_setopt($curl, CURLOPT_POST,           true );
  curl_setopt($curl, CURLOPT_POSTFIELDS,     $xmlRequest);
  curl_setopt($curl, CURLOPT_HTTPHEADER,     $header);
$data = curl_exec($curl);
//$link = json_decode($link,true);
print_r($data);die();

if($code==1){
	$sodutaikhoan = intval(str_replace(",","",$response->Admount) );
	
	$status='Nạp thẻ thành công mệnh giá:'.$response->Amount.' Số dư hiện tại: '.$response->Balance;
}else{
	$status='Lỗi nạp thẻ: '.$code.' Trạng thái: '.$response->Message;
}
		
		 
}else{
	$status='';
}
?>

<html>
    <head>
        <title>Form nạp thẻ doithe247</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Thanh toán trực tuyến" />
        <!-- css -->
        
       
    </head>
    <body>
        <div style="margin: 0 auto; width: 500px;">
            
            <h3 style="margin-bottom: 20px;"><span class="label label-success">Hệ thống nạp thẻ cào trực tuyến</span></h3>
            
            
            <form action="testapi.php" method="post" id="fnapthe" name="fnapthe">
            	<input  type="hidden" name="fnapthe" value="ok"/>
                <table class="table table-condensed table-bordered">
                    <tbody>                        
                        <tr>
                            <td>Loại thẻ</td>
                            <td>
                                <select name="card_type_id" style="width: 390px;border: 1px solid #ccc;height: 30px;">
                                    <option value="VTT">Viettel</option>
                                    <option value="VMS">Mobiphone</option>
                                    <option value="VNP">Vinaphone</option>
                                    <option value="FPT">Gate</option>
                                    <option value="VNM">Vietnammobile</option>
                                    <option value="MGC">Megacard</option>
                                    <option value="ONC">OnCash</option>
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

