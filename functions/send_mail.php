<?
function CreateSendMail($toFrom,$toAddress,$ccAddress,$bccAddress,$subject,$body,$type) {
   SendmailHunghapay($subject,$toFrom,$toFrom,$body);
}

function SendMailHungHaPay($title,$name,$email,$body){

    require_once("../classes/class.phpmailer.php");
    require_once("../classes/class.smtp.php");


    $usernameSmtp = 'AKIA3OHCRZYHEJ3UJWEY';
    $passwordSmtp = 'BMMOCaT5i+UxBhvI09qRUzrr4Zh1gXHqecL+k1j8axrj';
    $host = 'email-smtp.ap-southeast-1.amazonaws.com';
    $port = 587;
    $sender = 'admin@raonhanh365.vn';

    $senderName = 'Raonhanh365';

    $mail             = new PHPMailer(true);

    $mail->IsSMTP();
    $mail->SetFrom($sender, $senderName);
    $mail->Username   = $usernameSmtp;  // khai bao dia chi email
    $mail->Password   = $passwordSmtp;              // khai bao mat khau
    $mail->Host       = $host;    // sever gui mail.
    $mail->Port       = $port;         // cong gui mail de nguyen
    $mail->SMTPAuth   = true;    // enable SMTP authentication
    $mail->SMTPSecure = "tls";   // sets the prefix to the servier
    $mail->CharSet  = "utf-8";
    $mail->SMTPDebug  = 0;   // enables SMTP debug information (for testing)
    // xong phan cau hinh bat dau phan gui mail
    $mail->isHTML(true);
    $mail->Subject    = $title;// tieu de email
    $mail->Body       = base64_decode($body);
    $mail->addAddress($email,$name);

    if(!$mail->Send()){
        echo $mail->ErrorInfo;
    }
}



function SendBidResult($title,$name,$email,$result,$bid_result){
   $body = file_get_contents("http://dev5.tinnhanh365.vn/home/gui_mai.php");

   $donvitien = [
      '1' => 'VNĐ',
      '2' => 'USD',
      '3' => 'EURO',
   ];
   $body = str_replace("%bidder_name%",$result['user_name'],$body);
   $body = str_replace("%new_title%",$result['new_title'],$body);
   $body = str_replace("%bid_time%",date('d/m/Y',$result['create_time']),$body);
   $body = str_replace("%bid_status%",($bid_result==1)?"trúng":"trượt",$body);
   $body = str_replace("%product_name%",$result['product_name'],$body);
   $body = str_replace("%user_name%",$result['usc_name'],$body);
   $body = str_replace("%dia_chi%",$result['dia_chi'],$body);
   $body = str_replace("%price%",number_format($result['price']).' '.$donvitien[$result['price_unit']],$body);
   if ($result['phi_duthau'] > 0){
      $body = str_replace("%bid_fee%",number_format($result['phi_duthau']).' '.$donvitien[$result['donvi_thau']],$body);
   }else{
      $body = str_replace("%bid_fee%","Không có",$body);
   }
   $body = str_replace("%new_address%",$result['new_address'],$body);

   $body = base64_encode($body);
   SendMailHungHaPay($title,$name,$email,$body);
}

