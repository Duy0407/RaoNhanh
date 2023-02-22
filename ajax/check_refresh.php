<?
	include('../home/config.php');

	$newid = getValue('newid','int','POST',0);
	if(isset($_COOKIE['UID']) && $newid != 0)
	{
		$sl = new db_query("SELECT new_update_time FROM new WHERE new_user_id = '".$_COOKIE['UID']."' AND new_count_refresh = 1");
		if(mysql_num_rows($sl->result) == 0)
		{
			echo 0;
		}
		else{
			$row_sl = mysql_fetch_assoc($sl->result);
			$time_back = strtotime("+4 hours",strtotime(date("H:i",$row_sl['new_update_time'])));
			$time = strtotime(date('H:i',time()));
			
			if($time < $time_back)
			{
				echo date('H:i',$time_back);
			}
			// else
			// {
			// 	echo 0;
			// }
		}
		
	}
?>