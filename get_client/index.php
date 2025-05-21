<?php

// returns all clients

require_once("../_inc/init.php");

// check if request method is valid
check_request_method($request_method, 'GET');

if (!isset($_GET['id'])) {
    $res->set_status('error');
    $res->set_error_message('Empty id.');
    $res->response();
    exit();
}

if (!is_numeric($_GET['id'])) {
    $res->set_status('error');
    $res->set_error_message('Id is not a number.');
    $res->response();
    exit();
}

$params = [
    ":id" => $_GET['id']
];

$results = $db->execute_query("SELECT * FROM clientes WHERE id = :id", $params);

if ($results->affected_rows == 0) {
    $res->set_status('error');
    $res->set_error_message('Id not found.');
    $res->response();
    exit();
}

$res->set_status('success');
$res->set_response_data($results->results);

$res->response();