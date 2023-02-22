<?
require_once("inc_security.php");

$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));

$mnu_type 			= getValue("mnu_type","str","GET","");
$iCat		 			= getValue("iCat");
if($mnu_type=="") $mnu_type=getValue("mnu_type","str","POST","");
$sql="1";
if($mnu_type!="")  $sql="mnu_type = '" . $mnu_type . "'";
$menu = new menu();
$menu->show_count = 1; //tính count sản phẩm
$listAll = $menu->getAllChild("menus_multi","mnu_id","mnu_parent_id",$iCat,$sql . " AND lang_id = " . $lang_id . $sqlcategory,"mnu_id,mnu_name,mnu_order,mnu_type,mnu_parent_id,mnu_has_child,mnu_picture,mnu_active,admin_id,mnu_check,mnu_link","mnu_type ASC,mnu_order ASC, mnu_name ASC","mnu_has_child");

$arrayCat = array(0=>translate_text("Categories"));
$db_cateogry = new db_query("SELECT mnu_type,mnu_name,mnu_id
									FROM menus_multi
									WHERE mnu_parent_id = 0");
while($row = mysql_fetch_array($db_cateogry->result)){
	$arrayCat[$row["mnu_id"]] = $row["mnu_name"];
}

$list->addSearch(translate_text("Loại danh mục"),"mnu_type","array",$arrType,$mnu_type);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*------------------------------------------------------------------------------------------------*/ ?>
<?=template_top(translate_text("Category listing"),$list->urlsearch())?>
	<?
	if(!is_array($listAll)) $listAll = array();
	?>
	<table border="1" cellpadding="3" cellspacing="0" class="table" width="100%" bordercolor="<?=$fs_border?>">
		<tr class="bg"> 
			<td class="bold" width="5"><input type="checkbox" id="check_all" onClick="check('1','<?=count($listAll)+1?>')"></td>
			<td class="bold" width="2%" nowrap="nowrap" align="center"><img src="<?=$fs_imagepath?>save.png" border="0"></td>
			<?
			if($array_config["image"]==1){
			?>
			<td class="bold" width="5%" nowrap="nowrap" align="center"><?=translate_text("Ảnh")?></td>
			<?
			}
			?>
			<td class="bold" ><?=translate_text("Tên")?></td>
            <td class="bold" ><?=translate_text("Đường dẫn")?></td>
            <td class="bold" ><?=translate_text("check")?></td>
			<?
			if($array_config["order"]==1){
			?>
			<td class="bold" align="center"><?=translate_text("Thứ tự")?></td>
			<?
			}
			?>
			<td class="bold" align="center" width="5"><?=translate_text("Active")?></td>		
			<td class="bold" align="center" width="5">Copy</td>
			<td class="bold" align="center" width="16">Sửa</td>
			<td class="bold" align="center" width="16">Xóa</td>
		</tr>
		<form action="quickedit.php?returnurl=<?=base64_encode(getURL())?>" method="post" name="form_listing" id="form_listing" enctype="multipart/form-data">
		<input type="hidden" name="iQuick" value="update">	
		<? 
		
		$i=0;
		$mnu_type = '';
		foreach($listAll as $key=>$row){
			$i++;
		?>
		<?
		if($mnu_type != strtolower($row["mnu_type"])){
			$mnu_type = strtolower($row["mnu_type"]);
		?>
			<tr>
				<td colspan="14" align="center" class="bold" bgcolor="#FFFFCC" style="color:#FF0000; padding:6px;"><?=isset($arrType[$mnu_type]) ?  $arrType[$mnu_type] : ''?></td>
			</tr>
		<?
		}
		?>
		<tr <? if($i%2==0) echo ' bgcolor="#FAFAFA"';?>>
			<td <? if($row["admin_id"] == $admin_id) echo ' bgcolor="#FFFF66"';?>>
				<input type="checkbox" name="record_id[]" id="record_<?=$row["mnu_id"]?>_<?=$i?>" value="<?=$row["mnu_id"]?>">
			 </td>
			<td width="2%" nowrap="nowrap" align="center"><img src="<?=$fs_imagepath?>save.png" border="0" style="cursor:pointer" onClick="document.form_listing.submit()" alt="Save"></td>
			<?
			if($array_config["image"]==1){
			?>
			<td align="center">
				<?
				$path = $fs_filepath . $row["mnu_picture"];
				if($row["mnu_picture"] != "" && file_exists($path)){
				?>
	           <a target="_blank" onMouseOver="showtip('<img src=\'<?=$fs_filepath?><?=$row["mnu_picture"]?>\' width=\'600\' />')" onMouseOut="hidetip()">
	           	<img src="<?=$fs_filepath?><?=$row["mnu_picture"]?>" height="30" />
	           </a>
	           <a href="delete_pic.php?record_id=<?=$row["mnu_id"]?>&url=<?=base64_encode($_SERVER['REQUEST_URI'])?>"><img src="<?=$fs_imagepath?>delete.gif" border="0" /></a>
				<?
				}
				?>
				<input type="file" style="width: 150px;" name="picture<?=$row["mnu_id"]?>" id="picture<?=$row["mnu_id"]?>" class="form" onchange="check_edit('record_<?=$row["mnu_id"]?>_<?=$i?>')" />			
			</td>
			<?
			}
			?>
			<td nowrap="nowrap">
				<?
				for($j=0;$j<$row["level"];$j++) echo "--";
				?>
				<input type="text"  name="mnu_name<?=$row["mnu_id"];?>" id="mnu_name<?=$row["mnu_id"];?>" onkeyup="check_edit('record_<?=$row["mnu_id"]?>_<?=$i?>')" value="<?=$row["mnu_name"];?>" class="form" size="30"/>
			</td>
            <td nowrap="nowrap">
				<?
				for($j=0;$j<$row["level"];$j++) echo "--";
				?>
				<input type="text"  name="mnu_link<?=$row["mnu_id"];?>" id="mnu_link<?=$row["mnu_id"];?>" onkeyup="check_edit('record_<?=$row["mnu_id"]?>_<?=$i?>')" value="<?=$row["mnu_link"];?>" class="form" size="50"/>
			</td>
            <td nowrap="nowrap">
				<?
				for($j=0;$j<$row["level"];$j++) echo "--";
				?>
				<input type="text"  name="mnu_check<?=$row["mnu_id"];?>" id="mnu_check<?=$row["mnu_id"];?>" onkeyup="check_edit('record_<?=$row["mnu_id"]?>_<?=$i?>')" value="<?=$row["mnu_check"];?>" class="form" size="20"/>
			</td>
			<td align="center">
            	<input type="text" size="2" class="form" value="<?=$row["mnu_order"]?>" id="mnu_order<?=$row["mnu_id"]?>" name="mnu_order<?=$row["mnu_id"]?>" onkeyup="check_edit('record_<?=$row["mnu_id"]?>_<?=$i?>')" /></td>
			<td align="center"><a onclick="loadactive(this); return false;" href="active.php?record_id=<?=$row["mnu_id"]?>&type=mnu_active&value=<?=abs($row["mnu_active"]-1)?>&url=<?=base64_encode(getURL())?>"><img border="0" src="<?=$fs_imagepath?>check_<?=$row["mnu_active"];?>.gif" title="Active!"/></a></td>											
			<td align="center" width="16"><img src="<?=$fs_imagepath?>copy.gif" title="<?=translate_text("Are you want duplicate record")?>" border="0" onclick="if (confirm('<?=translate_text("Are you want duplicate record")?>?')){ window.location.href='copy.php?record_id=<?=$row["mnu_id"]?>&returnurl=<?=base64_encode(getURL())?>'}" style="cursor:pointer"/></td>
			<td align="center" width="16"><a class="text" href="edit.php?record_id=<?=$row["mnu_id"]?>&returnurl=<?=base64_encode(getURL())?>"><img src="<?=$fs_imagepath?>edit.png" alt="EDIT" border="0"/></a></td>
			<td align="center"><img src="<?=$fs_imagepath?>delete.png" alt="DELETE" border="0" onclick="if (confirm('Are you sure to delete?')){ window.location.href='delete.php?record_id=<?=$row["mnu_id"]?>&returnurl=<?=base64_encode(getURL())?>'}" style="cursor:pointer"/></td>
		</tr>
		<? } ?>
		</form>
		</table>
<?=template_bottom() ?>
<? /*------------------------------------------------------------------------------------------------*/ ?>
</body>
</html>
