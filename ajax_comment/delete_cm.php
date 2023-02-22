<?
include("config.php");
$id_cm = getValue('id_cm','int','POST',0);
$uid_view = getValue('uid','int','POST',0);

if ($id_cm > 0 && $uid_view > 0) {
	$qr_count = new db_query("SELECT cm_id,cm_img FROM cm_comment WHERE cm_sender_idchat = '".$uid_view."' AND cm_id = '".$id_cm."'");
	$count    = mysql_num_rows($qr_count->result);
	if ($count > 0) {
		$row = mysql_fetch_assoc($qr_count->result);
		$qr_rl = new db_query("SELECT cm_img FROM cm_comment WHERE cm_img != '' AND cm_parent_id = '".$id_cm."'");
		While($rowt = mysql_fetch_assoc($qr_rl->result)){
			@unlink('..'.$rowt['cm_img']);
		}
		$img = $row['cm_img'];
		if ($img != '') {
			@unlink('..'.$img);
		}

		$db_qr_tb= new db_query("DELETE FROM cm_comment WHERE cm_id = '".$id_cm."' OR cm_parent_id = '".$id_cm."'");

	}
}
?>