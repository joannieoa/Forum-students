<?php
session_start();
include_once('check-session.php');
require_once('db/connex.php');

// 1. Vérifier que l'id existe
if(!isset($_GET['id'])){
    header('location:forum-index.php');
    exit;
}

$id = mysqli_real_escape_string($connex, $_GET['id']);

// 2. Vérifier que l'article appartient à l'utilisateur connecté
$sql = "SELECT * FROM forum WHERE forumId = '$id' AND utilisateur_Id = '{$_SESSION['id']}'";
$result = mysqli_query($connex, $sql);

if(mysqli_num_rows($result) != 1){
    header('location:forum-index.php');
    exit;
}

// 3. Supprimer l'article
$deleteSql = "DELETE FROM forum WHERE forumId = '$id'";
mysqli_query($connex, $deleteSql);

// 4. Retour au forum
header('location:forum-index.php');
exit;
?>
