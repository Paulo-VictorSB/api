<?php

// returns all clients

require_once("../_inc/init.php");

// check if request method is valid
check_request_method($request_method, 'GET');

$results = $db->execute_query("SELECT * FROM clientes");

$res->set_status('success');
$res->set_response_data($results->results);

// aditional field
$res->set_aditional_field('total_clients', $results->affected_rows);
// integration key
check_integration_key_get();

$res->response();
