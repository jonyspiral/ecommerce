<?php

require_once ('clases/Autoload.php');
$auth= new Autenticador;
$conexion = new Conexion;
$bd = new BaseDatos;
$validador= New Validador ($bd);
// if (isset($_COOKIE['mantener'])) {
//    $usuario= $bd->buscarUsuarioEmail($_COOKIE['mantener']);
//     $auth->loguear($usuario);
// }
if (!$validador->estaElUsuarioLogeado()){
    header('location:login.php');
 }
    $user= $_SESSION['user'];
    $email = $_SESSION['email'];
    $name= $_SESSION['name'];
    $lastName= $_SESSION['lastName'];
    $avatar = $_SESSION['avatar'];
    $newPass= '';
    $password='';
    $confirmPassword='';
    $errores=[];
    $resultado='';


if ($_POST){

    if (isset($_POST['user'])){
      $user= $_POST['user'];
    }else{
    $user=$_SESSION['user'];
    }
    if (isset($_POST['name'])){
      $name= $_POST['name'];
    }else{
    $name= $_SESSION['name'];
    }
    if (isset($_POST['lastName'])){
      $lastName= $_POST['lastName'];
    }else{
    $lastName=$_SESSION['lastName'];
    }

    if (isset($_POST['newPass'])){
      $newPass= $_POST['newPass'];
    }else{
    $newPass='';
  }



          if (isset($_FILES['avatar'])){

              if ($_FILES['avatar']['error'] === 0) {
            $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

                  if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {

                  $errores['avatar']= 'Formato de archivo invalido';
                  } else {

                  $avatar = $bd->subirAvatar($_FILES['avatar'], $email);

                }
              }
            }
              //validaciones extras

              if (isset($_POST['newPass'])){
                //echo "entra por el post de abajo";
              $_POST['email']=$email;
                $errores=$validador->validarPassword( $_POST) ;
                      if (!$errores) {
                      $bd->editarUsuario($user,$email,$name,$lastName,$newPass,$avatar);
                      $resultado ="los cambios estan ok";
                      }
                      //var_dump($resultado);

                }  else{
                  //echo "entra por el post de arriba";
            $errores=$validador->validarUser($user);

              if (!$errores) {
                        $bd->editarUsuario($user,$email,$name,$lastName,$password,$avatar);
                        $resultado ="los cambios estan ok";
                        }
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

  <body style=" display: block;  align-content: center;">
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
          <p> <?php /*(isset($errores) ? $errores : '') */?></p>


        <input type="text" class="form-control" id="user" placeholder="Enter user"   name="user" value="<?= $user ?>"  >
        <p> <?= (isset($errores['user']) ? $errores['user'] : '') ?></p>

        <label  class="center" name="email"  ><strong> <?= $email ?></strong> </label>
        <p> <?= (isset($errores['email']) ? $errores['email'] : '' ) ?></p>

        <input type="text" class="form-control" id="name" placeholder="Enter name"   name="name" value="<?= $name ?>"  >
        <p></p>

        <input type="text" class="form-control" id="lastName" placeholder="Enter lastName"   name="lastName" value="<?= $lastName ?>" required>
        <p></p>

    <div class="" style="margin-bottom:2%">

      <button class="center btn-primary btn"  type="submit" style="width:300px;">Enviar cambios</button>
    </div>

  </form>
</div>
<div class="">
  <form method='post' >

                <!-- <td>Old Password:</td> -->
                    <td><input class="form-control" name='password' type='password'  placeholder="Enter password"/></td>
                    <p> <?= (isset($errores['password']) ? $errores['password'] : '') ?></p>
                <tr>

                    <!-- <td>New Password:</td> -->
                    <td><input class="form-control" name='newPass' type='password'   placeholder="Enter new password"/></td>
                      <p> <?= (isset($errores['newPass']) ? $errores['newPass'] : '') ?></p>


                    <td><input class="form-control" name='confirmPassword' type='password'  placeholder="Confirm new password"/></td>
                    <p> <?= (isset($errores['confirmPassword']) ? $errores['confirmPassword'] : '') ?></p>
                    <td> <input class="center btn-primary btn" type='submit' value='Change Password'style="width:300px;" /></td>
                    <p> <?= (isset($resultado) ? $resultado : '') ?></p>
                </tr>
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
