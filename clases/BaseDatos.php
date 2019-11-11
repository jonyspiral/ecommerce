<?php

class BaseDatos {

  public function buscarUsuarioEmail(string $email): ?Usuario
  {
    //TODO del buscar en el Json o Mysql
    //si lo retorna, seria algo asi
    $user = [
      'id'=> 1,
      'user'=>'alberto',
      'name'=> 'alberto',
      'lastName'=> 'albert',
      'email' => 'a@a.com',
      'password' => password_hash('123456', PASSWORD_DEFAULT),
      'avatar' => 'a@a.com.jpg'
    ];

    $usuario = new Usuario($user['id'],$user['user'],$user['name'],$user['lastName'],$user['email'], $user['password'], $user['avatar']);

    return $usuario;
  }

    public function getBaseDatos( )
    {

    }
    public function guardarProducto(Producto $prod)
    {

    }

    public function actualizarProducto(Producto $prod)
    {

    }

}
