<?
require_once("inc_security.php");

$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));

$iCat		 			= getValue("iCat");
$namecat = getValue("cat_name","str","GET","");
$sql="1";
if($namecat!= "Enter keyword" && $namecat != "")  $sql="cat_name LIKE '%" . $namecat . "%'";
$menu = new menu();
$menu->show_count = 1; //tính count sản phẩm
$listAll = $menu->getAllChild("category","cat_id","cat_parent_id",$iCat,$sql. $sqlcategory,"cat_id,cat_name,cat_order,cat_type,cat_parent_id,cat_has_child,cat_picture,cat_active,admin_id,cat_show","cat_type ASC,cat_order ASC, cat_name ASC","cat_has_child");

$arrayCat = array(0=>"Chọn danh mục");
$db_cateogry = new db_query("SELECT cat_type,cat_name,cat_id
									FROM category
									WHERE cat_parent_id = 0 
									ORDER BY cat_type");
while($row = mysql_fetch_array($db_cateogry->result)){
	$arrayCat[$row["cat_id"]] = $row["cat_name"];
}
$list->addSearch(translate_text("Danh mục"),"iCat","array",$arrayCat,"--Chọn danh mục--");
$list->addSearch("Tiêu đề","cat_name","text","",$namecat);
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
	<table border="1" cellpadding="3" cellspacing="0" class="table" width="100%">
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
			<td class="bold"><?=translate_text("Tên")?></td>
			<?
			if($array_config["order"]==1){
			?>
			<td class="bold" align="center"><?=translate_text("Thứ tự")?></td>
			<?
			}
			?>
			<td class="bold" align="center" width="5"><?=translate_text("Active")?></td>		
			<td class="bold" align="center" width="5"><?=translate_text("Show")?></td>
			<td class="bold" align="center" width="5"><?=translate_text("Copy")?></td>
			<td class="bold" align="center" width="16"><?=translate_text("Sửa")?></td>
		</tr>
		<form action="quickedit.php?returnurl=<?=base64_encode(getURL())?>" method="post" name="form_listing" id="form_listing" enctype="multipart/form-data">
		<input type="hidden" name="iQuick" value="update">	
		<? 
		
		$i=0;
		$cat_type = '';
		foreach($listAll as $key=>$row){
			$i++;
		?>
		<?
		if($cat_type != strtolower($row["cat_type"])){
			$cat_type = strtolower($row["cat_type"]);
		?>
			<tr>
				<td colspan="14" align="center" class="bold" bgcolor="#FFFFCC" style="color:#FF0000; padding:6px;"><?=isset($array_value[$cat_type]) ?  $array_value[$cat_type] : ''?></td>
			</tr>
		<?
		}
		?>
		<tr <? if($i%2==0) echo ' bgcolor="#FAFAFA"';?>>
			<td <? if($row["admin_id"] == $admin_id) echo ' bgcolor="#DDD"';?>>
				<input type="checkbox" name="record_id[]" id="record_<?=$row["cat_id"]?>_<?=$i?>" value="<?=$row["cat_id"]?>">
			 </td>
			<td width="2%" nowrap="nowrap" align="center"><img src="<?=$fs_imagepath?>save.png" border="0" style="cursor:pointer" onClick="document.form_listing.submit()" alt="Save"></td>
			<?
			if($array_config["image"]==1){
			?>
			<td align="center">
				<?
				$path = $fs_filepath . $row["cat_picture"];
				if($row["cat_picture"] != "" && file_exists($path)){
					?>
                    <a target="_blank" onMouseOver="showtip('<img src=\'<?=$fs_filepath?><?=$row["cat_picture"]?>\' />')" onMouseOut="hidetip()">
                    	<img src="<?=$fs_filepath?><?=$row["cat_picture"]?>" height="30" />
                    </a>
                    <a href="delete_pic.php?record_id=<?=$row["cat_id"]?>&url=<?=base64_encode($_SERVER['REQUEST_URI'])?>"><img src="<?=$fs_imagepath?>delete.gif" border="0" /></a><?
				}
				?>
				<input type="file" name="picture<?=$row["cat_id"]?>" id="picture<?=$row["cat_id"]?>" class="form" onchange="check_edit('record_<?=$row["cat_id"]?>_<?=$i?>')" size="10"/>			
			</td>
			<?
			}
			?>
			<td nowrap="nowrap">
				<?
				for($j=0;$j<$row["level"];$j++) echo "--";
				?>
				<input type="text"  name="cat_name<?=$row["cat_id"];?>" id="cat_name<?=$row["cat_id"];?>" onkeyup="check_edit('record_<?=$row["cat_id"]?>_<?=$i?>')" value="<?=$row["cat_name"];?>" class="form" size="50"/>
			</td>
			<td align="center"><input type="text" size="2" class="form" value="<?=$row["cat_order"]?>" id="cat_order<?=$row["cat_id"]?>" name="cat_order<?=$row["cat_id"]?>" onkeyup="check_edit('record_<?=$row["cat_id"]?>_<?=$i?>')" /></td>
			<td align="center"><a onclick="loadactive(this); return false;" href="active.php?record_id=<?=$row["cat_id"]?>&type=cat_active&value=<?=abs($row["cat_active"]-1)?>&url=<?=base64_encode(getURL())?>"><img border="0" src="<?=$fs_imagepath?>check_<?=$row["cat_active"];?>.gif" title="Active!"/></a></td>											
			<td align="center"><a onclick="loadactive(this); return false;" href="active.php?record_id=<?=$row["cat_id"]?>&type=cat_show&value=<?=abs($row["cat_show"]-1)?>&url=<?=base64_encode(getURL())?>"><img border="0" src="<?=$fs_imagepath?>check_<?=$row["cat_show"];?>.gif" title="Show!"/></a></td>
			<td align="center" width="16"><img src="<?=$fs_imagepath?>copy.gif" title="<?=translate_text("Are you want duplicate record")?>" border="0" onclick="if (confirm('<?=translate_text("Are you want duplicate record")?>?')){ window.location.href='copy.php?record_id=<?=$row["cat_id"]?>&returnurl=<?=base64_encode(getURL())?>'}" style="cursor:pointer"/></td>
			<td align="center" width="16"><a class="text" href="edit.php?record_id=<?=$row["cat_id"]?>&returnurl=<?=base64_encode(getURL())?>"><img src="<?=$fs_imagepath?>edit.png" alt="EDIT" border="0"/></a></td>
			
		</tr>
		<? } ?>
		</form>
		</table>
<?=template_bottom() ?>
<? /*------------------------------------------------------------------------------------------------*/ ?>
</body>
</html>