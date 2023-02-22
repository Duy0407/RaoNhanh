<?
	$ids = intval($_POST['seen']);

    $data_c = array(
        'userId' => $ids
    );
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://43.239.223.142:3005/Conversation/ReadAllMessage',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $data_c
    ));
    $response = curl_exec($curl);
    curl_close($curl);
?>