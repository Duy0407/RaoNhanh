<?
session_start();
require_once("../functions/functions.php"); 
require_once("../classes/database.php");
$id   = getValue("id_vl","int","POST",0);
$id   = (int)$id;
$id_city   = getValue("id_city","int","POST",0);
$id_city   = (int)$id_city;

$id_tv   = getValue("id_tv","int","POST",0);
$id_tv   = (int)$id_tv;
$id_cit   = getValue("id_cit","int","POST",0);
$id_cit   = (int)$id_cit;

$uid = $_COOKIE['UID'];
// var_dump($id);die();
$time = time();
if ($id != 0) {
    $db_ex = new db_query("INSERT INTO luu_vl(use_id,vieclam_id,save_time,cit_id,luu_type) VALUES ($uid, $id, $time, $id_city, 1)");
}
if ($id_tv != 0){
$db_tv = new db_query("INSERT INTO luu_vl(use_id,vieclam_id,save_time,cit_id,luu_type) VALUES ($uid, $id_tv, $time, $id_cit, 2)");
}
?>