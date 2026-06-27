<?php
session_start();
include_once('check-session.php');
require_once('db/connex.php');

if(!isset($_GET['id'])){
    header('location:forum-index.php');
    exit;
}

$id = mysqli_real_escape_string($connex, $_GET['id']);

$sql = "SELECT * FROM forum WHERE forumId = '$id' AND utilisateur_Id = '{$_SESSION['id']}'";
$result = mysqli_query($connex, $sql);

if(mysqli_num_rows($result) != 1){
    header('location:forum-index.php');
    exit;
}

$deleteSql = "DELETE FROM forum WHERE forumId = '$id'";
mysqli_query($connex, $deleteSql);

header('location:forum-index.php');
exit;
?>
