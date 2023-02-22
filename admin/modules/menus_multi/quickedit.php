<? //generate by dinhtoan@finalstyle.com
require_once("inc_security.php");
checkAddEdit("edit");	//check quyền them sua xoa

$returnurl = base64_decode(getValue("returnurl","str","GET",base64_encode("listing.php")));
//Khai bao Bien
$errorMsg = "";
$iQuick = getValue("iQuick","str","POST","");
if ($iQuick == 'update'){
	$record_id = getValue("record_id", "arr", "POST", "");
	if($record_id != ""){
		for($i=0; $i<count($record_id); $i++){
			checkRowUser($fs_table,$field_id,$record_id[$i],$returnurl);
			$errorMsg="";		
			$myform = new generate_form();	//Call Class generate_form();
			$myform->removeHTML(0);	//Loại bỏ chuc nang thay the Tag Html
			//Insert to database
			# $myform->add("mnu_type","mnu_type" . $record_id[$i],0,0,"",1,"",0,"");
			$myform->add("mnu_name","mnu_name" . $record_id[$i],0,0,"",1,"",0,"");
			$myform->add("mnu_order","mnu_order" . $record_id[$i],0,0,"",0,"",0,"");
			$myform->add("mnu_check","mnu_check" . $record_id[$i],0,0,"",0,"",0,"");
			$myform->add("mnu_link","mnu_link" . $record_id[$i],0,0,"",0,"",0,"");
			# $myform->add("mnu_target","mnu_target" . $record_id[$i],0,0,"",0,"",0,"");
			

			//Add table
			$myform->addTable($fs_table);
			
			if($array_config["image"]==1){
				$upload_pic = new upload("picture" . $record_id[$i], $fs_filepath, $extension_list, $limit_size);
				if ($upload_pic->file_name != ""){
					$picture = $upload_pic->file_name;
					//resize_image($fs_filepath,$upload_pic->file_name,100,100,75);
					$myform->add("mnu_picture","picture",0,1,"",0,"",0,"");
				}
				if ($upload_pic->file_name != ""){
					//Delete file
					//delete_file($fs_table,"cat_id",$record_id[$i],"cat_picture",$fs_filepath);
					//Permision file
				}
				//Check Error!
				$errorMsg .= $upload_pic->show_warning_error();
			}
			
			$errorMsg .= $myform->checkdata();
			$errorMsg .= $myform->strErrorField ;	//Check Error!
			if($errorMsg == ""){
				$db_ex = new db_execute($myform->generate_update_SQL("mnu_id",$record_id[$i]));
			}
			//echo $myform->generate_update_SQL("mnu_id",$record_id[$i]);exit();
		}
		//echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
		//echo tt("Sửa đổi thành công");
	}
	redirect($returnurl);

}
?>