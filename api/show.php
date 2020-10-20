<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

//include the required php files
include_once 'config/database.php';
include_once 'class/contact.php';

//creating a database instance & connecting
$database = new Database();
$db = $database->getConnection();

$items = new Contact($db);

$stmt = $items->show();
$itemCount = $stmt->rowCount();

//if there are contacts appendign it to an array
if($itemCount > 0){

    $contactArr = array();
    $contactArr["body"] = array();
    $contactArr["itemCount"] = $itemCount;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $contact = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "address" => $address,
            "phone" => $phone,
        );

        array_push($contactArr["body"], $contact);
    }
    //echoing the array in JSON format
    echo json_encode($contactArr);
}
//if there are no contacts, setting the array respectively. with the error code 404
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
?>