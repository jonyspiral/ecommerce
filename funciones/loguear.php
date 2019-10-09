<?php
function loguea($email,$password){
$archivo = file_get_contents('database/usuarios.json');

$usuarios = json_decode($archivo, true);

foreach ($usuarios as $usuario) {
      if (($usuario['email'] == $email )&& password_verify($password, $usuario['password'])) {
          //aqui es donde encontré al usuario y lo logeo
          //creo las variables $_session
          $_SESSION['email'] = $email;
          $_SESSION['name'] = $usuario['name'];
          $_SESSION['lastName'] = $usuario['lastName'];
          $_SESSION['avatar'] = $usuario['avatar'];
          $_SESSION['user']= $usuario['user'];
          //si checkaron el mantenr
          if (isset($_POST['mantener'])) {
              //guardo la cookie del email y avatar
              setcookie('mantener', $email, time() + 60*60*24*7 );
              setcookie('mantener',  $usuario['avatar'], time() + 60*60*24*7 );
          }
          //luego redirijo a miPerfil

          header('location:miPerfil.php');
      }
    }
  }
