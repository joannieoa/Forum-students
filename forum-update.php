<?php
session_start();
include_once('check-session.php');
require_once('db/connex.php');

if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:forum-index.php');
    exit;
}

foreach($_POST as $key=>$value){
    $$key = mysqli_real_escape_string($connex, $value);
}

$sql = "SELECT * FROM forum 
        WHERE forumId = '$id' 
        AND utilisateur_Id = '{$_SESSION['id']}'";
        
$result = mysqli_query($connex, $sql);

if(mysqli_num_rows($result) != 1){
    header('location:forum-index.php');
    exit;
}

$updateSql = "UPDATE forum 
              SET title = '$title', article = '$article'
              WHERE forumId = '$id'";

mysqli_query($connex, $updateSql);

header('location:forum-index.php');
exit;
?>
