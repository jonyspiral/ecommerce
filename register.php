<?php
require_once('funciones/autoload.php');

if(estaElUsuarioLogeado()){

     header('location:miPerfil.php');
 }
$errorArchivo = '';

$user ='';
$email= '';
$name ='';
$lastName='';
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
    $name = $_POST ['name'];
    $lastName =$_POST ['lastName'];
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
        'name'=> $name,
        'lastName'=>$lastName,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'avatar' => $nombreArchivo,
            ];

      	//me traigo el archivo entero

      if (!file_exists('database')) {
        mkdir('database');
      }

      //creo el archivo usuarios.json
      if( file_exists("usuarios.json") == true ){

        $archivo = fopen("usuarios.json", "w+b");
        if( $archivo == false )
     echo "Error al crear el archivo";
   else
     echo "El archivo ha sido creado";
   fclose($archivo);   // Cerrar el archivo
    }

//No deberia crear el usuarios.json tambien?
      //me traigo el archivo entero
  		$archivo = file_get_contents('database/usuarios.json');

  		$usuarios = json_decode($archivo, true);


  		$usuarios[] = $usuario;

  		$usuariosJson = json_encode($usuarios);

  		file_put_contents('database/usuarios.json', $usuariosJson);

      $errores = validarLogin($_POST);

/*verifico errores y redirijo a mi perfil*/
if (!$errores) {

  $archivo = file_get_contents('database/usuarios.json');
  $usuarios = json_decode($archivo, true);

foreach ($usuarios as $usuario) {
            if (($usuario['email'] == $email )&& password_verify($password, $usuario['password'])) {
                //aqui es donde encontré al usuario y lo logeo
                $_SESSION['email'] = $email;
                $_SESSION['name'] = $name;
                $_SESSION['lastName'] = $lastName;
                $_SESSION['avatar'] = $usuario['avatar'];
                $_SESSION['user']= $usuario['user'];
                //si checkaron el recuerdame
                if (isset($_POST['mantener'])) {
                    //guardo la cookie del email
                    setcookie('mantener', $email, time() + 60*60*24*7 );
                }
                //luego redirijo a miPerfil
                header('location:miPerfil.php');
            }
          }
//deberia de buscar al usuario en la base de datos
    //y si no esta lanzar un error
    $errores['email'] = 'Usuario o clave incorrectos';
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


      <input type="text" class="form-control" id="user" placeholder="Enter user"   name="user" value="<?= $user ?>" required >
      <p> <?= (isset($errores['user']) ? $errores['user'] : '') ?></p>

      <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email"  value="<?= $email ?>" required>
      <p> <?= (isset($errores['email']) ? $errores['email'] : '' ) ?></p>

      <input type="text" class="form-control" id="name" placeholder="Enter name"   name="name" value="<?= $name ?>" >
      <p></p>

      <input type="text" class="form-control" id="lastName" placeholder="Enter lastName"   name="lastName" value="<?= $lastName ?>" >
      <p></p>

      <input class="form-control" id="password" placeholder="Enter password" name="password" value="">
      <p> <?= (isset($errores['password']) ? $errores['password'] : '') ?></p>

      <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" name="confirmPassword" value="">
      <p> <?= (isset($errores['confirmPassword']) ? $errores['confirmPassword'] : '') ?></p>

  <div class="button">
    <input type="checkbox" id="mantener" name="mantener" value="">
    <button class="center btn-primary btn"  type="submit" >Send</button>
  </div>
</form>
  </div>

  </body>
</html>
