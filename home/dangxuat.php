<?
// include("config.php");
if (isset($_COOKIE['UID'])) {
    unset($_COOKIE['UID']);
    unset($_COOKIE['UT']);
    unset($_COOKIE['PHPSESPASS']);
    setcookie('UID', null, -1, '/');
    setcookie('UT', null, -1, '/');
    setcookie('id_chat365', null, -1, '/');
    setcookie('chat365', null, -1, '/');
    setcookie('PHPSESPASS', null, -1, '/');
    $logged = 0;
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("Location: " . $_SERVER['HTTP_REFERER'] . "");
        die();
    } else {
        header("Location: /");
        die();
    }
} else {
    header("Location: /");
    die();
}
