<?php
session_start();

// 1. Vérifier que la requête est POST
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('location:forum-create.php');
    exit;
}

require_once('db/connex.php');

// 2. Sécuriser les données reçues
foreach($_POST as $key=>$value){
    $$key = mysqli_real_escape_string($connex, $value);
}

// 3. Récupérer l'ID de l'utilisateur connecté
$userId = $_SESSION['id'];

// 4. Préparer la requête d'insertion
$sql = "INSERT INTO forum (title, article, date, utilisateur_Id)
        VALUES ('$title', '$article', NOW(), '$userId')";

// 5. Exécuter et rediriger
if(mysqli_query($connex, $sql)){
    header('location:forum-index.php');
} else {
    echo "ERROR: " . mysqli_error($connex);
}
?>
