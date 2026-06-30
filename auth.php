<?php
session_start();
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:login.php');
  }
  
  require_once('db/connex.php');

foreach($_POST as $key=>$value){
    $$key= mysqli_real_escape_string($connex, $value);
  }

$sql = "SELECT * FROM utilisateur WHERE username = '$username'";

$result = mysqli_query($connex, $sql);

$count = mysqli_num_rows($result);
if($count == 1){

    $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $dbPassword = $user['password'];

    if(password_verify($password, $dbPassword)){
    session_regenerate_id();
    $_SESSION['id'] = $user['utilisateurId'];
    $_SESSION['name'] = $user['name'];
    $_SESSION['fingerPrint'] = md5($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR']);
    header('location:forum-index.php');
    }else{
        header('location:login.php?msg=2');
    }

}else{
    header('location:login.php?msg=1');
}
?>