function SendBuyCard($mailto,$fullname,$mailBody)
{
   $body = '<!DOCTYPE html>
   <html xmlns="http://www.w3.org/1999/xhtml">
   <head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <title>[doithe66.com] - Email thông tin mua mã thẻ</title>
   </head><body><div style="width: 800px; margin: 0 auto;font-size:14px; background-color: #fff; border: 1px solid #cccccc;">
   <div style="padding:7px 15px;"><div style="padding: 5px 0px 7px 0px; border-bottom: 5px solid #d3e2ff;margin-bottom:25px;">
   DOITHE66.COM</div><b>Dịch mua mã thẻ trên Doithe66.com</b><br><br>
   <p>Xin chào <b>'.$fullname.'</b>,</p><br>Bạn vừa sử dụng dịch vụ mua mã thẻ trên doithe66.com, sau đây là thông tin mã thẻ của bạn:
   <p><span>Thông tin giao dịch: </span></p><div><p>'.$mailBody.'</p></div>
   </div><div style="padding:7px 15px;"><p><b>Cảm ơn bạn đã sử dụng dịch vụ của Chúng tôi</b></p>
   <p style="line-height:25px;">Để biết thêm chi tiết về dịch vụ hoặc đóng góp ý kiến cho Chúng tôi, Quý khách vui lòng liên hệ qua số điện thoại: 0981.744.861 - 02466.557.198 hoặc Email: support@doithe66.com</p>
   <p>Trân trọng,</p><p><b>doithe66.com</b></p></div></div></body></html>';
   $message = "";

   $body = base64_encode($body);
   CreateSendMail($mailto,$mailto,"","","[doithe66.com] - Mua mã thẻ", $body,1);
}
function SendRegisterUV($email,$lastname,$link)
{
   $body = '<body style="width: 100%;text-align: center;background-color: #eeeeee;padding: 0;margin: 0;font-family: Arial,sans-serif;padding-top: 20px;padding-bottom: 20px;">
   <table style="width: 600px;background: #fff;margin: 0 auto;border-collapse: collapse;">
      <tr style="background: #f1f6f9;border-bottom: 5px solid #daa52e;height: 81px;">
         <td style="width: 218px;padding-left: 33px;text-align: left;">
            <span title="Tìm việc làm nhanh, việc làm thêm" style="text-decoration: none;">
               <img src="https://raonhanh365.vn/images/logo.png" alt="Chợ mua bán, quảng cáo, rao vặt miễn phí" title="Chợ mua bán, quảng cáo, rao vặt miễn phí" />
            </span>
            <span style="text-decoration:none;color:#f26222;font-size:14px;float:right;padding-top:25px;padding-right:34px;" title="Chợ mua bán, quảng cáo, rao vặt miễn phí">Raonhanh365</span>
         </td>
      </tr>
      <tbody >
         <tr>
            <td style="width: 100%;padding: 0 33px;">
               <h1 style="color: #3a4c56;font-size: 16px;padding-top: 10px;text-align: left;margin: 15px 0 10px 0;">Xin chào <span style="color:#269b91;">'.$lastname.'!</span></h1>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Chúc mừng bạn đã hoàn thành thông tin đăng ký tài khoản tại <span style="color: #269b91;font-size: 14px;font-weight: 600;" title="Rao nhanh 365" >Raonhanh365</span></p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Dưới đây là thông tin tài khoản đã tạo:</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">- Tài khoản: <span style="color: #3a4c56;">'.$email.'</span></p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">- Mật khẩu: *************</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Vui lòng xác thực tài khoản để tạo gian hàng của riêng mình với những hàng hóa thật phong phú bằng cách bấm vào link dưới đây:</p>
               <p style="height:50px;text-align: center;background: #269b91;color: #fff;line-height: 52px;font-size: 14px;font-weight: 500;margin: 30px auto; width:170px"><a style="color:#fff;font-size: 14px;font-weight: 600" target="_blank" href="'.$link.'">XÁC THỰC EMAIL</a></p>
            </td>
         </tr>
         <tr>
            <td style="background: #f7f7f7;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56;margin-left: 30px;margin-right: 30px;border: 1px solid #b1d8d5;">
               <p style="font-weight: bold;margin-bottom: 10px;text-align: center;">Raonhanh365 chúc bạn thành công!</p>

            </td>
         </tr>
         <tr>
            <td style="margin-top: 10px;;margin-bottom: 10px;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56;text-align: center;">
               <p style="font-weight: bold;margin-bottom: 10px;"><span style="color:#269b91;">Raonhanh365 </span>- Cầu nối giữa khách hàng và nhà buôn</p>
               <p style="margin-top: 0;margin-bottom: 10px;"><span style="color:#269b91;">Tầng 4, B50 ,Lô 6 , KĐT Định Công - Hoàng Mai - Hà Nội</span></p>
            </td>
         </tr>
      </tbody>
   </table>
</body>';
   $message = "";

   $body = base64_encode($body);


   CreateSendMail($email,$email,"","","Đăng ký tài khoản Raonhanh365", $body,10);
}
function SendRegisterByBuy($email,$lastname,$link)
{
    $body = '<body style="width: 100%;text-align: center;background-color: #eeeeee;padding: 0;margin: 0;font-family: Arial,sans-serif;padding-top: 20px;padding-bottom: 20px;">
   <table style="width: 600px;background: #fff;margin: 0 auto;border-collapse: collapse;">
      <tr style="background: #f1f6f9;border-bottom: 5px solid #daa52e;height: 81px;">
         <td style="width: 218px;padding-left: 33px;text-align: left;">
            <span title="Tìm việc làm nhanh, việc làm thêm" style="text-decoration: none;">
               <img src="https://raonhanh365.vn/images/logo.png" alt="Chợ mua bán, quảng cáo, rao vặt miễn phí" title="Chợ mua bán, quảng cáo, rao vặt miễn phí" />
            </span>
            <span style="text-decoration:none;color:#f26222;font-size:14px;float:right;padding-top:25px;padding-right:34px;" title="Chợ mua bán, quảng cáo, rao vặt miễn phí">Raonhanh365</span>
         </td>
      </tr>
      <tbody >
         <tr>
            <td style="width: 100%;padding: 0 33px;">
               <h1 style="color: #3a4c56;font-size: 16px;padding-top: 10px;text-align: left;margin: 15px 0 10px 0;">Xin chào <span style="color:#269b91;">'.$lastname.'!</span></h1>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Chúc mừng bạn đã hoàn thành thông tin đăng ký tài khoản người mua hàng tại <span style="color: #269b91;font-size: 14px;font-weight: 600;" title="Rao nhanh 365" >Raonhanh365</span></p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Dưới đây là thông tin tài khoản đã tạo:</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">- Tài khoản: <span style="color: #3a4c56;">'.$email.'</span></p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">- Mật khẩu: *************</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Vui lòng xác thực tài khoản để khám phá những sản phẩm hàng hóa thật phong phú bằng cách bấm vào link dưới đây:</p>
               <p style="height:50px;text-align: center;background: #269b91;color: #fff;line-height: 52px;font-size: 14px;font-weight: 500;margin: 30px auto; width:170px"><a style="color:#fff;font-size: 14px;font-weight: 600" target="_blank" href="'.$link.'">XÁC THỰC EMAIL</a></p>
            </td>
         </tr>
         <tr>
            <td style="background: #f7f7f7;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56;margin-left: 30px;margin-right: 30px;border: 1px solid #b1d8d5;">
               <p style="font-weight: bold;margin-bottom: 10px;text-align: center;">Raonhanh365 chúc bạn thành công!</p>

            </td>
         </tr>
         <tr>
            <td style="margin-top: 10px;;margin-bottom: 10px;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56;text-align: center;">
               <p style="font-weight: bold;margin-bottom: 10px;"><span style="color:#269b91;">Raonhanh365 </span>- Cầu nối giữa khách hàng và nhà buôn</p>
               <p style="margin-top: 0;margin-bottom: 10px;"><span style="color:#269b91;">Tầng 4, B50 ,Lô 6 , KĐT Định Công - Hoàng Mai - Hà Nội</span></p>
            </td>
         </tr>
      </tbody>
   </table>
</body>';
    $message = "";

    $body = base64_encode($body);


    CreateSendMail($email,$email,"","","Đăng ký tài khoản Raonhanh365", $body,10);
}
function SendRegisterTVC($email,$company_name,$link)
{
   $body = '<body style="width: 100%;text-align: center;background-color: #eeeeee;padding: 0;margin: 0;font-family: Arial,sans-serif;padding-top: 20px;padding-bottom: 20px;">
      <table style="width: 600px;background: #fff;margin: 0 auto;border-collapse: collapse;">
         <tr style="background: #fff;border-bottom: 5px solid #18744d;height: 81px;">
            <td style="width: 218px;padding-left: 33px;text-align: left;">
            <a href="https://timviec365.com" title="Tìm việc làm nhanh nhất, việc làm thêm" style="text-decoration: none;">
               <img src="https://timviec365.com/images/logo.png" alt="Tìm việc làm nhanh nhất, việc làm thêm" title="Tìm việc làm nhanh, việc làm thêm" />
            </a>
            <p style="text-decoration: none;color:#f47c48;font-size:14px;float:right;padding-top:36px;padding-right:45px;" title="Tìm việc làm nhanh, việc làm thêm">Timviec365.com</p>
            </td>
         </tr>
         <tbody>
         <tr>
            <td style="width: 100%;padding: 0 33px;">
               <h1 style="color: #3a4c56;font-size: 16px;padding-top: 10px;text-align: left;margin: 15px 0 10px 0;">Xin chào <span style="color:#f47c48;">'.$company_name.'!</span></h1>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Chúc mừng bạn đã hoàn thành thông tin đăng ký tài khoản tại <span style="color: #18744d;font-size: 14px;font-weight: 600;">Timviec365.com</span></p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Dưới đây là thông tin tài khoản đã tạo:</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">- Tài khoản: '.$email.'</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">- Mật khẩu: *************</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Vui lòng xác thực tài khoản để tìm việc làm phù hợp nhất bằng cách chọn link dưới đây:</p>
               <p style="height:50px;padding:0;margin: 0;background: #18744d;color: #fff;line-height: 52px;font-size: 14px;font-weight: 500;margin: 30px auto; width:170px"><a style="color:#fff;font-size: 14px;font-weight: 600" target="_blank" href="'.$link.'">XÁC THỰC EMAIL</a></p>
            </td>
         </tr>
         <tr>
            <td style="background: #f7f7f7;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56;margin-left: 30px;margin-right: 30px;border: 1px solid #b1d8d5;">
               <p style="font-weight: bold;margin-bottom: 10px;">Timviec365 chúc quý khách tìm được việc làm phù hợp</p>
               <p style="font-weight: bold;margin-bottom: 10px;">Nếu gặp khó khăn, bạn vui lòng liên hệ qua email: <span style="color:#f05e5e;">timviec365com@gmail.com</span></p>
            </td>
         </tr>
         <tr>
            <td style="margin-top: 10px;margin-bottom: 10px;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56">
               <p style="font-weight: bold;margin-bottom: 10px;"><span style="color:#18744d;">Timviec365 </span>- Cầu nối giữa ứng viên và nhà tuyển dụng</p>
            </td>
         </tr>
         </tbody>
      </table>
      </body>';
   $message = "";

   $body = base64_encode($body);


   CreateSendMail($email,$email,"","","Đăng ký tài khoản ứng viên tại timviec365 -".time(), $body,11);
}

