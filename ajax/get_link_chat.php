<?
require_once("../functions/functions.php"); 

$cv_id = getValue('cv_id','int','POST',0);
$my_id = getValue('my_id','int','POST',0);

if ($cv_id > 0 && $my_id > 0) {
	echo 'https://chat365.timviec365.vn/conversation-c'.encrypt_decrypt($cv_id,'encrypt').'-u'.encrypt_decrypt($my_id,'encrypt');
}

?>