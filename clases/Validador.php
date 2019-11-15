<?php

class Validador {
    private $bd;

    public function __construct(BaseDatos $bd)
    {
        $this->bd = $bd;
    }
    public function estaElUsuarioLogeado () {
        if (isset($_SESSION['email'])){
          
          return true;
        }
        return false;
    }
    public function validarLogin(string $email, string $pass): array {
        $errores = [];
        $email = trim($email);
        if ($this->validarEmail($email)) {
            $errores['email'] = 'El email es inválido';
        }
        if ($this->validarVacio($pass)) {
            $errores['password'] = 'Ingresa la contraseña';
        }
        if (empty($errores)) {
            $usuario = $this->bd->buscarUsuarioEmail($email);
            if ($usuario === null) {
                $errores['email'] = 'Usuario o clave inválido ';
            } else if (!password_verify($pass, $usuario->getPassword())) {
                $errores['email'] = 'Usuario o clave inválido 2';
            }
        }
          return $errores;
    }

    public function  validarPassword( array $datos) {
    $errores = [];
      $password = $datos['password'];
      if (!isset($datos['newPass'])){
        //echo "camino sin newPass";
               if (strlen($password) < 6) {
              $errores['password'] = 'La contraseña es muy corta (minimo 6 caracteres)';
            }else if (isset($datos['confirmPassword']) && $datos['confirmPassword'] != $password){
              $errores ['confirmPassword']='Password y confirmacion no son identicos';
            }
    }else{
        //echo "camino con newPass";
            if (strlen($datos['newPass']) < 6) {

              $errores['newPass'] = 'La contraseña es muy corta (minimo 6 caracteres)';
            }else if (isset($datos['confirmPassword']) && $datos['confirmPassword'] != $datos['newPass']){
              $errores ['confirmPassword']=' Nuevo Password y confirmacion no son identicos';
            }
    }
    if (empty($errores)) {
          $usuario = $this->bd->buscarUsuarioEmail($datos['email']);
        if ($usuario === null) {
            $errores['email'] = 'debe insertar el anterior password.';
     }
   }
    return $errores;
    }


    public function validarEmail(string $email): bool {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }
    public function validarUser(string $user): array {
      $errores = [];
      if ($this->validarVacio($user)|| $this->bd->buscarUsuarioUser($user) != null) {
          $errores['user'] = 'Campo Usuario vacio o ya existente. ingresa o cambia. ';
      }
        return $errores;
    }

    /**
    * retorna true cuando está vacio
    */
    public function validarVacio(string $valor): bool
    {
        return strlen(trim($valor)) === 0;
    }

    public function validarRegistro($user ,$email,$name= null,$lastName= null,$password= null,$confirmPassword= null,$avatar): array
    {
        $errores = [];
        if ($this->validarVacio($user)|| $this->bd->buscarUsuarioUser($user) != null) {
            $errores['user'] = 'Campo Usuario vacio o ya existente. ingresa o cambia. ';
        }
        $email = trim($email);
        if ($this->validarEmail($email)) {
            $errores['email'] = 'El email es inválido';
        }

        if (strlen($password) < 6) {
            if ($this->validarVacio($password)) {
              $errores['password'] = 'Ingresa la contraseña';
            }else{  $errores['password'] = 'La contraseña es muy corta (minimo 6 caracteres)';
                }
        }
        if (empty($errores)) {
            $usuario = $this->bd->buscarUsuarioEmail($email);
            if (!$usuario === null) {
                $errores['email'] = 'Usuario o clave inválido (1)';
              }

          }
            return $errores;
  }
}
