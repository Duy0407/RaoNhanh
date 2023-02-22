<?
require_once("inc_security.php");
$db_admin_listing = new db_query ("SELECT * 
											  FROM admin_user
											  WHERE adm_loginname NOT IN('admin') AND adm_delete = 0
											  ORDER BY adm_loginname ASC, adm_active DESC");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*------------------------------------------------------------------------------------------------*/ ?>
<?=template_top(translate_text("Member management listing"))?>
		<? /*---------Body------------*/ ?>
		<table width="100%" border="1" cellpadding="3" cellspacing="0" class="table" bordercolor="<?=$fs_border?>">
			<tr height="25">
			<td width="20" class="bold bg">No</td>
			<td align="center" class="bold bg" nowrap="nowrap"><?=translate_text("Họ tên")?></td>
			<td align="center" class="bold bg"><?=translate_text("Email")?></td>
			<td align="center" class="bold bg"><?=translate_text("Quyền")?></td>
			<td align="center" class="bold bg"><?=translate_text("Ngôn ngữ")?></td>
			<td width="10" align="center" class="bold bg"><?=translate_text("Active")?></td>			
			<td width="10" align="center" class="bold bg"><?=translate_text("Sửa")?></td>
			
			</tr>
			<?
			$countno = 0;
			while ($row = mysql_fetch_array($db_admin_listing->result))
			{
			  $countno++;
			?>
			  <tr <? if($countno%2==0) echo ' bgcolor="#FAFAFA"';?>> 
				<td align="center" class="bold"><?=$countno;?></td>
				<td class="bold"><?=$row["adm_loginname"];?></td>
				<td class="bold"><?=$row["adm_email"];?></td>
				
				<td align="center" class="text">
					<?
					$db_access = new db_query("SELECT * 
											   FROM admin_user, admin_user_right, modules
											   WHERE adm_id = adu_admin_id AND mod_id = adu_admin_module_id AND adm_id =" . $row['adm_id']);
					while ($row_access = mysql_fetch_array($db_access->result)){
						echo $row_access['mod_name'] . ", ";
					}
					unset($db_access);
					?>
				</td>
				<td align="center">
					<?
					$db_access = new db_query("SELECT * 
											   FROM languages,admin_user_language
											   WHERE lang_id = aul_lang_id AND aul_admin_id =" . $row['adm_id']);
					while ($row_channel = mysql_fetch_array($db_access->result)){
						echo $row_channel['lang_name'] . ", ";
					}
					unset($db_access);
					?>
				</td>
				<td align="center"><a href="active.php?record_id=<?=$row["adm_id"]?>&type=adm_active&value=<?=abs($row["adm_active"]-1)?>&url=<?=base64_encode(getURL())?>"><img border="0" src="<?=$fs_imagepath?>check_<?=$row["adm_active"];?>.gif" alt="Active!"></a></td>
				<td align="center"><a href="edit.php?iAdm=<?=$row["adm_id"];?>"><img src="<?=$fs_imagepath?>edit.png" alt="EDIT" border="0"></a></td>
				
			  </tr>
			<? } ?>
		</table>
		<? /*---------Body------------*/ ?>
<?=template_bottom() ?>
<? /*------------------------------------------------------------------------------------------------*/ ?>
</body>
</html>
<? unset($db_admin_listing);?>