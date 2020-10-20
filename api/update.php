<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: PUT");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/database.php';
include_once '../class/contact.php';

$database = new Database();
$db = $database->getConnection();

$item = new Contact($db);

$data = json_decode(file_get_contents("php://input"));

$item->id = $data->id;

// contact email set
$item->email = $data->email;


if($item->update()){
    http_response_code(200);
    echo json_encode("Contact data updated.");
} else{
    http_response_code(422);
    echo json_encode("Data could not be updated");
}
?>
