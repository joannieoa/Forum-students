<?php
$title = "Add Article";
include_once('header.php');
include_once('check-session.php');
?>

<h1>Add a new article</h1>

<form action="forum-store.php" method="post">
    <label for="title">Title</label>
    <input type="text" name="title" id="title" required maxlength="100">

    <label for="article">Article</label>
    <textarea name="article" id="article" rows="6" required></textarea>

    <input type="submit" value="Save" class="btn">
</form>

<?php include_once('footer.php'); ?>
