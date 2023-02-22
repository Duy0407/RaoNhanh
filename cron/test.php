<?
include("../home/config.php");
$string = "http://graph.facebook.com/100012035432326/picture?width=50&height=50&redirect=false&" . time();
$data = json_decode(file_get_contents($string), true);
$url = $data["data"]["url"];
$path = $idUser.'.jpg';
file_put_contents ($path, file_get_contents($url));
echo $maches[0];
?>