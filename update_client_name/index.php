<?php

require_once('../_inc/init.php');

// get json data
$data = json_decode(file_get_contents("php://input"), true);

// check if request method is valid
check_request_method($request_method, 'PUT');

// check for required fields
$request_fields = [
    'id',
    'nome'
];

// check for required fields
if (!check_required_fields_in_json($data, $request_fields)) {
    invalid_input_fields('Missing input fields.', $data);
    exit();
}

// integration key
check_integration_key_json($data);

// params
$params = [
    'id' => $data['id'],
    'nome' => $data['nome']
];

$db->execute_non_query(
    "UPDATE clientes SET
    nome = :nome
    WHERE id = :id", $params
);

$res->set_response_data("Edited client");
$res->response();