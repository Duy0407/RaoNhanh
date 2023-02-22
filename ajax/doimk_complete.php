<?
	include_once('../home/config.php');

	$id = getValue('id','int','POST',0);
	$id = replaceMQ($id);
	$password = getValue('password','str','POST','');
	$password = replaceMQ($password);
	$password = md5($password.'raonhanh365');

	$update = new db_query("UPDATE user SET usc_pass = '".$password."' WHERE usc_id = ".$id);
	unset($id,$password,$update);
?>