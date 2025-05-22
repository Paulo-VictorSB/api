<?php

require_once('../_inc/init.php');

// get json data
$data = json_decode(file_get_contents("php://input"), true);

// check if request method is valid
check_request_method($request_method, 'POST');

// check for required fields
$request_fields = [
    'nome',
    'sexo',
    'data_nascimento',
    'email',
    'telefone',
    'morada',
    'cidade',
    'ativo'
];

if (!check_required_fields_in_json($data, $request_fields)) {
    invalid_input_fields('Missing input fields.', $data);
    exit();
}

// integration key
check_integration_key_json($data);

// prepare data 
$params = [
    ':nome' => $data['nome'],
    ':sexo' => $data['sexo'],
    ':data_nascimento' => $data['data_nascimento'],
    ':email' => $data['email'],
    ':telefone' => $data['telefone'],
    ':morada' => $data['morada'],
    ':cidade' => $data['cidade'],
    ':ativo' => $data['ativo']
];

$db->execute_non_query(
    "INSERT INTO clientes (
        id, nome, sexo, data_nascimento, email, telefone, morada, cidade, cliente_ativo
    ) VALUES (
        0, :nome, :sexo, :data_nascimento, :email, :telefone, :morada, :cidade, :ativo
    )",
    $params
);

$res->set_response_data("Customer added.");
$res->response();