<?php
if($_SERVER['REQUEST_METHOD'] != 'POST'){
  header('location:user-create.php');
}

require_once('db/connex.php');

foreach($_POST as $key=>$value){
  $$key= mysqli_real_escape_string($connex, $value);
}

$password = password_hash($password, PASSWORD_BCRYPT, ['cost'=> 10]);

$sql = "INSERT INTO utilisateur (name, username, password, dateOfBirth) values ('$name', '$username', '$password', '$dateOfBirth')";

if(mysqli_query($connex, $sql)){
    header('location:login.php');
}else{
    echo "ERROR ".mysqli_error($connex);
}
?>