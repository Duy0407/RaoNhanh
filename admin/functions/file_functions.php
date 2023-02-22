<?
function checkExtension($filename, $allowList){
	$sExtension = $filename;
	$allowArray	= explode(",", $allowList);
	$allowPass	= 0;
	for($i=0; $i<count($allowArray); $i++){
		if($sExtension == $allowArray[$i]) $allowPass = 1;
	}
	return $allowPass;
}

function check_upload_extension($filename,$allow_list){
	$sExtension	= getExtension($filename);
	$allow_arr	= explode(",", $allow_list);
	$pass = 0;
	for($i=0; $i<count($allow_arr); $i++){
		if($sExtension == $allow_arr[$i]) $pass = 1;
	}
	return $pass;
}

function delete_file($table_name,$id_field,$id_field_value,$field_select,$ff_imagepath){
	$db_select = new db_query("SELECT " . $field_select . " " .
									"FROM " . $table_name . " " .
									"WHERE " . $id_field . "=" . $id_field_value
									);
	while($row=mysql_fetch_array($db_select->result)){
		if(file_exists($ff_imagepath . $row[$field_select])) @unlink($ff_imagepath . $row[$field_select]);
		if(file_exists($ff_imagepath . "tiny_" . $row[$field_select])) @unlink($ff_imagepath . "tiny_" . $row[$field_select]);
		if(file_exists($ff_imagepath . "small_" . $row[$field_select])) @unlink($ff_imagepath . "small_" . $row[$field_select]);
		if(file_exists($ff_imagepath . "ssmall_" . $row[$field_select])) @unlink($ff_imagepath . "ssmall_" . $row[$field_select]);
		if(file_exists($ff_imagepath . "medium_" . $row[$field_select])) @unlink($ff_imagepath . "medium_" . $row[$field_select]);
	}	
	unset($db_select);
	$db_ex = new db_execute("UPDATE " . $table_name . " SET " . $field_select . " = null WHERE " . $id_field . "=" . $id_field_value);
	unset($db_ex);					
}

function delete_picture_more($type, $record_id, $multi=0, $path="../../"){
	global $lang_id;
	$fs_table	= $type . "_pictures";
	$prefix		= "";
	switch($type){
		case "tour": $prefix = "tp"; break;
	}
	$id_field				= ($multi != 1) ? $prefix . "_id" : $prefix . "_" . $type . "_id";
	$fs_fieldupload		= $prefix . "_picture";
	$fs_filepath_fullsize= $path . $type . "_pictures_more/fullsize/";
	$fs_filepath_small	= $path . $type . "_pictures_more/small/";
	$fs_filepath_normal	= $path . $type . "_pictures_more/normal/";
	
	$db_check = new db_query("SELECT " . $fs_fieldupload . " FROM " . $fs_table . " WHERE " . $id_field . " = " . $record_id . " AND lang_id = " . $lang_id);
	while($check = mysql_fetch_array($db_check->result)){
		if($check[$fs_fieldupload] != ""){
			delete_file($fs_filepath_fullsize, $check[$fs_fieldupload]);
			delete_file($fs_filepath_small, $check[$fs_fieldupload]);
			delete_file($fs_filepath_normal, $check[$fs_fieldupload]);
		}
		$db_execute = new db_execute("DELETE FROM " . $fs_table . " WHERE " . $id_field . " = " . $record_id);
		unset($db_execute);
	}
	unset($db_check);
}

function generate_name($filename){
	$name = "";
	for($i=0; $i<3; $i++){
		$name .= chr(rand(97,122));
	}
	$today= getdate();
	$name.= $today[0];
	$ext	= substr($filename, (strrpos($filename, ".") + 1));
	return $name . "." . $ext;
}

function getExtension($filename){
	$sExtension = substr($filename, (strrpos($filename, ".") + 1));
	$sExtension = strtolower($sExtension);
	return $sExtension;
}
function showImageMap($markers, $center = "", $zoom = '14', $size = '480x450'){
	global $path_maps;
	$path_root = $_SERVER["DOCUMENT_ROOT"];
	if($center == "") $center = $markers;
	$filename = md5($markers) . ".gif";
	if(file_exists($path_root . $path_maps . $filename)){
		return $path_maps . $filename;
	}else{
		$url_download = 'http://www.google.com/staticmap?center=' . $center . '&markers=' . $markers . ',red&zoom=' . $zoom . '&size=' . $size;
		downloadFile($url_download,$path_root . $path_maps . $filename);
		return $path_maps . $filename;
	}
}
function downloadFile($url_download, $save_as){
	set_time_limit(0);
	ini_set('display_errors',true);//Just in case we get some errors, let us know....	
	$fp = fopen ($save_as, 'w');//This is the file where we save the information
	$ch = curl_init($url_download);//Here is the file we are downloading
	curl_setopt($ch, CURLOPT_TIMEOUT, 10);
	curl_setopt($ch, CURLOPT_FILE, $fp);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_exec($ch);
	curl_close($ch);
	fclose($fp);
}
?>