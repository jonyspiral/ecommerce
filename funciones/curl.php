<?php
function peticionCurl ($url, $metodo = 'GET', $datos = []) {
    $ch = curl_init();
    $datos = json_encode($datos);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $metodo);
    // definimos la URL a la que hacemos la petición
    curl_setopt($ch, CURLOPT_URL, $url);
    // indicamos el tipo de petición: POST
    curl_setopt($ch, CURLOPT_POST, TRUE);
    // definimos cada uno de los parámetros
    //curl_setopt($ch, CURLOPT_POSTFIELDS, "postvar1=value1&postvar2=value2&postvar3=value3");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Content-Length: ' . strlen($datos)
        ]);

    // recibimos la respuesta y la guardamos en una variable
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $remote_server_output = curl_exec($ch);

    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if ( $httpCode < 200 || $httpCode > 299) {
        if ($httpCode == 412 || $httpCode == 422) {
            echo('errores-> ' . $remote_server_output); exit;
        }
        echo('error-> ' . $httpCode); exit;
    }

    // cerramos la sesión cURL
    curl_close ($ch);
    // hacemos lo que queramos con los datos recibidos
    // por ejemplo, los mostramos
    return json_decode($remote_server_output, true);

}