function SendRegisterNTD($email,$company_name,$link)
{
   $body = '<body style="width: 100%;text-align: center;background-color: #eeeeee;padding: 0;margin: 0;font-family: Arial,sans-serif;padding-top: 20px;padding-bottom: 20px;">
      <table style="width: 600px;background: #fff;margin: 0 auto;border-collapse: collapse;">
         <tr style="background: #3a4c56;border-bottom: 5px solid #2befca;height: 81px;">
            <td style="width: 218px;padding-left: 33px;text-align: left;">
            <a href="https://timviec365.vn" title="Tìm việc làm nhanh, việc làm thêm" style="text-decoration: none;">
               <img src="https://timviec365.vn/images/logo_email.png" alt="Tìm việc làm nhanh, việc làm thêm" title="Tìm việc làm nhanh, việc làm thêm" />
            </a>
            <a style="text-decoration: none;color:#dfdfdf;color:#dfdfdf;font-size:14px;float:right;padding-top:25px;padding-right:34px;" href="https://timviec365.vn" title="Tìm việc làm nhanh, việc làm thêm">Timviec365.vn</a>
            </td>
         </tr>
         <tbody >
         <tr>
            <td style="width: 100%;padding: 0 33px;">
               <h1 style="color: #3a4c56;font-size: 16px;padding-top: 10px;text-align: left;margin: 15px 0 10px 0;">Xin chào <span style="color:#269b91;">'.$company_name.'!</span></h1>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Chúc mừng bạn đã hoàn thành thông tin đăng ký tài khoản Nhà tuyển dụng tại <a style="color: #269b91;font-size: 14px;font-weight: 600;" href="https://timviec365.vn" title="Tìm việc 365" >Timviec365.vn</a></p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Dưới đây là thông tin tài khoản đã tạo:</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">- Tài khoản: '.$email.'</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">- Mật khẩu: *************</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Vui lòng xác thực tài khoản để tạo hồ sơ trực tuyến và xem đầy đủ thông tin hồ sơ ứng viên miễn phí bằng cách bấm vào link dưới đây:</p>
               <p style="height:50px;padding:0;margin: 0;background: #269b91;color: #fff;line-height: 52px;font-size: 14px;font-weight: 500;margin: 30px auto; width:170px;text-align: center;"><a style="color:#fff;text-align:center;font-size: 14px;font-weight: 600" target="_blank" href="'.$link.'">XÁC THỰC EMAIL</a></p>
            </td>
         </tr>
         <tr>
            <td style="background: #f7f7f7;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56;margin-left: 30px;margin-right: 30px;border: 1px solid #b1d8d5;">
               <p style="font-weight: bold;margin-bottom: 10px;">Timviec365.vn chúc quý khách tuyển dụng nhân tài thành công!</p>
               <p style="font-weight: bold;margin-bottom: 10px;">Nếu gặp khó khăn, bạn vui lòng liên hệ qua email: <span style="color:#f05e5e;">Timviec365.vn@gmail.com</span></p>
               <p style="font-weight: bold;margin-bottom: 10px;">Hoặc gọi số hotline: <span style="color:#f05e5e;">1900 633 682</span> để được hỗ trợ</p>
            </td>
         </tr>
         <tr>
            <td style="margin-top: 10px;;margin-bottom: 10px;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56">
               <p style="font-weight: bold;margin-bottom: 10px;text-align: center;"><span style="color:#269b91;">Timviec365.vn </span>- Cầu nối giữa ứng viên và nhà tuyển dụng</p>
               <p style="margin-top: 0;margin-bottom: 10px;">Tầng 4, B50,<span style="color:#269b91;"><u>Lô 6, KĐT Định Công - Hoàng Mai - Hà Nội</u></span></p>
            </td>
         </tr>
         </tbody>
      </table>
      </body>';
   $message = "";

   $body = base64_encode($body);


   CreateSendMail($email,$email,"","","Đăng ký tài khoản nhà tuyển dụng -".time(), $body,11);
}

