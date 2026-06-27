<?php
$title = "Edit Article";
include_once('header.php');
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

$article = mysqli_fetch_assoc($result);
?>

<h1>Edit Article</h1>

<form action="forum-update.php" method="post">
    <input type="hidden" name="id" value="<?= $article['forumId']; ?>">

    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="<?= $article['title']; ?>" required>

    <label for="article">Article</label>
    <textarea name="article" id="article" rows="6" required><?= $article['article']; ?></textarea>

    <input type="submit" value="Update" class="btn">
</form>

<?php include_once('footer.php'); ?>
