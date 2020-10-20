<?php

$route = ($_SERVER['REQUEST_URI']);
$routeArray = explode('/', $route);
$method = $routeArray[1];
$routeCount = count($routeArray);
$id = "";

if ($method == "contact" && $routeCount == 3)
{
    $id = $routeArray[2];
}
echo $id;
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
        die("404 Not Found");
}