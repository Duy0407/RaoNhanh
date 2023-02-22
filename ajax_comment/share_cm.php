<?
include("config.php");
$id_user = getValue('id_user','int','POST',0);
$id_sender = getValue('id_sender','int','POST',0);
$id_conver = getValue('cv_sender','int','POST',0);

$url = getValue('url','str','POST',0);
$url = replaceMQ(trim($url));

$ava_sender = getValue('ava_sender','str','POST',0);
$ava_sender = replaceMQ(trim($ava_sender));
$ava_sender = sql_injection_rp($ava_sender);

$name_sender = getValue('name_sender','str','POST',0);
$name_sender = replaceMQ(trim($name_sender));

$name_sender2 = $name_sender;

$name_sender = sql_injection_rp($name_sender);

$nd_sender = getValue('nd_sender','str','POST',0);
$nd_sender = replaceMQ(trim($nd_sender));

$ip = client_ip();


if (($id_user > 0 || $id_conver > 0) && $id_sender > 0 && $url != '') {
	$curl = curl_init();
	$data = array(
		'UserId' 		=> $id_user,
		'SenderId' 		=> $id_sender,
		'ConversationId' => $id_conver,
		'Type' 			=> 'document',
		'Title' 		=> $nd_sender,
		'Message' 		=> $name_sender2.' đã chia sẻ một bài viết',
		'Link' 			=> $url,
	);
	curl_setopt($curl, CURLOPT_POST, 1);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:3005/Notification/SendNewNotification_v2');
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
	curl_exec($curl);
	curl_close($curl);


	$qr_count = new db_query("SELECT lk_id FROM cm_like WHERE lk_for_url = '".mysql_escape_string($url)."' AND lk_for_comment = 0 AND lk_type = 8 AND lk_user_idchat = '".$id_sender."'");
	$count    = mysql_num_rows($qr_count->result);

	if ($count == 0) {
		$qr = new db_execute("INSERT INTO cm_like (lk_for_url, lk_type, lk_for_comment, lk_user_name, lk_user_avatar, lk_user_idchat, lk_ip, lk_time) VALUES 
			('".mysql_escape_string($url)."',8,0,'".mysql_escape_string($name_sender)."','".mysql_escape_string($ava_sender)."','".$id_sender."','".$ip."','".time()."')");
	}


	$qr_count_s = new db_query("SELECT lk_id FROM cm_like WHERE lk_for_url = '".mysql_escape_string($url)."' AND lk_for_comment = 0 AND lk_type = 8");
	$count_s    = mysql_num_rows($qr_count_s->result);
	echo $count_s;
	
}





?>