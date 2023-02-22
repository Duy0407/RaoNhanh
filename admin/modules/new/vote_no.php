<?php
require_once("inc_security.php");

// Khai bao bien
$field_id   = "vot_id";
$field_name = "vot_new_id";
$fs_table   = "vote";

$vot_new_id = getValue("new_id","int","GET", 0);

$arrVoteValues  = array(1 => "Quá nhiều thông tin",  
								2 => "Quá phức tạp",                       
								3 => "Thông tin không liên quan", 
								4 =>  "Khác"
								);
								
//gọi class DataGird
$list = new fsDataGird($field_id,$field_name,translate_text("Listing"));

//$list->add("thi_picture","Image","picture",0,0);
$list->add("vot_id","ID","string",1,1, 'width="60"');
$list->add($field_name, translate_text("ID news"), "string", 0, 1);	
$list->add("vot_values","Loại","string",1,0, 'width="60"');
$list->add("vot_message","Nội dung","date",1,0, 'width="100"');   

$list->quickEdit 	= false;
$list->ajaxedit($fs_table);

$sql =	$list->sqlSearch();
	
$total		= new db_count("SELECT count(*) AS count 
									 FROM " . $fs_table . "
									 WHERE vot_type = 2 AND vot_new_id = " . $vot_new_id . " " . $sql);
										 
$total_row = $total->total;
										 
$db_listing = new db_query("SELECT * 
									 FROM " . $fs_table . "
									 WHERE vot_type = 2 AND vot_new_id = " . $vot_new_id . " " . $sql . "
									 ORDER BY " . $list->sqlSort() . $field_id . " DESC " . 
									 $list->limit($total_row)
									 );



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
      <?php
      $i=0;
      while($row = mysql_fetch_assoc($db_listing->result)){
         $i++;         
         //Lay thong tin của nguoi dung
         ?>
         <?=$list->start_tr($i, $row[$field_id]);?>
            <td><?=$row['vot_id']?></td>                                                           
             <td><?=$row['vot_new_id']?></td>  
             <td><?=$row['vot_values'] . " : " . $arrVoteValues[$row['vot_values'] ]?></td>   
             <td><?=$row['vot_message']?></td>                                   
         <?=$list->end_tr();?>
         <?
      }
      ?>
      <?=$list->showFooter($total_row)?>
   </div>
</body>
</html>