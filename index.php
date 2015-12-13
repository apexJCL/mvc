<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="view/css/style.css">
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <title>Librería Tecnológico</title>
</head>
<body>

<?php

include 'ChromePhp.php';

require_once 'controller/index.php'; // Load the controller

$index = new IndexController(); // Instantiate Index Controller

if(isset($_GET['action'])){
    switch($_GET['action']){
        case '':
            break;
        case 'books':
            $index->showBooks();
            break;
        case 'autors':
            $index->showAutors();
            break;
        case 'login':
            $index->showLoginScreen();
            break;
        case 'check':
            $index->checkLogin();
            break;
        case 'logout':
            $index->logout();
            break;
        case 'register':
            $index->showRegister();
            break;
        case 'checkr':
            $index->register();
            break;
        case 'search':
            $index->search('autor');
            break;
        case 'searchb':
            $index->search('book');
            break;
        case 'profile':
            $index->showProfile();
            break;
    }
}
else {
    if(isset($_GET['autor']))
        $index->showAutor();
    else
        $index->showStart(); // Show the default webpage
}
?>
</body>
</html>