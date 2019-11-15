<?php
class Autenticador {

    public function loguear(Usuario $usuario)
    {//aqui es donde encontré al usuario y lo logeo
session_start();
if ($usuario) {
    $_SESSION['email'] = $usuario->getEmail();
    $_SESSION['name'] = $usuario->getName();
    $_SESSION['lastName'] = $usuario->getLastName();
    $_SESSION['avatar'] = $usuario->getAvatar();
    $_SESSION['user']= $usuario->getUser();
    $_SESSION['id']= $usuario->getId();

    if (isset($_POST['mantener'])) {
        //guardo la cookie del email y avatar
        setcookie('mantener', $email, time() + 60*60*24*7 );
        setcookie('mantener',  $usuario['avatar'], time() + 60*60*24*7 );
        }
        //redirijir a mi prefil
        header('location:miPerfil.php');
    } else {
        destruirRecuerdame();
        //sino lo redirijo a login
        header('location:login.php');
    }


}

    public function deslogear(Usuario $usuario)
    {
        session_destroy();
    }

    public function guardarCookie()
    {

    }

}
