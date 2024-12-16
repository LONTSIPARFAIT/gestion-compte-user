<?php
session_start();
require_once './includes/db.php'; 

$userId=$_GET['id'];
$token=$_GET['token'];

        $query="SELECT * from `gestion-compt-user-2024`.users where id= '$userId'";
       $result=$pdo-> query($query);
       $user=$result->fetch();
       echo "<pre>";
       print_r($user);
       echo "</pre>";
       if($user && $token ==$user['confirmation_token']){
            $query="UPDATE `users` SET `confirmation_token`=NULL, `confirmed_at`=Now() WHERE id='$userId'";
           $result=$pdo-> query($query);
           $user=$result->fetch();
        // var_dump($result);
    $_SESSION['flash']['success']="Votre compte ete bien valider";
    $_SESSION['auth']="User";
    header('location:index.php');
}else{
        $_SESSION['flash']['error']="Ce compte n\,existe pas";
    }
?>