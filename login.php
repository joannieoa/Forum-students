<?php
$title ='Login';
include_once('header.php');
$msg = null;
if(isset($_GET['msg']) && $_GET['msg'] == 1){
    $msg = "Check username";
}elseif(isset($_GET['msg']) && $_GET['msg'] == 2){
    $msg = "Check Password";
}
?>
    <h1>Login</h1>
        <form action="auth.php" method="post">
            <?= "<span class='text-danger'>".$msg."</span>"; ?>
            <label for="username">Username</label>
            <input type="email" name="username" id="username">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Login">
        </form>
<?php include_once('footer.php');?>