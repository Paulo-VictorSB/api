<?php

// returns all clients

require_once("../_inc/init.php");

// check if request method is valid
check_request_method($request_method, 'GET');

// select cliente with gender
$results = $db->execute_query(
    "SELECT 
        COUNT(*) AS total,
        COUNT(CASE WHEN sexo = 'm' THEN 1 END) AS males,
        COUNT(CASE WHEN sexo = 'f' THEN 1 END) AS females
    FROM clientes"
);

$res->set_status('success');
$res->set_response_data($results->results);
// integration key
check_integration_key_get();

$res->response();