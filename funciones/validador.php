<?php

function validarLogin($datos) {
    $errores = [];

    $email = trim($datos['email']);
    $password = $datos['password'];

    if (strlen($email) === 0) {
        $errores['email'] = 'Escribe el email';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores['email'] = 'El email tiene formato errado';
    }
    if (strlen($password) < 8) {
        $errores['password'] = 'La contraseña es muy corta (minimo 8 caracteres)';
    }

    //deberia de buscar al usuario en la base de datos
        //y si no esta lanzar un error


    return $errores;
}
