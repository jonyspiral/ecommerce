<?php
require_once('funciones/autoload.php');

if(estaElUsuarioLogeado()){
     header('location:miPerfil.php');
 }

$user ='';
$email= '';
$password= '';
$confirmPassword = '';


$errores = [
  'user' => '',
    'email' => '',
    'password' => '',
    'confirmPassword' => ''
];


if ($_POST) {
    $user = $_POST ['user'];
    $email = $_POST ['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    	//verifico si el archivo se subio al temporal de php
      $errores = validarLogin($_POST);

  //verifico errores y redirijo a mi perfil
      if (!$errores) {
          header('location:miPerfil.php');
    }
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/login.css">
    <meta charset="utf-8">
    <title><registrese</title>
  </head>
  <body>
    <div class="container">

    <a id="logo" href="home.php">
    <img src="img\logo.png" alt="go to home" class="navbar-brand" style="width:10%; border-radius: 15%;"  >
    </a>




<form class="login" action="register.php" method="post" enctype="multipart/form-data">
  <!-- files -->
  <a id="logo" href="avatar" name ="avatar">
    <img src="img\avatar\default.png" alt="Me" class="navbar-brand" style="width:35%; border-radius: 15%;"   type="file" >
    </a>


  <!--<label for="avatar">Subir avatar</label>-->

  <input   'img\avatar\default.png'"type="file"  id="avatar" name="avatar" class="btn-primary btn">
  <p> <?= (isset($errores['avatar']) ? $errores['avatar'] : '') ?></p>

  <!--<label for="user">Enter user</label>-->
      <input type="text" class="form-control" id="user" placeholder="Enter user"   name="user" value="<?= $user ?>" >
      <p> <?= (isset($errores['user']) ? $errores['user'] : '') ?></p>


    <!--<label for="email">Enter Email</label>-->
    <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email"  value="<?= $email ?>">
  <p> <?= (isset($errores['email']) ? $errores['email'] : '') ?></p>



    <!--<label for="contraseña">Enter Password</label>-->
  <input class="form-control" id="password" placeholder="Enter password" name="password" value="">
  <p> <?= (isset($errores['password']) ? $errores['password'] : '') ?></p>

  <!--<label for="$confirmPassword">Confirm Password</label>-->
  <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" name="confirmPassword" value="">
  <p> <?= (isset($errores['confirmPassword']) ? $errores['confirmPassword'] : '') ?></p>

  <div class="button">
    <button class="btn-primary btn"  type="submit" >Send</button>
  </div>
</form>
  </div>

  </body>
</html>
