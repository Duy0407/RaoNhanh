<div class="left_title">
	<?= translate_text("Danh mục quản trị") ?>
</div>
<?
$isAdmin = isset($_SESSION["isAdmin"]) ? intval($_SESSION["isAdmin"]) : 0;
$user_id = isset($_SESSION["user_id"]) ? intval($_SESSION["user_id"]) : 0;
$sql = '';
if ($isAdmin != 1) {
	$sql = ' INNER JOIN admin_user_right ON(adu_admin_module_id  = mod_id AND adu_admin_id = ' . $user_id . ')';
}
$db_menu = new db_query("SELECT * FROM modules " . $sql . " ORDER BY mod_order ASC");
?>
<ul id="test-list">
	<?
	$i = 0;
	$id_tab = 1;
	while ($row = mysql_fetch_assoc($db_menu->result)) {
		if (file_exists("modules/" . $row["mod_path"] . "/inc_security.php") === true) {
			$i++;
	?>
			<li id="listItem_<?= $row["mod_id"] ?>">
				<table cellpadding="5" cellspacing="0" width="100%">
					<tr height="30">
						<td width="10"><img src="resource/images/show.png" style="cursor:pointer" id="image_<?= $i ?>" onclick="showhidden(<?= $i ?>);" title="<?= translate_text("Xem danh sách") ?>" /></td>
						<td class="t"><span style="cursor:pointer; font-weight: bold; color: #1D5994;" onclick="showhidden(<?= $i ?>);"><?= $row["mod_name"] ?></span></td>
						<td width="10"><img src="resource/images/arrow.png" title="<?= translate_text("Move") ?>" class="handle" /></td>
					</tr>
					<tbody id="showmneu_<?= $i ?>" bgcolor="#FFFFFF" style="display:none">
						<?
						//$id_tab = $row["mod_id"];
						$title_tab = $row["mod_name"];
						$arraySub = explode("|", $row["mod_listname"]);
						$arrayUrl = explode("|", $row["mod_listfile"]);

						foreach ($arraySub as $key => $value) {
							$url = isset($arrayUrl[$key]) ? $arrayUrl[$key] : '#';
						?>
							<tr>
								<td width="6" align="center"><img src="resource/images/4.gif" border="0" /></td>
								<td colspan="3" class="m" data-tab-id="<?= $id_tab ?>" data-tab-title="<?= $title_tab ?>">
									<a onclick="return false" target="_blank" href="modules/<?= $row["mod_path"] ?>/<?= $url ?>"><?= $value ?></a>
								</td>
							</tr>
						<?
							$id_tab++;
						}
						?>
					</tbody>
				</table>
			</li>
	<?
		}
	}
	?>
</ul>
<script language="javascript">
	function showhidden(divid) {
		var object = document.getElementById("showmneu_" + divid);
		var objectimg = document.getElementById("image_" + divid);
		if (object.style.display == 'none') {
			object.style.display = '';
			objectimg.src = 'resource/images/hidden.png';
		} else {
			object.style.display = 'none';
			objectimg.src = 'resource/images/show.png';
		}
	}
</script>