<?php

/*function buscarUsuarioEmail($email) {

    $usuario = [];

    $datos = [ 'team' => 'grupo1', 'commission' => 'tarde', 'search' => $email];

    $usuario = peticionCurl('http://apiusers.juancarlosdh.dhalumnos.com/api/users', 'GET', $datos);
    //var_dump($usuario); exit;
    $usuario = (count($usuario['data']) > 0)
        ? json_decode($usuario['data'][0]['json_data'], true)
        : [];

    return $usuario;
}*/
function buscarUsuarioEmail(string $email) {

    $archivo = file_get_contents('database/usuarios.json');
    $usuarios = json_decode($archivo, true);

    foreach ($usuarios as $usuario) {
        if ($usuario['email'] == $email) {
            return $usuario;
        }
    }

    return [];
}

function subirAvatar($archivo, $nombre) {

    if (!file_exists('img/avatar')) {
        mkdir('img/avatar');
    }

    $ext = pathinfo($archivo['name'], PATHINFO_EXTENSION);

    $nombreArchivo = $nombre . '.' . $ext;
    //la muevo a mi carpeta avatars
    move_uploaded_file($archivo['tmp_name'], 'img/avatar/' . $nombreArchivo);

    return $nombreArchivo;
}







//
