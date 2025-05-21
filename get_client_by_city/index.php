<?php

// returns all clients

require_once("../_inc/init.php");

// check if request method is valid
check_request_method($request_method, 'GET');

// check if this city is set
if (!isset($_GET['city'])) {
    missing_request_paramter('city');
}

// check if this city is string
if (!is_string($_GET['city'])) {
    invalid_type_paramter('id', 'string');
}

$params = [
    ":city" => $_GET['city']
];

// select cliente with city name
$results = $db->execute_query("SELECT * FROM clientes WHERE cidade = :city", $params);

if ($results->affected_rows == 0) {
    no_data('City not found.');
}

$res->set_status('success');
$res->set_response_data($results->results);
// integration key
check_integration_key_get();

$res->set_aditional_field('total_clients', $results->affected_rows);

$res->response();