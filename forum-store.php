<?php
session_start();

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:forum-create.php');
    exit;
}

require_once('db/connex.php');

foreach($_POST as $key=>$value){
    $$key = mysqli_real_escape_string($connex, $value);
}

$userId = $_SESSION['id'];

$sql = "INSERT INTO forum (title, article, date, utilisateur_Id)
        VALUES ('$title', '$article', NOW(), '$userId')";

if(mysqli_query($connex, $sql)){
    header('location:forum-index.php');
} else {
    echo "ERROR: " . mysqli_error($connex);
}
?>
