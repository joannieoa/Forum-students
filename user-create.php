<?php
$title="User register";
include_once('header.php');
?>
    <h1>Create User</h1>
    <form action="user-store.php" method="post">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" required maxlength="40">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" required maxlength="40">
        <label for="dob">Date of birth</label>
        <input type="date" id="dob" name="dateOfBirth">
        <label for="pwd">Password</label>
        <input type="password" name="password" id="pwd" required minlength="5">
        <input type="submit" value="Save" class="btn">
    </form>
<?php
include_once('footer.php');
?>