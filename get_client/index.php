<?php

// returns all clients

require_once("../_inc/init.php");

// check if request method is valid
check_request_method($request_method, 'GET');

// check if this id is set
if (!isset($_GET['id'])) {
    missing_request_paramter('id');
}

// check if this id is numeric
if (!is_numeric($_GET['id'])) {
    invalid_type_paramter('id', 'int');
}

$params = [
    ":id" => $_GET['id']
];

// select cliente with id
$results = $db->execute_query("SELECT * FROM clientes WHERE id = :id", $params);

if ($results->affected_rows == 0) {
    no_data('Client not found.');
}

$res->set_status('success');
$res->set_response_data($results->results);
// integration key
check_integration_key_get();

$res->response();