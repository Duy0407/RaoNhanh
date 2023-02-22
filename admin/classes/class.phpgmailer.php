<?php
class PHPGMailer
{
	protected static $mailer;
	public static $error_mes = '';

	public static function send($from_email, $to_emails, $title_email, $title, $content, $attach_file = '')
	{

		//Create a new PHPMailer instance
		self::$mailer = new PHPMailer();

		self::$mailer->CharSet = 'UTF-8';

		//Tell PHPMailer to use SMTP
		self::$mailer->isSMTP();

		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		self::$mailer->SMTPDebug = 0;

		//Ask for HTML-friendly debug output
		self::$mailer->Debugoutput = 'html';

		//Set the hostname of the mail server
		self::$mailer->Host = 'smtp.gmail.com';

		//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
		self::$mailer->Port = 587;

		//Set the encryption system to use - ssl (deprecated) or tls
		self::$mailer->SMTPSecure = 'tls';

		//Whether to use SMTP authentication
		self::$mailer->SMTPAuth = true;

		//Username to use for SMTP authentication - use full email address for gmail
		self::$mailer->Username = "vnpu.vatgia@gmail.com";

		//Password to use for SMTP authentication
		self::$mailer->Password = "vatgia2015";

		//Set who the message is to be sent from
		self::$mailer->setFrom('noreply'.$from_email, $title_email);

		//Set an alternative reply-to address
		self::$mailer->addReplyTo('noreply'.$from_email, $title_email);

		//Set who the message is to be sent to
		if(is_array($to_emails))
		{
			foreach($to_emails as $email)
			{
				self::$mailer->addAddress($email['email'], $email['name']);
			}
		}else{
			self::$mailer->addAddress($to_emails, 'Thư góp ý');
		}

		//Set the subject line
		self::$mailer->Subject = $title;

		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		self::$mailer->msgHTML($content, dirname(__file__));

		//Replace the plain text body with one created manually
		self::$mailer->AltBody = strip_tags($content);

		//Attach an image file
		self::$mailer->addAttachment($attach_file);

		//send the message, check for errors
		if (!self::$mailer->send())
		{
			self::$error_mes = self::$mailer->ErrorInfo;
			return false;
		}
		return true;
	}
}
