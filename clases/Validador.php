<?php

class Validador {
    private $bd;

    public function __construct(BaseDatos $bd)
    {
        $this->bd = $bd;
    }

    public function validarLogin(string $email, string $pass): array
    {
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
                $errores['email'] = 'Usuario o clave inválido';
            } else if (!password_verify($pass, $usuario->getPassword())) {
                $errores['email'] = 'Usuario o clave inválido';
            }
        }

        return $errores;
    }

    public function validarRegistro(): array
    {

    }

    /**
     * retorna true cuando el $email no sea valido
    */
    public function validarEmail(string $email): bool
    {
        return !filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
    * retorna true cuando está vacio
    */
    public function validarVacio(string $valor): bool
    {
        return strlen(trim($valor)) === 0;
    }







}
