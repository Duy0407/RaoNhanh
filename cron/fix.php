<?
include("config.php");
$db_qr = new db_query("SELECT new_des_id,new_id, COUNT(*) FROM new_description GROUP BY new_id HAVING COUNT(*) > 1");
While($row = mysql_fetch_assoc($db_qr->result))
{
   $db_qrs = new db_query("SELECT new_des_id FROM new_description WHERE new_id = '".$row['new_id']."' ORDER BY new_des_id ASC LIMIT 1");
   If($rows = mysql_fetch_assoc($db_qrs->result))
   {
      echo $rows['new_des_id']."<br/>";
      $db_ex = new db_execute("DELETE FROM new_description WHERE new_des_id = ".$rows['new_des_id']."");
      unset($db_ex,$rows);
   }
   unset($db_qrs,$row);
}
?>