function SendRegisterRedo($email,$type,$lastname,$tit,$content,$foot,$link)
{
   $body = '<body style="width: 100%;text-align: center;background-color: #eeeeee;padding: 0;margin: 0;font-family: Arial,sans-serif;padding-top: 20px;padding-bottom: 20px;">
      <table style="width: 600px;background: #fff;margin: 0 auto;border-collapse: collapse;">
         <tr style="background: #3a4c56;border-bottom: 5px solid #2befca;height: 81px;">
            <td style="width: 218px;padding-left: 33px;text-align: left;">
            <a href="https://timviec365.vn" title="Tìm việc làm nhanh, việc làm thêm" style="text-decoration: none;">
               <img src="https://timviec365.vn/images/logo_email.png" alt="Tìm việc làm nhanh, việc làm thêm" title="Tìm việc làm nhanh, việc làm thêm" />
            </a>
            <a style="text-decoration: none;color:#dfdfdf;color:#dfdfdf;font-size:14px;float:right;padding-top:25px;padding-right:34px;" href="https://timviec365.vn" title="Tìm việc làm nhanh, việc làm thêm">Timviec365.vn</a>
            </td>
         </tr>
         <tbody >
         <tr>
            <td style="width: 100%;padding: 0 33px;">
               <h1 style="color: #3a4c56;font-size: 16px;padding-top: 10px;text-align: left;margin: 15px 0 10px 0;">Xin chào <span style="color:#269b91;">'.$lastname.'!</span></h1>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">'.$tit.' <a style="color: #269b91;font-size: 14px;font-weight: 600;" href="https://timviec365.vn" title="Tìm việc 365" >Timviec365.vn</a></p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">Dưới đây là thông tin tài khoản đã tạo:</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">- Tài khoản: '.$email.'</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">- Mật khẩu: *************</p>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;line-height: 20px;margin-bottom: 10px;">'.$content.'</p>
               <p style="height:50px;text-align: center;margin: 0;background: #269b91;color: #fff;line-height: 52px;font-size: 14px;font-weight: 500;margin: 30px auto; width:170px"><a style="color:#fff;font-size: 14px;font-weight: 600" target="_blank" href="'.$link.'">XÁC THỰC EMAIL</a></p>
            </td>
         </tr>
         <tr>
            <td style="background: #f7f7f7;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56;margin-left: 30px;margin-right: 30px;border: 1px solid #b1d8d5;">
               <p style="font-weight: bold;margin-bottom: 10px;">'.$foot.'</p>
               <p style="font-weight: bold;margin-bottom: 10px;">Nếu gặp khó khăn, bạn vui lòng liên hệ qua email: <span style="color:#f05e5e;">Timviec365.vn@gmail.com</span></p>
               <p style="font-weight: bold;margin-bottom: 10px;">Hoặc gọi số hotline: <span style="color:#f05e5e;">1900 633 682</span> để được hỗ trợ</p>
            </td>
         </tr>
         <tr>
            <td style="margin-top: 10px;;margin-bottom: 10px;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56">
               <p style="font-weight: bold;margin-bottom: 10px;"><span style="color:#269b91;">Timviec365.vn </span>- Cầu nối giữa ứng viên và nhà tuyển dụng</p>
               <p style="margin-top: 0;margin-bottom: 10px;">Tầng 4, B50,<span style="color:#269b91;"><u>Lô 6, KĐT Định Công - Hoàng Mai - Hà Nội</u></span></p>
            </td>
         </tr>
         </tbody>
      </table>
      </body>';
   $message = "";

   $body = base64_encode($body);


   CreateSendMail($email,$email,"","",$type." - ".time(), $body,12);
}


