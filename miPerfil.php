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

//var_dump($usuario);

$email=trim( $_POST ['email']);
$password=$_POST['password'];
$user= $_POST ['user'];

  //aca empieza la validacion
    //$errores = validarLogin($_POST);
  //$errores = [];

    //valido los campos de login y register

    if (isset($user)){

        if (strlen($user) === 0) {
           $errores['user'] = 'Escribe un usuario';
      }
    }

    if (strlen($email) === 0) {
          $errores['email'] = 'Escribe el email';
      } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errores['email'] = 'El email tiene formato errado';
    }


  if (!$errores) {

    $archivo = file_get_contents('database/usuarios.json');
    $usuarios = json_decode($archivo, true);
    foreach ($usuarios as $usuario) {
                if ($usuario['email'] == $email ){

                  $usuario ['user']= $user;
                    $usuario ['name']= $name;
              $usuario ['lastName']= $lastName;


}

                  $usuariosJson = json_encode($usuarios);

                  file_put_contents('database/usuarios.json', $usuariosJson);
                  //luego redirijo a miPerfil
                        //var_dump($_SESSION['avatar']);"<br>";

            echo "los cambios fueron ok";



            //deberia de buscar al usuario en la base de datos
      //y si no esta lanzar un error

  }
    //  aca termina
}
}

 ?>
 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
       <meta charset="utf-8">
       <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

     <title>Mi perfil</title>

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
    <div id="main" class=" styleLogin padd2" style="  margin: 2%;" >


      <div class="containerExt" style="
    justify-content: center;
    display: flex;
    flex-direction: column;
    align-items: center;
">
  <h1 class="styleTitle center" >Bienvenido!</br> <?=($name.' '.$lastName) ?></h1>

          <div id="containerLogo">

            <img class=""src="img\avatar\<?=$avatar?>" alt="Yo"style=" ">
          </div>
<div class="">


      <form class="" action="miPerfil.php" method="post" enctype="multipart/form-data" >
          <input type="file" accept="img\avatar\<?=$avatar?>" name="avatar"  class=" borderRadiusUp file-input" id="avatar"style="width:100%;">
          <p> <?= (isset($errores) ? $errores : '') ?></p>
          <!--<input class="center btn-primary borderRadiusDown btnHalf" type="submit" value="2- Enviar imagen" style="width:200px; margin-bottom: 14px;">-->
    <!--  <button class="center btn-primary borderRadiusDown btnHalf" type="submit" value="2- Enviar imagen" style="width:200px; margin-bottom: 14px;"name="button">2- Enviar imagen </button>
  </form>
    </div>
    <div class="">


<form class="" action="miPerfil.php" method="post" >-->

        <input type="text" class="form-control" id="user" placeholder="Enter user"   name="user" value="<?= $user ?>" required >
        <p> <?= (isset($errores['user']) ? $errores['user'] : '') ?></p>

        <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" name="email"  value="<?= $email ?>" required>
        <p> <?= (isset($errores['email']) ? $errores['email'] : '' ) ?></p>

        <input type="text" class="form-control" id="name" placeholder="Enter name"   name="name" value="<?= $name ?>" required >
        <p></p>

        <input type="text" class="form-control" id="lastName" placeholder="Enter lastName"   name="lastName" value="<?= $lastName ?>" required>
        <p></p>

        <input class="form-control" id="password" placeholder="Enter password" name="password" value="" >
        <p> <?= (isset($errores['password']) ? $errores['password'] : '') ?></p>

        <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" name="confirmPassword" value="" >
        <p> <?= (isset($errores['confirmPassword']) ? $errores['confirmPassword'] : '') ?></p>

    <div class="button">

      <button class="center btn-primary btn"  type="submit" style="width:300px;">Send</button>
    </div>


  </form>
</div>

  <div class="">


        <ul class="center" style="padding-inline-start: 0px;">
          <li class=" btn-primary btn">
            Mis Compras
          </li>
          <li class=" btn-primary btn" >
            Favoritos
          </li>
            <li class=" btn-primary btn" >
            Envios
          </li>


        </ul>


      </div>

      </div>
</div>
</div>
        <?php require_once('partials/footer.php')?>

  </body>
</html>
