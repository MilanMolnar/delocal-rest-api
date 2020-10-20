<?php
//masking the request urls with a front controller
$route = ($_SERVER['REQUEST_URI']);
$routeArray = explode('/', $route);
$routeMethod = $routeArray[1];
$routeCount = count($routeArray);
$id = "";

if ($routeMethod == "contact" && $routeCount == 3)
{
    $id = $routeArray[2];
}
switch ($_SERVER['REQUEST_URI']) {
    case '/contacts/update':
        include 'api/update.php';
        break;
    case '/contacts/show':
        include 'api/show.php';
        break;
    case '/contacts/store':
        include 'api/store.php';
        break;
    case '/contact/'. $id .'';
        $_GET['id'] = $id;
        include 'api/show_one.php';
        break;
    default:
        http_response_code(404);
        echo json_encode("Not found.");
}