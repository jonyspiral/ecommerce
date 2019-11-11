<?php

class BaseDatos {
  
  public function buscarUsuarioEmail(string $email): ?Usuario
  {
    //TODO del buscar en el Json o Mysql
    //si lo retorna, seria algo asi
    $usuarioFicticio = [
      'email' => 'juan@juan.com',
      'password' => password_hash('123456', PASSWORD_DEFAULT),
      'avatar' => 'usuario.jpg'
    ];

    $usuario = new Usuario($usuarioFicticio['email'], $usuarioFicticio['password'], $usuarioFicticio['avatar']);

    return $usuario;
  }

    public function getBaseDatos( $)
    {

    }
    public function guardarProducto(Producto $prod)
    {

    }

    public function actualizarProducto(Producto $prod)
    {

    }

}
