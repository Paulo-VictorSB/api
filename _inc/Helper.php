<?php

function check_request_method($request_method, $expected_request_method)
{
    if (strtoupper($request_method) !== strtoupper($expected_request_method)) {
        global $res;
        $res->set_status('error');
        $res->set_error_message('Invalid request method. Expected ' . strtoupper($expected_request_method));
        $res->response();
    }
}

function check_integration_key_get()
{
    if (isset($_GET['integration_key'])) {
        global $res;
        $res->set_integration_key($_GET['integration_key']);
    }
}

function missing_request_paramter($paramter)
{
    global $res;
    $res->set_status('error');
    $res->set_error_message('Missing paramter: ' . $paramter);
    $res->response();
    exit();
}

function invalid_type_paramter($paramter, $expected_type_paramter)
{
    global $res;
    $res->set_status('error');
    $res->set_error_message('Invalid type paramter: ' . $paramter . ', ' . 'Expected type: ' . $expected_type_paramter);
    $res->response();
    exit();
}

function check_required_fields_in_json($data, $fields)
{
    foreach ($fields as $key) {
        if (!key_exists($key, $data)) {
            return false;
        }
    }

    return true;
}

function check_integration_key_json($data)
{
    if (key_exists('integration_key', $data)) {
        global $res;
        $res->set_integration_key($data['integration_key']);
    }
}

function invalid_input_fields($message, $data)
{
    global $res;
    $res->set_status('error');
    $res->set_error_message($message);
    check_integration_key_json($data);
    $res->response();
}

function no_data($message)
{
    global $res;
    $res->set_status('error');
    $res->set_error_message($message);
    $res->response();
    exit();
}