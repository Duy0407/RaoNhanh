
<?
session_start();
include("config_vl.php");
if (isset($_POST["btn_submit"])) {
	$checkbox = getValue("checkbox","str","POST","");
	$username = $_POST["username"];
	// $password = $_POST["password"];
	$password = getValue("password","str","POST","");
	$password = trim($password);
	$password = replaceMQ($password);
	$password = md5($password."raonhanh365");
	if ($username == "" || $password =="") {
		header('Location: /dangnhap-vl.html');
	}else{
		$db_qr = new db_query("select * from user where usc_account = '$username' and usc_pass = '$password' ");
		$data = mysql_fetch_assoc($db_qr->result);
		if ($data==0) {
			echo "tên đăng nhập hoặc mật khẩu không đúng !";
		}else{
			if(empty($checkbox)){
				setcookie('UT', 1 ,time() + 24*3600,'/');
				setcookie('UID', $data['usc_id'] ,time() + 24*3600,'/');
				setcookie('PHPSESPASS', $password ,time() + 24*3600,'/');
			  }
			   else {
				setcookie('UT', 1 ,time() + 365*24*3600,'/');
				setcookie('UID', $data['usc_id'] ,time() + 365*24*6000,'/');
				setcookie('PHPSESPASS', $password ,time() + 365*24*6000,'/');
			  }
			header('Location: /viec-lam.html');
		}
	}
}
?>