<?php
require_once 'funciones/autoload.php';
if(!estaElUsuarioLogeado()){
    header('location:login.php');
}

    $name= $_SESSION['name'];
    $lastName= $_SESSION['lastName'];
    $user= $_SESSION['user'];
    $email = $_SESSION['email'];
    $avatar= $_SESSION['avatar'] ;
    $nombreArchivo = '';

  if ($_SESSION['avatar']) {
      $avatar =  $_SESSION['avatar'] ;
    }else{
    $avatar = 'default.png';
}

  //var_dump( $_POST);
//var_dump( $_SESSION['avatar']);
if ($_POST){

    if ($_FILES['avatar']['error'] === 0) {

      $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

      if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {
        $errorArchivo = 'Formato de archivo invalido';
      } else {
        $nombreArchivo = subirAvatar($_FILES['avatar'], $email);
        $_SESSION['avatar']=$nombreArchivo;
      }
        //aca meter todolo del if error=== 0
        $archivo = file_get_contents('database/usuarios.json');
        $usuarios = json_decode($archivo, true);
//var_dump($usuarios);
      foreach ($usuarios as $key => $usuario) {
//aqui es donde encontré al usuario
                  if ($usuario['email'] == $email ) {
                  $usuarios[$key]['avatar'] = $nombreArchivo;
              //  $usuario['avatar'] =$nombreArchivo;

            $usuariosJson= json_encode($usuarios);
              file_put_contents('database/usuarios.json', $usuariosJson);
          $_SESSION['avatar']=$nombreArchivo;
            header('location:miPerfil.php');
            }

        }//aca termina el foreach
}else {
  //aca declaro $errores
  $errores ='Hay un error' .$_FILES['avatar']['error'].'al subir el archivo ';
}// aca termina el if de $_FILES

}

 ?>
 <!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

    <title>mis Datos</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src=”prefixfree.min.js” type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<link rel="stylesheet" href="css/styles.css">
 <link rel="stylesheet" href="css/master.css">
 <link rel="stylesheet" href="css/login.css">
</head>

 <body style="  display: block;  align-content: center;">
   <?php require_once('partials/header.php') ?>
   <div id="padre"  class="contPadreFlex" style="width: 96%; margin: 2%; overflow:hidden;" >
     <div id="main" class=" styleLogin" style="  margin: 2%;" >
       <h1 class="styleTitle center" >Bienvenido!</br> <?=($name.' '.$lastName) ?></h1>

               <div id="containerLogo">

                 <img class=""src="img\avatar\<?=$avatar?>" alt="Yo"style=" ">
               </div>


<form class="login" action="misDatos.php" method="post">
  
  </a>
  <!-- files -->
  <input type="file" name="imagen" />
  <label for="Usuario">Usuario</label>
  <input class="form-control" placeholder="Nombre De Usuario" type="text" name="usuario" value="">
  <label for="">Email</label>
    <input class="form-control" placeholder="Email"type="email" name="email" value="">
    <label for="contraseña">Contraseña</label>
  <input class="form-control" placeholder="Contraseña" type="password" name="contraseña" value="">

  <div class="button">
      <button class="btn-link"  type="button" name="button">Enviar</button>

  </div>




</form>
</div>
</div>
  </body>
</html>
