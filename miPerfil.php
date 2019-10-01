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

      foreach ($usuarios as $key => $usuario) {
//aqui es donde encontré al usuario
                  if ($usuario['email'] == $email ) {
                    $usuarios[$key]['avatar'] = $nombreArchivo;


              //  $usuario['avatar'] =$nombreArchivo;
            $usuariosJson= json_encode($usuarios);
              file_put_contents('database/usuarios.json', $usuariosJson);
            }

        }//aca termina el foreach
}else {
  //aca declaro $errores
  $errores ='Hay un error al subir el archivo '.$_FILES['avatar']['error'];
}


 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

     <title>Mi perfil</title>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
     <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/login.css">
 <link rel="stylesheet" href="css/home.css">
 </head>

  <body >
<?php require_once('partials/header.php') ?>
<div  class=" containerExt">
    <div class="containerExt maxViewport styleLogin">


      <div class="containerExt">

          <div class="containerDentro ">
            <h1 class="styleTitle center" >Bienvenido! <?=($name.' '.$lastName) ?></h1>
            <img class="containerDentro  "src="img\avatar\<?=$avatar?>" alt="Yo"s style="width:100% height:100px border-radius: 15px 15px 15px 15px;">
          </div>

      <form class="" action="miPerfil.php" method="post" enctype="multipart/form-data" style="border-radius: 15px 15px 15px 15px;";>
          <input type="file" accept="img\avatar\<?=$avatar?>" name="avatar"  class=" borderRadiusUP file-input" id="avatar">
          <p> <?= (isset($errores) ? $errores : '') ?></p>
          <input class="center btn-primary borderRadiusUP btnHalf" type="submit" value="2- Enviar imagen" style="margin-bottom: 14px;">


        <ul class="center">
          <li class="center btn-primary btn">
            Mis Compras
          </li>
          <li class="center btn-primary btn">
            Favoritos
          </li>
          <li class="center btn-primary btn">
            Presupuestos
          </li>
          <li class="center btn-primary btn">
            Envios
          </li>
          <li class="center btn-primary btn">
            Mis Datos
          </li>
          <li class="center btn-primary btn">
            Seguridad
          </li>
        </ul>

      </form>

      </div>

      </div>
</div>
        <?php require_once('partials/footer.php')?>

  </body>
</html>