function Send_HS_NTD($email,$firstna,$addna,$tit,$company,$kinh_nghiem,$subject,$link_uri)
{
   $body = '<body style="width: 100%;text-align: center;background-color: #eeeeee;padding: 0;margin: 0;font-family: Arial,sans-serif;padding-top: 20px;padding-bottom: 20px;">
   <table style="width: 600px;background: #fff;margin: 0 auto;border-collapse: collapse;">
      <tr style="background: #3a4c56;border-bottom: 5px solid #2befca;height: 81px;">
         <td style="width: 218px;padding-left: 33px;text-align: left;">
         <a href="https://timviec365.com" title="Tìm việc làm nhanh, việc làm thêm" style="text-decoration: none;">
            <img src="https://timviec365.vn/images/logo_email.png" alt="Tìm việc làm nhanh, việc làm thêm" title="Tìm việc làm nhanh, việc làm thêm" />
         </a>
         <a style="text-decoration: none;color:#dfdfdf;color:#dfdfdf;font-size:14px;float:right;padding-top:25px;padding-right:34px;" href="https://timviec365.com" title="Tìm việc làm nhanh, việc làm thêm">Timviec365.com</a>
         </td>
      </tr>
      <tbody>
      <tr>
         <td style="width: 100%;padding: 0 33px;">
            <h1 style="color: #2befca;font-size: 25px;padding-top: 10px;margin: 15px 0 7px 0;text-transform: uppercase;">Timviec365.com</h1>
            <p style="margin: 0;font-size: 14px;color: #3a4c56;opacity: 0.99;">Cầu nối giữa ứng viên và các nhà tuyển dụng</a></p>
            <img style="margin-top: 4px;" src="https://timviec365.vn/images/hoavan.png" />
            <h2 style="font-size: 14px;color: #000000;font-weight: 400;line-height: 24px;padding-bottom: 8px;box-sizing: border-box;margin-top: 0;">
            Xin chào '.$company.'<br />
            Hệ thống ứng tuyển trực tuyến <a href="https://timviec365.com" style="text-decoration: none;" title="Timviec365.com"><b style="color: #269b91;">Timviec365.com</b></a> nhận được hồ sơ ứng tuyển<br /> vào vị trí <span style="color: #269b91;">'.$tit.'.</span> Thông tin chi tiết về ứng viên như sau:
            </h2>
            <h2 style="font-size: 14px;margin-top: 20px;color: #fff;font-weight: 400;line-height: 28px;padding-bottom: 8px;background: #269b91;height: 138px;padding-top: 28px;box-sizing: border-box;">
            Họ và tên: '.$firstna.'<br />
            Địa chỉ: '.$addna.'<br />
            Kinh nghiệm: '.$kinh_nghiem.'<br />
            </h2>
            <p style="font-size: 14px;color: #000000;line-height: 24px;">Đây là file đính kèm Người tìm việc gửi đến Nhà tuyển dụng và không qua<br />
            sự kiểm duyệt của <span style="color: #269b91;">Timviec365.com.</span> Quý công ty bấm xem hoặc <span style="color:#269b91">tải về.</span></p>
            <div style="height: 131px;background: #f2f3f4;">
            <img style="margin-top: 11px;" src="https://timviec365.vn/images/icon_x.png" />
            <p style="font-size: 14px;color: #000000;opacity: 0.99;margin: 0;margin-top: 8px;margin-bottom: 18px;"><span style="color: #fa3a47;">Vui lòng click</span> vào link để xem hồ sơ ứng viên:</p>
            <a href="https://timviec365.com'.$link_uri.'" style="cursor: pointer;width: 140px;height: 40px;line-height: 41px;margin: 0 auto;border-radius: 5px;background: #269b91;font-size: 14px;color: #ffffff;display: inline-block;text-decoration: none;">HỒ SƠ ỨNG VIÊN</a>
            </div>
            <p style="margin-bottom: 5px;color: #000;font-weight: bold;margin-top: 25px;color: #3a4c56;font-size: 14px;">Để được tư vấn và hỗ trợ tốt nhất, quý khách vui lòng liên hệ</p>
            <p style="margin: 0;font-size: 14px;color: #3a4c56;line-height: 25px;opacity: 0.99;"><span style="font-weight:bold;color:#3a4c56;font-style:italic">Thời gian hành chính:</span><br />
            (Từ 7h30’ đến 22h hàng ngày, kể cả chủ nhật, thứ 7, lễ tết, ...)<br />
            Hotline: <span style="color: #f05e5e;">1900 633 682</span> LiveChat: <a href="https://timviec365.com" style="color: #269b91;text-decoration: none;"> https://timviec365.com/</a><br />
            <span style="font-weight: bold;color: #3a4c56;font-style: italic;">Ngoài thời gian hành chính:</span><br />
            Số điện thoại: <span style="color: #f05e5e;">0972 319 116</span>  Email: <span style="color: #f05e5e;">Timviec365@gmail.com</span></p>
            <div style="color: #fb2f42;font-size: 14px;margin-top: 25px;border: 1px dashed #9ad0cc;height: 97px;line-height: 25px;padding-top: 25px;box-sizing: border-box;">Để thay đổi các tiêu chí phục vụ cho việc tuyển dụng khác của công ty.<br />
            <span style="color: #3a4c56;">Anh/ chị có thể <b style="font-weight: 400;color: #f05e5e;">thay đổi thông tin yêu cầu</b> <a style="color: #269b91;text-decoration: none;" href="https://timviec365.com">tại đây.</a></span></div>
            <b style="font-size: 14px;color: #000000;margin-top: 15px;display: block;margin-bottom: 15px;"><span style="color: #269b91;">Timviec365.com</span> chúc quý khách tuyển dụng nhân tài thành công!</b>
         </td>
      </tr>
      <tr>
      <td style="background: #d8dbdd url(https://timviec365.vn/images/bgimg_n.png)no-repeat;padding: 10px 0;font-size: 14px;color: #3a4c56;border-bottom: 36px solid #3a4c56;background-position: 0 30px;">
         <p style="margin-bottom: 10px;">Timviec365.com luôn đồng hành cùng bạn 24/24h. </p>
         <p style="margin-top: 0;margin-bottom: 10px;">Cam kết đem lại những hồ sơ chất lượng để quý công ty tuyển dụng </span></p>
         <p style="margin-top: 0;">trong thời gian nhanh nhất.</p>
      </td>
      </tr>
      </tbody>
   </table>
   </body>';
   $message = "";

   $body = base64_encode($body);


   CreateSendMail($email,$email,"","",$subject, $body,13);
}


