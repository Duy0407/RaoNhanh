<?

require_once("../../../classes/database.php");
require_once("../../../functions/functions.php");
$xn = getValue('xn', 'int', 'POST', '');
$xn = (int)$xn;
$us_id = getValue('us_id', 'int', 'POST', '');
$us_id = (int)$us_id;

if ($us_id != 0) {
	$upda_ttdb = new db_query("UPDATE user SET xacthuc_lket = '".$xn."' WHERE usc_id = ".$us_id);


} else {
    echo 'Thông tin không đầy đủ';
}

?>