<?php
$title = 'Forum';
include_once('header.php');
require_once('db/connex.php');
?>

<h1>Welcome to the Maisonneuve College student forum</h1>
<a href="forum-create.php" class="btn btn-primary">Add Article</a>
<br><br>


<?php

$sql = "SELECT forum.*, utilisateur.name 
        FROM forum
        INNER JOIN utilisateur 
        ON forum.utilisateur_Id = utilisateur.utilisateurId
        ORDER BY forum.date DESC";

$result = mysqli_query($connex, $sql);

$count = mysqli_num_rows($result);
?>
<?php if($count > 0): ?>

<?php 
while($row = mysqli_fetch_assoc($result)): ?>
    <div class="article">
        <h2><?= $row['title']; ?></h2>
        <small>Posted by: <?= $row['name']; ?> on <?= $row['date']; ?></small>
        <p><?= $row['article']; ?></p>

        <?php if(isset($_SESSION['id']) && $_SESSION['id'] == $row['utilisateur_Id']): ?>
            <a href="forum-edit.php?id=<?= $row['forumId']; ?>" class="btn btn-warning">Edit</a>
            <a href="forum-delete.php?id=<?= $row['forumId']; ?>" class="btn btn-danger">Delete</a>
        <?php endif; ?>
</div>

    <?php endwhile; ?>

<?php else: ?>

    <p>No articles yet.</p>

<?php endif; ?>


<?php include_once('footer.php'); ?>