function Send_HS_UV($email,$name,$tit,$company,$dmca,$subject)
{
   $body = '<body style="width: 100%;text-align: center;background-color: #eeeeee;padding: 0;margin: 0;font-family: Arial,sans-serif;padding-top: 20px;padding-bottom: 20px;">
   <table style="width: 600px;border-collapse: collapse; background: #fff; font-family: arial;" align="center">
      <tr style="background-color: #269b91; height: 81px;">
         <td style="position: relative;padding: 0%;" align="center">
            <img style="display: inline-block;" src="https://timviec365.vn/images/logo-2.png"/>
         </td>
      </tr>
      <tr style="height: 5px;">
         <td style="background: #2befca;"></td>
      </tr>
      <tr>
         <td style="padding: 0px 35px;color: #3a4c56;font-size: 14.58px;line-height: 25px;">
            <p style="font-size: 20.83px; font-weight: bold;text-align: center;">Chào mừng bạn đến với Timviec365.com</p>
            <p>Xin chào <span style="font-weight: bold;">'.$name.'</span></p>
            <p>Hồ sơ ứng tuyển của bạn cho vị trí "'.$tit.'" đã được chuyển đến nhà tuyển dụng '.$company.'</p>
            <p>Nhà tuyển dụng sẽ liên hệ với bạn qua email hoặc số điện thoại nếu hồ sơ của bạn phù hợp. Vui lòng thường xuyên kiểm tra email và mở máy điện thoại để không bỏ lỡ cơ hội phỏng vấn.</p>
            <p>Muốn xem lại vị trí đã ứng tuyển bạn có thể vào Quản lý việc làm đã ứng tuyển hoặc có thể tham khảo việc làm tương tự bên dưới :</p>
         </td>
      </tr>
      <tr style="height: 71px;">
         <td style="padding: 0px 35px;color: #269b91;">
            <p style="font-weight: bold; font-size: 20.83px;background: #def6fd;text-align: center;line-height:17.92px; padding: 15px 23px 4px;margin: 0px;">VIỆC LÀM TƯƠNG TỰ</p>
            <p style="font-size: 13.94px; background: #def6fd;text-align: center;line-height:17.92px; padding: 4px 23px 12px;margin: 0px;">('.$tit.')</p>
         </td>
      </tr>
      '.$dmca.'
      <tr style="height: 135px; font-size: 14.58; line-height: 25px;border-bottom: dotted 1px #c0c0c0;">
         <td align="center" style="padding: 0px 32px;">
            <img src="https://timviec365.vn/images/icon_emm.png"/>
            <a href="https://timviec365.com" style="display: block;font-size: 14.58px; line-height: 25px; color: #ff000a;margin-top: 0px;">Xem thêm việc làm tương tự khác</a>
            <p style="margin-bottom: 0px;text-align: left;"><i>Lưu ý : Đây là email tự động, vui lòng không trả lời (reply) vào hòm thư này.</i></p>
            <p style="margin-top: 0px;text-align: left;">Xin chúc bạn nhanh chóng tìm được việc làm phù hợp.</p>
         </td>
      </tr>
      <tr style="height: 90px;">
         <td style="padding: 0px;text-align: center;">
            <p style="margin-bottom: 7px;">Thông tin hỗ trợ Người tìm việc của Website Timviec365.com</p>
            <p style="margin-top: 0px;">Hotline : <span style="color: #ff000a;">1900 633 682 </span>|<span style="color: #ff000a;"> 0972 319 116</span></p>
         </td>
      </tr>
      <tr style="height: 88px;width: 100%; background: #d8dbdd;text-align: center;font-size: 11.67px;">
         <td>
            <p style="color: #3a4c56;">Liên hệ | Quy định bảo mật | Thỏa thuận sử dụng </p>
            <p style="color: #939393;">Copyright © Công Ty Cổ Phần Thanh toán Hưng Hà.vn</p>
         </td>
      </tr>
      <tr style="height: 31px;">
         <td style="background: #3a4c56;"></td>
      </tr>
   </table>
   </body>';
   $message = "";

   $body = base64_encode($body);


   CreateSendMail($email,$email,"","",$subject, $body,14);
}


