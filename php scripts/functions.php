<?php
function get_last_insert_id($connection)
{
    return $connection->insert_id;
}
function logout($redirect_url)
{
    session_start();
    session_destroy();
    (isset($redirect_url)) ? header("Location: ../" . $redirect_url) : header("Location: ../index.html");
}
function flag_replacer($text, $flag, $data_array, $indexes_array)
{
    $chars = strlen($flag); // Longitud de la "flag" que se ha de reemplazar
    $n = substr_count($text, $flag);  // Número de veces que aparece la "flag" en el texto
    if ($n == sizeof($indexes_array)) { // Las apariciones de la "flag" en la cadena son las mismas que la longitud del arreglo de índices
        for ($i = 0; $i < $n; $i++) {
            $position = strpos($text, $flag);
            $text = substr_replace($text, $data_array[$indexes_array[$i]], $position, $chars);
        }
        return $text;
    } else {
        return null;
    }
}
// Datos de ejemplo
/*
$txt = "Hola, mi nombre es FLAG, y vivo en FLAG. Tengo FLAG años y estudio en FLAG.";
$datos = ["Dante", "Puebla", 18, "BUAP"];
$indexes = [0, 1, 2, 3];
$flag = "FLAG";
echo (flag_replacer($txt, $flag, $datos, $indexes));
*/
function fetch_fields($table, $fields, $id, $custom_query)
{
    $connection = new mysqli("localhost", "cuinos_fc", "CuinosFC24!!", "cuinos_fc");
    //session_start();
    //(($_SESSION['email'] == "demo_user@system.com") or ($_SESSION['user'] == "demo_user")) ? $connection = new mysqli("localhost", "comercial_demo", $data[1], ($table . "_demo")):(false);
    if ($custom_query != "" && $custom_query != null) {
        $query = $custom_query;
    } else {
        if ($id == "" or $id == null) {
            $query = "SELECT * FROM `$table`";
        } else {
            $query_field = ($fields[0]);
            $query = "SELECT * FROM `$table` WHERE `$query_field` = '$id'";
        }
    }

    $result = mysqli_query($connection, $query) or die("Error en la consulta a la base de datos");
    $data = array();

    // Comprobar si las filas son mayores que 0
    $result = $connection->query($query);
    // Verificar si se encontró un usuario válido
    if ($result->num_rows > 0) {
        if ((stripos($query, "UPDATE") === false) && (stripos($query, "INSERT") === false)) {
            $i = 0;
            // Hacer fetch a los datos
            while ($row = $result->fetch_array()) {
                // Procesar cada registro obtenido
                $n = sizeof($fields);
                for ($j = 0; $j < $n; $j++) {
                    ($id == "" or $id == null) ? $data[$i][$j] = $row[$fields[$j]] : $data[$j] = $row[$fields[$j]];
                }
                $i++;
            }
            return $data;
        }
    } else {
        // No hay registros en la tabla, o la consulta hizo una actualización: devolver null
        $connection->close();
        return null;
    }
}
function contains_string($main_string, $substring)
{
    // strpos devuelve la posición donde se encuentra la subcadena
    // Si no se encuentra, devuelve false
    return strpos($main_string, $substring) !== false;
}
function splitter($urls, $splitter)
{
    if (contains_string($urls, $splitter)) {
        $img_urls = array();
        $img_urls = explode($splitter, $urls);
    } else {
        $img_urls = [$urls];
    }
    return $img_urls; // Usar como $data = split_urls($cadena_con_urls); (Validar con length)
}