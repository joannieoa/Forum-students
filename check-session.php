<?php

if(!isset($_SESSION['id'])){
    header('location:login.php');
    exit();
}

if(!isset($_SESSION['fingerPrint'])){
    header('location:login.php');
    exit();
}

if($_SESSION['fingerPrint'] !== md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'])){
    header('location:login.php');
    exit();
}