// function Send_QMK($email,$user_name,$token,$id)
// {
//    $body = '<body style="width: 100%;text-align: center;background-color: #eeeeee;padding: 0;margin: 0;font-family: Arial,sans-serif;padding-top: 20px;padding-bottom: 20px;">
//       <table style="width: 600px;background: #fff;margin: 0 auto;border-collapse: collapse;">
//          <tr style="background: #fff;border-bottom: 5px solid #18744d;height: 81px;">
//             <td style="width: 218px;padding-left: 33px;text-align: left;">
//             <a href="https://timviec365.com" title="Tìm việc làm nhanh nhất, việc làm thêm" style="text-decoration: none;">
//                <img src="https://raonhanh365.vn/images/logo.png" alt="Chợ mua bán, quảng cáo, rao vặt miễn phí"  />
//             </a>
//             <a style="text-decoration: none;color:#f47c48;font-size:14px;float:right;padding-top:36px;padding-right:45px;" title="Tìm việc làm nhanh, việc làm thêm">Raonhanh365</a>
//             </td>
//          </tr>
//          <tbody >
//          <tr>
//             <td style="width: 100%;padding: 0 33px;">
//                <h1 style="color: #3a4c56;font-size: 16px;padding-top: 10px;text-align: left;margin: 15px 0 7px 0;">Xin chào '.$user_name.'.</h1>
//                <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;">Bạn đã yêu cầu khôi phục mật khẩu tại <a style="color: #269b91;font-size: 14px;font-weight: 600;" href="https://raonhanh365.vn" >raonhanh365.vn</a></p>
//                <p style="margin: 0;margin-top:10px;font-size: 14px;text-align: left;color: #3a4c56;">Để hoàn tất việc lấy lại mật khẩu, vui lòng nhấn vào đường dẫn dưới đây hoặc chép và dán vào trình duyệt</p>
//                <h2 style="font-size: 14px;margin-top: 20px;font-weight: 400;line-height: 24px;padding-bottom: 8px;height: 60px;box-sizing: border-box;">
//                <a target="_blank" href="https://raonhanh365.vn/doi-mat-khau.html?reset_token='.$token.'&id='.$id.'" font-size: 15px;">https://raonhanh365.vn/doi-mat-khau.html?reset_token='.$token.'&id='.$id.'</a></h2>
//                <p style="margin-bottom: 5px;color: #000;font-weight: bold;color: #3a4c56;font-size: 14px;">Để được tư vấn và hỗ trợ tốt nhất, quý khách vui lòng liên hệ:</p>
//                <p style="margin: 0;font-size: 14px;color: #3a4c56;line-height: 25px;opacity: 0.99;">
//                Hotline: <span style="color: #f05e5e;">1900633682</span> LiveChat: <a href="https://raonhanh365.vn" style="color: #269b91;text-decoration: none;"> https://raonhanh365.vn/</a><br>
//             </td>
//          </tr>
//          <tr>
//             <td style="background: #f7f7f7;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56;margin-left: 30px;margin-right: 30px;border: 1px solid #b1d8d5;">
//                <p style="font-weight: bold;margin-bottom: 10px;">Raonhanh365 chúc bạn thành công!</p>

//             </td>
//          </tr>
//          <tr>
//             <td style="margin-top: 10px;;margin-bottom: 10px;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56">
//                <p style="font-weight: bold;margin-bottom: 10px;"><span style="color:#269b91;">Raonhanh365.vn </span>- Cầu nối giữa khách hàng và nhà buôn</p>
//                <p style="margin-top: 0;margin-bottom: 10px;">Tầng 4, B50 ,<span style="color:#269b91;"><u>Lô 6 , KĐT Định Công - Hoàng Mai - Hà Nội</u></span></p>
//             </td>
//          </tr>
//          </tbody>
//       </table>
//       </body>';
//    $message = "";

//    $body = base64_encode($body);


//    CreateSendMail($email,$email,"","","Raovat365 - Khôi phục mật khẩu!", $body,15);
// }
function Send_QMK($email, $user_name, $maotp)
{
   $body = '<body style="width: 100%;text-align: center;background-color: #eeeeee;padding: 0;margin: 0;font-family: Arial,sans-serif;padding-top: 20px;padding-bottom: 20px;">
      <table style="width: 600px;background: #fff;margin: 0 auto;border-collapse: collapse;">
         <tr style="background: #fff;border-bottom: 5px solid #18744d;height: 81px;">
            <td style="width: 218px;padding-left: 33px;text-align: left;">
            <a href="https://timviec365.com" title="Tìm việc làm nhanh nhất, việc làm thêm" style="text-decoration: none;">
               <img src="https://raonhanh365.vn/images/logo.png" alt="Chợ mua bán, quảng cáo, rao vặt miễn phí"  />
            </a>
            <a style="text-decoration: none;color:#f47c48;font-size:14px;float:right;padding-top:36px;padding-right:45px;" title="Tìm việc làm nhanh, việc làm thêm">Raonhanh365</a>
            </td>
         </tr>
         <tbody >
         <tr>
            <td style="width: 100%;padding: 0 33px;">
               <h1 style="color: #3a4c56;font-size: 16px;padding-top: 10px;text-align: left;margin: 15px 0 7px 0;">Xin chào ' . $user_name . '.</h1>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;">Bạn đã yêu cầu khôi phục mật khẩu tại <a style="color: #269b91;font-size: 14px;font-weight: 600;" href="https://raonhanh365.vn" >raonhanh365.vn</a></p>
               <p style="margin: 0;margin-top:10px;font-size: 14px;text-align: left;color: #3a4c56;">Để hoàn tất việc lấy lại mật khẩu, vui lòng nhấn vào đường dẫn dưới đây hoặc chép và dán vào trình duyệt</p>
               <h2 style="font-size: 14px;margin-top: 20px;font-weight: 400;line-height: 24px;padding-bottom: 8px;height: 60px;box-sizing: border-box;">
               <a font-size: 15px;">' . $maotp . '</a></h2>
               <p style="margin-bottom: 5px;color: #000;font-weight: bold;color: #3a4c56;font-size: 14px;">Để được tư vấn và hỗ trợ tốt nhất, quý khách vui lòng liên hệ:</p>
               <p style="margin: 0;font-size: 14px;color: #3a4c56;line-height: 25px;opacity: 0.99;">
               Hotline: <span style="color: #f05e5e;">1900633682</span> LiveChat: <a href="https://raonhanh365.vn" style="color: #269b91;text-decoration: none;"> https://raonhanh365.vn/</a><br>
            </td>
         </tr>
         <tr>
            <td style="background: #f7f7f7;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56;margin-left: 30px;margin-right: 30px;border: 1px solid #b1d8d5;">
               <p style="font-weight: bold;margin-bottom: 10px;">Raonhanh365 chúc bạn thành công!</p>

            </td>
         </tr>
         <tr>
            <td style="margin-top: 10px;;margin-bottom: 10px;display: block;padding: 10px 0;font-size: 14px;color: #3a4c56">
               <p style="font-weight: bold;margin-bottom: 10px;"><span style="color:#269b91;">Raonhanh365.vn </span>- Cầu nối giữa khách hàng và nhà buôn</p>
               <p style="margin-top: 0;margin-bottom: 10px;">Tầng 4, B50 ,<span style="color:#269b91;"><u>Lô 6 , KĐT Định Công - Hoàng Mai - Hà Nội</u></span></p>
            </td>
         </tr>
         </tbody>
      </table>
      </body>';
   $message = "";

   $body = base64_encode($body);


   CreateSendMail($email, $email, "", "", "Raovat365 - Khôi phục mật khẩu!", $body, 15);
}

