<?php
function splitter($urls, $divisor)
{
    $strings_array = array();
    $strings_array = explode($divisor, $urls);
    return $strings_array; // Usar como $data = split_urls($cadena_con_urls); (Validar con length)
}
function get_last_insert_id($connection)
{
    return $connection->insert_id;
}
