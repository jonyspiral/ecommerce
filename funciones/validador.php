<?php

function validarLogin($datos) {
  $errores = [];
  $usuario = [];
//valido los campos de login y register

  if (isset($datos ['user'])){
    $user= $datos ['user'];
      if (strlen($user) === 0) {
         $errores['user'] = 'Escribe un usuario';
    }
  }
  $email = trim($datos['email']);
  if (strlen($email) === 0) {
        $errores['email'] = 'Escribe el email';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El email tiene formato errado';
  }

    $password = $datos['password'];

    if (strlen($password) < 6) {
      $errores['password'] = 'La contraseña es muy corta (minimo 6 caracteres)';
    }else if (isset($datos['confirmPassword']) && $datos['confirmPassword'] != $password){
      $errores ['confirmPassword']='Password y confirmacion no son identicos';
    }
    //deberia de buscar al usuario en la base de datos
        //y si no esta lanzar un error


    return $errores;

}
function  validarPassword($datos) {
  $password = $datos['password'];

  if (strlen($password) < 6) {
    $errores['password'] = 'La contraseña es muy corta (minimo 6 caracteres)';
  }else if (isset($datos['confirmPassword']) && $datos['confirmPassword'] != $password){
    $errores ['confirmPassword']='Password y confirmacion no son identicos';
  }
}
/*function validarEmail($email){

  if (strlen($email) === 0) {
        $errores['email'] = 'Escribe el email';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El email tiene formato errado';
  }
}*/
