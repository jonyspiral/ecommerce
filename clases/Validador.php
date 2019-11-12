<?php

class Validador {
    private $bd;

    public function __construct(BaseDatos $bd)
    {
        $this->bd = $bd;
    }

    public function validarLogin(string $email, string $password): array {
        $errores = [];

        $email = trim($email);
        if ($this->validarEmail($email)) {
            $errores['email'] = 'El email es inválido';
        }
        if ($this->validarVacio($password)) {
            $errores['password'] = 'Ingresa la contraseña';
        }
        if (empty($errores)) {
            $usuario = $this->bd->buscarUsuarioEmail($email);
            if ($usuario === null)&& (password_verify($password, $usuario->getPassword()){
                $errores['email'] = 'Usuario o clave inválido!!';
            } else if ) {
                $errores['email'] = 'Usuario o clave inválido';
            }



    }
    return $errores;
  }
    public function validarEmail(string $email): bool {

        return !filter_var($email, FILTER_VALIDATE_EMAIL);

    }

    /**
    * retorna true cuando está vacio
    */
    public function validarVacio(string $valor): bool
    {
        return strlen(trim($valor)) === 0;
    }

    public function validarRegistro(string $user, string $email,string $name, string $lastName,string $password,string $confirmPassword,string $avatar): array
    {
        $errores = [];
        if ($this->validarVacio($user)) {
            $errores['user'] = 'Ingresa un nombre de usuario';
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

        }else if (isset($confirmPassword) && $confirmPassword != $password){
          $errores ['confirmPassword']='Password y confirmacion no son identicos';
        }

        if (empty($errores)) {
            $usuario = $this->bd->buscarUsuarioEmail($email);
//var_dump($usuario->getPassword());exit;

            if ($usuario === null) {
                $errores['email'] = 'Usuario o clave inválido (1)';

             }else if ($email === $usuario->getEmail()) {
           $errores['email']='ya existe un usuario con ese email';
        }

        return $errores;
    }
  }
}
