<?php
session_start();
 function estaElUsuarioLogeado () {

     if (isset($_SESSION['email'])){
       return true;
     }
     return false;
 }

 function logear($email) {
     //deberia de buscar al usuario en la BD
     $usuario = buscarUsuarioEmail($email);

     if ($usuario) {
      //si existe lo logeo
         $_SESSION['email'] = $email;
         $_SESSION['avatar'] = $usuario['avatar'];
        $_SESSION['name'] =$usuario['name'];
        $_SESSION['lastName'] =$usuario['lastName'];
        $_SESSION['user'] =$usuario['user'];

     } else {
         destruirRecuerdame();
         //sino lo redirijo a login
         header('location:login.php');
     }
 }
 function destruirRecuerdame() {
     setcookie('mantener', '', time() - 1);
 }


 function deslogear() {
     session_destroy();
     destruirRecuerdame();
 }
function setearCookie($email){
   //$_SESSION['avatar'] = $avatar;

  setcookie('mantener', $email, time() + 60*60*24*7 );
  setcookie('avatar',  $avatar, time() + 60*60*24*7 );
}
