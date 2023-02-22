<?
require_once("inc_security.php");

	//gọi class DataGird
	$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
	$list->quickEdit 	= false;
		/*
		1: Ten truong trong bang
		2: Tieu de header
		3: kieu du lieu ( vnd 	: kiểu tiền VNĐ, usd : kiểu USD, date : kiểu ngày tháng, picture : kiểu hình ảnh, 
						array : kiểu combobox có thể edit, arraytext : kiểu combobox ko edit,
						copy : kieu copy, checkbox : kieu check box, edit : kiểu edit, delete : kiểu delete, string : kiểu text có thể edit, 
						number : kiểu số, text : kiểu text không edit
		4: co sap xep hay khong, co thi de la 1, khong thi de la 0
		5: co tim kiem hay khong, co thi de la 1, khong thi de la 0
		*/
	//$list->add("thi_picture","Image","picture",0,0);
	$list->add($field_name, translate_text("Tiêu đề"), "string", 1, 0);
   $list->add("int_type", translate_text("Kiểu trang"), "string", 1, 0);
   $list->add("int_active", "Active", "checkbox", 0, 0);	
	$list->add("",translate_text("Sửa"),"edit");
	$list->add("",translate_text("Xóa"),"delete");
	
	$list->ajaxedit($fs_table);
	
	$sql =	$list->sqlSearch() . $list->searchKeyword($field_name);
		
	$total			= new db_count("SELECT count(*) AS count 
											 FROM " . $fs_table . "
											 WHERE 1 " . $sql);
											 
	$db_listing = new db_query("SELECT * 
										 FROM " . $fs_table . "
										 WHERE 1 " . $sql . "
										 ORDER BY " . $list->sqlSort() . $field_id . " DESC
										 " . $list->limit($total->total));

	$total_row = mysql_num_rows($db_listing->result);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?=$load_header?>
<?=$list->headerScript()?>
</head>
<body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
<? /*---------Body------------*/ ?>
<div id="listing">
  <?=$list->showHeader($total_row)?>
  
  <?
    $i = 0;
    $que_type = "";
  while($row  = mysql_fetch_assoc($db_listing->result)){
      $i++;
    ?>
         <?=$list->start_tr($i, $row['int_id'])?>
         	<td width="300" align="center"><p style="padding: 0; margin: 0;"><?=$row['int_name']?></p></td>
            <td width="300" align="center"><p style="padding: 0; margin: 0;"><?
            if($row['int_type'] == 1){
               echo  "Trang giới thiệu";
            }else if($row['int_type'] == 2) {
					echo  "Chính sách";
            }
            else if($row['int_type'] == 3) {
					echo  "Trợ giúp";
            }
            ?></p></td>
            <td width="50"  align="center"><a onClick="loadactive(this); return false;" href="active.php?record_id=<?=$row["int_id"]?>&type=int_active&value=<?=abs($row["int_active"]-1)?>&url=<?=base64_encode(getURL())?>"><img border="0" src="<?=$fs_imagepath?>check_<?=$row["int_active"];?>.gif" title="Active!" /></a></td>
            <td align="center"><img src="<?=$fs_imagepath?>edit.png" alt="EDIT" border="0" onclick="if (confirm('Are you sure to edit?')){ window.location.href='edit.php?record_id=<?=$row["int_id"]?>&returnurl=<?=base64_encode(getURL())?>'}" style="cursor:pointer"/></td>
            <td width="10"  align="center" ><img src="<?=$fs_imagepath?>delete.gif" alt="DELETE" border="0" onClick="if (confirm('Are you sure to delete?')){ window.location.href='delete.php?record_id=<?=$row["int_id"]?>&returnurl=<?=base64_encode(getURL())?>'}" style="cursor:pointer" /></td>
        <?
    }
  ?>  
  <?=$list->showFooter($total_row)?> 
</div>
<? /*---------Body------------*/ ?>
</body>
</html>