function Send_QMKNTD($email,$user_name,$token,$id)
{
   $body = '<body style="width: 100%;text-align: center;background-color: #eeeeee;padding: 0;margin: 0;font-family: Arial,sans-serif;padding-top: 20px;padding-bottom: 20px;">
      <table style="width: 600px;background: #fff;margin: 0 auto;border-collapse: collapse;">
         <tr style="background: #fff;border-bottom: 5px solid #18744d;height: 81px;">
            <td style="width: 218px;padding-left: 33px;text-align: left;">
            <a href="https://timviec365.com" title="Tìm việc làm nhanh nhất, việc làm thêm" style="text-decoration: none;">
               <img src="https://timviec365.com/images/logo.png" alt="Tìm việc làm nhanh nhất, việc làm thêm" title="Tìm việc làm nhanh, việc làm thêm" />
            </a>
            <a style="text-decoration: none;color:#f47c48;font-size:14px;float:right;padding-top:36px;padding-right:45px;" href="https://timviec365.com" title="Tìm việc làm nhanh, việc làm thêm">Timviec365.com</a>
            </td>
         </tr>
         <tbody >
         <tr>
            <td style="width: 100%;padding: 0 33px;">
               <h1 style="color: #3a4c56;font-size: 16px;padding-top: 10px;text-align: left;margin: 15px 0 7px 0;">Xin chào '.$user_name.'.</h1>
               <p style="margin: 0;font-size: 14px;text-align: left;color: #3a4c56;">Bạn đã yêu cầu khôi phục mật khẩu tại <a style="color: #269b91;font-size: 14px;font-weight: 600;" href="https://timviec365.com" title="Tìm việc 365" >timviec365.com</a></p>
               <p style="margin: 0;margin-top:10px;font-size: 14px;text-align: left;color: #3a4c56;">Để hoàn tất việc lấy lại mật khẩu, vui lòng nhấn vào đường dẫn dưới đây hoặc chép và dán vào trình duyệt</p>
               <h2 style="font-size: 14px;margin-top: 20px;font-weight: 400;line-height: 24px;padding-bottom: 8px;height: 60px;box-sizing: border-box;">
               <a target="_blank" href="https://timviec365.com/doi-mat-khau-nha-tuyen-dung.html?reset_token='.$token.'&id='.$id.'" font-size: 15px;">https://timviec3651111.com/doi-mat-khau-nha-tuyen-dung.html?reset_token='.$token.'&id='.$id.'</a></h2>
               <p style="margin-bottom: 5px;color: #000;font-weight: bold;color: #3a4c56;font-size: 14px;">Để được tư vấn và hỗ trợ tốt nhất, quý khách vui lòng liên hệ:</p>
               <p style="margin: 0;font-size: 14px;color: #3a4c56;line-height: 25px;opacity: 0.99;">
               Hotline: <span style="color: #f05e5e;">1900633682</span> LiveChat: <a href="https://timviec365.com" style="color: #269b91;text-decoration: none;"> https://timviec365.com/</a><br>
               Email: <span style="color: #f05e5e;">timviec365com@gmail.com</span></p>
            </td>
         </tr>
         <tr>
         <td style="margin-top: 30px;display: block;background-color: #d8dbdd;padding: 10px 0;font-size: 14px;color: #3a4c56;border-bottom: 36px solid #18744d;">
            <p style="font-weight: bold;margin-bottom: 10px;">Trân trọng! Chúc anh/chị một ngày làm việc hiệu quả!</p>
            <p style="margin-top: 0;margin-bottom: 10px;">Timviec365 luôn đồng hành cùng bạn 24/24h. Cam kết đem lại những hồ sơ chất</span></p>
            <p style="margin-top: 0;">lượng để quý công ty tuyển dụng trong thời gian nhanh nhất.</p>
         </td>
         </tr>
         </tbody>
      </table>
      </body>';
   $message = "";

   $body = base64_encode($body);


   CreateSendMail($email,$email,"","","Timviec365 - Khôi phục mật khẩu!", $body,15);
}
?>