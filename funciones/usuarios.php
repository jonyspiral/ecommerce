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
function guardarUsuario($usuario) {
  $usuarios=traerUsuariosJson();
    $usuarios[]=$usuario;
    subirArchivoJson($usuarios);
    }
function traerUsuariosJson() {
  //creo el archivo usuarios.json
  if (!file_exists('database')) {
    mkdir('database');
  }
  if( file_exists("usuarios.json") == true ){
    $archivo = fopen("usuarios.json", "w+b");
    if( $archivo == false )
 echo "Error al crear el archivo";
else
 echo "El archivo ha sido creado";
fclose($archivo);   // Cerrar el archivo
}
//creo la variable usuario.
  $archivo = file_get_contents('database/usuarios.json');
  $usuarios = json_decode($archivo, true);
return $usuarios;
}

function guardarUsuarioPorEmail($email,$usuarioPost) {
  $usuarios=traerUsuariosJson();
  foreach ($usuarios as $key => $usuario){
    if ($usuario['email'] == $email ){
    $usuarios[$key]=$usuarioPost;
    subirArchivoJson($usuarios);
      }
    }
}

function subirArchivoJson($archivo) {
$usuariosJson = json_encode($archivo);

file_put_contents('database/usuarios.json', $usuariosJson);
}


function buscarUsuarioEmail(string $email) {
$usuarios = traerUsuariosJson();

    foreach ($usuarios as $usuario) {
        if ($usuario['email'] == $email) {
            return $usuario;
        }
    }

    return [];
}

function subirUsuarioEmail(string $email) {
$usuarioSubir =buscarUsuarioEmail( $email);
$usuarios =traerUsuariosJson();
//$archivo = file_get_contents('database/usuarios.json');
//$usuarios = json_decode($archivo, true);
foreach ($usuarios as $usuario) {
    if ($usuario['email'] == $email) {
      $usuarios[]=$usuarioSubir;
  subirArchivoJson($usuarios);
    }
}

}


function subirAvatar($archivo, $nombre) {

    if (!file_exists('img/avatar')) {
        mkdir('img/avatar');
    }

    $ext = pathinfo($archivo['name'], PATHINFO_EXTENSION);

    $avatar = $nombre . '.' . $ext;
    //la muevo a mi carpeta avatars
    move_uploaded_file($archivo['tmp_name'], 'img/avatar/' . $avatar);

    return $avatar;
}
