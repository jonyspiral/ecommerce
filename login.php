<?php

    require_once('funciones/autoload.php');

    if (isset($_COOKIE['mantener'])) {
        logear($_COOKIE['mantener']);

    }
    if(estaElUsuarioLogeado()){
        header('location:miPerfil.php');
    }

    //VALIDO el correo.

    $email = '';
    $password = '';
    $errores = [
        'email' => '',
        'password' => ''
    ];
if ($_POST) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $errores = validarLogin($_POST);
    $usuario=buscarUsuarioEmail($email);
    if (!$errores) {
        //  $archivo = file_get_contents('database/usuarios.json');
          //$usuarios = json_decode($archivo, true);
//  foreach ($usuarios as $usuario) {
                if (($usuario['email'] == $email )&& password_verify($password, $usuario['password'])) {
                    //aqui es donde encontré al usuario y lo logeo
                    $_SESSION['email'] = $email;
                    $_SESSION['name'] = $usuario['name'];
                    $_SESSION['lastName'] = $usuario['lastName'];
                    $_SESSION['avatar'] = $usuario['avatar'];
                    $_SESSION['user']= $usuario['user'];
                    //si checkaron el recuerdame
                    if (isset($_POST['mantener'])) {
                        //guardo la cookie del email

                        setcookie('mantener',  $email, time() + 60*60*24*7 );
                        setcookie('avatar',  $usuario['avatar'], time() + 60*60*24*7 );
                    }
                    //luego redirijo a miPerfil

                    header('location:miPerfil.php');
                }
            //  }
    //deberia de buscar al usuario en la base de datos
        //y si no esta lanzar un error
        $errores['email'] = 'Usuario o clave incorrectos';

        }
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

    <title>Logueate</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/master.css">
    <link rel="stylesheet" href="css/login.css">
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <div id="padre" class="contPadreFlex" style="    height: fit-content;">


  <div id="main" class="flexCenterH styleLogin" style=" flex-direction: column; flex-wrap: wrap; align-content: center;  padding: 3%;">


          <div id="containerLogo"class=" flexCenterH" style="    margin-bottom: 5%;">
            <a class="" id="logo" href="index.php">
              <img src="img\logo.png" alt="go to home" class="logo"  >
            </a>
          </div>
          <div class="flexCenterH ">
          <form class="" action="login.php" method="post" >

          <!--<label class="containerDentro"for="email">Email address</label>-->
          <input type="text" class="formControl" id="email" aria-describedby="emailHelp" placeholder="email" name="email" value="<?= $email ?>">
          <p> <?= (isset($errores['email']) ? $errores['email'] : '') ?></p>
          <!--<label class="containerDentro" for="contraseña">Contraseña</label>-->
          <input class="formControl" placeholder="Enter password" type="password" name="password" value="">

          <p><?= (isset($errores['password']) ? $errores['password'] : '') ?></p>

          <div class="form-group form-check">
                <input type="checkbox" name="mantener" class="form-check-input" id="mantener">
                <label class="form-check-label" for="mantener">Dejarme Conectado</label>
          </div>

          <div class="form-group form-check">
              <p><a id= "toRegister" href="register.php" >(Registrese aqui si aun no lo hizo.)</a></p>
          </div>

          <div class="">
              <button class="center btn-primary btn"  type="submit" >Send</button>
          </div>
        </div>

        </form>
</div>
  </div>

  </body>
</html>
