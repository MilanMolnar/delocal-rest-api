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

$contact->id = isset($_GET['id']) ? $_GET['id'] : die();

$contact->showOne();

//if contact's name is set, create the array
if($contact->name != null){
    $contact_arr = array(
        "id" =>  $contact->id,
        "name" => $contact->name,
        "email" => $contact->email,
        "address" => $contact->address,
        "phone" => $contact->phone
    );

    http_response_code(200);
    echo json_encode($contact_arr);
}
//if the name could not be set response with 404.
else{
    http_response_code(404);
    echo json_encode("Contact not found.");
}
?>