<?
if (isset($_GET['url'])) {
	$urlcano = $_GET['url'];
	header("HTTP/1.1 301 Moved Permanently"); 
	header("Location: $urlcano");
	exit();
}
?>