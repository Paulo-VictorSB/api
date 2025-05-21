<?php

// returns all clients

require_once("../_inc/init.php");

// check if request method is valid
check_request_method($request_method, 'GET');

// check if this domain is set
if (!isset($_GET['domain'])) {
    missing_request_paramter('domain');
}

// check if this domain is string
if (!is_string($_GET['domain'])) {
    invalid_type_paramter('domain', 'string');
}

$params = [
    ":domain" => "%" . $_GET['domain'] . "%"
];

// select cliente with city name
$results = $db->execute_query("SELECT * FROM clientes WHERE email LIKE :domain" , $params);

if ($results->affected_rows == 0) {
    no_data('Domain not found.');
}

$res->set_status('success');
$res->set_response_data($results->results);
// integration key
check_integration_key_get();

$res->set_aditional_field('total_clients', $results->affected_rows);

$res->response();