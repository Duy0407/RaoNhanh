<?php
session_start();
    $data_img = $_POST['scr'];
    if(isset($_SESSION['data_img'])){
        $data_img1 = explode(';',$_SESSION['data_img']);
        $i = array_search($data_img,$data_img1);
        unset($data_img1[$i]);
        $_SESSION['data_img'] = implode(';', $data_img1);
        unlink('..'.$data_img);
        unlink("..".str_replace("detail","fullsize",$data_img));
        echo $_SESSION['data_img'];
    }
?>