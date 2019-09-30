<?php
require_once 'funciones\autoload.php';

    $name= $_SESSION['name'];
    $lastName= $_SESSION['lastName'];
    $user= $_SESSION['user'];
    $email = $_SESSION['email'];
    $avatar =($_SESSION['avatar'] = null) ?$_SESSION['avatar'] : 'default.png' ;




//var_dump($_COOKIE);"<br>";


 ?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/home.css">
    <!---->
    <link rel="stylesheet" href="css/user.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <?php require_once('partials/header.php') ?>

    <div class="container">

      <div class="imagen-logo" >
      <img src="img\avatar\<?=$avatar?>" alt="Yo">
      </div>
      <div class="container" >
        <h1>Bienvenido!</h1>
          <p><?=($name.' '.$lastName) ?></p>
      </div>
      <div class="container">



        <ul class="lista-menu">
          <li class="menu">
            Mis Compras
          </li>
          <li class="menu">
            Favoritos
          </li>
          <li class="menu">
            Presupuestos
          </li>
          <li class="menu">
            Envios
          </li>
          <li class="menu">
            Mis Datos
          </li>
          <li class="menu">
            Seguridad
          </li>
        </ul>


        </div>
      </div>

        <?php require_once('partials/footer.php')?>
  </body>
</html>
