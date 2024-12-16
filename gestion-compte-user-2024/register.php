<?php 
session_start();

require_once './includes/db.php'; 
require_once './includes/function.php'; 
$errors=[];
if(isset($_POST)){

  //username
  if(empty($_POST['username']) || !preg_match("/^[a-zA-Z][a-zA-Z0-9_]{2,}+$/", $_POST['username'])){
    $errors['username']="Nom d'utilisateur non valide";
  }else{
    $username= $_POST['username'];
    $query="SELECT * from `gestion-compt-user-2024`.users where username= '$username'";
    $result=$pdo-> query($query);
       
    if($result->fetch()){
      $errors['username']='Cette utilisateur  existe deja';
    }
  }

  //email
  if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL )){
    $errors['email']="email non valide";
  }else{
    $email=$_POST['email'];
    $query="SELECT * from `gestion-compt-user-2024`.users where email= '$email'";
    $result=$pdo-> query($query);
    var_dump($result);
    if($result->fetch()){
      $errors['email']='Cette email existe deja';
    }
  }

  //password
  if(empty($_POST['password']) ){
  $errors['password']="password non valide";
  }else if($_POST['password'] !== $_POST['confirm_password']){
    $errors['password']="Vos mots de passe ne correspondent pas!!!";
  }

  if(empty($errors)){
    $query="INSERT INTO `users`(`username`, `email`, `password`, `confirmation_token`) VALUES (?,?,?,?)";
    $req=$pdo->prepare($query);
    $password=password_hash($_POST['password'], PASSWORD_BCRYPT);
    $token=generateToken(100);
    $req->execute([$_POST['username'], $_POST['email'],$password, $token]);
    $userId=$pdo->lastInsertId();



    $mail = $_POST['email'];
    echo   $subject = "Confirmation du compte";
    $message = "Afin de confirmer votre compte, merci de cliquer sur ce lien\n\nhttp://localhost/gestion-compte-user-2024/confirm?id=$userId&token=$token";

    // $message = "
    // <html>
    //   <head>
    //     <title>Confirmation du compte</title>
    //   <head>   
    //   <body>
    //     <p>Afin de confirmer votre compte, merci de cliquer sur ce lien
    //     <a style='color: #ff0000;' href='http://localhost/gestion-compte-user-2024/confirm?id=$userId&token=$token'>Lien pour confirmer votre compte</a></p>
    //   <body>
    // </html>";

    //
    $headers = '';
    
    //en voir du mail
    mail($mail, $subject, $message);

    $_SESSION['flash']['success']="compte creer avec success veuillez verifier votre boite mail afin de confirmer votre compte";

    header('location: login.php');
    exit();
  }
}
?>

<?php require_once './includes/header.php'; ?>


<div class="content">
  <div class="container">
    <div class="header">
      <h2>S'inscrire</h2>
    </div>
    <?php
      if (!empty($errors)) {
        echo '<div style="color:white; text-align: center; background-color:#ff6c6c;padding:2px 7px; margin-bottom:10px; font-size:23px;">' . reset($errors) . '</div>';
      }
    ?>
    <form action="" class="form" id="form" method="post" enctype="multipart/form-data">
      <div class="form-control">
        <label for="username">Nom d'utilisateur</label>
        <input type="text" id="username" placeholder="rostodev" name="username"  value=<?=isset($_POST['username'])? $_POST['username']: ''?> > 
  
      </div>

        

      <div class="form-control">
        <label for="email">Email</label>
        <input type="email" id="email" placeholder="rostodev@gmail.com" name="email" value=<?=isset($_POST['email'])? $_POST['email']: ''?>  >
      </div>

      <div class="form-control">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" autocomplete="off" value=<?=isset($_POST['password'])? $_POST['password']: ''?>>

      </div>

      <div class="form-control">
        <label for="confirm_password">Confirmation du mot de passe</label>
        <input type="password" id="confirm_password" name="confirm_password" autocomplete="off" value=<?=isset($_POST['confirm_password'])? $_POST['confirm_password']: ''?>>

      </div>
            

      <button type="submit"> S'inscrire</button>

    </form>

  </div>
</div>
<?php
require_once './includes/footer.php';
?>