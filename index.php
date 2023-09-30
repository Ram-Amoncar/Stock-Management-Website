<?php

$req = parse_url($_SERVER['REQUEST_URI'])['path'];

// echo $req;
$routes = [
    "/Stock-Management-Web/" => "views/login.php",
    "/Stock-Management-Web/index.php" => "views/login.php",
    "/Stock-Management-Web/login" => "views/login.php",
    "/Stock-Management-Web/register" => "views/register.php",
    "/Stock-Management-Web/stock" => "views/stock.php"
];

if (array_key_exists($req, $routes)) {
    require $routes[$req];
} else {
    http_response_code(404);
    require "views/error.php";
}
