<?php
class Autenticador {

    public function logear(Usuario $usuario)
    {//aqui es donde encontré al usuario y lo logeo

    $_SESSION['email'] = $usuario->getEmail();
    $_SESSION['name'] = $usuario->getName();
    $_SESSION['lastName'] = $usuario->getLastName();
    $_SESSION['avatar'] = $usuario->getAvatar();
    $_SESSION['user']= $usuario->getUser();
    $_SESSION['id']= $usuario->getId();
    }

    public function deslogear(Usuario $usuario)
    {
        session_destroy();
    }

    public function guardarCookie()
    {

    }

}
