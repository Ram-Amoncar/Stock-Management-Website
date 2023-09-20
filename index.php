<?php


$req = $_SERVER['REQUEST_URI'];

$req = substr($req,21); // remove it in hosting

switch ($req) {

    case '':
    case '/':
    case '/login':
        require './views/login.php';
        break;

    case '/register':
        require './views/register.php';
        break;

    // case 'assets/creditBG.jpg':
    //     require __DIR__ . 'assets/creditBG.jpg';
    //     break;

    // case '/about':
    //     require __DIR__ . '/views/aboutus.php';
    //     break;

    default:
        require './views/error.php';
        break;

}