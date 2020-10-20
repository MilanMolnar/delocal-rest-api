<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../class/contact.php';

$database = new Database();
$db = $database->getConnection();

$item = new Contact($db);

$data = json_decode(file_get_contents("php://input"));

$item->name = $data->name;
$item->email = $data->email;
$item->address = $data->address;
$item->phone = $data->phone;

if($item->store()){
    http_response_code(201);
    echo 'Employee created successfully.';
} else{
    http_response_code(400);
    echo 'Employee could not be created.';
}
?>