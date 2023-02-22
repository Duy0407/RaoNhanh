<?
$isAdmin = isset($_SESSION["isAdmin"]) ? intval($_SESSION["isAdmin"]) : 0;

?>
<div class="header">
	<table cellpadding="0" cellspacing="0"  width="100%">
		<tr>
            <td><button class="refresh_home">F5 home</button></td>
			<td align="right">
				Xin chào! <span id="acc_name"><?=getValue("userlogin","str","SESSION","")?></span>
				&nbsp;|&nbsp;
				<span class="m" data-tab-id="-1"><a href="resource/profile/myprofile.php" onclick="return false"><?=translate_text("Thông tin tài khoản")?></a></span>
				&nbsp;|&nbsp;
				<?
				//kiem tra xem neu la o tren localhost thi moi co quyen cau hinh
				$url = $_SERVER['SERVER_NAME'];
				if($isAdmin==1 && ($url == "localhost" || strpos($url,"192.168.1")!==false)){
				?>
				<span class="m" data-tab-id="-2"><a href="resource/configadmin/configmodule.php" onclick="return false"><?=translate_text("Cấu hình website")?></a></span>
				&nbsp;|&nbsp;
				<?
				}
				?>
				<img border="0" align="absmiddle" width="20" height="20" src="resource/images/logoff.gif" />
				<a href="resource/logout.php"><?=translate_text("Thoát")?></a>
			</td>
			<td>&nbsp;</td>
		</tr>
	</table>
</div>