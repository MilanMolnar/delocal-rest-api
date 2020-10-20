<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/database.php';
include_once 'class/contact.php';

$database = new Database();
$db = $database->getConnection();

$contact = new Contact($db);
//getting and decoding the JSON body's data
$data = json_decode(file_get_contents("php://input"));

//setting the contact's fields with the appropriate data
$contact->name = $data->name;
$contact->email = $data->email;
$contact->address = $data->address;
$contact->phone = $data->phone;

//the contact could be stored responding with a 201 created status code
if($contact->store()){
    http_response_code(201);
    echo 'Contact created successfully.';
} else{ //else responding with 400 to indicate the problem
    http_response_code(400);
    echo 'Contact could not be created.';
}
?>