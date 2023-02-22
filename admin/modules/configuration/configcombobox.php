<?
function get_config_combo($result,$combobox_name,$default_value){
	if (mysql_num_rows($result) > 0) mysql_data_seek($result,0);
?>
	<select name="<?=$combobox_name;?>" class="form">
		<option value="0">--[Select one Static Topic]--</option>
<?	
	while ($row = mysql_fetch_array($result)){
		if ($row["sta_id"] == $default_value){
			echo "<option value='" . $row["sta_id"] . "' selected>" . $row["sta_title"] . "</option>";
		}
		else{
			echo "<option value='" . $row["sta_id"] . "'>" . $row["sta_title"] . "</option>";
		}
	}
?>
	</select>
<? } ?>

<?
//Select Cat_id First Load
function get_config_first_load($result,$combobox_name,$default_value){
	if (mysql_num_rows($result) > 0) mysql_data_seek($result,0);
?>
	<select name="<?=$combobox_name;?>" class="form">
		<option value="0">--[Select one Cat_id Topic]--</option>
<?	
	while ($row = mysql_fetch_array($result)){
		if ($row['cat_id'] == $default_value){
			echo "<option value='" . $row['cat_id'] . "' selected>" . $row['cat_name'] . "</option>";
		}
		else{
			echo "<option value='" . $row['cat_id'] . "'>" . $row['cat_name'] . "</option>";
		}
	}
?>
	</select>
<? } ?>