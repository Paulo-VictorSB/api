<?php

require_once('../_inc/init.php');

// get json data
$data = json_decode(file_get_contents("php://input"), true);

// check if request method is valid
check_request_method($request_method, 'PATCH');

// check for required fields
$request_fields = [
    'id',
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
    ':id' => $data['id'],
];

$db->execute_non_query(
    "DELETE FROM clientes
    WHERE id = :id", $params
);

$res->set_response_data("Removed client");
$res->response();