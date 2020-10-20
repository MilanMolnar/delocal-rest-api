<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/database.php';
include_once '../class/contact.php';

$database = new Database();
$db = $database->getConnection();

$items = new Contact($db);

$stmt = $items->show();
$itemCount = $stmt->rowCount();


echo json_encode($itemCount);

if($itemCount > 0){

    $contactArr = array();
    $contactArr["body"] = array();
    $contactArr["itemCount"] = $itemCount;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        $e = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "address" => $address,
            "phone" => $phone,
        );

        array_push($contactArr["body"], $e);
    }
    echo json_encode($contactArr);
}

else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}
?>