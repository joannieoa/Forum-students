<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=  $title; ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <?php if(isset($_SESSION['id'])): ?>
            <div style="text-align:right; margin-bottom:15px;">
                <a href="logout.php" class="btn btn-danger">Logout</a>
            </div>
        <?php endif; ?>

    <nav>
        <ul>
            <li><a href="forum-index.php">Home</a></li>
            <li><a href="user-create.php">Register</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <main></main>