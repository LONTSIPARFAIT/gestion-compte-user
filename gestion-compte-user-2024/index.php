<?php
 session_start();
 require_once './includes/header.php';
?>

<h1>Hello <?= isset($_SESSION["auth"]['username']) ? $_SESSION['auth']['username'] : " " ?></h1>
<?php
require_once './includes/footer.php';
?>