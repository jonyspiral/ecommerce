<?php


function  validarPassword( $datos) {
$errores = [];
  $password = $datos['password'];
  $newPass=$datos['newPass'];
  if (!isset($datos['newPass'])){
  if (strlen($password) < 6) {
    $errores['password'] = 'La contraseña es muy corta (minimo 6 caracteres)';
  }else if (isset($datos['confirmPassword']) && $datos['confirmPassword'] != $password){
    $errores ['confirmPassword']='Password y confirmacion no son identicos';
  }
}else{
if (strlen($newPass) < 6) {
  $errores['newPass'] = 'La contraseña es muy corta (minimo 6 caracteres)';
}else if (isset($datos['confirmPassword']) && $datos['confirmPassword'] != $newPass){
  $errores ['confirmPassword']=' Nuevo Password y confirmacion no son identicos';
}
}
return $errores;
}
/*function validarEmail($email){

  if (strlen($email) === 0) {
        $errores['email'] = 'Escribe el email';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El email tiene formato errado';
  }
}*/
