<?php
require_once 'funciones\autoload.php';

    $name= $_SESSION['name'];
    $lastName= $_SESSION['lastName'];
    $user= $_SESSION['user'];
    $email = $_SESSION['email'];
    $nombreArchivo = '';

  if ($_SESSION['avatar']) {
      $avatar =  $_SESSION['avatar'] ;

    }else{
    $avatar = 'default.png';
}


    if ($_FILES['avatar']['error'] === 0) {

      $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

      if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
        $errorArchivo = 'Formato de archivo invalido';
      } else {
        $nombreArchivo = subirAvatar($_FILES['avatar'], $email);


      }
        //aca meter todolo del if error=== 0
        $archivo = file_get_contents('database/usuarios.json');
        $usuarios = json_decode($archivo, true);

        var_dump($email);
        foreach ($usuarios as $key => $usuario) {

                  if (($usuario['email'] == $email ) {
//aca quiero poner en el array el avatar . me da error.
               //aqui es donde encontré al usuario
              //  $usuario['avatar'] =$nombreArchivo;
              //file_put_contents('database/usuarios.json', $usuariosJson);
            }

        }//aca termina el foreach
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
    <link rel="stylesheet" href="css/home.css">
    <!---->

    <link rel="stylesheet" href="css/user.css">

    <meta charset="utf-8">
    <title></title>
  </head>
  <body >
<div  class=" containerExt">


    <?php require_once('partials/header.php') ?>

    <div class="containerExt maxViewport styleLogin">


      <div class="containerExt">
        <img class="containerDentro logo"src="img\avatar\<?=$avatar?>" alt="Yo"s style="width: 30%;">


        <form class="" action="miPerfil.php" method="post" enctype="multipart/form-data">
      <input type="file" accept="img\avatar\<?=$avatar?>" name="avatar"  class="file-input" id="avatar">

      <p> <?= (isset($errores['avatar']) ? $errores['avatar'] : '') ?></p>
      <input class="center btn-primary btn" type="submit" value="Enviar datos" >
      <?php var_dump($_FILES); ?>

    </form>
      </div>
      <div class="containerExt" >

        <h1 class="" >Bienvenido! <?=($name.' '.$lastName) ?></h1>

      </div>
      <div class="containerExt center">



        <ul class="lista-menu">
          <li class="form-control btn-primary btn">
            Mis Compras
          </li>
          <li class="form-control btn-primary btn">
            Favoritos
          </li>
          <li class="form-control btn-primary btn">
            Presupuestos
          </li>
          <li class="form-control btn-primary btn">
            Envios
          </li>
          <li class="form-control btn-primary btn">
            Mis Datos
          </li>
          <li class="form-control btn-primary btn">
            Seguridad
          </li>
        </ul>


        </div>
      </div>

        <?php require_once('partials/footer.php')?>
        </div>
  </body>
</html>
