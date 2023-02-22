<?php
require_once("inc_security.php");
include("../../functions/rewrite_functions.php");
//gọi class DataGird
$startdate		= getValue("startdate", "str", "GET", "dd/mm/yyyy");
$enddate			= getValue("enddate", "str", "GET", "dd/mm/yyyy");
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));
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
$list->add("his_id","ID","string",1,1, 'width="60"');
$list->add("usc_name","Tên tài khoản", "string", 0, 1);
$list->add("his_user_id","ID tài khoản", "string", 0, 1);
$list->add("his_seri","Số serial", "string", 1, 1);
$list->add("his_price","Mệnh giá thẻ", "string", 1, 0);
$list->add("his_time","Thời gian", "string", 1, 0);
$list->quickEdit 	= false;
$list->ajaxedit($fs_table);
$list->addSearch("Từ", "startdate", "date", $startdate, "dd/mm/yyyy");
$list->addSearch("Đến", "enddate", "date", $enddate, "dd/mm/yyyy");
$sql =	$list->sqlSearch();
if($startdate != "dd/mm/yyyy"){
	$intdate		=	convertDateTime($startdate, "0:0:0");
	$sql			.= " AND his_time >= " . $intdate;
	}
if($enddate != "dd/mm/yyyy"){
	$intdate		=	convertDateTime($enddate, "23:59:59");
	$sql			.= " AND his_time <= " . $intdate;
}
$total		= new db_count("SELECT count(*) AS count
									 FROM " . $fs_table . "
									 WHERE his_pb = 0 " . $sql);

$total_row = $total->total;

$db_listing = new db_query("SELECT usc_name,his_id,his_user_id,his_seri,his_price,his_time
									 FROM " . $fs_table . "
                            JOIN user ON " . $fs_table .".his_user_id = user.usc_id
									 WHERE " . $fs_table . ".his_pb = 0  " . $sql . "
									 ORDER BY " . $list->sqlSort() . $field_id . " ASC " .
									 $list->limit($total_row));

?>
<!DOCTYPE html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<?=$load_header?>
	<?=$list->headerScript()?>
</head>
<body>
<div id="listing">
   <?=$list->showHeader($total_row)?>
   <?
   $i=0;
   while($row = mysql_fetch_assoc($db_listing->result)){
      $i++;
      ?>
      <?=$list->start_tr($i, $row[$id_field]);?>
         <td width="100" align="center"><?=$row['his_id']?></td>
         <td width="150" align="center"><a><?=$row['usc_name']?></a></td>
         <td width="150" align="center"><a><?=$row['his_user_id']?></a></td>
         <td align="center"><?= $row['his_seri'] ?></td>
         <td align="center"><?= number_format($row['his_price'])." VNĐ"?></td>
         <td align="center"><?= date("d/m/Y",$row['his_time'])?></td>
      <?=$list->end_tr();?>
      <?
   }
   ?>
   <?=$list->showFooter($total_row)?>
</div>
</body>
</html>