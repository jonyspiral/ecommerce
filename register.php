<?php
require_once('funciones/autoload.php');

if(estaElUsuarioLogeado()){
     header('location:miPerfil.php');
 }
$errorArchivo = '';

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
      $nombreArchivo = '';
    	//verifico si el archivo se subio al temporal de php

      if ($_FILES['avatar']['error'] === 0) {

        $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

        if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
          $errorArchivo = 'Formato de archivo invalido';
        } else {
          $nombreArchivo = subirAvatar($_FILES['avatar'], $email);
        }
      }


      //deberia hacerse solo si no hay errores

      $usuario = [
        'user'=> $user,
        'email' => $email,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'avatar' => $nombreArchivo,
      ];
      	//me traigo el archivo entero

      if (!file_exists('database')) {
        mkdir('database');
      }


      //me traigo el archivo entero
  		$archivo = file_get_contents('database/usuarios.json');

  		$usuarios = json_decode($archivo, true);

  		$usuarios[] = $usuario;

  		$usuariosJson = json_encode($usuarios);

  		file_put_contents('database/usuarios.json', $usuariosJson);

      $errores = validarLogin($_POST);

/*verifico errores y redirijo a mi perfil*/
      if (!$errores) {
          header('location:miPerfil.php');
    }

  	/*	header('location:login.php');*/
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
    <title><Registrese</title>
  </head>
  <body>
    <div class="container">

    <a id="logo" href="home.php">
    <img src="img\logo.png" alt="go to home" class="center logo" style="width:20%;"  >
    </a>




<form class="login" action="register.php" method="post" enctype="multipart/form-data">
  <!-- files -->

  <div class="dentro">
    <img src="img\avatar\default.png" alt="Me" class="center logo" style="width:40%; " >

      <input type="file" accept="img\avatar\default.png" name="avatar"  class="file-input" id="avatar">
      <p> <?= (isset($errores['avatar']) ? $errores['avatar'] : '') ?></p>
  </div>

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
    <button class="center btn-primary btn"  type="submit" >Send</button>
  </div>
</form>
  </div>

  </body>
</html>
