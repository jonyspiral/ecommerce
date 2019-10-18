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
      $errores=[];
  if ($_SESSION['avatar']) {
      $avatar =  $_SESSION['avatar'] ;
    }else{
    $avatar = 'default.png';
}

if ($_POST){
  //$email=trim( $_POST['email']);
  //$password=$_POST['password'];
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
  $newPass=$_SESSION['newPass'];
  }



  $resultado="";

if (isset($_FILES)){
        if ($_FILES['avatar']['error'] === 0) {
            $ext = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);

              if ($ext != 'png' && $ext != 'jpg' && $ext != 'jpeg') {

                  $errorArchivo = 'Formato de archivo invalido';
                  echo $errorArchivo;
                } else {
                  $avatar = subirAvatar($_FILES['avatar'], $email);

                  $_SESSION['avatar']=$avatar;
                }
              }
              }else{
  $avatar= $_SESSION['avatar'];
              }
              if (strlen($user) === 0) {
             $errores['user'] = 'Escribe un usuario';
              }
              if (strlen($name) === 0) {
             $errores['name'] = 'Escribe un nombre';
              }
              if (strlen($lastName) === 0) {
             $errores['lastname'] = 'Escribe un Apellido';
              }
              if (isset($_POST['newPass'])){
                $usuario= buscarUsuarioEmail( $email);
                $pass = $usuario['password'];

              if (password_verify($_POST['password']) == $pass){
                  if ($_POST['newPass']==$_POST['confirmPass']){ //aca lo dejo
               $errores['password'] = '';
             }else{
                $errores['password'] = 'Passwords do not match';
              }
              else {$errores['password'] = 'Wrong password entered'; }
              }
            if (!$errores) {
              $usuarioPost=  buscarUsuarioEmail( $email);//aca trae el usuario

                $usuarioPost ['user']= $user;
                $usuarioPost ['name']= $name;
                $usuarioPost ['lastName']= $lastName;
                $usuarioPost ['avatar']=$avatar;
                $usuarioPost['password']=$_POST['newPass'];

                guardarUsuarioPorEmail($email,$usuarioPost);// aca lo guarda
                //y defino las nuevas $_SESSION
                 $_SESSION['name']=   $name;
                 $_SESSION['lastName']=  $usuarioPost ['lastName'];
                 $_SESSION['user']=  $usuarioPost ['user']= $user;
                 $_SESSION['avatar'] =  $usuarioPost ['avatar'] ;
                $avatar=  $usuarioPost ['avatar'] ;
                $resultado ="los cambios fueron ok";
                }//aca termina si hay errores
          }// termina el if de $_POST



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


        <input type="text" class="form-control" id="user" placeholder="Enter user"   name="user" value="<?= $user ?>" required >
        <p> <?= (isset($errores['user']) ? $errores['user'] : '') ?></p>

        <label  class="center" name="email"  ><strong> <?= $email ?></strong> </label>
        <p> <?= (isset($errores['email']) ? $errores['email'] : '' ) ?></p>

        <input type="text" class="form-control" id="name" placeholder="Enter name"   name="name" value="<?= $name ?>" required >
        <p></p>

        <input type="text" class="form-control" id="lastName" placeholder="Enter lastName"   name="lastName" value="<?= $lastName ?>" required>
        <p></p>


    <div class="button" style="margin:3%">

      <button class="center btn-primary btn"  type="submit" style="width:300px;">Enviar cambios</button>
    </div>


    <!-- <input class="form-control" id="password"  name="password" value="" >
    <p> <?= (isset($errores['password']) ? $errores['password'] : '') ?></p>

    <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm password" name="confirmPassword" value="" >
    <p> <?= (isset($errores['confirmPassword']) ? $errores['confirmPassword'] : '') ?></p> -->


  </form>
</div>
<div class="">
  <form method='post' >

                <!-- <td>Old Password:</td> -->
                    <td><input class="form-control" name='password' type='password' required='required' placeholder="Enter password"/></td>

                <tr>

                    <!-- <td>New Password:</td> -->
                    <td><input class="form-control" name='newPass' type='password' required = 'required'  placeholder="Enter new password"/></td>
                      <p> <?= (isset($errores['password']) ? $errores['password'] : '') ?></p>


                    <td><input class="form-control" name='confirmPass' type='password' required = 'required' placeholder="Confirm new password"/></td>
                    <p> <?= (isset($errores['confirmPassword']) ? $errores['confirmPassword'] : '') ?></p>
                    <td> <input class="center btn-primary btn" type='submit' value='Change Password'style="width:300px;" /></td>
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
