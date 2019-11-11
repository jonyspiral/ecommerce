<?php
class Autenticador {

    public function logear(Usuario $usuario)
    {
        $_SESSION['email'] = $usuario->getEmail();
    }

    public function deslogear(Usuario $usuario)
    {
        session_destroy();
    }

    public function guardarCookie()
    {

    }

}
