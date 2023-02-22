<?
include("config.php");
if (isset($_COOKIE['UID'])) {
    unset($_COOKIE['UID']);
    unset($_COOKIE['UT']);
    unset($_COOKIE['PHPSESSID']);
    unset($_COOKIE['PHPSESPASS']);
    setcookie('UID', null, -1, '/');
    setcookie('UT', null, -1, '/');
    setcookie('PHPSESSID', null, -1, '/');
    setcookie('PHPSESPASS', null, -1, '/');
    $logged = 0;

      header("Location: /viec-lam.html");
      die();
} else {
   header("Location: /viec-lam.html");
   die();
}
?>